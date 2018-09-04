@extends('layouts.app')
@section('content')
    <div class="container">
  <div class="form-group">
      <label for="title">title</label>
    {{ $article->title }}
  </div>
        <div class="form-group">
            <label for="body">body</label>
            {{ $article->body }}
        </div>
        <div class="form-group">
        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">comments</th>

            </tr>
            </thead>
            <tbody>


            @foreach ($article->comment as $c)

                <tbody>
                <tr>
                    <td>{{$c->comment}}</td>

                </tr>
                </tbody>
            @endforeach
        </table>
        </div>
        <form action="/read/{{$article->id}}" method="post">
        {{ csrf_field() }}
            <label for="comment" class="col-2 col-form-label">comment</label>
            <div class="col-10">
            <textarea rows="5" cols="50" class="form-control" type="text"  name="comment">
            </textarea>
                <br>
                <input type="submit" value="add new " class="btn btn-primary">
        </form>



    </div>



@endsection
