<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Validator;
class ChangePasswordController extends Controller
{
    public function change(Request $request){
        $rules = array(
            'old_password'     => 'required',
            'new_password'  => ['required', 'min:8', 'regex:/[a-z]/', 'regex:/[A-Z]/', 'regex:/[0-9]/', 'regex:/[@$!%*#?&+-]/'],
            'confirm_new_password' => 'required'
        );

        $fieldNames = array(
            'old_password'     => 'Current Password',
            'new_password'  => 'New Password',
            'confirm_new_password' => 'Confirm New Password'
        );
        //dd($request);
        $validator = Validator::make($request->all(), $rules);
        $validator->setAttributeNames($fieldNames);
        if ($validator->fails()) {
            return back()->withErrors($validator);
        } else {
            $current_password = Auth::user()->password;
            if(Hash::check($request->old_password, $current_password)){
                $user_id = Auth::user()->id;
                $obj_user = User::find($user_id);
                $obj_user->password = Hash::make($request->new_password);
                $obj_user->save();
                $request->session()->flash('success', 'Password chaged successfully');
                return \back();
            }else{
                return back()->withErrors(['old_password' => 'Please enter correct current password']);
            }
        }

    }
}
