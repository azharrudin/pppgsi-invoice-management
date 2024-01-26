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

        .container {
            max-width: 21cm;
            margin: 0 auto;
            background: #fff;
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

        .ta td {
            border: 1px solid black;
            border-collapse: collapse;
        }
    </style>
</head>

<body>
    <div class="container" id="printContent">
        <header>
            <img src="{{ public_path('assets/img/header 1.png') }}" alt="kop surat" width="100%">
        </header>

        <div class="row mt-3">
            <table class="table" style="width:100%;">
                <tr>
                    <td style="width: 60px;">No</td>
                    <td>:</td>
                    <td></td>
                </tr>
                <tr>
                    <td>Tanggal</td>
                    <td>:</td>
                    <td></td>
                </tr>
                <tr>
                    <td>Perihal</td>
                    <td>:</td>
                    <td></td>
                </tr>
            </table>
        </div>

        <div class="row mt-3">
            <table class="table" style="width:100%;">
                <tr>
                    <td>Kepada Yt :</td>
                </tr>
                <tr>
                    <td style="font-weight: bold;">PT. Berca Shidler Lifts</td>
                </tr>
                <tr>
                    <td>Menara Rajawali </td>
                </tr>
                <tr>
                    <td>Jl. Mega Kuningan Lot. 51 Kawasan Mega Kuningan Jakarta 12950, Indonesia</td>
                </tr>
                <tr>
                    <td>Telp (62-21) 57572199</td>
                </tr>
                <tr>
                    <td>Fax (62-21) 57572199</td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td style="font-weight: bold;">Up Bpk Priyo Anggodo Satoro</td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td>Dengan Hormat,</td>
                </tr>
                <tr>
                    <td>Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus consequatur quo maiores amet, iste, necessitatibus repudiandae et quaerat suscipit illo aperiam laborum esse aliquid aut. Nihil optio quam voluptates vero.</td>
                </tr>
            </table>
        </div>

        <div class="row mt-3">
            <table class="ta " style="width: 100%;">
                <thead>
                    <tr>
                        <td style="text-align:center; padding:10px;border: 0.5px solid black;">No</td>
                        <td style="text-align:center; padding:10px;border: 0.5px solid black;">NAMA BARANG</td>
                        <td style="text-align:center; padding:10px;border: 0.5px solid black;">SPESIFIKASI</td>
                        <td style="text-align:center; padding:10px;border: 0.5px solid black;">QTY</td>
                        <td style="text-align:center; padding:10px;border: 0.5px solid black;">SAT</td>
                        <td style="text-align:center; padding:10px;border: 0.5px solid black;">HARGA / SAT Rp.</td>
                        <td style="text-align:center; padding:10px;border: 0.5px solid black;">JUMLAH Rp.</td>
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
                    <tr>
                        <td colspan="6" style="border: 0.5px solid black; padding:10px;" class="text-center">Sub Total</td>
                        <td style="border: 0.5px solid black; padding:10px;" class="text-center"></td>
                    </tr>
                    <tr>
                        <td colspan="6" style="border: 0.5px solid black; padding:10px;" class="text-center">PPN 10%</td>
                        <td style="border: 0.5px solid black; padding:10px;" class="text-center"></td>
                    </tr>
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="6" style="border: 0.5px solid black; padding:10px; font-weight:bold;">Jumlah Net</td>
                        <td style="border: 0.5px solid black; padding:10px;" class="text-center"></td>
                    </tr>
                    <tr>
                        <td colspan="6" style="border: 0.5px solid black; padding:10px; font-weight:bold;">Terbilang</td>
                        <td style="border: 0.5px solid black; padding:10px;" class="text-center"></td>
                    </tr>
                </tfoot>
            </table>
        </div>

        <div class="row mt-3">
            <table style="width: 100%;">
                <tr>
                    <td>Lorem ipsum dolor sit amet consectetur adipisicing elit. Et sint necessitatibus nisi ea assumenda mollitia. Voluptatibus iure nulla quam ex sunt impedit, molestias aperiam, amet nobis enim eius sed deleniti!
                        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Neque, natus quo ex illum sapiente voluptatum facere maxime provident minima necessitatibus at ea quaerat earum quidem sint inventore. Sequi, ipsam sed.
                    </td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td>Demikian surat pemesanan (PO) ini kami sampaikan, atas perhatian dan kerjasamanya diucapkan terimakasih.</td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td>Hormat Kami</td>
                </tr>
                <tr>
                    <td>PPP Graha Surveyor Indonesia</td>
                </tr>
            </table>
        </div>
    </div>
</body>

</html>