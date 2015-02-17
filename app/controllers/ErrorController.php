<?php

class ErrorController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$perpage = 10;
		$db = DB::table('report_errors')
					->select(DB::raw('report_errors.*, users.name'))
					->join('users','report_errors.user_id','=','users.id')
					->orderBy('created_at', 'desc')
					->paginate($perpage);
		return View::make('errors.index')->with('db', $db);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$rules = array(
			'error_code' => 'required',
		);
		
		$validator = Validator::make(Input::all(), $rules);

		if ($validator->fails()) 
		{
			return Redirect::back();
		} 
		else 
		{
			$user_id = Auth::id();
			$ref_url = URL::previous();
			$error_code = urlencode(Input::get('error_code'));
			$error_message = urlencode(Input::get('error_message'));

			DB::insert("insert into report_errors (user_id, ref_url, error_code, error_message, status, created_at) values ('$user_id', '$ref_url', '$error_code', '$error_message', '1', NOW())");	

			return Redirect::to('/');
		}
	}
	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$db = DB::table('report_errors')
					->select(DB::raw('report_errors.*, users.name'))
					->join('users','report_errors.user_id','=','users.id')
					->where('report_errors.id','=',$id)
					->first();
		return View::make('errors.show')
					->with('values', $db);
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


}
