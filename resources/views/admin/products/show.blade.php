@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2> Show Category</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ route('products.index') }}"> Back</a>
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-12">
                <div class="form-group">
                    <strong>Name:</strong>
                    <p class="h3">{{ $product->name }}</p>
                </div>
                <div class="form-group">
                    <strong>Description:</strong>
                    <p class="h3">{{ $product->description }}</p>
                </div>
                <div class="form-group">
                    <strong>About:</strong>
                    <p class="h3">{{ $product->about }}</p>
                </div>
                <div class="form-group">
                    <strong>Characteristics:</strong>
                    <p class="h3">{{ $product->characteristics }}</p>
                </div>
                <div class="form-group">
                    <strong>PDF:</strong>
                    <p class="h3">
                        <a href="{{ asset($product->pdf) }}" class="text-dark" target="_blank">View File</a>
                    </p>
                </div>
            </div>
            <div class="col-12">
                <div class="form-group">
                    <strong>Image:</strong>
                    <div class="col-12 col-md-6">
                        @foreach(json_decode($product->images) as $imagePath)
                            <img src="{{asset($imagePath)}}" width="300px" class="m-1">
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
