<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::paginate(5);
        return view("admin.category.index", compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "name" => ['required', 'max:100'],
            "status" => ['required']
        ]);
        $category = new Category();
        $category->name = $request->name;
        $category->status = $request->status;
        $category->save();

        toastr()->success("Thêm Category thành công.");

        return redirect()->back();

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
        $category = Category::findOrFail($id);
        return view("admin.category.edit", compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            "name" => ['required', 'max:100'],
            "status" => ['required']
        ]);
        $category = Category::findOrFail($id);
        $category->name = $request->name;
        $category->status = $request->status;
        $category->save();

        toastr()->success("Cập nhật Category thành công.");
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Category::findOrFail($id);
        $products = Product::where("category_id", $category->id)->count();
        if($products > 0){
            return response(['status' => 'error', 'message' => 'This items contain, sub items for delete this you have to delete the sub items first!']);
        }else{
            $category->delete();

            return response(['status' => 'success', 'message' => 'Delete category has been successfully.']);
        }
    }

    public function ChangeStatus(Request $request) {

        $category = Category::findOrFail($request->id);
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
