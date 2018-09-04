@extends('layouts.app')
@section('content')

    <div>
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading"><h2 class="text-center">edit products</h2>
                        <p class="text-center"><a class="btn btn-success" href="{{url('allproducts')}}">BACK</a></p>
                    </div>

                    <div class="panel-body">
                        <form  method="post" action="{{url('upadteproduct/'.$products->id)}} " enctype="multipart/form-data"  >
                            {{csrf_field()}}
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <input class="form-control" type="text" value="{{$products->cat_id->name}}" disabled="disabled"><br>
                            @if($errors->get('catgoryid'))
                                @foreach($errors->get('catgoryid') as $e)
                                    <li class="alert alert-danger"> {{$e}}</li>
                                @endforeach
                            @endif

                            <input value="{{$products->name}}"  class="form-control" type="text" name="name" placeholder="name"><br>
                            @if($errors->get('name'))
                                @foreach($errors->get('name') as $e)
                                    <li class="alert alert-danger"> {{$e}}</li>
                                @endforeach
                            @endif


                            <input value="{{$products->price}}" class="form-control" name="price" placeholder="price"></input><br>
                            @if($errors->get('price'))
                                @foreach($errors->get('price') as $e)
                                    <li class="alert alert-danger"> {{$e}}</li>
                                @endforeach
                            @endif

                            <input  class="form-control" type="file" name="file[]" multiple="multiple"><br>

                            @if($errors->get('photo'))
                                @foreach($errors->get('photo') as $e)
                                    <li class="alert alert-danger"> {{$e}}</li>
                                @endforeach
                            @endif
                            <textarea class="form-control" name="desc" placeholder="description">{{$products->desc}}</textarea><br>
                            @if($errors->get('desc'))
                                @foreach($errors->get('desc') as $e)
                                    <li class="alert alert-danger"> {{$e}}</li>
                                @endforeach
                            @endif
                            <input class="btn btn-primary btn-group-lg" type="submit" value="update"><br>



                        </form>



                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection