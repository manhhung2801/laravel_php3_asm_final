@extends('admin.layouts.master')

@section('title')
Dashboard - All Categories
@endsection

@section('contents')
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-md-12">
            <div class="bg-light rounded h-100 p-4">
                <a href="{{ route('admin.category.create') }}" class="float-end btn btn-primary">Add Category</a>
                <h6 class="mb-4">All Categories</h6>
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
                        @foreach($categories as $category)
                            <tr>
                                <th scope="row">{{ $category->id }}</th>
                                <td>{{ $category->name }}</td>
                                <td>
                                    <div class="form-check form-switch">
                                        <input class="form-check-input changeStatus" type="checkbox" data-id="{{ $category->id }}" value="{{ $category->status }}" role="switch" id="flexSwitchCheckChecked" {{ $category->status == 1 ? "checked" : "" }}>
                                    </div>
                                </td>
                                <td>
                                    <a class="btn btn-warning" href="{{ route('admin.category.edit', $category->id) }}">Edit</a>
                                    <a class="btn btn-danger deleteById" href="{{ route('admin.category.destroy', $category->id) }}">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $categories->links() }}
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

            /** Change Status category **/
            $('.changeStatus').on('click', function() {

                let id = $(this).data("id");
                let status = $(this).val();
                $.ajax({
                    type: "PUT",
                    url: "{{ route('admin.change-status-category') }}",
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

