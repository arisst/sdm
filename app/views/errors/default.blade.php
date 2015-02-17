@extends('layout')
@section('title')Error default @stop

@section('content')

<div class="alert alert-danger">
	<strong>Application Error :</strong> Error tidak diketahui, silahkan submit log error berikut:

{{Form::open(array('route'=>'error-submit', 'class'=>'form-horizontal'))}}
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