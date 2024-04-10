<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ProductVariant;
use App\Models\ProductVariantItem;

class ProductVariantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(string $id)
    {
        $product = Product::findOrFail($id);
        $variants = ProductVariant::where('product_id', $product->id)->get();
        return view('admin.product.variants.index', compact('variants', 'product'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(string $id)
    {
        $product = Product::findOrFail($id);

        return view('admin.product.variants.create', compact('product'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "name" => ['required'],
            "status" => ['required'],
            "product_id" => ['required'],
        ]);
        $variant = new ProductVariant();
        $variant->name = $request->name;
        $variant->status = $request->status;
        $variant->product_id = $request->product_id;
        $variant->save();
        toastr()->success('Thêm biến thể thành công.');

        $product = Product::findOrFail($request->product_id);
        $variants = ProductVariant::where('product_id', $request->product_id)->get();
        return view('admin.product.variants.index', compact('variants', 'product'));
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $variant = ProductVariant::findOrFail($id);
        return view('admin.product.variants.edit', compact('variant'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            "name" => ['required'],
            "status" => ['required'],
        ]);
        $variant = ProductVariant::findOrFail($id);
        $variant->name = $request->name;
        $variant->status = $request->status;
        $variant->save();
        toastr()->success('Cập nhật biến thể thành công.');

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        $variant = ProductVariant::findOrFail($id);
        $variantItems = ProductVariantItem::where("product_variant_id", $variant->id)->count();
        if($variantItems > 0){
            return response(['status' => 'error', 'message' => 'This items contain, sub items for delete this you have to delete the sub items first!']);
        }else{

            $variant->delete();
            return response(['status' => 'success', 'message' => 'Delete product has been successfully.']);
        }

    }

    public function ChangeStatus(Request $request) {

        $productVariant = ProductVariant::findOrFail($request->id);

        if($request->status == 1){
            $productVariant->status = 0;
        }
        if($request->status == 0){
            $productVariant->status = 1;
        }

        $productVariant->save();
        return response(['message' => 'Status has been updated']);
    }
}
