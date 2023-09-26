<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubjectUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('subject_user')->insert([
        'user_id' => 1,
        'subject_id' => 2,
        ]);
        DB::table('subject_user')->insert([
        'user_id' => 1,
        'subject_id' => 3,
        ]);
    }
}
