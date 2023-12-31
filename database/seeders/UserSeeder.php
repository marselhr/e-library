<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'role_id' => 2,
            'name' => 'Administrator',
            'email' => 'super.admin@gmail.com',
            'password' => Hash::make('password'),
            'email_verified_at'  => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        User::create([
            'role_id' => 1,
            'name' => 'User',
            'email' => 'user@gmail.com',
            'password' => Hash::make('password'),
            'email_verified_at'  => Carbon::now()->format('Y-m-d H:i:s')
        ]);
    }
}
