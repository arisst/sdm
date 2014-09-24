<?php

class LemburController extends \BaseController {

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
			return View::make('lembur.index')->with('permits', $results)->with('keyword', $term);
		}
		else
		{
			// $permits = Permits::paginate(10);
			return View::make('lembur.index')->with('permits', Permit::listing('lembur'));
		}
	}

	public function create()
	{
		$auth_option = User::authAllOption();
		return View::make('lembur.form', array('auth_option'=>$auth_option))->with('act', 'add');
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
			'transportasi' => 'numeric|min:0',
			'makan' => 'numeric|min:0',
			'lintas_divisi' => 'required',
		);
		$messages = array(
			'required' => 'harus diisi!',
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
			$permit->types = 'lembur';
			$permit->uid = Input::get('uid');
			$permit->propose_uid = Input::get('propose_uid');
			$permit->task = Input::get('task');
			$permit->venue = Input::get('venue');
			$permit->start_date = Input::get('start_date');
			$permit->finish_date = Input::get('finish_date');
			$permit->address = Input::get('address');
			$permit->lintas_divisi = Input::get('lintas_divisi');
			$permit->note = Input::get('note');
			$permit->save();

			Logevent::create(array('uid'=>Auth::user()->id, 'ip'=>Request::getClientIp(), 'object_type'=>'lembur', 'object_action'=>'create', 'object_value'=>$permit->id, 'status'=>'success'));

			Notification::kirim('mengajukan', 'lembur', $permit->id);

			Session::flash('message', 'Pengajuan lembur berhasil!');
			return Redirect::route('lembur.index');
		}
	}

	public function show($id)
	{
		$con = Permit::detail('lembur',$id);
		$permnotif = Permit::with('notification')->find($id);
		return View::make('lembur.show')
					->with('c', $con)
					->with('permnotif', $permnotif);
	}

	public function edit($id)
	{
		$auth_option = User::authAllOption($id);
		$lembur = Permit::find($id);
		return View::make('lembur.form', array('auth_option'=>$auth_option))->with('lembur', $lembur)->with('act', 'edit');
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
			'transportasi' => 'numeric|min:0',
			'makan' => 'numeric|min:0',
			'lintas_divisi' => 'required',
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
			$permit->lintas_divisi = Input::get('lintas_divisi');
			$permit->note = Input::get('note');
			$permit->save();

			Logevent::create(array('uid'=>Auth::user()->id, 'ip'=>Request::getClientIp(), 'object_type'=>'lembur', 'object_action'=>'edit', 'object_value'=>$id, 'status'=>'success'));

			Session::flash('message', 'Successfully updated lembur!');
			return Redirect::route('lembur.index');
		}
	}

	public function destroy($id)
	{
		$lembur = Permit::find($id)->delete();

		Logevent::create(array('uid'=>Auth::user()->id, 'ip'=>Request::getClientIp(), 'object_type'=>'lembur', 'object_action'=>'delete', 'object_value'=>$id, 'status'=>'success'));

		Session::flash('message', 'Successfully deleted the lembur!');
		return Redirect::back();
	}


}
