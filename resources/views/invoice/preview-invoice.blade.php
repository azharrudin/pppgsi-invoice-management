@php
    $configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Invoice')

@section('page-style')

    <style>
        .select2-selection {
            height: 150px;
        }
    </style>

@endsection

@section('content')
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">

        <div class="row invoice-add">
            <!-- Invoice Add-->
            <div class="col-lg-9 col-12 mb-lg-0 mb-3">
                <div class="card invoice-preview-card">
                    <div class="card-body">
                        <div
                            style="background-image: url('{{ asset('assets/img/header.png') }}'); height : 150px; background-size: contain; background-repeat: no-repeat;">
                        </div>

                        <div class="row m-sm-2 m-0 px-3">
                            <div class="row col-md-7 mb-md-0 ps-0">
                                {{-- Greeting --}}
                                <div class="row px-3 d-flex align-items-start mb-3">
                                    <div class="d-flex align-items-center justify-content-between col-3">
                                        <label for="select2Primary">Kepada Yth,</label>
                                    </div>
                                    <div class="col-8 fw-medium">
                                        <p class="w-px-250 h-px-150">
                                            PT. Focus Media Indonesia
                                            The Capitil Building Lt.1
                                            Jl. Letjen S. Parman Kav. 73 Slipi
                                            Jakarta Barat
                                            <br><br>
                                            Up. Bp. Chrissandy Dave Winata
                                        </p>
                                    </div>
                                </div>
                            </div>
                            {{-- Informasi Invoice, Kontrak --}}
                            <div class="col-md-5">
                                <dd class="d-flex justify-content-md-end flex-wrap pe-0 ps-0 ps-sm-2">
                                    <div class="mb-3 mx-2">
                                        <label for="note" class="form-label fw-medium">No. Invoice</label>
                                        <input type="text" class="form-control w-px-150 " placeholder=""
                                            value="GSI/FIN/IX/23/1629" disabled />
                                    </div>
                                    <div class="mb-3 mx-2">
                                        <label for="note" class="form-label fw-medium">Tgl. Invoice</label>
                                        <input type="text" class="form-control w-px-150 " placeholder="" />
                                    </div>
                                    <div class="mb-3 mx-2">
                                        <label for="note" class="form-label fw-medium">No. Kontrak</label>
                                        <input type="text" class="form-control w-px-150 " placeholder="" />
                                    </div>
                                    <div class="mb-3 mx-2">
                                        <label for="note" class="form-label fw-medium">Tanggal</label>
                                        <input type="text" class="form-control w-px-150 " placeholder="" />
                                    </div>
                                    <div class="mb-3 mx-2">
                                        <label for="note" class="form-label fw-medium">No. Addendum</label>
                                        <input type="text" class="form-control w-px-150 " placeholder="" />
                                    </div>
                                    <div class="mb-3 mx-2">
                                        <label for="note" class="form-label fw-medium">Tanggal</label>
                                        <input type="text" class="form-control w-px-150 " placeholder="" />
                                    </div>
                                </dd>
                            </div>
                        </div>

                        {{-- Table --}}
                        <div class="table-responsive text-nowrap">
                            <table class="table card-table">
                                <thead>
                                    <tr>
                                        <th>Uraian</th>
                                        <th>Keterangan</th>
                                        <th>Dasar Pengenaan Pajak</th>
                                        <th>Pajak</th>
                                        <th>Total (Rp.)</th>
                                    </tr>
                                </thead>
                                <tbody class="table-border-bottom-0">
                                    <tr>
                                        <td>Sewa Penempatan Perangkat LED</td>
                                        <td>Periode : 1 Maret 2021 s.d
                                            31 Maret 2021 </td>
                                        <td>9.200.181</td>
                                        <td>1.012.019</td>
                                        <td>10.212.201</td>
                                    </tr>

                                    <tr>
                                        <td>Biaya Materai</td>
                                        <td></td>
                                        <td>10.000</td>
                                        <td>0</td>
                                        <td>10.000</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        {{-- Divider --}}
                        <div class="px-5">
                            <hr class="my-3 mx-n5">
                        </div>

                        {{-- Total --}}
                        <div class="col-md-12 d-flex float-end mb-5">
                            <div class="col-6"></div>
                            <div class="col-6">
                                {{-- Total --}}
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <p>Total</p>
                                    </div>
                                    <div>
                                        <p>10.222.201</p>
                                    </div>
                                </div>
                                {{-- Divider --}}
                                <div>
                                    <hr class="m-0 mx-n7">
                                </div>
                            </div>
                        </div>

                        {{-- Terbilang & Jatuh Tempo --}}
                        <div class="col-md-12 mb-5">
                            <div class="col-md-12 mb-2">
                                <label for="note" class="form-label fw-medium">Terbilang</label>
                                <p>Sepuluh Juta Dua Ratus Ribu Dua Puluh Dua Ribu Dua Ratus satu Rupiah</p>
                                <hr class="m-0 mx-n7">
                            </div>
                            <div class="col-md-8 d-flex align-items-center">
                                <label for="note" class="form-label fw-medium me-2 mb-0">Jatuh Tempo Tanggal :</label>
                                <p class="mb-0">21/09/2023</p>
                            </div>
                        </div>

                        {{-- Syarat & ketentuan dan Bank --}}
                        <div class="row">
                            <div class="col-md-6 mb-md-0 mb-3">
                                <label for="note" class="form-label fw-medium me-2">Syarat & Ketentuan</label>
                                <p class="w-full">
                                    Jika telah melakukan pembayaran mohon untuk konfirmasi bukti
                                    pembayaran melalui fax (021) 5265239 atau melalui email
                                    nidhaamoy@gmail.com, haqqani_ani@yahoo.com atau
                                    dinalestariekaputri@gmail.com
                                </p>
                                <p>
                                    Transfer Bank : <br>
                                    PPPGSI <br>
                                    BANK MANDIRI<br>
                                    CABANG JAKARTA KRAKATAU STEEL<br>
                                    Account No. 070.000.713846-9
                                </p>
                            </div>

                            {{-- Tanda tangan & Materai --}}
                            <div class="col-md-6 mb-md-0 mb-3 d-flex flex-column align-items-center text-center">
                                <div class="mb-3">
                                    <label for="note" class="form-label fw-medium">Tanda Tangan & Meterai
                                        (Opsional)</label>
                                    <p>
                                        25 September 2023
                                    </p>
                                </div>
                                <div class="mb-3">
                                    <div class="d-flex">
                                        <img class="object-fit-cover" style="width: 100px; height: 100px;" src="" alt="">
                                        <img class="object-fit-cover" style="width: 100px; height: 100px;" src="" alt="">
                                    </div>
                                </div>
                                {{-- Nama & Jabatan --}}
                                <div class="mb-3">
                                    <p>Dina - Manager Operasional</p>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Invoice Add-->

            <!-- Invoice Actions -->
            <div class="col-lg-3 col-12 invoice-actions">
                <div class="card mb-4">
                    <div class="card-body">
                        <button class="btn btn-primary d-grid w-100 mb-2" data-bs-toggle="offcanvas"
                            data-bs-target="#sendInvoiceOffcanvas">
                            <span class="d-flex align-items-center justify-content-center text-nowrap"><i
                                    class="ti ti-send ti-xs me-2"></i>Kirim Invoice</span>
                        </button>
                        <button type="button" class="btn btn-info d-grid w-100 mb-2">Disetujui</button>
                        <a href="https://demos.pixinvent.com/vuexy-html-laravel-admin-template/demo-1/app/invoice/preview"
                            class="btn btn-label-secondary d-grid w-100 mb-2">Download</a>
                        <button type="button" class="btn btn-label-secondary d-grid w-100 mb-2">Print</button>
                        <button type="button" class="btn btn-label-secondary d-grid w-100 mb-2">Edit Invoice</button>
                        <button type="button" class="btn btn-primary d-grid w-100">Add Payment</button>
                    </div>
                </div>
            </div>
            <!-- /Invoice Actions -->
        </div>

        <!-- Offcanvas -->
        <!-- Send Invoice Sidebar -->
        <div class="offcanvas offcanvas-end" id="sendInvoiceOffcanvas" aria-hidden="true">
            <div class="offcanvas-header my-1">
                <h5 class="offcanvas-title">Send Invoice</h5>
                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                    aria-label="Close"></button>
            </div>
            <div class="offcanvas-body pt-0 flex-grow-1">
                <form>
                    <div class="mb-3">
                        <label for="invoice-from" class="form-label">From</label>
                        <input type="text" class="form-control" id="invoice-from" value="shelbyComapny@email.com"
                            placeholder="company@email.com" />
                    </div>
                    <div class="mb-3">
                        <label for="invoice-to" class="form-label">To</label>
                        <input type="text" class="form-control" id="invoice-to" value="qConsolidated@email.com"
                            placeholder="company@email.com" />
                    </div>
                    <div class="mb-3">
                        <label for="invoice-subject" class="form-label">Subject</label>
                        <input type="text" class="form-control" id="invoice-subject"
                            value="Invoice of purchased Admin Templates" placeholder="Invoice regarding goods" />
                    </div>
                    <div class="mb-3">
                        <label for="invoice-message" class="form-label">Message</label>
                        <textarea class="form-control" name="invoice-message" id="invoice-message" cols="3" rows="8">Dear Queen Consolidated,
          Thank you for your business, always a pleasure to work with you!
          We have generated a new invoice in the amount of $95.59
          We would appreciate payment of this invoice by 05/11/2021</textarea>
                    </div>
                    <div class="mb-4">
                        <span class="badge bg-label-primary">
                            <i class="ti ti-link ti-xs"></i>
                            <span class="align-middle">Invoice Attached</span>
                        </span>
                    </div>
                    <div class="mb-3 d-flex flex-wrap">
                        <button type="button" class="btn btn-primary me-3" data-bs-dismiss="offcanvas">Send</button>
                        <button type="button" class="btn btn-label-secondary"
                            data-bs-dismiss="offcanvas">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- /Send Invoice Sidebar -->
        <!-- /Offcanvas -->

    </div>
    <!-- / Content -->

@endsection

@section('page-script')
    <script src="{{ asset('assets/vendor/libs/jquery-repeater/jquery-repeater.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('.repeater').repeater({

            })
        });
    </script>
@endsection
