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
                                    <input type="text" class="form-control mx-auto"
                                        id="edit_damage_report_number" name="damage_report_number" placeholder="Nomor LK"
                                        required />
                                    <div class="invalid-feedback mx-auto w-px-250">Tidak boleh kosong</div>
                                </div>
                            </div>
                            <hr class="my-3 mx-n4">

                            <div class="row py-3 px-3">
                                <div class="col-md-4 mb-md-0 mb-3">
                                    <div class="mb-1 w-px-250">
                                        <label for="note" class="form-label fw-medium">No Tiket </label>
                                        <select class="form-select select2 w-px-250 select-ticket item-details mb-3"
                                            required>
                                        </select>
                                        <div class="invalid-feedback">Tidak boleh kosong</div>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-md-0 mb-3">
                                    <div class="mb-1">
                                        <label for="note" class="form-label fw-medium">Date</label>
                                        <input type="text" class="form-control date"
                                            id="edit_damage_report_date" name="damage_report_date" placeholder="Tanggal"
                                            required />
                                        <div class="invalid-feedback">Tidak boleh kosong</div>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-md-0 mb-3">
                                    <div class="mb-1">
                                        <label for="note" class="form-label fw-medium">Scope</label>
                                        <input type="text" class="form-control" id="edit_scope"
                                            name="scope" placeholder="Scope" required />
                                        <div class="invalid-feedback">Tidak boleh kosong</div>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-md-0 mb-3">
                                    <div class="mb-1">
                                        <label for="note" class="form-label fw-medium">Classification</label>
                                        <input type="text" class="form-control" id="edit_classification"
                                            name="classification" placeholder="Classification" required />
                                        <div class="invalid-feedback">Tidak boleh kosong</div>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-md-0 mb-3">
                                    <div class="mb-1">
                                        <label for="note" class="form-label fw-medium">Action Plan Date</label>
                                        <input type="text" class="form-control date"
                                            id="edit_action_plan_date" name="action_plan_date"
                                            placeholder="Action Plan Date" required />
                                        <div class="invalid-feedback">Tidak boleh kosong</div>
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
                                                            required />
                                                        <div class="invalid-feedback">Tidak boleh kosong</div>
                                                    </div>
                                                    <div class="col-4">
                                                        <label for="note" class="form-label fw-medium">Lokasi</label>
                                                        <input type="text" class="form-control" id="edit_location"
                                                            name="location" placeholder="Lokasi" required />
                                                        <div class="invalid-feedback">Tidak boleh kosong</div>
                                                    </div>
                                                    <div class="col-3">
                                                        <label for="note" class="form-label fw-medium">Jumlah</label>
                                                        <input type="text" class="form-control qty" id="edit_total"
                                                            name="total" placeholder="Jumlah" required />
                                                        <div class="invalid-feedback">Tidak boleh kosong</div>
                                                    </div>
                                                    <a class="mb-3 mx-2 mt-4 btn btn-primary text-white edit-admin" style="width: 10px; height: 38px" role="button"
                                                        data-repeater-delete>
                                                        <i class="fas fa-trash"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>



                                        <div class="row pb-4">
                                            <div class="col-12">
                                                <button type="button" class="btn btn-primary waves-effect waves-light edit-admin"
                                                    data-repeater-create>Tambah Baris</button>
                                            </div>
                                        </div>
                                    </div>


                                    <hr class="my-3">
                                    <div class="row  text-center mt-4 signatures" id="ttd">
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
                            <button type="submit" id="edit"
                                class="btn btn-primary d-grid w-100 mb-2">Update</button>
                            <button class="btn btn-label-secondary d-grid w-100 mb-2 btn-preview">Preview</button>
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

            let account = {!! json_encode(session('data')) !!}
            var levelId = account.level_id;
            var department = account.department.name;
            var nameUser = account.name;
            let ttdFile1, ttdFile2, ttdFile3;

           
           
           
            // if (levelId == 2) { // KA
            //     var inputValue = $("#edit_type-1").val();
            //     if (inputValue.trim() === '') {
            //         $("#edit_type-1").val(department);
            //         $("#edit_name-1").val(nameUser);
            //     }
            //     $('#edit_type-1').prop('readonly', false);
            //     $('#edit_name-1').prop('readonly', false);
            //     $('#edit_date-1').prop('disabled', false);

            //     $('#edit_type-2').prop('readonly', true);
            //     $('#edit_name-2').prop('readonly', true);
            //     $('#edit_date-2').prop('disabled', true);

            //     $('#edit_type-3').prop('readonly', true);
            //     $('#edit_name-3').prop('readonly', true);
            //     $('#edit_date-3').prop('disabled', true);
            // } else if (levelId == 3) { // koor teknik
            //     var inputValue = $("#edit_type-2").val();
            //     if (inputValue.trim() === '') {
            //         $("#edit_type-2").val(department);
            //         $("#edit_name-2").val(nameUser);
            //     }
            //     $('#edit_type-1').prop('readonly', true);
            //     $('#edit_name-1').prop('readonly', true);
            //     $('#edit_date-1').prop('disabled', true);

            //     $('#edit_type-2').prop('readonly', false);
            //     $('#edit_name-2').prop('readonly', false);
            //     $('#edit_date-2').prop('disabled', false);

            //     $('#edit_type-3').prop('readonly', true);
            //     $('#edit_name-3').prop('readonly', true);
            //     $('#edit_date-3').prop('disabled', true);
            // } else if (levelId == 4) { // leader cleaning
            //     var inputValue = $("#edit_type-3").val();
            //     if (inputValue.trim() === '') {
            //         $("#edit_type-3").val(department);
            //         $("#edit_name-3").val(nameUser);
            //     }
            //     $('#edit_type-1').prop('readonly', true);
            //     $('#edit_name-1').prop('readonly', true);
            //     $('#edit_date-1').prop('disabled', true);

            //     $('#edit_type-2').prop('readonly', true);
            //     $('#edit_name-2').prop('readonly', true);
            //     $('#edit_date-2').prop('disabled', true);

            //     $('#edit_type-3').prop('readonly', false);
            //     $('#edit_name-3').prop('readonly', false);
            //     $('#edit_date-3').prop('disabled', false);
            // } else { //other
            //     $('#edit_type-1').prop('readonly', true);
            //     $('#edit_name-1').prop('readonly', true);
            //     $('#edit_date-1').prop('disabled', true);

            //     $('#edit_type-2').prop('readonly', true);
            //     $('#edit_name-2').prop('readonly', true);
            //     $('#edit_date-2').prop('disabled', true);

            //     $('#edit_type-3').prop('readonly', true);
            //     $('#edit_name-3').prop('readonly', true);
            //     $('#edit_date-3').prop('disabled', true);
            // }

            //  fungsi untuk money format
            $(document).on("keyup", ".qty", function(e){
                 $(this).val(format($(this).val()));
            });
            var format = function(num){
            var str = num.toString().replace("", ""), parts = false, output = [], i = 1, formatted = null;
            if(str.indexOf(".") > 0) {
                parts = str.split(".");
                str = parts[0];
            }
            str = str.split("").reverse();
            for(var j = 0, len = str.length; j < len; j++) {
                if(str[j] != ",") {
                output.push(str[j]);
                if(i%3 == 0 && j < (len - 1)) {
                    output.push(",");
                }
                i++;
                }
            }
            formatted = output.reverse().join("");
            return("" + formatted + ((parts) ? "." + parts[1].substr(0, 2) : ""));
            };
            
            // Mendapatkan id dengan cara mengambil dari URL
            var urlSegments = window.location.pathname.split('/');
            var idIndex = urlSegments.indexOf('edit') + 1;
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
                    url: "{{ env('BASE_URL_API')}}" +'/api/damage-report/'+ id,
                    type: "GET",
                    dataType: "json",
                    success: function(res) {
                        let response = res.data;
                        $('#editLaporanKerusakan').find('.form-control').each(function() {
                            $("#" + $(this).attr('id')).val(response[$(this).attr(
                                "name")]);
                        });
                        $('#edit_damage_report_date').val(moment(response.damage_report_date,
                            'YYYY-MM-DD').format('DD-MM-YYYY'));
                        $('#edit_action_plan_date').val(moment(response.action_plan_date, 'YYYY-MM-DD')
                            .format('DD-MM-YYYY'));
                        $(".select-ticket").empty().append('<option value="' + response.ticket_id +
                                '">' + response.ticket_id + '</option>').val(response.ticket_id)
                            .trigger("change");
                        localStorage.setItem('status', response.status);
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

                        let signatureKepalaUnitPelayanan, signatureKoordinatorTeknik, signatureLeaderCleaing;

                        for (let i = 0; i < response.damage_report_signatures.length; i++) {
                            if(details[i].type == 'Dilaporkan'){
                                signatureLeaderCleaing = details[i];
                            }else if(details[i].type == 'Diterima'){
                                signatureKoordinatorTeknik = details[i];
                            }else if(details[i].type == 'Mengetahui'){
                                signatureKepalaUnitPelayanan = details[i];
                            }
                        }

                        let htmlGetSignatureLeaderCleaning = getSignatureLeaderCleaning(signatureLeaderCleaing);
                        let htmlGetSignatureKoordinatorTeknik = getSignatureKoordinatorTeknik(signatureKoordinatorTeknik);
                        let htmlGignatureKepalaUnitPelayanan = getSignatureKepalaUnitPelayanan(signatureKepalaUnitPelayanan);

                        $('.signatures').html(htmlGetSignatureLeaderCleaning+htmlGetSignatureKoordinatorTeknik+htmlGignatureKepalaUnitPelayanan);
                        account.level.id == 4 ? dropzoneValue(signatureLeaderCleaing, '#ttd1'):'';
                        account.level.id == 3 ? dropzoneValue(signatureKoordinatorTeknik, '#ttd2'):'';
                        account.level.id == 2 ? dropzoneValue(signatureKepalaUnitPelayanan, '#ttd3'):'';
                        if(account.level.id != 10){
                            $('.edit-admin').addClass('d-none');
                        }

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
                        setDate();
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

            function dropzoneValue(value, id) {
                const myDropzone = new Dropzone(id, {
                    parallelUploads: 1,
                    maxFilesize: 3,
                    addRemoveLinks: true,
                    maxFiles: 1,
                    acceptedFiles: ".jpeg,.jpg,.png,.gif",
                    autoQueue: false,
                    url: "../uploads/logo",
                    thumbnailWidth: 250,
                    thumbnailHeight: null,
                    init: function() {
                        if (value) {
                            let mockFile = {
                                dataURL: value?.signature
                            };
                            this.options.addedfile.call(this, mockFile);
                            this.options.thumbnail.call(this, mockFile, value?.signature);
                            $('.dz-image').last().find('img').attr('width', '100%');
                            // Optional: Handle the removal of the file
                            mockFile.previewElement.querySelector(".dz-remove").addEventListener("click", function() {
                                // Handle removal logic here
                            });
                        }

                        this.on('addedfile', function(file) {
                            $('.dz-image').last().find('img').attr('width', '100%');
                            while (this.files.length > this.options.maxFiles) this.removeFile(this.files[0]);
                            if(id == '#ttd1'){
                                ttdFile1 = file;
                            }else if(id == '#ttd2'){
                                ttdFile2 = file;
                            }else if(id == '#ttd3'){
                                ttdFile3 = file;
                            }else if(id == '#ttd4'){
                                ttdFile4 = file;
                            }
                        })
                    }
                });
            }

            function getSignatureLeaderCleaning(value){
                let disablePrepared = 'disabled';
                let dropzonePrepared = '';
                let imagePrepared = '';
                let datePreparedAttr = '';
                let namePrepared = '';
                let datePrepared = '';
                if(account.level.id == '4'){
                    namePrepared = value?.name ? value.name : '';
                    datePrepared = value?.date ? value.date : '';
                    dropzonePrepared = 'dz-clickable';
                    namePrepared = account.name;
                    ttdFile1 = value?.signature;
                    imagePrepared = `
                    <div action="/upload" class="dropzone needsclick ${dropzonePrepared} dd" id="ttd1">
                        <div class="dz-message needsclick">
                            <span class="note needsclick">Unggah Tanda Tangan</span>
                        </div>
                    </div>
                    `;
                }else{
                    //sudah ttd
                    if(value){
                        namePrepared = value.name;
                        datePreparedAttr = 'disabled';
                        datePrepared = value.date ? value.date : '';
                        ttdFile1 = value?.signature;
                        imagePrepared = `<div id="leaderCleaning-image"></div>`+
                        '<script type="text/javascript">'+
                            '$("#leaderCleaning-image").css("background-color", "black");'+
                            '$("#leaderCleaning-image").css("background-image", "url('+value?.signature+')");'+
                            '$("#leaderCleaning-image").css("height", "200px");'+
                            '$("#leaderCleaning-image").css("width", "200px");'+
                            '$("#leaderCleaning-image").css("background-position", "center");'+
                            '$("#leaderCleaning-image").css("background-size", "cover");'+
                            '$("#leaderCleaning-image").css("background-repeat", "no-repeat");'+
                        '</'+'script>';
                    }else{//belum ttd
                        datePreparedAttr = 'disabled';
                        imagePrepared = `
                        <div action="/upload" class="dropzone needsclick ${dropzonePrepared} dd" id="ttd1">
                            <div class="dz-message needsclick">
                                <span class="note needsclick">Unggah Tanda Tangan</span>
                            </div>
                        </div>
                        `;
                    }
                }
                let appendPrepared = `
                    <div class="col-md-4">
                        <label for="note" class="form-label fw-medium mb-3">Dilaporkan :</label>
                        <div class="mb-3">
                            <input type="text" class="form-control ttd-row tanda-tangan" placeholder="Nama" style="text-align:center;" id="lc-name" name="name[]" value="${namePrepared ? namePrepared : ''}" ${datePreparedAttr} />
                        </div>
                        <div class="mb-3">
                            <input type="text" class="form-control ttd-row tanda-tangan" placeholder="Jabatan" style="text-align:center;" id="lc-jabatan" name="jabatan[]" value="Leader Cleaning" disabled />
                        </div>
                        <div class="mb-3">
                            ${imagePrepared}
                        </div>
                        <div class="mb-3">
                            <input type="text" class="form-control date ttd-row tanda-tangan" placeholder="Tanggal" style="text-align:center;" id="lc-date" name="name[]" value="${datePrepared ? datePrepared : ''}" ${datePreparedAttr}/>
                        </div>
                    </div>
                `;
                return appendPrepared;
            }

            function getSignatureKoordinatorTeknik(value){
                let disableReviewed = 'disabled';
                let dropzoneReviewed = '';
                let imageReviewed = '';
                let dateReviewedAttr = '';
                let nameReviewed = '';
                let dateReviewed = '';
                if(account.level.id == '3'){
                    nameReviewed = value?.name ? value.name : '';
                    dateReviewed = value?.date ? value.date : '';
                    dropzoneReviewed = 'dz-clickable';
                    nameReviewed = account.name;
                    ttdFile2 = value?.signature;
                    imageReviewed = `
                    <div action="/upload" class="dropzone needsclick ${dropzoneReviewed} dd" id="ttd2">
                        <div class="dz-message needsclick">
                            <span class="note needsclick">Unggah Tanda Tangan</span>
                        </div>
                    </div>
                    `;
                    //tanda tangannya ada maka tampoilkan seperti edit kepala bm invoice
                }else{
                    //sudah ttd
                    if(value){
                        nameReviewed = value.name;
                        dateReviewedAttr = 'disabled';
                        ttdFile2 = value?.signature;
                        dateReviewed = value?.date ? value.date : '';
                        imageReviewed = `<div id="koordinatorTeknik-image"></div>`+
                        '<script type="text/javascript">'+
                            '$("#koordinatorTeknik-image").css("background-color", "black");'+
                            '$("#koordinatorTeknik-image").css("background-image", "url('+value?.signature+')");'+
                            '$("#koordinatorTeknik-image").css("height", "200px");'+
                            '$("#koordinatorTeknik-image").css("width", "200px");'+
                            '$("#koordinatorTeknik-image").css("background-position", "center");'+
                            '$("#koordinatorTeknik-image").css("background-size", "cover");'+
                            '$("#koordinatorTeknik-image").css("background-repeat", "no-repeat");'+
                        '</'+'script>';
                    }else{//belum ttd
                        dateReviewedAttr = 'disabled';
                        imageReviewed = `
                        <div action="/upload" class="dropzone needsclick ${dropzoneReviewed} dd" id="ttd2">
                            <div class="dz-message needsclick">
                                <span class="note needsclick">Unggah Tanda Tangan</span>
                            </div>
                        </div>
                        `;
                    }
                }
                let appendReviewed = `
                    <div class="col-md-4">
                        <label for="note" class="form-label fw-medium mb-3">Diterima :</label>
                        <div class="mb-3">
                            <input type="text" class="form-control ttd-row tanda-tangan" placeholder="Nama" style="text-align:center;" id="kt-name" name="name[]" value="${nameReviewed ? nameReviewed : ''}" ${dateReviewedAttr} />
                        </div>
                        <div class="mb-3">
                            <input type="text" class="form-control ttd-row tanda-tangan" placeholder="Jabatan" style="text-align:center;" id="kt-jabatan" name="jabatan[]" value="Koordinator Teknik" disabled />
                        </div>
                        <div class="mb-3">
                            ${imageReviewed}
                        </div>
                        <div class="mb-3">
                            <input type="text" class="form-control date ttd-row tanda-tangan" placeholder="Tanggal" style="text-align:center;" id="kt-date" name="name[]" value="${dateReviewed ? dateReviewed : ''}" ${dateReviewedAttr}/>
                        </div>
                    </div>
                `;
                return appendReviewed;
            }

            function getSignatureKepalaUnitPelayanan(value){
                let disableAknowledge = 'disabled';
                let dropzoneAknowledge = '';
                let imageAknowledge = '';
                let dateAknowledgeAttr = '';
                let nameAknowledge = '';
                let dateAknowledge = '';
                if(account.level.id == '2'){
                    nameAknowledge = value?.name ? value.name : '';
                    dateAknowledge = value?.date ? value.date : '';
                    dropzoneAknowledge = 'dz-clickable';
                    nameAknowledge = account.name;
                    ttdFile3 = value?.signature;
                    imageAknowledge = `
                    <div action="/upload" class="dropzone needsclick ${dropzoneAknowledge} dd" id="ttd3">
                        <div class="dz-message needsclick">
                            <span class="note needsclick">Unggah Tanda Tangan</span>
                        </div>
                    </div>
                    `;
                }else{
                    //sudah ttd
                    if(value){
                        nameAknowledge = value.name;
                        dateAknowledgeAttr = 'disabled';
                        dateAknowledge = value.date ? value.date : '';
                        ttdFile3 = value?.signature;
                        nameAknowledge = account.name;
                        imageAknowledge = `<div id="kepalaUnitPelayanan-image"></div>`+
                        '<script type="text/javascript">'+
                            '$("#kepalaUnitPelayanan-image").css("background-color", "black");'+
                            '$("#kepalaUnitPelayanan-image").css("background-image", "url('+value?.signature+')");'+
                            '$("#kepalaUnitPelayanan-image").css("height", "200px");'+
                            '$("#kepalaUnitPelayanan-image").css("width", "200px");'+
                            '$("#kepalaUnitPelayanan-image").css("background-position", "center");'+
                            '$("#kepalaUnitPelayanan-image").css("background-size", "cover");'+
                            '$("#kepalaUnitPelayanan-image").css("background-repeat", "no-repeat");'+
                        '</'+'script>';
                    }else{//belum ttd
                        dateAknowledgeAttr = 'disabled';
                        imageAknowledge = `
                        <div action="/upload" class="dropzone needsclick ${dropzoneAknowledge} dd" id="ttd3">
                            <div class="dz-message needsclick">
                                <span class="note needsclick">Unggah Tanda Tangan</span>
                            </div>
                        </div>
                        `;
                    }
                }

                let appendAknowledge = `
                    <div class="col-md-4">
                        <label for="note" class="form-label fw-medium mb-3">Mengetahui :</label>
                        <div class="mb-3">
                            <input type="text" class="form-control ttd-row tanda-tangan" placeholder="Nama" style="text-align:center;" id="ka-name" name="name[]" value="${nameAknowledge ? nameAknowledge : ''}" ${dateAknowledgeAttr} />
                        </div>
                        <div class="mb-3">
                            <input type="text" class="form-control ttd-row tanda-tangan" placeholder="Jabatan" style="text-align:center;" id="ka-jabatan" name="jabatan[]" value="Kepala Unit Pelayanan" disabled />
                        </div>
                        <div class="mb-3">
                            ${imageAknowledge}
                        </div>
                        <div class="mb-3">
                            <input type="text" class="form-control date ttd-row tanda-tangan" placeholder="Tanggal" style="text-align:center;" id="ka-date" name="name[]" value="${dateAknowledge ? dateAknowledge : ''}" ${dateAknowledgeAttr}/>
                        </div>
                    </div>
                `;
                return appendAknowledge;
            }

            // Date
            setDate();
            function setDate() {
                $('.date').flatpickr({
                    dateFormat: 'Y-m-d'
                });

                const flatPickrEL = $(".date");
                if (flatPickrEL.length) {
                    flatPickrEL.flatpickr({
                        allowInput: true,
                        monthSelectorType: "static",
                        dateFormat: 'Y-m-d'
                    });
                }
            }

            // Fungsi untuk mengambil value dari setiap baris
            function getRepeaterValues() {
                var values = [];

                $('.repeater-wrapper').each(function() {
                    var rowValues = {
                        category: $(this).find('#edit_category').val(),
                        location: $(this).find('#edit_location').val(),
                        total: parseInt($(this).find('#edit_total').val()) || 0
                    };

                    values.push(rowValues);
                });

                return values;
            }

            // let ttdFile1 = null;
            // const myDropzone1 = new Dropzone('#dropzone-1', {
            //     parallelUploads: 1,
            //     maxFilesize: 10,
            //     addRemoveLinks: true,
            //     maxFiles: 1,
            //     acceptedFiles: ".jpeg,.jpg,.png",
            //     autoQueue: false,
            //     init: function() {
            //         this.on('addedfile', function(file) {
            //             while (this.files.length > this.options.maxFiles) this.removeFile(this
            //                 .files[0]);
            //             ttdFile1 = file;
            //         });
            //     }
            // });

            // let ttdFile2 = null;
            // const myDropzone2 = new Dropzone('#dropzone-2', {
            //     parallelUploads: 1,
            //     maxFilesize: 10,
            //     addRemoveLinks: true,
            //     maxFiles: 1,
            //     acceptedFiles: ".jpeg,.jpg,.png",
            //     autoQueue: false,
            //     init: function() {
            //         this.on('addedfile', function(file) {
            //             while (this.files.length > this.options.maxFiles) this.removeFile(this
            //                 .files[0]);
            //             ttdFile2 = file;
            //         });
            //     }
            // });

            // let ttdFile3 = null;
            // const myDropzone3 = new Dropzone('#dropzone-3', {
            //     parallelUploads: 1,
            //     maxFilesize: 10,
            //     addRemoveLinks: true,
            //     maxFiles: 1,
            //     acceptedFiles: ".jpeg,.jpg,.png",
            //     autoQueue: false,
            //     init: function() {
            //         this.on('addedfile', function(file) {
            //             while (this.files.length > this.options.maxFiles) this.removeFile(this
            //                 .files[0]);
            //             ttdFile3 = file;
            //         });
            //     }
            // });

            // Create, Save, dan Insert
            var editlk = $('.edit-lk');

            Array.prototype.slice.call(editlk).forEach(function(form) {
                $('.indicator-progress').hide();
                $('.indicator-label').show();
                form.addEventListener(
                    "submit",
                    function(event) {
                        if (!form.checkValidity()) {
                            event.preventDefault();
                            event.stopPropagation();

                            let damageReportNumber = $("#damage_report_number").val();
                            let ticketNumber = $(".select-ticket").val();
                            let receiptDate = $("#damage_report_date").val();
                            let actionDate = $("#action_plan_date").val();
                            let scope = $("#scope").val();
                            let classification = $("#classification").val();

                            if (!ticketNumber) {
                                $(".select-ticket").addClass("invalid");
                            }
                        } else {
                            event.preventDefault();
                            Swal.fire({
                                title: 'Loading...',
                                text: "Please wait",
                                customClass: {
                                    confirmButton: 'd-none'
                                },
                                buttonsStyling: false
                            });
                            try {
                                let ticket = $('.select-ticket').val();
                                let datas = {}
                                let signatures = []

                                $('#editLaporanKerusakan').find('.add').each(function() {
                                    var inputId = $(this).attr('id');
                                    var inputValue = $("#" + inputId).val();

                                    if (inputId === 'grand_total' || inputId === 'paid' ||
                                        inputId ===
                                        'remaining') {
                                        datas[$("#" + inputId).attr("name")] = parseInt(inputValue,
                                            10);
                                    } else if (inputId === 'edit_damage_report_date' || inputId ===
                                        'edit_action_plan_date') {
                                        datas[$("#" + inputId).attr("name")] = moment(inputValue,
                                            'D-M-YYYY').format('YYYY-MM-DD');
                                    } else {
                                        datas[$("#" + inputId).attr("name")] = inputValue;
                                    }
                                });

                                datas.details = getRepeaterValues();

                                var allValues = getRepeaterValues();
                                datas.ticket_id = ticket;
                                let scope = $("#edit_scope").val().toString();
                                let classification = $("#edit_classification").val().toString();
                                let signature = [];
                                if(account.level.id == '4'){
                                    datas.status = 'disetujui LC';
                                }else if(account.level.id == '3'){
                                    datas.status = 'disetujui KT';
                                }else if(account.level.id == '2'){
                                    datas.status = 'disetui KA';
                                }

                                if($.type(ttdFile1) == 'object'){
                                    ttdFile1 = ttdFile1.dataURL;
                                }

                                if($.type(ttdFile2) == 'object'){
                                    ttdFile2 = ttdFile2.dataURL;
                                }

                                if($.type(ttdFile3) == 'object'){
                                    ttdFile3 = ttdFile3.dataURL;
                                }

                                let signature1 = {};
                                if(ttdFile1 != undefined){
                                    signature1.type = 'Dilaporkan';
                                    signature1.name = $('#lc-name').val();
                                    signature1.date = $('#lc-date').val();
                                    signature1.signature = ttdFile1;
                                }

                                let signature2 = {};
                                if(ttdFile2 != undefined){
                                    signature2.type = 'Diterima';
                                    signature2.name = $('#kt-name').val();
                                    signature2.date = $('#kt-date').val();
                                    signature2.signature = ttdFile2;
                                }

                                let signature3 = {};
                                if(ttdFile3 != undefined){
                                    signature3.type = 'Mengetahui';
                                    signature3.name = $('#ka-name').val();
                                    signature3.date = $('#ka-date').val();
                                    signature3.signature = ttdFile3;
                                }

                                if (!isEmptyObject(signature1)) {
                                    signature.push(signature1);
                                }

                                // Validasi dan tambahkan data dari b ke signature
                                if (!isEmptyObject(signature2)) {
                                    signature.push(signature2);
                                }

                                if (!isEmptyObject(signature3)) {
                                    signature.push(signature3);
                                }

                                function isEmptyObject(obj) {
                                    return Object.keys(obj).length === 0;
                                }
                                datas.signatures = signature;
                                console.log(datas);
                            } catch (error) {
                                // Code to handle the error
                                console.error("An error occurred:", error.message);
                            }
                            
                            // $.ajax({
                            //     url: "{{ env('BASE_URL_API')}}" +'/api/damage-report/'+ id,
                            //     type: "PATCH",
                            //     data: JSON.stringify(datas),
                            //     contentType: "application/json; charset=utf-8",
                            //     dataType: "json",

                            //     success: function(response) {
                            //         $('.indicator-progress').show();
                            //         $('.indicator-label').hide();

                            //         Swal.fire({
                            //             title: 'Berhasil',
                            //             text: 'Berhasil menambahkan Laporan Kerusakan.',
                            //             icon: 'success',
                            //             customClass: {
                            //                 confirmButton: 'btn btn-primary'
                            //             },
                            //             buttonsStyling: false
                            //         })

                            //         window.location.href = "/complain/laporan-kerusakan"
                            //     },
                            //     error: function(xhr, status, error) {
                            //         Swal.fire({
                            //             title: 'Error!',
                            //             text: xhr.responseJSON.message,
                            //             icon: 'error',
                            //             customClass: {
                            //                 confirmButton: 'btn btn-primary'
                            //             },
                            //             buttonsStyling: false
                            //         })
                            //     }
                            // });
                        }

                        form.classList.add("was-validated");
                    },
                    false
                );
            });

            // Preview before save
            $(".btn-preview").on('click', function() {
                let ticket = $('.select-ticket').val();
                let datas = {}
                let signatures = []
                let status_cur = localStorage.getItem("status");

                $('#editLaporanKerusakan').find('.add').each(function() {
                    var inputId = $(this).attr('id');
                    var inputValue = $("#" + inputId).val();

                    if (inputId === 'grand_total' || inputId === 'paid' ||
                        inputId ===
                        'remaining') {
                        datas[$("#" + inputId).attr("name")] = parseInt(inputValue,
                            10);
                    } else if (inputId === 'edit_damage_report_date' || inputId ===
                        'edit_action_plan_date') {
                        datas[$("#" + inputId).attr("name")] = moment(inputValue,
                            'D-M-YYYY').format('YYYY-MM-DD');
                    } else {
                        datas[$("#" + inputId).attr("name")] = inputValue;
                    }
                });

                datas.details = getRepeaterValues();

                $('.signatures').each(function(index) {
                    let signature = {};

                    $(this).find('.form-control').each(function() {
                        var inputId = $(this).attr('id');
                        var inputValue = $("#" + inputId).val();

                        if (inputId.startsWith('edit_date')) {
                            signature[$("#" + inputId).attr("name")] =
                                moment(inputValue, 'D-M-YYYY')
                                .format('YYYY-MM-DD');
                        } else {
                            signature[$("#" + inputId).attr("name")] =
                                inputValue;
                        }
                    });
                    if ($('.prev-img-' + (index + 1)).attr("src") != '') {
                        signature['signature'] = $('.prev-img-' + (index + 1)).attr(
                            "src");
                    }
                    signatures.push(signature);
                });

                var allValues = getRepeaterValues();
                datas.ticket_id = ticket;
                datas.signatures = signatures;
                datas.status = status_cur;

                localStorage.setItem('damage-report', JSON.stringify(datas));
                window.location.href = "/complain/laporan-kerusakan/show";
            })

            // Cancel
            $(".btn-cancel").on("click", function() {
                window.location.href = "/complain/laporan-kerusakan"
            })

            // Select2
            $(".select-ticket").select2({
                placeholder: 'Select Ticket',
                allowClear: true,
                ajax: {
                    url: "{{ env('BASE_URL_API')}}" +'/api/ticket/select',
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

            $('.select-ticket').on("change", (async function(e) {
                $(this).removeClass("is-invalid");
            }));
        });
    </script>
@endsection
