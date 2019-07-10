<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$users = [
    		[
	            'name' => 'trinh quoc hung',
	            'email' => 'hungtq@gmail.com',
	            'password' => bcrypt('123456'),
	        ],
    		[
	            'name' => 'chungnd',
	            'email' => 'chungnd@gmail.com',
	            'password' => bcrypt('123456'),
	        ],
    		[
	            'name' => 'ducnm',
	            'email' => 'ducnm@gmail.com',
	            'password' => bcrypt('123456'),
	        ],
    		[
	            'name' => 'kiemhiv',
	            'email' => 'kiemhiv@gmail.com',
	            'password' => bcrypt('123456'),
	        ]

    	];
        DB::table('users')->insert($users);
    }
}
