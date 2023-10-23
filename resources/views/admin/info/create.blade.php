@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Add New Info</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ route('info.index') }}"> Back</a>
                </div>
            </div>
        </div>

        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="col-12 col-md-6">
            <form action="{{ route('info.store') }}" method="POST" enctype="multipart/form-data" class="mt-3">
                @csrf
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <strong>Facebook:</strong>
                            <input type="text" name="facebook" class="form-control" placeholder="Facebook">
                        </div>
                        <div class="form-group">
                            <strong>Instagram:</strong>
                            <input type="text" name="instagram" class="form-control" placeholder="Instagram">
                        </div>
                        <div class="form-group">
                            <strong>Email:</strong>
                            <input type="email" name="email" class="form-control" placeholder="Email">
                        </div>
                        <div class="form-group">
                            <strong>Phone1:</strong>
                            <input type="tel" name="phone1" class="form-control" placeholder="Phone1">
                        </div>
                        <div class="form-group">
                            <strong>Phone2:</strong>
                            <input type="tel" name="phone2" class="form-control" placeholder="Phone2">
                        </div>
                        <div class="form-group">
                            <strong>Address:</strong>
                            <textarea type="tel" name="address" class="form-control" placeholder="Address"></textarea>
                        </div>
                    </div>
                    <div class="col-12 text-center mt-3">
                        <button type="submit" class="btn btn-success">Add</button>
                    </div>
                </div>
            </form>
        </div>

    </div>
@endsection
