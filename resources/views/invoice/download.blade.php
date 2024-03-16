@php
function rupiah($angka)
{
$hasil_rupiah = 'Rp ' . number_format($angka, 2, ',', '.');
return $hasil_rupiah;
}
@endphp
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Invoice {{ $data->invoice_number }}</title>
    <link href="{{ public_path('assets/css/bootstrap.min.css') }}" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    {{-- <script src="{{ public_path('assets/js/html2pdf.bundle.js') }}"></script> --}}

    <style>
        body {
            font-size: 12px;
            font-family: sans-serif;

        }

        .main-table,
        .main-table th,
        .main-table td {
            border: 0.5px solid;
        }


        .container {
            max-width: 21cm;
            margin: 0 auto;
            background: #fff;
            padding: 1cm;

        }

        /* A4 Styles */
        @media print {
            body {
                font-size: 12px;
                margin: 0;
                padding: 0;
            }

            .container {
                width: 21cm;
                min-height: 29.7cm;
                margin: auto;
                /* Center content on the page */
            }

            .ttd img {
                width: 130px;
            }

            .row img {
                width: 180px;
            }
        }
    </style>
</head>

<body>
    <div class="container" id="printContent">
        <header>
            <div class="row">
                <table class="table" style="width: 120%">
                    <tbody>
                        <tr>
                            <td colspan="3" style="width: 45%; height:100px"><img src="{{public_path('assets/img/header-img.jpg')}}" alt="Kop" width="50%"></td>
                            <td colspan="1" style="width: 10%;"></td>
                            <td colspan="3" style="width: 45%;">
                                <table style="text-align:right;">
                                    <tr>
                                        <td colspan="3" style="font-size: 24px;">Invoice</td>
                                    </tr>
                                    <tr>
                                        <td colspan="3" style="height: 10px;"></td>
                                    </tr>
                                    <tr>
                                        <td style="width:45%;">Referensi</td>
                                        <td style="width:10%;"></td>
                                        <td style="width:45%;">Example</td>
                                    </tr>
                                    <tr>
                                        <td style="width:45%;">Tanggal</td>
                                        <td style="width:10%;"></td>
                                        <td style="width:45%;">Example</td>
                                    </tr>
                                    <tr>
                                        <td style="width:45%;">Tgl. Jatuh Tempo</td>
                                        <td style="width:10%;"></td>
                                        <td style="width:45%;">Example</td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </header>

        <div class="row mt-4">
            <table class="table" style="width: 100%;">
                <tbody>
                    <tr>
                        <td style="width: 10%;"><b>Kepada Yth:</b></td>
                        {{-- <td style=""></td> --}}
                        {{-- <td style="width: 20%;border: 0.5px solid black; padding: 10px;"><b>No. Invoice:</b> 
                            <br><b>{{ $data->invoice_number }}</b>
                        </td>
                        <td style="width: 20%;border: 0.5px solid black; padding: 10px;"><b>Tanggal:</b><br>
                            <b> {{ date('d F Y', strtotime($data->invoice_date)) }}</b>
                        </td> --}}
                    </tr>
                    <tr>
                        <td rowspan="4" style="width: 35%; border: 0.5px solid black; padding: 10px;"><b>
                                {{ $data->tenant->company ?? '' }} <br>
                                {{ $data->tenant->floor ?? '' }} <br>
                                <br>
                                Up. {{ $data->tenant->name ?? '' }}</b></td>
                    </tr>
                    <tr>
                        <td style="border: none;"></td>
                        <td style="width: 20%;border: 0.5px solid black; padding: 10px;"><b>No. Invoice:</b>
                            <br><b>{{ $data->invoice_number }}</b>
                        </td>
                        <td style="width: 20%;border: 0.5px solid black; padding: 10px;"><b>Tanggal:</b><br>
                            <b> {{ date('d F Y', strtotime($data->invoice_date)) }}</b>
                        </td>
                    </tr>
                    <tr>
                        <td style="border-left: .5px solid white;  border-top: .5px solid white;  border-bottom: .5px solid white;"></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <br>
        <div class="row">
            <table class="table " style="width: 100%;">
                <thead>
                    <tr>
                        <td style=" padding:10px">Produk</td>
                        <td style="padding:10px">Deskripsi</td>
                        <td style="text-align:center; padding:10px">Kuantitas</td>
                        <td style="text-align:center; padding:10px">Harga(Rp.)</td>
                        <td style="text-align:center; padding:10px">Diskon</td>
                        <td style="text-align:center; padding:10px">Pajak</td>
                        <td style="text-align:right; padding:10px">Jumlah (Rp.)</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data->invoice_details as $p)
                    <tr>
                        <td style="padding:10px">{{ $p->item }}</td>
                        <td style="padding:10px">{{ $p->description }}</td>
                        <td style="padding:10px; text-align:center;">{{ $p->quantity }}</td>
                        <td style="padding:10px; text-align:center;">{{ rupiah($p->price) }}</td>
                        <td style="padding:10px; text-align:center;">{{ $p->discount }}</td>
                        <td style="padding:10px; text-align:center;">{{ $p->tax_id }}</td>
                        <td style="padding:10px;text-align:right;">{{ rupiah($p->total_price) }}</td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <td class="text-right" colspan="4" style="padding:10px"><b>Total :</b>
                        </td>
                        <td style="padding:10px;text-align:right"><b>{{ rupiah($data->grand_total) }}</b></td>
                    </tr>

                </tfoot>
            </table>
            <p>Jatuh Tempo Tgl : {{ date('d F Y', strtotime($data->invoice_due_date)) }}</p>

        </div>

        <div class="row">
            <table style="vertical-align: top; border-color: white; width:100%">
                <tr>
                    <td>
                        <div style="border: 1px solid black; height : 155px; padding:10px; width:300px;">
                        </div>
                    </td>
                    <td>
                    </td>
                </tr>
            </table>
        </div>

        <div class="row mt-4 text-center" style="font-size: 12px;">
            <center>
                <p>

                    <b><strong>GRAHA SURVEYOR INDONESIA</strong>, Basement
                        2,
                        Jl. Jenderal
                        Gatot
                        Subroto Kav. 56 Jakarta 12950 Indonesia
                        Telephone: (021) 5265388, 5265393, 5265114 Fax:
                        (021)
                        5265239</b>
                </p>
            </center>
        </div>
    </div>



</body>

</html>