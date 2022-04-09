<?php

namespace Database\Seeders;

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
        \App\Models\User::insert([
            [
              'id'  			=> 1,
              'name'  			=> 'GPIB Maranatha',
              'username'		=> 'gpibmaranatha',
              'email' 			=> 'gpibmaranatha@gmail.com',
              'password'		=> bcrypt('gpibmaranatha'),
              'gambar'			=> NULL,
              'role'            => 'super',
              'remember_token'	=> NULL,
              'created_at'      => \Carbon\Carbon::now(),
              'updated_at'      => \Carbon\Carbon::now()
            ],
            [
                'id'  			=> 2,
                'name'  	    => 'Admin',
                'username'		=> 'admingpib',
                'email' 		=> 'admingpib@gmail.com',
                'password'		=> bcrypt('admingpib'),
                'gambar'		=> NULL,
                'role'          => 'admin',
                'remember_token'=> NULL,
                'created_at'    => \Carbon\Carbon::now(),
                'updated_at'    => \Carbon\Carbon::now()
            ]
        ]);
    }
}
