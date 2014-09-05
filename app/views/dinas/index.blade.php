@extends('layout')
@section('title')
	List Dinas
@stop

@section('content')

<div class="panel panel-primary">
  <!-- Default panel contents -->
  <div class="panel-heading">Dinas List</div>
  <div class="panel-body">

	@include('action', array('p' => 'Dinas', 'l'=>'dinas', 'a'=>'active'))

    {{ Form::open(array('route'=>'dinas.index', 'method'=>'get', 'class'=>'navbar-form navbar-right', 'role'=>'form')) }}
    <div class="form-group">
	    {{ Form::text('search', (isset($keyword)) ? $keyword : '', array('class'=>'form-control input-sm', 'placeholder'=>'Search...','autofocus'))}}
	    <a href="{{ URL::route('dinas.index') }}" type="button" class="btn hidden-print btn-default btn-sm">
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
				<th>Pelaksana</th>
				<th>Mulai</th>
				<th>Sampai</th>
				<th>Status</th>
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
					<td></td>
					
					<td class="hidden-print">
						{{ Form::open(array('route' => array('dinas.destroy',$value->id), 'style' => 'margin-bottom:0')) }}
							<a class="btn btn-xs btn-success" href="{{ URL::route('dinas.show', $value->id) }}">
								<span class="glyphicon glyphicon-eye-open"></span>View
							</a>
						@if(Auth::user()->level==1)
							<a class="btn btn-xs btn-info" href="{{ URL::route('dinas.edit',$value->id) }}">
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