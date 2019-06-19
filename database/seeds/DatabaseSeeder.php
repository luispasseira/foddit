<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_roles')->insert([
            'id' => 21,
            'role' => 'ROLE_USER'
        ]);
        DB::table('user_roles')->insert([
            'id' => 121,
            'role' => 'ROLE_ADMIN'
        ]);
        DB::table('user_roles')->insert([
            'id' => 1,
            'role' => 'ROLE_BLOCKED'
        ]);

        DB::table('users')->insert([
            'username' => 'admin',
            'email' => 'admin@foddit.com',
            'user_role_id' => 121,
            'password' => Hash::make('admin'),
        ]);
        DB::table('users')->insert([
            'username' => 'user',
            'email' => 'user@foddit.com',
            'user_role_id' => 21,
            'password' => Hash::make('user'),
        ]);

    }
}
