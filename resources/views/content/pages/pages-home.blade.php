@php
$configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Home')


@section('page-style')
<link rel="stylesheet" href="https://demos.pixinvent.com/vuexy-html-laravel-admin-template/demo/assets/vendor/libs/apex-charts/apex-charts.css" />
<link rel="stylesheet" href="https://demos.pixinvent.com/vuexy-html-laravel-admin-template/demo/assets/vendor/libs/swiper/swiper.css" />
<link rel="stylesheet" href="https://demos.pixinvent.com/vuexy-html-laravel-admin-template/demo/assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css" />
<link rel="stylesheet" href="https://demos.pixinvent.com/vuexy-html-laravel-admin-template/demo/assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css" />
<link rel="stylesheet" href="https://demos.pixinvent.com/vuexy-html-laravel-admin-template/demo/assets/vendor/libs/datatables-checkboxes-jquery/datatables.checkboxes.css" />
<link rel="stylesheet" href="https://demos.pixinvent.com/vuexy-html-laravel-admin-template/demo/assets/vendor/css/pages/cards-advance.css">
<link rel="stylesheet" href="https://demos.pixinvent.com/vuexy-html-laravel-admin-template/demo/assets/vendor/css/pages/app-logistics-dashboard.css" />
<link rel="stylesheet" href="{{asset('/assets/vendor/libs/custom/custom.css')}}">

@endsection

@section('content')

