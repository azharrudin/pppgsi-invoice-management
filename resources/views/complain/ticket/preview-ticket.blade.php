@php
    $configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Complain')

@section('content')

    <div class="container-xxl flex-grow-1 container-p-y">

        <div class="row ticket-add">
            <!-- Ticket Add-->
            <div class="col-lg-9 col-12 mb-lg-0 mb-3">
                <div class="card ticket-preview-card">
                    <div class="card-body">
                        <h2 class="mx-auto"><b>Form Aduan dan Complain</b></h2>
                        {{-- Divider --}}
                        <hr class="my-3 mx-n4">

                        <div class="row px-3 d-flex align-items-center mb-3">
                            <div class="d-flex align-items-center justify-content-between col-3">
                                <label for="salesperson" class="form-label fw-bold fs-5">Nama Pelapor</label>
                                <span>:</span>
                            </div>
                            <div class="col-8 fw-bold fs-5">
                                <div>Ariel</div>
                            </div>
                        </div>
                        <div class="row px-3 d-flex align-items-center mb-3">
                            <div class="d-flex align-items-center justify-content-between col-3">
                                <label for="salesperson" class="form-label fw-bold fs-5">Nomor Telepon</label>
                                <span>:</span>
                            </div>
                            <div class="col-8 fw-bold fs-5">
                                <div>08123124213123</div>
                            </div>
                        </div>
                        <div class="row px-3 d-flex align-items-center mb-3">
                            <div class="d-flex align-items-center justify-content-between col-3">
                                <label for="salesperson" class="form-label fw-bold fs-5">Nama Perusahaan</label>
                                <span>:</span>
                            </div>
                            <div class="col-8 fw-bold fs-5">
                                <div>PT. ABC Jaya</div>
                            </div>
                        </div>
                        <div class="row px-3 d-flex align-items-center mb-3">
                            <div class="d-flex align-items-center justify-content-between col-3">
                                <label for="salesperson" class="form-label fw-bold fs-5">Judul Laporan</label>
                                <span>:</span>
                            </div>
                            <div class="col-8 fw-bold fs-5">
                                <div>AC Tidak Dingin</div>
                            </div>
                        </div>
                        <div class="row px-3 d-flex align-items-center mb-3">
                            <div class="d-flex align-items-center justify-content-between col-3">
                                <label for="salesperson" class="form-label fw-bold fs-5">Isi laporan</label>
                                <span>:</span>
                            </div>
                            <div class="col-8 fw-bold fs-5">
                                <div>Mohon bantuannya untuk pengecekan AC diruangan Meeting kami
                                    tepat sebelah lift karena aC tersebut dirasa tidak dingin padahal
                                    suhu AC sudah di maksimalkan.</div>
                            </div>
                        </div>
                        <div class="row px-3 mb-3">
                            <div class="d-flex align-items-center justify-content-between col-3">
                                <label for="salesperson" class="form-label fw-bold fs-5">Lampiran</label>
                                <span>:</span>
                            </div>
                            <div></div>
                        </div>
                        <div class="d-flex flex-wrap px-3 fw-bold fs-5 mb-3">
                            <img class="mx-2 my-2 object-fit-cover" style="width: 250px; height: 250px;" src="https://media.wired.com/photos/5fb70f2ce7b75db783b7012c/master/pass/Gear-Photos-597589287.jpg" alt="">
                            <img class="mx-2 my-2 object-fit-cover" style="width: 250px; height: 250px;" src="https://media.wired.com/photos/5fb70f2ce7b75db783b7012c/master/pass/Gear-Photos-597589287.jpg" alt="">
                            <img class="mx-2 my-2 object-fit-cover" style="width: 250px; height: 250px;" src="https://media.wired.com/photos/5fb70f2ce7b75db783b7012c/master/pass/Gear-Photos-597589287.jpg" alt="">
                            <img class="mx-2 my-2 object-fit-cover" style="width: 250px; height: 250px;" src="https://media.wired.com/photos/5fb70f2ce7b75db783b7012c/master/pass/Gear-Photos-597589287.jpg" alt="">
                        </div>
                        <div class="px-3">
                            <button type="button" class="btn btn-primary waves-effect waves-light">Download Semua Lampiran</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Ticket Add-->

            <!-- Ticket Actions -->
            <div class="col-lg-3 col-12 ticket-actions">
                <div class="card mb-4">
                    <div class="card-body">
                        <button class="btn btn-primary d-grid w-100 mb-2" data-bs-toggle="offcanvas"
                            data-bs-target="#sendTicketOffcanvas">
                            <span class="d-flex align-items-center justify-content-center text-nowrap"><i
                                    class="ti ti-send ti-xs me-2"></i>Kirim Tanda Terima</span>
                        </button>
                        <a href="https://demos.pixinvent.com/vuexy-html-laravel-admin-template/demo-1/app/invoice/preview"
                            class="btn btn-label-secondary d-grid w-100 mb-2">Preview</a>
                        <button type="button" class="btn btn-label-secondary d-grid w-100 mb-2">Simpan</button>
                        <button type="button" class="btn btn-label-secondary d-grid w-100">Batal</button>
                    </div>
                </div>
            </div>
            <!-- /Ticket Actions -->
        </div>

        <!-- Offcanvas -->
        <!-- Send Ticket Sidebar -->
        <div class="offcanvas offcanvas-end" id="sendTicketOffcanvas" aria-hidden="true">
            <div class="offcanvas-header my-1">
                <h5 class="offcanvas-title">Send Ticket</h5>
                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body pt-0 flex-grow-1">
                <form>
                    <div class="mb-3">
                        <label for="ticket-from" class="form-label">From</label>
                        <input type="text" class="form-control" id="ticket-from" value="shelbyComapny@email.com"
                            placeholder="company@email.com" />
                    </div>
                    <div class="mb-3">
                        <label for="ticket-to" class="form-label">To</label>
                        <input type="text" class="form-control" id="ticket-to" value="qConsolidated@email.com"
                            placeholder="company@email.com" />
                    </div>
                    <div class="mb-3">
                        <label for="ticket-subject" class="form-label">Subject</label>
                        <input type="text" class="form-control" id="ticket-subject"
                            value="ticket of purchased Admin Templates" placeholder="ticket regarding goods" />
                    </div>
                    <div class="mb-3">
                        <label for="ticket-message" class="form-label">Message</label>
                        <textarea class="form-control" name="ticket-message" id="ticket-message" cols="3" rows="8">Dear Queen Consolidated,
          Thank you for your business, always a pleasure to work with you!
          We have generated a new ticket in the amount of $95.59
          We would appreciate payment of this ticket by 05/11/2021</textarea>
                    </div>
                    <div class="mb-4">
                        <span class="badge bg-label-primary">
                            <i class="ti ti-link ti-xs"></i>
                            <span class="align-middle">Ticket Attached</span>
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

@endsection
