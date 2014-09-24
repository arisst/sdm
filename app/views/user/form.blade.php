@extends('layout')
<?php 
if($act=='add')
{
	$head = 'Add User';
	$pswd_placeholder = 'Password';
}
else if('edit'==$act)
{
	$head = 'Edit '.$user->name;
	$pswd_placeholder = '(Unchanged)';
}
else if('profile'==$act)
{
	$head = 'My Profile';
	$pswd_placeholder = 'Password';
}
?>
@section('title') {{$head}} @stop
@section('content')


<div class="panel panel-primary">
  <div class="panel-heading">{{ $head }}</div>
  <div class="panel-body">
  	@if('profile'!=$act)
		@include('action', array('p' => 'User', 'l'=>'users', 'a'=>'active'))
	@endif
  </div>
	@if (Session::has('message'))
		<div class="alert alert-info alert-dismissable">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			{{ Session::get('message') }}
		</div>
	@endif
@if('add'==$act)
	{{ Form::open(array('route'=>'users.store', 'class'=>'form-horizontal')) }}
@elseif('profile'==$act)
	{{ Form::model($profile, array('route' => 'profile-submit', 'method' => 'POST', 'class'=>'form-horizontal')) }}
@elseif('edit'==$act)
	{{ Form::model($user, array('route' => array('users.update', $user->id), 'method' => 'PUT', 'class'=>'form-horizontal')) }}
@endif

	<div class="form-group">
		{{ Form::label('name', 'Nama', array('class'=>'col-sm-2 control-label')) }}
		<div class="input-group col-xs-6">
			{{ Form::text('name', Input::old('name'), array('class'=>'form-control input-sm', 'id'=>'name', 'placeholder'=>'Nama Lengkap', 'required', 'autofocus')) }}
		<span class="help-block alert-danger">{{ $errors->first('name') }}</span>
		</div>
	</div>

	<div class="form-group">
	{{ Form::label('username', 'Username', array('class'=>'col-sm-2 control-label')) }}
		<div class="input-group col-xs-6">
			{{ Form::text('username', Input::old('username'), array('class'=>'form-control input-sm', 'id'=>'username', 'placeholder'=>'Username', 'required')) }}
			<span class="help-block alert-danger">{{ $errors->first('username') }}</span>
		</div>
	</div>

	<div class="form-group">
	{{ Form::label('email', 'Email', array('class'=>'col-sm-2 control-label')) }}
		<div class="input-group col-xs-6">
			{{ Form::text('email', Input::old('email'), array('class'=>'form-control input-sm', 'id'=>'email', 'placeholder'=>'Email', 'required')) }}
			<span class="help-block alert-danger">{{ $errors->first('email') }}</span>
		</div>
	</div>

	<div class="form-group">
	{{ Form::label('phone', 'No. HP', array('class'=>'col-sm-2 control-label')) }}
		<div class="input-group col-xs-6">
			{{ Form::text('phone', Input::old('phone'), array('class'=>'form-control input-sm', 'id'=>'phone', 'placeholder'=>'No. HP', 'required')) }}
			<span class="help-block alert-danger">{{ $errors->first('phone') }}</span>
		</div>
	</div>

@if('profile'!=$act)
	<div class="form-group">
	{{ Form::label('division_id', 'Divisi', array('class'=>'col-sm-2 control-label')) }}
		<div class="input-group col-xs-6">
			{{ Form::select('division_id', array(''=>'- Pilih -')+$list_divisi, Input::old('division_id'), array('class'=>'form-control input-sm', 'id'=>'division_id', 'required'))}}
			<span class="help-block alert-danger">{{ $errors->first('division_id') }}</span>
		</div>
	</div>

	<div class="form-group">
		{{ Form::label('level', 'Jabatan', array('class'=>'col-sm-2 control-label')) }}
		<div class="input-group col-xs-6">
			{{ Form::select('level', array(''=>'- Pilih -', '2'=>'Koordinator', '4'=>'Asisten Koordinator', '3'=>'Staff'), Input::old('level'), array('class'=>'form-control input-sm', 'id'=>'level', 'required')) }}
			<span class="help-block alert-danger">{{ $errors->first('level') }}</span>
		</div>
	</div>

	<div class="form-group">
		{{ Form::label('parent_uid', 'Atasan', array('class'=>'col-sm-2 control-label')) }}
		<div class="input-group col-xs-6">
			{{ Form::select('parent_uid[]', $auth_option, $parent, array('class'=>'form-control input-sm chosen-select', 'id'=>'parent_uid', 'tabindex'=>4, 'multiple' ))}}
		<span class="help-block alert-danger">{{ $errors->first('parent_uid') }}</span>
		</div>
	</div>
@else
	{{ Form::hidden('id', Auth::user()->id) }}
@endif

	<div class="form-group">
		{{ Form::label('password', 'Password', array('class'=>'col-sm-2 control-label')) }}
		<div class="input-group col-xs-6">
			{{ Form::password('password', array('class'=>'form-control input-sm', 'id'=>'password', 'placeholder'=>$pswd_placeholder)) }}
			<span class="help-block alert-danger">{{ $errors->first('password') }}</span>
		</div>
	</div>

	<div class="form-group">
		{{ Form::label('passconf', 'Konfirmasi Password', array('class'=>'col-sm-2 control-label')) }}
		<div class="input-group col-xs-6">
			{{ Form::password('passconf', array('class'=>'form-control input-sm', 'id'=>'passconf', 'placeholder'=>$pswd_placeholder)) }}
			<span class="help-block alert-danger">{{ $errors->first('passconf') }}</span>
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
{{HTML::style('assets/chosen/chosen.css')}}    
{{HTML::script('assets/chosen/chosen.jquery.js')}}    

<script type="text/javascript">

	//CHOSEN SELECT
	var config = {
      '.chosen-select'           : {}
    }
    for (var selector in config) {
      $(selector).chosen(config[selector]);
    }

</script>
@stop