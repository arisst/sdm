@extends('layout')
@section('title')Error 500 @stop

@section('content')

<div class="alert alert-danger">
	<strong>Error 500 Internal Server Error:</strong> Server bermasalah, silahkan hubungi IT support, atau submit log error berikut :
{{Form::open(array('route'=>'errors.store', 'class'=>'form-horizontal'))}}
{{Form::hidden('error_code', '500')}}
	<div class="form-group">
    <div class="col-sm-12">
      {{Form::textarea('error_message', $e, array('class'=>'form-control', 'readonly'))}}
      <br>
      <button type="submit" class="btn">Submit</button>
    </div>
  </div>
{{Form::close()}}
</div>

@stop