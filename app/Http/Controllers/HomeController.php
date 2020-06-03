<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

//        \DB::enableQueryLog();
        $categories = Category::where('is_enabled', true)->get();
        $products = Product::with(['category' => function ($q) {
            $q->where('is_enabled', true);
        }])
            ->where('is_enabled', true)
            ->orderByRaw('created_at DESC')->limit(40)->get();
//        dd(\DB::getQueryLog());
        //        $categories = Category::get();
//        foreach ($categories as $category) {
//            dd($category->products);
//        }
//        dd($categories->products);
        return view('home', compact('categories', 'products'));
    }
}
