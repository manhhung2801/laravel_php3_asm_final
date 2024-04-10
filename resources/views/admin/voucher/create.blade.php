@extends('admin.layouts.master')

@section('title')
Dashboard - Create Voucher
@endsection

@section('contents')
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-md-12">
            <div class="bg-light rounded h-100 p-4">
                <a href="{{ route('admin.vouchers.index') }}" class="float-end btn btn-primary">Back</a>
                <h6 class="mb-4">Create Voucher</h6>
                <form action="{{ route('admin.vouchers.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="" class="form-label">Name</label>
                        <input type="text" name="name" class="form-control" aria-describedby="emailHelp">
                        <div id="emailHelp" class="form-text">Enter name voucher...
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Discount</label>
                        <input type="number" name="discount" class="form-control"  aria-describedby="emailHelp">
                        <div id="emailHelp" class="form-text">Enter discount voucher...
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Quantiy</label>
                        <input type="number" name="quantity" class="form-control"  aria-describedby="emailHelp">
                        <div id="emailHelp" class="form-text">Enter quantity category...
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Create</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
