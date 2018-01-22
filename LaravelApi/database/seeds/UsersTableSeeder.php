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
    	DB::table('users')->insert([
    		'0' => [
    			'name' => 'Miguel Vasco Macamo',
    			'email' => 'misaelvasco@gmail.com',
    			'password' => Hash::make('123456')
    		],
    		'1' => [
    			'name' => 'Jose Seie',
    			'email' => 'leo@gmail.com',
    			'password' => Hash::make('123456')

    		],

    		'2' => [
    			'name' => 'Samuel Penicela',
    			'email' => 'samupenicela@gmail.com',
    			'password' => Hash::make('123456')

    		],

    		'3' => [
    			'name' => 'Ermenegildo Cumbe',
    			'email' => 'ermenegildocumbe@gmail.com',
    			'password' => Hash::make('123456')
    		]

    	]);
    }
}
