<?php
// app/database/seeds/UserTableSeeder.php

class UserTableSeed extends Seeder
{

	public function run()
	{
		// DB::table('users')->delete();
		User::create(array(
			'name'     => 'Aris Setyono',
			'username'     => 'aris',
			'email' => 'me@arisst.com',
			'phone'    => '085259838599',
			'division'    => 'teknis',
			'position'    => 'direktur',
			'level'    => '1',
			'status'    => '1',
			'password' => Hash::make('aris'),
		));
	}

}