<div class="container-xxl flex-grow-1">
    <div class="d-flex justify-content-between mb-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-style1">
                <li class="breadcrumb-item">
                    <a href="#">Dashboard</a>
                </li>
                <li class="breadcrumb-item active">
                    <a href="#">Home</a>
                </li>
            </ol>
        </nav>

        <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#filter-form">Filter</button>
    </div>

    <div class="row mb-4">
        <!-- View sales -->
        <div class="col-md-6  col-12">
            <div class="card h-100" style="background: rgb(97,73,206); background: linear-gradient(3deg, rgba(97,73,206,1) 0%, rgba(156,98,244,1) 100%); color:white;">
                <div class="d-flex align-items-end row">
                    <div class="col-7">
                        <div class="card-body text-nowrap">
                            <h5 class="card-title mb-1 text-white">Hai Yoger,</h5>
                            <p class="mb-2">Total Tagihan kamu yang sudah <br>
                                masuk saat ini</p>
                            <h1 class="text-white mb-1 ">Rp. 10.000.000</h1>
                            <img src="{{asset('assets\img\illustrations\illustration-1.png')}}" height="220" alt="view sales" style="position:absolute; bottom:0; right:0;">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card h-100">
                <div class="card-header d-flex align-items-center justify-content-center">
                    <div class="card-title mb-0">
                        <h5 class="text-center">Total Tagihan invoice</h5>
                    </div>
                </div>
                <div class="card-body d-flex align-items-center justify-content-center" style="position: relative;">
                    <div id="total-tagihan-invoice" style="min-height: 180px;">
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card h-100">
                <div class="card-header d-flex align-items-center justify-content-center">
                    <div class="card-title mb-0">
                        <h5 class="m-0 me-2 text-center">Invoice Terbayarkan</h5>
                    </div>
                </div>
                <div class="card-body d-flex align-items-center justify-content-center" style="position: relative;">
                    <div id="invoice-terbayarkan" style="min-height: 180px;">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row mb-4">
        <div class="col-md-3">
            <div class="d-flex flex-column h-100">
                <div class="card h-100 mb-4">
                    <div class="card-header d-flex align-items-center justify-content-center">
                        <div class="card-title mb-0">
                            <h5 class="text-center">Invoice Pending</h5>
                        </div>
                    </div>
                    <div class="card-body d-flex align-items-center justify-content-center" style="position: relative;">
                        <div id="invoice-pending" style="min-height: 180px;">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="d-flex flex-column  h-100">
                <div class="card h-100 mb-4">
                    <div class="card-header d-flex align-items-center justify-content-center">
                        <div class="card-title mb-0">
                            <h5 class="text-center">Invoice Dibayarkan</h5>
                        </div>
                    </div>
                    <div class="card-body d-flex align-items-center justify-content-center" style="position: relative;">
                        <div id="invoice-dibayarkan" style="min-height: 180px;">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="d-flex flex-column  h-100">
                <div class="card h-100 mb-4">
                    <div class="card-header d-flex align-items-center justify-content-center">
                        <div class="card-title mb-0">
                            <h5 class="text-center">Invoice belum dibayarkan</h5>
                        </div>
                    </div>
                    <div class="card-body d-flex align-items-center justify-content-center" style="position: relative;">
                        <div id="invoice-belum-dibayarkan" style="min-height: 180px;">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="d-flex flex-column  h-100">
                <div class="card h-100 mb-4">
                    <div class="card-header d-flex align-items-center justify-content-center">
                        <div class="card-title mb-0">
                            <h5 class="text-center">Invoice Telat</h5>
                        </div>
                    </div>
                    <div class="card-body d-flex align-items-center justify-content-center" style="position: relative;">
                        <div id="invoice-telat" style="min-height: 180px;">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row mb-4">
        <div class="col-md-3">
            <div class="d-flex flex-column">
                <div class="card h-100 mb-4">
                    <div class="card-header d-flex align-items-center justify-content-center">
                        <div class="card-title mb-0">
                            <h5 class="text-center">Invoice Cancel</h5>
                        </div>
                    </div>
                    <div class="card-body d-flex align-items-center justify-content-center" style="position: relative;">
                        <div id="invoice-cancel" style="min-height: 180px;">
                        </div>
                    </div>
                </div>

                <div class="card h-100">
                    <div class="card-header d-flex align-items-center justify-content-center">
                        <div class="card-title mb-0">
                            <h5 class="text-center">Total Tenant</h5>
                        </div>
                    </div>
                    <div class="card-body d-flex align-items-center justify-content-center" style="position: relative;">
                        <div id="total-tenant" style="min-height: 180px;">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="card">
                <!-- <div class="card-datatable table-responsive pt-0">
                    <table class="invoice-list-table table">
                        <thead>
                            <tr>
                                <th>No. Invoice</th>
                                <th>Pelanggan</th>
                                <th>Total</th>
                                <th>Tgl Invoice</th>
                                <th>Status</th>
                                <th>Tanggapan</th>
                            </tr>
                        </thead>
                    </table>
                </div> -->
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-3">
            <div class="d-flex flex-column">
                <div class="card h-100 mb-4">
                    <div class="card-header d-flex align-items-center justify-content-center">
                        <div class="card-title mb-0">
                            <h5 class="text-center">Tagihan Vendor</h5>
                        </div>
                    </div>
                    <div class="card-body d-flex align-items-center justify-content-center" style="position: relative;">
                        <div id="tagihan-vendor" style="min-height: 180px;">
                        </div>
                    </div>
                </div>

                <div class="card h-100">
                    <div class="card-header d-flex align-items-center justify-content-center">
                        <div class="card-title mb-0">
                            <h5 class="text-center">Tagihan Yang Vendor Harus dibayarkan</h5>
                        </div>
                    </div>
                    <div class="card-body d-flex align-items-center justify-content-center" style="position: relative;">
                        <div id="tagihan-yang-vendor-harus-dibayarkan" style="min-height: 180px;">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="card">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <div class="card-title mb-0">
                        <h5 class="m-0 me-2">Shipment statistics</h5>
                        <small class="text-muted">Total number of deliveries 23.8k</small>
                    </div>
                    <div class="dropdown">
                        <button type="button" class="btn btn-label-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">January</button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="javascript:void(0);">January</a></li>
                            <li><a class="dropdown-item" href="javascript:void(0);">February</a></li>
                            <li><a class="dropdown-item" href="javascript:void(0);">March</a></li>
                            <li><a class="dropdown-item" href="javascript:void(0);">April</a></li>
                            <li><a class="dropdown-item" href="javascript:void(0);">May</a></li>
                            <li><a class="dropdown-item" href="javascript:void(0);">June</a></li>
                            <li><a class="dropdown-item" href="javascript:void(0);">July</a></li>
                            <li><a class="dropdown-item" href="javascript:void(0);">August</a></li>
                            <li><a class="dropdown-item" href="javascript:void(0);">September</a></li>
                            <li><a class="dropdown-item" href="javascript:void(0);">October</a></li>
                            <li><a class="dropdown-item" href="javascript:void(0);">November</a></li>
                            <li><a class="dropdown-item" href="javascript:void(0);">December</a></li>
                        </ul>
                    </div>
                </div>
                <div class="card-body">
                    <div id="shipmentStatisticsChart"></div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="filter-form" data-bs-backdrop="static">
    <div class="modal-dialog">
        <form class="modal-content filter-submit" id=" filter-submit" novalidate>
            <div class="modal-header">
                <h5 class="modal-title" id="backDropModalTitle">Filter Option</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="mb-3">
                        <label for="nameBackdrop" class="form-label">Tanggal Awal</label>
                        <input type="date" id="tanggal-awal" name="tanggal-awal" class="form-control">
                        <div class="invalid-feedback">Tidak boleh kosong</div>
                    </div>
                    <div class="mb-3">
                        <label for="nameBackdrop" class="form-label">Tanggal Akhir</label>
                        <input type="date" id="tanggal-akhir" name="tanggal-akhir" class="form-control">
                        <div class="invalid-feedback">Tidak boleh kosong</div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal" id="modal_bank_cancel">Reset</button>
                <button type="submit" class="btn btn-primary save-bank">
                    Apply
                </button>

            </div>
        </form>
    </div>
