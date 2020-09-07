@extends('frontend.layouts.app')
@section('content')

<!-- Font Icon -->
<link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">
<style>
  input[type="file"] {
  display: none;  
  height: 35px !important;
  }
  input{
    height: 35px !important;
    font-size: 15px !important;
    }
  select{
  height: 35px !important;
  font-size: 15px !important;
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
    <div class="col-lg-8 col-md-12 offset-lg-2">
        <div class="card py-3" style="box-shadow: 0 4px 6px rgba(42, 42, 135, 1.11), 0 1px 3px rgba(47, 18, 140, 1.08); border-radius:10px; margin-top: 5rem; margin-bottom: 10rem">
          <div class="card-header text-center" style="background: none; border-bottom: 0;">
          <h2 style="font-weight: 700; color:#4c9afe">Doctor Registration Form</h2>
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
            <form id="doctor-signup" role="form" enctype="multipart/form-data" action="{{ url('doctor-signup') }}" method="post">
              {{ csrf_field() }}
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label>Name</label>
                  <input type="text" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" name="name"  placeholder="Name">
                  @error('name')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                </div>
                <div class="form-group col-md-6">
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
                <div class="form-group col-md-6">
                  <label>Mobile</label>
                  <input class="form-control @error('mobile') is-invalid @enderror" value="{{ old('mobile') }}" name="mobile" placeholder="Mobile Number" type="number">
                  @error('mobile')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
                <div class="form-group col-md-6">
                  <label for="inputPassword4">Gender</label>
                  <select class="form-control @error('gender') is-invalid @enderror" name="gender">
                      <option value="">Gender</option>
                      <option value="Male" {{ old('gender') == 'Male' ? "selected" : "" }}>Male</option>
                      <option value="Female" {{ old('gender') == 'Female' ? "selected" : "" }}>Female</option>
                  </select>
                  @error('gender')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                </div>
              </div>             
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label>Password</label>
                  <input class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password" type="password">
                @error('password')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                @enderror
                </div>
                <div class="form-group col-md-6">
                  <label for="inputPassword4">Confirm Password</label>
                  <input class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" placeholder="Confrim Password" type="password">
                  @error('password_confirmation')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                </div>
              </div>
              <div class="form-row mt-2 mb-2">
                <div class="form-group col-md-6">
                  <label>Upload Picture</label>
                  <input type="file" name="picture" accept="image/jpeg, image/jpg, image/png" class="custom-file-input @error('picture') is-invalid @enderror" id="customFile" style="height: 35px !important">
                  <label class="custom-file-label" for="customFile" style="height: 35px; margin-right:5px; margin-left:5px">Upload Picture</label>               
                  @error('picture')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                </div>
                <div class="form-group col-md-6">
                  <label>Upload CV</label>
                    <input type="file" name="cv" accept="application/pdf" class="custom-file-input @error('cv') is-invalid @enderror" id="customFile2">
                    <label class="custom-file-label" for="customFile2" style="height: 35px; margin-right:5px; margin-left:5px">Upload CV</label>
                    @error('cv')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label>Date of Birth</label>
                  <input class="form-control @error('dob') is-invalid @enderror" value="{{ old('dob') }}" name="dob" placeholder="" type="date">
                  @error('dob')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                </div>
                <div class="form-group col-md-6">
                    <label>Speciality</label>                    
                    <select class="form-control @error('speciality_id') is-invalid @enderror" name="speciality_id">
                      <option value="">Speciality</option>
                      @foreach ($specialities as $speciality)
                            <option value="{{ $speciality->id }}" {{ old('speciality_id') == $speciality->id ? "selected" : "" }}>{{ $speciality->name }}</option>
                      @endforeach
                  </select>
                  @error('speciality_id')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                </div>
              </div>
              <div class="form-row">                
                  <label>Country</label>
                    <select class="form-control @error('country_id') is-invalid @enderror" name="country_id">
                        <option value="">Country</option>
                        @foreach ($countries as $country)
                              <option value="{{ $country->id }}" {{ old('country_id') == $country->id ? "selected" : "" }}>{{ $country->name }}</option>
                        @endforeach
                    </select>
                    @error('country_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
              </div>
              <div class="form-row">
                  <label>About Me</label>
                  <textarea rows="4" class="form-control @error('about') is-invalid @enderror" name="about" maxlength="150" placeholder="About Myself">{{ old('about') }}</textarea>
                  @error('about')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
              </div>
              <div class="form-row">
                  <label for="inputAddress">Address</label>
                  <textarea rows="4" class="form-control @error('address') is-invalid @enderror" name="address" placeholder="Address">{{ old('address') }}</textarea>
                  @error('address')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
              </div>               
              <div class="form-group col-md-12">
                <input class="custom-control-input @error('terms') is-invalid @enderror" id="customCheckRegister" name="terms" type="checkbox">
                  <label class="custom-control-label" for="customCheckRegister">
                    <span class="text-muted">I agree with the Privacy Policy</span>
                  </label><br>
                  <label id="terms-error" class="error" for="terms"></label>
                @error('terms')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>           
            <div class="text-center">
              <button type="submit" id="btn_create" class="btn btn-default my-4">Create account</button>
            </div>         
            </form>
          </div>
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

  $('#doctor-signup').validate({
        rules: {
            name: {
                required: true,
            },
            mobile: {
                required: true,
            },
            date: {
                required: true,
            },
            gender: {
                required: true,
            },
            dob: {
                required: true,
            },
            cv: {
                required: true,
            },
            speciality_id: {
                required: true,
            },
            picture: {
                required: true,
            },
            email: {
                required: true,
                email: true,
            },            
            about: {
                required: true,
            },
            address: {
                required: true,
            },
            country_id: {
                required: true,
            },
            terms: {
                required: true,
            },
            password: {
                required: true,
                PASSWORD: true
            },
            password_confirmation: {
                required: true,
                minlength: 8,
                equalTo: '[name=password]',
            }
        },
        messages: {
            password_confirmation: {
                equalTo: "{{__("Please enter same value as the password field!")}}",
            },
        },
        // errorPlacement: function(error, element){
        //   error.insertAfter(element.parent('div'));
        // },
        submitHandler: function(form)
        {
            // $("#users_create").attr("disabled", true).click(function (e)
            // {
            //     e.preventDefault();
            // });
            // $(".spinner").show();
            $("#btn_create").text("{{__('Signing Up...')}}");
            form.submit();
        }
    });
</script>
@endsection