@extends('patient.layouts.app')
@section('content')
   <style>


input[type='radio']{
  display: list-item;
}
#videos {
  position: relative;
  width: 100%;
  height: 100%;
  margin-left: auto;
  margin-right: auto;
}

#subscriber {
  position: relative;
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
  z-index: 10;
}

#publisher {
  position: relative;
  width: 360px;
  height: 240px;
  bottom: 10px;
  left: 10px;
  z-index: 100;
  border: 3px solid white;
  border-radius: 3px;
}
   </style>
   <?php 
    function getDay($day)
    {
      $days = ['Monday' => 1, 'Tuesday' => 2, 'Wednesday' => 3, 'Thursday' => 4, 'Friday' => 5];
      $today = new \DateTime();
      $today->setISODate((int)$today->format('o'), (int)$today->format('W'), $days[ucfirst($day)]);
      return $today;
    }
?>  
   <a href='https://dryicons.com/icon/phone-call-grunge-style-icon-8946'></a>
   <script src="https://static.opentok.com/v2/js/opentok.min.js"></script>
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
          <div class="col-lg-6 col-5 text-right">
            <a href="{{ url('patient/appointment') }}" id="view" class="btn btn-sm btn-neutral">View History</a>
            <a href="{{ url('patient/book') }}" id="book" class="btn btn-sm btn-slack">Book Appointment</a>
          </div>
         </div>
      </div>
    </div>
  </div>
  <!-- Page content -->
 <div class="container-fluid mt--6">
   
 @if (isset($page_title) && $page_title == 'book_appointment')
  <div class="row" id="book_div">
    <div class="col-xl-8">
      <div class="card bg-default">
        <div class="card-header bg-transparent">
          <div class="row align-items-center">
            <div class="col">
              <h6 class="text-light text-uppercase ls-1 mb-1"></h6>
              <h5 class="h3 text-white mb-0">All Doctors</h5>
              <div class="text-center">
                @include('patient.layouts.includes.alert')
              </div>
            </div>
          </div>
        </div>
        <div class="card-body">
          <div class="row">
            @foreach ($doctors as $doctor)
              <div class="col-md-6 mt-3 mb-3">
                <div class="row">
                    <div class="col-5 col-md-5 col-sm-12 col-xm-12 pb-sm-3">
                        <img src="{{ asset('uploads/doctors_pictures/'. $doctor->picture ) }}" alt="" style="height: inherit; width:inherit">
                    </div>
                    <div class="col-7 col-md-7 col-sm-12 col-xm-12">
                        <h4  class="text-white">Dr. {{ $doctor->name }}</h4>
                        <a class="btn btn-sm btn-neutral text-blue"> {{ $doctor->speciality->name }}</a>
                        <i class="btn btn-sm btn-success mr-3 text-black">{{ $doctor->status }}</i>
                        <h4 class="text-white mt-2"><i class="fas fa-map-marker-alt"></i>  {{ $doctor->country->name }}</h4>
                        <button data-toggle="modal" data-target="#book-modal{{ $doctor->id }}" class="btn btn-sm btn-secondary">Book</button>
                        <button data-toggle="modal" data-target="#view-modal{{ $doctor->id }}" class="btn btn-sm btn-primary">View Profile</button>
                              
                          <!-- Modal -->
                          <div class="modal fade" id="book-modal{{ $doctor->id }}" tabindex="-1" role="dialog" aria-labelledby="uploadPictureTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="uploadPictureTitle">Dr {{ $doctor->name }}</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <form method="post" action="">
                                    <div class="modal-body">
                                        @csrf
                                        <input type="hidden" name="doctor_id" value="{{ $doctor->id }}">
                                        <input type="hidden" name="speciality_id" value="{{ $doctor->speciality->id }}">
                                        <fieldset style="border: 2px solid; padding-left:15px; padding-right: 15px; border-radius: 5px">
                                          <legend>Click on a day to make Appointent</legend>
                                          <div class="text-center text-danger">
                                            <label id="error_book{{ $doctor->id }}" class="text-danger" style="font-weight: 700"></label>
                                            <label id="success_book{{ $doctor->id }}" class="text-success" style="font-weight: 700"></label>
                                            <label id="day-error" class="error" for="day"></label>
                                          </div>
                                          <div class="row">
                                            <div class="col-4 mt-2 mb-2">
                                                <label class="custom_check btn btn-neutral">
                                                    <input type="radio" name="day" value="{{getDay('Monday')->format('l dS F Y') }}">
                                                    <span class="checkmark">{{getDay('Monday')->format('l dS F Y') }}</span>
                                                </label>
                                            </div>
                                            <div class="col-4 mt-2 mb-2">
                                                <label class="custom_check btn btn-neutral">
                                                    <input type="radio" name="day" value="{{ getDay('Tuesday')->format('l dS F Y') }}">
                                                    <span class="checkmark">{{ getDay('Tuesday')->format('l dS F Y') }}</span>
                                                </label>                
                                            </div>
                                            <div class="col-4 mt-2 mb-2">
                                              <label class="custom_check btn btn-neutral">
                                                  <input type="radio" name="day" value="{{ getDay('Wednesday')->format('l dS F Y') }}">
                                                  <span class="checkmark">{{ getDay('Wednesday')->format('l dS F Y') }}</span>
                                              </label>             
                                            </div>
                                            <div class="col-4 mt-2 mb-2">
                                              <label class="custom_check btn btn-neutral">
                                                  <input type="radio" name="day" value="{{ getDay('Thursday')->format('l dS F Y') }}">
                                                  <span class="checkmark">{{ getDay('Thursday')->format('l dS F Y') }}</span>
                                              </label>                  
                                            </div>
                                            <div class="col-4 mt-2 mb-2">
                                              <label class="custom_check btn btn-neutral">
                                                  <input type="radio" name="day" value="{{ getDay('Friday')->format('l dS F Y') }}">
                                                  <span class="checkmark">{{ getDay('Friday')->format('l dS F Y') }}</span>
                                              </label>                  
                                            </div>
                                          </div>
                                        </fieldset>
                                        <fieldset id="time" class="mt-3" style="border: 2px solid; padding-left:15px; padding-right: 15px; border-radius: 5px;">
                                          <legend>Select a time to make Appointent</legend>
                                          <div class="text-center text-danger">
                                            <label id="time-error" class="error" for="time"></label>
                                          </div>
                                          <div class="row">
                                            <div class="col-3 mt-3 mb-3">
                                              <label class="custom_check btn btn-neutral">
                                                  <input type="radio" name="time" value="7:00 am" required>
                                                  <span class="checkmark">7:00 am</span>
                                              </label>           
                                            </div>
                                            <div class="col-3 mt-3 mb-3">
                                              <label class="custom_check btn btn-neutral">
                                                  <input type="radio" name="time" value="9:00 am" required>
                                                  <span class="checkmark">9:00 am</span>
                                              </label>
                                            </div>
                                            <div class="col-3 mt-3 mb-3">
                                              <label class="custom_check btn btn-neutral">
                                                  <input type="radio" name="time" value="12:00 pm" required>
                                                  <span class="checkmark">12:00 pm</span>
                                              </label>              
                                            </div>
                                            <div class="col-3 mt-3 mb-3">
                                              <label class="custom_check btn btn-neutral">
                                                  <input type="radio" name="time" value="3:00 pm" required>
                                                  <span class="checkmark">3:00 pm</span>
                                              </label>             
                                            </div>
                                          </div>
                                        </fieldset>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" id="btn_book{{ $doctor->id }}" class="btn btn-primary">Book Now</button>
                                    </div>
                                </form>
                              </div>
                            </div>
                          </div>
                          <!-- Modal -->
                          <div class="modal fade" id="view-modal{{ $doctor->id }}" tabindex="-1" role="dialog" aria-labelledby="uploadPictureTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="uploadPictureTitle">Dr {{ $doctor->name }} 
                                    
                                  </h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                    <div class="modal-body">
                                      <div class="card card-profile">
                                        <div class="card-body p-0">
                                          <div class="row">
                                            <div class="col-5">
                                              <img src="{{ asset('uploads/doctors_pictures/'. $doctor->picture ) }}" class="" style="height: auto; width: 190px">
                                            </div>
                                            <div class="col-7">
                                              <h2 class="text-capitalize" style="font-size: 20px;
                                              font-weight: 700;
                                              margin-bottom: 3px;">Dr. {{ $doctor->name }}</h2>
                                              <h2 style="font-size: 14px;
                                              color: #757575;
                                              margin-bottom: 10px;">{{ $doctor->speciality->name }} <i class="btn btn-sm btn-success mr-3">{{ $doctor->status }}</i></h2>
                                              <h2 style="font-size: 14px;
                                              color: #757575;
                                              margin-bottom: 15px;">{{ (date('Y') - date('Y', strtotime($doctor->age))) }} years</h2>
                                              <h2 style="font-size: 14px;
                                              color: #757575;
                                              margin-bottom: 15px;">{{ $doctor->gender }}</h2>
                                              <h2 style="font-size: 14px;
                                              color: #757575;
                                              margin-bottom: 15px;">{{ $doctor->country->name }}</h2>
                                            </div>
                                          </div>
                                          <div class="row mt-2">
                                            <div class="col-12">
                                              <h2 style="font-size: 15px;
                                              color: #757575;
                                              margin-bottom: 3px;">{{ $doctor->about }}</h2>
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
              </div>
            @endforeach
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-4">
      <div class="card">
        <div class="card-header bg-transparent">
          <div class="row align-items-center">
            <div class="col">
              <h6 class="text-uppercase text-muted ls-1 mb-1">Filter Search</h6>
              <h5 class="h3 mb-0"></h5>
            </div>
          </div>
        </div>
        <div class="card-body">
        <form method="post" action="{{ url('patient/search_doctor') }}">
          @csrf
            <div class="filter-widget pb-3">
              <h4>Gender</h4>
              <div class="form-check">
                <input type="radio" class="form-check-input" required name="doc_gender">
                <label class="form-check-label" for="exampleCheck1">Male Doctor</label>
              </div>              
              <div class="form-check">
                <input type="radio" class="form-check-input" name="doc_gender">
                <label class="form-check-label" for="exampleCheck1">Female Doctor</label>
              </div>
          </div>
          <div class="filter-widget pb-3">
              <h4>Select Specialist</h4> 
                                         
              <div class="form-check">
                <input type="radio" class="form-check-input" required value="1" name="specs">
                <label class="form-check-label" for="exampleCheck1">Ayurveda</label>
              </div>                           
              <div class="form-check">
                <input type="radio" class="form-check-input" required value="2" name="specs">
                <label class="form-check-label" for="exampleCheck1">Gynecologist</label>
              </div>                           
              <div class="form-check">
                <input type="radio" class="form-check-input" required value="3" name="specs">
                <label class="form-check-label" for="exampleCheck1">Cardiologist</label>
              </div>
                                         
              <div class="form-check">
                <input type="radio" class="form-check-input" required value="4" name="specs">
                <label class="form-check-label" for="exampleCheck1">Eye Care</label>
              </div>                           
              <div class="form-check">
                <input type="radio" class="form-check-input" required value="5" name="specs">
                <label class="form-check-label" for="exampleCheck1">Urology</label>
              </div>                           
              <div class="form-check">
                <input type="radio" class="form-check-input" required value="6" name="specs">
                <label class="form-check-label" for="exampleCheck1">Pulmonologist</label>
              </div>                           
              <div class="form-check">
                <input type="radio" class="form-check-input" required value="7" name="specs">
                <label class="form-check-label" for="exampleCheck1">Orthopedic</label>
              </div>
              <div class="form-check">
                <input type="radio" class="form-check-input" required value="8" name="specs">
                <label class="form-check-label" for="exampleCheck1">Gastrologist</label>
              </div>
              <div class="form-check">
                <input type="radio" class="form-check-input" required value="9" name="specs">
                <label class="form-check-label" for="exampleCheck1">Homeopathy</label>
              </div>
              <div class="form-check">
                <input type="radio" class="form-check-input" required value="10" name="specs">
                <label class="form-check-label" for="exampleCheck1">Dermatologist</label>
              </div>
              <div class="form-check">
                <input type="radio" class="form-check-input" required value="11" name="specs">
                <label class="form-check-label" for="exampleCheck1">Dentist</label>
              </div>
              <div class="form-check">
                <input type="radio" class="form-check-input" required value="12" name="specs">
                <label class="form-check-label" for="exampleCheck1">Neurologist</label>
              </div>
          </div>            
          <div class="filter-widget">
              <button type="submit" class="btn btn-block btn-primary">Search</button>
          </div>
          </form>
        </div>
      </div>
    </div>
  </div>  
 @endif

 @if (isset($page_title) && $page_title == 'appointments')
  <div class="row" id="appointments">
    <div class="col-xl-12">
      <div class="card">
        <div class="card-header border-0">
          <div class="row align-items-center">
            <div class="col">
              <h3 class="mb-0">All my Appointments</h3>
            </div>
            <div class="text-center">              
              @include('patient.layouts.includes.alert')
            </div>
            <div class="col text-right">
              <a href="#!" class="btn btn-sm btn-primary">See all</a>
            </div>
          </div>
        </div>
        <div class="table-responsive">
          <!-- Projects table -->
          <table class="table align-items-center table-flush" id="table">
            <thead class="thead-light">
              <tr>
                <th scope="col">S/N</th>
                <th colspan='3' scope="col" class="text-center">Doctor</th>
                <th scope="col">Appointment Date</th>
                <th scope="col">Booking Date</th>
                <th scope="col" class="text-center">Call</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>                  
              @foreach ($appointments as $appointment)
              <tr>
                <td scope="row">{{ $serial++ }}</td>
                <td scope="row">
                  <h2 class="table-avatar">
                      <a href="doctor-profile.html" class="avatar avatar-sm mr-2">
                        <img class="" src="{{ asset('uploads/doctors_pictures/'.$appointment->user->picture) }}" alt="{{$appointment->user->name}}">
                      </a>
                  </h2>
                </td>
                <td scope="row">
                  Dr. {{$appointment->user->name}}
                </td>
                <td scope="row">
                  <span>{{$appointment->speciality->name}}</span>
                </td>
                <td>
                  {{$appointment->book_day}} - {{$appointment->book_time}}
                </td>
                <td>
                  {{ date('D, M j, Y \a\t g:ia', strtotime($appointment->created_at)) }}
                </td>
                <td>
                  @if ($appointment->status == 'Confirmed')                      
                    <a href="{{ url('call_now?mode=video&receiver_id='.$appointment->user->id) }}" target="_blank" title="Video Call" class="btn btn-sm">
                      <img src="{{ asset('images/call/video.png') }}" style="height: 20px;">
                    </a>
                    <a  href="{{ url('call_now?mode=audio&receiver_id='.$appointment->user->id) }}" target="_blank" title="Audio Call" class="btn btn-sm">
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
                      <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteModal{{$appointment->id}}">Delete</button>
                  
                      <div class="modal fade" id="deleteModal{{$appointment->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                </div>
                                <div class="modal-body text-center">
                                    <form method="post" action="{{ url('patient/appointment') }}">
                                      @csrf
                                        <input type="hidden" value="{{$appointment->id }}" name="id">
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

                      <div class="modal fade" id="AudioModal{{$appointment->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                </div>
                                <div class="modal-body text-center">
                                    <form method="post" action="{{ url('patient/appointment') }}">
                                      @csrf
                                        <input type="hidden" value="{{$appointment->id }}" name="id">
                                        <h1>Are you sure?</h1>
                                        <h4>You will not be able to recover this file</h4>
                                        <!-- csrf token -->
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">End</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                      </div>

                      <div class="modal fade" id="VideoModal{{$appointment->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                  Dr. {{$appointment->user->name }}    
                                  {{-- <button type="button" id="clickable2" class="btn">End</button> --}}
                                </div>
                                <div class="modal-body">
                                  <div id="videos">
                                    <div id="subscriber"></div>
                                    <div id="publisher"></div>
                                </div>
                                <div class="text-center">
                                  <button type="button" onclick="return callMe();" class="btn btn-success text-left">Call</button>
                                  <button type="button" id="lickable" class="btn btn-danger text-right" data-dismiss="modal">End</button>
                                </div>
                                </div>
                            </div>
                        </div>
                      </div>

                     
                  </td>
              </tr>
              @endforeach
            </tbody>
          </table>
{{-- <input type="" value="" id="key">
<input type="" value="" id="session_id">
<input type="" value="" id="token"> --}}
        </div>
      </div>
    </div>
  </div>       
 @endif

