@extends('layouts.app')
@section('content')
    {{-- <link rel="stylesheet" href="style.css"> --}}
    <div class='mt-5'>
        <h2 class="shadow-lg p-3 mb-5 bg-white rounded text-center">Bus RTC in Chiangmai</h2>
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <a class="btn btn-primary p-2 me-4" href="/">Home</a>
        </div>
    </div>

    <div class="container mt-3">
        <div class="row mt-3">
            @foreach ($buss as $Bus)
                
           
            <div class="col-md-6 col-lg-12">
                <img src="{{ $Bus->image }}" class="rounded mx-auto d-block mt-3" alt="act1" width="700px" height="650px">
                <div>
                    <p class="text-center fw-bold mt-3">{{$Bus->title}}</p>
                    <p class="text-center mt-3">{{$Bus->description}}</p>
                </div>
            </div>
            
            @endforeach
    </div>
@endsection