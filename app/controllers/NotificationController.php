<?php

class NotificationController extends BaseController {

	public function index()
	{
		$notification = Notification::with('sender')
							->where('recepient_id', Auth::user()->id)
							->orderBy('created_at', 'desc')
							->paginate(10);
		return View::make('notification.index')->with('notification', $notification);
	}

	public function pergi($id)
	{
		$notif = Notification::findOrFail($id);
		if($notif->recepient_id==Auth::user()->id) //check credential
		{
			Notification::baca($id);
			return Redirect::route($notif->object.'.show', $notif->object_id);
		}
		else
		{
			App::abort(404);
		}
	}

	public function read($id)
	{
		Notification::baca($id);
		return Redirect::back();
	}

}
