<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class InformationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('informations')->insert([

            'key' => 'facebook',
        ]);
        DB::table('informations')->insert([

            'key' => 'instagram',
        ]);
        DB::table('informations')->insert([

            'key' => 'twitter',
        ]);
        DB::table('informations')->insert([

            'key' => 'google',
        ]);

    }
}
