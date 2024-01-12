<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Invoice</title>

    <link href="{{asset('bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">


    <script src="{{asset('bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <style>
        body {
            font-size: 10pt;

        }

        .main-table,
        .main-table th,
        .main-table td {
            border: 0.5px solid;
        }

        .main-table th {
            font-size: 12pt;
        }
    </style>
</head>

<body>
    <div class="container" id="printContent">
        <header>
            <img src="https://pppgsi.com/assets/img/header.png" alt="kop surat" width="100%">
        </header>

        <div class="row">
            <div class="col-12 d-flex justify-content-end">
                <div style="border: 0.5px solid black; width:max-content; padding: 0 5px;">No. 00722</div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <center>
                    <h3>TANDA TERIMA PEMBAYARAN</h3>
                </center>
            </div>

        </div>

        <p style="margin: 0px;">Telah terima Pembayaran tunai/Cek/Giro</p>
        <div class="row">
            <div class="col-6">
                <table>
                    <tr>
                        <td>No. Cek/Giro</td>
                        <td>&ensp;:</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Bank</td>
                        <td>&ensp;:</td>
                        <td></td>
                    </tr>
                </table>
            </div>
            <div class="col-6">
                <table>
                    <tr>
                        <td>Nama</td>
                        <td>&ensp;:</td>
                        <td>PT. ELV Engineering Indonesia</td>
                    </tr>
                    <tr>
                        <td>Alamat</td>
                        <td>&ensp;:</td>
                        <td>Gd. Graha Surveyor Indonesia LL 12 J. Gatot Subroto Kar. 56
                            Jakarta Selatan</td>
                    </tr>
                </table>
            </div>
        </div>

        <div class="row mt-2">
            <div class="col-6">
                <table>
                    <tr>
                        <td style="width: 100px;"> Rp.</td>
                        <td>
                            <h4>3.395.000,-</h4>
                        </td>
                    </tr>
                </table>

            </div>
            <div class="col-6">
                <table>
                    <tr>
                        <td>Telp. </td>
                        <td>:</td>
                    </tr>
                </table>
            </div>
            <div class="col-12 mt-2">
                Terbilang &emsp; <h4>Tiga juta tiga ratus sembilan puluh lima rupiah</h4>
            </div>
        </div>


        <div class="row mt-4">
            <div class="col-6">
                <div style="border: 1px solid black;" class="p-2">
                    Juran Sinking Fund Perfode 01 Juni 2023 d 30 Juni 2023 Inv. No. 0890/GST-FIN/VI/23
                </div>
                <p>
                    Apabila dibayar dengan cek/Biyet giro, Pembayaran baru
                    dianggap sah apabila telah dapat dicairkan di Bank kami.
                </p>

            </div>

            <div class="col-6">

                <div class="ttd" style="width: max-content; float: right;">

                    <p style="display: block; text-align: center; padding: 0; margin: 0;">Jakarta, 12 Januari 2024
                        <br><br><br><br>
                        <img src="" alt="">

                    </p>

                </div>
            </div>
            <div style="clear: both;"></div>
        </div>
    </div>



</body>

</html>