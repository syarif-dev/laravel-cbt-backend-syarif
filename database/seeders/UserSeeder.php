<?php

namespace Database\Seeders;

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
        User::factory(10)->create();

        User::create([
            'name'     => 'syarif hidayatulloh',
            'email'    => 'syarif@gmail.com',
            'password' => Hash::make('12345678'),
            'role'     => 'admin',
            'phone'    => '089668363862',
        ]);
    }
}
