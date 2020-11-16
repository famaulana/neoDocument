<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class roleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('role')->insert([
            'name' => 'master',
        ]);
        DB::table('role')->insert([
            'name' => 'head',
        ]);
        DB::table('role')->insert([
            'name' => 'user',
        ]);
    }
}
