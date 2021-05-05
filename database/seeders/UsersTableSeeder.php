<?php

namespace Database\Seeders;

use App\Models\User;
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
		User::create([
            'name' => 'Md Rafsan Jani Rafin',
            'email' => 'mdrafsanjanirafin@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt(11111111), // password
            'remember_token' => Str::random(10),
            'role' => 1
        ]);
		
        User::factory(10)->create();
    }
}
