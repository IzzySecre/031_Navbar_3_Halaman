<?php

namespace Database\Seeders;

use App\Models\Laptop;
use Illuminate\Database\Seeder;

class LaptopSeeder extends Seeder
{
    public function run(): void
    {
        $laptops = [
            [
                'nama' => 'ASUS ROG Strix G16',
                'merk' => 'ASUS',
                'processor' => 'Intel Core i7-13650HX',
                'ram' => 16,
                'storage' => 512,
                'harga' => 18999000,
                'deskripsi' => 'Laptop gaming dengan performa tinggi, cocok untuk gaming dan editing berat.',
                'gambar' => null,
            ],
            [
                'nama' => 'Lenovo IdeaPad Slim 5',
                'merk' => 'Lenovo',
                'processor' => 'AMD Ryzen 5 7530U',
                'ram' => 8,
                'storage' => 512,
                'harga' => 8999000,
                'deskripsi' => 'Laptop ringan untuk kebutuhan kerja dan kuliah sehari-hari.',
                'gambar' => null,
            ],
            [
                'nama' => 'MacBook Air M2',
                'merk' => 'Apple',
                'processor' => 'Apple M2',
                'ram' => 8,
                'storage' => 256,
                'harga' => 16999000,
                'deskripsi' => 'Laptop tipis dan ringan dengan performa chip Apple Silicon.',
                'gambar' => null,
            ],
            [
                'nama' => 'HP Pavilion 14',
                'merk' => 'HP',
                'processor' => 'Intel Core i5-1235U',
                'ram' => 8,
                'storage' => 512,
                'harga' => 9499000,
                'deskripsi' => 'Laptop dengan desain elegan cocok untuk mahasiswa dan pekerja kantoran.',
                'gambar' => null,
            ],
            [
                'nama' => 'Acer Nitro V15',
                'merk' => 'Acer',
                'processor' => 'Intel Core i5-13420H',
                'ram' => 16,
                'storage' => 512,
                'harga' => 12999000,
                'deskripsi' => 'Laptop gaming dengan harga terjangkau, cocok untuk pemula.',
                'gambar' => null,
            ],
        ];

        foreach ($laptops as $laptop) {
            Laptop::create($laptop);
        }
    }
}