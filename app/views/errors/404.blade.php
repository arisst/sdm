@extends('layout')
@section('title')Error 404 @stop

@section('content')

<div class="alert alert-danger">
	<strong>Error 404 Not Found:</strong> Halaman tidak ada. Beri tahu admin dengan mengirimkan error report pada form berikut :

{{Form::open(array('route'=>'errors.store', 'class'=>'form-horizontal'))}}
{{Form::hidden('error_code', '404')}}
	<div class="form-group">
    <div class="col-sm-12">
      {{Form::textarea('error_message', '', array('class'=>'form-control','placeholder'=>'Deskripsikan error yang terjadi'))}}
      <br>
      <button type="submit" class="btn">Submit</button>
    </div>
  </div>
{{Form::close()}}

</div>

@stop