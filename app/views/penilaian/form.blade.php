@extends('layout')
<?php 
if($act=='add')
{
	$head = 'Penilaian';
	$attr = '';

	$nilai_0 = Input::old('nilai.0');
	$nilai_1 = Input::old('nilai.1');
	$nilai_2 = Input::old('nilai.2');
	$nilai_3 = Input::old('nilai.3');
	$nilai_4 = Input::old('nilai.4');
	$nilai_5 = Input::old('nilai.5');
	$nilai_6 = Input::old('nilai.6');
	$nilai_7 = Input::old('nilai.7');

	$comments_0 = Input::old('comments.0');
	$comments_1 = Input::old('comments.1');
	$comments_2 = Input::old('comments.2');
	$comments_3 = Input::old('comments.3');
	$comments_4 = Input::old('comments.4');
	$comments_5 = Input::old('comments.5');
	$comments_6 = Input::old('comments.6');
	$comments_7 = Input::old('comments.7');
}
else if('edit'==$act)
{
	if (Input::get('view')) {
		$head = 'Detail '.$penilaian->name;
		$attr = 'readonly';
	}
	else
	{
		$head = 'Edit '.$penilaian->name;
		$attr = '';
	}

	$nilai_0 = $nilai[0];
	$nilai_1 = $nilai[1];
	$nilai_2 = $nilai[2];
	$nilai_3 = $nilai[3];
	$nilai_4 = $nilai[4];
	$nilai_5 = $nilai[5];
	$nilai_6 = $nilai[6];
	$nilai_7 = $nilai[7];

	$comments_0 = $comments[0];
	$comments_1 = $comments[1];
	$comments_2 = $comments[2];
	$comments_3 = $comments[3];
	$comments_4 = $comments[4];
	$comments_5 = $comments[5];
	$comments_6 = $comments[6];
	$comments_7 = $comments[7];
}

?>
@section('title') {{$head}} @stop
@section('content')


<div class="panel panel-primary">
  <div class="panel-heading">{{ $head }}</div>
  <div class="panel-body">
	@include('action', array('p' => 'Penilaian', 'l'=>'penilaian', 'a'=>'active'))
  </div>
	@if (Session::has('message'))
		<div class="alert alert-info alert-dismissable">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			{{ Session::get('message') }}
		</div>
	@endif
@if('add'==$act)
	{{ Form::open(array('route'=>'penilaian.store', 'class'=>'form-horizontal')) }}
@elseif('edit'==$act)
	{{ Form::model($penilaian, array('route' => array('penilaian.update', $penilaian->id), 'method' => 'PUT', 'class'=>'form-horizontal')) }}
