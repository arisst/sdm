@extends('layout')
<?php 
if($act=='add')
{
	$head = 'Add Cuti';
	$pswd_placeholder = 'Password';
}
else if('edit'==$act)
{
	$head = 'Edit '.$cuti->name;
	$pswd_placeholder = '(Unchanged)';
}
?>
@section('title') {{$head}} @stop
@section('content')


<div class="panel panel-primary">
  <div class="panel-heading">{{ $head }}</div>
  <div class="panel-body">
	@include('action', array('p' => 'Cuti', 'l'=>'cuti', 'a'=>'active'))
  </div>
	@if (Session::has('message'))
		<div class="alert alert-info alert-dismissable">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			{{ Session::get('message') }}
		</div>
	@endif
@if('add'==$act)
	{{ Form::open(array('route'=>'cuti.store', 'class'=>'form-horizontal')) }}
@elseif('edit'==$act)
	{{ Form::model($cuti, array('route' => array('cuti.update', $cuti->id), 'method' => 'PUT', 'class'=>'form-horizontal')) }}
	<script type="text/javascript">
		$( document ).ready(function() {
				var uid = document.getElementById("uid").value
			    loadXMLDoc(uid);
			});
	</script>
@endif

	<div class="form-group">
		{{ Form::label('uid', 'Nama *', array('class'=>'col-sm-2 control-label')) }}
		<div class="input-group col-xs-6">
			@if(Auth::user()->level==3)
			{{ Form::text('nama', Auth::user()->name.' - '.Auth::user()->division['name'].' - '.Auth::user()->position, array('class'=>'form-control input-sm', 'id'=>'nama', 'placeholder'=>'Nama Lengkap', 'data-provide'=>'typeahead','readonly')) }}
			{{ Form::hidden('uid', Auth::user()->id) }}
		@else
			{{ Form::select('uid', array(''=>'- Pilih -') + $auth_option, Input::old('uid'), array('class'=>'form-control input-sm chosen-select', 'id'=>'uid', 'onChange'=>'loadXMLDoc(this.value)', 'required'))}}

			<div class="well well-sm" id="myDiv">Pilih nama</div>

			<script>
			function loadXMLDoc(uid)
			{
				var xmlhttp;
				if (window.XMLHttpRequest)
				  {// code for IE7+, Firefox, Chrome, Opera, Safari
				  	xmlhttp=new XMLHttpRequest();
				  }
				else
				  {// code for IE6, IE5
				  	xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
				  }
				xmlhttp.onreadystatechange=function()
				  {
					  if (xmlhttp.readyState==4 && xmlhttp.status==200)
					    {
					    // document.getElementById("myDiv").innerHTML=xmlhttp.responseText;
					    var v = JSON.parse(xmlhttp.responseText);
				    	document.getElementById("myDiv").innerHTML = '<table class="table"><tr><td><b>Nama</b></td><td>: '+v['user']['name']+'</td></tr><tr><td><b>Mulai kerja</b></td><td>: '+v['user']['work_date']+'</td></tr><tr><td><b>Divisi</b></td><td>: '+v['user']['division']['name']+'</td></tr><tr><td><b>Jabatan</b></td><td>: '+v['user']['position']+'</td></tr><tr><td><b>Sisa Cuti</b></td><td>: </td></tr></table>';
					    }
					  else if(xmlhttp.readyState<4)
					  {
					    document.getElementById("myDiv").innerHTML='Loading ... ';
					  }
					   else
					   {
					    document.getElementById("myDiv").innerHTML='Terjadi kesalahan : '+xmlhttp.responseText+'<br><input type="button" value="Reload" onclick="window.location.reload();return false;"> ';
					   }
				  }
				xmlhttp.open("GET","{{URL::to('userinfo')}}?uid="+uid,true);
				xmlhttp.setRequestHeader("X-Requested-With","XMLHttpRequest");
				xmlhttp.send();
			}
			</script>
		@endif
		<span class="help-block alert-danger">{{ $errors->first('uid') }}</span>
		</div>
	</div>

@if(Auth::user()->level==3)
	<div class="form-group">
	{{ Form::label('start_work', 'Mulai Kerja ', array('class'=>'col-sm-2 control-label')) }}
		<div class="input-group date col-xs-6" id="start_work" data-date-format="YYYY-MM-DD">
			{{ Form::text('start_work', Auth::user()->work_date, array('class'=>'form-control input-sm', 'id'=>'start_work', 'placeholder'=>'Mulai Kerja', 'readonly')) }}
		</div>
	</div>
