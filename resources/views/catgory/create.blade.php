@extends('layouts.app')
@section('content')

    <div>
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading"><h2 class="text-center">create catgoroy</h2>
                        <p class="text-center"><a class="btn btn-success" href="{{url('products')}}">BACK</a></p>
                    </div>

                    <div class="panel-body">
                        <form  method="post" action="{{url('catgory')}} " enctype="multipart/form-data"  >
                            {{csrf_field()}}
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <input  class="form-control" type="text" name="name" placeholder=" catgoryname"><br>
                            @if($errors->get('name'))
                                @foreach($errors->get('name') as $e)
                                    <li class="alert alert-danger"> {{$e}}</li>
                                @endforeach
                            @endif
                            <input class="btn btn-primary btn-group-lg" type="submit"><br>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection