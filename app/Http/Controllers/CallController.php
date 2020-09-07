<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Call;
use Illuminate\Support\Facades\Auth;
use Session;
use OpenTok\OpenTok;
use OpenTok\MediaMode;
use OpenTok\Role;
use OpenTok\Layout;
use App\Settings;

class CallController extends Controller
{
    
    public function receive_call()
    {
        $check = Call::where('receiver_id', Auth::user()->id)->with('caller:id,name')->get();
        //echo $check[0]['caller']['name'];
        if($check->count() == 1){
            $ade = array('session_id' => $check[0]['session_id'],
            'token' => $check[0]['token'], 'caller' =>  $check[0]['caller']['name']);
            // $data = [];
            // $data->session_id = $check[0]['session_id'];
            // $data->token = $check[0]['token'];
            // $data->caller = $check[0]['caller']['name'];
            echo $check[0]['caller']['name'];
        }else{
            echo 0;
        }
    }
    public function cancel_call()
    {
        Call::where('receiver_id', Auth::user()->id)->delete();
    }

    public function end_call()
    {
        Call::where('caller_id', Auth::user()->id)->delete();
    }

    public function make_call()
    {
        if ($_GET['receiver_id']) {
            $apiKey = Settings::where('id', 1)->get();
            $apiSecret = Settings::where('id', 1)->get();

            $opentok = new OpenTok($apiKey[0]['api_key'], $apiSecret[0]['api_secret']);

            $session = $opentok->createSession(array('mediaMode' => MediaMode::ROUTED));

            $sessionId = $session->getSessionId();


            // Generate a Token from just a sessionId (fetched from a database)
            $token = $opentok->generateToken($sessionId);

            Call::create([
                'caller_id' => Auth::user()->id,
                'receiver_id' => $_GET['receiver_id'],
                'session_id' => $sessionId,
                'token' => $token
            ]);

            $data = [];

            // echo json_encode(array('session_id' => $session_id, 'token' => $token, 'api_key' => $apiKey));
            if($_GET['mode'] == 'video'){
                $data['publishVideo'] = true;
            }else{
                $data['publishVideo'] = 0;
            }

            $data['session_id'] = $sessionId;
            $data['token'] = $token;
            $data['api_key'] = $apiKey[0]['api_key'];
            return view('patient.call', $data);
        } else {
            return \back();
        }
    }
}
