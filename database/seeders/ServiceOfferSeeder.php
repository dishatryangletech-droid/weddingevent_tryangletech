<?php

namespace Database\Seeders;

use App\Models\ServiceOfferItem;
use Illuminate\Database\Seeder;

class ServiceOfferSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $offers = [
            [
                'title' => 'Artful floral design',
                'description' => 'Curating organic and elegant arrangements that transform your venue into a breathtaking sanctuary.',
                'image' => 'images/6a6305bf5040b777232a157c_Bride.avif',
                'sort_order' => 1,
                'status' => 'active'
            ],
            [
                'title' => 'Bespoke wedding planning',
                'description' => 'We provide comprehensive management to ensure a nice seamless journey stress-free celebration of your love.',
                'image' => 'images/6a6305be5040b777232a14eb_Bride-image.avif',
                'sort_order' => 2,
                'status' => 'active'
            ],
            [
                'title' => 'Serene bridal preparation',
                'description' => 'Creating a calm space for your morning of radiant, peaceful, and beautifully effortless preparation.',
                'image' => 'images/6a6305be5040b777232a14ea_Bride-image.avif',
                'sort_order' => 3,
                'status' => 'active'
            ]
        ];

        foreach ($offers as $offer) {
            ServiceOfferItem::create($offer);
        }
    }
}
