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
                                    <input type="text" class="form-control w-px-250" placeholder="Requester" name="requester" id="requester" required />
                                    <div class="invalid-feedback">Tidak boleh kosong</div>
                                </div>
                                <div class="mb-3">
                                    <label for="note" class="form-label fw-medium">Departement </label>
                                    <input type="text" class="form-control w-px-250" placeholder="Departement" name="department" id="department" required />
                                    <div class="invalid-feedback">Tidak boleh kosong</div>
                                </div>
                                <div class="mb-3">
                                    <label for="note" class="form-label fw-medium">Stock </label>
                                    <input type="number" class="form-control w-px-250" placeholder="Stock" id="stock" name="stock" required />
                                    <div class="invalid-feedback">Tidak boleh kosong</div>
                                </div>
                                <div class="mb-3">
                                    <label for="note" class="form-label fw-medium">Purchase </label>
                                    <input type="text" class="form-control w-px-250" placeholder="Purchase" name="purchase" id="purchase" required />
                                    <div class="invalid-feedback">Tidak boleh kosong</div>
                                </div>
                            </div>
                            <div class="col-md-6 d-flex flex-column align-items-end">
                                <div class="mb-3">
                                    <label for="note" class="form-label fw-medium">Tanggal</label>
                                    <input type="text" class="form-control w-px-250 date" placeholder="Tanggal" name="request_date" id="request_date" required />
                                    <div class="invalid-feedback">Tidak boleh kosong</div>
                                </div>
                                <div class="mb-3">
                                    <textarea class="form-control w-px-300" rows="6" id="note" name="note" placeholder="Catatan" required></textarea>
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

                                    <div class="row pb-4">
                                        <div class="col-12">
                                            <button type="button" class="btn btn-primary waves-effect waves-light btn-add-row-mg">Tambah Baris</button>
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
<script src="{{asset('assets/vendor/libs/dropzone/dropzone.js')}}"></script>
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
    let dataLocal = JSON.parse(localStorage.getItem("material-request"));
    $(document).ready(function() {
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

        let ttdFile1, ttdFile2, ttdFile3, ttdFile4 = null;

        const myDropzone1 = new Dropzone('#ttd1', {
            parallelUploads: 1,
            maxFilesize: 3,
            addRemoveLinks: true,
            maxFiles: 1,
            acceptedFiles: ".jpeg,.jpg,.png,.gif",
            autoQueue: false,
            url: "../uploads/logo1",
            init: function() {
                if (dataLocal) {
                    // Add a preloaded file to the dropzone with a preview
                    var mockFile = dataLocal.materai_image;
                    if (mockFile) {
                        this.options.addedfile.call(this, mockFile);
                        this.options.thumbnail.call(this, mockFile, dataLocal.materai_image.dataURL);

                        // Optional: Handle the removal of the file
                        mockFile.previewElement.querySelector(".dz-remove").addEventListener("click", function() {
                            // Handle removal logic here
                        });
                    }
                }
                this.on('addedfile', function(file) {
                    while (this.files.length > this.options.maxFiles) this.removeFile(this.files[0]);
                    ttdFile1 = file;
                })
            }
        });

        const myDropzone2 = new Dropzone('#ttd2', {
            parallelUploads: 1,
            maxFilesize: 3,
            addRemoveLinks: true,
            maxFiles: 1,
            acceptedFiles: ".jpeg,.jpg,.png,.gif",
            autoQueue: false,
            url: "../uploads/logo2",
            init: function() {
                if (dataLocal) {
                    // Add a preloaded file to the dropzone with a preview
                    var mockFile = dataLocal.materai_image;
                    if (mockFile) {
                        this.options.addedfile.call(this, mockFile);
                        this.options.thumbnail.call(this, mockFile, dataLocal.materai_image.dataURL);

                        // Optional: Handle the removal of the file
                        mockFile.previewElement.querySelector(".dz-remove").addEventListener("click", function() {
                            // Handle removal logic here
                        });
                    }
                }
                this.on('addedfile', function(file) {
                    while (this.files.length > this.options.maxFiles) this.removeFile(this.files[0]);
                    ttdFile2 = file;
                })
            }
        });

        const myDropzone3 = new Dropzone('#ttd3', {
            parallelUploads: 1,
            maxFilesize: 3,
            addRemoveLinks: true,
            maxFiles: 1,
            acceptedFiles: ".jpeg,.jpg,.png,.gif",
            autoQueue: false,
            url: "../uploads/logo4",
            init: function() {
                if (dataLocal) {
                    // Add a preloaded file to the dropzone with a preview
                    var mockFile = dataLocal.materai_image;
                    if (mockFile) {
                        this.options.addedfile.call(this, mockFile);
                        this.options.thumbnail.call(this, mockFile, dataLocal.materai_image.dataURL);

                        // Optional: Handle the removal of the file
                        mockFile.previewElement.querySelector(".dz-remove").addEventListener("click", function() {
                            // Handle removal logic here
                        });
                    }
                }
                this.on('addedfile', function(file) {
                    while (this.files.length > this.options.maxFiles) this.removeFile(this.files[0]);
                    ttdFile3 = file;
                })
            }
        });
        const myDropzone4 = new Dropzone('#ttd4', {
            parallelUploads: 1,
            maxFilesize: 3,
            addRemoveLinks: true,
            maxFiles: 1,
            acceptedFiles: ".jpeg,.jpg,.png,.gif",
            autoQueue: false,
            url: "../uploads/logo4",
            init: function() {
                if (dataLocal) {
                    // Add a preloaded file to the dropzone with a preview
                    var mockFile = dataLocal.materai_image;
                    if (mockFile) {
                        this.options.addedfile.call(this, mockFile);
                        this.options.thumbnail.call(this, mockFile, dataLocal.materai_image.dataURL);

                        // Optional: Handle the removal of the file
                        mockFile.previewElement.querySelector(".dz-remove").addEventListener("click", function() {
                            // Handle removal logic here
                        });
                    }
                }
                this.on('addedfile', function(file) {
                    while (this.files.length > this.options.maxFiles) this.removeFile(this.files[0]);
                    ttdFile4 = file;
                })
            }
        });

        if (dataLocal) {
            $("#requester").val(dataLocal.requester);
            $("#department").val(dataLocal.department);
            $("#request_date").val(dataLocal.request_date);
            $("#stock").val(dataLocal.stock);
            $("#purchase").val(dataLocal.purchase);
            $("#note").val(dataLocal.note);
        }

        getDetails();

        $(document).on('click', '.btn-remove-mg', function() {
            // Hapus baris yang ditekan tombol hapus
            $(this).closest('.row-mg').remove();
        });

        $(document).on('click', '.btn-add-row-mg', function() {
            // Clone baris terakhir
            var $details = $('#details');
            var $newRow = `
            <div class="row mb-3 row-mg">
                    <div class="col-12 d-flex align-items-end mb-2">
                        <div class="">
                            <label for="note" class="form-label fw-medium">Nomor</label>
                            <input type="text" class="form-control  w-px-75 row-input" placeholder="Nomor" name="number[]" required/>
                        </div>
                        <div class="me-1">
                            <label for="note" class="form-label fw-medium">Part Number</label>
                            <input type="text" class="form-control  w-px-75 row-input" placeholder="No. Suku Cadang" name="part_number[]" required/>
                        </div>
                        <div class="me-1">
                            <label for="note" class="form-label fw-medium">Deskripsi</label>
                            <input type="text" class="form-control  w-px-75 row-input" placeholder="Deskripsi" name="description[]" required />
                        </div>
                        <div class="me-1">
                            <label for="note" class="form-label fw-medium">Quantity</label>
                            <input type="text" class="form-control  w-px-75 row-input" placeholder="Kuantitas" name="quantity[]" required/>
                        </div>
                        <div class="">
                            <label for="note" class="form-label fw-medium">Filled Storekeeper Only</label>
                        <div class="d-flex justify-content-between">
                            <input type="text" class="form-control  w-px-75 row-input" placeholder="Stock" name="stock" required/>
                            <input type="text" class="form-control  w-px-75 row-input" placeholder="Stock Out" name="stock_out[]" required/>
                            <input type="text" class="form-control  w-px-75 row-input" placeholder="End Stock" name="end_stock[]" required/>
                            <input type="text" class="form-control  w-px-75 row-input" placeholder="Min Stock" name="min_stock[]" required/>
                            <a class="btn-remove-mg" role="button">
                                <svg xmlns="http://www.w3.org/2000/svg" width="9" height="9" viewBox="0 0 12 12" fill="none">
                                    <circle cx="6" cy="6" r="6" fill="#D9D9D9" />
                                    <path d="M6.70432 5.99276L8.85224 3.8544C8.9463 3.76053 8.99915 3.63323 8.99915 3.50049C8.99915 3.36775 8.9463 3.24045 8.85224 3.14659C8.75818 3.05273 8.63061 3 8.49759 3C8.36456 3 8.23699 3.05273 8.14293 3.14659L6 5.28994L3.85707 3.14659C3.76301 3.05273 3.63544 3 3.50241 3C3.36939 3 3.24182 3.05273 3.14776 3.14659C3.0537 3.24045 3.00085 3.36775 3.00085 3.50049C3.00085 3.63323 3.0537 3.76053 3.14776 3.8544L5.29568 5.99276L3.14776 8.13113C3.10094 8.17747 3.06378 8.23259 3.03842 8.29334C3.01306 8.35408 3 8.41923 3 8.48503C3 8.55083 3.01306 8.61598 3.03842 8.67672C3.06378 8.73746 3.10094 8.79259 3.14776 8.83893C3.19419 8.88565 3.24944 8.92273 3.31031 8.94804C3.37118 8.97335 3.43647 8.98637 3.50241 8.98637C3.56836 8.98637 3.63365 8.97335 3.69452 8.94804C3.75539 8.92273 3.81063 8.88565 3.85707 8.83893L6 6.69558L8.14293 8.83893C8.18937 8.88565 8.24461 8.92273 8.30548 8.94804C8.36635 8.97335 8.43164 8.98637 8.49759 8.98637C8.56353 8.98637 8.62882 8.97335 8.68969 8.94804C8.75056 8.92273 8.80581 8.88565 8.85224 8.83893C8.89906 8.79259 8.93622 8.73746 8.96158 8.67672C8.98694 8.61598 9 8.55083 9 8.48503C9 8.41923 8.98694 8.35408 8.96158 8.29334C8.93622 8.23259 8.89906 8.17747 8.85224 8.13113L6.70432 5.99276Z" fill="#FF4747" />
                                </svg>
                            </a>

                        </div>
                    </div>
                </div>
            `;
            $details.append($newRow);
        });

    });

    function getDetails() {
        let data = dataLocal;
        let getDetail = '';
        let temp = '';

        if (data) {
            let details = dataLocal.details;
            console.log(details.length);
            for (let i = 0; i < details.length; i++) {
                temp = `
                <div class="row mb-3 row-mg">
                    <div class="col-12 d-flex align-items-end mb-2">
                        <div class="">
                            <label for="note" class="form-label fw-medium">Nomor</label>
                            <input type="text" class="form-control w-px-75 row-input" placeholder="Nomor" name="number[]"  value="` + details[i].number + `" required/>
                        </div>
                        <div class="me-1">
                            <label for="note" class="form-label fw-medium">Part Number</label>
                            <input type="text" class="form-control w-px-75 row-input" placeholder="No. Suku Cadang" name="part_number[]" value="` + details[i].part_number + `" required/>
                        </div>
                        <div class="me-1">
                            <label for="note" class="form-label fw-medium">Deskripsi</label>
                            <input type="text" class="form-control w-px-75 row-input" placeholder="Deskripsi" name="description[]" value="` + details[i].description + `" required />
                        </div>
                        <div class="me-1">
                            <label for="note" class="form-label fw-medium">Quantity</label>
                            <input type="text" class="form-control w-px-75 row-input" placeholder="Kuantitas" name="quantity[]" value="` + details[i].quantity + `" required/>
                        </div>
                        <div class="">
                            <label for="note" class="form-label fw-medium">Filled Storekeeper Only</label>
                        <div class="d-flex justify-content-between">
                            <input type="text" class="form-control w-px-75 row-input" placeholder="Stock" name="stock[]" value="` + details[i].stock + `" required/>
                            <input type="text" class="form-control w-px-75 row-input" placeholder="Stock Out" name="stock_out[]" value="` + details[i].stock_out + `" required/>
                            <input type="text" class="form-control w-px-75 row-input" placeholder="End Stock" name="end_stock[]" value="` + details[i].end_stock + `" required/>
                            <input type="text" class="form-control w-px-75 row-input" placeholder="Min Stock" name="min_stock[]" value="` + details[i].min_stock + `" required/>
                            <a class="btn-remove-mg" role="button">
                                <svg xmlns="http://www.w3.org/2000/svg" width="9" height="9" viewBox="0 0 12 12" fill="none">
                                    <circle cx="6" cy="6" r="6" fill="#D9D9D9" />
                                    <path d="M6.70432 5.99276L8.85224 3.8544C8.9463 3.76053 8.99915 3.63323 8.99915 3.50049C8.99915 3.36775 8.9463 3.24045 8.85224 3.14659C8.75818 3.05273 8.63061 3 8.49759 3C8.36456 3 8.23699 3.05273 8.14293 3.14659L6 5.28994L3.85707 3.14659C3.76301 3.05273 3.63544 3 3.50241 3C3.36939 3 3.24182 3.05273 3.14776 3.14659C3.0537 3.24045 3.00085 3.36775 3.00085 3.50049C3.00085 3.63323 3.0537 3.76053 3.14776 3.8544L5.29568 5.99276L3.14776 8.13113C3.10094 8.17747 3.06378 8.23259 3.03842 8.29334C3.01306 8.35408 3 8.41923 3 8.48503C3 8.55083 3.01306 8.61598 3.03842 8.67672C3.06378 8.73746 3.10094 8.79259 3.14776 8.83893C3.19419 8.88565 3.24944 8.92273 3.31031 8.94804C3.37118 8.97335 3.43647 8.98637 3.50241 8.98637C3.56836 8.98637 3.63365 8.97335 3.69452 8.94804C3.75539 8.92273 3.81063 8.88565 3.85707 8.83893L6 6.69558L8.14293 8.83893C8.18937 8.88565 8.24461 8.92273 8.30548 8.94804C8.36635 8.97335 8.43164 8.98637 8.49759 8.98637C8.56353 8.98637 8.62882 8.97335 8.68969 8.94804C8.75056 8.92273 8.80581 8.88565 8.85224 8.83893C8.89906 8.79259 8.93622 8.73746 8.96158 8.67672C8.98694 8.61598 9 8.55083 9 8.48503C9 8.41923 8.98694 8.35408 8.96158 8.29334C8.93622 8.23259 8.89906 8.17747 8.85224 8.13113L6.70432 5.99276Z" fill="#FF4747" />
                                </svg>
                            </a>

                        </div>
                    </div>
                </div>
                `;
                getDetail = getDetail + temp;
            }
            $('#details').prepend(getDetail);
        } else {
            temp = `             
            <div class="row mb-3 row-mg">
                    <div class="col-12 d-flex align-items-end mb-2">
                        <div class="">
                            <label for="note" class="form-label fw-medium">Nomor</label>
                            <input type="text" class="form-control  w-px-75 row-input" placeholder="Nomor" name="number[]" required/>
                        </div>
                        <div class="me-1">
                            <label for="note" class="form-label fw-medium">Part Number</label>
                            <input type="text" class="form-control  w-px-75 row-input" placeholder="No. Suku Cadang" name="part_number[]" required/>
                        </div>
                        <div class="me-1">
                            <label for="note" class="form-label fw-medium">Deskripsi</label>
                            <input type="text" class="form-control  w-px-75 row-input" placeholder="Deskripsi" name="description[]" required />
                        </div>
                        <div class="me-1">
                            <label for="note" class="form-label fw-medium">Quantity</label>
                            <input type="text" class="form-control  w-px-75 row-input" placeholder="Kuantitas" name="quantity[]" required/>
                        </div>
                        <div class="">
                            <label for="note" class="form-label fw-medium">Filled Storekeeper Only</label>
                        <div class="d-flex justify-content-between">
                            <input type="text" class="form-control  w-px-75 row-input" placeholder="Stock" name="stock[]" required/>
                            <input type="text" class="form-control  w-px-75 row-input" placeholder="Stock Out" name="stock_out[]" required/>
                            <input type="text" class="form-control  w-px-75 row-input" placeholder="End Stock" name="end_stock[]" required/>
                            <input type="text" class="form-control  w-px-75 row-input" placeholder="Min Stock" name="min_stock"[] required/>
                            <a class="btn-remove-mg" role="button">
                                <svg xmlns="http://www.w3.org/2000/svg" width="9" height="9" viewBox="0 0 12 12" fill="none">
                                    <circle cx="6" cy="6" r="6" fill="#D9D9D9" />
                                    <path d="M6.70432 5.99276L8.85224 3.8544C8.9463 3.76053 8.99915 3.63323 8.99915 3.50049C8.99915 3.36775 8.9463 3.24045 8.85224 3.14659C8.75818 3.05273 8.63061 3 8.49759 3C8.36456 3 8.23699 3.05273 8.14293 3.14659L6 5.28994L3.85707 3.14659C3.76301 3.05273 3.63544 3 3.50241 3C3.36939 3 3.24182 3.05273 3.14776 3.14659C3.0537 3.24045 3.00085 3.36775 3.00085 3.50049C3.00085 3.63323 3.0537 3.76053 3.14776 3.8544L5.29568 5.99276L3.14776 8.13113C3.10094 8.17747 3.06378 8.23259 3.03842 8.29334C3.01306 8.35408 3 8.41923 3 8.48503C3 8.55083 3.01306 8.61598 3.03842 8.67672C3.06378 8.73746 3.10094 8.79259 3.14776 8.83893C3.19419 8.88565 3.24944 8.92273 3.31031 8.94804C3.37118 8.97335 3.43647 8.98637 3.50241 8.98637C3.56836 8.98637 3.63365 8.97335 3.69452 8.94804C3.75539 8.92273 3.81063 8.88565 3.85707 8.83893L6 6.69558L8.14293 8.83893C8.18937 8.88565 8.24461 8.92273 8.30548 8.94804C8.36635 8.97335 8.43164 8.98637 8.49759 8.98637C8.56353 8.98637 8.62882 8.97335 8.68969 8.94804C8.75056 8.92273 8.80581 8.88565 8.85224 8.83893C8.89906 8.79259 8.93622 8.73746 8.96158 8.67672C8.98694 8.61598 9 8.55083 9 8.48503C9 8.41923 8.98694 8.35408 8.96158 8.29334C8.93622 8.23259 8.89906 8.17747 8.85224 8.13113L6.70432 5.99276Z" fill="#FF4747" />
                                </svg>
                            </a>

                        </div>
                    </div>
                </div>
            `;
            $('#details').prepend(temp);
        }

        var saveMaterial = $('.create-material-request');

        Array.prototype.slice.call(saveMaterial).forEach(function(form) {
            $('.indicator-progress').hide();
            $('.indicator-label').show();
            form.addEventListener(
                "submit",
                function(event) {
                    if (!form.checkValidity()) {
                        event.preventDefault();
                        event.stopPropagation();
                    } else {
                        // Submit your form
                        event.preventDefault();
                        // let fileTtd = ttdFile.dataURL;
                        let requester = $("#requester").val();
                        let department = $("#department").val();
                        let request_date = $("#request_date").val();
                        let stock = $("#stock").val();
                        let purchase = $("#purchase").val();
                        let note = $("#purchase").val();

                        let datas = {};

                        var details = [];
                        $('.row-input').each(function(index) {
                            var input_name = $(this).attr('name');
                            var input_value = $(this).val();
                            var input_index = Math.floor(index / 8); // Membagi setiap 5 input menjadi satu objek pada array
                            if (index % 8 == 0) {
                                details[input_index] = {
                                    number: input_value
                                };
                            } else if (index % 8 == 1) {
                                details[input_index].part_number = input_value;
                            } else if (index % 8 == 2) {
                                details[input_index].description = input_value;
                            } else if (index % 8 == 3) {
                                details[input_index].quantity = input_value;
                            } else if (index % 8 == 4) {
                                details[input_index].stock = input_value;
                            } else if (index % 8 == 5) {
                                details[input_index].stock_out = input_value;
                            } else if (index % 8 == 6) {
                                details[input_index].end_stock = input_value;
                            } else if (index % 8 == 7) {
                                details[input_index].min_stock = input_value;
                            }
                        });


                        datas.details = details;
                        datas.requester = requester;
                        datas.department = department;
                        datas.purchase = purchase;
                        datas.stock = stock;
                        datas.request_date = request_date;
                        datas.note = note;
                        datas.status = 'Terbuat';


                        console.log(datas);


                        $.ajax({
                            url: baseUrl + "api/material-request/",
                            type: "POST",
                            data: JSON.stringify(datas),
                            contentType: "application/json; charset=utf-8",
                            dataType: "json",

                            success: function(response) {
                                $('.indicator-progress').show();
                                $('.indicator-label').hide();

                                Swal.fire({
                                    title: 'Berhasil',
                                    text: 'Berhasil menambahkan Invoice',
                                    icon: 'success',
                                    customClass: {
                                        confirmButton: 'btn btn-primary'
                                    },
                                    buttonsStyling: false
                                })

                                localStorage.removeItem('invoice');
                                window.location.href = "/request/material-request"
                            },
                            error: function(xhr, status, error) {
                                Swal.fire({
                                    title: 'Error!',
                                    text: ' You clicked the button!',
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

    }

    $(document).on('click', '#preview', function(event) {
        event.preventDefault();
        let requester = $("#requester").val();
        let department = $("#department").val();
        let request_date = $("#request_date").val();
        let stock = $("#stock").val();
        let purchase = $("#purchase").val();
        let note = $("#purchase").val();

        let datas = {};

        var details = [];
        $('.row-input').each(function(index) {
            var input_name = $(this).attr('name');
            var input_value = $(this).val();
            var input_index = Math.floor(index / 8); // Membagi setiap 5 input menjadi satu objek pada array
            if (index % 8 == 0) {
                details[input_index] = {
                    number: input_value
                };
            } else if (index % 8 == 1) {
                details[input_index].part_number = input_value;
            } else if (index % 8 == 2) {
                details[input_index].description = input_value;
            } else if (index % 8 == 3) {
                details[input_index].quantity = input_value;
            } else if (index % 8 == 4) {
                details[input_index].stock = input_value;
            } else if (index % 8 == 5) {
                details[input_index].stock_out = input_value;
            } else if (index % 8 == 6) {
                details[input_index].end_stock = input_value;
            } else if (index % 8 == 7) {
                details[input_index].min_stock = input_value;
            }
        });

        console.log(details);


        datas.details = details;
        datas.requester = requester;
        datas.department = department;
        datas.purchase = purchase;
        datas.stock = stock;
        datas.request_date = request_date;
        datas.note = note;
        datas.status = 'Terbuat';
        localStorage.setItem("material-request", JSON.stringify(datas));
        window.location.href = "/request/material-request/preview"
    });

    $(document).on('click', '#batal', function(event) {
        event.preventDefault();
        localStorage.removeItem('invoice');
        window.location.href = "/request/material-request"
    });
</script>
@endsection