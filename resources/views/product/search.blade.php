@extends('layouts.app')

@section('content')
    @if (session('status'))
        <div class="alert alert-danger">
            {{ session('status') }}
        </div>
    @endif

    <div class="container">
         <p class="text-center"><a class="btn btn-success" href="{{url('products')}}">BACK</a></p>
        <div class="row">
            @foreach ($products as $pro)
                <div class="col-sm-3">
                    <img class="img-thumbnail" src="{{asset('uploads/'.$pro->photo)}}">
                    <h3>product catgory  {{$pro->cat_id->name}}</h3>
                    <h3>product name  {{$pro->name}}</h3>
                    <p>description {{$pro->desc}}</p>
                    <p>price {{$pro->price.'$'}}</p>
                </div>
            @endforeach
        </div>
      </div>
@endsection