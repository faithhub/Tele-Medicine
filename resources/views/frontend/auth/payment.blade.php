@extends('frontend.layouts.app2')
@section('content')

<!-- Font Icon -->
<link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

<link rel="icon" type="image/png" href="{{ asset('images/logo-1.jpg')}}">
<style>
  input[type="file"] {
  display: none;
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
    color: red;
  }
  input{    
    border-radius: .25rem !important;
    background-color: #fff !important;
    background-clip: padding-box !important;
    border: 0px solid #fff !important;
    box-sizing: border-box !important;
    font-size: 17px !important;
    height: 40px !important;
    box-shadow: 0 4px 6px rgba(50, 50, 93, .11), 0 1px 3px rgba(0, 0, 0, .08) !important;
  }
  .is-invalid {
  border: 1px solid red !important;
  /* border-radius: 5px !important; */
  }
 </style>
<!-- Main css -->
{{-- <link rel="stylesheet" href="{{ asset('auth/reg/css/style.css')}}"> --}}
<div class="container">
  <div class="col-lg-6 col-md-12 offset-lg-3" style="margin-top: 15rem">
    <div class="text-center">      
      <div class="logo">
        <a href="{{ url('index')}}"><img src="{{ asset('images/logo/'.$logo) }}" alt="$logo" style="width: 200px"></a>
    </div>
    </div>
    <div class="card py-3 border-0 mb-0">
      <div class="card-header text-center" style="background:none; border-bottom: 0">
      <h2 style="font-weight: 700; letter-spacing: 2px !important;">Patient Payment Registration Form</h2>      
      <div class="text-center">                                   
        @include('frontend.layouts.includes.alert')
        </div>
      </div>
      <div class=card-body>        
        <script>
          function makePayment() {
            FlutterwaveCheckout({
              public_key: "{{ $public_key }}",
              tx_ref: "{{ $tx_ref }}",
              amount: "{{ $amount }}",
              currency: "{{ $currency }}",
              payment_options: "card, mobilemoneyghana, ussd",
              redirect_url: // specified redirect URL
                "{{ $redirect_url }}",
              meta: {
                consumer_id: "{{ Auth::user()->id }}",
                consumer_mac: "92a3-912ba-1192a",
              },
              customer: {
                email: "{{ Auth::user()->email }}",
                phone_number: "{{ Auth::user()->mobile }}",
                name: "{{ Auth::user()->name }}",
              },
              callback: function (data) {
                console.log(data);
              },
              onclose: function() {
                // close modal
              },
              customizations: {
                title: "My store",
                description: "Payment for items in cart",
                logo: "https://assets.piedpiper.com/logo.png",
              },
            });
          }
        </script>

          <div class="form-row">
            <div class="form-group col-lg-12 col-md-12">
              <label>Name</label>
              <input type="text" class="form-control" value="{{ Auth::user()->name }}" readonly name="name">
            </div>
          </div>
          <div class="form-row">            
            <div class="form-group col-lg-12 col-md-12">
              <label>Email</label>
              <input class="form-control" readonly name="email" value="{{ Auth::user()->email }}" type="email">
            </div>
          </div>          
          <div class="form-row">            
            <div class="form-group col-lg-6 col-md-6">
              <label>Mobile</label>
              <input class="form-control" readonly name="mobile" value="{{ Auth::user()->mobile }}" type="email">
            </div>            
            <div class="form-group col-lg-6 col-md-6">
              <label>Amount</label>
              <input class="form-control" readonly value="#{{ $amount }}" name="amount" type="email">
            </div>
          </div>
          <form>                       
            <script src="https://checkout.flutterwave.com/v3.js"></script>
            <div class="text-center">
              <button type="button" onClick="makePayment()" class="btn btn-success my-4" style="background: green">Pay Now #{{ $amount }}</button>
            </div> 
          </form>
          <div class="text-right">
            <a href="{{ url('logout') }}" class="btn my-4" style="background: #172b4d !important">Logout</a>
          </div>
      </div>
    </div>
</div>
</div>
@endsection
