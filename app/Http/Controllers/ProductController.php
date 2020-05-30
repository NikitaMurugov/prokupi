<?php

namespace App\Http\Controllers;


use Faker\Factory;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ProductRequest;
use Intervention\Image\Facades\Image;
use Carbon\Carbon;
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

    public function get(Request $req)
    {

//        \DB::enableQueryLog();
        $product = Product::with('category', 'user')->where('id',(int)$req->route('product_id'))->first();
//        dd(\DB::getQueryLog());
//        dd($product);

        return view('product.product', compact('product'));
    }

    public function search(Request $request) {
//        $cat      = Category::with('products')->get();
        $search   = $request->input('search');
        $cat   = $request->input('category_id');
        if (isset($search)) {
            $products = Product::

//        when($cat, function ($q) use ($cat) {
//            $q->where('category_id', '=', $cat->id);
//        })
            when($search, function ($q) use ($search) {
                $q->where(function ($q) use ($search) {
                    $q->orWhere('name', 'like', $search . '%');
//                    $q->orWhereHas('category', function ($q) use ($search) {
//                        $q->where('name', 'like', '%' . $search . '%');
//                    });
                });

            })
                ->orderByRaw('created_at DESC')->get();
            $prod_count = $products->count();
            return view('product.products', compact('products', 'prod_count', 'search'));
        } elseif ($cat) {
            $products = Product::

//          when($cat, function ($q) use ($cat) {
//              $q->where('category_id', '=', $cat->id);
//          })
            when($cat, function ($q) use ($cat) {
                $q->where(function ($q) use ($cat) {
                    $q->orWhere('category_id', 'like', $cat . '%');
//                    $q->orWhereHas('category', function ($q) use ($search) {
//                        $q->where('name', 'like', '%' . $search . '%');
//                    });
                });

            })
                ->orderByRaw('created_at DESC')->get();
            $prod_count = $products->count();
            return view('product.products', compact('products', 'prod_count', 'search'));
        } else {
            return back();
        }

    }

    public function submit(ProductRequest $req) {

        if (0) {
            for ($i = 0; $i <= 20;  $i++) {
                $faker = Factory::create('ru_RU');

                $model = new Product;
                $model->fill([
                    'name'         => $faker->word,
                    'category_id'  => rand(1,8),
                    'user_id'      => rand(1,11),
                    'description'  => $faker->text,
                    'phone_number' => $faker->phoneNumber,
                    'location'     => $faker->address,
                    'price'        => rand(1000,50000),
                    'img'          => $faker->image('storage/!/thumbs/products/', 640,480, null, false)
                ]);
                $model->save();

            }
        }
        $model = new Product;
        $model->fill([
            'name'         => $req->input('name'),
            'category_id'  => $req->input('category_id'),
            'user_id'      => Auth::id(),
            'description'  => $req->input('description'),
            'phone_number' => $req->input('phone_number'),
            'location'     => $req->input('location'),
            'price'        => $req->input('price'),
            'img'          => '',
        ]);

        $model->save();

        if(1){
            $model->update([
                'img'          => $model->index . '.jpg',
            ]);
            $img = Image::make($req->file('image'));
            $height = $img->height();
            $width = $img->width();
            if($height >= 601) {
                $img->resize(600, null, function ($constraint) {
                    $constraint->aspectRatio();
                });
            }
            if($width >= 601) {
                $img->resize(null, 600, function ($constraint) {
                    $constraint->aspectRatio();
                });
            }
            $img->save($model->img_path);
        }

        return  redirect()->route('home');
    }
}
