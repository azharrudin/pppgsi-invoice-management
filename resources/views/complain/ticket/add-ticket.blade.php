@php
$configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Complain')

@section('content')

<div class="container-xxl flex-grow-1 container-p-y">
    <form action="/upload" id="create-ticket" class="create-ticket" novalidate>
        <div class="row ticket-add">
            <!-- Ticket Add-->
            <div class="col-lg-9 col-12 mb-lg-0 mb-3">
                <div class="card ticket-preview-card">
                    <div class="card-body">
                        <h2 class="mx-auto"><b>Form Aduan dan Complain</b></h2>
                        {{-- Divider --}}
                        <hr class="my-3 mx-n4">

                        <div class="col-md-12 mb-md-0 mb-3">
                            <div class="mb-3">
                                <label for="note" class="form-label fw-bold">Nama Pelapor</label>
                                <input type="text" class="form-control w-75" name="reporter_name" id="reporter_name" placeholder="Nama Pelapor" required />
                            </div>
                            <div class="mb-3">
                                <label for="note" class="form-label fw-bold">Nomor Telepon</label>
                                <input type="text" class="form-control w-75" name="reporter_phone" id="reporter_phone" placeholder="Nomor Telepon" required />
                            </div>
                            <div class="mb-3">
                                <label for="note" class="form-label fw-bold">Nama Perusahaan</label>
                                <input type="text" class="form-control w-75" name="reporter_company" id="reporter_company" placeholder="Nama Perusahaan" required />
                            </div>
                            <div class="mb-3">
                                <label for="note" class="form-label fw-bold">Judul Laporan</label>
                                <input type="text" class="form-control w-75" name="ticket_title" id="ticket_title" placeholder="Judul Laporan" required />
                            </div>
                            <div class="mb-3">
                                <label for="note" class="form-label fw-bold">Isi laporan</label>
                                <textarea class="form-control w-75" rows="11" id="ticket_body" name="ticket_body" placeholder="Isi laporan" required></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="formFile" class="form-label fw-bold">Upload Lampiran</label>
                                <input class="form-control w-75" type="file" name="attachment" id="attachment" placeholder="Pilih Berkas" alt="Pilih Berkas" multiple required>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Ticket Add-->

            <!-- Ticket Actions -->
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
            <!-- /Ticket Actions -->
        </div>
    </form>


</div>

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
    let dataLocal = JSON.parse(localStorage.getItem("ticket"));
    $(document).ready(function() {
        window.addEventListener("pageshow", function(event) {
            var historyTraversal = event.persisted || (typeof window.performance !== "undefined" && window.performance.getEntriesByType("navigation")[0].type === "back_forward");
            if (historyTraversal) {
                location.reload(); // Reload the page
            }
        });

        var files = [];
        $(document).on('change', '#attachment', function(e) {
            // Get a reference to the file
            const file = e.target.files[0];

            // Encode the file using the FileReader API
            const reader = new FileReader();
            reader.onloadend = () => {
                // Use a regex to remove data url part
                const base64String = reader.result
                    .replace('data:', '')
                    .replace(/^.+,/, '');

                files.push(`data:${(file.type)};base64,${base64String}`);
                // Logs wL2dvYWwgbW9yZ...
            };
            reader.readAsDataURL(file);
        });
        var saveTicket = $('.create-ticket');

        Array.prototype.slice.call(saveTicket).forEach(function(form) {
            $('.indicator-progress').hide();
            $('.indicator-label').show();
            form.addEventListener(
                "submit",
                function(event) {
                    if (!form.checkValidity()) {
                        event.preventDefault();
                        event.stopPropagation();
                    } else {
                        // Submit your form
                        event.preventDefault();
                        event.stopPropagation();

                        let datas = {};
                        $('.create-ticket').find('.form-control').each(function() {
                            var inputId = $(this).attr('id');
                            var inputValue = $("#" + inputId).val();
                            datas[$("#" + inputId).attr("name")] = inputValue;
                        });

                        datas.attachment = files;
                        datas.status = "Wait a response"
                        console.log(files);

                        $.ajax({
                            url: baseUrl + "api/ticket/",
                            type: "POST",
                            data: JSON.stringify(datas),
                            contentType: "application/json; charset=utf-8",
                            dataType: "json",

                            success: function(response) {
                                $('.indicator-progress').show();
                                $('.indicator-label').hide();
                                console.log(datas);
                                Swal.fire({
                                    title: 'Berhasil',
                                    text: 'Berhasil menambahkan Ticket',
                                    icon: 'success',
                                    customClass: {
                                        confirmButton: 'btn btn-primary'
                                    },
                                    buttonsStyling: false
                                })

                                localStorage.removeItem('ticket');
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

            console.log(files);
            // event.preventDefault();
            // let tenant = $("#tenant").val();
            // let noInvoice = $("#invoice_number").val();
            // let tglInvoice = $("#invoice_date").val();
            // let noKontrak = $("#contract_number").val();
            // let tglKontrak = $("#contract_date").val();
            // let noAddendum = $("#addendum_number").val();
            // let tglAddendum = $("#addendum_date").val();
            // let terbilang = $("#grand_total_spelled").val();
            // let grandTotal = $(".grand_total").text();
            // let tglJatuhTempo = $("#invoice_due_date").val();
            // let syaratDanKententuan = $("#term_and_conditions").val();
            // let bank = $("#bank").val();
            // let tglTtd = $("#materai_date").val();
            // let nameTtd = $("#materai_name").val();
            // let fileTtd = ttdFile;

            // var detail = [];
            // $('.row-input').each(function(index) {
            //     var input_name = $(this).attr('name');
            //     var input_value = $(this).val();
            //     var input_index = Math.floor(index / 5); // Membagi setiap 5 input menjadi satu objek pada array
            //     if (index % 5 == 0) {
            //         detail[input_index] = {
            //             item: input_value
            //         };
            //     } else if (index % 5 == 1) {
            //         detail[input_index].description = input_value;
            //     } else if (index % 5 == 2) {
            //         detail[input_index].price = input_value;
            //     } else if (index % 5 == 3) {
            //         detail[input_index].tax = input_value;
            //     } else if (index % 5 == 4) {
            //         detail[input_index].total_price = input_value;
            //     }
            // });


            // let datas = {};
            // $('.create-invoice').find('.form-control').each(function() {
            //     var inputId = $(this).attr('id');
            //     var inputValue = $("#" + inputId).val();
            //     datas[$("#" + inputId).attr("name")] = inputValue;
            // });

            // datas.details = detail;
            // datas.tenant_id = tenant;
            // datas.bank_id = bank;
            // datas.status = 'Terbuat';
            // datas.contract_date = tglKontrak
            // datas.opening_paragraph = "Bapak/Ibu Qwerty";
            // datas.invoice_due_date = tglJatuhTempo;
            // datas.addendum_date = tglAddendum;
            // datas.invoice_date = tglInvoice;
            // datas.grand_total = grandTotal;
            // datas.materai_image = fileTtd;
            // localStorage.setItem("invoice", JSON.stringify(datas));
            // window.location.href = "/invoice/preview-invoice"
        });

        $(document).on('click', '#batal', function(event) {
            event.preventDefault();
            localStorage.removeItem('invoice');
            window.location.href = "/invoice/list-invoice"
        });
    });
</script>
@endsection