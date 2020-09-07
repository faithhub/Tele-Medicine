<?php

namespace App\Http\Controllers;

use App\Payment;
use App\User;
use App\Settings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    var $data = array();
    public function __construct()
    {
        $logo = Settings::where('id', 1)->get();
        $this->data['public_key'] = $logo[0]['public_key'];
        $this->data['tx_ref'] = $logo[0]['tx_ref'];
        $this->data['amount'] = $logo[0]['amount'];
        $this->data['logo'] = $logo[0]['dashboard_logo'];
    }
    public function index()
    {
        //dd(Auth::user());
        $data = [];
        $data['logo'] = $this->data['logo'];
        $data['public_key'] = $this->data['public_key'];
        $data['tx_ref'] = $this->data['tx_ref'];
        $data['currency'] = 'NGN';
        $data['redirect_url'] = url('/verify');
        $data['amount'] = $this->data['amount'];
        return view('frontend.auth.payment', $data);
    }

    public function verify()
    {
        $data = [];
        $data['logo'] = $this->data['logo'];
        $data['public_key'] = $this->data['public_key'];
        $data['tx_ref'] = $this->data['tx_ref'];
        $data['currency'] = 'NGN';
        $data['redirect_url'] = url('/verify');
        $data['amount'] = $this->data['amount'];
        # code...
        if (isset($_GET['status']) && isset($_GET['transaction_id']) && isset($_GET['tx_ref'])) {
            $status = $_GET['status'];
            $data['logo'] = $this->data['logo'];
            $transaction_id = $_GET['transaction_id'];
            $tx_ref = $_GET['tx_ref'];

            Payment::create([
                'user_id' => Auth::user()->id,
                'status' => $status,
                'transaction_id' => $transaction_id,
                'tx_ref' => $tx_ref
            ]);

            User::where('id', Auth::user()->id)->update(['paid' => 1]);
            return redirect('patient/dashboard');
        } else {
            $data['logo'] = $this->data['logo'];
            return view('frontend.auth.payment', $data);
        }
    }
}
