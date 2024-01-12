<?php

namespace App\Http\Controllers;

use App\Exceptions\CustomException;
use App\Models\Tenant;
use App\Models\Ticket;
use App\Models\TicketAttachment;
use App\Services\CommonService;
use App\Services\TicketService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TicketController extends Controller
{
    protected $CommonService;
    protected $TicketService;

    public function __construct(CommonService $CommonService, TicketService $TicketService)
    {
        $this->CommonService = $CommonService;
        $this->TicketService = $TicketService;
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

            $ticketQuery = Ticket::with("tenant")->with("ticketAttachments")->where("deleted_at", null);
            if($value){
                $ticketQuery->where(function ($query) use ($value) {
                    $query->where('ticket_number', 'like', '%' . $value . '%')
                    ->orWhere('reporter_name', 'like', '%' . $value . '%')
                    ->orWhere('reporter_company', 'like', '%' . $value . '%')
                    ->orWhere('ticket_title', 'like', '%' . $value . '%')
                    ->orWhere('status', 'like', '%' . $value . '%');
                });
            }
            $getTickets = $ticketQuery->orderBy($order, $sort)->paginate($perPage);
            $totalCount = $getTickets->total();

            $ticketArr = $this->CommonService->toArray($getTickets);

            return [
                "data" => $ticketArr,
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
            $validateTicket = $this->TicketService->validateTicket($request);
            if($validateTicket != "") throw new CustomException($validateTicket, 400);

            $saveTicket = Ticket::create($request->all());
            if(!is_null($request->input("attachment"))){
                // dd($request->input("attachment"));
              foreach($request->input("attachment") as $attachment){
                  TicketAttachment::create([
                      "ticket_id" => $saveTicket->id,
                      "attachment" => $attachment
                  ]);
              }
            }

            DB::commit();
            $getTicket = Ticket::with("tenant")->
                with("ticketAttachments")->
                where("id", $saveTicket->id)->
                where("deleted_at", null)->
                first();

            return ["data" => $getTicket];
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
            $getTicket = Ticket::with("tenant")->
                with("ticketAttachments")->
                where("id", $id)->
                where("deleted_at", null)->
                first();
            if (is_null($getTicket)) throw new CustomException("Ticket tidak ditemukan", 404);

            return ["data" => $getTicket];
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
            $ticketExist = $this->CommonService->getDataById("App\Models\Ticket", $id);
            if (is_null($ticketExist)) throw new CustomException("Ticket tidak ditemukan", 404);

            $validateTicket = $this->TicketService->validateTicket($request);
            if($validateTicket != "") throw new CustomException($validateTicket, 400);

            Ticket::findOrFail($id)->update($request->all());
            TicketAttachment::where("ticket_id", $id)->where("deleted_at", null)->delete();
            foreach($request->input("attachment") as $attachment){
                TicketAttachment::create([
                    "ticket_id" => $id,
                    "attachment" => $attachment
                ]);
            }

            DB::commit();
            $getTicket = Ticket::with("tenant")->
                with("ticketAttachments")->
                where("id", $id)->
                where("deleted_at", null)->
                first();

            return ["data" => $getTicket];
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
            $ticketExist = $this->CommonService->getDataById("App\Models\Ticket", $id);
            if (is_null($ticketExist)) throw new CustomException("Ticket tidak ditemukan", 404);

            Ticket::findOrFail($id)->delete();
            TicketAttachment::where("ticket_id", $id)->where("deleted_at", null)->delete();
            DB::commit();

            return response()->json(['message' => 'Ticket berhasil dihapus'], 200);
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

            if(is_null($field)) $field = "ticket_number";

            $getTicket = Ticket::where("deleted_at", null)->
                where($field, 'like', '%' . $value . '%')->
                select("id", $field)->
                paginate($perPage);
            $totalCount = $getTicket->total();

            $dataArr = [];
            foreach($getTicket as $ticketObj){
                $dataObj = [
                    "id" => $ticketObj->id,
                    "text" => $ticketObj->$field,
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

    public function report()
    {
        try{
            $countTenant = Tenant::where("deleted_at", null)->count();
            $countTicket = Ticket::where("deleted_at", null)->count();

            return [
                "count_tenant" => $countTenant,
                "count_ticket" => $countTicket,
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
