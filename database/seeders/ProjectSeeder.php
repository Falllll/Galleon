<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Project;
use Carbon\Carbon;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Project::create([
            'name' => 'Sistem Informasi Bidan',
            'proposal_date' => Carbon::now()->format('Y-m-d H:i:s'),
            'status' => 'Plan',
            'customer_id' => '1',
        ]);

        Project::create([
            'name' => 'Rancang Bangun Aplikasi Budidaya Ikan',
            'proposal_date' => Carbon::now()->format('Y-m-d H:i:s'),
            'status' => 'Plan',
            'customer_id' => '2',
        ]);

        Project::create([
            'name' => 'Sistem Informasi Akademik',
            'description' => 'Ini adalah sistem informasi akademik',
            'proposal_date' => Carbon::now()->format('Y-m-d H:i:s'),
            'status' => 'Plan',
            'customer_id' => '3',
        ]);
    }
}
