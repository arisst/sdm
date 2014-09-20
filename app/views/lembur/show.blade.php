@extends('layout')
@section('title')
	Show Detail Cuti
@stop

@section('content')

<div class="panel panel-primary">
  <!-- Default panel contents -->
  <div class="panel-heading">Show {{{$c->name}}}</div>
  <div class="panel-body">
  	@include('action', array('p' => 'Lembur', 'l'=>'lembur', 'a'=>'active'))
<br><br>
  	<ul class="list-group">
      <li class="list-group-item list-group-item-info">Detail pengajuan lembur : </li>
      <li class="list-group-item">Penanggung Jawab : <b>{{{$c->name}}}</b></li>
      <li class="list-group-item">Kegiatan : <b>{{{$c->task}}}</b></li>
      <li class="list-group-item list-group-item-warning">Mengajukan lembur bagi : </li>
    	<li class="list-group-item">Nama : <b>{{{$c->name2}}}</b></li>
      <li class="list-group-item">Tugas : <b>{{{$c->address}}}</b></li>
    	<li class="list-group-item">Lokasi : <b>{{{$c->venue}}}</b></li>
      <li class="list-group-item">Mulai : <b>{{{$c->start_date}}}</b></li>
      <li class="list-group-item">Sampai : <b>{{{$c->finish_date}}}</b></li>
      <li class="list-group-item">Jumlah Transport : <b>{{{$c->transportasi}}}</b></li>
      <li class="list-group-item">Jumlah Uang Makan : <b>{{{$c->makan}}}</b></li>
      <li class="list-group-item">Lintas Divisi : <b> @if($c->lintas_divisi) Ya @else Tidak @endif</b></li>
    	<li class="list-group-item">Catatan SDM: <b>{{{$c->note}}}</b></li>
    	<li class="list-group-item">Created : <b>{{$c->created_at}}</b></li>
    	<li class="list-group-item">Updated : <b>{{$c->updated_at}}</b></li>
  	</ul>
    <tr>
        <th>Status</th>
        <td>
            @if($c->status==1)
              <label class="label label-success">Disetujui</label>
            @elseif ($c->status==2)
              <label class="label label-warning">Ditolak</label>
            @elseif ($c->status==0)
              <label class="label label-default">Menunggu</label>
            @endif
        </td>
      </tr>
@if($c->status==0 && $permnotif->notification['recepient_id']==Auth::user()->id)
      <tr class="hidden-print">
        <th>Action</th>
        <td>
            <a class="btn btn-sm btn-success" href="{{ URL::route('agreement', array('lembur', $c->uid, Crypt::encrypt($c->id), 1)) }}" onclick="return confirm('Setujui pengajuan ini?');">
              <span class="glyphicon glyphicon-ok"></span> Setujui
            </a>
            <a class="btn btn-sm btn-warning" href="{{ URL::route('agreement', array('lembur', $c->uid, Crypt::encrypt($c->id), 2)) }}" onclick="return confirm('Tolak pengajuan ini?');">
              <span class="glyphicon glyphicon-remove"></span> Tolak
            </a>
        </td>
      </tr>
    @endif
  </div>
</div>
@stop