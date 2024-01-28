@php
$configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Purchase Request')

@section('page-style')
{{-- Page Css files --}}
<link rel="stylesheet" href="https://demos.pixinvent.com/vuexy-html-laravel-admin-template/demo/assets/vendor/libs/dropzone/dropzone.css">
<link rel="stylesheet" href="https://demos.pixinvent.com/vuexy-html-laravel-admin-template/demo/assets/vendor/libs/flatpickr/flatpickr.css">
@endsection

@section('content')
<!-- Content -->
<div class="container-xxl flex-grow-1 container-p-y">
    <form id="create-pr" class="create-pr" novalidate>
        <div class="row purchase-req-add" id="addPurchaseRequest">
            <!-- purchase req Add-->
            <div class="col-lg-9 col-12 mb-lg-0 mb-3">
                <div class="card purchase-req-preview-card">
                    <div class="card-body">
                        <div class="row m-sm-4 m-0">
                            <div class="col-md-12 mb-md-0 mb-4 ps-0">
                                <h1 class="fw-700 text-center" style="margin: 0;"><b>PURCHASE REQUEST</b></h1>
                            </div>
                        </div>
                        <hr class="my-3 mx-n4">

                        <div class="row">
                            {{-- Form Kiri --}}
                            <div class="col-md-5 py-3 px-3">
                                <div class="col-md-12">
                                    <div class="mb-1">
                                        <label for="note" class="form-label fw-medium">Yang Meminta </label>
                                        <input type="text" class="form-control add" placeholder="Yang Meminta" id="requester" name="requester" required />
                                        <div class="invalid-feedback">Tidak boleh kosong</div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-1">
                                        <label for="note" class="form-label fw-medium">Departemen </label>
                                        <input type="text" class="form-control" placeholder="Departement" name="department" id="department" required />
                                        <div class="invalid-feedback">Tidak boleh kosong</div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-1">
                                        <label for="note" class="form-label fw-medium">Jumlah Anggaran </label>
                                        <input type="text" class="form-control add qty price" id="total_budget" name="total_budget" placeholder="Jumlah Anggaran" required />
                                        <div class="invalid-feedback">Tidak boleh kosong</div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-1">
                                        <label for="note" class="form-label fw-medium">Usulan Permintaan </label>
                                        <input type="text" class="form-control add qty price" id="proposed_purchase_price" name="proposed_purchase_price" placeholder="Usulan Permintaan" required />
                                        <div class="invalid-feedback">Tidak boleh kosong</div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-1">
                                        <label for="note" class="form-label fw-medium">Sisa Anggaran </label>
                                        <input type="text" class="form-control add qty price" id="remaining_budget" name="remaining_budget" placeholder="Sisa Anggaran" required />
                                        <div class="invalid-feedback">Tidak boleh kosong</div>
                                    </div>
                                </div>
                            </div>

                            {{-- Form Kanan --}}
                            <div class="d-flex flex-wrap justify-content-between col-md-7 py-3 px-3">
                                <div class="col-md-5 mb-0">
                                    <div class="mb-1">
                                        <label for="note" class="form-label fw-medium">Nomor PR </label>
                                        <input type="text" class="form-control" placeholder="Nomor PR" id="purchase_request_number" name="purchase_request_number" disabled />
                                        <div class="invalid-feedback">Tidak boleh kosong</div>
                                    </div>
                                </div>
                                <div class="col-md-5 mb-0">
                                    <div class="mb-1">
                                        <label for="note" class="form-label fw-medium">Tanggal PR </label>
                                        <input type="text" class="form-control add date" id="request_date" name="request_date" placeholder="Tanggal PR" required />
                                        <div class="invalid-feedback">Tidak boleh kosong</div>
                                    </div>
                                </div>
                                <div class="col-md-5 mb-0">
                                    <div class="mb-1">
                                        <label for="nomor_mr" class="form-label fw-medium">Nomor MR </label>
                                        <select class="form-control w-px-200 select2 " id="material_request_id" name="material_request_id" required>
                                        </select>
                                        <div class="invalid-feedback">Tidak boleh kosong</div>
                                    </div>
                                </div>
                                <div class="col-md-5 mb-0">
                                    <div class="mb-1">
                                        <label for="note" class="form-label fw-medium">Tanggal MR</label>
                                        <input type="text" class="form-control" id="tanggal_mr" name="tanggal_mr" placeholder="Tanggal MR" disabled />
                                        <div class="invalid-feedback" style="display: none">Tidak boleh kosong</div>
                                    </div>
                                </div>
                                <div class="col-md-12 mt-2">
                                    <div class="mb-1">
                                        <textarea class="form-control add" rows="7" style="padding: 15px" id="additional_note" name="additional_note" placeholder="Termin pembayaran, garansi dll" required></textarea>
                                        <div class="invalid-feedback">Tidak boleh kosong</div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Radio Button --}}
                        <div class="row py-3 px-3">
                            <div class="col-12">
                                <div class="">
                                    <div class="form-check form-check-inline checkbox">
                                        <input class="form-check-input checkbox-check" type="checkbox" name="Sesuai Budget" id="sesuai_budget" required>
                                        <label class="form-check-label" for="sesuai_budget">Sesuai Budget</label>
                                    </div>
                                    <div class="form-check form-check-inline checkbox">
                                        <input class="form-check-input checkbox-check" type="checkbox" name="Diluar Budget" id="diluar_budget" required>
                                        <label class="form-check-label" for="diluar_budget">Diluar Budget</label>
                                    </div>
                                    <div class="form-check form-check-inline checkbox">
                                        <input class="form-check-input checkbox-check" type="checkbox" name="penting" id="penting" required>
                                        <label class="form-check-label" for="penting">Penting</label>
                                    </div>
                                    <div class="form-check form-check-inline checkbox">
                                        <input class="form-check-input checkbox-check" type="checkbox" name="1 Minggu" id="1_minggu" required>
                                        <label class="form-check-label" for="1_minggu">1 Minggu</label>
                                    </div>
                                    <div class="form-check form-check-inline checkbox">
                                        <input class="form-check-input checkbox-check" type="checkbox" name="1 Bulan" id="1_bulan" required>
                                        <label class="form-check-label" for="1_bulan">1 Bulan</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="py-3 px-3">
                            <div class="card academy-content shadow-none border p-3">
                                {{-- Tambah Baris --}}
                                <div class="table-responsive">
                                    <div class="" id="details">
                                    </div>

                                    <div class="row pb-4">
                                        <div class="col-12">
                                            <button type="button" class="btn btn-primary waves-effect waves-light btn-add-row-mg mt-2">Tambah Baris</button>
                                        </div>
                                    </div>
                                </div>

                                {{-- Divider --}}
                                <div class="row py-3 px-3">
                                    <hr class="my-3 mx-auto">
                                </div>

                                {{-- Tanda tangan --}}
                                <div class="row  text-center mb-5 ttd">
                                    <div class="col-4 signatures">
                                        <label for="note" class="form-label fw-medium">Diproses Oleh :</label>
                                        <input type="text" value="Checked By" id="type1" name="type" class="form-control d-none">
                                        <div class="mb-3">
                                            <input type="text" class="form-control  " placeholder="Nama" style="text-align:center;" id="name1" name="name" />
                                            <div class="invalid-feedback">Tidak boleh kosong</div>
                                        </div>
                                        <div class="mb-3">
                                            <input type="text" class="form-control  " placeholder="Jabatan" style="text-align:center;" id="jabatan1" name="jabatan1" value="Admin" />
                                            <div class="invalid-feedback">Tidak boleh kosong</div>
                                        </div>
                                        <div class="mb-3">
                                            <div action="/upload" class="dropzone needsclick dz-clickable dd" id="dropzone-1" style="padding: 5px;">
                                                <div class="dz-message needsclick">
                                                    <span class="note needsclick">Unggah Tanda Tangan</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <input type="text" class="form-control date" placeholder="Tanggal" style="text-align:center;" id="date1" name="date" />
                                            <div class="invalid-feedback">Tidak boleh kosong</div>
                                        </div>
                                    </div>
                                    <div class="col-4 signatures">
                                        <label for="note" class="form-label fw-medium">Diperiksa Oleh :</label>
                                        <input type="text" value="Checked By" id="type2" name="type" class="form-control d-none" disabled>
                                        <div class="mb-3">
                                            <input type="text" class="form-control  " placeholder="Nama" style="text-align:center;" id="name2" name="name" disabled />
                                            <div class="invalid-feedback">Tidak boleh kosong</div>
                                        </div>
                                        <div class="mb-3">
                                            <input type="text" class="form-control  " placeholder="Jabatan" style="text-align:center;" id="jabatan2" name="name" value="Kepala Unit" disabled />
                                            <div class="invalid-feedback">Tidak boleh kosong</div>
                                        </div>
                                        <div class="mb-3">
                                            <div action="/upload" class="dropzone needsclick disabled dd" id="dropzone-4" style="padding: 5px;">
                                                <div class="dz-message needsclick">
                                                    <span class="note needsclick">Unggah Tanda Tangan</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <input type="text" class="form-control  date" placeholder="Tanggal" style="text-align:center;" id="date2" name="date" disabled />
                                            <div class="invalid-feedback">Tidak boleh kosong</div>
                                        </div>
                                    </div>
                                    <div class="col-4 signatures">
                                        <label for="note" class="form-label fw-medium">Diketahui Oleh :</label>
                                        <input type="text" value="Known By" id="type3" name="type" class="form-control d-none">
                                        <div class="mb-3">
                                            <input type="text" class="form-control  " placeholder="Nama" style="text-align:center;" id="name3" name="name" disabled />
                                            <div class="invalid-feedback">Tidak boleh kosong</div>
                                        </div>
                                        <div class="mb-3">
                                            <input type="text" class="form-control  " placeholder="Jabatan" style="text-align:center;" id="jabatan3" name="name" value="Kepala BM" disabled />
                                            <div class="invalid-feedback">Tidak boleh kosong</div>
                                        </div>
                                        <div class="mb-3">
                                            <div action="/upload" class="dropzone needsclick disabled dd" id="dropzone-4" style="padding: 5px;">
                                                <div class="dz-message needsclick">
                                                    <span class="note needsclick">Unggah Tanda Tangan</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <input type="text" class="form-control  date" placeholder="Tanggal" style="text-align:center;" id="date3" name="date" disabled />
                                            <div class="invalid-feedback">Tidak boleh kosong</div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row ttd">
                                    <div class="col-2">
                                        <p>
                                            Lembar
                                        </p>
                                    </div>
                                    <div class="col-6 row flex-wrap">
                                        <div class="col-6 order-1">1. Accounting (Putih)</div>
                                        <div class="col-6 order-3">2. Gudang (Merah)</div>

                                        <!-- Force next columns to break to new line -->
                                        <div class="w-100"></div>

                                        <div class="col-6 order-2">3. Purchasing (Hijau)</div>
                                        <div class="col-6 order-4">4. Pemohon (Biru)</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /purchase req Add-->

            <!-- purchase req Actions -->
            <div class="col-lg-3 col-12 purchase-req-actions">
                <div class="card mb-4">
                    <div class="card-body">
                        <button type="submit" id="save" class="btn btn-primary d-grid w-100 mb-2">Simpan</button>
                        <!-- <button class="btn btn-label-secondary d-grid w-100 mb-2 btn-preview">Preview</button> -->
                        <button type="button" class="btn btn-label-secondary btn-cancel d-grid w-100">Batal</button>
                    </div>
                </div>
            </div>
            <!-- /purchase req Actions -->
        </div>
    </form>

