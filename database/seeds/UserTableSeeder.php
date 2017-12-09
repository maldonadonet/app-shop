<?php

use Illuminate\Database\Seeder;
use App\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	User::create([
    		'name' => 'Usuario Demo',
        	'email' => 'Userdemo@demo.com',
        	'password' => bcrypt('123123'),
            'admin' => true
    	]);
    }
}
