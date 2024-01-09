@php
$configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Invoice')

@section('page-style')
{{-- Page Css files --}}
<link rel="stylesheet" href="{{asset('assets/vendor/libs/select2/select2.css')}}">
<link rel="stylesheet" href="{{asset('assets/vendor/libs/flatpickr/flatpickr.css')}}">
<link rel="stylesheet" href="{{asset('assets/vendor/libs/sweetalert2/sweetalert2.css')}}">
@endsection

@section('content')
<!-- Content -->
<div class="container-xxl flex-grow-1 container-p-y">
    <form id="create-material-request" class="create-material-request" novalidate>
        <div class="row invoice-add">
            <!-- Invoice Add-->
            <div class="col-lg-9 col-12 mb-lg-0 mb-3">
                <div class="card invoice-preview-card">
                    <div class="card-body">
                        <div class="row m-sm-4 m-0">
                            <h1 class="text-center"><b>MATERIAL REQUEST</b></h1>
                        </div>

                        <div class="row py-3 px-3">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="note" class="form-label fw-medium">Requester</label>
                                    <input type="text" class="form-control" placeholder="Requester" name="requester" id="requester" required />
                                    <div class="invalid-feedback">Tidak boleh kosong</div>
                                </div>
                                <div class="mb-3">
                                    <label for="note" class="form-label fw-medium">Departement </label>
                                    <input type="text" class="form-control" placeholder="Departement" name="department" id="department" required />
                                    <div class="invalid-feedback">Tidak boleh kosong</div>
                                </div>
                                <div class="mb-3">
                                    <label for="note" class="form-label fw-medium">Stock </label>
                                    <input type="number" class="form-control" placeholder="Stock" id="stock" name="stock" required />
                                    <div class="invalid-feedback">Tidak boleh kosong</div>
                                </div>
                                <div class="mb-3">
                                    <label for="note" class="form-label fw-medium">Purchase </label>
                                    <input type="text" class="form-control" placeholder="Purchase" name="purchase" id="purchase" required />
                                    <div class="invalid-feedback">Tidak boleh kosong</div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="note" class="form-label fw-medium">Tanggal</label>
                                    <input type="text" class="form-control date" placeholder="Tanggal" name="request_date" id="request_date" required />
                                    <div class="invalid-feedback">Tidak boleh kosong</div>
                                </div>
                                <div class="mb-3">
                                    <textarea class="form-control" rows="6" id="note" name="note" placeholder="Catatan" required></textarea>
                                    <div class="invalid-feedback">Tidak boleh kosong</div>
                                </div>
                            </div>
                        </div>

                        <div class="py-3 px-3">
                            <div class="card academy-content shadow-none border p-3">
                                <div class="">
                                    <div class="">
                                        <div class="" id="details">

                                        </div>
                                    </div>

                                    <div class="row pb-4">
                                        <div class="col-12">
                                            <button type="button" class="btn btn-primary waves-effect waves-light btn-add-row-mg">Tambah Baris</button>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-md-3">
                                        <label for="note" class="form-label fw-medium mb-3">Prepered by :</label>
                                        <div class="mb-3">
                                            <input type="text" class="form-control ttd-row" placeholder="Nama & Jabatan" style="text-align:center;" id="name" name="name[]" />
                                        </div>
                                        <div class="mb-3">
                                            <div action="/upload" class="dropzone needsclick dz-clickable dd" id="ttd1" style="padding: 5px;">
                                                <div class="dz-message needsclick">
                                                    <span class="note needsclick">Unggah Tanda Tangan</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <input type="text" class="form-control date ttd-row" placeholder="Tanggal" style="text-align:center;" id="date" name="date[]" />
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="note" class="form-label fw-medium mb-3">Reviewed by :</label>
                                        <div class="mb-3">
                                            <input type="text" class="form-control ttd-row" placeholder="Nama & Jabatan" style="text-align:center;" id="name" name="name[]" />
                                        </div>
                                        <div class="mb-3">
                                            <div action="/upload" class="dropzone needsclick dz-clickable dd" id="ttd2" style="padding: 5px;">
                                                <div class="dz-message needsclick">
                                                    <span class="note needsclick">Unggah Tanda Tangan</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <input type="text" class="form-control date ttd-row" placeholder="Tanggal" style="text-align:center;" id="date" name="name[]" />
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="note" class="form-label fw-medium mb-3">Aknowledge by :</label>
                                        <div class="mb-3">
                                            <input type="text" class="form-control ttd-row" placeholder="Nama & Jabatan" style="text-align:center;" id="date" name="name[]" />
                                        </div>
                                        <div class="mb-3">
                                            <div action="/upload" class="dropzone needsclick dz-clickable dd" id="ttd3" style="padding: 5px;">
                                                <div class="dz-message needsclick">
                                                    <span class="note needsclick">Unggah Tanda Tangan</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <input type="text" class="form-control date ttd-row" placeholder="Tanggal" style="text-align:center;" id="date" name="date[]" />
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="note" class="form-label fw-medium mb-3">Approved by :</label>
                                        <div class="mb-3">
                                            <input type="text" class="form-control ttd-row" placeholder="Nama & Jabatan" style="text-align:center;" id="name" name="name[]" />
                                        </div>
                                        <div class="mb-3">
                                            <div action="/upload" class="dropzone needsclick dz-clickable dd" id="ttd4" style="padding: 5px;">
                                                <div class="dz-message needsclick">
                                                    <span class="note needsclick">Unggah Tanda Tangan</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <input type="text" class="form-control date ttd-row" placeholder="Tanggal" style="text-align:center;" id="date" name="date[]" />
                                        </div>
                                    </div>
                                </div>



                                <div class="row">
                                    <div class="col-md-2">
                                        <span>Lembar</span>
                                    </div>
                                    <div class="col-md-4">
                                        <span>1. Accounting (Putih)</span>
                                        <br>
                                        <span>2. Guddang (Merah)</span>
                                    </div>
                                    <br>
                                    <div class="col-md-4">
                                        <span>3. Purchasing (Hijau)</span>
                                        <br>
                                        <span>4. Pemohon (Biru)</span>
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
                        <button class="btn btn-primary d-grid w-100 mb-2" data-bs-toggle="offcanvas" data-bs-target="#sendInvoiceOffcanvas">
                            <span class="d-flex align-items-center justify-content-center text-nowrap"><i class="ti ti-send ti-xs me-2"></i>Kirim Invoice</span>
                        </button>
                        <button type="button" id="preview" class="btn btn-label-secondary d-grid w-100 mb-2">Preview</button>
                        <button type="submit" id="save" class="btn btn-label-secondary d-grid w-100 mb-2">Simpan</button>
                        <button type="button" id="batal" class="btn btn-label-secondary d-grid w-100">Batal</button>
                    </div>
                </div>
            </div>
            <!-- /Invoice Actions -->
        </div>
    </form>


    <!-- Offcanvas -->
    <!-- Send Invoice Sidebar -->


