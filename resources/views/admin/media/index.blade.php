@extends('layouts.admin')
@section('content')
    <h1>Photos</h1>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">file</th>
            <th scope="col">Created Date</th>
        </tr>
        </thead>
        <tbody>
        @if($photos)
            @foreach($photos as $photo)
        <tr>
            <td>{{$photo->id}}</td>
            <td><img src="{{$photo->file}}" height="50"></td>
            <td>{{$photo->created_at->diffForHumans()}}</td>
            <td>
                {!! Form::open(['method'=>'DELETE','action'=>['App\Http\Controllers\AdminMediasController@destroy',$photo->id]]) !!}
                {!! Form::submit('DELETE',['class'=>'btn btn-danger']) !!}
                {!! Form::close() !!}
            </td>
        </tr>
            @endforeach
            @endif
    </table>
@stop
