@extends('layouts.admin')
@section('content')
    <div class="row"><div class="col-sm-3"><img src="{{$user->photo? $user->photo->file:'http://placehold.it/400x400'}}" alt="" class="img-responsive img-rounded"></div>

    <div class="col-sm-9">
    <h1>Edit User</h1>
    {!!  Form::model($user,['method'=>'PATCH','action'=>['App\Http\Controllers\AdminUsersController@update',$user->id],'files'=>true])!!}
    <div class="form-group">
        {!! Form::label('name','Name:') !!}
        {!! Form::text('name',null,['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('email','Email:') !!}
        {!! Form::email('email',null,['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('role_id','Role ID:') !!}
        {!! Form::select('role_id',$roles,null,['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('is_active','Status:') !!}
        {!! Form::select('is_active',array(1=>'Active',0=>'Not Active'),0,['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('photo_id','Title:') !!}
        {!! Form::file('photo_id',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('password','Password:') !!}
        {!! Form::password('password',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::submit('Update User',['class'=>'btn btn-primary col-sm-6']) !!}
    </div>
{!! Form::close() !!}
        {!! Form::open(['method'=>'DELETE','action'=>['App\Http\Controllers\AdminUsersController@destroy',$user->id]]) !!}
        <div class="form-group">
            {!! Form::submit('DELETE User',['class'=>'btn btn-danger col-sm-6']) !!}
        </div>
    {!! Form::close() !!}
    </div></div>
    <div class="row">
        @include('include.formerror')

    </div>

@endsection


