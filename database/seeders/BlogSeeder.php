<?php

namespace Database\Seeders;

use App\Models\BlogItem;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $contentHTML = '<h2>Designing timeless moments inspired by romance and heritage</h2><p>A meaningful celebration begins with the emotions that define your relationship and the atmosphere you wish to create together. We take time to understand your story, your inspirations, and the details that matter most, shaping a wedding experience that feels deeply personal and effortlessly refined. From historic venues to intimate settings filled with charm, every element is thoughtfully curated to reflect your vision with elegance and authenticity.</p><p>Every luxury wedding deserves a balance of artistic storytelling and flawless coordination. Our process focuses on transforming ideas into immersive experiences where every texture, color palette, and design detail works harmoniously together, creating a celebration that feels timeless, sophisticated, and unforgettable for you and your guests.</p><h3>Creating elegant celebrations filled with emotion and refined beauty</h3><p>Our planning philosophy combines creativity, precision, and thoughtful collaboration to deliver exceptional wedding experiences tailored to your unique style. From concept development to event execution, we guide every stage with care, ensuring each moment unfolds seamlessly while maintaining the highest standards of luxury and sophistication throughout the celebration.</p><p>Through curated design direction, personalized planning strategies, and trusted industry expertise, we help couples bring their dream celebrations to life with confidence and clarity. Every detail is intentionally considered to create an atmosphere that feels immersive, romantic, and beautifully connected to your story.</p><div class="w-layout-hflex fda-features-image-wrapper" style="display:flex;gap:15px;margin:20px 0;"><div appear="" class="fda-features-image fda-overflow-hidden fda-radius"><img src="/images/6a6305bf5040b777232a1749_blog-details-features-image-one.webp" loading="lazy" width="469" alt="blog-image" /></div><div appear="" class="fda-features-image fda-overflow-hidden fda-radius"><img src="/images/6a6305bf5040b777232a1733_blog-details-features-image-two.webp" loading="lazy" width="469" alt="blog-image" /></div></div><div class="fda-more-details-content w-richtext"><h3>Your trusted creative team for unforgettable destination wedding experiences</h3><p>Whether your vision includes a romantic countryside ceremony, a historic architectural backdrop, or a grand destination celebration, our team provides the expertise needed to deliver a flawless and elevated experience. We focus on creating events that feel luxurious yet deeply personal, ensuring every detail—from guest experiences to visual storytelling—is executed with elegance, professionalism, and exceptional attention to detail for a truly memorable occasion.</p><ul role="list"><li>Personalized wedding styling and concept development</li><li>Luxury guest coordination and travel assistance</li><li>Romantic floral artistry and table scape design</li><li>Professional timeline and event production management</li><li>Access to exclusive venues and creative partners</li></ul></div>';

        $blogs = [
            [
                'title' => 'Romantic couple posing against an ancient stone wall',
                'publish_date' => '09 January 2026',
                'image' => 'images/6a6305be5040b777232a144e_Blog-image-one.webp',
                'banner_image' => 'images/6a6305be5040b777232a1435_Blog-thumbnail-image-one.avif',
                'content' => $contentHTML,
                'author_name' => 'Dennis Taylor',
                'author_role' => 'Event Manager',
                'author_image' => 'images/6a6305bf5040b777232a1848_User-image-one.webp',
                'sort_order' => 1,
            ],
            [
                'title' => 'Dreamy gondola beautiful ride through the canals of Venice',
                'publish_date' => '18 June 2025',
                'image' => 'images/6a6305be5040b777232a14b6_Blog-image-two.webp',
                'banner_image' => 'images/6a6305be5040b777232a1435_Blog-thumbnail-image-one.avif',
                'content' => $contentHTML,
                'author_name' => 'Victoria Hayes',
                'author_role' => 'Creative Director',
                'author_image' => 'images/6a6305bf5040b777232a1863_Author.avif',
                'sort_order' => 2,
            ],
            [
                'title' => 'Ethereal bridal portrait featuring soft garden greenery light',
                'publish_date' => '09 January 2025',
                'image' => 'images/6a6305be5040b777232a14dc_Blog-image-three.webp',
                'banner_image' => 'images/6a6305be5040b777232a1435_Blog-thumbnail-image-one.avif',
                'content' => $contentHTML,
                'author_name' => 'Benjamin Calder',
                'author_role' => 'Lead Planner',
                'author_image' => 'images/6a6305bf5040b777232a184a_User-image-three.webp',
                'sort_order' => 3,
            ],
            [
                'title' => 'Elegant outdoor banquet table set for a wedding ceremony',
                'publish_date' => '22 August 2025',
                'image' => 'images/6a6305bf5040b777232a15b1_Blog-image-four.webp',
                'banner_image' => 'images/6a6305be5040b777232a1435_Blog-thumbnail-image-one.avif',
                'content' => $contentHTML,
                'author_name' => 'Eleanor Brooks',
                'author_role' => 'Stylist',
                'author_image' => 'images/6a6305bf5040b777232a1841_User-image-four.webp',
                'sort_order' => 4,
            ],
            [
                'title' => 'Intimate wedding moment captured in a lush garden',
                'publish_date' => '06 August 2025',
                'image' => 'images/6a6305bf5040b777232a1583_Blog-image-five.webp',
                'banner_image' => 'images/6a6305be5040b777232a1435_Blog-thumbnail-image-one.avif',
                'content' => $contentHTML,
                'author_name' => 'Dennis Taylor',
                'author_role' => 'Event Manager',
                'author_image' => 'images/6a6305bf5040b777232a1848_User-image-one.webp',
                'sort_order' => 5,
            ],
            [
                'title' => 'Close up detail of a beautiful white bouquet loudge',
                'publish_date' => '23 July 2025',
                'image' => 'images/6a6305bf5040b777232a15e1_Blog-image-six.webp',
                'banner_image' => 'images/6a6305be5040b777232a1435_Blog-thumbnail-image-one.avif',
                'content' => $contentHTML,
                'author_name' => 'Victoria Hayes',
                'author_role' => 'Creative Director',
                'author_image' => 'images/6a6305bf5040b777232a1863_Author.avif',
                'sort_order' => 6,
            ],
        ];

        foreach ($blogs as $blog) {
            $blog['slug'] = Str::slug($blog['title']);
            $blog['status'] = 'active';
            BlogItem::updateOrCreate(['slug' => $blog['slug']], $blog);
        }
    }
}
