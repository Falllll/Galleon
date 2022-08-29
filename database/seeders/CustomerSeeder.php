<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Customer;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Customer::create([
            'name' => 'Thomas',
            'email' => 'thomas@gmail.com',
            'phone' => '085829928482',
            'is_active' => TRUE
        ]);

        Customer::create([
            'name' => 'Jerry',
            'email' => 'jerry@gmail.com',
            'phone' => '085829928123',
            'is_active' => TRUE
        ]);

        Customer::create([
            'name' => 'Johnson',
            'email' => 'johnson@gmail.com',
            'address' => 'Washington DC',
            'is_active' => TRUE
        ]);

        Customer::create([
            'name' => 'Herry Meguire',
            'email' => 'herry@gmail.com',
            'phone' => '085829928721',
            'address' => 'Manchester United',
            'is_active' => TRUE
        ]);

        Customer::create([
            'name' => 'Schwartz',
            'email' => 'schwartz@gmail.com',
            'is_active' => TRUE
        ]);
    }
}
