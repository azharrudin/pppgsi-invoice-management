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
    <form id="create-invoice" class="create-invoice" novalidate>
        <div class="row invoice-add">
            <!-- Invoice Add-->
            <div class="col-lg-9 col-12 mb-lg-0 mb-3">
                <div class="card invoice-preview-card">
                    <div class="card-body">
                        <div style="background-image: url('{{ asset('assets/img/header.png') }}'); height : 150px; background-size: contain; background-repeat: no-repeat;">
                        </div>

                        <div class="row m-sm-2 m-0 px-3">
                            <div class="row col-md-7 mb-md-0 ps-0">
                                <div class="row px-3 d-flex align-items-start mb-3">
                                    <div class="d-flex align-items-center justify-content-between col-3">
                                        <label for="select2Primary" class="form-label">Kepada Yth,</label>
                                    </div>
                                    <div class="col-8 fs-5">
                                        <select name="tenant" id="tenant" name="tenant" class="w-px-250 item-details mb-3" required>
                                        </select>
                                        <div class="invalid-feedback">Tidak boleh kosong</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <dd class="d-flex justify-content-md-end flex-wrap pe-0 ps-0 ps-sm-2">
                                    <div class="mb-3 mx-2">
                                        <label for="note" class="form-label fw-medium">No. Invoice</label>
                                        <input type="text" class="form-control w-px-150" name="invoice_number" id="invoice_number" placeholder="" required />
                                        <div class="invalid-feedback">Tidak boleh kosong</div>
                                    </div>
                                    <div class="mb-3 mx-2">
                                        <label for="note" class="form-label fw-medium">Tgl. Invoice</label>
                                        <input type="text" class="form-control w-px-150 date" name="invoice_date" id="invoice_date" placeholder="" required />
                                        <div class="invalid-feedback">Tidak boleh kosong</div>
                                    </div>
                                    <div class="mb-3 mx-2">
                                        <label for="note" class="form-label fw-medium">No. Kontrak</label>
                                        <input type="text" class="form-control w-px-150" name="contract_number" id="contract_number" placeholder="" required />
                                        <div class="invalid-feedback">Tidak boleh kosong</div>
                                    </div>
                                    <div class="mb-3 mx-2">
                                        <label for="note" class="form-label fw-medium">Tanggal</label>
                                        <input type="text" class="form-control w-px-150 date" name="contract_date" id="contract_date" placeholder="" required />
                                        <div class="invalid-feedback">Tidak boleh kosong</div>
                                    </div>
                                    <div class="mb-3 mx-2">
                                        <label for="note" class="form-label fw-medium">No. Addendum</label>
                                        <input type="text" class="form-control w-px-150" name="addendum_number" id="addendum_number" placeholder="" required />
                                        <div class="invalid-feedback">Tidak boleh kosong</div>
                                    </div>
                                    <div class="mb-3 mx-2">
                                        <label for="note" class="form-label fw-medium">Tanggal</label>
                                        <input type="text" class="form-control w-px-150 date" id="addendum_date" placeholder="" required />
                                        <div class="invalid-feedback">Tidak boleh kosong</div>
                                    </div>
                                </dd>
                            </div>
                        </div>

                        {{-- Repeater --}}
                        <div class="repeater">
                            <div class="" id="details">

                            </div>

                            <div class="row pb-4">
                                <div class="col-sm-3 px-3">
                                    <button type="button" class="btn btn-primary waves-effect waves-light w-px-150 btn-add-row-mg">Tambah
                                        Baris</button>
                                </div>
                            </div>
                        </div>

                        {{-- Divider --}}
                        <div class="px-5">
                            <hr class="my-3 mx-n5">
                        </div>

                        {{-- Total --}}
                        <div class="col-md-12 d-flex float-end px-5 mb-5">
                            <div class="col-6"></div>
                            <div class="col-6">
                                {{-- Total --}}
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <p>Total</p>
                                    </div>
                                    <div>
                                        <p class="grand_total">0.00</p>
                                    </div>
                                </div>
                                {{-- Divider --}}
                                <div>
                                    <hr class="m-0 mx-n7">
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12 mb-5">
                            <div class="col-md-12 mb-2">
                                <label for="note" class="form-label fw-medium">Terbilang</label>
                                <input type="text" class="form-control w-full terbilang" id="grand_total_spelled" name="grand_total_spelled" placeholder="Terbilang" disabled />
                            </div>
                            <div class="col-md-8 d-flex align-items-center">
                                <label for="note" class="form-label fw-medium me-2">Jatuh Tempo Tanggal :</label>
                                <input type="text" class="form-control w-px-250 date" placeholder="Jatuh Tanggal Tempo" id="invoice_due_date" name="invoice_due_date" required />
                                <div class="invalid-feedback">Tidak boleh kosong</div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-md-0 mb-3">
                                <div class="mb-3">
                                    <label for="note" class="form-label fw-medium me-2">Syarat & Ketentuan</label>
                                    <textarea class="form-control" rows="11" id="term_and_conditions" name="term_and_conditions" placeholder="Termin pembayaran, garansi dll" required></textarea>
                                    <div class="invalid-feedback">Tidak boleh kosong</div>
                                </div>
                                <div class="mb-3">
                                    <label for="note" class="form-label fw-medium me-2">Bank</label>
                                    <select name="bank" id="bank" name="bank" class="form-select w-px-250 item-details mb-3" required>
                                    </select>
                                    <div class="invalid-feedback">Tidak boleh kosong</div>
                                </div>
                            </div>
                            <div class="col-md-6 mb-md-0 mb-3 d-flex flex-column align-items-center text-center">
                                <div class="mb-3">
                                    <label for="note" class="form-label fw-medium">Tanda Tangan & Meterai
                                        (Opsional)</label>
                                    <input type="text" class="form-control w-px-250 date" placeholder="Tanggal" id="materai_date" name="materai_date" />
                                    <div class="invalid-feedback">Tidak boleh kosong</div>
                                </div>
                                <div class="mb-3">
                                    <div action="/upload" class="dropzone needsclick dz-clickable w-px-250" id="dropzone-basic">
                                        <div class="dz-message needsclick">
                                            <span class="note needsclick">Unggah Tanda Tangan</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <input type="text" class="form-control w-px-250 " id="materai_name" placeholder="Nama & Jabatan" name="materai_name" />
                                    <div class="invalid-feedback">Tidak boleh kosong</div>
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
</div>
<!-- / Content -->

