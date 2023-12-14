<?php

namespace App\Http\Controllers;

use App\Exceptions\CustomException;
use App\Models\Receipt;
use App\Services\CommonService;
use App\Services\ReceiptService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReceiptController extends Controller
{
    protected $CommonService;
    protected $ReceiptService;

    public function __construct(CommonService $CommonService, ReceiptService $ReceiptService)
    {
        $this->CommonService = $CommonService;
        $this->ReceiptService = $ReceiptService;
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

            $receiptQuery = Receipt::with("invoice")->with("tenant")->with("bank")->where("deleted_at", null);
            if($value){
                $receiptQuery->where(function ($query) use ($value) {
                    $query->whereHas('tenant', function ($tenantQuery) use ($value) {
                        $tenantQuery->where('name', 'like', '%' . $value . '%');
                    })
                    ->orWhere('receipt_number', 'like', '%' . $value . '%')
                    ->orWhere('grand_total', 'like', '%' . $value . '%')
                    ->orWhere('status', 'like', '%' . $value . '%')
                    ->orWhere('receipt_date', 'like', '%' . $value . '%')
                    ->orWhere('receipt_send_date', 'like', '%' . $value . '%');
                });
            }
            $getReceipts = $receiptQuery->orderBy($order, $sort)->paginate($perPage);
            $totalCount = $getReceipts->total();

            $receiptArr = $this->CommonService->toArray($getReceipts);

            return [
                "data" => $receiptArr,
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
            $validateReceipt = $this->ReceiptService->validateReceipt($request);
            if($validateReceipt != "") throw new CustomException($validateReceipt, 400);

            $receipt = Receipt::create($request->all());
            DB::commit();

            $getReceipt = Receipt::with("invoice")
                ->with("tenant")
                ->with("bank")
                ->where("id", $receipt->id)
                ->where("deleted_at", null)
                ->first();

            return ["data" => $getReceipt];
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
            $getReceipt = Receipt::with("invoice")->
                with("tenant")->
                with("bank")->
                where("id", $id)->
                where("deleted_at", null)->first();
            if (is_null($getReceipt)) throw new CustomException("Tanda terima tidak ditemukan", 404);

            return ["data" => $getReceipt];
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
            $receiptExist = $this->CommonService->getDataById("App\Models\Receipt", $id);
            if(is_null($receiptExist)) throw new CustomException("Tanda terima tidak ditemukan", 404);

            $validateReceipt = $this->ReceiptService->validateReceipt($request);
            if($validateReceipt != "") throw new CustomException($validateReceipt, 400);

            Receipt::findOrFail($id)->update($request->all());
            DB::commit();

            $getReceipt = Receipt::with("invoice")
                ->with("tenant")
                ->with("bank")
                ->where("id", $id)
                ->where("deleted_at", null)
                ->first();

            return ["data" => $getReceipt];
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
            $receiptExist = $this->CommonService->getDataById("App\Models\Receipt", $id);
            if(is_null($receiptExist)) throw new CustomException("Tanda terima tidak ditemukan", 404);

            Receipt::findOrFail($id)->delete();
            DB::commit();

            return response()->json(['message' => 'Tanda terima berhasil dihapus'], 200);
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

    public function select(Request $request)
    {
        try{
            [
                "page" => $page,
                "value" => $value
            ] = $this->CommonService->getQuery($request);
            $field = $request->input("field");
            $perPage = 10;

            if(is_null($field)) $field = "id";

            $getReceipt = Receipt::where("deleted_at", null)->
                where($field, 'like', '%' . $value . '%')->
                select("id", $field)->
                paginate($perPage);
            $totalCount = $getReceipt->total();

            $dataArr = [];
            foreach($getReceipt as $bankObj){
                $dataObj = [
                    "id" => $bankObj->id,
                    "text" => $bankObj->$field,
                ];
                array_push($dataArr, $dataObj);
            }

            $pagination = ["more" => false];
            if($totalCount > ($perPage * $page)) {
                $pagination = ["more" => true];
            }

            return [
                "data" => $dataArr,
                "pagination" => $pagination,
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
