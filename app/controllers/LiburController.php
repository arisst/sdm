<?php

class LiburController extends \BaseController {

	public function index()
	{
		$perpage = 10;
		if(Input::get('search'))
		{
			$term = Input::get('search');
			$query = DB::table('permits');
				$query->where('name', 'LIKE', '%'.$term.'%')
				->orWhere('email', 'LIKE', '%'.$term.'%');
			$results = $query->paginate($perpage);
			return View::make('libur.index')->with('permits', $results)->with('keyword', $term);
		}
		else
		{
			return View::make('libur.index')->with('permits', Permit::listing('libur'));
		}
	}

	public function create()
	{
		$auth_option = User::authAllOption();
		return View::make('libur.form', array('auth_option'=>$auth_option))->with('act', 'add');
	}

	public function store()
	{
		$rules = array(
			'uid' => 'required',
			'task' => 'required',
			'transportasi' => 'required',
			'start_work' => 'required',
			'venue' => 'required',
			'start_date' => 'required',
			'address' => 'required',
			'auth_uid' => 'required|different:uid',
		);
		$messages = array(
			'required' => 'harus diisi!',
			'different' => 'Tidak boleh sama dengan nama'
		);
		$validator = Validator::make(Input::all(), $rules, $messages);

		if ($validator->fails()) 
		{
			return Redirect::back()->withErrors($validator)->withInput(Input::all());
		} 
		else 
		{
			$permit = new Permit;
			$permit->types = 'libur';
			$permit->uid = Input::get('uid');
			$permit->task = Input::get('task');
			$permit->transportasi = Input::get('transportasi');
			$permit->start_work = Input::get('start_work');
			$permit->venue = Input::get('venue');
			$permit->start_date = Input::get('start_date');
			$permit->address = Input::get('address');
			$permit->auth_uid = Input::get('auth_uid');
			$permit->note = Input::get('note');
			
			$permit->save();

			Logevent::create(array('uid'=>Auth::user()->id, 'ip'=>Request::getClientIp(), 'object_type'=>'libur', 'object_action'=>'create', 'object_value'=>$permit->id, 'status'=>'success'));

			Notification::kirim('mengajukan', 'libur', $permit->id);

			Session::flash('message', 'Pengajuan libur berhasil!');
			return Redirect::route('libur.index');
		}
	}

	public function show($id)
	{
		$con = Permit::detail('libur', $id);
		return View::make('libur.show')->with('c', $con);
	}

	public function edit($id)
	{
		$auth_option = User::authAllOption($id);
		$libur = Permit::find($id);
		return View::make('libur.form', array('auth_option'=>$auth_option))->with('libur', $libur)->with('act', 'edit');
	}

	public function update($id)
	{
		$rules = array(
			'uid' => 'required',
			'task' => 'required',
			'transportasi' => 'required',
			'start_work' => 'required',
			'venue' => 'required',
			'start_date' => 'required',
			'address' => 'required',
			'auth_uid' => 'required|different:uid',
		);
		$messages = array(
			'required' => 'harus diisi!',
			'different' => 'Tidak boleh sama dengan nama'
		);
		$validator = Validator::make(Input::all(), $rules, $messages);

		if ($validator->fails()) 
		{
			return Redirect::back()->withErrors($validator)->withInput(Input::all());
		} 
		else 
		{
			$permit = Permit::find($id);
			$permit->uid = Input::get('uid');
			$permit->task = Input::get('task');
			$permit->transportasi = Input::get('transportasi');
			$permit->start_work = Input::get('start_work');
			$permit->venue = Input::get('venue');
			$permit->start_date = Input::get('start_date');
			$permit->address = Input::get('address');
			$permit->auth_uid = Input::get('auth_uid');
			$permit->note = Input::get('note');
			
			$permit->save();

			Logevent::create(array('uid'=>Auth::user()->id, 'ip'=>Request::getClientIp(), 'object_type'=>'libur', 'object_action'=>'edit', 'object_value'=>$id, 'status'=>'success'));

			Session::flash('message', 'Successfully updated libur!');
			return Redirect::route('libur.index');
		}
	}

	public function destroy($id)
	{
		$user = Permit::find($id);
		$user->delete();

		Logevent::create(array('uid'=>Auth::user()->id, 'ip'=>Request::getClientIp(), 'object_type'=>'libur', 'object_action'=>'delete', 'object_value'=>$id, 'status'=>'success'));

		Session::flash('message', 'Successfully deleted the libur!');
		return Redirect::back();
	}


}
