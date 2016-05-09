<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Auth;
use App\User;
use App\AppSettings\AppSetting;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $sessions = $user->sessions()->get();
        $openDate = AppSetting::getByKey('close_date');
        $closeDate = AppSetting::getByKey('close_date');
        $regOpen = AppSetting::regOpen();
        return view('home',compact('user','sessions','openDate','closeDate','regOpen'));
    }
}
