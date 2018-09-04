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
                    <div class="panel-heading"><h2 class="text-center"> catgories</h2>
                        <p class="text-center"><a class="btn btn-success" href="{{url('createcats')}}">add catgory</a></p>
                        <p class="text-center"><a class="btn btn-success" href="{{url('admin')}}">BACK</a></p>
                    </div>
                    <div class="panel-body">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th> catgory id</th>
                                <th>catgory  name</th>
                                <th> edit</th>
                                <th>delete</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($catgories as $cat)
                                <tr>
                                    <td>{{$cat->id}}</td>
                                    <td>{{$cat->name}}</td>
                                    <td>
                                        <a href="{{url('editcatgory/'.$cat->id)}}" class="btn btn-primary">Edit</a>
                                    </td>
                                    <td>
                                        <form method="post" action="{{url('delecatgory/'.$cat->id)}}">
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