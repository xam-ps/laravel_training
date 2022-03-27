<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('books')->insert([
            'name' => 'In 80 Tagen um die Welt',
            'author' => 'Jules Verne',
        ]);
        DB::table('books')->insert([
            'name' => 'Eine kurze Geschichte der Menschheit',
            'author' => 'Yuval Noah Harari',
            'customer_id' => 1,
        ]);
        DB::table('books')->insert([
            'name' => 'Homo Deus',
            'author' => 'Yuval Noah Harari',
        ]);
        DB::table('books')->insert([
            'name' => '21 lessons for the 21st century',
            'author' => 'Yuval Noah Harari',
        ]);
        DB::table('books')->insert([
            'name' => 'The Big Five for Life',
            'author' => 'John Strelecky',
        ]);
        DB::table('books')->insert([
            'name' => 'Laravel Up & Running',
            'author' => 'Matt Stauffer',
        ]);
        DB::table('books')->insert([
            'name' => 'Eine kurze Geschichte der Zeit',
            'author' => 'Stephen Hawking',
        ]);
    }
}
