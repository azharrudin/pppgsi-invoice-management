@php
    $configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Laporan Kerusakan')

@section('page-style')
    {{-- Page Css files --}}
    <link rel="stylesheet"
        href="https://demos.pixinvent.com/vuexy-html-laravel-admin-template/demo/assets/vendor/libs/dropzone/dropzone.css">
    <link rel="stylesheet"
        href="https://demos.pixinvent.com/vuexy-html-laravel-admin-template/demo/assets/vendor/libs/flatpickr/flatpickr.css">
@endsection

@section('content')
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <form id="edit-lk" class="edit-lk" novalidate>
            <div class="row invoice-add">
                <!-- Invoice Add-->
                <div class="col-lg-9 col-12 mb-lg-0 mb-3">
                    <div class="card invoice-preview-card" id="editLaporanKerusakan">
                        <div class="card-body">
                            <div class="row m-sm-4 m-0">
                                <div class="col-md-7 mb-md-0 mb-4 ps-0">
                                    <h1 class="fw-700" style="margin: 0;"><b>PPPGSI</b></h1>
                                    <h4><b>Building Management</b></h4>
                                </div>
                                <div class="col-md-5">
                                    <span class="fs-4 d-block text-center mx-auto"><b>LAPORAN KERUSAKAN</b></span>
                                    <span class="d-block text-center mx-auto">Nomor Lk :</span>
                                    <input type="text" class="form-control add w-px-250 mx-auto"
                                        id="edit_damage_report_number" name="damage_report_number" placeholder="Nomor LK"
                                        required readonly />
                                    <div class="invalid-feedback mx-auto w-px-250">Tidak boleh kosong</div>
                                </div>
                            </div>
                            <hr class="my-3 mx-n4">

                            <div class="row py-3 px-3">
                                <div class="col-md-6 mb-md-0 mb-3">
                                    <div class="mb-1 w-px-250">
                                        <label for="note" class="form-label fw-medium">No Tiket </label>
                                        <select class="form-select select2 w-px-250 select-ticket item-details mb-3"
                                            required>
                                        </select>
                                        <div class="invalid-feedback">Tidak boleh kosong</div>
                                    </div>
                                    <div class="mb-1">
                                        <label for="note" class="form-label fw-medium">Date</label>
                                        <input type="text" class="form-control add w-px-250"
                                            id="edit_damage_report_date" name="damage_report_date" placeholder="Tanggal"
                                            required readonly />
                                        <div class="invalid-feedback">Tidak boleh kosong</div>
                                    </div>
                                    <div class="mb-1">
                                        <label for="note" class="form-label fw-medium">Scope</label>
                                        <input type="text" class="form-control add w-px-250" id="edit_scope"
                                            name="scope" placeholder="Scope" required readonly />
                                        <div class="invalid-feedback">Tidak boleh kosong</div>
                                    </div>
                                    <div class="mb-1">
                                        <label for="note" class="form-label fw-medium">Classification</label>
                                        <input type="text" class="form-control add w-px-250" id="edit_classification"
                                            name="classification" placeholder="Classification" required readonly />
                                        <div class="invalid-feedback">Tidak boleh kosong</div>
                                    </div>
                                    <div class="mb-1">
                                        <label for="note" class="form-label fw-medium">Action Plan Date</label>
                                        <input type="text" class="form-control add w-px-250"
                                            id="edit_action_plan_date" name="action_plan_date"
                                            placeholder="Action Plan Date" required readonly />
                                        <div class="invalid-feedback">Tidak boleh kosong</div>
                                    </div>
                                </div>
                                <div class="col-md-6 d-flex justify-content-end">
                                    <div class="div">
                                        Kepada Yth. <br>
                                        Dept. Service BM <br>
                                        PPKP GRAHA SURVEYOR INDONESIA <br>
                                        Jakarta
                                    </div>
                                </div>
                            </div>
                            <div class="py-3 px-3">
                                <div class="card academy-content shadow-none border p-3">
                                    <div class="repeater">
                                        <div class="" data-repeater-list="group-a">
                                            <div class="repeater-wrapper " data-repeater-item>
                                                <div class="row mb-3">
                                                    <div class="col-4">
                                                        <label for="note" class="form-label fw-medium">Jenis Masalah
                                                            Kerusakan</label>
                                                        <input type="text" class="form-control" id="edit_category"
                                                            name="category" placeholder="Jenis Masalah Kerusakan"
                                                            required readonly />
                                                        <div class="invalid-feedback">Tidak boleh kosong</div>
                                                    </div>
                                                    <div class="col-4">
                                                        <label for="note" class="form-label fw-medium">Lokasi</label>
                                                        <input type="text" class="form-control" id="edit_location"
                                                            name="location" placeholder="Lokasi" required readonly />
                                                        <div class="invalid-feedback">Tidak boleh kosong</div>
                                                    </div>
                                                    <div class="col-4">
                                                        <label for="note" class="form-label fw-medium">Jumlah</label>
                                                        <input type="text" class="form-control" id="edit_total"
                                                            name="total" placeholder="Jumlah" required readonly />
                                                        <div class="invalid-feedback">Tidak boleh kosong</div>
                                                    </div>
                                                    {{-- <a class="mb-3 mx-2 mt-4" style="width: 10px" role="button"
                                                        data-repeater-delete>
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="12"
                                                            height="12" viewBox="0 0 12 12" fill="none">
                                                            <circle cx="6" cy="6" r="6" fill="#D9D9D9" />
                                                            <path
                                                                d="M6.70432 5.99276L8.85224 3.8544C8.9463 3.76053 8.99915 3.63323 8.99915 3.50049C8.99915 3.36775 8.9463 3.24045 8.85224 3.14659C8.75818 3.05273 8.63061 3 8.49759 3C8.36456 3 8.23699 3.05273 8.14293 3.14659L6 5.28994L3.85707 3.14659C3.76301 3.05273 3.63544 3 3.50241 3C3.36939 3 3.24182 3.05273 3.14776 3.14659C3.0537 3.24045 3.00085 3.36775 3.00085 3.50049C3.00085 3.63323 3.0537 3.76053 3.14776 3.8544L5.29568 5.99276L3.14776 8.13113C3.10094 8.17747 3.06378 8.23259 3.03842 8.29334C3.01306 8.35408 3 8.41923 3 8.48503C3 8.55083 3.01306 8.61598 3.03842 8.67672C3.06378 8.73746 3.10094 8.79259 3.14776 8.83893C3.19419 8.88565 3.24944 8.92273 3.31031 8.94804C3.37118 8.97335 3.43647 8.98637 3.50241 8.98637C3.56836 8.98637 3.63365 8.97335 3.69452 8.94804C3.75539 8.92273 3.81063 8.88565 3.85707 8.83893L6 6.69558L8.14293 8.83893C8.18937 8.88565 8.24461 8.92273 8.30548 8.94804C8.36635 8.97335 8.43164 8.98637 8.49759 8.98637C8.56353 8.98637 8.62882 8.97335 8.68969 8.94804C8.75056 8.92273 8.80581 8.88565 8.85224 8.83893C8.89906 8.79259 8.93622 8.73746 8.96158 8.67672C8.98694 8.61598 9 8.55083 9 8.48503C9 8.41923 8.98694 8.35408 8.96158 8.29334C8.93622 8.23259 8.89906 8.17747 8.85224 8.13113L6.70432 5.99276Z"
                                                                fill="#FF4747" />
                                                        </svg>
                                                    </a> --}}
                                                </div>
                                            </div>
                                        </div>



                                        {{-- <div class="row pb-4">
                                            <div class="col-12">
                                                <button type="button" class="btn btn-primary waves-effect waves-light"
                                                    data-repeater-create>Tambah Baris</button>
                                            </div>
                                        </div> --}}
                                    </div>


                                    <hr class="my-3">
                                    <div class="row  text-center mt-4">
                                        <div class="col-4 signatures">
                                            <div class="mb-3">
                                                <input type="text" class="form-control add"
                                                    placeholder="Jabatan" style="text-align:center;"
                                                    id="edit_type-1" name="type" required readonly />
                                                <div class="invalid-feedback">Tidak boleh kosong</div>
                                            </div>
                                            <div class="mb-3">
                                                <input type="text" class="form-control add "
                                                    placeholder="Nama" style="text-align:center;"
                                                    id="edit_name-1" name="name" required readonly />
                                                <div class="invalid-feedback">Tidak boleh kosong</div>
                                            </div>
                                            <div class="mb-3 prev-1">
                                                <div
                                                    class="dz-preview dz-processing dz-image-preview dz-success dz-complete">
                                                    <div class="dz-details">
                                                        <div class="dz-thumbnail"> <img class="prev-img-1" alt=""
                                                                src="">
                                                            <span class="dz-nopreview">No preview</span>
                                                        </div>
                                                    </div>
                                                        {{-- <a class="dz-remove" id="1" href="javascript:undefined;"
                                                            data-dz-remove="">Remove file</a> --}}
                                                </div>
                                            </div>
                                            <div class="mb-3 click-1" style="display: none">
                                                <form action="/upload" class="dropzone needsclick dz-clickable w-px-230"
                                                    id="dropzone-1">
                                                    <div class="dz-message needsclick">
                                                        <span class="note needsclick">Unggah Tanda Tangan</span>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="mb-3">
                                                <input type="text" class="form-control add" placeholder="Tanggal"
                                                    style="text-align:center;" id="edit_date-1" name="date"
                                                    required readonly />
                                                <div class="invalid-feedback">Tidak boleh kosong</div>
                                            </div>
                                        </div>
                                        <div class="col-4 signatures">
                                            <div class="mb-3">
                                                <input type="text" class="form-control add"
                                                    placeholder="Jabatan" style="text-align:center;"
                                                    id="edit_type-2" name="type" required readonly />
                                                <div class="invalid-feedback">Tidak boleh kosong</div>
                                            </div>
                                            <div class="mb-3">
                                                <input type="text" class="form-control add "
                                                    placeholder="Nama" style="text-align:center;"
                                                    id="edit_name-2" name="name" required readonly />
                                                <div class="invalid-feedback">Tidak boleh kosong</div>
                                            </div>
                                            <div class="mb-3 prev-2">
                                                <div
                                                    class="dz-preview dz-processing dz-image-preview dz-success dz-complete">
                                                    <div class="dz-details">
                                                        <div class="dz-thumbnail"> <img class="prev-img-2" alt=""
                                                                src="">
                                                            <span class="dz-nopreview">No preview</span>
                                                        </div>
                                                    </div>
                                                    {{-- <a class="dz-remove" id="2"
                                                        href="javascript:undefined;" data-dz-remove="">Remove
                                                        file</a> --}}
                                                </div>
                                            </div>
                                            <div class="mb-3 click-2" style="display: none">
                                                <form action="/upload" class="dropzone needsclick dz-clickable w-px-230"
                                                    id="dropzone-2">
                                                    <div class="dz-message needsclick">
                                                        <span class="note needsclick">Unggah Tanda Tangan</span>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="mb-3">
                                                <input type="text" class="form-control add" placeholder="Tanggal"
                                                    style="text-align:center;" id="edit_date-2" name="date"
                                                    required readonly />
                                                <div class="invalid-feedback">Tidak boleh kosong</div>
                                            </div>
                                        </div>
                                        <div class="col-4 signatures">
                                            <div class="mb-3">
                                                <input type="text" class="form-control add"
                                                    placeholder="Jabatan" style="text-align:center;"
                                                    id="edit_type-3" name="type" required readonly />
                                                <div class="invalid-feedback">Tidak boleh kosong</div>
                                            </div>
                                            <div class="mb-3">
                                                <input type="text" class="form-control add "
                                                    placeholder="Nama" style="text-align:center;"
                                                    id="edit_name-3" name="name" required readonly />
                                                <div class="invalid-feedback">Tidak boleh kosong</div>
                                            </div>
                                            <div class="mb-3 prev-3">
                                                <div
                                                    class="dz-preview dz-processing dz-image-preview dz-success dz-complete">
                                                    <div class="dz-details">
                                                        <div class="dz-thumbnail"> <img class="prev-img-3" alt=""
                                                                src="">
                                                            <span class="dz-nopreview">No preview</span>
                                                        </div>
                                                    </div>
                                                    {{-- <a class="dz-remove" id="3"
                                                        href="javascript:undefined;" data-dz-remove="">Remove
                                                        file</a> --}}
                                                </div>
                                            </div>
                                            <div class="mb-3 click-3" style="display: none">
                                                <form action="/upload" class="dropzone needsclick dz-clickable w-px-230"
                                                    id="dropzone-3">
                                                    <div class="dz-message needsclick">
                                                        <span class="note needsclick">Unggah Tanda Tangan</span>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="mb-3">
                                                <input type="text" class="form-control add" placeholder="Tanggal"
                                                    style="text-align:center;" id="edit_date-3" name="date"
                                                    required readonly />
                                                <div class="invalid-feedback">Tidak boleh kosong</div>
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
                            {{-- <button type="submit" id="edit"
                                class="btn btn-primary d-grid w-100 mb-2">Update</button> --}}
                            {{-- <a href="https://demos.pixinvent.com/vuexy-html-laravel-admin-template/demo-1/app/invoice/preview"
                                class="btn btn-label-secondary d-grid w-100 mb-2">Preview</a> --}}
                            <button type="button" class="btn btn-label-secondary d-grid w-100 mb-2 btn-edit">Edit Laporan Kerusakan</button>
                            <button type="button" class="btn btn-label-secondary btn-cancel d-grid w-100">Batal</button>
                        </div>
                    </div>
                </div>
                <!-- /Invoice Actions -->
            </div>
        </form>


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
    <script src="{{ asset('assets/vendor/libs/dropzone/dropzone.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/sweetalert2/sweetalert2.js') }}"></script>
    <script src="{{ asset('assets/js/forms-file-upload.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/jquery-repeater/jquery-repeater.js') }}"></script>
    <script
        src="https://demos.pixinvent.com/vuexy-html-laravel-admin-template/demo/assets/vendor/libs/flatpickr/flatpickr.js">
    </script>
    <script src="https://demos.pixinvent.com/vuexy-html-laravel-admin-template/demo/assets/vendor/libs/moment/moment.js">
    </script>
    <script>
        $(document).ready(function() {
            $('.repeater').repeater({

            })
            var sweet_loader = `<div class="spinner-border mb-8 text-primary" style="width: 5rem; height: 5rem;" role="status">
                                    <span class="sr-only">Loading...</span>
                                </div>`;

            // Mendapatkan id dengan cara mengambil dari URL
            var urlSegments = window.location.pathname.split('/');
            var idIndex = urlSegments.indexOf('show') + 1;
            var id = urlSegments[idIndex];

            getDataLaporanKerusakan(id)

            // Get data from API
            function getDataLaporanKerusakan(id) {
                Swal.fire({
                    title: '<h2>Loading...</h2>',
                    html: sweet_loader + '<h5>Please Wait</h5>',
                    showConfirmButton: false,
                    allowOutsideClick: false,
                    allowEscapeKey: false
                })
                $.ajax({
                    url: "{{ env('BASE_URL_API')}}" +'/api/damage-report/' + id,
                    type: "GET",
                    dataType: "json",
                    success: function(res) {
                        let response = res.data;
                        $('.btn-edit').attr('data-id', id);
                        // Set value ke form atas
                        $('#editLaporanKerusakan').find('.form-control').each(function() {
                            $("#" + $(this).attr('id')).val(response[$(this).attr(
                                "name")]);
                        });
                        $('#edit_damage_report_date').val(moment(response.damage_report_date,
                            'YYYY-MM-DD').format('DD-MM-YYYY'));
                        $('#edit_action_plan_date').val(moment(response.action_plan_date, 'YYYY-MM-DD')
                            .format('DD-MM-YYYY'));
                        $(".select-ticket").empty().append('<option value="' + response.ticket_id +
                                '">' + response.ticket_id + '</option>').val(response.ticket_id);
                        localStorage.setItem('status', response.status);

                        // Set value ke repeater
                        var firstRow = $('.repeater-wrapper').first();

                        for (var i = 0; i < response.damage_report_details.length; i++) {
                            var rowValues = response.damage_report_details[i];

                            if (i === 0) {
                                firstRow.find('#edit_category').val(rowValues.category);
                                firstRow.find('#edit_location').val(rowValues.location);
                                firstRow.find('#edit_total').val(rowValues.total);
                            } else {
                                var newRow = firstRow.clone();
                                newRow.find('#edit_category').val(rowValues.category);
                                newRow.find('#edit_location').val(rowValues.location);
                                newRow.find('#edit_total').val(rowValues.total);

                                $('.repeater [data-repeater-list="group-a"]').append(newRow);
                            }
                        }

                        $('.repeater').repeater();

                        // Set value ke form signature
                        for (let i = 1; i < response.damage_report_signatures.length + 1; i++) {
                            $("#edit_type-" + i).val(response.damage_report_signatures[i - 1].type);
                            $("#edit_name-" + i).val(response.damage_report_signatures[i - 1].name);
                            if (response.damage_report_signatures[i - 1].signature != '') {
                                $('.prev-img-' + i).attr('src', response.damage_report_signatures[i - 1]
                                    .signature);
                            } else {
                                $('.dz-nopreview').css('display', 'block');
                            }
                            $('#edit_date-' + i).val(moment(response.damage_report_signatures[i - 1]
                                .date, 'YYYY-MM-DD').format('DD-MM-YYYY'));
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

            // Button edit
            $(".btn-edit").on('click', function() {
                // Mendapatkan nilai data-id dari button yang diklik
                var id = $(this).data('id');

                // Membentuk URL dengan nilai id
                var url = window.location.href.replace(/\/preview\/\d+$/, '/edit/' + id);

                // Menggantikan URL saat ini dengan URL yang sudah dibentuk
                window.location.replace(url);
            });

            // Date
            $('.date').flatpickr({
                dateFormat: 'd-m-Y'
            });
            
            // Cancel
            $(".btn-cancel").on("click", function() {
                window.location.href = "/complain/laporan-kerusakan"
            })

            // Select2
            $('.select-ticket').on("change", (async function(e) {
                $(this).removeClass("is-invalid");
            }));
        });
    </script>
@endsection
