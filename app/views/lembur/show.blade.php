@extends('layout')
@section('title')
	Show Detail Cuti
@stop

@section('content')

<div class="panel panel-primary">
  <!-- Default panel contents -->
  <div class="panel-heading">Detail pengajuan lembur</div>
  <div class="panel-body">
  	@include('action', array('p' => 'Lembur', 'l'=>'lembur', 'a'=>'active'))
<br><br>
  	<table class="table table-bordered">
      <tr><th width="15%">Penanggung Jawab</th><td>{{{$c->name}}}</td></tr>
      <tr><th>Kegiatan</th><td>{{{$c->task}}}</td></tr>
      <tr><td colspan="2"><em>Mengajukan lembur bagi</em></td></tr>
    	<tr><th>Nama</th><td>{{{$c->name2}}}</td></tr>
      <tr><th>Tugas</th><td>{{{$c->address}}}</td></tr>
    	<tr><th>Lokasi</th><td>{{{$c->venue}}}</td></tr>
      <tr><th>Mulai</th><td>{{{Permit::tanggal($c->start_date, 'l, d F Y H:i')}}}</td></tr>
      <tr><th>Sampai</th><td>{{{Permit::tanggal($c->finish_date, 'l, d F Y H:i')}}}</td></tr>
      <tr><th>Jumlah Transport</th><td>{{{$c->transportasi}}}</td></tr>
      <tr><th>Jumlah Uang Makan</th><td>{{{$c->makan}}}</td></tr>
      <tr><th>Lintas Divisi</th><td> @if($c->lintas_divisi) Ya @else Tidak @endif</td></tr>
    	<tr><th>Catatan SDM </th><td>{{{$c->note}}}</td></tr>
    	<tr><th>Waktu </th><td>Dibuat: {{Permit::tanggal($c->created_at, 'l, d F Y H:i:s')}}</td></tr>
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
    </table>
  </div>
</div>
@stop