@endif

	<div class="form-group">
		{{ Form::label('voter_uid', 'Nama *', array('class'=>'col-sm-2 control-label')) }}
		<div class="input-group col-xs-6">
		@if(Auth::user()->level!=3)
			{{ Form::select('voter_uid', array(''=>'- Pilih -') + $auth_option, Input::old('voter_uid'), array('class'=>'form-control input-sm chosen-select', 'id'=>'voter_uid'))}}
				<span class="help-block alert-danger">{{ $errors->first('voter_uid') }}</span>
		@else
			{{ Form::text('voter_uid', Auth::user()->name.' - '.Auth::user()->division['name'].' - '.Auth::user()->position, array('class'=>'form-control', 'id'=>'voter_uid', 'readonly')) }}		
		@endif
		</div>
	</div>

	<div class="form-group">
	{{ Form::label('masuk_kerja', 'Tanggal Masuk Kerja *', array('class'=>'col-sm-2 control-label')) }}
		<div class="input-group date col-xs-6" id="masuk_kerja" data-date-format="YYYY-MM-DD">
			{{ Form::text('masuk_kerja', Input::old('masuk_kerja'), array('class'=>'form-control input-sm', 'id'=>'masuk_kerja', 'placeholder'=>'Tanggal Masuk Kerja', $attr)) }}
			<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
			<span class="help-block alert-danger">{{ $errors->first('masuk_kerja') }}</span>
		</div>
	</div>

	<div class="form-group">
	{{ Form::label('periode', 'Periode *', array('class'=>'col-sm-2 control-label')) }}
		<div class="input-group date col-xs-6">
			{{ Form::text('periode', Input::old('periode'), array('class'=>'form-control input-sm', 'id'=>'periode', 'placeholder'=>'Periode', $attr)) }}
			<span class="help-block alert-danger">{{ $errors->first('periode') }}</span>
		</div>
	</div>

	<table class="table table-bordered">
		<tr>
			<th width="50%">Aspek yang Dinilai</th>
			<th width="8%">Bobot (B) <br> %</th>
			<th width="8%">Nilai (N) <br> 4 s.d. 10</th>
			<th width="8%">B X N</th>
			<th width="20%">Komentar dan Catatan <br> untuk Perbaikan</th>
		</tr>
		<tr>
			<td>
				<b>I. ASPEK HASIL KERJA (40%) </b><br>
				<div style="padding-left:20px;"> A. Kualitas Kerja (Quality of Work)</div>
				<div style="padding-left:37px;text-align:justify;">Ketepatan, Ketelitian, Ketrampilan, Kerapihan</div>
			</td>
			<td>25</td>
			<td><input type="number" required min="4" max="10" id="0" name="nilai[0]" value="{{$nilai_0}}" {{ $attr }}>
			<span class="help-block alert-danger"> {{ $errors->first('nilai.0') }}</span></td>
			<td><div id="bxn0"></div></td>
			<td> <textarea name="comments[0]" {{$attr}}>{{$comments_0}}</textarea> </td>
			<script type="text/javascript">
				$('#0').on('propertychange keyup input paste', function(){
					fungsi(0);
				});
			</script>
		</tr>
		<tr>
			<td>
				<div style="padding-left:20px;"> B. Kuantitas Kerja (Quantity of Work) </div>
				<div style="padding-left:37px;text-align:justify;">Output, perlu diperhatikan juga bukan hanya output rutin, tetapi juga seberapa cepat bisa menyelesaikan kerja "extra" (ketepatan waktu).</div>
			</td>
			<td>15</td>
			<td><input type="number" required min="4" max="10" id="1" name="nilai[1]" value="{{$nilai_1}}" {{ $attr }}><span class="help-block alert-danger"> {{ $errors->first('nilai.1') }}</span></td>
			<td><div id="bxn1"></div></td>
			<td> <textarea name="comments[1]" {{$attr}}>{{$comments_1}}</textarea> </td>
			<script type="text/javascript">
				$('#1').on('propertychange keyup input paste', function(){
					fungsi(1);
				});
			</script>
		</tr>
		<tr>
			<td>
				<b>II. ASPEK KARAKTERISTIK PRIBADI (40%) </b><br>
				<div style="padding-left:20px;"> A. Disiplin (Dicipline)</div>
				<div style="padding-left:15px;text-align:justify;">
					<ul>
						<li>Ketaatan pada peraturan lembaga</li>
						<li>Hadir secara rutin dan tepat waktu</li>
						<li>Menggunakan waktu dengan efisien</li>
						<li>Menentukan dan mengatur prioritas kerja secara efektif</li>
					</ul>
				</div>
			</td>
			<td>10</td>
			<td><input type="number" required min="4" max="10" id="2" name="nilai[2]" value="{{$nilai_2}}" {{ $attr }}><span class="help-block alert-danger"> {{ $errors->first('nilai.2') }}</span></td>
			<td><div id="bxn2"></div></td>
			<td> <textarea name="comments[2]" {{$attr}}>{{$comments_2}}</textarea> </td>
			<script type="text/javascript">
				$('#2').on('propertychange keyup input paste', function(){
					fungsi(2);
				});
			</script>
		</tr>
		<tr>
			<td>
				<div style="padding-left:20px;"> B. Kerjasama (Team Work)</div>
				<div style="padding-left:15px;text-align:justify;">
					<ul>
						<li>Kesediaan kerjasama dalam kelompok (di dalam/luar unit kerjanya)</li>
						<li>Mengutamakan kepentingan-kepentingan lembaga daripada kepentingan pribadi</li>
					</ul>
				</div>
			</td>
			<td>10</td>
			<td><input type="number" required min="4" max="10" id="3" name="nilai[3]" value="{{$nilai_3}}" {{ $attr }}><span class="help-block alert-danger"> {{ $errors->first('nilai.3') }}</span></td>
			<td><div id="bxn3"></div></td>
			<td> <textarea name="comments[3]" {{$attr}}>{{$comments_3}}</textarea> </td>
			<script type="text/javascript">
				$('#3').on('propertychange keyup input paste', function(){
					fungsi(3);
				});
			</script>
		</tr>
		<tr>
			<td>
				<div style="padding-left:20px;"> C. Semagat Kerja (Motivation)</div>
				<div style="padding-left:15px;text-align:justify;">
					<ul>
						<li>Antusias dalam menjalankan tugas</li>
						<li>Komitmen dan tanggung jawab terhadap pekerjaan</li>
						<li>Berhasrat untuk maju dan berkembang</li>
					</ul>
				</div>
			</td>
			<td>10</td>
			<td><input type="number" required min="4" max="10" id="4" name="nilai[4]" value="{{$nilai_4}}" {{ $attr }}><span class="help-block alert-danger"> {{ $errors->first('nilai.4') }}</span></td>
			<td><div id="bxn4"></div></td>
			<td> <textarea name="comments[4]" {{$attr}}>{{$comments_4}}</textarea> </td>
			<script type="text/javascript">
				$('#4').on('propertychange keyup input paste', function(){
					fungsi(4);
				});
			</script>
		</tr>
		<tr>
			<td>
				<div style="padding-left:20px;"> D. Sikap Kerja (Attitude)</div>
				<div style="padding-left:15px;text-align:justify;">
					<ul>
						<li>Integitas/kejujuran terhadap lembaga</li>
						<li>Sikap positif terhadap lembaga/atasan/rekan/mitra kerja</li>
						<li>Positif terhadap perubahan/ide-ide baru yang ada</li>
						<li>Kesadaran memelihara peralatan dan perlengkapan kerja milik lembaga</li>
					</ul>
				</div>
			</td>
			<td>10</td>
			<td><input type="number" required min="4" max="10" id="5" name="nilai[5]" value="{{$nilai_5}}" {{ $attr }}><span class="help-block alert-danger"> {{ $errors->first('nilai.5') }}</span></td>
			<td><div id="bxn5"></div></td>
			<td> <textarea name="comments[5]" {{$attr}}>{{$comments_5}}</textarea> </td>
			<script type="text/javascript">
				$('#5').on('propertychange keyup input paste', function(){
					fungsi(5);
				});
			</script>
		</tr>
		<tr>
			<td>
				<b>III. ASPEK KEPEMIMPINAN (20%)</b>
				<div style="padding-left:20px;"> A. PDCA (plan, Do, Check, Action)</div>
				<div style="padding-left:15px;text-align:justify;">
					<ul>
						<li>Mempunyai rencana dan alternatif rencana kerja</li>
						<li>Menjalankan rencana sesuai prinsip prioritas</li>
						<li>Melakukan evaluasi rutin terhadap pencapaian target dari rencana yang sudah ditetapkan</li>
						<li>Melakukan "tindakan pencegahan" dan "tindakan perbaikan" atas masalah yang ada (preventive adn corrective action)</li>
					</ul>
				</div>
			</td>
			<td>10</td>
			<td><input type="number" required min="4" max="10" id="6" name="nilai[6]" value="{{$nilai_6}}" {{ $attr }}><span class="help-block alert-danger"> {{ $errors->first('nilai.6') }}</span></td>
			<td><div id="bxn6"></div></td>
			<td> <textarea name="comments[6]" {{$attr}}>{{$comments_6}}</textarea> </td>
			<script type="text/javascript">
				$('#6').on('propertychange keyup input paste', function(){
					fungsi(6);
				});
			</script>
		</tr>
		<tr>
			<td>
				<div style="padding-left:20px;"> B. People management</div>
				<div style="padding-left:15px;text-align:justify;">
					<ul>
						<li>Mendapatkan komitmen bawahan</li>
						<li>Mengarahkan dan membibing</li>
						<li>Menilai karya dan menghargai</li>
						<li>Memecahkan masalah secara bersama</li>
						<li>Membangaun semangat kerjasama</li>
					</ul>
				</div>
			</td>
			<td>10</td>
			<td><input type="number" required min="4" max="10" id="7" name="nilai[7]" value="{{$nilai_7}}" {{ $attr }}><span class="help-block alert-danger"> {{ $errors->first('nilai.7') }}</span></td>
			<td><div id="bxn7"></div></td>
			<td> <textarea name="comments[7]" {{$attr}}>{{$comments_7}}</textarea> </td>
			<script type="text/javascript">
				$('#7').on('propertychange keyup input paste', function(){
					fungsi(7);
				});
			</script>
		</tr>
		<tr>
			<th>Total Nilai</th>
			<th>100 %</th>
			<th><div id="jumlaha"></div> </th>
			<th><div id="bxna"></div><input type="hidden" name="jumlah_nilai" id="bxnah"></th>
			<th></th>
			<script type="text/javascript">
				$('#0, #1, #2, #3, #4, #5, #6, #7').on('propertychange keyup input paste', function(){
					total();
				});
			</script>
		</tr> 
	</table>
	<h5>TOTAL PENILAIAN</h5>
	<table class="table table-bordered">
		<tr>
			<th>Total Nilai</th>
			<th width="13%" class="tn0">4 - 4,9 </th>
			<th width="13%" class="tn1">5 - 5,9 </th>
			<th width="13%" class="tn2">6 - 6,9 </th>
			<th width="13%" class="tn3">7 - 7,9 </th>
			<th width="13%" class="tn4">8 - 8,9 </th>
			<th width="13%" class="tn5">9 - 10 </th>
		</tr>
		<tr>
			<th>Keterangan</th>
			<td class="tn0">Tidak pernah memenuhi tuntutan pekerjaan <br><br> KS = Kurang Sekali</td>
			<td class="tn1">Jarang tuntutan pekerjaan <br><br> K = Kurang</td>
			<td class="tn2">Dapat tuntutan pekerjaan <br><br> C = Cukup</td>
			<td class="tn3">Kadang-kadang melebihi tuntutan pekerjaan <br><br> B = Baik</td>
			<td class="tn4">Sering melebihi tuntutan pekerjaan <br><br> BS = Baik Sekali</td>
			<td class="tn5">Selalu melebihi tuntutan pekerjaan <br><br> IST = Istimewa</td>

		</tr>
	</table>
	<h4>Komentar-komentar Penilai</h4>
	<div class="form-group">
	{{ Form::label('kelebihan', 'Hal-hal yang menjadi kelebihan karyawan', array('class'=>'col-sm-3 control-label')) }}
		<div class="input-group col-xs-6">
			{{ Form::textarea('kelebihan', Input::old('kelebihan'), array('size'=>'30x4','class'=>'form-control input-sm', 'id'=>'kelebihan', $attr)) }}
			<span class="help-block alert-danger">{{ $errors->first('kelebihan') }}</span>
		</div>
	</div>
	<div class="form-group">
	{{ Form::label('peningkatan', 'Hal-hal yang perlu ditingkatkan', array('class'=>'col-sm-3 control-label')) }}
		<div class="input-group col-xs-6">
			{{ Form::textarea('peningkatan', Input::old('peningkatan'), array('size'=>'30x4','class'=>'form-control input-sm', 'id'=>'peningkatan', $attr)) }}
			<span class="help-block alert-danger">{{ $errors->first('peningkatan') }}</span>
		</div>
	</div>
	<div class="form-group">
	{{ Form::label('note', 'Komentar/Catatan Lain', array('class'=>'col-sm-3 control-label')) }}
		<div class="input-group col-xs-6">
			{{ Form::textarea('note', Input::old('note'), array('size'=>'30x4','class'=>'form-control input-sm', 'id'=>'note', $attr)) }}
			<span class="help-block alert-danger">{{ $errors->first('note') }}</span>
		</div>
	</div>

	<div class="form-group">
		{{ Form::label('rencana_peningkatan', 'Rencana Pengembangan dan Peningkatan Tanggung Jawab', array('class'=>'col-sm-3 control-label')) }}
			<div class="input-group col-xs-6">
				{{ Form::textarea('rencana_peningkatan', Input::old('rencana_peningkatan'), array('size'=>'30x4','class'=>'form-control input-sm', 'id'=>'rencana_peningkatan', $attr)) }}
				<span class="help-block alert-danger">{{ $errors->first('rencana_peningkatan') }}</span>
			</div>
	</div>

	<div class="form-group">
		{{ Form::label('target', 'Target yang disepakati', array('class'=>'col-sm-3 control-label')) }}
			<div class="input-group col-xs-6">
				{{ Form::textarea('target', Input::old('target'), array('size'=>'30x4','class'=>'form-control input-sm', 'id'=>'target', $attr)) }}
				<span class="help-block alert-danger">{{ $errors->first('target') }}</span>
			</div>
	</div>

	<div class="form-group">
		<div class="col-sm-offset-3">
	
