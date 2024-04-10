@extends('admin.layouts.master')

@section('title')
Dashboard - Product Variants
@endsection

@section('contents')
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-md-12">
            <div class="bg-light rounded h-100 p-4">
                <a href="{{ route('admin.product-variant-create', $product->id) }}" class="float-end btn btn-primary">Add Variant</a>
                <h6 class="mb-4">All : Product <code>({{ $product->name }})</code> Variant</h6>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Name</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($variants as $variant)
                            <tr>
                                <th scope="row">{{ $variant->id }}</th>
                                <th scope="row">{{ $variant->name }}</th>
                                <td>
                                    <div class="form-check form-switch">
                                        <input class="form-check-input changeStatus" type="checkbox" data-id="{{ $variant->id }}" value="{{ $variant->status }}" role="switch" id="flexSwitchCheckChecked" {{ $variant->status == 1 ? "checked" : "" }}>
                                    </div>
                                </td>
                                <td>
                                    <a class="btn btn-info ms-1" href="{{ route("admin.product-variant-item", $variant->id) }}">Variant Items</a>
                                    <a class="btn btn-warning ms-1" href="{{ route('admin.product-variant-edit', $variant->id) }}">Edit</a>
                                    <a class="btn btn-danger ms-1 deleteById" href="{{ route("admin.product-variant-delete", $variant->id) }}">Delete</a>
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


@push('scripts')
    <script>
        $(document).ready(function() {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            /** Change Status user account active or inactive **/
            $('.changeStatus').on('click', function() {

                let id = $(this).data("id");
                let status = $(this).val();
                $.ajax({
                    type: "PUT",
                    url: "{{ route('admin.change-status-product-variant') }}",
                    data: {
                        id: id,
                        status: status
                    },
                    dataType: "json",
                    success: function (reponse) {
                        toastr.success(reponse.message);
                    },
                    error: function (xhr, status, error) {
                        console.log(error);
                    }
                });
            });

        });
    </script>
@endpush
