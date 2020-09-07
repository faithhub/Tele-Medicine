<!doctype html>
<html class="no-js" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Edmund Health Care Tele-Demicine</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="DoctorApp" href="">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.js"></script>
    <link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <link rel="icon" type="image/png" href="{{ asset('images/logo-1.jpg')}}">
	<!-- CSS here -->
	
    <!-- STYLE -->
    @include('frontend.layouts.includes.style')
</head>
<body style="background: linear-gradient(87deg, #83EAF1 0, #63A4FF 100%) !important;">
    <!-- ? Preloader Start -->
    {{-- <div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="preloader-circle"></div>
                <div class="preloader-img pere-text">
                    <img src="assets/img/logo/loder.png" alt="">
                </div>
            </div>
        </div>
    </div> --}}
    <!-- Preloader Start -->
    
    <!-- HEADER -->
    {{-- @include('frontend.layouts.includes.header') --}}

    <!-- MAIN CONTENT--> 
    @yield('content')

    <!-- FOOTER -->
    {{-- @include('frontend.layouts.includes.footer') --}}
    <!-- Scroll Up -->
    {{-- <div id="back-top" >
        <a title="Go to Top" href="#"> <i class="fas fa-level-up-alt"></i></a>
    </div> --}}

    <!-- JS here -->

    <!-- Main JS-->
    <div class="container">

        @include('frontend.layouts.includes.script')
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    </body>
</html>