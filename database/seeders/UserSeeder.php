<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        foreach ([
                     [
                         'name' => 'Пользователь',
                         'email' => 'user@example.com',
                         'password' => 'User12345!',
                         'is_admin' => false,
                     ],
                     [
                         'name' => 'Администратор',
                         'email' => 'admin@example.com',
                         'password' => 'Admin12345!',
                         'is_admin' => true,
                     ],
                 ] as $user) {
            DB::table('users')->updateOrInsert(
                ['email' => $user['email']],
                [
                    'name' => $user['name'],
                    'password' => Hash::make($user['password']),
                    'is_admin' => $user['is_admin'],
                    'created_at' => now(),
                    'updated_at' => now(),
                ]
            );
        }
    }
}
