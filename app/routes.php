<?php
/* Login */
Route::post('login', array('before'=>'csrf','as'=>'login-submit','uses'=>'AccountController@doLogin'));
Route::get('logout', array('as'=>'logout','uses'=>'AccountController@doLogout'));

Route::get('/', array('as'=>'index',function()
{
	return View::make('dashboard.index');
}));

Route::group(array('before' => 'auth'), function()
    {
		/* ELFINDER ROUTES */
        Route::get('elfinder', 'Barryvdh\Elfinder\ElfinderController@showIndex');
        Route::any('elfinder/connector', 'Barryvdh\Elfinder\ElfinderController@showConnector');

        /* Global Route */
		Route::get('file', 'FileController@index');
		Route::get('notification', array('as'=>'notificationindex', 'uses'=>'NotificationController@index'));
		Route::get('notification/read/{id?}', array('as'=>'notificationread', 'uses'=>'NotificationController@read'));
		Route::get('notification/go/{id?}', array('as'=>'notificationgo', 'uses'=>'NotificationController@pergi'));

		Route::get('agreement/{permit?}.{uid?}.{permit_id?}.{status?}', array('as'=>'agreement', 'uses'=>'BaseController@agreement'));

		Route::get('log', 'BaseController@logview');

		Route::get('profile',array('as'=>'profile-form','uses'=>'AccountController@showProfile'));
		Route::post('profile',array('as'=>'profile-submit','uses'=>'AccountController@doProfile'));
        
		Route::post('penilaian/feedback/{id?}', array('as'=>'penilaian-feedback', 'uses'=>'PenilaianController@feedback'));
		
		Route::resource('users', 'UsersController');
		Route::resource('cuti', 'CutiController');
		Route::resource('dinas', 'DinasController');
		Route::resource('lembur', 'LemburController');
		Route::resource('libur', 'LiburController');
		Route::resource('file', 'FileController');// ???
		Route::resource('penilaian', 'PenilaianController');
		Route::resource('division', 'DivisionController');
    });

Route::get('img/{file?}', function($file){
	$response = Response::make(File::get('packages/barryvdh/laravel-elfinder/img/'.$file));
	$response->header('Content-Type', 'image/png');
	return $response;
});

/* DEBUG QUERY */
/*Event::listen('illuminate.query', function($query, $bindings, $time, $name)
{
	$data = compact('bindings', 'time', 'name');

        // Format binding data for sql insertion
        foreach ($bindings as $i => $binding)
        {   
            if ($binding instanceof \DateTime)
            {   
                $bindings[$i] = $binding->format('\'Y-m-d H:i:s\'');
            }
            else if (is_string($binding))
            {   
                $bindings[$i] = "'$binding'";
            }   
        }       

        // Insert bindings into query
        $query = str_replace(array('%', '?'), array('%%', '%s'), $query);
        $query = vsprintf($query, $bindings); 
        
    var_dump($query);
});*/


