<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Kategori;

class SeederKategori extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            'LEMBAGA' => [
                'Bodleian Library',
                'EFEO Jakarta',
                'Museum Sribaduga',
                'Perangan',
                'Perpustakaan Nasional',
                'Perpustakaan Universitas',
                'Pusat Penelitian Kebudayaan',
            ],

            'ALAS TULIS' => [
                'Daluang',
                'gebang',
                'Kertas',
                'Kertas Eropa',
                'Kertas folio bergaris',
                'Lontar',
            ],

            'AKSARA' => [
                'Arab',
                'Cacarakan',
                'Kawi',
                'Latin',
                'Pegon',
                'Sunda Kuna',
            ],

            'BAHASA' => [
                'Arab',
                'Jawa',
                'Jawa Cirebon',
                'Jawa Kuno',
                'Sunda',
                'Sunda Kuna',
            ],
        ];

        foreach ($data as $parent => $children) {

            // insert parent
            $parentKategori = Kategori::create([
                'name' => $parent,
                'parent_id' => null,
            ]);

            // insert children
            foreach ($children as $child) {
                Kategori::create([
                    'name' => $child,
                    'parent_id' => $parentKategori->id,
                ]);
            }
        }
    }
}