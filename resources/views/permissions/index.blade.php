@extends('master')
@section('content')
    <div class="row">
        @if(Session::has('message'))
            <div class="alert alert-success">{{ Session::get('message') }}</div>
        @endif
        <div class="col-md-12">
            <div class="d-flex justify-content-between align-items-center">
                <h4>Permissions</h4>
                <a href="{{ route('permissions.create') }}" class="btn btn-primary">Create Permission</a>
            </div>
            <table class="table table-bordered table-striped mt-3">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Guard Name</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($permissions as $permission)
                        <tr>
                            <td>{{ $permission->id }}</td>
                            <td>{{ $permission->name }}</td>
                            <td>{{ $permission->guard_name }}</td>
                            <td>{{ $permission->created_at }}</td>
                            <td>{{ $permission->updated_at }}</td>
                            <td>
                                <a href="{{ url('permission/'.$permission->id.'/edit') }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ url('permission/'.$permission->id) }}" method="POST" class="d-inline">
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

