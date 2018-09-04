@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">paypal</div>

                    <div class="panel-body">
                       @if($method->state=='approved')
                           <h2 class="text-center"> thank you for payment you can  dowload product now</h2>
                           @else<h2 class="text-center"> opoos ther is somthing wrong please check  your acount and rebrocess</h2>
                           @endif
                        <h1 class="text-center"><a class="btn btn-success" href="{{url('products')}}">home</a> </h1>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
