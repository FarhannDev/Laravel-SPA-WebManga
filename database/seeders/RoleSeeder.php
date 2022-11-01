<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
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
                'role_name' => 'Admin',
                'created_at' => new \DateTime(),
                'updated_at' => new \DateTime(),
            ],
            [
                'role_name' => 'Member',
                'created_at' => new \DateTime(),
                'updated_at' => new \DateTime(),
            ],
        ];

        foreach ($data as $key => $value) {
            Role::create($value);
        }
    }
}
