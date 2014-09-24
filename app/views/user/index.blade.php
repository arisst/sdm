@extends('layout')
@section('title')
	List User
@stop

@section('content')

<div class="panel panel-primary">
  <!-- Default panel contents -->
  <div class="panel-heading">User List</div>
  <div class="panel-body">

	@include('action', array('p' => 'User', 'l'=>'users', 'a'=>'active'))

    {{ Form::open(array('route'=>'users.index', 'method'=>'get', 'class'=>'navbar-form navbar-right', 'role'=>'form')) }}
    <div class="form-group">
	    {{ Form::text('search', (isset($keyword)) ? $keyword : '', array('class'=>'form-control input-sm', 'placeholder'=>'Search...','autofocus'))}}
	    <a href="{{ URL::route('users.index') }}" type="button" class="btn hidden-print btn-default btn-sm">
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
				<th>Name</th>
				<th>Username</th>
				<th>Divisi</th>
				<!-- <th>Position</th> -->
				<th>Posisi</th>
				<th>Status</th>
				<th class="hidden-print">Actions</th>
			</tr>
		</thead>
		<tbody>
			<?php $i=$users->getFrom(); ?>
			@foreach($users as $key => $value)
				<tr>
					<td>{{ $i }}</td>
					<td>{{{ $value->name }}}</td>
					<td>{{{ $value->username }}}</td>
					<td>{{{ $value->division_name }}}</td>
					<!-- <td>{{{ $value->position }}}</td> -->
					<td>
						@if ($value->level == '1') Admin
						@elseif ($value->level == '2') Koordinator
						@elseif ($value->level == '3') Staff
						@elseif ($value->level == '4') Asisten Koordinator
						@else Unknown
						@endif
					</td>
					<td>
						@if ($value->status == '0') Pending
						@elseif ($value->status == '1') Active
						@elseif ($value->status == '2') Blocked
						@else Unknown
						@endif
					</td>
					<td class="hidden-print">
						{{ Form::open(array('route' => array('users.destroy',$value->id), 'style' => 'margin-bottom:0')) }}
							<a class="btn btn-xs btn-success" href="{{ URL::route('users.show', $value->id) }}">
								<span class="glyphicon glyphicon-eye-open"></span>
							</a>
							<a class="btn btn-xs btn-info" href="{{ URL::route('users.edit',$value->id) }}">
								<span class="glyphicon glyphicon-edit"></span> 
							</a>
							{{ Form::hidden('_method', 'DELETE') }}
							<button type="submit" class="btn btn-xs btn-danger" onclick="return confirm('Delete this data?');">
								<span class="glyphicon glyphicon-trash"></span> 
							</button>
						{{ Form::close() }}
					</td>
				</tr>
				<?php $i++; ?>
			@endforeach
		</tbody>
	</table>
	<center class="hidden-print">
	@if(isset($keyword))
	{{ $users->appends(array('search' => $keyword))->links() }}
	@else
	{{ $users->links() }}
	@endif</center>
</div>

@stop