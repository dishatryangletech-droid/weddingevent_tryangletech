@php
  $fs = $footerSetting ?? \App\Models\FooterSetting::getSettings();
@endphp
<style>
  .fda-footer-underline {
    display: none !important;
  }
  .fda-footer a,
  .fda-footer .fda-footer-link,
  .fda-footer .fda-footer-text-link,
  .fda-footer .fda-color-peach,
  .fda-footer .fda-link-text-hover {
    text-decoration: none !important;
  }
</style>
<section class="fda-footer fda-overflow-hidden">
  <div class="fda-footer-block" style="background-color: #0c2e2b;
;">
    <div class="w-layout-hflex fda-footer-main">
      <div class="w-layout-blockcontainer fda-container-medium fda-z-index-10 w-container">
        <div class="w-layout-hflex fda-footer-main-inner-wrapper">
          <div class="w-layout-vflex fda-footer-link-wrap">
            <div class="w-layout-vflex fda-footer-menu-title">
              <div class="fda-text-style-h5 fda-color-peach">{{ $fs->quick_links_heading ?? 'Useful links' }}</div>
            </div>
            <div class="w-layout-hflex fda-footer-menu-wrap">
              <div class="w-layout-vflex fda-footer-link-item">
                @if(!empty($fs->services_links) && is_array($fs->services_links))
                  @foreach($fs->services_links as $link)
                    <a href="{{ url($link['url'] ?? '#') }}" class="fda-footer-link w-inline-block">
                      <div class="fda-text-color-light-grey fda-footer-text-link">{{ $link['title'] }}</div>
                    </a>
                  @endforeach
                @else
                  <a href="{{ route('home') }}" class="fda-footer-link w-inline-block">
                    <div class="fda-text-color-light-grey fda-footer-text-link">Home</div>
                  </a>
                  <a href="{{ route('about') }}" class="fda-footer-link w-inline-block">
                    <div class="fda-text-color-light-grey fda-footer-text-link">About</div>
                  </a>
                  <a href="{{ route('service-three') }}" class="fda-footer-link w-inline-block">
                    <div class="fda-text-color-light-grey fda-footer-text-link">Service</div>
                  </a>
                  <a href="{{ route('event') }}" class="fda-footer-link w-inline-block">
                    <div class="fda-text-color-light-grey fda-footer-text-link">Events</div>
                  </a>
                  <a href="{{ route('portfolio') }}" class="fda-footer-link w-inline-block">
                    <div class="fda-text-color-light-grey fda-footer-text-link">Portfolio</div>
                  </a>
                  <a href="{{ route('blog') }}" class="fda-footer-link w-inline-block">
                    <div class="fda-text-color-light-grey fda-footer-text-link">Blog</div>
                  </a>
                  <a href="{{ route('contact') }}" class="fda-footer-link w-inline-block">
                    <div class="fda-text-color-light-grey fda-footer-text-link">Contact</div>
                  </a>
                @endif
              </div>
            </div>
          </div>
          <div id="w-node-_5d659f15-e3c7-4002-6060-ab8ec5eccede-cfa24d1c"
            class="w-layout-vflex fda-site-details fda-text-center"><a href="{{ route('home') }}"
              class="fda-footer-logo-box w-inline-block"><img
                src="{{ $fs->logo_url ?? asset('images/elegant_occasions_logo_white.png') }}" loading="lazy" width="200"
                style="height: auto; width:300px;" alt="Site logo white" /></a>
            <div class="fda-footer-site-paragraph">
              <p class="fda-gap-none fda-color-white">
                {{ $fs->about_text ?? 'Crafting unforgettable celebrations that tell your story, with artistry, precision, and heart.' }}
              </p>
            </div>
          </div>
          <div class="w-layout-vflex fda-footer-link-wrap-v2">
            <div class="w-layout-vflex fda-footer-menu-title">
              <div class="fda-text-style-h5 fda-color-peach">
                {{ $fs->contact_heading ?? $fs->services_heading ?? 'Get in touch' }}
              </div>
            </div>
            <div class="w-layout-hflex fda-footer-menu-wrap-v2">
              <div class="w-layout-vflex fda-footer-link-item">
                @if(!empty($fs->phone))
                  <div class="w-layout-hflex fda-footer-contact-link">
                    <div class="w-layout-hflex fda-footer-contact-icon"><img
                        src="{{ asset('images/6a6305bf5040b777232a181f_Call-logo.svg') }}" loading="lazy"
                        alt="Call-logo" /></div><a href="tel:{{ preg_replace('/[^0-9\+]/', '', $fs->phone) }}"
                      class="fda-footer-link w-inline-block">
                      <div class="fda-text-color-light-grey fda-footer-text-link">{{ $fs->phone }}</div>
                    </a>
                  </div>
                @endif
                @if(!empty($fs->email))
                  <div class="w-layout-hflex fda-footer-contact-link">
                    <div class="w-layout-hflex fda-footer-contact-icon"><img
                        src="{{ asset('images/6a6305bf5040b777232a181e_Location-logo.svg') }}" loading="lazy"
                        alt="Location-logo" /></div>
                    <div href="#" class="w-layout-hflex fda-footer-link">
                      <div class="fda-text-color-light-grey fda-footer-text-link">{{ $fs->email }}</div>
                    </div>
                  </div>
                @endif
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="w-layout-hflex fda-footer-bottom">
      <div class="w-layout-blockcontainer fda-container-medium w-container">
        <div class="w-layout-hflex fda-footer-bottom-inner">
          <div class="fda-color-white fda-mobile-text-center">{{ $fs->copyright_text ?? 'Designed by :' }} <a
              href="{{ $fs->copyright_link_url ?? 'https://www.flowdesignagency.com/' }}" target="_blank"
              class="fda-color-peach fda-hover">{{ $fs->copyright_link_text ?? 'Flow Design Agency' }}</a></div>
          <div class="w-layout-hflex fda-footer-bottom-right">
            @if(!empty($fs->style_guide_text))
              <a href="{{ url($fs->style_guide_url ?? '#') }}"
                class="fda-color-white fda-link-text-hover">{{ $fs->style_guide_text }}</a>
              <div class="fda-footer-bottom-line"></div>
            @endif
            @if(!empty($fs->licenses_text))
              <a href="{{ url($fs->licenses_url ?? '#') }}"
                class="fda-color-white fda-link-text-hover">{{ $fs->licenses_text }}</a>
              <div class="fda-footer-bottom-line"></div>
            @endif
            <a href="{{ url('#') }}" class="fda-color-white fda-link-text-hover">Changelog</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Floating Action Buttons -->
