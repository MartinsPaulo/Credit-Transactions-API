<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MccsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('MCCs')->insert([
            'code' => '5811',
            'category' => 'Restaurant'
        ]);
        DB::table('MCCs')->insert([
            'code' => '5812',
            'category' => 'Restaurant'
        ]);
        DB::table('MCCs')->insert([
            'code' => '5813',
            'category' => 'Restaurant'
        ]);
        DB::table('MCCs')->insert([
            'code' => '5814',
            'category' => 'Restaurant'
        ]);
        DB::table('MCCs')->insert([
            'code' => '5411',
            'category' => 'Supermarket'
        ]);
        DB::table('MCCs')->insert([
            'code' => '5815',
            'category' => 'Audiovisual Media'
        ]);
    }
}
