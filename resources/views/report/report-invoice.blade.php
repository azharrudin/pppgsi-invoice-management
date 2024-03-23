@php
$configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Invoice')

@section('page-style')
{{-- Page Css files --}}
<link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css') }}">
<link rel="stylesheet" href="{{asset('assets/vendor/libs/sweetalert2/sweetalert2.css')}}">
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
@endsection

@section('content')

<nav aria-label="breadcrumb">
    <ol class="breadcrumb breadcrumb-style1">
        <li class="breadcrumb-item">
            <a href="#">Invoice</a>
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
                <div class="col-sm-6 col-lg-3">
                    <div class="d-flex justify-content-between align-items-start card-widget-1 border-end pb-3 pb-sm-0">
                        <div>
                            <h3 class="mb-1 count_tenant">0</h3>
                            <p class="mb-0">Tenant</p>
                        </div>
                    </div>
                    <hr class="d-none d-sm-block d-lg-none me-4">
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="d-flex justify-content-between align-items-start card-widget-2 border-end pb-3 pb-sm-0">
                        <div>
                            <h3 class="mb-1 count_invoice">0</h3>
                            <p class="mb-0">Invoice</p>
                        </div>
                    </div>
                    <hr class="d-none d-sm-block d-lg-none">
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="d-flex justify-content-between align-items-start border-end pb-3 pb-sm-0 card-widget-3">
                        <div>
                            <h3 class="mb-1 invoice_paid">0</h3>
                            <p class="mb-0">Terbayarkan</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="d-flex justify-content-between align-items-start pb-3 pb-sm-0 card-widget-3">
                        <div>
                            <h3 class="mb-1 invoice_not_paid">0</h3>
                            <p class="mb-0">Belum Dibayarkan</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Datatables --}}
<div class="card">
    <div class="card-datatable pt-0">
        <table class="table invoice-list-table">
            <thead>
            </thead>
        </table>
    </div>
</div>

@endsection

