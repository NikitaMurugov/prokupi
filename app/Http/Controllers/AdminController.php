<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUserRequest;
use App\Models\Category;
use App\Models\Product;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class AdminController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index(Request $req) {
        if (Auth::user()->is_admin) {
            $products = Product::with('category', 'user')->limit(8)->orderByRaw('created_at DESC')->get();
            $users = User::with('products')->limit(8)->orderByRaw('created_at DESC')->get();

            $path = $req->path();
            return view('admin.home', compact('path', 'products', 'users'));
        }
        return back();
    }

    public function getProducts(Request $req) {

        if (Auth::user()->is_admin) {

//            \DB::enableQueryLog();
            $products = Product::with('category', 'user')->orderByRaw('id ASC')->get();
            $del_products = Product::onlyTrashed()->with('category', ['user'=>function  ($q) {
                $q->withTrashed();
            }])->orderByRaw('id ASC')->get();
//            dd(\DB::getQueryLog());
            $path = $req->path();
            return view('admin.products', compact('path','products','del_products'));
        }
        return back();
    }

    public function editProduct(Request $req) {

        if (Auth::user()->is_admin) {
            $path = $req->path();
            $product = Product::with('category', 'user')->where('id', $req->product_id)->first();
            if ($product !== null) {
                $categories = Category::with('products')->where('is_enabled', true)->get();
                return view('admin.product', compact('product', 'categories', 'path'));
            }
            return back();
        }
        return back();
    }

    public function updateProduct(Request $req) {

        if (Auth::user()->is_admin) {
            $product = Product::withTrashed()->with('category')->where('id', $req->product_id)->first() ;
//        dd(\DB::getQueryLog());
            $product->update($req->only([
                'name',
                'category_id',
                'user_id',
                'description',
                'phone_number',
                'location',
                'price',
            ]));

            if($req->file('image')) {

                Storage::disk('public')->delete($product->img);

                $product->update([
                    'img' => $product->img_url,
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
                $img->save($product->img_path);
            }
            return redirect()->route('admin.products');
        }
        return back();
    }

    public function deleteProduct(Request $req) {

        if (Auth::user()->is_admin) {
            Product::withTrashed()->where('id', $req->product_id)->delete();
            return back();
        }
        return back();
    }

    public function getUsers(Request $req) {

        if (Auth::user()->is_admin) {
            $users = User::with('products')->orderByRaw('id ASC')->get();
            $del_users = User::onlyTrashed()->with('products')->orderByRaw('id ASC')->get();
            $path = $req->path();
            return view('admin.users', compact('path','users','del_users'));
        }
        return back();

    }

    public function editUser(Request $req) {

        if (Auth::user()->is_admin) {
            $path = $req->path();
            $user = User::withTrashed()->where('id', $req->user_id)->first();
            return view('admin.user', compact('user', 'path'));
        }
        return back();

    }

    public function updateUser(UpdateUserRequest $req) {
        if (Auth::user()->is_admin) {
            $user = User::withTrashed()->where('id', $req->user_id)->first();
//        dd(\DB::getQueryLog());
            $user->fill($req->only([
                'name',
                's_name',
                't_name',
                'email',
                'phone_number',
                'location',
                'description',
                'password',
            ]));
            $user->save();

            return redirect()->route('admin.users');
        }
        return back();
    }

    public function deleteUser(Request $req) {
        if (Auth::user()->is_admin) {

            User::where('id', $req->user_id)->delete();
            Product::where('user_id', $req->user_id)->delete();

            return back();
        }
        return back();
    }

    public function recoverUser(Request $req) {
        if (Auth::user()->is_admin) {
            User::onlyTrashed()->where('id', $req->user_id)->update(['deleted_at' => null]);
            return back();
        }
        return back();
    }
}
