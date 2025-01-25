@extends('master')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="d-flex justify-content-between align-items-center">
                <h4>Create Permission</h4>
                <a href="{{ route('roles.index') }}" class="btn btn-primary">Back</a>
            </div>
            <div class="role-container">
                <div class="role-header">
                    <h3>Role: <span class="role-name">{{ $role->name }}</span></h3>
                </div>
                <form action="{{ route('update_permission',$role->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="permissions-section">
                    <h4>Permissions</h4>
                    <div class="permissions-list">
                        @foreach ($permissions as $permission)
                            <label>
                            <input type="checkbox" name="permissions[]" value="{{ $permission->name }}"{{ in_array($permission->id,$rolePermissions) ? 'checked':'' }}>{{ $permission->name }}
                            </label>
                        @endforeach

                    </div>
                    </div>
                    <div class="action-buttons">
                    <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>

@endsection
