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
                    <div style="background-image: url('{{asset('assets/img/header.png')}}'); height : 150px; background-size: contain; background-repeat: no-repeat;">
                    </div>

                    <h2 class="mx-auto text-center"><b>PURCHASE ORDER</b></h2>
                    <div class="row  m-0 p-3">
                        <div class="col-md-6 mb-md-0 ps-0">
                            <dl class="row mb-2 d-flex">
                                <dt class="col-sm-4">
                                    <span class="fw-normal">Nomor PO</span>
                                </dt>
                                <dt class="col-sm-8 ">
                                    <span class="fw-normal">014/bK-LIFT/BM-PO/II/2019</span>
                                </dt>
                            </dl>
                            <dl class="row mb-2 d-flex">
                                <dt class="col-sm-4">
                                    <span class="fw-normal">Tanggal</span>
                                </dt>
                                <dt class="col-sm-8 ">
                                    <span class="fw-normal">22 Februari 2019</span>
                                </dt>
                            </dl>
                            <dl class="row mb-2 d-flex mb-4">
                                <dt class="col-sm-4">
                                    <span class="fw-normal">Perihal</span>
                                </dt>
                                <dt class="col-sm-8 ">
                                    <span class="fw-normal">Pengadaan Pulley Car & Pulley CWT (unit Lift No. 8)</span>
                                </dt>
                            </dl>
                            <div class="mb-3">
                                <div class="form-label">
                                    PT. Focus Media Indonesia <br>
                                    The Capitil Building Lt.1 <br>
                                    Jl. Letjen S. Parman Kav. 73 Slipi <br>
                                    Jakarta Barat <br> <br>

                                    Up. Bp. Chrissandy Dave Winata
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5">

                        </div>
                    </div>
                    <div class="row px-3 mb-5">
                        <span class="form-label">Dengan hormat, Sehubungan dengan hasil negosiasi surat No. : 145239092 tanggal 06 februari 2019 perihal penawaran pengadaan sparepart lift, maka dengan ini kami mengajukan nama barang, sbb :</span>
                    </div>

                    <div class="row px-3 mb-3">
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
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Pulley Car</td>
                                        <td></td>
                                        <td></td>
                                        <td>1</td>
                                        <td>PCS</td>
                                        <td>ppn 10%h</td>
                                        <td>65.000.000</td>
                                    </tr>
                                    <tr>
                                        <td>1</td>
                                        <td>Pulley Car</td>
                                        <td></td>
                                        <td></td>
                                        <td>1</td>
                                        <td>PCS</td>
                                        <td>ppn 10%h</td>
                                        <td>65.000.000</td>
                                    </tr>
                                    <tr>
                                        <td colspan="4" class="align-top px-4 py-4">

                                        </td>
                                        <td class="text-end pe-3 py-4">
                                            <p class="mb-2 pt-3">Subtotal:</p>
                                            <p class="mb-2">Discount:</p>
                                            <p class="mb-2">Tax:</p>
                                            <p class="mb-0 pb-3">Total:</p>
                                        </td>
                                        <td class="ps-2 py-4">
                                            <p class="fw-medium mb-2 pt-3">$154.25</p>
                                            <p class="fw-medium mb-2">$00.00</p>
                                            <p class="fw-medium mb-2">$50.00</p>
                                            <p class="fw-medium mb-0 pb-3">$204.25</p>
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
                            <span class="form-label ">Seratus empat puluh tiga juta rupiah</span>
                            <hr>
                        </div>
                    </div>
                    <div class="row px-3 mb-3">
                        <div class="col-12">
                            <label for="note" class="form-label fw-medium">Syarat & Ketentuan</label>
                            <div class="row">
                                <div class="col-xl-6 col-md-12 col-sm-7 col-12">
                                    <div class="table-responsive">
                                        <table style="width:100% form-label fw-medium" class="table">
                                            <tbody>
                                                <tr>
                                                    <td>Delivery</td>
                                                    <td style="width:10%">:</td>
                                                    <td>$12,110.55</td>
                                                </tr>
                                                <tr>
                                                    <td>Cara Pembayaran</td>
                                                    <td style="width:10%">:</td>
                                                    <td>$12,110.55</td>
                                                </tr>
                                                <tr>
                                                    <td>Kelengkapan tagihan</td>
                                                    <td style="width:10%">:</td>
                                                    <td>$12,110.55</td>
                                                </tr>
                                                <tr>
                                                    <td>Alamat Pengiriman</td>
                                                    <td style="width:10%">:</td>
                                                    <td>$12,110.55</td>
                                                </tr>

                                            </tbody>
                                        </table>
                                    </div>

                                </div>
                            </div>
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
                                <img src="" alt="">
                            </div>
                            <div class="mb-3">
                                <div class="form-label">
                                    Dina - Manager Operasional
                                </div>
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
                    <button type="button" class="btn btn-label-secondary d-grid w-100">Batal</button>
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
                                <select name="" id="" class="form-control">
                                    <option value="">Pilih</option>
                                </select>
                                <div class="invalid-feedback">Tidak boleh kosong</div>
                            </div>
                            <div class="mb-3">
                                <input type="file" class="form-control" placeholder="Pilih Berkas">
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
<script src="{{asset('assets/vendor/libs/jquery-repeater/jquery-repeater.js')}}"></script>
<script>
    $(document).ready(function() {
        $('.repeater').repeater({

        })
    });
</script>
<script>
    $(document).on('click', '.add-doc', function() {
        let documents = $('.documents');
        let newRow = `
        <div class="document">
                            <div class="mb-3">
                                <label for="note" class="form-label fw-medium">Pilih Document</label>
                                <select name="" id="" class="form-control">
                                    <option value="">Pilih</option>
                                </select>
                                <div class="invalid-feedback">Tidak boleh kosong</div>
                            </div>
                            <div class="mb-3">
                                <input type="file" class="form-control" placeholder="Pilih Berkas">
                            </div>
                        </div>
        `;
        documents.append(newRow);
    });
</script>
@endsection