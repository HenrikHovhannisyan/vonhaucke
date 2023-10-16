@extends('layouts.app')

@section('title')
    Home
@endsection

@section('content')
    @include("components.home-slider")
    <section id="partners">
        <div class="container">
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
@endsection