@section('page-script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.4/moment.min.js"></script>
<script src="{{asset('assets/vendor/libs/sweetalert2/sweetalert2.js')}}"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<script>
    "use strict";
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $((function() {

        var sweet_loader = `<div class="spinner-border mb-8 text-primary" style="width: 5rem; height: 5rem;" role="status">
                                <span class="sr-only">Loading...</span>
                            </div>`;

        let account = {!! json_encode(session('data')) !!}
        let buttonAdd = [];
        if (account.level.id == '10') {
            buttonAdd = [{
                text: '<i class="ti ti-plus me-md-1"></i><span class="d-md-inline-block d-none">Buat Invoice</span>',
                className: "btn btn-primary ",
                action: function(a, e, t, s) {
                    $.ajax({
                        url: "{{ env('BASE_URL_API')}}" + '/api/invoice/' + id,
                        type: "GET",
                        dataType: "json",
                        success: function(res) {

                        },
                        error: function(errors) {
                            console.log(errors);
                        }
                    });
                    // window.location = "{{url('invoice/add-invoice')}}"
                }
            }];
        }
        /* buttonAdd = [{
           text: '<i class="ti ti-download me-md-1"></i><span class="d-md-inline-block d-none">Tarik Report .XLSX</span>',
         className: "btn btn-primary",
            action: function(a, e, t, s) {
                // $.ajax({
                //     url: "{{url('api/invoice/invoice-report-export')}}",
                //     type: "GET",
                //     dataType: "json",
                //     success: function(res) {
                //         console.log(res.data);
                //         let data = res.data;
                //         console.log(typeof(data));
                //         let datas = {};
                //         datas.data = data;
                //         $.ajax({
                //             url: "{{url('report/report-invoice/file-export')}}",
                //             type: "POST",
                //             data: JSON.stringify(datas),
                //             contentType: "application/json; charset=utf-8",
                //             dataType: "json",
                //             success : function (res){
                //                 console.log(res);
                //             },
                //             error: function(errors) {
                //                 console.log(errors);
                //             }
                //         });
                //     },
                //     error: function(errors) {
                //         console.log(errors);
                //     }
                // });
                console.log('s');
                window.location = "{{url('report/report-invoice/file-export')}}"
            }
        }];
*/
        setHeader();
       
        function setHeader() {
            Swal.fire({
                title: '<h2>Loading...</h2>',
                html: sweet_loader + '<h5>Please Wait</h5>',
                showConfirmButton: false,
                allowOutsideClick: false,
                allowEscapeKey: false
            });
            $.ajax({
                url: "{{ env('BASE_URL_API')}}" + '/api/invoice/report',
                type: "GET",
                dataType: "json",
                success: function(res) {
                    $('.count_tenant').html(res.count_tenant);
                    $('.count_invoice').html(res.count_invoice);
                    $('.invoice_paid').html('Rp. ' + parseInt(res.invoice_paid).toLocaleString('en-US'));
                    $('.invoice_not_paid').html('Rp. ' + parseInt(res.invoice_not_paid).toLocaleString('en-US'));
                    Swal.close();
                },
                error: function(errors) {
                    console.log(errors);
                }
            });
        }

        $(document).on('click', '.send-email', function(event) {
            event.preventDefault();
            Swal.fire({
                title: 'Apakah anda yakin?',
                icon: 'warning',
                showCancelButton: true,
                buttonsStyling: false,
                confirmButtonText: "Ya, Kirim!",
                cancelButtonText: "Batal",
                customClass: {
                    confirmButton: "btn fw-bold btn-primary",
                    cancelButton: "btn fw-bold btn-active-light-primary"
                }
            }).then((result) => {
                if (result.value) {
                    let id = $(this).data('id');
                    let datas = {}
                    datas.status = 'Terkirim';
                    Swal.fire({
                        title: 'Memeriksa...',
                        text: "Harap menunggu",
                        imageUrl: "{{ asset('waiting.gif') }}",
                        showConfirmButton: false,
                        allowOutsideClick: false
                    });
                    $.ajax({
                        url: "{{ env('BASE_URL_API')}}" + '/api/invoice/update-status/' + id,
                        type: "PATCH",
                        data: JSON.stringify(datas),
                        contentType: "application/json; charset=utf-8",
                        dataType: "json",
                        success: function(response) {
                            Swal.fire({
                                title: 'Berhasil',
                                text: 'Berhasil Mengirim Invoice',
                                icon: 'success',
                                customClass: {
                                    confirmButton: 'btn btn-primary'
                                },
                                buttonsStyling: false
                            }).then((result) => {
                                $('.invoice-list-table').DataTable().ajax.reload();
                            });
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
            });
        });

        $(document).on('click', '.delete-record', function(event) {
            event.preventDefault();
            Swal.fire({
                title: 'Apakah anda yakin?',
                icon: 'warning',
                showCancelButton: true,
                buttonsStyling: false,
                confirmButtonText: "Ya, Hapus!",
                cancelButtonText: "Batal",
                customClass: {
                    confirmButton: "btn fw-bold btn-primary",
                    cancelButton: "btn fw-bold btn-active-light-primary"
                }
            }).then((result) => {
                if (result.value) {
                    let id = $(this).data('id');
                    let datas = {}
                    datas.status = 'Terkirim';
                    Swal.fire({
                        title: 'Memeriksa...',
                        text: "Harap menunggu",
                        imageUrl: "{{ asset('waiting.gif') }}",
                        showConfirmButton: false,
                        allowOutsideClick: false
                    });
                    $.ajax({
                        url: "{{ env('BASE_URL_API')}}" + '/api/invoice/' + id,
                        type: "DELETE",
                        data: JSON.stringify(datas),
                        contentType: "application/json; charset=utf-8",
                        dataType: "json",
                        success: function(response) {
                            Swal.fire({
                                title: 'Berhasil',
                                text: 'Berhasil Menghapus Invoice',
                                icon: 'success',
                                customClass: {
                                    confirmButton: 'btn btn-primary'
                                },
                                buttonsStyling: false
                            }).then((result) => {
                                $('.invoice-list-table').DataTable().ajax.reload();
                            });
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
            });
        });

        var a = $(".invoice-list-table");
        if (a.length) var e = a.DataTable({
            responsive: true,
            processing: true,
            serverSide: true,
            deferRender: true,
            ajax: {
                url: "{{ url('invoice/data-invoice') }}",
                "data": function(d) {
                    d.start = 0;
                    d.page = $(".invoice-list-table").DataTable().page.info().page + 1;
                }
            },
            columns: [{
                name: "invoice_number",
                data: "invoice_number",
                title: "No. Invoice",
                className: 'text-center',
                render: function(data, type, row) {
                    return data;
                }
            }, {
                name: "invoice_date",
                data: "invoice_date",
                title: "Tanggal Buat",
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
                title: "Umur Piutang",
                data: "invoice_date",
                className: 'text-center',
                render: function(data, type, row) {

                    let creted = new Date(data);
                    let today = new Date();
                    let diffTime = Math.abs(today - creted);
                    let diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));
                    return diffDays;
                }
            }, 
            {
                class: "text-center",
                data: "status",
                name: "status",
                title: "Status",
                className: 'text-center',
                render: function(data, type, row) {
                    if (data == 'Terbuat') {
                        return '<span class="badge w-100" style="background-color : #BFBFBF; " text-capitalized> Terbuat </span>';
                    } else if (data == 'Disetujui KA') {
                        return '<span class="badge w-100" style="background-color : #4EC0D9; " text-capitalized> Disetujui KA </span>';
                    } else if (data == 'Lunas') {
                        return '<span class="badge w-100" style="background-color : #74D94E; " text-capitalized> Lunas </span>';
                    } else if (data == 'Terkirim') {
                        return '<span class="badge w-100" style="background-color : #FF87A7; " text-capitalized> Terkirim </span>';
                    } else if (data == 'Disetujui BM') {
                        return '<span class="badge w-100" style="background-color : #4E6DD9; " text-capitalized> Disetujui BM </span>';
                    } else if (data == 'Kurang Bayar') {
                        return '<span class="badge w-100" style="background-color : #ff9f43; " text-capitalized> Kurang Bayar </span>';
                    }
                }
            },
            {
                name: "tenant_name",
                data: "tenant_name",
                title: "Perusahaan",
                className: 'text-center',
                render: function(data, type, row) {
                    return data;
                }
            }, 
            // {
            //     title: "Nama Tagihan",
            //     className: 'text-center',
            // }, 
            {
                name: "grand_total",
                data: "grand_total",
                title: "Total Invoice",
                className: 'text-center',
                render: function(data, type, row) {

                    return new Intl.NumberFormat("id-ID", {
                        style: "currency",
                        currency: "IDR"
                    }).format(data)

                }
            }, {
                title: "Sisa Tagihan",
                name: "remaining",
                data: "remaining",
                className: 'text-center',
                render: function(data, type, row) {

                    return new Intl.NumberFormat("id-ID", {
                        style: "currency",
                        currency: "IDR"
                    }).format(data)
                }

            }],
            order: [
                [3, "desc"]
            ],
            dom: '<"row mx-1"<"col-12 col-md-6 d-flex align-items-center justify-content-center justify-content-md-start gap-2"l<"dt-action-buttons text-xl-end text-lg-start text-md-end text-start mt-md-0 mt-3"B>><"col-12 col-md-6 d-flex align-items-center justify-content-end  flex-md-row pe-3 gap-md-3"f<"invoice_status d-flex mb-3 mb-md-0">>>t<"row mx-2"<"col-sm-12 col-md-6"i><" col-sm-12 col-md-6"p>>',
            language: {
                sLengthMenu: "Show _MENU_",
                search: "",
                searchPlaceholder: "Search Invoice"
            },
            buttons: buttonAdd,
            responsive: {
                details: {
                    display: $.fn.dataTable.Responsive.display.modal({
                        header: function(a) {

                            return "Detail"
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
                        lsp = $(
                            '<select id="UserRole" class="form-select"><option value=""> Select Status </option><option value="disetujui bm"> Disetujui BM </option><option value="dibuat"> Dibuat </option><option value="terkirim"> Terkirim </option><option value="lunas"> Lunas </option></select>'
                        ).appendTo(".invoice_status").on("change", (
                            function() {
                                var e = $.fn.dataTable.util.escapeRegex($(
                                    this).val());
                                console.log(e);
                                a.columns(3).search(e)
                                    .draw()
                            })),
                        f =  $(
                            '<input class="form-select  ms-2" type="text" id="date_select" value="Select Date"></input>'
                        ).appendTo(".invoice_status")
                      
                        $('#date_select').daterangepicker({
                            opens: 'left'
                        }, (start, end, label) => {
                           
                         
                            console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
                        });

                        $('#date_select').on('apply.daterangepicker', function(ev, picker) {
                                console.log(0)
                                a.draw()
                             });
                             
                        f =  $(
                           `<button class="btn btn-sm btn-success ms-2 w-100"><i class="ti ti-download me-md-1"></i><span class="d-md-inline-block d-none">Download .XLSX</span></button>`
                        ).appendTo(".invoice_status").on("click", () => {
                            window.location = "{{url('report/report-invoice/file-export')}}"
                        })
                      
                        $('#date_select').daterangepicker({
                            opens: 'left'
                        }, (start, end, label) => {
                           
                         
                            console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
                        });

                    a.data().unique().sort().each((function(a, t) {
                        e.append('<option value="' + a +
                            '" class="text-capitalize">' + a +
                            "</option>")
                    }))
                }))
            }
        });
        $.fn.dataTable.ext.search.push(
            ( settings, data, dataIndex ) => {
                var min  = start.format('08-09-2020')
                var max  = end.format('09-09-2021')
                var createdAt = data[2] || 0; // Our date column in the table
                console.log(createdAt)
                if  ( 
                        ( min == "" || max == "" )
                        || 
                        ( moment(createdAt).isSameOrAfter(min) && moment(createdAt).isSameOrBefore(max) ) 
                    )
                {
                    return true;
                }
                return false;
            }
        )
        a.on("draw.dt", (function() {
            [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]')).map((
                function(a) {
                    return new bootstrap.Tooltip(a, {
                        boundary: document.body
                    })
                }))
        })), $(".invoice-list-table tbody").on("click", ".delete-record", (function() {
            e.row($(this).parents("tr")).remove().draw()
        })), setTimeout((() => {
            $(".dataTables_filter .form-control").removeClass("form-control-sm"), $(
                ".dataTables_length .form-select").removeClass("form-select-sm")
        }), 300)
    }));
</script>



@endsection