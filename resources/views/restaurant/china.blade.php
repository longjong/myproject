@extends('layouts.app')
@section('content')
    {{-- <link rel="stylesheet" href="style.css"> --}}
    <div class='mt-5'>
        <h2 class="shadow-lg p-3 mb-5 bg-white rounded text-center">ร้านอาหารจีนในเชียงใหม่</h2>
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <a class="btn btn-primary p-2 me-4" href="/">Home</a>
        </div>
    </div>

    <div class="container mt-3">
        
        <div class="row my-3">
            @foreach ($chinas as $China)
                <div class="col-3 mt-3">
                    <div class="card shadow-md h-100">
                        <img class= "rounded-2 mt-4" style="margin: 0 auto;" src="{{ asset($China->image) }}"
                            alt="acti" width="250" height="250">
                        <div class="card-body">
                            <p class="fw-bold text-center">{{ $China->name }}</p>
                            <p class="card-text">Address:{{ $China->address }}</p>
                            <p class="card-text">Tel:{{ $China->telephone }}</p>
                            <p class="card-text">Rating:{{ $China->rating }}</p>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-sm btn-outline-secondary"><a href="{{ $China->map }}"style="text-decoration: none">Map</a></button>
                                </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
