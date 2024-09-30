<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class d_masukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = DB::table('barangs')->pluck('harga_beli', 'kd_barang')->toArray();

        // Manual entries for d_masuks based on the specified PO codes
        $d_masuks = [
            // Entries for PO001
            [
                'id_masuk' => 'id1',
                'kd_masuk' => 'M1',
                'kd_barang_beli' => '1kd', // Product A
                'jumlah' => 2,  // Quantity
                'subtotal' => 2 * $products['1kd'], // Fetch harga_beli from the array
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_masuk' => 'id2',
                'kd_masuk' => 'M1',
                'kd_barang_beli' => '2kd', // Product B
                'jumlah' => 1,
                'subtotal' => 1 * $products['2kd'],
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_masuk' => 'id3',
                'kd_masuk' => 'M1',
                'kd_barang_beli' => '3kd', // Product C
                'jumlah' => 1,
                'subtotal' => 1 * $products['3kd'],
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_masuk' => 'id4',
                'kd_masuk' => 'M1',
                'kd_barang_beli' => '4kd', // Product D
                'jumlah' => 1,
                'subtotal' => 1 * $products['4kd'],
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_masuk' => 'id5',
                'kd_masuk' => 'M1',
                'kd_barang_beli' => '5kd', // Product E
                'jumlah' => 1,
                'subtotal' => 1 * $products['5kd'],
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Entries for PO002
            [
                'id_masuk' => 'id6',
                'kd_masuk' => 'M2',
                'kd_barang_beli' => '6kd', // Product F
                'jumlah' => 2,
                'subtotal' => 2 * $products['6kd'],
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_masuk' => 'id7',
                'kd_masuk' => 'M2',
                'kd_barang_beli' => '7kd', // Product G
                'jumlah' => 2,
                'subtotal' => 2 * $products['7kd'],
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_masuk' => 'id8',
                'kd_masuk' => 'M2',
                'kd_barang_beli' => '8kd', // Product H
                'jumlah' => 1,
                'subtotal' => 1 * $products['8kd'],
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_masuk' => 'id9',
                'kd_masuk' => 'M2',
                'kd_barang_beli' => '9kd', // Product I
                'jumlah' => 1,
                'subtotal' => 1 * $products['9kd'],
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_masuk' => 'id10',
                'kd_masuk' => 'M2',
                'kd_barang_beli' => '10kd', // Product J
                'jumlah' => 1,
                'subtotal' => 1 * $products['10kd'],
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Entries for PO003
            [
                'id_masuk' => 'id11',
                'kd_masuk' => 'M3',
                'kd_barang_beli' => '1kd', // Product A
                'jumlah' => 2,
                'subtotal' => 2 * $products['1kd'],
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_masuk' => 'id12',
                'kd_masuk' => 'M3',
                'kd_barang_beli' => '2kd', // Product B
                'jumlah' => 2,
                'subtotal' => 2 * $products['2kd'],
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_masuk' => 'id13',
                'kd_masuk' => 'M3',
                'kd_barang_beli' => '3kd', // Product C
                'jumlah' => 3,
                'subtotal' => 3 * $products['3kd'],
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_masuk' => 'id14',
                'kd_masuk' => 'M3',
                'kd_barang_beli' => '4kd', // Product D
                'jumlah' => 2,
                'subtotal' => 2 * $products['4kd'],
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_masuk' => 'id15',
                'kd_masuk' => 'M3',
                'kd_barang_beli' => '5kd', // Product E
                'jumlah' => 1,
                'subtotal' => 1 * $products['5kd'],
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_masuk' => 'id16',
                'kd_masuk' => 'M3',
                'kd_barang_beli' => '6kd', // Product F
                'jumlah' => 1,
                'subtotal' => 1 * $products['6kd'],
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_masuk' => 'id17',
                'kd_masuk' => 'M3',
                'kd_barang_beli' => '7kd', // Product G
                'jumlah' => 1,
                'subtotal' => 1 * $products['7kd'],
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_masuk' => 'id18',
                'kd_masuk' => 'M3',
                'kd_barang_beli' => '8kd', // Product H
                'jumlah' => 1,
                'subtotal' => 1 * $products['8kd'],
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_masuk' => 'id19',
                'kd_masuk' => 'M3',
                'kd_barang_beli' => '9kd', // Product I
                'jumlah' => 1,
                'subtotal' => 1 * $products['9kd'],
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_masuk' => 'id20',
                'kd_masuk' => 'M3',
                'kd_barang_beli' => '10kd', // Product J
                'jumlah' => 1,
                'subtotal' => 1 * $products['10kd'],
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        // Insert entries into the d_masuks table
        DB::table('d_masuks')->insert($d_masuks);
    }
}
