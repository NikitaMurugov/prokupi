<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ProductRequest;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{

    public function index()
    {
        return view('home');
    }
    public function add()
    {
        $categories = Category::with('products')->get();
        return view('product.product_add', compact('categories'));
    }
    public function get($id)
    {
        return view('product.product');
    }

    public function submit(ProductRequest $req) {

        if (1)  {
            $image = $req->file('image')->storePublicly('uploads/user/' . Auth::id(), 'public');
            Product::firstOrCreate([
                'name'=> $req->input('name'),
                'category_id'=> $req->input('category_id'),
                'user_id'=> Auth::id(),
                'price'=> $req->input('price'),
                'description'=> $req->input('description'),
                'phone_number'=> $req->input('phone_number'),
                'location'=> $req->input('location'),
                'image'=> $image,
            ]);
        } else {
            $image = $req->file('image')->storePublicly('uploads/user/' . Auth::id(), 'public');

            $product = new Product();

            $product->name = $req->input('name');
            $product->category_id = $req->input('category_id');
            $product->user_id = Auth::id();
            $product->price = $req->input('price');
            $product->description = $req->input('description');
            $product->phone_number = $req->input('phone_number');
            $product->image = $image;
            $product->location = $req->input('location');

            $product->save();
        }
        return  redirect()->route('product_add');
    }
}
