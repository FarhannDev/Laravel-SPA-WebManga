<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
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
                'name' => 'Komik Terlengkap & Terupadet',
                'icon'  => 'fa fa-3x fa-mail-bulk',
                'desc'  => 'Erat ipsum justo amet duo et elitr dolor, est duo duo eos lorem sed diam
                        stet diam sed stet lorem',
            ],
            [
                'name' => 'Akses Download Mudah',
                'icon'  => 'fa fa-3x fa-mail-bulk',
                'desc'  => 'Erat ipsum justo amet duo et elitr dolor, est duo duo eos lorem sed diam
                        stet diam sed stet lorem',
            ],
            [
                'name' => 'Digital Marketing',
                'icon'  => 'fa fa-3x fa-mail-bulk',
                'desc'  => 'Erat ipsum justo amet duo et elitr dolor, est duo duo eos lorem sed diam
                        stet diam sed stet lorem',
            ],
        ];

        foreach ($data as $key => $value) {
            Service::create($value);
        }
    }
}
