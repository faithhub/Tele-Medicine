@extends('frontend.layouts.app')
@section('content')


<main>
     <!--? Team Start -->
     
     <!--? Contact form Start -->
     <div class="contact-form-main">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-7 col-lg-7">
                    <div class="form-wrapper">
                        <!--Section Tittle  -->
                        <div class="form-tittle">
                            <div class="row ">
                                <div class="col-xl-12">
                                    <div class="section-tittle section-tittle2">
                                        <span>Sign Up</span>
                                        <h2>Doctor's Sign up</h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--End Section Tittle  -->
                        <form id="contact-form" action="#" method="POST">
                            <div class="row">
                                <div class="col-lg-12 col-md-12">
                                    <div class="form-box user-icon mb-30">
                                        <input type="text" name="name" placeholder="Name">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="form-box email-icon mb-30">
                                        <input type="text" name="email" placeholder="Email">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="form-box subject-icon mb-30">
                                        <input type="number" name="mobile" placeholder="Mobile">
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12">
                                    <div class="form-box subject-icon mb-30">
                                        <label class="label">Date Of Birth</label>
                                        <input type="date" name="dob" placeholder="Date Of Birth">
                                    </div>
                                </div>                               
                                <div class="col-lg-6 col-md-6">
                                    <div class="form-box email-icon mb-30">
                                        <input type="password" name="password" placeholder="Password">
                                    </div>
                                </div>                                
                                <div class="col-lg-6 col-md-6">
                                    <div class="form-box email-icon mb-30">
                                        <input type="password" name="password_confirmation" placeholder="Confirm Password">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="form-box subject-icon mb-30">
                                        <input type="file" name="dob" class="custom-file-input" style="height:40px">
                                            <label class="custom-file-label label" for="validatedCustomFile" style="max-width: 90%; margin-left:15px; height:40px; background:none; border:0;border-bottom: 2px solid #e9f0f4;
                                            border-bottom-width: 2px;
                                            border-bottom-style: solid;
                                            border-bottom-color: rgb(233, 240, 244);">Upload Picture</label>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="form-box subject-icon mb-30">
                                        <input type="file" name="dob" class="custom-file-input" style="height:40px">
                                            <label class="custom-file-label label" for="validatedCustomFile" style="max-width: 90%; margin-left:15px; height:40px; background:none; border:0; border-bottom: 2px solid #e9f0f4;
                                            border-bottom-width: 2px;
                                            border-bottom-style: solid;
                                            border-bottom-color: rgb(233, 240, 244);">Upload CV</label>
                                    </div>
                                </div>
                                
                                <div class="col-lg-6 col-md-6 mb-30">
                                    <div class="select-itms">
                                        <select name="gender" id="select2">
                                            <option value="">Specialized Area</option>
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 mb-30">
                                    <div class="select-itms">
                                        <select name="gender" id="select2">
                                            <option value="">Gender</option>
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 mb-30">
                                    <div class="select-itms">
                                        <select name="country" id="select2">
                                            <option value="">Country</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-box message-icon mb-65">
                                        <textarea name="message" id="message" placeholder="Address"></textarea>
                                    </div>
                                    <div class="submit-info">
                                        <button class="btn" type="submit">Submit Now <i class="ti-arrow-right"></i> </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- contact left Img-->
        <div class="from-left d-none d-lg-block">
            <img src="assets/img/gallery/contact_form.png" alt="">
        </div>
    </div>
</main>

@endsection