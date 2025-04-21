@extends('master')

@section('content')
<div class="container">
    <h1>Create Product</h1>
    <form action="{{ route('products.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="product_name">Product Name</label>
            <input type="text" name="name" id="name" class="form-control" placeholder="Enter product name" required>
        </div>
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" id="title" class="form-control" placeholder="Enter title" required>
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" id="description" class="form-control" placeholder="Enter description" rows="4" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Create Product</button>
    </form>
</div>
@endsection
