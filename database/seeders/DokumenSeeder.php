<?php

namespace Database\Seeders;

use App\Models\Dokumen;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DokumenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dokumen = [
            [
                'kategori_id' => '1',
                'kode' => 'TT/01',
                'nomor_surat' => '001/PL2.TI/2022',
                'nim' => '2041720001',
                'nama' => 'Adi Budi Cahyadi',
                'lulus' => '2024',
            ],
            [
                'kategori_id' => '2',
                'kode' => 'KHS/01',
                'nomor_surat' => '001/PL1.TI/2022',
                'nim' => '2041720002',
                'nama' => 'Ena Firmansyah',
                'lulus' => '2024',
            ],
            [
                'kategori_id' => '1',
                'kode' => 'TT/02',
                'nomor_surat' => '002/PL2.TI/2022',
                'nim' => '2041720003',
                'nama' => 'Giyanti Hidayah',
                'lulus' => '2024',
            ],
            [
                'kategori_id' => '2',
                'kode' => 'KHS/02',
                'nomor_surat' => '002/PL1.TI/2022',
                'nim' => '2041720004',
                'nama' => 'Iman Joko Lutfiansyah',
                'lulus' => '2024',
            ],
        ];
    
        foreach ($dokumen as $key => $dok) {
            Dokumen::create($dok);
        }
    }
}
