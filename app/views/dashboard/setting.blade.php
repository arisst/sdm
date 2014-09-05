@extends('layout')

@section('title') Site Configuration @stop
@section('content')


<div class="panel panel-primary">
  <div class="panel-heading">Site Configuration</div>
  <div class="panel-body">
  	@if (Session::has('message'))
		<div class="alert alert-info alert-dismissable">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			{{ Session::get('message') }}
		</div>
	@endif
  
<div class=".col-xs-11 col-md-7">
	{{ Form::open(array('route'=>'admin-setting-update', 'files'=>true, 'class'=>'form-horizontal')) }}

	<div class="form-group">
		{{ Form::label('site_name', 'Nama Website', array('class'=>'col-sm-3 control-label')) }}
		<div class="input-group col-xs-6">
			{{ Form::text('site_name', Config::get('setting.site_name'), array('class'=>'form-control input-sm', 'id'=>'site_name', 'placeholder'=>'Nama Website', 'required')) }}
		<span class="help-block">{{ $errors->first('site_name') }}</span>
		</div>
	</div>

	<div class="form-group">
		{{ Form::label('logo', 'Logo', array('class'=>'col-sm-3 control-label')) }}
		<div class="input-group col-xs-6">
			{{ Form::file('logo', array('class'=>'form-control input-sm', 'id'=>'logo', 'placeholder'=>'Logo')) }}<nobr>
			@if(Config::get('setting.logo'))
				{{ HTML::image('image/logo/dir/30/'.Config::get('setting.logo')) }}
				{{ Form::checkbox('removedFile', '1', false, array('id'=>'remove')).' '.Form::label('remove', 'Remove this image?') }}
			@endif
		<span class="help-block">{{ $errors->first('logo') }}</span>
		</div>
	</div>

	<div class="form-group">
		{{ Form::label('address', 'Alamat Instansi', array('class'=>'col-sm-3 control-label')) }}
		<div class="input-group col-xs-6">
			{{ Form::textarea('address', Config::get('setting.address'), array('class'=>'form-control input-sm', 'id'=>'address', 'placeholder'=>'Alamat Isntansi', 'required', 'rows'=>5)) }}
		<span class="help-block">{{ $errors->first('address') }}</span>
		</div>
	</div>

	<div class="form-group">
		{{ Form::label('site_theme', 'Theme', array('class'=>'col-sm-3 control-label')) }}
		<div class="input-group col-xs-6">
		<?php
			$themes_dir = array();
			foreach (File::directories(public_path().'/themes') as $key) {
				$th = explode('/', $key);
				$themes_dir[end($th)]=end($th);
			}
		?>
			{{ Form::select('site_theme', $themes_dir/*array('default'=>'default')*/, Config::get('setting.site_theme'), array('class'=>'form-control input-sm', 'id'=>'site_theme', 'required')) }}
			<span class="help-block">{{ $errors->first('site_theme') }}</span>
		</div>
	</div>

	<div class="form-group">
	{{ Form::label('per_page', 'List Perpage', array('class'=>'col-sm-3 control-label')) }}
		<div class="input-group col-xs-6">
			{{ Form::text('per_page', Config::get('setting.per_page'), array('class'=>'form-control input-sm', 'id'=>'per_page', 'placeholder'=>'List Perpage', 'required')) }}
			<span class="help-block">{{ $errors->first('per_page') }}</span>
		</div>
	</div>

	<div class="form-group">
		{{ Form::label('mail_driver', 'Mail Driver', array('class'=>'col-sm-3 control-label')) }}
		<div class="input-group col-xs-6">
			{{ Form::select('mail_driver', array('smtp'=>'smtp','mail'=>'mail','sendmail'=>'sendmail'), Config::get('setting.mail_driver'), array('class'=>'form-control input-sm', 'id'=>'mail_driver', 'placeholder'=>'Mail Driver')) }}
			<span class="help-block">{{ $errors->first('mail_driver') }}</span>
		</div>
	</div>

	<div class="form-group">
		{{ Form::label('mail_port', 'Mail Port', array('class'=>'col-sm-3 control-label')) }}
		<div class="input-group col-xs-6">
			{{ Form::text('mail_port', Config::get('setting.mail_port'), array('class'=>'form-control input-sm', 'id'=>'mail_port', 'placeholder'=>'Mail Port')) }}
			<span class="help-block">{{ $errors->first('mail_port') }}</span>
		</div>
	</div>

	<div class="form-group">
		{{ Form::label('mail_host', 'Mail Host', array('class'=>'col-sm-3 control-label')) }}
		<div class="input-group col-xs-6">
			{{ Form::text('mail_host', Config::get('setting.mail_host'), array('class'=>'form-control input-sm', 'id'=>'mail_host', 'placeholder'=>'Mail Host')) }}
			<span class="help-block">{{ $errors->first('mail_host') }}</span>
		</div>
	</div>

	<div class="form-group">
		{{ Form::label('mail_encryption', 'Mail Encryption', array('class'=>'col-sm-3 control-label')) }}
		<div class="input-group col-xs-6">
			{{ Form::select('mail_encryption', array('tls'=>'tls','ssl'=>'ssl'), Config::get('setting.mail_encryption'), array('class'=>'form-control input-sm', 'id'=>'mail_encryption', 'placeholder'=>'Mail Encryption')) }}
			<span class="help-block">{{ $errors->first('mail_encryption') }}</span>
		</div>
	</div>

	<div class="form-group">
		{{ Form::label('mail_username', 'Mail Username', array('class'=>'col-sm-3 control-label')) }}
		<div class="input-group col-xs-6">
			{{ Form::text('mail_username', Config::get('setting.mail_username'), array('class'=>'form-control input-sm', 'id'=>'mail_username', 'placeholder'=>'Mail Username')) }}
			<span class="help-block">{{ $errors->first('mail_username') }}</span>
		</div>
	</div>

	<div class="form-group">
		{{ Form::label('mail_password', 'Mail Password', array('class'=>'col-sm-3 control-label')) }}
		<div class="input-group col-xs-6">
		@if(Config::get('setting.mail_password'))
			{{ Form::input('password','mail_password', Crypt::decrypt(Config::get('setting.mail_password')), array('class'=>'form-control input-sm', 'id'=>'mail_password', 'placeholder'=>'Mail Password')) }}
		@else
			{{ Form::input('password','mail_password', '', array('class'=>'form-control input-sm', 'id'=>'mail_password', 'placeholder'=>'Mail Password')) }}
		
		@endif
			<span class="help-block">{{ $errors->first('mail_password') }}</span>
		</div>
	</div>


	<div class="form-group">
		<div class="col-sm-offset-3">
			<button type="submit" class="btn btn-sm btn-primary"><span class="glyphicon glyphicon-save"></span> Save</button>
		</div>
	</div>

	{{ Form::close() }}
	</div>
	<div class=".col-xs-6 col-md-4">
		<div class="well">
		<h4>Tips</h4>
		Konfigurasi Email menggunakan gmail
			<ul>
				<li>Mail driver : smtp</li>
				<li>Mail port : 465</li>
				<li>Mail host : smtp.gmail.com</li>
				<li>Mail encryption : ssl</li>
				<li>Mail username : [akun gmail anda]</li>
				<li>Mail password : [password gmail anda]</li>
			</ul>
		</div>
	</div>
</div>
</div>
{{HTML::script('assets/bootstrap/js/password.js')}}
<script>
    $(function() {
        $('#mail_password').password().on('show.bs.password', function(e) {
            $('#eventLog').text('On show event');
            $('#methods').prop('checked', true);
        }).on('hide.bs.password', function(e) {
                    $('#eventLog').text('On hide event');
                    $('#methods').prop('checked', false);
                });
        $('#methods').click(function() {
            $('#password').password('toggle');
        });
    });
</script>

@stop