<div
  style="position: fixed; bottom: 30px; right: 30px; z-index: 9999; display: flex; gap: 15px; align-items: center; pointer-events: none;">

  <!-- WhatsApp Button -->
  <style>
    #whatsappBtn {
      background-color: #25d366;
      color: white;
      border: none;
      border-radius: 50%;
      width: 50px;
      height: 50px;
      cursor: pointer;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
      transition: all 0.3s ease;
      display: flex;
      align-items: center;
      justify-content: center;
      text-decoration: none;
      pointer-events: auto;
    }

    #whatsappBtn:hover {
      background-color: #0c2e2b;
      transform: translateY(-3px);
      box-shadow: 0 6px 16px rgba(0, 0, 0, 0.2);
    }
  </style>

  <button id="whatsappBtn" title="Chat on WhatsApp"
    onclick="document.getElementById('whatsappWidget').classList.toggle('show')">
    <svg width="28" height="28" viewBox="0 0 24 24" fill="currentColor">
      <path
        d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51a12.8 12.8 0 0 0-.57-.01c-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 0 1-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 0 1-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 0 1 2.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0 0 12.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 0 0 5.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 0 0-3.48-8.413Z" />
    </svg>
  </button>

  <!-- Scroll to Top Button -->
  <style>
    #scrollToTopBtn {
      background-color: #8f6e2c;
      /* Theme logo color */
      color: white;
      border: none;
      border-radius: 50%;
      width: 50px;
      height: 50px;
      cursor: pointer;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
      transition: all 0.3s ease;
      display: none;
      align-items: center;
      justify-content: center;
      pointer-events: auto;
    }

    #scrollToTopBtn.show {
      display: flex;
    }

    #scrollToTopBtn:hover {
      background-color: #0c2e2b;
      transform: translateY(-3px);
      box-shadow: 0 6px 16px rgba(0, 0, 0, 0.2);
    }
  </style>

  <button id="scrollToTopBtn" title="Go to top" onclick="window.scrollTo({top: 0, behavior: 'smooth'})">
    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
      stroke-linecap="round" stroke-linejoin="round">
      <path d="M18 15l-6-6-6 6" />
    </svg>
  </button>


