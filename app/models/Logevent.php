<?php 
class Logevent extends Eloquent
{
	protected $guarded = array('id');
	
	public function setUpdatedAtAttribute($value)
	{
	    // Do nothing.
	}

	/* Relationships */

	public function user()
	{
		return $this->hasOne('User', 'id', 'uid');
	}

	public function permit()
	{
		return $this->hasOne('Permit', 'id', 'object_id');
	}	

	public static function write($object_type, $object_action, $object_value)
	{
		self::create(
			array(
				'uid'=>Auth::user()->id, 
				'ip'=>Request::getClientIp(), 
				'object_type'=>$object_type, 
				'object_action'=>$object_action, 
				'object_value'=>$object_value, 
				'status'=>'success'
			));
	}
}