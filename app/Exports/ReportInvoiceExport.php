<?php

namespace App\Exports;

use App\Models\Invoice;
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

    // function __construct($from_date, $to_date)
    // {
    //     $this->from_date = $from_date;
    //     $this->to_date = $to_date;
    // }

    
    public function collection()
    {
        return collect([
            [
                'name' => 'Povilas',
                'surname' => 'Korop',
                'email' => 'povilas@laraveldaily.com',
                'twitter' => '@povilaskorop'
            ],
            [
                'name' => 'Taylor',
                'surname' => 'Otwell',
                'email' => 'taylor@laravel.com',
                'twitter' => '@taylorotwell'
            ]
        ]);
    }

    public function map($data): array
    {
        return [
            $this->i++,
            $data['name'],
            $data['surname'],
            $data['email'],
            $data['twitter'],
        ];
    }

    public function headings(): array
    {
        return [
            'No',
            'Nama',
            'Surname',
            'Email',
            'Twitter'
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
