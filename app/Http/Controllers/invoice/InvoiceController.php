<?php

namespace App\Http\Controllers\invoice;

use App\Http\Controllers\Controller;
use PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use DataTables;

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

    public function editPreview()
    {
        return view('invoice.edit-preview');
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
            'order' => 'id',
            'sort' => 'desc',
            'value' => $request->search['value'],
        ]);
        $response = json_decode($apiRequest->getBody());
        $data = [];
        if($response->data){
            foreach ($response->data as $key => $value) {
                $data[$key] = $value;
                $data[$key]->tenant_name = $value->tenant->company ?? '';
            }
        }
        return DataTables::of($data)
            ->setFilteredRecords($response->size)
            ->setTotalRecords($response->size)
            ->make(true);
        
    }

    public function edit(string $id)
    {
        return view('invoice.edit');
    }

    public function show(string $id)
    {
        return view('invoice.show', compact('id'));
    }
    
    public function print($id){
        $apiRequest = Http::get(env('BASE_URL_API') .'/api/invoice/'.$id);
        $response = json_decode($apiRequest->getBody());
        $data = $response->data;
        // foreach ( $data->invoice_details as $key => $value) {

        // }

        for($i = 0 ; $i <  sizeof($data->invoice_details) ; $i++){
            $tax = $data->invoice_details[$i]->tax_id;
            $apiRequest = Http::get(env('BASE_URL_API') . '/api/tax/get-paper/'.$tax);
            $response = json_decode($apiRequest->getBody());
            $value = $response->data->value; 
            $data->invoice_details[$i]->tax_id = $value;   
        }
    	$pdf = PDF::loadView('invoice.download',['data'=>$data])->setPaper('a4', 'portait');
    	return $pdf->stream('invoice.pdf');
    }
}
