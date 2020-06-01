<?php

namespace App\Http\Controllers;


use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use App\User;

class CabinetController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        \DB::enableQueryLog();
        $user = User::with('products', 'commentaries')->where('id', Auth::id())->first();
        $del_products  = Product::onlyTrashed()->where('user_id', Auth::id())->get();
        return view('cabinet', compact('user', 'del_products'));
    }

}
