<a href="{{ URL::route($l.'.index') }}" type="button" class="btn btn-default hidden-print btn-sm {{ (Route::currentRouteName()==($l.'.index')) ? 'active' : '' }}">
  <span class="glyphicon glyphicon-th-list"></span> List {{$p}}
</a>

<a href="{{ URL::route($l.'.create') }}" type="button" class="btn btn-default hidden-print btn-sm {{ (Route::currentRouteName()==($l.'.create')) ? 'active' : '' }}">
	  <span class="glyphicon glyphicon-plus"></span> Form {{$p}}
</a>