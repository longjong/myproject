@extends('layouts.appadmin')
@section('content')
    <div class="container mt-5">
        <div class="row m-3">
            <div class="col-lg-12 text-center">
                <h2>Feeds</h2>
            </div>
            <div class="row ">
                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <a class="btn btn-primary p-2" href="{{ route('admin.home') }}">Home</a>
                    <a class="btn btn-success p-2" href="{{ route('admin.feeds.create') }}">Create Feed</a>
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
                @foreach ($feeds as $Feed)
                    <tr>
                        <td>{{ $Feed->id }}</td>
                        <td>{{ $Feed->title }}</td>
                        <td>{{ $Feed->description }}</td>
                        <td>{{ $Feed->image }}</td>
                        <td>{{ $Feed->is_active }}</td>
                        <td>
                            <form action="{{ route('feeds.destroy', $Feed->id) }}" method="POST">
                                <a href="{{ route('admin.feeds.edit', $Feed->id) }}" class="btn btn-warning">Edit</a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </table>
            {!! $feeds->links('pagination::bootstrap-5') !!}
        </div>
    </div>
@endsection
