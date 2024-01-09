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
                                        <input type="text" class="form-control date" name="invoice_date" id="invoice_date" placeholder="" required />
                                        <div class="invalid-feedback">Tidak boleh kosong</div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="note" class="form-label fw-medium">No. Kontrak</label>
                                        <input type="text" class="form-control" name="contract_number" id="contract_number" placeholder="" required />
                                        <div class="invalid-feedback">Tidak boleh kosong</div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="note" class="form-label fw-medium">Tanggal</label>
                                        <input type="text" class="form-control  date" name="contract_date" id="contract_date" placeholder="" required />
                                        <div class="invalid-feedback">Tidak boleh kosong</div>
                                    </div>
                                    <div class="col-md-6 mb-3 ">
                                        <label for="note" class="form-label fw-medium">No. Addendum</label>
                                        <input type="text" class="form-control" name="addendum_number" id="addendum_number" placeholder="" required />
                                        <div class="invalid-feedback">Tidak boleh kosong</div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="note" class="form-label fw-medium">Tanggal</label>
                                        <input type="text" class="form-control date" id="addendum_date" name="addendum_date" placeholder="" required />
                                        <div class="invalid-feedback">Tidak boleh kosong</div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- {{-- Repeater --}}
                        <div class="repeater d-none">
                            <div class="" data-repeater-list="group-a">
                                <div class="row-mg">
                                    <div class="col-12 d-flex align-items-center justify-content-between">
                                        <div class="col-sm-2 mb-3 mx-2">
                                            <label for="note" class="form-label fw-medium">Uraian</label>
                                            <input type="text" name="uraian" class="form-control w-px-150 row-input" placeholder="" name="item[]" required />
                                        </div>
                                        <div class="col-sm-2 mb-3 mx-2">
                                            <label for="note" class="form-label fw-medium">Keterangan</label>
                                            <input type="text" class="form-control w-px-150 row-input" placeholder="" name="description[]" required />
                                        </div>
                                        <div class="col-sm-2 mb-3 mx-2">
                                            <label for="note" class="form-label fw-medium">Dasar Pengenaan Pajak</label>
                                            <input type="text" class="form-control w-px-150 row-input price" placeholder="" name="price[]" required />
                                        </div>
                                        <div class="col-sm-1 mb-3 mx-2">
                                            <label for="note" class="form-label fw-medium">Pajak</label>
                                            <input type="text" class="form-control w-150 row-input tax" placeholder="" name="tax[]" required />
                                        </div>
                                        <div class="col-sm-2 mb-3 mx-2">
                                            <label for="note" class="form-label fw-medium">Total (Rp.)</label>
                                            <input type="text" class="form-control w-px-150 row-input total_price" placeholder="" name="total_price[]" disabled />
                                        </div>
                                        <a class="mb-3 mx-2 mt-3 btn-remove-mg" role="button">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12" fill="none">
                                                <circle cx="6" cy="6" r="6" fill="#D9D9D9" />
                                                <path d="M6.70432 5.99276L8.85224 3.8544C8.9463 3.76053 8.99915 3.63323 8.99915 3.50049C8.99915 3.36775 8.9463 3.24045 8.85224 3.14659C8.75818 3.05273 8.63061 3 8.49759 3C8.36456 3 8.23699 3.05273 8.14293 3.14659L6 5.28994L3.85707 3.14659C3.76301 3.05273 3.63544 3 3.50241 3C3.36939 3 3.24182 3.05273 3.14776 3.14659C3.0537 3.24045 3.00085 3.36775 3.00085 3.50049C3.00085 3.63323 3.0537 3.76053 3.14776 3.8544L5.29568 5.99276L3.14776 8.13113C3.10094 8.17747 3.06378 8.23259 3.03842 8.29334C3.01306 8.35408 3 8.41923 3 8.48503C3 8.55083 3.01306 8.61598 3.03842 8.67672C3.06378 8.73746 3.10094 8.79259 3.14776 8.83893C3.19419 8.88565 3.24944 8.92273 3.31031 8.94804C3.37118 8.97335 3.43647 8.98637 3.50241 8.98637C3.56836 8.98637 3.63365 8.97335 3.69452 8.94804C3.75539 8.92273 3.81063 8.88565 3.85707 8.83893L6 6.69558L8.14293 8.83893C8.18937 8.88565 8.24461 8.92273 8.30548 8.94804C8.36635 8.97335 8.43164 8.98637 8.49759 8.98637C8.56353 8.98637 8.62882 8.97335 8.68969 8.94804C8.75056 8.92273 8.80581 8.88565 8.85224 8.83893C8.89906 8.79259 8.93622 8.73746 8.96158 8.67672C8.98694 8.61598 9 8.55083 9 8.48503C9 8.41923 8.98694 8.35408 8.96158 8.29334C8.93622 8.23259 8.89906 8.17747 8.85224 8.13113L6.70432 5.99276Z" fill="#FF4747" />
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <div class="row pb-4">
                                <div class="col-sm-3 px-3">
                                    <button type="button" class="btn btn-primary waves-effect waves-light w-px-150 btn-add-row-mg">Tambah
                                        Baris</button>
                                </div>
                            </div>
                        </div>

                        {{-- Divider --}}
                        <div class="px-5 d-none">
                            <hr class="my-3 mx-n5">
                        </div>

                        {{-- Total --}}
                        <div class="col-md-12 d-flex float-end px-5 mb-5 d-none">
                            <div class="col-6"></div>
                            <div class="col-6">
                                {{-- Total --}}
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <p>Total</p>
                                    </div>
                                    <div>
                                        <p class="grand_total">0.00</p>
                                    </div>
                                </div>
                                {{-- Divider --}}
                                <div>
                                    <hr class="m-0 mx-n7">
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12 mb-5 d-none">
                            <div class="col-md-12 mb-2">
                                <label for="note" class="form-label fw-medium">Terbilang</label>
                                <input type="text" class="form-control w-full terbilang" id="grand_total_spelled" name="grand_total_spelled" placeholder="Terbilang" disabled />
                            </div>
                            <div class="col-md-8 d-flex align-items-center">
                                <label for="note" class="form-label fw-medium me-2">Jatuh Tempo Tanggal :</label>
                                <input type="text" class="form-control w-px-250 date" placeholder="Jatuh Tanggal Tempo" id="invoice_due_date" name="invoice_due_date" />
                            </div>
                        </div> -->
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
                                                <p class="">Total:</p>
                                            </td>
                                            <td colspan="2">
                                                <p id="grand_total"></p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="5">Terbilang</td>
                                        </tr>
                                        <tr>
                                            <td colspan="5" id="grand_total_spelled"></td>
                                        </tr>
                                        <tr>
                                            <td colspan="5">
                                                <span>Jatuh Tempo Tanggal : </span> <span id="invoice_due_date"></span>
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
                                    <div class="form-label" id="term_and_conditions">
                                    </div>

                                </div>
                                <div class="mb-3">
                                    <label for="note" class="form-label me-2">Transfer Bank :</label>
                                    <select name="bank" id="bank" name="bank" class="form-select w-px-250 item-details mb-3" hidden>
                                    </select>
                                    <br>
                                    <div class="form-label">
                                        <span class="fw-bold">PPPGSI</span><br>
                                        <span class="fw-bold" id="bank-name"></span><br>
                                    </div>


                                </div>
                            </div>
                            <div class="col-md-6 mb-md-0 mb-3 d-flex flex-column align-items-center text-center">
                                <div class="mb-3">
                                    <label for="note" class="form-label">Tanda Tangan & Meterai
                                        (Opsional)</label>
                                    <p class="form-label" id="materai_date">25 September 2023</p>
                                </div>
                                <div class="mb-3">
                                    <div id="materai-image"></div>
                                </div>
                                <div class="mb-3">
                                    <p class="form-label" id="materai_name">Dina - Manager Operasional</p>
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
                        <!-- <button class="btn btn-primary d-grid w-100 mb-2" data-bs-toggle="offcanvas" data-bs-target="#sendInvoiceOffcanvas">
                            <span class="d-flex align-items-center justify-content-center text-nowrap"><i class="ti ti-send ti-xs me-2"></i>Kirim Invoice</span>
                        </button> -->
                        <!-- <a type="button" class="btn btn-label-secondary d-grid w-100 mb-2" style="background-color: #4EC0D9; color : #fff;">Disetujui</a>
                        <a href="#" id="preview" class="btn btn-label-secondary d-grid w-100 mb-2">Download</a>
                        <a href="#" id="preview" class="btn btn-label-secondary d-grid w-100 mb-2">Print</a> -->
                        <button  type="button" id="back" class="btn btn-label-secondary d-grid w-100 mb-2">Kembali</button>
                        <!-- <button type="submit" id="save" class="btn btn-label-secondary d-grid w-100 mb-2">Simpan</button> -->
                        <!-- <button class="btn btn-primary d-grid w-100 mb-2">
                            <span class="d-flex align-items-center justify-content-center text-nowrap">Add Payment</span>
                        </button> -->
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
    var urlSegments = window.location.pathname.split('/');
    var idIndex = urlSegments.indexOf('preview-invoice-edit') + 1;
    var id = urlSegments[idIndex];
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    var sweet_loader = `<div class="spinner-border mb-8 text-primary" style="width: 5rem; height: 5rem;" role="status">
                                    <span class="sr-only">Loading...</span>
                                </div>`;

    function format(e) {
        console.log(e);
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


    let data = JSON.parse(localStorage.getItem("edit-invoice"));
    console.log(data);
    $(document).ready(function() {
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
        $("#materai_date").text(data.materai_date);
        $("#materai_name").text(data.materai_name);

        if (data.tenant_id) {
            getTenant();
        }
        if (data.bank_id) {
            getBank();
        }
        getDetails();

        if (data.materai_image) {
            $("#materai-image").css('background-img', 'black');
            $("#materai-image").css("background-image", `url('` + data.materai_image.dataURL + `')`);
            $("#materai-image").css("height", `200px`);
            $("#materai-image").css("width", `200px`);
            $("#materai-image").css("background-position", `center`);
        }


    });


    function getTenant() {
        let idTenant = data.tenant_id;
        $.ajax({
            url: "{{url('api/tenant')}}/" + idTenant,
            type: "GET",
            success: function(response) {
                let data = response.data;
                console.log(data);
                $("#company").text(data.company);
                $("#floor").text(data.floor);
                $("#name_tenant").text(data.name);
            },
            error: function(xhr, status, error) {
                console.log(error);
            }
        });
    }

    function getBank() {
        let idBank = data.bank_id;
        $.ajax({
            url: "{{url('api/bank')}}/" + idBank,
            type: "GET",
            success: function(response) {
                let data = response.data;
                console.log(data);
                $("#bank-name").text(data.name)
            },
            error: function(xhr, status, error) {
                console.log(error);
            }
        });
    }

    function getDetails() {
        let details = data.details;
        let getDetail = '';
        let tem = '';
        for (let i = 0; i < details.length; i++) {
            tem = `<tr>
                        <td class="text-nowrap">` + details[i].item + `</td>
                        <td class="text-nowrap">` + details[i].description + `</td>
                        <td>` + format(details[i].price) + `</td>
                        <td>` + format(details[i].tax_id) + `</td>
                        <td>` + format(details[i].total_price) + `</td>
                    </tr>
            `;
            getDetail = getDetail + tem;
        }

        $('#details').prepend(getDetail);
    }


    $(document).on('click', '#back', function(event) {
        event.preventDefault();
        window.location.href = "/invoice/edit/"+id
    });

    $(document).on('click', '#save', function(event) {
        event.preventDefault();
        const newData = {
            ...data,
            materai_image: data.materai_image.dataURL
        }
        $.ajax({
            url: baseUrl + "api/invoice/" + id,
            type: "PATCH",
            data: JSON.stringify(newData),
            contentType: "application/json; charset=utf-8",
            dataType: "json",

            success: function(response) {
                $('.indicator-progress').show();
                $('.indicator-label').hide();

                Swal.fire({
                    title: 'Berhasil',
                    text: 'Berhasil Update Invoice',
                    icon: 'success',
                    customClass: {
                        confirmButton: 'btn btn-primary'
                    },
                    buttonsStyling: false
                });

                localStorage.removeItem('edit-invoice');
                window.location.href = "/invoice/list-invoice"

            },
            error: function(xhr, status, error) {
                Swal.fire({
                    title: 'Error!',
                    text: 'Semua field harus diisi',
                    icon: 'error',
                    customClass: {
                        confirmButton: 'btn btn-primary'
                    },
                    buttonsStyling: false
                })
            }
        });
        // window.location.href = "/invoice/list-invoice"
    });
</script>
@endsection