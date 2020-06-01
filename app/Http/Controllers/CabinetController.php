<?php

namespace App\Http\Controllers;


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
        return view('cabinet', compact('user'));
    }

}
