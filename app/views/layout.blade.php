@include('header')
  <body>
    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <a href="{{URL::to('/')}}" class="navbar-brand">SDM</a>  
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#mobile-toggle">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>      
      	</div>
        <div class="collapse navbar-collapse" id="mobile-toggle">
        @if(Auth::check())
        <?php
        $count = (Notification::getUnread()) ? '('.Notification::getUnread().')' : '' ;
        ?>
        	<ul class="nav navbar-nav"> 
            <li class="{{ Request::is('notification*') ? 'active' : '' }}">{{ HTML::link('notification', $count.' Notifikasi') }}</li>
            <li class="{{ Request::is('cuti*') ? 'active' : '' }}">{{ HTML::link('cuti', 'Cuti') }}</li>
            <li class="{{ Request::is('libur*') ? 'active' : '' }}">{{ HTML::link('libur', 'Libur') }}</li>
            <li class="{{ Request::is('file*') ? 'active' : '' }}">{{ HTML::link('file', 'File') }}</li>
          @if(Auth::user()->level!=3)
            <li class="{{ Request::is('lembur*') ? 'active' : '' }}">{{ HTML::link('lembur', 'Lembur') }}</li>
            <li class="{{ Request::is('dinas*') ? 'active' : '' }}">{{ HTML::link('dinas', 'Dinas') }}</li>
            @if(Auth::user()->level!=4)
            <li class="{{ Request::is('users*') ? 'active' : '' }}">{{ HTML::link('users', 'User') }}</li>
            <li class="{{ Request::is('penilaian*') ? 'active' : '' }}">{{ HTML::link('penilaian', 'Penilaian') }}</li>
    			  <li class="{{ Request::is('division*') ? 'active' : '' }}">{{ HTML::link('division', 'Divisi') }}</li>
            @endif
          @endif
    			</ul>
    			<div style="text-align:right;">
    				<p class="navbar-text navbar-right"><a href="{{URL::to('profile')}}">{{Auth::user()->name}}</a>  |
    				<a href="{{ URL::to('logout') }}">Logout</a></p><p class="navbar-text navbar-right">{{--Auth::user()->nama--}}</p>
    			</div>
        @else
          {{Form::open(array('route'=>'login-submit', 'class'=>'navbar-form navbar-right', 'role'=>'form'))}}
            <div class="form-group">
              {{Form::text('username', Input::old('username'), array('class'=>'form-control', 'placeholder'=>'Username', 'autofocus', 'required'))}}
            </div>
            <div class="form-group">
              {{Form::password('password', array('class'=>'form-control', 'placeholder'=>'Password', 'required'))}}
            </div>
            <button type="submit" class="btn btn-inverse">Login</button>
          {{Form::close()}}
        @endif

        </div>
      </div>
    </div>
    <div class="container">
    	<div style="padding-top:60px;">
			@yield('content')
		</div>
	</div>
  </body>
</html>