@endif
	<div class="form-group">
	{{ Form::label('task', 'Jenis Cuti/Ijin *', array('class'=>'col-sm-2 control-label')) }}
		<div class="input-group col-xs-6">
			<div class="radio">
			  <label>{{Form::radio('task', 'Tahunan untuk periode tahun 2011-2012')}} Tahunan untuk periode tahun ini </label>
			</div>
			<div class="radio">
			  <label>{{Form::radio('task', 'Hamil & melahirkan (3 bulan)')}} Hamil & melahirkan (3 bulan) </label>
			</div>
			<div class="radio">
			  <label>{{Form::radio('task', 'Istri melahirkan / keguguran (2 minggu)')}} Istri melahirkan / keguguran (2 minggu) </label>
			</div>
			<div class="radio">
			  <label>{{Form::radio('task', 'Pernikahan pekerja (3 hari)')}} Pernikahan pekerja (3 hari) </label>
			</div>
			<div class="radio">
			  <label>{{Form::radio('task', 'Pernikahan anak pekerja (2 hari)')}} Pernikahan anak pekerja (2 hari) </label>
			</div>
			<div class="radio">
			  <label>{{Form::radio('task', 'Pernikahan saudara / ipar kandung pekerja (1 hari)')}} Pernikahan saudara / ipar kandung pekerja (1 hari) </label>
			</div>
			<div class="radio">
			  <label>{{Form::radio('task', 'Khitanan / baptis anak pekerja (2 hari)')}} Khitanan / baptis anak pekerja (2 hari) </label>
			</div>
			<div class="radio">
			  <label>{{Form::radio('task', 'Kematian orang tua, mertua, saudara kandung & ipar pekerja (3 hari)')}} Kematian orang tua, mertua, saudara kandung & ipar pekerja (3 hari) </label>
			</div>
			<div class="radio">
			  <label>{{Form::radio('task', 'Kematian anggota keluarga dalam satu rumah (1 hari)')}} Kematian anggota keluarga dalam satu rumah (1 hari) </label>
			</div>
			<div class="radio">
			  <label>{{Form::radio('task', 'Adopsi anak (10 hari)')}} Adopsi anak (10 hari) </label>
			</div>
			<div class="radio">
			  <label>{{Form::radio('task', 'Haid (max 2 hari)')}} Haid (max 2 hari) </label>
			</div>
			<div class="radio">
			  <label>{{Form::radio('task', 'other')}} Cuti lainnya {{Form::text('tasks','',array('placeholder'=>'Deskripsi cuti'))}}</label>
			</div>

			<span class="help-block alert-danger">{{ $errors->first('task') }}</span>
		</div>
	</div>

	<div class="form-group">
	{{ Form::label('start_date', 'Tanggal Mulai *', array('class'=>'col-sm-2 control-label')) }}
		<div class="input-group col-xs-6" id="start_date" data-date-format="YYYY-MM-DD">
			{{ Form::text('start_date', Input::old('start_date'), array('class'=>'form-control input-sm', 'id'=>'start_date', 'placeholder'=>'Tanggal Mulai Cuti', 'required')) }}
			<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
			<span class="help-block alert-danger">{{ $errors->first('start_date') }}</span>
		</div>
	</div>
	
	<div class="form-group">
	{{ Form::label('finish_date', 'Tanggal Sampai *', array('class'=>'col-sm-2 control-label')) }}
		<div class="input-group col-xs-6" id="finish_date" data-date-format="YYYY-MM-DD">
			{{ Form::text('finish_date', Input::old('finish_date'), array('class'=>'form-control input-sm', 'id'=>'finish_date', 'placeholder'=>'Tanggal Cuti Sampai', 'required')) }}
			<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
			<span class="help-block alert-danger">{{ $errors->first('finish_date') }}</span>
		</div>
	</div>

	<div class="form-group">
	{{ Form::label('address', 'Alamat *', array('class'=>'col-sm-2 control-label')) }}
		<div class="input-group col-xs-6">
			{{ Form::textarea('address', Input::old('address'), array('class'=>'form-control input-sm', 'id'=>'address', 'placeholder'=>'Alamat / Telepon selama cuti', 'required')) }}
			<span class="help-block alert-danger">{{ $errors->first('address') }}</span>
		</div>
	</div>

	<div class="form-group">
		{{ Form::label('auth_uid', 'Wewenang kepada *', array('class'=>'col-sm-2 control-label')) }}
		<div class="input-group col-xs-6">
			{{-- Form::text('auth_uid', Input::old('auth_uid'), array('class'=>'form-control input-sm', 'id'=>'auth_uid', 'placeholder'=>'Wewenang selama cuti diserahkan kepada', 'required', 'autofocus')) --}}
			{{ Form::select('auth_uid', array(''=>'- Pilih -') + $auth_option, Input::old('auth_uid'), array('class'=>'form-control input-sm chosen-select', 'id'=>'auth_uid'))}}
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
                $('#start_work').datetimepicker({
                	pickTime: false,
    				// defaultDate:"1/1/1990"
                });
            });
			$(function(){
                $('#start_date').datetimepicker({
                	pickTime: false,
                	// minDate:"2014-08-01",
    				// defaultDate:"1/1/1990"
                });
            });
			$(function(){
                $('#finish_date').datetimepicker({
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