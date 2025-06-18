@extends('master')
@section('content')
    @if(Session::has('message'))
        <div class="alert alert-success">{{ Session::get('message') }}</div>
    @endif
<div class="container">
    <h1>Product List</h1>
    @can('create role')
            <a href="{{ route('products.create') }}" class="btn btn-primary mb-3">Add Product</a>
    @endcan
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Product Name</th>
                <th>Title</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->title }}</td>
                    <td>{{ $product->description }}</td>
                    <td>
                        @can('edit role')

                         <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        @endcan
                        @can('view role')
                            <a href="{{ route('products.show', $product->id) }}" class="btn btn-warning btn-sm">Show</a>
                        @endcan
                        <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
