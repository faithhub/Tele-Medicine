@extends('admin.layouts.app')
@section('content')
<style>
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
<script  src="https://code.jquery.com/jquery-3.5.1.js"></script>
<div class="header bg-primary pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <h6 class="h2 text-white d-inline-block mb-0">Web Settings</h6>
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                            <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#">Web Settings</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Settings</li>
                        </ol>
                    </nav>
                </div>
                {{-- <div class="col-lg-6 col-5 text-right">
                    <a href="#" class="btn btn-sm btn-neutral">New</a>
                    <a href="#" class="btn btn-sm btn-neutral">Filters</a>
                </div> --}}
            </div>                       
            <div class="text-center">
                @include('admin.layouts.includes.alert')
            </div>
        </div>
    </div>
</div>
<div class="container-fluid mt--6">
    <div class="row">
        <div class="col-lg-6 col-md-6">
            <div class="card">
                <!-- Card header -->
                <div class="card-header border-0">
                    <h3 class="mb-0">Website Logo</h3>
                </div>
                <!-- Light table -->
               <div class="card-body">
                   <div class="row">
                       <div class="col-6 col-md-6 col-sm-12">
                           <form method="POST" action="" enctype="multipart/form-data">
                               @csrf
                               <div class="form-group">
                                <label class="">Update Logo</label>   
                                <input type="file" name="website_logo" accept="image/jpeg, image/jpg, image/png" class="custom-file-input @error('website_logo') is-invalid @enderror">
                                @error('website_logo')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                               </div>
                               <button type="submit" name="name" value="website_logo_update" class="btn btn-success">Update</button>
                               <div class="form-group">
                               </div>
                           </form>
                       </div>
                       <div class="col-6 col-md-6 col-sm-12">
                           <img src="{{ asset('images/logo/'.$logo) }}" alt="{{ $logo }}" style="width: 150px">
                        </div>
                   </div>
               </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-6">
            <div class="card">
                <!-- Card header -->
                <div class="card-header border-0">
                    <h3 class="mb-0">Dashboard Logo</h3>
                </div>
                <!-- Light table -->
               <div class="card-body">
                   <div class="row">
                       <div class="col-6 col-md-6 col-sm-12">
                        <form method="POST" action="" enctype="multipart/form-data">
                            @csrf
                               <div class="form-group">
                                <label>Update Logo</label>
                                <input type="file" name="dashboard_logo" accept="image/jpeg, image/jpg, image/png" class="custom-file-input @error('dashboard_logo') is-invalid @enderror">
                                @error('dashboard_logo')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                               </div>
                               <button type="submit" name="name" value="dashboard_logo_update" class="btn btn-success">Update</button>
                               <div class="form-group">
                               </div>
                           </form>
                       </div>
                       <div class="col-6 col-md-6 col-sm-12">
                        <img src="{{ asset('images/logo/'.$logo2) }}" alt="{{ $logo2 }}" style="width: 150px">
                        </div>
                   </div>
               </div>
            </div>
        </div>

        <div class="col-lg-6 col-md-6">
            <div class="card">
                <!-- Card header -->
                <div class="card-header border-0">
                    <h3 class="mb-0">Contact Us</h3>
                </div>
                <!-- Light table -->
               <div class="card-body">
                   <div class="row">
                       <div class="col-12 col-md-12 col-sm-12">
                        <form method="POST" action="">
                            @csrf                     
                                <div class="form-group">
                                <label class="" >Official Email Address</label>   
                                <input type="email" name="mail" value="{{ $email }}" class="form-control @error('mail') is-invalid @enderror">
                                @error('mail')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
                               <div class="form-group">
                                <label class="" >Mobile Number</label>   
                                <input type="text" name="mobile" value="{{ $mobile }}" class="form-control @error('mobile') is-invalid @enderror">
                                @error('mobile')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                               </div>
                               <div class="form-group">
                                <label class="" >Address</label>   
                                <input type="text" name="address" value="{{ $address }}" class="form-control @error('address') is-invalid @enderror">
                                @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                               </div>
                               <button type="submit" name="name" value="contact_update" class="btn btn-success">Update</button>
                               <div class="form-group">
                               </div>
                           </form>
                       </div>
                   </div>
               </div>
            </div>
        </div>
        
        <div class="col-lg-6 col-md-6">
            <div class="card">
                <!-- Card header -->
                <div class="card-header border-0">
                    <h3 class="mb-0">Social Media Links</h3>
                </div>
                <!-- Light table -->
               <div class="card-body">
                   <div class="row">
                       <div class="col-12 col-md-12 col-sm-12">
                           <form method="POST" action="">
                               @csrf
                               <div class="form-group">
                                <label class="" >FaceBook Link</label>   
                                <input type="text" name="facebook_link" value="{{ $facebook_link }}" class="form-control @error('facebook_link') is-invalid @enderror">
                                @error('facebook_link')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                               </div>
                               <div class="form-group">
                                <label class="" >Twitter Link</label>   
                                <input type="text" name="twitter_link" value="{{ $twitter_link }}" class="form-control @error('twitter_link') is-invalid @enderror">
                                @error('twitter_link')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                               </div>
                               <div class="form-group">
                                <label class="" >Instagram Link</label>   
                                <input type="text" name="instagram_link" value="{{ $instagram_link }}" class="form-control @error('instagram_link') is-invalid @enderror">
                                @error('instagram_link')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                               </div>
                               <button type="submit" name="name" value="social_media_update" class="btn btn-success">Update</button>
                               <div class="form-group">
                               </div>
                           </form>
                       </div>
                   </div>
               </div>
            </div>
        </div>

        <div class="col-lg-6 col-md-6">
            <div class="card">
                <!-- Card header -->
                <div class="card-header border-0">
                    <h3 class="mb-0">Flutter Wave Credentials (Payment Gateway)</h3>
                </div>
                <!-- Light table -->
               <div class="card-body">
                   <div class="row">
                       <div class="col-12 col-md-12 col-sm-12">
                           <form method="POST" action="">
                               @csrf
                               <div class="form-group">
                                <label class="" >Public Key</label>   
                               <input type="text" name="public_key" value="{{ $public_key}}" class="form-control @error('puclic_key') is-invalid @enderror">
                               @error('public_key')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                               </div>
                               <div class="form-group">
                                <label class="" >TX REF</label>   
                                <input type="text" name="tx_ref" value="{{ $tx_ref }}" class="form-control @error('tx_ref') is-invalid @enderror">
                                @error('tx_ref')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                               </div>
                               <div class="form-group">
                                <label class="" >Amount to Paid</label>   
                                <input type="text" name="amount" value="{{ $amount }}" class="form-control @error('amount') is-invalid @enderror">
                                @error('amount')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                               </div>
                               <button type="submit" name="name" value="rave_update" class="btn btn-success">Update</button>
                               <div class="form-group">
                               </div>
                           </form>
                       </div>
                   </div>
               </div>
            </div>
        </div>

        <div class="col-lg-6 col-md-6">
            <div class="card">
                <!-- Card header -->
                <div class="card-header border-0">
                    <h3 class="mb-0">Vonage Credentials (Video & Audio)</h3>
                </div>
                <!-- Light table -->
               <div class="card-body">
                   <div class="row">
                       <div class="col-12 col-md-12 col-sm-12">
                           <form method="POST" action="">
                               @csrf
                               <div class="form-group">
                                <label class="">API_KEY</label>   
                                <input type="text" name="api_key" value="{{ $api_key }}" class="form-control @error('api_key') is-invalid @enderror">
                                @error('api_key')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                               </div>
                               <div class="form-group">
                                <label class="">SECRET</label>   
                                <input type="text" name="api_secret" value="{{ $api_secret }}" class="form-control @error('api_secret') is-invalid @enderror">
                                @error('api_secret')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                               </div>
                               <button type="submit" name="name" value="vonage_update" class="btn btn-success">Update</button>
                               <div class="form-group">
                               </div>
                           </form>
                       </div>
                   </div>
               </div>
            </div>
        </div>
        
        <div class="col-lg-6 col-md-6">
            <div class="card">
                <!-- Card header -->
                <div class="card-header border-0">
                    <h3 class="mb-0">FaceBook Credentials</h3>
                </div>
                <!-- Light table -->
               <div class="card-body">
                   <div class="row">
                       <div class="col-12 col-md-12 col-sm-12">
                           <form method="POST" action="">
                               @csrf
                               <div class="form-group">
                                <label class="">FACEBOOK_CLINET_ID</label>   
                                <input type="text" name="FACEBOOK_CLINET_ID" value="{{ $FACEBOOK_CLINET_ID }}" class="form-control @error('FACEBOOK_CLINET_ID') is-invalid @enderror">
                                @error('FACEBOOK_CLINET_ID')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                               </div>
                               <div class="form-group">
                                <label class="">FACEBOOK_CLINET_SECRET</label>   
                                <input type="text" name="FACEBOOK_CLINET_SECRET" value="{{  $FACEBOOK_CLINET_SECRET  }}" class="form-control @error('FACEBOOK_CLINET_SECRET') is-invalid @enderror">
                                @error('FACEBOOK_CLINET_SECRET')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                               </div>
                               <button type="submit" name="name" value="facebook_update" class="btn btn-success">Update</button>
                               <div class="form-group">
                               </div>
                           </form>
                       </div>
                   </div>
               </div>
            </div>
        </div>
        
        <div class="col-lg-6 col-md-6">
            <div class="card">
                <!-- Card header -->
                <div class="card-header border-0">
                    <h3 class="mb-0">Gmail Credentials</h3>
                </div>
                <!-- Light table -->
               <div class="card-body">
                   <div class="row">
                       <div class="col-12 col-md-12 col-sm-12">
                           <form method="POST" action="">
                               @csrf
                               <div class="form-group">
                                <label class="">GMAIL_CLINET_ID</label>   
                                <input type="text" name="GMAIL_CLINET_ID" value="{{ $GMAIL_CLINET_ID }}" class="form-control @error('GMAIL_CLINET_ID') is-invalid @enderror">
                                @error('GMAIL_CLINET_ID')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                               </div>
                               <div class="form-group">
                                <label class="">GMAIL_CLINET_SECRET</label>   
                                <input type="text" name="GMAIL_CLINET_SECRET" value="{{ $GMAIL_CLINET_SECRET }}" class="form-control @error('GMAIL_CLINET_SECRET') is-invalid @enderror">
                                @error('GMAIL_CLINET_SECRET')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                               </div>
                               <button type="submit" name="name" value="gmail_update" class="btn btn-success">Update</button>
                               <div class="form-group">
                               </div>
                           </form>
                       </div>
                   </div>
               </div>
            </div>
        </div>
        
        <div class="col-lg-6 col-md-6">
            <div class="card">
                <!-- Card header -->
                <div class="card-header border-0">
                    <h3 class="mb-0">Twitter Credentials</h3>
                </div>
                <!-- Light table -->
               <div class="card-body">
                   <div class="row">
                       <div class="col-12 col-md-12 col-sm-12">
                           <form method="POST" action="">
                               @csrf
                               <div class="form-group">
                                <label class="">TWITTER_CLINET_ID</label>   
                                <input type="text" name="TWITTER_CLINET_ID" value="{{ $TWITTER_CLINET_ID }}" class="form-control @error('TWITTER_CLINET_ID') is-invalid @enderror">
                                @error('TWITTER_CLINET_ID')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                               </div>
                               <div class="form-group">
                                <label class="">TWITTER_CLINET_SECRET</label>   
                                <input type="text" name="TWITTER_CLINET_SECRET" value="{{ $TWITTER_CLINET_SECRET }}" class="form-control @error('TWITTER_CLINET_SECRET') is-invalid @enderror">
                                @error('TWITTER_CLINET_SECRET')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                               </div>
                               <button type="submit" name="name" value="twitter_update" class="btn btn-success">Update</button>
                               <div class="form-group">
                               </div>
                           </form>
                       </div>
                   </div>
               </div>
            </div>
        </div>
    </div>
    <!-- Footer -->
    {{-- @include('admin.layouts.includes.footer') --}}
</div>
<script>

</script>
@endsection