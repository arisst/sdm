<?php
class UsersController extends BaseController {

	public function index()
	{
		if(Auth::user()->level!=1) App::abort(401);
		$perpage = 10;
		if(Input::get('search'))
		{
			$term = Input::get('search');
			$query = DB::table('users');
				$query->where('name', 'LIKE', '%'.$term.'%')
				->orWhere('email', 'LIKE', '%'.$term.'%');
			$results = $query->paginate($perpage);
			return View::make('user.index')->with('users', $results)->with('keyword', $term);
		}
		else
		{
			$users = User::listing();
			return View::make('user.index')->with('users', $users);
		}
	}

	public function create()
	{
		if(Auth::user()->level!=1) App::abort(401);
		$auth_option = User::authOption();
		$list_divisi = Division::lists('name','id');
		return View::make('user.form', array('auth_option'=>$auth_option, 'list_divisi'=>$list_divisi, 'parent'=>'', 'child'=>''))->with('act', 'add');
	}

	public function store()
	{
		if(Auth::user()->level!=1) App::abort(401);
		$rules = array(
			'name' => 'required',
			'username' => 'required|alpha_dash|unique:users',
			'email' => 'required|email|unique:users',
			'phone' => 'required|numeric',
			'division_id' => 'required|numeric',
			'level' => 'required|numeric',
			'password' => 'required|min:4|same:passconf',
			'passconf' => 'required'
		);
		$messages = array(
			'required' => 'harus diisi!',
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
			$user = new User;
			$user->name = Input::get('name');
			$user->username = Input::get('username');
			$user->email = Input::get('email');
			$user->phone = Input::get('phone');
			$user->division_id = Input::get('division_id');

			switch (Input::get('level')) {
				case '2':
					$position = 'Koordinator';
					break;
				case '3':
					$position = 'Staff';
					break;
				case '4':
					$position = 'Asisen Koordinator';
					break;
				default:
					$position = '';
					break;
			}
			$user->position = $position;
			$user->level = Input::get('level');
			$user->status = 1;
			$user->password = Hash::make(Input::get('password'));
			$user->save();

			/* Insert Ke Rule */
			if(Input::has('parent_uid'))
			{
				foreach (Input::get('parent_uid') as $key) 
				{
					Rule::create(array('uid'=>$user->id, 'parent_uid'=>$key));
				}
			}

			$folder = File::makeDirectory('files/users/'.$user->id);
			if($folder)
			{
				Logevent::create(array('uid'=>Auth::user()->id, 'ip'=>Request::getClientIp(), 'object_type'=>'user', 'object_action'=>'create', 'object_value'=>$user->id, 'status'=>'success'));
				Session::flash('message', 'Successfully created user!');
			}
			else
			{
				Logevent::create(array('uid'=>Auth::user()->id, 'ip'=>Request::getClientIp(), 'object_type'=>'user', 'object_action'=>'create', 'object_value'=>$user->id, 'status'=>'directory not created'));
				Session::flash('message', 'User created but can\'t create directory!, contact your system administrator!');
			}

			return Redirect::route('users.index');
		}
	}

	public function show($id)
	{
		$user = User::find($id);
		$atasan = User::getAtasan($id);
		$bawahan = User::getBawahan($id);
		return View::make('user.show', array('rule'=>$atasan, 'rule2'=>$bawahan))->with('user', $user);
	}

	public function edit($id)
	{
		if(Auth::user()->level!=1) App::abort(401);
		$list_divisi = Division::lists('name','id');
		$auth_option = User::authOption($id);
		$user = User::find($id);
		$parent = Rule::where('uid',$id)->lists('parent_uid');
		return View::make('user.form', array('list_divisi'=>$list_divisi, 'auth_option'=>$auth_option, 'parent'=>$parent))->with('user', $user)->with('act', 'edit');
	}

	public function update($id)
	{
		if(Auth::user()->level!=1) App::abort(401);
		$rules = array(
			'name' => 'required',
			'username' => 'required|alpha_dash|unique:users,username,'.$id,
			'email' => 'required|email|unique:users,email,'.$id,
			'phone' => 'required|numeric',
			'division_id' => 'required|numeric',
			'level' => 'required|numeric',
			'password' => 'min:4|same:passconf'
		);
		$messages = array(
			'required' => 'harus diisi!',
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
			/* Update Ke User*/
			$user = User::find($id);
			$user->name = Input::get('name');
			$user->username = Input::get('username');
			$user->email = Input::get('email');
			$user->phone = Input::get('phone');
			$user->division_id = Input::get('division_id');
			switch (Input::get('level')) {
				case '2':
					$position = 'Koordinator';
					break;
				case '3':
					$position = 'Staff';
					break;
				case '4':
					$position = 'Asisen Koordinator';
					break;
				default:
					$position = '';
					break;
			}
			$user->position = $position;
			$user->level = Input::get('level');
			if(Input::get('password')) $user->password = Hash::make(Input::get('password'));
			$user->save();

			/* Insert Ke Rule*/
			Rule::where('uid',$user->id)->delete();
			if(Input::has('parent_uid'))
			{
				foreach (Input::get('parent_uid') as $key) 
				{
					if($user->id!=$key) Rule::create(array('uid'=>$user->id, 'parent_uid'=>$key));
				}
			}

			/* Insert ke Log */
			Logevent::create(array('uid'=>Auth::user()->id, 'ip'=>Request::getClientIp(), 'object_type'=>'user', 'object_action'=>'edit', 'object_value'=>$user->id, 'status'=>'success'));

			Session::flash('message', 'Successfully updated user!');
			return Redirect::route('users.index');
		}
	}

	public function destroy($id)
	{
		if(Auth::user()->level!=1) App::abort(401);
		$user = User::find($id)->delete();

		Logevent::create(array('uid'=>Auth::user()->id, 'ip'=>Request::getClientIp(), 'object_type'=>'user', 'object_action'=>'delete', 'object_value'=>$id, 'status'=>'success'));
		Session::flash('message', 'Successfully deleted the user!');
		return Redirect::back();
	}

}
