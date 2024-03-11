<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'trato' => 'Dr.', // 'Mr.' or 'Ms.'
            'name' => 'John',
            'lastname' => 'Doe',
            'email' => 'john@example.com',
            'phone' => '987654321',
            'password' => bcrypt('432#dds$lima324')
        ])->assignRole('admin');


    }
}
