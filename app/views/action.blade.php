@if(Route::currentRouteName()=='notificationgo')

<a href="{{ URL::previous() }}" type="button" class="btn btn-default hidden-print btn-sm">
  <span class="glyphicon glyphicon-circle-arrow-left"></span> Kembali
</a>
<br>

@else

<a href="{{ URL::route($l.'.index') }}" type="button" class="btn btn-default hidden-print btn-sm {{ (Route::currentRouteName()==($l.'.index')) ? 'active' : '' }}">
  <span class="glyphicon glyphicon-th-list"></span> List {{$p}}
</a>

@if(Auth::user()->level!=5 && Auth::user()->level!=6)
	<a href="{{ URL::route($l.'.create') }}" type="button" class="btn btn-default hidden-print btn-sm {{ (Route::currentRouteName()==($l.'.create')) ? 'active' : '' }}">
		  <span class="glyphicon glyphicon-plus"></span> Form {{$p}}
	</a>
@endif

@endif