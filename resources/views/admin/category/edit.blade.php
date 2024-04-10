@extends('admin.layouts.master')

@section('title')
Dashboard - Edit Category
@endsection

@section('contents')
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-md-12">
            <div class="bg-light rounded h-100 p-4">
                <h6 class="mb-4">Update Category</h6>
                <form action="{{ route('admin.category.update', $category->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Name</label>
                        <input type="text" name="name" class="form-control" value="{{ $category->name }}" aria-describedby="emailHelp">
                        <div id="emailHelp" class="form-text">Enter name category...
                        </div>
                    </div>
                    <div class="form-floating mb-3">
                        <select class="form-select" name="status">
                            <option value="">Select</option>
                            <option {{ $category->status == 1 ? "selected" : ""  }} value="1">Active</option>
                            <option {{ $category->status == 0 ? "selected" : ""  }} value="0">Inactive</option>
                        </select>
                        <label for="floatingSelect">Choose Status</label>
                    </div>
                    <button type="submit" class="btn btn-primary">Create</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
