<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $names = ['ali', 'leyla', 'reza', 'goline', 'laleh', 'neynaneh', 'shahnaze', 'majid'];
        for ($i = 0; $i < count($names); $i++) {
            DB::table('users')->insert([
                'id' => $i + 1,
                'name' => $names[$i],
                'username' => $names[$i] . '_user',
            ]);
        }

    }
}
