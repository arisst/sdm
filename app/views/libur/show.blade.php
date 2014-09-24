@extends('layout')
@section('title')
	Show Detail Libur
@stop

@section('content')

<div class="panel panel-primary">
  <!-- Default panel contents -->
  <div class="panel-heading">Formulir Libur Kompensasi</div>
  <div class="panel-body">
  	@include('action', array('p' => 'Libur', 'l'=>'libur', 'a'=>'active'))
<br><br>
  	<table class="table table-bordered">
      <tr><th width="15%">Nama</th><td>{{{$c->name}}}</td></tr>
      <tr><td colspan="2"><em>Mengajukan libur kompensasi setelah melaksanakan kegiatan</em></td></tr>
      <tr><th>Nama Kegiatan</th><td>{{{$c->task}}}</td></tr>
      <tr><th>Lama Kegiatan</th><td>{{{$c->transportasi}}}</td></tr>
      <tr><th>Tanggal Kegiatan</th><td>{{{ Permit::tanggal($c->start_work, 'l, d F Y')}}}</td></tr>
      <tr><th>Tempat</th><td>{{{$c->venue}}}</td></tr>
      <tr><td colspan="2"><em>Mengajukan libur kompensasi pada </em></td></tr>
      <tr><th>Tanggal</th><td>{{{Permit::tanggal($c->start_date, 'l, d F Y')}}}</td></tr>
      <tr><th>Alamat Selama Libur</th><td>{{{$c->address}}}</td></tr>
      <tr><td colspan="2"><em>Selama libur wewenang diserahkan kepada</em></td></tr>
      <tr><th>Wewenang Kepada</th><td>{{{$c->name2}}}</td></tr>
    	<tr><th>Catatan </th><td>{{{$c->note}}}</td></tr>
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
            <a class="btn btn-sm btn-success" href="{{ URL::route('agreement', array('libur', $c->uid, Crypt::encrypt($c->id), 1)) }}" onclick="return confirm('Setujui pengajuan ini?');">
              <span class="glyphicon glyphicon-ok"></span> Setujui
            </a>
            <a class="btn btn-sm btn-warning" href="{{ URL::route('agreement', array('libur', $c->uid, Crypt::encrypt($c->id), 2)) }}" onclick="return confirm('Tolak pengajuan ini?');">
              <span class="glyphicon glyphicon-remove"></span> Tolak
            </a>
        </td>
      </tr>
    @endif
  	</table>
  </div>
</div>
@stop