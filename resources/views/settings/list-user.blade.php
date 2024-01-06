@php
$configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'List User')

@section('content')

<nav aria-label="breadcrumb">
    <ol class="breadcrumb breadcrumb-style1">
        <li class="breadcrumb-item">
            <a href="#">User</a>
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
        <table class="list-user-table table">
        </table>
    </div>
</div>


<div class="modal fade" id="create-bank-data" data-bs-backdrop="static" tabindex="-1">
    <div class="modal-dialog">
        <form class="modal-content create-bank" id="create-bank" novalidate>
            <div class="modal-header">
                <h5 class="modal-title" id="backDropModalTitle">Tambah User</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="mb-3">
                        <label for="nameBackdrop" class="form-label">Nama</label>
                        <input type="text" id="name" name="name" class="form-control" placeholder="Masukan Nama" required>
                        <div class="invalid-feedback">Tidak boleh kosong</div>
                    </div>
                    <div class="mb-3">
                        <label for="nameBackdrop" class="form-label">Username</label>
                        <input type="text" id="username" name="username" class="form-control" placeholder="Masukan Username" required>
                        <div class="invalid-feedback">Tidak boleh kosong</div>
                    </div>
                    <div class="mb-3">
                        <label for="nameBackdrop" class="form-label">Password</label>
                        <input type="password" id="password" name="password" class="form-control" placeholder="Masukan Username" required>
                        <div class="invalid-feedback">Tidak boleh kosong</div>
                    </div>
                    <div class="mb-3">
                        <label for="nameBackdrop" class="form-label">Email</label>
                        <input type="email" id="email" name="email" class="form-control" placeholder="Email" required>
                        <div class="invalid-feedback">Tidak boleh kosong</div>
                    </div>
                    <div class="mb-3">
                        <label for="nameBackdrop" class="form-label">Department</label>
                        <select id="department_id" name="department_id" class="form-control" required>
                            <option value="">Pilih Department</option>
                            <option value="1">CS</option>
                            <option value="2">Teknik</option>
                            <option value="3">BM</option>
                            <option value="4">KA Unit Umum</option>
                            <option value="5">KA Unit Account</option>
                        </select>
                        <div class="invalid-feedback">Tidak boleh kosong</div>
                    </div>
                    <div class="mb-3">
                        <label for="nameBackdrop" class="form-label">Level</label>
                        <select id="level_id" name="level_id" class="form-control" required>
                            <option value="">Pilih Level</option>
                            <option value="1">Admin</option>
                            <option value="2">Teknisi</option>
                            <option value="3">Kepala Unitt</option>
                            <option value="4">BM</option>
                            <option value="5">Executive</option>
                            <option value="6">Vendor</option>
                        </select>
                        <div class="invalid-feedback">Tidak boleh kosong</div>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal" id="modal_bank_cancel">Close</button>
                <button type="submit" class="btn btn-primary save-bank">
                    Simpan
                </button>

            </div>
        </form>
    </div>
</div>

<div class="modal fade" id="edit-bank-data" data-bs-backdrop="static" tabindex="-1">
    <div class="modal-dialog">
        <form class="modal-content edit-bank" id="edit-bank" novalidate>
            <input type="hidden" id="edit_id">
            <div class="modal-header">
                <h5 class="modal-title" id="backDropModalTitle">Edit User</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="mb-3">
                        <label for="nameBackdrop" class="form-label">Nama</label>
                        <input type="text" id="edit_name" name="name" class="form-control" placeholder="Masukan Nama" required>
                        <div class="invalid-feedback">Tidak boleh kosong</div>
                    </div>
                    <div class="mb-3">
                        <label for="nameBackdrop" class="form-label">Username</label>
                        <input type="text" id="edit_username" name="username" class="form-control" placeholder="Masukan Username" required>
                        <div class="invalid-feedback">Tidak boleh kosong</div>
                    </div>
                    <div class="mb-3">
                        <label for="nameBackdrop" class="form-label">Password</label>
                        <input type="password" id="edit_password" name="password" class="form-control" placeholder="Masukan Username" required>
                        <div class="invalid-feedback">Tidak boleh kosong</div>
                    </div>
                    <div class="mb-3">
                        <label for="nameBackdrop" class="form-label">Email</label>
                        <input type="email" id="edit_email" name="edit_email" class="form-control" placeholder="Email" required>
                        <div class="invalid-feedback">Tidak boleh kosong</div>
                    </div>
                    <div class="mb-3">
                        <label for="edit_department_id" class="form-label">Department</label>
                        <select id="edit_department_id" name="edit_department_id" class="form-control" required>
                            <option value="">Pilih Department</option>
                            <option value="1">CS</option>
                            <option value="2">Teknik</option>
                            <option value="3">BM</option>
                            <option value="4">KA Unit Umum</option>
                            <option value="5">KA Unit Account</option>
                        </select>
                        <div class="invalid-feedback">Tidak boleh kosong</div>
                    </div>
                    <div class="mb-3">
                        <label for="nameBackdrop" class="form-label">Level</label>
                        <select id="edit_level_id" name="edit_level_id" class="form-control" required>
                            <option value="">Pilih Level</option>
                            <option value="1">Admin</option>
                            <option value="2">Teknisi</option>
                            <option value="3">Kepala Unitt</option>
                            <option value="4">BM</option>
                            <option value="5">Executive</option>
                            <option value="6">Vendor</option>
                        </select>
                        <div class="invalid-feedback">Tidak boleh kosong</div>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal" id="modal_bank_cancel">Close</button>
                <button type="submit" class="btn btn-primary edit-bank">
                    Simpan
                </button>

            </div>
        </form>
    </div>