<!-- WhatsApp Widget -->
<style>
  #whatsappWidget {
    position: fixed;
    bottom: 90px;
    right: 30px;
    z-index: 10000;
    width: 340px;
    background: #e5ddd5;
    border-radius: 12px;
    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
    overflow: hidden;
    opacity: 0;
    pointer-events: none;
    transform: translateY(20px);
    transition: all 0.3s ease;
    display: flex;
    flex-direction: column;
    font-family: 'Inter', sans-serif;
  }

  @media (max-width: 400px) {
    #whatsappWidget {
      right: 15px;
      bottom: 85px;
      width: calc(100% - 30px);
    }
  }

  #whatsappWidget.show {
    opacity: 1;
    pointer-events: auto;
    transform: translateY(0);
  }

  .wa-header {
    background: #075e54;
    color: white;
    padding: 16px;
    display: flex;
    align-items: center;
    gap: 12px;
  }

  .wa-header img {
    width: 48px;
    height: 48px;
    border-radius: 50%;
    object-fit: cover;
    background: white;
  }

  .wa-header-text h4 {
    margin: 0;
    font-size: 16px;
    color: white;
    font-weight: 600;
    line-height: 1.2;
  }

  .wa-header-text p {
    margin: 4px 0 0;
    font-size: 13px;
    color: rgba(255, 255, 255, 0.8);
  }

  .wa-close {
    margin-left: auto;
    cursor: pointer;
    background: none;
    border: none;
    color: white;
    padding: 5px;
  }

  .wa-body {
    padding: 20px;
    background-image: url('https://user-images.githubusercontent.com/15075759/28719144-86dc0f70-73b1-11e7-911d-60d70fcded21.png');
    min-height: 180px;
    display: flex;
    flex-direction: column;
    gap: 10px;
  }

  .wa-message {
    background: white;
    padding: 12px 14px;
    border-radius: 0 8px 8px 8px;
    font-size: 14px;
    color: #333;
    max-width: 85%;
    box-shadow: 0 1px 2px rgba(0, 0, 0, 0.1);
    position: relative;
    line-height: 1.4;
  }

  .wa-message::before {
    content: '';
    position: absolute;
    top: 0;
    left: -8px;
    width: 0;
    height: 0;
    border-top: 8px solid white;
    border-left: 8px solid transparent;
  }

  .wa-footer {
    padding: 16px;
    background: white;
  }

  .wa-btn {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
    background: #25d366;
    color: white;
    text-decoration: none;
    padding: 12px;
    border-radius: 24px;
    font-weight: 600;
    transition: background 0.2s;
    font-size: 15px;
  }

  .wa-btn:hover {
    background: #0c2e2b;
    color: white;
  }
</style>

