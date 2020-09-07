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
                <li class="breadcrumb-item active" aria-current="page">Prescribtions</li>
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
              <h3 class="mb-0">Prescribtions</h3>
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
                <th scope="col">Date Prescribed</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($prescribtions as $prescribtion)
              <tr>
                <td scope="row">{{ $serial++ }}</td>
                <td scope="row">{{$prescribtion->user->name}}</td>
                <td>
                  {{ date('D, M j, Y \a\t g:ia', strtotime($prescribtion->created_at)) }}
                </td>
                <td>
                    <button data-toggle="modal" data-backdrop="static" data-keyboard="false" data-target="#ViewModal{{$prescribtion->id}}" class="btn btn-sm btn-dark">View</button>
                    <button data-toggle="modal" data-backdrop="static" data-keyboard="false" data-target="#deleteModal{{$prescribtion->id}}" class="btn btn-sm btn-danger">Delete</a>
                </td>
              </tr>
              <div class="modal fade" id="deleteModal{{$prescribtion->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                        </div>
                        <div class="modal-body text-center">
                            <form method="post" action="{{ url('doctor/delete_appointment') }}">
                              @csrf
                                <input type="hidden" value="{{$prescribtion->id }}" name="id">
                                <h1>Are you sure?</h1>
                                <h4>You will not be able to recover this file</h4>
                                <!-- csrf token -->
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                <button type="submit" name="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
              </div>

              {{-- View Modal --}}
                <div class="modal fade" id="ViewModal{{$prescribtion->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                      <div class="modal-content">
                          <div class="modal-header">
                            {{$prescribtion->user->name}}
                          </div>
                          <div class="modal-body">
                              <p>Patient Name: {{$prescribtion->user->name}}</p>
                              <p>Medicine Type: {{$prescribtion->medicine_type}}</p>
                              <p>Medicine Name: {{$prescribtion->medicine_name}}</p>
                              <p>MG/ML: {{$prescribtion->mg_ml}}</p>
                              <p>Dose: {{$prescribtion->dose}}</p>
                              <p>Day: {{$prescribtion->day}}</p>
                              <p>Medicine Comment: {{$prescribtion->medicine_comment}}</p>
                              <p>Overall Comment: {{$prescribtion->overall_comment}}</p>
                              <p>Prescribed On: {{ date('D, M j, Y \a\t g:ia', strtotime($prescribtion->created_at)) }}</p>
                              <!-- csrf token -->
                              <div class="text-right">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                              </div>
                          </div>
                      </div>
                  </div>
                </div>
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