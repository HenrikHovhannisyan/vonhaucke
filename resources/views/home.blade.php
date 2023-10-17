@extends('layouts.app')

@section('title')
    Home
@endsection

@section('content')
    @include("components.home-slider")
    <section id="partners">
        <div class="container-fluid text-center">
            <div class="row">
                <div class="col-md-3 col-3">
                    <img src="{{asset('/img/partners/1.png')}}" class="img-fluid" alt="">
                </div>
                <div class="col-md-3 col-3">
                    <img src="{{asset('/img/partners/2.png')}}" class="img-fluid" alt="">
                </div>
                <div class="col-md-3 col-3">
                    <img src="{{asset('/img/partners/3.png')}}" class="img-fluid" alt="">
                </div>
                <div class="col-md-3 col-3">
                    <img src="{{asset('/img/partners/4.png')}}" class="img-fluid" alt="">
                </div>
            </div>
        </div>
    </section>
    <section id="video" class="mb-5">
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
@endsection

@section('script')
    <script>
        function playVideo() {
            let video = document.getElementById("custom-video");
            let playButton = document.getElementById("play-button");

            video.play();
            playButton.style.display = "none";
            video.addEventListener("ended", function() {
                playButton.style.display = "block";
            });
        }
    </script>
@endsection
