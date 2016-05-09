<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\AppSettings\AppSetting;
use Auth;
use App\user;


class WelcomeController extends Controller
{
    public function welcome()
    {
        $user = Auth::user();
        $welcomeText = AppSetting::welcomeText();

        if ($user == null) {
            return view('welcome', compact('welcomeText'));
        } else {
            return redirect()->route('home');
        }
    }
}
