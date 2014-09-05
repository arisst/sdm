@extends('layout')
<?php 
if($act=='add')
{
	$head = 'Add Libur';
	$pswd_placeholder = 'Password';
}
else if('edit'==$act)
{
	$head = 'Edit '.$libur->name;
	$pswd_placeholder = '(Unchanged)';
}
?>
@section('title') {{$head}} @stop
@section('content')


<div class="panel panel-primary">
  <div class="panel-heading">{{ $head }}</div>
  <div class="panel-body">
	@include('action', array('p' => 'Libur', 'l'=>'libur', 'a'=>'active'))
  </div>
	@if (Session::has('message'))
		<div class="alert alert-info alert-dismissable">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			{{ Session::get('message') }}
		</div>
	@endif
@if('add'==$act)
	{{ Form::open(array('route'=>'libur.store', 'class'=>'form-horizontal')) }}
@elseif('edit'==$act)
	{{ Form::model($libur, array('route' => array('libur.update', $libur->id), 'method' => 'PUT', 'class'=>'form-horizontal')) }}
@endif

	<div class="form-group">
		{{ Form::label('uid', 'Nama/Divisi/Jabatan', array('class'=>'col-sm-2 control-label')) }}
		<div class="input-group col-xs-6">
		@if(Auth::user()->level==3)
			{{ Form::text('nama', Auth::user()->name.' - '.Auth::user()->division['name'].' - '.Auth::user()->position, array('class'=>'form-control input-sm', 'id'=>'nama', 'placeholder'=>'Nama Lengkap', 'data-provide'=>'typeahead','readonly')) }}
			{{ Form::hidden('uid', Auth::user()->id) }}
		@else
			{{ Form::select('uid', array(''=>'- Pilih -') + $auth_option, Input::old('uid'), array('class'=>'form-control input-sm chosen-select', 'id'=>'uid', 'required'))}}
		@endif
		<span class="help-block alert-danger">{{ $errors->first('uid') }}</span>
		</div>
	</div>

	<div class="form-group">
		{{ Form::label('sparator', 'Mengajukan libur kompensasi setelah melaksanakan kegiatan:', array('class'=>'col-sm-5 control-label')) }}
	</div>

	<div class="form-group">
	{{ Form::label('task', 'Nama Kegiatan', array('class'=>'col-sm-2 control-label')) }}
		<div class="input-group date col-xs-6" id="task">
			{{ Form::text('task', Input::old('task'), array('class'=>'form-control input-sm', 'id'=>'task', 'placeholder'=>'Nama Kegiatan', 'required')) }}
			<span class="help-block alert-danger">{{ $errors->first('task') }}</span>
		</div>
	</div>

	<div class="form-group">
	{{ Form::label('transportasi', 'Lama Kegiatan', array('class'=>'col-sm-2 control-label')) }}
		<div class="input-group col-xs-6">
			{{ Form::text('transportasi', Input::old('transportasi'), array('class'=>'form-control input-sm', 'id'=>'transportasi', 'placeholder'=>'Lama Kegiatan', 'required')) }}
			<span class="help-block alert-danger">{{ $errors->first('transportasi') }}</span>
		</div>
	</div>
	
	<div class="form-group">
	{{ Form::label('start_work', 'Tanggal Kegiatan', array('class'=>'col-sm-2 control-label')) }}
		<div class="input-group col-xs-6" id="start_work" data-date-format="YYYY-MM-DD">
			{{ Form::text('start_work', Input::old('start_work'), array('class'=>'form-control input-sm', 'id'=>'start_work', 'placeholder'=>'Tanggal Kegiatan', 'required')) }}
			<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
			<span class="help-block alert-danger">{{ $errors->first('start_work') }}</span>
		</div>
	</div>

	<div class="form-group">
	{{ Form::label('venue', 'Tempat', array('class'=>'col-sm-2 control-label')) }}
		<div class="input-group col-xs-6">
			{{ Form::text('venue', Input::old('venue'), array('class'=>'form-control input-sm', 'id'=>'venue', 'placeholder'=>'Tempat', 'required')) }}
			<span class="help-block alert-danger">{{ $errors->first('venue') }}</span>
		</div>
	</div>

	<div class="form-group">
		{{ Form::label('sparator', 'Mengajukan libur kompensasi pada:', array('class'=>'col-sm-3 control-label')) }}
	</div>

	<div class="form-group">
	{{ Form::label('start_date', 'Tanggal', array('class'=>'col-sm-2 control-label')) }}
		<div class="input-group col-xs-6" id="start_date" data-date-format="YYYY-MM-DD">
			{{ Form::text('start_date', Input::old('start_date'), array('class'=>'form-control input-sm', 'id'=>'start_date', 'placeholder'=>'Tanggal', 'required')) }}
			<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
			<span class="help-block alert-danger">{{ $errors->first('start_date') }}</span>
		</div>
	</div>

	<div class="form-group">
	{{ Form::label('address', 'Alamat', array('class'=>'col-sm-2 control-label')) }}
		<div class="input-group col-xs-6">
			{{ Form::textarea('address', Input::old('address'), array('class'=>'form-control input-sm', 'id'=>'address', 'placeholder'=>'Alamat / Telepon selama libur', 'required')) }}
			<span class="help-block alert-danger">{{ $errors->first('address') }}</span>
		</div>
	</div>

	<div class="form-group">
		{{ Form::label('sparator', 'Selama libur kompensasi, semua / sebagian pekerjaan / wewenang diserahkan kepada:', array('class'=>'col-sm-7 control-label')) }}
	</div>

	<div class="form-group">
		{{ Form::label('auth_uid', 'Wewenang kepada', array('class'=>'col-sm-2 control-label')) }}
		<div class="input-group col-xs-6">
			{{-- Form::text('auth_uid', Input::old('auth_uid'), array('class'=>'form-control input-sm', 'id'=>'auth_uid', 'placeholder'=>'Wewenang selama libur diserahkan kepada', 'required', 'autofocus')) --}}
			{{ Form::select('auth_uid', array(''=>'- Pilih -') + $auth_option, Input::old('auth_uid'), array('class'=>'form-control input-sm chosen-select', 'id'=>'auth_uid', 'required'))}}
		<span class="help-block alert-danger">{{ $errors->first('auth_uid') }}</span>
		</div>
	</div>

	<div class="form-group">
	{{ Form::label('note', 'Catatan', array('class'=>'col-sm-2 control-label')) }}
		<div class="input-group col-xs-6">
			{{ Form::textarea('note', Input::old('note'), array('class'=>'form-control input-sm', 'id'=>'note', 'placeholder'=>'Catatan')) }}
			<span class="help-block alert-danger">{{ $errors->first('note') }}</span>
		</div>
	</div>

	<div class="form-group">
		<div class="col-sm-offset-2">
			<button type="submit" class="btn btn-sm btn-primary"><span class="glyphicon glyphicon-save"></span> Submit</button>
		</div>
	</div>

	{{ Form::close() }}
</div>

{{HTML::style('assets/chosen/chosen.css')}}    
{{HTML::script('assets/chosen/chosen.jquery.js')}}    

<script type="text/javascript">
	//DATETIME PICKER
			$(function(){
                $('#start_date').datetimepicker({
                	pickTime: false,
                	// minDate:"2014-08-01",
    				// defaultDate:"1/1/1990"
                });
            });
			$(function(){
                $('#start_work').datetimepicker({
                	pickTime: false,
    				// defaultDate:"1/1/1990"
                });
            });

	//CHOSEN SELECT
	var config = {
      '.chosen-select'           : {}
    }
    for (var selector in config) {
      $(selector).chosen(config[selector]);
    }

    //DISABLE SELECT
    $('select').change(function() {
	    $('#uid, #auth_uid').not(this)
	        .children('option[value=' + this.value + ']')
	        .attr('disabled', true)
	        .siblings().removeAttr('disabled');
	});

</script>
@stop