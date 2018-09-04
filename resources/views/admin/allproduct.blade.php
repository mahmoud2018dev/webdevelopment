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
                    <div class="panel-heading"><h2 class="text-center">  products</h2>
                        <p class="text-center"><a class="btn btn-success" href="{{url('create')}}">add products</a></p>
                        <p class="text-center"><a class="btn btn-success" href="{{url('admin')}}">BACK</a></p>
                    </div>
                    <div class="panel-body">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>user name</th>
                                <th>product name</th>
                                <th>desc</th>
                                <th>price</th>
                                <th>photo</th>
                                <th>sdit</th>
                                <th>delete</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($products as $pro)
                                <tr>
                                    <td>{{$pro->user_id->name}}</td>
                                    <td>{{$pro->name}}</td>
                                    <td>{{$pro->desc}}</td>
                                    <td>{{$pro->price}}</td>
                                    <td><img src="{{asset('uploads/'.$pro->photo)}}" width="100px" height="100px"></td><br>
                                    <td>
                                        <a href="{{url('editproduct/'.$pro->id)}}" class="btn btn-primary">Edit</a>
                                    </td>
                                    <td>
                                        <form method="post" action="{{url('products/'.$pro->id)}}">
                                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                                            <input type="hidden" name="_method" value="DELETE">
                                            <input type="submit" class="btn btn-danger"   value="delete">
                                        </form>
                                    </td>
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