<?php

namespace Database\Seeders;

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
         \App\Models\User::create([
             'email' => 'trend@trend.am',
             'name' => 'Admin',
             'password' => Hash::make('12Trend21')
         ]);
    }
}
