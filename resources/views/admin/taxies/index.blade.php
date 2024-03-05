@extends('layouts.app')
@section('content')
    <div class="container mt-5">
        <div class="row m-3">
            <div class="col-lg-12 text-center">
                <h2>Taxi Services</h2>
            </div>
            <div class="row ">
                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <a class="btn btn-primary p-2" href="{{ route('admin.home') }}">Home</a>
                    <a class="btn btn-success p-2" href="{{ route('admin.taxies.create') }}">Create Texi Services</a>
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
                    <th>Telephone</th>
                    <th>image</th>
                    <th>is_active</th>
                    <th width="280px">action</th>
                </tr>
                @foreach ($taxies as $Taxi)
                    <tr>
                        <td>{{ $Taxi->id }}</td>
                        <td>{{ $Taxi->name }}</td>
                        <td>{{ $Taxi->telephone }}</td>
                        <td>{{ $Taxi->image }}</td>
                        <td>{{ $Taxi->is_active }}</td>
                        <td>
                            <form action="{{route('taxies.destroy',$Taxi->id)}}" method="POST">
                        <a href="{{route('admin.taxies.edit',$Taxi->id)}}" class="btn btn-warning">Edit</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                        </td>
                    </tr>
                @endforeach

            </table>
            {!! $taxies->links('pagination::bootstrap-5') !!}
        </div>
    </div>
@endsection
