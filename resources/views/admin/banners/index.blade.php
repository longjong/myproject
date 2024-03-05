@extends('layouts.appadmin')
@section('content')
    <div class="container mt-5">
        <div class="row m-3">
            <div class="col-lg-12 text-center">
                <h2>Banner</h2>
            </div>
            <div class="row ">
                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <a class="btn btn-primary p-2" href="{{ route('admin.home') }}">Home</a>
                    <a class="btn btn-success p-2" href="{{ route('admin.banners.create') }}">Create Banner</a>
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
                @foreach ($banners as $Banner)
                    <tr>
                        <td>{{ $Banner->id }}</td>
                        <td>{{ $Banner->title }}</td>
                        <td>{{ $Banner->description }}</td>
                        <td>{{ $Banner->image }}</td>
                        <td>{{ $Banner->is_active }}</td>
                        <td>
                            <form action="{{ route('banners.destroy', $Banner->id) }}" method="POST">
                                <a href="{{ route('admin.banners.edit', $Banner->id) }}" class="btn btn-warning">Edit</a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </table>
            {!! $banners->links('pagination::bootstrap-5') !!}
        </div>
    </div>
@endsection
