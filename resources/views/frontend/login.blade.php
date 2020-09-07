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
                                        <h2> Sign In Now</h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--End Section Tittle  -->
                        <form id="contact-form" action="#" method="POST">
                            <div class="row">
                                <div class="col-lg-12 col-md-12">
                                    <div class="form-box email-icon mb-30">
                                        <input type="text" name="email" placeholder="Email">
                                    </div>
                                </div>                                
                                <div class="col-lg-12 col-md-12">
                                    <div class="form-box email-icon mb-30">
                                        <input type="password" name="password" placeholder="Password">
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 mb-30">
                                    <div class="select-itms">
                                        <select name="gender" id="select2">
                                            <option value="">Select Role</option>
                                            <option value="Male">Doctor</option>
                                            <option value="Female">Patient</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="submit-info">
                                        <button class="btn" type="submit">Login Now <i class="ti-arrow-right"></i> </button>
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