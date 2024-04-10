@extends('admin.layouts.master')

@section('title')
Dashboard - All User and All Admin Accounts
@endsection

@section('contents')
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-md-12">
            <div class="bg-light rounded h-100 p-4">
                <h6 class="mb-4">All Admin Accounts</h6>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Role</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($adminsAccount as $user)
                            <tr>
                                <th class="userId" scope="row">{{ $user->id }}</th>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    <div class="form-check form-switch">
                                        <label class="form-check-label {{ $user->role === "admin" ?  "badge bg-danger" : "badge bg-success" }}" for="flexSwitchCheckChecked">{{ $user->role }}</label>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-check form-switch">
                                        <input class="form-check-input changeStatus" type="checkbox" data-id="{{ $user->id }}" value="{{ $user->status }}" role="switch" id="flexSwitchCheckChecked" {{ $user->status === "active" ? "checked" : "" }}>
                                    </div>
                                </td>
                                <td>
                                    <button class="btn btn-danger deleteUser" data-deletebyid="{{ $user->id }}">Delete</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>

<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-md-12">
            <div class="bg-light rounded h-100 p-4">
                <h6 class="mb-4">All User Accounts</h6>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Role</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                            <tr>
                                <th class="userId" scope="row">{{ $user->id }}</th>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    <div class="form-check form-switch">
                                        <label class="form-check-label {{ $user->role === "admin" ?  "badge bg-danger" : "badge bg-success" }}" for="flexSwitchCheckChecked">{{ $user->role }}</label>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-check form-switch">
                                        <input class="form-check-input changeStatus" type="checkbox" data-id="{{ $user->id }}" value="{{ $user->status }}" role="switch" id="flexSwitchCheckChecked" {{ $user->status === "active" ? "checked" : "" }}>
                                    </div>
                                </td>
                                <td>
                                    <a class="btn btn-danger deleteById" href="{{ route('admin.delete-user', $user->id) }}">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $users->links() }}
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
                    url: "{{ route('admin.change-status-user') }}",
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
