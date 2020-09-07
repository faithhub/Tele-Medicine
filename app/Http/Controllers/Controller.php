<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Settings;
use App\User;

class Controller extends BaseController
{
    var $data = array();
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct()
    {
        $logo = Settings::where('id', 1)->get();
        $this->data['logo'] = $logo[0]['website_logo'];
        $this->data['email'] = $logo[0]['email'];
        $this->data['mobile'] = $logo[0]['mobile'];
        $this->data['address'] = $logo[0]['address'];
        $this->data['facebook_link'] = $logo[0]['facebook_link'];
        $this->data['twitter_link'] = $logo[0]['twitter_link'];
        $this->data['instagram_link'] = $logo[0]['instagram_link'];
    }

    public function index()
    {
        return view('frontend.index', $this->data);
    }
    public function about()
    {
        return view('frontend.about', $this->data);
    }
    public function contact()
    {
        return view('frontend.contact', $this->data);
    }
}
