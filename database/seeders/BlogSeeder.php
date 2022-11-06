<?php

namespace Database\Seeders;

use App\Models\Blog;
use Illuminate\Database\Seeder;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'user_id' => 1,
                'blog_name' => 'Lorem ipsum dolor sit amet',
                'blog_slug' => 'lorem-ipsum-dolor-sit-amet',
                'blog_desc' => 'Lorem ipsum dolor sit amet'
            ],
            [
                'user_id' => 1,
                'blog_name' => 'Lorem ipsum dolor sit amet 2',
                'blog_slug' => 'lorem-ipsum-dolor-sit-amet',
                'blog_desc' => 'Lorem ipsum dolor sit amet'
            ],
            [
                'user_id' => 1,
                'blog_name' => 'Lorem ipsum dolor sit amet 3',
                'blog_slug' => 'lorem-ipsum-dolor-sit-amet',
                'blog_desc' => 'Lorem ipsum dolor sit amet'
            ],
        ];

        foreach ($data as $key => $value) {
            Blog::create($value);
        }
    }
}
