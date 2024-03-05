
@extends('layouts.app')
@section('content')
    <title>(@yield('title'))</title>
    <div class="container">
        <div>
            <h1 class="shadow-lg p-3 mb-5 bg-white rounded text-center">Taxi Service in Chiangmai</h1>
        </div>
        <div class="row mt-3">
            @foreach ($taxies as $Taxi)
                
           
            <div class="col-md-6 col-lg-12">
                <img src="{{$Taxi->image}}" class="rounded mx-auto d-block" alt="act1"width="600" height="500">
                <div>
                    <h1 class="text-center fw-bold mt-3">Name:{{$Taxi->name}}</h1>
                    <p class="text-center mt-3">Tel:{{$Taxi->telephone}}</p>
                </div>
            </div>
            
            @endforeach
        </div>



        <!--
      -->
    </div>
@endsection
