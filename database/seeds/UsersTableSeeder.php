<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $users = [
            [
                'id'             => 1,
                'name'           => 'Admin',
                'email'          => 'admin@admin.com',
                'password'       => '$2y$10$KPxwvH8u480yWHUyVrApbeiAVy7gFHzzagX7vcSXXWs/wK7eK4hyK',
                'remember_token' => null,
            ],
        ];

        User::insert($users);
    }
}
