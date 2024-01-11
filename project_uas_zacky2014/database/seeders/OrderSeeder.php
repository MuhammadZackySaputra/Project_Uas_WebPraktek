<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $product1 = Product::find(1); // Ganti dengan id produk yang ingin dihubungkan
        $product2 = Product::find(2); // Ganti dengan id produk yang ingin dihubungkan

        // Buat data order dan hubungkan dengan produk yang sudah diambil
        Order::create([
            'product_id' => $product1->id,
            'nama_pembeli' => 'Nama Pembeli 1',
            'jumlah_dibeli' => 3,
            'total_harga' => $product1->harga * 3,
        ]);

        Order::create([
            'product_id' => $product2->id,
            'nama_pembeli' => 'Nama Pembeli 2',
            'jumlah_dibeli' => 2,
            'total_harga' => $product2->harga * 2,
        ]);

    }
}
