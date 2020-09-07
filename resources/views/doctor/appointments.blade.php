@extends('doctor.layouts.app')
@section('content')
   <style>
input[type='radio']{
  display: list-item;
}
   </style>
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
                <li class="breadcrumb-item active" aria-current="page">Appointents</li>
              </ol>
            </nav>
          </div>
          {{-- <div class="col-lg-6 col-5 text-right">
            <a href="{{ url('doctor/appointment') }}" id="view" class="btn btn-sm btn-neutral">View History</a>
            <a href="{{ url('doctor/book') }}" id="book" class="btn btn-sm btn-slack">Book Appointment</a>
          </div> --}}
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
              <h3 class="mb-0">All my Appointments</h3>
            </div>
            <div class="col text-center">              
              @include('doctor.layouts.includes.alert')
            </div>
            {{-- <div class="col text-right">
              <a href="#!" class="btn btn-sm btn-primary">See all</a>
            </div> --}}
          </div>
        </div>
        <div class="table-responsive">
          <!-- Projects table -->
          <table class="table align-items-center table-flush" id="table">
            <thead class="thead-light">
              <tr>
                <th scope="col">S/N</th>
                <th scope="col">Patient</th>
                <th scope="col">Appointment Date</th>
                <th scope="col">Booking Date</th>
                <th scope="col">Prescribe</th>
                <th scope="col">Call</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($appointments as $appointment)
              <tr>
                <td scope="row">{{ $serial++ }}</td>
                <td scope="row">{{$appointment->patient->name}}</td>
                <td>
                  {{$appointment->book_day}} - {{$appointment->book_time}}
                </td>
                <td>
                  {{ date('D, M j, Y \a\t g:ia', strtotime($appointment->created_at)) }}
                </td>
                <td>
                    @if ($appointment->status == 'Confirmed')                      
                      <a title="Prescribe"  href="{{ url('doctor/create_prescription?id='.$appointment->patient_id) }}" class="btn btn-sm btn-success text-white">Prescribe</a>
                    @else                  
                      <button type="button" disabled title="Prescribtion disabled" class="btn btn-sm btn-danger">Prescribe</button>
                    @endif
                </td>
                <td>
                  @if ($appointment->status == 'Confirmed')                      
                  <a href="{{ url('call_now?mode=video&receiver_id='.$appointment->patient->id) }}" target="_blank" title="Video Call" class="btn btn-sm">
                    <img src="{{ asset('images/call/video.png') }}" style="height: 20px;">
                  </a>
                  <a  href="{{ url('call_now?mode=audio&receiver_id='.$appointment->patient->id) }}" target="_blank" title="Audio Call" class="btn btn-sm">
                    <img src="{{ asset('images/call/audio.png') }}" style="height: 20px;">
                  </a>
                @else                  
                  <button type="button" disabled title="Video Call" class="btn btn-sm">
                    <img src="{{ asset('images/call/video.png') }}" style="height: 20px;">
                  </button>
                  <button type="button" disabled title="Audio Call" class="btn btn-sm"> 
                    <img src="{{ asset('images/call/audio.png') }}" style="height: 20px;">
                  </button>
                @endif
                  </td>
                <td>
                  @if ($appointment->status == 'Pending')                      
                  <i class="btn btn-sm btn-warning mr-3">{{$appointment->status}}</i>
                  @elseif($appointment->status == 'Confirmed')
                  <i class="btn btn-sm btn-success mr-3">{{$appointment->status}}</i>
                  @elseif($appointment->status == 'Cancelled')
                  <i class="btn btn-sm btn-danger mr-3">{{$appointment->status}}</i>
                  @endif
                </td>
                <td>
                    @if ($appointment->status == 'Pending')                      
                    <a href="{{ url('doctor/appointment/?action=Confirmed&id='.$appointment->id) }}" class="btn btn-success">Confirm</a>
                    @elseif($appointment->status == 'Confirmed')
                    <a href="{{ url('doctor/appointment/?action=Cancelled&id='.$appointment->id) }}" class="btn btn-danger">Cancel</a>
                    @elseif($appointment->status == 'Cancelled')
                    <a href="{{ url('doctor/appointment/?action=Confirmed&id='.$appointment->id) }}" class="btn btn-primary">Approve</a>
                    @endif
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

  <script src="{{ asset('jquery/jquery.min.js')}}"></script>
  <script src="{{ asset('jquery/jquery.validate.min.js')}}"></script>
  
  
<script>
  $(document).ready(function(){
      $('#table').DataTable( {
          stateSave: true
      } );
  })
  </script>
@endsection