@extends('admin.layouts.master')

@section('title')
Dashboard - All Vouchers
@endsection

@section('contents')
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-md-12">
            <div class="bg-light rounded h-100 p-4">
                <a href="{{ route('admin.vouchers.create') }}" class="float-end btn btn-primary">Add Voucher</a>
                <h6 class="mb-4">All Vouchers</h6>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Name</th>
                            <th scope="col">Code</th>
                            <th scope="col">Discount</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($vouchers as $voucher)
                            <tr>
                                <th scope="row">{{ $voucher->id }}</th>
                                <td>{{ $voucher->name }}</td>
                                <td><code>{{ $voucher->code }}</code></td>
                                <td>{{ $voucher->discount }}</td>
                                <td>{{ $voucher->quantity }}</td>
                                <td>
                                    <a class="btn btn-warning" href="{{ route('admin.vouchers.edit', $voucher->id) }}">Edit</a>
                                    <a class="btn btn-danger deleteById" href="{{ route('admin.vouchers.destroy', $voucher->id) }}">Delete</a>
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

