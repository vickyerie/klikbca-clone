<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        //User::factory()->create([
           // 'name' => 'Test User',
         //   'email' => 'email@example.com',
       // ]);

        User::create([
            'username' => 'bcauser',
            'password' => Hash::make('123456'),
            'saldo' => 1000000
        ]);

        User::create([
            'username' => 'erie',
            'password' => Hash::make('rahasia'),
            'saldo' => 100000000
        ]);

        User::create([
            'username' => 'patricia',
            'password' => Hash::make('rahasia'),
            'saldo' => 100000
        ]);

        User::create([
            'username' => 'natasya',
            'password' => Hash::make('rahasia'),
            'saldo' => 900000
        ]);

        User::create([
            'username' => 'livia',
            'password' => Hash::make('rahasia'),
            'saldo' => 40000
        ]);

    }
}
