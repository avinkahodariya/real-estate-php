<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use App\Models\Gallery;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AdminAuthController extends Controller
{
    public function showlogin()
    {
        // $setting = Setting::find(1);
        return view('admin.login');
    }

    public function postlogin(Request $request)
    {

        // $setting = Setting::find(1);
        // Session::put("is_demo", $setting->is_demo);
        // Session::put("favicon", asset('public/image_web') . '/' . $setting->favicon);
        // Session::put("logo", asset('public/image_web') . '/' . $setting->logo);
        // return $request;
        $email = $request->get('email');
        $password = $request->get("password");
        $user = User::where('email', $email)->where("password", $password)->first();

        if ($user) {
            Session::put('admin', $user);
            Auth::login($user, true);
            return redirect('admin/dashboard');
        } else {
            Session::flash('message', __("message.login_wrong"));
            Session::flash('alert', 'danger');
            return redirect()->back();
        }
    }

    public function dashboard()
    {
        $category = Category::count();
        $product = Product::count();
        $blog = Blog::count();
        $gallery = Gallery::count();
        return view('admin.dashboard', compact('product','category','blog','gallery'));
    }

    public function logout()
    {
        Auth::logout();
        return redirect("admin");
    }

    public function editprofile()
    {
        $userdata = User::find(1);
        return view("admin.profile")->with("userdata", $userdata);
    }

    public function updateaccount(Request $request)
    {
        $user = User::find(1);
        $user->name = $request->get("name");
        $user->email = $request->get("email");
        $user->phone = $request->get("phone");
        $user->save();
        $rel_url = $user->profile_pic;
        if ($request->hasFile('profile_pic')) {
            $file = $request->file('profile_pic');
            $filename = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension() ?: 'png';
            $folderName = '/upload/profile/';
            $picture = time() . '.' . $extension;
            $destinationPath = public_path() . $folderName;
            $request->file('profile_pic')->move($destinationPath, $picture);
            $user->profile_pic = $picture;
            $user->save();
            $image_path = public_path() . "/upload/profile/" . $rel_url;
            if (file_exists($image_path) && $rel_url != "") {
                try {
                    unlink($image_path);
                } catch (Exception $e) {
                }
            }
        }
        Session::flash("successorder", __("message.Account Details Update Successfully"));
        return redirect()->back();
    }

    public function changepassword()
    {
        return view('admin.changepassword');
    }

    public  function checkcurrentpassword($pwd)
    {
        $user = User::find(1);
        if ($user->password == $pwd) {
            $data = 1;
        } else {
            $data = 0;
        }
        return $data;
    }

    public function updatepassword(Request $request)
    {
        $user = User::find(1);
        if ($request->get('currentpwd') == $user->password) {
            $user->password = $request->get('newpwd');
            Session::flash('message', __("message.password_update_succes"));
            Session::flash('alert-class', 'alert-success');
            return redirect()->back();
        } else {
            Session::flash('message', __("message.current_password_incorrect"));
            Session::flash('alert-class', 'alert-danger');
            return redirect()->back();
        }
    }
}
