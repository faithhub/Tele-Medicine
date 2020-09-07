<?php

namespace App\Http\Controllers;

use App\Appointments;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use Illuminate\Support\Facades\Hash;
use App\Models\Country;
use App\Models\Patient;
use App\Payment;
use App\Prescription;
use App\Settings;
use App\User;
use Session;

class AdminController extends Controller
{
    var $data = array();
    public function __construct()
    {
        $logo = Settings::where('id', 1)->get();
        $this->data['logo'] = $logo[0]['website_logo'];
        $this->data['logo2'] = $logo[0]['dashboard_logo'];
        $this->data['email'] = $logo[0]['email'];
        $this->data['mobile'] = $logo[0]['mobile'];
        $this->data['address'] = $logo[0]['address'];
        $this->data['public_key'] = $logo[0]['public_key'];
        $this->data['tx_ref'] = $logo[0]['tx_ref'];
        $this->data['amount'] = $logo[0]['amount'];
        $this->data['facebook_link'] = $logo[0]['facebook_link'];
        $this->data['twitter_link'] = $logo[0]['twitter_link'];
        $this->data['instagram_link'] = $logo[0]['instagram_link'];
        $this->data['FACEBOOK_CLINET_SECRET'] = $logo[0]['FACEBOOK_CLINET_SECRET'];
        $this->data['FACEBOOK_CLINET_ID'] = $logo[0]['FACEBOOK_CLINET_ID'];
        $this->data['GMAIL_CLINET_ID'] = $logo[0]['GMAIL_CLINET_ID'];
        $this->data['GMAIL_CLINET_SECRET'] = $logo[0]['GMAIL_CLINET_SECRET'];
        $this->data['TWITTER_CLINET_ID'] = $logo[0]['TWITTER_CLINET_ID'];
        $this->data['TWITTER_CLINET_SECRET'] = $logo[0]['TWITTER_CLINET_SECRET'];
        $this->data['api_key'] = $logo[0]['api_key'];
        $this->data['api_secret'] = $logo[0]['api_secret'];
    }
    public function index()
    {
        $data = [];
        $data['sn'] = 1;
        $data['logo2'] = $this->data['logo'];
        $doc = User::where('role', 'Doctor')->get();
        $data['doc'] = $doc->count();
        $pat = User::where('role', 'Patient')->get();
        $data['pat'] = $pat->count();

        $app = Appointments::get();
        $data['app'] = $app->count();

        $pres = Prescription::get();
        $data['pres'] = $pres->count();
        $data['users'] = User::orderBy('id', 'DESC')->limit(10)->get();

        return view('admin.index', $data);
    }
    public function doctor()
    {
        $data = [];
        $data['sn'] = 1;
        $data['logo2'] = $this->data['logo'];
        $data['doctors'] = User::where(['role' => 'Doctor'])->with('country:id,name', 'speciality:id,name')->get();
        return view('admin.doctor', $data);
    }
    public function patient()
    {
        $data = [];
        $data['sn'] = 1;
        $data['logo2'] = $this->data['logo'];
        $data['patients'] = User::where(['role' => 'Patient'])->with('country:id,name')->get();
        return view('admin.patient', $data);
    }
    public function changePassword()
    {
        $data['logo2'] = $this->data['logo'];
        return view('admin.password', $data);
    }

