@extends('admin.layouts.master')

@section('title')
Dashboard - Create Category
@endsection

@section('contents')
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-md-12">
            <div class="bg-light rounded h-100 p-4">
                <h6 class="mb-4">Create Category</h6>
                <form action="{{ route('admin.category.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Name</label>
                        <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        <div id="emailHelp" class="form-text">Enter name category...
                        </div>
                    </div>
                    <div class="form-floating mb-3">
                        <select class="form-select" name="status">
                            <option value="" selected>Select</option>
                            <option value="1">Active</option>
                            <option value="0">Inactive</option>
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
