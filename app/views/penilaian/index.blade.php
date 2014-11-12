@extends('layout')
@section('title')
	List Penilaian
@stop

@section('content')

<div class="panel panel-primary">
  <!-- Default panel contents -->
  <div class="panel-heading">Penilaian List</div>
  <div class="panel-body">

	@include('action', array('p' => 'Penilaian', 'l'=>'penilaian', 'a'=>'active'))

    {{ Form::open(array('route'=>'penilaian.index', 'method'=>'get', 'class'=>'navbar-form navbar-right', 'role'=>'form')) }}
    <div class="form-group">
	    {{ Form::text('search', (isset($keyword)) ? $keyword : '', array('class'=>'form-control input-sm', 'placeholder'=>'Search...','autofocus'))}}
	    <a href="{{ URL::route('penilaian.index') }}" type="button" class="btn hidden-print btn-default btn-sm">
		  <span class="glyphicon glyphicon-refresh"></span> Reset
		</a>
    </div>
    {{ Form::close() }}
  </div>
	@if (Session::has('message'))
		<div class="alert alert-info alert-dismissable">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			{{ Session::get('message') }}
		</div>
	@endif

	<table class="table table-condensed table-bordered table-hover">
		<thead>
			<tr>
				<th>No</th>
				<th>Nama</th>
				<th>Periode</th>
				<th>Nilai</th>
				<th>Status</th>
				<th class="hidden-print">Actions</th>
			</tr>
		</thead>
		<tbody>
			<?php $i=$penilaian->getFrom(); ?>
			@foreach($penilaian as $key => $value)
				<tr>
					<td>{{ $i }}</td>
					<td>{{{ $value->name }}}</td>
					<td>{{{ $value->periode }}}</td>
					<td>{{{ $value->jumlah_nilai }}}</td>
					<td>
						@if ($value->status == 1) Disetujui
						@elseif ($value->status == 2) Ditolak
						@else Menunggu
						@endif
					</td>
					
					<td class="hidden-print">
						{{ Form::open(array('route' => array('penilaian.destroy',$value->id), 'style' => 'margin-bottom:0')) }}
							<a class="btn btn-xs btn-success" href="{{ URL::route('penilaian.edit', $value->id) }}?view=true" data-toggle="tooltip" data-placement="top" title="Lihat detail">
								<span class="glyphicon glyphicon-eye-open"></span>
							</a>
						@if(Auth::user()->level!=5 && Auth::user()->level!=6)
							<a class="btn btn-xs btn-info" href="{{ URL::route('penilaian.edit',$value->id) }}">
								<span class="glyphicon glyphicon-edit"></span> 
							</a>
							{{ Form::hidden('_method', 'DELETE') }}
							<button type="submit" class="btn btn-xs btn-danger" onclick="return confirm('Delete this data?');">
								<span class="glyphicon glyphicon-trash"></span> 
							</button>
						@endif
						{{ Form::close() }}
					</td>
				</tr>
				<?php $i++; ?>
			@endforeach
		</tbody>
	</table>
	<center class="hidden-print">
	@if(isset($keyword))
	{{ $penilaian->appends(array('search' => $keyword))->links() }}
	@else
	{{ $penilaian->links() }}
	@endif</center>
</div>

@stop