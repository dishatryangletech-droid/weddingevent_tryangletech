<!DOCTYPE html>
<html data-wf-domain="knotcraft.webflow.io" data-wf-page="6a6305be5040b777232a1411" data-wf-site="6a6305be5040b777232a1422" lang="en">
<head>
    <meta charset="utf-8"/>
    <link href="https://cdn.prod.website-files.com" rel="preconnect" />
    <title>{{ $blog->title ?? 'Blog Detail' }} - Knotcraft</title>
    <meta content="{{ Str::limit(strip_tags($blog->content ?? $blog->title), 160) }}" name="description"/>
    <meta content="width=device-width, initial-scale=1" name="viewport"/>
    <link href="{{ asset('css/knotcraft.webflow.shared.3f78cfc4d.css') }}" rel="stylesheet" type="text/css" />
    <style>html.w-mod-js:not(.w-mod-ix3) :is(.fda-megamenu-iocn, [banner-text="v1"], [banner-text-appear-old], .fda-wedding-top-layer, [best-wedding-description="v1"], .fda-team-data, .fda-team-bottom-strip, [loader-banner-image], [grow], .fda-gallery-inner-layer-box, .fda-gallery-icon, [nav-drop-menu], .fda-nav-menu-line, .fda-nav-menu-arrow-holder, [appear], [detail-text], .fda-details-paragraph-overflow.fda-active, .fda-planning-card.fda-2, .fda-planning-card.fda-3, .fda-planning-card-wrap, .fda-destinations-card-image, .fda-move-image, [banner-image-old="1"], .fda-story-box.fda2, [story-text-v2], [story-box-v2], .fda-story-bg-image.fda-2, .fda-story-box.fda3, [story-text], [story-box], .fda-story-bg-image.fda-3, .fda-story-line, .fda-wedding-card, [wedding-card-1], [wedding-card-3], [wedding-card-5], [wedding-card-2], [wedding-card-4], .fda-moments-image, .fda-booking-form-box, .fda-bookng-form, .fda-details-bottom-item-image, [data-30="marquee-right"], .fda-moments-bg-image-box.fda-active, .fda-moments-bg-image-box, .fda-moments-card-top-box, .fda-moments-card-top-box.fda-text-center.fda-active, .fda-monitor-box.fda-radius, .fda-monitor-box-v2.fda-radius, .fda-service-point-line, .fda-catalog-card.fda-1, .fda-catalog-card.fda-2, .fda-catalog-card-holder, .fda-footer-big-text-v2, .fda-footer-big-text-logo, [banner-text-appear-v2], [data-90="marquee-left"], [banner-flower], [ripple-1], [ripple-2], [ripple-3], [fda-button-v2-line], [data-40="marquee-left"], .fda-footer-underline, .fda-icon-1, .fda-icon-2, [data-20="marquee-left"], .fda-image-layer, .fda-venue-destinations-image, [data-60="marquee-left"], [story-box-1], .fda-story-v2-sticky, .fda-story-box.fda-1, .fda-story-content-v2, [social-hover="v1"], [appear-tab], [text-appear], .fda-moment-card.fda-radius.fda-overflow-hidden, .fda-moment-card-v2, .fda-moment-card-v3, .fda-moment-small-card.fda-3, .fda-moment-small-card.fda-2, .fda-button-overlay, .fda-button-text.fda-2, [leaf-appear], .fda-moment-inner-line-1, .fda-moment-image-1, .fda-moment-image-2, .fda-slider-number-1, .fda-slider-number-2, .fda-highlight-number, .fda-highlight-number-v2, .fda-highlight-number-v3, .fda-highlight-number-v4, .fda-moment-inner-line-2, .fda-moment-image-3, .fda-slider-number-3, .fda-moment-inner-line-3, .fda-slider-number-4, .fda-moment-image-4, [data-wf-target*='["ef6b8d15-d3d7-3de2-c054-18dcf8057628","ef6b8d15-d3d7-3de2-c054-18dcf805764f"]'], .fda-moment-inner-line-4, .fda-moment-image-5, [nav-megamenu-hover], .fda-megamenu-dot, .fda-mega-menu-font.fda-1, .fda-mega-menu-font.fda-2, [wave-text], .fda-post-item-image, .fda-button-arrow-icon-wrapper, .fda-post-card-item-image, .fda-post-item-button-icon-wrapper, .fda-upcoming-icon-box, [banner-text-appear="v1"], .fda-event-image-hover, [banner-appear-old], [faq-answer], [faq-arrow], [faq-arrow-v2], [faq-bar], [faq-arrow-icon], .fda-recent-post-image, .fda-service-paragraph-v5, .fda-service-v3-col-2.fda-tab-display-none, .fda-service-v3-col-3.fda-tab-display-none, .fda-service-v3-col-4.fda-tab-display-none, .fda-service-v3-glow-line, .fda-service-v3-card, .fda-footer-big-text.fda-1, .fda-footer-big-text.fda-2, .fda-footer-logo-text-wrapper.fda-3, .fda-footer-big-text.fda-4, .fda-footer-big-text.fda-5, .fda-footer-big-text.fda-6, .fda-footer-big-text.fda-7, .fda-footer-big-text.fda-8, .fda-footer-big-text.fda-9, .fda-recognition-line, [fill-layer]) {visibility: hidden !important;}</style>
    <link rel="stylesheet" href="{{ asset('css/google-fonts.css') }}">
    <link href="{{ asset('images/favicon.png') }}" rel="icon" type="image/png" sizes="32x32" />
    <link href="{{ asset('images/favicon.png') }}" rel="apple-touch-icon" />
    <style>
        .fda-details-content p:has(img) {
            width: 48%;
            display: inline-block;
            vertical-align: top;
            margin-bottom: 20px;
        }
        .fda-details-content p:has(img) + p:has(img) {
            margin-left: 2%;
        }
        /* Reset margin-left for every 3rd image if there are multiple rows */
        .fda-details-content p:has(img):nth-child(2n+1) {
            margin-left: 0;
        }
        .fda-details-content p:has(img) img {
            width: 100% !important;
            height: auto;
            border-radius: 8px; /* Optional polishing */
        }
        @media (max-width: 767px) {
            .fda-details-content p:has(img) {
                width: 100%;
                margin-left: 0 !important;
            }
        }
        .fda-details-content li {
            color: var(--text-color--text-secondary) !important;
            font-size: var(--_typography---body-text--body-text-size) !important;
            font-weight: var(--_typography---body-text--body-text-weight) !important;
            line-height: var(--_typography---body-text--body-text-line-height) !important;
            margin-bottom: 0.5rem;
        }
    </style>
