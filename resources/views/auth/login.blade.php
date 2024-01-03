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
<div class="authentication-wrapper authentication-cover authentication-bg">
  <div class="authentication-inner row " style="margin: 0;">
    <!-- /Left Text -->
    <div class="d-none d-lg-flex col-lg-7 p-0" style="background: rgb(97,73,206);
background: linear-gradient(3deg, rgba(97,73,206,1) 0%, rgba(156,98,244,1) 100%); color:white;">
      <img src="{{ asset('assets/img/login.png')}}" alt="illustrasi" class="mx-auto my-auto d-block img-fluid" style="width : 60%; height : auto;">
    </div>
    <!-- /Left Text -->

    <!-- Login -->
    <div class="d-flex col-12 col-lg-5 align-items-center p-sm-5 p-4">
      <div class="w-px-400 my-auto d-flex flex-grow-1 justify-content-center align-items-center" style="min-height: 85vh;">
        <div class="" style="min-width : 85%;">
          <!-- Logo -->
          <div class="mb-4 mx-auto">
            <h1 class="text-center"><b>USER LOGIN</b></h1>
          </div>
          <!-- /Logo -->


          @if (session('status'))
          <div class="alert alert-success mb-1 rounded-0" role="alert">
            <div class="alert-body">
              {{ session('status') }}
            </div>
          </div>
          @endif

          <form id="formAuthentication" class="mb-3" action="{{ route('auth.login') }}" method="POST">
            @csrf
            <div class="mb-3">
              <div class="input-group input-group-merge @error('username') is-invalid @enderror">
                <span class="input-group-text cursor-pointer"><i class="icon-person"></i></span>
                <input type="text" class="form-control @error('username') is-invalid @enderror" id="email" name="email" placeholder="Username" autofocus value="{{ old('username') }}">
              </div>
              @error('username')
              <span class="invalid-feedback" role="alert">
                <span class="fw-medium">{{ $message }}</span>
              </span>
              @enderror
            </div>
            <div class="mb-3 form-password-toggle">
              <div class="input-group input-group-merge @error('password') is-invalid @enderror">
                <span class="input-group-text cursor-pointer"><i class="icon-lock"></i></span>
                <input type="password" id="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password" aria-describedby="password" />
              </div>
              @error('password')
              <span class="invalid-feedback" role="alert">
                <span class="fw-medium">{{ $message }}</span>
              </span>
              @enderror
            </div>
            <!-- <div class="mb-3 d-flex justify-content-between">
              <div class="form-check">
                <input class="form-check-input rounded-circle" type="checkbox" id="remember-me" name="remember" {{ old('remember') ? 'checked' : '' }}>
                <label class="form-check-label" for="remember-me">
                  Remember Me
                </label>
              </div>
              <div class="">
                <a href="{{ route('password.request') }}" style="color: #000;">
                  <small>Forgot Password?</small>
                </a>
              </div>
            </div> -->
            <button class="btn btn-primary d-grid w-90 mx-auto" type="submit" style="padding: 10px 50px;">Login</button>
          </form>
        </div>
        <div></div>

      </div>
    </div>
  </div>
  <!-- /Login -->
</div>
</div>
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