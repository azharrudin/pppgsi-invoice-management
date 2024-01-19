@php
$configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Purchase Request')

@section('page-style')
{{-- Page Css files --}}
<link rel="stylesheet" href="{{ asset('assets/vendor/libs/sweetalert2/sweetalert2.css') }}">
@endsection

@section('content')

<nav aria-label="breadcrumb">
    <ol class="breadcrumb breadcrumb-style1">
        <li class="breadcrumb-item">
            <a href="#">Purchase</a>
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
                <div class="col-sm-6 col-lg-4">
                    <div class="d-flex justify-content-between align-items-start card-widget-1 border-end pb-3 pb-sm-0">
                        <div>
                            <h3 class="mb-1">300</h3>
                            <p class="mb-0">Tenant</p>
                        </div>
                    </div>
                    <hr class="d-none d-sm-block d-lg-none me-4">
                </div>
                <div class="col-sm-6 col-lg-4">
                    <div class="d-flex justify-content-between align-items-start card-widget-2 border-end pb-3 pb-sm-0">
                        <div>
                            <h3 class="mb-1">50</h3>
                            <p class="mb-0">Tanda Terima</p>
                        </div>
                    </div>
                    <hr class="d-none d-sm-block d-lg-none">
                </div>
                <div class="col-sm-6 col-lg-4">
                    <div class="d-flex justify-content-between align-items-start pb-3 pb-sm-0 card-widget-3">
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

{{-- Datatables --}}
<div class="card">
    <div class="card-datatable table-responsive pt-0">
        <table class="purchase-request-list-table table">
            <thead>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
</div>

@endsection

