<?php

namespace App\Http\Controllers\pages;

use App\Http\Controllers\Controller;
use Barryvdh\Snappy\Facades\SnappyPdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Yajra\DataTables\DataTables;
use PDF;

class TandaTerimaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('content.pages.tanda-terima.list');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('content.pages.tanda-terima.add');
    }

    public function preview(string $id)
    {
        return view('content.pages.tanda-terima.preview', compact('id'));
    }

    public function show()
    {
        return view('content.pages.tanda-terima.show');
    }

    public function edit(string $id)
    {
        return view('content.pages.tanda-terima.edit');
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
        if ($request->page == null) {
            $request->page = 1;
        }
        $apiRequest = Http::get(env('BASE_URL_API') . '/api/receipt', [
            'per_page' => $request->length,
            'page' => $request->page,
            'order' => 'id',
            'sort' => 'desc',
            'value' => $request->search['value'],
        ]);
        $response = json_decode($apiRequest->getBody());
        $data = [];
        if ($response->data) {
            foreach ($response->data as $key => $value) {
                $data[$key] = $value;
                $data[$key]->tenant_name = $value->tenant->name;
            }
        }
        return DataTables::of($data)
            ->setFilteredRecords($response->size)
            ->setTotalRecords($response->size)
            ->make(true);

    }
    
    public function print($id){
        $apiRequest = Http::get(env('BASE_URL_API') .'/api/receipt/'.$id);
        $response = json_decode($apiRequest->getBody());
        // dd($response);
        $data = $response->data;
        $dataPdf = SnappyPdf::loadView('content.pages.tanda-terima.download',['data'=>$data])->setOption('enable-javascript', true);
    	// $pdf = SnappyPdf::loadView('content.pages.tanda-terima.download',$data)->setOption('enable-javascript', true);
        $filePath = base_path("public/pdf/". 'a.pdf');
        $dataPdf->save($filePath, true);
        return  [
            "message" => "Email berhasil dikirim"
        ];
    	// return $pdf->stream('tanda-terima.pdf');
        // return view('content.pages.tanda-terima.download', ['data'=>$data]);
    }
}
