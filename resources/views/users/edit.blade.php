@extends('master')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="d-flex justify-content-between align-items-center">
                <h4>Edit User</h4>
                <a href="{{ route('users.index') }}" class="btn btn-primary">Back</a>
            </div>

            <form action="{{ route('users.update', $user->id) }}" method="POST" class="mt-3">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name"
                           class="form-control @error('name') is-invalid @enderror"
                           value="{{ old('name', $user->name) }}" placeholder="Enter name">
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group mt-2">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email"
                           class="form-control @error('email') is-invalid @enderror"
                           value="{{ old('email', $user->email) }}" placeholder="Enter email">
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group mt-2">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password"
                           class="form-control @error('password') is-invalid @enderror"
                           placeholder="Leave blank to keep the current password">
                    @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group mt-2">
                    <label for="roles">Roles</label>
                    <select name="roles[]" id="roles" class="form-control @error('roles') is-invalid @enderror" multiple>
                        @foreach($roles as $role)
                            <option value="{{ $role->id }}" {{ in_array($role->id, $userRoles) ? 'selected' : '' }}>{{ $role->name }}</option>
                        @endforeach
                    </select>
                    @error('roles')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group mt-3">
                    <button type="submit" class="btn btn-success">Update</button>
                </div>
            </form>
        </div>
    </div>
@endsection
