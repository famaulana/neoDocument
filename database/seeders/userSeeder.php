<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class userSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'admin',
            'division' => 1,
            'role' => 1,
            'password' => 'masterdevelopment',
        ]);
    }
}
