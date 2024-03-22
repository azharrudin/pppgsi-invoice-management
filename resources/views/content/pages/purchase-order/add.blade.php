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
    <form id="create-purchase-order" class="create-purchase-order" novalidate>
        <div class="row invoice-add">
            <!-- Invoice Add-->
            <div class="col-lg-9 col-12 mb-lg-0 mb-3">
                <div class="card invoice-preview-card">
                    <div class="card-body">
                        <div style="background-image: url('{{asset('assets/img/header.png')}}'); height : 150px; background-size: contain; background-repeat: no-repeat;">
                        </div>

                        <h2 class="mx-auto text-center"><b>PURCHASE ORDER</b></h2>
                        <div class="row  m-0 px-3">
                            <div class="col-md-6 mb-md-0 ps-0">
                                <dl class="row mb-2 d-flex align-items-center">
                                    <dt class="col-sm-4">
                                        <span class="fw-normal">Nomor PO</span>
                                    </dt>
                                    <dd class="col-sm-8 ">
                                        <div class="input-group input-group-merge">
                                            <input type="text" class="form-control date" placeholder="Nomor" disabled>
                                        </div>
                                    </dd>
                                </dl>
                                <dl class="row mb-2 d-flex align-items-center">
                                    <dt class="col-sm-4">
                                        <span class="fw-normal">Tanggal </span>
                                    </dt>
                                    <dd class="col-sm-8 ">
                                        <input type="text" class="form-control date" placeholder="Tanggal" id="purchase_order_date" name="purchase_order_date" required>
                                        <div class="invalid-feedback">Tidak boleh kosong</div>
                                    </dd>
                                </dl>
                                <dl class="row mb-2 d-flex align-items-center">
                                    <dt class="col-sm-4">
                                        <span class="fw-normal">Perihal</span>
                                    </dt>
                                    <dd class="col-sm-8 ">
                                        <input type="text" class="form-control " placeholder="Perihal" id="about" name="about" required>
                                        <div class="invalid-feedback">Tidak boleh kosong</div>
                                    </dd>
                                </dl>
                                <div class="mb-3">
                                    <label for="invoice-message" class="form-label">Nama Vendor</label>
                                    <br>
                                    <select name="vendor" id="vendor_id" name="vendor_id" class="mb-3" required>
                                    </select>
                                    <div class="invalid-feedback">Tidak boleh kosong</div>
                                </div>
                            </div>
                        </div>

                        <div class="row px-3">
                            <div class="col-12">
                                <textarea class="form-control" name="note" id="note" cols="3" rows="8" placeholder="Penjelasan untuk permintaan ISI PURCHASING ORDER" required></textarea>
                                <div class="invalid-feedback">Tidak boleh kosong</div>
                            </div>
                        </div>


                        <div class="py-3 px-3">
                            <div class="card academy-content shadow-none border p-3">
                                {{-- Tambah Baris --}}
                                <div class="table-responsive">
                                    <div class="" id="details">
                                    </div>

                                    <div class="row pb-4">
                                        <div class="col-12">
                                            <button type="button" class="btn btn-primary waves-effect waves-light btn-add-row-mg mt-2">Tambah Baris</button>
                                        </div>
                                    </div>
                                </div>

                                {{-- Divider --}}
                                <div class="row py-3 px-3">
                                    <hr class="my-3 mx-auto">
                                </div>

                                <div class="row p-0 p-sm-4">
                                    <div class="col-md-6 mb-md-0 mb-3">

                                    </div>
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="d-flex justify-content-between mb-2">
                                                    <span class="w-px-100">Total</span>
                                                    <span class="fw-medium grand_total"></span>
                                                </div>
                                                <hr>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-md-12 mb-2">
                                        <label for="note" class="form-label fw-medium">Terbilang</label>
                                        <input type="text" class="form-control terbilang" id="grand_total_spelled" name="grand_total_spelled" placeholder="Terbilang" disabled />
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-md-0 mb-3">
                                        <div class="mb-3">
                                            <label for="note" class="form-label fw-medium me-2">Syarat & Ketentuan</label>
                                            <textarea class="form-control" rows="11" id="term_and_conditions" name="term_and_conditions" placeholder="Termin pembayaran, garansi dll" required></textarea>
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

            <!-- purchase req Actions -->
            <div class="col-lg-3 col-12 purchase-req-actions">
                <div class="card mb-4">
                    <div class="card-body">
                        <button type="submit" id="save" class="btn btn-primary d-grid w-100 mb-2">Simpan</button>
                        <!-- <button class="btn btn-label-secondary d-grid w-100 mb-2 btn-preview">Preview</button> -->
                        <button type="button" id="batal" class="btn btn-label-secondary btn-cancel d-grid w-100">Kembali</button>
                    </div>
                </div>
            </div>
            <!-- /purchase req Actions -->
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
    $(document).ready(function() {
        getDetails();
        setDate();
        $("#tax-0").select2({
            placeholder: 'Pajak ',
            allowClear: true,
            ajax: {
                url: "{{ env('BASE_URL_API')}}" + '/api/tax/select',
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

    $(document).on('click', '#batal', function(event) {
        event.preventDefault();
        window.location.href = "/request/purchase-order";
    });

    var savePurchaseOrder = $('.create-purchase-order');

    Array.prototype.slice.call(savePurchaseOrder).forEach(function(form) {
        $('.indicator-progress').hide();
        $('.indicator-label').show();
        form.addEventListener(
            "submit",
            function(event) {
                if (!form.checkValidity()) {
                    event.preventDefault();
                    event.stopPropagation();
                    // let tenant = $("#tenant").val();
                    // let bank = $("#bank").val();
                    // let tglKontrak = $("#contract_date").val();

                    // if (!tenant) {
                    //     $("#tenant").addClass("invalid");
                    // }
                    // if (!bank) {
                    //     $("#bank").addClass("invalid");
                    // }

                } else {
                    Swal.fire({
                        title: '<h2>Loading...</h2>',
                        html: sweet_loader + '<h5>Please Wait</h5>',
                        showConfirmButton: false,
                        allowOutsideClick: false,
                        allowEscapeKey: false
                    });
                    // Submit your form
                    event.preventDefault();
                    let tenant = $("#tenant").val();
                    let purchaseOrderDate = $("#purchase_order_date").val();
                    let about = $("#about").val();
                    let vendorId = $("#vendor_id").val();
                    let note = $("#note").val();
                    let grandTotalSpelled = $("#grand_total_spelled").val();
                    let grandTotal = parseInt($(".grand_total").text().replaceAll(',', ''));
                    let termAndConditions = $("#term_and_conditions").val();

                    var detail = [];
                    $('.row-input').each(function(index) {
                        var input_name = $(this).attr('name');
                        var input_value = $(this).val();
                        var input_index = Math.floor(index / 8); // Membagi setiap 5 input menjadi satu objek pada array
                        if (index % 8 == 0) {
                            detail[input_index] = {
                                number: parseInt(input_value)
                            };
                        } else if (index % 8 == 1) {
                            detail[input_index].name = input_value;
                        } else if (index % 8 == 2) {
                            detail[input_index].specification = input_value;
                        } else if (index % 8 == 3) {
                            detail[input_index].quantity = parseInt(input_value);
                        } else if (index % 8 == 4) {
                            detail[input_index].units = input_value;
                        } else if (index % 8 == 5) {
                            detail[input_index].price = parseInt(input_value.replaceAll(',', ''));
                        } else if (index % 8 == 6) {
                            detail[input_index].tax = parseInt(input_value);
                        } else if (index % 8 == 7) {
                            detail[input_index].total_price = parseInt(input_value.replaceAll(',', ''));
                        }
                    });

                    let datas = {};
                    // $('.create-invoice').find('.form-control').each(function() {
                    //     var inputId = $(this).attr('id');
                    //     var inputValue = $("#" + inputId).val();
                    //     datas[$("#" + inputId).attr("name")] = inputValue;
                    // });

                    datas.details = detail;
                    datas.vendor_id = parseInt(vendorId);
                    datas.status = "Terbuat";
                    datas.about = about;
                    datas.grand_total = parseInt(grandTotal);
                    datas.purchase_order_date = purchaseOrderDate;
                    datas.grand_total_spelled = grandTotalSpelled;
                    datas.term_and_conditions = termAndConditions;
                    datas.note = note;
                    // delete datas['undefined'];
                    console.log(datas);

                    $.ajax({
                        url: "{{url('api/purchase-order')}}",
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
                                text: 'Berhasil menambahkan Purchase Order',
                                icon: 'success',
                                customClass: {
                                    confirmButton: 'btn btn-primary'
                                },
                                buttonsStyling: false
                            }).then(function() {
                                window.location.href = "/request/purchase-order";
                            });
                        },
                        error: function(xhr, status, error) {
                            console.log(error);
                            Swal.fire({
                                title: 'Error!',
                                text: ' xhr.responseText!',
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
        let quantity = isNaN(parseInt($(`.quantity:eq(` + index + `)`).val())) ? 0 : parseInt($(`.quantity:eq(` + index + `)`).val());
        if (id == 0) {
            $(`.total_price:eq(` + index + `)`).val(isNaN(0) ? 0 : format(0));
            getTotal();
        } else {
            $.ajax({
                url: "{{ env('BASE_URL_API')}}" + '/api/tax/' + id,
                type: "get",
                contentType: "application/json; charset=utf-8",
                dataType: "json",
                success: function(response) {
                    let data = response.data.rate;
                   
                    console.log(quantity);
                    let tax = parseInt(data);
                    tax = tax / 100;
                    let totalPrice = ((price * quantity) * tax) + (price * quantity);
                    console.log(totalPrice);
                    $(`.total_price:eq(` + index + `)`).val(isNaN(totalPrice) ? 0 : format(totalPrice));
                    getTotal();
                },
                error: function(errors) {
                    console.log(errors);
                }
            });
        };
    });

    $(document).on('input', '.quantity', function(event) {
        let index = $('.quantity').index(this);
        let total = 0;
        let quantity = parseInt($(this).val());
        let price = isNaN(parseInt($(`.price:eq(` + index + `)`).val().replaceAll(',', ''))) ? 0 : parseInt($(`.price:eq(` + index + `)`).val().replaceAll(',', ''));
        console.log(price);
        let id = isNaN(parseInt($(`.tax:eq(` + index + `)`).val())) ? 0 : parseInt($(`.tax:eq(` + index + `)`).val().replaceAll(',', ''));
        if (price == 0) {
            $(`.total_price:eq(` + index + `)`).val(isNaN(price) ? 0 : format(price));
            getTotal();
        } else {
            $.ajax({
                url: "{{ env('BASE_URL_API')}}" + '/api/tax/' + id,
                type: "get",
                contentType: "application/json; charset=utf-8",
                dataType: "json",
                success: function(response) {
                    let data = response.data.rate;
                    console.log(quantity);
                    let tax = parseInt(data);
                    tax = tax / 100;
                    let totalPrice = ((price * quantity) * tax) + (price * quantity);
                    console.log(totalPrice);
                    $(`.total_price:eq(` + index + `)`).val(isNaN(totalPrice) ? 0 : format(totalPrice));
                    getTotal();
                },
                error: function(errors) {
                    console.log(errors);
                }
            });
        };
    });

    $(document).on('input', '.tax', function(event) {
        let id = event.currentTarget.value;
        let index = $('.tax').index(this);
        let data = 0;
        $.ajax({
            url: "{{ env('BASE_URL_API')}}" + '/api/tax/' + id,
            type: "get",
            contentType: "application/json; charset=utf-8",
            dataType: "json",
            success: function(response) {
                let data = response.data.rate;
                console.log($(this));
                let total = 0;
                let price = parseInt($(`.price:eq(` + index + `)`).val().replaceAll(',', ''));
                let quantity = parseInt($(`.quantity:eq(` + index + `)`).val());
                let tax = parseInt(data);
                tax = tax / 100;
                let totalPrice = ((price * quantity) * tax) + (price * quantity);
                console.log(totalPrice);
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


    $(document).on('click', '.btn-remove-mg', function() {
        // Hapus baris yang ditekan tombol hapus
        $(this).closest('.row-mg').remove();
        getTotal();
    });

    $(document).keypress(
        function(event){
            if (event.which == '13') {
                event.preventDefault();
            }
        }
    );

    $(document).on('click', '.btn-add-row-mg', function(e) {
        e.preventDefault();
        // Clone baris terakhir
        var index = lastIndex ? lastIndex + 1 : $('.tax').length;
        lastIndex = index;
        var $details = $('#details');
        var $newRow = `
            <table class="table row-mg">
                <tbody>
                    <tr>
                        <td>
                            <input type="number" class="form-control row-input" placeholder="Nomor" name="number[]" required style="width: 200px;" />
                            <div class="invalid-feedback">Tidak boleh kosong</div>
                        </td>
                        <td>
                            <input type="text" class="form-control row-input" placeholder="Nama Barang" name="name[]" required style="width: 200px;" />
                            <div class="invalid-feedback">Tidak boleh kosong</div>
                        </td>
                        <td>
                            <input type="text" class="form-control row-input" placeholder="Spesifikasi" name="specification[]" required style="width: 200px;" />
                            <div class="invalid-feedback">Tidak boleh kosong</div>
                        </td>
                        <td>
                            <input type="number" class="quantity form-control row-input" placeholder="Quantity" name="quantity[]" required style="width: 200px;" />
                            <div class="invalid-feedback">Tidak boleh kosong</div>
                        </td>
                        <td>
                            <input type="text" class="form-control row-input" placeholder="Satuan" name="units[]" required style="width: 200px;" />
                            <div class="invalid-feedback">Tidak boleh kosong</div>
                        </td>
                        <td>
                            <input type="text" class="form-control row-input price" placeholder="Harga Satuan" name="price[]" required style="width: 200px;" />
                            <div class="invalid-feedback">Tidak boleh kosong</div>
                        </td>
                        <td>
                            <select class="form-control row-input tax" placeholder="" name="tax[]" id="tax-${index}" required></select>
                            <div class="invalid-feedback">Tidak boleh kosong</div>
                        </td>
                        <td>
                            <input type="text" disabled class="form-control row-input total_price" placeholder="Jumlah" name="total_price[]" required style="width: 200px;" />
                            <div class="invalid-feedback">Tidak boleh kosong</div>
                        </td>
                        <td>
                            <a role="button" class="btn btn-primary text-center btn-remove-mg text-white ms-4" disabled>
                                <i class="fas fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                </tbody>
            </table>`;
        $details.append($newRow);
        $("#tax-" + index).select2({
            placeholder: 'Pilih',
            allowClear: true,
            ajax: {
                url: "{{ env('BASE_URL_API')}}" + '/api/tax/select',
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

    function getDetails() {
        let getDetail = '';
        let temp = '';
        temp = `            
            <table class="table row-mg">
                <thead>
                    <tr>
                        <th>Nomor</th>
                        <th>Nama Barang</th>
                        <th>Spesifikasi</th>
                        <th>Quantity</th>
                        <th>Satuan</th>
                        <th>Harga Satuan</th>
                        <th>Pajak</th>
                        <th>Jumlah</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <input type="number" class="form-control row-input" placeholder="Nomor" name="number[]" required style="width: 200px;" />
                            <div class="invalid-feedback">Tidak boleh kosong</div>
                        </td>
                        <td>
                            <input type="text" class="form-control row-input" placeholder="Nama Barang" name="name[]" required style="width: 200px;" />
                            <div class="invalid-feedback">Tidak boleh kosong</div>
                        </td>
                        <td>
                            <input type="text" class="form-control row-input" placeholder="Spesifikasi" name="specification[]" required style="width: 200px;" />
                            <div class="invalid-feedback">Tidak boleh kosong</div>
                        </td>
                        <td>
                            <input type="number" class="quantity form-control row-input" placeholder="Quantity" name="quantity[]" required style="width: 200px;" />
                            <div class="invalid-feedback">Tidak boleh kosong</div>
                        </td>
                        <td>
                            <input type="text" class="form-control row-input" placeholder="Satuan" name="units[]" required style="width: 200px;" />
                            <div class="invalid-feedback">Tidak boleh kosong</div>
                        </td>
                        <td>
                            <input type="text" class="form-control row-input price" placeholder="Harga Satuan" name="price[]" required style="width: 200px;" />
                            <div class="invalid-feedback">Tidak boleh kosong</div>
                        </td>
                        <td>
                            <select class="form-control row-input tax" placeholder="Pajak" name="tax[]" id="tax-0" required></select>
                            <div class="invalid-feedback">Tidak boleh kosong</div>
                        </td>
                        <td>
                            <input type="text" disabled class="form-control row-input total_price" placeholder="Jumlah" name="total_price[]" required style="width: 200px;" />
                            <div class="invalid-feedback">Tidak boleh kosong</div>
                        </td>
                        <td>
                            <a role="button" class="btn btn-primary text-center btn-remove-mg text-white ms-4" disabled>
                                <i class="fas fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                </tbody>
            </table> `;
        $('#details').prepend(temp);

    };




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


    $("#vendor_id").select2({
        placeholder: 'Select Vendor',
        allowClear: true,
        ajax: {
            url: "{{ env('BASE_URL_API')}}" + '/api/vendor/select',
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
</script>
@endsection