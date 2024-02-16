@php
$configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Tanda Terima')

@section('page-style')
{{-- Page Css files --}}
<link rel="stylesheet" href="{{asset('assets/vendor/libs/select2/select2.css')}}">
<link rel="stylesheet" href="{{asset('assets/vendor/libs/flatpickr/flatpickr.css')}}">
<link rel="stylesheet" href="{{asset('assets/vendor/libs/sweetalert2/sweetalert2.css')}}">
@endsection

@section('content')
<!-- Content -->
<div class="container-xxl flex-grow-1 container-p-y">

    <div class="row invoice-add">
        <!-- Invoice Add-->
        <div class="col-lg-9 col-12 mb-lg-0 mb-3">
            <div class="card invoice-preview-card">
                <div class="card-body">
                    <div style="background-image: url('{{asset('assets/img/header.png')}}'); height : 150px; background-size: contain; background-repeat: no-repeat;">
                    </div>

                    <h2 class="mx-auto text-center"><b>PURCHASE ORDER</b></h2>
                    <div class="row  m-0 px-3">
                        <div class="col-md-6 mb-md-0 ps-0">
                            <dl class="row mb-2 d-flex align-items-center">
                                <dt class="col-sm-4">
                                    <span class="fw-normal">Nomor PO</span>
                                </dt>
                                <dd class="col-sm-8 ">
                                    <div class="input-group input-group-merge">
                                        <input type="text" class="form-control date" placeholder="Nomor" disabled>
                                    </div>
                                </dd>
                            </dl>
                            <dl class="row mb-2 d-flex align-items-center">
                                <dt class="col-sm-4">
                                    <span class="fw-normal">Tanggal </span>
                                </dt>
                                <dd class="col-sm-8 ">
                                    <div class="input-group input-group-merge">
                                        <input type="text" class="form-control date" placeholder="Tanggal">
                                    </div>
                                </dd>
                            </dl>
                            <dl class="row mb-2 d-flex align-items-center">
                                <dt class="col-sm-4">
                                    <span class="fw-normal">Perihal</span>
                                </dt>
                                <dd class="col-sm-8 ">
                                    <div class="input-group input-group-merge disabled">
                                        <input type="text" class="form-control " placeholder="Perihal">
                                    </div>
                                </dd>
                            </dl>
                            <div class="mb-3">
                                <label for="invoice-message" class="form-label">Nama Vendor</label>
                                <br>
                                <select name="vendor" id="vendor" class="mb-3" required>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row px-3">
                        <div class="col-12">
                            <textarea class="form-control" name="invoice-message" id="invoice-message" cols="3" rows="8" placeholder="Penjelasan untuk permintaan ISI PURCHASING ORDER"></textarea>
                        </div>
                    </div>


                    <div class="py-3 px-3">
                        <div class="card academy-content shadow-none border p-3">
                            <div class="table-responsive">
                                <div class="" id="details">
                                </div>

                                <div class="row pb-4">
                                    <div class="col-12">
                                        <button type="button" class="btn btn-primary waves-effect waves-light btn-add-row-mg mt-2">Tambah Baris</button>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row p-0 p-sm-4">
                                <div class="col-md-6 mb-md-0 mb-3">

                                </div>
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="d-flex justify-content-between mb-2">
                                                <span class="w-px-100">Subtotal</span>
                                                <span class="fw-medium">$00.00</span>
                                            </div>
                                            <hr>
                                            <div class="d-flex justify-content-between mb-2">
                                                <span class="w-px-100">Pajak</span>
                                                <span class="fw-medium">$00.00</span>
                                            </div>
                                            <hr>
                                            <div class="d-flex justify-content-between mb-2">
                                                <span class="w-px-100">Jumlah Nett</span>
                                                <span class="fw-medium">$00.00</span>
                                            </div>
                                            <hr>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-12 mb-2">
                                    <label for="note" class="form-label fw-medium">Terbilang</label>
                                    <input type="text" class="form-control terbilang" id="grand_total_spelled" name="grand_total_spelled" placeholder="Terbilang" disabled />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-md-0 mb-3">
                                    <div class="mb-3">
                                        <label for="note" class="form-label fw-medium me-2">Syarat & Ketentuan</label>
                                        <textarea class="form-control" rows="11" id="term_and_conditions" name="term_and_conditions" placeholder="Termin pembayaran, garansi dll" required></textarea>
                                        <div class="invalid-feedback">Tidak boleh kosong</div>
                                    </div>
                                    <div class="mb-3 text-center">
                                        <div class="mb-3">
                                            <label for="note" class="form-label fw-medium">Tanda Tangan & Meterai
                                                (Opsional)</label>
                                            <input type="text" class="form-control w-px-250 date" placeholder="Tanggal" id="materai_date" name="materai_date" />
                                            <div class="invalid-feedback">Tidak boleh kosong</div>
                                        </div>
                                        <div class="mb-3">
                                            <div action="/upload" class="dropzone needsclick dz-clickable w-px-250" id="dropzone-basic">
                                                <div class="dz-message needsclick">
                                                    <span class="note needsclick">Unggah Tanda Tangan</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <input type="text" class="form-control w-px-250" placeholder="Nama dan Jabatan" id="materai_date" name="materai_date" />
                                            <div class="invalid-feedback">Tidak boleh kosong</div>
                                        </div>
                                    </div>
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
                        <span class="d-flex align-items-center justify-content-center text-nowrap"><i class="ti ti-send ti-xs me-2"></i>Kirim Tanda Terima</span>
                    </button>
                    <a href="https://demos.pixinvent.com/vuexy-html-laravel-admin-template/demo-1/app/invoice/preview" class="btn btn-label-secondary d-grid w-100 mb-2">Preview</a>
                    <button type="button" class="btn btn-label-secondary d-grid w-100 mb-2">Simpan</button>
                    <button type="button" class="btn btn-label-secondary d-grid w-100">Kembali</button>
                </div>
            </div>
        </div>
        <!-- /Invoice Actions -->
    </div>

