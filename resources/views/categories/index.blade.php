@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Categories</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-success" href="{{ route('categories.create') }}"> Create New Category</a>
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
                <th>Name</th>
                <th width="280px">Action</th>
            </tr>

            @foreach ($categories as $category)
                <tr>
                    <td>{{ ++$i }}</td>
                    <td>
                        <img src="{{asset('img/categories/'.$category->image)}}" width="100px">
                    </td>
                    <td>{{ $category->name }}</td>
                    <td>
                        <form action="{{ route('categories.destroy',$category->id) }}" method="POST">
                            <a class="btn btn-success" href="{{ route('categories.show',$category->id) }}">
                                <i class="fa-solid fa-eye"></i>
                            </a>
                            <a class="btn btn-primary" href="{{ route('categories.edit',$category->id) }}">
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

        {!! $categories->links() !!}
    </div>
@endsection
