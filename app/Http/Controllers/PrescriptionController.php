<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Appointments;
use App\Models\Speciality;
use App\Models\Country;
use App\Prescription;
use Illuminate\Support\Facades\Auth;
use Validator;
use App\User;
use App\Settings;
use Session;

class PrescriptionController extends Controller
{
    var $data = array();
    public function __construct()
    {
        $logo = Settings::where('id', 1)->get();
        $this->data['logo'] = $logo[0]['dashboard_logo'];
    }
    public function index(){
        $data = [];
        $data['logo2'] = $this->data['logo'];
        $data['serial'] = 1;
        $data['prescribtions'] = Prescription::where('doctor_id', Auth::user()->id)->with('user:id,name')->get();
        // dd($fo);
        return view('doctor.prescriptions', $data);
    }
    public function create(Request $request){
        
            $rules = array(
                'user_id'              => 'required',
                'medicine_type'        => 'required',
                'medicine_name'        => 'required',
                'mg_ml'                => 'required',
                'dose'                 => 'required',
                'day'                  => 'required',
                'medicine_comment'     => 'required',
                'overall_comment'      => 'required',
            );

            $fieldNames = array(
                'medicine_type'        => 'Medicine Type',
                'medicine_name'        => 'Medicine Name',
                'mg_ml'                => 'MG ML',
                'dose'                 => 'Dose',
                'day'                  => 'Day',
                'medicine_comment'     => 'Medicine Comment',
                'overall_comment'      => 'Overall Comment',
            );
            //dd($request->all());
            $validator = Validator::make($request->all(), $rules);
            $validator->setAttributeNames($fieldNames);
            if ($validator->fails()) {
                return back()->withErrors($validator)->withInput();
            } else {
                Prescription::create([
                    'doctor_id'              => Auth::user()->id,
                    'user_id'              => $request->user_id,
                    'medicine_type'        => $request->medicine_type,
                    'medicine_name'        => $request->medicine_name,
                    'mg_ml'                => $request->mg_ml,
                    'dose'                 => $request->dose,
                    'day'                  => $request->day,
                    'medicine_comment'     => $request->medicine_comment,
                    'overall_comment'      => $request->overall_comment,
                ]);
                Session::flash('success', 'Prescription Sent Successfully');
                return redirect('doctor/prescriptions');
            }
    }

    public function delete(Request $request)
    {
        $data['logo2'] = $this->data['logo'];
        if($_POST){
            Prescription::where('id', $request->id)->delete();
            Session::flash('success', 'Deleted Successfully');
            return back();
        }
        return back();
    }
    
    public function view(){
        
        $data['logo2'] = $this->data['logo'];
        if($_GET['id']){
            $data = [];
            $data['prescriptions'] = Prescription::where('id', $_GET['id'])->with('doctor:id,name,picture')->get();
            return view('patient.view_prescription', $data);
        }
        return \back();
    }

    public function all(Request $request)
    {
        $data = [];        
        $data['logo2'] = $this->data['logo'];

        if($_POST){
            Prescription::where('id', $request->id)->delete();
            return \back();
        }else{
            $data['serial'] = 1;
            $data['page_title'] = 'prescriptions';
            $data['prescriptions'] = Prescription::where('user_id', Auth::user()->id)->with('doctor:id,name,picture')->get();
            return view('patient.prescriptions', $data);
        }
    }
}
