<?php

namespace App\Http\Controllers\invoice;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Yajra\DataTables\DataTables;

class InvoiceController extends Controller
{
    public function index()
    {
        return view('invoice.list-invoice');
    }
    
    public function add()
    {
        return view('invoice.add');
    }

    public function preview()
    {
        return view('invoice.preview-invoice');
    }

    public function datatable(Request $request)
    {
        $searchColumn = array();
        foreach ($request->columns as $column) {
            if ($column['data'] != 'null' && $column['data'] != 'Actions') {
                $searchColumn[] = array(
                    $column['data'] => $column['search']['value']
                );
            }
        }
        $dataSearchColumn = array();
        foreach ($searchColumn as $value) {
            foreach ($value as $k => $val) {
                if ($val != null || $val != '') {
                    $dataSearchColumn[$k] = $val;
                }
            }
        }

        $orderBy = '';
        $sortBy = '';
        if ($request->order[0]['column'] != 0) {
            $sortBy = $request->order[0]['dir'];
            // $orderBy = $request->columns[$request->order[0]['column']]['data']; harusnya kodenya ini, tapi di harcode dulu sampai diperbaiki apinya.
            $orderBy = 'id';
        }
        if($request->page == null){
            $request->page = 1;
        }
        $apiRequest = Http::get(env('BASE_URL_API') .'/api/invoice', [
            'per_page' => $request->length,
            'page' => $request->page,
            'order' => $orderBy,
            'sort' => $sortBy,
            'value' => $request->search['value'],
        ]);
        $response = json_decode($apiRequest->getBody());
        return  DataTables::of($response->data)
            ->setFilteredRecords($response->size)
            ->setTotalRecords($response->size)
            ->make(true);
        
    }
}
