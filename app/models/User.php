<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;
	protected $table = 'users';
	protected $hidden = array('password', 'remember_token');

	/* Relationships */

	public function division()
	{
		return $this->hasOne('Division', 'id', 'division_id');
	}

	public function permit()
	{
		return $this->hasMany('Permit', 'uid', 'id');
	}

	public function permitauth()
	{
		return $this->hasMany('Permit', 'auth_uid', 'id');
	}

	public function rule()
	{
		return $this->hasMany('Rule', 'uid', 'id');
	}

	public function rulebawahan()
	{
		return $this->hasMany('Rule', 'parent_uid', 'id');
	}

	public static function getAtasan($id)
	{
		$user = User::with('rule')->find($id);
		$rule = $user->rule;
		if(!$rule->isEmpty())
		{
			$id_atasan = array();
			foreach ($rule as $key)
			{
				array_push($id_atasan, $key->parent_uid);
			}
			$atasan = self::whereIn('id',$id_atasan)->get();
		}
		else
		{
			$atasan = array();
		}

		return $atasan;
	}

	public static function getBawahan($id)
	{
		$user = User::with('rule')->find($id);
		$rule = $user->rulebawahan;
		if(!$rule->isEmpty())
		{
			$id_bawahan = array();
			foreach ($rule as $key)
			{
				array_push($id_bawahan, $key->uid);
			}
			$bawahan = self::whereIn('id',$id_bawahan)->get();
		}
		else
		{
			$bawahan = array();
		}

		return $bawahan;
	}

	public static function listing($search = '')
	{
		$user = DB::table('users')
				->leftJoin('divisions', 'divisions.id', '=', 'users.division_id')
				->select(DB::raw('users.*, divisions.name as division_name'))
				->orderBy('users.name','asc');
			if($search!='') $user->where('users.name', 'LIKE', '%'.$search.'%')->orWhere('users.email', 'LIKE', '%'.$search.'%');;
		return	$user->paginate(10);
	}

	public static function authOption($id = '')
	{
		$auth = DB::table('users')
				->leftJoin('divisions', 'divisions.id', '=', 'users.division_id')
				->select(DB::raw('concat(users.name, " - ", divisions.name, " - ", users.position) name, users.id'))
				->where('status','=',1)
				->where('level','!=',3);
		if ($id) $auth->where('users.id','!=',$id);
		return $auth->lists('name','id');
	}

	public static function authAllOption($id = '')
	{
		$auth = DB::table('users')
				->leftJoin('divisions', 'divisions.id', '=', 'users.division_id')
				->select(DB::raw('concat(users.name, " - ", divisions.name, " - ", users.position) name, users.id'))
				->where('status','=',1);
		if ($id) $auth->where('users.id','!=',$id);
		return $auth->lists('name','id');
	}
}
