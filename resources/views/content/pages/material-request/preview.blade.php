@php
$configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Material Request')

@section('page-style')
{{-- Page Css files --}}
<link rel="stylesheet" href="{{asset('assets/vendor/libs/select2/select2.css')}}">
<link rel="stylesheet" href="{{asset('assets/vendor/libs/flatpickr/flatpickr.css')}}">
<link rel="stylesheet" href="{{asset('assets/vendor/libs/sweetalert2/sweetalert2.css')}}">
@endsection

@section('content')
<!-- Content -->
<div class="container-xxl flex-grow-1 container-p-y">
    <form id="create-material-request" class="create-material-request" novalidate>
        <div class="row invoice-add">
            <!-- Invoice Add-->
            <div class="col-lg-9 col-12 mb-lg-0 mb-3">
                <div class="card invoice-preview-card">
                    <div class="card-body">
                        <div class="row m-sm-4 m-0">
                            <h1 class="text-center"><b>MATERIAL REQUEST</b></h1>
                        </div>

                        <div class="row py-3 px-3">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="note" class="form-label fw-medium">Requester</label>
                                    <input type="text" class="form-control w-px-250" placeholder="Requester" name="requester" id="requester" required readonly />
                                    <div class="invalid-feedback">Tidak boleh kosong</div>
                                </div>
                                <div class="mb-3">
                                    <label for="note" class="form-label fw-medium">Departement </label>
                                    <input type="text" class="form-control w-px-250" placeholder="Departement" name="department" id="department" required readonly />
                                    <div class="invalid-feedback">Tidak boleh kosong</div>
                                </div>
                                <div class="mb-3">
                                    <label for="note" class="form-label fw-medium">Stock </label>
                                    <input type="text" class="form-control w-px-250" placeholder="Stock" id="stock" name="stock" required readonly />
                                    <div class="invalid-feedback">Tidak boleh kosong</div>
                                </div>
                                <div class="mb-3">
                                    <label for="note" class="form-label fw-medium">Purchase </label>
                                    <input type="text" class="form-control w-px-250" placeholder="Purchase" name="purchase" id="purchase" required readonly/>
                                    <div class="invalid-feedback">Tidak boleh kosong</div>
                                </div>
                            </div>
                            <div class="col-md-6 d-flex flex-column align-items-end">
                                <div class="mb-3">
                                    <label for="note" class="form-label fw-medium">Tanggal</label>
                                    <input type="text" class="form-control w-px-250 date" placeholder="Tanggal" name="request_date" id="request_date" required readonly >
                                    <div class="invalid-feedback">Tidak boleh kosong</div>
                                </div>
                                <div class="mb-3">
                                    <textarea class="form-control w-px-300" rows="6" id="note" name="note" placeholder="Catatan" required readonly></textarea>
                                    <div class="invalid-feedback">Tidak boleh kosong</div>
                                </div>
                            </div>
                        </div>

                        <div class="py-3 px-3">
                            <div class="card academy-content shadow-none border p-3">
                                <div class="">
                                    <div class="">
                                        <div class="" id="details">

                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-3">
                                        <label for="note" class="form-label fw-medium mb-3">Prepered by :</label>
                                        <div class="mb-3">
                                            <input type="text" class="form-control ttd-row" placeholder="Nama & Jabatan" style="text-align:center;" id="name" name="name[]" />
                                        </div>
                                        <div class="mb-3">
                                            <div action="/upload" class="dropzone needsclick dz-clickable" id="ttd1">
                                                <div class="dz-message needsclick">
                                                    <span class="note needsclick">Unggah Tanda Tangan</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <input type="text" class="form-control date ttd-row" placeholder="Tanggal" style="text-align:center;" id="date" name="date[]" />
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <label for="note" class="form-label fw-medium mb-3">Reviewed by :</label>
                                        <div class="mb-3">
                                            <input type="text" class="form-control ttd-row" placeholder="Nama & Jabatan" style="text-align:center;" id="name" name="name[]" />
                                        </div>
                                        <div class="mb-3">
                                            <div action="/upload" class="dropzone needsclick dz-clickable" id="ttd2">
                                                <div class="dz-message needsclick">
                                                    <span class="note needsclick">Unggah Tanda Tangan</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <input type="text" class="form-control date ttd-row" placeholder="Tanggal" style="text-align:center;" id="date" name="name[]" />
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <label for="note" class="form-label fw-medium mb-3">Aknowledge by :</label>
                                        <div class="mb-3">
                                            <input type="text" class="form-control ttd-row" placeholder="Nama & Jabatan" style="text-align:center;" id="date" name="name[]" />
                                        </div>
                                        <div class="mb-3">
                                            <div action="/upload" class="dropzone needsclick dz-clickable" id="ttd3">
                                                <div class="dz-message needsclick">
                                                    <span class="note needsclick">Unggah Tanda Tangan</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <input type="text" class="form-control date ttd-row" placeholder="Tanggal" style="text-align:center;" id="date" name="date[]" />
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <label for="note" class="form-label fw-medium mb-3">Approved by :</label>
                                        <div class="mb-3">
                                            <input type="text" class="form-control ttd-row" placeholder="Nama & Jabatan" style="text-align:center;" id="name" name="name[]" />
                                        </div>
                                        <div class="mb-3">
                                            <div action="/upload" class="dropzone needsclick dz-clickable" id="ttd4">
                                                <div class="dz-message needsclick">
                                                    <span class="note needsclick">Unggah Tanda Tangan</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <input type="text" class="form-control date ttd-row" placeholder="Tanggal" style="text-align:center;" id="date" name="date[]" />
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-2">
                                        <span>Lembar</span>
                                    </div>
                                    <div class="col-4">
                                        <span>1. Accounting (Putih)</span>
                                        <br>
                                        <span>2. Guddang (Merah)</span>
                                    </div>
                                    <br>
                                    <div class="col-4">
                                        <span>3. Purchasing (Hijau)</span>
                                        <br>
                                        <span>4. Pemohon (Biru)</span>
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
                        <button class="btn btn-primary d-grid w-100 mb-2" data-bs-toggle="offcanvas" data-bs-target="#sendInvoiceOffcanvas">
                            <span class="d-flex align-items-center justify-content-center text-nowrap"><i class="ti ti-send ti-xs me-2"></i>Kirim Invoice</span>
                        </button>
                        <button type="button" id="preview" class="btn btn-label-secondary d-grid w-100 mb-2">Preview</button>
                        <button type="submit" id="save" class="btn btn-label-secondary d-grid w-100 mb-2">Simpan</button>
                        <button type="button" id="batal" class="btn btn-label-secondary d-grid w-100">Batal</button>
                    </div>
                </div>
            </div>
            <!-- /Invoice Actions -->
        </div>
    </form>


    <!-- Offcanvas -->
    <!-- Send Invoice Sidebar -->


