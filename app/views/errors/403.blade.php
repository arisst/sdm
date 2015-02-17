@extends('layout')
@section('title')Error 403 @stop

@section('content')

<div class="alert alert-danger">
	<strong>Error 403 Forbidden:</strong> Halaman rahasia, anda tidak diperbolehkan mengakses.
	{{Form::open(array('route'=>'errors.store', 'class'=>'form-horizontal'))}}
{{Form::hidden('error_code', '403')}}
	<div class="form-group">
    <div class="col-sm-12">
      {{Form::textarea('error_message', $e, array('class'=>'form-control', 'placeholder'=>'Deskripsikan error yang terjadi'))}}
      <br>
      <button type="submit" class="btn">Submit</button>
    </div>
  </div>
{{Form::close()}}
</div>
@stop