</div>
<!-- / Content -->

@endsection

@section('page-script')
<script src="{{asset('assets/vendor/libs/select2/select2.js')}}"></script>
<script src="{{asset('assets/vendor/libs/flatpickr/flatpickr.js')}}"></script>
<script src="{{asset('assets/vendor/libs/sweetalert2/sweetalert2.js')}}"></script>
<script>
    "use strict";
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    var sweet_loader = `<div class="spinner-border mb-8 text-primary" style="width: 5rem; height: 5rem;" role="status">
                                    <span class="sr-only">Loading...</span>
                                </div>`;
    var lastIndex = null;

    function format(e) {
        var nStr = e + '';
        nStr = nStr.replace(/\,/g, "");
        let x = nStr.split('.');
        let x1 = x[0];
        let x2 = x.length > 1 ? '.' + x[1] : '';
        var rgx = /(\d+)(\d{3})/;
        while (rgx.test(x1)) {
            x1 = x1.replace(rgx, '$1' + ',' + '$2');
        }
        return x1 + x2;
    }
    let dataLocal = JSON.parse(localStorage.getItem("invoice"));
    $(document).ready(function() {
        $.ajax({
            url: baseUrl + "api/invoice/nomor",
            type: "get",
            contentType: "application/json; charset=utf-8",
            dataType: "json",
            success: function(response) {
                $('#invoice_number').val(response.data);
            },
            error: function(errors) {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: errors.responseJSON.message,
                })
            }
        });
        let ttdFile = dataLocal ? dataLocal.materai_image : null;
        const myDropzone = new Dropzone('#dropzone-basic', {
            parallelUploads: 1,
            thumbnailWidth: null,
            thumbnailHeight: null,
            maxFilesize: 3,
            addRemoveLinks: true,
            maxFiles: 1,
            acceptedFiles: ".jpeg,.jpg,.png,.gif",
            autoQueue: false,
            url: "../uploads/logo",
            init: function() {
                if (dataLocal) {
                    // Add a preloaded file to the dropzone with a preview
                    var mockFile = dataLocal.materai_image;
                    if (mockFile) {
                        this.options.addedfile.call(this, mockFile);
                        this.options.thumbnail.call(this, mockFile, dataLocal.materai_image.dataURL);

                        $('.dz-image').last().find('img').attr('width', '100%');


                        // Optional: Handle the removal of the file
                        mockFile.previewElement.querySelector(".dz-remove").addEventListener("click", function() {
                            // Handle removal logic here
                        });
                    }
                }
                this.on('addedfile', function(file) {
                    $('.dz-image').last().find('img').attr('width', '100%');
                    while (this.files.length > this.options.maxFiles) this.removeFile(this.files[0]);
                    ttdFile = file;
                })
            }
        });

        window.addEventListener("pageshow", function(event) {
            var historyTraversal = event.persisted || (typeof window.performance !== "undefined" && window.performance.getEntriesByType("navigation")[0].type === "back_forward");
            if (historyTraversal) {
                location.reload(); // Reload the page
            }
        });

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

        $("#tenant").select2({
            placeholder: 'Select Tenant',
            allowClear: true,
            ajax: {
                url: "{{ url('api/tenant/select') }}",
                dataType: 'json',
                cache: true,
                data: function(params) {
                    return {
                        value: params.term || '',
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



        // $('#tenant').next('.select2-container').find('.select2-selection').css('width', '250px');
        // $('#tenant').find('.select2-container').css('width', '100px');

        $("#bank").select2({
            placeholder: 'Select Bank',
            allowClear: true,
            ajax: {
                url: "{{ url('api/bank/select') }}",
                dataType: 'json',
                cache: true,
                data: function(params) {
                    return {
                        value: params.term || '',
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

        if (dataLocal) {
            load(dataLocal);
        }
        getDetails();

        $('#tenant').on("change", (async function(e) {
            $(this).removeClass("invalid");
            var rekomendasi = $("#tenant").select2('data');
            var data = rekomendasi[0].id;
            $('#tenant').val(data);
        }));

        $('#bank').on("change", (async function(e) {
            $(this).addClass("valid");
            var rekomendasi = $("#bank").select2('data');
            var data = rekomendasi[0].id;
            $('#bank').val(data);

        }));

        $(document).on('click', '.btn-add-row-mg', function() {
            // Clone baris terakhir
            var index = lastIndex ? lastIndex + 1 : $('.tax').length;
            lastIndex = index;
            console.log(lastIndex);
            var $details = $('#details');
            var $newRow = `
            <div class="row-mg">
                <div class="row d-flex align-items-end justify-content-between mb-3">
                    <div class="col-md-5">
                        <div class="row row d-flex justify-content-between px-1">
                            <div class="col-md-6 px-1-custom">
                                <label for="note" class="form-label fw-medium">Uraian</label>
                                <textarea name="uraian" class="form-control row-input" placeholder="" name="item[]" required /></textarea>
                                <div class="invalid-feedback">Tidak boleh kosong</div>
                            </div>
                            <div class="col-md-6 px-1-custom">
                                <label for="note" class="form-label fw-medium">Keterangan</label>
                                <textarea class="form-control row-input" placeholder="" name="description[]" required></textarea>
                                <div class="invalid-feedback">Tidak boleh kosong</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2 px-1-custom">
                        <label for="note" class="form-label fw-medium">Dasar Pengenaan Pajak</label>
                        <input type="text" class="form-control row-input price" placeholder="" name="price[]" required />
                        <div class="invalid-feedback">Tidak boleh kosong</div>
                    </div>
                    <div class="col-md-2 px-1-custom">
                        <label for="note" class="form-label fw-medium">Pajak</label>
                        <select class="form-control row-input tax" placeholder="" name="tax[]" id="tax-${index}" required></select>
                        <div class="invalid-feedback">Tidak boleh kosong</div>
                    </div>
                    <div class="col-md-2 px-1-custom">
                        <label for="note" class="form-label fw-medium">Total (Rp.)</label>
                        <input type="text" class="form-control row-input total_price" placeholder="" name="total_price[]" disabled/>
                    </div>
                    <div class="col-md-1 px-1-custom">
                        <a role="button" class="btn btn-danger text-center btn-remove-mg text-white" disabled>
                            <i class="fas fa-trash"></i>
                        </a>
                    </div>
                </div>
            </div>`;
            $details.append($newRow);
            $("#tax-" + index).select2({
                width: '100px',
                placeholder: 'Select Pajak',
                allowClear: true,
                ajax: {
                    url: "{{env('BASE_URL_API')}}" + "/api/tax/select",
                    dataType: 'json',
                    cache: true,
                    data: function(params) {
                        return {
                            value: params.term || '',
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
        });

        function tenantTemplate(data) {
            return data;
        }

        $("#tax-0").select2({
            placeholder: 'Select Tenant',
            allowClear: true,
            ajax: {
                url: "{{env('BASE_URL_API')}}" + "/api/tax/select",
                dataType: 'json',
                cache: true,
                data: function(params) {
                    return {
                        value: params.term || '',
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


        $(document).on('click', '.btn-remove-mg', function() {
            // Hapus baris yang ditekan tombol hapus
            $(this).closest('.row-mg').remove();
        });

        $(document).on('keydown', '.price', function(event) {
            var key = event.which;
            if ((key < 48 || key > 57) && key != 8) event.preventDefault();
        });

        $(document).on('input', '.price', function(event) {
            var nStr = event.currentTarget.value + '';
            nStr = nStr.replace(/\,/g, "");
            var x = nStr.split('.');
            var x1 = x[0];
            var x2 = x.length > 1 ? '.' + x[1] : '';
            var rgx = /(\d+)(\d{3})/;
            while (rgx.test(x1)) {
                x1 = x1.replace(rgx, '$1' + ',' + '$2');
            }
            event.currentTarget.value = x1 + x2;
            // Hapus baris yang ditekan tombol hapus
            let index = $('.price').index(this);
            let total = 0;
            let price = parseInt($(this).val().replaceAll(',', ''));
            let id = isNaN(parseInt($(`.tax:eq(` + index + `)`).val())) ? 0 : parseInt($(`.tax:eq(` + index + `)`).val().replaceAll(',', ''));
            console.log(id);
            if (id == 0) {
                $(`.total_price:eq(` + index + `)`).val(isNaN(price) ? 0 : format(price));
                getTotal();
            } else {
                $.ajax({
                    url: "{{env('BASE_URL_API')}}" + "/api/tax/" + id,
                    type: "get",
                    contentType: "application/json; charset=utf-8",
                    dataType: "json",
                    success: function(response) {
                        console.log(response);
                        let data = response.data.rate;
                        let total = 0;
                        let tax = parseInt(data);
                        tax = tax / 100;
                        let totalPrice = price * tax + price;
                        // console.log(format(totalPrice));
                        $(`.total_price:eq(` + index + `)`).val(isNaN(totalPrice) ? 0 : format(totalPrice));
                        getTotal();
                    },
                    error: function(errors) {
                        console.log(errors);
                    }
                });
            }

        });

        $(document).on('input', '.tax', function(event) {
            let id = event.currentTarget.value;
            let index = $('.tax').index(this);
            let data = 0;
            $.ajax({
                url: "{{env('BASE_URL_API')}}" + "/api/tax/" + id,
                type: "get",
                contentType: "application/json; charset=utf-8",
                dataType: "json",
                success: function(response) {
                    console.log(response);
                    let data = response.data.rate;
                    console.log($(this));
                    let total = 0;
                    let price = parseInt($(`.price:eq(` + index + `)`).val().replaceAll(',', ''));
                    let tax = parseInt(data);
                    tax = tax / 100;
                    let totalPrice = price * tax + price;
                    // console.log(format(totalPrice));
                    $(`.total_price:eq(` + index + `)`).val(isNaN(totalPrice) ? 0 : format(totalPrice));
                    getTotal();
                },
                error: function(errors) {
                    console.log(errors);
                }
            });
        });

        function getTotal() {
            let totalArr = [];
            let tempTotal = document.getElementsByClassName('total_price');
            for (let i = 0; i < tempTotal.length; i++) {
                var slipOdd = parseInt(tempTotal[i].value.replaceAll(',', ''));
                totalArr.push(Number(slipOdd));
            }

            let sum = 0;
            for (let i = 0; i < totalArr.length; i++) {
                sum += totalArr[i];
            }
            $('.grand_total').text(format(sum));
            $('.terbilang').val(terbilang(sum));

        }

        function terbilang(bilangan) {
            bilangan = String(bilangan);
            let angka = new Array('0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0');
            let kata = new Array('', 'Satu', 'Dua', 'Tiga', 'Empat', 'Lima', 'Enam', 'Tujuh', 'Delapan', 'Sembilan');
            let tingkat = new Array('', 'Ribu', 'Juta', 'Milyar', 'Triliun');

            let panjang_bilangan = bilangan.length;
            let kalimat = "";
            let subkalimat = "";
            let kata1 = "";
            let kata2 = "";
            let kata3 = "";
            let i = 0;
            let j = 0;

            /* pengujian panjang bilangan */
            if (panjang_bilangan > 15) {
                kalimat = "Diluar Batas";
                return kalimat;
            }

            /* mengambil angka-angka yang ada dalam bilangan, dimasukkan ke dalam array */
            for (i = 1; i <= panjang_bilangan; i++) {
                angka[i] = bilangan.substr(-(i), 1);
            }

            i = 1;
            j = 0;
            kalimat = "";

            /* mulai proses iterasi terhadap array angka */
            while (i <= panjang_bilangan) {

                subkalimat = "";
                kata1 = "";
                kata2 = "";
                kata3 = "";

                /* untuk Ratusan */
                if (angka[i + 2] != "0") {
                    if (angka[i + 2] == "1") {
                        kata1 = "Seratus";
                    } else {
                        kata1 = kata[angka[i + 2]] + " Ratus";
                    }
                }

                /* untuk Puluhan atau Belasan */
                if (angka[i + 1] != "0") {
                    if (angka[i + 1] == "1") {
                        if (angka[i] == "0") {
                            kata2 = "Sepuluh";
                        } else if (angka[i] == "1") {
                            kata2 = "Sebelas";
                        } else {
                            kata2 = kata[angka[i]] + " Belas";
                        }
                    } else {
                        kata2 = kata[angka[i + 1]] + " Puluh";
                    }
                }

                /* untuk Satuan */
                if (angka[i] != "0") {
                    if (angka[i + 1] != "1") {
                        kata3 = kata[angka[i]];
                    }
                }

                /* pengujian angka apakah tidak nol semua, lalu ditambahkan tingkat */
                if ((angka[i] != "0") || (angka[i + 1] != "0") || (angka[i + 2] != "0")) {
                    subkalimat = kata1 + " " + kata2 + " " + kata3 + " " + tingkat[j] + " ";
                }

                /* gabungkan variabe sub kalimat (untuk Satu blok 3 angka) ke variabel kalimat */
                kalimat = subkalimat + kalimat;
                i = i + 3;
                j = j + 1;

            }

            /* mengganti Satu Ribu jadi Seribu jika diperlukan */
            if ((angka[5] == "0") && (angka[6] == "0")) {
                kalimat = kalimat.replace("Satu Ribu", "Seribu");
            }

            return (kalimat.trim().replace(/\s{2,}/g, ' ')) + " Rupiah";
        }

        const rupiah = (number) => {
            return new Intl.NumberFormat("id-ID", {
                style: "currency",
                currency: "IDR"
            }).format(number);
        }

        var saveInvoice = $('.create-invoice');

        Array.prototype.slice.call(saveInvoice).forEach(function(form) {
            $('.indicator-progress').hide();
            $('.indicator-label').show();
            form.addEventListener(
                "submit",
                function(event) {
                    if (!form.checkValidity()) {
                        event.preventDefault();
                        event.stopPropagation();

                        let tenant = $("#tenant").val();
                        let bank = $("#bank").val();
                        let tglKontrak = $("#contract_date").val();

                        if (!tenant) {
                            $("#tenant").addClass("invalid");
                        }
                        if (!bank) {
                            $("#bank").addClass("invalid");
                        }

                    } else {
                        // Submit your form
                        event.preventDefault();
                        let fileTtd = ttdFile.dataURL;
                        let tenant = $("#tenant").val();
                        let noInvoice = $("#invoice_number").val();
                        let tglInvoice = $("#invoice_date").val();
                        let noKontrak = $("#contract_number").val();
                        let tglKontrak = $("#contract_date").val();
                        let noAddendum = $("#addendum_number").val();
                        let tglAddendum = $("#addendum_date").val();
                        let terbilang = $("#grand_total_spelled").val();
                        let grandTotal = parseInt($(".grand_total").text().replaceAll(',', ''));
                        let tglJatuhTempo = $("#invoice_due_date").val();
                        let syaratDanKententuan = $("#term_and_conditions").val();
                        let bank = $("#bank").val();
                        let tglTtd = $("#materai_date").val();
                        let nameTtd = $("#materai_name").val();

                        var detail = [];
                        $('.row-input').each(function(index) {
                            var input_name = $(this).attr('name');
                            var input_value = $(this).val();
                            var input_index = Math.floor(index / 5); // Membagi setiap 5 input menjadi satu objek pada array
                            if (index % 5 == 0) {
                                detail[input_index] = {
                                    item: input_value
                                };
                            } else if (index % 5 == 1) {
                                detail[input_index].description = input_value;
                            } else if (index % 5 == 2) {
                                detail[input_index].price = parseInt(input_value.replaceAll(',', ''));
                            } else if (index % 5 == 3) {
                                detail[input_index].tax_id = parseInt(input_value);
                            } else if (index % 5 == 4) {
                                detail[input_index].total_price = parseInt(input_value.replaceAll(',', ''));
                            }
                        });


                        let datas = {};
                        $('.create-invoice').find('.form-control').each(function() {
                            var inputId = $(this).attr('id');
                            var inputValue = $("#" + inputId).val();
                            datas[$("#" + inputId).attr("name")] = inputValue;
                        });

                        datas.details = detail;
                        datas.tenant_id = parseInt(tenant);
                        datas.bank_id = parseInt(bank);
                        datas.status = "Terbuat";
                        datas.contract_date = tglKontrak
                        datas.opening_paragraph = "Bapak/Ibu Qwerty";
                        datas.invoice_due_date = tglJatuhTempo;
                        datas.addendum_date = tglAddendum;
                        datas.invoice_date = tglInvoice;
                        datas.grand_total = parseInt(grandTotal);
                        datas.materai_image = fileTtd;
                        delete datas['undefined'];
                        console.log(datas);

                        $.ajax({
                            url: "{{env('BASE_URL_API')}}" + "/api/invoice",
                            type: "POST",
                            data: JSON.stringify(datas),
                            processData: false,
                            contentType: false,
                            contentType: "application/json; charset=utf-8",
                            dataType: "json",
                            success: function(response) {
                                $('.indicator-progress').show();
                                $('.indicator-label').hide();

                                Swal.fire({
                                    title: 'Berhasil',
                                    text: 'Berhasil menambahkan Invoice',
                                    icon: 'success',
                                    customClass: {
                                        confirmButton: 'btn btn-primary'
                                    },
                                    buttonsStyling: false
                                })

                                localStorage.removeItem('invoice');
                                window.location.href = "/invoice/list-invoice"
                            },
                            error: function(xhr, status, error) {
                                Swal.fire({
                                    title: 'Error!',
                                    text: ' You clicked the button!',
                                    icon: 'error',
                                    customClass: {
                                        confirmButton: 'btn btn-primary'
                                    },
                                    buttonsStyling: false
                                })
                            }
                        });
                    }

                    form.classList.add("was-validated");
                },
                false
            );
        });

        $(document).on('click', '#preview', function(event) {
            event.preventDefault();
            let tenant = $("#tenant").val();
            let noInvoice = $("#invoice_number").val();
            let tglInvoice = $("#invoice_date").val();
            let noKontrak = $("#contract_number").val();
            let tglKontrak = $("#contract_date").val();
            let noAddendum = $("#addendum_number").val();
            let tglAddendum = $("#addendum_date").val();
            let terbilang = $("#grand_total_spelled").val();
            let grandTotal = parseInt($(".grand_total").text().replaceAll(',', ''));
            let tglJatuhTempo = $("#invoice_due_date").val();
            let syaratDanKententuan = $("#term_and_conditions").val();
            let bank = $("#bank").val();
            let tglTtd = $("#materai_date").val();
            let nameTtd = $("#materai_name").val();
            let fileTtd = ttdFile;


            var detail = [];
            $('.row-input').each(function(index) {
                var input_name = $(this).attr('name');
                var input_value = $(this).val();
                var input_index = Math.floor(index / 5); // Membagi setiap 5 input menjadi satu objek pada array
                if (index % 5 == 0) {
                    detail[input_index] = {
                        item: input_value
                    };
                } else if (index % 5 == 1) {
                    detail[input_index].description = input_value;
                } else if (index % 5 == 2) {
                    detail[input_index].price = parseInt(input_value.replaceAll(',', ''));
                } else if (index % 5 == 3) {
                    detail[input_index].tax_id = parseInt(input_value);
                } else if (index % 5 == 4) {
                    detail[input_index].total_price = parseInt(input_value.replaceAll(',', ''));
                }
            });

            let datas = {};
            $('.create-invoice').find('.form-control').each(function() {
                var inputId = $(this).attr('id');
                var inputValue = $("#" + inputId).val();
                datas[$("#" + inputId).attr("name")] = inputValue;
            });

            datas.details = detail;
            datas.tenant_id = parseInt(tenant);
            datas.bank_id = parseInt(bank);
            datas.status = 'terbuat';
            datas.contract_date = tglKontrak
            datas.opening_paragraph = "Bapak/Ibu Qwerty";
            datas.invoice_due_date = tglJatuhTempo;
            datas.addendum_date = tglAddendum;
            datas.invoice_date = tglInvoice;
            datas.grand_total = grandTotal;
            datas.materai_image = fileTtd;
            console.log(lastIndex);
            localStorage.setItem("invoice", JSON.stringify(datas));
            window.location.href = "/invoice/preview-invoice"
        });

        $(document).on('click', '#batal', function(event) {
            event.preventDefault();
            localStorage.removeItem('invoice');
            window.location.href = "/invoice/list-invoice"
        });
    });

    function load(dataLocale) {
        Swal.fire({
            title: '<h2>Loading...</h2>',
            html: sweet_loader + '<h5>Please Wait</h5>',
            showConfirmButton: false,
            allowOutsideClick: false,
            allowEscapeKey: false
        });
        $("#invoice_number").val(dataLocal.invoice_number);
        $("#contract_number").val(dataLocal.contract_number);
        $("#addendum_number").val(dataLocal.addendum_number);
        $("#grand_total_spelled").val(dataLocal.grand_total_spelled);
        $(".grand_total").text(format(dataLocal.grand_total));
        $("#materai_name").val(dataLocal.materai_name);
        $("#term_and_conditions").val(dataLocal.term_and_conditions);


        if (dataLocal.tenant_id) {
            getTenant();
        }
        if (dataLocal.bank_id) {
            getBank();
        }
        if (dataLocal.invoice_date) {
            getInvoiceDate();
        }
        if (dataLocal.contract_date) {
            getContractDate();
        }

        if (dataLocal.addendum_date) {
            getAddendumDate();
        }

        if (dataLocal.invoice_due_date) {
            getInvoiceDueDate();
        }

        if (dataLocal.materai_date) {
            getMateraiDate();
        }
        Swal.close();
    }


    function getTenant() {
        let idTenant = dataLocal.tenant_id;
        $.ajax({
            url: "{{url('api/tenant')}}/" + idTenant,
            type: "GET",
            success: function(response) {
                let data = response.data;
                let tem = `<option value="` + data.id + `" selected>` + data.name + `</option>`;
                $('#tenant').prepend(tem);
            },
            error: function(xhr, status, error) {
                console.log(error);
            }
        });
    }

    function getBank() {
        let idBank = dataLocal.bank_id;
        $.ajax({
            url: "{{url('api/bank')}}/" + idBank,
            type: "GET",
            success: function(response) {
                console.log(response);
                let data = response.data;

                let tem = `<option value="` + data.id + `" selected>` + data.name + `</option>`;
                $('#bank').prepend(tem);

            },
            error: function(xhr, status, error) {
                console.log(error);
            }
        });
    }

    function getInvoiceDate() {
        let invoiceDate = dataLocal.invoice_date;
        $('#invoice_date').val(invoiceDate);
    }

    function getContractDate() {
        let contractDate = dataLocal.contract_date;
        $('#contract_date').val(contractDate);
    }

    function getAddendumDate() {
        let addendumDate = dataLocal.addendum_date;
        $('#addendum_date').val(addendumDate);
    }

    function getInvoiceDueDate() {
        let invoiceDueDate = dataLocal.invoice_due_date;
        $('#invoice_due_date').val(invoiceDueDate);
    }

    function getMateraiDate() {
        let materailDate = dataLocal.materai_date;
        $('#materai_date').val(materailDate);
    }

    function getDetails() {
        let data = dataLocal;
        let getDetail = '';
        let temp = '';

        if (data) {
            let details = dataLocal.details;
            for (let i = 0; i < details.length; i++) {
                temp = `             
                <div class="row-mg">
                    <div class="row d-flex align-items-end justify-content-between mb-3">
                        <div class="col-md-5">
                            <div class="row row d-flex justify-content-between px-1">
                                <div class="col-md-6 px-1-custom">
                                    <label for="note" class="form-label fw-medium">Uraian</label>
                                    <textarea name="uraian" class="form-control row-input" placeholder="" name="item[]" required />` + details[i].item + `</textarea>
                                    <div class="invalid-feedback">Tidak boleh kosong</div>
                                </div>
                                <div class="col-md-6 px-1-custom">
                                    <label for="note" class="form-label fw-medium">Keterangan</label>
                                    <textarea class="form-control row-input" placeholder="" name="description[]" required>` + details[i].description + `</textarea>
                                    <div class="invalid-feedback">Tidak boleh kosong</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2 px-1-custom">
                            <label for="note" class="form-label fw-medium">Dasar Pengenaan Pajak</label>
                            <input type="text" class="form-control row-input price" placeholder="" name="price[]" required value="` + details[i].price + `"/>
                            <div class="invalid-feedback">Tidak boleh kosong</div>
                        </div>
                        <div class="col-md-2 px-1-custom">
                            <label for="note" class="form-label fw-medium">Pajak</label>
                            <select class="form-control row-input tax" placeholder="" name="tax[]" id="tax-${i}" required></select>
                            <div class="invalid-feedback">Tidak boleh kosong</div>
                        </div>
                        <div class="col-md-2 px-1-custom">
                            <label for="note" class="form-label fw-medium">Total (Rp.)</label>
                            <input type="text" class="form-control row-input total_price" placeholder="" name="total_price[]" disabled value="` + details[i].total_price + `"/>
                        </div>
                        <div class="col-md-1 px-1-custom">
                            <a role="button" class="btn btn-danger text-center btn-remove-mg text-white" disabled>
                                <i class="fas fa-trash"></i>
                            </a>
                        </div>
                    </div>
                </div>`;
                getDetail = getDetail + temp;
                $.ajax({
                    url: "{{env('BASE_URL_API')}}" + "/api/tax/" + details[i].tax_id,
                    type: "GET",
                    success: function(response) {

                        let data = response.data;
                        let tem = `<option value="` + data.id + `" selected>` + data.name + `</option>`;
                        $('#tax-' + i).prepend(tem);
                        console.log();
                    },
                    error: function(xhr, status, error) {
                        console.log(error);
                    }
                });

            }
            $('#details').prepend(getDetail);
            for (let i = 0; i < details.length; i++) {
                $("#tax-" + i).select2({
                    width: '100px',
                    placeholder: 'Select Pajak',
                    allowClear: true,
                    ajax: {
                        url: "{{env('BASE_URL_API')}}" + "/api/tax/select",
                        dataType: 'json',
                        cache: true,
                        data: function(params) {
                            return {
                                value: params.term || '',
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
            }
        } else {
            console.log('a');
            temp = `             
            <div class="row-mg">
                <div class="row d-flex align-items-end justify-content-between mb-3">
                    <div class="col-md-5">
                        <div class="row row d-flex justify-content-between px-1">
                            <div class="col-md-6 px-1-custom">
                                <label for="note" class="form-label fw-medium">Uraian</label>
                                <textarea name="uraian" class="form-control row-input" placeholder="" name="item[]" required /></textarea>
                                <div class="invalid-feedback">Tidak boleh kosong</div>
                            </div>
                            <div class="col-md-6 px-1-custom">
                                <label for="note" class="form-label fw-medium">Keterangan</label>
                                <textarea class="form-control row-input" placeholder="" name="description[]" required></textarea>
                                <div class="invalid-feedback">Tidak boleh kosong</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2 px-1-custom">
                        <label for="note" class="form-label fw-medium">Dasar Pengenaan Pajak</label>
                        <input type="text" class="form-control row-input price" placeholder="" name="price[]" required/>
                        <div class="invalid-feedback">Tidak boleh kosong</div>
                    </div>
                    <div class="col-md-2 px-1-custom">
                        <label for="note" class="form-label fw-medium">Pajak</label>
                        <select class="form-control row-input tax" placeholder="" name="tax[]" id="tax-0" required></select>
                        <div class="invalid-feedback">Tidak boleh kosong</div>
                    </div>
                    <div class="col-md-2 px-1-custom">
                        <label for="note" class="form-label fw-medium">Total (Rp.)</label>
                        <input type="text" class="form-control row-input total_price" placeholder="" name="total_price[]" disabled/>
                    </div>
                    <div class="col-md-1 px-1-custom">
                        <a role="button" class="btn btn-danger text-center btn-remove-mg text-white" disabled>
                            <i class="fas fa-trash"></i>
                        </a>
                    </div>
                </div>
            </div>`;
            $('#details').prepend(temp);
        }
    }
</script>
@endsection