<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'name' => 'kotak kacamata',
            'description' => 'pembungkus kacamata',
            'photo' => 'category/images/mufBRTWQ5HOg5g8vQNRpKeSjVrMVJ3ohjchrok6M.jpg',
            'added_by' => 'admin',
        ]);
        Category::create([
            'name' => 'cairan pembersih',
            'description' => 'pembersih lensa kacamata',
            'photo' => 'category/images/b78F46dmkDOUAa1TEb7Wr3K7LK1BxE9dWWxZYngv.jpg',
            'added_by' => 'admin',
        ]);
        Category::create([
            'name' => 'kain pembersih',
            'description' => 'kain untuk membersihkan lensa kacamata',
            'photo' => 'category/images/3dA8brbgof7XX6z44uja3cid2khPoeWUZaID1b5D.jpg',
            'added_by' => 'admin',
        ]);
        Category::create([
            'name' => 'kontak lensa',
            'description' => 'kontak lensa',
            'photo' => 'category/images/4NszSvw5G7r7vvSAQ9wgywdJIhlffCpHzZKiZMeL.jpg',
            'added_by' => 'admin',
        ]);
    }
}