</div>
@endsection

@section('page-script')
<script src="https://demos.pixinvent.com/vuexy-html-laravel-admin-template/demo/assets/vendor/libs/apex-charts/apexcharts.js"></script>
<script src="https://demos.pixinvent.com/vuexy-html-laravel-admin-template/demo/assets/vendor/libs/swiper/swiper.js"></script>
<script src="https://demos.pixinvent.com/vuexy-html-laravel-admin-template/demo/assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js"></script>
<!-- END: Page Vendor JS-->
<!-- BEGIN: Theme JS-->
<script>
    ! function() {
        let e, t, o, a, i;
        a = (isDarkStyle ? (e = config.colors_dark.cardColor, t = config.colors_dark.textMuted, i = config.colors_dark.bodyColor, o = config.colors_dark.headingColor, config.colors_dark) : (e = config.colors.cardColor, t = config.colors.textMuted, i = config.colors.bodyColor, o = config.colors.headingColor, config.colors)).borderColor;
        var s =
            r = document.querySelector("#total-tagihan-invoice"),
            n = {
                chart: {
                    height: 200,
                    width: 200,
                    parentHeightOffset: 0,
                    type: "donut"
                },
                labels: ["Electronic", "Sports", "Decor"],
                series: [45, 58, 30],
                colors: ['#2A44C6', '#6192FF', '#CAD5FF'],
                stroke: {
                    width: 0
                },
                dataLabels: {
                    enabled: !1,
                    formatter: function(e, t) {
                        return parseInt(e) + "%"
                    }
                },
                legend: {
                    show: !1
                },
                tooltip: {
                    theme: !1
                },
                grid: {
                    padding: {
                        top: 0,
                        right: -20,
                        left: -20
                    }
                },
                states: {
                    hover: {
                        filter: {
                            type: "none"
                        }
                    }
                },
                plotOptions: {
                    pie: {
                        donut: {
                            size: "70%",
                            labels: {
                                show: !0,
                                value: {
                                    fontSize: "1.375rem",
                                    fontFamily: "Public Sans",
                                    color: o,
                                    fontWeight: 500,
                                    offsetY: -15,
                                    formatter: function(e) {
                                        return parseInt(e) + "%"
                                    }
                                },
                                name: {
                                    offsetY: 20,
                                    fontFamily: "Public Sans"
                                },
                                total: {
                                    show: !0,
                                    showAlways: !0,
                                    color: "#2A44C6",
                                    fontSize: ".8125rem",
                                    label: "Total",
                                    fontFamily: "Public Sans",
                                    formatter: function(e) {
                                        return "184"
                                    }
                                }
                            }
                        }
                    }
                },
                responsive: [{
                    breakpoint: 1025,
                    options: {
                        chart: {
                            height: 172,
                            width: 160
                        }
                    }
                }, {
                    breakpoint: 769,
                    options: {
                        chart: {
                            height: 300
                        }
                    }
                }, {
                    breakpoint: 426,
                    options: {
                        chart: {
                            height: 147
                        }
                    }
                }]
            },

            s = (null !== r && new ApexCharts(r, n).render(), document.querySelector("#invoice-terbayarkan")),
            r = {
                chart: {
                    height: 200,
                    width: 200,
                    parentHeightOffset: 0,
                    type: "donut"
                },
                labels: ["Electronic", "Sports", "Decor"],
                series: [45, 58, 30],
                colors: ['#28C76F', '#68D89A', '#DCF6E8'],
                stroke: {
                    width: 0
                },
                dataLabels: {
                    enabled: !1,
                    formatter: function(e, t) {
                        return parseInt(e) + "%"
                    }
                },
                legend: {
                    show: !1
                },
                tooltip: {
                    theme: !1
                },
                grid: {
                    padding: {
                        top: 0,
                        right: -20,
                        left: -20
                    }
                },
                states: {
                    hover: {
                        filter: {
                            type: "none"
                        }
                    }
                },
                plotOptions: {
                    pie: {
                        donut: {
                            size: "70%",
                            labels: {
                                show: !0,
                                value: {
                                    fontSize: "1.375rem",
                                    fontFamily: "Public Sans",
                                    color: o,
                                    fontWeight: 500,
                                    offsetY: -15,
                                    formatter: function(e) {
                                        return parseInt(e) + "%"
                                    }
                                },
                                name: {
                                    offsetY: 20,
                                    fontFamily: "Public Sans"
                                },
                                total: {
                                    show: !0,
                                    showAlways: !0,
                                    color: "#28C76F",
                                    fontSize: ".8125rem",
                                    label: "Total",
                                    fontFamily: "Public Sans",
                                    formatter: function(e) {
                                        return "184"
                                    }
                                }
                            }
                        }
                    }
                },
                responsive: [{
                    breakpoint: 1025,
                    options: {
                        chart: {
                            height: 172,
                            width: 160
                        }
                    }
                }, {
                    breakpoint: 769,
                    options: {
                        chart: {
                            height: 300
                        }
                    }
                }, {
                    breakpoint: 426,
                    options: {
                        chart: {
                            height: 147
                        }
                    }
                }]
            },
            n = (null !== s && new ApexCharts(s, r).render(), document.querySelector("#invoice-pending")),
            s = {
                chart: {
                    height: 200,
                    width: 200,
                    parentHeightOffset: 0,
                    type: "donut"
                },
                labels: ["Electronic", "Sports", "Decor"],
                series: [45, 58, 30],
                colors: ['#F9ED32', '#F9EB8C', '#F9F0BB'],
                stroke: {
                    width: 0
                },
                dataLabels: {
                    enabled: !1,
                    formatter: function(e, t) {
                        return parseInt(e) + "%"
                    }
                },
                legend: {
                    show: !1
                },
                tooltip: {
                    theme: !1
                },
                grid: {
                    padding: {
                        top: 0,
                        right: -20,
                        left: -20
                    }
                },
                states: {
                    hover: {
                        filter: {
                            type: "none"
                        }
                    }
                },
                plotOptions: {
                    pie: {
                        donut: {
                            size: "70%",
                            labels: {
                                show: !0,
                                value: {
                                    fontSize: "1.375rem",
                                    fontFamily: "Public Sans",
                                    color: o,
                                    fontWeight: 500,
                                    offsetY: -15,
                                    formatter: function(e) {
                                        return parseInt(e) + "%"
                                    }
                                },
                                name: {
                                    offsetY: 20,
                                    fontFamily: "Public Sans"
                                },
                                total: {
                                    show: !0,
                                    showAlways: !0,
                                    color: "#F9ED32",
                                    fontSize: ".8125rem",
                                    label: "Total",
                                    fontFamily: "Public Sans",
                                    formatter: function(e) {
                                        return "184"
                                    }
                                }
                            }
                        }
                    }
                },
                responsive: [{
                    breakpoint: 1025,
                    options: {
                        chart: {
                            height: 172,
                            width: 160
                        }
                    }
                }, {
                    breakpoint: 769,
                    options: {
                        chart: {
                            height: 300
                        }
                    }
                }, {
                    breakpoint: 426,
                    options: {
                        chart: {
                            height: 147
                        }
                    }
                }]
            },

            r = (null !== n && new ApexCharts(n, s).render(), document.querySelector("#invoice-dibayarkan")),
            n = {
                chart: {
                    height: 200,
                    width: 200,
                    parentHeightOffset: 0,
                    type: "donut"
                },
                labels: ["Electronic", "Sports", "Decor"],
                series: [45, 58, 30],
                colors: ['#1FEAE0', '#96E0D7', '#C3DDDA'],
                stroke: {
                    width: 0
                },
                dataLabels: {
                    enabled: !1,
                    formatter: function(e, t) {
                        return parseInt(e) + "%"
                    }
                },
                legend: {
                    show: !1
                },
                tooltip: {
                    theme: !1
                },
                grid: {
                    padding: {
                        top: 0,
                        right: -20,
                        left: -20
                    }
                },
                states: {
                    hover: {
                        filter: {
                            type: "none"
                        }
                    }
                },
                plotOptions: {
                    pie: {
                        donut: {
                            size: "70%",
                            labels: {
                                show: !0,
                                value: {
                                    fontSize: "1.375rem",
                                    fontFamily: "Public Sans",
                                    color: o,
                                    fontWeight: 500,
                                    offsetY: -15,
                                    formatter: function(e) {
                                        return parseInt(e) + "%"
                                    }
                                },
                                name: {
                                    offsetY: 20,
                                    fontFamily: "Public Sans"
                                },
                                total: {
                                    show: !0,
                                    showAlways: !0,
                                    color: "#1FEAE0",
                                    fontSize: ".8125rem",
                                    label: "Total",
                                    fontFamily: "Public Sans",
                                    formatter: function(e) {
                                        return "184"
                                    }
                                }
                            }
                        }
                    }
                },
                responsive: [{
                    breakpoint: 1025,
                    options: {
                        chart: {
                            height: 172,
                            width: 160
                        }
                    }
                }, {
                    breakpoint: 769,
                    options: {
                        chart: {
                            height: 300
                        }
                    }
                }, {
                    breakpoint: 426,
                    options: {
                        chart: {
                            height: 147
                        }
                    }
                }]
            },

            s = (null !== r && new ApexCharts(r, n).render(), document.querySelector("#invoice-belum-dibayarkan")),
            r = {
                chart: {
                    height: 200,
                    width: 200,
                    parentHeightOffset: 0,
                    type: "donut"
                },
                labels: ["Electronic", "Sports", "Decor", "Food"],
                series: [45, 58, 30, 33],
                colors: ['#ED1C24', '#E54559', '#E0738B', '#F297B3'],
                stroke: {
                    width: 0
                },
                dataLabels: {
                    enabled: !1,
                    formatter: function(e, t) {
                        return parseInt(e) + "%"
                    }
                },
                legend: {
                    show: !1
                },
                tooltip: {
                    theme: !1
                },
                grid: {
                    padding: {
                        top: 0,
                        right: -20,
                        left: -20
                    }
                },
                states: {
                    hover: {
                        filter: {
                            type: "none"
                        }
                    }
                },
                plotOptions: {
                    pie: {
                        donut: {
                            size: "70%",
                            labels: {
                                show: !0,
                                value: {
                                    fontSize: "1.375rem",
                                    fontFamily: "Public Sans",
                                    color: o,
                                    fontWeight: 500,
                                    offsetY: -15,
                                    formatter: function(e) {
                                        return parseInt(e) + "%"
                                    }
                                },
                                name: {
                                    offsetY: 20,
                                    fontFamily: "Public Sans"
                                },
                                total: {
                                    show: !0,
                                    showAlways: !0,
                                    color: "#ED1C24",
                                    fontSize: ".8125rem",
                                    label: "Total",
                                    fontFamily: "Public Sans",
                                    formatter: function(e) {
                                        return "184"
                                    }
                                }
                            }
                        }
                    }
                },
                responsive: [{
                    breakpoint: 1025,
                    options: {
                        chart: {
                            height: 172,
                            width: 160
                        }
                    }
                }, {
                    breakpoint: 769,
                    options: {
                        chart: {
                            height: 300
                        }
                    }
                }, {
                    breakpoint: 426,
                    options: {
                        chart: {
                            height: 147
                        }
                    }
                }]
            },

            n = (null !== s && new ApexCharts(s, r).render(), document.querySelector("#total-tenant")),
            s = {
                chart: {
                    height: 200,
                    width: 200,
                    parentHeightOffset: 0,
                    type: "donut"
                },
                labels: ["Electronic", "Sports", "Decor", "Food"],
                series: [45, 58, 30, 33],
                colors: ['#AFCC36', '#CFE842', '#EBFC49', '#F6FC7A'],
                stroke: {
                    width: 0
                },
                dataLabels: {
                    enabled: !1,
                    formatter: function(e, t) {
                        return parseInt(e) + "%"
                    }
                },
                legend: {
                    show: !1
                },
                tooltip: {
                    theme: !1
                },
                grid: {
                    padding: {
                        top: 0,
                        right: -20,
                        left: -20
                    }
                },
                states: {
                    hover: {
                        filter: {
                            type: "none"
                        }
                    }
                },
                plotOptions: {
                    pie: {
                        donut: {
                            size: "70%",
                            labels: {
                                show: !0,
                                value: {
                                    fontSize: "1.375rem",
                                    fontFamily: "Public Sans",
                                    color: o,
                                    fontWeight: 500,
                                    offsetY: -15,
                                    formatter: function(e) {
                                        return parseInt(e) + "%"
                                    }
                                },
                                name: {
                                    offsetY: 20,
                                    fontFamily: "Public Sans"
                                },
                                total: {
                                    show: !0,
                                    showAlways: !0,
                                    color: "#AFCC36",
                                    fontSize: ".8125rem",
                                    label: "Total",
                                    fontFamily: "Public Sans",
                                    formatter: function(e) {
                                        return "184"
                                    }
                                }
                            }
                        }
                    }
                },
                responsive: [{
                    breakpoint: 1025,
                    options: {
                        chart: {
                            height: 172,
                            width: 160
                        }
                    }
                }, {
                    breakpoint: 769,
                    options: {
                        chart: {
                            height: 300
                        }
                    }
                }, {
                    breakpoint: 426,
                    options: {
                        chart: {
                            height: 147
                        }
                    }
                }]
            },

            r = (null !== n && new ApexCharts(n, s).render(), document.querySelector("#invoice-telat")),
            n = {
                chart: {
                    height: 200,
                    width: 200,
                    parentHeightOffset: 0,
                    type: "donut"
                },
                labels: ["Electronic", "Sports", "Decor", "Food"],
                series: [45, 58, 30],
                colors: ['#EF6100', '#EA8744', '#E5A070', '#E2BBA1'],
                stroke: {
                    width: 0
                },
                dataLabels: {
                    enabled: !1,
                    formatter: function(e, t) {
                        return parseInt(e) + "%"
                    }
                },
                legend: {
                    show: !1
                },
                tooltip: {
                    theme: !1
                },
                grid: {
                    padding: {
                        top: 0,
                        right: -20,
                        left: -20
                    }
                },
                states: {
                    hover: {
                        filter: {
                            type: "none"
                        }
                    }
                },
                plotOptions: {
                    pie: {
                        donut: {
                            size: "70%",
                            labels: {
                                show: !0,
                                value: {
                                    fontSize: "1.375rem",
                                    fontFamily: "Public Sans",
                                    color: o,
                                    fontWeight: 500,
                                    offsetY: -15,
                                    formatter: function(e) {
                                        return parseInt(e) + "%"
                                    }
                                },
                                name: {
                                    offsetY: 20,
                                    fontFamily: "Public Sans"
                                },
                                total: {
                                    show: !0,
                                    showAlways: !0,
                                    color: "#EF6100",
                                    fontSize: ".8125rem",
                                    label: "Total",
                                    fontFamily: "Public Sans",
                                    formatter: function(e) {
                                        return "184"
                                    }
                                }
                            }
                        }
                    }
                },
                responsive: [{
                    breakpoint: 1025,
                    options: {
                        chart: {
                            height: 172,
                            width: 160
                        }
                    }
                }, {
                    breakpoint: 769,
                    options: {
                        chart: {
                            height: 300
                        }
                    }
                }, {
                    breakpoint: 426,
                    options: {
                        chart: {
                            height: 147
                        }
                    }
                }]
            },

            s = (null !== r && new ApexCharts(r, n).render(), document.querySelector("#invoice-cancel")),
            r = {
                chart: {
                    height: 200,
                    width: 200,
                    parentHeightOffset: 0,
                    type: "donut"
                },
                labels: ["Electronic", "Sports", "Decor"],
                series: [45, 58, 30],
                colors: ['#AE3DEA', '#C68AED', '#D5B9EA'],
                stroke: {
                    width: 0
                },
                dataLabels: {
                    enabled: !1,
                    formatter: function(e, t) {
                        return parseInt(e) + "%"
                    }
                },
                legend: {
                    show: !1
                },
                tooltip: {
                    theme: !1
                },
                grid: {
                    padding: {
                        top: 0,
                        right: -20,
                        left: -20
                    }
                },
                states: {
                    hover: {
                        filter: {
                            type: "none"
                        }
                    }
                },
                plotOptions: {
                    pie: {
                        donut: {
                            size: "70%",
                            labels: {
                                show: !0,
                                value: {
                                    fontSize: "1.375rem",
                                    fontFamily: "Public Sans",
                                    color: o,
                                    fontWeight: 500,
                                    offsetY: -15,
                                    formatter: function(e) {
                                        return parseInt(e) + "%"
                                    }
                                },
                                name: {
                                    offsetY: 20,
                                    fontFamily: "Public Sans"
                                },
                                total: {
                                    show: !0,
                                    showAlways: !0,
                                    color: "#AE3DEA",
                                    fontSize: ".8125rem",
                                    label: "Total",
                                    fontFamily: "Public Sans",
                                    formatter: function(e) {
                                        return "184"
                                    }
                                }
                            }
                        }
                    }
                },
                responsive: [{
                    breakpoint: 1025,
                    options: {
                        chart: {
                            height: 172,
                            width: 160
                        }
                    }
                }, {
                    breakpoint: 769,
                    options: {
                        chart: {
                            height: 300
                        }
                    }
                }, {
                    breakpoint: 426,
                    options: {
                        chart: {
                            height: 147
                        }
                    }
                }]
            },

            n = (null !== s && new ApexCharts(s, r).render(), document.querySelector("#tagihan-vendor")),
            s = {
                chart: {
                    height: 200,
                    width: 200,
                    parentHeightOffset: 0,
                    type: "donut"
                },
                labels: ["Electronic", "Sports", "Decor", "Food"],
                series: [45, 58, 30, 33],
                colors: ['#995F5B', '#BA706E', '#D38484', '#EA9494'],
                stroke: {
                    width: 0
                },
                dataLabels: {
                    enabled: !1,
                    formatter: function(e, t) {
                        return parseInt(e) + "%"
                    }
                },
                legend: {
                    show: !1
                },
                tooltip: {
                    theme: !1
                },
                grid: {
                    padding: {
                        top: 0,
                        right: -20,
                        left: -20
                    }
                },
                states: {
                    hover: {
                        filter: {
                            type: "none"
                        }
                    }
                },
                plotOptions: {
                    pie: {
                        donut: {
                            size: "70%",
                            labels: {
                                show: !0,
                                value: {
                                    fontSize: "1.375rem",
                                    fontFamily: "Public Sans",
                                    color: o,
                                    fontWeight: 500,
                                    offsetY: -15,
                                    formatter: function(e) {
                                        return parseInt(e) + "%"
                                    }
                                },
                                name: {
                                    offsetY: 20,
                                    fontFamily: "Public Sans"
                                },
                                total: {
                                    show: !0,
                                    showAlways: !0,
                                    color: "#995F5B",
                                    fontSize: ".8125rem",
                                    label: "Total",
                                    fontFamily: "Public Sans",
                                    formatter: function(e) {
                                        return "184"
                                    }
                                }
                            }
                        }
                    }
                },
                responsive: [{
                    breakpoint: 1025,
                    options: {
                        chart: {
                            height: 172,
                            width: 160
                        }
                    }
                }, {
                    breakpoint: 769,
                    options: {
                        chart: {
                            height: 300
                        }
                    }
                }, {
                    breakpoint: 426,
                    options: {
                        chart: {
                            height: 147
                        }
                    }
                }]
            },

            r = (null !== n && new ApexCharts(n, s).render(), document.querySelector("#tagihan-yang-vendor-harus-dibayarkan")),
            n = {
                chart: {
                    height: 200,
                    width: 200,
                    parentHeightOffset: 0,
                    type: "donut"
                },
                labels: ["Electronic", "Sports", "Decor", "Food"],
                series: [45, 58, 30, 33],
                colors: ['#58585A', '#818182', '#B7B7B7', '#E8E8E8'],
                stroke: {
                    width: 0
                },
                dataLabels: {
                    enabled: !1,
                    formatter: function(e, t) {
                        return parseInt(e) + "%"
                    }
                },
                legend: {
                    show: !1
                },
                tooltip: {
                    theme: !1
                },
                grid: {
                    padding: {
                        top: 0,
                        right: -20,
                        left: -20
                    }
                },
                states: {
                    hover: {
                        filter: {
                            type: "none"
                        }
                    }
                },
                plotOptions: {
                    pie: {
                        donut: {
                            size: "70%",
                            labels: {
                                show: !0,
                                value: {
                                    fontSize: "1.375rem",
                                    fontFamily: "Public Sans",
                                    color: o,
                                    fontWeight: 500,
                                    offsetY: -15,
                                    formatter: function(e) {
                                        return parseInt(e) + "%"
                                    }
                                },
                                name: {
                                    offsetY: 20,
                                    fontFamily: "Public Sans"
                                },
                                total: {
                                    show: !0,
                                    showAlways: !0,
                                    color: "#58585A",
                                    fontSize: ".8125rem",
                                    label: "Total",
                                    fontFamily: "Public Sans",
                                    formatter: function(e) {
                                        return "184"
                                    }
                                }
                            }
                        }
                    }
                },
                responsive: [{
                    breakpoint: 1025,
                    options: {
                        chart: {
                            height: 172,
                            width: 160
                        }
                    }
                }, {
                    breakpoint: 769,
                    options: {
                        chart: {
                            height: 300
                        }
                    }
                }, {
                    breakpoint: 426,
                    options: {
                        chart: {
                            height: 147
                        }
                    }
                }]
            },
            s = (null !== r && new ApexCharts(r, n).render(), $(".datatable-invoice"));
        a = $(".invoice-list-table");
        if (a.length) e = a.DataTable({
            ajax: assetsPath + "json/invoice-list.json",
            columns: [{
                data: "no_lk"
            }, {
                data: "scope"
            }, {
                data: "classification"
            }, {
                data: "date"
            }, {
                data: "action_plan"
            }, {
                data: "status"
            }, {
                data: "tanggapan"
            }],
            columnDefs: [{

                targets: 0,
                render: function(a, e, t, s) {
                    return ""
                }
            }, {
                targets: 1,
                render: function(a, e, t, s) {
                    var n = t.no_lap_kerusakan;
                    return '<span class="d-none">' + n + "</span>$" + n
                }
            }, {
                targets: 2,
                render: function(a, e, t, s) {
                    var n = t.scope;
                    return '<a href="' + baseUrl + 'app/invoice/preview">#' + n + "</a>"
                }
            }, {
                targets: 3,
                render: function(a, e, t, s) {
                    var n = t.classification;
                    return '<span class="d-none">' + n + "</span>$" + n
                }
            }, {}, {
                targets: 4,
                render: function(a, e, t, s) {
                    var n = new Date(t.date);
                    return '<span class="d-none">' + moment(n).format("YYYYMMDD") + "</span>" + moment(n).format("DD MMM YYYY")
                }
            }, {
                targets: 5,
                render: function(a, e, t, s) {
                    var n = new Date(t.action_plan);
                    return '<span class="d-none">' + moment(n).format("YYYYMMDD") + "</span>" + moment(n).format("DD MMM YYYY")
                }
            }, {
                targets: 6,
                orderable: !1,
                render: function(a, e, t, s) {
                    var n = t.status;
                    if (0 === n) {
                        return '<span class="badge bg-label-success" text-capitalized> Paid </span>'
                    }
                    return '<span class="d-none">' + n + "</span>" + n
                }
            }, {
                targets: 7,
                visible: !1
            }, {
                targets: -1,
                title: "Tanggapan",
                searchable: !1,
                orderable: !1,
                render: function(a, e, t, s) {
                    return '<div class="d-flex align-items-center"><a href="javascript:;" data-bs-toggle="tooltip" class="text-body" data-bs-placement="top" title="Send Mail"><i class="ti ti-mail mx-2 ti-sm"></i></a><a href="' + baseUrl + 'app/invoice/preview" data-bs-toggle="tooltip" class="text-body" data-bs-placement="top" title="Preview Invoice"><i class="ti ti-eye mx-2 ti-sm"></i></a><div class="dropdown"><a href="javascript:;" class="btn dropdown-toggle hide-arrow text-body p-0" data-bs-toggle="dropdown"><i class="ti ti-dots-vertical ti-sm"></i></a><div class="dropdown-menu dropdown-menu-end"><a href="javascript:;" class="dropdown-item">Download</a><a href="' + baseUrl + 'app/invoice/edit" class="dropdown-item">Edit</a><a href="javascript:;" class="dropdown-item">Duplicate</a><div class="dropdown-divider"></div><a href="javascript:;" class="dropdown-item delete-record text-danger">Delete</a></div></div></div>'
                }
            }],
            order: [
                [1, "desc"]
            ],
            dom: '<"row mx-1"<"col-12 col-md-6 d-flex align-items-center justify-content-center justify-content-md-start gap-2"l<"dt-action-buttons text-xl-end text-lg-start text-md-end text-start mt-md-0 mt-3"B>><"col-12 col-md-6 d-flex align-items-center justify-content-end flex-column flex-md-row pe-3 gap-md-3"f<"invoice_status mb-3 mb-md-0">>>t<"row mx-2"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>',
            language: {
                sLengthMenu: "Show _MENU_",
                search: "",
                searchPlaceholder: "Search Invoice"
            },
            buttons: [{
                text: '<i class="ti ti-plus me-md-1"></i><span class="d-md-inline-block d-none">Buat Invoice</span>',
                className: "btn btn-primary",
                action: function(a, e, t, s) {
                    window.location = baseUrl + "complain/work-order/add"
                }
            }],
            responsive: {
                details: {
                    display: $.fn.dataTable.Responsive.display.modal({
                        header: function(a) {
                            return "Details of " + a.data().full_name
                        }
                    }),
                    type: "column",
                    renderer: function(a, e, t) {
                        var s = $.map(t, (function(a, e) {
                            return "" !== a.title ? '<tr data-dt-row="' + a.rowIndex + '" data-dt-column="' + a.columnIndex + '"><td>' + a.title + ":</td> <td>" + a.data + "</td></tr>" : ""
                        })).join("");
                        return !!s && $('<table class="table"/><tbody />').append(s)
                    }
                }
            },
            initComplete: function() {
                this.api().columns(7).every((function() {
                    var a = this,
                        e = $('<select id="UserRole" class="form-select"><option value=""> Select Status </option></select>').appendTo(".invoice_status").on("change", (function() {
                            var e = $.fn.dataTable.util.escapeRegex($(this).val());
                            a.search(e ? "^" + e + "$" : "", !0, !1).draw()
                        }));
                    a.data().unique().sort().each((function(a, t) {
                        e.append('<option value="' + a + '" class="text-capitalize">' + a + "</option>")
                    }))
                }))
            }
        });
        a.on("draw.dt", (function() {
            [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]')).map((function(a) {
                return new bootstrap.Tooltip(a, {
                    boundary: document.body
                })
            }))
        })), $(".invoice-list-table tbody").on("click", ".delete-record", (function() {
            e.row($(this).parents("tr")).remove().draw()
        })), setTimeout((() => {
            $(".dataTables_filter .form-control").removeClass("form-control-sm"), $(".dataTables_length .form-select").removeClass("form-select-sm")
        }), 300)
    }();


    $((function() {

    }));
</script>


@endsection