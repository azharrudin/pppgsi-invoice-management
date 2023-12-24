@php
    $configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Laporan Kerusakan')

@section('page-style')
    {{-- Page Css files --}}
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css') }}">
@endsection

@section('content')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-style1">
            <li class="breadcrumb-item">
                <a href="#">Work Order</a>
            </li>
            <li class="breadcrumb-item active">
                <a href="#">List</a>
            </li>
        </ol>
    </nav>

    <!-- Invoice List Widget -->

    <div class="card mb-4">
        <div class="card-widget-separator-wrapper">
            <div class="card-body card-widget-separator">
                <div class="row gy-4 gy-sm-1">
                    <div class="col-sm-4 col-lg-4">
                        <div class="d-flex justify-content-between align-items-start card-widget-1 border-end pb-3 pb-sm-0">
                            <div>
                                <h3 class="mb-1">300</h3>
                                <p class="mb-0">Tenant</p>
                            </div>
                        </div>
                        <hr class="d-none d-sm-block d-lg-none me-4">
                    </div>
                    <div class="col-sm-4 col-lg-4">
                        <div class="d-flex justify-content-between align-items-start card-widget-2 border-end pb-3 pb-sm-0">
                            <div>
                                <h3 class="mb-1">50</h3>
                                <p class="mb-0">Tanda Terima</p>
                            </div>
                        </div>
                        <hr class="d-none d-sm-block d-lg-none">
                    </div>
                    <div class="col-sm-4 col-lg-4">
                        <div class="d-flex justify-content-between align-items-start border-end pb-3 pb-sm-0 card-widget-3">
                            <div>
                                <h3 class="mb-1">Rp. 20.000.000</h3>
                                <p class="mb-0">Terbayarkan</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Invoice List Table -->
    <div class="card">
        <div class="card-datatable table-responsive pt-0">
            <table class="work-order-list-table table">
                <thead>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>


@endsection

