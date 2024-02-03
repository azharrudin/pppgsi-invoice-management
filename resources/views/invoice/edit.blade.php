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
                        <div style="background-image: url('{{ asset('assets/img/header.png') }}'); height : 150px; background-size: contain; background-repeat: no-repeat;" class="set-back">
                        </div>

                        <div class="row  px-3">
                            <div class="col-md-6">
                                <label for="select2Primary" class="form-label">Kepada Yth, </label>
                                <br>
                                <div class="col-md-8 mb-3">
                                    <select name="tenant" id="tenant" name="tenant" class="mb-3" required>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row d-flex justify-content-end">
                                    <div class="col-md-6 mb-3">
                                        <label for="note" class="form-label fw-medium">No. Invoice</label>
                                        <input type="text" class="form-control" id="invoice_number" name="invoice_number" placeholder="" readonly />
                                        <div class="invalid-feedback">Tidak boleh kosong</div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="invoice_date" class="form-label fw-medium">Tgl. Invoice</label>
                                        <input type="text" class="form-control date" name="invoice_date" id="invoice_date" placeholder="" required />
                                        <div class="invalid-feedback">Tidak boleh kosong</div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="contract_number" class="form-label fw-medium">No. Kontrak</label>
                                        <input type="text" class="form-control" name="contract_number" id="contract_number" placeholder="" required />
                                        <div class="invalid-feedback">Tidak boleh kosong</div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="contract_date" class="form-label fw-medium">Tanggal</label>
                                        <input type="text" class="form-control  date" name="contract_date" id="contract_date" placeholder="" required />
                                        <div class="invalid-feedback">Tidak boleh kosong</div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="addendum_number" class="form-label fw-medium">No. Addendum</label>
                                        <input type="text" class="form-control" name="addendum_number" id="addendum_number" placeholder="" required />
                                        <div class="invalid-feedback">Tidak boleh kosong</div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="addendum_date" class="form-label fw-medium">Tanggal</label>
                                        <input type="text" class="form-control date" id="addendum_date" name="addendum_date" placeholder="" required />
                                        <div class="invalid-feedback">Tidak boleh kosong</div>
                                    </div>
                                </div>
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
                            <div class="col-md-6 mb-md-0 mb-3 d-flex flex-column align-items-center text-center data-materai">
                                <div class="mb-3">
                                    <label for="note" class="form-label fw-medium">Tanda Tangan & Meterai</label>
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
                        <button class="btn btn-primary d-grid w-100 mb-2 kirim-invoice d-none" data-bs-toggle="offcanvas" data-bs-target="#sendInvoiceOffcanvas">
                            <span class="d-flex align-items-center justify-content-center text-nowrap d-none"><i class="ti ti-send ti-xs me-2"></i>Kirim Invoice</span>
                        </button>
                        <button type="submit" id="save" class="btn btn-primary btn-update d-grid w-100 mb-2"><span class="d-flex align-items-center justify-content-center text-nowrap"><i class="fa fa-save fa-xs me-2"></i>Simpan</span></button>
                        <button type="button" id="preview" class="btn btn-success d-grid w-100 mb-2"><span class="d-flex align-items-center justify-content-center text-nowrap"><i class="ti ti-eye ti-xs me-2"></i>Preview</span></button>
                        <button type="button" id="batal" class="btn btn-secondary d-grid w-100">Kembali</button>
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
    "use strict";

    let account = {!! json_encode(session('data')) !!}

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    let data;

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

    var urlSegments = window.location.pathname.split('/');
    var idIndex = urlSegments.indexOf('edit') + 1;
    var id = urlSegments[idIndex];
    let dataLocal = JSON.parse(localStorage.getItem("edit-invoice"));
    let ttdFile = dataLocal ? dataLocal.materai_image : null;

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

    $(document).ready(function() {
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
                url: "{{ env('BASE_URL_API')}}" +'/api/tenant/select?field=company',
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
                url: "{{ env('BASE_URL_API')}}" +'/api/bank/select',
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

        function getTenant(id) {
            $.ajax({
                url: "{{url('api/tenant')}}/" + id,
                type: "GET",
                success: function(response) {
                    let data = response.data;
                    $("#tenant").empty().append("<option value="+data.id+">"+data.name+"</option>").val(data.id).trigger("change");
                },
                error: function(xhr, status, error) {
                    console.log(error);
                }
            });
        }

        function getBank(id) {
            $.ajax({
                url: "{{url('api/bank')}}/" + id,
                type: "GET",
                success: function(response) {
                    let data = response.data;
                    $("#bank").empty().append("<option value="+data.id+">"+data.name+"</option>").val(data.id).trigger("change");
                },
                error: function(xhr, status, error) {
                    console.log(error);
                }
            });
        }

        if (dataLocal) {
            $("#invoice_number").val(dataLocal.invoice_number);
            $("#invoice_date").val(dataLocal.invoice_date);
            $("#contract_number").val(dataLocal.contract_number);
            $("#contract_date").val(dataLocal.contract_date);
            $("#addendum_number").val(dataLocal.addendum_number);
            $("#addendum_date").val(dataLocal.addendum_date);
            $("#grand_total_spelled").val(dataLocal.grand_total_spelled);
            $(".grand_total").text(format(dataLocal.grand_total));
            $("#invoice_due_date").val(dataLocal.invoice_due_date);
            $("#term_and_conditions").val(dataLocal.term_and_conditions);
            $("#materai_date").val(dataLocal.materai_date);
            $("#materai_name").val(dataLocal.materai_name);


            if (dataLocal.tenant_id) {
                getTenant(dataLocal.tenant_id);
            }
            if (dataLocal.bank_id) {
                getBank(dataLocal.bank_id);
            }

            const myDropzone = new Dropzone('#dropzone-basic', {
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
                    if (dataLocal) {
                        let mockFile = {
                            dataURL: dataLocal.materai_image
                        };
                        if (dataLocal.materai_image) {
                            this.options.addedfile.call(this, mockFile);
                            this.options.thumbnail.call(this, mockFile, dataLocal.materai_image.dataURL);
                            $('.dz-image').last().find('img').attr('width', '100%');
                            // Optional: Handle the removal of the file
                            mockFile.previewElement.querySelector(".dz-remove").addEventListener("click", function() {
                                // Handle removal logic here
                            });
                        }
                    } else {
                        let mockFile = {
                            dataURL: data.materai_image
                        };
                        if (data.materai_image) {
                            this.options.addedfile.call(this, mockFile);
                            this.options.thumbnail.call(this, mockFile, data.materai_image);
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

            getDetails(dataLocal.details);

        } else {
            getDataInvoice(id);
        }

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
                        <select class="form-control row-input tax" placeholder="" id="tax-${index}" required></select>
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
                    url: "{{ env('BASE_URL_API')}}" +'/api/tax/select',
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


        $(document).on('click', '.btn-remove-mg', function() {
            // Hapus baris yang ditekan tombol hapus
            $(this).closest('.row-mg').remove();
            getTotal();
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
                    url: "{{ env('BASE_URL_API')}}" +'/api/tax/'+ id,
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
                url: "{{ env('BASE_URL_API')}}" +'/api/tax/'+ id,
                type: "get",
                contentType: "application/json; charset=utf-8",
                dataType: "json",
                success: function(response) {
                    let data = response.data.rate;
                    let total = 0;
                    let price = parseInt($(`.price:eq(` + index + `)`).val().replaceAll(',', ''));
                    let tax = parseInt(data);
                    tax = tax / 100;
                    let totalPrice = price * tax + price;
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
            let kalimat, subkalimat , kata1 , kata2 , kata3 = "";
            let i , j = 0;

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
                        let grandTotal = $(".grand_total").text().replaceAll(',', '');
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
                        if(account.level.id == '1'){
                            datas.status = "Disetujui BM";
                        }else{
                            datas.status = "Terbuat";
                        }
                        datas.contract_date = tglKontrak
                        datas.opening_paragraph = "Bapak/Ibu Qwerty";
                        datas.invoice_due_date = tglJatuhTempo;
                        datas.addendum_date = tglAddendum;
                        datas.invoice_date = tglInvoice;
                        datas.grand_total = parseInt(grandTotal);
                        datas.materai_image = fileTtd;
                        delete datas['undefined'];
                        
                        $.ajax({
                            url: "{{ env('BASE_URL_API')}}" +'/api/invoice/'+ id,
                            type: "PATCH",
                            data: JSON.stringify(datas),
                            contentType: "application/json; charset=utf-8",
                            dataType: "json",
                            beforeSend: function() {
                                Swal.fire({
                                    title: '<h2>Loading...</h2>',
                                    html: sweet_loader + '<h5>Please Wait</h5>',
                                    showConfirmButton: false,
                                    allowOutsideClick: false,
                                    allowEscapeKey: false
                                });
                            },
                            success: function(response) {
                                $('.indicator-progress').show();
                                $('.indicator-label').hide();

                                Swal.fire({
                                    title: 'Berhasil',
                                    text: 'Berhasil Memperbaharui Invoice',
                                    icon: 'success',
                                    customClass: {
                                        confirmButton: 'btn btn-primary'
                                    },
                                    buttonsStyling: false
                                }).then(function() {
                                    localStorage.removeItem('edit-invoice');
                                    window.location.href = "/invoice/list-invoice"
                                });
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
            localStorage.setItem("edit-invoice", JSON.stringify(datas));
            window.location.href = `/invoice/preview-invoice-edit/${id}`
        });

        $(document).on('click', '#batal', function(event) {
            event.preventDefault();
            localStorage.removeItem("edit-invoice");
            window.location.href = "/invoice/list-invoice"
        });
    });

    function getDataInvoice(id) {
        Swal.fire({
            title: '<h2>Loading...</h2>',
            html: sweet_loader + '<h5>Please Wait</h5>',
            showConfirmButton: false,
            allowOutsideClick: false,
            allowEscapeKey: false
        });
        $.ajax({
            url: "{{ env('BASE_URL_API')}}" +'/api/invoice/'+ id,
            type: "GET",
            dataType: "json",
            success: function(res) {
                let data = res.data;
                const myDropzone = new Dropzone('#dropzone-basic', {
                    parallelUploads: 1,
                    maxFilesize: 3,
                    addRemoveLinks: true,
                    maxFiles: 1,
                    acceptedFiles: ".jpeg,.jpg,.png,.gif",
                    autoQueue: false,
                    url: "../uploads/logo",
                    thumbnailWidth: 250,
                    thumbnailHeight: 250,
                    init: function() {
                        if (dataLocal) {
                            let mockFile = {
                                dataURL: dataLocal.materai_image
                            };
                            if (dataLocal.materai_image) {
                                this.options.addedfile.call(this, mockFile);
                                this.options.thumbnail.call(this, mockFile, dataLocal.materai_image);
                                // Optional: Handle the removal of the file
                                $('.dz-image').last().find('img').attr('width', '100%');

                                mockFile.previewElement.querySelector(".dz-remove").addEventListener("click", function() {
                                    // Handle removal logic here
                                });
                            }
                        } else {
                            let mockFile = {
                                dataURL: data.materai_image
                            };

                            ttdFile = mockFile
                            if (data.materai_image) {
                                this.options.addedfile.call(this, mockFile);
                                this.options.thumbnail.call(this, mockFile, data.materai_image);

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
                $("#tenant").empty().append("<option value="+data.tenant.id+">"+data.tenant.name+"</option>").val(data.tenant.id).trigger("change");
                $("#bank").empty().append("<option value="+data.bank.id+">"+data.bank.name+"</option>").val(data.bank.id).trigger("change");
                $("#invoice_number").val(data.invoice_number);
                $("#invoice_date").val(data.invoice_date);
                $("#contract_number").val(data.contract_number);
                $("#contract_date").val(data.contract_date);
                $("#addendum_number").val(data.addendum_number);
                $("#addendum_date").val(data.addendum_date);
                $("#grand_total_spelled").val(data.grand_total_spelled);
                $(".grand_total").text(format(data.grand_total));
                $("#invoice_due_date").val(data.invoice_due_date);
                $("#term_and_conditions").val(data.term_and_conditions);
                $("#materai_date").val(data.materai_date);
                $("#materai_name").val(data.materai_name);
                getDetails(data.invoice_details);
                if(data.status != 'Disetujui BM'){
                    $('.kirim-invoice').attr('style','display:none !important');
                    $('.add-payment').attr('style','display:none !important');
                }
                if(account.level.id != '1'){
                    $('.data-materai').attr('style','display:none !important');
                }
                if(account.level.id == '1'){
                    $('.btn-remove-mg').addClass('d-none');
                    $('.btn-add-row-mg').addClass('d-none');
                    $(".btn-update span").html('<i class="ti ti-check ti-xs me-2"></i>Disetujui Kepala BM');
                    $('#materai_name').attr('readonly',true);
                }
                Swal.close();
            },
            error: function(errors) {
                console.log(errors);
            }
        });
    }


    function getDetails(detailItems) {
        let details = detailItems;
        let getDetail = '';
        let temp = '';

        if (details) {
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
                            <input type="text" class="form-control row-input price" placeholder="" name="price[]" required value="` + format(details[i].price) + `"/>
                            <div class="invalid-feedback">Tidak boleh kosong</div>
                        </div>
                        <div class="col-md-2 px-1-custom">
                            <label for="note" class="form-label fw-medium">Pajak</label>
                            <select class="form-control row-input tax" placeholder="" id="tax-${i}" required></select>
                            <div class="invalid-feedback">Tidak boleh kosong</div>
                        </div>
                        <div class="col-md-2 px-1-custom">
                            <label for="note" class="form-label fw-medium">Total (Rp.)</label>
                            <input type="text" class="form-control row-input total_price" placeholder="" name="total_price[]" disabled value="` + format(details[i].total_price) + `"/>
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
                    url: "{{ env('BASE_URL_API')}}" +'/api/tax/'+ details[i].tax_id,
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
                        url: "{{ env('BASE_URL_API')}}" +'/api/tax/select',
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
        }
        // } else {
        //     temp = `             
        //       <div class="row-mg">
        //         <div class="col-12 d-flex align-items-center justify-content-between">
        //             <div class="col-sm-2 mb-3 mx-2">
        //                 <label for="note" class="form-label fw-medium">Uraian</label>
        //                 <input type="text" name="uraian" class="form-control w-px-150 row-input" placeholder="" name="item[]" required />
        //                 <div class="invalid-feedback">Tidak boleh kosong</div>
        //             </div>
        //             <div class="col-sm-2 mb-3 mx-2">
        //                 <label for="note" class="form-label fw-medium">Keterangan</label>
        //                 <input type="text" class="form-control w-px-150 row-input" placeholder="" name="description[]" required />
        //                 <div class="invalid-feedback">Tidak boleh kosong</div>
        //             </div>
        //             <div class="col-sm-2 mb-3 mx-2">
        //                 <label for="note" class="form-label fw-medium">Dasar Pengenaan Pajak</label>
        //                 <input type="text" class="form-control w-px-150 row-input price" placeholder="" name="price[]" required />
        //                 <div class="invalid-feedback">Tidak boleh kosong</div>
        //             </div>
        //             <div class="col-sm-1 mb-3 mx-2">
        //                 <label for="note" class="form-label fw-medium">Pajak</label>
        //                 <input type="text" class="form-control w-150 row-input tax" placeholder="" name="tax[]" required />
        //                 <div class="invalid-feedback">Tidak boleh kosong</div>
        //             </div>
        //             <div class="col-sm-2 mb-3 mx-2">
        //                 <label for="note" class="form-label fw-medium">Total (Rp.)</label>
        //                 <input type="text" class="form-control w-px-150 row-input total_price" placeholder="" name="total_price[]" disabled/>
        //             </div>
        //             <a class="mb-3 mx-2 mt-3 btn-remove-mg" role="button">
        //                 <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12" fill="none">
        //                     <circle cx="6" cy="6" r="6" fill="#D9D9D9" />
        //                     <path d="M6.70432 5.99276L8.85224 3.8544C8.9463 3.76053 8.99915 3.63323 8.99915 3.50049C8.99915 3.36775 8.9463 3.24045 8.85224 3.14659C8.75818 3.05273 8.63061 3 8.49759 3C8.36456 3 8.23699 3.05273 8.14293 3.14659L6 5.28994L3.85707 3.14659C3.76301 3.05273 3.63544 3 3.50241 3C3.36939 3 3.24182 3.05273 3.14776 3.14659C3.0537 3.24045 3.00085 3.36775 3.00085 3.50049C3.00085 3.63323 3.0537 3.76053 3.14776 3.8544L5.29568 5.99276L3.14776 8.13113C3.10094 8.17747 3.06378 8.23259 3.03842 8.29334C3.01306 8.35408 3 8.41923 3 8.48503C3 8.55083 3.01306 8.61598 3.03842 8.67672C3.06378 8.73746 3.10094 8.79259 3.14776 8.83893C3.19419 8.88565 3.24944 8.92273 3.31031 8.94804C3.37118 8.97335 3.43647 8.98637 3.50241 8.98637C3.56836 8.98637 3.63365 8.97335 3.69452 8.94804C3.75539 8.92273 3.81063 8.88565 3.85707 8.83893L6 6.69558L8.14293 8.83893C8.18937 8.88565 8.24461 8.92273 8.30548 8.94804C8.36635 8.97335 8.43164 8.98637 8.49759 8.98637C8.56353 8.98637 8.62882 8.97335 8.68969 8.94804C8.75056 8.92273 8.80581 8.88565 8.85224 8.83893C8.89906 8.79259 8.93622 8.73746 8.96158 8.67672C8.98694 8.61598 9 8.55083 9 8.48503C9 8.41923 8.98694 8.35408 8.96158 8.29334C8.93622 8.23259 8.89906 8.17747 8.85224 8.13113L6.70432 5.99276Z" fill="#FF4747" />
        //                 </svg>
        //             </a>
        //         </div>
        //     </div>`;
        //     $('#details').prepend(temp);
        // }



    }
</script>
@endsection