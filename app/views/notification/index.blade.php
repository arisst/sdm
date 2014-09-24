@extends('layout')
@section('title')
	List Notifikasi
@stop

@section('content')

<div class="panel panel-primary">
  <!-- Default panel contents -->
  <div class="panel-heading">Notifikasi List</div>
<!--   <div class="panel-body">

  </div> -->
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
				<th>Tanggal</th>
				<th>Dari</th>
				<th>Informasi</th>
				<th class="hidden-print">Status</th>
			</tr>
		</thead>
		<tbody>
			<?php $i=$notification->getFrom(); ?>
			@foreach($notification as $key => $value)
				<tr>
					<td>{{ $i }}</td>
					<td>{{{ Permit::tanggal($value->created_at, 'l, d/m/Y H:i') }}}</td>
					<td>{{{ $value->sender['name'].' - '.$value->sender['division']['name'].' - '.$value->sender['position'] }}}</td>
					<td>{{ HTML::linkRoute('notificationgo', $value->activity.' '.$value->object, array($value->id)) }}</td>
					<td class="hidden-print">
					@if($value->status)
						<!-- <a class="btn btn-xs btn-success" href="{{ URL::route('notificationread', $value->id) }}">
							<span class="glyphicon glyphicon-eye-open"></span>Tandai Sudah dibaca
						</a>	 -->
						<label class="label label-success">Belum dibaca</label>
					@else
						<label class="label label-default">Sudah dibaca</label>
					@endif
					</td>
				</tr>
				<?php $i++; ?>
			@endforeach
		</tbody>
	</table>
	<center class="hidden-print">
		{{ $notification->links() }}
	</center>
</div>

@stop