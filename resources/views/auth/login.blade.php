@php
$customizerHidden = 'customizer-hide';
$configData = Helper::appClasses();
@endphp

@extends('layouts/blankLayout')

@section('title', 'Login')

@section('page-style')
{{-- Page Css files --}}
<link rel="stylesheet" href="{{ asset(mix('assets/vendor/css/pages/page-auth.css')) }}">
@endsection

@section('content')
<div class="authentication-wrapper authentication-cover authentication-bg">
  <div class="authentication-inner row " style="margin: 0;">
    <!-- /Left Text -->
    <div class="d-none d-lg-flex col-lg-7 p-0" style="background: rgb(97,73,206);
background: linear-gradient(3deg, rgba(97,73,206,1) 0%, rgba(156,98,244,1) 100%); color:white;">
      <img src="assets\img\illustrations\illustration.png" alt="illustrasi" class="mx-auto my-auto d-block img-fluid" style="width : 60%; height : auto;">
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

          <form id="formAuthentication" class="mb-3" action="{{ route('login') }}" method="POST">
            @csrf
            <div class="mb-3">
              <div class="input-group input-group-merge @error('username') is-invalid @enderror">
                <span class="input-group-text cursor-pointer"><i class="icon-person"></i></span>
                <input type="text" class="form-control @error('username') is-invalid @enderror" id="login-email" name="username" placeholder="Username" autofocus value="{{ old('username') }}">
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
                <input type="password" id="login-password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password" aria-describedby="password" />
              </div>
              @error('password')
              <span class="invalid-feedback" role="alert">
                <span class="fw-medium">{{ $message }}</span>
              </span>
              @enderror
            </div>
            <div class="mb-3 d-flex justify-content-between">
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
            </div>
            <button class="btn btn-primary d-grid w-90 mx-auto" type="submit">Login</button>
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