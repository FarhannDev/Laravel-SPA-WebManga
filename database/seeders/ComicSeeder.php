<?php

namespace Database\Seeders;

use App\Models\Comic;
use Illuminate\Database\Seeder;

class ComicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data  = [
            [
                'comic_genre_id' => 1,
                'comic_title' => '1-nen A-gumi no Monster',
                'comic_slug'  => strtolower('1-nen-A-gumi-no-Monster'),
                'comic_author' => 'Zaotaku',
                'comic_artist' => 'Zaotaku',
                'comic_rating' => '9',
                'comic_released' => '2022',
                'comic_cover'   => strtolower('1-nen-A-gumi-no-Monster' . 'jpg'),
                'comic_alternative' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Provident, a.',
                'comic_sinopsis' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Provident, a.',
                'is_active'      => 'Publish',
                'created_at'    => new \DateTime(),
                'updated_at'    => new \DateTime(),

            ],
            [
                'comic_genre_id' => 1,
                'comic_title' => 'Gate: Jieitai Kanochi nite Kaku Tatakaeri',
                'comic_slug'  => strtolower('Gate:-Jieitai-Kanochi-nite-Kaku-Tatakaeri'),
                'comic_author' => 'Zaotaku',
                'comic_artist' => 'Zaotaku',
                'comic_rating' => '9',
                'comic_released' => '2022',
                'comic_cover'   => strtolower('Gate:-Jieitai-Kanochi-nite-Kaku-Tatakaeri' . 'jpg'),
                'comic_alternative' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Provident, a.',
                'comic_sinopsis' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Provident, a.',
                'is_active'      => 'Publish',
                'created_at'    => new \DateTime(),
                'updated_at'    => new \DateTime(),

            ],
            [
                'comic_genre_id' => 1,
                'comic_title' => 'Genjitsu Shugi Yuusha no Oukoku Saikenki',
                'comic_slug'  => strtolower('Genjitsu-Shugi-Yuusha-no-Oukoku-Saikenki'),
                'comic_author' => 'Zaotaku',
                'comic_artist' => 'Zaotaku',
                'comic_rating' => '9',
                'comic_released' => '2022',
                'comic_cover'   => strtolower('Genjitsu Shugi Yuusha no Oukoku Saikenki' . 'jpg'),
                'comic_alternative' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Provident, a.',
                'comic_sinopsis' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Provident, a.',
                'is_active'      => 'Publish',
                'created_at'    => new \DateTime(),
                'updated_at'    => new \DateTime(),

            ],
        ];

        foreach ($data as $key => $value) {
            Comic::create($value);
        }
    }
}
