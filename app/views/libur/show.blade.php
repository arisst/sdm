@extends('layout')
@section('title')
	Show Detail Libur
@stop

@section('content')

<div class="panel panel-primary">
  <!-- Default panel contents -->
  <div class="panel-heading">Formulir Libur Kompensasi {{{$c->name}}}</div>
  <div class="panel-body">
  	@include('action', array('p' => 'Libur', 'l'=>'libur', 'a'=>'active'))
<br><br>
  	<ul class="list-group">
      <li class="list-group-item list-group-item-info">Formulir Libur Kompensasi : </li>
      <li class="list-group-item">Nama : <b>{{{$c->name}}}</b></li>
      <li class="list-group-item list-group-item-warning">Mengajukan libur kompensasi setelah melaksanakan kegiatan : </li>
      <li class="list-group-item">Nama Kegiatan : <b>{{{$c->task}}}</b></li>
      <li class="list-group-item">Lama Kegiatan : <b>{{{$c->transportasi}}}</b></li>
      <li class="list-group-item">Tanggal Kegiatan : <b>{{{$c->start_work}}}</b></li>
      <li class="list-group-item">Tempat : <b>{{{$c->venue}}}</b></li>
      <li class="list-group-item list-group-item-warning">Mengajukan libur kompensasi pada : </li>
      <li class="list-group-item">Tanggal : <b>{{{$c->start_date}}}</b></li>
      <li class="list-group-item">Alamat Selama Libur : <br><b>{{{$c->address}}}</b></li>
      <li class="list-group-item list-group-item-warning">Selama libur wewenang diserahkan kepada : </li>
      <li class="list-group-item">Wewenang Kepada : <b>{{{$c->name2}}}</b></li>
    	<li class="list-group-item">Catatan : <b>{{{$c->note}}}</b></li>
    	<li class="list-group-item list-group-item-warning">Created : {{$c->created_at}}</li>
  	</ul>

  </div>
</div>
@stop