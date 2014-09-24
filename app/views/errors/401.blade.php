@extends('layout')
@section('title')Error 401 @stop

@section('content')

<div class="alert alert-danger">
	<strong>Error 401 Unauthorized:</strong> Anda tidak diperkenankan mengakses halaman ini. 
	{{Route::currentRouteName()}}
</div>
@stop