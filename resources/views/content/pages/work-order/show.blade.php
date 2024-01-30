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
                                <span class="d-block" id="no-wo"> :</span>
                            </div>
                        </div>
                        <hr class="my-3 mx-n4">

                        <div class="row py-3 px-3">
                            <div class="col-md-3">
                                <div class="mb-1">
                                    <label for="note" class="form-label fw-medium">No Lap Kerusakan </label>
                                    <select class="form-select select-lk item-details mb-3" id="select-lk" readonly>
                                    </select>
                                    <div class="invalid-feedback">Tidak boleh kosong</div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-1">
                                    <label for="note" class="form-label fw-medium">Date </label>
                                    <input type="text" class="form-control date" id="work_order_date" name="work_order_date" placeholder="Date" readonly />
                                    <div class="invalid-feedback">Tidak boleh kosong</div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-1">
                                    <label for="note" class="form-label fw-medium">Action Plan </label>
                                    <input type="text" class="form-control date" id="action_plan_date" name="action_plan_date" placeholder="Action Plan" required />
                                    <div class="invalid-feedback">Tidak boleh kosong</div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-1">
                                    <label for="note" class="form-label fw-medium">Finish Plan </label>
                                    <input type="text" class="form-control date" id="finish_plan" name="finish_plan" placeholder="Finish Plan" required />
                                    <div class="invalid-feedback">Tidak boleh kosong</div>
                                </div>
                            </div>
                        </div>

                        <div class="row py-3 px-3">
                            <div class="col-md-6">
                                <div class="mb-1">
                                    <label for="scope" class="form-label fw-medium">Scope</label>
                                    <input type="text" class="form-control" name="" id="scope">
                                    <div class="invalid-feedback">Tidak boleh kosong</div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-1">
                                    <label for="classification" class="form-label fw-medium">Classification</label>
                                    <input type="text" class="form-control" name="" id="classification">
                                    <div class="invalid-feedback">Tidak boleh kosong</div>
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
                                <div class="">
                                    <div class="">
                                        <div class="" id="details">

                                        </div>
                                    </div>
                                </div>

                                <div class="row py-3">
                                    <div class="col-12">
                                        <label for="note" class="form-label fw-medium">Klasifikasi</label>
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

                                <label for="note" class="form-label fw-medium text-left ttd">Technician</label>
                                <div class="row mb-3 mt-3 signatures">
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
                        <a href="/complain/work-order/add" id="preview" class="btn btn-label-secondary d-grid w-100 mb-2">Kembali</a>
                    </div>
                </div>
            </div>
            <!-- /Invoice Actions -->
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
    "use strict";
    var sweet_loader = `<div class="spinner-border mb-8 text-primary" style="width: 5rem; height: 5rem;" role="status">
                                    <span class="sr-only">Loading...</span>
                                </div>`;
    var id;

    $(document).ready(function() {
        var urlSegments = window.location.pathname.split('/');
        var idIndex = urlSegments.indexOf('show') + 1;
        id = urlSegments[idIndex];
        getDataWorkOrder(id);
    });

    function getDataWorkOrder(id) {
        $.ajax({
            url: "{{env('BASE_URL_API')}}" + '/api/work-order/' + id,
            type: "GET",
            dataType: "json",
            beforeSend: function() {
                Swal.fire({
                    title: '<h2>Loading...</h2>',
                    html: sweet_loader + '<h5>Please Wait</h5>',
                    showConfirmButton: false,
                    allowOutsideClick: false,
                    allowEscapeKey: false
                });
            },
            success: function(res) {
                var data = res.data;
                console.log(data);
                id = data.id;
                getLaporanKerusakan(data.damage_report_id);
                $("#no-wo").text('Nomor Work Order : ' + data.work_order_number);
                $("#action_plan_date").val(data.action_plan_date);
                $("#damage_report_id").val(data.damage_report_id);
                $("#finish_plan").val(data.finish_plan);
                $("#job_description").val(data.job_description);
                $("#technician1").val(data.work_order_signatures[0].name);
                $("#work_order_date").val(data.work_order_date);
                $("#date1").val(data.work_order_signatures[0].date);
                getDetails(data.work_order_details);
                $("#scope").val(data.scope);
                $("#classification").val(data.classification);
                $('#' + data.klasifikasi).prop('checked', true);
                getSignatures(data.work_order_signatures);
                Swal.close();
            },
            error: function(errors) {
                console.log(errors);
            }
        });




    }

    function getSignatures(details) {
        console.log(details);
        let append = '';
        let appendPrepared = '';
        let appendReviewed = '';
        let appendAknowledge = '';
        let appendApproved = '';
        for (let i = 0; i < details.length; i++) {
            if (details[i].type == 'Prepared By') {
                appendPrepared = `
                    <div class="col-md-3">
                        <label for="note" class="form-label fw-medium mb-3">Prepared by :</label>
                        <div class="mb-3">
                            <input type="text" class="form-control ttd-row userName" placeholder="Nama" style="text-align:center;" id="warehouse_name" name="name[]" readonly value="${details[i].name}">
                        </div>
                        <div class="mb-3">
                            <input type="text" class="form-control ttd-row department" placeholder="Jabatan" style="text-align:center;" id="warehouse_jabatan" name="jabatan[]" readonly value="Warehouse">
                        </div>
                        <div class="mb-3">
                            <div id="warehouse-image"></div>
                        </div>
                        <div class="mb-3">
                            <input type="text" class="form-control date ttd-row" placeholder="Tanggal" style="text-align:center;" id="warehouse_date" name="date[]" value="${details[i].date}" readonly>
                        </div>
                    </div>` +
                    '<script type="text/javascript">' +
                    '$("#warehouse-image").css("background-color", "black");' +
                    '$("#warehouse-image").css("background-image", "url(' + details[i].signature + ')");' +
                    '$("#warehouse-image").css("height", "200px");' +
                    '$("#warehouse-image").css("width", "200px");' +
                    '$("#warehouse-image").css("background-position", "center");' +
                    '$("#warehouse-image").css("background-size", "cover");' +
                    '$("#warehouse-image").css("background-repeat", "no-repeat");' +
                    '</' + 'script>';
            } else if (details[i].type == 'Reviewed By') {
                appendReviewed = `
                    <div class="col-md-3">
                        <label for="note" class="form-label fw-medium mb-3">Prepared by :</label>
                        <div class="mb-3">
                            <input type="text" class="form-control ttd-row userName" placeholder="Nama" style="text-align:center;" id="departement_name" name="name[]" readonly value="${details[i].name}">
                        </div>
                        <div class="mb-3">
                            <input type="text" class="form-control ttd-row department" placeholder="Jabatan" style="text-align:center;" id="departement_jabatan" name="jabatan[]" readonly value="Chief Department">
                        </div>
                        <div class="mb-3">
                            <div id="departement-image"></div>
                        </div>
                        <div class="mb-3">
                            <input type="text" class="form-control date ttd-row" placeholder="Tanggal" style="text-align:center;" id="departement_date" name="date[]" value="${details[i].date}" readonly>
                        </div>
                    </div>` +
                    '<script type="text/javascript">' +
                    '$("#departement-image").css("background-color", "black");' +
                    '$("#departement-image").css("background-image", "url(' + details[i].signature + ')");' +
                    '$("#departement-image").css("height", "200px");' +
                    '$("#departement-image").css("width", "200px");' +
                    '$("#departement-image").css("background-position", "center");' +
                    '$("#departement-image").css("background-size", "cover");' +
                    '$("#departement-image").css("background-repeat", "no-repeat");' +
                    '</' + 'script>';
            } else if (details[i].type == 'Aknowledge By') {
                appendAknowledge = `
                    <div class="col-md-3">
                        <label for="note" class="form-label fw-medium mb-3">Prepared by :</label>
                        <div class="mb-3">
                            <input type="text" class="form-control ttd-row userName" placeholder="Nama" style="text-align:center;" id="finance_name" name="name[]" readonly value="${details[i].name}">
                        </div>
                        <div class="mb-3">
                            <input type="text" class="form-control ttd-row department" placeholder="Jabatan" style="text-align:center;" id="finance_jabatan" name="jabatan[]" readonly value="Chief Finance & Akunting">
                        </div>
                        <div class="mb-3">
                            <div id="finance-image"></div>
                        </div>
                        <div class="mb-3">
                            <input type="text" class="form-control date ttd-row" placeholder="Tanggal" style="text-align:center;" id="finance_date" name="date[]" value="${details[i].date}" readonly>
                        </div>
                    </div>` +
                    '<script type="text/javascript">' +
                    '$("#finance-image").css("background-color", "black");' +
                    '$("#finance-image").css("background-image", "url(' + details[i].signature + ')");' +
                    '$("#finance-image").css("height", "200px");' +
                    '$("#finance-image").css("width", "200px");' +
                    '$("#finance-image").css("background-position", "center");' +
                    '$("#finance-image").css("background-size", "cover");' +
                    '$("#finance-image").css("background-repeat", "no-repeat");' +
                    '</' + 'script>';
            } else if (details[i].type == 'Approved By') {
                appendApproved = `
                    <div class="col-md-3">
                        <label for="note" class="form-label fw-medium mb-3">Prepared by :</label>
                        <div class="mb-3">
                            <input type="text" class="form-control ttd-row userName" placeholder="Nama" style="text-align:center;" id="approved_name" name="name[]" readonly value="${details[i].name}">
                        </div>
                        <div class="mb-3">
                            <input type="text" class="form-control ttd-row department" placeholder="Jabatan" style="text-align:center;" id="approved_jabatan" name="jabatan[]" readonly value="Kepala BM">
                        </div>
                        <div class="mb-3">
                            <div id="approved-image"></div>
                        </div>
                        <div class="mb-3">
                            <input type="text" class="form-control date ttd-row" placeholder="Tanggal" style="text-align:center;" id="approved_date" name="date[]" value="${details[i].date}" readonly>
                        </div>
                    </div>` +
                    '<script type="text/javascript">' +
                    '$("#approved-image").css("background-color", "black");' +
                    '$("#approved-image").css("background-image", "url(' + details[i].signature + ')");' +
                    '$("#approved-image").css("height", "200px");' +
                    '$("#approved-image").css("width", "200px");' +
                    '$("#approved-image").css("background-position", "center");' +
                    '$("#approved-image").css("background-size", "cover");' +
                    '$("#approved-image").css("background-repeat", "no-repeat");' +
                    '</' + 'script>';
            }
            $('.signatures').html(appendPrepared + appendReviewed + appendAknowledge + appendApproved);
        }

    }


    function getLaporanKerusakan(id) {
        $.ajax({
            url: "{{url('api/damage-report')}}/" + id,
            type: "GET",
            success: function(response) {
                let data = response.data;
                let tem = `<option value="` + data.id + `" selected>` + data.damage_report_number + `</option>`;
                $('#select-lk').prepend(tem);
            },
            error: function(xhr, status, error) {
                console.log(error);
            }
        });
    }



    function getDetails(data) {
        let getDetail = '';
        let temp = '';

        if (data) {
            let details = data;
            console.log(details);
            for (let i = 0; i < details.length; i++) {
                temp = `
                <div class="mb-3 row-mg">
                    <div class="row mb-3  d-flex align-items-end">
                        <div class="col-md-3">
                            <label for="note" class="form-label fw-medium">Location</label>
                            <input type="text" class="form-control" id="location" name="location[]" placeholder="Location" required value="` + details[i].location + `" />
                            <div class="invalid-feedback">Tidak boleh kosong</div>
                        </div>
                        <div class="col-md-3">
                            <label for="note" class="form-label fw-medium">Material Request</label>
                            <input type="text" class="form-control" id="material-req" name="material-req[]" placeholder="Material Request" required value="` + details[i].material_request + `"/>
                            <div class="invalid-feedback">Tidak boleh kosong</div>
                        </div>
                        <div class="col-md-3">
                            <label for="note" class="form-label fw-medium">Type /Made In</label>
                            <input type="text" class="form-control" id="type" name="type[]" placeholder="Type /Made In" required value="` + details[i].type + `"/>
                            <div class="invalid-feedback">Tidak boleh kosong</div>
                        </div>
                        <div class="col-md-3 mb-1-custom"">
                            <label for="note" class="form-label fw-medium">Quantity</label>
                            <input type="number" class="form-control row-input" id="qty" name="qty[]" placeholder="Quantity" required value="` + details[i].quantity + `"/>
                            <div class="invalid-feedback">Tidak boleh kosong</div>
                        </div>
                    </div>
                </div>
                `;
                getDetail = getDetail + temp;
            }
            $('#details').prepend(getDetail);
        } else {
            console.log();
            temp = `            
            <div class="mb-3 row-mg">
                <div class="row mb-3  d-flex align-items-end">
                     <div class="col-md-3">
                        <label for="note" class="form-label fw-medium">Location</label>
                        <input type="text" class="form-control row-input" id="location" name="location[]" placeholder="Location" required />
                        <div class="invalid-feedback">Tidak boleh kosong</div>
                    </div>
                    <div class="col-md-3">
                        <label for="note" class="form-label fw-medium">Material Request</label>
                        <input type="text" class="form-control row-input" id="material-req" name="material-req[]" placeholder="Material Request" required />
                        <div class="invalid-feedback">Tidak boleh kosong</div>
                    </div>
                    <div class="col-md-3">
                        <label for="note" class="form-label fw-medium">Type /Made In</label>
                        <input type="text" class="form-control row-input" id="type" name="type[]" placeholder="Type /Made In" required />
                        <div class="invalid-feedback">Tidak boleh kosong</div>
                    </div>
                    <div class="col-md-3 mb-1-custom"">
                        <label for="note" class="form-label fw-medium">Quantity</label>
                        <input type="text" class="form-control row-input" id="qty" name="qty[]" placeholder="Quantity" required />
                        <div class="invalid-feedback">Tidak boleh kosong</div>
                    </div>
                </div>
            </div>
            `;
            $('#details').prepend(temp);
        }
    }
</script>
@endsection