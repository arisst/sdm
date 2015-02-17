@extends('layout')
@section('title')Error 401 @stop

@section('content')

<div class="alert alert-danger">
	<strong>Error 401 Unauthorized:</strong> Anda tidak diperkenankan mengakses halaman ini. Jika menurut anda adalah kesalahan sistem silahkan isi form berikut:
	{{Form::open(array('route'=>'errors.store', 'class'=>'form-horizontal'))}}
{{Form::hidden('error_code', '401')}}
	<div class="form-group">
    <div class="col-sm-12">
      {{Form::textarea('error_message', '', array('class'=>'form-control', 'placeholder'=>'Deskripsikan error yang terjadi'))}}
      <br>
      <button type="submit" class="btn">Submit</button>
    </div>
  </div>
{{Form::close()}}
</div>
@stop