@php
$configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Complain')

@section('content')

<div class="container-xxl flex-grow-1 container-p-y">

    <div class="row ticket-add">
        <!-- Ticket Preview-->
        <div class="col-lg-9 col-12 mb-lg-0 mb-3">
            <div class="card ticket-preview-card">
                <div class="card-body">
                    <h2 class="mx-auto"><b>Form Aduan dan Complain</b></h2>
                    {{-- Divider --}}
                    <hr class="my-3 mx-n4">

                    <div class="row px-3 d-flex align-items-center mb-3">
                        <div class="d-flex align-items-center justify-content-between col-3">
                            <label for="salesperson" class="form-label fw-bold fs-5">Nama Pelapor</label>
                            <span>:</span>
                        </div>
                        <div class="col-8 fw-bold fs-5">
                            <div id="reporter_name"></div>
                        </div>
                    </div>
                    <div class="row px-3 d-flex align-items-center mb-3">
                        <div class="d-flex align-items-center justify-content-between col-3">
                            <label for="salesperson" class="form-label fw-bold fs-5">Nomor Telepon</label>
                            <span>:</span>
                        </div>
                        <div class="col-8 fw-bold fs-5">
                            <div id="reporter_phone"></div>
                        </div>
                    </div>
                    <div class="row px-3 d-flex align-items-center mb-3">
                        <div class="d-flex align-items-center justify-content-between col-3">
                            <label for="salesperson" class="form-label fw-bold fs-5">Nama Perusahaan</label>
                            <span>:</span>
                        </div>
                        <div class="col-8 fw-bold fs-5">
                            <div id="reporter_company"></div>
                        </div>
                    </div>
                    <div class="row px-3 d-flex align-items-center mb-3">
                        <div class="d-flex align-items-center justify-content-between col-3">
                            <label for="salesperson" class="form-label fw-bold fs-5">Judul Laporan</label>
                            <span>:</span>
                        </div>
                        <div class="col-8 fw-bold fs-5">
                            <div id="ticket_title"></div>
                        </div>
                    </div>
                    <div class="row px-3 d-flex align-items-center mb-3">
                        <div class="d-flex align-items-center justify-content-between col-3">
                            <label for="salesperson" class="form-label fw-bold fs-5">Isi laporan</label>
                            <span>:</span>
                        </div>
                        <div class="col-8 fw-bold fs-5">
                            <div id="ticket_body"></div>
                        </div>
                    </div>
                    <div class="row px-3 mb-3">
                        <div class="d-flex align-items-center justify-content-between col-3">
                            <label for="salesperson" class="form-label fw-bold fs-5">Lampiran</label>
                            <span>:</span>
                        </div>
                        <div></div>
                    </div>
                    <div class="d-flex flex-wrap px-3 fw-bold fs-5 mb-3 gallery">

                    </div>
                    <div class="px-3">
                        <button type="button" class="btn btn-primary waves-effect waves-light">Download Semua Lampiran</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Ticket Preview-->

        <!-- Ticket Actions -->
        <!-- Ticket Actions -->
        <!-- <div class="col-lg-3 col-12 invoice-actions">
            <div class="card mb-4">
                <div class="card-body">
                    <button class="btn btn-primary d-grid w-100 mb-2" data-bs-toggle="offcanvas" data-bs-target="#sendInvoiceOffcanvas">
                        <span class="d-flex align-items-center justify-content-center text-nowrap"><i class="ti ti-send ti-xs me-2"></i>Kirim Invoice</span>
                    </button>
                    <button type="button" id="preview" class="btn btn-label-secondary d-grid w-100 mb-2">Preview</button>
                    <button type="submit" id="save" class="btn btn-label-secondary d-grid w-100 mb-2">Simpan</button>
                    <button type="button" id="batal" class="btn btn-label-secondary d-grid w-100">Batal</button>
                </div>
            </div>
        </div> -->
        <!-- /Ticket Actions -->
        <!-- /Ticket Actions -->
    </div>

</div>

@endsection

@section('page-script')
<script src="{{asset('assets/vendor/libs/select2/select2.js')}}"></script>
<script src="{{asset('assets/vendor/libs/flatpickr/flatpickr.js')}}"></script>
<script src="{{asset('assets/vendor/libs/sweetalert2/sweetalert2.js')}}"></script>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    var sweet_loader = `<div class="spinner-border mb-8 text-primary" style="width: 5rem; height: 5rem;" role="status">
                                    <span class="sr-only">Loading...</span>
                                </div>`;

    $(document).ready(function() {
        var urlSegments = window.location.pathname.split('/');
        var idIndex = urlSegments.indexOf('show-ticket') + 1;
        var id = urlSegments[idIndex];
        getDataTicket(id);
    });

    function getDataTicket(id) {
        $.ajax({
            url: "{{env('BASE_URL_API')}}"+"/api/ticket/" + id,
            type: "GET",
            dataType: "json",
            success: function(res) {
                let data = res.data;
                console.log(data);
                $("#reporter_name").text(data.reporter_name);
                $("#reporter_phone").text(data.reporter_phone);
                $("#reporter_company").text(data.reporter_company);
                $("#ticket_title").text(data.ticket_title);
                $("#ticket_body").text(data.ticket_body);
                getImage(data.ticket_attachments);
            },
            error: function(errors) {
                console.log(errors);
            }
        });
    }



    function getImage(images) {
        console.log(images);
        let temp = '';
        for (let i = 0; i < images.length; i++) {
            temp += `<img class="mx-2 my-2 object-fit-cover" style="width: 250px; height: 250px;" src="${images[i].attachment}" alt="">`
        }
        $('.gallery').append(temp);
    }
</script>
@endsection