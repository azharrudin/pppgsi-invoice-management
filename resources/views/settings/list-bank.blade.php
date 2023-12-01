@php
    $configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'List Bank')

@section('page-style')
{{-- Page Css files --}}
<link rel="stylesheet" href="{{asset('assets/vendor/libs/animate-css/animate.css')}}">
<link rel="stylesheet" href="{{asset('assets/vendor/libs/sweetalert2/sweetalert2.css')}}">
@endsection

@section('content')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-style1">
            <li class="breadcrumb-item">
                <a href="#">Bank</a>
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
            <table class="list-bank-table table">
              
            </table>
        </div>
    </div>

    {{-- Card Add --}}
    <div class="modal fade" id="create-bank-data" data-bs-backdrop="static" tabindex="-1">
        <div class="modal-dialog">
            <form class="modal-content create-bank" id="create-bank" novalidate>
            <div class="modal-header">
                <h5 class="modal-title" id="backDropModalTitle">Tambah Bank</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col mb-3">
                        <label for="nameBackdrop" class="form-label">Nama Bank</label>
                        <input type="text" id="name" name="name" class="form-control" placeholder="Masukan Nama Bank" required >
                        <div class="invalid-feedback"> Please enter your name. </div>
                    </div>
                </div>
              
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal" id="modal_bank_cancel">Close</button>
                <button type="submit" class="btn btn-primary save-bank">
                <span class="indicator-label">Simpan</span>
                <span class="indicator-progress">
                    Please wait...
                    <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                </span>
                </button>
                
            </div>
            </form>
        </div>
    </div>
   
    {{-- Card Edit --}}
    <div class="modal fade" id="edit-bank-data" data-bs-backdrop="static" tabindex="-1">
        <div class="modal-dialog">
            <form class="modal-content edit-bank" id="edit-bank" novalidate>
            <input type="hidden" id="edit_id">
            <div class="modal-header">
                <h5 class="modal-title" id="backDropModalTitle">Edit Bank</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col mb-3">
                        <label for="nameBackdrop" class="form-label">Nama Bank</label>
                        <input type="text" id="edit_name" name="name" class="form-control" placeholder="Masukan Nama Bank" required >
                        <div class="invalid-feedback"> Please enter your name. </div>
                    </div>
                </div>
              
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal" id="modal_bank_cancel">Close</button>
                <button type="submit" class="btn btn-primary save-bank">
                <span class="indicator-label">Simpan</span>
                <span class="indicator-progress">
                    Please wait...
                    <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                </span>
                </button>
                
            </div>
            </form>
        </div>
    </div>

@endsection

