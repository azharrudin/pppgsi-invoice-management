@php
$configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Laporan Kerusakan')

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
                        <div class="col-md-7 mb-md-0 mb-4 ps-0">
                            <h1 class="fw-700" style="margin: 0;"><b>PPPGSI</b></h1>
                            <h4><b>Building Management</b></h4>
                        </div>
                        <div class="col-md-5">
                            <span class="fs-2"><b>Work Order</b></span>
                            <span class="d-block text-center mx-auto">Nomor WO :</span>
                        </div>
                    </div>
                    <hr class="my-3 mx-n4">

                    <div class="row py-3 px-3">
                        <div class="col-md-3">
                            <div class="mb-1">
                                <label for="note" class="form-label fw-medium">No Lap Kerusakan </label>
                                <input type="text" class="form-control" placeholder="No Lap Kerusakan" />
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-1">
                                <label for="note" class="form-label fw-medium">Date </label>
                                <input type="text" class="form-control" placeholder="Date" />
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-1">
                                <label for="note" class="form-label fw-medium">Action Plan </label>
                                <input type="text" class="form-control" placeholder="Action Plan" />
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-1">
                                <label for="note" class="form-label fw-medium">Finish Plan </label>
                                <input type="text" class="form-control" placeholder="Finish Plan" />
                            </div>
                        </div>
                    </div>

                    <div class="row py-3 px-3">
                        <div class="col-12">
                            <label for="note" class="form-label fw-medium">Scope </label>
                            <div class="">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" name="accountActivation" id="accountActivation">
                                    <label class="form-check-label" for="accountActivation">Telekomunikasi</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" name="accountActivation" id="accountActivation">
                                    <label class="form-check-label" for="accountActivation">Electric</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" name="accountActivation" id="accountActivation">
                                    <label class="form-check-label" for="accountActivation">Plumbing</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" name="accountActivation" id="accountActivation">
                                    <label class="form-check-label" for="accountActivation">Civil</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" name="accountActivation" id="accountActivation">
                                    <label class="form-check-label" for="accountActivation">BAS</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" name="accountActivation" id="accountActivation">
                                    <label class="form-check-label" for="accountActivation">MDP</label>
                                </div>
                            </div>
                            <div class="">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" name="accountActivation" id="accountActivation">
                                    <label class="form-check-label" for="accountActivation">Telekomunikasi</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" name="accountActivation" id="accountActivation">
                                    <label class="form-check-label" for="accountActivation">HVAC</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" name="accountActivation" id="accountActivation">
                                    <label class="form-check-label" for="accountActivation">Lift</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" name="accountActivation" id="accountActivation">
                                    <label class="form-check-label" for="accountActivation">Fire System</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" name="accountActivation" id="accountActivation">
                                    <label class="form-check-label" for="accountActivation">GENSET</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" name="accountActivation" id="accountActivation">
                                    <label class="form-check-label" for="accountActivation">MDP</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row py-3 px-3">
                        <div class="col-12">
                            <label for="note" class="form-label fw-medium">Classification</label>
                            <div class="">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" name="accountActivation" id="accountActivation">
                                    <label class="form-check-label" for="accountActivation">Prev. Maint Routine</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" name="accountActivation" id="accountActivation">
                                    <label class="form-check-label" for="accountActivation">Prev Maint Non Routine</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" name="accountActivation" id="accountActivation">
                                    <label class="form-check-label" for="accountActivation">Repair</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" name="accountActivation" id="accountActivation">
                                    <label class="form-check-label" for="accountActivation">Replacement</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" name="accountActivation" id="accountActivation">
                                    <label class="form-check-label" for="accountActivation">Vendor</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row py-3 px-3">
                        <div class="col-12">
                            <div class="mb-3">
                                <label for="note" class="form-label fw-medium">Job deskription:</label>
                                <textarea class="form-control" rows="5" id="note" placeholder="Job deskription"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="py-3 px-3">
                        <div class="card academy-content shadow-none border p-3">
                            <div class="repeater">
                                <div class="" data-repeater-list="group-a">
                                    <div class="repeater-wrapper " data-repeater-item>
                                        <div class="row mb-3">
                                            <div class="col-3">
                                                <label for="note" class="form-label fw-medium">Location</label>
                                                <input type="text" class="form-control  " placeholder="Date" />
                                            </div>
                                            <div class="col-3">
                                                <label for="note" class="form-label fw-medium">Material Request</label>
                                                <input type="text" class="form-control  " placeholder="Material Request" />
                                            </div>
                                            <div class="col-3">
                                                <label for="note" class="form-label fw-medium">Type /Made In</label>
                                                <input type="text" class="form-control  " placeholder="Type /Made In" />
                                            </div>
                                            <div class="col-3">
                                                <label for="note" class="form-label fw-medium">Quantity</label>
                                                <input type="text" class="form-control  " placeholder="Quantity" />
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

                            <div class="row py-3">
                                <div class="col-12">
                                    <label for="note" class="form-label fw-medium">Classification</label>
                                    <div class="">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" name="accountActivation" id="accountActivation">
                                            <label class="form-check-label" for="accountActivation">Klasifikasi :</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" name="accountActivation" id="accountActivation">
                                            <label class="form-check-label" for="accountActivation">Calceled</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" name="accountActivation" id="accountActivation">
                                            <label class="form-check-label" for="accountActivation">Explanation</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" name="accountActivation" id="accountActivation">
                                            <label class="form-check-label" for="accountActivation">Others</label>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <label for="note" class="form-label fw-medium">Technician</label>
                            <div class="row  text-center">
                                <div class="col-3">
                                    <div class="mb-3">
                                        <input type="text" class="form-control" placeholder="Technician" style="text-align:center;" />
                                    </div>
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
                                    <div class="mb-3">
                                        <input type="text" class="form-control" placeholder="Technician" style="text-align:center;" />
                                    </div>
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
                                    <div class="mb-3">
                                        <input type="text" class="form-control" placeholder="Technician" style="text-align:center;" />
                                    </div>
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
                                    <div class="mb-3">
                                        <input type="text" class="form-control" placeholder="Technician" style="text-align:center;" />
                                    </div>
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