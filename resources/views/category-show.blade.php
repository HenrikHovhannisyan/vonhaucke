@extends('layouts.app')
@section('title')
    {{$category->name}}
@endsection
@section('content')
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-element-bundle.min.js"></script>
    <section id="category_show">
        @if($category->id === 4)
            <div class="banner_category"
                 style="background: url('{{asset('./img/category-show/desks.png')}}') center/cover no-repeat;">
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
                 style="background: url('{{asset('./img/category-show/loover.png')}}') center/cover no-repeat;">
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
                 style="background: url('{{asset('./img/category-show/workspaces.png')}}') center/cover no-repeat;">
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
                 style="background: url('{{asset('./img/category-show/tables.png')}}') center/cover no-repeat;">
                <div class="container">
                    <div class="banner-content">
                        <h2>{{$category->name}}</h2>
                        <p>Aesthetic and productive designs.</p>
                    </div>
                </div>
            </div>
        @endif
    </section>
    @include('layouts.footer')
@endsection
