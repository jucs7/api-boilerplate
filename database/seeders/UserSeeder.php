<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'name'      => 'superadmin',
                'email'     => 'superadmin@example.com',
                'password'  => 'superadmin',
                'role'      => 'admin',
            ],
            [
                'name'      => 'user1',
                'email'     => 'user1@example.com',
                'password'  => 'user1',
                'role'      => 'user',
            ],
            [
                'name'      => 'user2',
                'email'     => 'user2@example.com',
                'password'  => 'user2',
                'role'      => 'user',
            ],
            [
                'name'      => 'user3',
                'email'     => 'user3@example.com',
                'password'  => 'user3',
                'role'      => 'user',
            ],
            [
                'name'      => 'user4',
                'email'     => 'user4@example.com',
                'password'  => 'user4',
                'role'      => 'user',
            ],
        ];

        foreach ($users as $user) {
            User::create($user);
        }
    }
}
