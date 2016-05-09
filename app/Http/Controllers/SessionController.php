<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Session;

class SessionController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = $request->q;
        if ($query) {
            $sessions = Session::where('title', 'LIKE', "%$query%")
                ->orWhere('location', 'LIKE', "%$query%")
                ->orWhere('description', 'LIKE', "%$query%")
                ->orWhere('startTime', 'LIKE', "%$query%")
                ->paginate(7);
        } else {
            $sessions = Session::orderBy('startTime', 'asc')->paginate(7);
        }
        foreach ($sessions as $session) {
            $session->enrollment = $session->users->count();
        }
        return view('session.index', compact('sessions', 'query'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('session.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Session::create($request->all());
        return redirect()->action('SessionController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $session = Session::findOrFail($id);
        $users = $session->users()->get();
        return view('session.show', compact('session','users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $session = Session::findOrFail($id);
        $session->update($request->all());
        return redirect()->route('session.show',['id' => $id]);
    }

    public function edit($id)
    {
        $session = Session::findOrFail($id);
        return view('session.edit', compact('session'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $session = Session::findOrFail($id);
        $session->delete();
        return back();
    }
}
