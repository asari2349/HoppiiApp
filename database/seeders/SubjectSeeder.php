<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use DateTime;

class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('subjects')->insert([
            'name' => 'マクロ経済学I',
            'subjectcode' => 101535,
            'professor_id' => 1,
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
         ]);
        DB::table('subjects')->insert([
            'name' => 'マクロ経済学II',
            'subjectcode' => 101536,
            'professor_id' => 1,
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
         ]);
        DB::table('subjects')->insert([
            'name' => 'デリバティブ入門',
            'subjectcode' => 94013,
            'professor_id' => 2,
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
         ]);
    }
}
