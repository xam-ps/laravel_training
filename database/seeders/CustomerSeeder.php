<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('customers')->insert([
            'firstname' => 'Max',
            'lastname' => 'Pöschl',
        ]);
        DB::table('customers')->insert([
            'firstname' => 'Hans',
            'lastname' => 'Zimmer',
        ]);
    }
}
