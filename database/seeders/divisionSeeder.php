<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class divisionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('divisions')->insert([
            'name' => 'development',
        ]);
        DB::table('divisions')->insert([
            'name' => 'account executive',
        ]);
        DB::table('divisions')->insert([
            'name' => 'internet marketing',
        ]);
        DB::table('divisions')->insert([
            'name' => 'report',
        ]);
    }
}
