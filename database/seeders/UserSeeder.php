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
                'nama' => 'Budi Santoso',
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
                'nim' => '123456789014',
                'type' => 0,
                'nama' => 'Dinda Rosalin Husna',
                'alamat' => 'Jl. Contoh No. 124',
                'job_desk' => 'Desainer Grafis',
                'email' => 'dinda@example.com',
                'phone_number' => '081234567891',
                'status' => 'Aktif',
                'kelas' => 'TI-02',
                'pengalaman' => 'Desain Grafis',
                'password' => Hash::make('password123'),
            ],
            [
                'nim' => '123456789015',
                'type' => 0,
                'nama' => 'Mohammad Rashel Arrizki',
                'alamat' => 'Jl. Contoh No. 125',
                'job_desk' => 'Data Analyst',
                'email' => 'rashel@example.com',
                'phone_number' => '081234567892',
                'status' => 'Aktif',
                'kelas' => 'TI-03',
                'pengalaman' => 'Analisis Data',
                'password' => Hash::make('password123'),
            ],
            [
                'nim' => '123456789016',
                'type' => 0,
                'nama' => 'Ajeng Fuji Rahayu',
                'alamat' => 'Jl. Contoh No. 126',
                'job_desk' => 'Quality Assurance',
                'email' => 'ajeng@example.com',
                'phone_number' => '081234567893',
                'status' => 'Aktif',
                'kelas' => 'TI-04',
                'pengalaman' => 'Quality Assurance',
                'password' => Hash::make('password123'),
            ],
            [
                'nim' => '123456789017',
                'type' => 0,
                'nama' => 'Bagus Fadillah',
                'alamat' => 'Jl. Contoh No. 127',
                'job_desk' => 'System Administrator',
                'email' => 'bagus@example.com',
                'phone_number' => '081234567894',
                'status' => 'Aktif',
                'kelas' => 'TI-05',
                'pengalaman' => 'Administrasi Sistem',
                'password' => Hash::make('password123'),
            ],
            [
                'nim' => '123456789018',
                'type' => 0,
                'nama' => 'Faryota Arimaha Rizqi',
                'alamat' => 'Jl. Contoh No. 128',
                'job_desk' => 'Mobile Developer',
                'email' => 'faryota@example.com',
                'phone_number' => '081234567895',
                'status' => 'Aktif',
                'kelas' => 'TI-06',
                'pengalaman' => 'Pengembangan Aplikasi Mobile',
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
