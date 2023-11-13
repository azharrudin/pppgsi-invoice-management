@php
    $configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Complain')

@section('content')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-style1">
            <li class="breadcrumb-item">
                <a href="#">Ticket</a>
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
                    <div class="col-sm-6 col-lg-6">
                        <div class="d-flex justify-content-center align-items-start card-widget-1 border-end pb-3 pb-sm-0">
                            <div class="text-center">
                                <h3 class="mb-1">300</h3>
                                <p class="mb-0">Tenant</p>
                            </div>
                        </div>
                        <hr class="d-none d-sm-block d-lg-none me-4">
                    </div>
                    <div class="col-sm-6 col-lg-6">
                        <div class="d-flex justify-content-center align-items-start card-widget-2 pb-3 pb-sm-0">
                            <div class="text-center">
                                <h3 class="mb-1">50</h3>
                                <p class="mb-0">Invoice</p>
                            </div>
                        </div>
                        <hr class="d-none d-sm-block d-lg-none">
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Datatables --}}
    <div class="card">
        <div class="card-datatable table-responsive pt-0">
            <table class="datatables-basic table">
                <thead>
                    <tr>
                        <th>No. Ticket</th>
                        <th>Nama Pelapor</th>
                        <th>Perusahaan</th>
                        <th>Judul Laporan</th>
                        <th>Status</th>
                        <th>Tanggapan</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>

@endsection
