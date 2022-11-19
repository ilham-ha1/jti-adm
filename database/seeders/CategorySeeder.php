<?php

namespace Database\Seeders;

use App\Models\Kategori;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ktg = [
            [
               'nama_kategori'=>'Transkrip Nilai',
            ],
            [
               'nama_kategori'=>'Kartu Hasil Studi',
            ],
        ];
    
        foreach ($ktg as $key => $ktg) {
            Kategori::create($ktg);
        }
    }
}
