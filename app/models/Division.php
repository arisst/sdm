<?php 
class Division extends Eloquent
{
	protected $guarded = array('id');
	public $timestamps = false;
	
	public function user()
	{
		return $this->hasMany('User', 'division_id', 'id');
	}
}