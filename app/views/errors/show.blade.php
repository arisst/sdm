@extends('layout')
@section('title')
	Show Detail Error
@stop

@section('content')

<div class="panel panel-primary">
  <!-- Default panel contents -->
  <div class="panel-heading">Detail Error</div>
  <div class="panel-body">
  	

  <table class="table table-bordered" >
      <tr>
        <th width="15%">Kode Error</th>
        <td>{{$values->error_code}}</td>
      </tr>
      <tr>
        <th>URL</th>
        <td>{{$values->ref_url}}</td>
      </tr>
      <tr>
        <th>Isi error</th>
        <td>{{urldecode($values->error_message)}}</td>
      </tr>
      <tr>
        <th>Pengirim</th>
        <td>{{$values->name}}</td>
      </tr>
      
       <tr>
        <th>Status</th>
        <td>
            @if($values->status==1)
              <label class="label label-default">Menunggu</label>
            @else
              <label class="label label-success">Fixed</label>
            @endif
        </td>
      </tr>
      <tr>
        <th>Dikirim</th>
        <td>Dibuat : {{$values->created_at}}</td>
      </tr>
    
    </table>

  </div>
</div>
@stop