</div>
<!-- / Content -->

@endsection

@section('page-script')
<script src="{{asset('assets/vendor/libs/select2/select2.js')}}"></script>
<script src="{{asset('assets/vendor/libs/flatpickr/flatpickr.js')}}"></script>
<script src="{{asset('assets/vendor/libs/sweetalert2/sweetalert2.js')}}"></script>
<script>
    $(document).ready(function() {
        getDetails();
        setDate();
    });
    $(document).on('click', '.btn-remove-mg', function() {
        // Hapus baris yang ditekan tombol hapus
        $(this).closest('.row-mg').remove();
    });

    $(document).on('click', '.btn-add-row-mg', function() {
        // Clone baris terakhir

        var $details = $('#details');
        var $newRow = `
        <table class="table row-mg">
                <tbody>
                    <tr>
                        <td>
                            <input type="text" class="form-control row-input" placeholder="Nomor" name="number[]" required style="width: 200px;" />
                        </td>
                        <td>
                            <input type="text" class="form-control row-input" placeholder="Nama Barang" name="name[]" required style="width: 200px;" />
                        </td>
                        <td>
                            <input type="text" class="form-control row-input" placeholder="Spesifikasi" name="specification[]" required style="width: 200px;" />
                        </td>
                        <td>
                            <input type="text" class="form-control row-input" placeholder="Quantity" name="quantity[]" required style="width: 200px;" />
                        </td>
                        <td>
                            <input type="text" class="form-control row-input" placeholder="Satuan" name="units[]" required style="width: 200px;" />
                        </td>
                        <td>
                            <input type="text" class="form-control row-input" placeholder="Harga Satuan" name="price[]" required style="width: 200px;" />
                        </td>
                        <td>
                            <input type="text" class="form-control row-input" placeholder="Pajak" name="tax[]" required style="width: 200px;" />
                        </td>
                        <td>
                            <input type="text" class="form-control row-input" placeholder="Jumlah" name="total_price[]" required style="width: 200px;" />
                        </td>
                        <td>
                            <a role="button" class="btn btn-primary text-center btn-remove-mg text-white ms-4" disabled>
                                <i class="fas fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                </tbody>
            </table> `;
        $details.append($newRow);
    });

    function getDetails() {
        let getDetail = '';
        let temp = '';
        temp = `            
            <table class="table row-mg">
                <thead>
                    <tr>
                        <th>Nomor</th>
                        <th>Nama Barang</th>
                        <th>Spesifikasi</th>
                        <th>Quantity</th>
                        <th>Satuan</th>
                        <th>Harga Satuan</th>
                        <th>Pajak</th>
                        <th>Jumlah</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <input type="text" class="form-control row-input" placeholder="Nomor" name="number[]" required style="width: 200px;" />
                        </td>
                        <td>
                            <input type="text" class="form-control row-input" placeholder="Nama Barang" name="name[]" required style="width: 200px;" />
                        </td>
                        <td>
                            <input type="text" class="form-control row-input" placeholder="Spesifikasi" name="specification[]" required style="width: 200px;" />
                        </td>
                        <td>
                            <input type="text" class="form-control row-input" placeholder="Quantity" name="quantity[]" required style="width: 200px;" />
                        </td>
                        <td>
                            <input type="text" class="form-control row-input" placeholder="Satuan" name="units[]" required style="width: 200px;" />
                        </td>
                        <td>
                            <input type="text" class="form-control row-input" placeholder="Harga Satuan" name="price[]" required style="width: 200px;" />
                        </td>
                        <td>
                            <input type="text" class="form-control row-input" placeholder="Pajak" name="tax[]" required style="width: 200px;" />
                        </td>
                        <td>
                            <input type="text" class="form-control row-input" placeholder="Jumlah" name="total_price[]" required style="width: 200px;" />
                        </td>
                        <td>
                            <a role="button" class="btn btn-primary text-center btn-remove-mg text-white ms-4" disabled>
                                <i class="fas fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                </tbody>
            </table> `;
        $('#details').prepend(temp);

    };




    function setDate() {
        $('.date').flatpickr({
            dateFormat: 'Y-m-d'
        });

        const flatPickrEL = $(".date");
        if (flatPickrEL.length) {
            flatPickrEL.flatpickr({
                allowInput: true,
                monthSelectorType: "static",
                dateFormat: 'Y-m-d'
            });
        }
    }



    $("#vendor").select2({
        placeholder: 'Select Vendor',
        allowClear: true,
        ajax: {
            url: "{{ env('BASE_URL_API')}}" + '/api/vendor/select',
            dataType: 'json',
            cache: true,
            data: function(params) {
                return {
                    value: params.term || '',
                    page: params.page || 1
                }
            },
            processResults: function(data, params) {
                var more = data.pagination.more;
                if (more === false) {
                    params.page = 1;
                    params.abort = true;
                }

                return {
                    results: data.data,
                    pagination: {
                        more: more
                    }
                };
            }
        }

    });
</script>
@endsection