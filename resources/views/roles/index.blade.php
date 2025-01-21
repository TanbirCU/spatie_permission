@extends('master')
@section('content')
    <div class="row">
        @if(Session::has('message'))
            <div class="alert alert-success">{{ Session::get('message') }}</div>
        @endif
        <div class="col-md-12">
            <div class="d-flex justify-content-between align-items-center">
                <h4>Roles</h4>
                <a href="{{ route('roles.create') }}" class="btn btn-primary">Create Roles</a>
            </div>
            <table class="table table-bordered table-striped mt-3">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Guard Name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($roles as $role)
                        <tr>
                            <td>{{ $role->id }}</td>
                            <td>{{ $role->name }}</td>
                            <td>{{ $role->guard_name }}</td>
                            <td>
                                <a href="{{ route('give_permission', $role->id) }}" class="btn btn-success btn-sm">Give Permission</a>
                                <a href="{{ url('/roles/'.$role->id.'/edit') }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ url('/roles/'.$role->id) }}" method="POST" class="d-inline">
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

