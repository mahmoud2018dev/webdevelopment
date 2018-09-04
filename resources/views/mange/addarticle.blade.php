@extends('layouts.app')

@section('content')
    <div class="container">
<form action="add" name="myform" method="post">

     {{ csrf_field() }}
        <div class="form-group row">
            <label for="title" class="col-2 col-form-label">title</label>
            <div class="col-10">
                <input class="form-control" type="text"  name="title">
            </div>
        </div>
    <div class="form-group row">
        <label for="body" class="col-2 col-form-label">body</label>
        <div class="col-10">
            <textarea rows="5" cols="50" class="form-control" type="text"  name="body">
            </textarea>
        </div>
    </div>
    <br>
    <input type="submit" value="add new " class="btn btn-primary">

</form>
    </div>



@endsection
