<?php

namespace App\Http\Controllers;

use App\Exceptions\CustomException;
use App\Models\PurchaseOrder;
use App\Models\Receipt;
use App\Models\Tenant;
use App\Services\CommonService;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

use Validator;
class VendorInvoiceController extends Controller
{
    protected $CommonService;

    public function __construct(CommonService $CommonService)
    {
        $this->CommonService = $CommonService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        try {
            [
                "perPage" => $perPage,
                "page" => $page,
                "order" => $order,
                "sort" => $sort,
                "value" => $value
            ] = $this->CommonService->getQuery($request);

            $vendorId = $request->input("vendor_id", null);

            $purchaseOrderQuery = PurchaseOrder::with("vendor")->
                with("tenant")->
                where("deleted_at", null)->
                where('status', 'like', '%disetujui bm%');
            if($value){
                $purchaseOrderQuery->where(function ($query) use ($value) {
                    $query->whereHas('vendor', function ($vendorQuery) use ($value) {
                        $vendorQuery->where('name', 'like', '%' . $value . '%');
                    })
                        ->orWhere('purchase_order_number', 'like', '%' . $value . '%')
                        ->orWhere('about', 'like', '%' . $value . '%')
                        ->orWhere('grand_total', 'like', '%' . $value . '%')
                        ->orWhere('purchase_order_date', 'like', '%' . $value . '%');
                });
            }
            if(!is_null($vendorId)){
              $purchaseOrderQuery = $purchaseOrderQuery->where("vendor_id", $vendorId);
            }
            $getPurchaseOrder = $purchaseOrderQuery
                ->select("purchase_order_number", "vendor_id", "tenant_id", "about", "grand_total", "purchase_order_date", "status")
                ->orderBy($order, $sort)
                ->paginate($perPage);
            $totalCount = $getPurchaseOrder->total();

            $purchaseOrderArr = $this->CommonService->toArray($getPurchaseOrder);

            return [
                "data" => $purchaseOrderArr,
                "per_page" => $perPage,
                "page" => $page,
                "size" => $totalCount,
                "pages" => ceil($totalCount / $perPage)
            ];
        } catch (\Throwable $e) {
            $errorMessage = "Internal server error";
            $errorStatusCode = 500;

            if (is_a($e, CustomException::class)) {
                $errorMessage = $e->getMessage();
                $errorStatusCode = $e->getStatusCode();
            }

            return response()->json(['message' => $errorMessage], $errorStatusCode);
        }
    }

    public function add_attachment(){
        
    }

    public function report(Request $request)
    {
        try{
            [
                "start" => $start,
                "end" => $end,
            ] = $this->CommonService->getQuery($request);

            if(is_null($start)) $start = Carbon::now()->firstOfMonth();
            if(is_null($end)){
                $end = Carbon::now()->lastOfMonth();
                $end->setTime(23, 59, 59);
            }

            $countTenant = Tenant::where("deleted_at", null)->whereBetween("created_at", [$start, $end])->count();
            $countReceipt = Receipt::where("deleted_at", null)->whereBetween("created_at", [$start, $end])->count();
            $countReceiptPaid = Receipt::where("deleted_at", null)->
                whereBetween("created_at", [$start, $end])->
                where("status", "like", "%Lunas%")->
                sum("grand_total");

            return [
                "count_tenant" => $countTenant,
                "count_receipt" => $countReceipt,
                "count_receipt_paid" => $countReceiptPaid,
            ];
        } catch (\Throwable $e) {
            $errorMessage = "Internal server error";
            $errorStatusCode = 500;

            if(is_a($e, CustomException::class)){
                $errorMessage = $e->getMessage();
                $errorStatusCode = $e->getStatusCode();
            }

            return response()->json(['message' => $errorMessage], $errorStatusCode);
        }
    }
}
