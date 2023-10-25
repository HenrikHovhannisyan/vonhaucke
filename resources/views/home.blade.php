@extends('layouts.app')

@section('title')
    Home
@endsection

@section('content')
    <section id="slider">
        <div class="container-fluid ps-0 pe-0">
            <div class="swiper mySwiper_slider">
                <div class="swiper-wrapper">
                    @foreach($sliders as $slider)
                        <div class="swiper-slide">
                           <span>
                               <span class="slider_text_container">
                                   <h3 class="slider_text_title">{{$slider->title}}</h3>
                                    <p class="slider_text_description">
                                        {{$slider->description}}
                                    </p>
                               </span>
                               <img src="{{asset("./img/sliders/" . $slider->image)}}" alt="" class="img-fluid">
                           </span>
                        </div>
                    @endforeach
                </div>
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </section>
    <section id="partners">
        <div class="container-fluid text-center">
            <div class="row align-items-center">
                @foreach($partners as $partner)
                    <div class="col-md-3 col-3">
                        <img src="{{asset('/img/partners/' . $partner->image)}}" class="img-fluid" alt="">
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <section id="video">
        <div class="container-fluid ps-0 pe-0">
            <div class="video-container">
                <video id="custom-video" width="100%" controls>
                    <source src="{{asset('/videos/1.mp4')}}" type="video/mp4">
                </video>
                <button id="play-button" onclick="playVideo()">
                    <i class="fa-solid fa-play"></i>
                </button>
            </div>
        </div>
    </section>
    <section id="products">
        <div class="container text-center">
            <h2 class="product_title">Popular products</h2>
            <div class="products">
                @foreach($products as $product)
                    <div class="product_item">
                        @foreach(json_decode($product->images) as $key => $imagePath)
                            @if ($key === 0)
                                <img src="{{ asset($imagePath) }}" class="img-fluid product_img" alt="">
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

@section('script')
    <script>
        function playVideo() {
            let video = document.getElementById("custom-video");
            let playButton = document.getElementById("play-button");

            video.play();
            playButton.style.display = "none";
            video.addEventListener("ended", function () {
                playButton.style.display = "block";
            });
        }
    </script>
@endsection
