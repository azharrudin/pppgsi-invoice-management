@php
    $configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Tanda Terima')

@section('page-style')
    {{-- Page Css files --}}
    <link rel="stylesheet"
        href="https://demos.pixinvent.com/vuexy-html-laravel-admin-template/demo/assets/vendor/libs/dropzone/dropzone.css">
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
                            <div class="col-md-7 mb-md-0 ps-0">

                            </div>
                            <div class="col-md-5">
                                <dl class="row mb-2">
                                    </dd>
                                    <dt class="col-sm-6 text-md-end ps-0">

                                    </dt>
                                    <dd class="col-sm-6 d-flex justify-content-md-end pe-0 ps-0 ps-sm-2">
                                        <div class="mb-3">
                                            <label for="note" class="form-label fw-medium">No Tanda Terima:</label>
                                            <input type="text" class="form-control w-px-150" id="receipt_number"
                                                name="receipt_number" disabled />
                                        </div>
                                    </dd>
                                </dl>
                            </div>
                        </div>
                        <h2 class="mx-auto text-center"><b>TANDA TERIMA PEMBAYARAN</b></h2>
                        <span class="mt-5 px-3" style="display: block">Telah terima Pembayaran Tunai / Cek / Giro</span>
                        <div class="row py-3 px-3">
                            <div class="col-md-6 mb-md-0 mb-3">
                                <div class="mb-3">
                                    <label for="note" class="form-label fw-medium">No Invoice</label>
                                    <div class="form-label" id="invoice" name="invoice"></div>
                                </div>
                                <div class="mb-3">
                                    <label for="note" class="form-label fw-medium">No. Cek/Giro</label>
                                    <div class="form-label" id="check_number" name="check_number"></div>
                                </div>
                                <div class="mb-3">
                                    <label for="note" class="form-label fw-medium">Bank</label>
                                    <div class="form-label" id="bank" name="bank">
                                        <br>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 d-flex justify-content-end">
                                <div class="mb-3">
                                    <label for="note" class="form-label fw-medium">Nama Tenant</label>
                                    <div class="form-label" id="tenant" name="tenant"></div>
                                </div>
                            </div>
                        </div>

                        <div class="row px-3 d-flex align-items-center">
                            <div class="col-2">
                                <label for="salesperson" class="form-label  fw-medium">Total Invoice</label>
                            </div>
                            <div class="col-10">
                                Rp. <span id="grand_total" name="grand_total"></span>,-
                            </div>
                        </div>

                        <hr>
                        <div class="row px-3 d-flex align-items-center mb-3">
                            <div class="col-2">
                                <label for="salesperson" class="form-label  fw-medium">Dibayarkan</label>
                            </div>
                            <div class="col-10">
                                Rp. <span id="paid" name="paid"></span>,-
                            </div>
                        </div>
                        <hr>
                        <div class="row px-3 d-flex align-items-center mb-3">
                            <div class="col-2">
                                <label for="salesperson" class="form-label  fw-medium">Sisa Tagihan</label>
                            </div>
                            <div class="col-10">
                                Rp. <span id="remaining" name="remaining"></span>,-
                            </div>
                        </div>
                        <hr>
                        <div class="row px-3 d-flex align-items-center mb-3">
                            <div class="col-2">
                                <label for="salesperson" class="form-label  fw-medium">Terbilang</label>
                            </div>
                            <div class="col-10">
                                <div class="col-10">
                                    <span id="grand_total_spelled" name="grand_total_spelled"></span>
                                </div>
                            </div>
                        </div>
                        <hr>

                        <div class="row py-3 px-3">
                            <div class="col-md-6 mb-md-0 mb-3">
                                <textarea class="form-control" rows="11" id="note" name="note" placeholder="Catatan"></textarea>
                                <br>
                                <br>
                                <span>
                                    Apabila dibayar dengan cek / Bilyet giro, Pembayaran baru dianggap sah apabila telah
                                    dapat dicairkan di Bank kami.
                                </span>
                            </div>

                            <div class="col-md-6 mb-md-0 mb-3 d-flex flex-column align-items-center text-center">
                                <div class="mb-3">
                                    <label for="note" class="form-label fw-medium">Tanda Tangan</label>
                                    <div class="form-label" id="receipt_date" name="receipt_date">
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <img class="prev-img" src="" alt="">
                                </div>
                                <div class="mb-3">
                                    <div class="form-label" id="signature_name" name="signature_name">
                                        Dina - Manager Operasional
                                    </div>
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
                                    class="ti ti-send ti-xs me-2"></i>Kirim Tanda Terima</span>
                        </button>
                        <button type="button" class="btn btn-label-secondary d-grid w-100 mb-2"
                            style="background-color: #4EC0D9; color : #fff;">Disetujui</a>
                            <button type="button" class="btn btn-label-secondary d-grid w-100 mb-2">Download</button>
                            <button type="button" class="btn btn-label-secondary d-grid w-100 mb-2">Print</button>
                            <button type="button" class="btn btn-label-secondary d-grid w-100 btn-edit">Edit Tanda
                                Terima</button>
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
    <script
        src="https://demos.pixinvent.com/vuexy-html-laravel-admin-template/demo/assets/vendor/libs/dropzone/dropzone.js">
    </script>
    <script src="https://demos.pixinvent.com/vuexy-html-laravel-admin-template/demo/assets/js/forms-file-upload.js">
    </script>
    <script src="https://demos.pixinvent.com/vuexy-html-laravel-admin-template/demo/assets/vendor/libs/moment/moment.js">
    </script>
    <script src="{{ asset('assets/vendor/libs/sweetalert2/sweetalert2.js') }}"></script>
    <script>
        $(document).ready(function() {
            var sweet_loader = `<div class="spinner-border mb-8 text-primary" style="width: 5rem; height: 5rem;" role="status">
                                    <span class="sr-only">Loading...</span>
                                </div>`;

            Swal.fire({
                title: '<h2>Loading...</h2>',
                html: sweet_loader + '<h5>Please Wait</h5>',
                showConfirmButton: false,
                allowOutsideClick: false,
                allowEscapeKey: false
            })

            let data = JSON.parse(localStorage.getItem("receipt"));

            if (data) {
                $("#receipt_number").val(data.receipt_number);
                $('#check_number').text(data.check_number);
                if (data.grand_total) {
                    $('#grand_total').text(data.grand_total.toLocaleString('en-EN'));
                }
                if (data.paid) {
                    $('#paid').text(data.paid.toLocaleString('en-EN'));
                }
                if (data.remaining) {
                    $('#remaining').text(data.remaining.toLocaleString('en-EN'));
                }
                $('#grand_total_spelled').text(data.grand_total_spelled);
                $('#note').text(data.note);
                $('#note').text(data.note);
                $('#receipt_date').text(moment(data.receipt_date).format('DD MMMM YYYY'));
                $('.prev-img').attr('src', data.signature_image);
                $('#signature_name').text(data.signature_name);

                if (data.tenant_id) {
                    getTenant();
                }
                if (data.bank_id) {
                    getBank();
                }
                if (data.invoice_id) {
                    getInvoice();
                }

                Swal.close();
            }

            function getInvoice() {
                let idInvoice = data.invoice_id;
                $.ajax({
                    url: "{{ url('api/invoice') }}/" + idInvoice,
                    type: "GET",
                    success: function(response) {
                        let data = response.data;
                        $("#invoice").text(data.invoice_number);
                    },
                    error: function(xhr, status, error) {
                        console.log(error);
                    }
                });
            }

            function getTenant() {
                let idTenant = data.tenant_id;
                $.ajax({
                    url: "{{ url('api/tenant') }}/" + idTenant,
                    type: "GET",
                    success: function(response) {
                        let data = response.data;
                        $("#tenant").text(data.name);
                    },
                    error: function(xhr, status, error) {
                        console.log(error);
                    }
                });
            }

            function getBank() {
                let idBank = data.bank_id;
                $.ajax({
                    url: "{{ url('api/bank') }}/" + idBank,
                    type: "GET",
                    success: function(response) {
                        let data = response.data;
                        $("#bank").text(data.name)
                    },
                    error: function(xhr, status, error) {
                        console.log(error);
                    }
                });
            }
        })
    </script>
@endsection
