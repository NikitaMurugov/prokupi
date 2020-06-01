<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class DeleteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    function deleteProduct(Request $request) {

        // функционал удаления объявления
        $product =  Product::where('id', $request->product_id)->delete();

        return redirect()->route('cabinet');
    }

}
