@php
    $configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Invoice')

@section('content')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-style1">
            <li class="breadcrumb-item">
                <a href="#">Invoice</a>
            </li>
            <li class="breadcrumb-item active">
                <a href="#">List</a>
            </li>
        </ol>
    </nav>

    <div class="bg-white rounded-3">
        <div class="card-datatable table-responsive pt-0">
            <table class="datatables-basic table">
                <thead>
                    <tr>
                        <th>No. Invoice</th>
                        <th>Tenant</th>
                        <th>Total</th>
                        <th>Tgl Invoice</th>
                        <th>Tgl Jatuh Tempo</th>
                        <th>Status</th>
                        <th>Tanggapan</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>

@endsection
