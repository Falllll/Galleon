<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Faldi',
            'email' => 'faldiharido@gmail.com',
            'password' => bcrypt('password')
        ]);

        User::create([
            'name' => 'Dicky',
            'email' => 'dicky@gmail.com',
            'password' => bcrypt('password')
        ]);

        User::create([
            'name' => 'Afif',
            'email' => 'afif@gmail.com',
            'password' => bcrypt('password')
        ]);
    }
}
