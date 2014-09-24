@extends('layout')
@section('title')
	Show Detail Dinas
@stop

@section('content')

<div class="panel panel-primary">
  <!-- Default panel contents -->
  <div class="panel-heading">Detail Pengajuan Dinas</div>
  <div class="panel-body">
  	@include('action', array('p' => 'Dinas', 'l'=>'dinas', 'a'=>'active'))
<br><br>
  	<table class="table table-bordered">
      <tr><th width="20%">Penanggung Jawab</th><td>{{{$c->name}}}</td></tr>
      <tr><th>Kegiatan </th><td>{{{$c->task}}}</td></tr>
      <tr><td colspan="2"><em>Mengajukan dinas bagi</li>
    	<tr><th>Nama</th><td>{{{$c->name2}}}</td></tr>
      <tr><th>Tugas</th><td>{{{$c->address}}}</td></tr>
    	<tr><th>Lokasi</th><td>{{{$c->venue}}}</td></tr>
      <tr><th>Mulai</th><td>{{{Permit::tanggal($c->start_date, 'l, d F Y H:i')}}}</td></tr>
      <tr><th>Sampai</th><td>{{{Permit::tanggal($c->finish_date, 'l, d F Y H:i')}}}</td></tr>
      <tr><th>Wewenang kepada</th><td>{{{$c->name3}}}</td></tr>
      <tr><th>Pekerjaan yang dialihkan</th><td>{{{$c->auth_task}}}</td></tr>
    	<tr><th>Waktu</th><td>Dibuat : {{Permit::tanggal($c->created_at, 'l, d F Y H:i:s')}}</td></tr>
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
            <a class="btn btn-sm btn-success" href="{{ URL::route('agreement', array('dinas', $c->uid, Crypt::encrypt($c->id), 1)) }}" onclick="return confirm('Setujui pengajuan ini?');">
              <span class="glyphicon glyphicon-ok"></span> Setujui
            </a>
            <a class="btn btn-sm btn-warning" href="{{ URL::route('agreement', array('dinas', $c->uid, Crypt::encrypt($c->id), 2)) }}" onclick="return confirm('Tolak pengajuan ini?');">
              <span class="glyphicon glyphicon-remove"></span> Tolak
            </a>
        </td>
      </tr>
    @endif
  </div>
</div>
@stop