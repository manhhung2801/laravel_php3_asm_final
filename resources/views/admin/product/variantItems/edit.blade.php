@extends('admin.layouts.master')

@section('title')
Dashboard - Update Variant Items
@endsection

@section('contents')
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-md-12">
            <div class="bg-light rounded h-100 p-4">
                <a href="{{ route('admin.product-variant-item', $variantItem->product_variant_id) }}" class="float-end btn btn-primary">Back</a>
                <h6 class="mb-4">Update <code>({{ $variantItem->name }})</code> variant item</h6>
                <form action="{{ route('admin.product-variant-item-update', $variantItem->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="" class="form-label">Name</label>
                        <input type="text" name="name" value="{{ $variantItem->name }}" class="form-control" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Price</label>
                        <input type="number" name="price" value="{{ $variantItem->price }}" class="form-control" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="">Is Default</label>
                        <select class="form-select" name="is_default">
                            <option value="">Select</option>
                            <option {{ $variantItem->is_default == 1 ? "selected" : ""  }} value="1">Yes</option>
                            <option {{ $variantItem->is_default == 0 ? "selected" : ""  }} value="0">No</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="">Status</label>
                        <select class="form-select" name="status">
                            <option value="">Select</option>
                            <option {{ $variantItem->status == 1 ? "selected" : ""  }} value="1">Active</option>
                            <option {{ $variantItem->status == 0 ? "selected" : ""  }} value="0">Inactive</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>


@endsection
