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
                                        <h6 class="mb-0 text-nowrap">Ticket On Proses</h6>
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
    <!-- END: Page Vendor JS-->
    <!-- BEGIN: Theme JS-->
    <script>
        var sweet_loader = `<div class="spinner-border mb-8 text-primary" style="width: 5rem; height: 5rem;" role="status">
                                    <span class="sr-only">Loading...</span>
                                </div>`;
        let start_date = $('#start_date').val();
        let end_date = $('#end_date').val();
        let params_date = `?start=${start_date}&end=${end_date}`;
        let completeTicket = 0;
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
                    $('#sum_invoice_per_month').text(formatRupiah(sum_invoice_per_month, 'Rp. '));

                    $('#count_material_requests').text(statistic.count_material_requests);
                    $('#count_purchase_orders').text(statistic.count_purchase_orders);
                    $('#count_purchase_requests').text(statistic.count_purchase_requests);
                    $('#count_vendor_invoice').text(statistic.count_vendor_invoice);
                    $('#count_work_orders').text(statistic.count_work_orders);
                    $('#remaining_stamp').text(remaining_stamp);

                    $('#count_completed_tickets').text(ticket_complain.count_completed_tickets);
                    $('#count_tickets').text(ticket_complain.count_tickets);
                    $('#count_tickets_waiting_for_response').text(ticket_complain.count_tickets_waiting_for_response);

                    console.log();
                    completeTicket = isNaN(parseInt(ticket_complain.count_completed_tickets) / parseInt(ticket_complain.count_tickets) * 100) ? 0 : parseInt(ticket_complain.count_completed_tickets) / parseInt(ticket_complain.count_tickets) * 100;
                    weeklyEarningReports();
                    supportTracker(completeTicket);

                    Swal.close();
                }
            });


        };

        function formatRupiah(angka, prefix) {
            var number_string = angka.replace(/[^,\d]/g, '').toString(),
                split = number_string.split(','),
                sisa = split[0].length % 3,
                rupiah = split[0].substr(0, sisa),
                ribuan = split[0].substr(sisa).match(/\d{3}/gi);

            // tambahkan titik jika yang di input sudah menjadi angka ribuan
            if (ribuan) {
                separator = sisa ? '.' : '';
                rupiah += separator + ribuan.join('.');
            }

            rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
            return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
        }

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
                        $('#sum_invoice_per_month').text(formatRupiah(sum_invoice_per_month, 'Rp. '));

                        $('#count_material_requests').text(statistic.count_material_requests);
                        $('#count_purchase_orders').text(statistic.count_purchase_orders);
                        $('#count_purchase_requests').text(statistic.count_purchase_requests);
                        $('#count_vendor_invoice').text(statistic.count_vendor_invoice);
                        $('#count_work_orders').text(statistic.count_work_orders);
                        $('#remaining_stamp').text(remaining_stamp);

                        $('#count_completed_tickets').text(ticket_complain.count_completed_tickets);
                        $('#count_tickets').text(ticket_complain.count_tickets);
                        $('#count_tickets_waiting_for_response').text(ticket_complain.count_tickets_waiting_for_response);

                        completeTicket = isNaN(parseInt(ticket_complain.count_completed_tickets) / parseInt(ticket_complain.count_tickets) * 100) ? 0 : parseInt(ticket_complain.count_completed_tickets) / parseInt(ticket_complain.count_tickets) * 100;
                        weeklyEarningReports();
                        console.log(completeTicket.toFixed(2));
                        supportTracker(completeTicket.toFixed(2));

                        $("#filter-form").modal('hide');
                        Swal.close();
                    }
                });
            }

        });

        function weeklyEarningReports() {
            let a = config.colors.textMuted;
            var options = {
                chart: {
                    height: 202,
                    parentHeightOffset: 0,
                    type: "bar",
                    toolbar: {
                        show: !1
                    }
                },
                plotOptions: {
                    bar: {
                        barHeight: "60%",
                        columnWidth: "38%",
                        startingShape: "rounded",
                        endingShape: "rounded",
                        borderRadius: 4,
                        distributed: !0
                    }
                },
                grid: {
                    show: !1,
                    padding: {
                        top: -30,
                        bottom: 0,
                        left: -10,
                        right: -10
                    }
                },
                colors: [config.colors_label.primary, config.colors_label.primary, config.colors_label.primary, config.colors_label.primary, config.colors.primary, config.colors_label.primary, config.colors_label.primary],
                dataLabels: {
                    enabled: !1
                },
                series: [{
                    data: [40, 65, 50, 45, 90, 55, 70]
                }],
                legend: {
                    show: !1
                },
                xaxis: {
                    categories: ["Mo", "Tu", "We", "Th", "Fr", "Sa", "Su"],
                    axisBorder: {
                        show: !1
                    },
                    axisTicks: {
                        show: !1
                    },
                    labels: {
                        style: {
                            colors: a,
                            fontSize: "13px",
                            fontFamily: "Public Sans"
                        }
                    }
                },
                yaxis: {
                    labels: {
                        show: !1
                    }
                },
                tooltip: {
                    enabled: !1
                },
                responsive: [{
                    breakpoint: 1025,
                    options: {
                        chart: {
                            height: 199
                        }
                    }
                }]
            }

            var chart = new ApexCharts(document.querySelector("#weeklyEarningReports"), options);
            chart.render();
        }

        function supportTracker(val) {
            $('#supportTracker').html('');
            let e = config.colors.cardColor;
            let a = config.colors.textMuted;
            let t = config.colors.headingColor;
            var options = {
                series: [val],
                labels: ["Completed Task"],
                chart: {
                    height: 360,
                    type: "radialBar"
                },
                plotOptions: {
                    radialBar: {
                        offsetY: 10,
                        startAngle: -140,
                        endAngle: 130,
                        hollow: {
                            size: "65%"
                        },
                        track: {
                            background: e,
                            strokeWidth: "100%"
                        },
                        dataLabels: {
                            name: {
                                offsetY: -20,
                                color: a,
                                fontSize: "13px",
                                fontWeight: "400",
                                fontFamily: "Public Sans"
                            },
                            value: {
                                offsetY: 10,
                                color: t,
                                fontSize: "38px",
                                fontWeight: "500",
                                fontFamily: "Public Sans"
                            }
                        }
                    }
                },
                colors: [config.colors.primary],
                fill: {
                    type: "gradient",
                    gradient: {
                        shade: "dark",
                        shadeIntensity: .5,
                        gradientToColors: [config.colors.primary],
                        inverseColors: !0,
                        opacityFrom: 1,
                        opacityTo: .6,
                        stops: [30, 70, 100]
                    }
                },
                stroke: {
                    dashArray: 10
                },
                grid: {
                    padding: {
                        top: -20,
                        bottom: 5
                    }
                },
                states: {
                    hover: {
                        filter: {
                            type: "none"
                        }
                    },
                    active: {
                        filter: {
                            type: "none"
                        }
                    }
                },
                responsive: [{
                    breakpoint: 1025,
                    options: {
                        chart: {
                            height: 330
                        }
                    }
                }, {
                    breakpoint: 769,
                    options: {
                        chart: {
                            height: 280
                        }
                    }
                }]
            }
            var chart = new ApexCharts(document.querySelector("#supportTracker"), options);
            chart.render();
        }


        // "use strict";
        // ! function() {
        //     let e, t, a, r, o;
        //     o = isDarkStyle ? (e = config.colors_dark.cardColor, a = config.colors_dark.textMuted, t = config.colors_dark.headingColor, r = "dark", "#5E6692") : (e = config.colors.cardColor, a = config.colors.textMuted, t = config.colors.headingColor, r = "", "#817D8D");
        //     var s = document.querySelector("#swiper-with-pagination-cards"),
        //         s = (s && new Swiper(s, {
        //             loop: !0,
        //             autoplay: {
        //                 delay: 2500,
        //                 disableOnInteraction: !1
        //             },
        //             pagination: {
        //                 clickable: !0,
        //                 el: ".swiper-pagination"
        //             }
        //         }), document.querySelector("#revenueGenerated")),
        //         i = {
        //             chart: {
        //                 height: 130,
        //                 type: "area",
        //                 parentHeightOffset: 0,
        //                 toolbar: {
        //                     show: !1
        //                 },
        //                 sparkline: {
        //                     enabled: !0
        //                 }
        //             },
        //             markers: {
        //                 colors: "transparent",
        //                 strokeColors: "transparent"
        //             },
        //             grid: {
        //                 show: !1
        //             },
        //             colors: [config.colors.success],
        //             fill: {
        //                 type: "gradient",
        //                 gradient: {
        //                     shade: r,
        //                     shadeIntensity: .8,
        //                     opacityFrom: .6,
        //                     opacityTo: .1
        //                 }
        //             },
        //             dataLabels: {
        //                 enabled: !1
        //             },
        //             stroke: {
        //                 width: 2,
        //                 curve: "smooth"
        //             },
        //             series: [{
        //                 data: [300, 350, 330, 380, 340, 400, 380]
        //             }],
        //             xaxis: {
        //                 show: !0,
        //                 lines: {
        //                     show: !1
        //                 },
        //                 labels: {
        //                     show: !1
        //                 },
        //                 stroke: {
        //                     width: 0
        //                 },
        //                 axisBorder: {
        //                     show: !1
        //                 }
        //             },
        //             yaxis: {
        //                 stroke: {
        //                     width: 0
        //                 },
        //                 show: !1
        //             },
        //             tooltip: {
        //                 enabled: !1
        //             }
        //         },
        //         s = (null !== s && new ApexCharts(s, i).render(), document.querySelector("#weeklyEarningReports")),
        //         i = {
        //             chart: {
        //                 height: 202,
        //                 parentHeightOffset: 0,
        //                 type: "bar",
        //                 toolbar: {
        //                     show: !1
        //                 }
        //             },
        //             plotOptions: {
        //                 bar: {
        //                     barHeight: "60%",
        //                     columnWidth: "38%",
        //                     startingShape: "rounded",
        //                     endingShape: "rounded",
        //                     borderRadius: 4,
        //                     distributed: !0
        //                 }
        //             },
        //             grid: {
        //                 show: !1,
        //                 padding: {
        //                     top: -30,
        //                     bottom: 0,
        //                     left: -10,
        //                     right: -10
        //                 }
        //             },
        //             colors: [config.colors_label.primary, config.colors_label.primary, config.colors_label.primary, config.colors_label.primary, config.colors.primary, config.colors_label.primary, config.colors_label.primary],
        //             dataLabels: {
        //                 enabled: !1
        //             },
        //             series: [{
        //                 data: [40, 65, 50, 45, 90, 55, 70]
        //             }],
        //             legend: {
        //                 show: !1
        //             },
        //             xaxis: {
        //                 categories: ["Mo", "Tu", "We", "Th", "Fr", "Sa", "Su"],
        //                 axisBorder: {
        //                     show: !1
        //                 },
        //                 axisTicks: {
        //                     show: !1
        //                 },
        //                 labels: {
        //                     style: {
        //                         colors: a,
        //                         fontSize: "13px",
        //                         fontFamily: "Public Sans"
        //                     }
        //                 }
        //             },
        //             yaxis: {
        //                 labels: {
        //                     show: !1
        //                 }
        //             },
        //             tooltip: {
        //                 enabled: !1
        //             },
        //             responsive: [{
        //                 breakpoint: 1025,
        //                 options: {
        //                     chart: {
        //                         height: 199
        //                     }
        //                 }
        //             }]
        //         },
        //         s = (null !== s && new ApexCharts(s, i).render(), document.querySelector("#supportTracker")),
        //         i = {
        //             series: [85],
        //             labels: ["Completed Task"],
        //             chart: {
        //                 height: 360,
        //                 type: "radialBar"
        //             },
        //             plotOptions: {
        //                 radialBar: {
        //                     offsetY: 10,
        //                     startAngle: -140,
        //                     endAngle: 130,
        //                     hollow: {
        //                         size: "65%"
        //                     },
        //                     track: {
        //                         background: e,
        //                         strokeWidth: "100%"
        //                     },
        //                     dataLabels: {
        //                         name: {
        //                             offsetY: -20,
        //                             color: a,
        //                             fontSize: "13px",
        //                             fontWeight: "400",
        //                             fontFamily: "Public Sans"
        //                         },
        //                         value: {
        //                             offsetY: 10,
        //                             color: t,
        //                             fontSize: "38px",
        //                             fontWeight: "500",
        //                             fontFamily: "Public Sans"
        //                         }
        //                     }
        //                 }
        //             },
        //             colors: [config.colors.primary],
        //             fill: {
        //                 type: "gradient",
        //                 gradient: {
        //                     shade: "dark",
        //                     shadeIntensity: .5,
        //                     gradientToColors: [config.colors.primary],
        //                     inverseColors: !0,
        //                     opacityFrom: 1,
        //                     opacityTo: .6,
        //                     stops: [30, 70, 100]
        //                 }
        //             },
        //             stroke: {
        //                 dashArray: 10
        //             },
        //             grid: {
        //                 padding: {
        //                     top: -20,
        //                     bottom: 5
        //                 }
        //             },
        //             states: {
        //                 hover: {
        //                     filter: {
        //                         type: "none"
        //                     }
        //                 },
        //                 active: {
        //                     filter: {
        //                         type: "none"
        //                     }
        //                 }
        //             },
        //             responsive: [{
        //                 breakpoint: 1025,
        //                 options: {
        //                     chart: {
        //                         height: 330
        //                     }
        //                 }
        //             }, {
        //                 breakpoint: 769,
        //                 options: {
        //                     chart: {
        //                         height: 280
        //                     }
        //                 }
        //             }]
        //         },
        //         s = (null !== s && new ApexCharts(s, i).render(), document.querySelector("#totalEarningChart")),
        //         i = {
        //             series: [{
        //                 name: "Earning",
        //                 data: [15, 10, 20, 8, 12, 18, 12, 5]
        //             }, {
        //                 name: "Expense",
        //                 data: [-7, -10, -7, -12, -6, -9, -5, -8]
        //             }],
        //             chart: {
        //                 height: 230,
        //                 parentHeightOffset: 0,
        //                 stacked: !0,
        //                 type: "bar",
        //                 toolbar: {
        //                     show: !1
        //                 }
        //             },
        //             tooltip: {
        //                 enabled: !1
        //             },
        //             legend: {
        //                 show: !1
        //             },
        //             plotOptions: {
        //                 bar: {
        //                     horizontal: !1,
        //                     columnWidth: "18%",
        //                     borderRadius: 5,
        //                     startingShape: "rounded",
        //                     endingShape: "rounded"
        //                 }
        //             },
        //             colors: [config.colors.primary, o],
        //             dataLabels: {
        //                 enabled: !1
        //             },
        //             grid: {
        //                 show: !1,
        //                 padding: {
        //                     top: -40,
        //                     bottom: -20,
        //                     left: -10,
        //                     right: -2
        //                 }
        //             },
        //             xaxis: {
        //                 labels: {
        //                     show: !1
        //                 },
        //                 axisTicks: {
        //                     show: !1
        //                 },
        //                 axisBorder: {
        //                     show: !1
        //                 }
        //             },
        //             yaxis: {
        //                 labels: {
        //                     show: !1
        //                 }
        //             },
        //             responsive: [{
        //                 breakpoint: 1468,
        //                 options: {
        //                     plotOptions: {
        //                         bar: {
        //                             columnWidth: "22%"
        //                         }
        //                     }
        //                 }
        //             }, {
        //                 breakpoint: 1197,
        //                 options: {
        //                     chart: {
        //                         height: 228
        //                     },
        //                     plotOptions: {
        //                         bar: {
        //                             borderRadius: 8,
        //                             columnWidth: "26%"
        //                         }
        //                     }
        //                 }
        //             }, {
        //                 breakpoint: 783,
        //                 options: {
        //                     chart: {
        //                         height: 232
        //                     },
        //                     plotOptions: {
        //                         bar: {
        //                             borderRadius: 6,
        //                             columnWidth: "28%"
        //                         }
        //                     }
        //                 }
        //             }, {
        //                 breakpoint: 589,
        //                 options: {
        //                     plotOptions: {
        //                         bar: {
        //                             columnWidth: "16%"
        //                         }
        //                     }
        //                 }
        //             }, {
        //                 breakpoint: 520,
        //                 options: {
        //                     plotOptions: {
        //                         bar: {
        //                             borderRadius: 6,
        //                             columnWidth: "18%"
        //                         }
        //                     }
        //                 }
        //             }, {
        //                 breakpoint: 426,
        //                 options: {
        //                     plotOptions: {
        //                         bar: {
        //                             borderRadius: 5,
        //                             columnWidth: "20%"
        //                         }
        //                     }
        //                 }
        //             }, {
        //                 breakpoint: 381,
        //                 options: {
        //                     plotOptions: {
        //                         bar: {
        //                             columnWidth: "24%"
        //                         }
        //                     }
        //                 }
        //             }],
        //             states: {
        //                 hover: {
        //                     filter: {
        //                         type: "none"
        //                     }
        //                 },
        //                 active: {
        //                     filter: {
        //                         type: "none"
        //                     }
        //                 }
        //             }
        //         },
        //         s = (null !== s && new ApexCharts(s, i).render(), $(".datatables-projects"));
        //     s.length && (s.DataTable({
        //         ajax: assetsPath + "json/user-profile.json",
        //         columns: [{
        //             data: ""
        //         }, {
        //             data: "id"
        //         }, {
        //             data: "project_name"
        //         }, {
        //             data: "project_leader"
        //         }, {
        //             data: ""
        //         }, {
        //             data: "status"
        //         }, {
        //             data: ""
        //         }],
        //         columnDefs: [{
        //             className: "control",
        //             searchable: !1,
        //             orderable: !1,
        //             responsivePriority: 2,
        //             targets: 0,
        //             render: function(e, t, a, r) {
        //                 return ""
        //             }
        //         }, {
        //             targets: 1,
        //             orderable: !1,
        //             searchable: !1,
        //             responsivePriority: 3,
        //             checkboxes: !0,
        //             checkboxes: {
        //                 selectAllRender: '<input type="checkbox" class="form-check-input">'
        //             },
        //             render: function() {
        //                 return '<input type="checkbox" class="dt-checkboxes form-check-input">'
        //             }
        //         }, {
        //             targets: 2,
        //             responsivePriority: 4,
        //             render: function(e, t, a, r) {
        //                 var o = a.project_img,
        //                     s = a.project_name,
        //                     i = a.date;
        //                 return '<div class="d-flex justify-content-left align-items-center"><div class="avatar-wrapper"><div class="avatar me-2">' + (o ? '<img src="' + assetsPath + "img/icons/brands/" + o + '" alt="Avatar" class="rounded-circle">' : '<span class="avatar-initial rounded-circle bg-label-' + ["success", "danger", "warning", "info", "primary", "secondary"][Math.floor(6 * Math.random())] + '">' + (o = (((o = (s = a.project_name).match(/\b\w/g) || []).shift() || "") + (o.pop() || "")).toUpperCase()) + "</span>") + '</div></div><div class="d-flex flex-column"><span class="text-truncate fw-medium">' + s + '</span><small class="text-truncate text-muted">' + i + "</small></div></div>"
        //             }
        //         }, {
        //             targets: 4,
        //             orderable: !1,
        //             searchable: !1,
        //             render: function(e, t, a, r) {
        //                 for (var o = a.team, s = '<div class="d-flex align-items-center avatar-group">', i = 0; i < o.length; i++) s += '<div class="avatar avatar-sm"><img src="' + assetsPath + "img/avatars/" + o[i] + '" alt="Avatar" class="rounded-circle pull-up"></div>';
        //                 return s += "</div>"
        //             }
        //         }, {
        //             targets: -2,
        //             render: function(e, t, a, r) {
        //                 a = a.status;
        //                 return '<div class="d-flex align-items-center"><div class="progress w-100 me-3" style="height: 6px;"><div class="progress-bar" style="width: ' + a + '" aria-valuenow="' + a + '" aria-valuemin="0" aria-valuemax="100"></div></div><span>' + a + "</span></div>"
        //             }
        //         }, {
        //             targets: -1,
        //             searchable: !1,
        //             title: "Actions",
        //             orderable: !1,
        //             render: function(e, t, a, r) {
        //                 return '<div class="d-inline-block"><a href="javascript:;" class="btn btn-sm btn-icon dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="ti ti-dots-vertical"></i></a><div class="dropdown-menu dropdown-menu-end m-0"><a href="javascript:;" class="dropdown-item">Details</a><a href="javascript:;" class="dropdown-item">Archive</a><div class="dropdown-divider"></div><a href="javascript:;" class="dropdown-item text-danger delete-record">Delete</a></div></div>'
        //             }
        //         }],
        //         order: [
        //             [2, "desc"]
        //         ],
        //         dom: '<"card-header pb-0 pt-sm-0"<"head-label text-center"><"d-flex justify-content-center justify-content-md-end"f>>t<"row mx-2"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>',
        //         displayLength: 5,
        //         lengthMenu: [5, 10, 25, 50, 75, 100],
        //         responsive: {
        //             details: {
        //                 display: $.fn.dataTable.Responsive.display.modal({
        //                     header: function(e) {
        //                         return 'Details of "' + e.data().project_name + '" Project'
        //                     }
        //                 }),
        //                 type: "column",
        //                 renderer: function(e, t, a) {
        //                     a = $.map(a, function(e, t) {
        //                         return "" !== e.title ? '<tr data-dt-row="' + e.rowIndex + '" data-dt-column="' + e.columnIndex + '"><td>' + e.title + ":</td> <td>" + e.data + "</td></tr>" : ""
        //                     }).join("");
        //                     return !!a && $('<table class="table"/><tbody />').append(a)
        //                 }
        //             }
        //         }
        //     }), $("div.head-label").html('<h5 class="card-title mb-0">Projects</h5>')), setTimeout(() => {
        //         $(".dataTables_filter .form-control").removeClass("form-control-sm"), $(".dataTables_length .form-select").removeClass("form-select-sm")
        //     }, 300)
        // }();
    </script>


    @endsection