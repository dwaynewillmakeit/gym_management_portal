@extends('layouts/blankLayout')

@section('title', 'Login Basic - Pages')

@section('page-style')
  <!-- Page -->
  <link rel="stylesheet" href="{{asset('assets/vendor/css/pages/page-auth.css')}}">
@endsection

@section('content')

  <div class="container-xxl">
    <div class="authentication-wrapper authentication-basic container-p-y">
      <div class="authentication-inner">
        <!-- Register -->
        <div class="card">
          <div class="card-body">
            <!-- Logo -->
            <div class=" justify-content-center text-center">

                <div class=" ">
                   <img src="{{ asset('assets/img/avatars/logo.jpg') }}" alt class="w-px-50 h-auto rounded-circle">
                </div>
                <h3 class="demo text-body fw-bolder">Cutz & Curvz Fitness</h3>
            </div>
            <!-- /Logo -->
            <h4 class="mb-2 text-center">Login</h4>

            <form id="formAuthentication" class="mb-3" method="POST" action="{{ route('login') }}">
              @csrf
              <div class="mb-3">
                <label class="form-label" for="email">Email</label>
                <input type="text" class="form-control" id="email" name="email" placeholder="Enter your email"
                       autofocus>
              </div>
              <div class="mb-3 form-password-toggle">

                <div class="input-group input-group-merge">
                  <input type="password" id="password" class="form-control" name="password"
                         placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                         aria-describedby="password"/>
                  <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                </div>
              </div>

              <div class="mb-3">
                <button class="btn btn-primary d-grid w-100" type="submit">Sign in</button>
              </div>
            </form>

          </div>
        </div>
      </div>
      <!-- /Register -->
    </div>
  </div>

@endsection
