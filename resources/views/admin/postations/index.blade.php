@extends('layouts.app')
@section('content')
    <div class="container mt-5">
        <div class="row m-3">
            <div class="col-lg-12 text-center">
                <h2>Police</h2>
            </div>
            <div class="row ">
                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <a class="btn btn-primary p-2" href="{{ route('admin.home') }}">Home</a>
                    <a class="btn btn-success p-2" href="{{ route('admin.postations.create') }}">Create Police</a>
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
                @foreach ($postations as $Police)
                    <tr>
                        <td>{{ $Police->id }}</td>
                        <td>{{ $Police->name }}</td>
                        <td>{{ $Police->address }}</td>
                        <td>{{ $Police->telephone }}</td>
                        <td>{{ $Police->map }}</td>
                        <td>{{ $Police->image }}</td>
                        <td>{{ $Police->is_active }}</td>
                        <td>
                            <form action="{{route('postations.destroy',$Police->id)}}" method="POST">
                        <a href="{{route('admin.postations.edit',$Police->id)}}" class="btn btn-warning">Edit</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                        </td>
                    </tr>
                @endforeach

            </table>
            {!! $postations->links('pagination::bootstrap-5') !!}
        </div>
    </div>
@endsection
