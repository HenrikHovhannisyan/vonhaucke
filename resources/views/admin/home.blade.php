@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Dashboard</div>
                    <div class="card-body">
                        <ol class="list-group list-group-numbered">
                            <li class="list-group-item d-flex justify-content-between align-items-start">
                                <div class="ms-2 me-auto">
                                    <a href="{{route('categories.index')}}" class="fw-bold text-dark text-decoration-none">
                                        Categories
                                    </a>
                                </div>
                                <span class="badge bg-primary rounded-pill">{{$countCategory}}</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-start">
                                <div class="ms-2 me-auto">
                                    <a href="{{route('categories.index')}}" class="fw-bold text-dark text-decoration-none">
                                        Products
                                    </a>
                                </div>
                                <span class="badge bg-primary rounded-pill">{{$countProduct}}</span>
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
