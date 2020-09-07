@extends('patient.layouts.app')
@section('content')
   <style>


input[type='radio']{
  display: list-item;
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
    <div class="row" id="book_div">
        <div class="col-xl-8">
          <div class="card bg-default">
            <div class="card-header bg-transparent">
              <div class="row align-items-center">
                <div class="col">
                  <h6 class="text-light text-uppercase ls-1 mb-1"></h6>
                    <h5 class="h3 text-white mb-0">Search Result</h5>
                  {{-- <div class="text-center">
                    @include('patient.layouts.includes.alert')
                  </div> --}}
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
                                    <form method="post" action="{{ url('patient/book') }}">
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
                    <input type="radio" class="form-check-input" value="Male" required name="doc_gender">
                    <label class="form-check-label" for="exampleCheck1">Male Doctor</label>
                  </div>              
                  <div class="form-check">
                    <input type="radio" class="form-check-input" value="Female" name="doc_gender">
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
 
</div>
  <script src="{{ asset('jquery/jquery.min.js')}}"></script>
  <script src="{{ asset('jquery/jquery.validate.min.js')}}">
  </script>
  <script>
    
  // $('#clickable2').click(function() {
  //   console.log('calling')
  // })
  
</script>
@endsection