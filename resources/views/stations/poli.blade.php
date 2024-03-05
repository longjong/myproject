@extends('layouts.app')
@section('content')
    {{-- <link rel="stylesheet" href="style.css"> --}}
    <div class='mt-5'>
        <h2 class="shadow-lg p-3 mb-5 bg-white rounded text-center">Police Station in Chiangmai</h2>
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <a class="btn btn-primary p-2 me-4" href="/">Home</a>
        </div>
    </div>

    <div class="container mt-3">
        <div class="row my-3">
            @foreach ($postations as $Police)
                <div class="col-3 mt-3">
                    <div class="card shadow-md h-100">
                        <img class= "rounded-2 mt-4" style="margin: 0 auto;" src="{{ asset($Police->image) }}"
                            alt="acti" width="250" height="250">
                        <div class="card-body">
                            <p class="fw-bold text-center">Name:{{ $Police->name }}</p>
                            <p class="card-text">Address:{{ $Police->address }}</p>
                            <p class="card-text">Tel:{{ $Police->telephone }}</p>
                        </div>
                        <div class="container my-5">
                            <button type="button"><a href="{{ $Police->map }}"style="text-decoration: none">Map</a></button>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection