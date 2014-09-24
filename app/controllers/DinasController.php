<?php

class DinasController extends \BaseController {

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
			return View::make('dinas.index')->with('permits', $results)->with('keyword', $term);
		}
		else
		{
			return View::make('dinas.index')->with('permits', Permit::listing('dinas'));
		}
	}

	public function create()
	{
		$auth_option = User::authAllOption();
		return View::make('dinas.form', array('auth_option'=>$auth_option))->with('act', 'add');
	}

	public function store()
	{
		$rules = array(
			'task' => 'required',
			'address' => 'required',
			'venue' => 'required',
			'start_date' => 'required|date_format:Y-m-d H:i',
			'finish_date' => 'required|date_format:Y-m-d H:i',
			'propose_uid' => 'required',
			'auth_uid' => 'required',
		);
		$messages = array(
			'required' => ':attribute harus diisi!',
			'date_format' => 'Format tanggal salah (contoh: 2014-09-24 14:50)'
		);
		$validator = Validator::make(Input::all(), $rules, $messages);

		if ($validator->fails()) 
		{
			return Redirect::back()->withErrors($validator)->withInput(Input::all());
		} 
		else 
		{
			$permit = new Permit;
			$permit->types = 'dinas';
			$permit->uid = Input::get('uid');
			$permit->propose_uid = Input::get('propose_uid');
			$permit->task = Input::get('task');
			$permit->venue = Input::get('venue');
			$permit->start_date = Input::get('start_date');
			$permit->finish_date = Input::get('finish_date');
			$permit->address = Input::get('address');
			$permit->auth_uid = Input::get('auth_uid');
			$permit->auth_task = Input::get('auth_task');			
			$permit->save();

			Logevent::create(array('uid'=>Auth::user()->id, 'ip'=>Request::getClientIp(), 'object_type'=>'dinas', 'object_action'=>'create', 'object_value'=>$permit->id, 'status'=>'success'));

			Notification::kirim('mengajukan', 'dinas', $permit->id);

			Session::flash('message', 'Pengajuan dinas berhasil!');
			return Redirect::route('dinas.index');
		}
	}

	public function show($id)
	{
		$con = Permit::detail('dinas',$id);
		$permnotif = Permit::with('notification')->find($id);
		return View::make('dinas.show')
					->with('c', $con)
					->with('permnotif', $permnotif);
	}

	public function edit($id)
	{
		$auth_option = User::authOption($id);
		$dinas = Permit::find($id);
		return View::make('dinas.form', array('auth_option'=>$auth_option))->with('dinas', $dinas)->with('act', 'edit');
	}

	public function update($id)
	{
		$rules = array(
			'task' => 'required',
			'address' => 'required',
			'venue' => 'required',
			'start_date' => 'required|date_format:Y-m-d H:i',
			'finish_date' => 'required|date_format:Y-m-d H:i',
			'propose_uid' => 'required',
			'auth_uid' => 'required',
		);
		$messages = array(
			'required' => ':attribute harus diisi!',
			'date_format' => 'Format tanggal salah (contoh: 2014-09-24 14:50)'
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
			$permit->propose_uid = Input::get('propose_uid');
			$permit->task = Input::get('task');
			$permit->venue = Input::get('venue');
			$permit->start_date = Input::get('start_date');
			$permit->finish_date = Input::get('finish_date');
			$permit->address = Input::get('address');
			$permit->auth_uid = Input::get('auth_uid');
			$permit->auth_task = Input::get('auth_task');
			$permit->save();

			Logevent::create(array('uid'=>Auth::user()->id, 'ip'=>Request::getClientIp(), 'object_type'=>'dinas', 'object_action'=>'edit', 'object_value'=>$id, 'status'=>'success'));

			Session::flash('message', 'Successfully updated dinas!');
			return Redirect::route('dinas.index');
		}
	}

	public function destroy($id)
	{
		$user = Permit::find($id)->delete();

		Logevent::create(array('uid'=>Auth::user()->id, 'ip'=>Request::getClientIp(), 'object_type'=>'dinas', 'object_action'=>'delete', 'object_value'=>$id, 'status'=>'success'));

		Session::flash('message', 'Successfully deleted the dinas!');
		return Redirect::back();
	}


}
