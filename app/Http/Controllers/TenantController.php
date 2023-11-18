<?php

namespace App\Http\Controllers;

use App\Exceptions\CustomException;
use App\Models\Tenant;
use App\Services\CommonService;
use App\Services\TenantService;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TenantController extends Controller
{
    protected $CommonService;
    protected $TenantService;

    public function __construct(CommonService $CommonService, TenantService $tenantService)
    {
        $this->CommonService = $CommonService;
        $this->TenantService = $tenantService;
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

            $tenantQuery = Tenant::where("deleted_at", null);
            if($value){
                $tenantQuery->where(function ($query) use ($value) {
                    $query->where('name', 'like', '%' . $value . '%')
                        ->orWhere('email', 'like', '%' . $value . '%')
                        ->orWhere('phone', 'like', '%' . $value . '%')
                        ->orWhere('company', 'like', '%' . $value . '%')
                        ->orWhere('floor', 'like', '%' . $value . '%');
                });
            }
            $getTenants = $tenantQuery->orderBy($order, $sort)->paginate($perPage);
            $totalCount = $getTenants->total();

            $tenantArr = $this->CommonService->toArray($getTenants);

            return [
                "data" => $tenantArr,
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
            $validateTenant = $this->TenantService->validateTenant($request);
            if($validateTenant != "") throw new CustomException($validateTenant, 400);

            $tenant = Tenant::create($request->all());

            return response()->json($tenant, 201);
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
            $getTenant = Tenant::where("id", $id)->where("deleted_at", null)->first();
            if (is_null($getTenant)) throw new CustomException("Tenant not found", 404);

            return ["data" => $getTenant];
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
            $getTenant = Tenant::where("id", $id)->where("deleted_at", null)->first();
            if (is_null($getTenant)) throw new CustomException("Tenant not found", 404);

            $validateTenant = $this->TenantService->validateTenant($request);
            if($validateTenant != "") throw new CustomException($validateTenant, 400);

            $update = Tenant::findOrFail($id)->update($request->all());
            $tenant = Tenant::where("id", $id)->first();

            return response()->json($tenant, 200);
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
            $getTenant = Tenant::where("id", $id)->where("deleted_at", null)->first();
            if (is_null($getTenant)) throw new CustomException("Tenant not found", 404);

            $deleteTenant = Tenant::findOrFail($id)->delete();

            return response()->json(['message' => 'Tenant have been deleted'], 200);
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
