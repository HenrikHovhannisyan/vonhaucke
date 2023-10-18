@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Show Slider</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ route('sliders.index') }}"> Back</a>
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-12">
                <div class="form-group">
                    <strong>Title:</strong>
                    <span class="h3">{{ $slider->title }}</span>
                </div>
                <div class="form-group">
                    <strong>Description:</strong>
                    <span class="h3">{{ $slider->description }}</span>
                </div>
            </div>
            <div class="col-12">
                <div class="form-group">
                    <strong>Image:</strong>
                    <div class="col-12 col-md-6">
                        <img src="{{asset('img/sliders/'.$slider->image)}}" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
