<?php

namespace Database\Seeders;

use App\Models\Sdgs;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SdgsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sdgs = [
            ['code' => 'TPB 01', 'name' => 'Tanpa Kemiskinan'],
            ['code' => 'TPB 02', 'name' => 'Tanpa Kelaparan'],
            ['code' => 'TPB 03', 'name' => 'Kehidupan Sehat dan Sejahtera'],
            ['code' => 'TPB 04', 'name' => 'Pendidikan Berkualitas'],
            ['code' => 'TPB 05', 'name' => 'Kesetaraan Gender'],
            ['code' => 'TPB 06', 'name' => 'Air Bersih dan Sanitasi Layak'],
            ['code' => 'TPB 07', 'name' => 'Energi Bersih dan Terjangkau'],
            ['code' => 'TPB 08', 'name' => 'Pekerjaan Layak dan Pertumbuhan Ekonomi'],
            ['code' => 'TPB 09', 'name' => 'Industri, Inovasi dan Infrastruktur'],
            ['code' => 'TPB 10', 'name' => 'Berkurangnya Kesenjangan'],
            ['code' => 'TPB 11', 'name' => 'Kota dan Permukiman yang Berkelanjutan'],
            ['code' => 'TPB 12', 'name' => 'Konsumsi dan Produksi yang Bertanggung Jawab'],
            ['code' => 'TPB 13', 'name' => 'Penanganan Perubahan Iklim'],
            ['code' => 'TPB 14', 'name' => 'Ekosistem Lautan'],
            ['code' => 'TPB 15', 'name' => 'Ekosistem Daratan'],
            ['code' => 'TPB 16', 'name' => 'Perdamaian, Keadilan dan Kelembagaan yang Tangguh'],
            ['code' => 'TPB 17', 'name' => 'Kemitraan untuk Mencapai Tujuan'],
        ];

        foreach ($sdgs as $sdg) {
            Sdgs::create($sdg);
        }
    }
}