</head>
<body>
    @include('frontend.partials.header')

    @php
        $getImageUrl = function($path, $default = null) {
            if (empty($path)) return $default;
            if (str_starts_with($path, 'http')) return $path;
            if (str_starts_with($path, 'images/') || str_starts_with($path, 'storage/')) return asset($path);
            return asset('storage/' . $path);
        };

        $heroImage = $getImageUrl($blog->banner_image ?? null) 
                  ?? $getImageUrl($blog->image ?? null) 
                  ?? asset('images/6a6305be5040b777232a1435_Blog-thumbnail-image-one.avif');
        $authorImage = $getImageUrl($blog->author_image ?? null, asset('images/6a6305bf5040b777232a1848_User-image-one.webp'));
        $dateText = !empty($blog->publish_date) ? $blog->publish_date : ($blog->created_at ? $blog->created_at->format('d F Y') : '09 January 2026');
    @endphp

    <section class="fda-hero-v10">
        <div class="w-layout-blockcontainer fda-container-medium w-container">
            <div class="w-layout-vflex fda-hero-v10-main">
                <div class="w-layout-vflex fda-hero-v10-top fda-text-center">
                    <div banner-appear="" class="w-layout-hflex fda-subtext-wrapper fda-tag-text-gap-v2">
                        <div class="w-layout-vflex">
                            <img src="{{ asset('images/6a6305be5040b777232a1459_Calender-icon.svg') }}" loading="lazy" alt="Calender-icon"/>
                        </div>
                        <div class="fda-color-primary">{{ $dateText }}</div>
                    </div>
                    <h1 banner-text-appear="v1" class="fda-gap-none">{{ $blog->title }}</h1>
                </div>
                <div banner-appear="" class="fda-hero-v10-bottom fda-overflow-hidden fda-radius">
                    <img src="{{ $heroImage }}" loading="eager" width="1610" fetchpriority="high" alt="{{ $blog->title }}"/>
                </div>
            </div>
        </div>
    </section>

    <section class="fda-section-gap-top fda-section-gap-bottom">
        <div class="w-layout-blockcontainer fda-container-medium w-container">
            <div class="w-layout-hflex fda-more-details-wrapper">
                <div class="w-layout-hflex fda-more-details-main">
                    <div class="w-layout-vflex fda-more-details-left-wrapper">
                        <div appear="" class="w-layout-vflex fda-more-details-left-main">
                            <div class="fda-more-details-left-image-wrapper fda-overflow-hidden fda-radius">
                                <img src="{{ $authorImage }}" loading="lazy" width="155" alt="{{ $blog->author_name ?? 'Author' }}"/>
                            </div>
                            <div class="w-layout-vflex fda-more-details-user-details">
                                <div class="fda-text-style-h5">{{ $blog->author_name ?? 'Dennis Taylor' }}</div>
                                <div>{{ $blog->author_role ?? 'Event Manager' }}</div>
                            </div>
                        </div>
                    </div>
                    <div class="fda-more-details-line fda-tab-display-none"></div>
                    <div class="w-layout-vflex fda-more-details-right-wrapper">
                        <div class="fda-details-content w-richtext">
                            {!! $blog->content !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @if(isset($recentBlogs) && count($recentBlogs) > 0)
    <section class="fda-section-gap-bottom">
        <div class="w-layout-blockcontainer fda-container-medium w-container">
            <div class="w-layout-vflex fda-recent-post-main">
                <div class="w-layout-vflex fda-recent-post-top fda-text-center">
                    <div text-appear="" class="fda-tag-text-gap-v2">
                        <div text-appear="" class="fda-tag-text-v1 fda-text-capitalize">Our insights</div>
                    </div>
                    <h2 text-appear="" class="fda-gap-none">Stories of timeless love</h2>
                </div>
                <div class="fda-desktop-full-width w-dyn-list">
                    <div role="list" class="fda-recent-post-bottom w-dyn-items">
                        @foreach($recentBlogs as $recent)
                            @php
                                $recentImg = !empty($recent->image) ? (str_starts_with($recent->image, 'http') ? $recent->image : asset($recent->image)) : asset('images/6a6305be5040b777232a1493_Blog-image-two.webp');
                                $recentAuthorImg = !empty($recent->author_image) ? (str_starts_with($recent->author_image, 'http') ? $recent->author_image : asset($recent->author_image)) : asset('images/6a6305bf5040b777232a1863_Author.avif');
                                $recentDate = !empty($recent->publish_date) ? $recent->publish_date : ($recent->created_at ? $recent->created_at->format('d F Y') : '18 June 2025');
                            @endphp
                            <div role="listitem" class="w-dyn-item">
                                <a appear="" href="{{ route('blog.detail', ['slug' => $recent->slug]) }}" class="fda-recent-post-item w-inline-block">
                                    <div class="fda-recent-post-image-wrapper fda-overflow-hidden fda-radius">
                                        <div class="w-layout-hflex fda-image-box">
                                            <img src="{{ $recentImg }}" loading="lazy" width="517" alt="{{ $recent->title }}" class="fda-recent-post-image"/>
                                        </div>
                                    </div>
                                    <div class="w-layout-vflex fda-recent-post-item-bottom">
                                        <div class="w-layout-vflex fda-recent-post-text-wrapper">
                                            <div class="fda-color-secondary">{{ $recentDate }}</div>
                                            <div class="fda-text-style-h5">{{ $recent->title }}</div>
                                        </div>
                                        <div class="w-layout-hflex fda-recent-post-user">
                                            <div class="w-layout-hflex fda-recent-post-user-image-wrapper fda-overflow-hidden">
                                                <img src="{{ $recentAuthorImg }}" loading="lazy" width="40" alt="{{ $recent->author_name ?? '' }}"/>
                                            </div>
                                            <div class="fda-color-secondary">{{ $recent->author_name ?? 'Victoria Hayes' }}</div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endif

    @include('frontend.partials.footer')
    <script src="{{ asset('js/jquery-3.5.1.min.dc5e7f18c8.js?site=6a6305be5040b777232a1422') }}" type="text/javascript"></script>
    <script src="{{ asset('js/webflow.schunk.eed72d374c7ba9a2.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/webflow.schunk.408c304bedb55afc.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/webflow.schunk.074a11371c3f382f.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/webflow.8c7e90c5.844126c509e7b4ae.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/gsap.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/SplitText.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/ScrollTrigger.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/custom-animations.js') }}"></script>
</body>
</html>
