<?php

namespace Database\Seeders;

use App\Models\UserModel;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        UserModel::create([
            'id' => 1,
            'name' => 'Hotman Primus',
            'email' => 'hotman@gmail.com',
            'level' => 'user',
            'password' => bcrypt('password'),
        ]);
        UserModel::create([
            'id' => 2,
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'level' => 'admin',
            'password' => bcrypt('password'),
        ]);
    }
}
