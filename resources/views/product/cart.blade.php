@extends('layouts.app')
@section('content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script>
        $(document).ready(function(){
            $("p").click(function(){
                $(this).hide();
            });
        });
    </script>
    <div>
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading"><h2 class="text-center"> your shooping cart</h2>

                        <p class="text-center"><a class="btn btn-success" href="{{url('products')}}">BACK</a></p>
                    </div>

                    <div class="panel-body">
                        <h1 class="text-center">total price= {{$total}}</h1>
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>user name</th>
                                <th>product name</th>
                                <th>price</th>
                                <th>photo</th>
                                <th>edit</th>
                                <th>delete</th>
                                <th>buy</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($orders as $order)
                            <tr>
                                <td>{{$order->user_id->name}}</td>
                            <td>{{$order->name}}</td>
                            <td>{{$order->price}}</td>
                            <td><img src="{{asset('uploads/'.$order->photo)}}" width="100px" height="100px"></td><br>
                            <td>
                                <a href="{{url('products/'.$order->id.'/edit')}}" class="btn btn-primary">Edit</a>
                            </td>
                            <td>
                                <form method="post" action="{{url('cart/'.$order->id)}}">
                                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <input type="submit" class="btn btn-danger"   value="delete">
                                </form>
                            </td>
                                <td><a href="{{url('pay/with/paypal/'.$order->id)}}" class="btn btn-warning">paypal</a> </td>
                            </tr>
                                @endforeach

                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection