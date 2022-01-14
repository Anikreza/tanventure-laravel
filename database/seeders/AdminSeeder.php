<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            'first_name' => 'alex',
            'last_name' => 'kidd',
            'gender' => 'male',
            'email' => 'alex@gmail.com',
            'password' => bcrypt('123456'),
            'role' => 3,
            'email_verified_at' => now()
        ];
        User::create($user);
    }
}
