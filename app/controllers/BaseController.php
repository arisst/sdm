<?php

class BaseController extends Controller {

	protected function setupLayout()
	{
		if ( ! is_null($this->layout))
		{
			$this->layout = View::make($this->layout);
		}
	}

	public function agreement($permit, $uid, $permit_id, $status)
	{
		$permit_id = Crypt::decrypt($permit_id);
		if (Auth::user()->level!=3) 
		{
			$agreement = Agreement::create(array('user_id'=>Auth::user()->id, 'permit_id'=>$permit_id, 'status'=>$status));

			Logevent::write('agreement', 'set', $agreement->id);

			$activity = ($status==1) ? 'menyetujui' : 'menolak' ;
			Notification::kirim($activity, $permit, $permit_id, $uid);

			return Redirect::back();
		}
	}

	public function logview()
	{
		return Response::json(Logevent::orderBy('id', 'desc')->get());
		// return gethostbyaddr(Request::getClientIp());
	}

}
