@php
$configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Tagihan Vendor')

@section('page-style')
{{-- Page Css files --}}
<link rel="stylesheet" href="https://demos.pixinvent.com/vuexy-html-laravel-admin-template/demo/assets/vendor/libs/dropzone/dropzone.css">
@endsection

@section('content')
<!-- Content -->
<div class="container-xxl flex-grow-1 container-p-y">

    <div class="row invoice-add">
        <!-- Invoice Add-->
        <div class="col-lg-9 col-12 mb-lg-0 mb-3">
            <div class="card invoice-preview-card">
                <div class="card-body">
                    <div style="background-image: url('{{asset('assets/img/header.png')}}'); height : 150px; background-size: contain; background-repeat: no-repeat;" class="set-back">
                    </div>

                    <h2 class="mx-auto text-center"><b>PURCHASE ORDER</b></h2>
                    <div class="row  m-0 p-3">
                        <div class="col-md-6 mb-md-0 ps-0">
                            <dl class="row mb-2 d-flex">
                                <dt class="col-sm-4">
                                    <span class="fw-normal">Nomor PO</span>
                                </dt>
                                <dt class="col-sm-8 ">
                                    <span class="fw-normal" id="purchase_order_number"></span>
                                </dt>
                            </dl>
                            <dl class="row mb-2 d-flex">
                                <dt class="col-sm-4">
                                    <span class="fw-normal">Tanggal</span>
                                </dt>
                                <dt class="col-sm-8 ">
                                    <span class="fw-normal" id="purchase_order_date"></span>
                                </dt>
                            </dl>
                            <dl class="row mb-2 d-flex mb-4">
                                <dt class="col-sm-4">
                                    <span class="fw-normal">Perihal</span>
                                </dt>
                                <dt class="col-sm-8 ">
                                    <span class="fw-normal" id="about"></span>
                                </dt>
                            </dl>
                            <div class="mb-3">
                                <div class="form-label">
                                    <span id="name_tenant"></span><br>
                                    <span id="address"></span><br><br>
                                    <span id="floor"></span><br>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5">

                        </div>
                    </div>
                    <div class="row px-3 mb-3">
                        <span class="form-label" id="note"></span>
                    </div>

                    <div class="row px-3 mb-3 ">
                        <div class="table-responsive border-top">
                            <table class="table m-0">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama barang</th>
                                        <th>Spesifikasi</th>
                                        <th>Quantity</th>
                                        <th>Satuan</th>
                                        <th>Harga Satuan</th>
                                        <th>Pajak</th>
                                        <th>Total (Rp)</th>
                                    </tr>
                                </thead>
                                <tbody class="table-border-bottom-0" id="details">
                                    <tr>
                                        <td colspan="4"></td>
                                        <td colspan="2">
                                            <p class="">Sub Total</p>
                                        </td>
                                        <td colspan="2" style="text-align: right;">
                                            <p id="subtotal" class=""></p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="4"></td>
                                        <td colspan="1">
                                            <p class="">Pajak</p>
                                        </td>
                                        <td colspan="1">
                                            <p class="" id=""></p>
                                        </td>
                                        <td colspan="2" style="text-align: right;">
                                            <p id="tax" class=""></p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="4"></td>
                                        <td colspan="2">
                                            <p class="">Jumlah Nett</p>
                                        </td>
                                        <td colspan="2" style="text-align: right;">
                                            <p id="grand_total" class=""></p>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="row px-3">
                        <div class="col-12">
                            <label for="note" class="form-label fw-medium">Terbilang</label>
                            <br>
                            <span class="form-label" id="grand_total_spelled"></span>
                            <hr>
                        </div>
                    </div>
                    <div class="row px-3 mb-3">
                        <div class="col-12">
                            <label for="note" class="form-label fw-medium">Syarat & Ketentuan</label>
                            <br>
                            <span class="form-label" id="term_and_conditions"></span>
                        </div>
                    </div>

                    <div class="row py-3 px-3">
                        <div class="col-md-4 mb-md-0 mb-3 d-flex flex-column align-items-center text-center">
                            <div class="mb-3">
                                <label for="note" class="form-label fw-medium">Tanda Tangan</label>
                                <div class="form-label">
                                    25 September 2023
                                </div>
                            </div>
                            <div class="mb-3">
                                <img id="signatture" src="" alt="">
                            </div>
                            <div class="mb-3">
                                <span class="form-label" id="signature_name">
                                </span>
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
                    <button class="btn btn-primary d-grid w-100 mb-2" data-bs-toggle="offcanvas" data-bs-target="#sendInvoiceOffcanvas">
                        <span class="d-flex align-items-center justify-content-center text-nowrap"><i class="ti ti-send ti-xs me-2"></i>Kirim</span>
                    </button>
                    <a href="https://demos.pixinvent.com/vuexy-html-laravel-admin-template/demo-1/app/invoice/preview" class="btn btn-label-secondary d-grid w-100 mb-2">Preview</a>
                    <button type="button" class="btn btn-label-secondary d-grid w-100 mb-2">Simpan</button>
                    <button type="button" class="btn btn-label-secondary d-grid w-100">Kembali</button>
                </div>
            </div>

            <div class="card mb-4">
                <div class="card-body">
                    <p class="text-center">Kelengkapan Document</p>
                    <button type="button" class="btn  d-grid w-100 mb-2 add-doc" style="color : #fff;background-color : #4EC0D9;"><span class="d-flex align-items-center justify-content-center text-nowrap">+</span></button>
                    <div class="documents">
                        <div class="document">
                            <div class="mb-3">
                                <label for="note" class="form-label fw-medium">Pilih Document</label>
                                <select name="document[]" id="document" class="form-control">
                                    <option value="">Pilih Document</option>
                                    <option value="Faktur Pembelian">Faktur Pembelian</option>
                                    <option value="Kuintasi/Invoice">Kuintasi/Invoice</option>
                                    <option value="Purchase Order">Purchase Order(PO)</option>
                                    <option value="Delivery Order">Delivery Order(DO)</option>
                                    <option value="Berita Acara Pembayaran">Berita Acara Pembayaran(BAP)</option>
                                    <option value="Berita Acara Kemajuan Pekerjaan">Berita Acara Kemajuan Pekerjaan(BAPK)</option>
                                    <option value="Berita Acara Serah Terima">Berita Acara Serah Terima</option>
                                    <option value="Progress Kerja">Progress Kerja</option>
                                    <option value="Surat Perintah Kerja (SPK) / Kontrak Kerja">Surat Perintah Kerja (SPK) / Kontrak Kerja</option>
                                    <option value="Faktur Pajak">Faktur Pajak</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <input type="file" class="form-control" placeholder="Pilih Berkas" id="attachment" name="attachment">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Invoice Actions -->
    </div>

