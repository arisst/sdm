@extends('layout')
@section('title')
	Show User
@stop

@section('content')

<div class="panel panel-primary">
  <!-- Default panel contents -->
  <div class="panel-heading">Show {{{$user->name}}}</div>
  <div class="panel-body">
  	@if(Auth::user()->level==1) 
      @include('action', array('p' => 'User', 'l'=>'users', 'a'=>'active'))
    @else
      <a href="{{ URL::previous() }}" type="button" class="btn btn-default hidden-print btn-sm">
        <span class="glyphicon glyphicon-arrow-left"></span> Back 
      </a>
    @endif
<br><br>
<div class="col-md-6">
<table class="table table-bordered">
  <tr>
    <td>Nama</td>
    <td><b>{{{$user->name}}}</b></td>
  </tr>
  <tr>
    <td>Username</td>
    <td><b>{{{$user->username}}}</b></td>
  </tr>
  <tr>
    <td>Email</td>
    <td><b>{{HTML::mailto($user->email, $user->email)}}</b></td>
  </tr>
  <tr>
    <td>No. HP</td>
    <td><b>{{{$user->phone}}}</b></td>
  </tr>
  <tr>
    <td>Divisi</td>
    <td><b>{{{$user->division['name']}}}</b></td>
  </tr>
  <tr>
    <td>Jabatan</td>
    <td><b> @if ($user->level == '1') Admin
                            @elseif ($user->level == '2') Koordinator
                            @elseif ($user->level == '3') Staff
                            @elseif ($user->level == '4') Asisten Koordinator
                            @else Unknown
                            @endif
                          </b></td>
  </tr>
  <tr>
    <td>Atasan</td>
    <td> @foreach ($rule as $key)
          <b>{{ HTML::linkRoute('users.show', $key->name.' - '.$key->division['name'].' - '.$key->position, array($key->id)) }} <br> </b>
        @endforeach</td>
  </tr>
  <tr>
    <td>Bawahan</td>
    <td> @foreach ($rule2 as $key)
          <b>{{ HTML::linkRoute('users.show', $key->name.' - '.$key->division['name'].' - '.$key->position, array($key->id)) }} <br> </b>
        @endforeach</td>
  </tr>
  <tr>
    <td>Status</td>
    <td><b> @if ($user->status == '0') Pending
                            @elseif ($user->status == '1') Active
                            @elseif ($user->status == '2') Blocked
                            @else Unknown
                            @endif</b></td>
  </tr>
  <tr>
    <td>Created</td>
    <td>{{$user->created_at}} Updated : {{$user->updated_at}}</td>
  </tr>
</table>
<br>
</div>
  	<!-- <ul class="list-group">
      <li class="list-group-item">Nama : <b>{{{$user->name}}}</b></li>
    	<li class="list-group-item">Username : <b>{{{$user->username}}}</b></li>
    	<li class="list-group-item">Email : <b>{{ HTML::mailto($user->email, $user->email)}}</b></li>
    	<li class="list-group-item">No. HP : <b>{{{$user->phone}}}</b></li>
      <li class="list-group-item">Divisi : <b>{{{$user->division}}}</b></li>
      <li class="list-group-item">Jabatan : <b> @if ($user->level == '1') Admin
                            @elseif ($user->level == '2') Koordinator
                            @elseif ($user->level == '3') Staff
                            @elseif ($user->level == '4') Asisten Koordinator
                            @else Unknown
                            @endif
                          </b></li>
      <li class="list-group-item">Atasan : <br>
        @foreach ($rule as $key)
          <b>{{ HTML::linkRoute('users.show', $key->name.' - '.$key->division.' - '.$key->position, array($key->id)) }} <br> </b>
        @endforeach
      </li>
    	<li class="list-group-item">Bawahan : <br>
        @foreach ($rule2 as $key)
          <b>{{ HTML::linkRoute('users.show', $key->name.' - '.$key->division.' - '.$key->position, array($key->id)) }} <br> </b>
        @endforeach
      </li>
    	<li class="list-group-item">Status : <b> @if ($user->status == '0') Pending
														@elseif ($user->status == '1') Active
														@elseif ($user->status == '2') Blocked
														@else Unknown
														@endif</b></li>
    	<li class="list-group-item">Created : {{$user->created_at}} Updated : {{$user->updated_at}}</li>
  	</ul> -->

  </div>
</div>
@stop