@endsection

@section('page-script')
<script src="{{asset('assets/vendor/libs/select2/select2.js')}}"></script>
<script src="{{asset('assets/vendor/libs/flatpickr/flatpickr.js')}}"></script>
<script src="{{asset('assets/vendor/libs/sweetalert2/sweetalert2.js')}}"></script>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    var sweet_loader = `<div class="spinner-border mb-8 text-primary" style="width: 5rem; height: 5rem;" role="status">
                                    <span class="sr-only">Loading...</span>
                                </div>`;

    function format(e) {
        var nStr = e + '';
        nStr = nStr.replace(/\,/g, "");
        x = nStr.split('.');
        x1 = x[0];
        x2 = x.length > 1 ? '.' + x[1] : '';
        var rgx = /(\d+)(\d{3})/;
        while (rgx.test(x1)) {
            x1 = x1.replace(rgx, '$1' + ',' + '$2');
        }
        return x1 + x2;
    }
    let dataLocal = JSON.parse(localStorage.getItem("invoice"));
    $(document).ready(function() {
        let ttdFile = dataLocal ? dataLocal.materai_image : null;
        const myDropzone = new Dropzone('#dropzone-basic', {
            parallelUploads: 1,
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

                        // Optional: Handle the removal of the file
                        mockFile.previewElement.querySelector(".dz-remove").addEventListener("click", function() {
                            // Handle removal logic here
                        });
                    }
                }
                this.on('addedfile', function(file) {
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
            minimumResultsForSearch: Infinity,
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
                    console.log(data);
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
            $("#invoice_number").val(dataLocal.invoice_number);
            $("#contract_number").val(dataLocal.contract_number);
            $("#addendum_number").val(dataLocal.addendum_number);
            $("#grand_total_spelled").val(dataLocal.grand_total_spelled);
            $(".grand_total").text(dataLocal.grand_total);
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
            var $details = $('#details');
            var $newRow = ` <div class="row-mg">
                <div class="col-12 d-flex align-items-center justify-content-between">
                    <div class="col-sm-2 mb-3 mx-2">
                        <label for="note" class="form-label fw-medium">Uraian</label>
                        <input type="text" name="uraian" class="form-control w-px-150 row-input" placeholder="" name="item[]" required />
                        <div class="invalid-feedback">Tidak boleh kosong</div>
                    </div>
                    <div class="col-sm-2 mb-3 mx-2">
                        <label for="note" class="form-label fw-medium">Keterangan</label>
                        <input type="text" class="form-control w-px-150 row-input" placeholder="" name="description[]" required />
                        <div class="invalid-feedback">Tidak boleh kosong</div>
                    </div>
                    <div class="col-sm-2 mb-3 mx-2">
                        <label for="note" class="form-label fw-medium">Dasar Pengenaan Pajak</label>
                        <input type="text" class="form-control w-px-150 row-input price" placeholder="" name="price[]" required />
                        <div class="invalid-feedback">Tidak boleh kosong</div>
                    </div>
                    <div class="col-sm-1 mb-3 mx-2">
                        <label for="note" class="form-label fw-medium">Pajak</label>
                        <input type="text" class="form-control w-150 row-input tax" placeholder="" name="tax[]" required />
                        <div class="invalid-feedback">Tidak boleh kosong</div>
                    </div>
                    <div class="col-sm-2 mb-3 mx-2">
                        <label for="note" class="form-label fw-medium">Total (Rp.)</label>
                        <input type="text" class="form-control w-px-150 row-input total_price" placeholder="" name="total_price[]" disabled/>
                    </div>
                    <a class="mb-3 mx-2 mt-3 btn-remove-mg" role="button">
                        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12" fill="none">
                            <circle cx="6" cy="6" r="6" fill="#D9D9D9" />
                            <path d="M6.70432 5.99276L8.85224 3.8544C8.9463 3.76053 8.99915 3.63323 8.99915 3.50049C8.99915 3.36775 8.9463 3.24045 8.85224 3.14659C8.75818 3.05273 8.63061 3 8.49759 3C8.36456 3 8.23699 3.05273 8.14293 3.14659L6 5.28994L3.85707 3.14659C3.76301 3.05273 3.63544 3 3.50241 3C3.36939 3 3.24182 3.05273 3.14776 3.14659C3.0537 3.24045 3.00085 3.36775 3.00085 3.50049C3.00085 3.63323 3.0537 3.76053 3.14776 3.8544L5.29568 5.99276L3.14776 8.13113C3.10094 8.17747 3.06378 8.23259 3.03842 8.29334C3.01306 8.35408 3 8.41923 3 8.48503C3 8.55083 3.01306 8.61598 3.03842 8.67672C3.06378 8.73746 3.10094 8.79259 3.14776 8.83893C3.19419 8.88565 3.24944 8.92273 3.31031 8.94804C3.37118 8.97335 3.43647 8.98637 3.50241 8.98637C3.56836 8.98637 3.63365 8.97335 3.69452 8.94804C3.75539 8.92273 3.81063 8.88565 3.85707 8.83893L6 6.69558L8.14293 8.83893C8.18937 8.88565 8.24461 8.92273 8.30548 8.94804C8.36635 8.97335 8.43164 8.98637 8.49759 8.98637C8.56353 8.98637 8.62882 8.97335 8.68969 8.94804C8.75056 8.92273 8.80581 8.88565 8.85224 8.83893C8.89906 8.79259 8.93622 8.73746 8.96158 8.67672C8.98694 8.61598 9 8.55083 9 8.48503C9 8.41923 8.98694 8.35408 8.96158 8.29334C8.93622 8.23259 8.89906 8.17747 8.85224 8.13113L6.70432 5.99276Z" fill="#FF4747" />
                        </svg>
                    </a>
                </div>
            </div>`;
            $details.append($newRow);
        });

        function tenantTemplate(data) {
            return data;
        }


        $(document).on('click', '.btn-remove-mg', function() {
            // Hapus baris yang ditekan tombol hapus
            $(this).closest('.row-mg').remove();
        });

        $(document).on('keydown', '.price', function(event) {
            var key = event.which;
            if ((key < 48 || key > 57) && key != 8) event.preventDefault();
        });

        $(document).on('input', '.price', function(event) {
            console.log(event.currentTarget.value);
            var nStr = event.currentTarget.value + '';
            nStr = nStr.replace(/\,/g, "");
            x = nStr.split('.');
            x1 = x[0];
            x2 = x.length > 1 ? '.' + x[1] : '';
            var rgx = /(\d+)(\d{3})/;
            while (rgx.test(x1)) {
                x1 = x1.replace(rgx, '$1' + ',' + '$2');
            }
            event.currentTarget.value = x1 + x2;
            // Hapus baris yang ditekan tombol hapus
            let index = $('.price').index(this);
            let total = 0;
            let tax = isNaN(parseInt($(`.tax:eq(` + index + `)`).val())) ? 0 : parseInt($(`.tax:eq(` + index + `)`).val().replaceAll(',', ''));
            let price = parseInt($(this).val().replaceAll(',', ''));
            console.log(price);
            let totalPrice = price + tax;
            console.log(totalPrice);
            console.log(format(totalPrice));
            $(`.total_price:eq(` + index + `)`).val(isNaN(totalPrice) ? 0 : format(totalPrice));
            getTotal();

        });

        $(document).on('input', '.tax', function(event) {
            console.log(event.currentTarget.value);
            var nStr = event.currentTarget.value + '';

            nStr = nStr.replace(/\,/g, "");
            x = nStr.split('.');
            x1 = x[0];
            x2 = x.length > 1 ? '.' + x[1] : '';
            var rgx = /(\d+)(\d{3})/;
            while (rgx.test(x1)) {
                x1 = x1.replace(rgx, '$1' + ',' + '$2');
            }
            event.currentTarget.value = x1 + x2;
            // Hapus baris yang ditekan tombol hapus
            let index = $('.tax').index(this);
            let total = 0;
            let price = parseInt($(`.price:eq(` + index + `)`).val().replaceAll(',', ''));
            let tax = parseInt($(this).val().replaceAll(',', ''));
            let totalPrice = price + tax;
            // console.log(format(totalPrice));
            $(`.total_price:eq(` + index + `)`).val(isNaN(totalPrice) ? 0 : format(totalPrice));
            getTotal();

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
            let kalimat = subkalimat = kata1 = kata2 = kata3 = "";
            let i = j = 0;

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
                                detail[input_index].tax = parseInt(input_value.replaceAll(',', ''));
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
                        datas.tenant_id = tenant;
                        datas.bank_id = bank;
                        datas.bank_id = bank;
                        datas.status = 'Terbuat';
                        datas.contract_date = tglKontrak
                        datas.opening_paragraph = "Bapak/Ibu Qwerty";
                        datas.invoice_due_date = tglJatuhTempo;
                        datas.addendum_date = tglAddendum;
                        datas.invoice_date = tglInvoice;
                        datas.grand_total = parseInt(grandTotal);
                        datas.materai_image = fileTtd
                        console.log(datas);

                        $.ajax({
                            url: baseUrl + "/api/invoice/",
                            type: "POST",
                            data: JSON.stringify(datas),
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
                    detail[input_index].tax = parseInt(input_value.replaceAll(',', ''));
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
            datas.tenant_id = tenant;
            datas.bank_id = bank;
            datas.status = 'Terbuat';
            datas.contract_date = tglKontrak
            datas.opening_paragraph = "Bapak/Ibu Qwerty";
            datas.invoice_due_date = tglJatuhTempo;
            datas.addendum_date = tglAddendum;
            datas.invoice_date = tglInvoice;
            datas.grand_total = grandTotal;
            datas.materai_image = fileTtd;
            localStorage.setItem("invoice", JSON.stringify(datas));
            window.location.href = "/invoice/preview-invoice"
        });

        $(document).on('click', '#batal', function(event) {
            event.preventDefault();
            localStorage.removeItem('invoice');
            window.location.href = "/invoice/list-invoice"
        });
    });

    function getTenant() {
        let idTenant = dataLocal.tenant_id;
        $.ajax({
            url: "{{url('api/tenant')}}/" + idTenant,
            type: "GET",
            success: function(response) {
                let data = response.data;
                console.log(data);
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
                <div class="col-12 d-flex align-items-center justify-content-between">
                    <div class="col-sm-2 mb-3 mx-2">
                        <label for="note" class="form-label fw-medium">Uraian</label>
                        <input type="text" name="uraian" class="form-control w-px-150 row-input" placeholder="" name="item[]" required value="` + details[i].item + `" />
                    </div>
                    <div class="col-sm-2 mb-3 mx-2">
                        <label for="note" class="form-label fw-medium">Keterangan</label>
                        <input type="text" class="form-control w-px-150 row-input" placeholder="" name="description[]" required value="` + details[i].description + `" />
                    </div>
                    <div class="col-sm-2 mb-3 mx-2">
                        <label for="note" class="form-label fw-medium">Dasar Pengenaan Pajak</label>
                        <input type="text" class="form-control w-px-150 row-input price" placeholder="" name="price[]" required value="` + format(details[i].price) + `"  />
                    </div>
                    <div class="col-sm-1 mb-3 mx-2">
                        <label for="note" class="form-label fw-medium">Pajak</label>
                        <input type="text" class="form-control w-150 row-input tax" placeholder="" name="tax[]" required  value="` + format(details[i].tax) + `" />
                    </div>
                    <div class="col-sm-2 mb-3 mx-2">
                        <label for="note" class="form-label fw-medium">Total (Rp.)</label>
                        <input type="text" class="form-control w-px-150 row-input total_price" placeholder="" name="total_price[]" disabled value="` + format(details[i].total_price) + `" />
                    </div>
                    <a class="mb-3 mx-2 mt-3 btn-remove-mg" role="button">
                        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12" fill="none">
                            <circle cx="6" cy="6" r="6" fill="#D9D9D9" />
                            <path d="M6.70432 5.99276L8.85224 3.8544C8.9463 3.76053 8.99915 3.63323 8.99915 3.50049C8.99915 3.36775 8.9463 3.24045 8.85224 3.14659C8.75818 3.05273 8.63061 3 8.49759 3C8.36456 3 8.23699 3.05273 8.14293 3.14659L6 5.28994L3.85707 3.14659C3.76301 3.05273 3.63544 3 3.50241 3C3.36939 3 3.24182 3.05273 3.14776 3.14659C3.0537 3.24045 3.00085 3.36775 3.00085 3.50049C3.00085 3.63323 3.0537 3.76053 3.14776 3.8544L5.29568 5.99276L3.14776 8.13113C3.10094 8.17747 3.06378 8.23259 3.03842 8.29334C3.01306 8.35408 3 8.41923 3 8.48503C3 8.55083 3.01306 8.61598 3.03842 8.67672C3.06378 8.73746 3.10094 8.79259 3.14776 8.83893C3.19419 8.88565 3.24944 8.92273 3.31031 8.94804C3.37118 8.97335 3.43647 8.98637 3.50241 8.98637C3.56836 8.98637 3.63365 8.97335 3.69452 8.94804C3.75539 8.92273 3.81063 8.88565 3.85707 8.83893L6 6.69558L8.14293 8.83893C8.18937 8.88565 8.24461 8.92273 8.30548 8.94804C8.36635 8.97335 8.43164 8.98637 8.49759 8.98637C8.56353 8.98637 8.62882 8.97335 8.68969 8.94804C8.75056 8.92273 8.80581 8.88565 8.85224 8.83893C8.89906 8.79259 8.93622 8.73746 8.96158 8.67672C8.98694 8.61598 9 8.55083 9 8.48503C9 8.41923 8.98694 8.35408 8.96158 8.29334C8.93622 8.23259 8.89906 8.17747 8.85224 8.13113L6.70432 5.99276Z" fill="#FF4747" />
                        </svg>
                    </a>
                </div>
            </div>`;
                getDetail = getDetail + temp;
            }
            $('#details').prepend(getDetail);
        } else {
            temp = `             
              <div class="row-mg">
                <div class="col-12 d-flex align-items-center justify-content-between">
                    <div class="col-sm-2 mb-3 mx-2">
                        <label for="note" class="form-label fw-medium">Uraian</label>
                        <input type="text" name="uraian" class="form-control w-px-150 row-input" placeholder="" name="item[]" required />
                        <div class="invalid-feedback">Tidak boleh kosong</div>
                    </div>
                    <div class="col-sm-2 mb-3 mx-2">
                        <label for="note" class="form-label fw-medium">Keterangan</label>
                        <input type="text" class="form-control w-px-150 row-input" placeholder="" name="description[]" required />
                        <div class="invalid-feedback">Tidak boleh kosong</div>
                    </div>
                    <div class="col-sm-2 mb-3 mx-2">
                        <label for="note" class="form-label fw-medium">Dasar Pengenaan Pajak</label>
                        <input type="text" class="form-control w-px-150 row-input price" placeholder="" name="price[]" required />
                        <div class="invalid-feedback">Tidak boleh kosong</div>
                    </div>
                    <div class="col-sm-1 mb-3 mx-2">
                        <label for="note" class="form-label fw-medium">Pajak</label>
                        <input type="text" class="form-control w-150 row-input tax" placeholder="" name="tax[]" required />
                        <div class="invalid-feedback">Tidak boleh kosong</div>
                    </div>
                    <div class="col-sm-2 mb-3 mx-2">
                        <label for="note" class="form-label fw-medium">Total (Rp.)</label>
                        <input type="text" class="form-control w-px-150 row-input total_price" placeholder="" name="total_price[]" disabled/>
                    </div>
                    <a class="mb-3 mx-2 mt-3 btn-remove-mg" role="button">
                        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12" fill="none">
                            <circle cx="6" cy="6" r="6" fill="#D9D9D9" />
                            <path d="M6.70432 5.99276L8.85224 3.8544C8.9463 3.76053 8.99915 3.63323 8.99915 3.50049C8.99915 3.36775 8.9463 3.24045 8.85224 3.14659C8.75818 3.05273 8.63061 3 8.49759 3C8.36456 3 8.23699 3.05273 8.14293 3.14659L6 5.28994L3.85707 3.14659C3.76301 3.05273 3.63544 3 3.50241 3C3.36939 3 3.24182 3.05273 3.14776 3.14659C3.0537 3.24045 3.00085 3.36775 3.00085 3.50049C3.00085 3.63323 3.0537 3.76053 3.14776 3.8544L5.29568 5.99276L3.14776 8.13113C3.10094 8.17747 3.06378 8.23259 3.03842 8.29334C3.01306 8.35408 3 8.41923 3 8.48503C3 8.55083 3.01306 8.61598 3.03842 8.67672C3.06378 8.73746 3.10094 8.79259 3.14776 8.83893C3.19419 8.88565 3.24944 8.92273 3.31031 8.94804C3.37118 8.97335 3.43647 8.98637 3.50241 8.98637C3.56836 8.98637 3.63365 8.97335 3.69452 8.94804C3.75539 8.92273 3.81063 8.88565 3.85707 8.83893L6 6.69558L8.14293 8.83893C8.18937 8.88565 8.24461 8.92273 8.30548 8.94804C8.36635 8.97335 8.43164 8.98637 8.49759 8.98637C8.56353 8.98637 8.62882 8.97335 8.68969 8.94804C8.75056 8.92273 8.80581 8.88565 8.85224 8.83893C8.89906 8.79259 8.93622 8.73746 8.96158 8.67672C8.98694 8.61598 9 8.55083 9 8.48503C9 8.41923 8.98694 8.35408 8.96158 8.29334C8.93622 8.23259 8.89906 8.17747 8.85224 8.13113L6.70432 5.99276Z" fill="#FF4747" />
                        </svg>
                    </a>
                </div>
            </div>`;
            $('#details').prepend(temp);
        }
    }
</script>
@endsection