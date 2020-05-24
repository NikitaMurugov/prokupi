<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ProductRequest;
use Intervention\Image\Facades\Image;

class ProductController extends Controller
{

    public function index()
    {
        return view('product.product');
    }
    public function add()
    {
        $categories = Category::with('products')->get();
        return view('product.product_add', compact('categories'));
    }
    public function get($product_id)
    {
        return view('product.product');
    }

    public function search($search,Request $request) {
        dd($search);
        $products = Product::with(['categories' => function ($q) use ($search)  {
            $q->where('id', 'like', '%'.$search.'%');
        }])->get();

        return view('product.product', compact('products'));
    }

    public function submit(ProductRequest $req) {

        $model = new Product;
        $model->fill([
            'name'         => $req->input('name'),
            'category_id'  => $req->input('category_id'),
            'user_id'      => Auth::id(),
            'description'  => $req->input('description'),
            'phone_number' => $req->input('phone_number'),
            'location'     => $req->input('location'),
            'price'        => $req->input('price'),
        ]);
        $model->save();

        if($req->hasFile('image')){
            $img = Image::make($req->file('image'));
            $height = $img->height();
            $width = $img->width();
            if($height >= 601) {
                $img->resize(300, null, function ($constraint) {
                    $constraint->aspectRatio();
                });
            }
            if($width >= 601) {
                $img->resize(null, 300, function ($constraint) {
                    $constraint->aspectRatio();
                });
            }
            $img->save($model->img_path);
        }

        return  redirect()->route('home');
    }
}
