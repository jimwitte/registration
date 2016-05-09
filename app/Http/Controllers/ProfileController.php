<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Auth;
use App\User;
use DB;
use App\Session;
use Mail;
use App\AppSettings\AppSetting;


class ProfileController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth'); //must be authenticated
        $this->middleware('regopen'); // registration must be open, or must be admin
    }

    public function edit()
    {
        $user = User::findOrFail(Auth::user()->id);
        return view('profile.edit', compact('user'));
    }

    public function update(Request $request)
    {
        $user = User::findOrFail(Auth::user()->id);
        $user->update($request->all());
        return redirect()->route('home');
    }

    public function delete()
    {
        //
    }

    public function register(Request $request)
    {
        $user = Auth::user();
        $sessions = Session::all();
        $registrations = $user->sessions()->get();
        $sessionSelect = $this->sessionSelect($user);
        return view('profile.register', compact('user', 'sessions', 'registrations', 'sessionSelect'));
    }

    /**
     * Update user registration
     */
    public function registerUpdate(Request $request)
    {
        $user = Auth::user();
        $syncValues = array();

        /** get time slots, use as keys to collect values from form */
        $sessionTimeSlots = DB::select('select DISTINCT startTime from sessions');
        foreach ($sessionTimeSlots as $timeSlot) {
            $timeSlot->startTime = preg_replace('/\s+/', '_', $timeSlot->startTime);
            if (isset($timeSlot->startTime)) {
                $syncValues[] = $request->{$timeSlot->startTime};
            }
        }

        /** create registrations in database */
        $user->sessions()->sync($syncValues);
        return redirect()->route('home');
    }

    /** delete user's session registrations */
    public function registerDestroy()
    {
        $user = Auth::user();
        $user->sessions()->detach();
        //$user->save();
        return redirect()->route('home');
    }


    /** generate array for selecting sessions by time slot */
    private function sessionSelect($user)
    {
        $sessionSelectList = array();
        $userSessions = $user->sessions()->get();

        /**
         * get a list of all the time slots
         * @var  $sessionTimes
         */
        $sessionTimeSlots = DB::select('select DISTINCT startTime from sessions ORDER BY startTime');

        /** get a list of sessions for each time slot */
        foreach ($sessionTimeSlots as $sessionTimeSlot) {
            $sessionsAtTimeSlot = DB::select('select * FROM sessions WHERE startTime = ?', [$sessionTimeSlot->startTime]);
            //xdebug_var_dump($sessionsAtTimeSlot);

            /** collect sessions by time slot */
            $sessionSelectList[$sessionTimeSlot->startTime] = $sessionsAtTimeSlot;

            /** add sessions that user is enrolled in to list of sessions to be selected in form */
            foreach ($sessionsAtTimeSlot as $session) {
                $session->selected = $userSessions->contains('id', $session->id);
            }
        }
        return $sessionSelectList;
    }

    public function sendEmailProfile(Request $request)
    {
        $user = Auth::user();
        $sessions = $user->sessions()->get();
        $openDate = AppSetting::getByKey('close_date');
        $closeDate = AppSetting::getByKey('close_date');
        $regOpen = AppSetting::regOpen();

        Mail::send('profile.emails.send', compact('user', 'sessions', 'openDate', 'closeDate', 'regOpen'), function ($m) use ($user) {
            $m->from('jim@thunderingbison.com', 'Jim\'s RegApp');
            $m->to($user->email, $user->fullName())->subject('Your Profile!');
        });

        return "Email sent.";
    }
}
