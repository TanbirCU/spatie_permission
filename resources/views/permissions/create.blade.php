@extends('master')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="d-flex justify-content-between align-items-center">
                <h4>Create Permission</h4>
                <a href="{{ route('permissions.index') }}" class="btn btn-primary">Back</a>
            </div>
            <form action="{{ route('permissions.store') }}" method="POST" class="mt-3">
                @csrf
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}">
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group mt-2">
                    <button type="submit">Submit</button>
                </div>
            </form>
@endsection
