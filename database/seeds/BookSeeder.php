<?php

use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{

    public function run()
    {
        DB::table('book')->truncate();
        DB::table('user')->truncate();
    }
}
