@extends('layouts.admin')
@section('styles')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/min/dropzone.min.css" rel="stylesheet">
@stop
@section('content')
    <h1>Media Upload</h1>
    {!! Form::open(['method'=>'POST','action'=>'App\Http\Controllers\AdminMediasController@store','class'=>'dropzone']) !!}
    {!! Form::close() !!}
@stop
@section('footer')
@stop
@section('scripts')
<script type="text/javascript"  src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/min/dropzone-amd-module.min.js"></script>
@stop
