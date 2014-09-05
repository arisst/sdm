<?php 
class Rule extends Eloquent
{
	protected $guarded = array('id');
	public $timestamps = false;

	/* Relationships */

	public function user()
	{
		return $this->belongsTo('User', 'uid');
	}

	public function userparent()
	{
		return $this->belongsTo('User', 'parent_uid');
	}

}