<?php

namespace App\Http\Controllers;

use App\Exceptions\CustomException;
use App\Models\PurchaseOrder;
use App\Models\Receipt;
use App\Models\Tenant;
use App\Models\VendorAttachment;
use App\Services\CommonService;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
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

            $purchaseOrderQuery = PurchaseOrder::with("vendor")->with("tenant")->where("deleted_at", null)->where('status', 'like', '%disetujui bm%');
            if ($value) {
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
            if (!is_null($vendorId)) {
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

    public function add_attachment(Request $request, $id)
    {
        DB::beginTransaction();
        try {
            $id = (int) $id;
            $purchaseOrderExist = $this->CommonService->getDataById("App\Models\PurchaseOrder", $id);
            if (is_null($purchaseOrderExist)) throw new CustomException("Purchase order tidak ditemukan", 404);

            // $rules = [
            //     "attachments" => ["bail", "required", "array"],
            //     "attachments.*" => ["bail", "required", "string"]
            // ];
            // $errorMessages = [
            //     "required" => "Field :attribute harus diisi",
            //     "string" => "Field :attribute harus diisi dengan string",
            //     "array" => "Field :attribute harus diisi dengan array"
            // ];

            // $validator = Validator::make($request->all(), $rules, $errorMessages);

            // if ($validator->fails()) throw new CustomException(implode(', ', $validator->errors()->all()), 400);

            foreach ($request->input("attachments") as $attachment) {
                VendorAttachment::create([
                    "purchase_order_id" => $id,
                    "attachment" => $attachment['attachment'],
                    "uraian" => $attachment['uraian'],

                ]);
            }

            DB::commit();
            $getPurchaseOrder = PurchaseOrder::with("purchaseOrderDetails")->with("vendor")->with("tenant")->with("vendorAttachment")->where("id", $id)->where("deleted_at", null)->first();
            return ["data" => $getPurchaseOrder];
        } catch (\Throwable $e) {
            $errorMessage = "Internal server error";
            $errorStatusCode = 500;
            DB::rollBack();

            if (is_a($e, CustomException::class)) {
                $errorMessage = $e->getMessage();
                $errorStatusCode = $e->getStatusCode();
            }

            return response()->json(['message' => $errorMessage], $errorStatusCode);
        }
    }

    public function vendorInvoiceReportExport(Request $request)
    {
        try {
            [
                // "perPage" => $perPage,
                // "page" => $page,
                // "order" => $order,
                // "sort" => $sort,
                "value" => $value
            ] = $this->CommonService->getQuery($request);

            $vendorId = $request->input("vendor_id", null);

            $purchaseOrderQuery = PurchaseOrder::with("vendor")->with("tenant")->where("deleted_at", null)->where('status', 'like', '%disetujui bm%');
            if ($value) {
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
            if (!is_null($vendorId)) {
                $purchaseOrderQuery = $purchaseOrderQuery->where("vendor_id", $vendorId);
            }
            $getPurchaseOrder = $purchaseOrderQuery
                ->select("purchase_order_number", "vendor_id", "about", "grand_total", "purchase_order_date", "status")
                ->get();
            // $totalCount = $getPurchaseOrder->total();

            $purchaseOrderArr = $this->CommonService->toArray($getPurchaseOrder);

            return [
                "data" => $purchaseOrderArr,
                // "per_page" => $perPage,
                // "page" => $page,
                // "size" => $totalCount,
                // "pages" => ceil($totalCount / $perPage)
            ];
        } catch (\Exception $e) {
            dd($e);
            $errorMessage = "Internal server error";
            $errorStatusCode = 500;

            if (is_a($e, CustomException::class)) {
                $errorMessage = $e->getMessage();
                $errorStatusCode = $e->getStatusCode();
            }

            return response()->json(['message' => $errorMessage], $errorStatusCode);
        }
    }


}
