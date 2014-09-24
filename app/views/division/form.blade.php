@extends('layout')
<?php 
if($act=='add')
{
	$head = 'Add Division';
}
else if('edit'==$act)
{
	$head = 'Edit '.$division->name;
}
?>
@section('title') {{$head}} @stop
@section('content')

<div class="panel panel-primary">
  <div class="panel-heading">{{ $head }}</div>
  <div class="panel-body">
	@include('action', array('p' => 'Division', 'l'=>'division', 'a'=>'active'))
  </div>
	@if (Session::has('message'))
		<div class="alert alert-info alert-dismissable">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			{{ Session::get('message') }}
		</div>
	@endif
@if('add'==$act)
	{{ Form::open(array('route'=>'division.store', 'class'=>'form-horizontal')) }}
@elseif('edit'==$act)
	{{ Form::model($division, array('route' => array('division.update', $division->id), 'method' => 'PUT', 'class'=>'form-horizontal')) }}
@endif

	<div class="form-group">
		{{ Form::label('name', 'Nama Divisi', array('class'=>'col-sm-2 control-label')) }}
		<div class="input-group col-xs-6">
			{{ Form::text('name', Input::old('name'), array('class'=>'form-control input-sm', 'id'=>'name', 'placeholder'=>'Nama Divisi', 'data-provide'=>'typeahead','required','autofocus')) }}
		<span class="help-block alert-danger">{{ $errors->first('name') }}</span>
		</div>
	</div>

	<div class="form-group">
		<div class="col-sm-offset-2">
			<button type="submit" class="btn btn-sm btn-primary"><span class="glyphicon glyphicon-save"></span> Submit</button>
			<a type="button" href="{{URL::previous()}}" class="btn btn-sm btn-default"><span class="glyphicon glyphicon-remove"></span> Cancel</a>
		</div>
	</div>

	{{ Form::close() }}
</div>

@stop