<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('inner_status_users')->insert([[
            'descripcion_status'=> "activo",
        ],
        [
            'descripcion_status'=> "inactivo",
        ]]);
    }
}
