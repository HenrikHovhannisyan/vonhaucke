@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Edit Product</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ route('products.index') }}"> Back</a>
                </div>
            </div>
        </div>
        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="col-12 col-md-6">
            <form action="{{ route('products.update',$product->id) }}" method="POST" enctype="multipart/form-data"
                  class="mt-3">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Name:</strong>
                            <input type="text" name="name" value="{{ $product->name }}" class="form-control"
                                   placeholder="Name">
                        </div>
                        <div class="form-group">
                            <strong>Description:</strong>
                            <textarea name="description" class="form-control" placeholder="Description">
                                {{ $product->description }}
                            </textarea>
                        </div>
                        <div class="form-group">
                            <strong>About:</strong>
                            <input type="text" name="about" value="{{ $product->about }}" class="form-control" placeholder="About">
                        </div>
                        <div class="form-group">
                            <strong>Characteristics:</strong>
                            <textarea name="characteristics" class="form-control" placeholder="Characteristics">
                                 {{ $product->characteristics }}
                            </textarea>
                        </div>
                    </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Category:</strong>
                            <select name="category_id" class="form-control">
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" @if($product->category_id == $category->id) selected @endif>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <strong>Image:</strong>
                            <input type="file" name="images[]" class="form-control" placeholder="image" multiple>
                            @foreach(json_decode($product->images) as $imagePath)
                                <img src="{{asset($imagePath)}}" width="300px" class="m-1">
                            @endforeach
                        </div>
                        <div class="form-group">
                            <strong>PDF:</strong>
                            @if ($product->pdf)
                                <a href="{{ asset($product->pdf) }}" class="text-dark" target="_blank">View Current PDF</a>
                                <br>
                            @endif
                            <input type="file" name="pdf" class="form-control" accept=".pdf">
                        </div>

                    </div>
                    <div class="col-12 mt-3 text-center">
                        <button type="submit" class="btn btn-primary">Edit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
