@extends('master')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h3>Product Details</h3>
        </div>
        <div class="card-body">
            <div class="row mb-3">
                <div class="col-md-4">
                    <img src="" alt="{{ $product->name }}" class="img-fluid">
                </div>
                <div class="col-md-8">
                    <h4>{{ $product->name }}</h4>
                    <p><strong>Title:</strong> {{ $product->title }}</p>
                    <p><strong>Description:</strong> {{ $product->description }}</p>
                    <p><strong>Created At:</strong> {{ $product->created_at->format('d M Y') }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
