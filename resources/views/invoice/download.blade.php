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

        <div class="row mt-4">
            <table class="table">
                <tbody>
                    <tr>
                        <td rowspan="3" style="border: none; width: 100px;"><b>Kepada
                                Yth:
                            </b></td>
                        <td rowspan="3" style="border: 0.5px solid black;"><b>PT. Focus
                                Media
                                Indonesia The Capitol
                                Building Lt 1
                                Jl. Letjen S. Parman Kav. 73 Slipi Jakarta
                                Barat
                                <br><br>
                                Up. Bp. Chrissandy Dave Winata</b></td>
                        <td style="width: 120px; border: none;"></td>
                        <td style="border: 0.5px solid black;">No. Invoice:
                            <br>{{$data->invoice_number}}
                        </td>
                        <td style="border: 0.5px solid black;">Tanggal: <br>
                            {{$data->invoice_date}}
                        </td>
                    </tr>
                    <tr>

                        <td style="width: 120px; border: none;"></td>
                        <td style="border: 0.5px solid black;">No. Kontrak:
                            <br> {{$data->contract_number}}
                        </td>
                        <td style="border: 0.5px solid black;">Tanggal: <br> {{$data->contract_date}}
                        </td>
                    </tr>
                    <tr>

                        <td style="width: 120px; border: none;"></td>
                        <td style="border: 0.5px solid black;">No. Addendum:
                            <br> {{$data->addendum_number}}
                        </td>
                        <td style="border: 0.5px solid black;">Tanggal: <br>{{$data->addendum_date}}
                        </td> 
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="row">
            <table class="table main-table">
                <thead>
                    <tr>
                        <th>URAIAN</th>
                        <th>Keterangan</th>
                        <th>Dasar Pengenaan Pajak</th>
                        <th>Pajak</th>
                        <th>TOTAL (Rp.)</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Sewa Penempatan Perangkat LED</td>
                        <td>Periode: 01 Maret 2021 s/d 31 Maret 2021</td>
                        <td>9.200.181</td>
                        <td>1.012.019.91</td>
                        <td>10.212.201</td>
                    </tr>
                    <tr>
                        <td>Biaya Material</td>
                        <td></td>
                        <td>10.000</td>
                        <td>0</td>
                        <td>1.022.020</td>
                    </tr>
                </tbody>
                <tfoot>
                    <tr>
                        <td class="text-right" colspan="4"><b>Total :</b>
                        </td>
                        <td>{{$data->grand_total}}</td>
                    </tr>
                    <tr>
                        <td colspan="5"><b>Terbilang: {{$data->grand_total_spelled}}</b></td>
                    </tr>
                </tfoot>
            </table>
            <p>Jatuh Tempo Tgl : {{$data->invoice_due_date}}</p><br>
            <p>Keterangan : {{$data->term_and_conditions}}</p><br>
            <p></p>
        </div>
        <div class="row">
            <div class="col-4" style="border: 1px solid black;">
                Pembayaran dengan Cek/Bilyet/Transfer atas nama:
                PPPGSI
                BANK MANDIRI
                CABANG JAKARTA KRAKATAU STEEL Account No.: 070-000.713846-9
            </div>
            <div class="col-4"></div>
            <div class="col-4">

                <div class="ttd" style="width: max-content; float: right;">

                    <p style="display: block; text-align: center; padding: 0; margin: 0;">Jakarta,
                        7 September 2023<br><br><br><br><br><b><u>Zulfikar
                                A.
                                R.</u></b><br><span>Ka.
                            BM</span></p>
                </div>
            </div>
            <div style="clear: both;"></div>
        </div>
        <div class="row mt-4 text-center">

            <p>

                <b><strong>GRAHA SURVEYOR INDONESIA</strong>, Basement 2,
                    Jl. Jenderal
                    Gatot
                    Subroto Kav. 56 Jakarta 12950 Indonesia
                    Telephone: (021) 5265388, 5265393, 5265114 Fax: (021)
                    5265239</b>
            </p>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
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