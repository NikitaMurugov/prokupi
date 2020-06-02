<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DeleteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    function deleteProduct(Request $request) {

        // функционал удаления объявления
        Product::where('id', $request->product_id)->delete();

        return redirect()->route('cabinet');
    }

    function deleteUser(Request $request) {

        // функционал удаления пользователя

        User::where('id', Auth::id())->delete();

        Auth::guard()->logout();

        return redirect()->route('home');
    }

}
