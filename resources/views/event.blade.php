@extends('layouts.app')
@section('content')
    <title>(@yield('title'))</title>
    <div class="container">
        <div>
            <h1 class="shadow-lg p-3 mb-5 bg-white rounded text-center">This is Hot Event</h1>
        </div>
        <div class="row mt-3">
            @foreach ($events as $Event)
                
           
            <div class="col-md-6 col-lg-12">
                <img src="{{$Event->image}}" class="rounded mx-auto d-block" alt="act1"width="500" height="500">
                <div>
                    <p class="text-center fw-bold mt-3">{{$Event->title}}</p>
                    <p class="text-center mt-3">{{$Event->description}}</p>
                </div>
            </div>
            
            @endforeach
        </div>



        <!--
      -->
    </div>
@endsection
