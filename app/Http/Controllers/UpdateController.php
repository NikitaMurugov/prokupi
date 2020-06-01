<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Requests\UpdateProductRequest;

class UpdateController extends Controller
{
    public function updateUser(UpdateUserRequest $request)
    {
        $user = Auth::user();
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
        $product = Product::with('')->where('id', $request->id)->get();
        $product->fill($request->only([
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
        $product->save();


//        return  redirect()->route('cabinet');
        return true;
    }
}
