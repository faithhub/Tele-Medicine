<!--
=========================================================
* Argon Dashboard - v1.2.0
=========================================================
* Product Page: https://www.creative-tim.com/product/argon-dashboard

* Copyright  Creative Tim (http://www.creative-tim.com)
* Coded by www.creative-tim.com
=========================================================
* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
  <meta name="author" content="Creative Tim">
  <title>Argon Dashboard - Free Dashboard for Bootstrap 4</title>
  <!-- Favicon -->
  <link rel="icon" href="{{ asset('auth/assets/img/brand/favicon.png') }}" type="image/png">
  <!-- Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
  <!-- Icons -->
  <link rel="stylesheet" href="{{ asset('auth/assets/vendor/nucleo/css/nucleo.css') }}" type="text/css">
  <link rel="stylesheet" href="{{ asset('auth/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css') }}" type="text/css">
  <!-- Argon CSS -->
  <link rel="stylesheet" href="{{ asset('auth/assets/css/argon.css?v=1.2.0') }}" type="text/css">
  <style>
    input[type="file"] {
    display: none;
    }
    .invalid-feedback {
    display: block;
    font-size: 18px;
    color: red;
    }
    .error{
      font-family: cursive;
    font-size: 14px;
    font-weight: 400;
      color: red;
    }
    .is-invalid {
    border: 1px solid red !important;
    /* border-radius: 5px !important; */
    }
   </style>
</head>

<body class="bg-default">
  <!-- Main content -->
  <div class="main-content">
    <!-- Header -->
    <div class="header py-5 py-lg-7 pt-lg-4">
      <div class="container">
        <div class="header-body text-center mb-7">
          <div class="row justify-content-center">
            <div class="col-xl-5 col-lg-6 col-md-8 px-5">
              <div class="logo">
                  <a href="{{ url('index')}}"><img src="http://127.0.0.1:8000/frontend/assets/img/logo/logo.png" alt=""></a>
              </div>
              {{-- <h2>Sign in</h2> --}}
              {{-- <p class="text-lead text-black">Use these awesome forms to login or create new account in your project for free.</p> --}}
            </div>
          </div>
        </div>
      </div>
      {{-- <div class="separator separator-bottom separator-skew zindex-100">
        <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
          <polygon class="fill-default" points="2560 0 2560 100 0 100"></polygon>
        </svg>
      </div> --}}
    </div>
    <!-- Page content -->
    <div class="container mt--8 pb-5">
      <div class="row justify-content-center">
        <div class="col-lg-5 col-md-7">
          <div class="text-center">                                      
          @include('frontend.layouts.includes.alert')
          </div>
          <div class="card bg-secondary border-0 mb-0">
            <div class="card-header bg-transparent pb-5">
              <div class="text-muted text-center mt-2 mb-3"><h3>Sign in with</h3></div>
              <div class="btn-wrapper text-center">
                <a href="#" class="btn btn-neutral btn-icon">
                  <span class="btn-inner--icon"><img src="{{ asset('auth/assets/img/icons/common/github.svg') }}"></span>
                  <span class="btn-inner--text">Facbook</span>
                </a>
                <a href="#" class="btn btn-neutral btn-icon">
                  <span class="btn-inner--icon"><img src="{{ asset('auth/assets/img/icons/common/google.svg') }}"></span>
                  <span class="btn-inner--text">Google</span>
                </a>
              </div>
            </div>
            <div class="card-body px-lg-5 py-lg-5">
              <div class="text-center text-muted mb-4">
                <small>Or sign in with credentials</small>
              </div>
              <form role="form" action="{{ url('login')}}" method="POST">
                {{ csrf_field() }}
                <div class="form-group">
                  <div class="input-group input-group-merge input-group-alternative  @error('email') is-invalid @enderror">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                    </div>
                    <input class="form-control" value="{{ old('email') }}" name="email" placeholder="Email" type="email">
                  </div>
                  @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
                <div class="form-group">
                  <div class="input-group input-group-merge input-group-alternative  @error('password') is-invalid @enderror">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                    </div>
                    <input class="form-control" name="password" placeholder="Password" type="password">
                  </div>
                  @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div> 
                {{-- <div class="form-group">
                    <div class="input-group input-group-merge input-group-alternative  @error('role') is-invalid @enderror">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="ni ni-user-run"></i></span>
                      </div>
                      <select class="form-control" name="role">
                          <option value="">Select Role</option>
                          <option value="Doctor" {{ old('role') == 'Doctor' ? "selected" : "" }}>Doctor</option>
                          <option value="Patient" {{ old('role') == 'Patient' ? "selected" : "" }}>Patient</option>
                      </select>
                    </div>
                    @error('role')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>  --}}
                {{-- <div class="custom-control custom-control-alternative custom-checkbox">
                  <input class="custom-control-input" id=" customCheckLogin" type="checkbox">
                  <label class="custom-control-label" for=" customCheckLogin">
                    <span class="text-muted">Remember me</span>
                  </label>
                </div> --}}
                <div class="text-center">
                  <button type="submit" class="btn btn-default my-4">Sign in</button>
                </div>
              </form>
            </div>
          </div>
          <div class="row mt-3">
            <div class="col-6">
              <a href="#" class="btn btn-neutral btn-icon">
                <span class="btn-inner--text">Forgot password?</span>
              </a>              
            </div>
            <div class="col-6 text-right">
              <a href="{{ url('index')}}" class="btn btn-neutral btn-icon">
                <span class="btn-inner--text">Back To Home</span>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Footer -->
  {{-- <footer class="py-5" id="footer-main">
    <div class="container">
      <div class="row align-items-center justify-content-xl-between">
        <div class="col-xl-6">
          <div class="copyright text-center text-xl-left text-muted">
            &copy; 2020 <a href="https://www.creative-tim.com" class="font-weight-bold ml-1" target="_blank">Creative Tim</a>
          </div>
        </div>
        <div class="col-xl-6">
          <ul class="nav nav-footer justify-content-center justify-content-xl-end">
            <li class="nav-item">
              <a href="https://www.creative-tim.com" class="nav-link" target="_blank">Creative Tim</a>
            </li>
            <li class="nav-item">
              <a href="https://www.creative-tim.com/presentation" class="nav-link" target="_blank">About Us</a>
            </li>
            <li class="nav-item">
              <a href="http://blog.creative-tim.com" class="nav-link" target="_blank">Blog</a>
            </li>
            <li class="nav-item">
              <a href="https://github.com/creativetimofficial/argon-dashboard/blob/master/LICENSE.md" class="nav-link" target="_blank">MIT License</a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </footer> --}}
  <!-- Argon Scripts -->
  <!-- Core -->
  <script src="{{ asset('auth/assets/vendor/jquery/dist/jquery.min.js') }}"></script>
  <script src="{{ asset('auth/assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('auth/assets/vendor/js-cookie/js.cookie.js') }}"></script>
  <script src="{{ asset('auth/assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js') }}"></script>
  <script src="{{ asset('auth/assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js') }}"></script>
  <!-- Argon JS -->
  <script src="{{ asset('auth/assets/js/argon.js?v=1.2.0') }}"></script>
</body>

</html>