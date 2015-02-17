<?php

class CutiController extends \BaseController {

	public function index()
	{
		$perpage = 10;
		if(Input::get('search'))
		{
			$term = Input::get('search');
			return View::make('cuti.index')
						->with('permits', Permit::listing('cuti', $term))
						->with('keyword', $term);
		}
		else
		{
			return View::make('cuti.index')->with('permits', Permit::listing('cuti'));
		}
	}

	public function create()
	{
		$auth_option = User::authAllOption();
		return View::make('cuti.form', array('auth_option'=>$auth_option))->with('act', 'add');
	}

	public function store()
	{
		$rules = array(
			'uid' => 'required',
			// 'start_work' => 'required|date_format:"Y-m-d"',
			'tasks' => 'required_if:task,other',
			'start_date' => 'required|date_format:"Y-m-d"',
			'finish_date' => 'required|date_format:"Y-m-d"',
			'address' => 'required',
			'auth_uid' => 'required|different:uid',
		);
		$messages = array(
			'required' => ':attribute harus diisi!',
			'date_format' => 'Format tanggal salah (contoh: 2014-09-24)',
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
			$permit->types = 'cuti';
			$permit->uid = Input::get('uid');
			// $permit->start_work = Input::get('start_work');
			$task = (Input::get('task')=='other') ? Input::get('tasks') : Input::get('task') ;
			$permit->task = $task;
			$permit->start_date = Input::get('start_date');
			$permit->finish_date = Input::get('finish_date');
			$permit->address = Input::get('address');
			$permit->auth_uid = Input::get('auth_uid');
			$permit->note = Input::get('note');
			
			$permit->save();

			Logevent::create(array('uid'=>Auth::user()->id, 'ip'=>Request::getClientIp(), 'object_type'=>'cuti', 'object_action'=>'create', 'object_value'=>$permit->id, 'status'=>'success'));

			Notification::kirim('mengajukan', 'cuti', $permit->id);
			// Notification::kirim('memberikan wewenang', 'cuti', $permit->id, $permit->auth_uid);

			Session::flash('message', 'Pengajuan cuti berhasil!');
			return Redirect::route('cuti.index');
		}
	}

	public function show($id)
	{
		$con = Permit::detail('cuti', $id);
		$permnotif = Permit::with('notification')->find($id);
		return View::make('cuti.show')
					->with('c', $con)
					->with('permnotif', $permnotif);
	}

	public function edit($id)
	{
		$auth_option = User::authAllOption($id);
		$cuti = Permit::find($id);
		return View::make('cuti.form', array('auth_option'=>$auth_option))->with('cuti', $cuti)->with('act', 'edit');
	}

	public function update($id)
	{
		$rules = array(
			'uid' => 'required',
			// 'start_work' => 'required|date_format:"Y-m-d"',
			'tasks' => 'required_if:task,other',
			'start_date' => 'required|date_format:"Y-m-d"',
			'finish_date' => 'required|date_format:"Y-m-d"',
			'address' => 'required',
			'auth_uid' => 'required|different:uid',
		);
		$messages = array(
			'required' => ':attribute harus diisi!',
			'date_format' => 'Format tanggal salah (contoh: 2014-09-24)',
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
			// $permit->start_work = Input::get('start_work');
			$task = (Input::get('task')) ? Input::get('task') : Input::get('tasks') ;
			$permit->task = $task;
			$permit->start_date = Input::get('start_date');
			$permit->finish_date = Input::get('finish_date');
			$permit->address = Input::get('address');
			$permit->auth_uid = Input::get('auth_uid');
			$permit->note = Input::get('note');
			
			$permit->save();

			Logevent::create(array('uid'=>Auth::user()->id, 'ip'=>Request::getClientIp(), 'object_type'=>'cuti', 'object_action'=>'edit', 'object_value'=>$id, 'status'=>'success'));

			Session::flash('message', 'Successfully updated cuti!');
			return Redirect::route('cuti.index');
		}
	}

	public function destroy($id)
	{
		$user = Permit::find($id);
		$user->delete();

		Logevent::create(array('uid'=>Auth::user()->id, 'ip'=>Request::getClientIp(), 'object_type'=>'cuti', 'object_action'=>'delete', 'object_value'=>$id, 'status'=>'success'));

		Session::flash('message', 'Successfully deleted the cuti!');
		return Redirect::back();
	}


}
