<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DummyUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userData = [
            [
                'name'=>'Mas Administrator',
                'email'=>'administrator@gmail.com',
                'role'=>'administrator',
                'password'=>bcrypt('123456')
            ],

            [
                'name'=>'Mas Admin Wilayah',
                'email'=>'wilayah@gmail.com',
                'role'=>'admin_wilayah',
                'password'=>bcrypt('123456')
            ],
        ];

        foreach($userData as $key => $val) {
            User::create($val);
        }
    }
}
