@extends('layout')
<?php 
if($act=='add')
{
	$head = 'Form Pengajuan Dinas';
	$pswd_placeholder = 'Password';
}
else if('edit'==$act)
{
	$head = 'Edit '.$dinas->name;
	$pswd_placeholder = '(Unchanged)';
}
?>
@section('title') {{$head}} @stop
@section('content')


<div class="panel panel-primary">
  <div class="panel-heading">{{ $head }}</div>
  <div class="panel-body">
  @if(Auth::user()->level!=3)
	@include('action', array('p' => 'Dinas', 'l'=>'dinas', 'a'=>'active'))
  @else

  @endif
  </div>
	@if (Session::has('message'))
		<div class="alert alert-info alert-dismissable">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			{{ Session::get('message') }}
		</div>
	@endif
@if('add'==$act)
	{{ Form::open(array('route'=>'dinas.store', 'class'=>'form-horizontal')) }}
@elseif('edit'==$act)
	{{ Form::model($dinas, array('route' => array('dinas.update', $dinas->id), 'method' => 'PUT', 'class'=>'form-horizontal')) }}
@endif

	<div class="form-group">
		{{ Form::label('pengaju', 'Penangguna Jawab *', array('class'=>'col-sm-2 control-label')) }}
		<div class="input-group col-xs-6">
			{{ Form::text('pengaju', Auth::user()->name, array('class'=>'form-control input-sm', 'id'=>'pengaju', 'disabled')) }}
			{{ Form::hidden('uid', Auth::user()->id)}}
		</div>
	</div>

	<div class="form-group">
	{{ Form::label('task', 'Kegiatan *', array('class'=>'col-sm-2 control-label')) }}
		<div class="input-group col-xs-6" id="task">
			{{ Form::text('task', Input::old('task'), array('class'=>'form-control input-sm', 'id'=>'task', 'placeholder'=>'Kegiatan', 'required')) }}
			<span class="help-block alert-danger">{{ $errors->first('task') }}</span>
		</div>
	</div> 

	<div class="form-group">
		{{ Form::label('sparator', 'Mengajukan tugas/dinas keluar kantor bagi:', array('class'=>'col-sm-4 control-label')) }}
	</div>

	<div class="form-group">
		{{ Form::label('propose_uid', 'Nama *', array('class'=>'col-sm-2 control-label')) }}
		<div class="input-group col-xs-6">
			{{ Form::select('propose_uid', array(''=>'- Pilih -') + $auth_option, Input::old('propose_uid'), array('class'=>'form-control input-sm chosen-select', 'id'=>'propose_uid'))}}
		<span class="help-block alert-danger">{{ $errors->first('propose_uid') }}</span>
		</div>
	</div>

	<div class="form-group">
	{{ Form::label('address', 'Uraian Tugas *', array('class'=>'col-sm-2 control-label')) }}
		<div class="input-group col-xs-6" id="address">
			{{ Form::textarea('address', Input::old('address'), array('class'=>'form-control input-sm', 'id'=>'address', 'placeholder'=>'Uraian Tugas', 'required')) }}
			<span class="help-block alert-danger">{{ $errors->first('address') }}</span>
		</div>
	</div>

	<div class="form-group">
	{{ Form::label('venue', 'Tempat *', array('class'=>'col-sm-2 control-label')) }}
		<div class="input-group col-xs-6">
			{{ Form::text('venue', Input::old('venue'), array('class'=>'form-control input-sm', 'id'=>'venue', 'placeholder'=>'Tempat', 'required')) }}
			<span class="help-block alert-danger">{{ $errors->first('venue') }}</span>
		</div>
	</div>

	<div class="form-group">
	{{ Form::label('start_date', 'Waktu Mulai *', array('class'=>'col-sm-2 control-label')) }}
		<div class="input-group col-xs-6" id="start_date" data-date-format="YYYY-MM-DD HH:mm">
			{{ Form::text('start_date', Input::old('start_date'), array('class'=>'form-control input-sm', 'id'=>'start_date', 'placeholder'=>'Waktu Mulai', 'required')) }}
			<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
			<span class="help-block alert-danger">{{ $errors->first('start_date') }}</span>
		</div>
	</div>
	
	<div class="form-group">
	{{ Form::label('finish_date', 'Waktu Sampai *', array('class'=>'col-sm-2 control-label')) }}
		<div class="input-group col-xs-6" id="finish_date" data-date-format="YYYY-MM-DD H:mm">
			{{ Form::text('finish_date', Input::old('finish_date'), array('class'=>'form-control input-sm', 'id'=>'finish_date', 'placeholder'=>'Waktu Sampai', 'required')) }}
			<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
			<span class="help-block alert-danger">{{ $errors->first('finish_date') }}</span>
		</div>
	</div>

	<div class="form-group">
		{{ Form::label('sparator', 'Selama menjalankan tugas/dinas keluar kantor, pekerjaan/wewenang diserahkan kepada:', array('class'=>'col-sm-7 control-label')) }}
	</div>

	<div class="form-group">
		{{ Form::label('auth_uid', 'Wewenang kepada *', array('class'=>'col-sm-2 control-label')) }}
		<div class="input-group col-xs-6">
			{{ Form::select('auth_uid', array(''=>'- Pilih -') + $auth_option, Input::old('auth_uid'), array('class'=>'form-control input-sm chosen-select', 'id'=>'auth_uid', 'required'))}}
		<span class="help-block alert-danger">{{ $errors->first('auth_uid') }}</span>
		</div>
	</div>

	<div class="form-group">
	{{ Form::label('auth_task', 'Pekerjaan/tugas yang dialihkan', array('class'=>'col-sm-2 control-label')) }}
		<div class="input-group col-xs-6">
			{{ Form::textarea('auth_task', Input::old('auth_task'), array('class'=>'form-control input-sm', 'id'=>'auth_task', 'placeholder'=>'Pekerjaan/tugas yang dialihkan')) }}
			<span class="help-block alert-danger">{{ $errors->first('auth_task') }}</span>
		</div>
	</div>

	<div class="form-group">
		<div class="col-sm-offset-2">
		<div>(*) wajib diisi</div>
			<button type="submit" class="btn btn-sm btn-primary"><span class="glyphicon glyphicon-save"></span> Submit</button>
			<a type="button" href="{{URL::previous()}}" class="btn btn-sm btn-default"><span class="glyphicon glyphicon-remove"></span> Cancel</a>
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
                });
            });
			$(function(){
                $('#finish_date').datetimepicker({
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