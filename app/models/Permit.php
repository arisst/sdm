<?php 

class Permit extends Eloquent
{

	/* Relationships */

	public function user()
	{
		return $this->hasOne('User', 'id', 'uid');
	}

	/* Static Function */

	public static function listing($types)
	{
		$key = ($types=='lembur'||$types=='dinas') ? 'permits.propose_uid' : 'permits.auth_uid' ;

		$t = DB::table('permits');
		$t->join('users', 'permits.uid', '=', 'users.id');
		$t->leftJoin('users as users2', $key, '=', 'users2.id');
		$t->leftJoin('divisions', 'users.division_id', '=', 'divisions.id');
		$t->select(DB::raw('permits.*, concat(users.name, " - ", divisions.name) as name, concat(users2.name, " - ", users2.position) as name2'));
		$t->where('types','=',$types);
		if(Auth::user()->level!=1)
		{
			$t->where('uid', Auth::user()->id);
		}

		return $t->paginate(10);
	}

	public static function detail($types, $id)
	{
		$key = ($types=='lembur'||$types=='dinas') ? 'permits.propose_uid' : 'permits.auth_uid' ;

		$t = DB::table('permits');
		$t->join('users', 'permits.uid', '=', 'users.id');
		$t->leftJoin('users as users2', $key, '=', 'users2.id');
		$t->leftJoin('divisions', 'users.division_id', '=', 'divisions.id');
		if($types=='dinas')
		{
			$t->leftJoin('users as users3', 'permits.auth_uid', '=', 'users3.id');
			$t->select(DB::raw('permits.*, concat(users.name, " - ", divisions.name, " - ", users.position) as name, concat(users2.name) as name2, concat(users3.name, " - ", users3.position) as name3'));
		}
		else
		{
			$t->select(DB::raw('permits.*, concat(users.name, " - ", divisions.name, " - ", users.position) as name, concat(users2.name, " - ", users2.position) as name2'));
		}
		$t->where('types','=',$types);
		$t->where('permits.id', '=', $id);
		return $t->first();
	}
	
}