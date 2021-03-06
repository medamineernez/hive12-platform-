<?php

use App\Role;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    public function run()
    {
        $roles = [
            [
                'id'    => 1,
                'title' => 'Admin',
            ],
            [
                'id'    => 2,
                'title' => 'User',
            ],
            [
                'id'    => 3,
                'title' => 'freelencer',
            ],
            [
                'id'    => 4,
                'title' => 'startuper',
            ],
            [
                'id'    => 5,
                'title' => 'hive12 staff',
            ]
        ];

        Role::insert($roles);
    }
}