    public function web_settings(Request $request)
    {
        
        $data['logo2'] = $this->data['logo'];
        if ($_POST) {
            if ($request->name == 'website_logo_update') {
                $rules = array(
                    'website_logo'             => 'required',
                    'website_logo.*'       => 'image|mimes:jpeg,jpg,png|max:5000',
                );
                $fieldNames = array(
                    'website_logo'                => 'Website Logo'
                );
                $validator = Validator::make($request->all(), $rules);
                $validator->setAttributeNames($fieldNames);
                if ($validator->fails()) {
                    return back()->withErrors($validator)->withInput();
                } else {
                    $logo = $request->file('website_logo');
                    $website_logo = 'image' . date('dMY') . time() . '.' . $logo->getClientOriginalExtension();
                    $pictureDestination = 'images/logo';
                    $logo->move($pictureDestination, $website_logo);
                    $obj = Settings::find(1);
                    $obj->website_logo = $website_logo;
                    $obj->save();
                    Session::flash('success', 'Website Logo Updated Successfully');
                    return \back();
                }

                //dd($request->all());
            } elseif ($request->name == 'dashboard_logo_update') {
                $rules = array(
                    'dashboard_logo'             => 'required',
                    'dashboard_logo.*'       => 'image|mimes:jpeg,jpg,png|max:5000',
                );
                $fieldNames = array(
                    'dashboard_logo'                => 'Dashboard Logo'
                );
                $validator = Validator::make($request->all(), $rules);
                $validator->setAttributeNames($fieldNames);
                if ($validator->fails()) {
                    return back()->withErrors($validator)->withInput();
                } else {
                    $logo = $request->file('dashboard_logo');
                    $dashboard_logo = 'image' . date('dMY') . time() . '.' . $logo->getClientOriginalExtension();
                    $pictureDestination = 'images/logo';
                    $logo->move($pictureDestination, $dashboard_logo);
                    $obj = Settings::find(1);
                    $obj->dashboard_logo = $dashboard_logo;
                    $obj->save();
                    Session::flash('success', 'Dashboard Logo Updated Successfully');
                    return \back();
                }
            } elseif ($request->name == 'contact_update') {
                $rules = array(
                    'mail'                 => 'required|email',
                    'mobile'             => 'required',
                    'address'             => 'required',
                );
                $fieldNames = array(
                    'mail'                => 'Official Email Address',
                    'mobile'                => 'Mobile Number',
                    'address'             => 'Address'
                );
                $validator = Validator::make($request->all(), $rules);
                $validator->setAttributeNames($fieldNames);
                if ($validator->fails()) {
                    return back()->withErrors($validator);
                } else {
                    $obj = Settings::find(1);
                    $obj->email = $request->mail;
                    $obj->mobile = $request->mobile;
                    $obj->address = $request->address;
                    $obj->save();
                    Session::flash('success', 'Contact Us Details Updated Successfully');
                    return \back();
                }
            } elseif ($request->name == 'social_media_update') {
                $rules = array(
                    'facebook_link'                 => 'required',
                    'twitter_link'             => 'required',
                    'instagram_link'             => 'required',
                );
                $fieldNames = array(
                    'facebook_link'                => 'FaceBook Link',
                    'twitter_link'                => 'Twitter Link',
                    'instagram_link'             => 'Instagram Link'
                );
                $validator = Validator::make($request->all(), $rules);
                $validator->setAttributeNames($fieldNames);
                if ($validator->fails()) {
                    return back()->withErrors($validator);
                } else {
                    $obj = Settings::find(1);
                    $obj->facebook_link = $request->facebook_link;
                    $obj->twitter_link = $request->twitter_link;
                    $obj->instagram_link = $request->instagram_link;
                    $obj->save();
                    Session::flash('success', 'Social Media Links Updated Successfully');
                    return \back();
                }
            } elseif ($request->name == 'rave_update') {
                //dd($request->all());
                $rules = array(
                    'public_key'                 => 'required',
                    'tx_ref'             => 'required',
                    'amount'             => 'required',
                );
                $fieldNames = array(
                    'public_key'                => 'Public Key',
                    'tx_ref'                => 'TX REF',
                    'amount'             => 'Amount to Paid'
                );
                $validator = Validator::make($request->all(), $rules);
                $validator->setAttributeNames($fieldNames);
                if ($validator->fails()) {
                    return back()->withErrors($validator);
                } else {
                    $obj = Settings::find(1);
                    $obj->public_key = $request->public_key;
                    $obj->tx_ref = $request->tx_ref;
                    $obj->amount = $request->amount;
                    $obj->save();
                    Session::flash('success', 'Payment Details Updated Successfully');
                    return \back();
                }
            } elseif ($request->name == 'vonage_update') {
                //dd($request->all());
                $rules = array(
                    'api_key'                 => 'required',
                    'api_secret'             => 'required',
                );
                $fieldNames = array(
                    'api_key'                => 'API Key',
                    'api_secret'                => 'API SECRET',
                );
                $validator = Validator::make($request->all(), $rules);
                $validator->setAttributeNames($fieldNames);
                if ($validator->fails()) {
                    return back()->withErrors($validator);
                } else {
                    $obj = Settings::find(1);
                    $obj->api_key = $request->api_key;
                    $obj->api_secret = $request->api_secret;
                    $obj->save();
                    Session::flash('success', 'Vonage Details Updated Successfully');
                    return \back();
                }
            } elseif ($request->name == 'facebook_update') {
                //dd($request->all());
                $rules = array(
                    'FACEBOOK_CLINET_ID'                 => 'required',
                    'FACEBOOK_CLINET_SECRET'             => 'required',
                );
                $fieldNames = array(
                    'FACEBOOK_CLINET_ID'                => 'FACEBOOK_CLINET_ID',
                    'FACEBOOK_CLINET_SECRET'                => 'FACEBOOK_CLINET_SECRET',
                );
                $validator = Validator::make($request->all(), $rules);
                $validator->setAttributeNames($fieldNames);
                if ($validator->fails()) {
                    return back()->withErrors($validator);
                } else {
                    $obj = Settings::find(1);
                    $obj->FACEBOOK_CLINET_ID = $request->FACEBOOK_CLINET_ID;
                    $obj->FACEBOOK_CLINET_SECRET = $request->FACEBOOK_CLINET_SECRET;
                    $obj->save();
                    Session::flash('success', 'FaceBook Credentials Updated Successfully');
                    return \back();
                }
            } elseif ($request->name == 'twitter_update') {
                $rules = array(
                    'TWITTER_CLINET_ID'                 => 'required',
                    'TWITTER_CLINET_SECRET'             => 'required',
                );
                $fieldNames = array(
                    'TWITTER_CLINET_ID'                => 'TWITTER_CLINET_ID',
                    'TWITTER_CLINET_SECRET'                => 'TWITTER_CLINET_SECRET',
                );
                $validator = Validator::make($request->all(), $rules);
                $validator->setAttributeNames($fieldNames);
                if ($validator->fails()) {
                    return back()->withErrors($validator);
                } else {
                    $obj = Settings::find(1);
                    $obj->TWITTER_CLINET_ID = $request->TWITTER_CLINET_ID;
                    $obj->TWITTER_CLINET_SECRET = $request->TWITTER_CLINET_SECRET;
                    $obj->save();
                    Session::flash('success', 'Twitter Credentials Updated Successfully');
                    return \back();
                }
            } elseif ($request->name == 'gmail_update') {
                $rules = array(
                    'GMAIL_CLINET_ID'                 => 'required',
                    'GMAIL_CLINET_SECRET'             => 'required',
                );
                $fieldNames = array(
                    'GMAIL_CLINET_ID'                => 'GMAIL_CLINET_ID',
                    'GMAIL_CLINET_SECRET'                => 'GMAIL_CLINET_SECRET',
                );
                $validator = Validator::make($request->all(), $rules);
                $validator->setAttributeNames($fieldNames);
                if ($validator->fails()) {
                    return back()->withErrors($validator);
                } else {
                    $obj = Settings::find(1);
                    $obj->GMAIL_CLINET_ID = $request->GMAIL_CLINET_ID;
                    $obj->GMAIL_CLINET_SECRET = $request->GMAIL_CLINET_SECRET;
                    $obj->save();
                    Session::flash('success', 'Gmail Credentials Updated Successfully');
                    return \back();
                }
            } else {
                return \back();
            }
        } else {
            return view('admin.web_settings', $this->data);
        }
    }

