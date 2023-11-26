<?php

namespace App\Http\Controllers;

use App\Exceptions\CustomException;
use App\Models\Bank;
use App\Services\BankService;
use App\Services\CommonService;
use Illuminate\Http\Request;

class BankController extends Controller
{
    protected $CommonService;
    protected $BankService;

    public function __construct(CommonService $CommonService, BankService $bankService)
    {
        $this->CommonService = $CommonService;
        $this->BankService = $bankService;
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

            $bankQuery = Bank::where("deleted_at", null);
            if($value){
                $bankQuery->where(function ($query) use ($value) {
                    $query->where('name', 'like', '%' . $value . '%');
                });
            }
            $getBanks = $bankQuery->orderBy($order, $sort)->paginate($perPage);
            $totalCount = $getBanks->total();

            $bankArr = $this->CommonService->toArray($getBanks);

            return [
                "data" => $bankArr,
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
        try{
            $validateBank = $this->BankService->validateBank($request, true, "");
            if($validateBank != "") throw new CustomException($validateBank, 400);

            $bank = Bank::create($request->all());

            return response()->json($bank, 201);
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
     * Display the specified resource.
     */
    public function show($id)
    {
        try{
            $id = (int) $id;
            $getBank = $this->CommonService->getDataById("App\Models\Bank", $id);
            if (is_null($getBank)) throw new CustomException("Bank tidak ditemukan", 404);

            return ["data" => $getBank];
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
        try{
            $id = (int) $id;
            $getBank = $this->CommonService->getDataById("App\Models\Bank", $id);
            if (is_null($getBank)) throw new CustomException("Bank tidak ditemukan", 404);

            $validateBank = $this->BankService->validateBank($request, false, $id);
            if($validateBank != "") throw new CustomException($validateBank, 400);

            $update = Bank::findOrFail($id)->update($request->all());
            $bank = Bank::where("id", $id)->first();

            return response()->json($bank, 200);
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
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try{
            $id = (int) $id;
            $getBank = $this->CommonService->getDataById("App\Models\Bank", $id);
            if (is_null($getBank)) throw new CustomException("Bank tidak ditemukan", 404);

            $deleteBank = Bank::findOrFail($id)->delete();

            return response()->json(['message' => 'Bank have been deleted'], 200);
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
