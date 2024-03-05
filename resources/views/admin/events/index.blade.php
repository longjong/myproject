@extends('layouts.appadmin')
@section('content')
    <div class="container mt-5">
        <div class="row m-3">
            <div class="col-lg-12 text-center">
                <h2>event</h2>
            </div>
            <div class="row ">
                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <a class="btn btn-primary p-2" href="{{ route('admin.home') }}">Home</a>
                    <a class="btn btn-success p-2" href="{{ route('admin.events.create') }}">Create Event</a>
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
                    <th>title</th>
                    <th>description</th>
                    <th>image</th>
                    <th>is_active</th>
                    <th width="280px">action</th>
                </tr>
                @foreach ($events as $Event)
                    <tr>
                        <td>{{ $Event->id }}</td>
                        <td>{{ $Event->title }}</td>
                        <td>{{ $Event->description }}</td>
                        <td>{{ $Event->image }}</td>
                        <td>{{ $Event->is_active }}</td>
                        <td>
                            <form action="{{ route('events.destroy', $Event->id) }}" method="POST">
                                <a href="{{ route('admin.events.edit', $Event->id) }}" class="btn btn-warning">Edit</a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </table>
            {!! $events->links('pagination::bootstrap-5') !!}
        </div>
    </div>
@endsection
