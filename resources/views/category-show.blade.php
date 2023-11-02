@extends('layouts.app')
@section('title')
    {{$category->name}}
@endsection
@section('content')
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-element-bundle.min.js"></script>
    <section id="category_show">
        @if($category->id === 4)
            <div class="banner_category"
                 style="background: url('{{asset('./img/category-show/desks.png')}}') center no-repeat;">
                <div class="container">
                    <div class="banner-content">
                        <h2>{{$category->name}}</h2>
                        <p>Aesthetic and productive designs.</p>
                    </div>
                </div>
            </div>
        @endif
        @if($category->id === 3)
            <div class="banner_category"
                 style="background: url('{{asset('./img/category-show/loover.png')}}') center no-repeat;">
                <div class="container">
                    <div class="banner-content">
                        <h2>{{$category->name}}</h2>
                        <p>Aesthetic and productive designs.</p>
                    </div>
                </div>
            </div>
        @endif
        @if($category->id === 2)
            <div class="banner_category"
                 style="background: url('{{asset('./img/category-show/workspaces.png')}}') center no-repeat;">
                <div class="container">
                    <div class="banner-content">
                        <h2>{{$category->name}}</h2>
                        <p>Сreate your comfort and aesthetics with us,</p>
                    </div>
                </div>
            </div>
        @endif
        @if($category->id === 1)
            <div class="banner_category"
                 style="background: url('{{asset('./img/category-show/tables.png')}}') center no-repeat;">
                <div class="container">
                    <div class="banner-content">
                        <h2>{{$category->name}}</h2>
                        <p>Aesthetic and productive designs.</p>
                    </div>
                </div>
            </div>
        @endif
    </section>
    <section id="caetgory_products">
        <div class="container">
            <div class="products_category">
                @foreach($products as $product)
                    <div class="product_item mb-3">
                        @foreach(json_decode($product->images) as $key => $imagePath)
                            @if ($key === 0)
                                <div class="hover-show text-center">
                                    <img src="{{ asset($imagePath) }}" class="img-fluid category_product_img" alt="">
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
    @include('layouts.footer')
@endsection