@section('page-script')
    <script src="{{ asset('assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js') }}"></script>
    <script>
        "use strict";
        $((function() {
            var a = $(".work-order-list-table");
            if (a.length) var e = a.DataTable({
                processing: true,
                serverSide: true,
                deferRender: true,
                ajax: {
                    url: "{{ url('complain/work-order/data-work') }}",
                    "data": function(d) {
                        d.start = 0;
                        d.page = $(".work-order-list-table").DataTable().page.info().page + 1;
                    }
                },
                columns: [{
                    data: "id",
                    name: "id",
                    title: "No. Work Order"
                }, {
                    data: "scope",
                    name: "scope",
                    title: "Scope"
                }, {
                    data: "classification",
                    name: "classification",
                    title: "classification"
                }, {
                    data: "work_order_date",
                    name: "work_order_date",
                    title: "Date",
                    render: function(data, type, full, meta) {
                        var tanggalAwal = data;

                        var bagianTanggal = tanggalAwal.split('-');
                        var tahun = bagianTanggal[0];
                        var bulan = bagianTanggal[1];
                        var hari = bagianTanggal[2];

                        var tanggalHasil = hari + '/' + bulan + '/' + tahun;

                        return tanggalHasil;
                    }
                }, {
                    data: "action_plan_date",
                    name: "action_plan_date",
                    title: "Action Plan",
                    render: function(data, type, full, meta) {
                        var tanggalAwal = data;

                        var bagianTanggal = tanggalAwal.split('-');
                        var tahun = bagianTanggal[0];
                        var bulan = bagianTanggal[1];
                        var hari = bagianTanggal[2];

                        var tanggalHasil = hari + '/' + bulan + '/' + tahun;

                        return tanggalHasil;
                    }
                }, {
                    data: "status",
                    name: "status",
                    title: "status",
                    render: function(data, type, full, meta) {
                        if (data == "Disetujui KA") {
                            return '<span class="badge  bg-label-success">' + data +
                                '</span>'
                        } else if (data == "Disetujui BM") {
                            return '<span class="badge  bg-label-info">' + data +
                                '</span>'
                        } else if (data == "Terbuat") {
                            return '<span class="badge  bg-label-secondary">' + data +
                                '</span>'
                        } else if (data == "Terkirim") {
                            return '<span class="badge  bg-label-danger">' + data +
                                '</span>'
                        }
                    }
                }, {
                    data: null,
                    title: "Tanggapan",
                    render: function(data, type, row) {
                        return '<div class="d-flex align-items-center"><a href="javascript:;" data-bs-toggle="tooltip" class="text-body" data-bs-placement="top" title="Send Mail"><i class="ti ti-mail mx-2 ti-sm"></i></a><a href="work-order/preview/' +
                            data.id +
                            '" data-bs-toggle="tooltip" class="text-body" data-bs-placement="top" title="Preview Invoice"><i class="ti ti-eye mx-2 ti-sm"></i></a><div class="dropdown"><a href="javascript:;" class="btn dropdown-toggle hide-arrow text-body p-0" data-bs-toggle="dropdown"><i class="ti ti-dots-vertical ti-sm"></i></a><div class="dropdown-menu dropdown-menu-end"><a href="javascript:;" class="dropdown-item">Download</a><a href="work-order/edit/' +
                            data.id + '" class="dropdown-item btn-edit" data-id="' +
                            data.id +
                            '">Edit</a><a href="javascript:;" class="dropdown-item">Duplicate</a><div class="dropdown-divider"></div><a href="javascript:;" class="dropdown-item delete-record text-danger">Delete</a></div></div></div>'
                    }
                }],
                order: [
                    [0, "asc"]
                ],
                dom: '<"row mx-1"<"col-12 col-md-6 d-flex align-items-center justify-content-center justify-content-md-start gap-2"l<"dt-action-buttons text-xl-end text-lg-start text-md-end text-start mt-md-0 mt-3"B>><"col-12 col-md-6 d-flex align-items-center justify-content-end flex-column flex-md-row pe-3 gap-md-3"f<"invoice_status mb-3 mb-md-0">>>t<"row mx-2"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>',
                language: {
                    sLengthMenu: "Show _MENU_",
                    search: "",
                    searchPlaceholder: "Search Work Order"
                },
                buttons: [{
                    text: '<i class="ti ti-plus me-md-1"></i><span class="d-md-inline-block d-none">Buat Work Order</span>',
                    className: "btn btn-primary",
                    action: function(a, e, t, s) {
                        window.location = baseUrl + "complain/work-order/add"
                    }
                }],
                responsive: {
                    details: {
                        display: $.fn.dataTable.Responsive.display.modal({
                            header: function(a) {
                                return "Details of " + a.data().full_name
                            }
                        }),
                        type: "column",
                        renderer: function(a, e, t) {
                            var s = $.map(t, (function(a, e) {
                                return "" !== a.title ? '<tr data-dt-row="' + a
                                    .rowIndex + '" data-dt-column="' + a
                                    .columnIndex + '"><td>' + a.title +
                                    ":</td> <td>" + a.data + "</td></tr>" : ""
                            })).join("");
                            return !!s && $('<table class="table"/><tbody />').append(s)
                        }
                    }
                },
                initComplete: function() {
                    this.api().columns(5).every((function() {
                        var a = this,
                            e = $(
                                '<select id="UserRole" class="form-select"><option value=""> Select Status </option></select>'
                                ).appendTo(".invoice_status").on("change", (
                                function() {
                                    var e = $.fn.dataTable.util.escapeRegex($(
                                        this).val());
                                    a.search(e ? "^" + e + "$" : "", !0, !1)
                                        .draw()
                                }));
                        a.data().unique().sort().each((function(a, t) {
                            e.append('<option value="' + a +
                                '" class="text-capitalize">' + a +
                                "</option>")
                        }))
                    }))
                }
            });
            a.on("draw.dt", (function() {
                [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]')).map((
                    function(a) {
                        return new bootstrap.Tooltip(a, {
                            boundary: document.body
                        })
                    }))
            })), $(".work-order-list-table tbody").on("click", ".delete-record", (function() {
                e.row($(this).parents("tr")).remove().draw()
            })), setTimeout((() => {
                $(".dataTables_filter .form-control").removeClass("form-control-sm"), $(
                    ".dataTables_length .form-select").removeClass("form-select-sm")
            }), 300)
        }));
    </script>

@endsection
