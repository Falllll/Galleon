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

        Project::create([
            'name' => 'Sistem Informasi Kelautan',
            'description' => 'Ini adalah sistem informasi Kelautan',
            'proposal_date' => Carbon::now()->format('Y-m-d H:i:s'),
            'status' => 'On Hold',
            'customer_id' => '1',
        ]);

        Project::create([
            'name' => 'Sistem Informasi Desa',
            'description' => 'Ini adalah sistem informasi Desa',
            'proposal_date' => Carbon::now()->format('Y-m-d H:i:s'),
            'status' => 'Progress',
            'customer_id' => '2',
        ]);

        Project::create([
            'name' => 'Sistem Informasi Akademik SMAN 1 Indramayu',
            'proposal_date' => Carbon::now()->format('Y-m-d H:i:s'),
            'status' => 'Done',
            'customer_id' => '5',
        ]);

        Project::create([
            'name' => 'Sistem Informasi Akademik SMAN 1 Sindang',
            'proposal_date' => Carbon::now()->format('Y-m-d H:i:s'),
            'status' => 'Done',
            'customer_id' => '5',
        ]);

        Project::create([
            'name' => 'Aplikasi E-Kasir',
            'proposal_date' => Carbon::now()->format('Y-m-d H:i:s'),
            'status' => 'Closed',
            'customer_id' => '4',
        ]);

        Project::create([
            'name' => 'Aplikasi E-Voting',
            'proposal_date' => Carbon::now()->format('Y-m-d H:i:s'),
            'status' => 'Canceled',
            'customer_id' => '3',
        ]);
    }
}
