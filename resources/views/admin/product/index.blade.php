@extends('admin.layouts.master')

@section('title')
Dashboard - All Product
@endsection

@section('contents')
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-md-12">
            <div class="bg-light rounded h-100 p-4">
                <a href="{{ route('admin.product.create') }}" class="float-end btn btn-primary">Add Product</a>
                <h6 class="mb-4">All Product</h6>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Name Product</th>
                            <th scope="col">Category Name</th>
                            <th scope="col">Image</th>
                            <th scope="col">Price</th>
                            <th scope="col">Offer Price</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($products as $product)
                            <tr>
                                <th scope="row">{{ $product->id }}</th>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->category->name }}</td>
                                <td>
                                    <img src="{{ asset('uploads/' . $product->thumb_image) }}" alt="{{ $product->name }}" width="80px" height="80px">
                                </td>
                                <td>{{ $product->price }}</td>
                                <td>{{ $product->offer_price }}</td>
                                <td>
                                    <div class="form-check form-switch">
                                        <input class="form-check-input changeStatus" type="checkbox" data-id="{{ $product->id }}" value="{{ $product->status }}" role="switch" id="flexSwitchCheckChecked" {{ $product->status == 1 ? "checked" : "" }}>
                                    </div>
                                </td>
                                <td class="d-flex flex-row bd-highlight">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                          settings
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-end">
                                          <li><a class="dropdown-item" href="{{ route('admin.product-image-gallery', $product->id) }}">Images Gallery</a></li>
                                          <li><a class="dropdown-item" href="{{ route('admin.product-variant', $product->id ) }}">Variant</a></li>
                                        </ul>
                                      </div>

                                    <a class="btn btn-warning ms-1" href="{{ route('admin.product.edit', $product->id) }}">Edit</a>
                                    <a class="btn btn-danger ms-1 deleteById" href="{{ route('admin.product.destroy', $product->id) }}">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $products->links() }}
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
                    url: "{{ route('admin.change-status-product') }}",
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

