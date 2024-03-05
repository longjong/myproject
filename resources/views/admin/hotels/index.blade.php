@extends('layouts.appadmin')
@section('content')
    <div class="container mt-5">
        <div class="row m-3">
            <div class="col-lg-12 text-center">
                <h2>Hotel</h2>
            </div>
            <div class="row ">
                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <a class="btn btn-primary p-2" href="{{ route('admin.home') }}">Home</a>
                    <a class="btn btn-success p-2" href="{{ route('admin.hotels.create') }}">Create Hotel</a>
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
                    <th>address</th>
                    <th>telephone</th>
                    <th>map</th>
                    <th>rating</th>
                    <th>image</th>
                    <th>is_active</th>
                    <th width="280px">action</th>
                </tr>
                @foreach ($hotels as $Hotel)
                    <tr>
                        <td>{{ $Hotel->id }}</td>
                        <td>{{ $Hotel->name }}</td>
                        <td>{{ $Hotel->address }}</td>
                        <td>{{ $Hotel->telephone}}</td>
                        <td>{{ $Hotel->map}}</td>
                        <td>{{ $Hotel->rating}}</td>
                        <td>{{ $Hotel->image}}</td>
                        <td>{{ $Hotel->is_active }}</td>
                        <td>
                            <form action="{{ route('hotels.destroy', $Hotel->id) }}" method="POST">
                                <a href="{{ route('admin.hotels.edit', $Hotel->id) }}" class="btn btn-warning">Edit</a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </table>
            {!! $hotels->links('pagination::bootstrap-5') !!}
        </div>
    </div>
@endsection
