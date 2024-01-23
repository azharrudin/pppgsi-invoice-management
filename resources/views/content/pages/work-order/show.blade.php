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
    <div id="create-wo" class="create-wo" novalidate>
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
                            <div class="col-md-3 pe-none">
                                <div class="mb-1">
                                    <label for="note" class="form-label fw-medium">No Lap Kerusakan </label>
                                    <select class="form-select select2 w-px-250 select-lk item-details mb-3" required>
                                    </select>
                                    <div class="invalid-feedback">Tidak boleh kosong</div>
                                </div>
                            </div>
                            <div class="col-md-3 pe-none">
                                <div class="mb-1">
                                    <label for="note" class="form-label fw-medium">Date </label>
                                    <input type="text" class="form-control date add" id="work_order_date" name="work_order_date" placeholder="Date" required readonly />
                                    <div class="invalid-feedback">Tidak boleh kosong</div>
                                </div>
                            </div>
                            <div class="col-md-3 pe-none">
                                <div class="mb-1">
                                    <label for="note" class="form-label fw-medium">Action Plan </label>
                                    <input type="text" class="form-control date add" id="action_plan_date" name="action_plan_date" placeholder="Action Plan" required readonly />
                                    <div class="invalid-feedback">Tidak boleh kosong</div>
                                </div>
                            </div>
                            <div class="col-md-3 pe-none">
                                <div class="mb-1">
                                    <label for="note" class="form-label fw-medium">Finish Plan </label>
                                    <input type="text" class="form-control date add" id="finish_plan" name="finish_plan" placeholder="Finish Plan" required readonly />
                                    <div class="invalid-feedback">Tidak boleh kosong</div>
                                </div>
                            </div>
                        </div>

                        <div class="row py-3 px-3 pe-none">
                            <div class="col-12">
                                <label for="note" class="form-label fw-medium">Scope </label>
                                <div class="">
                                    <div class="form-check form-check-inline check1">
                                        <input class="form-check-input scope-checkbox" type="checkbox" name="telekomunikasi" id="telekomunikasi" required readonly>
                                        <label class="form-check-label" for="telekomunikasi">Telekomunikasi</label>
                                    </div>
                                    <div class="form-check form-check-inline check1">
                                        <input class="form-check-input scope-checkbox" type="checkbox" name="electric" id="electric" required readonly>
                                        <label class="form-check-label" for="electric">Electric</label>
                                    </div>
                                    <div class="form-check form-check-inline check1">
                                        <input class="form-check-input scope-checkbox" type="checkbox" name="plumbing" id="plumbing" required readonly>
                                        <label class="form-check-label" for="plumbing">Plumbing</label>
                                    </div>
                                    <div class="form-check form-check-inline check1">
                                        <input class="form-check-input scope-checkbox" type="checkbox" name="civil" id="civil" required readonly>
                                        <label class="form-check-label" for="civil">Civil</label>
                                    </div>
                                    <div class="form-check form-check-inline check1">
                                        <input class="form-check-input scope-checkbox" type="checkbox" name="bas" id="bas" required readonly>
                                        <label class="form-check-label" for="bas">BAS</label>
                                    </div>
                                    <div class="form-check form-check-inline check1">
                                        <input class="form-check-input scope-checkbox" type="checkbox" name="mdp" id="mdp" required readonly>
                                        <label class="form-check-label" for="mdp">MDP</label>
                                    </div>
                                </div>
                                <div class="">
                                    {{-- <div class="form-check form-check-inline check1">
                                            <input class="form-check-input scope-checkbox" type="checkbox"
                                                name="telekomunikasi" required readonly id="telekomunikasi2">
                                            <label class="form-check-label" for="telekomunikasi2">Telekomunikasi</label>
                                        </div> --}}
                                    <div class="form-check form-check-inline check1">
                                        <input class="form-check-input scope-checkbox" type="checkbox" name="hvac" required readonly id="hvac">
                                        <label class="form-check-label" for="hvac">HVAC</label>
                                    </div>
                                    <div class="form-check form-check-inline check1">
                                        <input class="form-check-input scope-checkbox" type="checkbox" name="lift" required readonly id="lift">
                                        <label class="form-check-label" for="lift">Lift</label>
                                    </div>
                                    <div class="form-check form-check-inline check1">
                                        <input class="form-check-input scope-checkbox" type="checkbox" name="fire system" required readonly id="fireSystem">
                                        <label class="form-check-label" for="fireSystem">Fire System</label>
                                    </div>
                                    <div class="form-check form-check-inline check1">
                                        <input class="form-check-input scope-checkbox" type="checkbox" name="genset" required readonly id="genset">
                                        <label class="form-check-label" for="genset">GENSET</label>
                                    </div>
                                    <div class="form-check form-check-inline check1">
                                        <input class="form-check-input scope-checkbox" type="checkbox" name="others" required readonly id="others">
                                        <label class="form-check-label" for="others">Others</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row py-3 px-3 pe-none">
                            <div class="col-12">
                                <label for="note" class="form-label fw-medium">Classification</label>
                                <div class="">
                                    <div class="form-check form-check-inline classif">
                                        <input class="form-check-input classif-checkbox" type="checkbox" name="previous maintenance routine" id="mainRoutine" required readonly>
                                        <label class="form-check-label" for="mainRoutine">Prev. Maint Routine</label>
                                    </div>
                                    <div class="form-check form-check-inline classif">
                                        <input class="form-check-input classif-checkbox" type="checkbox" name="previous maintenance non routine" id="prevnonroutine" required readonly>
                                        <label class="form-check-label" for="prevnonroutine">Prev Maint Non
                                            Routine</label>
                                    </div>
                                    <div class="form-check form-check-inline classif">
                                        <input class="form-check-input classif-checkbox" type="checkbox" name="repair" id="repair" required readonly>
                                        <label class="form-check-label" for="repair">Repair</label>
                                    </div>
                                    <div class="form-check form-check-inline classif">
                                        <input class="form-check-input classif-checkbox" type="checkbox" name="replacement" id="replacement" required readonly>
                                        <label class="form-check-label" for="replacement">Replacement</label>
                                    </div>
                                    <div class="form-check form-check-inline classif">
                                        <input class="form-check-input classif-checkbox" type="checkbox" name="vendor" id="vendor" required readonly>
                                        <label class="form-check-label" for="vendor">Vendor</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row py-3 px-3">
                            <div class="col-12">
                                <div class="mb-3">
                                    <label for="note" class="form-label fw-medium">Job deskription:</label>
                                    <textarea class="form-control add" rows="5" id="job_description" name="job_description" placeholder="Job deskription" required readonly></textarea>
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
                                                    <input type="text" class="form-control  " id="location" name="location" placeholder="Location" required readonly />
                                                    <div class="invalid-feedback">Tidak boleh kosong</div>
                                                </div>
                                                <div class="col-3">
                                                    <label for="note" class="form-label fw-medium">Material
                                                        Request</label>
                                                    <input type="text" class="form-control  " id="material-req" name="material-req" placeholder="Material Request" required readonly />
                                                    <div class="invalid-feedback">Tidak boleh kosong</div>
                                                </div>
                                                <div class="col-3">
                                                    <label for="note" class="form-label fw-medium">Type /Made
                                                        In</label>
                                                    <input type="text" class="form-control  " id="type" name="type" placeholder="Type /Made In" required readonly />
                                                    <div class="invalid-feedback">Tidak boleh kosong</div>
                                                </div>
                                                <div class="col-3">
                                                    <label for="note" class="form-label fw-medium">Quantity</label>
                                                    <input type="text" class="form-control qty" id="qty" name="qty" placeholder="Quantity" required readonly />
                                                    <div class="invalid-feedback">Tidak boleh kosong</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row py-3 pe-none">
                                    <div class="col-12">
                                        <label for="note" class="form-label fw-medium">Classification</label>
                                        <div class="">
                                            <div class="form-check form-check-inline classif2">
                                                <input class="form-check-input classif2-checkbox" type="checkbox" name="closed" id="closed" required readonly>
                                                <label class="form-check-label" for="closed">Closed
                                                </label>
                                            </div>
                                            <div class="form-check form-check-inline classif2">
                                                <input class="form-check-input classif2-checkbox" type="checkbox" name="cancelled" id="cancelled" required readonly>
                                                <label class="form-check-label" for="cancelled">Calceled</label>
                                            </div>
                                            <div class="form-check form-check-inline classif2">
                                                <input class="form-check-input classif2-checkbox" type="checkbox" name="explanation" id="explanation" required readonly>
                                                <label class="form-check-label" for="explanation">Explanation</label>
                                            </div>
                                            <div class="form-check form-check-inline classif2">
                                                <input class="form-check-input classif2-checkbox" type="checkbox" name="others" id="others" required readonly>
                                                <label class="form-check-label" for="others">Others</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <label for="note" class="form-label fw-medium">Technician</label>
                                <div class="row  text-center">
                                    <div class="col-3 signatures">
                                        <div class="mb-3">
                                            <input type="text" class="form-control" placeholder="Technician" id="technician1" name="technician" style="text-align:center;" required readonly />
                                            <div class="invalid-feedback">Tidak boleh kosong</div>
                                        </div>
                                        <div class="mb-3">
                                            <input type="text" class="form-control " placeholder="Nama & Jabatan" id="nama1" name="name" style="text-align:center;" required readonly />
                                            <div class="invalid-feedback">Tidak boleh kosong</div>
                                        </div>
                                        <div class="mb-3">
                                            <div class="dz-preview dz-processing dz-image-preview dz-success dz-complete">
                                                <div class="dz-details">
                                                    <div class="dz-thumbnail"> <img class="prev-img-1" alt="" src="">
                                                        <span class="dz-nopreview">No preview</span>
                                                    </div>
                                                </div>
                                                {{-- <a class="dz-remove" id="3"
                                                        href="javascript:undefined;" data-dz-remove="">Remove
                                                        file</a> --}}
                                            </div>
                                        </div>
                                        <div class="mb-3 pe-none">
                                            <input type="text" class="form-control date" placeholder="Tanggal" name="date" id="date1" style="text-align:center;" required readonly />
                                            <div class="invalid-feedback">Tidak boleh kosong</div>
                                        </div>
                                    </div>
                                    <div class="col-3 signatures">
                                        <div class="mb-3">
                                            <input type="text" class="form-control" placeholder="Technician" id="technician2" name="technician" style="text-align:center;" required readonly />
                                            <div class="invalid-feedback">Tidak boleh kosong</div>
                                        </div>
                                        <div class="mb-3">
                                            <input type="text" class="form-control " placeholder="Nama & Jabatan" id="nama2" name="name" style="text-align:center;" required readonly />
                                            <div class="invalid-feedback">Tidak boleh kosong</div>
                                        </div>
                                        <div class="mb-3">
                                            <div class="dz-preview dz-processing dz-image-preview dz-success dz-complete">
                                                <div class="dz-details">
                                                    <div class="dz-thumbnail"> <img class="prev-img-2" alt="" src="">
                                                        <span class="dz-nopreview">No preview</span>
                                                    </div>
                                                </div>
                                                {{-- <a class="dz-remove" id="3"
                                                        href="javascript:undefined;" data-dz-remove="">Remove
                                                        file</a> --}}
                                            </div>
                                        </div>
                                        <div class="mb-3 pe-none">
                                            <input type="text" class="form-control date" placeholder="Tanggal" id="date2" name="date" style="text-align:center;" required readonly />
                                            <div class="invalid-feedback">Tidak boleh kosong</div>
                                        </div>
                                    </div>
                                    <div class="col-3 signatures">
                                        <div class="mb-3">
                                            <input type="text" class="form-control" placeholder="Technician" id="technician3" name="technician" style="text-align:center;" required readonly />
                                            <div class="invalid-feedback">Tidak boleh kosong</div>
                                        </div>
                                        <div class="mb-3">
                                            <input type="text" class="form-control " placeholder="Nama & Jabatan" id="nama3" name="name" style="text-align:center;" required readonly />
                                            <div class="invalid-feedback">Tidak boleh kosong</div>
                                        </div>
                                        <div class="mb-3">
                                            <div class="dz-preview dz-processing dz-image-preview dz-success dz-complete">
                                                <div class="dz-details">
                                                    <div class="dz-thumbnail"> <img class="prev-img-3" alt="" src="">
                                                        <span class="dz-nopreview">No preview</span>
                                                    </div>
                                                </div>
                                                {{-- <a class="dz-remove" id="3"
                                                        href="javascript:undefined;" data-dz-remove="">Remove
                                                        file</a> --}}
                                            </div>
                                        </div>
                                        <div class="mb-3 pe-none">
                                            <input type="text" class="form-control date" placeholder="Tanggal" id="date3" name="date" style="text-align:center;" required readonly />
                                            <div class="invalid-feedback">Tidak boleh kosong</div>
                                        </div>
                                    </div>
                                    <div class="col-3 signatures">
                                        <div class="mb-3">
                                            <input type="text" class="form-control" placeholder="Technician" id="technician4" name="technician" style="text-align:center;" required readonly />
                                            <div class="invalid-feedback">Tidak boleh kosong</div>
                                        </div>
                                        <div class="mb-3">
                                            <input type="text" class="form-control " placeholder="Nama & Jabatan" id="nama4" name="name" style="text-align:center;" required readonly />
                                            <div class="invalid-feedback">Tidak boleh kosong</div>
                                        </div>
                                        <div class="mb-3">
                                            <div class="dz-preview dz-processing dz-image-preview dz-success dz-complete">
                                                <div class="dz-details">
                                                    <div class="dz-thumbnail"> <img class="prev-img-4" alt="" src="">
                                                        <span class="dz-nopreview">No preview</span>
                                                    </div>
                                                </div>
                                                {{-- <a class="dz-remove" id="3"
                                                        href="javascript:undefined;" data-dz-remove="">Remove
                                                        file</a> --}}
                                            </div>
                                        </div>
                                        <div class="mb-3 pe-none">
                                            <input type="text" class="form-control date" placeholder="Tanggal" id="date4" name="date" style="text-align:center;" required readonly />
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
                        <a href="/complain/work-order/add" class="btn btn-label-secondary d-grid w-100 mb-2">Edit Work Order</a>
                        <button type="button" class="btn btn-label-secondary d-grid w-100 btn-cancel">Batal</button>
                    </div>
                </div>
            </div>
            <!-- /Invoice Actions -->
        </div>
    </div>

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

        // Get Data
        Swal.fire({
            title: 'Loading...',
            text: "Please wait",
            customClass: {
                confirmButton: 'd-none'
            },
            buttonsStyling: false
        });
        getDataWorkOrder();

        function getDataWorkOrder() {
            let response = JSON.parse(localStorage.getItem('work-order'));
            $('#addWorkOrder').find('.form-control').each(function() {
                var elementId = $(this).attr('id');
                var elementName = $(this).attr('name');

                if (elementId === 'work_order_date' || elementId ===
                    'action_plan_date' || elementId === 'finish_plan') {
                    // Format tanggal menggunakan moment.js
                    $("#" + elementId).val(moment(response[elementName],
                        'YYYY-MM-DD').format('DD-MM-YYYY'));
                } else {
                    $("#" + elementId).val(response[elementName]);
                }
            });

            // Mengambil data lk
            if (response.damage_report_id) {
                $.ajax({
                    url: "{{ env('BASE_URL_API')}}" +'/api/damage-report/' + response.damage_report_id,
                    type: "GET",
                    contentType: "application/json; charset=utf-8",
                    dataType: "json",
                    success: function(res) {
                        $(".select-lk").empty().append('<option value="' + res.data
                            .id + '">' + res.data.damage_report_number +
                            '</option>').val(
                            res.data.id).trigger("change");
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

            // Set value ke repeater
            var firstRow = $('.repeater-wrapper').first();

            if (response.work_order_details) {
                for (var i = 0; i < response.work_order_details.length; i++) {
                    var rowValues = response.work_order_details[i];

                    if (i === 0) {
                        firstRow.find('#location').val(rowValues.location);
                        firstRow.find('#material-req').val(rowValues.material_request);
                        firstRow.find('#type').val(rowValues.type);
                        firstRow.find('#qty').val(rowValues.quantity);
                    } else {
                        var newRow = firstRow.clone();
                        newRow.find('#location').val(rowValues.location);
                        newRow.find('#material-req').val(rowValues.material_request);
                        newRow.find('#type').val(rowValues.type);
                        newRow.find('#qty').val(rowValues.quantity);

                        $('.repeater [data-repeater-list="group-a"]').append(newRow);
                    }
                }
            }

            $('.repeater').repeater();

            $('.scope-checkbox').each(function() {

                var checkboxName = $(this).attr('name').toLowerCase();

                if (response.scope) {
                    if ((response.scope).toLowerCase() === checkboxName) {
                        $('.scope-checkbox').not(this).prop('disabled', true);
                        $(this).prop('checked', true);
                    } else {
                        $(this).prop('checked', false);
                    }
                }
            });

            $('.classif-checkbox').each(function() {
                var checkboxName = $(this).attr('name').toLowerCase();

                if (response.classification) {
                    if ((response.classification).toLowerCase() === checkboxName) {
                        $('.classif-checkbox').not(this).prop('disabled', true);
                        $(this).prop('checked', true);
                    } else {
                        $(this).prop('checked', false);
                    }
                }
            });

            $('.classif2-checkbox').each(function() {
                var checkboxName = $(this).attr('name').toLowerCase();

                if (response.klasifikasi) {
                    if ((response.klasifikasi).toLowerCase() === checkboxName) {
                        $('.classif2-checkbox').not(this).prop('disabled', true);
                        $(this).prop('checked', true);
                    } else {
                        $(this).prop('checked', false);
                    }
                }
            });

            // Set value ke form signature
            if (response.work_order_signatures) {
                for (let i = 1; i < response.work_order_signatures.length + 1; i++) {
                    $("#nama" + i).val(response.work_order_signatures[i - 1].name);
                    if (response.work_order_signatures[i - 1].signature != '') {
                        $('.prev-img-' + i).attr('src', response.work_order_signatures[i - 1]
                            .signature);
                    } else {
                        $('.dz-nopreview').css('display', 'block');
                    }
                    $('#date' + i).val(moment(response.work_order_signatures[i - 1]
                        .date, 'YYYY-MM-DD').format('DD-MM-YYYY'));
                }
            }
            Swal.close();
        }

        // Create, Insert, Save
        // var savewo = $('.create-wo');

        // Array.prototype.slice.call(savewo).forEach(function(form) {
        //     $('.indicator-progress').hide();
        //     $('.indicator-label').show();
        //     form.addEventListener(
        //         "submit",
        //         function(event) {
        //             if (!form.checkValidity()) {
        //                 event.preventDefault();
        //                 event.stopPropagation();

        //                 let wod = $("#work_order_date").val();
        //                 let lk = $(".select-lk").val();
        //                 let finishPlan = $("#finish_plan").val();
        //                 let actionDate = $("#action_plan_date").val();

        //                 if (!lk) {
        //                     $(".select-lk").addClass("invalid");
        //                 }
        //                 if (!finishPlan) {
        //                     $("#finish_plan").addClass("invalid");
        //                 }
        //                 if (!actionDate) {
        //                     $("#action_plan_date").addClass("invalid");
        //                 }
        //                 if (!wod) {
        //                     $("#work_order_date").addClass("invalid");
        //                 }
        //             } else {
        //                 event.preventDefault();
        //                 Swal.fire({
        //                     title: 'Loading...',
        //                     text: "Please wait",
        //                     customClass: {
        //                         confirmButton: 'd-none'
        //                     },
        //                     buttonsStyling: false
        //                 });
        //                 let lk = $(".select-lk").val();
        //                 let datas = {}

        //                 datas.damage_report_id = lk;
        //                 $('#addWorkOrder').find('.form-control').each(function() {
        //                     var inputId = $(this).attr('id');
        //                     var inputValue = $("#" + inputId).val();
        //                     if (inputId === 'work_order_date' || inputId ===
        //                         'action_plan_date' || inputId === 'finish_plan') {
        //                         datas[$("#" + inputId).attr("name")] = moment(inputValue,
        //                                 'D-M-YYYY')
        //                             .format('YYYY-MM-DD');
        //                     } else {
        //                         datas[$("#" + inputId).attr("name")] = inputValue;
        //                     }
        //                 });
        //                 console.log(datas);
        //                 // $.ajax({
        //                 //     url: baseUrl + "api/damage-report/",
        //                 //     type: "POST",
        //                 //     data: JSON.stringify(datas),
        //                 //     contentType: "application/json; charset=utf-8",
        //                 //     dataType: "json",

        //                 //     success: function(response) {
        //                 //         $('.indicator-progress').show();
        //                 //         $('.indicator-label').hide();

        //                 //         Swal.fire({
        //                 //             title: 'Berhasil',
        //                 //             text: 'Berhasil menambahkan Laporan Kerusakan.',
        //                 //             icon: 'success',
        //                 //             customClass: {
        //                 //                 confirmButton: 'btn btn-primary'
        //                 //             },
        //                 //             buttonsStyling: false
        //                 //         })

        //                 //         window.location.href = "/complain/laporan-kerusakan"
        //                 //     },
        //                 //     error: function(xhr, status, error) {
        //                 //         Swal.fire({
        //                 //             title: 'Error!',
        //                 //             text: errors.responseJSON.message,
        //                 //             icon: 'error',
        //                 //             customClass: {
        //                 //                 confirmButton: 'btn btn-primary'
        //                 //             },
        //                 //             buttonsStyling: false
        //                 //         })
        //                 //     }
        //                 // });
        //             }

        //             form.classList.add("was-validated");
        //         },
        //         false
        //     );
        // });

        // Mengambil value tanda tangan
        // let ttdFile1 = null;
        // const myDropzone1 = new Dropzone('#dropzone-1', {
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
        //             ttdFile1 = file;
        //         });
        //     }
        // });

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

        // let ttdFile4 = null;
        // const myDropzone4 = new Dropzone('#dropzone-4', {
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
        //             ttdFile4 = file;
        //         });
        //     }
        // });

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

        $("#save").on("click", function() {
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

                if ($('.prev-img-' + (index + 1)).attr("src") != '') {
                    signature['signature'] = $('.prev-img-' + (index + 1)).attr(
                        "src");
                }

                signatures.push(signature);
            });

            datas.signatures = signatures;
            datas.status = "Terbuat";

            console.log(datas);
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
        })

        // Cancel
        $(".btn-cancel").on("click", function() {
            window.location.href = "/complain/work-order"
        })

        // Select2
        $(".select-lk").select2({
            placeholder: 'Select Damage Report',
            // allowClear: true,
            ajax: {
                url: "{{ env('BASE_URL_API')}}" +'/api/damage-report/select',
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