@php
$customizerHidden = 'customizer-hide';
$configData = Helper::appClasses();
@endphp

@extends('layouts/blankLayout')

@section('title', 'Login')

@section('page-style')
{{-- Page Css files --}}
<link rel="stylesheet" href="{{asset('assets/vendor/libs/sweetalert2/sweetalert2.css')}}">
<link rel="stylesheet" href="{{ asset(mix('assets/vendor/css/pages/page-auth.css')) }}">
@endsection

@section('content')
<!-- Section: Design Block -->
<section class="background-radial-gradient overflow-hidden vh-100 d-flex align-items-center">
  <style>
    .form-check-input:checked,
    .form-check-input[type=checkbox]:indeterminate {
      background-color: #000;
      border-color: #000;
    }

    .background-radial-gradient {
      background-image: url("{{ asset('assets/img/PPPGSI 1.png') }}");
      background-repeat: no-repeat;
      background-attachment: fixed;
      background-size: cover;
    }

    #radius-shape-1 {
      height: 220px;
      width: 220px;
      top: -60px;
      left: -130px;
      background: radial-gradient(#44006b, #ad1fff);
      overflow: hidden;
    }

    #radius-shape-2 {
      border-radius: 38% 62% 63% 37% / 70% 33% 67% 30%;
      bottom: -60px;
      right: -110px;
      width: 300px;
      height: 300px;
      background: radial-gradient(#44006b, #ad1fff);
      overflow: hidden;
    }

    .bg-glass {
      background-color: hsla(0, 0%, 100%, 0.5) !important;
      backdrop-filter: saturate(200%) blur(25px);
    }
  </style>

  <div class="container text-center text-lg-start my-5 ">
    <div class="row my-5 align-middle ">
      <div class="col-lg-6 mb-5 mb-lg-0" style="z-index: 10">
      </div>

      <div class="col-lg-6 mb-5 mb-lg-0">
        <div class="card bg-glass">
          <div class="card-body px-3 py-3 px-md-5">
            <form id="formAuthentication" class="mb-3" action="{{ route('auth.login') }}" method="POST">
              @csrf
              <h1 class="my-5 fw-bold text-white text-center">
                USER LOGIN
              </h1>
              <div class="mb-3">
                <div class="input-group input-group-merge">
                  <span class="input-group-text" id="basic-addon-search31"><i class="ti ti-mail"></i></span>
                  <input type="text" class="form-control @error('username') is-invalid @enderror" id="email" name="email" placeholder="Username" autofocus value="{{ old('username') }}">
                </div>
                @error('username')
                <span class="invalid-feedback" role="alert">
                  <span class="fw-medium">{{ $message }}</span>
                </span>
                @enderror
              </div>
              <div class="mb-3 form-password-toggle">
                <div class="input-group input-group-merge">
                  <span class="input-group-text" id="basic-addon-search31"><i class="ti ti-eye-off"></i></span>
                  <input type="password" id="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password" aria-describedby="password" />

                </div>
                @error('password')
                <span class="invalid-feedback" role="alert">
                  <span class="fw-medium">{{ $message }}</span>
                </span>
                @enderror
              </div>
              <div class="my-4 d-flex justify-content-between">
                <div class="form-check">
                  <input class="form-check-input rounded-circle" type="checkbox" id="remember-me" name="remember" {{ old('remember') ? 'checked' : '' }}>
                  <label class="text-white" for="remember-me">
                    Remember Me
                  </label>
                </div>
                <div class="">
                  <a href="{{ route('password.request') }}" style="color: #fff;">
                    Forgot Password?
                  </a>
                </div>
              </div>
              <button class="btn btn-white d-grid w-90 mx-auto text-dark" type="submit" style="padding: 10px 50px;">Login</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Section: Design Block -->
@endsection

@section('page-script')
<script src="{{asset('assets/vendor/libs/sweetalert2/sweetalert2.js')}}"></script>
<script>
  $(function() {
    $("form").submit(function() {
      var email = $("#email").val();
      var password = $("#password").val();
      $.ajax({
        url: $(this).attr("action"),
        data: $(this).serialize(),
        type: $(this).attr("method"),
        dataType: 'JSON',
        beforeSend: function() {
          // $("input").attr("disabled", true);
          // $("#submit-login").html('<i class="fa fa-circle-o-notch fa-spin"></i> Login Proses ');
          // // $("#submit-login").html('<span class="loader"></span> Proses');
          // $("button").attr("disabled", true);
        },
        complete: function() {
          // $("textarea").attr("disabled", false);
          // $("button").attr("disabled", false);
        },
        success: function(response) {
          console.log(response);
          if (response.message == "SUCCESS_LOGIN") {
            localStorage.setItem("ACCESS-TOKEN", response.credentials.access_token);
            Swal.fire({
              title: 'Siip',
              text: 'Login berhasil, anda akan diarahkan ke dashboard',
              type: 'success',
              customClass: {
                confirmButton: 'btn btn-primary'
              },
              buttonsStyling: false
            })
            setTimeout(
              location.href = "/dashboard",
              2000);
          } else {
            Swal.fire("Opps..!", "Gagal masuk resp: " + response.message);
            $("input").attr("disabled", false);
            $("#submit-login").html('Masuk');
            $("button").attr("disabled", false);
          }

        },
        error: function(xhr, status, errorThrown) {
          console.log(xhr);
          // Swal.fire("Opps..!", "Gagal masuk thrown: " + JSON.stringify(xhr.status) + " " + JSON.stringify(xhr.statusText), "error");
          // $("input").attr("disabled", false);
          // $("#submit-login").html('Masuk');
          // $("button").attr("disabled", false);
        }


      })

      return false;
    });
  });
</script>
@endsection