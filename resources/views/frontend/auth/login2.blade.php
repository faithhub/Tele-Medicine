@extends('frontend.layouts.app')
@section('content')
<style>
    input{
    height: 40px !important;
    font-size: 17px !important;
    }
    .invalid-feedback {
    display: block !important;
    font-size: 14px !important;
    color: red !important;
    }
    .error{
      font-family: cursive;
      font-size: 14px;
      font-weight: 400;
      color: red !important;
    }
    .is-invalid {
    border: 1px solid red !important;
    /* border-radius: 5px !important; */
    }
   </style>
<div class="container">
    
    <div class="col-lg-6 col-md-12 col-sm-12 col-xm-12 offset-lg-3">
        <div class="card py-lg-5" style="margin-top: 8rem; margin-bottom: 15rem; box-shadow: 0 4px 6px rgba(42, 42, 135, 1.11), 0 1px 3px rgba(47, 18, 140, 1.08); border-radius:10px">
                   
        <div class="text-center" style="font-size: 18px; font-weight:700">
            @include('frontend.layouts.includes.alert')
            </div> 
          <div class="card-header text-center" style="background: none; border-bottom: 0">
          <h2 style="font-weight: 700; color:#4c9afe">Sign in</h2>
          </div>
          <div class="btn-wrapper text-center">
            <a href="#" class="btn-icon">
              <span class="btn-inner--icon"><img src="{{ asset('images/icon/facebook.png') }}" style="height:30px"></span>
              {{-- <span class="btn-inner--text">Facbook</span> --}}
            </a>
            <a href="#" class="btn-icon m-3">
              <span class="btn-inner--icon"><img src="{{ asset('images/icon/gmail.png') }}" style="height:30px"></span>
              {{-- <span class="btn-inner--text">Google</span> --}}
            </a>            
            <a href="#" class="btn-icon">
                <span class="btn-inner--icon"><img src="{{ asset('images/icon/twitter.png') }}" style="height:30px"></span>
                {{-- <span class="btn-inner--text">Twitter</span> --}}
              </a>
          </div>
          <div class=card-body>
            <form id="login" role="form" action="{{ url('login') }}" method="post">
              {{ csrf_field() }}
              <div class="form-row">
                <div class="form-group col-md-12">
                  <label>Email</label>
                  <input class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" name="email" placeholder="Email" type="email">
                  @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
              </div>             
              <div class="form-row">
                <div class="form-group col-md-12">
                  <label>Password</label>
                  <input class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password" type="password">
                @error('password')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                @enderror
                </div>
              </div>          
            <div class="text-center">
              <button type="submit" id="btn_create" class="btn btn-default my-4">Login</button>
            </div>         
            </form>
          </div>
        </div>
    </div>
</div><!-- JS -->

<script src="{{ asset('jquery/jquery.min.js')}}"></script>
<script src="{{ asset('jquery/jquery.validate.min.js')}}"></script>
<script>
     $('#login').validate({
          rules: {
              email: {
                  required: true,
                  email: true,
              },
              password: {
                  required: true,
              },
          },
          messages: {
              password: {
                required: "Password is required",
              },
              email: {
                required: "Eamil is required",
              },
          },
          // errorPlacement: function(error, element){
          //   error.insertAfter(element.parent('div'));
          // },
          submitHandler: function(form)
          {
              form.submit();
          }
      });
  </script>
@endsection