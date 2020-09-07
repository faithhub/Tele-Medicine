<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use Illuminate\Support\Facades\Hash;
use App\Models\Country;
use App\Models\Speciality;
use App\User;
use App\Settings;
use Session;

class RegisterController extends Controller
{
    var $data = array();

    public function __construct()
    {
    }
    public function doctorRegister(Request $request)
    {
        $data = [];
        $logo = Settings::where('id', 1)->get();
        $data['logo'] = $logo[0]['website_logo'];
        $data['countries'] = Country::All();
        $data['specialities'] = Speciality::All();
        $data['facebook_link'] = $logo[0]['facebook_link'];
        $data['twitter_link'] = $logo[0]['twitter_link'];
        $data['instagram_link'] = $logo[0]['instagram_link'];
        $data['email'] = $logo[0]['email'];
        $data['mobile'] = $logo[0]['mobile'];
        $data['address'] = $logo[0]['address'];

        if ($_POST) {
            $rules = array(
                'name'            => 'required',
                'mobile'             => 'required|numeric',
                'email'                 => 'required|email|unique:users,email',
                'dob'             => 'required',
                'gender'             => 'required',
                'country_id'             => 'required',
                'speciality_id'             => 'required',
                'cv'             => 'required',
                'cv.*'       => 'mimetypes:application/pdf|max:10000',
                'about'             => 'required',
                'picture'             => 'required',
                'picture.*'       => 'image|mimes:jpeg,jpg,png|max:5000',
                'address'             => 'required',
                'password'              => ['required', 'confirmed', 'min:8', 'regex:/[a-z]/', 'regex:/[A-Z]/', 'regex:/[0-9]/', 'regex:/[@$!%*#?&+-]/'],
                'password_confirmation' => 'required',
                'terms'            => 'required'
            );

            $fieldNames = array(
                'name'            => 'Name',
                'mobile'             => 'Mobile Number',
                'email'                 => 'Email',
                'dob'                 => 'Date of Birth',
                'gender'             => 'Gender',
                'country_id'             => 'Country',
                'speciality_id'             => 'Speciality',
                'about'             => 'About Myself',
                'picture'             => 'Picture',
                'cv'             => 'CV',
                'address'             => 'Address',
                'password'              => 'Password',
                'password_confirmation' => 'Confirm Password',
                'terms'                => 'Terms'
            );
            //dd($request->all());
            $validator = Validator::make($request->all(), $rules);
            $validator->setAttributeNames($fieldNames);
            if ($validator->fails()) {
                return back()->withErrors($validator)->withInput();
            } else {
                $file1 = $request->file('picture');
                $file2 = $request->file('cv');
                $picture = 'image' . date('dMY') . time() . '.' . $file1->getClientOriginalExtension();
                $cv = 'cv' . date('dMY') . time() . '.' . $file2->getClientOriginalExtension();
                $pictureDestination = 'uploads/doctors_pictures';
                $cvDestination = 'uploads/doctors_cv';
                $file1->move($pictureDestination, $picture);
                $file2->move($cvDestination, $cv);
                User::create([
                    'name'            => $request->name,
                    'mobile'             => $request->mobile,
                    'email'                 => $request->email,
                    'dob'                 => $request->dob,
                    'speciality_id'                 => $request->speciality_id,
                    'picture'                 => $picture,
                    'about'                 => $request->about,
                    'cv'                 => $cv,
                    'gender'             => $request->gender,
                    'country_id'             => $request->country_id,
                    'address'             => $request->address,
                    'status'             => 'Pending',
                    'role'             => 'Doctor',
                    'password'              => Hash::make($request->password),
                ]);
                Session::flash('success', 'Registered Successfully');
                return redirect('login');
            }
        }
        return view('frontend.auth.doctor-signup', $data);
    }
    public function patientRegister(Request $request)
    {
        $data = [];
        $data['title'] = 'Registration';
        $data['countries'] = Country::All();
        $logo = Settings::where('id', 1)->get();
        $data['logo'] = $logo[0]['website_logo'];
        $data['facebook_link'] = $logo[0]['facebook_link'];
        $data['twitter_link'] = $logo[0]['twitter_link'];
        $data['instagram_link'] = $logo[0]['instagram_link'];
        $data['email'] = $logo[0]['email'];
        $data['mobile'] = $logo[0]['mobile'];
        $data['address'] = $logo[0]['address'];


        if ($_POST) {
            $rules = array(
                'name'            => 'required',
                'mobile'             => 'required|numeric',
                'email'                 => 'required|email|unique:users,email',
                'dob'             => 'required',
                'gender'             => 'required',
                'country_id'             => 'required',
                'address'             => 'required',
                'password'              => ['required', 'confirmed', 'min:8', 'regex:/[a-z]/', 'regex:/[A-Z]/', 'regex:/[0-9]/', 'regex:/[@$!%*#?&+-]/'],
                'password_confirmation' => 'required',
                'terms'            => 'required'
            );

            $fieldNames = array(
                'name'            => 'Name',
                'mobile'             => 'Mobile Number',
                'email'                 => 'Email',
                'dob'                 => 'Date of Birth',
                'gender'             => 'Gender',
                'country_id'             => 'Country',
                'address'             => 'Address',
                'password'              => 'Password',
                'password_confirmation' => 'Confirm Password',
                'terms'                => 'Terms'
            );
            //dd($request->all());
            $validator = Validator::make($request->all(), $rules);
            $validator->setAttributeNames($fieldNames);
            if ($validator->fails()) {
                return back()->withErrors($validator)->withInput();
            } else {
                $user =  User::create([
                    'name'            => $request->name,
                    'mobile'             => $request->mobile,
                    'email'                 => $request->email,
                    'dob'                 => $request->dob,
                    'gender'             => $request->gender,
                    'speciality_id'     => 0,
                    'picture'           => 0,
                    'about'             => 0,
                    'cv'                => 0,
                    'country_id'             => $request->country_id,
                    'address'             => $request->address,
                    'status'             => 'Active',
                    'role'             => 'Patient',
                    'password'              => Hash::make($request->password),
                ]);
                Session::flash('success', 'Registered Successfully');
                Auth::login($user);
                return redirect('payment');
            }
        }

        return view('frontend.auth.patient-signup', $data);
    }
}
