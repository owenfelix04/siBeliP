<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class barangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = [
            [
                'kd_barang' => '1kd',
                'nama_barang' => 'hilux',
                'satuan' => 'units',
                'harga_jual' => 500000000,
                'harga_beli' => 400000000,
                'stok' => 10,
                'status' => true,
            ],
            [
                'kd_barang' => '2kd',
                'nama_barang' => 'innova',
                'satuan' => 'units',
                'harga_jual' => 400000000,
                'harga_beli' => 300000000,
                'stok' => 10,
                'status' => true,
            ],
            [
                'kd_barang' => '3kd',
                'nama_barang' => 'knalpot',
                'satuan' => 'boxes',
                'harga_jual' => 4500000,
                'harga_beli' => 3500000,
                'stok' => 20,
                'status' => true,
            ],
            [
                'kd_barang' => '4kd',
                'nama_barang' => 'terios',
                'satuan' => 'units',
                'harga_jual' => 300000000,
                'harga_beli' => 200000000,
                'stok' => 10,
                'status' => false,
            ],
            [
                'kd_barang' => '5kd',
                'nama_barang' => 'filter minyak',
                'satuan' => 'boxes',
                'harga_jual' => 150000,
                'harga_beli' => 80000,
                'stok' => 25,
                'status' => true,
            ],
            [
                'kd_barang' => '6kd',
                'nama_barang' => 'spion',
                'satuan' => 'pieces',
                'harga_jual' => 1200000,
                'harga_beli' => 900000,
                'stok' => 12,
                'status' => true,
            ],
            [
                'kd_barang' => '7kd',
                'nama_barang' => 'calya',
                'satuan' => 'units',
                'harga_jual' => 95000000,
                'harga_beli' => 80000000,
                'stok' => 10,
                'status' => false,
            ],
            [
                'kd_barang' => '8kd',
                'nama_barang' => 'turbo',
                'satuan' => 'pieces',
                'harga_jual' => 12000000,
                'harga_beli' => 9500000,
                'stok' => 8,
                'status' => true,
            ],
            [
                'kd_barang' => '9kd',
                'nama_barang' => 'karet mobil',
                'satuan' => 'boxes',
                'harga_jual' => 1200000,
                'harga_beli' => 1000000,
                'stok' => 20,
                'status' => true,
            ],
            [
                'kd_barang' => '10kd',
                'nama_barang' => 'hiace',
                'satuan' => 'units',
                'harga_jual' => 550000000,
                'harga_beli' => 450000000,
                'stok' => 12,
                'status' => false,
            ],
        ];

        // Insert products into the barang table
        DB::table('barangs')->insert($products);
    }
}
