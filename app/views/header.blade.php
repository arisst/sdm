<?php
if(Auth::check()){
	$count = (Notification::getUnread()) ? '('.Notification::getUnread().')' : '' ;
}else{
	$count = '';
}
?>
<html>
<head>
  <title> {{$count}} @yield('title') | SDM Komnas Perempuan</title>

  {{HTML::style('assets/bootstrap/css/bootstrap.min.css')}}    
  {{HTML::style('assets/bootstrap/css/datetimepicker.css')}}    
  {{HTML::script('assets/bootstrap/js/jquery.min.js')}}    
  {{HTML::script('assets/bootstrap/js/moment.js')}}    
  {{HTML::script('assets/bootstrap/js/bootstrap.min.js')}}    
  {{HTML::script('assets/bootstrap/js/tooltips.js')}}    
  {{HTML::script('assets/bootstrap/js/bootstrap-datetimepicker.js')}}    
  
</head>