<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Categories;
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
        return view('product.product_add', ['categories' => Categories::all()]);
    }
    public function get($id)
    {
        return view('product.product');
    }

    public function submit(ProductRequest $req) {

        $image = $req->file('img')->storePublicly('uploads/user/' . Auth::id(), 'public');

        $product = new Product();

        $product->name = $req->input('name');
        $product->category_id = $req->input('category_id');
        $product->user_id = Auth::id();
        $product->price = $req->input('price');
        $product->description = $req->input('description');
        $product->phone_number = $req->input('phone_number');
        $product->img = $image;
        $product->location = $req->input('location');

        $product->save();

        return  redirect()->route('home');
    }
}
