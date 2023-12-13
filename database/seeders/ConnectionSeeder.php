<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ConnectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('connections')->insert([
            'following_id' => 2,
            'followed_id' => 4,
            'is_confirmed' => false,
            'created_by' => 'seeder',
        ]);
        DB::table('connections')->insert([
            'following_id' => 2,
            'followed_id' => 5,
            'is_confirmed' => true,
            'created_by' => 'seeder',
        ]);
        DB::table('connections')->insert([
            'following_id' => 2,
            'followed_id' => 7,
            'is_confirmed' => true,
            'created_by' => 'seeder',
        ]);
        DB::table('connections')->insert([
            'following_id' => 7,
            'followed_id' => 2,
            'is_confirmed' => true,
            'created_by' => 'seeder',
        ]);
        DB::table('connections')->insert([
            'following_id' => 1,
            'followed_id' => 2,
            'is_confirmed' => false,
            'created_by' => 'seeder',
        ]);
        DB::table('connections')->insert([
            'following_id' => 8,
            'followed_id' => 2,
            'is_confirmed' => true,
            'created_by' => 'seeder',
        ]);
    }
}
