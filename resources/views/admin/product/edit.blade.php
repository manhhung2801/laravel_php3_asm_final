@extends('admin.layouts.master')

@section('title')
Dashboard - Update Product
@endsection

@section('contents')
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-md-12">
            <div class="bg-light rounded h-100 p-4">
                <h6 class="mb-4">Update Product</h6>
                <form action="{{ route('admin.product.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <img class="" src="{{ asset('uploads/' . $product->thumb_image) }}" alt="{{ $product->name }}" width="350px" height="250px">
                    </div>
                    <div class="mb-3 mt-5">
                        <label for="" class="form-label">Name</label>
                        <input type="text" name="name" value="{{ $product->name }}" class="form-control" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Category</label>
                        <select class="form-select" name="category_id">
                            @foreach($categories as $category)
                            <option {{ $product->category_id == $category->id ? "selected" : ""  }} value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="formFileMultiple" class="form-label">Thumb Image</label>
                        <input class="form-control" type="file" name="thumb_image" id="formFileMultiple">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Quantity</label>
                        <input type="number" name="quantity" value="{{ $product->quantity }}" class="form-control" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="">Short description</label>
                        <input type="text" name="short_description" value="{{ $product->short_description }}" class="form-control"  placeholder="short description">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="">Long description</label>
                        <textarea class="form-control" type="text" name="long_description" placeholder="long description" style="height: 150px;">{!! $product->long_description !!}</textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="">price</label>
                        <input type="number" name="price" value="{{ $product->price }}" class="form-control"  placeholder="price">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="">Offer price</label>
                        <input type="number" name="offer_price" value="{{ $product->offer_price }}" class="form-control"  placeholder="offer price">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="">Product Type</label>
                        <select class="form-select" name="product_type">
                            <option value="">Select</option>
                            <option {{ $product->product_type == "hot" ? "selected" : ""  }} value="hot">Hot</option>
                            <option {{ $product->product_type == "best" ? "selected" : ""  }} value="best">Best</option>
                            <option {{ $product->product_type == "sellest" ? "selected" : ""  }} value="sellest">Sellest</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="">Status</label>
                        <select class="form-select" name="status">
                            <option value="">Select</option>
                            <option {{ $product->status == 1 ? "selected" : ""  }} value="1">Active</option>
                            <option {{ $product->status == 0 ? "selected" : ""  }} value="0">Inactive</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
