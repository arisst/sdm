<?php

class FileController extends BaseController {


	public function index()
	{
		return View::make('file.index');
	}


	public function create()
	{
		// $p = User::find(2)->permit;
		// $p = Permit::find(3)->user;
		// $p = Rule::find(23)->user; //mencari user dengan id rule 23
		// $p = User::find(2)->rule; //mencari rule dengan id user 2
		$p = User::find(3)->division;
		// $p = Division::find(1)->user;
		return $p;
	}


	public function store()
	{
		//
	}


	public function show($id)
	{
		//
	}

	public function edit($id)
	{
		//
	}


	public function update($id)
	{
		//
	}


	public function destroy($id)
	{
		//
	}


}
