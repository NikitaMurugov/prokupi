<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use App\Http\Requests\ProductRequest;
use App\Http\Requests\UpdateProductRequest;

class UpdateController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function updateUser(Request $request)
    {
//        \DB::enableQueryLog();
        $user = Auth::user();
//        dd(\DB::getQueryLog());
        $user->fill($request->only([
            'name',
            's_name',
            't_name',
            'email',
            'phone_number',
            'location',
            'description',
            'avatar',
            'password',
        ]));
        $user->save();


//        return  redirect()->route('cabinet');
        return true;
    }
    public function updateProduct(UpdateProductRequest $request)
    {

//        \DB::enableQueryLog();
        $product = Product::with('category')->where('id', $request->product_id)->first() ;
//        dd(\DB::getQueryLog());
        $product->update($request->only([
            'name',
            'category_id',
            'user_id',
            'description',
            'phone_number',
            'location',
            'price',
        ]));

        if($request->file('image')) {

            Storage::disk('public')->delete('storage/!/thumbs/products/' .  $product->img);

            $product->update([
                'img' => $product->img_url,
            ]);
            $img = Image::make($request->file('image'));
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


        return redirect()->route('product.get', $request->product_id);
//        return true;
    }
}
