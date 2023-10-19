@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Partners</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-success" href="{{ route('partners.create') }}"> Create New Partner</a>
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

            @foreach ($partners as $partner)
                <tr>
                    <td>{{ ++$i }}</td>
                    <td>
                        <img src="{{asset('img/partners/'.$partner->image)}}" width="100px">
                    </td>
                    <td>{{ $partner->name }}</td>
                    <td>
                        <form action="{{ route('partners.destroy',$partner->id) }}" method="POST">
                            <a class="btn btn-success" href="{{ route('partners.show',$partner->id) }}">
                                <i class="fa-solid fa-eye"></i>
                            </a>
                            <a class="btn btn-primary" href="{{ route('partners.edit',$partner->id) }}">
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

        {!! $partners->links() !!}
    </div>
@endsection
