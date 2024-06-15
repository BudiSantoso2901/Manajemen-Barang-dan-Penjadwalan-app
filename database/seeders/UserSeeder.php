<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userData = [
            [
                'nim' => '123456789013',
                'type' => 0,
                'nama' => 'Budi',
                'alamat' => 'Jl. Contoh No. 123',
                'job_desk' => 'Programmer',
                'email' => 'beez@example.com',
                'phone_number' => '081234567890',
                'status' => 'Aktif',
                'kelas' => 'TI-01',
                'pengalaman' => 'Pengembangan Web',
                'password' => Hash::make('password123'),
            ],

            [

                'nim' => '111111111111',
                'type' => 1,
                'nama' => 'admin1',
                'alamat' => 'Jl. Uji Coba No. 456',
                'job_desk' => 'Administrator',
                'email' => 'admin1@gmail.com',
                'phone_number' => '087654321098',
                'status' => 'Aktif',
                'kelas' => 'MI-02',
                'pengalaman' => 'Administrasi Sistem',
                'password' => bcrypt('admin111'),

            ],
            // Tambahkan data user lainnya sesuai kebutuhan
        ];

        // Mengisi tabel users dengan data user rill
        DB::table('users')->insert($userData);
    }
}
