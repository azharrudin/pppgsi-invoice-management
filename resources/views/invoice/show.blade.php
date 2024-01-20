@php
$configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Invoice')

@section('page-style')
{{-- Page Css files --}}
<link rel="stylesheet" href="{{asset('assets/vendor/libs/select2/select2.css')}}">
<link rel="stylesheet" href="{{asset('assets/vendor/libs/flatpickr/flatpickr.css')}}">
<link rel="stylesheet" href="{{asset('assets/vendor/libs/sweetalert2/sweetalert2.css')}}">
@endsection

@section('content')
<!-- Content -->
<div class="container-xxl flex-grow-1 container-p-y">
    <form id="create-invoice" class="create-invoice" novalidate>
        <div class="row invoice-add">
            <!-- Invoice Add-->
            <div class="col-lg-9 col-12 mb-lg-0 mb-3">
                <div class="card invoice-preview-card">
                    <div class="card-body">
                        <div style="background-image: url('{{ asset('assets/img/header.png') }}'); background-size: contain; background-repeat: no-repeat;" class="set-back">
                        </div>

                        <div class="row px-4">
                            <div class="col-md-6">
                                <label for="select2Primary" class="form-label">Kepada Yth, </label>
                                <br>
                                <div class="form-label">
                                    <span id="company"></span><br>
                                    <span id="floor"></span><br><br>
                                    <span id="name_tenant"></span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row d-flex justify-content-end">
                                    <div class="col-md-6 mb-3">
                                        <label for="note" class="form-label fw-medium">No. Invoice</label>
                                        <input type="text" class="form-control" id="invoice_number" placeholder="" readonly />
                                        <div class="invalid-feedback">Tidak boleh kosong</div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="note" class="form-label fw-medium">Tgl. Invoice</label>
                                        <input type="text" class="form-control date" name="invoice_date" id="invoice_date" placeholder="" readonly />
                                        <div class="invalid-feedback">Tidak boleh kosong</div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="note" class="form-label fw-medium">No. Kontrak</label>
                                        <input type="text" class="form-control" name="contract_number" id="contract_number" placeholder="" readonly />
                                        <div class="invalid-feedback">Tidak boleh kosong</div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="note" class="form-label fw-medium">Tanggal</label>
                                        <input type="text" class="form-control  date" name="contract_date" id="contract_date" placeholder="" readonly />
                                        <div class="invalid-feedback">Tidak boleh kosong</div>
                                    </div>
                                    <div class="col-md-6 mb-3 ">
                                        <label for="note" class="form-label fw-medium">No. Addendum</label>
                                        <input type="text" class="form-control" name="addendum_number" id="addendum_number" placeholder="" readonly />
                                        <div class="invalid-feedback">Tidak boleh kosong</div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="note" class="form-label fw-medium">Tanggal</label>
                                        <input type="text" class="form-control date" id="addendum_date" name="addendum_date" placeholder="" readonly />
                                        <div class="invalid-feedback">Tidak boleh kosong</div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row my-3 form-label">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Uraian</th>
                                            <th>Keterangan</th>
                                            <th>Dasar Pengenaan Pajak</th>
                                            <th>Pajak</th>
                                            <th>Total (Rp.).</th>
                                        </tr>
                                    </thead>
                                    <tbody class="table-border-bottom-0" id="details">

                                        <tr>
                                            <td colspan="2"></td>
                                            <td class="">
                                                <p class="fw-bold">Total:</p>
                                            </td>
                                            <td colspan="2">
                                                <p id="grand_total" class="fw-bold"></p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="5">Terbilang</td>
                                        </tr>
                                        <tr>
                                            <td colspan="5" id="grand_total_spelled" style="font-weight:bold; font-size:14px"></td>
                                        </tr>
                                        <tr>
                                            <td colspan="5">
                                                <span>Jatuh Tempo Tanggal : </span> <span id="invoice_due_date" class="fw-bold"></span>
                                            </td>
                                        </tr>
                                    </tbody>
                                    <tfoot>

                                    </tfoot>
                                </table>
                            </div>
                        </div>

                        <div class="row m-sm-2 m-0 ">
                            <div class="col-md-6 mb-md-0 mb-3">
                                <div class="mb-3">
                                    <label for="note" class="form-label me-2">Syarat & Ketentuan</label>
                                    <br>
                                    <div class="form-label fw-bold" id="term_and_conditions">
                                    </div>

                                </div>
                                <div class="mb-3">
                                    <label for="note" class="form-label me-2">Transfer Bank :</label>
                                    <select name="bank" id="bank" name="bank" class="form-select w-px-250 item-details mb-3" hidden>
                                    </select>
                                    <br>
                                    <div class="form-label">
                                        <span class="fw-bold" id="account-name"></span><br>
                                        <span class="fw-bold" id="bank-name"></span><br>
                                        <span class="fw-bold" id="branch-name"></span><br>
                                        <span class="fw-bold" id="account-number"></span><br>
                                    </div>


                                </div>
                            </div>
                            <div class="col-md-6 mb-md-0 mb-3 data-material d-flex flex-column align-items-center text-center d-none">
                                <div class="mb-3">
                                    <label for="note" class="form-label"></label>
                                    <p class="form-label" id="materai_date"></p>
                                </div>
                                <div class="mb-3">
                                    <div id="materai-image"></div>
                                </div>
                                <div class="mb-3">
                                    <p class="form-label" id="materai_name"></p>
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
                        <button class="btn btn-primary d-grid w-100 mb-2 kirim-invoice d-none" data-bs-toggle="offcanvas" data-bs-target="#sendInvoiceOffcanvas">
                            <span class="d-flex align-items-center justify-content-center text-nowrap"><i class="ti ti-send ti-xs me-2"></i>Kirim Invoice</span>
                        </button>
                        <a type="button" class="btn btn-primary d-grid w-100 mb-2 disetujui d-none" style="color : #fff;"><span class="d-flex align-items-center justify-content-center text-nowrap"><i class="ti ti-check ti-xs me-2"></i>Disetujui</span></a>
                        <a target="_blank" href="{{url('invoice/print/')}}/{{$id}}" id="preview" class="btn btn-label-info d-grid w-100 mb-2 d-none">Download</a>
                        <a target="_blank" href="{{url('invoice/edit/')}}/{{$id}}" id="edit" class="btn btn-primary d-grid w-100 mb-2 edit d-none"><span class="d-flex align-items-center justify-content-center text-nowrap"><i class="ti ti-pencil ti-xs me-2"></i>Edit</span></a>
                        <button class="btn btn-primary d-grid w-100 mb-2 add-pay add-payment d-none">
                            <span class="d-flex align-items-center justify-content-center text-nowrap">Add Payment</span>
                        </button>
                        <a href="{{ url('invoice/list-invoice')}}" id="back" class="btn btn-secondary d-grid w-100 mb-2">Kembali</a>
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
<script src="{{asset('assets/vendor/libs/select2/select2.js')}}"></script>
<script src="{{asset('assets/vendor/libs/flatpickr/flatpickr.js')}}"></script>
<script src="{{asset('assets/vendor/libs/sweetalert2/sweetalert2.js')}}"></script>
<script>
    let account = {!! json_encode(session('data')) !!}
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    var sweet_loader = `<div class="spinner-border mb-8 text-primary" style="width: 5rem; height: 5rem;" role="status">
                                    <span class="sr-only">Loading...</span>
                                </div>`;
    var nomorInvoice;
    var id;

    $(document).ready(function() {
        var urlSegments = window.location.pathname.split('/');
        var idIndex = urlSegments.indexOf('show') + 1;
        id = urlSegments[idIndex];
        getDataInvoice(id);

        $(document).on('click', '#batal', function(event) {
            event.preventDefault();
            window.location.href = "/invoice/list-invoice"
        });

        $(document).on('click', '.kirim-invoice', function(event) {
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
                        url: "{{url('api/invoice/update-status')}}/" + id,
                        type: "PATCH",
                        data: JSON.stringify(datas),
                        contentType: "application/json; charset=utf-8",
                        dataType: "json",
                        success: function(response) {
                            $('.indicator-progress').show();
                            $('.indicator-label').hide();

                            Swal.fire({
                                title: 'Berhasil',
                                text: 'Berhasil Mengirim Invoice',
                                icon: 'success',
                                customClass: {
                                    confirmButton: 'btn btn-primary'
                                },
                                buttonsStyling: false
                            }).then((result) => {
                                localStorage.removeItem('invoice');
                                window.location.href = "/invoice/list-invoice";
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

        $(document).on('click', '.disetujui', function(event) {
            event.preventDefault();
            Swal.fire({
                title: 'Apakah anda yakin?',
                icon: 'warning',
                showCancelButton: true,
                buttonsStyling: false,
                confirmButtonText: "Ya, Setuju!",
                cancelButtonText: "Batal",
                customClass: {
                    confirmButton: "btn fw-bold btn-primary",
                    cancelButton: "btn fw-bold btn-active-light-primary"
                }
            }).then((result) => {
                if (result.value) {
                    let datas = {}
                    datas.status = 'Disetujui KA';
                    Swal.fire({
                        title: 'Memeriksa...',
                        text: "Harap menunggu",
                        imageUrl: "{{ asset('waiting.gif') }}",
                        showConfirmButton: false,
                        allowOutsideClick: false
                    });
                    $.ajax({
                        url: "{{url('api/invoice/update-status')}}/" + id,
                        type: "PATCH",
                        data: JSON.stringify(datas),
                        contentType: "application/json; charset=utf-8",
                        dataType: "json",
                        success: function(response) {
                            $('.indicator-progress').show();
                            $('.indicator-label').hide();
                            Swal.fire({
                                title: 'Berhasil',
                                text: 'Berhasil Menyetujui Invoice',
                                icon: 'success',
                                customClass: {
                                    confirmButton: 'btn btn-primary'
                                },
                                buttonsStyling: false
                            }).then((result) => {
                                localStorage.removeItem('invoice');
                                window.location.href = "/invoice/list-invoice";
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
    });

    function getDataInvoice(id) {
        $.ajax({
            url: "{{url('api/invoice')}}/" + id,
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
                let data = res.data;
                id = data.id;
                getTenant(data.tenant_id)
                getBank(data.bank_id)
                nomorInvoice = data.invoice_number;
                $("#invoice_number").val(data.invoice_number);
                $("#invoice_date").val(data.invoice_date);
                $("#contract_number").val(data.contract_number);
                $("#contract_date").val(data.contract_date);
                $("#addendum_number").val(data.addendum_number);
                $("#addendum_date").val(data.addendum_date);
                $("#grand_total_spelled").text(data.grand_total_spelled);
                $("#grand_total").text(format(data.grand_total));
                $("#invoice_due_date").text(data.invoice_due_date);
                $("#term_and_conditions").text(data.term_and_conditions);
                if (data.materai_name == null || account.level.id == 1) {
                    $('.data-material').removeClass('d-none');
                }
                $("#materai_date").text(data.materai_date);
                $("#materai_name").text(data.materai_name);
                getDetails(data.invoice_details);
                if (data.materai_image) {
                    $("#materai-image").css('background-img', 'black');
                    $("#materai-image").css("background-image", `url('` + data.materai_image + `')`);
                    $("#materai-image").css("height", `200px`);
                    $("#materai-image").css("width", `200px`);
                    $("#materai-image").css("background-position", `center`);
                }
                console.log(data.status);
                if (data.status == 'Terkirim' && account.level.id == 10) {
                    $('.add-payment').removeClass('d-none');
                }
                if (data.status == 'Disetujui BM' && account.level.id == 10) {
                    $('.kirim-invoice').removeClass('d-none');
                }
                if (account.level.id == '2' && data.status == 'Terbuat') {
                    $('.disetujui').removeClass('d-none');
                }
                if ((account.level.id == '10' && data.status == 'Terbuat') || (data.status == 'Disetujui KA' && account.level.id == '1')) {
                    $('.edit').removeClass('d-none');
                }
                Swal.close();
            },
            error: function(errors) {
                console.log(errors);
            }
        });
    }

    $(document).on('click', '.add-pay', function(event) {
        event.preventDefault();
        window.location.href = "/invoice/tanda-terima/add?id-invoice=" + id
    });

    function getTenant(id) {
        $.ajax({
            url: "{{url('api/tenant')}}/" + id,
            type: "GET",
            success: function(response) {
                let data = response.data;
                $("#company").text(data.company);
                $("#floor").text(data.floor);
                $("#name_tenant").text(data.name);
            },
            error: function(xhr, status, error) {
                console.log(error);
            }
        });
    }

    function format(e) {
        var nStr = e + '';

        nStr = nStr.replace(/\,/g, "");
        x = nStr.split('.');
        x1 = x[0];
        x2 = x.length > 1 ? '.' + x[1] : '';
        var rgx = /(\d+)(\d{3})/;
        while (rgx.test(x1)) {
            x1 = x1.replace(rgx, '$1' + ',' + '$2');
        }
        return x1 + x2;
    }

    function getBank(id) {
        $.ajax({
            url: "{{url('api/bank')}}/" + id,
            type: "GET",
            success: function(response) {
                let data = response.data;
                $("#account-name").text(data.account_name);
                $("#account-number").text(data.account_number)
                $("#branch-name").text(data.branch_name)
                $("#bank-name").text(data.name)
            },
            error: function(xhr, status, error) {
                console.log(error);
            }
        });
    }

    function getDetails(detailItems) {
        let details = detailItems;
        let getDetail = '';
        let tem = '';
        for (let i = 0; i < details.length; i++) {
            tem = `<tr>
                        <td>` + details[i].item + `</td>
                        <td>` + details[i].description + `</td>
                        <td>` + format(details[i].price) + `</td>
                        <td>` + format(details[i].tax.name) + `</td>
                        <td>` + format(details[i].total_price) + `</td>
                    </tr>
            `;
            getDetail = getDetail + tem;
        }

        $('#details').prepend(getDetail);
    }
</script>
@endsection