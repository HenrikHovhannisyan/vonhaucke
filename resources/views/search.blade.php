@extends('layouts.app')

@section('title')
    Search
@endsection

@section('content')

    <section id="search">
        @if(count($products) > 0)
            <section id="caetgory_products">
                <div class="container">
                    <div class="products_category">
                        @foreach($products as $product)
                            <div class="product_item mb-3">
                                @foreach(json_decode($product->images) as $key => $imagePath)
                                    @if ($key === 0)
                                        <div class="hover-show text-center">
                                            <img src="{{ asset($imagePath) }}"
                                                 class="img-fluid category_product_img" alt="">
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
        @else
            <div class="no_product">
                <h1>No products found.</h1>
            </div>
        @endif
    </section>

    @include('layouts.footer')
@endsection
