<?php

namespace Database\Seeders;

use App\Models\ComicGenre;
use Illuminate\Database\Seeder;

class GenreSeeder extends Seeder
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
                'genre_name' => 'PSYCHOLOGICAL',
                'genre_slug' => strtolower('PSYCHOLOGICAL'),
                'created_at' => new \DateTime(),
                'updated_at' => new \DateTime(),
            ],
            [
                'genre_name' => 'ROMANCE',
                'genre_slug' => strtolower('ROMANCE'),
                'created_at' => new \DateTime(),
                'updated_at' => new \DateTime(),
            ],
            [
                'genre_name' => 'DRAMA',
                'genre_slug' => strtolower('DRAMA'),
                'created_at' => new \DateTime(),
                'updated_at' => new \DateTime(),
            ],
            [
                'genre_name' => 'SCHOOL LIFE',
                'genre_slug' => strtolower('SCHOOL-LIFE'),
                'created_at' => new \DateTime(),
                'updated_at' => new \DateTime(),
            ],
            [
                'genre_name' => 'SLICE OF LIFE',
                'genre_slug' => strtolower('SLICE-OF-LIFE'),
                'created_at' => new \DateTime(),
                'updated_at' => new \DateTime(),
            ],
            [
                'genre_name' => 'ADVENTURE',
                'genre_slug' => strtolower('ADVENTURE'),
                'created_at' => new \DateTime(),
                'updated_at' => new \DateTime(),
            ],
            [
                'genre_name' => 'FANTASY',
                'genre_slug' => strtolower('FANTASY'),
                'created_at' => new \DateTime(),
                'updated_at' => new \DateTime(),
            ],
        ];

        foreach ($data as $key => $value) {
            ComicGenre::create($value);
        }
    }
}
