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
            font-size: 12px;

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

        .table-1 td {
            border: 1px solid black;
            border-collapse: collapse;
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
        <div style="clear: both;"></div>

        <div class="row" style="margin-top: 25px;">
            <h1>
                <center><b><u>
                            <h5>MATERIAL REQUEST</h5>
                        </u></b></center>
            </h1>
            <h1>
                <center><b>
                        <h5>PERMINTAAN MATERIAL</h5>
                    </b></center>
            </h1>
            <br>
        </div>

        <div class="row mt-1">
            <table class="table" style="width:100%;">
                <tbody>
                    <tr>
                        <td style="border-top: 0.5px solid black;border-left: 0.5px solid black;border-right: 0.5px solid black;"><b>REQUESTER</b></td>
                        <td style="width:10%"></td>
                        <td style="border-top: 0.5px solid black;border-right: 0.5px solid black;border-left: 0.5px solid black;"><b>MR . No</b></td>
                    </tr>
                    <tr>
                        <td style="border-bottom: 0.5px solid black;border-left: 0.5px solid black;border-right: 0.5px solid black;">Yang Meminta</td>
                        <td></td>
                        <td style="border-bottom: 0.5px solid black;border-right: 0.5px solid black;border-left: 0.5px solid black;">Nomor MR</td>
                    </tr>
                    <tr>
                        <td style="border-top: 0.5px solid black;border-left: 0.5px solid black;border-right: 0.5px solid black;"><b>DEPARTMENT</b></td>
                        <td></td>
                        <td style="border-top: 0.5px solid black;border-right: 0.5px solid black;border-left: 0.5px solid black;"><b>DATE</b></td>
                    </tr>
                    <tr>
                        <td style="border-bottom: 0.5px solid black;border-left: 0.5px solid black;border-right: 0.5px solid black;">Departmen</td>
                        <td></td>
                        <td style="border-bottom: 0.5px solid black;border-right: 0.5px solid black;border-left: 0.5px solid black;">Tanggal</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="row">
            <table>
                <tbody>
                    <tr>
                        <td></td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="row">
            <table class="table-1">
                <tbody>
                    <tr>
                        <td>
                            <center>No</center>
                        </td>
                        <td>
                            <center>JENIS MASALAH KERUSAKAN</center>
                        </td>
                        <td>
                            <center>LOKASI</center>
                        </td>
                        <td>
                            <center>JUMLAH</center>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="row mt-3">
            <table>
                <tr>
                    <td>
                        <center>
                            <p>Mengetahui</p>
                            <p style="display: block; text-align: center; padding: 0; margin: 0;">Jakarta,
                                {{-- $data->receipt_date ? date('d F Y', strtotime($data->receipt_date)) : '' --}}<br>
                                <img src="{{-- $data->signature_image --}}" alt="">
                            <p class="text-center">
                                <u></u></b><br><span>Marwoto{{-- $data->signature_name --}}</span>
                            </p>
                            </p>
                        </center>
                    </td>
                    <td>
                        <center>
                            <p>Mengetahui</p>
                            <p style="display: block; text-align: center; padding: 0; margin: 0;">Jakarta,
                                {{-- $data->receipt_date ? date('d F Y', strtotime($data->receipt_date)) : '' --}}<br>
                                <img src="{{-- $data->signature_image --}}" alt="">
                            <p class="text-center">
                                <u></u></b><br><span>Marwoto{{-- $data->signature_name --}}</span>
                            </p>
                            </p>
                        </center>
                    </td>
                    <td>
                        <center>
                            <p>Mengetahui</p>
                            <p style="display: block; text-align: center; padding: 0; margin: 0;">Jakarta,
                                {{-- $data->receipt_date ? date('d F Y', strtotime($data->receipt_date)) : '' --}}<br>
                                <img src="{{-- $data->signature_image --}}" alt="">
                            <p class="text-center">
                                <u></u></b><br><span>Marwoto{{-- $data->signature_name --}}</span>
                            </p>
                            </p>
                        </center>
                    </td>
                </tr>
            </table>
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