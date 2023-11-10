<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            'name' => 'Admin Abi Noval Fauzi',
            'code' => bin2hex(random_bytes(20)),
            'email' => 'adminnovalabi612@gmail.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'phone_number' => '08174835153', // password
            'remember_token' => Str::random(10),
            'avatar' => 'img/avatar/a.png'
        ]);

        $admin->syncRoles('admin');

        $faker = \Faker\Factory::create();

        for ($i = 1; $i < 10; $i++) {
            $admin = User::create([
                'name' => $faker->name(),
                'code' => bin2hex(random_bytes(20)),
                'email' => $faker->unique()->safeEmail(),
                'email_verified_at' => now(),
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'phone_number' => $faker->phoneNumber(), // password
                'remember_token' => Str::random(10),
                'avatar' => 'img/avatar/' . substr($faker->name(), 0, 1)  . '.png'
            ]);

            $admin->syncRoles('admin');
        }
    }
}
