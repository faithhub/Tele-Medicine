@extends('doctor.layouts.app')
@section('content')
    
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
                <li class="breadcrumb-item active" aria-current="page">Default</li>
              </ol>
            </nav>
          </div>
        <div class="row">
          <div class="col-lg-12 col-md-10 m-2">
              <h1 class="display-2 text-white">Welcome Dr. {{ Auth::user()->name }}</h1>
          </div>
      </div>
    </div>
        <!-- Card stats -->
        <div class="row">
          <div class="col-xl-6 col-md-6">
            <div class="card card-stats">
              <!-- Card body -->
              <div class="card-body">
                <div class="row">
                  <div class="col">
                    <h5 class="card-title text-uppercase text-muted mb-0">All Prescriptions</h5>
                    <span class="h2 font-weight-bold mb-0 pb-5">{{ number_format($apps, 2) }}</span>
                  </div>
                  <div class="col-auto">
                    <div class="icon icon-shape bg-gradient-orange text-white rounded-circle shadow">
                      <i class="ni ni-chart-pie-35"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-6 col-md-6">
            <div class="card card-stats">
              <!-- Card body -->
              <div class="card-body">
                <div class="row">
                  <div class="col">
                    <h5 class="card-title text-uppercase text-muted mb-0">All Appointments</h5>
                    <span class="h2 font-weight-bold mb-0 pb-5">{{ number_format($pres, 2) }}</span>
                  </div>
                  <div class="col-auto">
                    <div class="icon icon-shape bg-gradient-green text-white rounded-circle shadow">
                      <i class="ni ni-money-coins"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Page content -->
  <div class="container-fluid mt--6">
    <div class="row">
      <div class="col-xl-12">
        <div class="card">
          <div class="card-header border-0">
            <div class="row align-items-center">
              <div class="col">
                <h3 class="mb-0">Latest Appointment</h3>
              </div>
            </div>
          </div>
          <div class="table-responsive">
            <!-- Projects table -->
            <table class="table align-items-center table-flush">
              <thead class="thead-light">
                <tr>
                  <th scope="col">S/N</th>
                  <th scope="col">Patient Name</th>
                  <th scope="col">Appointment Date</th>
                  <th scope="col">Booking Date</th>
                  <th scope="col">Status</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($latest_apps as $appointment)
                <tr>
                  <td scope="row">{{ $serial++ }}</td>
                  <td scope="row">
                    {{$appointment->patient->name}}
                  </td>
                  <td>
                    {{$appointment->book_day}} - {{$appointment->book_time}}
                  </td>
                  <td>
                    {{ date('D, M j, Y \a\t g:ia', strtotime($appointment->created_at)) }}
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
                </tr>
                @endforeach
              </tbody>
            </table>
            {{-- <button id="clickablee" class="btn">Check</button> --}}
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection