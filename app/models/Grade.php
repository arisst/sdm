<?php 
class Grade extends Eloquent
{
	protected $guarded = array('id');

	/* Relationships */

/*	public function user()
	{
		return $this->belongsTo('User', 'uid');
	}

	public function userparent()
	{
		return $this->belongsTo('User', 'parent_uid');
	}*/

	/* Static Function */

	public static function listing()
	{
		return DB::table('grades')
				->join('users', 'grades.voter_uid', '=', 'users.id')
				->join('users as users2', 'grades.uid', '=', 'users2.id')
				->leftJoin('divisions', 'divisions.id', '=', 'users.division_id')
				->select(DB::raw('grades.*, concat(users.name, " - ", divisions.name, " - ", users.position) as name, concat(users2.name, users2.position) as name2'))
				->paginate(10);
	}

}