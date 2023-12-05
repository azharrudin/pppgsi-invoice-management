@php
    $configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Tanda Terima')

@section('page-style')
    {{-- Page Css files --}}
    <link rel="stylesheet"
        href="https://demos.pixinvent.com/vuexy-html-laravel-admin-template/demo/assets/vendor/libs/flatpickr/flatpickr.css">
@endsection

@section('content')
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">

        <div class="row invoice-add">
            <!-- Tanda Terima Edit-->
            <div class="col-lg-9 col-12 mb-lg-0 mb-3">
                <div class="card invoice-preview-card" id="editTandaTerima">
                    <div class="card-body">
                        <div
                            style="background-image: url('{{ asset('assets/img/header.png') }}'); height : 150px; background-size: contain; background-repeat: no-repeat;">
                        </div>

                        <div class="row m-sm-2 m-0 px-3">
                            <div class="col-md-7 mb-md-0 ps-0">

                            </div>
                            <div class="col-md-5">
                                <dl class="row mb-2">
                                    </dd>
                                    <dt class="col-sm-6 text-md-end ps-0">

                                    </dt>
                                    <dd class="col-sm-6 d-flex justify-content-md-end pe-0 ps-0 ps-sm-2">
                                        <div class="mb-3">
                                            <label for="note" class="form-label fw-medium">No Tanda Terima:</label>
                                            <input type="text" class="form-control w-px-150 " id="receipt_number"
                                                name="receipt_number" placeholder="" />
                                        </div>
                                    </dd>
                                </dl>
                            </div>
                        </div>
                        <h2 class="mx-auto text-center"><b>TANDA TERIMA PEMBAYARAN</b></h2>
                        <span class="mt-5 px-3" style="display: block">Telah terima Pembayaran Tunai / Cek / Giro</span>
                        <div class="row py-3 px-3">
                            <div class="col-md-6 mb-md-0 mb-3">
                                <div class="mb-3 w-px-250">
                                    <label for="note" class="form-label fw-medium">No Invoice</label>
                                    <select class="form-select select2 w-px-250 select-invoice item-details mb-3">
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="note" class="form-label fw-medium">No. Cek/Giro</label>
                                    <input type="text" class="form-control w-px-250 " id="check_number"
                                        name="check_number" placeholder="Nomor" />
                                </div>
                                <div class="mb-3 w-px-250">
                                    <label for="note" class="form-label fw-medium">Bank</label>
                                    <select class="form-select select2 w-px-250 select-bank item-details mb-3">
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6 d-flex justify-content-end">
                                <div class="mb-3">
                                    <label for="note" class="form-label fw-medium">Nama Tenant</label>
                                    <select class="form-select select2 w-px-250 select-tenant item-details mb-3">
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row px-3 d-flex align-items-center mb-3">
                            <div class="col-2">
                                <label for="salesperson" class="form-label  fw-medium">Total Invoice</label>
                            </div>
                            <div class="col-10">
                                <input type="text" class="form-control " id="grand_total" name="grand_total"
                                    placeholder="Total Invoice" fdprocessedid="yombzp">
                            </div>
                        </div>
                        <div class="row px-3 d-flex align-items-center mb-3">
                            <div class="col-2">
                                <label for="salesperson" class="form-label  fw-medium">Dibayarkan</label>
                            </div>
                            <div class="col-10">
                                <input type="text" class="form-control " id="paid" name="paid"
                                    placeholder="Dibayarkan" fdprocessedid="yombzp">
                            </div>
                        </div>
                        <div class="row px-3 d-flex align-items-center mb-3">
                            <div class="col-2">
                                <label for="salesperson" class="form-label  fw-medium">Sisa Tagihan</label>
                            </div>
                            <div class="col-10">
                                <input type="text" class="form-control " id="remaining" name="remaining"
                                    placeholder="Sisa Tagihan" fdprocessedid="yombzp">
                            </div>
                        </div>
                        <div class="row px-3 d-flex align-items-center mb-3">
                            <div class="col-2">
                                <label for="salesperson" class="form-label  fw-medium">Terbilang</label>
                            </div>
                            <div class="col-10">
                                <input type="text" class="form-control " id="grand_total_spelled"
                                    name="grand_total_spelled" placeholder="Terbilang" fdprocessedid="yombzp">
                            </div>
                        </div>

                        <div class="row py-3 px-3">
                            <div class="col-md-6 mb-md-0 mb-3">
                                <textarea class="form-control" rows="11" id="note" name="note" placeholder="Catatan"></textarea>
                                <br>
                                <br>
                                <span>
                                    Apabila dibayar dengan cek / Bilyet giro, Pembayaran baru dianggap sah apabila telah
                                    dapat dicairkan di Bank kami.
                                </span>
                            </div>

                            <div class="col-md-6 mb-md-0 mb-3 d-flex flex-column align-items-center text-center">
                                <div class="mb-3">
                                    <label for="note" class="form-label fw-medium">Tanda Tangan</label>
                                    <input type="text" class="form-control w-px-250 date" id="signature_date"
                                        name="signature_date" placeholder="Tanggal" />
                                </div>
                                <div class="mb-3 prev">
                                    <div class="dz-preview dz-processing dz-image-preview dz-success dz-complete">
                                        <div class="dz-details">
                                            <div class="dz-thumbnail"> <img class="prev-img"
                                                    alt="" src="">
                                                <span class="dz-nopreview">No preview</span>
                                                <div class="dz-success-mark"></div>
                                            </div>
                                        </div><a class="dz-remove" href="javascript:undefined;" data-dz-remove="">Remove
                                            file</a>
                                    </div>
                                </div>
                                <div class="mb-3 click" style="display: none">
                                    <form action="/upload" class="dropzone needsclick dz-clickable w-px-250"
                                        id="dropzone-basic">
                                        <div class="dz-message needsclick">
                                            <span class="note needsclick">Unggah Tanda Tangan</span>
                                        </div>
                                    </form>
                                </div>
                                <div class="mb-3">
                                    <input type="text" class="form-control w-px-250 " id="signature_name"
                                        name="signature_name" placeholder="Nama & Jabatan" />
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
                                    class="ti ti-send ti-xs me-2"></i>Kirim Tanda Terima</span>
                        </button>
                        <a href="https://demos.pixinvent.com/vuexy-html-laravel-admin-template/demo-1/app/invoice/preview"
                            class="btn btn-label-secondary d-grid w-100 mb-2">Preview</a>
                        <button type="button"
                            class="btn btn-label-secondary btn-update d-grid w-100 mb-2">Update</button>
                        <button type="button" class="btn btn-label-secondary btn-cancel d-grid w-100">Batal</button>
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
    <script src="{{ asset('assets/vendor/libs/sweetalert2/sweetalert2.js') }}"></script>
    <script
        src="https://demos.pixinvent.com/vuexy-html-laravel-admin-template/demo/assets/vendor/libs/flatpickr/flatpickr.js">
    </script>
    <script src="https://demos.pixinvent.com/vuexy-html-laravel-admin-template/demo/assets/vendor/libs/moment/moment.js">
    </script>
    <script>
        $(document).ready(function() {

            // Date
            $('.date').flatpickr({
                dateFormat: 'd-m-Y'
            });

            Swal.fire({
                title: 'Loading...',
                text: "Please wait",
                customClass: {
                    confirmButton: 'd-none'
                },
                buttonsStyling: false
            });

            // Mendapatkan id dengan cara mengambil dari URL
            var urlSegments = window.location.pathname.split('/');
            var idIndex = urlSegments.indexOf('edit') + 1;
            var id = urlSegments[idIndex];

            getDataTandaTerima(id);

            function getDataTandaTerima() {
                $.ajax({
                    url: "{{ url('api/receipt') }}/" + id,
                    type: "GET",
                    dataType: "json",
                    success: function(res) {
                        let response = res.data;
                        $('#editTandaTerima').find('.form-control').each(function() {
                            $("#" + $(this).attr('id')).val(response[$(this).attr(
                                "name")]);
                        });
                        $('#signature_date').val(moment(response.signature_date, 'YYYY-MM-DD').format(
                            'DD-MM-YYYY'));
                        $(".select-tenant").empty().append('<option value="' + response.tenant_id +
                                '">' + response.tenant.name + '</option>').val(response.tenant_id)
                            .trigger("change");
                        $(".select-invoice").empty().append('<option value="' + response.invoice_id +
                                '">' + response.invoice.invoice_number + '</option>').val(response
                                .invoice_id)
                            .trigger("change");
                        $(".select-bank").empty().append('<option value="' + response.bank_id +
                                '">' + response.bank.name + '</option>').val(response.bank_id)
                            .trigger("change");
                        if (response.signature_image != '') {
                            $('.prev-img').attr('src', response.signature_image);
                        } else {
                            $('.dz-nopreview').css('display', 'block');
                            $('.dz-success-mark').css('display', 'none');
                        }
                        Swal.close();
                    },
                    error: function(errors) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: errors.responseJSON
                                .message,
                            customClass: {
                                confirmButton: 'btn btn-primary'
                            },
                            buttonsStyling: false
                        })
                    }
                });
            }

            // Update, Insert, and Create
            $(".btn-update").on('click', function() {
                let invoice = $('.select-invoice').val();
                let tenant = $('.select-tenant').val();
                let bank = $('.select-bank').val();
                let date = $('.date').val();

                if (!$('.dz-thumbnail img[data-dz-thumbnail]').hasClass('prev-img')) {
                    console.log($('img[data-dz-thumbnail]').attr('src'));
                }

                let datas = {}

                $('#editTandaTerima').find('.form-control').each(function() {
                    var inputId = $(this).attr('id');
                    var inputValue = $("#" + inputId).val();

                    if (inputId === 'grand_total' || inputId === 'paid' || inputId ===
                        'remaining') {
                        datas[$("#" + inputId).attr("name")] = parseInt(inputValue, 10);
                    } else if (inputId === 'receipt_date') {
                        datas[$("#" + inputId).attr("name")] = moment(inputValue, 'D-M-YYYY')
                            .format('YYYY-MM-DD');
                    } else {
                        datas[$("#" + inputId).attr("name")] = inputValue;
                    }
                });

                datas.invoice_id = parseInt(invoice);
                datas.tenant_id = parseInt(tenant);
                datas.bank_id = parseInt(bank);
                datas.status = 'Terbuat';
                datas.receipt_date = moment().format('YYYY-MM-DD');
                if (!$('img[data-dz-thumbnail]').hasClass('prev-img')) {
                    datas.signature_image = $('img[data-dz-thumbnail]').attr('src');
                }
                datas.signature_date = moment(date, 'D-M-YYYY').format('YYYY-MM-DD');

                $.ajax({
                    url: "{{ url('api/receipt') }}/" + id,
                    type: "PATCH",
                    data: JSON.stringify(datas),
                    contentType: "application/json; charset=utf-8",
                    dataType: "json",
                    beforeSend: function() {
                        Swal.fire({
                            title: 'Loading...',
                            text: "Please wait",
                            customClass: {
                                confirmButton: 'btn btn-primary'
                            },
                            buttonsStyling: false
                        });
                    },
                    success: function(response) {
                        Swal.fire({
                            title: 'Berhasil',
                            text: 'Berhasil update Tanda Terima',
                            icon: 'success',
                            customClass: {
                                confirmButton: 'btn btn-primary'
                            },
                            buttonsStyling: false
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.href =
                                    '{{ route('pages-list-tanda-terima') }}';
                            }
                        });
                    },
                    error: function(errors) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: errors.responseJSON
                                .message,
                            customClass: {
                                confirmButton: 'btn btn-primary'
                            },
                            buttonsStyling: false
                        })
                    }
                });
            });

            // Cancel
            $(".btn-cancel").on('click', function() {
                window.location.href = '{{ route('pages-list-tanda-terima') }}';
            })

            $('.dz-remove').on('click', function() {
                // Find the <img> element
                var imgElement = $('.prev-img');

                // Check if the imgElement exists
                if (imgElement.length > 0) {
                    // Remove the 'src' attribute
                    imgElement.removeAttr('src');

                    // Add the desired class
                    $('.prev').hide();
                    $('.click').show();

                    imgElement.addClass('dropzone needsclick dz-clickable');
                }
            });

            // Select 2 ajax function
            $(".select-tenant").select2({
                placeholder: 'Select Tenant',
                allowClear: true,
                ajax: {
                    url: "{{ url('api/tenant/select') }}",
                    dataType: 'json',
                    cache: true,
                    data: function(params) {
                        return {
                            term: params.term || '',
                            page: params.page || 1
                        }
                    },
                    processResults: function(data, params) {
                        var more = data.pagination.more;
                        if (more === false) {
                            params.page = 1;
                            params.abort = true;
                        }

                        return {
                            results: data.data,
                            pagination: {
                                more: more
                            }
                        };
                    }
                }
            });

            $(".select-invoice").select2({
                placeholder: 'Select Invoice',
                allowClear: true,
                ajax: {
                    url: "{{ url('api/invoice/select') }}",
                    dataType: 'json',
                    cache: true,
                    data: function(params) {
                        return {
                            term: params.term || '',
                            search: params.term,
                            page: params.page || 1
                        }
                    },
                    processResults: function(data, params) {
                        var more = data.pagination.more;
                        if (more === false) {
                            params.page = 1;
                            params.abort = true;
                        }

                        return {
                            results: data.data,
                            pagination: {
                                more: more
                            }
                        };
                    }
                }
            });

            $(".select-bank").select2({
                placeholder: 'Select Bank',
                allowClear: true,
                ajax: {
                    url: "{{ url('api/bank') }}",
                    dataType: 'json',
                    cache: true,
                    data: function(params) {
                        return {
                            term: params.term || '',
                            search: params.term,
                            page: params.page || 1
                        }
                    },
                    processResults: function(data) {
                        var banks = data.data || [];

                        var formattedData = banks.map(function(bank) {
                            return {
                                id: bank.id,
                                text: bank.name
                            };
                        });

                        return {
                            results: formattedData
                        };
                    }
                }
            });
        })
    </script>

@endsection