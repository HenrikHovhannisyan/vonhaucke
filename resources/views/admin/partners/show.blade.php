@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2> Show Partner</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ route('partners.index') }}"> Back</a>
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-12">
                <div class="form-group">
                    <strong>Name:</strong>
                    <span class="h3">{{ $partner->name }}</span>
                </div>
            </div>
            <div class="col-12">
                <div class="form-group">
                    <strong>Image:</strong>
                    <div class="col-12 col-md-6">
                        <img src="{{asset('img/partners/'.$partner->image)}}" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