@section('page-script')
<script src="{{asset('assets/vendor/libs/sweetalert2/sweetalert2.js')}}"></script>
    <script>
        "use strict";
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        
        $((function() {
            var a = $(".list-bank-table");
            if (a.length) var e = a.DataTable({
                ajax: {
                    url : baseUrl+"api/bank"
                },
                columns: [
                    {
                        data: "name",
                        title : "Nama Bank"
                    },
                    {
                        title : "Tanggal Dibuat",
                        data: "created_at",
                        render: function(data, type, row) {
                            if (data != null) {
                                const date = new Date(data);
                                const year = date.getUTCFullYear();
                                const month = new Intl.DateTimeFormat('en-US', {
                                    month: 'long'
                                }).format(date);
                                const day = date.getUTCDate();
                                const formattedDate = `${day} ${month} ${year}`;
                                return formattedDate;
                            } else {
                                return '';
                            }
                        }
                    },
                    {
                        title:"Tanggapan",
                        data: null
                    },
                ]

                ,
                columnDefs: [
                    {
                    targets: -1,
                    title: "Tanggapan",
                    searchable: !1,
                    orderable: !1,
                    render: function(data, type, row) {
                        return '<div class="d-flex align-items-center"><a href="javascript:;" data-bs-toggle="tooltip" class="text-body" data-bs-placement="top" title="Send Mail"><i class="ti ti-mail mx-2 ti-sm"></i></a><a href="' +
                            baseUrl +
                            'app/invoice/preview" data-bs-toggle="tooltip" class="text-body" data-bs-placement="top" title="Preview Invoice"><i class="ti ti-eye mx-2 ti-sm"></i></a><div class="dropdown"><a href="javascript:;" class="btn dropdown-toggle hide-arrow text-body p-0" data-bs-toggle="dropdown"><i class="ti ti-dots-vertical ti-sm"></i></a><div class="dropdown-menu dropdown-menu-end"><a href="javascript:;" class="dropdown-item">Download</a><a href="javascript:void(0)"  id="button-edit" data-bs-toggle="modal" data-id="'+data.id+'" class="dropdown-item">Edit</a><a href="javascript:;" class="dropdown-item">Duplicate</a><div class="dropdown-divider"></div><a href="javascript:;" class="dropdown-item delete-record text-danger">Delete</a></div></div></div>'
                    }
                }],
                order: [
                    [1, "desc"]
                ],
                dom: '<"row mx-1"<"col-12 col-md-6 d-flex align-items-center justify-content-center justify-content-md-start gap-2"l<"dt-action-buttons text-xl-end text-lg-start text-md-end text-start mt-md-0 mt-3"B>><"col-12 col-md-6 d-flex align-items-center justify-content-end flex-column flex-md-row pe-3 gap-md-3"f<"invoice_status mb-3 mb-md-0">>>t<"row mx-2"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>',
                language: {
                    sLengthMenu: "Show _MENU_",
                    search: "",
                    searchPlaceholder: "Search Bank"
                },
                buttons: [{
                    text: '<i class="ti ti-plus me-md-1"></i><span class="d-md-inline-block d-none">Buat List Bank</span>',
                    className: "btn btn-primary",
                    attr:  {
                        'data-bs-toggle': 'modal',
                        'data-bs-target': '#create-bank-data'
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
            })), $(".list-bank-table tbody").on("click", ".delete-record", (function() {
                e.row($(this).parents("tr")).remove().draw()
            })), setTimeout((() => {
                $(".dataTables_filter .form-control").removeClass("form-control-sm"), $(
                    ".dataTables_length .form-select").removeClass("form-select-sm")
            }), 300)
        }));

        var createBank = $(".create-bank");
        var editBank = $(".edit-bank");


        // Loop over them and prevent submission
        Array.prototype.slice.call(createBank).forEach(function(form) {
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
                    var formData = new FormData($('#create-bank')[0]);
                    $.ajax({
                    url: baseUrl+"api/bank",
                    type: "POST",
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        $('.indicator-progress').show();
                        $('.indicator-label').hide();

                        Swal.fire({
                            title: 'Berhasil',
                            text: 'Berhasil menambahkan Bank',
                            icon: 'success',
                            customClass: {
                            confirmButton: 'btn btn-primary'
                            },
                            buttonsStyling: false
                        })

                        $('#modal_bank_cancel').click();
                        $('#create-bank')[0].reset();
                        $(".list-bank-table").DataTable().ajax.reload();
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

        $(document).on('click', '#button-edit', function(event) {
            let id = $(this).data('id');

            $.ajax({
                url: baseUrl+"api/bank/"+ id,
                type: "get",
                contentType: "application/json; charset=utf-8",
                dataType: "json",
                success: function(response) {
                    $('#edit_id').val(response.data.id);
                    $('#edit_name').val(response.data.name)
                    $('#edit-bank-data').modal('show')
                },
                error: function(errors) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: errors.responseJSON.message,
                    })
                }
            });
        });

        Array.prototype.slice.call(editBank).forEach(function(form) {
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
                    let id = $('#edit_id').val();
                    var data = $('#edit-bank').serialize();
                    $.ajax({
                    url: baseUrl+"api/bank/"+id,
                    type: "PATCH",
                    data: data,
                    success: function(response) {
                        $('.indicator-progress').show();
                        $('.indicator-label').hide();

                        Swal.fire({
                            title: 'Berhasil',
                            text: 'Berhasil Memperbarui Bank',
                            icon: 'success',
                            customClass: {
                            confirmButton: 'btn btn-primary'
                            },
                            buttonsStyling: false
                        })

                        $('#modal_bank_cancel').click();
                        $('#edit-bank')[0].reset();
                        $('#edit-bank-data').modal('hide');

                        $(".list-bank-table").DataTable().ajax.reload();
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
    </script>

@endsection
