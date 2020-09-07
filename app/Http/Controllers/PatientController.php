<?php

namespace App\Http\Controllers;

use App\Appointments;
use App\Call;
use Illuminate\Support\Facades\Auth;
use App\Models\Country;
use App\Prescription;
use App\Settings;
use App\User;
use Illuminate\Http\Request;
use Validator;
use Session;
use OpenTok\OpenTok;
use OpenTok\MediaMode;
//use OpenTok\Session;
use OpenTok\Role;
use OpenTok\Layout;

class PatientController extends Controller
{
    var $data = array();
    public function __construct()
    {
        $this->middleware(['auth', 'paid']);
        $logo = Settings::where('id', 1)->get();
        $this->data['logo'] = $logo[0]['dashboard_logo'];
    }

    public function index()
    {
        $data = [];
        // $data['open_tok'] = $session;
        $data['serial'] = 1;
        $data['logo2'] = $this->data['logo'];
        $apps = Appointments::where('patient_id', Auth::user()->id)->get();
        $pres = Prescription::where('user_id', Auth::user()->id)->get();
        $data['apps'] = $apps->count();
        $data['pres'] = $pres->count();
        $data['latest_apps'] = Appointments::where('patient_id', Auth::user()->id)->with('user:id,name,picture')->with('speciality:id,name')->orderBy('created_at', 'desc')->limit(5)->get();
        return view('patient.index', $data);
    }
    public function changePassword()
    {
        $data['logo2'] = $this->data['logo'];
        return view('patient.password', $data);
    }
    public function appointment(Request $request)
    {
        if ($_POST) {
            Appointments::where('id', $request->id)->delete();
            $data['logo2'] = $this->data['logo'];
            Session::flash('success', 'Appointment Deleted');
            return back();
        } else {
            $data = [];
            $data['serial'] = 1;
            $data['logo2'] = $this->data['logo'];
            $data['url'] = 'https://tokbox.com/embed/embed/ot-embed.js?embedId=f00a2a5c-0600-4437-90a3-fdf51b8ac8d0&room=adebayo&iframe=true';
            $data['page_title'] = 'appointments';
            $data['appointments'] = Appointments::where('patient_id', Auth::user()->id)->with('user:id,name,picture')->with('speciality:id,name')->orderBy('created_at', 'desc')->get();
            return view('patient.appointment', $data);
        }
    }

    public function book_appointment(Request $request)
    {
        if ($_POST) {
            $data['logo2'] = $this->data['logo'];
            //dd($request->all());
            $get = Appointments::where('doctor_id', $request->doctor_id)->where('book_day', $request->day)->where('book_time', $request->time);
            $count = $get->count();
            //dd($count);
            if ($count == 0) {
                $save = Appointments::create([
                    'doctor_id' => $request->doctor_id,
                    'patient_id' => Auth::user()->id,
                    'speciality_id' => $request->speciality_id,
                    'book_day' => $request->day,
                    'book_time' => $request->time
                ]);
                //dd($save);
                $data['page_title'] = 'book_appointment';
                $data['logo2'] = $this->data['logo'];
                $data['doctors'] = User::where('role', 'doctor')->where('status', 'Active')->with('speciality:id,name')->with('country:id,name')->get();
                Session::flash('success', 'Appointment Booked successfully');
                return view('patient.appointment', $data);
            } else {
                $data['page_title'] = 'book_appointment';
                $data['logo2'] = $this->data['logo'];
                $data['doctors'] = User::where('role', 'doctor')->where('status', 'Active')->with('speciality:id,name')->with('country:id,name')->get();
                Session::flash('error', 'Date and Time has been booked');
                return view('patient.appointment', $data);
            }
        } else {
            $data = [];
            $data['page_title'] = 'book_appointment';
            $data['logo2'] = $this->data['logo'];
            $data['doctors'] = User::where('role', 'doctor')->where('status', 'Active')->with('speciality:id,name')->with('country:id,name')->get();
            return view('patient.appointment', $data);
        }
    }

    public function search_doctor(Request $request)
    {
        if ($_POST) {
            //dd($request->all());
            $data = [];
            $data['serial'] = 1;
            $data['gender'] = $request->doc_gender;
            $data['specs'] = $request->specs;
            $data['logo2'] = $this->data['logo'];
            $data['doctors'] = $gu = User::where('status', 'Active')->where('role', 'Doctor')->where('gender', 'LIKE', '%' . $request->doc_gender . '%')->orWhere('speciality_id', 'LIKE', '%' . $request->specs . '%')->with('speciality:id,name')->with('country:id,name')->get();
            //dd($gu);
            return view('patient.search', $data);
        } else {
            $data = [];
            $data['page_title'] = 'book_appointment';
            $data['logo2'] = $this->data['logo'];
            $data['doctors'] = User::where('role', 'doctor')->where('status', 'Active')->with('speciality:id,name')->with('country:id,name')->get();
            return view('patient.appointment', $data);
        }
    }
    public function profile(Request $request)
    {
        $data = [];
        $data['logo2'] = $this->data['logo'];
        $data['mycountry'] = Country::where('id', Auth::user()->country_id)->get();
        $data['countries'] = Country::all();

        if ($_POST) {

            $rules = array(
                'name'            => 'required',
                'mobile'             => 'required|numeric',
                'dob'             => 'required',
                'country_id'             => 'required',
                'address'             => 'required',
            );

            $fieldNames = array(
                'name'            => 'Name',
                'mobile'             => 'Mobile Number',
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
                $obj_user->dob = $request->dob;
                $obj_user->country_id = $request->country_id;
                $obj_user->address = $request->address;
                $obj_user->save();

                Session::flash('success', 'Profile Updated Successfully');
                return back();
            }
        } else {
            $data['logo2'] = $this->data['logo'];
            return view('patient.profile', $data);
        }
    }

    public function call()
    {
        $data['logo2'] = $this->data['logo'];
        return view('patient.call', $data);
    }
    // require "./vendor/autoload.php";
  
}