</div>
<!-- / Content -->

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

    let data = JSON.parse(localStorage.getItem("material-request"));
    $(document).ready(function() {
        // $("#invoice_number").val(data.invoice_number);
        // let fileTtd = ttdFile.dataURL;
        $("#requester").val(data.requester);
        $("#department").val(data.department);
        $("#request_date").val(data.request_date);
        $("#stock").val(data.stock);
        $("#purchase").val(data.purchase);
        $("#note").val(data.note);
        getDetails();

    });


    function getDetails() {
        let details = data.details;
        let getDetail = '';
        let tem = '';
        for (let i = 0; i < details.length; i++) {
            tem = `
            <div class="row mb-3 row-mg">
                    <div class="col-12 d-flex align-items-end mb-2">
                        <div class="">
                            <label for="note" class="form-label fw-medium">Nomor</label>
                            <input type="text" class="form-control  w-px-75 row-input" placeholder="Nomor" name="number[]" value="` + details[i].number + `" readonly/>
                        </div>
                        <div class="me-1">
                            <label for="note" class="form-label fw-medium">Part Number</label>
                            <input type="text" class="form-control  w-px-75 row-input" placeholder="No. Suku Cadang" name="part_number[]" value="` + details[i].part_number + `" readonly/>
                        </div>
                        <div class="me-1">
                            <label for="note" class="form-label fw-medium">Deskripsi</label>
                            <input type="text" class="form-control  w-px-75 row-input" placeholder="Deskripsi" name="description[]" value="` + details[i].description + `" readonly />
                        </div>
                        <div class="me-1">
                            <label for="note" class="form-label fw-medium">Quantity</label>
                            <input type="text" class="form-control  w-px-75 row-input" placeholder="Kuantitas" name="quantity[]" value="` + details[i].quantity + `" readonly/>
                        </div>
                        <div class="">
                            <label for="note" class="form-label fw-medium">Filled Storekeeper Only</label>
                        <div class="d-flex justify-content-between">
                            <input type="text" class="form-control  w-px-75 row-input" placeholder="Stock" name="stock[]" value="` + details[i].stock + `" readonly/>
                            <input type="text" class="form-control  w-px-75 row-input" placeholder="Stock Out" name="stock_out[]" value="` + details[i].stock_out + `" readonly/>
                            <input type="text" class="form-control  w-px-75 row-input" placeholder="End Stock" name="c[]" value="` + details[i].stock_out + `" readonly/>
                            <input type="text" class="form-control  w-px-75 row-input" placeholder="Min Stock" name="min_stock"[] value="` + details[i].min_stock + `" readonly/>
                        </div>
                    </div>
                </div>
            `;
            getDetail = getDetail + tem;
        }

        $('#details').prepend(getDetail);
    }


    $(document).on('click', '#batal', function(event) {
        event.preventDefault();
        localStorage.removeItem('material-request');
        window.location.href = "/request/material-request"
    });

    $(document).on('click', '#save', function(event) {
        event.preventDefault();
        $.ajax({
            url: baseUrl + "api/material-request/",
            type: "POST",
            data: JSON.stringify(data),
            contentType: "application/json; charset=utf-8",
            dataType: "json",

            success: function(response) {
                $('.indicator-progress').show();
                $('.indicator-label').hide();

                Swal.fire({
                    title: 'Berhasil',
                    text: 'Berhasil menambahkan Material Request',
                    icon: 'success',
                    customClass: {
                        confirmButton: 'btn btn-primary'
                    },
                    buttonsStyling: false
                });

                // localStorage.removeItem('invoice');
                // window.location.href = "/invoice/list-invoice"

            },
            error: function(xhr, status, error) {
                Swal.fire({
                    title: 'Error!',
                    text: 'Semua field harus diisi',
                    icon: 'error',
                    customClass: {
                        confirmButton: 'btn btn-primary'
                    },
                    buttonsStyling: false
                })
            }
        });
        // window.location.href = "/invoice/list-invoice"
    });
</script>
@endsection