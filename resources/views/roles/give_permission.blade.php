@extends('master')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="d-flex justify-content-between align-items-center">
                <h4>Create Permission</h4>
                <a href="{{ route('roles.index') }}" class="btn btn-primary">Back</a>
            </div>
            <form action="" method="POST" class="mt-3">
                @csrf
                {{-- <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}">
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div> --}}
                <div class="role-container">
                    <div class="role-header">
                      <h3>Role: <span class="role-name">super-admin</span></h3>
                      <a href="#" class="btn btn-danger back-btn">Back</a>
                    </div>
                    <form action="#" method="POST">
                      <div class="permissions-section">
                        <h4>Permissions</h4>
                        <div class="permissions-list">
                          <label>
                            <input type="checkbox" name="permissions[]" value="create role"> Create Role
                          </label>
                          <label>
                            <input type="checkbox" name="permissions[]" value="view role" checked> View Role
                          </label>
                          <label>
                            <input type="checkbox" name="permissions[]" value="edit role" checked> Edit Role
                          </label>
                          <label>
                            <input type="checkbox" name="permissions[]" value="delete role" checked> Delete Role
                          </label>
                        </div>
                      </div>
                      <div class="action-buttons">
                        <button type="submit" class="btn btn-primary">Update</button>
                      </div>
                    </form>
                  </div>


                
            </form>
@endsection
