@php
$configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Invoice')

@section('page-style')
{{-- Page Css files --}}
<link rel="stylesheet" href="{{asset('assets/vendor/libs/select2/select2.css')}}">
@endsection

@section('content')
<!-- Content -->
<div class="container-xxl flex-grow-1 container-p-y">

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
                                    <label for="select2Primary">Kepada Yth,</label>
                                </div>
                                <div class="col-8 fs-5">
                                    <select name="tenant" id="tenant" required class="form-select w-px-250 item-details mb-3">

                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <dd class="d-flex justify-content-md-end flex-wrap pe-0 ps-0 ps-sm-2">
                                <div class="mb-3 mx-2">
                                    <label for="note" class="form-label fw-medium">No. Invoice</label>
                                    <input type="text" class="form-control w-px-150 " placeholder="" />
                                </div>
                                <div class="mb-3 mx-2">
                                    <label for="note" class="form-label fw-medium">Tgl. Invoice</label>
                                    <input type="text" class="form-control w-px-150 " placeholder="" />
                                </div>
                                <div class="mb-3 mx-2">
                                    <label for="note" class="form-label fw-medium">No. Kontrak</label>
                                    <input type="text" class="form-control w-px-150 " placeholder="" />
                                </div>
                                <div class="mb-3 mx-2">
                                    <label for="note" class="form-label fw-medium">Tanggal</label>
                                    <input type="text" class="form-control w-px-150 " placeholder="" />
                                </div>
                                <div class="mb-3 mx-2">
                                    <label for="note" class="form-label fw-medium">No. Addendum</label>
                                    <input type="text" class="form-control w-px-150 " placeholder="" />
                                </div>
                                <div class="mb-3 mx-2">
                                    <label for="note" class="form-label fw-medium">Tanggal</label>
                                    <input type="text" class="form-control w-px-150 " placeholder="" />
                                </div>
                            </dd>
                        </div>
                    </div>

                    {{-- Repeater --}}
                    <div class="repeater">
                        <div class="" data-repeater-list="group-a">
                            <div class="row-mg">
                                <div class="col-12 d-flex align-items-center justify-content-between">
                                    <div class="col-sm-2 mb-3 mx-2">
                                        <label for="note" class="form-label fw-medium">Uraian</label>
                                        <input type="text" name="uraian" class="form-control w-px-150 row-input" placeholder="" name="item[]" />
                                    </div>
                                    <div class="col-sm-2 mb-3 mx-2">
                                        <label for="note" class="form-label fw-medium">Keterangan</label>
                                        <input type="text" class="form-control w-px-150 row-input" placeholder="" name="description[]" />
                                    </div>
                                    <div class="col-sm-2 mb-3 mx-2">
                                        <label for="note" class="form-label fw-medium">Dasar Pengenaan Pajak</label>
                                        <input type="text" class="form-control w-px-150 row-input price" placeholder="" name="price[]" />
                                    </div>
                                    <div class="col-sm-1 mb-3 mx-2">
                                        <label for="note" class="form-label fw-medium">Pajak</label>
                                        <input type="text" class="form-control w-150 row-input tax" placeholder="" name="tax[]" />
                                    </div>
                                    <div class="col-sm-2 mb-3 mx-2">
                                        <label for="note" class="form-label fw-medium">Total (Rp.)</label>
                                        <input type="text" class="form-control w-px-150 row-input total_price" placeholder="" name="total_price[]" disabled />
                                    </div>
                                    <a class="mb-3 mx-2 mt-3 btn-remove-mg" role="button">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12" fill="none">
                                            <circle cx="6" cy="6" r="6" fill="#D9D9D9" />
                                            <path d="M6.70432 5.99276L8.85224 3.8544C8.9463 3.76053 8.99915 3.63323 8.99915 3.50049C8.99915 3.36775 8.9463 3.24045 8.85224 3.14659C8.75818 3.05273 8.63061 3 8.49759 3C8.36456 3 8.23699 3.05273 8.14293 3.14659L6 5.28994L3.85707 3.14659C3.76301 3.05273 3.63544 3 3.50241 3C3.36939 3 3.24182 3.05273 3.14776 3.14659C3.0537 3.24045 3.00085 3.36775 3.00085 3.50049C3.00085 3.63323 3.0537 3.76053 3.14776 3.8544L5.29568 5.99276L3.14776 8.13113C3.10094 8.17747 3.06378 8.23259 3.03842 8.29334C3.01306 8.35408 3 8.41923 3 8.48503C3 8.55083 3.01306 8.61598 3.03842 8.67672C3.06378 8.73746 3.10094 8.79259 3.14776 8.83893C3.19419 8.88565 3.24944 8.92273 3.31031 8.94804C3.37118 8.97335 3.43647 8.98637 3.50241 8.98637C3.56836 8.98637 3.63365 8.97335 3.69452 8.94804C3.75539 8.92273 3.81063 8.88565 3.85707 8.83893L6 6.69558L8.14293 8.83893C8.18937 8.88565 8.24461 8.92273 8.30548 8.94804C8.36635 8.97335 8.43164 8.98637 8.49759 8.98637C8.56353 8.98637 8.62882 8.97335 8.68969 8.94804C8.75056 8.92273 8.80581 8.88565 8.85224 8.83893C8.89906 8.79259 8.93622 8.73746 8.96158 8.67672C8.98694 8.61598 9 8.55083 9 8.48503C9 8.41923 8.98694 8.35408 8.96158 8.29334C8.93622 8.23259 8.89906 8.17747 8.85224 8.13113L6.70432 5.99276Z" fill="#FF4747" />
                                        </svg>
                                    </a>
                                </div>
                            </div>
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
                                    <p class="final-total">0.00</p>
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
                            <input type="text" class="form-control w-full terbilang" placeholder="Terbilang" />
                        </div>
                        <div class="col-md-8 d-flex align-items-center">
                            <label for="note" class="form-label fw-medium me-2">Jatuh Tempo Tanggal :</label>
                            <input type="date" class="form-control w-px-250 " placeholder="Date" />
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-md-6 mb-md-0 mb-3">
                            <label for="note" class="form-label fw-medium me-2">Syarat & Ketentuan</label>
                            <textarea class="form-control" rows="11" id="note" placeholder="Termin pembayaran, garansi dll"></textarea>
                        </div>

                        <div class="col-md-6 mb-md-0 mb-3 d-flex flex-column align-items-center text-center">
                            <div class="mb-3">
                                <label for="note" class="form-label fw-medium">Tanda Tangan & Meterai
                                    (Opsional)</label>
                                <input type="date" class="form-control w-px-250 " placeholder="Tanggal" />
                            </div>
                            <div class="mb-3">
                                <form action="/upload" class="dropzone needsclick dz-clickable w-px-250" id="dropzone-basic">
                                    <div class="dz-message needsclick">
                                        <span class="note needsclick">Unggah Tanda Tangan</span>
                                    </div>
                                </form>
                            </div>
                            <div class="mb-3">
                                <input type="text" class="form-control w-px-250 " placeholder="Nama & Jabatan" />
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
                    <button type="button" id="preview" class="btn btn-label-secondary d-grid w-100 mb-2">Preview</a>
                        <button type="button" class="btn btn-label-secondary d-grid w-100 mb-2">Simpan</button>
                        <button type="button" class="btn btn-label-secondary d-grid w-100">Batal</button>
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
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body pt-0 flex-grow-1">
            <form>
                <div class="mb-3">
                    <label for="invoice-from" class="form-label">From</label>
                    <input type="text" class="form-control" id="invoice-from" value="shelbyComapny@email.com" placeholder="company@email.com" />
                </div>
                <div class="mb-3">
                    <label for="invoice-to" class="form-label">To</label>
                    <input type="text" class="form-control" id="invoice-to" value="qConsolidated@email.com" placeholder="company@email.com" />
                </div>
                <div class="mb-3">
                    <label for="invoice-subject" class="form-label">Subject</label>
                    <input type="text" class="form-control" id="invoice-subject" value="Invoice of purchased Admin Templates" placeholder="Invoice regarding goods" />
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
                    <button type="button" class="btn btn-label-secondary" data-bs-dismiss="offcanvas">Cancel</button>
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
<script src="{{asset('assets/vendor/libs/select2/select2.js')}}"></script>
<script>
    $(document).ready(function() {
        $("#tenant").select2({
            allowClear: true,
            ajax: {
                url: "{{url('api/tenant')}}",
                dataType: 'json',
                cache: true,
                data: function(term) {

                },
                processResults: function(data) {
                    return {
                        results: $.map(data.data, function(item) {
                            return {
                                text: item.name,
                                id: item.id
                            }
                        })
                    };
                }
            }
        });

        $('#tenant').on("change", (async function(e) {
            var rekomendasi = $("#tenant").select2('data');
            var data = rekomendasi[0].id;
            $('#tenant').val(data);

        }));

        $(document).on('click', '.btn-add-row-mg', function() {
            // Clone baris terakhir
            var $lastRow = $('.row-mg:last');
            var $newRow = $lastRow.clone();

            // Kosongkan nilai input pada baris yang di-clone
            $newRow.find('input').val('');
            $newRow.find('button').removeAttr('disabled');

            // Tambahkan baris baru ke dalam tabel
            $lastRow.after($newRow);
        });

        $(document).on('click', '.btn-remove-mg', function() {
            // Hapus baris yang ditekan tombol hapus
            $(this).closest('.row-mg').remove();
        });

        $(document).on('input', '.tax:last', function() {
            // Hapus baris yang ditekan tombol hapus

            let total = 0;
            let price = parseInt($('.price:last').val());
            let tax = parseInt($(this).val());
            let totalPrice = price + tax;
            $('.total_price:last').val(isNaN(totalPrice) ? 0 : totalPrice);
            getTotal();

        });

        function getTotal() {
            let totalArr = [];
            let tempTotal = document.getElementsByClassName('total_price');
            for (let i = 0; i < tempTotal.length; i++) {
                var slipOdd = tempTotal[i].value;
                totalArr.push(Number(slipOdd));
            }

            let sum = 0;
            for (let i = 0; i < totalArr.length; i++) {
                sum += totalArr[i];
            }
            $('.final-total').text(rupiah(sum));
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





        $(document).on('click', '#preview', function(event) {
            event.preventDefault();
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
                    detail[input_index].price = input_value;
                } else if (index % 5 == 3) {
                    detail[input_index].tax = input_value;
                } else if (index % 5 == 4) {
                    detail[input_index].total_price = input_value;
                    console.log($(this));
                }
            });


            console.log(detail);

        });
    });
</script>
@endsection