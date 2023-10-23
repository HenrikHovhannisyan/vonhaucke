@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Info</h2>
                </div>
            </div>
        </div>

        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif

        <table class="table table-bordered mt-3">
            @foreach ($infos as $info)
                <div class="row mt-3">
                    <div class="w-auto">
                        <ul class="list-group">
                            <li class="list-group-item">
                                <strong>Facebook:</strong>
                                <a href="{{ $info->facebook }}" target="_blank" class="text-danger">{{ $info->facebook }}</a>
                            </li>
                            <li class="list-group-item">
                                <strong>Instagram:</strong>
                                <a href="{{ $info->instagram }}" target="_blank" class="text-danger">{{ $info->instagram }}</a>
                            </li>
                            <li class="list-group-item">
                                <strong>Email:</strong>
                                <span class="">{{ $info->email }}</span>
                            </li>
                            <li class="list-group-item">
                                <strong>Phone1:</strong>
                                <span class="">{{ $info->phone1 }}</span>
                            </li>
                            <li class="list-group-item">
                                <strong>Phone2:</strong>
                                <span class="">{{ $info->phone2 }}</span>
                            </li>
                            <li class="list-group-item">
                                <strong>Address:</strong>
                                <span class="">{{ $info->address }}</span>
                            </li>
                            <li class="list-group-item text-end">
                                <form action="{{ route('info.destroy',$info->id) }}" method="POST">
                                    <a class="btn btn-primary" href="{{ route('info.edit',$info->id) }}">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                        Edit Info
                                    </a>
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
            @endforeach
        </table>

    </div>
@endsection
