@php
    $configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Laporan Kerusakan')

@section('page-style')
    {{-- Page Css files --}}
    <link rel="stylesheet"
        href="https://demos.pixinvent.com/vuexy-html-laravel-admin-template/demo/assets/vendor/libs/dropzone/dropzone.css">
    <link rel="stylesheet"
        href="https://demos.pixinvent.com/vuexy-html-laravel-admin-template/demo/assets/vendor/libs/flatpickr/flatpickr.css">
@endsection

@section('content')
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <form id="edit-lk" class="edit-lk" novalidate>
            <div class="row invoice-add">
                <!-- Invoice Add-->
                <div class="col-lg-9 col-12 mb-lg-0 mb-3">
                    <div class="card invoice-preview-card" id="previewLaporanKerusakan">
                        <div class="card-body">
                            <div class="row m-sm-4 m-0">
                                <div class="col-md-7 mb-md-0 mb-4 ps-0">
                                    <h1 class="fw-700" style="margin: 0;"><b>PPPGSI</b></h1>
                                    <h4><b>Building Management</b></h4>
                                </div>
                                <div class="col-md-5">
                                    <span class="fs-4 d-block text-center mx-auto"><b>LAPORAN KERUSAKAN</b></span>
                                    <span class="d-block text-center mx-auto">Nomor Lk :</span>
                                    <input type="text" class="form-control add w-px-250 mx-auto"
                                        id="preview_damage_report_number" name="damage_report_number" placeholder="Nomor LK"
                                        required readonly />
                                    <div class="invalid-feedback mx-auto w-px-250">Tidak boleh kosong</div>
                                </div>
                            </div>
                            <hr class="my-3 mx-n4">

                            <div class="row py-3 px-3">
                                <div class="col-md-6 mb-md-0 mb-3">
                                    <div class="mb-1 w-px-250">
                                        <label for="note" class="form-label fw-medium">No Tiket </label>
                                        <select class="form-select select2 w-px-250 select-ticket item-details mb-3"
                                            required>
                                        </select>
                                        <div class="invalid-feedback">Tidak boleh kosong</div>
                                    </div>
                                    <div class="mb-1">
                                        <label for="note" class="form-label fw-medium">Date</label>
                                        <input type="text" class="form-control add w-px-250"
                                            id="preview_damage_report_date" name="damage_report_date" placeholder="Tanggal"
                                            required readonly />
                                        <div class="invalid-feedback">Tidak boleh kosong</div>
                                    </div>
                                    <div class="mb-1">
                                        <label for="note" class="form-label fw-medium">Scope</label>
                                        <input type="text" class="form-control add w-px-250" id="preview_scope"
                                            name="scope" placeholder="Scope" required readonly />
                                        <div class="invalid-feedback">Tidak boleh kosong</div>
                                    </div>
                                    <div class="mb-1">
                                        <label for="note" class="form-label fw-medium">Classification</label>
                                        <input type="text" class="form-control add w-px-250" id="preview_classification"
                                            name="classification" placeholder="Classification" required readonly />
                                        <div class="invalid-feedback">Tidak boleh kosong</div>
                                    </div>
                                    <div class="mb-1">
                                        <label for="note" class="form-label fw-medium">Action Plan Date</label>
                                        <input type="text" class="form-control add w-px-250"
                                            id="preview_action_plan_date" name="action_plan_date"
                                            placeholder="Action Plan Date" required readonly />
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
                                                        <input type="text" class="form-control" id="preview_category"
                                                            name="category" placeholder="Jenis Masalah Kerusakan" required
                                                            readonly />
                                                        <div class="invalid-feedback">Tidak boleh kosong</div>
                                                    </div>
                                                    <div class="col-4">
                                                        <label for="note" class="form-label fw-medium">Lokasi</label>
                                                        <input type="text" class="form-control" id="preview_location"
                                                            name="location" placeholder="Lokasi" required readonly />
                                                        <div class="invalid-feedback">Tidak boleh kosong</div>
                                                    </div>
                                                    <div class="col-4">
                                                        <label for="note" class="form-label fw-medium">Jumlah</label>
                                                        <input type="text" class="form-control" id="preview_total"
                                                            name="total" placeholder="Jumlah" required readonly />
                                                        <div class="invalid-feedback">Tidak boleh kosong</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <hr class="my-3">
                                    <div class="row  text-center mt-4">
                                        <div class="col-4 signatures">
                                            <div class="mb-3">
                                                <input type="text" class="form-control add"
                                                    placeholder="KA. Unit Pelayanan" style="text-align:center;"
                                                    id="preview_type-1" name="type" required readonly />
                                                <div class="invalid-feedback">Tidak boleh kosong</div>
                                            </div>
                                            <div class="mb-3">
                                                <input type="text" class="form-control add "
                                                    placeholder="Nama & Jabatan" style="text-align:center;"
                                                    id="preview_name-1" name="name" required readonly />
                                                <div class="invalid-feedback">Tidak boleh kosong</div>
                                            </div>
                                            <div class="mb-3 prev-1">
                                                <div
                                                    class="dz-preview dz-processing dz-image-preview dz-success dz-complete">
                                                    <div class="dz-details">
                                                        <div class="dz-thumbnail"> <img class="prev-img-1" alt=""
                                                                src="">
                                                            <span class="dz-nopreview">No preview</span>
                                                        </div>
                                                    </div>
                                                    {{-- <a class="dz-remove" id="1" href="javascript:undefined;"
                                                            data-dz-remove="">Remove file</a> --}}
                                                </div>
                                            </div>
                                            <div class="mb-3 click-1" style="display: none">
                                                <form action="/upload" class="dropzone needsclick dz-clickable w-px-230"
                                                    id="dropzone-1">
                                                    <div class="dz-message needsclick">
                                                        <span class="note needsclick">Unggah Tanda Tangan</span>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="mb-3">
                                                <input type="text" class="form-control add" placeholder="Tanggal"
                                                    style="text-align:center;" id="preview_date-1" name="date"
                                                    required readonly />
                                                <div class="invalid-feedback">Tidak boleh kosong</div>
                                            </div>
                                        </div>
                                        <div class="col-4 signatures">
                                            <div class="mb-3">
                                                <input type="text" class="form-control add"
                                                    placeholder="KA. Unit Pelayanan" style="text-align:center;"
                                                    id="preview_type-2" name="type" required readonly />
                                                <div class="invalid-feedback">Tidak boleh kosong</div>
                                            </div>
                                            <div class="mb-3">
                                                <input type="text" class="form-control add "
                                                    placeholder="Nama & Jabatan" style="text-align:center;"
                                                    id="preview_name-2" name="name" required readonly />
                                                <div class="invalid-feedback">Tidak boleh kosong</div>
                                            </div>
                                            <div class="mb-3 prev-2">
                                                <div
                                                    class="dz-preview dz-processing dz-image-preview dz-success dz-complete">
                                                    <div class="dz-details">
                                                        <div class="dz-thumbnail"> <img class="prev-img-2" alt=""
                                                                src="">
                                                            <span class="dz-nopreview">No preview</span>
                                                        </div>
                                                    </div>
                                                    {{-- <a class="dz-remove" id="2"
                                                        href="javascript:undefined;" data-dz-remove="">Remove
                                                        file</a> --}}
                                                </div>
                                            </div>
                                            <div class="mb-3 click-2" style="display: none">
                                                <form action="/upload" class="dropzone needsclick dz-clickable w-px-230"
                                                    id="dropzone-2">
                                                    <div class="dz-message needsclick">
                                                        <span class="note needsclick">Unggah Tanda Tangan</span>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="mb-3">
                                                <input type="text" class="form-control add" placeholder="Tanggal"
                                                    style="text-align:center;" id="preview_date-2" name="date"
                                                    required readonly />
                                                <div class="invalid-feedback">Tidak boleh kosong</div>
                                            </div>
                                        </div>
                                        <div class="col-4 signatures">
                                            <div class="mb-3">
                                                <input type="text" class="form-control add"
                                                    placeholder="KA. Unit Pelayanan" style="text-align:center;"
                                                    id="preview_type-3" name="type" required readonly />
                                                <div class="invalid-feedback">Tidak boleh kosong</div>
                                            </div>
                                            <div class="mb-3">
                                                <input type="text" class="form-control add "
                                                    placeholder="Nama & Jabatan" style="text-align:center;"
                                                    id="preview_name-3" name="name" required readonly />
                                                <div class="invalid-feedback">Tidak boleh kosong</div>
                                            </div>
                                            <div class="mb-3 prev-3">
                                                <div
                                                    class="dz-preview dz-processing dz-image-preview dz-success dz-complete">
                                                    <div class="dz-details">
                                                        <div class="dz-thumbnail"> <img class="prev-img-3" alt=""
                                                                src="">
                                                            <span class="dz-nopreview">No preview</span>
                                                        </div>
                                                    </div>
                                                    {{-- <a class="dz-remove" id="3"
                                                        href="javascript:undefined;" data-dz-remove="">Remove
                                                        file</a> --}}
                                                </div>
                                            </div>
                                            <div class="mb-3 click-3" style="display: none">
                                                <form action="/upload" class="dropzone needsclick dz-clickable w-px-230"
                                                    id="dropzone-3">
                                                    <div class="dz-message needsclick">
                                                        <span class="note needsclick">Unggah Tanda Tangan</span>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="mb-3">
                                                <input type="text" class="form-control add" placeholder="Tanggal"
                                                    style="text-align:center;" id="preview_date-3" name="date"
                                                    required readonly />
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
                            {{-- <button type="submit" id="edit"
                                class="btn btn-primary d-grid w-100 mb-2">Update</button> --}}
                            {{-- <a href="https://demos.pixinvent.com/vuexy-html-laravel-admin-template/demo-1/app/invoice/preview"
                                class="btn btn-label-secondary d-grid w-100 mb-2">Preview</a> --}}
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
    <script src="{{ asset('assets/vendor/libs/dropzone/dropzone.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/sweetalert2/sweetalert2.js') }}"></script>
    <script src="{{ asset('assets/js/forms-file-upload.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/jquery-repeater/jquery-repeater.js') }}"></script>
    <script
        src="https://demos.pixinvent.com/vuexy-html-laravel-admin-template/demo/assets/vendor/libs/flatpickr/flatpickr.js">
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

            // Mendapatkan id dengan cara mengambil dari URL
            var urlSegments = window.location.pathname.split('/');
            var idIndex = urlSegments.indexOf('preview') + 1;
            var id = urlSegments[idIndex];

            getDataLaporanKerusakan(id)

            // Get data from API
            function getDataLaporanKerusakan(id) {
                Swal.fire({
                    title: '<h2>Loading...</h2>',
                    html: sweet_loader + '<h5>Please Wait</h5>',
                    showConfirmButton: false,
                    allowOutsideClick: false,
                    allowEscapeKey: false
                })

                let response =  JSON.parse(localStorage.getItem('damage-report'));

                // Set value ke form atas
                $('#previewLaporanKerusakan').find('.form-control').each(function() {
                    $("#" + $(this).attr('id')).val(response[$(this).attr(
                        "name")]);
                });
                $('#preview_damage_report_date').val(moment(response.damage_report_date,
                    'YYYY-MM-DD').format('DD-MM-YYYY'));
                $('#preview_action_plan_date').val(moment(response.action_plan_date, 'YYYY-MM-DD')
                    .format('DD-MM-YYYY'));
                $(".select-ticket").empty().append('<option value="' + response.ticket_id +
                    '">' + response.ticket_id + '</option>').val(response.ticket_id);
                localStorage.setItem('status', response.status);

                // Set value ke repeater
                var firstRow = $('.repeater-wrapper').first();

                for (var i = 0; i < response.details.length; i++) {
                    var rowValues = response.details[i];

                    if (i === 0) {
                        firstRow.find('#preview_category').val(rowValues.category);
                        firstRow.find('#preview_location').val(rowValues.location);
                        firstRow.find('#preview_total').val(rowValues.total);
                    } else {
                        var newRow = firstRow.clone();
                        newRow.find('#preview_category').val(rowValues.category);
                        newRow.find('#preview_location').val(rowValues.location);
                        newRow.find('#preview_total').val(rowValues.total);

                        $('.repeater [data-repeater-list="group-a"]').append(newRow);
                    }
                }

                $('.repeater').repeater();

                // Set value ke form signature
                for (let i = 1; i < response.signatures.length + 1; i++) {
                    $("#preview_type-" + i).val(response.signatures[i - 1].type);
                    $("#preview_name-" + i).val(response.signatures[i - 1].name);
                    if (response.signatures[i - 1].signature != '') {
                        $('.prev-img-' + i).attr('src', response.signatures[i - 1]
                            .signature);
                    } else {
                        $('.dz-nopreview').css('display', 'block');
                    }
                    $('#preview_date-' + i).val(moment(response.signatures[i - 1]
                        .date, 'YYYY-MM-DD').format('DD-MM-YYYY'));
                }
                Swal.close();
            }

            // Date
            $('.date').flatpickr({
                dateFormat: 'd-m-Y'
            });

            // Cancel
            $(".btn-cancel").on("click", function() {
                window.location.href = "/complain/laporan-kerusakan"
                localStorage.removeItem('damage-report');
            })

            // Select2
            $('.select-ticket').on("change", (async function(e) {
                $(this).removeClass("is-invalid");
            }));
        });
    </script>
@endsection