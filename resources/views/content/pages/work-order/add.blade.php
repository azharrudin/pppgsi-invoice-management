@php
$configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Laporan Kerusakan')

@section('page-style')
{{-- Page Css files --}}
<link rel="stylesheet" href="{{asset('assets/vendor/libs/flatpickr/flatpickr.css')}}">
@endsection

@section('content')
<!-- Content -->
<div class="container-xxl flex-grow-1 container-p-y">
    <form id="create-wo" class="create-wo" novalidate>
        <div class="row invoice-add">
            <!-- Invoice Add-->
            <div class="col-lg-9 col-12 mb-lg-0 mb-3">
                <div class="card invoice-preview-card" id="addWorkOrder">
                    <div class="card-body">
                        <div class="row m-sm-4 m-0">
                            <div class="col-md-7 mb-md-0 mb-4 ps-0">
                                <h1 class="fw-700" style="margin: 0;"><b>PPPGSI</b></h1>
                                <h4><b>Building Management</b></h4>
                            </div>
                            <div class="col-md-5">
                                <span class="fs-2"><b>Work Order</b></span>
                                <span class="d-block text-center mx-auto">Nomor WO :</span>
                            </div>
                        </div>
                        <hr class="my-3 mx-n4">

                        <div class="row py-3 px-3">
                            <div class="col-md-3">
                                <div class="mb-1">
                                    <label for="note" class="form-label fw-medium">No Lap Kerusakan </label>
                                    <select class="form-select select2 w-px-250 select-lk item-details mb-3" required>
                                    </select>
                                    <div class="invalid-feedback">Tidak boleh kosong</div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-1">
                                    <label for="note" class="form-label fw-medium">Date </label>
                                    <input type="text" class="form-control date add" id="work_order_date" name="work_order_date" placeholder="Date" required />
                                    <div class="invalid-feedback">Tidak boleh kosong</div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-1">
                                    <label for="note" class="form-label fw-medium">Action Plan </label>
                                    <input type="text" class="form-control date add" id="action_plan_date" name="action_plan_date" placeholder="Action Plan" required />
                                    <div class="invalid-feedback">Tidak boleh kosong</div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-1">
                                    <label for="note" class="form-label fw-medium">Finish Plan </label>
                                    <input type="text" class="form-control date add" id="finish_plan" name="finish_plan" placeholder="Finish Plan" required />
                                    <div class="invalid-feedback">Tidak boleh kosong</div>
                                </div>
                            </div>
                        </div>

                        <div class="row py-3 px-3">
                            <div class="col-12">
                                <label for="note" class="form-label fw-medium">Scope </label>
                                <div class="">
                                    <div class="form-check form-check-inline check1">
                                        <input class="form-check-input scope-checkbox" type="checkbox" name="telekomunikasi" id="telekomunikasi" required>
                                        <label class="form-check-label" for="telekomunikasi">Telekomunikasi</label>
                                    </div>
                                    <div class="form-check form-check-inline check1">
                                        <input class="form-check-input scope-checkbox" type="checkbox" name="electric" id="electric" required>
                                        <label class="form-check-label" for="electric">Electric</label>
                                    </div>
                                    <div class="form-check form-check-inline check1">
                                        <input class="form-check-input scope-checkbox" type="checkbox" name="plumbing" id="plumbing" required>
                                        <label class="form-check-label" for="plumbing">Plumbing</label>
                                    </div>
                                    <div class="form-check form-check-inline check1">
                                        <input class="form-check-input scope-checkbox" type="checkbox" name="civil" id="civil" required>
                                        <label class="form-check-label" for="civil">Civil</label>
                                    </div>
                                    <div class="form-check form-check-inline check1">
                                        <input class="form-check-input scope-checkbox" type="checkbox" name="bas" id="bas" required>
                                        <label class="form-check-label" for="bas">BAS</label>
                                    </div>
                                    <div class="form-check form-check-inline check1">
                                        <input class="form-check-input scope-checkbox" type="checkbox" name="mdp" id="mdp" required>
                                        <label class="form-check-label" for="mdp">MDP</label>
                                    </div>
                                </div>
                                <div class="">
                                    <div class="form-check form-check-inline check1">
                                        <input class="form-check-input scope-checkbox" type="checkbox" name="telekomunikasi" required id="telekomunikasi2">
                                        <label class="form-check-label" for="telekomunikasi2">Telekomunikasi</label>
                                    </div>
                                    <div class="form-check form-check-inline check1">
                                        <input class="form-check-input scope-checkbox" type="checkbox" name="hvac" required id="hvac">
                                        <label class="form-check-label" for="hvac">HVAC</label>
                                    </div>
                                    <div class="form-check form-check-inline check1">
                                        <input class="form-check-input scope-checkbox" type="checkbox" name="lift" required id="lift">
                                        <label class="form-check-label" for="lift">Lift</label>
                                    </div>
                                    <div class="form-check form-check-inline check1">
                                        <input class="form-check-input scope-checkbox" type="checkbox" name="fire system" required id="fireSystem">
                                        <label class="form-check-label" for="fireSystem">Fire System</label>
                                    </div>
                                    <div class="form-check form-check-inline check1">
                                        <input class="form-check-input scope-checkbox" type="checkbox" name="genset" required id="genset">
                                        <label class="form-check-label" for="genset">GENSET</label>
                                    </div>
                                    <div class="form-check form-check-inline check1">
                                        <input class="form-check-input scope-checkbox" type="checkbox" name="others" required id="others">
                                        <label class="form-check-label" for="others">Others</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row py-3 px-3">
                            <div class="col-12">
                                <label for="note" class="form-label fw-medium">Classification</label>
                                <div class="">
                                    <div class="form-check form-check-inline classif">
                                        <input class="form-check-input classif-checkbox" type="checkbox" name="previous maintenance routine" id="mainRoutine" required>
                                        <label class="form-check-label" for="mainRoutine">Prev. Maint Routine</label>
                                    </div>
                                    <div class="form-check form-check-inline classif">
                                        <input class="form-check-input classif-checkbox" type="checkbox" name="previous maintenance non routine" id="prevnonroutine" required>
                                        <label class="form-check-label" for="prevnonroutine">Prev Maint Non
                                            Routine</label>
                                    </div>
                                    <div class="form-check form-check-inline classif">
                                        <input class="form-check-input classif-checkbox" type="checkbox" name="repair" id="repair" required>
                                        <label class="form-check-label" for="repair">Repair</label>
                                    </div>
                                    <div class="form-check form-check-inline classif">
                                        <input class="form-check-input classif-checkbox" type="checkbox" name="replacement" id="replacement" required>
                                        <label class="form-check-label" for="replacement">Replacement</label>
                                    </div>
                                    <div class="form-check form-check-inline classif">
                                        <input class="form-check-input classif-checkbox" type="checkbox" name="vendor" id="vendor" required>
                                        <label class="form-check-label" for="vendor">Vendor</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row py-3 px-3">
                            <div class="col-12">
                                <div class="mb-3">
                                    <label for="note" class="form-label fw-medium">Job deskription:</label>
                                    <textarea class="form-control add" rows="5" id="job_description" name="job_description" placeholder="Job deskription" required></textarea>
                                    <div class="invalid-feedback">Tidak boleh kosong</div>
                                </div>
                            </div>
                        </div>

                        <div class="py-3 px-3">
                            <div class="card academy-content shadow-none border p-3">
                                <div class="repeater">
                                    <div class="" data-repeater-list="group-a">
                                        <div class="repeater-wrapper " data-repeater-item>
                                            <div class="row mb-3">
                                                <div class="col-3">
                                                    <label for="note" class="form-label fw-medium">Location</label>
                                                    <input type="text" class="form-control  " id="location" name="location" placeholder="Location" required />
                                                    <div class="invalid-feedback">Tidak boleh kosong</div>
                                                </div>
                                                <div class="col-3">
                                                    <label for="note" class="form-label fw-medium">Material
                                                        Request</label>
                                                    <input type="text" class="form-control  " id="material-req" name="material-req" placeholder="Material Request" required />
                                                    <div class="invalid-feedback">Tidak boleh kosong</div>
                                                </div>
                                                <div class="col-3">
                                                    <label for="note" class="form-label fw-medium">Type /Made
                                                        In</label>
                                                    <input type="text" class="form-control  " id="type" name="type" placeholder="Type /Made In" required />
                                                    <div class="invalid-feedback">Tidak boleh kosong</div>
                                                </div>
                                                <div class="col-2">
                                                    <label for="note" class="form-label fw-medium">Quantity</label>
                                                    <input type="text" class="form-control qty" id="qty" name="qty" placeholder="Quantity" required />
                                                    <div class="invalid-feedback">Tidak boleh kosong</div>
                                                </div>
                                                <a class="mb-3 mx-2 mt-4" style="width: 10px" role="button" data-repeater-delete>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12" fill="none">
                                                        <circle cx="6" cy="6" r="6" fill="#D9D9D9" />
                                                        <path d="M6.70432 5.99276L8.85224 3.8544C8.9463 3.76053 8.99915 3.63323 8.99915 3.50049C8.99915 3.36775 8.9463 3.24045 8.85224 3.14659C8.75818 3.05273 8.63061 3 8.49759 3C8.36456 3 8.23699 3.05273 8.14293 3.14659L6 5.28994L3.85707 3.14659C3.76301 3.05273 3.63544 3 3.50241 3C3.36939 3 3.24182 3.05273 3.14776 3.14659C3.0537 3.24045 3.00085 3.36775 3.00085 3.50049C3.00085 3.63323 3.0537 3.76053 3.14776 3.8544L5.29568 5.99276L3.14776 8.13113C3.10094 8.17747 3.06378 8.23259 3.03842 8.29334C3.01306 8.35408 3 8.41923 3 8.48503C3 8.55083 3.01306 8.61598 3.03842 8.67672C3.06378 8.73746 3.10094 8.79259 3.14776 8.83893C3.19419 8.88565 3.24944 8.92273 3.31031 8.94804C3.37118 8.97335 3.43647 8.98637 3.50241 8.98637C3.56836 8.98637 3.63365 8.97335 3.69452 8.94804C3.75539 8.92273 3.81063 8.88565 3.85707 8.83893L6 6.69558L8.14293 8.83893C8.18937 8.88565 8.24461 8.92273 8.30548 8.94804C8.36635 8.97335 8.43164 8.98637 8.49759 8.98637C8.56353 8.98637 8.62882 8.97335 8.68969 8.94804C8.75056 8.92273 8.80581 8.88565 8.85224 8.83893C8.89906 8.79259 8.93622 8.73746 8.96158 8.67672C8.98694 8.61598 9 8.55083 9 8.48503C9 8.41923 8.98694 8.35408 8.96158 8.29334C8.93622 8.23259 8.89906 8.17747 8.85224 8.13113L6.70432 5.99276Z" fill="#FF4747" />
                                                    </svg>
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

                                <div class="row py-3">
                                    <div class="col-12">
                                        <label for="note" class="form-label fw-medium">Classification</label>
                                        <div class="">
                                            <div class="form-check form-check-inline classif2">
                                                <input class="form-check-input classif2-checkbox" type="checkbox" name="closed" id="closed" required>
                                                <label class="form-check-label" for="closed">Closed
                                                </label>
                                            </div>
                                            <div class="form-check form-check-inline classif2">
                                                <input class="form-check-input classif2-checkbox" type="checkbox" name="cancelled" id="cancelled" required>
                                                <label class="form-check-label" for="cancelled">Calceled</label>
                                            </div>
                                            <div class="form-check form-check-inline classif2">
                                                <input class="form-check-input classif2-checkbox" type="checkbox" name="explanation" id="explanation" required>
                                                <label class="form-check-label" for="explanation">Explanation</label>
                                            </div>
                                            <div class="form-check form-check-inline classif2">
                                                <input class="form-check-input classif2-checkbox" type="checkbox" name="others" id="others" required>
                                                <label class="form-check-label" for="others">Others</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <label for="note" class="form-label fw-medium">Technician</label>
                                <div class="row  text-center">
                                    <div class="col-3 signatures">
                                        <div class="mb-3">
                                            <input type="text" class="form-control" placeholder="Technician" id="technician1" name="technician" style="text-align:center;" required />
                                            <div class="invalid-feedback">Tidak boleh kosong</div>
                                        </div>
                                        <div class="mb-3">
                                            <input type="text" class="form-control " placeholder="Nama & Jabatan" id="nama1" name="name" style="text-align:center;" required />
                                            <div class="invalid-feedback">Tidak boleh kosong</div>
                                        </div>
                                        <div class="mb-3">
                                            <div action="/upload" class="dropzone needsclick dz-clickable dd" id="dropzone-1"  style="padding: 5px;">
                                                <div class="dz-message needsclick">
                                                    <span class="note needsclick">Unggah Tanda Tangan</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <input type="text" class="form-control date" placeholder="Tanggal" name="date" id="date1" style="text-align:center;" required />
                                            <div class="invalid-feedback">Tidak boleh kosong</div>
                                        </div>
                                    </div>
                                    <div class="col-3 signatures">
                                        <div class="mb-3">
                                            <input type="text" class="form-control" placeholder="Technician" id="technician2" name="technician" style="text-align:center;" required />
                                            <div class="invalid-feedback">Tidak boleh kosong</div>
                                        </div>
                                        <div class="mb-3">
                                            <input type="text" class="form-control " placeholder="Nama & Jabatan" id="nama2" name="name" style="text-align:center;" required />
                                            <div class="invalid-feedback">Tidak boleh kosong</div>
                                        </div>
                                        <div class="mb-3">
                                            <div action="/upload" class="dropzone needsclick dz-clickable dd" id="dropzone-2"  style="padding: 5px;">
                                                <div class="dz-message needsclick">
                                                    <span class="note needsclick">Unggah Tanda Tangan</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <input type="text" class="form-control date" placeholder="Tanggal" id="date2" name="date" style="text-align:center;" required />
                                            <div class="invalid-feedback">Tidak boleh kosong</div>
                                        </div>
                                    </div>
                                    <div class="col-3 signatures">
                                        <div class="mb-3">
                                            <input type="text" class="form-control" placeholder="Technician" id="technician3" name="technician" style="text-align:center;" required />
                                            <div class="invalid-feedback">Tidak boleh kosong</div>
                                        </div>
                                        <div class="mb-3">
                                            <input type="text" class="form-control " placeholder="Nama & Jabatan" id="nama3" name="name" style="text-align:center;" required />
                                            <div class="invalid-feedback">Tidak boleh kosong</div>
                                        </div>
                                        <div class="mb-3">
                                            <div action="/upload" class="dropzone needsclick dz-clickable dd" id="dropzone-3"  style="padding: 5px;">
                                                <div class="dz-message needsclick">
                                                    <span class="note needsclick">Unggah Tanda Tangan</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <input type="text" class="form-control date" placeholder="Tanggal" id="date3" name="date" style="text-align:center;" required />
                                            <div class="invalid-feedback">Tidak boleh kosong</div>
                                        </div>
                                    </div>
                                    <div class="col-3 signatures">
                                        <div class="mb-3">
                                            <input type="text" class="form-control" placeholder="Technician" id="technician4" name="technician" style="text-align:center;" required />
                                            <div class="invalid-feedback">Tidak boleh kosong</div>
                                        </div>
                                        <div class="mb-3">
                                            <input type="text" class="form-control " placeholder="Nama & Jabatan" id="nama4" name="name" style="text-align:center;" required />
                                            <div class="invalid-feedback">Tidak boleh kosong</div>
                                        </div>
                                        <div class="mb-3">
                                            <div action="/upload" class="dropzone needsclick dz-clickable dd" id="dropzone-4"  style="padding: 5px;">
                                                <div class="dz-message needsclick">
                                                    <span class="note needsclick">Unggah Tanda Tangan</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <input type="text" class="form-control date" placeholder="Tanggal" id="date4" name="date" style="text-align:center;" required />
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
                        <button type="submit" id="save" class="btn btn-primary d-grid w-100 mb-2">Simpan</button>
                        <button class="btn btn-label-secondary d-grid w-100 mb-2 btn-preview">Preview</button>
                        <button type="button" class="btn btn-label-secondary d-grid w-100 btn-cancel">Batal</button>
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

        // Loader
        var sweet_loader = `<div class="spinner-border mb-8 text-primary" style="width: 5rem; height: 5rem;" role="status">
                                    <span class="sr-only">Loading...</span>
                                </div>`;

        // Date
        $('.date').flatpickr({
            dateFormat: 'd-m-Y'
        });

        // Check date
        $("#finish_plan").on('change', function() {
            validateDate();
        })

        function validateDate() {
            var checkDate = $('#finish_plan').val();

            if (checkDate === null) {
                event.preventDefault();
                event.stopPropagation();
                $('#finish_plan').addClass("invalid");
            } else {
                $('#finish_plan').removeClass("invalid");
            }
        }

        $("#action_plan_date").on('change', function() {
            validateActionPlan();
        })

        function validateActionPlan() {
            var checkDate = $('#action_plan_date').val();

            if (checkDate === null) {
                event.preventDefault();
                event.stopPropagation();
                $('#action_plan_date').addClass("invalid");
            } else {
                $('#action_plan_date').removeClass("invalid");
            }
        }

        $("#work_order_date").on('change', function() {
            validateWODate();
        })

        function validateWODate() {
            var checkDate = $('#work_order_date').val();

            if (checkDate === null) {
                event.preventDefault();
                event.stopPropagation();
                $('#work_order_date').addClass("invalid");
            } else {
                $('#work_order_date').removeClass("invalid");
            }
        }

        // Check checkbox Scope
        $(".check1").on('change', function() {
            validateCheckbox();
        })

        function validateCheckbox() {
            var atLeastOneChecked = $('.check1 input[type="checkbox"]:checked').length > 0;

            if (!atLeastOneChecked) {
                event.preventDefault();
                event.stopPropagation();
                $('.check1 .form-check-input').prop("required", true);
            } else {
                $('.check1 .form-check-input').prop("required", false);
            }
        }

        // Check checkbox Classification
        $(".classif").on('change', function() {
            validateCheckboxClassification();
        })

        function validateCheckboxClassification() {
            var atLeastOneChecked = $('.classif input[type="checkbox"]:checked').length > 0;

            if (!atLeastOneChecked) {
                event.preventDefault();
                event.stopPropagation();
                $('.classif .form-check-input').prop("required", true);
            } else {
                $('.classif .form-check-input').prop("required", false);
            }
        }

        // Check checkbox classification2
        $(".classif2").on('change', function() {
            validateCheckboxClassification2();
        })

        function validateCheckboxClassification2() {
            var atLeastOneChecked = $('.classif2 input[type="checkbox"]:checked').length > 0;

            if (!atLeastOneChecked) {
                event.preventDefault();
                event.stopPropagation();
                $('.classif2 .form-check-input').prop("required", true);
            } else {
                $('.classif2 .form-check-input').prop("required", false);
            }
        }

        // Create, Insert, Save
        var savewo = $('.create-wo');

        Array.prototype.slice.call(savewo).forEach(function(form) {
            $('.indicator-progress').hide();
            $('.indicator-label').show();
            form.addEventListener(
                "submit",
                function(event) {
                    if (!form.checkValidity()) {
                        event.preventDefault();
                        event.stopPropagation();

                        let wod = $("#work_order_date").val();
                        let lk = $(".select-lk").val();
                        let finishPlan = $("#finish_plan").val();
                        let actionDate = $("#action_plan_date").val();

                        if (!lk) {
                            $(".select-lk").addClass("invalid");
                        }
                        if (!finishPlan) {
                            $("#finish_plan").addClass("invalid");
                        }
                        if (!actionDate) {
                            $("#action_plan_date").addClass("invalid");
                        }
                        if (!wod) {
                            $("#work_order_date").addClass("invalid");
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
                        let lk = $(".select-lk").val();
                        let datas = {}
                        let signatures = [];

                        datas.damage_report_id = lk;
                        $('#addWorkOrder').find('.add').each(function() {
                            var inputId = $(this).attr('id');
                            var inputValue = $("#" + inputId).val();

                            if (inputId === 'work_order_date' || inputId ===
                                'action_plan_date' || inputId === 'finish_plan') {
                                datas[$("#" + inputId).attr("name")] = moment(inputValue,
                                        'D-M-YYYY')
                                    .format('YYYY-MM-DD');
                            } else {
                                datas[$("#" + inputId).attr("name")] = inputValue;
                            }
                        });

                        datas.scope = $('.scope-checkbox:checked').attr('name');
                        datas.classification = $('.classif-checkbox:checked').attr('name');
                        datas.klasifikasi = $('.classif2-checkbox:checked').attr('name');
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

                            if (ttdFile4 && index === 3) {
                                signature['signature'] = ttdFile4.dataURL || ttdFile4.url;
                            }

                            signatures.push(signature);
                        });

                        datas.signatures = signatures;
                        datas.status = "Terbuat";

                        $.ajax({
                            url: baseUrl + "api/work-order",
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
                                    text: errors.responseJSON.message,
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

        let ttdFile2 = null;
        const myDropzone2 = new Dropzone('#dropzone-2', {
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
                    ttdFile2 = file;
                });
            }
        });

        let ttdFile3 = null;
        const myDropzone3 = new Dropzone('#dropzone-3', {
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
                    ttdFile3 = file;
                });
            }
        });

        let ttdFile4 = null;
        const myDropzone4 = new Dropzone('#dropzone-4', {
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
                    ttdFile4 = file;
                });
            }
        });

        // Fungsi untuk mengambil value dari setiap baris
        function getRepeaterValues() {
            var values = [];

            $('.repeater-wrapper').each(function() {
                var rowValues = {
                    location: $(this).find('#location').val(),
                    material_request: $(this).find('#material-req').val(),
                    type: $(this).find('#type').val(),
                    quantity: parseInt($(this).find('#qty').val()) || 0
                };

                values.push(rowValues);
            });

            return values;
        }

        // Cancel
        $(".btn-cancel").on("click", function() {
            window.location.href = "/complain/work-order"
        })

        // Preview before save
        $(".btn-preview").on('click', function() {
            let lk = $(".select-lk").val();
            let datas = {}
            let signatures = [];

            datas.damage_report_id = lk;
            $('#addWorkOrder').find('.add').each(function() {
                var inputId = $(this).attr('id');
                var inputValue = $("#" + inputId).val();

                if (inputId === 'work_order_date' || inputId ===
                    'action_plan_date' || inputId === 'finish_plan') {
                    datas[$("#" + inputId).attr("name")] = moment(inputValue,
                            'D-M-YYYY')
                        .format('YYYY-MM-DD');
                } else {
                    datas[$("#" + inputId).attr("name")] = inputValue;
                }
            });

            datas.scope = $('.scope-checkbox:checked').attr('name');
            datas.classification = $('.classif-checkbox:checked').attr('name');
            datas.klasifikasi = $('.classif2-checkbox:checked').attr('name');
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

                if (ttdFile4 && index === 3) {
                    signature['signature'] = ttdFile4.dataURL || ttdFile4.url;
                }

                signatures.push(signature);
            });

            datas.signatures = signatures;
            datas.status = "Terbuat";

            localStorage.setItem('work-order', JSON.stringify(datas));
            window.location.href = "/complain/work-order/preview";
        })

        // Select2
        $(".select-lk").select2({
            placeholder: 'Select Damage Report',
            allowClear: true,
            ajax: {
                url: "{{ url('api/damage-report/select') }}",
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

        // Keyup input qty
        $(document).on('input', '.qty', function() {
            // Menghapus karakter yang bukan angka
            var sanitizedValue = $(this).val().replace(/[^0-9]/g, '');

            // Menetapkan nilai bersih kembali ke input
            $(this).val(sanitizedValue);
        });

        // Validasi untuk checkbox hanya bisa pilih satu
        // Scope
        $('.scope-checkbox').change(function() {
            if ($(this).is(":checked")) {
                // Menonaktifkan semua checkbox dengan class 'scope-checkbox' kecuali yang sedang dipilih
                $('.scope-checkbox').not(this).prop('disabled', true);
            } else {
                // Mengaktifkan kembali semua checkbox dengan class 'scope-checkbox'
                $('.scope-checkbox').prop('disabled', false);
            }
        });

        // Classification
        $('.classif-checkbox').change(function() {
            if ($(this).is(":checked")) {
                // Menonaktifkan semua checkbox dengan class 'classif-checkbox' kecuali yang sedang dipilih
                $('.classif-checkbox').not(this).prop('disabled', true);
            } else {
                // Mengaktifkan kembali semua checkbox dengan class 'classif-checkbox'
                $('.classif-checkbox').prop('disabled', false);
            }
        });

        // Classification 2
        $('.classif2-checkbox').change(function() {
            if ($(this).is(":checked")) {
                // Menonaktifkan semua checkbox dengan class 'classif2-checkbox' kecuali yang sedang dipilih
                $('.classif2-checkbox').not(this).prop('disabled', true);
            } else {
                // Mengaktifkan kembali semua checkbox dengan class 'classif2-checkbox'
                $('.classif2-checkbox').prop('disabled', false);
            }
        });
    });
</script>
@endsection