<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;

class FrontendProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        $products = Product::paginate(5);
        return view('frontend.list-product', compact('categories', 'products'));
    }

    public function filterProductCategory(string $idCategory = null) {

        $categories = Category::all();
        $products = Product::where('category_id', $idCategory)->paginate(5);

        if(count($products) > 0){
            return view('frontend.list-product', compact('categories', 'products'));
        }else{
            return $this->index();
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $productDetail = Product::findOrFail($id);
        return view('frontend.product-detail', compact('productDetail'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
