@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-sm-3">
            <img height="100" src="{{$post->photo->file}}"  alt="" class="img-responsive img-rounded">
        </div>
        <div class="col-sm-9">
        <h1>Edit Posts</h1>

        {!! Form::model($post,['method'=>'PATCH','action'=>['App\Http\Controllers\AdminPostsController@update',$post->id],'files'=>true]) !!}
        <div class="form-group">
            {!! Form::label('title','Title:') !!}
            {!! Form::text('title',null,['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('category_id','Category:') !!}
            {!! Form::select('category_id',$categories,null,['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('photo_id','Photo:') !!}
            {!! Form::file('photo_id',null,['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('body','Description:') !!}
            {!! Form::textarea('body',null,['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::submit('Update Post',['class'=>'btn btn-primary']) !!}
        </div>
        {!! Form::close() !!}
            {!! Form::open(['method'=>'DELETE','action'=>['App\Http\Controllers\AdminPostsController@destroy',$post->id],'files'=>true]) !!}
            <div class="form-group">
                {!! Form::submit('DELETE Post',['class'=>'btn btn-danger']) !!}
            </div>
            {!! Form::close() !!}
    </div>
    </div>
    <div class="row">
        @include('include.formerror')
    </div>
@stop

