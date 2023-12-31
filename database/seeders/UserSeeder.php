<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = new User();
        $user->role_id = 2;
        $user->name = 'Administrator';
        $user->email = 'super.admin@gmail.com';
        $user->password = Hash::make('password');
        $user->email_verified_at = Carbon::now()->format('Y-m-d H:i:s');
        $user->save();
    }
}
