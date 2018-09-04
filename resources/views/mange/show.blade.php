@extends('layouts.app')



@section('content')
    <div class="container">
        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">article_titles</th>
                <th scope="col">article_body</th>

                <th scope="col">comments</th>
            </tr>
            </thead>
            <tbody>


             @foreach ($articles as $art)

                <tbody>
                <tr>
                    <td>{{$art->title}}</td>
                    <td>{{$art->body}}</td>
                    <td><a href="{{"/read/".$art->id}}" class=" btn btn-primary">comment</a></td>
                </tr>
                </tbody>
            @endforeach






        </table>
        <a href="add"  class="btn btn-primary"> add new </a>
    </div>



@endsection
