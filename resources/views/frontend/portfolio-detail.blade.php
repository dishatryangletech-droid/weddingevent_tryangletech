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
</head>
<body>
    <!-- Navbar Header -->
    <div data-wf--fda-navbar--variant="bottom-border" class="fda-navbar-main w-variant-5e3fb846-9a84-4014-1993-9ee494f4d91f"></div>
    <div data-animation="default" data-collapse="medium" data-duration="400" data-easing="ease" data-easing2="ease" role="banner" class="fda-navbar w-nav">
        <div class="w-layout-blockcontainer fda-container-medium w-container">
            <div class="fda-navbar-wrapper"><a href="{{ route('home') }}" class="fda-navbar-logo-v1 w-nav-brand"><img
            width="118" height="34" alt="Site-logo"
            src="{{ asset('images/6a6305bf5040b777232a17cd_Site-logo.svg') }}" /></a>
        <nav role="navigation" class="fda-navbar-menu-holder w-nav-menu">
          <div class="w-layout-hflex fda-navbar-v1-menu-holder-inner">
            <div class="w-layout-hflex fda-navbar-inner-wrap">
              <div class="w-layout-hflex fda-navbar-dropdown-toggle">
                <div nav-menu-hover="" class="w-layout-vflex"><a href="{{ route('home') }}"
                    class="fda-menu-font-v1">Home</a>
                  <div class="fda-nav-menu-line"></div>
                </div>
              </div>
              <div class="w-layout-hflex fda-navbar-dropdown-toggle">
                <div nav-menu-hover="" class="w-layout-vflex"><a href="{{ route('about') }}"
                    class="fda-menu-font-v1">About</a>
                  <div class="fda-nav-menu-line"></div>
                </div>
              </div>
              <div class="w-layout-hflex fda-navbar-dropdown-toggle">
                <div nav-menu-hover="" class="w-layout-vflex"><a href="{{ route('service-three') }}"
                    class="fda-menu-font-v1">Services</a>
                  <div class="fda-nav-menu-line"></div>
                </div>
              </div>
              <div class="w-layout-hflex fda-navbar-dropdown-toggle">
                <div nav-menu-hover="" class="w-layout-vflex"><a href="{{ route('event') }}"
                    class="fda-menu-font-v1">Events</a>
                  <div class="fda-nav-menu-line"></div>
                </div>
              </div>
              <div class="w-layout-hflex fda-navbar-dropdown-toggle">
                <div nav-menu-hover="" class="w-layout-vflex"><a href="{{ route('portfolio') }}"
                    class="fda-menu-font-v1">Portfolio</a>
                  <div class="fda-nav-menu-line"></div>
                </div>
              </div>
              <div class="w-layout-hflex fda-navbar-dropdown-toggle">
                <div nav-menu-hover="" class="w-layout-vflex"><a href="{{ route('blog') }}"
                    class="fda-menu-font-v1">Blog</a>
                  <div class="fda-nav-menu-line"></div>
                </div>
              </div>
              <div class="w-layout-hflex fda-navbar-dropdown-toggle">
                <div nav-menu-hover="" class="w-layout-vflex"><a href="{{ route('contact') }}"
                    class="fda-menu-font-v1">Contact</a>
                  <div class="fda-nav-menu-line"></div>
                </div>
              </div>
            </div>
            <div class="w-layout-hflex fda-navbar-inner-wrap-v2">
              <div data-delay="500" data-hover="true" nav-menu-hover="" class="fda-navbar-dropdown-v1 w-dropdown">
                <div class="fda-navbar-dropdown-toggle w-dropdown-toggle">
                  <div class="w-layout-hflex fda-mega-menu-text-box">
                    <div class="fda-menu-font-v1">Home</div>
                    <div class="fda-nav-menu-arrow-holder"><img width="10" height="6" alt="site-nav-arrow-black"
                        src="{{ asset('images/6a6305be5040b777232a14a2_site-nav-arrow-black.svg') }}" loading="lazy"
                        class="fda-nav-menu-arrow-1" /><img width="10" height="6" alt="site-nav-arrow-black"
                        src="{{ asset('images/6a6305be5040b777232a14a0_site-nav-arrow-black.svg') }}" loading="lazy"
                        class="fda-nav-menu-arrow-2" /></div>
                  </div>
                  <div class="fda-nav-menu-line"></div>
                </div>
                <nav class="fda-navbar-menu-dropdown w-dropdown-list">
                  <div nav-drop-menu="" class="w-layout-hflex fda-drop-down-menu-wrap">
                    <div class="w-layout-hflex fda-megamenu-mobile">
                      <div class="w-layout-hflex fda-megamenu-box-2">
                        <div class="w-layout-vflex fda-megamenu-inner-box-wrapper">
                          <div class="w-layout-vflex fda-megamenu-inner-box-1 fda-border-off">
                            <div class="w-layout-hflex fda-megamenu-text-box">
                              <div class="fda-megamenu-dot"></div><a href="{{ route('home') }}"
                                class="fda-megamenu-text-wrapper w-inline-block">
                                <div class="fda-megamenu-page-box">
                                  <div nav-megamenu-hover="" class="fda-mega-menu-font fda-1">Home one</div>
                                  <div nav-megamenu-hover="" class="fda-mega-menu-font fda-2">Home one</div>
                                </div>
                                <div>Elegant wedding planning experience</div>
                              </a>
                            </div>
                            <div class="w-layout-hflex fda-megamenu-text-box">
                              <div class="fda-megamenu-dot"></div><a href="{{ route('home-two') }}"
                                class="fda-megamenu-text-wrapper w-inline-block">
                                <div class="fda-megamenu-page-box">
                                  <div nav-megamenu-hover="" class="fda-mega-menu-font fda-1">Home two</div>
                                  <div nav-megamenu-hover="" class="fda-mega-menu-font fda-2">Home two</div>
                                </div>
                                <div>Luxury celebrations for couples</div>
                              </a>
                            </div>
                            <div class="w-layout-hflex fda-megamenu-text-box">
                              <div class="fda-megamenu-dot"></div><a href="{{ route('home-three') }}"
                                class="fda-megamenu-text-wrapper w-inline-block">
                                <div class="w-layout-vflex fda-megamenu-page-box">
                                  <div nav-megamenu-hover="" class="fda-mega-menu-font fda-1">Home three</div>
                                  <div nav-megamenu-hover="" class="fda-mega-menu-font fda-2">Home three</div>
                                </div>
                                <div>Editorial-inspired wedding showcase</div>
                              </a>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="w-layout-vflex fda-megamenu-desktop">
                      <div class="w-layout-hflex fda-megamenu-image fda-event-none"><img
                          src="{{ asset('images/6a6305bf5040b777232a17cc_Navbar-back-image.svg') }}" loading="lazy"
                          alt="Navbar-back-image" /></div>
                      <div class="w-layout-hflex fda-megamenu-top-wrapper">
                        <div class="w-layout-hflex fda-megamenu-box-1-v2">
                          <div class="w-layout-vflex fda-megamenu-inner-box-wrapper">
                            <div class="w-layout-vflex fda-megamenu-inner-box-1 fda-border-off">
                              <div class="w-layout-hflex fda-megamenu-title-box">
                                <div class="w-layout-hflex fda-megamenu-icon-v2"><img
                                    src="{{ asset('images/6a6305bf5040b777232a17d4_Home-icon.svg') }}" loading="lazy"
                                    alt="Home-icon" /></div>
                                <div class="fda-tag-text-v1">Home pages</div>
                              </div>
                              <div class="w-layout-hflex fda-megamenu-text-box">
                                <div class="fda-megamenu-dot"></div><a href="{{ route('home') }}"
                                  class="fda-megamenu-text-wrapper w-inline-block">
                                  <div class="fda-megamenu-page-box">
                                    <div nav-megamenu-hover="" class="fda-mega-menu-font fda-1">Home one</div>
                                    <div nav-megamenu-hover="" class="fda-mega-menu-font fda-2">Home one</div>
                                  </div>
                                  <div>Elegant wedding planning experience</div>
                                </a>
                              </div>
                              <div class="w-layout-hflex fda-megamenu-text-box">
                                <div class="fda-megamenu-dot"></div><a href="{{ route('home-two') }}"
                                  class="fda-megamenu-text-wrapper w-inline-block">
                                  <div class="fda-megamenu-page-box">
                                    <div nav-megamenu-hover="" class="fda-mega-menu-font fda-1">Home two</div>
                                    <div nav-megamenu-hover="" class="fda-mega-menu-font fda-2">Home two</div>
                                  </div>
                                  <div>Luxury celebrations for couples</div>
                                </a>
                              </div>
                              <div class="w-layout-hflex fda-megamenu-text-box">
                                <div class="fda-megamenu-dot"></div><a href="{{ route('home-three') }}"
                                  class="fda-megamenu-text-wrapper w-inline-block">
                                  <div class="w-layout-vflex fda-megamenu-page-box">
                                    <div nav-megamenu-hover="" class="fda-mega-menu-font fda-1">Home three</div>
                                    <div nav-megamenu-hover="" class="fda-mega-menu-font fda-2">Home three</div>
                                  </div>
                                  <div>Editorial-inspired wedding showcase</div>
                                </a>
                              </div>
                            </div>
                          </div>
                          <div class="w-layout-vflex fda-megamenu-inner-box-wrapper">
                            <div class="w-layout-vflex fda-megamenu-inner-box-1 fda-border-off">
                              <div class="w-layout-hflex fda-megamenu-title-box">
                                <div class="w-layout-hflex fda-megamenu-icon-v2"><img
                                    src="{{ asset('images/6a6305bf5040b777232a17d1_Contact.svg') }}" loading="lazy"
                                    alt="Contact" /></div>
                                <div class="fda-tag-text-v1">SERVICES</div>
                              </div>
                              <div class="w-layout-hflex fda-megamenu-text-box">
                                <div class="fda-megamenu-dot"></div><a href="{{ route('service-one') }}"
                                  class="fda-megamenu-text-wrapper w-inline-block">
                                  <div class="w-layout-vflex fda-megamenu-page-box">
                                    <div nav-megamenu-hover="" class="fda-mega-menu-font fda-1">Service one</div>
                                    <div nav-megamenu-hover="" class="fda-mega-menu-font fda-2">Service one</div>
                                  </div>
                                  <div>Complete wedding planning solutions</div>
                                </a>
                              </div>
                              <div class="w-layout-hflex fda-megamenu-text-box">
                                <div class="fda-megamenu-dot"></div><a href="{{ route('service-two') }}"
                                  class="fda-megamenu-text-wrapper w-inline-block">
                                  <div class="w-layout-vflex fda-megamenu-page-box">
                                    <div nav-megamenu-hover="" class="fda-mega-menu-font fda-1">Service two</div>
                                    <div nav-megamenu-hover="" class="fda-mega-menu-font fda-2">Service two</div>
                                  </div>
                                  <div>Creative styling and coordination</div>
                                </a>
                              </div>
                              <div class="w-layout-hflex fda-megamenu-text-box">
                                <div class="fda-megamenu-dot"></div><a href="{{ route('service-three') }}"
                                  aria-current="page" class="fda-megamenu-text-wrapper w-inline-block w--current">
                                  <div class="w-layout-vflex fda-megamenu-page-box">
                                    <div nav-megamenu-hover="" class="fda-mega-menu-font fda-1">Service three</div>
                                    <div nav-megamenu-hover="" class="fda-mega-menu-font fda-2">Service three</div>
                                  </div>
                                  <div>Destination and luxury celebrations</div>
                                </a>
                              </div>
                            </div>
                          </div>
                          <div class="w-layout-vflex fda-megamenu-inner-box-wrapper">
                            <div class="w-layout-vflex fda-megamenu-inner-box-1 fda-border-off">
                              <div class="w-layout-hflex fda-megamenu-title-box">
                                <div class="w-layout-hflex fda-megamenu-icon-v2"><img
                                    src="{{ asset('images/6a6305bf5040b777232a17ca_Package.svg') }}" loading="lazy"
                                    alt="Package" /></div>
                                <div class="fda-tag-text-v1">PACKAGES</div>
                              </div>
                              <div class="w-layout-hflex fda-megamenu-text-box">
                                <div class="fda-megamenu-dot"></div><a href="{{ route('classic-package') }}"
                                  class="fda-megamenu-text-wrapper w-inline-block">
                                  <div class="w-layout-vflex fda-megamenu-page-box">
                                    <div nav-megamenu-hover="" class="fda-mega-menu-font fda-1">Classic package</div>
                                    <div nav-megamenu-hover="" class="fda-mega-menu-font fda-2">Classic package</div>
                                  </div>
                                  <div>Timeless celebrations with elegance</div>
                                </a>
                              </div>
                              <div class="w-layout-hflex fda-megamenu-text-box">
                                <div class="fda-megamenu-dot"></div><a href="{{ route('elegance-package') }}"
                                  class="fda-megamenu-text-wrapper w-inline-block">
                                  <div class="w-layout-vflex fda-megamenu-page-box">
                                    <div nav-megamenu-hover="" class="fda-mega-menu-font fda-1">Elegance package</div>
                                    <div nav-megamenu-hover="" class="fda-mega-menu-font fda-2">Elegance package</div>
                                  </div>
                                  <div>Refined details for stylish weddings</div>
                                </a>
                              </div>
                              <div class="w-layout-hflex fda-megamenu-text-box">
                                <div class="fda-megamenu-dot"></div><a href="{{ route('luxury-package') }}"
                                  class="fda-megamenu-text-wrapper w-inline-block">
                                  <div class="w-layout-vflex fda-megamenu-page-box">
                                    <div nav-megamenu-hover="" class="fda-mega-menu-font fda-1">Luxury package</div>
                                    <div nav-megamenu-hover="" class="fda-mega-menu-font fda-2">Luxury package</div>
                                  </div>
                                  <div>Exclusive experiences for couples</div>
                                </a>
                              </div>
                              <div class="w-layout-hflex fda-megamenu-text-box">
                                <div class="fda-megamenu-dot"></div><a href="{{ route('booking-inquiry') }}"
                                  class="fda-megamenu-text-wrapper w-inline-block">
                                  <div class="w-layout-vflex fda-megamenu-page-box">
                                    <div nav-megamenu-hover="" class="fda-mega-menu-font fda-1">Booking inquiry</div>
                                    <div nav-megamenu-hover="" class="fda-mega-menu-font fda-2">Booking inquiry</div>
                                  </div>
                                  <div>Start planning your special day</div>
                                </a>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="w-layout-hflex fda-megamenu-bottom-wrapper">
                        <div class="w-layout-hflex fda-other-page-box">
                          <div class="fda-other-page-text">
                            <div class="fda-tag-text-v1">OTHER PAGES</div>
                          </div>
                          <div megamenu-nav-text-hover="" class="w-layout-vflex fda-megamenu-page-box"><a
                              href="{{ route('venue') }}" class="fda-mega-menu-font fda-1">Venue</a><a
                              href="{{ route('venue') }}" class="fda-mega-menu-font fda-2">Venue</a></div>
                          <div megamenu-nav-text-hover="" class="w-layout-vflex fda-megamenu-page-box"><a
                              href="{{ route('venue.detail', ['slug' => 'olive-grove-banquet-grounds']) }}"
                              class="fda-mega-menu-font fda-1">Venue details</a><a
                              href="{{ route('venue.detail', ['slug' => 'olive-grove-banquet-grounds']) }}"
                              class="fda-mega-menu-font fda-2">Venue details</a></div>
                          <div megamenu-nav-text-hover="" class="w-layout-vflex fda-megamenu-page-box"><a
                              href="{{ route('event') }}" class="fda-mega-menu-font fda-1">Event</a><a
                              href="{{ route('event') }}" class="fda-mega-menu-font fda-2">Event</a></div>
                          <div megamenu-nav-text-hover="" class="w-layout-vflex fda-megamenu-page-box"><a
                              href="{{ route('event.detail', ['slug' => 'romantic-garden-couple-shoot']) }}"
                              class="fda-mega-menu-font fda-1">Event details</a><a
                              href="{{ route('event.detail', ['slug' => 'romantic-garden-couple-shoot']) }}"
                              class="fda-mega-menu-font fda-2">Event details</a></div>
                        </div>
                      </div>
                    </div>
                  </div>
                </nav>
              </div>
              <div class="w-layout-hflex fda-navbar-dropdown-toggle">
                <div nav-menu-hover="" class="w-layout-vflex"><a href="{{ route('about') }}"
                    class="fda-menu-font-v1">About</a>
                  <div class="fda-nav-menu-line"></div>
                </div>
              </div>
              <div class="w-layout-hflex fda-navbar-dropdown-toggle">
                <div nav-menu-hover="" class="w-layout-vflex"><a href="{{ route('service-three') }}"
                    class="fda-menu-font-v1">Services</a>
                  <div class="fda-nav-menu-line"></div>
                </div>
              </div>
              <div class="w-layout-hflex fda-navbar-dropdown-toggle">
                <div nav-menu-hover="" class="w-layout-vflex"><a href="{{ route('event') }}"
                    class="fda-menu-font-v1">Events</a>
                  <div class="fda-nav-menu-line"></div>
                </div>
              </div>
              <div class="w-layout-hflex fda-navbar-dropdown-toggle">
                <div nav-menu-hover="" class="w-layout-vflex"><a href="{{ route('portfolio') }}"
                    class="fda-menu-font-v1">Portfolio</a>
                  <div class="fda-nav-menu-line"></div>
                </div>
              </div>
              <div data-delay="500" data-hover="true" nav-menu-hover="" class="fda-navbar-dropdown-v1 w-dropdown">
                <div class="fda-navbar-dropdown-toggle w-dropdown-toggle">
                  <div class="w-layout-hflex fda-mega-menu-text-box">
                    <div class="fda-menu-font-v1">Packages</div>
                    <div class="fda-nav-menu-arrow-holder"><img width="10" height="6" alt="site-nav-arrow-black"
                        src="{{ asset('images/6a6305be5040b777232a14a2_site-nav-arrow-black.svg') }}" loading="lazy"
                        class="fda-nav-menu-arrow-1" /><img width="10" height="6" alt="site-nav-arrow-black"
                        src="{{ asset('images/6a6305be5040b777232a14a0_site-nav-arrow-black.svg') }}" loading="lazy"
                        class="fda-nav-menu-arrow-2" /></div>
                  </div>
                  <div class="fda-nav-menu-line"></div>
                </div>
                <nav class="fda-navbar-menu-dropdown w-dropdown-list">
                  <div nav-drop-menu="" class="w-layout-hflex fda-drop-down-menu-wrap">
                    <div class="w-layout-hflex fda-megamenu-mobile">
                      <div class="w-layout-vflex fda-megamenu-inner-box-1 fda-border-off">
                        <div class="w-layout-hflex fda-megamenu-text-box">
                          <div class="fda-megamenu-dot"></div><a href="{{ route('classic-package') }}"
                            class="fda-megamenu-text-wrapper w-inline-block">
                            <div class="w-layout-vflex fda-megamenu-page-box">
                              <div nav-megamenu-hover="" class="fda-mega-menu-font fda-1">Classic package</div>
                              <div nav-megamenu-hover="" class="fda-mega-menu-font fda-2">Classic package</div>
                            </div>
                            <div>Timeless celebrations with elegance</div>
                          </a>
                        </div>
                        <div class="w-layout-hflex fda-megamenu-text-box">
                          <div class="fda-megamenu-dot"></div><a href="{{ route('elegance-package') }}"
                            class="fda-megamenu-text-wrapper w-inline-block">
                            <div class="w-layout-vflex fda-megamenu-page-box">
                              <div nav-megamenu-hover="" class="fda-mega-menu-font fda-1">Elegance package</div>
                              <div nav-megamenu-hover="" class="fda-mega-menu-font fda-2">Elegance package</div>
                            </div>
                            <div>Refined details for stylish weddings</div>
                          </a>
                        </div>
                        <div class="w-layout-hflex fda-megamenu-text-box">
                          <div class="fda-megamenu-dot"></div><a href="{{ route('luxury-package') }}"
                            class="fda-megamenu-text-wrapper w-inline-block">
                            <div class="w-layout-vflex fda-megamenu-page-box">
                              <div nav-megamenu-hover="" class="fda-mega-menu-font fda-1">Luxury package</div>
                              <div nav-megamenu-hover="" class="fda-mega-menu-font fda-2">Luxury package</div>
                            </div>
                            <div>Exclusive experiences for couples</div>
                          </a>
                        </div>
                        <div class="w-layout-hflex fda-megamenu-text-box">
                          <div class="fda-megamenu-dot"></div><a href="{{ route('booking-inquiry') }}"
                            class="fda-megamenu-text-wrapper w-inline-block">
                            <div class="w-layout-vflex fda-megamenu-page-box">
                              <div nav-megamenu-hover="" class="fda-mega-menu-font fda-1">Booking inquiry</div>
                              <div nav-megamenu-hover="" class="fda-mega-menu-font fda-2">Booking inquiry</div>
                            </div>
                            <div>Start planning your special day</div>
                          </a>
                        </div>
                      </div>
                    </div>
                    <div class="w-layout-vflex fda-megamenu-desktop">
                      <div class="w-layout-hflex fda-megamenu-image fda-event-none"><img
                          src="{{ asset('images/6a6305bf5040b777232a17cc_Navbar-back-image.svg') }}" loading="lazy"
                          alt="Navbar-back-image" /></div>
                      <div class="w-layout-hflex fda-megamenu-top-wrapper">
                        <div class="w-layout-hflex fda-megamenu-box-1-v2">
                          <div class="w-layout-vflex fda-megamenu-inner-box-wrapper">
                            <div class="w-layout-vflex fda-megamenu-inner-box-1 fda-border-off">
                              <div class="w-layout-hflex fda-megamenu-title-box">
                                <div class="w-layout-hflex fda-megamenu-icon-v2"><img
                                    src="{{ asset('images/6a6305bf5040b777232a17d4_Home-icon.svg') }}" loading="lazy"
                                    alt="Home-icon" /></div>
                                <div class="fda-tag-text-v1">Home pages</div>
                              </div>
                              <div class="w-layout-hflex fda-megamenu-text-box">
                                <div class="fda-megamenu-dot"></div><a href="{{ route('home') }}"
                                  class="fda-megamenu-text-wrapper w-inline-block">
                                  <div class="fda-megamenu-page-box">
                                    <div nav-megamenu-hover="" class="fda-mega-menu-font fda-1">Home one</div>
                                    <div nav-megamenu-hover="" class="fda-mega-menu-font fda-2">Home one</div>
                                  </div>
                                  <div>Elegant wedding planning experience</div>
                                </a>
                              </div>
                              <div class="w-layout-hflex fda-megamenu-text-box">
                                <div class="fda-megamenu-dot"></div><a href="{{ route('home-two') }}"
                                  class="fda-megamenu-text-wrapper w-inline-block">
                                  <div class="fda-megamenu-page-box">
                                    <div nav-megamenu-hover="" class="fda-mega-menu-font fda-1">Home two</div>
                                    <div nav-megamenu-hover="" class="fda-mega-menu-font fda-2">Home two</div>
                                  </div>
                                  <div>Luxury celebrations for couples</div>
                                </a>
                              </div>
                              <div class="w-layout-hflex fda-megamenu-text-box">
                                <div class="fda-megamenu-dot"></div><a href="{{ route('home-three') }}"
                                  class="fda-megamenu-text-wrapper w-inline-block">
                                  <div class="w-layout-vflex fda-megamenu-page-box">
                                    <div nav-megamenu-hover="" class="fda-mega-menu-font fda-1">Home three</div>
                                    <div nav-megamenu-hover="" class="fda-mega-menu-font fda-2">Home three</div>
                                  </div>
                                  <div>Editorial-inspired wedding showcase</div>
                                </a>
                              </div>
                            </div>
                          </div>
                          <div class="w-layout-vflex fda-megamenu-inner-box-wrapper">
                            <div class="w-layout-vflex fda-megamenu-inner-box-1 fda-border-off">
                              <div class="w-layout-hflex fda-megamenu-title-box">
                                <div class="w-layout-hflex fda-megamenu-icon-v2"><img
                                    src="{{ asset('images/6a6305bf5040b777232a17d1_Contact.svg') }}" loading="lazy"
                                    alt="Contact" /></div>
                                <div class="fda-tag-text-v1">SERVICES</div>
                              </div>
                              <div class="w-layout-hflex fda-megamenu-text-box">
                                <div class="fda-megamenu-dot"></div><a href="{{ route('service-one') }}"
                                  class="fda-megamenu-text-wrapper w-inline-block">
                                  <div class="w-layout-vflex fda-megamenu-page-box">
                                    <div nav-megamenu-hover="" class="fda-mega-menu-font fda-1">Service one</div>
                                    <div nav-megamenu-hover="" class="fda-mega-menu-font fda-2">Service one</div>
                                  </div>
                                  <div>Complete wedding planning solutions</div>
                                </a>
                              </div>
                              <div class="w-layout-hflex fda-megamenu-text-box">
                                <div class="fda-megamenu-dot"></div><a href="{{ route('service-two') }}"
                                  class="fda-megamenu-text-wrapper w-inline-block">
                                  <div class="w-layout-vflex fda-megamenu-page-box">
                                    <div nav-megamenu-hover="" class="fda-mega-menu-font fda-1">Service two</div>
                                    <div nav-megamenu-hover="" class="fda-mega-menu-font fda-2">Service two</div>
                                  </div>
                                  <div>Creative styling and coordination</div>
                                </a>
                              </div>
                              <div class="w-layout-hflex fda-megamenu-text-box">
                                <div class="fda-megamenu-dot"></div><a href="{{ route('service-three') }}"
                                  aria-current="page" class="fda-megamenu-text-wrapper w-inline-block w--current">
                                  <div class="w-layout-vflex fda-megamenu-page-box">
                                    <div nav-megamenu-hover="" class="fda-mega-menu-font fda-1">Service three</div>
                                    <div nav-megamenu-hover="" class="fda-mega-menu-font fda-2">Service three</div>
                                  </div>
                                  <div>Destination and luxury celebrations</div>
                                </a>
                              </div>
                            </div>
                          </div>
                          <div class="w-layout-vflex fda-megamenu-inner-box-wrapper">
                            <div class="w-layout-vflex fda-megamenu-inner-box-1 fda-border-off">
                              <div class="w-layout-hflex fda-megamenu-title-box">
                                <div class="w-layout-hflex fda-megamenu-icon-v2"><img
                                    src="{{ asset('images/6a6305bf5040b777232a17ca_Package.svg') }}" loading="lazy"
                                    alt="Package" /></div>
                                <div class="fda-tag-text-v1">PACKAGES</div>
                              </div>
                              <div class="w-layout-hflex fda-megamenu-text-box">
                                <div class="fda-megamenu-dot"></div><a href="{{ route('classic-package') }}"
                                  class="fda-megamenu-text-wrapper w-inline-block">
                                  <div class="w-layout-vflex fda-megamenu-page-box">
                                    <div nav-megamenu-hover="" class="fda-mega-menu-font fda-1">Classic package</div>
                                    <div nav-megamenu-hover="" class="fda-mega-menu-font fda-2">Classic package</div>
                                  </div>
                                  <div>Timeless celebrations with elegance</div>
                                </a>
                              </div>
                              <div class="w-layout-hflex fda-megamenu-text-box">
                                <div class="fda-megamenu-dot"></div><a href="{{ route('elegance-package') }}"
                                  class="fda-megamenu-text-wrapper w-inline-block">
                                  <div class="w-layout-vflex fda-megamenu-page-box">
                                    <div nav-megamenu-hover="" class="fda-mega-menu-font fda-1">Elegance package</div>
                                    <div nav-megamenu-hover="" class="fda-mega-menu-font fda-2">Elegance package</div>
                                  </div>
                                  <div>Refined details for stylish weddings</div>
                                </a>
                              </div>
                              <div class="w-layout-hflex fda-megamenu-text-box">
                                <div class="fda-megamenu-dot"></div><a href="{{ route('luxury-package') }}"
                                  class="fda-megamenu-text-wrapper w-inline-block">
                                  <div class="w-layout-vflex fda-megamenu-page-box">
                                    <div nav-megamenu-hover="" class="fda-mega-menu-font fda-1">Luxury package</div>
                                    <div nav-megamenu-hover="" class="fda-mega-menu-font fda-2">Luxury package</div>
                                  </div>
                                  <div>Exclusive experiences for couples</div>
                                </a>
                              </div>
                              <div class="w-layout-hflex fda-megamenu-text-box">
                                <div class="fda-megamenu-dot"></div><a href="{{ route('booking-inquiry') }}"
                                  class="fda-megamenu-text-wrapper w-inline-block">
                                  <div class="w-layout-vflex fda-megamenu-page-box">
                                    <div nav-megamenu-hover="" class="fda-mega-menu-font fda-1">Booking inquiry</div>
                                    <div nav-megamenu-hover="" class="fda-mega-menu-font fda-2">Booking inquiry</div>
                                  </div>
                                  <div>Start planning your special day</div>
                                </a>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="w-layout-hflex fda-megamenu-bottom-wrapper">
                        <div class="w-layout-hflex fda-other-page-box">
                          <div class="fda-other-page-text">
                            <div class="fda-tag-text-v1">OTHER PAGES</div>
                          </div>
                          <div megamenu-nav-text-hover="" class="w-layout-vflex fda-megamenu-page-box"><a
                              href="{{ route('venue') }}" class="fda-mega-menu-font fda-1">Venue</a><a
                              href="{{ route('venue') }}" class="fda-mega-menu-font fda-2">Venue</a></div>
                          <div megamenu-nav-text-hover="" class="w-layout-vflex fda-megamenu-page-box"><a
                              href="{{ route('venue.detail', ['slug' => 'olive-grove-banquet-grounds']) }}"
                              class="fda-mega-menu-font fda-1">Venue details</a><a
                              href="{{ route('venue.detail', ['slug' => 'olive-grove-banquet-grounds']) }}"
                              class="fda-mega-menu-font fda-2">Venue details</a></div>
                          <div megamenu-nav-text-hover="" class="w-layout-vflex fda-megamenu-page-box"><a
                              href="{{ route('event') }}" class="fda-mega-menu-font fda-1">Event</a><a
                              href="{{ route('event') }}" class="fda-mega-menu-font fda-2">Event</a></div>
                          <div megamenu-nav-text-hover="" class="w-layout-vflex fda-megamenu-page-box"><a
                              href="{{ route('event.detail', ['slug' => 'romantic-garden-couple-shoot']) }}"
                              class="fda-mega-menu-font fda-1">Event details</a><a
                              href="{{ route('event.detail', ['slug' => 'romantic-garden-couple-shoot']) }}"
                              class="fda-mega-menu-font fda-2">Event details</a></div>
                        </div>
                      </div>
                    </div>
                  </div>
                </nav>
              </div>
              <div data-delay="500" data-hover="true" nav-menu-hover="" class="fda-navbar-dropdown-v1 w-dropdown">
                <div class="fda-navbar-dropdown-toggle w-dropdown-toggle">
                  <div class="w-layout-hflex fda-mega-menu-text-box">
                    <div class="fda-menu-font-v1">Service</div>
                    <div class="fda-nav-menu-arrow-holder"><img width="10" height="6" alt="site-nav-arrow-black"
                        src="{{ asset('images/6a6305be5040b777232a14a2_site-nav-arrow-black.svg') }}" loading="lazy"
                        class="fda-nav-menu-arrow-1" /><img width="10" height="6" alt="site-nav-arrow-black"
                        src="{{ asset('images/6a6305be5040b777232a14a0_site-nav-arrow-black.svg') }}" loading="lazy"
                        class="fda-nav-menu-arrow-2" /></div>
                  </div>
                  <div class="fda-nav-menu-line"></div>
                </div>
                <nav class="fda-navbar-menu-dropdown w-dropdown-list">
                  <div nav-drop-menu="" class="w-layout-hflex fda-drop-down-menu-wrap">
                    <div class="w-layout-hflex fda-megamenu-mobile">
                      <div class="w-layout-vflex fda-megamenu-inner-box-1 fda-border-off">
                        <div class="w-layout-hflex fda-megamenu-text-box">
                          <div class="fda-megamenu-dot"></div><a href="{{ route('service-one') }}"
                            class="fda-megamenu-text-wrapper w-inline-block">
                            <div class="w-layout-vflex fda-megamenu-page-box">
                              <div nav-megamenu-hover="" class="fda-mega-menu-font fda-1">Service one</div>
                              <div nav-megamenu-hover="" class="fda-mega-menu-font fda-2">Service one</div>
                            </div>
                            <div>Complete wedding planning solutions</div>
                          </a>
                        </div>
                        <div class="w-layout-hflex fda-megamenu-text-box">
                          <div class="fda-megamenu-dot"></div><a href="{{ route('service-two') }}"
                            class="fda-megamenu-text-wrapper w-inline-block">
                            <div class="w-layout-vflex fda-megamenu-page-box">
                              <div nav-megamenu-hover="" class="fda-mega-menu-font fda-1">Service two</div>
                              <div nav-megamenu-hover="" class="fda-mega-menu-font fda-2">Service two</div>
                            </div>
                            <div>Creative styling and coordination</div>
                          </a>
                        </div>
                        <div class="w-layout-hflex fda-megamenu-text-box">
                          <div class="fda-megamenu-dot"></div><a href="{{ route('service-three') }}" aria-current="page"
                            class="fda-megamenu-text-wrapper w-inline-block w--current">
                            <div class="w-layout-vflex fda-megamenu-page-box">
                              <div nav-megamenu-hover="" class="fda-mega-menu-font fda-1">Service three</div>
                              <div nav-megamenu-hover="" class="fda-mega-menu-font fda-2">Service three</div>
                            </div>
                            <div>Destination and luxury celebrations</div>
                          </a>
                        </div>
                      </div>
                    </div>
                    <div class="w-layout-vflex fda-megamenu-desktop">
                      <div class="w-layout-hflex fda-megamenu-image fda-event-none"><img
                          src="{{ asset('images/6a6305bf5040b777232a17cc_Navbar-back-image.svg') }}" loading="lazy"
                          alt="Navbar-back-image" /></div>
                      <div class="w-layout-hflex fda-megamenu-top-wrapper">
                        <div class="w-layout-hflex fda-megamenu-box-1-v2">
                          <div class="w-layout-vflex fda-megamenu-inner-box-wrapper">
                            <div class="w-layout-vflex fda-megamenu-inner-box-1 fda-border-off">
                              <div class="w-layout-hflex fda-megamenu-title-box">
                                <div class="w-layout-hflex fda-megamenu-icon-v2"><img
                                    src="{{ asset('images/6a6305bf5040b777232a17d4_Home-icon.svg') }}" loading="lazy"
                                    alt="Home-icon" /></div>
                                <div class="fda-tag-text-v1">Home pages</div>
                              </div>
                              <div class="w-layout-hflex fda-megamenu-text-box">
                                <div class="fda-megamenu-dot"></div><a href="{{ route('home') }}"
                                  class="fda-megamenu-text-wrapper w-inline-block">
                                  <div class="fda-megamenu-page-box">
                                    <div nav-megamenu-hover="" class="fda-mega-menu-font fda-1">Home one</div>
                                    <div nav-megamenu-hover="" class="fda-mega-menu-font fda-2">Home one</div>
                                  </div>
                                  <div>Elegant wedding planning experience</div>
                                </a>
                              </div>
                              <div class="w-layout-hflex fda-megamenu-text-box">
                                <div class="fda-megamenu-dot"></div><a href="{{ route('home-two') }}"
                                  class="fda-megamenu-text-wrapper w-inline-block">
                                  <div class="fda-megamenu-page-box">
                                    <div nav-megamenu-hover="" class="fda-mega-menu-font fda-1">Home two</div>
                                    <div nav-megamenu-hover="" class="fda-mega-menu-font fda-2">Home two</div>
                                  </div>
                                  <div>Luxury celebrations for couples</div>
                                </a>
                              </div>
                              <div class="w-layout-hflex fda-megamenu-text-box">
                                <div class="fda-megamenu-dot"></div><a href="{{ route('home-three') }}"
                                  class="fda-megamenu-text-wrapper w-inline-block">
                                  <div class="w-layout-vflex fda-megamenu-page-box">
                                    <div nav-megamenu-hover="" class="fda-mega-menu-font fda-1">Home three</div>
                                    <div nav-megamenu-hover="" class="fda-mega-menu-font fda-2">Home three</div>
                                  </div>
                                  <div>Editorial-inspired wedding showcase</div>
                                </a>
                              </div>
                            </div>
                          </div>
                          <div class="w-layout-vflex fda-megamenu-inner-box-wrapper">
                            <div class="w-layout-vflex fda-megamenu-inner-box-1 fda-border-off">
                              <div class="w-layout-hflex fda-megamenu-title-box">
                                <div class="w-layout-hflex fda-megamenu-icon-v2"><img
                                    src="{{ asset('images/6a6305bf5040b777232a17d1_Contact.svg') }}" loading="lazy"
                                    alt="Contact" /></div>
                                <div class="fda-tag-text-v1">SERVICES</div>
                              </div>
                              <div class="w-layout-hflex fda-megamenu-text-box">
                                <div class="fda-megamenu-dot"></div><a href="{{ route('service-one') }}"
                                  class="fda-megamenu-text-wrapper w-inline-block">
                                  <div class="w-layout-vflex fda-megamenu-page-box">
                                    <div nav-megamenu-hover="" class="fda-mega-menu-font fda-1">Service one</div>
                                    <div nav-megamenu-hover="" class="fda-mega-menu-font fda-2">Service one</div>
                                  </div>
                                  <div>Complete wedding planning solutions</div>
                                </a>
                              </div>
                              <div class="w-layout-hflex fda-megamenu-text-box">
                                <div class="fda-megamenu-dot"></div><a href="{{ route('service-two') }}"
                                  class="fda-megamenu-text-wrapper w-inline-block">
                                  <div class="w-layout-vflex fda-megamenu-page-box">
                                    <div nav-megamenu-hover="" class="fda-mega-menu-font fda-1">Service two</div>
                                    <div nav-megamenu-hover="" class="fda-mega-menu-font fda-2">Service two</div>
                                  </div>
                                  <div>Creative styling and coordination</div>
                                </a>
                              </div>
                              <div class="w-layout-hflex fda-megamenu-text-box">
                                <div class="fda-megamenu-dot"></div><a href="{{ route('service-three') }}"
                                  aria-current="page" class="fda-megamenu-text-wrapper w-inline-block w--current">
                                  <div class="w-layout-vflex fda-megamenu-page-box">
                                    <div nav-megamenu-hover="" class="fda-mega-menu-font fda-1">Service three</div>
                                    <div nav-megamenu-hover="" class="fda-mega-menu-font fda-2">Service three</div>
                                  </div>
                                  <div>Destination and luxury celebrations</div>
                                </a>
                              </div>
                            </div>
                          </div>
                          <div class="w-layout-vflex fda-megamenu-inner-box-wrapper">
                            <div class="w-layout-vflex fda-megamenu-inner-box-1 fda-border-off">
                              <div class="w-layout-hflex fda-megamenu-title-box">
                                <div class="w-layout-hflex fda-megamenu-icon-v2"><img
                                    src="{{ asset('images/6a6305bf5040b777232a17ca_Package.svg') }}" loading="lazy"
                                    alt="Package" /></div>
                                <div class="fda-tag-text-v1">PACKAGES</div>
                              </div>
                              <div class="w-layout-hflex fda-megamenu-text-box">
                                <div class="fda-megamenu-dot"></div><a href="{{ route('classic-package') }}"
                                  class="fda-megamenu-text-wrapper w-inline-block">
                                  <div class="w-layout-vflex fda-megamenu-page-box">
                                    <div nav-megamenu-hover="" class="fda-mega-menu-font fda-1">Classic package</div>
                                    <div nav-megamenu-hover="" class="fda-mega-menu-font fda-2">Classic package</div>
                                  </div>
                                  <div>Timeless celebrations with elegance</div>
                                </a>
                              </div>
                              <div class="w-layout-hflex fda-megamenu-text-box">
                                <div class="fda-megamenu-dot"></div><a href="{{ route('elegance-package') }}"
                                  class="fda-megamenu-text-wrapper w-inline-block">
                                  <div class="w-layout-vflex fda-megamenu-page-box">
                                    <div nav-megamenu-hover="" class="fda-mega-menu-font fda-1">Elegance package</div>
                                    <div nav-megamenu-hover="" class="fda-mega-menu-font fda-2">Elegance package</div>
                                  </div>
                                  <div>Refined details for stylish weddings</div>
                                </a>
                              </div>
                              <div class="w-layout-hflex fda-megamenu-text-box">
                                <div class="fda-megamenu-dot"></div><a href="{{ route('luxury-package') }}"
                                  class="fda-megamenu-text-wrapper w-inline-block">
                                  <div class="w-layout-vflex fda-megamenu-page-box">
                                    <div nav-megamenu-hover="" class="fda-mega-menu-font fda-1">Luxury package</div>
                                    <div nav-megamenu-hover="" class="fda-mega-menu-font fda-2">Luxury package</div>
                                  </div>
                                  <div>Exclusive experiences for couples</div>
                                </a>
                              </div>
                              <div class="w-layout-hflex fda-megamenu-text-box">
                                <div class="fda-megamenu-dot"></div><a href="{{ route('booking-inquiry') }}"
                                  class="fda-megamenu-text-wrapper w-inline-block">
                                  <div class="w-layout-vflex fda-megamenu-page-box">
                                    <div nav-megamenu-hover="" class="fda-mega-menu-font fda-1">Booking inquiry</div>
                                    <div nav-megamenu-hover="" class="fda-mega-menu-font fda-2">Booking inquiry</div>
                                  </div>
                                  <div>Start planning your special day</div>
                                </a>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="w-layout-hflex fda-megamenu-bottom-wrapper">
                        <div class="w-layout-hflex fda-other-page-box">
                          <div class="fda-other-page-text">
                            <div class="fda-tag-text-v1">OTHER PAGES</div>
                          </div>
                          <div megamenu-nav-text-hover="" class="w-layout-vflex fda-megamenu-page-box"><a
                              href="{{ route('venue') }}" class="fda-mega-menu-font fda-1">Venue</a><a
                              href="{{ route('venue') }}" class="fda-mega-menu-font fda-2">Venue</a></div>
                          <div megamenu-nav-text-hover="" class="w-layout-vflex fda-megamenu-page-box"><a
                              href="{{ route('venue.detail', ['slug' => 'olive-grove-banquet-grounds']) }}"
                              class="fda-mega-menu-font fda-1">Venue details</a><a
                              href="{{ route('venue.detail', ['slug' => 'olive-grove-banquet-grounds']) }}"
                              class="fda-mega-menu-font fda-2">Venue details</a></div>
                          <div megamenu-nav-text-hover="" class="w-layout-vflex fda-megamenu-page-box"><a
                              href="{{ route('event') }}" class="fda-mega-menu-font fda-1">Event</a><a
                              href="{{ route('event') }}" class="fda-mega-menu-font fda-2">Event</a></div>
                          <div megamenu-nav-text-hover="" class="w-layout-vflex fda-megamenu-page-box"><a
                              href="{{ route('event.detail', ['slug' => 'romantic-garden-couple-shoot']) }}"
                              class="fda-mega-menu-font fda-1">Event details</a><a
                              href="{{ route('event.detail', ['slug' => 'romantic-garden-couple-shoot']) }}"
                              class="fda-mega-menu-font fda-2">Event details</a></div>
                        </div>
                      </div>
                    </div>
                  </div>
                </nav>
              </div>
              <div class="w-layout-hflex fda-navbar-dropdown-toggle">
                <div nav-menu-hover="" class="w-layout-vflex"><a href="{{ route('contact') }}"
                    class="fda-menu-font-v1">Contact</a>
                  <div class="fda-nav-menu-line"></div>
                </div>
              </div>
            </div>
            <div class="w-layout-vflex fda-nav-bottom-content">
              <div class="w-layout-vflex fda-nav-contact-box">
                <div class="w-layout-hflex fda-contact-box">
                  <div class="fda-menu-font-v1">Phone - </div><a href="tel:8884567890" class="fda-color-primary">(888)
                    456 7890</a>
                </div>
                <div class="w-layout-hflex fda-contact-box">
                  <div class="fda-menu-font-v1">Email -</div><a href="mailto:info@example.com"
                    class="fda-color-primary">info@example.com</a>
                </div>
              </div>
              <div class="w-layout-vflex fda-nav-botton-wrapper"><a data-wf--fda-button-v1--variant="black"
                  href="{{ route('booking-inquiry') }}"
                  class="fda-button-v1 w-variant-37e9e6b2-81fa-735b-b246-547b818c5d40 w-inline-block">
                  <div class="fda-button-overlay w-variant-37e9e6b2-81fa-735b-b246-547b818c5d40"></div>
                  <div class="w-layout-hflex fda-button-text-wrapper-v1 fda-overflow-hidden">
                    <div class="fda-button-text w-variant-37e9e6b2-81fa-735b-b246-547b818c5d40 fda-1">Request a quote
                    </div>
                    <div class="fda-button-text w-variant-37e9e6b2-81fa-735b-b246-547b818c5d40 fda-2">Request a quote
                    </div>
                  </div>
                </a></div>
            </div>
          </div>
        </nav>
        <div class="fda-menu-button w-nav-button">
                    <div class="fda-menu-button-main w-nav-button">
                        <div class="fda-menu-line fda-top-line"></div>
                        <div class="fda-menu-line fda-middle-line"></div>
                        <div class="fda-menu-line fda-bottom-line"></div>
                    </div>
                </div>
                <div class="fda-navbar-button">
                    <a href="{{ route('booking-inquiry') }}" class="fda-button-v1 w-inline-block" style="background: #1a1918; color: #ffffff; padding: 10px 22px; border-radius: 30px; text-decoration: none; font-size: 13px; font-weight: 600;">
                        Request a quote
                    </a>
                </div>
            </div>
        </div>
    </div>

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
            <p class="paragraph-detail-intro">{{ $item['description'] }}</p>

            <!-- Meta Strip -->
            <div class="meta-strip-lovio">
                <div class="meta-strip-item">📍 <strong>Venue:</strong> {{ $item['location'] }}</div>
                <div class="meta-strip-item">📅 <strong>Date:</strong> {{ $item['date'] }}</div>
                <div class="meta-strip-item">👥 <strong>Guests:</strong> {{ $item['guests'] }}</div>
            </div>

            <div class="border-down-line"></div>
        </div>
    </header>

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
    @if(isset($item['video_mp4']))
        <div class="section-video-film">
            <h3 style="font-family: 'Marcellus', serif; font-size: 26px; text-align: center; color: #1a1918; margin-bottom: 20px;">
                4K Cinema Wedding Film
            </h3>
            <div class="video-box-container">
                <video controls poster="{{ asset($item['video_poster'] ?? $item['cover_image']) }}">
                    <source src="{{ asset($item['video_mp4']) }}" type="video/mp4">
                    @if(isset($item['video_webm']))
                        <source src="{{ asset($item['video_webm']) }}" type="video/webm">
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
