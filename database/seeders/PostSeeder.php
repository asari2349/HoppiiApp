<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use DateTime;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posts')->insert([
                'title' => 'とにかく楽',
                'body' => '命名はデータを基準に考える',
                'ease' => 3,
                'materialQuality' => 2,
                'teachingQuality' => 5,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
                'user_id' => 1,
                'subject_id'=> 1,
         ]);
    }
}