<style>
  /* ========================================================
     Global Button Styling - Consistent Brand Theme
     Normal: #8f6e2c (Warm Gold) with Crisp White Text
     Hover:  #0c2e2b (Deep Forest Green / Teal) with White Text
     Matches the button followed on the service page (/service)
     ======================================================== */
  .fda-button-v1,
  .fda-button-v1:where(.w-variant-37e9e6b2-81fa-735b-b246-547b818c5d40),
  .fda-button-v1:where(.w-variant-2ee44d8a-cff8-2fcb-a55a-93f0ccd8b45b),
  .fda-button-v1:where(.w-variant-eab88934-0d4f-9e2a-45db-1b5f6e3bb731),
  .fda-button-v1:where(.w-variant-15a48d83-c7c5-7d54-88b9-d154266f84bb),
  .fda-button-v1:where(.w-variant-19292096-129d-eac0-5141-e12ec5469267),
  .fda-button-v1:where(.w-variant-a89219d8-6aa3-0062-dfb6-8cd5a113af8a),
  .fda-button-v1.balck,
  .fda-navbar-button .fda-button-v1 {
    background-color: #8f6e2c !important;
    border-color: #8f6e2c !important;
    color: #ffffff !important;
    transition: background-color 0.35s ease, border-color 0.35s ease, color 0.35s ease, transform 0.35s ease !important;
  }

  /* Default button overlay matches warm gold #8f6e2c so button is not prematurely dark */
  .fda-button-overlay,
  .fda-button-overlay:where(.w-variant-37e9e6b2-81fa-735b-b246-547b818c5d40),
  .fda-button-overlay:where(.w-variant-2ee44d8a-cff8-2fcb-a55a-93f0ccd8b45b),
  .fda-button-overlay.balck-5,
  .fda-navbar-button .fda-button-overlay {
    background-color: #8f6e2c !important;
    transition: background-color 0.35s ease !important;
  }

  /* Ensure text inside all buttons remains white */
  .fda-button-v1 .fda-button-text,
  .fda-button-text.fda-1,
  .fda-button-text.fda-2,
  .fda-button-text.fda-1:where(.w-variant-37e9e6b2-81fa-735b-b246-547b818c5d40),
  .fda-button-text.fda-1:where(.w-variant-2ee44d8a-cff8-2fcb-a55a-93f0ccd8b45b),
  .fda-button-text.fda-1:where(.w-variant-15a48d83-c7c5-7d54-88b9-d154266f84bb),
  .fda-button-text.fda-1:where(.w-variant-a89219d8-6aa3-0062-dfb6-8cd5a113af8a),
  .fda-button-text.fda-1.balck-3,
  .fda-navbar-button .fda-button-text {
    color: #ffffff !important;
  }

  /* Button hover background and border: #0c2e2b across all variants */
  .fda-button-v1:hover,
  .fda-button-v1:hover:where(.w-variant-37e9e6b2-81fa-735b-b246-547b818c5d40),
  .fda-button-v1:hover:where(.w-variant-2ee44d8a-cff8-2fcb-a55a-93f0ccd8b45b),
  .fda-button-v1:hover:where(.w-variant-eab88934-0d4f-9e2a-45db-1b5f6e3bb731),
  .fda-button-v1:hover:where(.w-variant-15a48d83-c7c5-7d54-88b9-d154266f84bb),
  .fda-button-v1:hover:where(.w-variant-19292096-129d-eac0-5141-e12ec5469267),
  .fda-button-v1:hover:where(.w-variant-a89219d8-6aa3-0062-dfb6-8cd5a113af8a),
  .fda-button-v1.balck:hover,
  .fda-navbar-button:hover .fda-button-v1,
  .fda-navbar-button:focus-within .fda-button-v1 {
    background-color: #0c2e2b !important;
    border-color: #0c2e2b !important;
    color: #ffffff !important;
  }

  /* Webflow button hover overlay: only on hover/active/focus */
  .fda-button-v1:hover .fda-button-overlay,
  .fda-button-v1:focus .fda-button-overlay,
  .fda-button-v1:active .fda-button-overlay,
  .fda-navbar-button:hover .fda-button-overlay,
  .fda-navbar-button:focus-within .fda-button-overlay,
  .fda-button-overlay:hover {
    background-color: #0c2e2b !important;
  }

  /* Button text on hover */
  .fda-button-v1:hover .fda-button-text,
  .fda-button-v1:hover .fda-button-text.fda-1,
  .fda-button-v1:hover .fda-button-text.fda-2,
  .fda-navbar-button:hover .fda-button-text,
  .fda-button-v1:where(.w-variant-2ee44d8a-cff8-2fcb-a55a-93f0ccd8b45b):hover .fda-button-text.fda-2 {
    color: #ffffff !important;
  }

  /* Custom Buttons (Portfolio, Lightboxes, Modals, etc.) */
  .btn-connect-lovio,
  #modal-full-link {
    background: #8f6e2c !important;
    color: #ffffff !important;
    border-color: #8f6e2c !important;
  }
  .btn-connect-lovio:hover,
  .btn-connect-lovio:focus,
  .btn-connect-lovio:active,
  #modal-full-link:hover,
  #modal-full-link:focus,
  #modal-full-link:active {
    background: #0c2e2b !important;
    border-color: #0c2e2b !important;
    color: #ffffff !important;
  }

  .btn-explore-entire {
    background: #8f6e2c !important;
    color: #ffffff !important;
  }
  .btn-explore-entire:hover {
    background: #0c2e2b !important;
    color: #ffffff !important;
  }

  #home-modal-link {
    background: #8f6e2c !important;
    border-color: #8f6e2c !important;
    color: #ffffff !important;
  }
  #home-modal-link:hover,
  #home-modal-link:focus,
  #home-modal-link:active {
    background: #0c2e2b !important;
    border-color: #0c2e2b !important;
    color: #ffffff !important;
  }

  /* Quick View / Preview Buttons */
  .btn-quick-preview,
  .home-btn-quick-preview {
    background: #8f6e2c !important;
    border: 1px solid #8f6e2c !important;
    color: #ffffff !important;
    transition: all 0.3s ease !important;
  }
  .btn-quick-preview:hover,
  .btn-quick-preview:focus,
  .btn-quick-preview:active,
  .home-btn-quick-preview:hover,
  .home-btn-quick-preview:focus,
  .home-btn-quick-preview:active {
    background: #0c2e2b !important;
    border-color: #0c2e2b !important;
    color: #ffffff !important;
    box-shadow: 0 4px 14px rgba(12, 46, 43, 0.35) !important;
  }

  /* Blog post card button arrow */
  .fda-post-item:hover .fda-post-button,
  .fda-post-button:hover {
    background-color: #0c2e2b !important;
    border-color: #0c2e2b !important;
  }