</div>
  <script src="{{ asset('jquery/jquery.min.js')}}"></script>
  <script src="{{ asset('jquery/jquery.validate.min.js')}}">
  </script>
  
<script>
  $(document).ready(function(){
      $('#table').DataTable( {
          stateSave: true
      } );
  })

  $.ajax({
    type: "get",
    url: "{{ url('patient/calling') }}",
    success: function (response) {
      $('#key').val(response.api_key)
      $('#session_id').val(response.session_id)
      $('#token').val(response.token)
      console.log(response)
      // alert((response))
          
    }
  });

  function callMe(){
      var sessionId = '1_MX40NjkxMDM2NH5-MTU5OTMwMzE1NzQ2NX5sajFtV1NabEFIZ2JlVzh0cWcvTnJ5S2J-fg';
      var token =  'T1==cGFydG5lcl9pZD00NjkxMDM2NCZzaWc9NjZhZWZjMzUxNmU3OWVkNTMzMWFjNzI3NmViNjliZTdiNDdmYWQ4NzpzZXNzaW9uX2lkPTFfTVg0ME5qa3hNRE0yTkg1LU1UVTVPVE13TXpFMU56UTJOWDVzYWpGdFYxTmFiRUZJWjJKbFZ6aDBjV2N2VG5KNVMySi1mZyZjcmVhdGVfdGltZT0xNTk5MzAzMTU4JnJvbGU9cHVibGlzaGVyJm5vbmNlPTE1OTkzMDMxNTguNDYwOTk4ODQwMTEwMiZpbml0aWFsX2xheW91dF9jbGFzc19saXN0PQ==';
      var apiKey = '46910364';

      // Handling all of our errors here by alerting them
      function handleError(error) {
      if (error) {
        alert('errorssssss' + error.message);
      }
      }

      // (optional) add server code here
      initializeSession();

      function initializeSession() {
      var session = OT.initSession(apiKey, sessionId);

      // Subscribe to a newly created stream
      session.on('streamCreated', function(event) {
        session.subscribe(event.stream, 'subscriber', {
          insertMode: 'append',
          width: '100%',
          height: '100%'
        }, handleError);
      });

      // Create a publisher
      var publisher = OT.initPublisher('publisher', {
        insertMode: 'append',
        width: '100%',
        height: '100%',
        publishAudio:true,
        publishVideo:false
      }, handleError);

      // Connect to the session
      session.connect(token, function(error) {
        // If the connection is successful, initialize a publisher and publish to the session
        if (error) {
          handleError(error);
        } else {
          session.publish(publisher, handleError);
        }
      });
      }
  }
  </script>
@endsection