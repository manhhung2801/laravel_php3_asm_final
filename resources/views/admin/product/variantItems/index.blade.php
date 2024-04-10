@extends('admin.layouts.master')

@section('title')
Dashboard -  Variant Items
@endsection

@section('contents')
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-md-12">
            <div class="bg-light rounded h-100 p-4">
                <a href="{{ route('admin.product-variant-item-create', $variant->id) }}" class="float-end btn btn-primary">Add Item</a>
                <h6 class="mb-4">All <code>({{ $variant->name }})</code> Items</h6>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Name</th>
                            <th scope="col">Price</th>
                            <th scope="col">Default</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($variantItem as $item)
                            <tr>
                                <th scope="row">{{ $item->id }}</th>
                                <th scope="row">{{ $item->name }}</th>
                                <th scope="row">{{ $item->price }}</th>
                                <th scope="row">
                                    @if($item->is_default == 1)
                                        <span class="badge bg-primary rounded-pill">Defult</span>
                                    @elseif ($item->is_default == 0)
                                        <span class="badge bg-secondary rounded-pill">Not defult</span>
                                    @endif
                                </th>
                                <td>
                                    <div class="form-check form-switch">
                                        <input class="form-check-input changeStatus" type="checkbox" data-id="{{ $item->id }}" value="{{ $item->status }}" role="switch" id="flexSwitchCheckChecked" {{ $item->status == 1 ? "checked" : "" }}>
                                    </div>
                                </td>
                                <td>
                                    <a class="btn btn-warning ms-1" href="{{ route('admin.product-variant-item-edit', $item->id) }}">Edit</a>
                                    <a class="btn btn-danger ms-1 deleteById" href="{{ route('admin.product-variant-item-delete', $item->id) }}">Delete</a>
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
                    url: "{{ route('admin.change-status-product-variant-item') }}",
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
