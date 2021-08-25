<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            [
            'title' => 'HTML',
            'slug' => 'html',
            'description' => 'HTML adalah singkatan dari Hypertext Markup Language',
            'thumbnail' => 'noimage.jpg',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
            'title' => 'CSS',
            'slug' => 'css',
            'description' => 'CSS atau Cascading Style Sheets adalah salah satu topik yang harus diketahui dalam pengembangan website.',
            'thumbnail' => 'noimage.jpg',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            ],
        ]);
    }
}
