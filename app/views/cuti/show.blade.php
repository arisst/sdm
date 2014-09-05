@extends('layout')
@section('title')
	Show Detail Cuti
@stop

@section('content')

<div class="panel panel-primary">
  <!-- Default panel contents -->
  <div class="panel-heading">Detail Cuti</div>
  <div class="panel-body">
  	@include('action', array('p' => 'Cuti', 'l'=>'cuti', 'a'=>'active'))
<br><br>
  <table class="table table-bordered">
      <tr>
        <th width="15%">Nama</th>
        <td>{{$c->name}}</td>
      </tr>
      <tr>
        <th>Mulai Bekerja</th>
        <td>{{{ date("l, d F Y", strtotime($c->start_work)) }}}</td>
      </tr>
      <tr>
        <th>Jenis Cuti</th>
        <td>{{$c->task}}</td>
      </tr>
      <tr>
        <th>Mulai</th>
        <td>{{{ date("l, d F Y", strtotime($c->start_date)) }}}</td>
      </tr>
      <tr>
        <th>Sampai</th>
        <td>{{{ date("l, d F Y", strtotime($c->finish_date)) }}}</td>
      </tr>
      <tr>
        <th>Alamat Selama Cuti</th>
        <td>{{$c->address}}</td>
      </tr>
      <tr>
        <th>Wewenang Kepada</th>
        <td>{{$c->name2}}</td>
      </tr>
      <tr>
        <th>Catatan</th>
        <td>{{$c->note}}</td>
      </tr>
      <tr>
        <th>Created</th>
        <td>{{$c->created_at}} Updated {{$c->updated_at}}</td>
      </tr>
    </table>

  </div>
</div>
@stop