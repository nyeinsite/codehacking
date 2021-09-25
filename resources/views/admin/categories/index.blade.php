@extends('layouts.admin')
@section('content')
    <div class="row">
        <h1>Categoreis</h1>
        <div class="col-sm-6">
            {!! Form::open(['method'=>'POST','action'=>'App\Http\Controllers\AdminCategoriesController@store']) !!}
            <div class="form-group">
            {!! Form::label('name','Name:') !!}
                {!! Form::text('name',null,['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::submit('Create Category',['class'=>'btn btn-primary']) !!}
            </div>
            {!! Form::close() !!}
        </div>
<div class="col-sm-6">
    <table class="table">
        <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Name</th>
            <th scope="col">Created Date</th>
            <th scope="col">Deleted Date</th>
        </tr>
        </thead>
        <tbody>
        @if($categories)
        @foreach($categories as $category)
        <tr>
            <td>{{$category->id}}</td>
            <td><a href="/admin/categories/{{$category->id}}/edit">{{$category->name}}</a></td>
            <td>{{$category->created_at->diffForHumans()}}</td>
            <td>{{$category->deleted_at? $category->deleted_at->diffForHumans():'Not Deleted'}}</td>
        </tr>
        @endforeach
            @endif
        </tbody>
        </table>
</div>
    </div>
@stop
