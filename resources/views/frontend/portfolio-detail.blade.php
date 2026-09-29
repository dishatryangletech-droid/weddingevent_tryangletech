<!DOCTYPE html>
<html data-wf-domain="lovio.webflow.io" data-wf-page="610ded14d5a8bc46e9f60546" data-wf-site="6109925e44b6ab8a7601f26a" lang="en">
<head>
    <meta charset="utf-8"/>
    <link href="https://cdn.prod.website-files.com" rel="preconnect" crossorigin="anonymous"/>
    <title>{{ $item['title'] }} - Lovio & Knotcraft Wedding Story</title>
    <meta content="{{ $item['description'] }}" name="description"/>
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
        /* Lovio Webflow Exact Detail Page Theme Styling */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(24px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        body {
            font-family: 'Montserrat', sans-serif;
            color: #2c2a29;
            background-color: #faf8f5;
            margin: 0;
            padding: 0;
        }

        /* Detail Hero Section */
        .section-hero-detail {
            padding: 95px 20px 75px;
            text-align: center;
            background-color: #ffffff;
            border-bottom: 1px solid #eee8e0;
            position: relative;
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
            background-color: #c5a059;
            margin: 0 auto;
        }
        .border-top-line {
            margin-bottom: 24px;
        }
        .border-down-line {
            margin-top: 28px;
        }
        .subtitle-detail {
            font-family: 'Montserrat', sans-serif;
            font-size: 13px;
            text-transform: uppercase;
            letter-spacing: 4px;
            font-weight: 600;
            color: #c5a059;
            margin-bottom: 16px;
        }
        .heading-hero-detail {
            font-family: 'Marcellus', 'Playfair Display', serif;
            font-size: 52px;
            line-height: 1.2;
            font-weight: 400;
            color: #1a1918;
            max-width: 860px;
            margin: 0 auto 18px;
            letter-spacing: -0.5px;
        }
        .paragraph-detail-intro {
            font-size: 16px;
            color: #66615c;
            line-height: 1.8;
            max-width: 720px;
            margin: 0 auto;
        }
        @media (max-width: 768px) {
            .heading-hero-detail {
                font-size: 36px;
            }
        }

        /* Full Screen Hero Slider */
        .section-hero-slider {
            position: relative;
            width: 100%;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            text-align: center;
            color: #ffffff;
        }
        
        .hero-slider-bg {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 0;
        }
        
        .hero-slide {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-size: cover;
            background-position: center;
            opacity: 0;
            transition: opacity 1s ease-in-out;
        }
        
        .hero-slide.active {
            opacity: 1;
        }
        
        .hero-slider-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.4);
            z-index: 1;
        }
        
        .hero-slider-content {
            position: relative;
            z-index: 2;
            padding: 20px;
            margin-top: 60px;
        }
        
        .section-hero-slider .subtitle-detail {
            color: #e5cf9d !important;
        }
        
        .section-hero-slider .heading-hero-detail {
            color: #ffffff !important;
            text-shadow: 0 4px 16px rgba(0,0,0,0.4);
        }
        
        .section-hero-slider .paragraph-detail-intro {
            color: #f0f0f0;
            text-shadow: 0 2px 8px rgba(0,0,0,0.4);
        }
        
        .section-hero-slider .border-top-line, 
        .section-hero-slider .border-down-line {
            background-color: #c5a059;
        }
        
        .section-hero-slider .meta-strip-lovio {
            background: rgba(255, 255, 255, 0.15);
            border-color: rgba(255, 255, 255, 0.3);
            color: #ffffff;
            backdrop-filter: blur(5px);
        }
        
        .section-hero-slider .meta-strip-item strong {
            color: #ffffff;
        }

        /* Event Meta Strip */
        .meta-strip-lovio {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 28px;
            max-width: 900px;
            margin: 32px auto 0;
            padding: 16px 24px;
            background: #faf8f5;
            border: 1px solid #e8e2d8;
            border-radius: 30px;
            font-size: 13px;
            color: #55514e;
            font-weight: 500;
        }
        .meta-strip-item {
            display: flex;
            align-items: center;
            gap: 6px;
        }
        .meta-strip-item strong {
            color: #1a1918;
        }

        /* Three-Column Masonry Photo Gallery Section */
        .section-portfolio-posts {
            padding: 85px 20px;
            background-color: #faf8f5;
        }
        .grid-portfolio-posts {
            column-count: 3;
            column-gap: 35px;
            max-width: 1600px;
            margin: 0 auto;
        }
        @media (max-width: 991px) {
            .grid-portfolio-posts {
                column-count: 2;
            }
        }
        @media (max-width: 768px) {
            .grid-portfolio-posts {
                column-count: 1;
            }
        }

        .lightbox-card-wrap {
            position: relative;
            width: 100%;
            border-radius: 4px;
            overflow: hidden;
            background-color: #1a1918;
            cursor: pointer;
            box-shadow: 0 10px 30px rgba(0,0,0,0.05);
            animation: fadeInUp 0.7s ease forwards;
            break-inside: avoid;
            margin-bottom: 35px;
            display: inline-block;
        }
        .image-lightbox {
            width: 100%;
            height: auto;
            max-height: 650px;
            object-fit: cover;
            display: block;
            transition: transform 0.7s cubic-bezier(0.165, 0.84, 0.44, 1), opacity 0.4s ease;
        }
        .lightbox-card-wrap:hover .image-lightbox {
            transform: scale(1.05);
            opacity: 0.92;
        }

        .lightbox-zoom-overlay {
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
            color: #ffffff;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: 1.5px;
            text-transform: uppercase;
        }
        .lightbox-card-wrap:hover .lightbox-zoom-overlay {
            opacity: 1;
        }
        .zoom-icon-circle {
            width: 52px;
            height: 52px;
            border-radius: 50%;
            background: #c5a059;
            color: #ffffff;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 6px 20px rgba(197, 160, 89, 0.4);
        }

        /* Video Player Section */
        .section-video-film {
            max-width: 1140px;
            margin: 0 auto 70px;
            padding: 0 20px;
        }
        .video-box-container {
            position: relative;
            border-radius: 6px;
            overflow: hidden;
            background: #000000;
            box-shadow: 0 15px 40px rgba(0,0,0,0.15);
            border: 1px solid #e5dec9;
        }
        .video-box-container video {
            width: 100%;
            height: auto;
            max-height: 540px;
            display: block;
        }

        /* Quote Section */
        .section-quote-lovio {
            max-width: 900px;
            margin: 0 auto 75px;
            padding: 40px 30px;
            background: #ffffff;
            border-left: 4px solid #c5a059;
            border-radius: 6px;
            box-shadow: 0 8px 25px rgba(0,0,0,0.03);
            text-align: center;
        }
        .quote-text-lovio {
            font-family: 'Marcellus', 'Playfair Display', serif;
            font-size: 24px;
            color: #1a1918;
            line-height: 1.5;
            margin-bottom: 14px;
            font-style: italic;
        }
        .quote-author-lovio {
            font-size: 13px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 2px;
            color: #c5a059;
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
            background: #c5a059;
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
            background: #1a1918;
            color: #ffffff;
            box-shadow: 0 6px 20px rgba(26, 25, 24, 0.3);
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

        /* Fullscreen Lightbox Modal */
        .lightbox-modal-full {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(15, 13, 12, 0.94);
            z-index: 10000;
            display: none;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }
        .lightbox-modal-full.active {
            display: flex;
        }
        .lightbox-img-large {
            max-width: 90vw;
            max-height: 85vh;
            object-fit: contain;
            border-radius: 4px;
            box-shadow: 0 20px 50px rgba(0,0,0,0.5);
        }
        .lightbox-close-btn {
            position: absolute;
            top: 24px;
            right: 28px;
            color: #ffffff;
            font-size: 32px;
            cursor: pointer;
            background: none;
            border: none;
        }
    </style>
<link href="{{ asset('images/favicon.png') }}" rel="icon" type="image/png" sizes="32x32" />
<link href="{{ asset('images/favicon.png') }}" rel="apple-touch-icon" />
</head>
<body>
    @include('frontend.partials.header')

    <!-- Lovio Detail Hero Header with Slider -->
    <header class="section-hero-slider">
        <div class="hero-slider-bg">
            @if(isset($item['gallery']) && count($item['gallery']) > 0)
                @foreach($item['gallery'] as $index => $img)
                    <div class="hero-slide {{ $index === 0 ? 'active' : '' }}" style="background-image: url('{{ asset($img) }}');"></div>
                @endforeach
            @else
                <div class="hero-slide active" style="background-image: url('{{ asset($item['cover_image']) }}');"></div>
            @endif
        </div>
        <div class="hero-slider-overlay"></div>
        
        <div class="hero-slider-content">
            <div class="border-top-line"></div>
            <img src="https://cdn.prod.website-files.com/6109925e44b6ab8a7601f26a/610b3993bc98ff5499b83f82_subtitle.png" alt="Subtitle Icon" class="hero-crest-icon"/>
            <div class="subtitle-detail">{{ $item['category'] }}</div>
            <h1 class="heading-hero-detail">{{ $item['title'] }}</h1>
            @if(!empty($item['subtitle']))
            <p class="paragraph-detail-intro">{{ $item['subtitle'] }}</p>
            @endif

            <!-- Meta Strip -->
            <div class="meta-strip-lovio">
                <div class="meta-strip-item">📍 <strong>Venue:</strong> {{ $item['location'] }}</div>
                <div class="meta-strip-item">📅 <strong>Date:</strong> {{ $item['date'] }}</div>
                <div class="meta-strip-item">👥 <strong>Guests:</strong> {{ $item['guests'] }}</div>
            </div>

            <div class="border-down-line"></div>
        </div>
    </header>

    <!-- Full Description & Story Section -->
    @if(!empty($item['description']) || !empty($item['detail_content']))
    <section class="section-full-description" style="padding: 65px 20px 45px; background-color: #ffffff;">
        <div style="max-width: 860px; margin: 0 auto; text-align: center;">
            <div class="border-top-line" style="margin-bottom: 25px;"></div>
            @if(!empty($item['detail_headline']))
            <h2 style="font-family: 'Marcellus', 'Playfair Display', serif; font-size: 30px; color: #1a1918; margin-bottom: 22px; line-height: 1.3;">
                {{ $item['detail_headline'] }}
            </h2>
            @endif
            <div class="portfolio-full-description-text" style="font-size: 16px; line-height: 1.85; color: #55514e; font-family: 'Montserrat', sans-serif; text-align: left;">
                {!! $item['description'] ?? $item['detail_content'] !!}
            </div>
            @if(!empty($item['highlights']) && count($item['highlights']) > 0)
            <div style="margin-top: 35px; display: flex; justify-content: center; flex-wrap: wrap; gap: 15px;">
                @foreach($item['highlights'] as $highlight)
                <div style="background: #faf8f5; border: 1px solid #e8e2d5; padding: 10px 20px; border-radius: 20px; font-size: 13px; color: #4a4036; font-weight: 500;">
                    ✦ {{ $highlight }}
                </div>
                @endforeach
            </div>
            @endif
        </div>
    </section>
    @endif

    <!-- Masonry / Three-Column Photo Gallery Section -->
    <section class="section-portfolio-posts">
        <div class="grid-portfolio-posts">
            @if(isset($item['gallery']) && count($item['gallery']) > 0)
                @foreach($item['gallery'] as $img)
                    <div class="lightbox-card-wrap" onclick="openLightbox('{{ asset($img) }}')">
                        <img src="{{ asset($img) }}" alt="{{ $item['title'] }}" class="image-lightbox" loading="lazy">
                        <div class="lightbox-zoom-overlay">
                            <div class="zoom-icon-circle">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v6m-3-3h6"/></svg>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="lightbox-card-wrap" onclick="openLightbox('{{ asset($item['cover_image']) }}')">
                    <img src="{{ asset($item['cover_image']) }}" alt="{{ $item['title'] }}" class="image-lightbox" loading="lazy">
                    <div class="lightbox-zoom-overlay">
                        <div class="zoom-icon-circle">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v6m-3-3h6"/></svg>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </section>

    <!-- 4K Cinema Film Video Player -->
    @if(!empty($item['video_mp4']))
        <div class="section-video-film">
            <h3 style="font-family: 'Marcellus', serif; font-size: 26px; text-align: center; color: #1a1918; margin-bottom: 20px;">
                4K Cinema Wedding Film
            </h3>
            <div class="video-box-container">
                <video controls poster="{{ !empty($item['video_poster']) ? (str_starts_with($item['video_poster'], 'http') ? $item['video_poster'] : asset($item['video_poster'])) : asset($item['cover_image']) }}">
                    <source src="{{ str_starts_with($item['video_mp4'], 'http') ? $item['video_mp4'] : asset($item['video_mp4']) }}" type="video/mp4">
                    @if(!empty($item['video_webm']))
                        <source src="{{ str_starts_with($item['video_webm'], 'http') ? $item['video_webm'] : asset($item['video_webm']) }}" type="video/webm">
                    @endif
                    Your browser does not support HTML5 video.
                </video>
            </div>
        </div>
    @endif

    <!-- Quote Box Section -->
    @if(isset($item['quote']))
        <section class="section-quote-lovio">
            <div class="quote-text-lovio">{{ $item['quote'] }}</div>
            <div class="quote-author-lovio">— {{ $item['quote_author'] ?? $item['title'] }} —</div>
        </section>
    @endif

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

    <!-- Fullscreen Lightbox Modal -->
    <div class="lightbox-modal-full" id="lightbox-modal-full" onclick="closeLightbox()">
        <button class="lightbox-close-btn">&times;</button>
        <img src="" id="lightbox-full-img" class="lightbox-img-large" alt="Fullscreen Image">
    </div>

    <!-- JavaScript Lightbox & Slider -->
    <script>
        function openLightbox(imgSrc) {
            document.getElementById('lightbox-full-img').src = imgSrc;
            document.getElementById('lightbox-modal-full').classList.add('active');
            document.body.style.overflow = 'hidden';
        }

        function closeLightbox() {
            document.getElementById('lightbox-modal-full').classList.remove('active');
            document.body.style.overflow = 'auto';
        }
        
        document.addEventListener("DOMContentLoaded", function() {
            let slides = document.querySelectorAll('.hero-slide');
            let currentSlide = 0;
            
            if(slides.length > 1) {
                setInterval(() => {
                    slides[currentSlide].classList.remove('active');
                    currentSlide = (currentSlide + 1) % slides.length;
                    slides[currentSlide].classList.add('active');
                }, 4000);
            }
        });
    </script>
</body>
</html>
