<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class BarangSeeder extends Seeder
{
    public function run()
    {
        $barangData = [
            [
                'nama_barang' => 'Laptop ASUS ROG Strix G15',
                'tanggal_beli' => '2023-01-15',
                'kondisi_barang' => 'Baru',
                'jumlah_unit' => 5,
            ],
            [
                'nama_barang' => 'Smartphone iPhone 13 Pro',
                'tanggal_beli' => '2023-02-20',
                'kondisi_barang' => 'Baru',
                'jumlah_unit' => 10,
            ],
            [
                'nama_barang' => 'Cannon E4s',
                'tanggal_beli' => '2023-02-20',
                'kondisi_barang' => 'Baru',
                'jumlah_unit' => 11,

            ],
            [
                'nama_barang' => 'Tripod',
                'tanggal_beli' => '2023-02-20',
                'kondisi_barang' => 'Baru',
                'jumlah_unit' => 4,
            ],
            [
                'nama_barang' => 'Proyektor Dan Kabel HDMI',
                'tanggal_beli' => '2024-04-20',
                'kondisi_barang' => 'Baru',
                'jumlah_unit' => 2,
            ],
            [
                'nama_barang' => 'Memory Camera 64 Gb',
                'tanggal_beli' => '2024-02-20',
                'kondisi_barang' => 'Baru',
                'jumlah_unit' => 5,
            ],
            [
                'nama_barang' => 'Lighting Studio',
                'tanggal_beli' => '2024-02-20',
                'kondisi_barang' => 'Baru',
                'jumlah_unit' => 2,
            ],
            [
                'nama_barang' => 'Microphone Rode Dynamic box',
                'tanggal_beli' => '2023-02-20',
                'kondisi_barang' => 'Baru',
                'jumlah_unit' => 2,
            ],

        ];

        // Mengisi tabel barangs dengan data barang rill
        DB::table('barangs')->insert($barangData);
    }
}
