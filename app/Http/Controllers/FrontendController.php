<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class FrontendController extends Controller
{
    /**
     * Home One (Default)
     */
    public function home(): View
    {
        $portfolios = $this->getPortfolioData();
        $banner = \App\Models\HomeBanner::first();
        $bannerPortfolios = \App\Models\HomeBannerPortfolio::orderBy('sort_order', 'asc')->get();
        return view('frontend.home', compact('portfolios', 'banner', 'bannerPortfolios'));
    }

    /**
     * Home Two
     */
    public function homeTwo(): View
    {
        return view('frontend.home-two');
    }

    /**
     * Home Three
     */
    public function homeThree(): View
    {
        return view('frontend.home-three');
    }

    /**
     * About Page
     */
    public function about(): View
    {
        return view('frontend.about');
    }

    /**
     * Services
     */
    public function serviceOne(): View
    {
        $recognitionsSection = \App\Models\HomeRecognitionsSection::first();
        $recognitionItems = \App\Models\HomeRecognitionItem::orderBy('sort_order', 'asc')->get();
        return view('frontend.service-one', compact('recognitionsSection', 'recognitionItems'));
    }

    public function serviceTwo(): View
    {
        return view('frontend.service-two');
    }

    public function serviceThree(): View
    {
        $serviceBanner = \App\Models\ServiceBannerSection::getSettings();
        $serviceExpertise = \App\Models\ServiceExpertiseSection::getSettings();
        $serviceProcess = \App\Models\ServiceProcessSection::getSettings();
        $serviceFaqSection = \App\Models\ServiceFaqSection::getSettings();
        $serviceFaqs = \App\Models\ServiceFaq::where('status', 'active')->orderBy('order', 'asc')->get();

        return view('frontend.service-three', compact('serviceBanner', 'serviceExpertise', 'serviceProcess', 'serviceFaqSection', 'serviceFaqs'));
    }

    /**
     * Packages
     */
    public function classicPackage(): View
    {
        return view('frontend.classic-package');
    }

    public function elegancePackage(): View
    {
        return view('frontend.elegance-package');
    }

    public function luxuryPackage(): View
    {
        return view('frontend.luxury-package');
    }

    /**
     * Booking Inquiry
     */
    public function bookingInquiry(): View
    {
        return view('frontend.booking-inquiry');
    }

    /**
     * Venues List & Detail
     */
    public function venue(): View
    {
        return view('frontend.venue');
    }

    public function venueDetail(string $slug): View
    {
        $viewName = "frontend.venue-detail.{$slug}";
        if (view()->exists($viewName)) {
            return view($viewName);
        }

        abort(404);
    }

    /**
     * Events List & Detail
     */
    public function event(): View
    {
        $eventBanner = \App\Models\EventBannerSection::getSettings();
        $eventHeader = \App\Models\EventSectionHeader::getSettings();
        $eventItems = \App\Models\EventPageItem::where('status', 'active')->orderBy('sort_order', 'asc')->get();

        return view('frontend.event', compact('eventBanner', 'eventHeader', 'eventItems'));
    }

    public function eventDetail(string $slug): View
    {
        $item = \App\Models\EventPageItem::where('slug', $slug)->first();
        if (! $item) {
            $item = \App\Models\EventPageItem::first();
        }

        $upcomingEvents = \App\Models\EventPageItem::where('id', '!=', $item?->id)
            ->where('status', 'active')
            ->take(3)
            ->get();

        $viewName = "frontend.event.{$slug}";
        if (view()->exists($viewName)) {
            return view($viewName, compact('item', 'upcomingEvents'));
        }

        if ($item) {
            return view('frontend.event.romantic-garden-couple-shoot', compact('item', 'upcomingEvents'));
        }

        abort(404);
    }

    /**
     * Portfolio Showcase & Portfolio Detail
     */
    public function portfolio(): View
    {
        $portfolios = $this->getPortfolioData();
        return view('frontend.portfolio', compact('portfolios'));
    }

    public function portfolioDetail(string $slug): View
    {
        $portfolios = $this->getPortfolioData();
        $item = collect($portfolios)->firstWhere('slug', $slug);

        if (!$item) {
            // fallback to first portfolio if slug not matching
            $item = $portfolios[0];
        }

        $relatedPortfolios = collect($portfolios)->where('slug', '!=', $item['slug'])->take(3);

        return view('frontend.portfolio-detail', compact('item', 'relatedPortfolios'));
    }

    /**
     * Portfolio Dataset
     */
    private function getPortfolioData(): array
    {
        return [
            [
                'id' => 1,
                'slug' => 'jennifer-oliver',
                'title' => 'Jennifer & Oliver',
                'subtitle' => 'Romantic Botanical Garden Celebration',
                'category' => 'Wedding',
                'category_slug' => 'wedding',
                'location' => 'Lakeside Conservatory & Gardens',
                'date' => 'June 18, 2025',
                'guests' => '220 Guests',
                'cover_image' => 'images/6a6305bf5040b777232a182a_Event-image-two-one.avif',
                'video_mp4' => 'videos/6a6305bf5040b777232a17a6_Knotcraft-home-two-video-1-_mp4.mp4',
                'video_webm' => 'videos/6a6305bf5040b777232a17a6_Knotcraft-home-two-video-1-_webm.webm',
                'video_poster' => 'images/69e06bfff096fe744c997c8d_6a435f1052c6cbd76b28033d_Knotcraft-home-two-video-1-_poster.0000000.jpg',
                'gallery' => [
                    'images/6a6305bf5040b777232a182a_Event-image-two-one.avif',
                    'images/6a6305bf5040b777232a1836_Event-image-two.avif',
                    'images/6a6305bf5040b777232a1853_Event-Thumbnail-Image-one.avif',
                    'images/6a2f9294bc0e9d85ec75ed51_Elegance-gallery.avif',
                    'images/6a6305bf5040b777232a1834_Event-post-one-image-four.avif',
                    'images/6a6305bf5040b777232a183d_Event-image-six.avif'
                ],
                'description' => 'Lacus, ultrices sit nunc, pretium amet amet. Fermentum velit, mauris, laoreet cras quam tempus lorem. Vulputate risus eget quis commodo. A bespoke romantic wedding in an ethereal garden glasshouse surrounded by lush florals and soft glowing lanterns.',
                'highlights' => [
                    'Bespoke Floral Archway & Ceremony Altar',
                    'Candlelit Glasshouse Banquet Reception',
                    'Acoustic Strings & Vintage Champagne Bar',
                    'Custom Floral Print Stationery & Keepsakes'
                ],
                'quote' => '"We turn dreams into reality. Weave story into every thread of your event."',
                'quote_author' => 'Jennifer & Oliver',
                'color_palette' => ['#C5A059', '#F9F6F0', '#4A4036', '#D4C4B3']
            ],
            [
                'id' => 2,
                'slug' => 'briana-richard',
                'title' => 'Briana & Richard',
                'subtitle' => 'Ethereal Country Estate Romance',
                'category' => 'Wedding',
                'category_slug' => 'wedding',
                'location' => 'Heritage Country Manor & Lawn',
                'date' => 'July 24, 2025',
                'guests' => '180 Guests',
                'cover_image' => 'images/6a6305bf5040b777232a1836_Event-image-two.avif',
                'video_mp4' => 'videos/6a6305bf5040b777232a15d7_vecteezy_bride-walks-down-the-aisle-at-a-church-wedding-surrounded_71714333_mp4.mp4',
                'video_webm' => 'videos/6a6305bf5040b777232a15d7_vecteezy_bride-walks-down-the-aisle-at-a-church-wedding-surrounded_71714333_webm.webm',
                'video_poster' => 'images/69e06bfff096fe744c997c8d_6a0fe8bc65b9f2a589c82bb6_vecteezy_bride-walks-down-the-aisle-at-a-church-wedding-surrounded_71714333_poster.0000000.jpg',
                'gallery' => [
                    'images/6a6305bf5040b777232a1836_Event-image-two.avif',
                    'images/6a6305bf5040b777232a1850_Event-image-nine.avif',
                    'images/6a6305bf5040b777232a1854_Event-Thumbnail-Image-six.avif',
                    'images/6a2fdad3c6de0b864499b3b0_Classic gallery.avif',
                    'images/6a6305bf5040b777232a183a_Event-image-two--two.avif',
                    'images/6a6305bf5040b777232a1855_Event-Thumbnail-Image-seven.avif'
                ],
                'description' => 'Set against rolling hills and ancient oak trees, Briana and Richard brought timeless elegance to their open-air celebration. Delicate white florals, velvet seating lounges, and twilight festoon lighting created an unforgettable atmosphere.',
                'highlights' => [
                    'Open-Air Courtyard Sunset Dinner',
                    'Artisanal Wine & Craft Cocktail Tasting',
                    'Live Jazz Quintet Performance',
                    'Twilight Fairy Light Canopy'
                ],
                'quote' => '"Every moment felt effortlessly luxurious and deeply personal. It was truly the best day of our lives."',
                'quote_author' => 'Briana & Richard',
                'color_palette' => ['#8B7355', '#FAF7F2', '#2C2A29', '#E6DEC9']
            ],
            [
                'id' => 3,
                'slug' => 'anne-cameron',
                'title' => 'Anne & Cameron',
                'subtitle' => 'Modern Minimalist Villa Affair',
                'category' => 'Wedding',
                'category_slug' => 'wedding',
                'location' => 'Ocean View Cliffside Villa',
                'date' => 'September 12, 2025',
                'guests' => '150 Guests',
                'cover_image' => 'images/6a6305bf5040b777232a1839_Event-image-four.avif',
                'video_mp4' => 'videos/6a6305bf5040b777232a1803_V3_mp4.mp4',
                'video_webm' => 'videos/6a6305bf5040b777232a1803_V3_webm.webm',
                'video_poster' => 'images/69e06bfff096fe744c997c8d_6a47901f4f648e664f9fa37b_V3_poster.0000000.jpg',
                'gallery' => [
                    'images/6a6305bf5040b777232a1839_Event-image-four.avif',
                    'images/6a6305bf5040b777232a1855_Event-Thumbnail-Image-seven.avif',
                    'images/6a2f929311f6e32414ba59f3_Elegance-gallery3.avif',
                    'images/6a6305bf5040b777232a171d_Elegance-gallery.avif',
                    'images/6a6305bf5040b777232a1830_Event-post-one-image-six.avif',
                    'images/6a6305bf5040b777232a1838_Event-image-five.avif'
                ],
                'description' => 'Sophisticated simplicity overlooking the ocean. Anne and Cameron celebrated with clean architectural lines, monochrome floral arrangements, and intimate candlelit long tables under the stars.',
                'highlights' => [
                    'Panoramic Ocean View Sunset Platform',
                    'Monochrome White & Sage Floral Design',
                    'Multi-Course Culinary Tasting Menu',
                    'Floating Candle Pool Installation'
                ],
                'quote' => '"Sleek, stylish, and flawlessly executed from start to finish."',
                'quote_author' => 'Anne & Cameron',
                'color_palette' => ['#333333', '#FFFFFF', '#D0C8B6', '#708090']
            ],
            [
                'id' => 4,
                'slug' => 'linda-charles',
                'title' => 'Linda & Charles',
                'subtitle' => 'Classic Vintage Charm & Heritage Romance',
                'category' => 'Wedding',
                'category_slug' => 'wedding',
                'location' => 'Grand Palace Ballroom & Courtyard',
                'date' => 'October 05, 2025',
                'guests' => '300 Guests',
                'cover_image' => 'images/6a6305bf5040b777232a1838_Event-image-five.avif',
                'video_mp4' => 'videos/6a6305bf5040b777232a1809_new_mp4.mp4',
                'video_webm' => 'videos/6a6305bf5040b777232a1809_new_webm.webm',
                'video_poster' => 'images/69e06bfff096fe744c997c8d_6a43634cafebe64db07790d1_new_poster.0000000.jpg',
                'gallery' => [
                    'images/6a6305bf5040b777232a1838_Event-image-five.avif',
                    'images/6a6305bf5040b777232a1861_Event-image-eight.avif',
                    'images/6a2fdad3e0dc68fb3bd0e318_Classic gallery3.avif',
                    'images/6a6305bf5040b777232a1702_Classic-package-image.avif',
                    'images/6a6305bf5040b777232a183e_Event-image-two-three.avif',
                    'images/6a6305bf5040b777232a1831_Event-post-one-image-two.avif'
                ],
                'description' => 'A grand celebration inside a historic ballroom featuring gold leaf detailing, majestic chandeliers, and a lavish 5-tier cake. Linda and Charles embraced timeless vintage glamour in every single detail.',
                'highlights' => [
                    'Historic Grand Ballroom Reception',
                    'Custom Hand-Carved Floral Backdrops',
                    '5-Tier Handcrafted Wedding Cake',
                    'Midnight Cold Sparkler Sendoff'
                ],
                'quote' => '"An unforgettable evening of pure elegance, warmth, and breathtaking beauty."',
                'quote_author' => 'Linda & Charles',
                'color_palette' => ['#D4AF37', '#222222', '#F4EBE1', '#B89759']
            ],
            [
                'id' => 5,
                'slug' => 'sophia-liam-royal-wedding',
                'title' => "Sophia & Liam's Grand Royal Wedding",
                'subtitle' => 'Imperial Opulence & Gold Floral Splendor',
                'category' => 'Luxury Weddings',
                'category_slug' => 'luxury-weddings',
                'location' => 'Monarch Palace Hall & Gardens',
                'date' => 'October 14, 2025',
                'guests' => '350 Guests',
                'cover_image' => 'images/6a6305bf5040b777232a181c_Banner-home-one-image.avif',
                'video_mp4' => 'videos/6a6305bf5040b777232a17a6_Knotcraft-home-two-video-1-_mp4.mp4',
                'video_webm' => 'videos/6a6305bf5040b777232a17a6_Knotcraft-home-two-video-1-_webm.webm',
                'video_poster' => 'images/69e06bfff096fe744c997c8d_6a435f1052c6cbd76b28033d_Knotcraft-home-two-video-1-_poster.0000000.jpg',
                'gallery' => [
                    'images/6a6305bf5040b777232a182a_Event-image-two-one.avif',
                    'images/6a6305bf5040b777232a1836_Event-image-two.avif',
                    'images/6a6305bf5040b777232a1853_Event-Thumbnail-Image-one.avif',
                    'images/6a2f9294bc0e9d85ec75ed51_Elegance-gallery.avif',
                    'images/6a6305bf5040b777232a1834_Event-post-one-image-four.avif'
                ],
                'description' => 'A royal celebration held in the heart of Monarch Palace Hall. Surrounded by 40,000 hand-selected white roses and gold filigree arches, Sophia and Liam exchanged vows under crystal chandeliers before a night of live orchestra music and fireworks.',
                'highlights' => [
                    'Custom 40,000 White Rose Floral Canopy',
                    '7-Tier Champagne Waterfall & Ice Sculptures',
                    'Live Symphony Orchestra & Drone Light Show',
                    'Bespoke Velvet Seating & Imperial Tableware'
                ],
                'quote' => '"Knotcraft turned our grandest dream into a fairytale reality. Every single detail felt like stepping into a royal masterpiece."',
                'quote_author' => 'Sophia & Liam',
                'color_palette' => ['#D4AF37', '#FAF7F2', '#3A2E2B', '#E2D5C3']
            ],
            [
                'id' => 6,
                'slug' => 'aarav-ananya-beach-vows',
                'title' => "Aarav & Ananya's Destination Beach Vows",
                'subtitle' => 'Coastal Sunset Breeze & White Sand Elegance',
                'category' => 'Destination Weddings',
                'category_slug' => 'destination-weddings',
                'location' => 'Azure Shore Sunset Sanctuary',
                'date' => 'November 22, 2025',
                'guests' => '180 Guests',
                'cover_image' => 'images/6a6305bf5040b777232a1674_destination-image.avif',
                'video_mp4' => 'videos/6a6305bf5040b777232a15d7_vecteezy_bride-walks-down-the-aisle-at-a-church-wedding-surrounded_71714333_mp4.mp4',
                'video_webm' => 'videos/6a6305bf5040b777232a15d7_vecteezy_bride-walks-down-the-aisle-at-a-church-wedding-surrounded_71714333_webm.webm',
                'video_poster' => 'images/69e06bfff096fe744c997c8d_6a0fe8bc65b9f2a589c82bb6_vecteezy_bride-walks-down-the-aisle-at-a-church-wedding-surrounded_71714333_poster.0000000.jpg',
                'gallery' => [
                    'images/6a6305bf5040b777232a1850_Event-image-nine.avif',
                    'images/6a6305bf5040b777232a183d_Event-image-six.avif',
                    'images/6a6305bf5040b777232a1854_Event-Thumbnail-Image-six.avif',
                    'images/6a2fdad3c6de0b864499b3b0_Classic gallery.avif',
                    'images/6a6305bf5040b777232a183a_Event-image-two--two.avif'
                ],
                'description' => 'Set against the soothing waves of the Azure Shore, Aarav and Ananya brought intimate luxury to beachside celebrations.',
                'highlights' => [
                    'Barefoot Oceanfront Sunset Ceremony',
                    'Tropical Orchid & Driftwood Floral Altar',
                    'Fresh Coconut Bar & Live Saxophone Quartet',
                    'Lantern-lit Open-Air Reception on Sand'
                ],
                'quote' => '"The warmth, ocean breeze, and ethereal setup created memories that our guests are still raving about."',
                'quote_author' => 'Ananya & Aarav',
                'color_palette' => ['#007791', '#F5E6D3', '#E0A96D', '#FFFFFF']
            ]
        ];
    }

    /**
     * Blog List & Detail
     */
    public function blog(): View
    {
        return view('frontend.blog');
    }

    public function blogDetail(string $slug): View
    {
        $viewName = "frontend.blog-post.{$slug}";
        if (view()->exists($viewName)) {
            return view($viewName);
        }

        abort(404);
    }

    /**
     * Contact
     */
    public function contact(): View
    {
        return view('frontend.contact');
    }

    /**
     * Template utility pages
     */
    public function styleGuide(): View
    {
        return view('frontend.style-guide');
    }

    public function licenses(): View
    {
        return view('frontend.licenses');
    }

    public function changelog(): View
    {
        return view('frontend.changelog');
    }

    public function instructions(): View
    {
        return view('frontend.instructions');
    }

    public function passwordProtected(): View
    {
        return view('frontend.401');
    }
}
