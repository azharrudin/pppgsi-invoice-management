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
@endsection

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row mb-4">
        <!-- View sales -->
        <div class="col-md-6  col-12">
            <div class="card h-100" style="background: rgb(97,73,206); background: linear-gradient(3deg, rgba(97,73,206,1) 0%, rgba(156,98,244,1) 100%); color:white;">
                <div class="d-flex align-items-end row">
                    <div class="col-7">
                        <div class="card-body text-nowrap">
                            <h5 class="card-title mb-1 text-white">Hai Dina,</h5>
                            <p class="mb-2">Total Tagihan kamu yang sudah <br>
                                masuk saat ini</p>
                            <h1 class="text-primary mb-1 "> <b class="text-white">Rp. 10.000.000</b></h1>
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
                    <div id="generatedLeadsChart" style="min-height: 180px;">
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
                    <div id="generatedLeadsChart" style="min-height: 180px;">
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
                            <h5 class="text-center">Total Tagihan invoice</h5>
                        </div>
                    </div>
                    <div class="card-body d-flex align-items-center justify-content-center" style="position: relative;">
                        <div id="generatedLeadsChart" style="min-height: 180px;">
                        </div>
                    </div>
                </div>

                <div class="card h-100">
                    <div class="card-header d-flex align-items-center justify-content-center">
                        <div class="card-title mb-0">
                            <h5 class="text-center">Total Tagihan invoice</h5>
                        </div>
                    </div>
                    <div class="card-body d-flex align-items-center justify-content-center" style="position: relative;">
                        <div id="generatedLeadsChart" style="min-height: 180px;">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="card">
                <div class="card-datatable table-responsive pt-0">
                    <table class="invoice-list-table table">
                        <thead>
                            <tr>
                                <th>No Work Order</th>
                                <th>Scope</th>
                                <th>Classification</th>
                                <th>Date</th>
                                <th>Action Plan</th>
                                <th>Status</th>
                                <th>Tanggapan</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-3">
            <div class="d-flex flex-column">
                <div class="card h-100 mb-4">
                    <div class="card-header d-flex align-items-center justify-content-center">
                        <div class="card-title mb-0">
                            <h5 class="text-center">Total Tagihan invoice</h5>
                        </div>
                    </div>
                    <div class="card-body d-flex align-items-center justify-content-center" style="position: relative;">
                        <div id="generatedLeadsChart" style="min-height: 180px;">
                        </div>
                    </div>
                </div>

                <div class="card h-100">
                    <div class="card-header d-flex align-items-center justify-content-center">
                        <div class="card-title mb-0">
                            <h5 class="text-center">Total Tagihan invoice</h5>
                        </div>
                    </div>
                    <div class="card-body d-flex align-items-center justify-content-center" style="position: relative;">
                        <div id="generatedLeadsChart" style="min-height: 180px;">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="card h-100">
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
@endsection

@section('page-script')
<script src="https://demos.pixinvent.com/vuexy-html-laravel-admin-template/demo/assets/vendor/libs/apex-charts/apexcharts.js"></script>
<script src="https://demos.pixinvent.com/vuexy-html-laravel-admin-template/demo/assets/vendor/libs/swiper/swiper.js"></script>
<script src="https://demos.pixinvent.com/vuexy-html-laravel-admin-template/demo/assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js"></script>
<!-- END: Page Vendor JS-->
<!-- BEGIN: Theme JS-->
<script src="https://demos.pixinvent.com/vuexy-html-laravel-admin-template/demo/assets/js/main.js?id=8bd0165c1c4340f4d4a66add0761ae8a"></script>

