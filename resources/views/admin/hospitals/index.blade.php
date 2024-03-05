@extends('layouts.app')
@section('content')
    <div class="container mt-5">
        <div class="row m-3">
            <div class="col-lg-12 text-center">
                <h2>Hospital</h2>
            </div>
            <div class="row ">
                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <a class="btn btn-primary p-2" href="{{ route('admin.home') }}">Home</a>
                    <a class="btn btn-success p-2" href="{{ route('admin.hospitals.create') }}">Create Hospital</a>
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
                    <th>image</th>
                    <th>is_active</th>
                    <th width="280px">action</th>
                </tr>
                @foreach ($hospitals as $Hospital)
                    <tr>
                        <td>{{ $Hospital->id }}</td>
                        <td>{{ $Hospital->name }}</td>
                        <td>{{ $Hospital->address }}</td>
                        <td>{{ $Hospital->telephone }}</td>
                        <td>{{ $Hospital->map }}</td>
                        <td>{{ $Hospital->image }}</td>
                        <td>{{ $Hospital->is_active }}</td>
                        <td>
                            <form action="{{route('hospitals.destroy',$Hospital->id)}}" method="POST">
                        <a href="{{route('admin.hospitals.edit',$Hospital->id)}}" class="btn btn-warning">Edit</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                        </td>
                    </tr>
                @endforeach

            </table>
            {!! $hospitals->links('pagination::bootstrap-5') !!}
        </div>
    </div>
@endsection
