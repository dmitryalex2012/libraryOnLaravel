<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BookTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('books')->insert([
            'title' => str_random(10),
            'author' => str_random(10),
            'description' => str_random(10),
            'bookCover' => str_random(10),
            'category' => str_random(10),
            'language' => str_random(10),
        ]);
    }
}
