<?php

namespace App\Exports;

use App\Models\Invoice;
use DateTime;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class ReportInvoiceExport implements FromCollection, WithMapping, ShouldAutoSize, WithHeadings
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
        return [
            $this->i++,
            $data->invoice_number,
            $data->invoice_date,
            (strtotime(date('Ymd')) -  strtotime($data->invoice_date)) / 86400 +1 .' Hari',
            $data->tenant->name,
            "Rp " . number_format($data->grand_total, 2, ',', '.'),
            "Rp " . number_format($data->remaining, 2, ',', '.'),
        ];
    }

    public function headings(): array
    {
        return [
            'No',
            'Nomor Invoice',
            'Tanggal Dibuat',
            'Umur Piutang',
            'Perusahaan',
            'Total Invoice',
            'Sisa Tagihan'
        ];
    }

    // public function styles(Worksheet $sheet)
    // {
    //     $styleHeader = [
    //         'borders' => [
    //             'allBorders' => [
    //                 'borderStyle' => 'thin',
    //                 'color' => ['rgb' => '808080']
    //             ],
    //         ]
    //     ];
    //     $sheet->getStyle('1')->getFont()->setBold(true);
    //     $sheet->getStyle('1')->getFill()->applyFromArray(['fillType' => 'solid','rotation' => 0, 'color' => ['rgb' => '7EC8E3'],]);
    //     $sheet->getStyle($sheet->calculateWorksheetDimension())->applyFromArray($styleHeader);
    // }
}
