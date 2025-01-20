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
        $products = [
            [
                'nama' => 'produk 1',
                'deskripsi' => 'Enak Sekali',
                'harga_produk' => 15000,
                'jumlah_produksi' => 15,
                'foto_produk' => '',
                'user_id' => 2,
                'status' => 'approved',
            ],
            [
                'nama' => 'produk 2',
                'deskripsi' => 'Mantapp Sekali',
                'harga_produk' => 30000,
                'jumlah_produksi' => 20,
                'foto_produk' => '',
                'user_id' => 3,
                'status' => 'approved',
            ],
            [
                'nama' => 'produk 3',
                'deskripsi' => 'Mantappu Jiwaa',
                'harga_produk' => 34000,
                'jumlah_produksi' => 19,
                'foto_produk' => '',
                'user_id' => 4,
                'status' => 'approved',
            ],
            [
                'nama' => 'produk 4',
                'deskripsi' => 'Kerennn',
                'harga_produk' => 44000,
                'jumlah_produksi' => 33,
                'foto_produk' => '',
                'user_id' => 2,
                'status' => 'approved',
            ],
            [
                'nama' => 'produk 5',
                'deskripsi' => 'Sedappp',
                'harga_produk' => 35000,
                'jumlah_produksi' => 13,
                'foto_produk' => '',
                'user_id' => 3,
                'status' => 'approved',
            ],
            [
                'nama' => 'produk 6',
                'deskripsi' => 'Niceee',
                'harga_produk' => 55000,
                'jumlah_produksi' => 12,
                'foto_produk' => '',
                'user_id' => 4,
                'status' => 'approved',
            ],
            [
                'nama' => 'produk 7',
                'deskripsi' => 'yaaaaa',
                'harga_produk' => 40000,
                'jumlah_produksi' => 55,
                'foto_produk' => '',
                'user_id' => 3,
                'status' => 'approved',
            ],
            [
                'nama' => 'produk 7',
                'deskripsi' => 'waaaaaaa',
                'harga_produk' => 66000,
                'jumlah_produksi' => 77,
                'foto_produk' => '',
                'user_id' => 4,
                'status' => 'approved',
            ],
        ];

        foreach($products as $product){
            Product::create($product);
        }
    }
}
