<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('accounts')->insert([
            'id' => 1,
            'user_id' => 1,
            'provider' => 'google',
            'provider_id' => '115724625492822521360',
            'username' => ' leyla nafasi',
            'email' => 'dev.leyla.sabouri@gmail.com',
        ]);

        DB::table('accounts')->insert([
            'id' => 2,
            'user_id' => 2,
            'provider' => 'google',
            'provider_id' => '115956915122324575580',
            'username' => ' leyla',
            'email' => 'eterno.ley@gmail.com',
        ]);
        $this->seedGsm(3, 2, '+989053698848');

        DB::table('accounts')->insert([
            'id' => 4,
            'user_id' => 3,
            'provider' => 'google',
            'provider_id' => '11',
            'username' => ' ali',
            'email' => 'dev.abi.log@gmail.com',
        ]);
        $this->seedGsm(5, 3, '+989369819982');

        $this->seedGsm(6, 4, '+989122309822');
        $this->seedGsm(7, 5, '+989369999999');
        $this->seedGsm(8, 6, '+989300000000');
        $this->seedGsm(9, 7, '+989364444444');
        DB::table('accounts')->insert([
            'id' => 10,
            'user_id' => 8,
            'provider' => 'google',
            'provider_id' => '12',
            'username' => ' laleh',
            'email' => 'laleh@gmail.com',
        ]);
    }
    public function seedGsm($id, $user_id, $phone)
    {
        DB::table('accounts')->insert([
            'id' => $id,
            'user_id' => $user_id,
            'provider' => 'gsm',
            'provider_id' => $phone,
            'username' => $phone,
            'email' => $phone . '@gsm',
        ]);
    }
}
