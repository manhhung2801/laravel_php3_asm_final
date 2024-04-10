<?php

namespace App\Http\Controllers\Admin;

use App\Models\Gallery;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class ProductImageGallery extends Controller
{
    public function index(string $product_id) {
        $galleries = Gallery::where('product_id', $product_id)->get();
        $product = Product::findOrFail($product_id);
        return view('admin.product.gallery.index', compact('galleries', 'product'));
    }

    public function add(Request $request) {
        $request->validate([
            "image" => ['required', 'array'],
            "image.*" => ['required', 'image','mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
            'product_id' =>['required']
        ]);
        $imagePaths = [];

        /** Handle image upload */
        $imagePaths = $this->uploadMultiImage($request, 'image', 'uploads');

        foreach($imagePaths as $path){
            $productImageGallery = new Gallery();
            $productImageGallery->image = $path;
            $productImageGallery->product_id = $request->product_id;
            $productImageGallery->save();
        }

        toastr('Uploaded successfully!');
        return redirect()->back();

    }

    public function uploadMultiImage(Request $request, $inputName, $path) {

        $imagePaths = [];

        if($request->hasFile($inputName)){

            $images = $request->{$inputName};
            foreach($images as $image){

                $ext = $image->getClientOriginalExtension();
                $imageName = 'gallery_'.uniqid().'.'.$ext;

                $image->move(public_path($path), $imageName);

                $imagePaths[] = $imageName;
            }

            return $imagePaths;

        }
    }

    public function destroy(string $id)
    {

        $productImageGallery = Gallery::findOrFail($id);
        if(File::exists(public_path('uploads/' . $productImageGallery->image))){
            File::delete(public_path('uploads/' . $productImageGallery->image));
        }
        $productImageGallery->delete();

        return response(['status' => 'success', 'message' => 'Delete product image gallery has been successfully.']);
    }
}
