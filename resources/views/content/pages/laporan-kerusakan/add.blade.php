@php
$configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Laporan Kerusakan')

@section('page-style')
{{-- Page Css files --}}
<link rel="stylesheet" href="https://demos.pixinvent.com/vuexy-html-laravel-admin-template/demo/assets/vendor/libs/dropzone/dropzone.css">
<link rel="stylesheet" href="https://demos.pixinvent.com/vuexy-html-laravel-admin-template/demo/assets/vendor/libs/flatpickr/flatpickr.css">
@endsection

@section('content')
<!-- Content -->
<div class="container-xxl flex-grow-1 container-p-y">
    <form id="create-lk" class="create-lk" novalidate>
        <div class="row invoice-add">
            <!-- Invoice Add-->
            <div class="col-lg-9 col-12 mb-lg-0 mb-3">
                <div class="card invoice-preview-card" id="addLaporanKerusakan">
                    <div class="card-body">
                        <div class="row m-sm-4 m-0">
                            <div class="col-md-7 mb-md-0 mb-4 ps-0">
                                <h1 class="fw-700" style="margin: 0;"><b>PPPGSI</b></h1>
                                <h4><b>Building Management</b></h4>
                            </div>
                            <div class="col-md-5">
                                <span class="fs-4 d-block text-center mx-auto"><b>LAPORAN KERUSAKAN</b></span>
                                <span class="d-block text-center mx-auto">Nomor Lk :</span>
                                <input type="text" class="form-control add w-px-250 mx-auto" id="damage_report_number" name="damage_report_number" placeholder="Nomor LK" required />
                                <div class="invalid-feedback mx-auto w-px-250">Tidak boleh kosong</div>
                            </div>
                        </div>
                        <hr class="my-3 mx-n4">

                        <div class="row py-3 px-3">
                            <div class="col-md-6 mb-md-0 mb-3">
                                <div class="mb-1 w-px-250">
                                    <label for="note" class="form-label fw-medium">No Tiket </label>
                                    <select class="form-select select2 w-px-250 select-ticket item-details mb-3" required>
                                    </select>
                                    <div class="invalid-feedback">Tidak boleh kosong</div>
                                </div>
                                <div class="mb-1">
                                    <label for="note" class="form-label fw-medium">Date</label>
                                    <input type="text" class="form-control add w-px-250 date" id="damage_report_date" name="damage_report_date" placeholder="Tanggal" required />
                                    <div class="invalid-feedback">Tidak boleh kosong</div>
                                </div>
                                <!-- <div class="mb-1">
                                        <label for="note" class="form-label fw-medium">Scope</label>
                                        <input type="text" class="form-control add w-px-250" id="scope"
                                            name="scope" placeholder="Scope" required />
                                        <div class="invalid-feedback">Tidak boleh kosong</div>
                                    </div>
                                    <div class="mb-1">
                                        <label for="note" class="form-label fw-medium">Classification</label>
                                        <input type="text" class="form-control add w-px-250" id="classification"
                                            name="classification" placeholder="Classification" required />
                                        <div class="invalid-feedback">Tidak boleh kosong</div>
                                    </div> -->
                                <div class="mb-1">
                                    <label for="scope" class="form-label fw-medium">Scope</label>
                                    <select class="form-select add w-px-250 select2 select-scope" id="scope" name="scope[]" multiple required>
                                    </select>
                                    <div class="invalid-feedback">Tidak boleh kosong</div>
                                </div>

                                <div class="mb-1">
                                    <label for="classification" class="form-label fw-medium">Classification</label>
                                    <select class="form-select add w-px-250 select2 select-classification" id="classification" name="classification[]" multiple required>
                                    </select>
                                    <div class="invalid-feedback">Tidak boleh kosong</div>
                                </div>

                                <div class="mb-1">
                                    <label for="note" class="form-label fw-medium">Action Plan Date</label>
                                    <input type="text" class="form-control add w-px-250 date" id="action_plan_date" name="action_plan_date" placeholder="Action Plan Date" required />
                                    <div class="invalid-feedback">Tidak boleh kosong</div>
                                </div>
                            </div>
                            <div class="col-md-6 d-flex justify-content-end">
                                <div class="div">
                                    Kepada Yth. <br>
                                    Dept. Service BM <br>
                                    PPKP GRAHA SURVEYOR INDONESIA <br>
                                    Jakarta
                                </div>
                            </div>
                        </div>

                        <div class="py-3 px-3">
                            <div class="card academy-content shadow-none border p-3">
                                <div class="repeater">
                                    <div class="" data-repeater-list="group-a">
                                        <div class="repeater-wrapper " data-repeater-item>
                                            <div class="row mb-3">
                                                <div class="col-4">
                                                    <label for="note" class="form-label fw-medium">Jenis Masalah
                                                        Kerusakan</label>
                                                    <input type="text" class="form-control" id="category" name="category" placeholder="Jenis Masalah Kerusakan" required />
                                                    <div class="invalid-feedback">Tidak boleh kosong</div>
                                                </div>
                                                <div class="col-4">
                                                    <label for="note" class="form-label fw-medium">Lokasi</label>
                                                    <input type="text" class="form-control" id="location" name="location" placeholder="Lokasi" required />
                                                    <div class="invalid-feedback">Tidak boleh kosong</div>
                                                </div>
                                                <div class="col-3">
                                                    <label for="note" class="form-label fw-medium">Jumlah</label>
                                                    <input type="text" class="form-control qty" id="total" name="total" placeholder="Jumlah" required />
                                                    <div class="invalid-feedback">Tidak boleh kosong</div>
                                                </div>
                                                <a class="mb-3 mx-2 mt-4 btn btn-primary text-white" style="width: 10px; height: 38px" role="button" data-repeater-delete>
                                                    <i class="fas fa-trash"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>



                                    <div class="row pb-4">
                                        <div class="col-12">
                                            <button type="button" class="btn btn-primary waves-effect waves-light" data-repeater-create>Tambah Baris</button>
                                        </div>
                                    </div>
                                </div>


                                <hr class="my-3">
                                <div class="row  text-center mt-4">
                                    <div class="col-4 signatures">
                                        <div class="mb-3">
                                            <input type="text" class="form-control add" placeholder="KA. Unit Pelayanan" style="text-align:center;" id="type" name="type" required />
                                            <div class="invalid-feedback">Tidak boleh kosong</div>
                                        </div>
                                        <div class="mb-3">
                                            <input type="text" class="form-control add " placeholder="Nama & Jabatan" style="text-align:center;" id="name" name="name" required />
                                            <div class="invalid-feedback">Tidak boleh kosong</div>
                                        </div>
                                        <div class="mb-3">
                                            <div action="/upload" class="dropzone needsclick dz-clickable w-px-270" id="dropzone-1">
                                                <div class="dz-message needsclick">
                                                    <span class="note needsclick">Unggah Tanda Tangan</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <input type="text" class="form-control add date" placeholder="Tanggal" style="text-align:center;" id="date1" name="date" required />
                                            <div class="invalid-feedback">Tidak boleh kosong</div>
                                        </div>
                                    </div>
                                    <div class="col-4 signatures">
                                        <div class="mb-3">
                                            <input type="text" class="form-control add" placeholder="KA. Unit Pelayanan" style="text-align:center;" id="type" name="type" required />
                                            <div class="invalid-feedback">Tidak boleh kosong</div>
                                        </div>
                                        <div class="mb-3">
                                            <input type="text" class="form-control add " placeholder="Nama & Jabatan" style="text-align:center;" id="name" name="name" required />
                                            <div class="invalid-feedback">Tidak boleh kosong</div>
                                        </div>
                                        <div class="mb-3">
                                            <div action="/upload" class="dropzone needsclick dz-clickable w-px-270" id="dropzone-2">
                                                <div class="dz-message needsclick">
                                                    <span class="note needsclick">Unggah Tanda Tangan</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <input type="text" class="form-control add date" placeholder="Tanggal" style="text-align:center;" id="date2" name="date" required />
                                            <div class="invalid-feedback">Tidak boleh kosong</div>
                                        </div>
                                    </div>
                                    <div class="col-4 signatures">
                                        <div class="mb-3">
                                            <input type="text" class="form-control add" placeholder="KA. Unit Pelayanan" style="text-align:center;" id="type" name="type" required />
                                            <div class="invalid-feedback">Tidak boleh kosong</div>
                                        </div>
                                        <div class="mb-3">
                                            <input type="text" class="form-control add " placeholder="Nama & Jabatan" style="text-align:center;" id="name" name="name" required />
                                            <div class="invalid-feedback">Tidak boleh kosong</div>
                                        </div>
                                        <div class="mb-3">
                                            <div action="/upload" class="dropzone needsclick dz-clickable w-px-270" id="dropzone-3">
                                                <div class="dz-message needsclick">
                                                    <span class="note needsclick">Unggah Tanda Tangan</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <input type="text" class="form-control add date" placeholder="Tanggal" style="text-align:center;" id="date3" name="date" required />
                                            <div class="invalid-feedback">Tidak boleh kosong</div>
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
                        {{-- <button class="btn btn-primary d-grid w-100 mb-2 btn-save" data-bs-toggle="offcanvas"
                            data-bs-target="#sendInvoiceOffcanvas">
                            <span class="d-flex align-items-center justify-content-center text-nowrap">Simpan</span>
                        </button> --}}
                        <button type="submit" id="save" class="btn btn-primary d-grid w-100 mb-2">Simpan</button>
                        <button class="btn btn-label-secondary d-grid w-100 mb-2 btn-preview">Preview</button>
                        <button type="button" class="btn btn-label-secondary btn-cancel d-grid w-100">Batal</button>
                    </div>
                </div>
            </div>
            <!-- /Invoice Actions -->
        </div>
    </form>


    <!-- Offcanvas -->
    <!-- Send Invoice Sidebar -->
    <div class="offcanvas offcanvas-end" id="sendInvoiceOffcanvas" aria-hidden="true">
        <div class="offcanvas-header my-1">
            <h5 class="offcanvas-title">Send Invoice</h5>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body pt-0 flex-grow-1">
            <form>
                <div class="mb-3">
                    <label for="invoice-from" class="form-label">From</label>
                    <input type="text" class="form-control" id="invoice-from" value="shelbyComapny@email.com" placeholder="company@email.com" />
                </div>
                <div class="mb-3">
                    <label for="invoice-to" class="form-label">To</label>
                    <input type="text" class="form-control" id="invoice-to" value="qConsolidated@email.com" placeholder="company@email.com" />
                </div>
                <div class="mb-3">
                    <label for="invoice-subject" class="form-label">Subject</label>
                    <input type="text" class="form-control" id="invoice-subject" value="Invoice of purchased Admin Templates" placeholder="Invoice regarding goods" />
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
                    <button type="button" class="btn btn-label-secondary" data-bs-dismiss="offcanvas">Cancel</button>
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
<script src="{{ asset('assets/vendor/libs/dropzone/dropzone.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/sweetalert2/sweetalert2.js') }}"></script>
<script src="{{ asset('assets/js/forms-file-upload.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/jquery-repeater/jquery-repeater.js') }}"></script>
<script src="https://demos.pixinvent.com/vuexy-html-laravel-admin-template/demo/assets/vendor/libs/flatpickr/flatpickr.js">
</script>
<script src="https://demos.pixinvent.com/vuexy-html-laravel-admin-template/demo/assets/vendor/libs/moment/moment.js">
</script>


