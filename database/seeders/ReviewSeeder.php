<?php

namespace Database\Seeders;

use App\Models\Review;
use Illuminate\Database\Seeder;

class ReviewSeeder extends Seeder
{
    public function run(): void
    {
        $reviews = [
            [
                'customer_name' => 'Budi Santoso',
                'rating' => 5,
                'comment' => 'Sambal terasinya Mbak Puji emang juara banget! Ayamnya empuk bumbunya meresap sampai ke tulang. Soto ayamnya juga kuah koya gurih abis.',
                'avatar_color' => 'from-amber-500 to-red-600',
            ],
            [
                'customer_name' => 'Siti Rahmawati',
                'rating' => 5,
                'comment' => 'Langganan tiap makan siang kantor. Bebek penyet sambal korek pedesnya nendang bener. Pelayanan cepat dan ramah.',
                'avatar_color' => 'from-red-600 to-rose-700',
            ],
            [
                'customer_name' => 'Agus Pratama',
                'rating' => 5,
                'comment' => 'Soto daging sapinya kuah bening rasa authentic banget. Es jeruk perasnya manis alami penawar pedas yang pas.',
                'avatar_color' => 'from-emerald-500 to-teal-700',
            ],
            [
                'customer_name' => 'Dewi Lestari',
                'rating' => 5,
                'comment' => 'Paket Warungku Komplit hemat banget dapet ayam penyet plus soto. Sukses terus Mbak Puji!',
                'avatar_color' => 'from-orange-500 to-amber-700',
            ],
        ];

        foreach ($reviews as $review) {
            Review::create($review);
        }
    }
}
