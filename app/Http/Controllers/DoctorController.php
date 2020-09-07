<?php

namespace App\Http\Controllers;

use App\Appointments;
use App\Call;
use App\Prescription;
use App\Models\Speciality;
use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;
use App\User;
use App\Settings;
use Session;

class DoctorController extends Controller
{
    var $data = array();
    public function __construct()
    {
        $logo = Settings::where('id', 1)->get();
        $this->data['logo'] = $logo[0]['dashboard_logo'];
    }
    public function index()
    {
        $data = [];
        $data['serial'] = 1;
        $data['logo2'] = $this->data['logo'];
        $apps = Appointments::where('doctor_id', Auth::user()->id)->get();
        $pres = Prescription::where('doctor_id', Auth::user()->id)->get();
        $data['apps'] = $apps->count();
        $data['pres'] = $pres->count();
        $data['latest_apps'] = Appointments::where('doctor_id', Auth::user()->id)->with('patient:id,name,picture')->with('speciality:id,name')->orderBy('created_at', 'desc')->limit(5)->get();
        return view('doctor.index', $data);
    }

    public function changePassword()
    {
        $data['logo2'] = $this->data['logo'];
        return view('doctor.password', $data);
    }


    public function updatePicture(Request $request)
    {
        $data['logo2'] = $this->data['logo'];
        if ($_POST) {
            $rules = array(
                'picture'             => 'required',
                'picture.*'       => 'image|mimes:jpeg,jpg,png|max:5000',
            );
            $fieldNames = array(
                'picture'            => 'Profile Picture',
            );
            //dd($request->all());
            $validator = Validator::make($request->all(), $rules);
            $validator->setAttributeNames($fieldNames);
            if ($validator->fails()) {
                Session::flash('error', 'Picture is required, and format supported are JPEG,JPG and PNG');
                return back()->withErrors($validator);
            } else {
                $file1 = $request->file('picture');
                $picture = 'image' . date('dMY') . time() . '.' . $file1->getClientOriginalExtension();
                $pictureDestination = 'uploads/doctors_pictures';
                $file1->move($pictureDestination, $picture);
                $user_id = Auth::user()->id;
                $obj_user = User::find($user_id);
                $obj_user->picture = $picture;
                $obj_user->save();
                Session::flash('success', 'Profile Picture Updated Successfully');
                return back();
            }
        } else {
            return back();
        }
    }

    public function updateCV(Request $request)
    {
        $data['logo2'] = $this->data['logo'];
        if ($_POST) {
            $rules = array(
                'cv'             => 'required',
                'cv.*'       => 'mimetypes:application/pdf|max:10000',
            );

            $fieldNames = array(
                'cv'            => 'CV',
            );
            //dd($request->all());
            $validator = Validator::make($request->all(), $rules);
            $validator->setAttributeNames($fieldNames);
            if ($validator->fails()) {
                Session::flash('error', 'CV is required, and PDF only is supported');
                return back();
            } else {
                $file2 = $request->file('cv');
                $cv = 'cv' . date('dMY') . time() . '.' . $file2->getClientOriginalExtension();
                $cvDestination = 'uploads/doctors_cv';
                $file2->move($cvDestination, $cv);
                $user_id = Auth::user()->id;
                $obj_user = User::find($user_id);
                $obj_user->cv = $cv;
                $obj_user->save();
                Session::flash('success', 'CV Updated Successfully');
                return back();
            }
        } else {
            return back();
        }
    }
    public function call()
    {
        return view('doctor.call');
    }

    public function profile(Request $request)
    {

        $data = [];
        $data['logo2'] = $this->data['logo'];
        $data['specialities'] = Speciality::all();
        $data['myspeciality'] = Speciality::where('id', Auth::user()->speciality_id)->get();
        $data['mycountry'] = Country::where('id', Auth::user()->country_id)->get();
        $data['countries'] = Country::all();

        if ($_POST) {

            $rules = array(
                'name'            => 'required',
                'mobile'             => 'required|numeric',
                'about'             => 'required',
                'dob'             => 'required',
                'country_id'             => 'required',
                'address'             => 'required',
            );

            $fieldNames = array(
                'name'            => 'Name',
                'mobile'             => 'Mobile Number',
                'about'             => 'About Me',
                'dob'                 => 'Date of Birth',
                'country_id'             => 'Country',
                'address'             => 'Address',
            );
            //dd($request->all());
            $validator = Validator::make($request->all(), $rules);
            $validator->setAttributeNames($fieldNames);
            if ($validator->fails()) {
                return back()->withErrors($validator);
            } else {
                $user_id = Auth::user()->id;
                $obj_user = User::find($user_id);
                $obj_user->name = $request->name;
                $obj_user->mobile = $request->mobile;
                $obj_user->about = $request->about;
                $obj_user->dob = $request->dob;
                $obj_user->country_id = $request->country_id;
                $obj_user->address = $request->address;
                $obj_user->save();

                Session::flash('success', 'Profile Updated Successfully');
                return back();
            }
        } else {
            return view('doctor.profile', $data);
        }
    }

    public function appointment(Request $request)
    {
        if ($_GET) {
            $data['logo2'] = $this->data['logo'];
            if (isset($_GET['action']) && isset($_GET['id'])) {
                //dd($_GET);
                $data = Appointments::find($_GET['id']);
                $data->status = $_GET['action'];
                $data->save();
                Session::flash('success', 'Appointment ' . $_GET['action']);
                return back();
            }
            return back();
        } else {
            $data = [];
            $data['serial'] = 1;
            $data['logo2'] = $this->data['logo'];
            $data['page_title'] = 'appointments';
            $data['appointments'] = $go = Appointments::where('doctor_id', Auth::user()->id)->with('patient:id,name,dob')->with('speciality:id,name')->orderBy('created_at', 'desc')->get();
            //dd($go);
            return view('doctor.appointments', $data);
        }
    }
    public function create_prescribtion(Request $request)
    {
        $data['logo2'] = $this->data['logo'];
        if ($_POST) {
            if (isset($_GET['action']) && isset($_GET['id'])) {
                //dd($_GET);
                $data = Appointments::find($_GET['id']);
                $data->status = $_GET['action'];
                $data->save();
                Session::flash('success', 'Appointment ' . $_GET['action']);
                return back();
            }
            return back();
        } elseif ($_GET['id']) {
            //dd($_GET);
            $data = [];
            $data['patient'] = $fo = user::where('id', $_GET['id'])->get();
            //dd($fo);
            return view('doctor.create_prescription', $data);
        } else {
            $data = [];
            // $data['page_title'] = 'appointments';
            // $data['appointments'] = Appointments::where('doctor_id', Auth::user()->id)->with('user:id,name,dob')->with('speciality:id,name')->orderBy('created_at', 'desc')->get();
            return view('doctor.create_prescription', $data);
        }
    }
}
