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
  <meta name="description" content="EdmundHealth Tele Medicine App">
  <meta name="author" content="Creative Tim">
  <title> EdmundHealth - Dashboard {{ Auth::user()->name }}</title>
  <!-- Favicon -->
  
  <link rel="icon" type="image/png" href="{{ asset('images/logo/'.$logo2)}}">
  @include('admin.layouts.includes.style')
</head>

<body>
  <!-- Sidenav -->  
  @include('admin.layouts.includes.sidenav')
  <!-- Main content -->
  <div class="main-content" id="panel">
    <!-- Topnav -->    
  @include('admin.layouts.includes.navbar')
    <!-- Header -->
    <!-- Header -->
    @yield('content')
  </div>
  <!-- Argon Scripts -->
  <!-- Core -->
  @include('admin.layouts.includes.script')
</body>

</html>