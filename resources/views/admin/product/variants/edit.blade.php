@extends('admin.layouts.master')

@section('title')
Dashboard - Update Product Variants
@endsection

@section('contents')
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-md-12">
            <div class="bg-light rounded h-100 p-4">
                <a href="{{ route('admin.product-variant', $variant->product_id) }}" class="float-end btn btn-secondary">Back</a>
                <h6 class="mb-4">Update <code>({{ $variant->name }})</code> Variants</h6>
                <form action="{{ route('admin.product-variant-update', $variant->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="" class="form-label">Name</label>
                        <input type="text" name="name" {{ $variant->status == 1 ? "selected" : "" }} value="{{ $variant->name }}" class="form-control" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="">Status</label>
                        <select class="form-select" name="status">
                            <option value="" selected>Select</option>
                            <option {{ $variant->status == 1 ? "selected" : "" }} value="1">Active</option>
                            <option {{ $variant->status == 0 ? "selected" : "" }} value="0">Inactive</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Add</button>
                </form>
            </div>
        </div>
    </div>
</div>


@endsection
