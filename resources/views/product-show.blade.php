@extends('layouts.app')
@section('title')
    {{$product->name}}
@endsection
@section('content')
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-element-bundle.min.js"></script>

    <section id="banner">
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
    <section id="about">
        <div class="container mt-3">
            <div class="row">
                <div class="col-12 col-md-5 d-flex align-items-center">
                    <div>
                        <h2 class="about_title">About</h2>
                        @foreach(json_decode($product->images) as $index => $imagePath)
                            @if($index === 0)
                                <img src="{{ asset($imagePath) }}" class="banner_image">
                            @endif
                        @endforeach
                    </div>
                </div>
                <div class="col-12 col-md-7">
                    <div class="about_info">
                        <p class="about_info_description">{{ $product->description }}</p>
                        <p class="characteristics_title">Characteristics</p>
                        <ul class="ps-0">
                            @foreach ($lines as $line)
                                <li class="about_info_item">{{ $line }}</li>
                            @endforeach
                        </ul>
                        <a href="{{ asset($product->pdf) }}" class="download_pdf" target="_blank">
                            <i class="fa-solid fa-download"></i>
                            Download PDF
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="gallery">
        <div class="container text-center">
            <h2>Gallery</h2>
            <div class="swiper swiper_about">
                <div class="swiper-wrapper">
                    @foreach(json_decode($product->images) as $imagePath)
                        <div class="swiper-slide">
                            <img src="{{asset($imagePath)}}" class="img-fluid">
                        </div>
                    @endforeach
                </div>
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </section>
    <section id="products">
        <div class="container text-center mb-5">
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
    @include('layouts.footer')
@endsection
