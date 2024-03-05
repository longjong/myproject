@extends('layouts.appadmin')
@section('content')
    <div class="container mt-5">
        <div class="row m-3">
            <div class="col-lg-12 text-center">
                <h2>Otop Shirts</h2>
            </div>
            <div class="row ">
                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <a class="btn btn-primary p-2" href="{{ route('admin.home') }}">Home</a>
                    <a class="btn btn-success p-2" href="{{ route('admin.otshirts.create') }}">Create Otopfood</a>
                </div>
            </div>
            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif

            <table class="table table-bordered mt-4">
                <tr>
                    <th>No.</th>
                    <th>name</th>
                    <th>description</th>
                    <th>image</th>
                    <th>price</th>
                    <th>is_active</th>
                    <th width="280px">action</th>
                </tr>
                @foreach ($otshirts as $Ots)
                    <tr>
                        <td>{{ $Ots->id }}</td>
                        <td>{{ $Ots->name }}</td>
                        <td>{{ $Ots->description }}</td>
                        <td>{{ $Ots->image }}</td>
                        <td>{{ $Ots->price }}</td>
                        <td>{{ $Ots->is_active }}</td>
                        <td>
                            <form action="{{ route('otshirts.destroy', $Ots->id) }}" method="POST">
                                <a href="{{ route('admin.otshirts.edit', $Ots->id) }}" class="btn btn-warning">Edit</a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </table>
            {!! $otshirts->links('pagination::bootstrap-5') !!}
        </div>
    </div>
@endsection
