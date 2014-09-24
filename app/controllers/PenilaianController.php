<?php

class PenilaianController extends BaseController {

	function __construct() {
		if(Auth::user()->level==3 && Route::currentRouteName()!='penilaian.edit' && Route::currentRouteName()!='penilaian.show' && Route::currentRouteName()!='penilaian-feedback') App::abort(401);
	}

	public function index()
	{
		$perpage = 10;
		if(Input::get('search'))
		{
			$term = Input::get('search');
			$query = DB::table('grades');
				$query->where('name', 'LIKE', '%'.$term.'%')
				->orWhere('email', 'LIKE', '%'.$term.'%');
			$results = $query->paginate($perpage);
			return View::make('penilaian.index')->with('penilaian', $results)->with('keyword', $term);
		}
		else
		{
			return View::make('penilaian.index')->with('penilaian', Grade::listing());
		}
	}

	public function create()
	{
		$auth_option = User::authAllOption();
		return View::make('penilaian.form', array('auth_option'=>$auth_option))->with('act', 'add');
	}

	public function store()
	{
		$rules = array(
			'voter_uid'=>'required',
			'masuk_kerja'=>'required|date_format:"Y-m-d"',
			'periode'=>'required'
			);
		for ($i=0; $i <= 7; $i++) { 
			$rules['nilai.'.$i] = 'required|numeric|between:4,10';
		}

		$messages = array(
			'required' => 'harus diisi!',
			'between' => 'nilai 4 - 10',
			'date_format' => 'Format tanggal salah (contoh: 2014-09-24)'
		);
		$validator = Validator::make(Input::all(), $rules, $messages);

		if ($validator->fails()) 
		{
			return Redirect::back()->withErrors($validator)->withInput(Input::all());
		}
		else
		{
			$grade = new Grade;
			$grade->uid = Auth::user()->id;
			$grade->masuk_kerja = Input::get('masuk_kerja');
			$grade->periode = Input::get('periode');
			$grade->nilai = serialize(Input::get('nilai'));
			$grade->jumlah_nilai = Input::get('jumlah_nilai');
			$grade->comments = serialize(Input::get('comments'));
			$grade->kelebihan = Input::get('kelebihan');
			$grade->peningkatan = Input::get('peningkatan');
			$grade->note = Input::get('note');
			$grade->rencana_peningkatan = Input::get('rencana_peningkatan');
			$grade->voter_comments = Input::get('voter_comments');
			$grade->voter_uid = Input::get('voter_uid');
			$grade->save();

			Logevent::create(array('uid'=>Auth::user()->id, 'ip'=>Request::getClientIp(), 'object_type'=>'penilaian', 'object_action'=>'create', 'object_value'=>$grade->id, 'status'=>'success'));

			Notification::kirim('memberi', 'penilaian', $grade->id, $grade->voter_uid);

			Session::flash('message', 'Penilaian disimpan');
			return Redirect::route('penilaian.index');
		} 
	}


	public function show($id)
	{
		return Redirect::route('penilaian.edit', array($id, 'view'=>'true'));
	}

	public function edit($id)
	{
		$auth_option = User::authAllOption();
		$grade = Grade::find($id);
		foreach(unserialize($grade->nilai) as $key => $value)
		{
		    $nilai[$key] = $value;
		}
		foreach(unserialize($grade->comments) as $key => $value)
		{
		    $comments[$key] = $value;
		}
		return View::make('penilaian.form', array('auth_option'=>$auth_option))
					->with('penilaian', $grade)
					->with('nilai', $nilai)
					->with('comments', $comments)
					->with('act', 'edit');
	}


	public function update($id)
	{
		$rules = array();
		for ($i=0; $i <= 7; $i++) { 
			$rules['nilai.'.$i] = 'required|numeric|between:4,10';
		}

		$messages = array(
			'required' => 'harus diisi!',
			'between' => 'nilai 4 - 10'
		);
		$validator = Validator::make(Input::all(), $rules, $messages);

		if ($validator->fails()) 
		{
			return Redirect::back()->withErrors($validator)->withInput(Input::all());
		}
		else
		{
			$grade = Grade::find($id);
			$grade->uid = Auth::user()->id;
			$grade->masuk_kerja = Input::get('masuk_kerja');
			$grade->periode = Input::get('periode');
			$grade->nilai = serialize(Input::get('nilai'));
			$grade->jumlah_nilai = Input::get('jumlah_nilai');
			$grade->comments = serialize(Input::get('comments'));
			$grade->kelebihan = Input::get('kelebihan');
			$grade->peningkatan = Input::get('peningkatan');
			$grade->note = Input::get('note');
			$grade->rencana_peningkatan = Input::get('rencana_peningkatan');
			$grade->voter_comments = Input::get('voter_comments');
			$grade->voter_uid = Input::get('voter_uid');
			$grade->save();

			Logevent::create(array('uid'=>Auth::user()->id, 'ip'=>Request::getClientIp(), 'object_type'=>'penilaian', 'object_action'=>'edit', 'object_value'=>$grade->id, 'status'=>'success'));

			Session::flash('message', 'Penilaian disimpan');
			return Redirect::route('penilaian.index');
		} 
	}

	public function feedback($id)
		{
			$rules = array(
				'voter_comments'=>'required'
				);
			$messages = array(
				'required' => 'harus diisi!'
			);
			$validator = Validator::make(Input::all(), $rules, $messages);

			if ($validator->fails()) 
			{
				return Redirect::back()->withErrors($validator)->withInput(Input::all());
			}
			else
			{
				$grade = Grade::find($id);
				$grade->voter_comments = Input::get('voter_comments');
				$grade->save();

				Logevent::create(array('uid'=>Auth::user()->id, 'ip'=>Request::getClientIp(), 'object_type'=>'penilaian', 'object_action'=>'feedback', 'object_value'=>$grade->id, 'status'=>'success'));

				Session::flash('message', 'Masukan berhasil disimpan');
				return Redirect::back();
			} 
		}


	public function destroy($id)
	{
		Grade::find($id)->delete();
		
		Logevent::create(array('uid'=>Auth::user()->id, 'ip'=>Request::getClientIp(), 'object_type'=>'penilaian', 'object_action'=>'delete', 'object_value'=>$id, 'status'=>'success'));

		Session::flash('message', 'Successfully deleted the grade!');
		return Redirect::back();
	}


}
