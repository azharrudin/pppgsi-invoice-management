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
    <title>Purchase Request</title>
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
            <img src="{{ public_path('assets/img/header.png') }}" alt="kop surat" width="100%">
        </header>
        <div class="row" style="margin-top: 25px;">
            <h1>
                <center><b><u>
                            <h5>PURCHASE REQUEST</h5>
                        </u></b></center>
            </h1>
            <h1>
                <center><b>
                        <h6 style="line-height: 0.1;">PERMINTAAN PEMEBELIAN</h6>
                    </b></center>
            </h1>
            <br>
        </div>

        <div class="row mt-1">
            <table style="width: 100%;">
                <tr>
                    <td style="border: 0.5px solid black; padding:10px;">Yang Meminta :</td>
                    <td style="border: 0.5px solid black; padding:10px;">Nomor PR :</td>
                    <td style="border: 0.5px solid black; padding:10px;">Tanggal :</td>
                </tr>
                <tr>
                    <td style="border: 0.5px solid black; padding:10px;">Departmen :</td>
                    <td style="border: 0.5px solid black; padding:10px;">Nomor MR :</td>
                    <td style="border: 0.5px solid black; padding:10px;">Tanggal :</td>
                </tr>
            </table>
        </div>
        <div class="row mt-3">
            <table style="width: 100%;">
                <tr>
                    <td style="padding : 10px" class="py-1">
                        <div class="">
                            <input type="checkbox" style="margin-right: 10px;" id="vehicle1" name="vehicle1" value="Bike">
                            <label for="vehicle1">Sesuai Budget</label><br>
                        </div>
                    </td>
                    <td style="padding : 10px" class="py-1">
                        <div class="">
                            <input type="checkbox" style="margin-right: 10px;" id="vehicle1" name="vehicle1" value="Bike">
                            <label for="vehicle1">Diluar Budget</label><br>
                        </div>
                    </td>
                    <td style="padding : 10px" class="py-1">
                        <div class="">
                            <input type="checkbox" style="margin-right: 10px;" id="vehicle1" name="vehicle1" value="Bike">
                            <label for="vehicle1">Penting</label><br>
                        </div>
                    </td>
                </tr>
            </table>
        </div>
        <div class="row mt-3">
            <table style="width: 100%;">
                <tr>
                    <td style="width: 110px;border: 0.5px solid black; padding:10px;">Jumlah Anggaran :</td>
                    <td style="width: 110px;border: 0.5px solid black; padding:10px;">Rp.</td>
                    <td style="width: 10px;" rowspan="3"></td>
                    <td style="border: 0.5px solid black; padding:10px; vertical-align: top;" rowspan="3">Penjelasan untuk pembelian diluar anggaran</td>
                    <td style="width: 10px;" rowspan="3"></td>
                    <td rowspan="3">
                        <div class="">
                            <input type="checkbox" style="margin-right: 5px;" id="vehicle1" name="vehicle1" value="Bike">
                            <label for="vehicle1">1 minggu</label><br>
                        </div>
                        <div class="">
                            <input type="checkbox" style="margin-right: 5px;" id="vehicle1" name="vehicle1" value="Bike">
                            <label for="vehicle1">1 bulan</label><br>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td style="width: 110px;border: 0.5px solid black; padding:10px;">Usulan Pembelian :</td>
                    <td style="width: 110px;border: 0.5px solid black; padding:10px;">Rp.</td>
                </tr>
                <tr>
                    <td style="width: 110px;border: 0.5px solid black; padding:10px;">Sisa Anggaran :</td>
                    <td style="width: 110px;border: 0.5px solid black; padding:10px;">Rp.</td>
                </tr>
            </table>
        </div>
        <div class="row mt-3">
            <table style="width: 100%;">
                <thead>
                    <tr>
                        <td rowspan="2" style="border: 0.5px solid black; text-align:center; padding:10px;">
                            No
                        </td>
                        <td rowspan="2" style="border: 0.5px solid black; text-align:center; padding:10px">
                           Suku Cadang
                        </td>
                        <td colspan="3" style="border: 0.5px solid black; text-align:center; padding:10px">Pemebelian Terakhir</td>
                        <td rowspan="2" style="border: 0.5px solid black; text-align:center; padding:10px">
                            Keterangan
                        </td>
                        <td rowspan="2" style="border: 0.5px solid black; text-align:center; padding:10px">
                            Kuantitas
                        </td>
                    </tr>
                    <tr>
                        <td style="border: 0.5px solid black; text-align:center; padding:10px">Tanggal</td>
                        <td style="border: 0.5px solid black; text-align:center; padding:10px">Kuantitas</td>
                        <td style="border: 0.5px solid black; text-align:center; padding:10px">Persediaan</td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td style="border: 0.5px solid black; padding:10px;" class="text-center">a</td>
                        <td style="border: 0.5px solid black;"></td>
                        <td style="border: 0.5px solid black;"></td>
                        <td style="border: 0.5px solid black;"></td>
                        <td style="border: 0.5px solid black;"></td>
                        <td style="border: 0.5px solid black;"></td>
                        <td style="border: 0.5px solid black;"></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="row mt-3">
            <table style="width: 100%;">
                <tr>
                    <td style="border: 0.5px solid black;">Diproses Oleh :</td>
                    <td style="border: 0.5px solid black;">Diperiksa Oleh :</td>
                    <td style="border: 0.5px solid black;">Diketahui Oleh :</td>
                </tr>
                <tr>
                    <td style="border: 0.5px solid black;"></td>
                    <td style="border: 0.5px solid black;"></td>
                    <td style="border: 0.5px solid black;"></td>
                </tr>
                <tr class="text-center">
                    <td style="border: 0.5px solid black;">()</td>
                    <td style="border: 0.5px solid black;">()</td>
                    <td style="border: 0.5px solid black;">()</td>
                </tr>
            </table>
        </div>

        <div class="row mt-3">
            <table class="table">
                <tr>
                    <td style="width: 80px;">Lembar ke 1 : </td>
                    <td>Adminstrasi </td>
                </tr>
                <tr>
                    <td>Lembar ke 2 : </td>
                    <td>Gudang </td>
                </tr>
               
            </table>
        </div>
    </div>
</body>

</html>