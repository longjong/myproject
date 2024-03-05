@extends('layouts.appadmin')
@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="container mt-5">
        <div class="row m-3">
            <div class="col-lg-12 text-center">
                <h2>Create a Hotel</h2>
            </div>
            <div>
                <a href="{{ route('admin.hotels.index') }}" class="btn btn-primary">Back</a>
            </div>
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            <form action="{{route('admin.hotels.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group my-3">
                            <strong>Name</strong>
                            <input type="text" name="name" class="form-control" placeholder="name">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group my-3">
                            <strong>Address</strong>
                            <input type="text" name="address" class="form-control" placeholder="address">
                            
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group my-3">
                            <strong>Telephone</strong>
                            <input type="text" name="telephone" class="form-control" placeholder="telephone">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group my-3">
                            <strong>Map</strong>
                            <input type="link" name="map" class="form-control" placeholder="map">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group my-3">
                            <strong>Rating</strong>
                            <input type="text" name="rating" class="form-control" placeholder="rating">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group my-3">
                            <strong>Image</strong>
                            <input type="file" name="image" class="form-control" placeholder="image">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group my-3">
                            <strong>is_active</strong>

                            <input type="text" name="is_active" class="form-control" placeholder="is_active">
                           
                        </div>
                    </div>
                    <div class="col-md-12">
                        <button type="submit" class="mt-3 btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    </form>
@endsection