@if($act=='edit')
		@if(!Input::get('view'))
			<button type="submit" class="btn btn-sm btn-primary"><span class="glyphicon glyphicon-save"></span> Submit</button>
		@else
			@if(Auth::user()->id==$penilaian->voter_uid)
				<a class="btn btn-sm btn-success" data-toggle="modal" data-target="#myModal">
						<span class="glyphicon glyphicon-edit"></span> Kirim Masukan/Respon
					</a>
			@else
			  @if(Auth::user()->level!=5 && Auth::user()->level!=6)
				<a class="btn btn-sm btn-info" href="?">
					<span class="glyphicon glyphicon-edit"></span> Edit
				</a>
			  @endif
			@endif
		@endif
@elseif($act=='add')
	<button type="submit" class="btn btn-sm btn-primary"><span class="glyphicon glyphicon-save"></span> Submit</button>
	<a type="button" href="{{URL::previous()}}" class="btn btn-sm btn-default"><span class="glyphicon glyphicon-remove"></span> Cancel</a>
@endif
			<a class="btn btn-sm btn-default" href="{{URL::previous()}}">
				<span class="glyphicon glyphicon-share"></span> Back
			</a>
		</div>
	</div>

	{{ Form::close() }}
</div>

@if($act=='edit')
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Form Masukan / komentar</h4>
      </div>
    {{Form::open(array('route'=>array('penilaian-feedback', $penilaian->id), 'class'=>'form-horizontal'))}}
      <div class="modal-body">
      	<div class="form-group">
		{{ Form::label('voter_comments', 'Komentar/Masukan dari Karyawan', array('class'=>'col-sm-4 control-label')) }}
			<div class="input-group col-xs-6">
				{{ Form::textarea('voter_comments', $penilaian->voter_comments, array('size'=>'30x4','class'=>'form-control input-sm', 'id'=>'voter_comments', 'required')) }}
				<span class="help-block alert-danger">{{ $errors->first('voter_comments') }}</span>
			</div>
		</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
	{{Form::close()}}
    </div>
  </div>
