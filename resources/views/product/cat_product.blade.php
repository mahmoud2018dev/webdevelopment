@extends('layouts.app')

@section('content')
    <link href="{{ asset('css/web.css') }}" rel="stylesheet">
    <!--start navbar-->
    <nav class="navbar navbar-inverse">
        <div class="container">
            <div class="navbar-header">
                <a class="navbar-brand" href="#">krkr_WebSite2018</a>
            </div>
            <ul class="nav navbar-nav">
                <li class="active"><a href="#">Home</a></li>
                <li class="active"><a href="{{url('products')}}">all products</a></li>
                <li class="dropdown">
                   <a class="dropdown-toggle " data-toggle="dropdown" href="#" style="color: greenyellow">catgories
                        <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        @foreach($catgories as $cats)
                            <li><a href="{{url('products/'.$cats->id)}}">{{$cats->name}}</a></li>
                        @endforeach
                    </ul>
                </li>

                @if (Auth::check())
                    <li class="active"><a href="{{url('admin')}}">admin</a></li>
                    <li class="active"><a href="{{url('cart')}}">check mycart</a></li>
                @endif
                <li class="active"><a href="#">contact</a></li>
                <li class="active"><a href="#">about</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right" style="margin-top: 7px;">
            <form method="post" action= "{{url('/search')}}" class="form-inline my-2 my-lg-0">
                {{csrf_field()}}
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <input name="search" class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
            </ul>

        </div>
    </nav>
    <!--end navbar-->

    <div class="container">
        <div class="row">
            <h1 class="text-center">   {{$catgories1->name}}</h1>
            @foreach ($products as $pro)

                <div class="col-sm-4">
                    <img src="{{asset('uploads/'.$pro->photo)}}">
                    <h3>product name  {{$pro->name}}</h3>
                    <p>description {{$pro->desc}}</p>
                    <p>price {{$pro->price.'$'}}</p>
                    <a class="btn btn-success" href="{{url('cart/'.$pro->id)}}">add to cart</a>
                </div>
            @endforeach

        </div>
    </div>
@endsection
