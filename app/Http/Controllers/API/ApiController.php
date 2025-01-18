<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Gallery;
use App\Models\Product;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ApiController extends Controller
{
    public function getproduct(Request $request)
    {
        $response = array("status" => 0, "msg" => "Validation error");
        $rules = [];
        $messages = array();
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            $message = '';
            $messages_l = json_decode(json_encode($validator->messages()), true);
            foreach ($messages_l as $msg) {
                $message .= $msg[0] . ", ";
            }
            $response['msg'] = $message;
        } else {

            $data = Product::select('id', 'title', 'originalprice', 'price', 'description', 'image', 'category')->get(); //paginate(10);

            if (count($data) != 0) {

                foreach ($data as $product) {
                    // Split the category IDs and fetch category names
                    $categoryIds = explode(',', $product->category);
                    $categories = Category::whereIn('id', $categoryIds)
                        ->pluck('name') // Fetch only the names
                        ->toArray();

                    // Attach the category names to the product object
                    $product->category = $categories;

                    // Update the image path
                    $product->image = asset('public/upload/product') . '/' . $product->image;
                }
                // $data = $data->map(function ($product) {
                //     $product->image = asset('public/upload/product') . '/' . $product->image;
                //     return $product;
                // });
                $response['status'] = "1";
                $response['msg'] = __('Product Data Get Successfully');
                $response['data'] = $data;
            } else {
                $response['status'] = "0";
                $response['msg'] = __('Product Data Not Found');
            }
        }
        return json_encode($response, JSON_NUMERIC_CHECK);
    }


    public function getgallery(Request $request)
    {
        $response = array("status" => 0, "msg" => "Validation error");
        $rules = [];
        $messages = array();
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            $message = '';
            $messages_l = json_decode(json_encode($validator->messages()), true);
            foreach ($messages_l as $msg) {
                $message .= $msg[0] . ", ";
            }
            $response['msg'] = $message;
        } else {

            $data = Gallery::select('id', 'name', 'image')->get();

            if (count($data) != 0) {
                $data = $data->map(function ($product) {
                    $product->image = asset('public/upload/gallery') . '/' . $product->image;
                    return $product;
                });
                $response['status'] = "1";
                $response['msg'] = __('Gallery Image Get Successfully');
                $response['data'] = $data;
            } else {
                $response['status'] = "0";
                $response['msg'] = __('Gallery Image Not Found');
            }
        }
        return json_encode($response, JSON_NUMERIC_CHECK);
    }

    public function get_extra_details(Request $request)
    {
        $response = array("status" => 0, "msg" => "Validation error");
        $rules = [];
        $messages = array();
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            $message = '';
            $messages_l = json_decode(json_encode($validator->messages()), true);
            foreach ($messages_l as $msg) {
                $message .= $msg[0] . ", ";
            }
            $response['msg'] = $message;
        } else {

            $data = Setting::select('main_title', 'phone','email','address')->find(1);

            if ($data) {
                $response['status'] = "1";
                $response['msg'] = __('Extra Details Get Successfully');
                $response['data'] = $data;
            } else {
                $response['status'] = "0";
                $response['msg'] = __('Extra Details Not Found');
            }
        }
        return json_encode($response, JSON_NUMERIC_CHECK);
    }

    public function get_blog(Request $request)
    {
        $response = array("status" => 0, "msg" => "Validation error");
        $rules = [];
        $messages = array();
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            $message = '';
            $messages_l = json_decode(json_encode($validator->messages()), true);
            foreach ($messages_l as $msg) {
                $message .= $msg[0] . ", ";
            }
            $response['msg'] = $message;
        } else {

            $blog = Blog::select('id', 'title','image','category','created_at')->get();

            if ($blog) {

                foreach ($blog as $b) {
                    $categoryIds = explode(',', $b->category);
                    $categories = Category::whereIn('id', $categoryIds)
                        ->pluck('name') // Fetch only the names
                        ->toArray();

                    // Attach the category names to the b object
                    $b->category = $categories;

                    // Update the image path
                    $b->image = asset('public/upload/blog') . '/' . $b->image;
                }

                $response['status'] = "1";
                $response['msg'] = __('Blog Get Successfully');
                $response['data'] = $blog;
            } else {
                $response['status'] = "0";
                $response['msg'] = __('Blog Not Found');
            }
        }
        return json_encode($response, JSON_NUMERIC_CHECK);
    }

}
