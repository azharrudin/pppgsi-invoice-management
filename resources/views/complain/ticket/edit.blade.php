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
                                <div class="invalid-feedback">Tidak boleh kosong</div>
                            </div>
                            <div class="mb-3">
                                <label for="note" class="form-label fw-bold">Nomor Telepon</label>
                                <input type="text" class="form-control w-75" name="reporter_phone" id="reporter_phone" placeholder="Nomor Telepon" required />
                                <div class="invalid-feedback">Tidak boleh kosong</div>
                            </div>
                            <div class="mb-3">
                                <label for="note" class="form-label fw-bold">Nama Perusahaan</label>
                                <input type="text" class="form-control w-75" name="reporter_company" id="reporter_company" placeholder="Nama Perusahaan" required />
                                <div class="invalid-feedback">Tidak boleh kosong</div>
                            </div>
                            <div class="mb-3">
                                <label for="note" class="form-label fw-bold">Judul Laporan</label>
                                <input type="text" class="form-control w-75" name="ticket_title" id="ticket_title" placeholder="Judul Laporan" required />
                                <div class="invalid-feedback">Tidak boleh kosong</div>
                            </div>
                            <div class="mb-3">
                                <label for="note" class="form-label fw-bold">Isi laporan</label>
                                <textarea class="form-control w-75" rows="11" id="ticket_body" name="ticket_body" placeholder="Isi laporan" required></textarea>
                                <div class="invalid-feedback">Tidak boleh kosong</div>
                            </div>
                            <div class="mb-3">
                                <label for="formFile" class="form-label fw-bold">Upload Lampiran</label>
                                <input class="form-control w-75" type="file" name="attachment" id="attachment" placeholder="Pilih Berkas" alt="Pilih Berkas" multiple required>
                                <div class="invalid-feedback">Tidak boleh kosong</div>
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
    var urlSegments = window.location.pathname.split('/');
    var idIndex = urlSegments.indexOf('edit-ticket') + 1;
    var id = urlSegments[idIndex];
    let dataLocal = JSON.parse(localStorage.getItem("ticket"));
    $(document).ready(function() {
        window.addEventListener("pageshow", function(event) {
            var historyTraversal = event.persisted || (typeof window.performance !== "undefined" && window.performance.getEntriesByType("navigation")[0].type === "back_forward");
            if (historyTraversal) {
                location.reload(); // Reload the page
            }
        });

        var files = [];

        if (dataLocal) {
            $("#reporter_name").val(dataLocal.reporter_name);
            $("#reporter_phone").val(dataLocal.reporter_phone);
            $("#reporter_company").val(dataLocal.reporter_company);
            $("#ticket_title").val(dataLocal.ticket_title);
            $("#ticket_body").val(dataLocal.ticket_body);
            files = dataLocal.attachment;
        } else {
            getDataTicket(id);
        }

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
                                window.location.href = "/complain/list-ticket"
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

            let datas = {};
            $('.create-ticket').find('.form-control').each(function() {
                var inputId = $(this).attr('id');
                var inputValue = $("#" + inputId).val();
                datas[$("#" + inputId).attr("name")] = inputValue;
            });
            datas.attachment = files;
            datas.status = "Wait a response"

            localStorage.setItem("ticket", JSON.stringify(datas));
            window.location.href = "/complain/preview-ticket"
        });

        $(document).on('click', '#batal', function(event) {
            event.preventDefault();
            localStorage.removeItem('ticket');
            window.location.href = "/complain/list-ticket"
        });

        function getDataTicket(id) {
            $.ajax({
                url: "{{ url('api/ticket') }}/" + id,
                type: "GET",
                dataType: "json",
                success: function(res) {
                    let data = res.data;
                    console.log(data);
                    $("#reporter_name").val(data.reporter_name);
                    $("#reporter_phone").val(data.reporter_phone);
                    $("#reporter_company").val(data.reporter_company);
                    $("#ticket_title").val(data.ticket_title);
                    $("#ticket_body").val(data.ticket_body);
                    // getImage(data.ticket_attachments);
                    files = data.ticket_attachments;
                },
                error: function(errors) {
                    console.log(errors);
                }
            });
        }


    });
</script>
@endsection