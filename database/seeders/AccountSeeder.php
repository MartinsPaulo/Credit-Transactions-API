<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        {
            DB::table('Accounts')->insert([
                'user_name' => 'Carlos Nogueira',
                'balance' => 1876.34,
                'acountNumber' => 123,
                'cash' => 300
            ]);

            DB::table('Accounts')->insert([
                'user_name' => 'Maria Clara Rodrigues',
                'balance' => 3567.67,
                'acountNumber' => 342,
                'cash' => 300
            ]);

            DB::table('Accounts')->insert([
                'user_name' => 'Renato Aragão',
                'balance' => 456.21,
                'acountNumber' => 567,
                'cash' => 300
            ]);

            DB::table('Accounts')->insert([
                'user_name' => 'Maria da Graça Xuxa Meneghel',
                'balance' => 200.00,
                'acountNumber' => 167,
                'cash' => 300
            ]);

            DB::table('Accounts')->insert([
                'user_name' => 'Maurílio Delmont Ribeiro',
                'balance' => 143.67,
                'acountNumber' => 878,
                'cash' => 300
            ]);
        }
    }
}
