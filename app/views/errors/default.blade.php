@extends('layout')
@section('title')Error {{$code}} @stop

@section('content')

<div class="alert alert-danger">
	<strong>Application Error {{$code}}:</strong> Aplikasi bermasalah, silahkan hubungi IT support. 
</div>
@stop