    public function prescriptions()
    {
        $data = [];
        $data['sn'] = 1;
        $data['logo2'] = $this->data['logo'];
        $data['prescriptions'] = Prescription::orderBy('id', 'DESC')->with('user:id,name')->with('doctor:id,name')->get();
        return view('admin.prescriptions', $data);
    }
    public function appointments()
    {
        $data = [];
        $data['sn'] = 1;
        $data['logo2'] = $this->data['logo'];
        $data['appointments'] = Appointments::orderBy('id', 'DESC')->with('user:id,name,picture')->with('patient:id,name')->with('speciality:id,name')->get();
        return view('admin.appointments', $data);
    }

    public function payments()
    {
        $data = [];
        $data['sn'] = 1;
        $data['logo2'] = $this->data['logo'];
        $data['payments'] = Payment::orderBy('id', 'DESC')->with('user:id,name')->get();
        return view('admin.payments', $data);
    }

    public function delete_doctor(Request $request)
    {

        $data['logo2'] = $this->data['logo'];
        if ($_POST) {
            User::where('id', $request->id)->delete();
            Session::flash('success', 'Deleted Successfully');
            return back();
        } else {
            return back();
        }
    }

    public function status()
    {

        $data['logo2'] = $this->data['logo'];
        //dd($_GET);
        if ($_GET['id']) {
            $user = User::find($_GET['id']);
            $user->status = $_GET['status'];
            $user->save();
            Session::flash('success', 'Successfully ' . $_GET['status']);
            return back();
        } else {
            return back();
        }
    }
}
