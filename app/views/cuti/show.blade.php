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
    {{ Form::open(array('route' => array('cuti.destroy',$c->id), 'class' => 'navbar-form navbar-right')) }}
      @if(Auth::user()->level==1)
        <a class="btn btn-sm btn-info" href="{{ URL::route('cuti.edit',$c->id) }}">
          <span class="glyphicon glyphicon-edit"></span> Edit
        </a>
        {{ Form::hidden('_method', 'DELETE') }}
        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Hapus data ini?');">
          <span class="glyphicon glyphicon-trash"></span> Delete
        </button>
      @endif
    {{ Form::close() }}
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
      <tr>
        <th>Waktu</th>
        <td>Dibuat : {{$c->created_at}}, diperbarui : {{$c->updated_at}}</td>
      </tr>
    @if($c->status==0 && $permnotif->notification['recepient_id']==Auth::user()->id)
      <tr class="hidden-print">
        <th>Action</th>
        <td>
            <a class="btn btn-sm btn-success" href="{{ URL::route('agreement', array('cuti', $c->uid, Crypt::encrypt($c->id), 1)) }}" onclick="return confirm('Setujui pengajuan ini?');">
              <span class="glyphicon glyphicon-ok"></span> Setujui
            </a>
            <a class="btn btn-sm btn-warning" href="{{ URL::route('agreement', array('cuti', $c->uid, Crypt::encrypt($c->id), 2)) }}" onclick="return confirm('Tolak pengajuan ini?');">
              <span class="glyphicon glyphicon-remove"></span> Tolak
            </a>
        </td>
      </tr>
    @endif
    </table>

  </div>
</div>
@stop