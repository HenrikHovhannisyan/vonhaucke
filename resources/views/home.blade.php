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
    <section id="all_products">
        <div class="container-fluid p-0 text-center">
            <h2 class="container product_title">All products</h2>
            <div class="container-fluid p-0">
                <div class="row m-0">
                    @foreach($categories as $category)
                        <div class="col-6 p-0 product_item all_product_item">
                            <div class="hover-show all_hover-show">
                                <img src="{{asset('img/categories/'.$category->image)}}"
                                     class="img-fluid all_product_img" alt="">
                                <div class="hover-show-button">
                                    <a href="{{ route('products-show',$category->id) }}">View</a>
                                </div>
                                <p class="all_product_name">{{$category->name}}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <section id="contact_us">
        <div id="contact">
            <div class="container">
                <div class="col-11 col-lg-5 col-md-7 col-sm-9">
                    <form id="container_form">
                        <div class="form-group contact_form_group">
                            <input type="number" name="nomber" class="form-control rounded-0" placeholder="Nomber"
                                   required>
                        </div>
                        <div class="form-group contact_form_group">
                            <input type="text" name="company" class="form-control rounded-0" placeholder="Company"
                                   required>
                        </div>
                        <div class="form-group contact_form_group">
                            <input type="email" name="mail" class="form-control rounded-0" placeholder="Mail" required>
                        </div>
                        <div class="form-group contact_form_group">
                            <input type="tel" name="phone" class="form-control rounded-0" placeholder="Phone" required>
                        </div>
                        <div class="form-group contact_form_group">
                            <select class="form-control rounded-0" name="type-information" required>
                                <option>Select type of information</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                            </select>
                        </div>
                        <div class="form-group contact_form_group">
                            <select class="form-control rounded-0" name="type-client" required>
                                <option>Select type of client</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                            </select>
                        </div>
                        <div class="form-group contact_form_group">
                            <textarea class="form-control rounded-0" name="message" rows="3"
                                      placeholder="Leave your message" required></textarea>
                        </div>
                        <div class="form-group text-end">
                            <button class="btn btn-contact_form">Send</button>
                        </div>
                    </form>
                </div>
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
