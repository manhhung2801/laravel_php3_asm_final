<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Http\Requests\ProductRequest;
use App\Models\Gallery;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::paginate(5);
        return view('admin.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::where('status', 1)->get();
        return view('admin.product.create', compact('categories'));


    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request)
    {
        $request->validated();


        $product = new Product();
        $product->name = $request->name;

        $product->quantity = $request->quantity;
        $product->short_description = $request->short_description;
        $product->long_description = $request->long_description;
        $product->price = $request->price;
        $product->offer_price = $request->offer_price;
        $product->product_type = $request->product_type;
        $product->status = $request->status;
        $product->category_id = $request->category_id;

        if($request->hasFile('thumb_image')){
            $imageName = time() . "." . $request->thumb_image->extension();
            $request->thumb_image->move(public_path('uploads'), $imageName);
            $product->thumb_image = $imageName;
            $product->save();

            toastr()->success('Thêm sản phẩm thành công.');
            return redirect()->route('admin.product.index');
        }else {
            toastr()->error('Vui lòng nhập Hình ảnh.');
            return redirect()->back();
        }





    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $categories = Category::where('status', 1)->get();
        $product = Product::findOrFail($id);
        return view('admin.product.edit', compact('categories', 'product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductRequest $request, string $id)
    {
        $request->validated();

        $product = Product::findOrFail($id);
        $product->name = $request->name;

        $product->quantity = $request->quantity;
        $product->short_description = $request->short_description;
        $product->long_description = $request->long_description;
        $product->price = $request->price;
        $product->offer_price = $request->offer_price;
        $product->product_type = $request->product_type;
        $product->status = $request->status;
        $product->category_id = $request->category_id;

        if($request->hasFile('thumb_image')){
            if(File::exists(public_path('uploads/' . $product->thumb_image))){

                File::delete(public_path('uploads/' . $product->thumb_image));
                $imageName = time() . "." . $request->thumb_image->extension();
                $request->thumb_image->move(public_path('uploads'), $imageName);
                $product->thumb_image = $imageName;
                $product->save();

                toastr()->success('Cập nhật sản phẩm thành công.');
                return redirect()->back();
            }
        }
            $product->save();
            toastr()->success('Cập nhật sản phẩm thành công.');
            return redirect()->back();

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        $product = Product::findOrFail($id);
        $galleries = Gallery::where("product_id", $product->id)->count();
        if($galleries > 0){
            return response(['status' => 'error', 'message' => 'This items contain, sub items for delete this you have to delete the sub items first!']);
        }else{
            if(File::exists(public_path('uploads/' . $product->thumb_image))){
                File::delete(public_path('uploads/' . $product->thumb_image));
            }

            $product->delete();
            return response(['status' => 'success', 'message' => 'Delete product has been successfully.']);
        }

    }

    public function ChangeStatus(Request $request) {

        $category = Product::findOrFail($request->id);

        if($request->status == 1){
            $category->status = 0;
        }
        if($request->status == 0){
            $category->status = 1;
        }

        $category->save();
        return response(['message' => 'Status has been updated']);
    }
}