</div>


<div class="modal fade" id="preview-bank-data" data-bs-backdrop="static" tabindex="-1">
    <div class="modal-dialog">
        <form class="modal-content edit-bank" id="edit-bank" novalidate>
            <input type="hidden" id="preview_id">
            <div class="modal-header">
                <h5 class="modal-title" id="backDropModalTitle">Preview User</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="mb-3">
                        <label for="nameBackdrop" class="form-label">Nama</label>
                        <input type="text" id="preview_name" name="name" class="form-control" placeholder="Masukan Nama" required readonly>
                        <div class="invalid-feedback">Tidak boleh kosong</div>
                    </div>
                    <div class="mb-3">
                        <label for="nameBackdrop" class="form-label">Username</label>
                        <input type="text" id="preview_username" name="username" class="form-control" placeholder="Masukan Username" required readonly>
                        <div class="invalid-feedback">Tidak boleh kosong</div>
                    </div>

                    <div class="mb-3">
                        <label for="nameBackdrop" class="form-label">Email</label>
                        <input type="email" id="preview_email" name="email" class="form-control" placeholder="Email" required readonly>
                        <div class="invalid-feedback">Tidak boleh kosong</div>
                    </div>
                    <div class="mb-3">
                        <label for="nameBackdrop" class="form-label">Department</label>
                        <select id="preview_department" name="department" class="form-control" required readonly>
                            <option value="">Pilih Department</option>
                            <option value="1">CS</option>
                            <option value="2">Teknik</option>
                            <option value="3">BM</option>
                            <option value="4">KA Unit Umum</option>
                            <option value="5">KA Unit Account</option>
                        </select>
                        <div class="invalid-feedback">Tidak boleh kosong</div>
                    </div>
                    <div class="mb-3">
                        <label for="nameBackdrop" class="form-label">Level</label>
                        <select id="preview_level" name="level" class="form-control" required readonly>
                            <option value="">Pilih Level</option>
                            <option value="1">Admin</option>
                            <option value="2">Teknisi</option>
                            <option value="3">Kepala Unitt</option>
                            <option value="4">BM</option>
                            <option value="5">Executive</option>
                            <option value="6">Vendor</option>
                        </select>
                        <div class="invalid-feedback">Tidak boleh kosong</div>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal" id="modal_bank_cancel">Close</button>
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

    var sweet_loader = `<div class="spinner-border mb-8 text-primary" style="width: 5rem; height: 5rem;" role="status">
                                    <span class="sr-only">Loading...</span>
                                </div>`;

    $((function() {
        var a = $(".list-user-table");
        if (a.length) var e = a.DataTable({
            processing: true,
            serverSide: true,
            deferRender: true,
            ajax: {
                url: "{{ route('data-user') }}",
                "data": function(d) {
                    d.start = 0;
                    d.page = $(".list-user-table").DataTable().page.info().page + 1;
                }
            },
            columns: [{
                    data: "name",
                    title: "Nama",
                    name: "Nama"
                },
                {
                    data: "email",
                    title: "Email",
                    name: "Email"
                },
                {
                    data: "department.name",
                    title: "Departement",
                    name: "Departement"
                },
                {
                    data: "level.name",
                    title: "Level",
                    name: "Level"
                },
                {
                    data: "status",
                    title: "Status",
                    name: "Status"
                },

                {
                    data: "id",
                    name: "tanggapan",
                    title: "Tanggapan",
                    render: function(data, type, row) {
                        return `
                        <div class="d-flex align-items-center">
                        <a href="javascript:void(0)"  id="button-edit" data-bs-toggle="modal" data-id="` + data + `" class="text-body"><i class="ti ti-pencil mx-2 ti-sm"></i></a>
                        <a href="javascript:void(0)"  id="button-preview" data-bs-toggle="modal" data-id="` + data + `" class="text-body"><i class="ti ti-eye mx-2 ti-sm"></i></a>
                        <a href="javascript:void(0)"  id="button-delete"  data-id="` + data + `" class="text-body"><i class="ti ti-trash mx-2 ti-sm"></i></a>
                        </div>`;
                    }
                },
            ],
            order: [
                [1, "desc"]
            ],
            dom: '<"row mx-1"<"col-12 col-md-6 d-flex align-items-center justify-content-center justify-content-md-start gap-2"l<"dt-action-buttons text-xl-end text-lg-start text-md-end text-start mt-md-0 mt-3"B>><"col-12 col-md-6 d-flex align-items-center justify-content-end flex-column flex-md-row pe-3 gap-md-3"f<"invoice_status mb-3 mb-md-0">>>t<"row mx-2"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>',
            language: {
                sLengthMenu: "Show _MENU_",
                search: "",
                searchPlaceholder: "Cari User"
            },
            buttons: [{
                text: '<i class="ti ti-plus me-md-1"></i><span class="d-md-inline-block d-none">Buat User</span>',
                className: "btn btn-primary",
                attr: {
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
        })), $(".list-user-table tbody").on("click", ".delete-record", (function() {
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
        form.addEventListener(
            "submit",
            function(event) {
                if (!form.checkValidity()) {
                    event.preventDefault();
                    event.stopPropagation();
                } else {
                    // Submit your form
                    event.preventDefault();
                    let name = $('#name').val();
                    let email = $('#email').val();
                    let password = $('#password').val();
                    let department = $('#department_id').val();
                    let level = $('#level_id').val();
                    let data = {};
                    data.name = name;
                    data.email = email;
                    data.password = password;
                    data.level_id = parseInt(level);
                    data.department_id = parseInt(department);
                    data.status = 'Active';
                    data.image = "a";
                    console.log(data);
                    $.ajax({
                        url: "{{env('BASE_URL_API')}}" + "/api/user",
                        type: "POST",
                        data: data,
                        success: function(response) {
                            Swal.fire({
                                title: 'Berhasil',
                                text: 'Berhasil menambahkan User',
                                icon: 'success',
                                customClass: {
                                    confirmButton: 'btn btn-primary'
                                },
                                buttonsStyling: false
                            })

                            $('#modal_bank_cancel').click();
                            $('#create-bank')[0].reset();
                            $(".list-user-table").DataTable().ajax.reload();
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

    Array.prototype.slice.call(editBank).forEach(function(form) {
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
                    let name = $('#edit_name').val();
                    let email = $('#edit_email').val();
                    let password = $('#edit_password').val();
                    let department = $('#edit_department_id').val();
                    let level = $('#edit_level_id').val();
                    let data = {};
                    data.name = name;
                    data.email = email;
                    data.password = password;
                    data.level_id = parseInt(level);
                    data.department_id = parseInt(department);
                    data.status = 'Active';
                    $.ajax({
                        url: "{{env('BASE_URL_API')}}" + "/api/user/" + id,
                        type: "PATCH",
                        data: data,
                        success: function(response) {
                            Swal.fire({
                                title: 'Berhasil',
                                text: 'Berhasil Memperbarui User',
                                icon: 'success',
                                customClass: {
                                    confirmButton: 'btn btn-primary'
                                },
                                buttonsStyling: false
                            })

                            $('#modal_bank_cancel').click();
                            $('#edit-bank')[0].reset();
                            $('#edit-bank-data').modal('hide');

                            $(".list-user-table").DataTable().ajax.reload();
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
            url: "{{env('BASE_URL_API')}}" + "/api/user/" + id,
            type: "get",
            contentType: "application/json; charset=utf-8",
            dataType: "json",
            success: function(response) {
                console.log(response);
                $('#edit_id').val(response.data.id);
                $('#edit_name').val(response.data.name)
                $('#edit_username').val(response.data.username)
                $('#edit_email').val(response.data.email)
                $('#edit_department_id').val(response.data.department.id)
                $('#edit_level_id').val(response.data.level.id)
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

    $(document).on('click', '#button-preview', function(event) {
        let id = $(this).data('id');

        $.ajax({
            url: "{{env('BASE_URL_API')}}" + "/api/user/" + id,
            type: "get",
            contentType: "application/json; charset=utf-8",
            dataType: "json",
            success: function(response) {
                console.log(response);
                $('#preview_id').val(response.data.id);
                $('#preview_name').val(response.data.name)
                $('#preview_username').val(response.data.username)
                $('#preview_email').val(response.data.email)
                $('#preview_department').val(response.data.department_id)
                $('#preview_level').val(response.data.level_id)
                $('#preview-bank-data').modal('show')
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

    $(document).on('click', '#button-delete', function(event) {
        let id = $(this).data('id');
        console.log(id);
        event.stopPropagation();
        Swal.fire({
            text: "Apakah Ingin menghapus User ini  ?",
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
                hapusBank(id);
                // window.location.href = "/pja";
            }
        });
    });

    function hapusBank(id) {
        Swal.fire({
            title: '<h2>Loading...</h2>',
            html: sweet_loader + '<h5>Please Wait</h5>',
            showConfirmButton: false,
            allowOutsideClick: false,
            allowEscapeKey: false
        })

        $.ajax({
            url: "{{env('BASE_URL_API')}}" + "/api/user" + "/" + id,
            type: "DELETE",
            contentType: false,
            processData: false,
            async: true,
            success: function(response, result) {
                Swal.fire({
                    title: 'Berhasil',
                    text: 'Berhasil Hapus User',
                    icon: 'success',
                    customClass: {
                        confirmButton: 'btn btn-primary'
                    },
                    buttonsStyling: false
                }).then(async function(res) {
                    $(".list-user-table").DataTable().ajax.reload();
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