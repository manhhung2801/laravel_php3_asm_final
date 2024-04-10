<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $productsHot = Product::where('product_type', 'hot')->limit(5)->get();
        return view('frontend.home', compact('productsHot'));
    }
}
