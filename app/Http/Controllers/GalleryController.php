<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class GalleryController extends Controller
{
    public function showgallery()
    {
        $gallery =  Gallery::get();
        return view('admin.gallery.default', compact('gallery'));
    }

    public function addgallery($id)
    {
        $data =  Gallery::find($id);
        return view('admin.gallery.savegallery', compact('data', 'id'));
    }


    public function savegallery(Request $request)
    {
        //    return $request;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension() ?: 'png';
            $folderName = '/upload/gallery/';
            $picture = time() . '.' . $extension;
            $destinationPath = public_path() . $folderName;
            $request->file('image')->move($destinationPath, $picture);
            $img_url = $picture;

            if ($request->id != 0) {
                // Find the existing banner to delete the old image
                $gallery = gallery::find($request->id);
                if ($gallery && $gallery->image) {
                    $oldImagePath = public_path() . $folderName . $gallery->image;
                    if (file_exists($oldImagePath)) {
                        unlink($oldImagePath);
                    }
                }
            }
        }

        if ($request->id == 0) {
            $data = new Gallery();
            $msg = __("Gallery Image Add Successfully");
        } else {
            $data = Gallery::find($request->id);
            $msg =__("Gallery Image Update Successfully");
        }

        $data->name = $request->name;
        if ($request->hasFile('image')) {
            $data->image = $picture;
        }
        $data->save();

        Session::flash('message', $msg);
        Session::flash('alert-class', 'alert-success');
        return redirect('admin/gallery');
    }

    public function deletegallery($id)
    {
        $gallery = Gallery::find($id);
        if ($gallery && $gallery->image) {
            $folderName = '/upload/gallery/';
            $oldImagePath = public_path() . $folderName . $gallery->image;
            if (file_exists($oldImagePath)) {
                unlink($oldImagePath);
            }
        }
        $gallery->delete();

        Session::flash('message', __("Gallery Image Delete Successfully"));
        Session::flash('alert-class', 'alert-success');
        return redirect()->back();
    }
}
