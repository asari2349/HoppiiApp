<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use DateTime;

class ProfessorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('professors')->insert([
            'name' => '平田英明',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
         ]);
        DB::table('professors')->insert([
            'name' => '山嵜輝',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
         ]);
    }
}