<!-- END: Theme JS-->
<!-- Pricing Modal JS-->
<!-- END: Pricing Modal JS-->
<!-- BEGIN: Page JS-->
<script src="https://demos.pixinvent.com/vuexy-html-laravel-admin-template/demo/assets/js/dashboards-analytics.js"></script>
<script>
    "use strict";
    ! function() {
        let e, t, o, a, i;
        a = (isDarkStyle ? (e = config.colors_dark.cardColor, t = config.colors_dark.textMuted, i = config.colors_dark.bodyColor, o = config.colors_dark.headingColor, config.colors_dark) : (e = config.colors.cardColor, t = config.colors.textMuted, i = config.colors.bodyColor, o = config.colors.headingColor, config.colors)).borderColor;
        var s = {
                donut: {
                    series1: config.colors.success,
                    series2: "#28c76fb3",
                    series3: "#28c76f80",
                    series4: config.colors_label.success
                }
            },
            r = document.querySelector("#expensesChart"),
            n = {
                chart: {
                    height: 145,
                    sparkline: {
                        enabled: !0
                    },
                    parentHeightOffset: 0,
                    type: "radialBar"
                },
                colors: [config.colors.warning],
                series: [78],
                plotOptions: {
                    radialBar: {
                        offsetY: 0,
                        startAngle: -90,
                        endAngle: 90,
                        hollow: {
                            size: "65%"
                        },
                        track: {
                            strokeWidth: "45%",
                            background: a
                        },
                        dataLabels: {
                            name: {
                                show: !1
                            },
                            value: {
                                fontSize: "22px",
                                color: o,
                                fontWeight: 500,
                                offsetY: -5
                            }
                        }
                    }
                },
                grid: {
                    show: !1,
                    padding: {
                        bottom: 5
                    }
                },
                stroke: {
                    lineCap: "round"
                },
                labels: ["Progress"],
                responsive: [{
                    breakpoint: 1442,
                    options: {
                        chart: {
                            height: 120
                        },
                        plotOptions: {
                            radialBar: {
                                dataLabels: {
                                    value: {
                                        fontSize: "18px"
                                    }
                                },
                                hollow: {
                                    size: "60%"
                                }
                            }
                        }
                    }
                }, {
                    breakpoint: 1025,
                    options: {
                        chart: {
                            height: 136
                        },
                        plotOptions: {
                            radialBar: {
                                hollow: {
                                    size: "65%"
                                },
                                dataLabels: {
                                    value: {
                                        fontSize: "18px"
                                    }
                                }
                            }
                        }
                    }
                }, {
                    breakpoint: 769,
                    options: {
                        chart: {
                            height: 120
                        },
                        plotOptions: {
                            radialBar: {
                                hollow: {
                                    size: "55%"
                                }
                            }
                        }
                    }
                }, {
                    breakpoint: 426,
                    options: {
                        chart: {
                            height: 145
                        },
                        plotOptions: {
                            radialBar: {
                                hollow: {
                                    size: "65%"
                                }
                            }
                        },
                        dataLabels: {
                            value: {
                                offsetY: 0
                            }
                        }
                    }
                }, {
                    breakpoint: 376,
                    options: {
                        chart: {
                            height: 105
                        },
                        plotOptions: {
                            radialBar: {
                                hollow: {
                                    size: "60%"
                                }
                            }
                        }
                    }
                }]
            },
            r = (null !== r && new ApexCharts(r, n).render(), document.querySelector("#profitLastMonth")),
            n = {
                chart: {
                    height: 90,
                    type: "line",
                    parentHeightOffset: 0,
                    toolbar: {
                        show: !1
                    }
                },
                grid: {
                    borderColor: a,
                    strokeDashArray: 6,
                    xaxis: {
                        lines: {
                            show: !0,
                            colors: "#000"
                        }
                    },
                    yaxis: {
                        lines: {
                            show: !1
                        }
                    },
                    padding: {
                        top: -18,
                        left: -4,
                        right: 7,
                        bottom: -10
                    }
                },
                colors: [config.colors.info],
                stroke: {
                    width: 2
                },
                series: [{
                    data: [0, 25, 10, 40, 25, 55]
                }],
                tooltip: {
                    shared: !1,
                    intersect: !0,
                    x: {
                        show: !1
                    }
                },
                tooltip: {
                    enabled: !1
                },
                xaxis: {
                    labels: {
                        show: !1
                    },
                    axisTicks: {
                        show: !1
                    },
                    axisBorder: {
                        show: !1
                    }
                },
                yaxis: {
                    labels: {
                        show: !1
                    }
                },
                markers: {
                    size: 3.5,
                    fillColor: config.colors.info,
                    strokeColors: "transparent",
                    strokeWidth: 3.2,
                    discrete: [{
                        seriesIndex: 0,
                        dataPointIndex: 5,
                        fillColor: e,
                        strokeColor: config.colors.info,
                        size: 5,
                        shape: "circle"
                    }],
                    hover: {
                        size: 5.5
                    }
                },
                responsive: [{
                    breakpoint: 1442,
                    options: {
                        chart: {
                            height: 100
                        }
                    }
                }, {
                    breakpoint: 1025,
                    options: {
                        chart: {
                            height: 86
                        }
                    }
                }, {
                    breakpoint: 769,
                    options: {
                        chart: {
                            height: 93
                        }
                    }
                }]
            },
            r = (null !== r && new ApexCharts(r, n).render(), document.querySelector("#generatedLeadsChart")),
            n = {
                chart: {
                    height: 147,
                    width: 130,
                    parentHeightOffset: 0,
                    type: "donut"
                },
                labels: ["Electronic", "Sports", "Decor", "Fashion"],
                series: [45, 58, 30, 50],
                colors: [s.donut.series1, s.donut.series2, s.donut.series3, s.donut.series4],
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
                        top: 15,
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
                                    color: config.colors.success,
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
                            height: 178
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
            s = (null !== r && new ApexCharts(r, n).render(), document.querySelector("#totalRevenueChart")),
            r = {
                series: [{
                    name: "Earning",
                    data: [270, 210, 180, 200, 250, 280, 250, 270, 150]
                }, {
                    name: "Expense",
                    data: [-140, -160, -180, -150, -100, -60, -80, -100, -180]
                }],
                chart: {
                    height: 413,
                    parentHeightOffset: 0,
                    stacked: !0,
                    type: "bar",
                    toolbar: {
                        show: !1
                    }
                },
                tooltip: {
                    enabled: !1
                },
                plotOptions: {
                    bar: {
                        horizontal: !1,
                        columnWidth: "40%",
                        borderRadius: 9,
                        startingShape: "rounded",
                        endingShape: "rounded"
                    }
                },
                colors: [config.colors.primary, config.colors.warning],
                dataLabels: {
                    enabled: !1
                },
                stroke: {
                    curve: "smooth",
                    width: 6,
                    lineCap: "round",
                    colors: [e]
                },
                legend: {
                    show: !0,
                    horizontalAlign: "right",
                    position: "top",
                    fontFamily: "Public Sans",
                    markers: {
                        height: 12,
                        width: 12,
                        radius: 12,
                        offsetX: -3,
                        offsetY: 2
                    },
                    labels: {
                        colors: i
                    },
                    itemMargin: {
                        horizontal: 10,
                        vertical: 2
                    }
                },
                grid: {
                    show: !1,
                    padding: {
                        bottom: -8,
                        top: 20
                    }
                },
                xaxis: {
                    categories: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep"],
                    labels: {
                        style: {
                            fontSize: "13px",
                            colors: t,
                            fontFamily: "Public Sans"
                        }
                    },
                    axisTicks: {
                        show: !1
                    },
                    axisBorder: {
                        show: !1
                    }
                },
                yaxis: {
                    labels: {
                        offsetX: -16,
                        style: {
                            fontSize: "13px",
                            colors: t,
                            fontFamily: "Public Sans"
                        }
                    },
                    min: -200,
                    max: 300,
                    tickAmount: 5
                },
                responsive: [{
                    breakpoint: 1700,
                    options: {
                        plotOptions: {
                            bar: {
                                columnWidth: "43%"
                            }
                        }
                    }
                }, {
                    breakpoint: 1441,
                    options: {
                        plotOptions: {
                            bar: {
                                columnWidth: "50%"
                            }
                        },
                        chart: {
                            height: 422
                        }
                    }
                }, {
                    breakpoint: 1300,
                    options: {
                        plotOptions: {
                            bar: {
                                columnWidth: "50%"
                            }
                        }
                    }
                }, {
                    breakpoint: 1025,
                    options: {
                        plotOptions: {
                            bar: {
                                columnWidth: "50%"
                            }
                        },
                        chart: {
                            height: 390
                        }
                    }
                }, {
                    breakpoint: 991,
                    options: {
                        plotOptions: {
                            bar: {
                                columnWidth: "38%"
                            }
                        }
                    }
                }, {
                    breakpoint: 850,
                    options: {
                        plotOptions: {
                            bar: {
                                columnWidth: "50%"
                            }
                        }
                    }
                }, {
                    breakpoint: 449,
                    options: {
                        plotOptions: {
                            bar: {
                                columnWidth: "73%"
                            }
                        },
                        chart: {
                            height: 360
                        },
                        xaxis: {
                            labels: {
                                offsetY: -5
                            }
                        },
                        legend: {
                            show: !0,
                            horizontalAlign: "right",
                            position: "top",
                            itemMargin: {
                                horizontal: 10,
                                vertical: 0
                            }
                        }
                    }
                }, {
                    breakpoint: 394,
                    options: {
                        plotOptions: {
                            bar: {
                                columnWidth: "88%"
                            }
                        },
                        legend: {
                            show: !0,
                            horizontalAlign: "center",
                            position: "bottom",
                            markers: {
                                offsetX: -3,
                                offsetY: 0
                            },
                            itemMargin: {
                                horizontal: 10,
                                vertical: 5
                            }
                        }
                    }
                }],
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
                }
            },
            n = (null !== s && new ApexCharts(s, r).render(), document.querySelector("#budgetChart")),
            s = {
                chart: {
                    height: 100,
                    toolbar: {
                        show: !1
                    },
                    zoom: {
                        enabled: !1
                    },
                    type: "line"
                },
                series: [{
                    name: "Last Month",
                    data: [20, 10, 30, 16, 24, 5, 40, 23, 28, 5, 30]
                }, {
                    name: "This Month",
                    data: [50, 40, 60, 46, 54, 35, 70, 53, 58, 35, 60]
                }],
                stroke: {
                    curve: "smooth",
                    dashArray: [5, 0],
                    width: [1, 2]
                },
                legend: {
                    show: !1
                },
                colors: [a, config.colors.primary],
                grid: {
                    show: !1,
                    borderColor: a,
                    padding: {
                        top: -30,
                        bottom: -15,
                        left: 25
                    }
                },
                markers: {
                    size: 0
                },
                xaxis: {
                    labels: {
                        show: !1
                    },
                    axisTicks: {
                        show: !1
                    },
                    axisBorder: {
                        show: !1
                    }
                },
                yaxis: {
                    show: !1
                },
                tooltip: {
                    enabled: !1
                }
            },
            r = (null !== n && new ApexCharts(n, s).render(), document.querySelector("#reportBarChart")),
            n = {
                chart: {
                    height: 230,
                    type: "bar",
                    toolbar: {
                        show: !1
                    }
                },
                plotOptions: {
                    bar: {
                        barHeight: "60%",
                        columnWidth: "60%",
                        startingShape: "rounded",
                        endingShape: "rounded",
                        borderRadius: 4,
                        distributed: !0
                    }
                },
                grid: {
                    show: !1,
                    padding: {
                        top: -20,
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
                    data: [40, 95, 60, 45, 90, 50, 75]
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
                            colors: t,
                            fontSize: "13px"
                        }
                    }
                },
                yaxis: {
                    labels: {
                        show: !1
                    }
                },
                responsive: [{
                    breakpoint: 1025,
                    options: {
                        chart: {
                            height: 190
                        }
                    }
                }, {
                    breakpoint: 769,
                    options: {
                        chart: {
                            height: 250
                        }
                    }
                }]
            },
            s = (null !== r && new ApexCharts(r, n).render(), $(".datatable-invoice"));
        s.length && s.DataTable({
            ajax: assetsPath + "json/invoice-list.json",
            columns: [{
                data: ""
            }, {
                data: "invoice_id"
            }, {
                data: "invoice_status"
            }, {
                data: "total"
            }, {
                data: "issued_date"
            }, {
                data: "invoice_status"
            }, {
                data: "action"
            }],
            columnDefs: [{
                className: "control",
                responsivePriority: 2,
                targets: 0,
                render: function(e, t, o, a) {
                    return ""
                }
            }, {
                targets: 1,
                render: function(e, t, o, a) {
                    return '<a href="app-invoice-preview.html"><span>#' + o.invoice_id + "</span></a>"
                }
            }, {
                targets: 2,
                render: function(e, t, o, a) {
                    var i = o.invoice_status,
                        s = o.due_date;
                    return "<span data-bs-toggle='tooltip' data-bs-html='true' title='<span>" + i + '<br> <span class="fw-medium">Balance:</span> ' + o.balance + '<br> <span class="fw-medium">Due Date:</span> ' + s + "</span>'>" + {
                        Sent: '<span class="badge badge-center rounded-pill bg-label-secondary w-px-30 h-px-30"><i class="ti ti-circle-check ti-sm"></i></span>',
                        Draft: '<span class="badge badge-center rounded-pill bg-label-primary w-px-30 h-px-30"><i class="ti ti-device-floppy ti-sm"></i></span>',
                        "Past Due": '<span class="badge badge-center rounded-pill bg-label-danger w-px-30 h-px-30"><i class="ti ti-info-circle ti-sm"></i></span>',
                        "Partial Payment": '<span class="badge badge-center rounded-pill bg-label-success w-px-30 h-px-30"><i class="ti ti-circle-half-2 ti-sm"></i></span>',
                        Paid: '<span class="badge badge-center rounded-pill bg-label-warning w-px-30 h-px-30"><i class="ti ti-chart-pie ti-sm"></i></span>',
                        Downloaded: '<span class="badge badge-center rounded-pill bg-label-info w-px-30 h-px-30"><i class="ti ti-arrow-down-circle ti-sm"></i></span>'
                    } [i] + "</span>"
                }
            }, {
                targets: 3,
                render: function(e, t, o, a) {
                    return "$" + o.total
                }
            }, {
                targets: -1,
                title: "Actions",
                orderable: !1,
                render: function(e, t, o, a) {
                    return '<div class="d-flex align-items-center"><a href="javascript:;" class="text-body" data-bs-toggle="tooltip" title="Send Mail"><i class="ti ti-mail me-2 ti-sm"></i></a><a href="app-invoice-preview.html" class="text-body" data-bs-toggle="tooltip" title="Preview"><i class="ti ti-eye mx-2 ti-sm"></i></a><div class="d-inline-block"><a href="javascript:;" class="btn btn-sm btn-icon dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="ti ti-dots-vertical ti-sm lh-1"></i></a><div class="dropdown-menu dropdown-menu-end m-0"><a href="javascript:;" class="dropdown-item">Details</a><a href="javascript:;" class="dropdown-item">Archive</a><div class="dropdown-divider"></div><a href="javascript:;" class="dropdown-item text-danger delete-record">Delete</a></div></div></div>'
                }
            }, {
                targets: -2,
                visible: !1
            }],
            order: [
                [1, "asc"]
            ],
            dom: '<"row ms-2 me-3"<"col-12 col-md-6 d-flex align-items-center justify-content-center justify-content-md-start gap-2"l<"dt-action-buttons text-xl-end text-lg-start text-md-end text-start mt-md-0 mt-3"B>><"col-12 col-md-6 d-flex align-items-center justify-content-end flex-column flex-md-row pe-3 gap-md-2"f<"invoice_status mb-3 mb-md-0">>>t<"row d-flex align-items-center mx-2"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6 mt-1"p>>',
            displayLength: 7,
            lengthMenu: [7, 10, 25, 50, 75, 100],
            language: {
                sLengthMenu: "_MENU_",
                search: "",
                searchPlaceholder: "Search Invoice"
            },
            buttons: [{
                text: '<i class="ti ti-plus me-md-2"></i><span class="d-md-inline-block d-none">Create Invoice</span>',
                className: "btn btn-primary",
                action: function(e, t, o, a) {
                    window.location = "app-invoice-add.html"
                }
            }],
            responsive: {
                details: {
                    display: $.fn.dataTable.Responsive.display.modal({
                        header: function(e) {
                            return "Details of " + e.data().full_name
                        }
                    }),
                    type: "column",
                    renderer: function(e, t, o) {
                        o = $.map(o, function(e, t) {
                            return "" !== e.title ? '<tr data-dt-row="' + e.rowIndex + '" data-dt-column="' + e.columnIndex + '"><td>' + e.title + ":</td> <td>" + e.data + "</td></tr>" : ""
                        }).join("");
                        return !!o && $('<table class="table"/><tbody />').append(o)
                    }
                }
            },
            initComplete: function() {
                this.api().columns(5).every(function() {
                    var t = this,
                        o = $('<select id="UserRole" class="form-select"><option value=""> Select Status </option></select>').appendTo(".invoice_status").on("change", function() {
                            var e = $.fn.dataTable.util.escapeRegex($(this).val());
                            t.search(e ? "^" + e + "$" : "", !0, !1).draw()
                        });
                    t.data().unique().sort().each(function(e, t) {
                        o.append('<option value="' + e + '" class="text-capitalize">' + e + "</option>")
                    })
                })
            }
        }), s.on("draw.dt", function() {
            [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]')).map(function(e) {
                return new bootstrap.Tooltip(e, {
                    boundary: document.body
                })
            })
        }), setTimeout(() => {
            $(".dataTables_filter .form-control").removeClass("form-control-sm"), $(".dataTables_length .form-select").removeClass("form-select-sm")
        }, 300)
    }();


    $((function() {
        var a = $(".invoice-list-table");
        if (a.length) var e = a.DataTable({
            ajax: assetsPath + "json/invoice-list.json",
            columns: [{
                data: "no_lk"
            }, {
                data: "scope"
            }, {
                data: "classification"
            }, {
                data: "date"
            }, {}, {
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
    }));
</script>

<script>
    "use strict";
    ! function() {
        let e, t;
        t = (isDarkStyle ? (e = config.colors_dark.textMuted, config.colors_dark) : (e = config.colors.textMuted, config.colors)).headingColor;
        var s = {
                donut: {
                    series1: config.colors.success,
                    series2: "#28c76fb3",
                    series3: "#28c76f80",
                    series4: config.colors_label.success
                },
                line: {
                    series1: config.colors.warning,
                    series2: config.colors.primary,
                    series3: "#7367f029"
                }
            },
            a = document.querySelector("#shipmentStatisticsChart"),
            o = {
                series: [{
                    name: "Shipment",
                    type: "column",
                    data: [38, 45, 33, 38, 32, 50, 48, 40, 42, 37]
                }, {
                    name: "Delivery",
                    type: "line",
                    data: [23, 28, 23, 32, 28, 44, 32, 38, 26, 34]
                }],
                chart: {
                    height: 270,
                    type: "line",
                    stacked: !1,
                    parentHeightOffset: 0,
                    toolbar: {
                        show: !1
                    },
                    zoom: {
                        enabled: !1
                    }
                },
                markers: {
                    size: 4,
                    colors: [config.colors.white],
                    strokeColors: s.line.series2,
                    hover: {
                        size: 6
                    },
                    borderRadius: 4
                },
                stroke: {
                    curve: "smooth",
                    width: [0, 3],
                    lineCap: "round"
                },
                legend: {
                    show: !0,
                    position: "bottom",
                    markers: {
                        width: 8,
                        height: 8,
                        offsetX: -3
                    },
                    height: 40,
                    offsetY: 10,
                    itemMargin: {
                        horizontal: 10,
                        vertical: 0
                    },
                    fontSize: "15px",
                    fontFamily: "Public Sans",
                    fontWeight: 400,
                    labels: {
                        colors: t,
                        useSeriesColors: !1
                    },
                    offsetY: 10
                },
                grid: {
                    strokeDashArray: 8
                },
                colors: [s.line.series1, s.line.series2],
                fill: {
                    opacity: [1, 1]
                },
                plotOptions: {
                    bar: {
                        columnWidth: "30%",
                        startingShape: "rounded",
                        endingShape: "rounded",
                        borderRadius: 4
                    }
                },
                dataLabels: {
                    enabled: !1
                },
                xaxis: {
                    tickAmount: 10,
                    categories: ["1 Jan", "2 Jan", "3 Jan", "4 Jan", "5 Jan", "6 Jan", "7 Jan", "8 Jan", "9 Jan", "10 Jan"],
                    labels: {
                        style: {
                            colors: e,
                            fontSize: "13px",
                            fontFamily: "Public Sans",
                            fontWeight: 400
                        }
                    },
                    axisBorder: {
                        show: !1
                    },
                    axisTicks: {
                        show: !1
                    }
                },
                yaxis: {
                    tickAmount: 4,
                    min: 10,
                    max: 50,
                    labels: {
                        style: {
                            colors: e,
                            fontSize: "13px",
                            fontFamily: "Public Sans",
                            fontWeight: 400
                        },
                        formatter: function(e) {
                            return e + "%"
                        }
                    }
                },
                responsive: [{
                    breakpoint: 1400,
                    options: {
                        chart: {
                            height: 270
                        },
                        xaxis: {
                            labels: {
                                style: {
                                    fontSize: "10px"
                                }
                            }
                        },
                        legend: {
                            itemMargin: {
                                vertical: 0,
                                horizontal: 10
                            },
                            fontSize: "13px",
                            offsetY: 12
                        }
                    }
                }, {
                    breakpoint: 1399,
                    options: {
                        chart: {
                            height: 415
                        },
                        plotOptions: {
                            bar: {
                                columnWidth: "50%"
                            }
                        }
                    }
                }, {
                    breakpoint: 982,
                    options: {
                        plotOptions: {
                            bar: {
                                columnWidth: "30%"
                            }
                        }
                    }
                }, {
                    breakpoint: 480,
                    options: {
                        chart: {
                            height: 250
                        },
                        legend: {
                            offsetY: 7
                        }
                    }
                }]
            },
            a = (null !== a && new ApexCharts(a, o).render(), document.querySelector("#deliveryExceptionsChart")),
            o = {
                chart: {
                    height: 420,
                    parentHeightOffset: 0,
                    type: "donut"
                },
                labels: ["Incorrect address", "Weather conditions", "Federal Holidays", "Damage during transit"],
                series: [13, 25, 22, 40],
                colors: [s.donut.series1, s.donut.series2, s.donut.series3, s.donut.series4],
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
                    show: !0,
                    position: "bottom",
                    offsetY: 10,
                    markers: {
                        width: 8,
                        height: 8,
                        offsetX: -3
                    },
                    itemMargin: {
                        horizontal: 15,
                        vertical: 5
                    },
                    fontSize: "13px",
                    fontFamily: "Public Sans",
                    fontWeight: 400,
                    labels: {
                        colors: t,
                        useSeriesColors: !1
                    }
                },
                tooltip: {
                    theme: !1
                },
                grid: {
                    padding: {
                        top: 15
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
                            size: "77%",
                            labels: {
                                show: !0,
                                value: {
                                    fontSize: "26px",
                                    fontFamily: "Public Sans",
                                    color: t,
                                    fontWeight: 500,
                                    offsetY: -30,
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
                                    fontSize: ".75rem",
                                    label: "AVG. Exceptions",
                                    color: e,
                                    formatter: function(e) {
                                        return "30%"
                                    }
                                }
                            }
                        }
                    }
                },
                responsive: [{
                    breakpoint: 420,
                    options: {
                        chart: {
                            height: 360
                        }
                    }
                }]
            };
        null !== a && new ApexCharts(a, o).render()
    }(), $(function() {
        var e = $(".dt-route-vehicles");
        e.length && (e.DataTable({
            ajax: assetsPath + "json/logistics-dashboard.json",
            columns: [{
                data: "id"
            }, {
                data: "id"
            }, {
                data: "location"
            }, {
                data: "start_city"
            }, {
                data: "end_city"
            }, {
                data: "warnings"
            }, {
                data: "progress"
            }],
            columnDefs: [{
                className: "control",
                orderable: !1,
                searchable: !1,
                responsivePriority: 2,
                targets: 0,
                render: function(e, t, s, a) {
                    return ""
                }
            }, {
                targets: 1,
                orderable: !1,
                searchable: !1,
                checkboxes: !0,
                checkboxes: {
                    selectAllRender: '<input type="checkbox" class="form-check-input">'
                },
                responsivePriority: 3,
                render: function() {
                    return '<input type="checkbox" class="dt-checkboxes form-check-input">'
                }
            }, {
                targets: 2,
                responsivePriority: 1,
                render: function(e, t, s, a) {
                    return '<div class="d-flex justify-content-start align-items-center user-name"><div class="avatar-wrapper"><div class="avatar me-2"><span class="avatar-initial rounded-circle bg-label-secondary text-body"><i class="ti ti-truck"></i></span></div></div><div class="d-flex flex-column"><a class="text-body fw-medium" href="app-logistics-fleet.html">VOL-' + s.location + "</a></div></div>"
                }
            }, {
                targets: 3,
                render: function(e, t, s, a) {
                    return '<div class="text-body">' + s.start_city + ", " + s.start_country + "</div >"
                }
            }, {
                targets: 4,
                render: function(e, t, s, a) {
                    return '<div class="text-body">' + s.end_city + ", " + s.end_country + "</div >"
                }
            }, {
                targets: -2,
                render: function(e, t, s, a) {
                    var s = s.warnings,
                        o = {
                            1: {
                                title: "No Warnings",
                                class: "bg-label-success"
                            },
                            2: {
                                title: "Temperature Not Optimal",
                                class: "bg-label-warning"
                            },
                            3: {
                                title: "Ecu Not Responding",
                                class: "bg-label-danger"
                            },
                            4: {
                                title: "Oil Leakage",
                                class: "bg-label-info"
                            },
                            5: {
                                title: "fuel problems",
                                class: "bg-label-primary"
                            }
                        };
                    return void 0 === o[s] ? e : '<span class="badge rounded ' + o[s].class + '">' + o[s].title + "</span>"
                }
            }, {
                targets: -1,
                render: function(e, t, s, a) {
                    s = s.progress;
                    return '<div class="d-flex align-items-center"><div div class="progress w-100" style="height: 8px;"><div class="progress-bar" role="progressbar" style="width:' + s + '%;" aria-valuenow="' + s + '" aria-valuemin="0" aria-valuemax="100"></div></div><div class="text-body ms-3">' + s + "%</div></div>"
                }
            }],
            order: [2, "asc"],
            dom: '<"table-responsive"t><"row d-flex align-items-center"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>',
            displayLength: 5,
            responsive: {
                details: {
                    display: $.fn.dataTable.Responsive.display.modal({
                        header: function(e) {
                            return "Details of " + e.data().location
                        }
                    }),
                    type: "column",
                    renderer: function(e, t, s) {
                        s = $.map(s, function(e, t) {
                            return "" !== e.title ? '<tr data-dt-row="' + e.rowIndex + '" data-dt-column="' + e.columnIndex + '"><td>' + e.title + ":</td> <td>" + e.data + "</td></tr>" : ""
                        }).join("");
                        return !!s && $('<table class="table"/><tbody />').append(s)
                    }
                }
            }
        }), $(".dataTables_info").addClass("pt-0"))
    });
</script>
@endsection