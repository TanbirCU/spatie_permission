@extends('master')
@section('content')
    <div class="row">
        @if(Session::has('message'))
            <div class="alert alert-success">{{ Session::get('message') }}</div>
        @endif
        <div class="col-md-12">
            <div class="d-flex justify-content-between align-items-center">
                <h4>users</h4>
                <a href="{{ route('users.create') }}" class="btn btn-primary">Create users</a>
            </div>
            <table class="table table-bordered table-striped mt-3">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Roles</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                @if(!empty($user->getRoleNames()))
                                    @foreach($user->getRoleNames() as $roleName)
                                        <label class="badge text-primary mx-1 fs-6">{{ $roleName }}</label>
                                    @endforeach
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                {{-- <a href="{{ route('users.destroy', $user->id) }}" class="btn btn-danger btn-sm">Delete</a> --}}
                                <form action="{{ route('users.destroy', $user->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this item?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection

