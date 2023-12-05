<?php

namespace App\Http\Controllers;

use App\Exceptions\CustomException;
use App\Models\PurchaseRequest;
use App\Models\PurchaseRequestDetail;
use App\Models\PurchaseRequestSignature;
use App\Services\CommonService;
use App\Services\PurchaseRequestService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class PurchaseRequestController extends Controller
{
    protected $CommonService;
    protected $PurchaseRequestService;

    public function __construct(CommonService $CommonService, PurchaseRequestService $PurchaseRequestService)
    {
        $this->CommonService = $CommonService;
        $this->PurchaseRequestService = $PurchaseRequestService;
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

            $purchaseRequestQuery = PurchaseRequest::with("purchaseRequestDetails")->
                with("purchaseRequestSignatures")->
                with("materialRequest")->
                where("deleted_at", null);
            if($value){
                $purchaseRequestQuery->where(function ($query) use ($value) {
                    $query->where('id', 'like', '%' . $value . '%')
                    ->orWhere('department', 'like', '%' . $value . '%')
                    ->orWhere('proposed_purchase_price', 'like', '%' . $value . '%')
                    ->orWhere('budget_status', 'like', '%' . $value . '%')
                    ->orWhere('request_date', 'like', '%' . $value . '%')
                    ->orWhere('status', 'like', '%' . $value . '%');
                });
            }
            $getPurchaseRequest = $purchaseRequestQuery->orderBy($order, $sort)->paginate($perPage);
            $totalCount = $getPurchaseRequest->total();

            $purchaseRequestArr = $this->CommonService->toArray($getPurchaseRequest);

            return [
                "data" => $purchaseRequestArr,
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
            $validatePurchaseRequest = $this->PurchaseRequestService->validatePurchaseRequest($request);
            if($validatePurchaseRequest != "") throw new CustomException($validatePurchaseRequest, 400);

            $purchaseRequest = PurchaseRequest::create($request->all());

            foreach($request->input("details") as $detail){
                PurchaseRequestDetail::create([
                    "purchase_request_id" => $purchaseRequest->id,
                    "number" => $detail["number"],
                    "part_number" => $detail["part_number"],
                    "last_buy_date" => $detail["last_buy_date"],
                    "last_buy_quantity" => $detail["last_buy_quantity"],
                    "last_buy_stock" => $detail["last_buy_stock"],
                    "description" => $detail["description"],
                    "quantity" => $detail["quantity"],
                ]);
            }

            if(!is_null($request->input("signatures"))){
                foreach($request->input("signatures") as $signature){
                    PurchaseRequestSignature::create([
                        'purchase_request_id' => $purchaseRequest->id,
                        'type' => $signature['type'],
                        'name' => $signature['name'],
                        'signature' => $signature['signature'],
                        'date' => $signature['date'],
                    ]);
                }
            }

            DB::commit();

            $getPurchaseRequest = PurchaseRequest::with("purchaseRequestDetails")->
                with("purchaseRequestSignatures")->
                with("materialRequest")->
                where("id", $purchaseRequest->id)->
                where("deleted_at", null)->
                first();

            return ["data" => $getPurchaseRequest];
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
            $getPurchaseRequest = PurchaseRequest::with("purchaseRequestDetails")->
                with("purchaseRequestSignatures")->
                with("materialRequest")->
                where("id", $id)->
                where("deleted_at", null)->
                first();
            if (is_null($getPurchaseRequest)) throw new CustomException("Purchase request tidak ditemukan", 404);

            return ["data" => $getPurchaseRequest];
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
            $purchaseRequestExist = $this->CommonService->getDataById("App\Models\PurchaseRequest", $id);
            if (is_null($purchaseRequestExist)) throw new CustomException("Purchase request tidak ditemukan", 404);

            $validatePurchaseRequest = $this->PurchaseRequestService->validatePurchaseRequest($request);
            if($validatePurchaseRequest != "") throw new CustomException($validatePurchaseRequest, 400);

            PurchaseRequest::findOrFail($id)->update($request->all());
            PurchaseRequestSignature::where("purchase_request_id", $id)->where("deleted_at", null)->delete();
            PurchaseRequestDetail::where("purchase_request_id", $id)->where("deleted_at", null)->delete();

            foreach($request->input("details") as $detail){
                PurchaseRequestDetail::create([
                    "purchase_request_id" => $id,
                    "number" => $detail["number"],
                    "part_number" => $detail["part_number"],
                    "last_buy_date" => $detail["last_buy_date"],
                    "last_buy_quantity" => $detail["last_buy_quantity"],
                    "last_buy_stock" => $detail["last_buy_stock"],
                    "description" => $detail["description"],
                    "quantity" => $detail["quantity"],
                ]);
            }

            if(!is_null($request->input("signatures"))){
                foreach($request->input("signatures") as $signature){
                    PurchaseRequestSignature::create([
                        'purchase_request_id' => $id,
                        'type' => $signature['type'],
                        'name' => $signature['name'],
                        'signature' => $signature['signature'],
                        'date' => $signature['date'],
                    ]);
                }
            }

            DB::commit();

            $getPurchaseRequest = PurchaseRequest::with("purchaseRequestDetails")->
                with("purchaseRequestSignatures")->
                with("materialRequest")->
                where("id", $id)->
                where("deleted_at", null)->
                first();

            return ["data" => $getPurchaseRequest];
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
            $purchaseRequestExist = $this->CommonService->getDataById("App\Models\PurchaseRequest", $id);
            if (is_null($purchaseRequestExist)) throw new CustomException("Purchase request tidak ditemukan", 404);

            PurchaseRequest::findOrFail($id)->delete();
            PurchaseRequestSignature::where("purchase_request_id", $id)->where("deleted_at", null)->delete();
            PurchaseRequestDetail::where("purchase_request_id", $id)->where("deleted_at", null)->delete();

            DB::commit();

            return response()->json(['message' => 'Purchase request berhasil dihapus'], 200);
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