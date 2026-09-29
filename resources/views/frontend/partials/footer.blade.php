@php
  $fs = $footerSetting ?? \App\Models\FooterSetting::getSettings();
@endphp
<section class="fda-footer fda-overflow-hidden">
  <div class="fda-footer-block">
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
                      <div class="fda-footer-underline"></div>
                    </a>
                  @endforeach
                @else
                  <a href="{{ route('home') }}" class="fda-footer-link w-inline-block">
                    <div class="fda-text-color-light-grey fda-footer-text-link">Home</div>
                    <div class="fda-footer-underline"></div>
                  </a>
                  <a href="{{ route('about') }}" class="fda-footer-link w-inline-block">
                    <div class="fda-text-color-light-grey fda-footer-text-link">About</div>
                    <div class="fda-footer-underline"></div>
                  </a>
                  <a href="{{ route('service-three') }}" class="fda-footer-link w-inline-block">
                    <div class="fda-text-color-light-grey fda-footer-text-link">Service</div>
                    <div class="fda-footer-underline"></div>
                  </a>
                  <a href="{{ route('event') }}" class="fda-footer-link w-inline-block">
                    <div class="fda-text-color-light-grey fda-footer-text-link">Events</div>
                    <div class="fda-footer-underline"></div>
                  </a>
                  <a href="{{ route('portfolio') }}" class="fda-footer-link w-inline-block">
                    <div class="fda-text-color-light-grey fda-footer-text-link">Portfolio</div>
                    <div class="fda-footer-underline"></div>
                  </a>
                  <a href="{{ route('blog') }}" class="fda-footer-link w-inline-block">
                    <div class="fda-text-color-light-grey fda-footer-text-link">Blog</div>
                    <div class="fda-footer-underline"></div>
                  </a>
                  <a href="{{ route('contact') }}" class="fda-footer-link w-inline-block">
                    <div class="fda-text-color-light-grey fda-footer-text-link">Contact</div>
                    <div class="fda-footer-underline"></div>
                  </a>
                @endif
              </div>
            </div>
          </div>
          <div id="w-node-_5d659f15-e3c7-4002-6060-ab8ec5eccede-cfa24d1c"
            class="w-layout-vflex fda-site-details fda-text-center"><a href="{{ route('home') }}"
              class="fda-footer-logo-box w-inline-block"><img
                src="{{ $fs->logo_url ?? asset('images/elegant_occasions_logo_white.png') }}" loading="lazy" width="200" style="height: auto;"
                alt="Site logo white" /></a>
            <div class="fda-footer-site-paragraph">
              <p class="fda-gap-none fda-color-white">{{ $fs->about_text ?? 'Crafting unforgettable celebrations that tell your story, with artistry, precision, and heart.' }}</p>
            </div>
          </div>
          <div class="w-layout-vflex fda-footer-link-wrap-v2">
            <div class="w-layout-vflex fda-footer-menu-title">
              <div class="fda-text-style-h5 fda-color-peach">{{ $fs->contact_heading ?? $fs->services_heading ?? 'Get in touch' }}</div>
            </div>
            <div class="w-layout-hflex fda-footer-menu-wrap-v2">
              <div class="w-layout-vflex fda-footer-link-item">
                @if(!empty($fs->phone))
                <div class="w-layout-hflex fda-footer-contact-link">
                  <div class="w-layout-hflex fda-footer-contact-icon"><img
                      src="{{ asset('images/6a6305bf5040b777232a181f_Call-logo.svg') }}" loading="lazy"
                      alt="Call-logo" /></div><a href="tel:{{ preg_replace('/[^0-9\+]/', '', $fs->phone) }}" class="fda-footer-link w-inline-block">
                    <div class="fda-text-color-light-grey fda-footer-text-link">{{ $fs->phone }}</div>
                    <div class="fda-footer-underline"></div>
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
          <div class="fda-color-white fda-mobile-text-center">{{ $fs->copyright_text ?? 'Designed by :' }} <a href="{{ $fs->copyright_link_url ?? 'https://www.flowdesignagency.com/' }}"
              target="_blank" class="fda-color-peach fda-hover">{{ $fs->copyright_link_text ?? 'Flow Design Agency' }}</a>, Powered by : <a href="https://webflow.com/" target="_blank"
              class="fda-color-peach fda-hover">Webflow</a></div>
          <div class="w-layout-hflex fda-footer-bottom-right">
            @if(!empty($fs->style_guide_text))
            <a href="{{ url($fs->style_guide_url ?? '#') }}" class="fda-color-white fda-link-text-hover">{{ $fs->style_guide_text }}</a>
            <div class="fda-footer-bottom-line"></div>
            @endif
            @if(!empty($fs->licenses_text))
            <a href="{{ url($fs->licenses_url ?? '#') }}" class="fda-color-white fda-link-text-hover">{{ $fs->licenses_text }}</a>
            <div class="fda-footer-bottom-line"></div>
            @endif
            <a href="{{ url('#') }}" class="fda-color-white fda-link-text-hover">Changelog</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>