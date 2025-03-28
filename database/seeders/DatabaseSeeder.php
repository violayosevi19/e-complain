<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use \App\Models\complain;
use \App\Models\jeniscomplain;
use \App\Models\JenisUser;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'Admin Puskesmas',
            'email' => 'admin@gmail.com',
        ]);
        // complain::factory(5)->create();
        jeniscomplain::create([
            'jeniscomplain'=> 'Pelayanan'
        ]);
        jeniscomplain::create([
            'jeniscomplain'=> 'Pendaftaran'
        ]);
        jeniscomplain::create([
            'jeniscomplain'=> 'Antrian'
        ]);
        jeniscomplain::create([
            'jeniscomplain'=> 'Kebersihan'
        ]);
        jeniscomplain::create([
            'jeniscomplain'=> 'Parkiran'
        ]);

        JenisUser::create([
            'jenisuser' => 'Admin'
        ]);
        JenisUser::create([
            'jenisuser' => 'Pasien'
        ]);
    }
}
