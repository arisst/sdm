<?php 
class Notification extends Eloquent
{
	protected $guarded = array('id');
	public function setUpdatedAtAttribute($value){}

	/* Relationships */

	public function sender()
	{
		return $this->hasOne('User', 'id', 'sender_id');
	}

	public function recepient()
	{
		return $this->hasOne('User', 'id', 'recepient_id');
	}

	public static function kirim($activity, $object, $object_id, $recepient_id='')
	{
		if($recepient_id=='')
		{
			$atasan = User::getAtasan(Auth::user()->id);
			foreach ($atasan as $key) 
			{
				self::create(array('recepient_id'=>$key->id, 'sender_id'=>Auth::user()->id, 'activity'=>$activity, 'object'=>$object, 'object_id'=>$object_id, 'status'=>'1'));
			}
		}
		else
		{
			self::create(array('recepient_id'=>$recepient_id, 'sender_id'=>Auth::user()->id, 'activity'=>$activity, 'object'=>$object, 'object_id'=>$object_id, 'status'=>'1'));

		}
	}

	public static function baca($id)
	{
		$notif = DB::table('notifications')->where('id', $id)->update(array('status'=>0));
	}

	public static function getUnread()
	{
		return self::where('status', 1)
			->where('recepient_id', Auth::user()->id)
			->count();
	}

}