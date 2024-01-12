@php
$data = new \stdClass(); // Creating an empty stdClass object, you may replace it with your actual data structure.

// Assigning some sample values for demonstration purposes.
$data->tenant = new \stdClass();
$data->tenant->company = 'ABC Company';
$data->tenant->floor = '10th Floor';
$data->tenant->name = 'John Doe';

$data->invoice_number = 'INV001';
$data->invoice_date = '2024-01-12';

// Add more data as needed...

// Sample invoice details
$data->invoice_details = [
(object)['item' => 'Product A', 'description' => 'Description A', 'price' => 100, 'tax' => (object)['rate' => 10], 'total_price' => 110],
(object)['item' => 'Product B', 'description' => 'Description B', 'price' => 150, 'tax' => (object)['rate' => 10], 'total_price' => 165],
];

$data->grand_total = 275;
$data->grand_total_spelled = 'Two hundred seventy-five dollars';
$data->invoice_due_date = '2024-02-01';
$data->term_and_conditions = 'Payment should be made by the due date.';

// Add bank information
$data->bank = new \stdClass();
$data->bank->account_name = 'ABC Company';
$data->bank->name = 'Bank ABC';
$data->bank->branch_name = 'Jakarta Branch';
$data->bank->account_number = '123456789';

// Add materai information
$data->materai_date = '2024-01-12';
$data->materai_image = 'path/to/materai_image.png';
$data->materai_name = 'John Doe';

@endphp
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Invoice</title>
    <!-- Bootstrap CSS -->
    <link href="{{asset('bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Bootstrap Bundle with Popper -->
    <script src="{{asset('bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <style>
        .main-table,
        .main-table th,
        .main-table td {
            border: 0.5px solid;
        }
    </style>
</head>

<body>
    <div class="container" id="printContent">
        <header>
            <img src="kop.jpg" alt="kop surat" width="100%">
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
                            <br>GSI-FIN/IX/23/1629
                        </td>
                        <td style="border: 0.5px solid black;">Tanggal: <br>
                            07/09/2023</td>
                    </tr>
                    <tr>

                        <td style="width: 120px; border: none;"></td>
                        <td style="border: 0.5px solid black;">No. Kontrak:
                            <br>
                        </td>
                        <td style="border: 0.5px solid black;">Tanggal: <br>
                        </td>
                    </tr>
                    <tr>

                        <td style="width: 120px; border: none;"></td>
                        <td style="border: 0.5px solid black;">No. Addendum:
                            <br>
                        </td>
                        <td style="border: 0.5px solid black;">Tanggal: <br>
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
                        <td>10.222.201</td>
                    </tr>
                    <tr>
                        <td colspan="5"><b>Terbilang: Sepuluh juta dua
                                ratus
                                dua puluh dua ribu dua ratus satu</b></td>

                    </tr>
                </tfoot>
            </table>
            <p>Jatuh Tempo Tgl : 21/09/2023</p><br>
            <p>Keterangan : </p><br>
            <p>Jika telah melakukan pembayaran mohon untuk konfirmasi bukti
                pembayaran melalui fax (021) 5265239 atau melalui email
                nidhaamoy@gmail.com, haqqani_ani@yahoo.com atau
                dinalestariekaputri@gmail.com.</p>
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


    {{-- <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script> --}}

</body>

</html>