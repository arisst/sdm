<?php

class BaseController extends Controller {

	protected function setupLayout()
	{
		if ( ! is_null($this->layout))
		{
			$this->layout = View::make($this->layout);
		}
	}

	public function agreement($permit_id, $status)
	{
		if (Auth::user()->level!=3) 
		{
			$agreement = Agreement::create(array('user_id'=>Auth::user()->id, 'permit_id'=>Crypt::decrypt($permit_id), 'status'=>$status));

			Logevent::write('agreement', 'set', $agreement->id);

			// Notification::kirim('mengajukan', 'cuti', $permit->id);

			return Redirect::back();
		}
	}

}
