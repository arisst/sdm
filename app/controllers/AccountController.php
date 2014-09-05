<?php
class AccountController extends BaseController {

	public function doLogin()
	{
		$rules = array('username'=>'required', 'password'=>'required');
		$validator = Validator::make(Input::all(), $rules);

		if ($validator->fails()) 
		{
			return Redirect::route('index')->withErrors($validator)->withInput(Input::except('password'));
		} 
		else 
		{
			$userdata = array('username' => Input::get('username'), 'password' => Input::get('password'), 'status'=>1);
			if (Auth::attempt($userdata)) 
			{
				if(Auth::user())
				{
					Logevent::create(array('uid'=>Auth::user()->id, 'ip'=>Request::getClientIp(), 'object_type'=>'user', 'object_action'=>'login', 'status'=>'success'));
					return Redirect::intended('/');
				}
			} 
			else 
			{
				$user = User::where('username', '=', Input::get('username'))->get();
				if($user->count()) 
				{
					foreach ($user as $key);
					$uid = $key->id;
					$type = 'user';
				}
				else
				{
					$uid = 0;
					$type = 'anonimous';
				}

				Logevent::create(array('uid'=>$uid, 'ip'=>Request::getClientIp(), 'object_type'=>$type, 'object_action'=>'login', 'status'=>'failed'));

				Session::flash('error', 'Username atau password salah!');
				return Redirect::back()->withInput(Input::except('password'));
			}
			
		}
	}

	public function getActivate($code)
	{
		$user = User::where('activate_key', '=', $code)->where('status', '=', 0);

		if ($user->count()) 
		{
			$user = $user->first();
			$user->status = 1;
			$user->activate_key = '';

			$user->save();

			if($user->save())
			{
				return Redirect::route('index')->with('message', 'Akun telah aktif, silahkan login!');
			}
		}
		return Redirect::route('index')->with('error', 'Gagal mengaktifkan / akun anda telah aktif sebelumnya, silahkan coba lagi!');
	}

	public function showProfile()
	{
		$profile = User::find(Auth::user()->id);
		return View::make('user.form')->with('profile', $profile)->with('act', 'profile');
	}

	public function doProfile()
	{
		$rules = array(
			'name' => 'required',
			'username' => 'sometimes|required|unique:users,username,'.Auth::user()->id,
			'email' => 'sometimes|required|email|unique:users,email,'.Auth::user()->id,
			'phone' => 'numeric|required',
			'password' => 'min:4|same:passconf',
		);
		$messages = array(
			'required' => ':attribute harus diisi!',
			'min' => ':attribute minimal :min karakter!',
			'unique' => ':attribute ini sudah dipakai!',
			'same' => ':attribute tidak sama dengan konfirmasi!'
		);
		$validator = Validator::make(Input::all(), $rules, $messages);

		if ($validator->fails()) 
		{
			return Redirect::back()->withErrors($validator)->withInput(Input::except('password'));
		} 
		else 
		{
			$user = User::find(Auth::user()->id);
			$user->name = Input::get('name');
			$user->email = Input::get('email');
			$user->phone = Input::get('phone');
			if(Input::get('password')) $user->password = Hash::make(Input::get('password'));
			$user->save();

			Logevent::create(array('uid'=>Auth::user()->id, 'ip'=>Request::getClientIp(), 'object_type'=>'user', 'object_action'=>'editprofile', 'object_value'=>$user->id, 'status'=>'success'));

			Session::flash('message', 'Update profile berhasil!');
			return Redirect::back();
		}
	}

	public function doLogout()
	{
		Auth::logout();
		return Redirect::route('index');
	}

}