</div>
@endif

{{HTML::style('assets/chosen/chosen.css')}}    
{{HTML::script('assets/chosen/chosen.jquery.js')}}    

<script type="text/javascript">
	//on load
	$(document).ready(function(){
		for (var i = 0; i <= 7; i++) {
			fungsi(i);
		};
		total();
	});

	//DATETIME PICKER
    $(function(){
        $('#masuk_kerja').datetimepicker({
        	pickTime: false,
			// defaultDate:"1/1/1990"
        });
    });

    //Hitung otomatis
    function fungsi(fieldID) {
		var input = document.getElementById(fieldID).value;
		var bobot = 0;
		if(fieldID==0){
			bobot = 25;
		}else if(fieldID==1){
			bobot = 15;
		}else{
			bobot = 10;
		}
		var jumlah = input*bobot;
		if(input <= 10 && input >=4){
		    $('#bxn'+fieldID).text(jumlah);
		    return jumlah;
		}else{
		    $('#bxn'+fieldID).text(0);
		    return 0;
		}
	}

	function total() {
		var total = 0;
		for (var i = 0; i <= 7; i++) {
			total += fungsi(i);
		};
		var totalp = total/100;
		$('#bxna').text(totalp);
		var hidden = document.getElementById('bxnah');
		hidden.value = totalp;
		resetbg();
		if(totalp>=4 && totalp<=4.9)
		{
			$('.tn0').css('background','#9AD1FD');
		} 
		else if(totalp>=5 && totalp<=5.9){
			$('.tn1').css('background','#9AD1FD');
		}
		else if(totalp>=6 && totalp<=6.9){
			$('.tn2').css('background','#9AD1FD');
		}
		else if(totalp>=7 && totalp<=7.9){
			$('.tn3').css('background','#9AD1FD');
		}
		else if(totalp>=8 && totalp<=8.9){
			$('.tn4').css('background','#9AD1FD');
		}
		else if(totalp>=9 && totalp<=10){
			$('.tn5').css('background','#9AD1FD');
		}
		return totalp;
	}

	function resetbg () {
		for (var i = 0; i <= 5; i++) {
			$('.tn'+i).css('background','');
		};
	}

	//CHOSEN SELECT
	var config = {
      '.chosen-select'           : {}
    }
    for (var selector in config) {
      $(selector).chosen(config[selector]);
    }
</script>
@stop