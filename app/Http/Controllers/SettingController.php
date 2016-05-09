<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Setting;

class SettingController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }

    public function edit($id)
    {
        $setting = Setting::findOrFail($id);
        return view('setting.edit', compact('setting'));
    }

    public function update(Request $request, $id)
    {
        $setting = Setting::findOrFail($id);
        $setting->update($request->all());
        return redirect()->route('setting.index');

    }

    public function index() {
        $settings = Setting::all();
        return view('setting.index', compact('settings'));
    }

}
