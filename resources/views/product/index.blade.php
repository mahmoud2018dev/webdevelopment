@extends('layouts.app')

@section('content')

    <link href="{{ asset('css/web.css') }}" rel="stylesheet">
    <!--start navbar-->
    <nav class="navbar navbar-inverse  ">
        <div class="container">
            <div class="navbar-header">
                <a class="navbar-brand" href="#">krkr_WebSite2018</a>
            </div>
            <ul class="nav navbar-nav">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">catgories
                        <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        @foreach($catgories as $cats)
                        <li><a href="{{url('products/'.$cats->id)}}">{{$cats->name}}</a></li>
                        @endforeach
                    </ul>
                </li>


                @if (Auth::check())
                    <li class="active"><a href="{{url('create')}}">add product</a></li>
                    <li class="active"><a href="{{url('createcats')}}">add catgory</a></li>
                    <li class="active"><a href="{{url('admin')}}">admin</a></li>
                    <li class="active"><a href="{{url('cart')}}">check mycart</a></li>
                @endif
                <li class="active"><a href="{{url('about')}}">contact</a></li>
                <li class="active"><a href="{{url('contactus')}}">about</a></li>


            </ul>
            <ul class="nav navbar-nav navbar-right" style="margin-top: 7px;">
                <form method="post" action= "{{url('/search')}}" class="form-inline my-2 my-lg-0">
                    {{csrf_field()}}
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <input name="search" class="form-control mr-sm-2" type="search" placeholder="Search by product name,price and decs" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form>
            </ul>

        </div>
    </nav>
    <!--end navbar-->

    <!--start carousel slider-->
    <div class="container">
        <h2 class="text-center">krkr_2018_slider</h2>
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#myCarousel" data-slide-to="1"></li>
                <li data-target="#myCarousel" data-slide-to="2"></li>
                <li data-target="#myCarousel" data-slide-to="3"></li>
                <li data-target="#myCarousel" data-slide-to="4"></li>
                <li data-target="#myCarousel" data-slide-to="5"></li>
                <li data-target="#myCarousel" data-slide-to="6"></li>
                <li data-target="#myCarousel" data-slide-to="7"></li>

            </ol>

            <!-- Wrapper for slides -->
            <div class="carousel-inner">

                <div class="item active">
                    <img src="s5.jpg" alt="Los Angeles" style="width:100%;height: 320px;">
                    <div class="carousel-caption">
                        <h3>Los Angeles</h3>
                        <p>LA is always so much fun!</p>
                    </div>
                </div>

                <div class="item">
                    <img src="s3.jpg" alt="Chicago" style="width:100%; height: 320px;">
                    <div class="carousel-caption">
                        <h3>Chicago</h3>
                        <p>Thank you, Chicago!</p>
                    </div>
                </div>

                <div class="item">
                    <img src="s4.jpg" alt="New York" style="width:100%;height: 320px;">
                    <div class="carousel-caption">
                        <h3>New York</h3>
                        <p>We love the Big Apple!</p>
                    </div>
                </div>
                <div class="item">
                    <img src="t1.jpg" alt="New York" style="width:100%;height: 320px;">
                    <div class="carousel-caption">
                        <h3>New York</h3>
                        <p>We love the Big Apple!</p>
                    </div>
                </div>
                <div class="item">
                    <img src="t2.jpg" alt="New York" style="width:100%;height: 320px;">
                    <div class="carousel-caption">
                        <h3>New York</h3>
                        <p>We love the Big Apple!</p>
                    </div>
                </div>
                <div class="item">
                    <img src="t3.jpg" alt="New York" style="width:100%;height: 320px;">
                    <div class="carousel-caption">
                        <h3>New York</h3>
                        <p>We love the Big Apple!</p>
                    </div>
                </div>
                <div class="item">
                    <img src="v1.jpg" alt="New York" style="width:100%;height: 320px;">
                    <div class="carousel-caption">
                        <h3>New York</h3>
                        <p>We love the Big Apple!</p>
                    </div>
                </div>
                <div class="item">
                    <img src="v2.jpg" alt="New York" style="width:100%;height: 320px;">
                    <div class="carousel-caption">
                        <h3>New York</h3>
                        <p>We love the Big Apple!</p>
                    </div>
                </div>

            </div>

            <!-- Left and right controls -->
            <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#myCarousel" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
    <!--end carousel slider-->
    <div class="container">
        <div class="row">
            @foreach ($products as $pro)
            <div class="col-sm-3">
                <img  height="200px" class="img-thumbnail" src="{{asset('uploads/'.$pro->photo)}}">
                <h3>product catgory  {{$pro->cat_id->name}}</h3>
                <h3>product name  {{$pro->name}}</h3>
                <p>description {{$pro->desc}}</p>
                <p>price {{$pro->price.'$'}}</p>
                <a class="btn btn-success" href="{{url('cart/'.$pro->id)}}">add to cart</a>
            </div>
            @endforeach
        </div>
    </div>
    <!-- start footer-->
    <!--start footer-->
    <section class="footer text-center" style="background-color: #dcd7d4" >
        <div class="container">
            <div class="row">



            <div class="list-unstyled social">
                <a href="#"><img src="imges/f.png " width="50px" height="50px"></a>
                <a href="#"><img src="imges/y.png"width="50px" height="50px"></a>
                <a href="#"><img src="imges/s.png"width="50px" height="50px"></a>
                <a href="#"><img src="imges/l.png"width="50px" height="50px"></a>
                <a href="#"><img src="imges/m.png"width="50px" height="50px"></a>
               <a href="#"><img src="imges/t.png"width="50px" height="50px"></a>

            </div>
            <div class="copyr">
                <p> copywrite 2018 <strong >mahmoud abdelkhalek</strong> bootstrap wepdesign thanks</p>
            </div>
            </div>
        </div>
    </section>




    <!--end footer-->
    <!-- end footer-->

@endsection