@section('page-script')
<script src="{{ asset('assets/vendor/libs/sweetalert2/sweetalert2.js') }}"></script>
<script>
    "use strict";

    var sweet_loader = `<div class="spinner-border mb-8 text-primary" style="width: 5rem; height: 5rem;" role="status">
                                    <span class="sr-only">Loading...</span>
                                </div>`;
    $((function() {
        let account = {!! json_encode(session('data')) !!}
        let levelId = account.level.id;
     
        let buttonAdd = [];
        
        if(levelId == '10'){
            buttonAdd = [{
                text: '<i class="ti ti-plus me-md-1"></i><span class="d-md-inline-block d-none">Buat Purchase Request</span>',
                className: "btn btn-primary",
                action: function(a, e, t, s) {
                    window.location = "{{url('request/add-purchase-request')}}";
                }
            }];
        }
        var a = $(".purchase-request-list-table");
        if (a.length) var e = a.DataTable({
            processing: true,
            serverSide: true,
            deferRender: true,
            ajax: {
                url: "{{ url('request/data-purchase-request') }}",
                "data": function(d) {
                    d.start = 0;
                    d.page = $(".purchase-request-list-table").DataTable().page.info()
                        .page +
                        1;
                },
                beforeSend: function() {
                    Swal.fire({
                        title: '<h2>Loading...</h2>',
                        html: sweet_loader + '<h5>Please Wait</h5>',
                        showConfirmButton: false,
                        allowOutsideClick: false,
                        allowEscapeKey: false
                    });
                },
                complete: function() {
                    Swal.close();
                }
            },
            columns: [{
                data: "purchase_request_number",
                name: "purchase_request_number",
                title: "Purchase Request Number",
                className: 'text-center'
            }, {
                data: "department",
                name: "department",
                title: "Department",
                className: 'text-center'
            }, {
                data: "proposed_purchase_price",
                name: "proposed_purchase_price",
                title: "Usulan Pembelian",
                className: 'text-center',
                render: function(data, type, full, meta) {
                    if (data != null) {
                        return 'Rp. ' + data.toLocaleString('en-US') + ',-';
                    }
                }
            }, {
                data: "budget_status",
                name: "budget_status",
                title: "Status Budget",
                className: 'text-center'
            }, {
                data: "request_date",
                name: "request_date",
                title: "Tgl Request",
                className: 'text-center',
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
                title: "Status",
                className: 'text-center',
                render: function(data, type, full, meta) {
                    if (data == "Disetujui KA") {
                        return '<span class="badge w-100" style="background-color : #4EC0D9; ">' + data +
                            '</span>'
                    } else if (data == "Disetujui BM") {
                        return '<span class="badge w-100" style="background-color : #4E6DD9; ">' + data +
                            '</span>'
                    } else if (data == "Terbuat") {
                        return '<span class="badge w-100" style="background-color : #BFBFBF; ">' + data +
                            '</span>'
                    } else if (data == "Terkirim") {
                        return '<span class="badge w-100" style="background-color : #FF87A7; ">' + data +
                            '</span>'
                    }
                }
            }, {
                data: null,
                title: "Tanggapan",
                render: function(data, type, row) {
                    return '<div class="d-flex align-items-center"><a href="preview/' +
                        data.id +
                        '" data-bs-toggle="tooltip" class="text-body" data-bs-placement="top" title="Preview Invoice"><i class="ti ti-eye mx-2 ti-sm"></i></a><div class="dropdown"><a href="javascript:;" class="btn dropdown-toggle hide-arrow text-body p-0" data-bs-toggle="dropdown"><i class="ti ti-dots-vertical ti-sm"></i></a><div class="dropdown-menu dropdown-menu-end"><a href="javascript:;" class="dropdown-item">Download</a><a href="edit/' +
                        data.id + '" class="dropdown-item btn-edit" data-id="' +
                        data.id +
                        '">Edit</a><div class="dropdown-divider"></div><a href="javascript:;" class="dropdown-item delete-record text-danger btn-delete" data-id="' +
                        data.id + '">Delete</a></div></div></div>'
                }
            }],
            order: [
                [0, "desc"]
            ],
            dom: '<"row mx-1"<"col-12 col-md-6 d-flex align-items-center justify-content-center justify-content-md-start gap-2"l<"dt-action-buttons text-xl-end text-lg-start text-md-end text-start mt-md-0 mt-3"B>><"col-12 col-md-6 d-flex align-items-center justify-content-end flex-column flex-md-row pe-3 gap-md-3"f<"purchase_status mb-3 mb-md-0">>>t<"row mx-2"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>',
            language: {
                sLengthMenu: "Show _MENU_",
                search: "",
                searchPlaceholder: "Search Purchase Request"
            },
            buttons: buttonAdd,
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
                        ).appendTo(".purchase_status").on("change", (
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
        })), $(".purchase-request-list-table tbody").on("click", ".delete-record", (function() {
            e.row($(this).parents("tr")).remove().draw()
        })), setTimeout((() => {
            $(".dataTables_filter .form-control").removeClass("form-control-sm"), $(
                ".dataTables_length .form-select").removeClass("form-select-sm")
        }), 300)
    }));

    $(document).on('click', '.btn-delete', function(event) {
        let id = $(this).data('id');
        event.stopPropagation();
        Swal.fire({
            text: "Apakah Ingin menghapus Purchase Request ini  ?",
            icon: "warning",
            showCancelButton: true,
            buttonsStyling: false,
            confirmButtonText: "Yes, send!",
            cancelButtonText: "No, cancel",
            customClass: {
                confirmButton: "btn fw-bold btn-primary",
                cancelButton: "btn fw-bold btn-active-light-primary"
            }
        }).then(async function(result) {
            if (result.value) {
                var formData = new FormData();
                hapusPurchaseRequest(id);
            }
        });
    });

    function hapusPurchaseRequest(id) {
        Swal.fire({
            title: '<h2>Loading...</h2>',
            html: sweet_loader + '<h5>Please Wait</h5>',
            showConfirmButton: false,
            allowOutsideClick: false,
            allowEscapeKey: false
        })

        $.ajax({
            url: "{{ url('api/purchase-request') }}/"+ id,
            type: "DELETE",
            contentType: false,
            processData: false,
            async: true,
            success: function(response, result) {
                Swal.fire({
                    title: 'Berhasil',
                    text: 'Berhasil Hapus Purchase Request',
                    icon: 'success',
                    customClass: {
                        confirmButton: 'btn btn-primary'
                    },
                    buttonsStyling: false
                }).then(async function(res) {
                    $(".purchase-request-list-table").DataTable().ajax.reload();
                });
                // resolve();
            },
            error: function(xhr, status, error) {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: error,
                });
            }
        });
    }
</script>

@endsection