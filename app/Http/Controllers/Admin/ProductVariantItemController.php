<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductVariant;
use App\Models\ProductVariantItem;
use Illuminate\Http\Request;

class ProductVariantItemController extends Controller
{
    public function index(string $id) {
        $variant = ProductVariant::findOrFail($id);
        $variantItem = ProductVariantItem::where('product_variant_id', $variant->id)->get();
        return view('admin.product.variantItems.index', compact('variant', 'variantItem'));
    }

    public function create(string $id) {
        $variant = ProductVariant::findOrFail($id);
        return view('admin.product.variantItems.create', compact('variant'));
    }

    public function store(Request $request) {
            $request->validate([
                "name" => ['required'],
                "product_variant_id" => ['required'],
                "price" => ['required', 'integer'],
                "is_default" => ['required'],
                "status" => ['required'],
            ]);

            $variantItem = new ProductVariantItem();
            $variantItem->name = $request->name;
            $variantItem->product_variant_id = $request->product_variant_id;
            $variantItem->price = $request->price;
            $variantItem->is_default = $request->is_default;
            $variantItem->status = $request->status;
            $variantItem->save();
            toastr()->success('Thêm variant item thành công.');

            return redirect()->back();
    }

    public function edit(string $id){
        $variantItem = ProductVariantItem::findOrFail($id);
        return view('admin.product.variantItems.edit', compact('variantItem'));
    }
    public function update(Request $request, string $id) {
        $request->validate([
            "name" => ['required'],
            "price" => ['required', 'integer'],
            "is_default" => ['required'],
            "status" => ['required'],
        ]);

        $variantItem = ProductVariantItem::findOrFail($id);
        $variantItem->name = $request->name;
        $variantItem->price = $request->price;
        $variantItem->is_default = $request->is_default;
        $variantItem->status = $request->status;
        $variantItem->save();
        toastr()->success('Cập nhật variant item thành công.');

        return redirect()->back();
}
    public function destroy(string $id)
    {

        $variantItem = ProductVariantItem::findOrFail($id);
        $variantItem->delete();
        return response(['status' => 'success', 'message' => 'Delete variant item has been successfully.']);


    }

    public function ChangeStatus(Request $request) {

        $productVariantItem = ProductVariantItem::findOrFail($request->id);

        if($request->status == 1){
            $productVariantItem->status = 0;
        }
        if($request->status == 0){
            $productVariantItem->status = 1;
        }

        $productVariantItem->save();
        return response(['message' => 'Status has been updated']);
    }
}
