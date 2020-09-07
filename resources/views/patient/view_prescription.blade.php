@extends('patient.layouts.app')
@section('content')
   <style>
input[type='radio']{
  display: list-item;
}
   </style>
   <a href='https://dryicons.com/icon/phone-call-grunge-style-icon-8946'></a>
  <script src="{{ asset('jquery/jquery.min.js')}}"></script>
  <script src="{{ asset('jquery/jquery.validate.min.js')}}"></script>
<div class="header bg-primary pb-6">
    <div class="container-fluid">
      <div class="header-body">
        <div class="row align-items-center py-4">
          <div class="col-lg-6 col-7">
            <h6 class="h2 text-white d-inline-block mb-0">{{ Auth::user()->role }}</h6>
            <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
              <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                <li class="breadcrumb-item"><a href="#">Dashboards</a></li>
                <li class="breadcrumb-item active" aria-current="page">Prescription</li>
              </ol>
            </nav>
          </div>
          <div class="col-lg-6 col-5 text-right">
            {{-- <a href="{{ url('patient/appointment') }}" id="view" class="btn btn-sm btn-neutral">View History</a> --}}
            <a href="{{ url('patient/prescriptions') }}" class="btn btn-sm btn-slack">Back</a>
          </div>
         </div>
      </div>
    </div>
  </div>
  <!-- Page content -->
 <div class="container-fluid mt--6">
  <div class="row" id="appointments">
    <div class="col-xl-12">
      <div class="card">
        <div class="card-header border-0">
          <div class="row align-items-center">
            <div class="col">
              <h3 class="mb-0">Prescription from Dr. {{{$prescriptions[0]['doctor']['name']}}}</h3>
            </div>
            <div class="text-center">              
              @include('patient.layouts.includes.alert')
            </div>
            <div class="col text-right">
              <a href="{{ url('patient/prescriptions') }}" class="btn btn-sm btn-primary">Back</a>
            </div>
          </div>
        </div>
        <div class="card-body">
            <p>Medicine Name: {{{$prescriptions[0]['medicine_name']}}}</p>
            <p>Medicine Type: {{{$prescriptions[0]['medicine_type']}}}</p>
            <p>MG / ML: {{{$prescriptions[0]['mg_ml']}}}</p>
            <p>Dose: {{{$prescriptions[0]['dose']}}}</p>
            <p>Day: {{{$prescriptions[0]['day']}}}</p>
            <p>Medicine Comment: {{{$prescriptions[0]['medicine_comment']}}}</p>
            <p>Overall Comment: {{{$prescriptions[0]['overall_comment']}}}</p>
            <p>Prescriped On: {{{ date('D, M j, Y \a\t g:ia', strtotime($prescriptions[0]['created_at'])) }}}</p>
        </div>
      </div>
    </div>
  </div>

</div>

  <script src="{{ asset('jquery/jquery.min.js')}}"></script>
  <script src="{{ asset('jquery/jquery.validate.min.js')}}"></script>
  
  
@endsection