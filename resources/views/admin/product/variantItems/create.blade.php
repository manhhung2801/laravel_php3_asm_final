@extends('admin.layouts.master')

@section('title')
Dashboard - Create Variant Items
@endsection

@section('contents')
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-md-12">
            <div class="bg-light rounded h-100 p-4">
                <a href="{{ route('admin.product-variant-item', $variant->id) }}" class="float-end btn btn-primary">Back</a>
                <h6 class="mb-4">Add <code>({{ $variant->name }})</code> variant item</h6>
                <form action="{{ route('admin.product-variant-item-store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="" class="form-label">Name</label>
                        <input type="text" name="name" class="form-control" aria-describedby="emailHelp">
                        <input type="hidden" name="product_variant_id" value="{{ $variant->id }}">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Price</label>
                        <input type="number" name="price" class="form-control" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="">Is Default</label>
                        <select class="form-select" name="is_default">
                            <option value="" selected>Select</option>
                            <option value="1">Yes</option>
                            <option value="0">No</option>
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
                    <button type="submit" class="btn btn-primary">Add</button>
                </form>
            </div>
        </div>
    </div>
</div>


@endsection
