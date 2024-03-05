@extends('layouts.app')
@section('content')
    <title>(@yield('title'))</title>
    <div class="container">
        <div>
            <h1 class="shadow-lg p-3 mb-5 bg-body-tertiary mt-3 rounded text-center">Hotel</h1>
        </div>
        <div class="album py-5 bg-light">
            <div class="container">

                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                    @foreach ($hotels as $Hotels)
                        <div class="col">
                            <div class="card shadow-sm h-100">
                                <img src="{{ $Hotels->image }}" alt="image">
                                <div class="card-body">
                                    <p class="card-text">{{ $Hotels->name }}</p>
                                    <p class="card-text">{{ $Hotels->address }}</p>
                                    <p class="card-text">Tel:{{ $Hotels->telephone }}</p>
                                    <p class="card-text">Rating:{{ $Hotels->rating }}</p>
                                </div><div class="d-flex justify-content-between align-items-center mb-5">
                                        <div class="container mb-5">
                                            <button type="button d-grid d-md-block"><a
                                                    href="{{ $Hotels->map }}"style="text-decoration: none">Map</a></button>
                                        </div>
                                    </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endsection
