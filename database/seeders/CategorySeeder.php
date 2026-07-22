<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Paket Nasi & Lauk',
                'slug' => 'paket',
                'icon' => 'fa-box-open',
                'description' => 'Paket hemat komplit Nasi + Lauk Penyet + Sambal Bawang/Tomat + Lalapan',
            ],
            [
                'name' => 'Lauk Penyet',
                'slug' => 'lauk',
                'icon' => 'fa-drumstick-bite',
                'description' => 'Aneka lauk goreng/bakar penyet satuan pilihan Mbak Puji',
            ],
            [
                'name' => 'Soto & Lainnya',
                'slug' => 'soto-lainnya',
                'icon' => 'fa-bowl-rice',
                'description' => 'Soto ayam koya gurih, kuah soto, indomie telur, dan pilihan nasi',
            ],
            [
                'name' => 'Minuman',
                'slug' => 'minuman',
                'icon' => 'fa-glass-water',
                'description' => 'Teh, jeruk, aneka kopi, dan minuman segar penawar pedas',
            ],
            [
                'name' => 'Sambal & Ekstra',
                'slug' => 'sambal-ekstra',
                'icon' => 'fa-pepper-hot',
                'description' => 'Sambal bawang/tomat dadakan dan lalapan segar tambahan',
            ],
        ];

        foreach ($categories as $category) {
            Category::updateOrCreate(['slug' => $category['slug']], $category);
        }
    }
}
