@extends('layouts.appadmin')
@section('content')
    <div class="container mt-5">
        <div class="row m-3">
            <div class="col-lg-12 text-center">
                <h2>Halal</h2>
            </div>
            <div class="row ">
                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <a class="btn btn-primary p-2" href="{{ route('admin.home') }}">Home</a>
                    <a class="btn btn-success p-2" href="{{ route('admin.halals.create') }}">Create Halal</a>
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
                    <th>Name</th>
                    <th>address</th>
                    <th>Telephone</th>
                    <th>map</th>
                    <th>rating</th>
                    <th>image</th>
                    <th>is_active</th>
                    <th width="280px">action</th>
                </tr>
                @foreach ($halals as $Halal)
                    <tr>
                        <td>{{ $Halal->id }}</td>
                        <td>{{ $Halal->name }}</td>
                        <td>{{ $Halal->address }}</td>
                        <td>{{ $Halal->telephone }}</td>
                        <td>{{ $Halal->map }}</td>
                        <td>{{ $Halal->rating }}</td>
                        <td>{{ $Halal->image }}</td>
                        <td>{{ $Halal->is_active }}</td>
                        <td>
                            <form action="{{route('halals.destroy',$Halal->id)}}" method="POST">
                        <a href="{{route('admin.halals.edit',$Halal->id)}}" class="btn btn-warning">Edit</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                        </td>
                    </tr>
                @endforeach

            </table>
            {!! $halals->links('pagination::bootstrap-5') !!}
        </div>
    </div>
@endsection
