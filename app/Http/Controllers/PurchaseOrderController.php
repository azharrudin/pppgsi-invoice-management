<?php

namespace App\Http\Controllers;

use App\Exceptions\CustomException;
use App\Models\PurchaseOrder;
use App\Models\PurchaseOrderDetail;
use App\Models\PurchaseOrderSignature;
use App\Services\CommonService;
use App\Services\PurchaseOrderService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PurchaseOrderController extends Controller
{
    protected $CommonService;
    protected $PurchaseOrderService;

    public function __construct(CommonService $CommonService, PurchaseOrderService $PurchaseOrderService)
    {
        $this->CommonService = $CommonService;
        $this->PurchaseOrderService = $PurchaseOrderService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        try{
            [
                "perPage" => $perPage,
                "page" => $page,
                "order" => $order,
                "sort" => $sort,
                "value" => $value
            ] = $this->CommonService->getQuery($request);

            $purchaseOrderQuery = PurchaseOrder::with("purchaseOrderDetails")->
                with("vendor")->
                with("tenant")->
                where("deleted_at", null);
            if($value){
                $purchaseOrderQuery->where(function ($query) use ($value) {
                    $query->whereHas('vendor', function ($vendorQuery) use ($value) {
                        $vendorQuery->where('name', 'like', '%' . $value . '%');
                    })
                    ->orWhere('purchase_order_number', 'like', '%' . $value . '%')
                    ->orWhere('about', 'like', '%' . $value . '%')
                    ->orWhere('grand_total', 'like', '%' . $value . '%')
                    ->orWhere('purchase_order_date', 'like', '%' . $value . '%')
                    ->orWhere('status', 'like', '%' . $value . '%');
                });
            }
            $getPurchaseOrder = $purchaseOrderQuery->orderBy($order, $sort)->paginate($perPage);
            $totalCount = $getPurchaseOrder->total();

            $purchaseOrderArr = $this->CommonService->toArray($getPurchaseOrder);

            return [
                "data" => $purchaseOrderArr,
                "per_page" => $perPage,
                "page" => $page,
                "size" => $totalCount,
                "pages" => ceil($totalCount/$perPage)
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

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        DB::beginTransaction();

        try{
            $validatePurchaseOrder = $this->PurchaseOrderService->validatePurchaseOrder($request);
            if($validatePurchaseOrder != "") throw new CustomException($validatePurchaseOrder, 400);

            $purchaseOrder = PurchaseOrder::create($request->all());

            foreach($request->input("details") as $detail){
                PurchaseOrderDetail::create([
                    "purchase_order_id" => $purchaseOrder->id,
                    "number" => $detail["number"],
                    "name" => $detail["name"],
                    "specification" => $detail["specification"],
                    "quantity" => $detail["quantity"],
                    "units" => $detail["units"],
                    "price" => $detail["price"],
                    "tax" => $detail["tax"],
                    "total_price" => $detail["total_price"],
                ]);
            }

            DB::commit();

            $getPurchaseOrder = PurchaseOrder::with("purchaseOrderDetails")->
                with("vendor")->
                with("tenant")->
                where("id", $purchaseOrder->id)->
                where("deleted_at", null)->
                first();

            return ["data" => $getPurchaseOrder];
        } catch (\Throwable $e) {
            $errorMessage = "Internal server error";
            $errorStatusCode = 500;

            DB::rollBack();

            if(is_a($e, CustomException::class)){
                $errorMessage = $e->getMessage();
                $errorStatusCode = $e->getStatusCode();
            }

            return response()->json(['message' => $errorMessage], $errorStatusCode);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        try{
            $id = (int) $id;
            $getPurchaseOPurchaseOrder = PurchaseOrder::with("purchaseOrderDetails")->
                with("vendor")->
                with("tenant")->
                where("id", $id)->
                where("deleted_at", null)->
                first();
            if (is_null($getPurchaseOPurchaseOrder)) throw new CustomException("Purchase order tidak ditemukan", 404);

            return ["data" => $getPurchaseOPurchaseOrder];
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

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        DB::beginTransaction();

        try{
            $id = (int) $id;
            $purchaseOrderExist = $this->CommonService->getDataById("App\Models\PurchaseOrder", $id);
            if (is_null($purchaseOrderExist)) throw new CustomException("Purchase order tidak ditemukan", 404);

            $validatePurchaseOrder = $this->PurchaseOrderService->validatePurchaseOrder($request);
            if($validatePurchaseOrder != "") throw new CustomException($validatePurchaseOrder, 400);

            PurchaseOrder::findOrFail($id)->update($request->all());
            PurchaseOrderDetail::where("purchase_order_id", $id)->where("deleted_at", null)->delete();

            foreach($request->input("details") as $detail){
                PurchaseOrderDetail::create([
                    "purchase_order_id" => $id,
                    "number" => $detail["number"],
                    "name" => $detail["name"],
                    "specification" => $detail["specification"],
                    "quantity" => $detail["quantity"],
                    "units" => $detail["units"],
                    "price" => $detail["price"],
                    "tax" => $detail["tax"],
                    "total_price" => $detail["total_price"],
                ]);
            }

            DB::commit();

            $getPurchaseOrder = PurchaseOrder::with("purchaseOrderDetails")->
                with("vendor")->
                with("tenant")->
                where("id", $id)->
                where("deleted_at", null)->
                first();

            return ["data" => $getPurchaseOrder];
        } catch (\Throwable $e) {
            $errorMessage = "Internal server error";
            $errorStatusCode = 500;

            DB::rollBack();

            if(is_a($e, CustomException::class)){
                $errorMessage = $e->getMessage();
                $errorStatusCode = $e->getStatusCode();
            }

            return response()->json(['message' => $errorMessage], $errorStatusCode);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        DB::beginTransaction();

        try{
            $id = (int) $id;
            $purchaseOrderExist = $this->CommonService->getDataById("App\Models\PurchaseOrder", $id);
            if (is_null($purchaseOrderExist)) throw new CustomException("Purchase order tidak ditemukan", 404);

            PurchaseOrder::findOrFail($id)->delete();
            PurchaseOrderDetail::where("purchase_order_id", $id)->where("deleted_at", null)->delete();

            DB::commit();

            return response()->json(['message' => 'Purchase order berhasil dihapus'], 200);
        } catch (\Throwable $e) {
            $errorMessage = "Internal server error";
            $errorStatusCode = 500;

            DB::rollBack();

            if(is_a($e, CustomException::class)){
                $errorMessage = $e->getMessage();
                $errorStatusCode = $e->getStatusCode();
            }

            return response()->json(['message' => $errorMessage], $errorStatusCode);
        }
    }
}
