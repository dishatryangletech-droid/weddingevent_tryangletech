<?php
// Script to seed Portfolio items

require __DIR__ . '/vendor/autoload.php';
$app = require_once __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Models\PortfolioTag;
use App\Models\PortfolioItem;

// Create Tags
$tags = [
    'Wedding' => 'wedding',
    'Luxury Weddings' => 'luxury-weddings',
    'Destination Weddings' => 'destination-weddings',
];

$tagIds = [];
foreach ($tags as $name => $slug) {
    $tag = PortfolioTag::firstOrCreate(['name' => $name], ['status' => 'active']);
    $tagIds[$name] = $tag->id;
}

// Items Data
$portfolios = [
    [
        'title' => 'Jennifer & Oliver',
        'subtitle' => 'Romantic Botanical Garden Celebration',
        'category' => 'Wedding',
        'location' => 'Lakeside Conservatory & Gardens',
        'date_text' => 'June 18, 2025',
        'cover_image' => 'images/6a6305bf5040b777232a182a_Event-image-two-one.avif',
        'description' => 'Lacus, ultrices sit nunc, pretium amet amet. Fermentum velit, mauris, laoreet cras quam tempus lorem. Vulputate risus eget quis commodo. A bespoke romantic wedding in an ethereal garden glasshouse surrounded by lush florals and soft glowing lanterns.',
        'client_name' => 'Jennifer & Oliver',
        'quote' => '"We turn dreams into reality. Weave story into every thread of your event."',
    ],
    [
        'title' => 'Briana & Richard',
        'subtitle' => 'Ethereal Country Estate Romance',
        'category' => 'Wedding',
        'location' => 'Heritage Country Manor & Lawn',
        'date_text' => 'July 24, 2025',
        'cover_image' => 'images/6a6305bf5040b777232a1836_Event-image-two.avif',
        'description' => 'Set against rolling hills and ancient oak trees, Briana and Richard brought timeless elegance to their open-air celebration. Delicate white florals, velvet seating lounges, and twilight festoon lighting created an unforgettable atmosphere.',
        'client_name' => 'Briana & Richard',
        'quote' => '"Every moment felt effortlessly luxurious and deeply personal. It was truly the best day of our lives."',
    ],
    [
        'title' => 'Anne & Cameron',
        'subtitle' => 'Modern Minimalist Villa Affair',
        'category' => 'Wedding',
        'location' => 'Ocean View Cliffside Villa',
        'date_text' => 'September 12, 2025',
        'cover_image' => 'images/6a6305bf5040b777232a1839_Event-image-four.avif',
        'description' => 'Sophisticated simplicity overlooking the ocean. Anne and Cameron celebrated with clean architectural lines, monochrome floral arrangements, and intimate candlelit long tables under the stars.',
        'client_name' => 'Anne & Cameron',
        'quote' => '"Sleek, stylish, and flawlessly executed from start to finish."',
    ],
    [
        'title' => 'Linda & Charles',
        'subtitle' => 'Classic Vintage Charm & Heritage Romance',
        'category' => 'Wedding',
        'location' => 'Grand Palace Ballroom & Courtyard',
        'date_text' => 'October 05, 2025',
        'cover_image' => 'images/6a6305bf5040b777232a1838_Event-image-five.avif',
        'description' => 'A grand celebration inside a historic ballroom featuring gold leaf detailing, majestic chandeliers, and a lavish 5-tier cake. Linda and Charles embraced timeless vintage glamour in every single detail.',
        'client_name' => 'Linda & Charles',
        'quote' => '"An unforgettable evening of pure elegance, warmth, and breathtaking beauty."',
    ],
    [
        'title' => "Sophia & Liam's Grand Royal Wedding",
        'subtitle' => 'Imperial Opulence & Gold Floral Splendor',
        'category' => 'Luxury Weddings',
        'location' => 'Monarch Palace Hall & Gardens',
        'date_text' => 'October 14, 2025',
        'cover_image' => 'images/6a6305bf5040b777232a181c_Banner-home-one-image.avif',
        'description' => 'A royal celebration held in the heart of Monarch Palace Hall. Surrounded by 40,000 hand-selected white roses and gold filigree arches, Sophia and Liam exchanged vows under crystal chandeliers before a night of live orchestra music and fireworks.',
        'client_name' => 'Sophia & Liam',
        'quote' => '"Knotcraft turned our grandest dream into a fairytale reality. Every single detail felt like stepping into a royal masterpiece."',
    ],
    [
        'title' => "Aarav & Ananya's Destination Beach Vows",
        'subtitle' => 'Coastal Sunset Breeze & White Sand Elegance',
        'category' => 'Destination Weddings',
        'location' => 'Azure Shore Sunset Sanctuary',
        'date_text' => 'November 22, 2025',
        'cover_image' => 'images/6a6305bf5040b777232a1674_destination-image.avif',
        'description' => 'Set against the soothing waves of the Azure Shore, Aarav and Ananya brought intimate luxury to beachside celebrations.',
        'client_name' => 'Ananya & Aarav',
        'quote' => '"The warmth, ocean breeze, and ethereal setup created memories that our guests are still raving about."',
    ]
];

foreach ($portfolios as $index => $p) {
    PortfolioItem::create([
        'title' => $p['title'],
        'slug' => \Illuminate\Support\Str::slug($p['title']),
        'subtitle' => $p['subtitle'],
        'portfolio_tag_id' => $tagIds[$p['category']],
        'status' => 'active',
        'sort_order' => $index + 1,
        
        // Detailed fields
        'client_name' => $p['client_name'],
        'location' => $p['location'],
        'date_text' => $p['date_text'],
        'detail_headline' => substr($p['quote'], 0, 250),
        'detail_content' => '<p>' . $p['description'] . '</p>',
    ]);
}

echo "Successfully seeded portfolio tags and items!\n";
