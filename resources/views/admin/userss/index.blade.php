@extends('layouts.appadmin')
@section('content')
    <div class="container mt-5">
        <div class="row m-3">
            <div class="col-lg-12 text-center">
                <h2>User</h2>
            </div>
            <div class="row ">
                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <a class="btn btn-primary p-2" href="{{ route('admin.home') }}">Home</a>
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
                    <th>UserName</th>
                    <th>Full_name</th>
                    <th>Telephone</th>
                    <th>Email</th>
                    <th>address</th>
                    <th>image</th>
                    <th>is_active</th>
                    <th width="280px">action</th>
                </tr>
                @foreach ($userss as $Userss)
                    <tr>
                        <td>{{ $Userss->id }}</td>
                        <td>{{ $Userss->username }}</td>
                        <td>{{ $Userss->full_name }}</td>
                        <td>{{ $Userss->telephone }}</td>
                        <td>{{ $Userss->email }}</td>
                        <td>{{ $Userss->address }}</td>
                        <td>{{ $Userss->image }}</td>
                        <td>{{ $Userss->is_active }}</td>
                        <td>
                            <form action="{{route('userss.destroy',$Userss->id)}}" method="POST">
                        <a href="{{route('admin.userss.edit',$Userss->id)}}" class="btn btn-warning">Edit</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                        </td>
                    </tr>
                @endforeach

            </table>
            {!! $userss->links('pagination::bootstrap-5') !!}
        </div>
    </div>
@endsection
