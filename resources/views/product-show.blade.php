@extends('layouts.app')

@section('content')
        <section>
            <div class="banner mt-2">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 order-2 order-md-1 d-flex align-items-center">
                            <div>
                                <h3 class="banner_title">
                                    {{ $product->name }}
                                </h3>
                                <p class="banner_description">
                                    {{ $product->description }}
                                </p>
                                <div class="share">
                                    <span>Share</span>
                                    <a href="" class="ms-1">
                                        <i class="fa-brands fa-facebook"></i>
                                    </a>
                                    <a href="" class="ms-1">
                                        <i class="fa-brands fa-twitter"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 order-1 order-md-2">
                            @foreach(json_decode($product->images) as $index => $imagePath)
                                @if($index === 0)
                                    <img src="{{ asset($imagePath) }}" class="banner_image">
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section id="products">
            <div class="container text-center">
                <h2 class="product_title">Other products</h2>
                <div class="products">
                    @foreach($products as $product)
                        <div class="product_item">
                            @foreach(json_decode($product->images) as $key => $imagePath)
                                @if ($key === 0)
                                    <div class="hover-show">
                                        <img src="{{ asset($imagePath) }}" class="img-fluid product_img" alt="">
                                        <div class="hover-show-button">
                                            <a href="{{ route('products-show',$product->id) }}">View</a>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                            <p class="product_name">{{$product->name}}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

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


                        {{--                        @foreach(json_decode($product->images) as $imagePath)--}}
                        {{--                            <img src="{{asset($imagePath)}}" width="300px" class="m-1">--}}
                        {{--                        @endforeach--}}
                    </div>
                </div>
            </div>
        </div>
@endsection
