@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Sliders</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-success" href="{{ route('sliders.create') }}"> Create New Slider Item</a>
                </div>
            </div>
        </div>

        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif

        <table class="table table-bordered mt-3">
            <tr>
                <th>No</th>
                <th>Image</th>
                <th>Title</th>
                <th>Description</th>
                <th width="280px">Action</th>
            </tr>

            @foreach ($sliders as $slider)
                <tr>
                    <td>{{ ++$i }}</td>
                    <td>
                        <img src="{{asset('img/sliders/'.$slider->image)}}" width="100px">
                    </td>
                    <td>{{ $slider->title }}</td>
                    <td>{{ $slider->description }}</td>
                    <td>
                        <form action="{{ route('sliders.destroy',$slider->id) }}" method="POST">
                            <a class="btn btn-success" href="{{ route('sliders.show',$slider->id) }}">
                                <i class="fa-solid fa-eye"></i>
                            </a>
                            <a class="btn btn-primary" href="{{ route('sliders.edit',$slider->id) }}">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">
                                <i class="fa-solid fa-trash-can"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>

        {!! $sliders->links() !!}
    </div>
@endsection
