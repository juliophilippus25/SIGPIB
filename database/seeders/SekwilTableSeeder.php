<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SekwilTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Sekwil::insert([
            [
              'id'  			=> 1,
              'nama_sekwil'  	=> 'Sektor Pelayanan 1',
              'created_at'      => \Carbon\Carbon::now(),
              'updated_at'      => \Carbon\Carbon::now()
            ],
            [
                'id'  			=> 2,
                'nama_sekwil'  	=> 'Sektor Pelayanan 2',
                'created_at'    => \Carbon\Carbon::now(),
                'updated_at'    => \Carbon\Carbon::now()
            ],
            [
                'id'  			=> 3,
                'nama_sekwil'  	=> 'Sektor Pelayanan 3',
                'created_at'    => \Carbon\Carbon::now(),
                'updated_at'    => \Carbon\Carbon::now()
            ]
        ]);
    }
}
