<?php

class DivisionController extends \BaseController {

	public function index()
	{
		$perpage = 10;
		if(Input::get('search'))
		{
			$term = Input::get('search');
			$query = DB::table('divisions');
				$query->where('name', 'LIKE', '%'.$term.'%');
			$results = $query->paginate($perpage);
			return View::make('division.index')->with('divisions', $results)->with('keyword', $term);
		}
		else
		{
			return View::make('division.index')->with('divisions', Division::paginate(10));
		}
	}

	public function create()
	{
		return View::make('division.form')->with('act', 'add');
	}

	public function store()
	{
		$rules = array(
			'name' => 'required',
		);
		$messages = array(
			'required' => 'harus diisi!',
		);
		$validator = Validator::make(Input::all(), $rules, $messages);

		if ($validator->fails()) 
		{
			return Redirect::back()->withErrors($validator)->withInput(Input::all());
		} 
		else 
		{
			$permit = new Division;
			$permit->name = Input::get('name');
			$permit->save();

			Logevent::create(array('uid'=>Auth::user()->id, 'ip'=>Request::getClientIp(), 'object_type'=>'division', 'object_action'=>'create', 'object_value'=>$permit->id, 'status'=>'success'));

			Session::flash('message', 'Add division berhasil!');
			return Redirect::route('division.index');
		}
	}

	public function edit($id)
	{
		$division = Division::find($id);
		return View::make('division.form')->with('division', $division)->with('act', 'edit');
	}

	public function update($id)
	{
		$rules = array(
			'name' => 'required',
		);
		$messages = array(
			'required' => 'harus diisi!',
		);
		$validator = Validator::make(Input::all(), $rules, $messages);

		if ($validator->fails()) 
		{
			return Redirect::back()->withErrors($validator)->withInput(Input::all());
		} 
		else 
		{
			$permit = Division::find($id);
			$permit->name = Input::get('name');
			$permit->save();

			Logevent::create(array('uid'=>Auth::user()->id, 'ip'=>Request::getClientIp(), 'object_type'=>'division', 'object_action'=>'edit', 'object_value'=>$id, 'status'=>'success'));

			Session::flash('message', 'Successfully updated division!');
			return Redirect::route('division.index');
		}
	}

	public function destroy($id)
	{
		$user = Division::find($id);
		$user->delete();

		Logevent::create(array('uid'=>Auth::user()->id, 'ip'=>Request::getClientIp(), 'object_type'=>'division', 'object_action'=>'delete', 'object_value'=>$id, 'status'=>'success'));

		Session::flash('message', 'Successfully deleted the division!');
		return Redirect::back();
	}


}
