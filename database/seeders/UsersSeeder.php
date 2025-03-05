<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'title' => 'Mr.',
                'first_name' => 'John',
                'middle_name' => 'A.',
                'last_name' => 'Doe',
                'email' => 'john.doe@example.com',
            ],
            [
                'title' => 'Ms.',
                'first_name' => 'Jane',
                'middle_name' => null,
                'last_name' => 'Smith',
                'email' => 'jane.smith@example.com',
            ],
            [
                'title' => 'Mr.',
                'first_name' => 'Michael',
                'middle_name' => 'B.',
                'last_name' => 'Johnson',
                'email' => 'michael.johnson@example.com',
            ],
            [
                'title' => 'Mrs.',
                'first_name' => 'Emily',
                'middle_name' => 'C.',
                'last_name' => 'Williams',
                'email' => 'emily.williams@example.com',
            ],
            [
                'title' => 'Dr.',
                'first_name' => 'Robert',
                'middle_name' => 'D.',
                'last_name' => 'Brown',
                'email' => 'robert.brown@example.com',
            ],
            [
                'title' => 'Ms.',
                'first_name' => 'Sophia',
                'middle_name' => null,
                'last_name' => 'Davis',
                'email' => 'sophia.davis@example.com',
            ],
            [
                'title' => 'Mr.',
                'first_name' => 'James',
                'middle_name' => 'E.',
                'last_name' => 'Miller',
                'email' => 'james.miller@example.com',
            ],
            [
                'title' => 'Mrs.',
                'first_name' => 'Olivia',
                'middle_name' => 'F.',
                'last_name' => 'Wilson',
                'email' => 'olivia.wilson@example.com',
            ],
            [
                'title' => 'Dr.',
                'first_name' => 'William',
                'middle_name' => 'G.',
                'last_name' => 'Moore',
                'email' => 'william.moore@example.com',
            ],
            [
                'title' => 'Mr.',
                'first_name' => 'Alexander',
                'middle_name' => null,
                'last_name' => 'Taylor',
                'email' => 'alexander.taylor@example.com',
            ],
        ];

        foreach ($users as $user) {
            DB::table('users')->insert([
                'title' => $user['title'],
                'first_name' => $user['first_name'],
                'middle_name' => $user['middle_name'],
                'last_name' => $user['last_name'],
                'email' => $user['email'],
                'email_verified_at' => now(),
                'password' => Hash::make('password'),
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
