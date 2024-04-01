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
<link rel="stylesheet" href="{{asset('assets/vendor/libs/sweetalert2/sweetalert2.css')}}">
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
        <!-- Earning Reports -->
        <div class="col-lg-6 mb-4">
            <div class="card h-100">
                <div class="card-header pb-0 d-flex justify-content-between mb-lg-n4">
                    <div class="card-title mb-0">
                        <h5 class="mb-0">Laporan Pendapatan</h5>
                        <small class="text-muted">Ringkasan Bulanan</small>
                    </div>
                    <div class="dropdown">
                        <button class="btn p-0" type="button" id="earningReportsId" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="ti ti-dots-vertical ti-sm text-muted"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="earningReportsId">
                            <a class="dropdown-item" href="javascript:void(0);">View More</a>
                            <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                        </div>
                    </div>
                    <!-- </div> -->
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 col-md-4 d-flex flex-column align-self-end">
                            <div class="d-flex gap-2 align-items-center mb-2 pb-1 flex-wrap">
                                <span class="mb-0 fs-5" id="sum_invoice_per_month">0</span>
                                <div class="badge rounded bg-label-success">+4.2%</div>
                            </div>
                            <small>Pendapatan bulan ini</small>
                        </div>
                        <div class="col-12 col-md-8">
                            <div id="weeklyEarningReports"></div>
                        </div>
                    </div>
                    <div class="border rounded p-3 mt-4">
                        <div class="row gap-4 gap-sm-0">
                            <div class="col-12 col-sm-4">
                                <div class="d-flex gap-2 align-items-center">
                                    <div class="badge rounded bg-label-primary p-1"><i class="ti ti-currency-dollar ti-sm"></i></div>
                                    <h6 class="mb-0">Total Tagihan Invoice</h6>
                                </div>
                                <h4 class="my-2 pt-1" id="count_invoices">0</h4>
                                <div class="progress w-75" style="height:4px">
                                    <div class="progress-bar" role="progressbar" style="width: 65%" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-4">
                                <div class="d-flex gap-2 align-items-center">
                                    <div class="badge rounded bg-label-info p-1"><i class="ti ti-chart-pie-2 ti-sm"></i></div>
                                    <h6 class="mb-0">Total Invoice Dibayarkan</h6>
                                </div>
                                <h4 class="my-2 pt-1" id="count_invoices_not_paid">0</h4>
                                <div class="progress w-75" style="height:4px">
                                    <div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-4">
                                <div class="d-flex gap-2 align-items-center">
                                    <div class="badge rounded bg-label-danger p-1"><i class="ti ti-brand-paypal ti-sm"></i></div>
                                    <h6 class="mb-0">Total Invoice Belum Dibayarkan</h6>
                                </div>
                                <h4 class="my-2 pt-1" id="count_invoices_not_paid">0</h4>
                                <div class="progress w-75" style="height:4px">
                                    <div class="progress-bar bg-danger" role="progressbar" style="width: 65%" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/ Earning Reports -->

        <!-- Support Tracker -->
        <div class="col-md-6 mb-4">
            <div class="card h-100">
                <div class="card-header d-flex justify-content-between pb-0">
                    <div class="card-title mb-0">
                        <h5 class="mb-0">Ticket Complain</h5>
                        <small class="text-muted">30 Hari Terakhir</small>
                    </div>
                    <!-- <div class="dropdown">
                        <button class="btn p-0" type="button" id="supportTrackerMenu" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="ti ti-dots-vertical ti-sm text-muted"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="supportTrackerMenu">
                            <a class="dropdown-item" href="javascript:void(0);">View More</a>
                            <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                        </div>
                    </div> -->
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 col-sm-4 col-md-12 col-lg-4">
                            <div class="mt-lg-4 mt-lg-2 mb-lg-4 mb-2 pt-1">
                                <h1 class="mb-0" id="count_tickets">164</h1>
                                <p class="mb-0">Total Ticket</p>
                            </div>
                            <ul class="p-0 m-0">
                                <li class="d-flex gap-3 align-items-center mb-lg-3 pt-2 pb-1">
                                    <div class="badge rounded bg-label-primary p-1"><i class="ti ti-ticket ti-sm"></i></div>
                                    <div>
                                        <h6 class="mb-0 text-nowrap">Ticket Baru</h6>
                                        <small class="text-muted">0</small>
                                    </div>
                                </li>
                                <li class="d-flex gap-3 align-items-center mb-lg-3 pb-1">
                                    <div class="badge rounded bg-label-info p-1"><i class="ti ti-circle-check ti-sm"></i></div>
                                    <div>
                                        <h6 class="mb-0 text-nowrap">Ticket Selesai</h6>
                                        <small class="text-muted" id="count_completed_tickets">0</small>
                                    </div>
                                </li>
                                <li class="d-flex gap-3 align-items-center pb-1">
                                    <div class="badge rounded bg-label-warning p-1"><i class="ti ti-clock ti-sm"></i></div>
                                    <div>
                                        <h6 class="mb-0 text-nowrap">Ticket Menunggu</h6>
                                        <small class="text-muted" id="count_tickets_waiting_for_response">0</small>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="col-12 col-sm-8 col-md-12 col-lg-8">
                            <div id="supportTracker"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/ Support Tracker -->
        <!-- Statistics -->
        <div class="col-xl-12 mb-4 col-lg-12 col-12">
            <div class="card h-100">
                <div class="card-header">
                    <div class="d-flex justify-content-between mb-3">
                        <h5 class="card-title mb-0">Statistics</h5>
                    </div>
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div class="">
                            <div class="d-flex align-items-center">
                                <div class="badge rounded-pill bg-label-primary me-3 p-2"><i class="ti ti-chart-pie-2 ti-sm"></i></div>
                                <div class="card-info">
                                    <h5 class="mb-0" id="count_work_orders">0</h5>
                                    <small>Work Order</small>
                                </div>
                            </div>
                        </div>
                        <div class="">
                            <div class="d-flex align-items-center">
                                <div class="badge rounded-pill bg-label-info me-3 p-2"><i class="ti ti-users ti-sm"></i></div>
                                <div class="card-info">
                                    <h5 class="mb-0" id="count_material_requests">0</h5>
                                    <small>Mat Request</small>
                                </div>
                            </div>
                        </div>
                        <div class="">
                            <div class="d-flex align-items-center">
                                <div class="badge rounded-pill bg-label-danger me-3 p-2"><i class="ti ti-shopping-cart ti-sm"></i></div>
                                <div class="card-info">
                                    <h5 class="mb-0" id="count_purchase_requests">0</h5>
                                    <small>Purc Request</small>
                                </div>
                            </div>
                        </div>
                        <div class="">
                            <div class="d-flex align-items-center">
                                <div class="badge rounded-pill bg-label-success me-3 p-2"><i class="ti ti-currency-dollar ti-sm"></i></div>
                                <div class="card-info">
                                    <h5 class="mb-0" id="count_purchase_orders">0</h5>
                                    <small>Purchase Order</small>
                                </div>
                            </div>
                        </div>
                        <div class="">
                            <div class="d-flex align-items-center">
                                <div class="badge rounded-pill bg-label-secondary me-3 p-2"><i class="ti ti-credit-card ti-sm"></i></div>
                                <div class="card-info">
                                    <h5 class="mb-0" id="count_vendor_invoice">0</h5>
                                    <small>Tag Vendor</small>
                                </div>
                            </div>
                        </div>
                        <div class="">
                            <div class="d-flex align-items-center">
                                <div class="badge rounded-pill bg-label-warning me-3 p-2"><i class="ti ti-browser-check ti-sm"></i></div>
                                <div class="card-info">
                                    <h5 class="mb-0" id="remaining_stamp">0</h5>
                                    <small>Materai</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/ Statistics -->

        <!-- View sales -->

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
                            <input type="date" id="start_date" name="start_date" class="form-control" value="{{ date('Y-m-01')}}">
                            <div class="invalid-feedback">Tidak boleh kosong</div>
                        </div>
                        <div class="mb-3">
                            <label for="nameBackdrop" class="form-label">Tanggal Akhir</label>
                            <input type="date" id="end_date" name="end_date" class="form-control" value="{{ date('Y-m-t') }}">
                            <div class="invalid-feedback">Tidak boleh kosong</div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal" id="modal_bank_cancel">Reset</button>
                    <button type="submit" class="btn btn-primary apply">
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
    <script src="{{asset('assets/vendor/libs/sweetalert2/sweetalert2.js')}}"></script>
    <script src="https://demos.pixinvent.com/vuexy-html-admin-template/assets/js/dashboards-analytics.js"></script>
    <!-- END: Page Vendor JS-->
    <!-- BEGIN: Theme JS-->
    <script>
        var sweet_loader = `<div class="spinner-border mb-8 text-primary" style="width: 5rem; height: 5rem;" role="status">
                                    <span class="sr-only">Loading...</span>
                                </div>`;
        let start_date = $('#start_date').val();
        let end_date = $('#end_date').val();
        let params_date = `?start=${start_date}&end=${end_date}`;
        load(params_date);

        function load(params_date) {
            Swal.fire({
                title: '<h2>Loading...</h2>',
                html: sweet_loader + '<h5>Please Wait</h5>',
                showConfirmButton: false,
                allowOutsideClick: false,
                allowEscapeKey: false
            });
            $.ajax({
                url: "{{ env('BASE_URL_API')}}" + '/api/report/dashboard' + params_date,
                type: "get",
                contentType: "application/json; charset=utf-8",
                dataType: "json",
                success: function(response) {
                    console.log(response);
                    let income_report = response.income_report;
                    let remaining_stamp = response.remaining_stamp;
                    let statistic = response.statistic;
                    let ticket_complain = response.ticket_complain;
                    let sum_invoice_per_month = response.income_report.sum_invoice_per_month[0].total_amount;

                    $('#count_invoices').text(income_report.count_invoices);
                    $('#count_invoices_not_paid').text(income_report.count_invoices_not_paid);
                    $('#count_invoices_paid').text(income_report.count_invoices_paid);
                    $('#sum_invoice_per_month').text(format(sum_invoice_per_month));

                    $('#count_material_requests').text(statistic.count_material_requests);
                    $('#count_purchase_orders').text(statistic.count_purchase_orders);
                    $('#count_purchase_requests').text(statistic.count_purchase_requests);
                    $('#count_vendor_invoice').text(statistic.count_vendor_invoice);
                    $('#count_work_orders').text(statistic.count_work_orders);
                    $('#remaining_stamp').text(remaining_stamp);

                    $('#count_completed_tickets').text(ticket_complain.count_completed_tickets);
                    $('#count_tickets').text(ticket_complain.count_tickets);
                    $('#count_tickets_waiting_for_response').text(ticket_complain.count_tickets_waiting_for_response);

                    Swal.close();
                }
            });


        };

        $(document).on('click', '.apply', function(e) {
            e.preventDefault();
            let start = $('#start_date').val();
            let end = $('#end_date').val();
            let params = `?start=${start}&end=${end}`;
            if (start === '' || end === '') {
                // Tampilkan pesan validasi Bootstrap jika tanggal kosong
                if (start === '') {
                    $("#start_date").addClass("is-invalid");
                } else {
                    $("#start_date").removeClass("is-invalid");
                }
                
                if (end === '') {
                    $("#end_date").addClass("is-invalid");
                } else {
                    $("#end_date").removeClass("is-invalid");
                }
            } else {
                $("#start_date").removeClass("is-invalid");
                $("#end_date").removeClass("is-invalid");
                Swal.fire({
                    title: '<h2>Loading...</h2>',
                    html: sweet_loader + '<h5>Please Wait</h5>',
                    showConfirmButton: false,
                    allowOutsideClick: false,
                    allowEscapeKey: false
                });
                $.ajax({
                    url: "{{ env('BASE_URL_API')}}" + '/api/report/dashboard' + params,
                    type: "get",
                    contentType: "application/json; charset=utf-8",
                    dataType: "json",
                    success: function(response) {
                        console.log(response);
                        let income_report = response.income_report;
                        let remaining_stamp = response.remaining_stamp;
                        let statistic = response.statistic;
                        let ticket_complain = response.ticket_complain;
                        let sum_invoice_per_month = response.income_report.sum_invoice_per_month[0].total_amount;

                        $('#count_invoices').text(income_report.count_invoices);
                        $('#count_invoices_not_paid').text(income_report.count_invoices_not_paid);
                        $('#count_invoices_paid').text(income_report.count_invoices_paid);
                        $('#sum_invoice_per_month').text(format(sum_invoice_per_month));

                        $('#count_material_requests').text(statistic.count_material_requests);
                        $('#count_purchase_orders').text(statistic.count_purchase_orders);
                        $('#count_purchase_requests').text(statistic.count_purchase_requests);
                        $('#count_vendor_invoice').text(statistic.count_vendor_invoice);
                        $('#count_work_orders').text(statistic.count_work_orders);
                        $('#remaining_stamp').text(remaining_stamp);

                        $('#count_completed_tickets').text(ticket_complain.count_completed_tickets);
                        $('#count_tickets').text(ticket_complain.count_tickets);
                        $('#count_tickets_waiting_for_response').text(ticket_complain.count_tickets_waiting_for_response);

                        $("#filter-form").modal('hide');
                        Swal.close();
                    }
                });
            }

        });

        function format(data) {
            return Intl.NumberFormat("id-ID", {
                style: "currency",
                currency: "IDR"
            }).format(data)
        }

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