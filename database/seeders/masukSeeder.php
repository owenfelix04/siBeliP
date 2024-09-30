<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class masukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $suppliers = DB::table('suppliers')->pluck('kd_supplier')->toArray();

        // Membuat beberapa entri masuk
        $masuks = [
            [
                'kd_masuk' => 'M1',
                'tgl_masuk' => now(),
                'kd_supplier' => $suppliers[array_rand($suppliers)], // Randomly select a kd_supplier,
                'total_masuk' => 10,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kd_masuk' => 'M2',
                'tgl_masuk' => now(),
                'kd_supplier' => $suppliers[array_rand($suppliers)], // Randomly select a kd_supplier,
                'total_masuk' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kd_masuk' => 'M3',
                'tgl_masuk' => now(),
                'kd_supplier' => $suppliers[array_rand($suppliers)], // Randomly select a kd_supplier,
                'total_masuk' => 10,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('masuks')->insert($masuks);
    }
}
