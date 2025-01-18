<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ProductsController extends Controller
{
    public function showproduct()
    {
        $data =  Product::get();
        return view('admin.product.default', compact('data'));
    }

    public function addproduct($id)
    {
        $data =  Product::find($id);
        $category =  Category::all();
        return view('admin.product.saveproduct', compact('data', 'id','category'));
    }


    public function saveproduct(Request $request)
    {
        //    return $request;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension() ?: 'png';
            $folderName = '/upload/product/';
            $picture = time() . '.' . $extension;
            $destinationPath = public_path() . $folderName;
            $request->file('image')->move($destinationPath, $picture);
            $img_url = $picture;

            if ($request->id != 0) {
                // Find the existing banner to delete the old image
                $product = Product::find($request->id);
                if ($product && $product->image) {
                    $oldImagePath = public_path() . $folderName . $product->image;
                    if (file_exists($oldImagePath)) {
                        unlink($oldImagePath);
                    }
                }
            }
        }

        if ($request->id == 0) {
            $data = new Product();
            $msg = __("Product Add Successfully");
        } else {
            $data = Product::find($request->id);
            $msg =__("Product Update Successfully");
        }

        $data->title = $request->title;
        $data->price = $request->price;
        $data->category = is_array($request->catrgory) ? implode(',', $request->catrgory) : '';
        $data->originalprice = $request->originalprice;
        $data->description = $request->description;
        if ($request->hasFile('image')) {
            $data->image = $picture;
        }
        $data->save();

        Session::flash('message', $msg);
        Session::flash('alert-class', 'alert-success');
        return redirect('admin/product');
    }



    public function deleteproduct($id)
    {
        $product = Product::find($id);
        if ($product && $product->image) {
            $folderName = '/upload/product/';
            $oldImagePath = public_path() . $folderName . $product->image;
            if (file_exists($oldImagePath)) {
                unlink($oldImagePath);
            }
        }
        $product->delete();

        Session::flash('message', __("Product Delete Successfully"));
        Session::flash('alert-class', 'alert-success');
        return redirect()->back();
    }
}
