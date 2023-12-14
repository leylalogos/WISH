<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('contacts')->insert([
            'id' => 1,
            'user_id' => 2,
            'source' => 'gsm',
            'source_id' => '+980999999999',
            'reaction' => null,
            'name' => 'samira',
        ]);
        DB::table('contacts')->insert([
            'id' => 2,
            'user_id' => 2,
            'source' => 'email',
            'source_id' => 'e@gmail.com',
            'reaction' => null,
            'name' => 'shadi',
        ]);
        DB::table('contacts')->insert([
            'id' => 3,
            'user_id' => 2,
            'source' => 'gsm',
            'source_id' => '+989369819982',
            'reaction' => null,
            'name' => '+989369819982' . 'roommate',
        ]);
        DB::table('contacts')->insert([
            'id' => 4,
            'user_id' => 2,
            'source' => 'gsm',
            'source_id' => '+989122309822',
            'reaction' => date("Y-m-d H:i:s"),
            'name' => '+989122309822' . 'my-sister',
        ]);
        DB::table('contacts')->insert([
            'id' => 5,
            'user_id' => 2,
            'source' => 'gsm',
            'source_id' => '+989369999999',
            'reaction' => date("Y-m-d H:i:s"),
            'name' => '+989369999999' . 'my-brother',
        ]);
        DB::table('contacts')->insert([
            'id' => 6,
            'user_id' => 2,
            'source' => 'gsm',
            'source_id' => '+989300000000',
            'reaction' => date("Y-m-d H:i:s"),
            'name' => '+989300000000' . 'dad',
        ]);
        DB::table('contacts')->insert([
            'id' => 7,
            'user_id' => 2,
            'source' => 'gsm',
            'source_id' => '+989364444444',
            'reaction' => date("Y-m-d H:i:s"),
            'name' => '+989364444444' . 'mom',
        ]);
    }
}
