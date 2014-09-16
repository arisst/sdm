<?php 
class Agreement extends Eloquent
{
	protected $guarded = array('id');

	public function setUpdatedAtAttribute($value)
	{
	    // Do nothing.
	}
	
	public function user()
	{
		$this->hasMany('User', 'id', 'user_id');
	}
	
	public function permit()
	{
		$this->hasOne('Permit', 'id', 'permit_id');
	}

}