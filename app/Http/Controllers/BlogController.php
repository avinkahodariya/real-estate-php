<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class BlogController extends Controller
{
    public function showblog()
    {
        $blog =  Blog::get();
        return view('admin.blog.default', compact('blog'));
    }

    public function addblog($id)
    {
        $data =  Blog::find($id);
        $category =  Category::all();
        return view('admin.blog.saveblog', compact('data', 'id','category'));
    }


    public function saveblog(Request $request)
    {
        //    return $request;

        if ($request->hasFile('cover_image')) {
            $file = $request->file('cover_image');
            $filename = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension() ?: 'png';
            $folderName = '/upload/blog/';
            $picture = time() . '.' . $extension;
            $destinationPath = public_path() . $folderName;
            $request->file('cover_image')->move($destinationPath, $picture);
            $img_url = $picture;

            if ($request->id != 0) {
                // Find the existing banner to delete the old image
                $blog = blog::find($request->id);
                if ($blog && $blog->image) {
                    $oldImagePath = public_path() . $folderName . $blog->image;
                    if (file_exists($oldImagePath)) {
                        unlink($oldImagePath);
                    }
                }
            }
        }

        if ($request->id == 0) {
            $data = new Blog();
            $msg = __("Blog Image Add Successfully");
        } else {
            $data = Blog::find($request->id);
            $msg =__("Blog Image Update Successfully");
        }

        $data->title = $request->title;
        $data->category = is_array($request->catrgory) ? implode(',', $request->catrgory) : '';
        if ($request->hasFile('cover_image')) {
            $data->image = $img_url;
        }
        $data->description = "";
        $data->save();

        Session::flash('message', $msg);
        Session::flash('alert-class', 'alert-success');
        return redirect('admin/blog');
    }

    public function deleteblog($id)
    {
        $blog = Blog::find($id);
        if ($blog && $blog->image) {
            $folderName = '/upload/blog/';
            $oldImagePath = public_path() . $folderName . $blog->image;
            if (file_exists($oldImagePath)) {
                unlink($oldImagePath);
            }
        }
        $blog->delete();

        Session::flash('message', __("Blog Image Delete Successfully"));
        Session::flash('alert-class', 'alert-success');
        return redirect()->back();
    }
}
