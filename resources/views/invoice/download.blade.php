@php
function tgl_indo($tanggal){
$bulan = array (
1 => 'Januari',
'Februari',
'Maret',
'April',
'Mei',
'Juni',
'Juli',
'Agustus',
'September',
'Oktober',
'November',
'Desember'
);
$pecahkan = explode('-', $tanggal);

// variabel pecahkan 0 = tanggal
// variabel pecahkan 1 = bulan
// variabel pecahkan 2 = tahun

return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
}

function rupiah($angka){

$hasil_rupiah = "Rp " . number_format($angka,2,',','.');
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

        <div class="row mt-4">
            <table class="table">
                <tbody>
                    <tr>
                        <td rowspan="3" style="border: none; width: 100px;"><b>Kepada
                                Yth:
                            </b></td>
                        <td rowspan="3" style="border: 0.5px solid black;"><b>
                                {{$data->tenant->company}} <br>
                                {{$data->tenant->floor}} <br>
                                <br>
                                Up. {{$data->tenant->name}}</b></td>
                        <td style="width: 120px; border: none;"></td>
                        <td style="border: 0.5px solid black;">No. Invoice:
                            <br>{{$data->invoice_number}}
                        </td>
                        <td style="border: 0.5px solid black;">Tanggal: <br>
                            {{tgl_indo($data->invoice_date)}}
                        </td>
                    </tr>
                    <tr>

                        <td style="width: 120px; border: none;"></td>
                        <td style="border: 0.5px solid black;">No. Kontrak:
                            <br> {{$data->contract_number}}
                        </td>
                        <td style="border: 0.5px solid black;">Tanggal: <br> {{tgl_indo($data->contract_date)}}
                        </td>
                    </tr>
                    <tr>

                        <td style="width: 120px; border: none;"></td>
                        <td style="border: 0.5px solid black;">No. Addendum:
                            <br> {{$data->addendum_number}}
                        </td>
                        <td style="border: 0.5px solid black;">Tanggal: <br>{{tgl_indo($data->addendum_date)}}
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
                    @foreach($data->invoice_details as $p)
                    <tr>
                        <td>{{$p->item}}</td>
                        <td>{{$p->description}}</td>
                        <td>{{rupiah($p->price)}}</td>
                        <td>{{$p->tax->rate}}%</td>
                        <td>{{rupiah($p->total_price)}}</td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <td class="text-right" colspan="4"><b>Total :</b>
                        </td>
                        <td>{{rupiah($data->grand_total)}}</td>
                    </tr>
                    <tr>
                        <td colspan="5"><b>Terbilang: {{$data->grand_total_spelled}}</b></td>
                    </tr>
                </tfoot>
            </table>
            <p>Jatuh Tempo Tgl : {{tgl_indo($data->invoice_due_date)}}</p><br>
            <p>Keterangan : {{$data->term_and_conditions}}</p><br>
            <p></p>
        </div>
        <div class="row">
            <div class="col-4" style="border: 1px solid black;">
                Pembayaran dengan Cek/Bilyet/Transfer atas nama: <br />
                {{$data->bank->account_name}} <br />
                {{$data->bank->name}} <br />
                CABANG {{$data->bank->branch_name}} <br />
                Account No. : {{$data->bank->account_number}}
            </div>
            <div class="col-4"></div>
            <div class="col-4">
                <br>
                <br>
                <div class="ttd" style="width: max-content; float: right;">

                    <p style="display: block; text-align: center; padding: 0; margin: 0;">Jakarta, {{tgl_indo($data->materai_date)}}<br>
                        <img src="{{$data->materai_image}}" alt="">
                    <p class="text-center">
                        <u>{{$data->materai_name}}</u></b><br><span>Ka.
                            BM</span>
                    </p>
                    </p>

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