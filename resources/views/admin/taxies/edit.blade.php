@extends('layouts.appadmin')
@section('content')
    <div class="container mt-5">
        <div class="row m-3">
            <div class="col-lg-12 text-center">
                <h2>Edit Texi Services</h2>
            </div>
            <div>
                <a href="{{ route('admin.taxies.index') }}" class="btn btn-primary">Back</a>
            </div>
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            <form action="{{route('admin.taxies.update', ['taxies' => $taxies])}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group my-3">
                            <strong>Name</strong>
                            <input type="text" name="name" value="{{ $taxies->name }}" class="form-control"
                                placeholder="name">
                            @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group my-3">
                            <strong>Telephone</strong>
                            <input type="text" name="telephone" value="{{ $taxies->telephone }}" class="form-control"
                                placeholder="telephone">
                            @error('telephone')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group my-3">
                            <strong>image</strong>
                            <input type="file" name="image" value="{{ $taxies->image }}" class="form-control"
                                placeholder="image">
                            @error('image')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group my-3">
                            <strong>is_active</strong>
                            <input type="text" name="is_active" value="{{ $taxies->is_active }}" class="form-control"
                                placeholder="is_active">
                            @error('is_active')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-12">
                        <button type="submit" class="mt-3 btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