</div>
<!-- / Content -->

@endsection

@section('page-script')
<script src="{{asset('assets/vendor/libs/dropzone/dropzone.js')}}"></script>
<script src="{{asset('assets/js/forms-file-upload.js')}}"></script>
<script src="{{asset('assets/vendor/libs/sweetalert2/sweetalert2.js')}}"></script>
<script src="{{asset('assets/vendor/libs/jquery-repeater/jquery-repeater.js')}}"></script>
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
        var idIndex = urlSegments.indexOf('edit-tagihan-vendor') + 1;
        id = urlSegments[idIndex];
        getDataTagihanVendor(id);
    });

    function getVendor(id) {
        $.ajax({
            url: "{{url('api/vendor')}}/" + id,
            type: "GET",
            success: function(response) {
                let data = response.data;
                console.log(data);
                $("#floor").text(data.floor);
                $("#address").text(data.address);
                $("#name_tenant").text(data.name);
            },
            error: function(xhr, status, error) {
                console.log(error);
            }
        });
    }

    function tglIndo(date) {
        // Parsing tanggal
        var tanggalObj = new Date(date);

        // Daftar nama bulan dalam bahasa Indonesia
        var namaBulan = [
            "Januari", "Februari", "Maret", "April", "Mei", "Juni",
            "Juli", "Agustus", "September", "Oktober", "November", "Desember"
        ];

        // Mendapatkan tahun, bulan, dan hari
        var tahun = tanggalObj.getFullYear();
        var bulan = namaBulan[tanggalObj.getMonth()];
        var hari = tanggalObj.getDate();

        // Format tanggal dalam "d MMMM yyyy" (contoh: 7 Januari 2024)
        var tanggalFormatted = hari + ' ' + bulan + ' ' + tahun;
        return tanggalFormatted;
    }

    function getDataTagihanVendor(id) {
        $.ajax({
            url: "{{url('api/purchase-order')}}/" + id,
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
                console.log(data);
                id = data.id;
                nomorInvoice = data.invoice_number;
                $("#purchase_order_number").text(data.purchase_order_number);
                $("#purchase_order_date").text(tglIndo(data.purchase_order_date));
                $("#about").text(data.about);
                $("#note").text(data.note);
                $("#grand_total").text(data.grand_total);
                $("#tax").text(data.tax);
                $("#subtotal").text(data.subtotal);
                $("#grand_total_spelled").text(data.grand_total_spelled);
                $("#term_and_conditions").text(data.term_and_conditions);
                $("#signature_name").text(data.signature_name);
                getVendor(data.vendor_id);
                getDetails(data.purchase_order_details);
                if (data.signature) {
                    $("#signatture").css('background-img', 'black');
                    $("#signatture").css("background-image", `url('` + data.signature + `')`);
                    $("#signatture").css("height", `200px`);
                    $("#signatture").css("width", `200px`);
                    $("#signatture").css("background-position", `center`);
                    $("#signatture").css("background-size", `cover`);
                    $("#signatture").css("background-repeat", `no-repeat`);
                }
                Swal.close();
            },
            error: function(errors) {
                console.log(errors);
            }
        });
    }


    $(document).on('click', '.add-doc', function() {
        let documents = $('.documents');
        let newRow = `
        <div class="documents">
                        <div class="document">
                            <div class="mb-3">
                                <label for="note" class="form-label fw-medium">Pilih Document</label>
                                <select name="document[]" id="document" class="form-control">
                                    <option value="">Pilih Document</option>
                                    <option value="Faktur Pembelian">Faktur Pembelian</option>
                                    <option value="Kuintasi/Invoice">Kuintasi/Invoice</option>
                                    <option value="Purchase Order">Purchase Order(PO)</option>
                                    <option value="Delivery Order">Delivery Order(DO)</option>
                                    <option value="Berita Acara Pembayaran">Berita Acara Pembayaran(BAP)</option>
                                    <option value="Berita Acara Kemajuan Pekerjaan">Berita Acara Kemajuan Pekerjaan(BAPK)</option>
                                    <option value="Berita Acara Serah Terima">Berita Acara Serah Terima</option>
                                    <option value="Progress Kerja">Progress Kerja</option>
                                    <option value="Surat Perintah Kerja (SPK) / Kontrak Kerja">Surat Perintah Kerja (SPK) / Kontrak Kerja</option>
                                    <option value="Faktur Pajak">Faktur Pajak</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <input type="file" class="form-control" placeholder="Pilih Berkas" id="attachment" name="attachment">
                            </div>
                        </div>
                    </div>
        `;
        documents.append(newRow);
    });

    function getDetails(detailItems) {
        let details = detailItems;
        let getDetail = '';
        let tem = '';
        for (let i = 0; i < details.length; i++) {
            tem = `<tr>
                        <td>` + details[i].number + `</td>
                        <td>` + details[i].name + `</td>
                        <td>` + details[i].specification + `</td>
                        <td>` + details[i].quantity + `</td>
                        <td>` + details[i].units + `</td>
                        <td>` + details[i].price + `</td>
                        <td>` + details[i].tax + `</td>
                        <td>` + details[i].total_price + `</td>
                    </tr>
            `;
            getDetail = getDetail + tem;
        }

        $('#details').prepend(getDetail);
    }
</script>
@endsection