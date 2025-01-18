<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SettingController extends Controller
{
    public function setting(Request $request)
    {
        $data = Setting::find(1);
        return view('admin.setting', compact('data'));
    }

    public function save_setting(Request $request)
    {

        $data = Setting::find(1);
        $msg = __("Setting Update Successfully");


        $data->main_title = $request->title;
        $data->phone = $request->phone;
        $data->email = $request->email;
        $data->address = $request->address;
        $data->save();

        Session::flash('message', $msg);
        Session::flash('alert-class', 'alert-success');
        return redirect()->back();
    }
}
