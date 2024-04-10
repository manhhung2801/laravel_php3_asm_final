@extends('admin.layouts.master')

@section('title')
Dashboard - Product Image Gallery
@endsection

@section('contents')
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-md-12">
            <div class="bg-light rounded h-100 p-4">
                <h6 class="mb-4">Add : Product <code>({{ $product->name }})</code> Image Gallery</h6>
                <form action="{{ route('admin.add-product-image-gallery') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="formFileMultiple" class="form-label">Can input one or multiple image</label>
                        <input class="form-control" type="file" name="image[]" multiple id="formFileMultiple">
                        <input type="hidden" name="product_id" value="{{ $product->id }}" >
                    </div>
                    <button type="submit" class="btn btn-primary">Add</button>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-md-12">
            <div class="bg-light rounded h-100 p-4">
                <h6 class="mb-4">All : Product <code>({{ $product->name }})</code> Image Gallery</h6>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Image</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($galleries as $gallery)
                            <tr>
                                <th scope="row">{{ $gallery->id }}</th>
                                <td>
                                    <img src="{{ asset('uploads/' . $gallery->image) }}" alt="{{ $product->name }}" width="80px" height="80px">
                                </td>
                                <td>
                                    <a class="btn btn-danger deleteById" href="{{ route('admin.delete-product-image-gallery', $gallery->id) }}">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>


@endsection
