@php
$configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Material Request')

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
                    <div class="row m-sm-4 m-0">
                        <h1 class="text-center"><b>MATERIAL REQUEST</b></h1>
                    </div>

                    <div class="row py-3 px-3">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="note" class="form-label fw-medium">No Lap Kerusakan </label>
                                <input type="text" class="form-control w-px-250" placeholder="No Lap Kerusakan" />
                            </div>
                            <div class="mb-3">
                                <label for="note" class="form-label fw-medium">No Lap Kerusakan </label>
                                <input type="text" class="form-control w-px-250" placeholder="No Lap Kerusakan" />
                            </div>
                            <div class="mb-3">
                                <label for="note" class="form-label fw-medium">No Lap Kerusakan </label>
                                <input type="text" class="form-control w-px-250" placeholder="No Lap Kerusakan" />
                            </div>
                            <div class="mb-3">
                                <label for="note" class="form-label fw-medium">No Lap Kerusakan </label>
                                <input type="text" class="form-control w-px-250" placeholder="No Lap Kerusakan" />
                            </div>
                        </div>
                        <div class="col-md-6 d-flex flex-column align-items-end">
                            <div class="mb-3">
                                <label for="note" class="form-label fw-medium">No Lap Kerusakan </label>
                                <input type="text" class="form-control w-px-250" placeholder="No Lap Kerusakan" />
                            </div>
                            <div class="mb-3">
                                <label for="note" class="form-label fw-medium">No Lap Kerusakan </label>
                                <input type="text" class="form-control w-px-250" placeholder="No Lap Kerusakan" />
                            </div>
                            <div class="mb-3">
                                <textarea class="form-control w-px-300" rows="6" id="note" placeholder="Job deskription"></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="py-3 px-3">
                        <div class="card academy-content shadow-none border p-3">
                            <div class="repeater">
                                <div class="" data-repeater-list="group-a">
                                    <div class="repeater-wrapper " data-repeater-item>
                                        <div class="row mb-3">
                                            <div class="col-12 d-flex   flex-wrap">
                                                <div class="me-1">
                                                    <label for="note" class="form-label fw-medium">Nomor</label>
                                                    <input type="text" class="form-control  w-px-75" placeholder="Nomor" />
                                                </div>
                                                <div class="me-1">
                                                    <label for="note" class="form-label fw-medium">Part Number</label>
                                                    <input type="text" class="form-control  w-px-75" placeholder="No. Suku Cadang" />
                                                </div>
                                                <div class="me-1">
                                                    <label for="note" class="form-label fw-medium">Deskripsi</label>
                                                    <input type="text" class="form-control  w-px-75" placeholder="Deskripsi" />
                                                </div>
                                                <div class="me-1">
                                                    <label for="note" class="form-label fw-medium">Quantity</label>
                                                    <input type="text" class="form-control  w-px-75" placeholder="Kuantitas" />
                                                </div>
                                                <div class="">
                                                    <label for="note" class="form-label fw-medium">Filled Storekeeper Only</label>
                                                    <div class="d-flex justify-content-between">
                                                        <input type="text" class="form-control  w-px-75" placeholder="Stock" />
                                                        <input type="text" class="form-control  w-px-75" placeholder="Stock Out" />
                                                        <input type="text" class="form-control  w-px-75" placeholder="End Stock" />
                                                        <input type="text" class="form-control  w-px-75" placeholder="Min Stock" />

                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <div class="row pb-4">
                                    <div class="col-12">
                                        <button type="button" class="btn btn-primary waves-effect waves-light" data-repeater-create>Tambah Baris</button>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-3">
                                    <label for="note" class="form-label fw-medium mb-3">Prepered by :</label>
                                    <div class="mb-3">
                                        <input type="text" class="form-control " placeholder="Nama & Jabatan" style="text-align:center;" />
                                    </div>
                                    <div class="mb-3">
                                        <form action="/upload" class="dropzone needsclick dz-clickable" id="dropzone-basic">
                                            <div class="dz-message needsclick">
                                                <span class="note needsclick">Unggah Tanda Tangan</span>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="mb-3">
                                        <input type="text" class="form-control" placeholder="Tanggal" style="text-align:center;" />
                                    </div>
                                </div>
                                <div class="col-3">
                                    <label for="note" class="form-label fw-medium mb-3">Prepered by :</label>
                                    <div class="mb-3">
                                        <input type="text" class="form-control " placeholder="Nama & Jabatan" style="text-align:center;" />
                                    </div>
                                    <div class="mb-3">
                                        <form action="/upload" class="dropzone needsclick dz-clickable" id="dropzone-basic">
                                            <div class="dz-message needsclick">
                                                <span class="note needsclick">Unggah Tanda Tangan</span>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="mb-3">
                                        <input type="text" class="form-control" placeholder="Tanggal" style="text-align:center;" />
                                    </div>
                                </div>
                                <div class="col-3">
                                    <label for="note" class="form-label fw-medium mb-3">Prepered by :</label>
                                    <div class="mb-3">
                                        <input type="text" class="form-control " placeholder="Nama & Jabatan" style="text-align:center;" />
                                    </div>
                                    <div class="mb-3">
                                        <form action="/upload" class="dropzone needsclick dz-clickable" id="dropzone-basic">
                                            <div class="dz-message needsclick">
                                                <span class="note needsclick">Unggah Tanda Tangan</span>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="mb-3">
                                        <input type="text" class="form-control" placeholder="Tanggal" style="text-align:center;" />
                                    </div>
                                </div>
                                <div class="col-3">
                                    <label for="note" class="form-label fw-medium mb-3">Prepered by :</label>
                                    <div class="mb-3">
                                        <input type="text" class="form-control " placeholder="Nama & Jabatan" style="text-align:center;" />
                                    </div>
                                    <div class="mb-3">
                                        <form action="/upload" class="dropzone needsclick dz-clickable" id="dropzone-basic">
                                            <div class="dz-message needsclick">
                                                <span class="note needsclick">Unggah Tanda Tangan</span>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="mb-3">
                                        <input type="text" class="form-control" placeholder="Tanggal" style="text-align:center;" />
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-2">
                                    <span>Lembar</span>
                                </div>
                                <div class="col-4">
                                    <span>1. Accounting (Putih)</span>
                                    <br>
                                    <span>2. Guddang (Merah)</span>
                                </div>
                                <br>
                                <div class="col-4">
                                    <span>3. Purchasing (Hijau)</span>
                                    <br>
                                    <span>4. Pemohon (Biru)</span>
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
                        <span class="d-flex align-items-center justify-content-center text-nowrap">Simpan</span>
                    </button>
                    <a href="https://demos.pixinvent.com/vuexy-html-laravel-admin-template/demo-1/app/invoice/preview" class="btn btn-label-secondary d-grid w-100 mb-2">Preview</a>
                    <button type="button" class="btn btn-label-secondary d-grid w-100">Batal</button>
                </div>
            </div>
        </div>
        <!-- /Invoice Actions -->
    </div>

    <!-- Offcanvas -->
    <!-- Send Invoice Sidebar -->
    <div class="offcanvas offcanvas-end" id="sendInvoiceOffcanvas" aria-hidden="true">
        <div class="offcanvas-header my-1">
            <h5 class="offcanvas-title">Send Invoice</h5>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body pt-0 flex-grow-1">
            <form>
                <div class="mb-3">
                    <label for="invoice-from" class="form-label">From</label>
                    <input type="text" class="form-control" id="invoice-from" value="shelbyComapny@email.com" placeholder="company@email.com" />
                </div>
                <div class="mb-3">
                    <label for="invoice-to" class="form-label">To</label>
                    <input type="text" class="form-control" id="invoice-to" value="qConsolidated@email.com" placeholder="company@email.com" />
                </div>
                <div class="mb-3">
                    <label for="invoice-subject" class="form-label">Subject</label>
                    <input type="text" class="form-control" id="invoice-subject" value="Invoice of purchased Admin Templates" placeholder="Invoice regarding goods" />
                </div>
                <div class="mb-3">
                    <label for="invoice-message" class="form-label">Message</label>
                    <textarea class="form-control" name="invoice-message" id="invoice-message" cols="3" rows="8">Dear Queen Consolidated,
          Thank you for your business, always a pleasure to work with you!
          We have generated a new invoice in the amount of $95.59
          We would appreciate payment of this invoice by 05/11/2021</textarea>
                </div>
                <div class="mb-4">
                    <span class="badge bg-label-primary">
                        <i class="ti ti-link ti-xs"></i>
                        <span class="align-middle">Invoice Attached</span>
                    </span>
                </div>
                <div class="mb-3 d-flex flex-wrap">
                    <button type="button" class="btn btn-primary me-3" data-bs-dismiss="offcanvas">Send</button>
                    <button type="button" class="btn btn-label-secondary" data-bs-dismiss="offcanvas">Cancel</button>
                </div>
            </form>
        </div>
    </div>
    <!-- /Send Invoice Sidebar -->
    <!-- /Offcanvas -->

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
    var myDropzoneTheFirst = new Dropzone(
        //id of drop zone element 1
        '#a-form-element', {
            url: "uploadUrl/1"
        }
    );

    var myDropzoneTheSecond = new Dropzone(
        //id of drop zone element 2
        '#an-other-form-element', {
            url: "uploadUrl/2"
        }
    );
</script>
@endsection