<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use Illuminate\Support\Facades\Hash;
use App\Models\Country;
use App\Models\Patient;
use Session;
use Auth;
use App\SocialIdentity;
use Socialite;
use App\User;
use App\Settings;
use Exception;

class LoginController extends Controller
{
    var $data = array();

    public function __construct()
    {
        $logo = Settings::where('id', 1)->get();
        $this->data['logo'] = $logo[0]['website_logo'];
        $this->data['facebook_link'] = $logo[0]['facebook_link'];
        $this->data['twitter_link'] = $logo[0]['twitter_link'];
        $this->data['instagram_link'] = $logo[0]['instagram_link'];
        $this->data['email'] = $logo[0]['email'];
        $this->data['mobile'] = $logo[0]['mobile'];
        $this->data['address'] = $logo[0]['address'];
    }
    public function redirectBack()
    {
        return 'good boy';
    }
    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }
    public function handleProviderCallback($provider)
    {
        try {
            $user = Socialite::driver($provider)->user();
        } catch (Exception $e) {
            return redirect('/login');
        }
    }

    public function login(Request $request)
    {
        if ($_POST) {
            $rules = array(
                'email'     => 'required|email',
                'password'  => 'required',
            );

            $fieldNames = array(
                'email'     => 'Email',
                'password'  => 'Password',
            );
            //dd($request);
            $validator = Validator::make($request->all(), $rules);
            $validator->setAttributeNames($fieldNames);
            if ($validator->fails()) {
                return back()->withErrors($validator)->withInput();
            } else {
                if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
                    //dd(Auth::user()->role == 'Doctor');
                    if (Auth::user()->role == 'Doctor') {
                        return redirect('doctor/dashboard');
                    } elseif (Auth::user()->role == 'Patient') {
                        return redirect('patient/dashboard');
                    } elseif (Auth::user()->role == 'Admin') {
                        return redirect('admin/dashboard');
                    }
                } else {
                    Session::flash('error', 'Invalid Credentials');
                    return back()->withInput();
                }
            }
        } else {
            return view('frontend.auth.login2', $this->data);
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->flush();
        $request->session()->regenerate();
        return redirect()->route('login');
    }
}
