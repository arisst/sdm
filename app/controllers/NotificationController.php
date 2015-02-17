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
		// $id = Crypt::decrypt($id_encrypted);
		$notif = Notification::findOrFail($id);
		if($notif->recepient_id==Auth::user()->id) //check credential
		{
			Notification::baca($id);
			// return Redirect::route($notif->object.'.show', array($notif->object_id, 'ref=notification'));
			switch ($notif->object) {
				case 'cuti':
					$controller = 'CutiController';
					break;
				case 'dinas':
					$controller = 'DinasController';
					break;
				case 'lembur':
					$controller = 'LemburController';
					break;
				case 'libur':
					$controller = 'LiburController';
					break;
				case 'penilaian':
					$controller = 'PenilaianController';
					break;
				default:
					App::abort(404);
					break;
			}
			return App::make($controller)->show($notif->object_id);
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
