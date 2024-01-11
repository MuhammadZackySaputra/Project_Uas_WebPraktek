<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products =  [
            [
                'id' => 12,
                'nama' => 'Croissant',
                'keterangan' => ' Adonan yang dibentuk manjadi kue bolu yang crunci.',
                'harga' => 25000,
                'foto_sampul' => 'croisan.jpeg',
            ],
            [
                'id' => 14,
                'nama' => 'Cromboloni',
                'keterangan' => 'Adonan yang dibentuk manjadi kue bolu yang crunci.',
                'harga' => 45000,
                'foto_sampul' => 'cromboloni.jpeg',
            ],
            [
                'id' => 113,
                'nama' => 'Croissant',
                'keterangan' => ' Adonan yang dibentuk manjadi kue bolu yang crunci.',
                'harga' => 35000,
                'foto_sampul' => 'croisan.jpeg',
            ],
            [
                'id' => 15,
                'nama' => 'Cromboloni',
                'keterangan' => 'Adonan yang dibentuk manjadi kue bolu yang crunci.',
                'harga' => 35000,
                'foto_sampul' => 'cromboloni.jpeg',
            ],
        ];
        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
