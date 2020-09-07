@extends('patient.layouts.app')
@section('content')
<style>    
  .error{
    font-family: cursive;
    font-size: 14px;
    font-weight: 400;
    color: red !important;
  }
</style>
<div class="header bg-primary pb-6">
    <div class="container-fluid">
      <div class="header-body">
        <div class="row align-items-center py-4">
          <div class="col-lg-6 col-7">
            <h6 class="h2 text-white d-inline-block mb-0">{{ Auth::user()->role }}</h6>
            <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
              <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Change Password</li>
              </ol>
            </nav>
          </div>
          {{-- <div class="col-lg-6 col-5 text-right">
            <a href="#" class="btn btn-sm btn-neutral">New</a>
            <a href="#" class="btn btn-sm btn-neutral">Filters</a>
          </div> --}}
        </div>
      </div>
    </div>
  </div>
  <!-- Page content -->
  <div class="container-fluid mt--6">
    <div class="row">
      <div class="col-xl-6 offset-xl-3">          
        <form id="change-password" action="{{ route('change-password') }}" method="POST">
            @csrf
            <div class="card">
            <div class="card-header bg-transparent">
                <div class="row align-items-center">
                    <div class="col">
                        <h6 class="text-uppercase text-muted ls-1 mb-1"></h6>
                        <h5 class="h3 mb-0">Change Password</h5>
                    </div>                    
                </div>                
            </div>
            <div class="card-body">
                <div class="text-center">
                    @include('patient.layouts.includes.alert')
                </div>
                <div class="form-group">
                    <label class="form-control-label">Current Password</label>
                    <input type="password" class="form-control @error('old_password') is-invalid @enderror" name="old_password">
                    @error('old_password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>                
                <div class="form-group">
                    <label class="form-control-label">New Password</label>
                    <input type="password" class="form-control @error('new_password') is-invalid @enderror" name="new_password">
                    @error('new_password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>                
                <div class="form-group">
                    <label class="form-control-label">Confirm New Password</label>
                    <input type="password" class="form-control @error('confirm_new_password') is-invalid @enderror" name="confirm_new_password">
                    @error('confirm_new_password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="card-footer bg-transparent text-right">
                <button type="submit" id="btn_change" class="btn btn-default">Change</button>
            </div>
            </div>        
        </form>
      </div>
    </div>

  </div>
    <!-- Argon JS -->
    <script src="{{ asset('jquery/jquery.min.js')}}"></script>
    <script src="{{ asset('jquery/jquery.validate.min.js')}}"></script>
    
  <script>
    $.validator.addMethod("PASSWORD", function (value, element) {
        return this.optional(element) || /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,16}$/i.test(value);
    }, "Passwords are 8-16 characters with uppercase letters, lowercase letters and at least one number."); 
  
    $('#change-password').validate({
          rules: {
              old_password: {
                  required: true,
              },
              new_password: {
                  required: true,
                  PASSWORD: true
              },
              confirm_new_password: {
                  required: true,
                  minlength: 8,
                  equalTo: '[name=new_password]',
              }
          },
          messages: {
            old_password: {
                  required: "Please provide your Password",
              },
              new_password: {
                  required: "Please provide your New Password",
              },
            confirm_new_password: {
                  required: "Please confirm your New Password",
                  equalTo: "{{__("Please enter same value as your New Password")}}",
              },
          },
          // errorPlacement: function(error, element){
          //   error.insertAfter(element.parent('div'));
          // },
          submitHandler: function(form)
          {
            $("#btn_change").text('Checking...')
                    form.submit();
            //   setTimeout(function() {
                  
            //   }, 5000);
          }
      });
  </script>
@endsection