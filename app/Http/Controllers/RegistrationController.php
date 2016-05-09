<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use App\Session;
use DB;

class RegistrationController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }

    /**
     * Show form for registration for user.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $sessions = Session::all();
        $registrations = $user->sessions()->get();
        $sessionSelect = $this->sessionSelect($user);
        return view('registration.edit', compact('user', 'sessions', 'registrations', 'sessionSelect'));
    }
/**
 * Update user registration
 */
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
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
        return redirect()->route('user.show',['id' => $id]);
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
}
