@php
  $navServices = \App\Models\ServiceOfferItem::where('status', 'active')->get();
@endphp
<style>
  .fda-menu-font-v1 {
    font-size: 17px !important;
    font-weight: 700 !important;
  }
</style>
<div data-wf--fda-navbar--variant="normal" class="fda-navbar-main w-variant-7b561c28-18c3-ecdb-7aaa-a21923b0fa6e">
  </div>
  </div>
  <div data-animation="default" data-collapse="medium" data-duration="400" data-easing="ease" data-easing2="ease"
    role="banner" class="fda-navbar w-nav">
    <div class="w-layout-blockcontainer fda-container-medium w-container">
      <div class="fda-navbar-wrapper"><a href="{{ route('home') }}" class="fda-navbar-logo-v1 w-nav-brand" style="max-width: 220px;"><img
            width="220" style="height: 110px;width: 165px;filter: brightness(0.4) contrast(1.2);" alt="Site-logo"
            src="{{ asset('images/elegant_occasions_logo.png') }}" /></a>
        <nav role="navigation" class="fda-navbar-menu-holder w-nav-menu">
          <div class="w-layout-hflex fda-navbar-v1-menu-holder-inner">
            <div class="w-layout-hflex fda-navbar-inner-wrap">
              <div class="w-layout-hflex fda-navbar-dropdown-toggle">
                <div nav-menu-hover="" class="w-layout-vflex"><a href="{{ route('home') }}" class="fda-menu-font-v1 {{ request()->routeIs('home') ? 'w--current' : '' }}">Home</a>
                  <div class="fda-nav-menu-line"></div>
                </div>
              </div>
              <div class="w-layout-hflex fda-navbar-dropdown-toggle">
                <div nav-menu-hover="" class="w-layout-vflex"><a href="{{ route('about') }}" class="fda-menu-font-v1 {{ request()->routeIs('about') ? 'w--current' : '' }}">About</a>
                  <div class="fda-nav-menu-line"></div>
                </div>
              </div>
              <div class="w-layout-hflex fda-navbar-dropdown-toggle">
                <div nav-menu-hover="" class="w-layout-vflex"><a href="{{ route('service-three') }}" class="fda-menu-font-v1 {{ request()->is('*service*') ? 'w--current' : '' }}">Services</a>
                  <div class="fda-nav-menu-line"></div>
                </div>
              </div>
              <div class="w-layout-hflex fda-navbar-dropdown-toggle">
                <div nav-menu-hover="" class="w-layout-vflex"><a href="{{ route('event') }}" class="fda-menu-font-v1 {{ request()->is('*event*') ? 'w--current' : '' }}">Events</a>
                  <div class="fda-nav-menu-line"></div>
                </div>
              </div>
              <div class="w-layout-hflex fda-navbar-dropdown-toggle">
                <div nav-menu-hover="" class="w-layout-vflex"><a href="{{ route('portfolio') }}" class="fda-menu-font-v1 {{ request()->is('*portfolio*') ? 'w--current' : '' }}">Portfolio</a>
                  <div class="fda-nav-menu-line"></div>
                </div>
              </div>
              <div class="w-layout-hflex fda-navbar-dropdown-toggle">
                <div nav-menu-hover="" class="w-layout-vflex"><a href="{{ route('blog') }}" class="fda-menu-font-v1 {{ request()->is('*blog*') ? 'w--current' : '' }}">Blog</a>
                  <div class="fda-nav-menu-line"></div>
                </div>
              </div>
              <div class="w-layout-hflex fda-navbar-dropdown-toggle">
                <div nav-menu-hover="" class="w-layout-vflex"><a href="{{ route('contact') }}" class="fda-menu-font-v1 {{ request()->routeIs('contact') ? 'w--current' : '' }}">Contact</a>
                  <div class="fda-nav-menu-line"></div>
                </div>
              </div>
            </div>
            <div class="w-layout-hflex fda-navbar-inner-wrap-v2">
              <div class="w-layout-hflex fda-navbar-dropdown-toggle">
                <div nav-menu-hover="" class="w-layout-vflex"><a href="{{ route('home') }}" class="fda-menu-font-v1 {{ request()->routeIs('home') ? 'w--current' : '' }}">Home</a>
                  <div class="fda-nav-menu-line"></div>
                </div>
              </div>
              <div class="w-layout-hflex fda-navbar-dropdown-toggle">
                <div nav-menu-hover="" class="w-layout-vflex"><a href="{{ route('about') }}" class="fda-menu-font-v1 {{ request()->routeIs('about') ? 'w--current' : '' }}">About</a>
                  <div class="fda-nav-menu-line"></div>
                </div>
              </div>
              <div class="w-layout-hflex fda-navbar-dropdown-toggle">
                <div nav-menu-hover="" class="w-layout-vflex"><a href="{{ route('service-three') }}" class="fda-menu-font-v1 {{ request()->is('*service*') ? 'w--current' : '' }}">Services</a>
                  <div class="fda-nav-menu-line"></div>
                </div>
              </div>
              <div class="w-layout-hflex fda-navbar-dropdown-toggle">
                <div nav-menu-hover="" class="w-layout-vflex"><a href="{{ route('event') }}" class="fda-menu-font-v1 {{ request()->is('*event*') ? 'w--current' : '' }}">Events</a>
                  <div class="fda-nav-menu-line"></div>
                </div>
              </div>
              <div class="w-layout-hflex fda-navbar-dropdown-toggle">
                <div nav-menu-hover="" class="w-layout-vflex"><a href="{{ route('portfolio') }}" class="fda-menu-font-v1 {{ request()->is('*portfolio*') ? 'w--current' : '' }}">Portfolio</a>
                  <div class="fda-nav-menu-line"></div>
                </div>
              </div>
              <div class="w-layout-hflex fda-navbar-dropdown-toggle">
                <div nav-menu-hover="" class="w-layout-vflex"><a href="{{ route('blog') }}" class="fda-menu-font-v1 {{ request()->is('*blog*') ? 'w--current' : '' }}">Blog</a>
                  <div class="fda-nav-menu-line"></div>
                </div>
              </div>
              <div class="w-layout-hflex fda-navbar-dropdown-toggle">
                <div nav-menu-hover="" class="w-layout-vflex"><a href="{{ route('contact') }}" class="fda-menu-font-v1 {{ request()->routeIs('contact') ? 'w--current' : '' }}">Contact</a>
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
        <div class="fda-menu-button">
          <div data-w-id="820364d7-294d-69f1-f70c-02c9ac828211" class="fda-menu-button-main w-nav-button">
            <div class="fda-menu-line fda-top-line"></div>
            <div class="fda-menu-line fda-middle-line"></div>
            <div class="fda-menu-line fda-bottom-line"></div>
          </div>
        </div>
        <div form-open-button="" submit-button="v1" class="fda-navbar-button">
          <div class="fda-event-none"><a data-wf--fda-button-v1--variant="rose-background" href="#"
              class="fda-button-v1 w-variant-15a48d83-c7c5-7d54-88b9-d154266f84bb w-inline-block">
              <div class="fda-button-overlay"></div>
              <div class="w-layout-hflex fda-button-text-wrapper-v1 fda-overflow-hidden">
                <div class="fda-button-text fda-1 w-variant-15a48d83-c7c5-7d54-88b9-d154266f84bb">Request a quote</div>
                <div class="fda-button-text fda-2">Request a quote</div>
              </div>
            </a></div>
        </div>
      </div>
    </div>
  </div>
  <div booking-form="1" class="w-layout-hflex fda-booking-form-box">
    <div class="w-layout-hflex fda-booking-form-lapping">
      <div class="w-layout-vflex fda-bookng-form">
        <div class="w-layout-vflex fda-booking-form-inner-box">
          <div from-close="1" class="w-layout-hflex fda-booking-cross-sign"><img
              src="{{ asset('images/6a6305bf5040b777232a1734_Cross.svg') }}" loading="lazy" alt="Cross" /></div>
          <div class="w-layout-vflex fda-booking-top-box fda-text-center">
            <div class="w-layout-hflex fda-booking-logo" style="max-width: 220px; margin: 0 auto;"><img
                src="{{ asset('images/elegant_occasions_logo.png') }}" loading="lazy" width="220"
                style="height: auto; filter: brightness(0.4) contrast(1.2);" alt="Site-logo" /></div>
            <div class="fda-color-dark-brown">You'll received a confirmation within 24h</div>
          </div>
          <div id="Booking-Form-V2" class="fda-booking-form-block w-form">
            <form id="wf-form-Booking-Form-V2-2" action="{{ route('quotes.store') }}" name="wf-form-Booking-Form-V2-2" data-name="Booking Form V2"
              method="post" class="fda-booking-form" data-wf-page-id="6a6305be5040b777232a140e"
              data-wf-element-id="888f69a4-80d0-22f2-c1d4-db6374c3c354"
              data-turnstile-sitekey="0x4AAAAAAAQTptj2So4dx43e">
              @csrf
              <div class="w-layout-hflex fda-form-field-wrap-v3">
                <div class="w-layout-vflex fda-form-field"><label for="Name-V3" id="name-text-v6" aria-label=""
                    class="fda-form-v6-label">Name*</label><input class="fda-text-field w-input" maxlength="256"
                    name="name" data-name="name" aria-label="" placeholder="Your name" type="text" id="Name-V3"
                    required="" /></div>
                <div class="w-layout-vflex fda-form-field"><label for="Email-V3" id="email-text-v6" aria-label=""
                    class="fda-form-v6-label">Email*</label><input class="fda-text-field w-input" maxlength="256"
                    name="email" data-name="email" placeholder="Email address" type="email" id="Email-V3"
                    required="" /></div>
              </div>
              <div class="w-layout-hflex fda-form-field-wrap-v3">
                <div class="w-layout-vflex fda-form-field"><label for="Guest-V3" id="guest-text-v6" aria-label=""
                    class="fda-form-v6-label">Number of guests*</label><select id="Guest-V3" name="guests"
                    data-name="guests" required="" class="fda-select-field-v2 w-select">
                    <option value="">Total guests</option>
                    <option value="First">1 to 10 guests</option>
                    <option value="Second">20 to 50 guests</option>
                    <option value="Third">50 to 80 guests</option>
                    <option value="Another option">100+ guests</option>
                  </select></div>
                <div class="w-layout-vflex fda-form-field"><label for="MobileNo-V3" id="mobile-text-v6"
                    aria-label="" class="fda-form-v6-label">Mobile No.*</label><input class="fda-text-field w-input" maxlength="10" minlength="10" pattern="\d{10}" title="Please enter exactly 10 digits" name="mobileno" data-name="mobileno" placeholder="10-digit Mobile No." type="tel" id="MobileNo-V3" required="" oninput="this.value = this.value.replace(/[^0-9]/g, '');" /></div>
              </div>
              <!-- <div class="w-layout-vflex fda-form-field"><label for="Select-Venue-V3" id="rental-text-v6" aria-label=""
                  class="fda-form-v6-label">Venue*</label><select id="Select-Venue-V3" name="venue" data-name="Select-Venue-V3" required="" class="fda-select-field-v2 w-select"><option value="">Select venue</option>@foreach(\App\Models\PortfolioMaster::all() as $portfolio)<option value="{{ $portfolio->title }}">{{ $portfolio->title }}</option>@endforeach</select></div> -->
              <div class="w-layout-vflex fda-form-field"><label for="boat-select-v6" id="booking-text-v6" aria-label=""
                  class="fda-form-v6-label">Event date*</label><input type="date" name="event_date" required="" aria-label="date"
                  class="fda-select-field-v2" /></div>
              <div class="w-layout-vflex fda-form-field fda-last"><label for="Message-V3" id="message-text-v6"
                  aria-label="" class="fda-form-v6-label">Special message</label><textarea class="fda-text-area w-input"
                  maxlength="5000" name="message" data-name="message" aria-label="" placeholder="Message"
                  id="Message-V3"></textarea></div>
              <div submit-button="v1" aria-label="" class="w-layout-vflex fda-submit-button-wrapper"><a
                  data-wf--fda-button-v1--variant="black" href="#"
                  class="fda-button-v1 w-variant-37e9e6b2-81fa-735b-b246-547b818c5d40 w-inline-block">
                  <div class="fda-button-overlay w-variant-37e9e6b2-81fa-735b-b246-547b818c5d40"></div>
                  <div class="w-layout-hflex fda-button-text-wrapper-v1 fda-overflow-hidden">
                    <div class="fda-button-text w-variant-37e9e6b2-81fa-735b-b246-547b818c5d40 fda-1">Confirm booking
                    </div>
                    <div class="fda-button-text w-variant-37e9e6b2-81fa-735b-b246-547b818c5d40 fda-2">Confirm booking
                    </div>
                  </div>
                </a><input type="submit" data-wait="Please wait..." aria-label="submit"
                  class="fda-submit-button w-button" value="Submit" /></div>
            </form>
            <div class="fda-succes w-form-done">
              <div>Thank you! Your submission has been received!</div>
            </div>
            <div class="fda-error w-form-fail">
              <div>Oops! Something went wrong while submitting the form.</div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>




