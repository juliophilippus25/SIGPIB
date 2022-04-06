<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PelkatTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Pelkat::insert([
            [
              'id'  			=> 1,
              'nama_pelkat'  	=> 'Pelayanan Anak',
              'created_at'      => \Carbon\Carbon::now(),
              'updated_at'      => \Carbon\Carbon::now() 
            ],
            [
                'id'  			=> 2,
                'nama_pelkat'  	=> 'Persekutuan Teruna',
                'created_at'    => \Carbon\Carbon::now(),
                'updated_at'    => \Carbon\Carbon::now() 
            ],
            [
              'id'  			=> 3,
              'nama_pelkat'  	=> 'Gerakan Pemuda',
              'created_at'      => \Carbon\Carbon::now(),
              'updated_at'      => \Carbon\Carbon::now() 
            ],
            [
                'id'  			=> 4,
                'nama_pelkat'  	=> 'Persekutuan Kaum Perempuan',
                'created_at'    => \Carbon\Carbon::now(),
                'updated_at'    => \Carbon\Carbon::now() 
            ],
            [
                'id'  			=> 5,
                'nama_pelkat'  	=> 'Persekutuan Kaum Bapak',
                'created_at'    => \Carbon\Carbon::now(),
                'updated_at'    => \Carbon\Carbon::now() 
              ],
              [
                  'id'  	      => 6,
                  'nama_pelkat'   => 'Persekutuan Kaum Lanjut Usia',
                  'created_at'    => \Carbon\Carbon::now(),
                  'updated_at'    => \Carbon\Carbon::now() 
              ]
        ]);
    }
}
