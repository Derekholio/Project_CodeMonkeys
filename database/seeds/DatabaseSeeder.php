<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserTableSeeder::class);
    }
}

class UserTableSeeder extends Seeder {

public function run(){

$ironman = DB::table('users')->insert ([
	'username' => 'ironman',
	'email'    => 'iam@ironman.com',
	'password' => Hash::make('ironman'),
	'first_name' => 'Tony',
	'last_name' => 'Stark',
	'created_at' => new DateTime(),
	'updated_at' => new DateTime()
]);

$Peyton = DB::table('users')->insert ([
	'username' => 'champ2016',
	'email'    => 'peyton@sbchamp2016.com',
	'password' => Hash::make('ironman'),
	'first_name' => 'Peyton',
	'last_name' => 'Manning',
	'created_at' => new DateTime(),
	'updated_at' => new DateTime()
]);

}

}