</div>
<!-- / Content -->

@endsection

@section('page-script')
<script src="{{ asset('assets/vendor/libs/dropzone/dropzone.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/sweetalert2/sweetalert2.js') }}"></script>
<script src="{{ asset('assets/js/forms-file-upload.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/jquery-repeater/jquery-repeater.js') }}"></script>
<script src="https://demos.pixinvent.com/vuexy-html-laravel-admin-template/demo/assets/vendor/libs/flatpickr/flatpickr.js">
</script>
<script src="https://demos.pixinvent.com/vuexy-html-laravel-admin-template/demo/assets/vendor/libs/moment/moment.js">
</script>
<script>
    let dataLocal = JSON.parse(localStorage.getItem("purchase-request"));

    $(document).ready(function() {

        // let account = {
        //     !!json_encode(session('data')) !!
        // }
        // var levelId = account.level_id;
        // var department = account.department.name;
        // var nameUser = account.name;
        // console.log(levelId);


        // if (levelId == 10) { // BM
        //     var inputValue = $("#name1").val();
        //     if (inputValue.trim() === '') {
        //         $("#name1").val(nameUser);
        //     }
        // }

        // Date
        $('.date').flatpickr({
            dateFormat: 'd-m-Y'
        });

        $("#material_request_id").select2({
            placeholder: 'Select Material Request',
            allowClear: true,
            ajax: {
                url: "{{ env('BASE_URL_API')}}" + '/api/material-request/select',
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

        getDetails();


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
                                            <input type="text" class="form-control row-input" placeholder="No. Suku Cadang" name="part_number[]" required style="width: 200px;" />
                                        </td>
                                        <td>
                                            <input type="date" class="form-control row-input" placeholder="Tanggal" name="last_buy_date[]" required style="width: 200px;" />
                                        </td>
                                        <td>
                                            <input type="text" class="form-control row-input" placeholder="Kuantitas" name="last_buy_quantity[]" required style="width: 200px;" />
                                        </td>
                                        <td>
                                            <input type="text" class="form-control row-input" placeholder="Persediaan" name="last_buy_stock[]" required style="width: 200px;" />
                                        </td>
                                        <td>
                                            <textarea class="form-control row-input" placeholder="Deskripsi" name="description[]" style="width: 200px;"></textarea>
                                        </td>
                                        <td>
                                            <input type="text" class="form-control row-input" placeholder="Kuantitas" name="quantity[]" required style="width: 200px;" />
                                        </td>
                                        <td>
                                            <a role="button" class="btn btn-primary text-center btn-remove-mg text-white ms-4" disabled>
                                                <i class="fas fa-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
            `;
            $details.append($newRow);
        });

        function getDetails() {
            let data = dataLocal;
            let getDetail = '';
            let temp = '';

            if (data) {
                let details = dataLocal.details;
                for (let i = 0; i < details.length; i++) {
                    temp = `
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>Nomor</th>
                                                    <th>Part Number</th>
                                                    <th colspan="3">Pembelian Terakhir</th>
                                                    <th>Keterangan</th>
                                                    <th>Kuantitas</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <input type="text" class="form-control row-input" placeholder="Nomor" name="number[]" required style="width: 200px;" />
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control row-input" placeholder="No. Suku Cadang" name="part_number[]" required style="width: 200px;" />
                                                    </td>
                                                    <td>
                                                        <input type="date" class="form-control row-input" placeholder="Tanggal" name="last_buy_date[]" required style="width: 200px;" />
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control row-input" placeholder="Kuantitas" name="last_buy_quantity[]" required style="width: 200px;" />
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control row-input" placeholder="Persediaan" name="last_buy_stock[]" required style="width: 200px;" />
                                                    </td>
                                                    <td>
                                                        <textarea class="form-control row-input" placeholder="Deskripsi" name="description[]" style="width: 200px;"></textarea>
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control row-input" placeholder="Kuantitas" name="quantity[]" required style="width: 200px;" />
                                                    </td>
                                                    <td>
                                                        <a role="button" class="btn btn-primary text-center btn-remove-mg text-white ms-4" disabled>
                                                            <i class="fas fa-trash"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                    `;
                    getDetail = getDetail + temp;
                }
                $('#details').prepend(getDetail);
            } else {
                temp = `            
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>Nomor</th>
                                                    <th>Part Number</th>
                                                    <th colspan="3" class="text-center">Pembelian Terakhir</th>
                                                    <th>Keterangan</th>
                                                    <th>Kuantitas</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <input type="text" class="form-control row-input" placeholder="Nomor" name="number[]" required style="width: 200px;" />
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control row-input" placeholder="No. Suku Cadang" name="part_number[]" required style="width: 200px;" />
                                                    </td>
                                                    <td>
                                                        <input type="date" class="form-control row-input" placeholder="Tanggal" name="last_buy_date[]" required style="width: 200px;" />
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control row-input" placeholder="Kuantitas" name="last_buy_quantity[]" required style="width: 200px;" />
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control row-input" placeholder="Persediaan" name="last_buy_stock[]" required style="width: 200px;" />
                                                    </td>
                                                    <td>
                                                        <textarea class="form-control row-input" placeholder="Deskripsi" name="description[]" style="width: 200px;"></textarea>
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control row-input" placeholder="Kuantitas" name="quantity[]" required style="width: 200px;" />
                                                    </td>
                                                    <td>
                                                        <a role="button" class="btn btn-primary text-center btn-remove-mg text-white ms-4" disabled>
                                                            <i class="fas fa-trash"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                `;
                $('#details').prepend(temp);
            }
        };







        // Save, Insert and Create
        var savepr = $('#create-pr');

        Array.prototype.slice.call(savepr).forEach(function(form) {
            $('.indicator-progress').hide();
            $('.indicator-label').show();
            form.addEventListener(
                "submit",
                function(event) {
                    if (!form.checkValidity()) {
                        event.preventDefault();
                        event.stopPropagation();
                    } else {
                        event.preventDefault();
                        Swal.fire({
                            title: 'Loading...',
                            text: "Please wait",
                            customClass: {
                                confirmButton: 'd-none'
                            },
                            buttonsStyling: false
                        });
                        let material = $('.select-mr').val();
                        let department = $('.select-department').val();
                        let datas = {}
                        let signatures = []

                        $('#addPurchaseRequest').find('.add').each(function() {
                            var inputId = $(this).attr('id');
                            var inputValue = $("#" + inputId).val();

                            if (inputId === 'total_budget' || inputId ===
                                'proposed_purchase_price' ||
                                inputId === 'remaining_budget') {
                                var inputValueWithoutComma = inputValue.replace(',', '');

                                datas[$("#" + inputId).attr("name")] = parseInt(
                                    inputValueWithoutComma, 10);
                            } else if (inputId === 'tanggal_pr' || inputId ===
                                'tanggal_mr' || inputId === 'request_date') {
                                datas[$("#" + inputId).attr("name")] = moment(inputValue,
                                        'D-M-YYYY')
                                    .format('YYYY-MM-DD');
                            } else {
                                datas[$("#" + inputId).attr("name")] = inputValue;
                            }
                        });

                        datas.details = getRepeaterValues();

                        $('.signatures').each(function(index) {
                            let signature = {};

                            $(this).find('.form-control').each(function() {
                                var inputId = $(this).attr('id');
                                var inputValue = $("#" + inputId).val();

                                if (inputId && inputId.startsWith('date')) {
                                    signature[$("#" + inputId).attr("name")] =
                                        moment(inputValue, 'D-M-YYYY')
                                        .format('YYYY-MM-DD');
                                } else {
                                    signature[$("#" + inputId).attr("name")] =
                                        inputValue;
                                }
                            });

                            if (ttdFile1 && index === 0) {
                                signature['signature'] = ttdFile1.dataURL || ttdFile1.url;
                            }

                            if (ttdFile2 && index === 1) {
                                signature['signature'] = ttdFile2.dataURL || ttdFile2.url;
                            }

                            if (ttdFile3 && index === 2) {
                                signature['signature'] = ttdFile3.dataURL || ttdFile3.url;
                            }
                            signatures.push(signature);
                        });

                        datas.budget_status = $('.checkbox-check:checked').attr('name');
                        datas.material_request_id = parseInt(material);
                        datas.department_id = parseInt(department);
                        datas.signatures = signatures;
                        datas.status = "Terbuat";
                        console.log(datas)
                        $.ajax({
                            url: baseUrl + "api/purchase-request/",
                            type: "POST",
                            data: JSON.stringify(datas),
                            contentType: "application/json; charset=utf-8",
                            dataType: "json",

                            success: function(response) {
                                $('.indicator-progress').show();
                                $('.indicator-label').hide();

                                Swal.fire({
                                    title: 'Berhasil',
                                    text: 'Berhasil menambahkan Purchase Request.',
                                    icon: 'success',
                                    customClass: {
                                        confirmButton: 'btn btn-primary'
                                    },
                                    buttonsStyling: false
                                })

                                window.location.href = "/request/list-purchase-request"
                            },
                            error: function(xhr, status, error) {
                                Swal.fire({
                                    title: 'Error!',
                                    text: xhr.responseJSON.message,
                                    icon: 'error',
                                    customClass: {
                                        confirmButton: 'btn btn-primary'
                                    },
                                    buttonsStyling: false
                                })
                            }
                        });
                    }

                    form.classList.add("was-validated");
                },
                false
            );
        });

        // Preview before save
        $(".btn-preview").on('click', function() {
            let material = $('.select-mr').val();
            let department = $('.select-department').val();
            let datas = {}
            let signatures = []

            $('#addPurchaseRequest').find('.add').each(function() {
                var inputId = $(this).attr('id');
                var inputValue = $("#" + inputId).val();

                if (inputId === 'total_budget' || inputId ===
                    'proposed_purchase_price' ||
                    inputId === 'remaining_budget') {
                    var inputValueWithoutComma = inputValue.replace(',', '');

                    datas[$("#" + inputId).attr("name")] = parseInt(
                        inputValueWithoutComma, 10);
                } else if (inputId === 'tanggal_pr' || inputId ===
                    'tanggal_mr' || inputId === 'request_date') {
                    datas[$("#" + inputId).attr("name")] = moment(inputValue,
                            'D-M-YYYY')
                        .format('YYYY-MM-DD');
                } else {
                    datas[$("#" + inputId).attr("name")] = inputValue;
                }
            });

            datas.details = getRepeaterValues();

            $('.signatures').each(function(index) {
                let signature = {};

                $(this).find('.form-control').each(function() {
                    var inputId = $(this).attr('id');
                    var inputValue = $("#" + inputId).val();

                    if (inputId && inputId.startsWith('date')) {
                        signature[$("#" + inputId).attr("name")] =
                            moment(inputValue, 'D-M-YYYY')
                            .format('YYYY-MM-DD');
                    } else {
                        signature[$("#" + inputId).attr("name")] =
                            inputValue;
                    }
                });

                if (ttdFile1 && index === 0) {
                    signature['signature'] = ttdFile1.dataURL || ttdFile1.url;
                }

                if (ttdFile2 && index === 1) {
                    signature['signature'] = ttdFile2.dataURL || ttdFile2.url;
                }

                if (ttdFile3 && index === 2) {
                    signature['signature'] = ttdFile3.dataURL || ttdFile3.url;
                }
                signatures.push(signature);
            });

            datas.budget_status = $('.checkbox-check:checked').attr('name');
            datas.material_request_id = parseInt(material);
            datas.department_id = parseInt(department);
            datas.signatures = signatures;
            datas.status = "Terbuat";

            localStorage.setItem('purchase-request', JSON.stringify(datas));
            window.location.href = "/request/preview"
        })

        // Mengambil value tanda tangan
        let ttdFile1 = null;
        const myDropzone1 = new Dropzone('#dropzone-1', {
            parallelUploads: 1,
            maxFilesize: 2,
            addRemoveLinks: true,
            maxFiles: 1,
            acceptedFiles: ".jpeg,.jpg,.png",
            autoQueue: false,
            init: function() {
                this.on('addedfile', function(file) {
                    while (this.files.length > this.options.maxFiles) this.removeFile(this
                        .files[0]);
                    ttdFile1 = file;
                });
            }
        });

        // let ttdFile2 = null;
        // const myDropzone2 = new Dropzone('#dropzone-2', {
        //     parallelUploads: 1,
        //     maxFilesize: 2,
        //     addRemoveLinks: true,
        //     maxFiles: 1,
        //     acceptedFiles: ".jpeg,.jpg,.png",
        //     autoQueue: false,
        //     init: function() {
        //         this.on('addedfile', function(file) {
        //             while (this.files.length > this.options.maxFiles) this.removeFile(this
        //                 .files[0]);
        //             ttdFile2 = file;
        //         });
        //     }
        // });

        // let ttdFile3 = null;
        // const myDropzone3 = new Dropzone('#dropzone-3', {
        //     parallelUploads: 1,
        //     maxFilesize: 2,
        //     addRemoveLinks: true,
        //     maxFiles: 1,
        //     acceptedFiles: ".jpeg,.jpg,.png",
        //     autoQueue: false,
        //     init: function() {
        //         this.on('addedfile', function(file) {
        //             while (this.files.length > this.options.maxFiles) this.removeFile(this
        //                 .files[0]);
        //             ttdFile3 = file;
        //         });
        //     }
        // });

        // Select2
        $(".select-department").select2({
            placeholder: 'Select Department',
            allowClear: true,
            ajax: {
                url: "{{ env('BASE_URL_API')}}" + '/api/department/select',
                dataType: 'json',
                cache: true,
                data: function(params) {
                    return {
                        term: params.term || '',
                        page: params.page || 1,
                        field: params.name || 'name'
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

        $(".select-mr").select2({
            placeholder: 'Select Material Request',
            allowClear: true,
            ajax: {
                url: "{{ env('BASE_URL_API')}}" + '/api/material-request/select',
                dataType: 'json',
                cache: true,
                data: function(params) {
                    return {
                        term: params.term || '',
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
      
        $("#department_id").select2({
            placeholder: 'Select Material Request',
            allowClear: true,
            ajax: {
                url: "{{ env('BASE_URL_API')}}" + '/api/departement/select',
                dataType: 'json',
                cache: true,
                data: function(params) {
                    return {
                        term: params.term || '',
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

        // Mengambil data tanggal untuk material request
        $(".select-mr").on('change', function() {
            var id = $(this).val();

            $.ajax({
                url: "{{ env('BASE_URL_API')}}" + '/api/material-request/' + id,
                method: 'GET',
                success: function(res) {
                    let response = res.data;
                    $("#tanggal_mr").val(moment(response.request_date).format(
                        'DD-MM-YYYY'));
                },
                error: function(error) {
                    console.error(error);
                }
            });
        });

        // Cancel
        $(document).on('click', '.btn-cancel', function(event) {
            event.preventDefault();
            localStorage.removeItem('purchase-request');
            window.location.href = "/request/list-purchase-request"
        });

        // Check checkbox classification2
        $(".checkbox").on('change', function() {
            validateCheckboxClassification2();
        })

        function validateCheckboxClassification2() {
            var atLeastOneChecked = $('.checkbox input[type="checkbox"]:checked').length > 0;

            if (!atLeastOneChecked) {
                event.preventDefault();
                event.stopPropagation();
                $('.checkbox .form-check-input').prop("required", true);
            } else {
                $('.checkbox .form-check-input').prop("required", false);
            }
        }

        // Classification 2
        $('.checkbox-check').change(function() {
            if ($(this).is(":checked")) {
                // Menonaktifkan semua checkbox dengan class 'checkbox-check' kecuali yang sedang dipilih
                $('.checkbox-check').not(this).prop('disabled', true);
            } else {
                // Mengaktifkan kembali semua checkbox dengan class 'checkbox-check'
                $('.checkbox-check').prop('disabled', false);
            }
        });

        // Keyup input qty
        $(document).on('input', '.qty', function() {
            var sanitizedValue = $(this).val().replace(/[^0-9]/g, '');
            $(this).val(sanitizedValue);
        });

        // Keyup input price
        $(document).on('input', '.price', function() {
            var sanitizedValue = $(this).val().replace(/[^0-9]/g, '');
            var numericValue = parseInt(sanitizedValue, 10);

            if (!isNaN(numericValue)) {
                var formattedValue = numericValue.toLocaleString('en-US');

                $(this).val(formattedValue);
            }
        });

    });
</script>
@endsection