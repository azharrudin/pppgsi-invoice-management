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
        @page {
            margin: 10px;
        }

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

        .horizontal_line {
            margin-top: 10px;
            width: 100%;
            height: 5px;
            border-top: 2px solid #84919E;
            line-height: 80%;
        }
    </style>
</head>

<body>
    <div class="container" id="printContent" style="padding: 0px">
        <header>
            <div class="row">
                <table class="table" style="width: 95%">
                    <tbody>
                        <tr>
                            <td colspan="3" style="width: 45%;"><img src="{{public_path('assets/img/header-img.jpg')}}" alt="Kop" width="60%"></td>
                            <td colspan="1" style="width: 10%;"></td>
                            <td colspan="3" style="width: 45%; vertical-align:middle">
                                <table style="text-align:right; width : 100%">
                                    <tr>
                                        <td colspan="3" style="font-size: 24px; color : #336699;">Invoice</td>
                                    </tr>
                                    <tr>
                                        <td colspan="3" style="height: 10px;"></td>
                                    </tr>
                                    <tr>
                                        <td style="width:45%;">Referensi</td>
                                        <td style="width:10%;"></td>
                                        <td style="width:45%;">INV/08/12/0029</td>
                                    </tr>
                                    <tr>
                                        <td style="width:45%;">Tanggal</td>
                                        <td style="width:10%;"></td>
                                        <td style="width:45%;">07/03/2024</td>
                                    </tr>
                                    <tr>
                                        <td style="width:45%;">Tgl. Jatuh Tempo</td>
                                        <td style="width:10%;"></td>
                                        <td style="width:45%;">07/03/2024</td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </header>

        <div class="row">
            <table style="width: 100%;">
                <tr>
                    <td colspan="3" style="width: 40%;">Info Perusahaan</td>
                    <td colspan="1" style="width: 20%;"></td>
                    <td colspan="3" style="width: 40%;">Tagihan Untuk</td>
                </tr>
                <tr>
                    <td colspan="3">
                        <div class="horizontal_line"></div>
                    </td>
                    <td colspan="1"></td>
                    <td colspan="3">
                        <div class="horizontal_line"></div>
                    </td>
                </tr>
                <tr>
                    <td colspan="3">
                        <div class="" style="margin-top: 10px;"><b>Dooha</b></div>
                    </td>
                    <td colspan="1"></td>
                    <td colspan="3">
                        <div class="" style="margin-top: 10px;"><b> {{ $data->tenant->name ?? '' }}</b></div>
                    </td>
                </tr>
                <tr>
                    <td colspan="3">
                        <div class="" style="margin-top: 20px;">Telp :</div>
                    </td>
                    <td colspan="1"></td>
                    <td colspan="3">
                        <div class="" style="margin-top: 20px;">Telp : {{ $data->tenant->name ?? '' }}</div>
                    </td>
                </tr>
                <tr>
                    <td colspan="3">
                        <div class="">Email :</div>
                    </td>
                    <td colspan="1"></td>
                    <td colspan="3">
                        <div class=""></div>
                    </td>
                </tr>
            </table>
        </div>

        <br>
        <div class="row">
            <table class="table mt-5" style="width: 100%;">
                <thead style="background-color: #2E3E4E; color : white" class="text-white">
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
                        <td colspan="7"> </td>
                    </tr>
                    <tr>
                        <td colspan="7"> <br></td>
                    </tr>
                    <tr>
                        <td colspan="4"></td>
                        <td><b>Subtotal :</b>
                        </td>
                        <td style="padding:10px;text-align:right" colspan="2"><b>{{ rupiah($data->grand_total) }}</b></td>
                    </tr>
                    <tr>
                        <td colspan="4"></td>
                        <td><b>Pajak :</b>
                        </td>
                        <td style="padding:10px;text-align:right" colspan="2"><b>{{ rupiah($data->grand_total) }}</b></td>
                    </tr>
                    <tr>
                        <td colspan="4"></td>
                        <td><b>Total :</b>
                        </td>
                        <td style="padding:10px;text-align:right" colspan="2"><b>{{ rupiah($data->grand_total) }}</b></td>
                    </tr>
                    <tr>
                        <td colspan="4"></td>
                        <td><b>Sisa Tagihan: :</b>
                        </td>
                        <td style="padding:10px;text-align:right" colspan="2"><b>{{ rupiah($data->grand_total) }}</b></td>
                    </tr>
                </tfoot>
            </table>
        </div>

        <div class="row mt-3">
            <table class="table mt-5" style="width: 100%;">
                <tr>
                    <td style="width: 50%;">&nbsp;</td>
                    <td style="width: 20%;">&nbsp;</td>
                    <td><b> 7 Mar, 2024</b></td>
                </tr>
                <tr>
                    <td style="width: 50%;">&nbsp;</td>
                    <td><img src="{{public_path('assets/img/materai-1000.png')}}" alt="Kop" width="150px"></td>
                    <td><img src="{{public_path('assets/img/materai-1000.png')}}" alt="Kop" width="150px"></td>
                </tr>
            </table>
        </div>
    </div>
</body>

</html>