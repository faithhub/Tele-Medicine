<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Twilio\Exceptions\RestException;
use Twilio\Rest\Client;

class VoiceController extends Controller
{
    public function call()
    {
        
        return view('frontend.call');
    }

}
