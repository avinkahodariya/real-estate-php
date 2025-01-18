<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CategoryController extends Controller
{
    public function showcategory()
    {
        $data =  Category::get();
        return view('admin.category.default', compact('data'));
    }

    public function addcategory($id)
    {
        $data =  Category::find($id);
        return view('admin.category.savecategory', compact('data', 'id'));
    }


    public function savecategory(Request $request)
    {
        //    return $request;
        if ($request->id == 0) {
            $data = new category();
            $msg = __("category Add Successfully");
        } else {
            $data = category::find($request->id);
            $msg =__("category Update Successfully");
        }

        $data->name = $request->name;
        $data->status = 0;
        $data->save();

        Session::flash('message', $msg);
        Session::flash('alert-class', 'alert-success');
        return redirect('admin/category');
    }



    public function deletecategory($id)
    {
        $category = category::find($id);
        $category->delete();

        Session::flash('message', __("category Delete Successfully"));
        Session::flash('alert-class', 'alert-success');
        return redirect()->back();
    }
}