<script>
    $(document).ready(function() {
        $('.repeater').repeater({

        })

        var sweet_loader = `<div class="spinner-border mb-8 text-primary" style="width: 5rem; height: 5rem;" role="status">
                                    <span class="sr-only">Loading...</span>
                                </div>`;

        // Date
        $('.date').flatpickr({
            dateFormat: 'd-m-Y'
        });

        // Fungsi untuk mengambil value dari setiap baris
        function getRepeaterValues() {
            var values = [];

            $('.repeater-wrapper').each(function() {
                var rowValues = {
                    category: $(this).find('#category').val(),
                    location: $(this).find('#location').val(),
                    total: parseInt($(this).find('#total').val()) || 0
                };

                values.push(rowValues);
            });

            return values;
        }

        // Mengambil value tanda tangan
        let ttdFile1 = null;
        const myDropzone1 = new Dropzone('#dropzone-1', {
            parallelUploads: 1,
            maxFilesize: 10,
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

        let ttdFile2 = null;
        const myDropzone2 = new Dropzone('#dropzone-2', {
            parallelUploads: 1,
            maxFilesize: 10,
            addRemoveLinks: true,
            maxFiles: 1,
            acceptedFiles: ".jpeg,.jpg,.png",
            autoQueue: false,
            init: function() {
                this.on('addedfile', function(file) {
                    while (this.files.length > this.options.maxFiles) this.removeFile(this
                        .files[0]);
                    ttdFile2 = file;
                });
            }
        });

        let ttdFile3 = null;
        const myDropzone3 = new Dropzone('#dropzone-3', {
            parallelUploads: 1,
            maxFilesize: 10,
            addRemoveLinks: true,
            maxFiles: 1,
            acceptedFiles: ".jpeg,.jpg,.png",
            autoQueue: false,
            init: function() {
                this.on('addedfile', function(file) {
                    while (this.files.length > this.options.maxFiles) this.removeFile(this
                        .files[0]);
                    ttdFile3 = file;
                });
            }
        });

        // Create, Insert, Save
        var savelk = $('.create-lk');

        Array.prototype.slice.call(savelk).forEach(function(form) {
            $('.indicator-progress').hide();
            $('.indicator-label').show();


            form.addEventListener(
                "submit",
                function(event) {

                    // let scopeValue = $("#scope").val();
                    // let classificationValue = $("#classification").val();

                    // console.log("Scope:", scopeValue);
                    // console.log("Classification:", classificationValue);

                    if (!form.checkValidity()) {
                        event.preventDefault();
                        event.stopPropagation();

                        let damageReportNumber = $("#damage_report_number").val();
                        let ticketNumber = $(".select-ticket").val();
                        let receiptDate = $("#damage_report_date").val();
                        let actionDate = $("#action_plan_date").val();



                        if (!ticketNumber) {
                            $(".select-ticket").addClass("invalid");
                        }
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
                        let ticket = $('.select-ticket').val();
                        let datas = {}
                        let signatures = []

                        $('#addLaporanKerusakan').find('.add').each(function() {
                            var inputId = $(this).attr('id');
                            var inputValue = $("#" + inputId).val();

                            if (inputId === 'grand_total' || inputId === 'paid' ||
                                inputId ===
                                'remaining') {
                                datas[$("#" + inputId).attr("name")] = parseInt(inputValue,
                                    10);
                            } else if (inputId === 'damage_report_date' || inputId ===
                                'action_plan_date') {
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

                                if (inputId.startsWith('date')) {
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

                        var allValues = getRepeaterValues();

                        let scope = $("#scope").val().toString();
                        let classification = $("#classification").val().toString();

                        datas.ticket_id = ticket;
                        datas.signatures = signatures;
                        datas.status = "Terbuat";
                        datas.scope = scope;
                        datas.classification = classification;

                        $.ajax({
                            url: baseUrl + "api/damage-report/",
                            type: "POST",
                            data: JSON.stringify(datas),
                            contentType: "application/json; charset=utf-8",
                            dataType: "json",

                            success: function(response) {
                                $('.indicator-progress').show();
                                $('.indicator-label').hide();

                                Swal.fire({
                                    title: 'Berhasil',
                                    text: 'Berhasil menambahkan Laporan Kerusakan.',
                                    icon: 'success',
                                    customClass: {
                                        confirmButton: 'btn btn-primary'
                                    },
                                    buttonsStyling: false
                                })

                                window.location.href = "/complain/laporan-kerusakan"
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
            let ticket = $('.select-ticket').val();
            let datas = {}
            let signatures = []

            $('#addLaporanKerusakan').find('.add').each(function() {
                var inputId = $(this).attr('id');
                var inputValue = $("#" + inputId).val();

                if (inputId === 'grand_total' || inputId === 'paid' ||
                    inputId ===
                    'remaining') {
                    datas[$("#" + inputId).attr("name")] = parseInt(inputValue,
                        10);
                } else if (inputId === 'damage_report_date' || inputId ===
                    'action_plan_date') {
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

                    if (inputId.startsWith('date')) {
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

            var allValues = getRepeaterValues();
            let scope = $("#scope").val().toString();
            let classification = $("#classification").val().toString();

            datas.ticket_id = ticket;
            datas.signatures = signatures;
            datas.status = "Terbuat";
            datas.scope = scope;
            datas.classification = classification;

            localStorage.setItem('damage-report', JSON.stringify(datas));
            window.location.href = "/complain/laporan-kerusakan/show";
        })

        // Cancel
        $(".btn-cancel").on("click", function() {
            window.location.href = "/complain/laporan-kerusakan"
        })

        // Select2
        $(".select-ticket").select2({
            placeholder: 'Select Ticket',
            allowClear: true,
            ajax: {
                url: "{{ url('api/ticket/select') }}",
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

        $('.select-ticket').on("change", (async function(e) {
            $(this).removeClass("is-invalid");
        }));

        // Select3
        $(".select-scope").select2({
            placeholder: 'Select Scope',
            allowClear: true,
            ajax: {
                url: "{{ url('api/scope/select') }}",
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

        $('.select-scope').on("change", (async function(e) {
            $(this).removeClass("is-invalid");
        }));

        // Select3
        $(".select-classification").select2({
            placeholder: 'Select classification',
            allowClear: true,
            ajax: {
                url: "{{ url('api/classification/select') }}",
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

        $('.select-classification').on("change", (async function(e) {
            $(this).removeClass("is-invalid");
        }));
        // Keyup input qty
        $(document).on('input', '.qty', function() {
            var sanitizedValue = $(this).val().replace(/[^0-9]/g, '');
            $(this).val(sanitizedValue);
        });
    });
</script>
@endsection