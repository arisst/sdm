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
}