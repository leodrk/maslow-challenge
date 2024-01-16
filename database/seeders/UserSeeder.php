<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        for ($i = 1; $i <= 4; $i++) {
            User::create([
                'id' => $i,
                'name' => 'Company Employee ' . $i,
                'email' => 'company_employee' . $i . '@test.com',
                'password' => Hash::make('rootroot'),
                'role' => 'company_employee',
                ])->tokens()->create([
                    'id' => $i,
                    'name' => 'api',
                    'token' => hash('sha256', "N7fp6GTjO9CJD1QIhqv0Ty1ZZbJeS3tFIbToFJZ$i"),
                    'abilities' => ['api-access'],
                ]);
        }
        User::create([
            'id' => 5,
            'name' => 'Company Admin',
            'email' => 'company_admin@test.com',
            'password' => Hash::make('rootroot'),
            'role' => 'company_admin',
        ])->tokens()->create([
            'id' => 5,
            'name' => 'api',
            'token' => hash('sha256', 'N7fp6GTjO9CJD1QIhqv0Ty1ZZbJeS3tFIbToFJZ5'),
            'abilities' => ['api-access'],
        ]);

        User::create([
            'id' => 6,
            'name' => 'Maslow Admin',
            'email' => 'maslow_admin@test.com',
            'password' => Hash::make('rootroot'),
            'role' => 'maslow_admin',
            ])->tokens()->create([
                'id' => 6,
                'name' => 'api',
                'token' => hash('sha256', 'N7fp6GTjO9CJD1QIhqv0Ty1ZZbJeS3tFIbToFJZ6'),
                'abilities' => ['api-access'],
            ]);
    }
}
