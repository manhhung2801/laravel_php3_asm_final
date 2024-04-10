@extends('admin.layouts.master')

@section('title')
Dashboard - Update Voucher
@endsection

@section('contents')
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-md-12">
            <div class="bg-light rounded h-100 p-4">
                <a href="{{ route('admin.vouchers.index') }}" class="float-end btn btn-primary">Back</a>
                <h6 class="mb-4">Update Voucher</h6>
                <p class="mb-5">Code: <code>{{ $voucher->code }}</code></p>
                <form action="{{ route('admin.vouchers.update', $voucher->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3 mt-3">
                        <label for="" class="form-label">Name</label>
                        <input type="text" name="name" value="{{ $voucher->name }}" class="form-control" aria-describedby="emailHelp">
                        <div id="emailHelp" class="form-text">Enter name voucher...
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Discount</label>
                        <input type="number" name="discount" value="{{ $voucher->discount }}" class="form-control"  aria-describedby="emailHelp">
                        <div id="emailHelp" class="form-text">Enter discount voucher...
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Quantiy</label>
                        <input type="number" name="quantity" value="{{ $voucher->quantity }}"  class="form-control"  aria-describedby="emailHelp">
                        <div id="emailHelp" class="form-text">Enter quantity category...
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
