<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
        DB::table('users')->delete();
        DB::table('users')->insert([
            'name' => 'Ivan Belitskii',
            'email' => 'belitskii@gmail.com',
            'password' => bcrypt('swordfish1992'),
        ]);

		// $this->call('UserTableSeeder');
	}

}
