<?php

namespace App\Http\Controllers;

use App\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SettingsController extends Controller
{
	public function __construct()
	{
		$this->middleware('admin');
	}

	public function index()
	{
		return view('admin.settings.setting')->with('setting', Setting::first());
	}

    public function update(Request $request)
    {
    	$this->validate($request, [
    		'site_name'		=> 'required|max:40',
    		'address'		=> 'required|max:50',
    		'contact_number'	=> 'required|max:40',
            'contact_email'     => 'required|email',
            'about'         => 'required|max:3500',
    	]);

    	$setting = Setting::first();
    	$setting -> site_name = $request->site_name;
        $setting -> address = $request->address;
        $setting -> about = $request->about;
    	$setting -> contact_number = $request->contact_number;
    	$setting -> contact_email = $request->contact_email;

    	$result = $setting->save();
        if($result) {
            Session::flash('status', 'Blog Settings updated Successfully!');
        } else {
            Session::flash('error', 'Something went wrong.');
        }

        return redirect() -> route('settings');
    }
}
