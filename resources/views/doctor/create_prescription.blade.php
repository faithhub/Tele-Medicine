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
      <div class="col-xl-12 order-xl-1">
        <div class="card">
          <div class="card-header">
            <div class="row align-items-center">
              <div class="col-8">
              <h3 class="mb-0">Create Prescribtion for {{ $patient[0]['name'] }}</h3>
              </div>
              {{-- <div class="col-4 text-right">
                <a href="#!" class="btn btn-sm btn-primary">Settings</a>
              </div> --}}
            </div>
          </div>
          <div class="card-body">              
            <div class="text-center">
                @include('doctor.layouts.includes.alert')
            </div>
            <h6 class="heading-small text-muted mb-4">Patient information</h6>
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <h3>Name: {{ $patient[0]['name'] }}</h3>
                </div>
                <div class="col-lg-4 col-md-6">
                    <h3>Email: {{ $patient[0]['email'] }}</h3>
                </div>
                <div class="col-lg-2 col-md-6">
                    <h3>Age: {{ (date('Y') - date('Y', strtotime($patient[0]['dob']))) }}</h3>
                </div>
                <div class="col-lg-2 col-md-6">
                    <h3>Gender: {{ $patient[0]['gender'] }}</h3>
                </div>
            </div>
            
            <hr class="my-4" />
          <form action="{{ url('doctor/create') }}" method="POST">
            @csrf
            <input type="hidden" name="user_id" value="{{ $patient[0]['id'] }}">
              <h6 class="heading-small text-muted mb-4">Prescribtion information</h6>
              <div class="pl-lg-4">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-control-label" for="input-first-name">Medicine Type</label>
                            <input type="" class="form-control @error('medicine_type') is-invalid @enderror" value="{{ old('medicine_type') }}" name="medicine_type">
                            @error('medicine_type')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-control-label" for="input-first-name">Medicine Name</label>
                            <input type="" class="form-control @error('medicine_name') is-invalid @enderror" value="{{ old('medicine_name') }}" name="medicine_name">
                            @error('medicine_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror                            
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-control-label" for="input-first-name">MG/ML</label>
                            <input type="" class="form-control @error('mg_ml') is-invalid @enderror" value="{{ old('mg_ml') }}" name="mg_ml">
                            @error('mg_ml')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror         
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="form-control-label" for="input-first-name">Dose</label>
                            <input type="" class="form-control @error('dose') is-invalid @enderror" value="{{ old('dose') }}" name="dose">
                            @error('dose')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror         
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="form-control-label" for="input-first-name">Day</label>
                            <input type="" class="form-control @error('day') is-invalid @enderror" value="{{ old('day') }}" name="day">
                            @error('day')
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
                            <label class="form-control-label" for="input-first-name">Medicine Comment</label>
                            <textarea rows="5" class="form-control @error('medicine_comment') is-invalid @enderror" value="{{ old('medicine_comment') }}" name="medicine_comment"></textarea>
                            @error('medicine_comment')
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
                            <label class="form-control-label" for="input-first-name">Overall Comment</label>
                            <textarea rows="7" class="form-control @error('overall_comment') is-invalid @enderror" name="overall_comment">{{ old('overall_comment') }}</textarea>
                            @error('overall_comment')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror         
                        </div>
                    </div>
                </div>
              </div>
              <div class="pl-lg-4">             
                <div class="row">
                    <div class="col-md-12">
                        <div class="text-right">
                            <button type="submit" class="btn btn-primary">Send Prescribtion</button>
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
@endsection