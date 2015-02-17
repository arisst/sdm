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

		if(Auth::user()->level != 1 && Auth::user()->level != 6) //selain admin dan sekjen
		{
			$t->where('divisions.id', Auth::user()->division_id);
		}

		return $t->paginate(10);
	}

}