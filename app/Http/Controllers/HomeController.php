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

        $categories = Category::all();
        $products = Product::with('category')->orderByRaw('created_at DESC')->get();
//        $categories = Category::get();
//        foreach ($categories as $category) {
//            dd($category->products);
//        }
//        dd($categories->products);
        return view('home', compact('categories', 'products'));
    }
}
