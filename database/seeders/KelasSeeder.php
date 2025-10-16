<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder; 
use Illuminate\Support\Str;
use App\Models\Kelas;

class KelasSeeder extends Seeder
{
    public function run(): void
    {
        $data = ['A', 'B', 'C', 'D'];

        foreach ($data as $kelas) {
            Kelas::create([
                'id' => Str::uuid(), 
                'nama_kelas' => $kelas,
            ]);
        }
    }
}
