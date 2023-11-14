@php
    $configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Complain')

@section('content')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-style1">
            <li class="breadcrumb-item">
                <a href="#">Ticket</a>
            </li>
            <li class="breadcrumb-item active">
                <a href="#">List</a>
            </li>
        </ol>
    </nav>

    {{-- Card --}}
    <div class="card mb-4">
        <div class="card-widget-separator-wrapper">
            <div class="card-body card-widget-separator">
                <div class="row gy-4 gy-sm-1">
                    <div class="col-sm-6 col-lg-6">
                        <div class="d-flex justify-content-center align-items-start card-widget-1 border-end pb-3 pb-sm-0">
                            <div class="text-center">
                                <h3 class="mb-1">300</h3>
                                <p class="mb-0">Tenant</p>
                            </div>
                        </div>
                        <hr class="d-none d-sm-block d-lg-none me-4">
                    </div>
                    <div class="col-sm-6 col-lg-6">
                        <div class="d-flex justify-content-center align-items-start card-widget-2 pb-3 pb-sm-0">
                            <div class="text-center">
                                <h3 class="mb-1">50</h3>
                                <p class="mb-0">Invoice</p>
                            </div>
                        </div>
                        <hr class="d-none d-sm-block d-lg-none">
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Datatables --}}
    <div class="card">
        <div class="card-datatable table-responsive pt-0">
            <table class="ticket-list-table table">
                <thead>
                    <tr>
                        <th>No. Ticket</th>
                        <th>Nama Pelapor</th>
                        <th>Perusahaan</th>
                        <th>Judul Laporan</th>
                        <th>Status</th>
                        <th>Tanggapan</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>

@endsection

@section('page-script')
    {{-- <script src="{{ asset('assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js') }}"></script> --}}
    <script>
        "use strict";
        $((function() {
            var a = $(".ticket-list-table");
            if (a.length) var e = a.DataTable({
                ajax: assetsPath + "json/ticket-list.json",
                columns: [{
                    data: "no_tanda_terima"
                }, {
                    data: "tenant"
                }, {
                    data: "total"
                }, {
                    data: "tanggal_tanda_terima"
                }, {
                    data: "status"
                }, {
                    data: "tanggapan"
                }],
                columnDefs: [{
                    className: "control",
                    responsivePriority: 2,
                    searchable: !1,
                    targets: 0,
                    render: function(a, e, t, s) {
                        return ""
                    }
                }, {
                    targets: 1,
                    render: function(a, e, t, s) {
                        var n = t.invoice_id;
                        return '<a href="' + baseUrl + 'app/ticket/preview">#' + n +
                            "</a>"
                    }
                }, {
                    targets: 2,
                    render: function(a, e, t, s) {
                        var n = t.tenant;
                        return '<span class="d-none">' + n + "</span>$" + n
                    }
                }, {}, {
                    targets: 3,
                    render: function(a, e, t, s) {
                        var n = t.total;
                        return '<span class="d-none">' + n + "</span>$" + n
                    }
                }, {
                    targets: 4,
                    render: function(a, e, t, s) {
                        var n = new Date(t.tanggal_tanda_terima);
                        return '<span class="d-none">' + moment(n).format("YYYYMMDD") +
                            "</span>" + moment(n).format("DD MMM YYYY")
                    }
                }, {
                    targets: 5,
                    orderable: !1,
                    render: function(a, e, t, s) {
                        var n = t.status;
                        if (0 === n) {
                            return '<span class="badge bg-label-success" text-capitalized> Paid </span>'
                        }
                        return '<span class="d-none">' + n + "</span>" + n
                    }
                }, {
                    targets: 6,
                    visible: !1
                }, {
                    targets: -1,
                    title: "Tanggapan",
                    searchable: !1,
                    orderable: !1,
                    render: function(a, e, t, s) {
                        return '<div class="d-flex align-items-center"><a href="javascript:;" data-bs-toggle="tooltip" class="text-body" data-bs-placement="top" title="Send Mail"><i class="ti ti-mail mx-2 ti-sm"></i></a><a href="' +
                            baseUrl +
                            'app/ticket/preview" data-bs-toggle="tooltip" class="text-body" data-bs-placement="top" title="Preview Ticket"><i class="ti ti-eye mx-2 ti-sm"></i></a><div class="dropdown"><a href="javascript:;" class="btn dropdown-toggle hide-arrow text-body p-0" data-bs-toggle="dropdown"><i class="ti ti-dots-vertical ti-sm"></i></a><div class="dropdown-menu dropdown-menu-end"><a href="javascript:;" class="dropdown-item">Download</a><a href="' +
                            baseUrl +
                            'app/ticket/edit" class="dropdown-item">Edit</a><a href="javascript:;" class="dropdown-item">Duplicate</a><div class="dropdown-divider"></div><a href="javascript:;" class="dropdown-item delete-record text-danger">Delete</a></div></div></div>'
                    }
                }],
                order: [
                    [1, "desc"]
                ],
                dom: '<"row mx-1"<"col-12 col-md-6 d-flex align-items-center justify-content-center justify-content-md-start gap-2"l<"dt-action-buttons text-xl-end text-lg-start text-md-end text-start mt-md-0 mt-3"B>><"col-12 col-md-6 d-flex align-items-center justify-content-end flex-column flex-md-row pe-3 gap-md-3"f<"ticket_status mb-3 mb-md-0">>>t<"row mx-2"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>',
                language: {
                    sLengthMenu: "Show _MENU_",
                    search: "",
                    searchPlaceholder: "Search Ticket"
                },
                buttons: [{
                    text: '<i class="ti ti-plus me-md-1"></i><span class="d-md-inline-block d-none">Buat Ticket</span>',
                    className: "btn btn-primary",
                    action: function(a, e, t, s) {
                        window.location = baseUrl + "app/ticket/add"
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
                    this.api().columns(7).every((function() {
                        var a = this,
                            e = $(
                                '<select id="UserRole" class="form-select"><option value=""> Select Status </option></select>'
                            ).appendTo(".ticket_status").on("change", (
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
            })), $(".ticket-list-table tbody").on("click", ".delete-record", (function() {
                e.row($(this).parents("tr")).remove().draw()
            })), setTimeout((() => {
                $(".dataTables_filter .form-control").removeClass("form-control-sm"), $(
                    ".dataTables_length .form-select").removeClass("form-select-sm")
            }), 300)
        }));
    </script>

@endsection
