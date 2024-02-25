<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class ReportTandaTerimaExport implements FromCollection, WithMapping, ShouldAutoSize, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */

     use Exportable;
     private $i = 1;
 
     function __construct($data)
     {
         $this->data = $data;
     }
 
     
     public function collection()
     {
         return collect($this->data);
     }
     
 
     public function map($data): array
     {
        $status ='';

        if($data->status =='Terkirim'){
            $status = 'Terkirim';
        }else{
            $status = 'Belum Terkirim';
        }
         
         return [
             $this->i++,
             $data->receipt_number,
             $data->tenant->name,
             $data->total_invoice,
             $data->receipt_date,
             $data->receipt_send_date,
             $status
         ];
     }
 
     public function headings(): array
     {
         return [
             "No",
             "No Tanda Terima",
             "Tenant",
             "Total",
             "Tanggal Tanda Terima",
             "Tanggal Kirim",
             "Status",
         ];
     }
}
