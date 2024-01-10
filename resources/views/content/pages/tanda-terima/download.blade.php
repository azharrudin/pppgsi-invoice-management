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
    <title>Surat Pesan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://rawgit.com/eKoopmans/html2pdf/master/dist/html2pdf.bundle.js"></script>

    <style>
        body {
            font-size: 10px;

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
                font-size: 10px;
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
            <img src="https://pppgsi.com/assets/img/header.png" alt="kop surat" width="100%">
        </header>

        <div class="row" style="float: right;">
            <div class="p-2" style="width: 100px; border: 1px solid black;">No . {{$data->receipt_number}}</div>
        </div>
        <div style="clear: both;"></div>

        <div class="row">
            <center><b>TANDA TERIMA PEMBAYARAN</b></center>
        </div>

        <p style="margin: 0px;">Telah terima Pembayaran tunai/Cek/Giro</p>
        <div class="row" style="width: 250px;">
            <table class="table mt-2" style="width:100%">
                <tbody>
                    <tr>
                        <td>No. Cek/Giro</td>
                        <td>:</td>
                        <td>{{$data->check_number}}</td>
                        <td>Nama</td>
                        <td>:</td>
                        <td>{{$data->check_number}}</td>
                    </tr>
                    <tr>
                        <td>Bank</td>
                        <td colspan="2"></td>
                        <td>Alamat</td>
                        <td>:</td>
                        <td></td>
                    </tr>
                    <tr class="mt-1">
                        <td>{{rupiah($data->grand_total)}}</td>
                        <td colspan="2"> </td>
                        <td>Telepon</td>
                        <td>:</td>
                        <td>{{$data->tenant->phone}}</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="row">
            <div class="col-4">
                <div style="border: 1px solid black;" class="p-2">
                    Iuaran Singking Fund Periode <br />
                    01 Juni 2023 s/d 30 Juno 2023 <br>
                    Invoice No. :
                </div>
                <p>
                    Apabila dibayar dengan cek/Biyet giro, Pembayaran baru
                    dianggap sah apabila telah dapat dicairkan di Bank kami.
                </p>

            </div>
            <div class="col-4"></div>
            <div class="col-4">
                <br>
                <br>
                <div class="ttd" style="width: max-content; float: right;">

                    <p style="display: block; text-align: center; padding: 0; margin: 0;">Jakarta,

                        <img src="" alt="">
                    <p class="text-center">
                        <u></u></b><br><span>Building Manager</span>
                    </p>
                    </p>

                </div>
            </div>
            <div style="clear: both;"></div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <script>
        function downloadPDF(elementId) {
            var element = document.getElementById(elementId);

            var options = {
                margin: 0,
                filename: 'surat.pdf',
                image: {
                    type: 'jpeg',
                    quality: 2
                },
                html2canvas: {
                    scale: 3
                },
                jsPDF: {
                    unit: 'mm',
                    format: 'a4',
                    orientation: 'portrait'
                }
            };

            html2pdf(element, options);
        }
    </script>
</body>

</html>