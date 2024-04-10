@extends('admin.layouts.master')

@section('title')
Dashboard - Create Product
@endsection

@section('contents')
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-md-12">
            <div class="bg-light rounded h-100 p-4">
                <h6 class="mb-4">Create Product</h6>
                <form action="{{ route('admin.product.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="" class="form-label">Name</label>
                        <input type="text" name="name" class="form-control" aria-describedby="emailHelp">
                    </div>
                    <div class="form-floating mb-3">
                        <select class="form-select" name="category_id">
                            <option value="" selected>Select</option>
                            @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                        <label for="floatingSelect">Category</label>
                    </div>
                    <div class="mb-3">
                        <label for="formFileMultiple" class="form-label">Thumb Image</label>
                        <input class="form-control" type="file" name="thumb_image" id="formFileMultiple">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Quantity</label>
                        <input type="number" name="quantity" class="form-control" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="">Short description</label>
                        <input type="text" name="short_description" class="form-control"  placeholder="short description">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="">Long description</label>
                        <textarea class="form-control" type="text" name="long_description" placeholder="long description" style="height: 150px;"></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="">price</label>
                        <input type="number" name="price" class="form-control"  placeholder="price">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="">Offer price</label>
                        <input type="number" name="offer_price" class="form-control"  placeholder="offer price">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="">Product Type</label>
                        <select class="form-select" name="product_type">
                            <option value="" selected>Select</option>
                            <option value="hot">Hot</option>
                            <option value="best">Best</option>
                            <option value="sellest">Sellest</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="">Status</label>
                        <select class="form-select" name="status">
                            <option value="" selected>Select</option>
                            <option value="1">Active</option>
                            <option value="0">Inactive</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Create</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
