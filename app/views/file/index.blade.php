@extends('layout')
@section('title')
	File Manager
@stop

@section('content')

<div class="panel panel-primary">
  <!-- Default panel contents -->
  <div class="panel-heading">File</div>
  <!-- <div class="panel-body">

  </div> -->

  <div class="alert alert-info" style="padding:10px;margin-bottom:0px;">
  <ul>
  	<li>Guanakan dengan bijak, file/folder yang sudah diupload tidak dapat dihapus, kecuali oleh admin</li>
  	<li>Untuk upload file/folder dapat langsung <i>drag and drop</i></li>
  </ul>
  </div>
  <!-- IFRAME ELFINDER -->
  <iframe src="elfinder" style="width: 100%;height: 100%;border:0;"></iframe>
	

</div>

@stop