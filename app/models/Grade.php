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

	public static function listing($search = '')
	{
		$t = DB::table('grades');
		if ($search) $t->where('users.name', $search);
		$t->join('users', 'grades.voter_uid', '=', 'users.id');
		$t->join('users as users2', 'grades.uid', '=', 'users2.id');
		$t->leftJoin('divisions', 'divisions.id', '=', 'users.division_id');
		$t->select(DB::raw('grades.*, concat(users.name, " - ", divisions.name, " - ", users.position) as name, concat(users2.name, users2.position) as name2'));

		return $t->paginate(10);
	}

}