</style>

<div id="whatsappWidget">
  <div class="wa-header">
    <img src="{{ asset('images/elegant_occasions_logo.png') }}" alt="Elegant Occasions" style="padding: 5px;">
    <div class="wa-header-text">
      <h4>Elegant Occasions</h4>
      <p>Typically replies within a day</p>
    </div>
    <button class="wa-close" onclick="document.getElementById('whatsappWidget').classList.remove('show')">
      <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
        <path d="M18 6L6 18M6 6l12 12"></path>
      </svg>
    </button>
  </div>
  <div class="wa-body">
    <div class="wa-message">Hi there 👋</div>
    <div class="wa-message">How can we help you plan your dream event today?</div>
  </div>
  <div class="wa-footer">
    <a class="wa-btn" href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $fs->phone ?? '') }}" target="_blank"
      onclick="document.getElementById('whatsappWidget').classList.remove('show')">
      <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
        <path
          d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51a12.8 12.8 0 0 0-.57-.01c-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 0 1-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 0 1-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 0 1 2.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0 0 12.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 0 0 5.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 0 0-3.48-8.413Z" />
      </svg>
      Chat on WhatsApp
    </a>
  </div>
</div>

<script>
  function handleScrollCheck() {
    var scrollBtn = document.getElementById("scrollToTopBtn");
    if (!scrollBtn) return;

    // Check various possible scrolling containers (window, document, or custom wrappers like Webflow)
    var scrollPos = window.scrollY || window.pageYOffset || document.documentElement.scrollTop || document.body.scrollTop;

    // Check if the scroll position is actually from a specific wrapper (often happens in templates)
    var wfWrapper = document.querySelector('.page-wrapper') || document.querySelector('.w-page-wrapper') || document.querySelector('.fda-page-wrapper');
    if (wfWrapper && wfWrapper.scrollTop > 0) {
      scrollPos = Math.max(scrollPos, wfWrapper.scrollTop);
    }

    if (scrollPos > 100) {
      scrollBtn.classList.add("show");
    } else {
      scrollBtn.classList.remove("show");
    }
  }

  // Bind to window and document
  window.addEventListener('scroll', handleScrollCheck, { passive: true });
  document.addEventListener('scroll', handleScrollCheck, { passive: true });

  // Try to bind to Webflow specific wrappers if they exist
  window.addEventListener('DOMContentLoaded', function () {
    const wfWrapper = document.querySelector('.page-wrapper') || document.querySelector('.w-page-wrapper') || document.querySelector('.fda-page-wrapper');
    if (wfWrapper) {
      wfWrapper.addEventListener('scroll', handleScrollCheck, { passive: true });
    }
    // Check immediately in case page is already scrolled
    handleScrollCheck();
  });
</script>