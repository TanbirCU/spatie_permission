@extends('master')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="d-flex justify-content-between align-items-center">
                <h4>Create Permission</h4>
                <a href="{{ route('users.index') }}" class="btn btn-primary">Back</a>
            </div>
            <form action="{{ route('users.store') }}" method="POST" class="mt-3">
                @csrf
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}">
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    <label for="email">Email</label>
                    <input type="text" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}">
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    <label for="password">Password</label>
                    <input type="text" name="password" id="password" class="form-control @error('password') is-invalid @enderror" value="{{ old('name') }}">
                    @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    <label for="roles">Roles</label>
                    <select name="roles[]" id="roles" class="form-control @error('roles') is-invalid @enderror" multiple>
                        @foreach($roles as $role)
                            <option value="{{ $role->id }}">{{ $role->name }}</option>
                        @endforeach
                    </select>
                    @error('roles')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group mt-2">
                    <button type="submit">Submit</button>
                </div>
            </form>
@endsection
