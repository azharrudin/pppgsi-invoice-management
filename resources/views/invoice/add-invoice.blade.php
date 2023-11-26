@php
    $configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Invoice')

@section('content')
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">

        <div class="row invoice-add">
            <!-- Invoice Add-->
            <div class="col-lg-9 col-12 mb-lg-0 mb-3">
                <div class="card invoice-preview-card">
                    <div class="card-body">
                        <div
                            style="background-image: url('{{ asset('assets/img/header.png') }}'); height : 150px; background-size: contain; background-repeat: no-repeat;">
                        </div>

                        <div class="row m-sm-2 m-0 px-3">
                            <div class="row col-md-7 mb-md-0 ps-0">
                                <div class="row px-3 d-flex align-items-start mb-3">
                                    <div class="d-flex align-items-center justify-content-between col-3">
                                        <label for="select2Primary">Kepada Yth,</label>
                                    </div>
                                    <div class="col-8 fw-bold fs-5">
                                        <select class="form-select w-px-250 item-details mb-3">
                                            <option selected disabled>Nomor</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <dd class="d-flex justify-content-md-end flex-wrap pe-0 ps-0 ps-sm-2">
                                    <div class="mb-3 mx-2">
                                        <label for="note" class="form-label fw-medium">No. Invoice</label>
                                        <input type="text" class="form-control w-px-150 " placeholder="" />
                                    </div>
                                    <div class="mb-3 mx-2">
                                        <label for="note" class="form-label fw-medium">Tgl. Invoice</label>
                                        <input type="text" class="form-control w-px-150 " placeholder="" />
                                    </div>
                                    <div class="mb-3 mx-2">
                                        <label for="note" class="form-label fw-medium">No. Kontrak</label>
                                        <input type="text" class="form-control w-px-150 " placeholder="" />
                                    </div>
                                    <div class="mb-3 mx-2">
                                        <label for="note" class="form-label fw-medium">Tanggal</label>
                                        <input type="text" class="form-control w-px-150 " placeholder="" />
                                    </div>
                                    <div class="mb-3 mx-2">
                                        <label for="note" class="form-label fw-medium">No. Addendum</label>
                                        <input type="text" class="form-control w-px-150 " placeholder="" />
                                    </div>
                                    <div class="mb-3 mx-2">
                                        <label for="note" class="form-label fw-medium">Tanggal</label>
                                        <input type="text" class="form-control w-px-150 " placeholder="" />
                                    </div>
                                </dd>
                            </div>
                        </div>

                        {{-- Repeater --}}
                        <div class="repeater">
                            <div class="" data-repeater-list="group-a">
                                <div class="repeater-wrapper " data-repeater-item>
                                    <div class="col-12 d-flex align-items-center justify-content-between">
                                        <div class="col-sm-2 mb-3 mx-2">
                                            <label for="note" class="form-label fw-medium">Uraian</label>
                                            <input type="text" class="form-control w-px-150 " placeholder="" />
                                        </div>
                                        <div class="col-sm-2 mb-3 mx-2">
                                            <label for="note" class="form-label fw-medium">Keterangan</label>
                                            <input type="text" class="form-control w-px-150 " placeholder="" />
                                        </div>
                                        <div class="col-sm-2 mb-3 mx-2">
                                            <label for="note" class="form-label fw-medium">Dasar Pengenaan Pajak</label>
                                            <input type="text" class="form-control w-px-150 " placeholder="" />
                                        </div>
                                        <div class="col-sm-1 mb-3 mx-2">
                                            <label for="note" class="form-label fw-medium">Pajak</label>
                                            <input type="text" class="form-control w-full " placeholder="" />
                                        </div>
                                        <div class="col-sm-2 mb-3 mx-2">
                                            <label for="note" class="form-label fw-medium">Total (Rp.)</label>
                                            <input type="text" class="form-control w-px-150 " placeholder="" />
                                        </div>
                                        <a class="mb-3 mx-2 mt-3" role="button" data-repeater-delete>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12"
                                                viewBox="0 0 12 12" fill="none">
                                                <circle cx="6" cy="6" r="6" fill="#D9D9D9" />
                                                <path
                                                    d="M6.70432 5.99276L8.85224 3.8544C8.9463 3.76053 8.99915 3.63323 8.99915 3.50049C8.99915 3.36775 8.9463 3.24045 8.85224 3.14659C8.75818 3.05273 8.63061 3 8.49759 3C8.36456 3 8.23699 3.05273 8.14293 3.14659L6 5.28994L3.85707 3.14659C3.76301 3.05273 3.63544 3 3.50241 3C3.36939 3 3.24182 3.05273 3.14776 3.14659C3.0537 3.24045 3.00085 3.36775 3.00085 3.50049C3.00085 3.63323 3.0537 3.76053 3.14776 3.8544L5.29568 5.99276L3.14776 8.13113C3.10094 8.17747 3.06378 8.23259 3.03842 8.29334C3.01306 8.35408 3 8.41923 3 8.48503C3 8.55083 3.01306 8.61598 3.03842 8.67672C3.06378 8.73746 3.10094 8.79259 3.14776 8.83893C3.19419 8.88565 3.24944 8.92273 3.31031 8.94804C3.37118 8.97335 3.43647 8.98637 3.50241 8.98637C3.56836 8.98637 3.63365 8.97335 3.69452 8.94804C3.75539 8.92273 3.81063 8.88565 3.85707 8.83893L6 6.69558L8.14293 8.83893C8.18937 8.88565 8.24461 8.92273 8.30548 8.94804C8.36635 8.97335 8.43164 8.98637 8.49759 8.98637C8.56353 8.98637 8.62882 8.97335 8.68969 8.94804C8.75056 8.92273 8.80581 8.88565 8.85224 8.83893C8.89906 8.79259 8.93622 8.73746 8.96158 8.67672C8.98694 8.61598 9 8.55083 9 8.48503C9 8.41923 8.98694 8.35408 8.96158 8.29334C8.93622 8.23259 8.89906 8.17747 8.85224 8.13113L6.70432 5.99276Z"
                                                    fill="#FF4747" />
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <div class="row pb-4">
                                <div class="col-sm-3 px-3">
                                    <button type="button" class="btn btn-primary waves-effect waves-light w-px-150"
                                        data-repeater-create>Tambah
                                        Baris</button>
                                </div>
                            </div>
                        </div>

                        {{-- Divider --}}
                        <div class="px-5">
                            <hr class="my-3 mx-n5">
                        </div>

                        {{-- Total --}}
                        <div class="col-md-12 d-flex float-end px-5 mb-5">
                            <div class="col-6"></div>
                            <div class="col-6">
                                {{-- Total --}}
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <p>Total</p>
                                    </div>
                                    <div>
                                        <p>0.00</p>
                                    </div>
                                </div>
                                {{-- Divider --}}
                                <div>
                                    <hr class="m-0 mx-n7">
                                </div>
                            </div>
                        </div>


                        <div class="col-md-12 mb-5">
                            <div class="col-md-12 mb-2">
                                <label for="note" class="form-label fw-medium">Terbilang</label>
                                <input type="text" class="form-control w-full" placeholder="Terbilang" />
                            </div>
                            <div class="col-md-8 d-flex align-items-center">
                                <label for="note" class="form-label fw-medium me-2">Jatuh Tempo Tanggal :</label>
                                <input type="date" class="form-control w-px-250 " placeholder="Date" />
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-6 mb-md-0 mb-3">
                                <label for="note" class="form-label fw-medium me-2">Syarat & Ketentuan</label>
                                <textarea class="form-control" rows="11" id="note" placeholder="Termin pembayaran, garansi dll"></textarea>
                            </div>

                            <div class="col-md-6 mb-md-0 mb-3 d-flex flex-column align-items-center text-center">
                                <div class="mb-3">
                                    <label for="note" class="form-label fw-medium">Tanda Tangan & Meterai
                                        (Opsional)</label>
                                    <input type="date" class="form-control w-px-250 " placeholder="Tanggal" />
                                </div>
                                <div class="mb-3">
                                    <form action="/upload" class="dropzone needsclick dz-clickable w-px-250"
                                        id="dropzone-basic">
                                        <div class="dz-message needsclick">
                                            <span class="note needsclick">Unggah Tanda Tangan</span>
                                        </div>
                                    </form>
                                </div>
                                <div class="mb-3">
                                    <input type="text" class="form-control w-px-250 " placeholder="Nama & Jabatan" />
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
                        <button class="btn btn-primary d-grid w-100 mb-2" data-bs-toggle="offcanvas"
                            data-bs-target="#sendInvoiceOffcanvas">
                            <span class="d-flex align-items-center justify-content-center text-nowrap"><i
                                    class="ti ti-send ti-xs me-2"></i>Kirim Invoice</span>
                        </button>
                        <a href="{{ route("pages-preview-invoice") }}"
                            class="btn btn-label-secondary d-grid w-100 mb-2">Preview</a>
                        <button type="button" class="btn btn-label-secondary d-grid w-100 mb-2">Simpan</button>
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
                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                    aria-label="Close"></button>
            </div>
            <div class="offcanvas-body pt-0 flex-grow-1">
                <form>
                    <div class="mb-3">
                        <label for="invoice-from" class="form-label">From</label>
                        <input type="text" class="form-control" id="invoice-from" value="shelbyComapny@email.com"
                            placeholder="company@email.com" />
                    </div>
                    <div class="mb-3">
                        <label for="invoice-to" class="form-label">To</label>
                        <input type="text" class="form-control" id="invoice-to" value="qConsolidated@email.com"
                            placeholder="company@email.com" />
                    </div>
                    <div class="mb-3">
                        <label for="invoice-subject" class="form-label">Subject</label>
                        <input type="text" class="form-control" id="invoice-subject"
                            value="Invoice of purchased Admin Templates" placeholder="Invoice regarding goods" />
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
                        <button type="button" class="btn btn-label-secondary"
                            data-bs-dismiss="offcanvas">Cancel</button>
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
    <script>
        $(document).ready(function() {
            $('.repeater').repeater({

            })
        });
    </script>
@endsection
