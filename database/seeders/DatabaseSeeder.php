<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        \App\Models\User::firstOrCreate([
            'email' => 'admin@admin.com',
        ], [
            'name' => 'Admin',
            'password' => \Illuminate\Support\Facades\Hash::make('password'),
            'role' => 'admin',
        ]);

        $k1 = \App\Models\Kategori::firstOrCreate(['nama_kategori' => 'Politik']);
        $k2 = \App\Models\Kategori::firstOrCreate(['nama_kategori' => 'Ekonomi']);
        $k3 = \App\Models\Kategori::firstOrCreate(['nama_kategori' => 'Olahraga']);

        \App\Models\Berita::create([
            'judul' => 'Berita Pertama Politik',
            'isi_berita' => 'Ini adalah isi berita pertama untuk kategori politik.',
            'kategori_id' => $k1->id,
            'penulis' => 'Wartawan 1',
            'tanggal_berita' => now()->subDays(2),
        ]);

        \App\Models\Berita::create([
            'judul' => 'Pertumbuhan Ekonomi Meningkat',
            'isi_berita' => 'Tahun ini pertumbuhan ekonomi mencapai rekor tertinggi.',
            'kategori_id' => $k2->id,
            'penulis' => 'Wartawan 2',
            'tanggal_berita' => now()->subDays(1),
        ]);
    }
}
