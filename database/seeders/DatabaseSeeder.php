<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\ObjekSurvei;
use App\Models\Survei;
use App\Models\Tanggapan;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        //  \App\Models\User::factory()->create([
        //      'name' => 'John',
        //      'last_name' => 'Doe',
        //      'password' => 'password',
        //      'email' => 'test@example.com',
        //  ]);

        // ObjekSurvei::create([
        //     'name'  => 'Dosen'
        // ]);
        // ObjekSurvei::create([
        //     'name'  => 'Staff'
        // ]);
        // ObjekSurvei::create([
        //     'name'  => 'Kurikulum'
        // ]);
        // ObjekSurvei::create([
        //     'name'  => 'Fasilitas'
        // ]);
        // ObjekSurvei::create([
        //     'name'  => 'Kegiatan'
        // ]);

        // Tanggapan::create([
        //     'name'  => 'Sangat Baik',
        //     'point'  => 5,
        // ]);
        // Tanggapan::create([
        //     'name'  => 'Baik',
        //     'point'  => 4,
        // ]);
        // Tanggapan::create([
        //     'name'  => 'Cukup',
        //     'point'  => 3,
        // ]);
        // Tanggapan::create([
        //     'name'  => 'Kurang',
        //     'point'  => 2,
        // ]);
        // Tanggapan::create([
        //     'name'  => 'Sangat Kurang',
        //     'point'  => 1,
        // ]);

        Survei::create([
            'is_active' => true
        ]);
    }
}
