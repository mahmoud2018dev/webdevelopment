@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading text-center"><h1>admin</h1></div>
                        <p class="text-center"> <a class="btn btn-success" href="{{url('products')}}"> home</a></p>
                    <div class="panel-body">

                        <h1 class="text-center text-capitalize">welcome to admin page</h1>

                       <div class="text-center">
                           <a class="btn btn-success" href="{{url('allproducts')}}"> mange product</a>
                        <a class="btn btn-success" href="{{url('allcatgories')}}"> mange catgory</a>
                       </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
