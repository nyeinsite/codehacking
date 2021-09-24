@extends('layouts.admin')
@section('content')
    <h1>Posts</h1>

    <table class="table">
        <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Photo</th>
            <th scope="col">Owner</th>
            <th scope="col">Category Id</th>
            <th scope="col">Title</th>
            <th scope="col">Body</th>
            <th scope="col">Created At</th>
            <th scope="col">Updated At</th>
        </tr>
        </thead>
        <tbody>
        @if($posts)

        <tr>
            @foreach($posts as $post)
                <td>{{$post->id}}</td>
                <td><img height="100" src="{{$post->photo?$post->photo->file:"http://placehold.it"}}"></td>
                <td>{{$post->user->name}}</td>
                <td>{{$post->category?$post->category->name:"Uncategorize"}}</td>
                <td>{{$post->title}}</td>
                <td>{{$post->body}}</td>
                <td>{{$post->created_at->diffForHumans()}}</td>
                <td>{{$post->updated_at->diffForHumans()}}</td>
        </tr>
            @endforeach

            @endif
        </tbody>
    </table>
@stop
