@extends('layout')
@section('title')
	List Lembur
@stop

@section('content')

<div class="panel panel-primary">
  <!-- Default panel contents -->
  <div class="panel-heading">Lembur List</div>
  <div class="panel-body">

	@include('action', array('p' => 'Lembur', 'l'=>'lembur', 'a'=>'active'))

    {{ Form::open(array('route'=>'lembur.index', 'method'=>'get', 'class'=>'navbar-form navbar-right', 'role'=>'form')) }}
    <div class="form-group">
	    {{ Form::text('search', (isset($keyword)) ? $keyword : '', array('class'=>'form-control input-sm', 'placeholder'=>'Search...','autofocus'))}}
	    <a href="{{ URL::route('lembur.index') }}" type="button" class="btn hidden-print btn-default btn-sm">
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
				<th>Penanggung Jawab</th>
				<th>Kegiatan</th>
				<th>Nama</th>
				<th>Mulai</th>
				<th>Sampai</th>
				<th>Lintas Divisi</th>
				<th class="hidden-print">Actions</th>
			</tr>
		</thead>
		<tbody>
			<?php $i=$permits->getFrom(); ?>
			@foreach($permits as $key => $value)
				<tr>
					<td>{{ $i }}</td>
					<td>{{{ $value->name }}}</td>
					<td>{{{ $value->task }}}</td>
					<td>{{{ $value->name2 }}}</td>
					<td>{{{ $value->start_date }}}</td>
					<td>{{{ $value->finish_date }}}</td>
					<td>
					@if($value->lintas_divisi) Ya
					@else Tidak
					@endif
					</td>
					
					<td class="hidden-print">
						{{ Form::open(array('route' => array('lembur.destroy',$value->id), 'style' => 'margin-bottom:0')) }}
							<a class="btn btn-xs btn-success" href="{{ URL::route('lembur.show', $value->id) }}">
								<span class="glyphicon glyphicon-eye-open"></span>View
							</a>
						@if(Auth::user()->level==1)
							<a class="btn btn-xs btn-info" href="{{ URL::route('lembur.edit',$value->id) }}">
								<span class="glyphicon glyphicon-edit"></span> Edit
							</a>
							{{ Form::hidden('_method', 'DELETE') }}
							<button type="submit" class="btn btn-xs btn-danger" onclick="return confirm('Delete this data?');">
								<span class="glyphicon glyphicon-trash"></span> Delete
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
	{{ $permits->appends(array('search' => $keyword))->links() }}
	@else
	{{ $permits->links() }}
	@endif</center>
</div>

@stop