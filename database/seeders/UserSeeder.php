<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            'role_id' => 1,
            'name'  => 'Admin',
            'email' => 'admin.zaotaku@gmail.com',
            'password' => Hash::make('12345678'),
            'created_at' => new \DateTime(),
            'updated_at' => new \DateTime(),
        ];
        User::create($data);
    }
}
