@extends('layout')
<?php 
if($act=='add')
{
	$head = 'Form Pengajuan Lembur';
	$pswd_placeholder = 'Password';
}
else if('edit'==$act)
{
	$head = 'Edit '.$lembur->name;
	$pswd_placeholder = '(Unchanged)';
}
?>
@section('title') {{$head}} @stop
@section('content')


<div class="panel panel-primary">
  <div class="panel-heading">{{ $head }}</div>
  <div class="panel-body">
	@include('action', array('p' => 'Lembur', 'l'=>'lembur', 'a'=>'active'))
  <div class="well">
  <h5>Catatan</h5>
  	<ul>
  		<li>Lembur diajukan oleh atasan langsung atau penanggung jawab kegiatan	</li>
  		<li>Transport dan uang makan adalah sesuai realisasi dan dapat diberikan setelah lembur lebih dari 3 jam berdasarkan data kehadiran terhitung setelah 8 jam bekerja</li>
  		<li>Transport dan uang makan yang telah diberikan dari dana program/kegiatan tidak dapat lagi dimintakan dari dana operasional Komnas Perempuan.</li>
  		<li>Diperkenankan menggunakan taksi untuk pelaksanaan lembur uang berakhir setelah jam 20.00 WIB (untuk keperluan ini WAJIB manyertakan struk taksi)</li>
  	</ul>
  	</div>
  </div>
	@if (Session::has('message'))
		<div class="alert alert-info alert-dismissable">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			{{ Session::get('message') }}
		</div>
	@endif
@if('add'==$act)
	{{ Form::open(array('route'=>'lembur.store', 'class'=>'form-horizontal')) }}
@elseif('edit'==$act)
	{{ Form::model($lembur, array('route' => array('lembur.update', $lembur->id), 'method' => 'PUT', 'class'=>'form-horizontal')) }}
@endif

	<div class="form-group">
		{{ Form::label('pengaju', 'Penangguna Jawab', array('class'=>'col-sm-2 control-label')) }}
		<div class="input-group col-xs-6">
			{{ Form::text('pengaju', Auth::user()->name, array('class'=>'form-control input-sm', 'id'=>'pengaju', 'disabled')) }}
			{{ Form::hidden('uid', Auth::user()->id)}}
		</div>
	</div>

	<div class="form-group">
	{{ Form::label('task', 'Kegiatan', array('class'=>'col-sm-2 control-label')) }}
		<div class="input-group col-xs-6" id="task">
			{{ Form::text('task', Input::old('task'), array('class'=>'form-control input-sm', 'id'=>'task', 'placeholder'=>'Kegiatan', 'required')) }}
			<span class="help-block alert-danger">{{ $errors->first('task') }}</span>
		</div>
	</div> 

	<div class="form-group">
		{{ Form::label('sparator', 'Mengajukan lembur bagi:', array('class'=>'col-sm-3 control-label')) }}
	</div>

	<div class="form-group">
		{{ Form::label('propose_uid', 'Nama', array('class'=>'col-sm-2 control-label')) }}
		<div class="input-group col-xs-6">
			{{ Form::select('propose_uid', array(''=>'- Pilih -') + $auth_option, Input::old('propose_uid'), array('class'=>'form-control input-sm chosen-select', 'id'=>'propose_uid', 'required'))}}
		<span class="help-block alert-danger">{{ $errors->first('propose_uid') }}</span>
		</div>
	</div>

	<div class="form-group">
	{{ Form::label('address', 'Tugas', array('class'=>'col-sm-2 control-label')) }}
		<div class="input-group col-xs-6" id="address">
			{{ Form::textarea('address', Input::old('address'), array('class'=>'form-control input-sm', 'id'=>'address', 'placeholder'=>'Tugas', 'required')) }}
			<span class="help-block alert-danger">{{ $errors->first('address') }}</span>
		</div>
	</div>

	<div class="form-group">
	{{ Form::label('venue', 'Lokasi', array('class'=>'col-sm-2 control-label')) }}
		<div class="input-group col-xs-6">
			{{ Form::text('venue', Input::old('venue'), array('class'=>'form-control input-sm', 'id'=>'venue', 'placeholder'=>'Lokasi', 'required')) }}
			<span class="help-block alert-danger">{{ $errors->first('venue') }}</span>
		</div>
	</div>

	<div class="form-group">
	{{ Form::label('start_date', 'Waktu Mulai', array('class'=>'col-sm-2 control-label')) }}
		<div class="input-group col-xs-6" id="start_date" data-date-format="YYYY-MM-DD HH:mm">
			{{ Form::text('start_date', Input::old('start_date'), array('class'=>'form-control input-sm', 'id'=>'start_date', 'placeholder'=>'Waktu Mulai', 'required')) }}
			<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
			<span class="help-block alert-danger">{{ $errors->first('start_date') }}</span>
		</div>
	</div>
	
	<div class="form-group">
	{{ Form::label('finish_date', 'Waktu Sampai', array('class'=>'col-sm-2 control-label')) }}
		<div class="input-group col-xs-6" id="finish_date" data-date-format="YYYY-MM-DD H:mm">
			{{ Form::text('finish_date', Input::old('finish_date'), array('class'=>'form-control input-sm', 'id'=>'finish_date', 'placeholder'=>'Waktu Sampai', 'required')) }}
			<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
			<span class="help-block alert-danger">{{ $errors->first('finish_date') }}</span>
		</div>
	</div>

	<div class="form-group">
	{{ Form::label('lintas_divisi', 'Lintas Divisi', array('class'=>'col-sm-2 control-label')) }}
		<div class="input-group col-xs-6">
			<div class="radio">
			  <label>{{Form::radio('lintas_divisi', '1')}} Ya </label>
			</div>
			<div class="radio">
			  <label>{{Form::radio('lintas_divisi', '0')}} Tidak </label>
			</div>
			<span class="help-block alert-danger">{{ $errors->first('lintas_divisi') }}</span>
		</div>
	</div>

	<div class="form-group">
	{{ Form::label('transportasi', 'Transportasi', array('class'=>'col-sm-2 control-label')) }}
		<div class="input-group col-xs-6">
		<span class="input-group-addon">Rp.</span>
			{{ Form::text('transportasi', Input::old('transportasi'), array('class'=>'form-control input-sm', 'id'=>'transportasi', 'placeholder'=>'Transportasi')) }}
			<span class="help-block alert-danger">{{ $errors->first('transportasi') }}</span>
		</div>
	</div>

	<div class="form-group">
	{{ Form::label('makan', 'Uang Makan', array('class'=>'col-sm-2 control-label')) }}
		<div class="input-group col-xs-6">
		<span class="input-group-addon">Rp.</span>
			{{ Form::text('makan', Input::old('makan'), array('class'=>'form-control input-sm', 'id'=>'makan', 'placeholder'=>'Uang Makan')) }}
			<span class="help-block alert-danger">{{ $errors->first('makan') }}</span>
		</div>
	</div>	


	<div class="form-group">
	{{ Form::label('note', 'Catatan', array('class'=>'col-sm-2 control-label')) }}
		<div class="input-group col-xs-6">
			{{ Form::textarea('note', Input::old('note'), array('class'=>'form-control input-sm', 'id'=>'note', 'placeholder'=>'Catatan diisi setelah dilaksanakan')) }}
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