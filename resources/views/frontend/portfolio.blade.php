<!DOCTYPE html>
<html data-wf-domain="lovio.webflow.io" data-wf-page="6115876e2da52936f9df96e3" data-wf-site="6109925e44b6ab8a7601f26a" lang="en">
<head>
    <meta charset="utf-8"/>
    <link href="https://cdn.prod.website-files.com" rel="preconnect" crossorigin="anonymous"/>
    <title>Portfolio - Lovio & Knotcraft Webflow Template</title>
    <meta content="Event design to make your heart skip a beat. Explore our luxury wedding portfolio, destination celebrations, pre-wedding shoots, and floral styling." name="description"/>
    <meta content="width=device-width, initial-scale=1" name="viewport"/>
    <link href="{{ asset('css/knotcraft.webflow.shared.3f78cfc4d.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{ asset('css/google-fonts.css') }}">
    <link href="https://fonts.googleapis.com" rel="preconnect"/>
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin="anonymous"/>
    <script src="{{ asset('js/webfont.js') }}" type="text/javascript"></script>
    <script type="text/javascript">
        WebFont.load({  
            google: {    
                families: [
                    "Montserrat:100,100italic,200,200italic,300,300italic,400,400italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic",
                    "Marcellus:regular",
                    "Playfair Display:400,500,600,700"
                ]  
            }
        });
    </script>
    <style>
        /* Lovio Webflow Exact Theme Styling & Modern Entrance Animations */
        @keyframes staggerUpDown {
            0% {
                opacity: 0;
                transform: translateY(40px) scale(0.96);
            }
            60% {
                transform: translateY(-5px) scale(1.005);
            }
            100% {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }
        @keyframes pulseGlow {
            0%, 100% { transform: scale(1); box-shadow: 0 0 0 0 rgba(197, 160, 89, 0.4); }
            50% { transform: scale(1.06); box-shadow: 0 0 0 12px rgba(197, 160, 89, 0); }
        }

        body {
            font-family: 'Montserrat', sans-serif;
            color: #2c2a29;
            background-color: #faf8f5;
            margin: 0;
            padding: 0;
        }

        /* Hero Section - Lovio Webflow */
        /* Hero Banner Section - Full-Width Image Banner */
        .section-hero-lovio {
            position: relative;
            padding: 135px 20px 95px;
            text-align: center;
            background-image: url("{{ asset('images/6a6305bf5040b777232a17f5_Service-one-banner.avif') }}");
            background-size: cover;
            background-position: center center;
            background-repeat: no-repeat;
            color: #ffffff;
            overflow: hidden;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }
        .section-hero-lovio::before {
            content: '';
            position: absolute;
            inset: 0;
            background: linear-gradient(180deg, rgba(26, 25, 24, 0.55) 0%, rgba(26, 25, 24, 0.75) 100%);
            z-index: 1;
        }
        .section-hero-lovio > * {
            position: relative;
            z-index: 2;
        }
        .section-hero-lovio .subtitle-lovio {
            color: #e5cf9d !important;
        }
        .section-hero-lovio .heading-hero-lovio {
            color: #ffffff !important;
            text-shadow: 0 4px 16px rgba(0,0,0,0.4);
        }
        .section-hero-lovio .border-top-line,
        .section-hero-lovio .border-down-line {
            background-color: #8f6e2c !important;
        }
        .filter-pill-btn {
            background: rgba(255, 255, 255, 0.18) !important;
            color: #ffffff !important;
            border: 1px solid rgba(255, 255, 255, 0.35) !important;
            backdrop-filter: blur(8px);
        }
        .filter-pill-btn:hover,
        .filter-pill-btn.active {
            background: #8f6e2c !important;
            color: #ffffff !important;
            border-color: #8f6e2c !important;
            box-shadow: 0 6px 20px rgba(197, 160, 89, 0.4);
        }
        .hero-crest-icon {
            width: 62px;
            height: auto;
            margin: 0 auto 16px;
            display: block;
        }
        .border-top-line, .border-down-line {
            width: 80px;
            height: 1px;
            background-color: #8f6e2c;
            margin: 0 auto;
        }
        .border-top-line {
            margin-bottom: 24px;
        }
        .border-down-line {
            margin-top: 24px;
        }
        .subtitle-lovio {
            font-family: 'Montserrat', sans-serif;
            font-size: 13px;
            text-transform: uppercase;
            letter-spacing: 4px;
            font-weight: 600;
            color: #8f6e2c;
            margin-bottom: 16px;
        }
        .heading-hero-lovio {
            font-family: 'Marcellus', 'Playfair Display', serif;
            font-size: 48px;
            line-height: 1.25;
            font-weight: 400;
            color: #1a1918;
            max-width: 820px;
            margin: 0 auto;
            letter-spacing: -0.5px;
        }
        @media (max-width: 768px) {
            .heading-hero-lovio {
                font-size: 34px;
            }
        }

        /* Filter Pills Bar */
        .portfolio-filters-bar {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 12px;
            margin-top: 35px;
        }
        .filter-pill-btn {
            background: #ffffff;
            border: 1px solid #e5dec9;
            color: #55514e;
            padding: 10px 24px;
            border-radius: 30px;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: 0.5px;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        .filter-pill-btn:hover, .filter-pill-btn.active {
            background: #8f6e2c;
            color: #ffffff;
            border-color: #8f6e2c;
            box-shadow: 0 4px 18px rgba(197, 160, 89, 0.3);
            transform: translateY(-2px);
        }

        /* Portfolio Grid Section */
        .section-portfolio-grid {
            padding: 80px 20px;
            background-color: #faf8f5;
        }
        .grid-portfolio-lovio {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 50px 40px;
            max-width: 1140px;
            margin: 0 auto;
        }
        @media (max-width: 991px) {
            .grid-portfolio-lovio {
                grid-template-columns: 1fr;
                gap: 40px;
            }
        }

        .item-portfolio-lovio {
            opacity: 0;
            animation: staggerUpDown 0.85s cubic-bezier(0.22, 1, 0.36, 1) forwards;
            display: flex;
            flex-direction: column;
        }

        .overflow-portfolio-img {
            position: relative;
            width: 100%;
            height: 490px;
            overflow: hidden;
            border-radius: 4px;
            background-color: #1a1918;
            cursor: pointer;
        }
        @media (max-width: 768px) {
            .overflow-portfolio-img {
                height: 360px;
            }
        }

        .image-portfolio-page {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.7s cubic-bezier(0.165, 0.84, 0.44, 1), opacity 0.5s ease;
        }
        .item-portfolio-lovio:hover .image-portfolio-page {
            transform: scale(1.06);
            opacity: 0.92;
        }

        .badge-category-tag {
            position: absolute;
            top: 18px;
            left: 18px;
            background: rgba(255, 255, 255, 0.94);
            backdrop-filter: blur(8px);
            color: #1a1918;
            font-size: 11px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            padding: 6px 14px;
            border-radius: 20px;
            border: 1px solid rgba(197, 160, 89, 0.3);
        }

        /* Hover Overlay & Play Icon */
        .card-hover-overlay-lovio {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(26, 25, 24, 0.35);
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 0;
            transition: opacity 0.35s ease;
        }
        .item-portfolio-lovio:hover .card-hover-overlay-lovio {
            opacity: 1;
        }
        .circle-play-btn {
            width: 58px;
            height: 58px;
            border-radius: 50%;
            background: #8f6e2c;
            color: #ffffff;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 8px 24px rgba(197, 160, 89, 0.5);
            animation: pulseGlow 2s infinite;
        }

        .block-portfolio-page {
            padding-top: 22px;
            display: flex;
            flex-direction: column;
            align-items: flex-start;
        }
        .heading-portfolio {
            font-family: 'Marcellus', 'Playfair Display', serif;
            font-size: 30px;
            font-weight: 400;
            color: #1a1918;
            margin-bottom: 8px;
            text-decoration: none;
            transition: color 0.3s ease;
            line-height: 1.25;
        }
        .heading-portfolio:hover {
            color: #8f6e2c;
        }
        .portfolio-item-sub {
            font-size: 14px;
            color: #77726d;
            margin-bottom: 14px;
            line-height: 1.5;
        }
        .link-learn-more {
            font-family: 'Montserrat', sans-serif;
            font-size: 12px;
            text-transform: uppercase;
            letter-spacing: 2px;
            font-weight: 600;
            color: #8f6e2c;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            transition: all 0.3s ease;
        }
        .link-learn-more:hover {
            color: #1a1918;
            transform: translateX(4px);
        }

        .btn-quick-preview {
            background: #ffffff;
            border: 1px solid #e2dad0;
            color: #3a3735;
            padding: 8px 16px;
            border-radius: 6px;
            font-size: 12px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        .btn-quick-preview:hover {
            background: #8f6e2c;
            color: #ffffff;
            border-color: #8f6e2c;
        }

        /* Extra Banner Callout Section - Lovio Webflow */
        .section-extra-callout {
            background-color: #ffffff;
            padding: 90px 20px;
            text-align: center;
            border-top: 1px solid #eee8e0;
            border-bottom: 1px solid #eee8e0;
        }
        .block-extra {
            max-width: 780px;
            margin: 0 auto;
        }
        .image-extra {
            width: 70px;
            height: auto;
            margin: 0 auto 20px;
            display: block;
        }
        .heading-extra {
            font-family: 'Marcellus', 'Playfair Display', serif;
            font-size: 34px;
            font-weight: 400;
            line-height: 1.35;
            color: #1a1918;
            margin-bottom: 18px;
        }
        .paragraph-extra {
            font-size: 15px;
            color: #66615c;
            line-height: 1.7;
            margin-bottom: 32px;
        }
        .btn-connect-lovio {
            display: inline-block;
            background: #8f6e2c;
            color: #ffffff;
            padding: 14px 38px;
            border-radius: 30px;
            font-size: 13px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 2px;
            text-decoration: none;
            transition: all 0.35s ease;
            box-shadow: 0 6px 20px rgba(197, 160, 89, 0.3);
        }
        .btn-connect-lovio:hover {
            background: #244340;
            color: #ffffff;
            box-shadow: 0 6px 20px rgba(36, 67, 64, 0.3);
            transform: translateY(-2px);
        }

        /* Instagram Gallery Footer Section */
        .section-instagram-footer {
            padding: 70px 20px;
            background-color: #faf8f5;
        }
        .heading-instagram {
            font-family: 'Marcellus', serif;
            font-size: 26px;
            text-align: center;
            color: #1a1918;
            margin-bottom: 30px;
        }
        .grid-instagram {
            display: grid;
            grid-template-columns: repeat(6, 1fr);
            gap: 15px;
            max-width: 1140px;
            margin: 0 auto;
        }
        @media (max-width: 768px) {
            .grid-instagram {
                grid-template-columns: repeat(3, 1fr);
            }
        }
        .overflow-instagram {
            position: relative;
            height: 175px;
            overflow: hidden;
            border-radius: 4px;
            display: block;
        }
        .image-instagram {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s ease;
        }
        .overflow-instagram:hover .image-instagram {
            transform: scale(1.1);
        }

        /* Interactive Lightbox Modal */
        .portfolio-modal {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(15, 13, 12, 0.88);
            backdrop-filter: blur(10px);
            z-index: 9999;
            display: none;
            justify-content: center;
            align-items: center;
            padding: 20px;
            opacity: 0;
            transition: opacity 0.3s ease;
        }
        .portfolio-modal.active {
            display: flex;
            opacity: 1;
        }
        .modal-box {
            background: #ffffff;
            border-radius: 12px;
            max-width: 920px;
            width: 100%;
            max-height: 90vh;
            overflow-y: auto;
            box-shadow: 0 25px 50px rgba(0,0,0,0.3);
            position: relative;
        }
        .modal-close {
            position: absolute;
            top: 16px;
            right: 20px;
            background: rgba(26, 25, 24, 0.08);
            border: none;
            width: 36px;
            height: 36px;
            border-radius: 50%;
            font-size: 20px;
            color: #1a1918;
            cursor: pointer;
            z-index: 10;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .modal-close:hover {
            background: #1a1918;
            color: #ffffff;
        }
        .modal-body {
            padding: 28px;
        }
        .modal-media-container {
            width: 100%;
            border-radius: 8px;
            overflow: hidden;
            background: #1a1918;
            margin-bottom: 20px;
            min-height: 300px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .modal-media-container img {
            width: 100%;
            max-height: 460px;
            object-fit: cover;
        }
        .gallery-thumbs {
            display: flex;
            gap: 10px;
            overflow-x: auto;
            padding-bottom: 8px;
            margin-bottom: 20px;
        }
        .gallery-thumb {
            width: 85px;
            height: 60px;
            border-radius: 6px;
            object-fit: cover;
            cursor: pointer;
            opacity: 0.6;
            border: 2px solid transparent;
            transition: all 0.2s ease;
            flex-shrink: 0;
        }
        .gallery-thumb:hover, .gallery-thumb.active {
            opacity: 1;
            border-color: #8f6e2c;
        }
    </style>
<link href="{{ asset('images/favicon.png') }}" rel="icon" type="image/png" sizes="32x32" />
<link href="{{ asset('images/favicon.png') }}" rel="apple-touch-icon" />
</head>
<body>
    @include('frontend.partials.header')

    <!-- Lovio Webflow Hero Header -->
    @if(($portfolioBanner->status ?? 'active') === 'active')
    <header class="section-hero-lovio" style="background-image: url('{{ $portfolioBanner->banner_image_url }}');">
        <div class="border-top-line"></div>
        <div class="subtitle-lovio">{{ $portfolioBanner->tag ?? 'Portfolio' }}</div>
        <h1 class="heading-hero-lovio">{{ $portfolioBanner->title ?? 'Event design to make your heart skip a beat' }}</h1>
        @if(!empty($portfolioBanner->description))
        <p style="max-width: 720px; margin: 16px auto 0; font-size: 15px; color: rgba(255,255,255,0.9); line-height: 1.6; text-shadow: 0 2px 8px rgba(0,0,0,0.4);">{{ $portfolioBanner->description }}</p>
        @endif
        <div class="border-down-line"></div>

        <!-- Filter Pills Bar -->
        @if(isset($portfolioTags) && count($portfolioTags) > 0)
        <div class="portfolio-filters-bar">
            @php
                $hasAllTag = $portfolioTags->contains(function($t) {
                    return in_array(strtolower(trim($t->name)), ['all', 'all celebrations', 'all-celebrations']);
                });
                $hasActiveButton = false;
            @endphp

            @if(!$hasAllTag)
            <button class="filter-pill-btn active" onclick="filterPortfolio('all', this)">All Celebrations</button>
            @php $hasActiveButton = true; @endphp
            @endif

            @foreach($portfolioTags->unique('name') as $index => $ptag)
                @php
                    $isAll = in_array(strtolower(trim($ptag->name)), ['all', 'all celebrations', 'all-celebrations']);
                    $catSlug = $isAll ? 'all' : Str::slug($ptag->name);
                    $isActive = false;
                    if ($isAll && !$hasActiveButton) {
                        $isActive = true;
                        $hasActiveButton = true;
                    } elseif (!$hasAllTag && $hasActiveButton) {
                        $isActive = false;
                    }
                @endphp
                <button class="filter-pill-btn {{ $isActive ? 'active' : '' }}" onclick="filterPortfolio('{{ $catSlug }}', this)">{{ $ptag->name }}</button>
            @endforeach
        </div>
        @else
        <div class="portfolio-filters-bar">
            <button class="filter-pill-btn active" onclick="filterPortfolio('all', this)">All Celebrations</button>
            <button class="filter-pill-btn" onclick="filterPortfolio('wedding', this)">Weddings</button>
            <button class="filter-pill-btn" onclick="filterPortfolio('luxury-weddings', this)">Luxury Weddings</button>
            <button class="filter-pill-btn" onclick="filterPortfolio('destination-weddings', this)">Destination</button>
        </div>
        @endif
    </header>
    @endif

    <!-- Portfolio 2-Column Collection Grid -->
    <section class="section-portfolio-grid">
        <div class="grid-portfolio-lovio" id="portfolio-grid-container">
            @foreach($portfolios as $index => $item)
                <div class="item-portfolio-lovio" data-category="{{ $item['category_slug'] }}" style="animation-delay: {{ 0.12 + ($index * 0.15) }}s;">
                    <div class="overflow-portfolio-img" onclick='openModal({{ json_encode($item) }})'>
                        <img src="{{ asset($item['cover_image']) }}" alt="{{ $item['title'] }}" class="image-portfolio-page" loading="lazy">
                        <div class="badge-category-tag">{{ $item['category'] }}</div>
                        <div class="card-hover-overlay-lovio">
                            <div class="circle-play-btn">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                            </div>
                        </div>
                    </div>
                    <div class="block-portfolio-page">
                        <a href="{{ route('portfolio.detail', ['slug' => $item['slug']]) }}" class="heading-portfolio">
                            {{ $item['title'] }}
                        </a>
                        <div class="portfolio-item-sub">{{ $item['subtitle'] }}</div>
                        <div style="display: flex; justify-content: space-between; align-items: center; width: 100%;">
                            <a href="{{ route('portfolio.detail', ['slug' => $item['slug']]) }}" class="link-learn-more">
                                learn more →
                            </a>
                            <button class="btn-quick-preview" onclick='openModal({{ json_encode($item) }})'>
                                Quick View
                            </button>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    <!-- Extra Lovio Callout Section -->
    <section class="section-extra-callout">
        <div class="block-extra">
            <img src="https://cdn.prod.website-files.com/6109925e44b6ab8a7601f26a/610c7de4acbdd5b712b1338f_extra.png" alt="Extra Crest Icon" class="image-extra"/>
            <h4 class="heading-extra">We turn dreams into reality. Weave story into every thread of your event.</h4>
            <p class="paragraph-extra">Proin ipsum pellentesque at sit neque, quam molestie nunc. Lectus consectetur purus duis neque, nec, in. Amet ultrices viverra mauris.</p>
            <a href="{{ route('contact') }}" class="btn-connect-lovio">Let’s connect</a>
        </div>
    </section>

    <!-- Instagram Gallery Footer Section -->
    <section class="section-instagram-footer">
        <div class="border-top-line" style="margin-bottom: 25px;"></div>
        <h3 class="heading-instagram">Instagram</h3>
        <div class="grid-instagram">
            <a href="https://www.instagram.com/" target="_blank" class="overflow-instagram">
                <img src="https://cdn.prod.website-files.com/6109925e44b6ab8a7601f26a/610f06acf7ff776a6ec067c3_instagram_1.jpg" alt="Instagram 1" class="image-instagram" loading="lazy">
            </a>
            <a href="https://www.instagram.com/" target="_blank" class="overflow-instagram">
                <img src="https://cdn.prod.website-files.com/6109925e44b6ab8a7601f26a/610f06acf7ff775464c067c2_instagram_2.jpg" alt="Instagram 2" class="image-instagram" loading="lazy">
            </a>
            <a href="https://www.instagram.com/" target="_blank" class="overflow-instagram">
                <img src="https://cdn.prod.website-files.com/6109925e44b6ab8a7601f26a/610f06ac4c9e821805b2636f_instagram_3.jpg" alt="Instagram 3" class="image-instagram" loading="lazy">
            </a>
            <a href="https://www.instagram.com/" target="_blank" class="overflow-instagram">
                <img src="https://cdn.prod.website-files.com/6109925e44b6ab8a7601f26a/610f06ad78b53c69f4cfd1b6_instagram_4.jpg" alt="Instagram 4" class="image-instagram" loading="lazy">
            </a>
            <a href="https://www.instagram.com/" target="_blank" class="overflow-instagram">
                <img src="https://cdn.prod.website-files.com/6109925e44b6ab8a7601f26a/610f06acfe7e297eb47f87bc_instagram_5.jpg" alt="Instagram 5" class="image-instagram" loading="lazy">
            </a>
            <a href="https://www.instagram.com/" target="_blank" class="overflow-instagram">
                <img src="https://cdn.prod.website-files.com/6109925e44b6ab8a7601f26a/610f06ac61ddcb28c0fe0816_instagram_6.jpg" alt="Instagram 6" class="image-instagram" loading="lazy">
            </a>
        </div>
    </section>

    @include('frontend.partials.footer')

    <!-- Interactive Lightbox Modal -->
    <div class="portfolio-modal" id="portfolio-modal">
        <div class="modal-box">
            <button class="modal-close" onclick="closeModal()">&times;</button>
            <div class="modal-body">
                <div class="modal-media-container" id="modal-media-wrap">
                    <img id="modal-main-img" src="" alt="Gallery Image">
                </div>
                <div class="gallery-thumbs" id="modal-thumbs-bar"></div>
                <h3 style="font-family: 'Marcellus', serif; font-size: 26px; color: #1a1918; margin-bottom: 8px;" id="modal-title"></h3>
                <div style="font-size: 14px; color: #66615c; line-height: 1.6; margin-bottom: 20px;" id="modal-desc"></div>
                <div style="display: flex; justify-content: flex-end;">
                    <a id="modal-full-link" href="#" class="btn-connect-lovio" style="padding: 10px 24px; font-size: 12px;">View Full Details →</a>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript Filter & Modal Logic -->
    <script>
        let currentItem = null;

        function filterPortfolio(category, btnElement) {
            const buttons = document.querySelectorAll('.filter-pill-btn');
            buttons.forEach(btn => btn.classList.remove('active'));
            if(btnElement) btnElement.classList.add('active');

            const cards = document.querySelectorAll('.item-portfolio-lovio');
            cards.forEach(card => {
                const cardCat = (card.getAttribute('data-category') || '').toLowerCase();
                const targetCat = (category || '').toLowerCase();
                
                const matches = (
                    targetCat === 'all' ||
                    targetCat === 'all-celebrations' ||
                    cardCat === targetCat ||
                    (targetCat.startsWith('wedding') && cardCat.startsWith('wedding')) ||
                    (targetCat.includes('destination') && cardCat.includes('destination')) ||
                    (targetCat.includes('luxury') && cardCat.includes('luxury'))
                );

                if (matches) {
                    card.style.display = 'flex';
                    card.style.animation = 'none';
                    card.offsetHeight; // trigger reflow
                    card.style.animation = 'staggerUpDown 0.6s cubic-bezier(0.22, 1, 0.36, 1) forwards';
                } else {
                    card.style.display = 'none';
                }
            });
        }

        function formatImageUrl(path) {
            if (!path) return '';
            if (path.startsWith('http://') || path.startsWith('https://')) {
                return path;
            }
            return "{{ asset('') }}" + path;
        }

        function openModal(item) {
            currentItem = item;
            document.getElementById('modal-title').innerText = item.title;
            document.getElementById('modal-desc').innerHTML = item.description || item.subtitle || '';
            document.getElementById('modal-full-link').href = "{{ url('/portfolio') }}/" + item.slug;

            const mainImg = document.getElementById('modal-main-img');
            const thumbsBar = document.getElementById('modal-thumbs-bar');

            thumbsBar.innerHTML = '';

            if (item.gallery && item.gallery.length > 0) {
                mainImg.src = formatImageUrl(item.gallery[0]);
                mainImg.style.display = 'block';

                item.gallery.forEach((imgSrc, idx) => {
                    const thumb = document.createElement('img');
                    thumb.src = formatImageUrl(imgSrc);
                    thumb.className = 'gallery-thumb' + (idx === 0 ? ' active' : '');
                    thumb.onclick = function() {
                        document.querySelectorAll('.gallery-thumb').forEach(t => t.classList.remove('active'));
                        thumb.classList.add('active');
                        mainImg.src = formatImageUrl(imgSrc);
                    };
                    thumbsBar.appendChild(thumb);
                });
            } else {
                mainImg.src = formatImageUrl(item.cover_image);
                mainImg.style.display = 'block';
            }

            const modal = document.getElementById('portfolio-modal');
            modal.classList.add('active');
            document.body.style.overflow = 'hidden';
        }

        function closeModal() {
            const modal = document.getElementById('portfolio-modal');
            modal.classList.remove('active');
            document.body.style.overflow = 'auto';
        }

        window.onclick = function(event) {
            const modal = document.getElementById('portfolio-modal');
            if (event.target === modal) {
                closeModal();
            }
        };
    </script>
    <script src="{{ asset('js/jquery-3.5.1.min.dc5e7f18c8.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/webflow.schunk.eed72d374c7ba9a2.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/webflow.schunk.408c304bedb55afc.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/webflow.9bde18d1.437080bf3326686e.js') }}" type="text/javascript"></script>
</body>
</html>
