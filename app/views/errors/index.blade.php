@extends('layout')
@section('title')
	List Error
@stop

@section('content')

<div class="panel panel-primary">
  <!-- Default panel contents -->
  <div class="panel-heading">Error List</div>

	@if (Session::has('message'))
		<div class="alert alert-info alert-dismissable">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			{{ Session::get('message') }}
		</div>
	@endif

	<table class="table table-considered table-bordered table-hover">
		<thead>
			<tr>
				<th>No</th>
				<th>Kode Error</th>
				<th>Pengirim</th>
				<th>URL</th>
				<th>Error Message</th>
				<th>Tanggal</th>
				<th>Status</th>
				<th class="hidden-print">Detail</th>
			</tr>
		</thead>
		<tbody>
			<?php $i=$db->getFrom(); ?>
			@foreach($db as $key => $value)
				<tr>
					<td>{{ $i }}</td>
					<td>{{{ $value->error_code }}}</td>
					<td>{{ $value->name }}</td>
					<td>{{ Str::limit(urldecode($value->ref_url), 20) }}</td>
					<td>{{ Str::limit(urldecode($value->error_message), 20) }}</td>
					<td>{{{ $value->created_at }}}</td>
					<td>
						@if($value->status==0)
							<label class="label label-success">Terselesaikan</label>
						@else ($value->status==1)
							<label class="label label-default">Menunggu</label>
						@endif
					</td>
					
					<td class="hidden-print">
						{{ Form::open(array('route' => array('errors.destroy',$value->id), 'style' => 'margin-bottom:0')) }}
							<a class="btn btn-xs btn-success" href="{{ URL::route('errors.show', $value->id) }}">
								<span class="glyphicon glyphicon-eye-open"></span>
							</a>
						
						{{ Form::close() }}
					</td>
				</tr>
				<?php $i++; ?>
			@endforeach
		</tbody>
	</table>

	<center class="hidden-print">
	@if(isset($keyword))
	{{ $db->appends(array('search' => $keyword))->links() }}
	@else
	{{ $db->links() }}
	@endif</center>
</div>

@stop