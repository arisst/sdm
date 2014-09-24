@extends('layout')
@section('title')Home @stop

@section('content')

<?php 
if(Auth::check()){
$division = User::find(1)->division;
	$atasan = User::getAtasan(Auth::user()->id);
	$bawahan = User::getBawahan(Auth::user()->id);
}
 ?>
	@if(Session::get('error'))
		<div class="alert alert-danger fade in" role="alert">
	      <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
	      <strong>Error!</strong> Username atau password salah!
	    </div>
	@endif
<div class="jumbotron">
@if(Auth::check())
	  <h2>Welcome {{{ Auth::user()->name }}} </h2>
	  <div class="well">
	  	<table class="table table-considered">
	  		<tr>
	  			<td width="10%">Nama </td>
	  			<td> : <b>{{{ Auth::user()->name }}}</b></td>
	  		</tr>
	  		<tr>
	  			<td>Username </td>
	  			<td> : <b>{{{ Auth::user()->username }}}</b></td>
	  		</tr>
	  		<tr>
	  			<td>Email</td>
	  			<td> : <b>{{{ Auth::user()->email }}}</b></td>
	  		</tr>
	  		<tr>
	  			<td>Divisi</td>
	  			<td> : <b>{{ User::find(Auth::user()->id)->division['name']; }}</b></td>
	  		</tr>
	  		<tr>
	  			<td>Jabatan</td>
	  			<td> : <b>{{{ Auth::user()->position }}}</b></td>
	  		</tr>
	  		<tr>
	  			<td>Atasan</td>
	  			<td>  
	  				@foreach ($atasan as $key)
			         : <b>{{ HTML::linkRoute('users.show', $key->name.' - '.$key->division['name'].' - '.$key->position, array($key->id)) }} <br> </b>
			        @endforeach
        		</td>
	  		</tr>
	  		<tr>
	  			<td>Bawahan</td>
	  			<td>  
	  				@foreach ($bawahan as $key)
			         : <b>{{ HTML::linkRoute('users.show', $key->name.' - '.$key->division['name'].' - '.$key->position, array($key->id)) }} <br> </b>
			        @endforeach
        		</td>
	  		</tr>
	  		<tr>
	  			<td>Password</td>
	  			<td> : {{ HTML::linkRoute('profile-form', 'Ganti password') }}</td>
	  		</tr>
	  		
	  	</table>
	  </div>
@else
	  <p>Gunakan dengan sebaik-baiknya, segala aktifitas pada aplikasi ini akan disimpan di log sistem.</p>
	  <p><a class="btn btn-primary btn-lg" role="button">Bantuan</a></p>
@endif
	</div>

@stop