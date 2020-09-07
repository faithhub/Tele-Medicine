@extends('doctor.layouts.app')
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
                <li class="breadcrumb-item active" aria-current="page">My Profile</li>
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
<div class="container-fluid mt--6">
    <div class="row">
      <div class="col-xl-4 order-xl-2">
        <div class="card card-profile">
          <img src="../assets/img/theme/img-1-1000x600.jpg" alt="Image placeholder" class="card-img-top">
          <div class="row justify-content-center">
            <div class="col-lg-3 order-lg-2">
              <div class="card-profile-image">
                <a href="#">
                <img src="{{ asset('uploads/doctors_pictures/'.Auth::user()->picture) }}" class="rounded-circle">
                </a>
              </div>
            </div>
          </div>
          <div class="card-header ">
            <div class="d-flex justify-content-between">
              <a class="btn btn-sm btn-info  mr-4" data-toggle="modal" data-target="#uploadPicture">Update Pics</a>
              <a class="btn btn-sm btn-default float-right" data-toggle="modal" data-target="#uploadCV">Update CV</a>
            </div>
          </div>
          <div class="card-body border-0 pt-lg-3 pt-md-3 pb-2 pb-md-4">
            <div class="row">
              <div class="col">
                <div class="card-profile-stats">
                    <h4 class="text-capitalize">Email: <a class="btn btn-sm btn-default text-white">{{ Auth::user()->email }}</a></h4>
                    <h4>Name: <a class="btn btn-sm btn-default text-white">{{ Auth::user()->name }}</a></h4>
                    <h4>Mobile: <a class="btn btn-sm btn-default text-white">{{ Auth::user()->mobile }}</a></h4>
                    <h4>Age: <a class="btn btn-sm btn-default text-white">{{ (date('Y') - date('Y', strtotime(Auth::user()->dob))) }}</a></h4>
                    <h4>Gender: <a class="btn btn-sm btn-default text-white">{{ Auth::user()->gender }}</a></h4>
                    <h4>Speciality: <a class="btn btn-sm btn-default text-white">{{ $myspeciality[0]['name'] }}</a></h4>
                    <h4>About Me: {{ Auth::user()->about }}</h4>
                    <h4>Address: {{ Auth::user()->address }}</h4>
                    <h4>Country: <a class="btn btn-sm btn-default text-white">{{ $mycountry[0]['name'] }}</a></h4>
                    <h4>My CV: <a href="{{ asset('uploads/doctors_cv/'.Auth::user()->cv) }}" target="_blank" class="btn btn-sm btn-default text-white">View</a></h4>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-8 order-xl-1">
        <div class="card">
          <div class="card-header">
            <div class="row align-items-center">
              <div class="col-8">
                <h3 class="mb-0">Edit profile </h3>
              </div>
              <div class="col-4 text-right">
                <a href="#!" class="btn btn-sm btn-primary">Settings</a>
              </div>
            </div>
          </div>
          <div class="card-body">              
            <div class="text-center">
                @include('doctor.layouts.includes.alert')
            </div>
          <form action="{{ url('doctor/profile') }}" method="POST">
            @csrf
              <h6 class="heading-small text-muted mb-4">{{ Auth::user()->role }} information</h6>
              <div class="pl-lg-4">
                <div class="row">
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label class="form-control-label" for="input-username">Full Name</label>
                      <input class="form-control @error('name') is-invalid @enderror" value="{{ Auth::user()->name }}" name="name" placeholder="Email" type="text">
                      @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label class="form-control-label" for="input-email">Email address</label>
                      <input type="email" id="input-email" readonly disabled class="form-control" value="{{ Auth::user()->email }}" placeholder="jesse@example.com">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label class="form-control-label" for="input-first-name">Mobile</label>
                      <input class="form-control @error('mobile') is-invalid @enderror" value="{{ Auth::user()->mobile }}" name="mobile" placeholder="Mobile Number" type="number">
                      @error('mobile')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label class="form-control-label" for="input-last-name">Date of Birth</label>
                      <input class="form-control @error('dob') is-invalid @enderror" value="{{ Auth::user()->dob }}" name="dob" placeholder="" type="date">
                      @error('dob')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                    </div>
                  </div>
                </div>
                
                <div class="row">
                    <div class="col-lg-12">
                      <div class="form-group">
                        <label class="form-control-label" for="input-first-name">About Me</label>
                        <textarea class="form-control @error('about') is-invalid @enderror" name="about">{{ Auth::user()->about }}</textarea>
                        @error('about')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                        @enderror
                      </div>
                    </div>
                  </div>
              </div>
              <hr class="my-4" />
              <!-- Address -->
              <h6 class="heading-small text-muted mb-4">Contact information</h6>
              <div class="pl-lg-4">
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label class="form-control-label" for="input-address">Address</label>
                      <input id="input-address" class="form-control @error('address') is-invalid @enderror" name="address" placeholder="Home Address" value="{{ Auth::user()->address }}" type="text">
                      @error('address')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                    </div>
                  </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label class="form-control-label" for="input-address">Country</label>
                        <select class="form-control @error('country_id') is-invalid @enderror" name="country_id">
                            <option value="">Select Country</option>
                            @foreach ($countries as $country)
                                  <option value="{{ $country->id }}" {{ Auth::user()->country_id == $country->id ? "selected" : "" }}>{{ $country->name }}</option>
                            @endforeach
                        </select>
                        @error('country_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>                
                <div class="row">
                    <div class="col-md-12">
                        <div class="text-right">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </div>
                </div>
              </div>
            </form>
          </div>

        </div>
        
      </div>
    </div>
</div>
  

  <!-- Modal -->
  <div class="modal fade" id="uploadPicture" tabindex="-1" role="dialog" aria-labelledby="uploadPictureTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="uploadPictureTitle">Upload Profile Picture</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form method="post" action="{{ url('doctor/updatepicture') }}" enctype="multipart/form-data">
            <div class="modal-body">
                @csrf
                <div class="col-10">
                <div class="form-group">
                    <label>Profile Picture</label><br>
                    <input type="file" accept="image/jpeg, image/jpg, image/png" name="picture" class="custom-file-input">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
        </form>
      </div>
    </div>
  </div>

<!--CV Modal -->
<div class="modal fade" id="uploadCV" tabindex="-1" role="dialog" aria-labelledby="uploadCVTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Upload CV</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form method="post" action="{{ url('doctor/updatecv') }}" enctype="multipart/form-data">
            <div class="modal-body">
                @csrf
                <div class="col-10">
                <div class="form-group">
                        <label>Upload CV</label><br>
                        <input type="file" accept="application/pdf" name="cv" class="custom-file-input">
                </div>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
        </form>
      </div>
    </div>
  </div>



@endsection