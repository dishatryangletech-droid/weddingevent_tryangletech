<aside class="admin-sidebar">
  <div class="sidebar-header">
    <a href="{{ route('admin.dashboard') }}" class="sidebar-brand" style="width: 100%; display: block; text-align: center;">
      <img src="{{ asset('images/elegant_occasions_logo.png') }}" alt="Elegant Occasions" style="    height: 110px;
    width: 165px; object-fit: contain;">
      <span class="brand-badge" style="display: none;">Admin</span>
    </a>
  </div>

  <nav class="sidebar-nav">
    <div class="nav-section-title">Navigation</div>

    <!-- 1. Dashboard -->
    <a href="{{ route('admin.dashboard') }}" class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
      <span class="nav-icon">
        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
          <rect x="3" y="3" width="7" height="7"></rect>
          <rect x="14" y="3" width="7" height="7"></rect>
          <rect x="14" y="14" width="7" height="7"></rect>
          <rect x="3" y="14" width="7" height="7"></rect>
        </svg>
      </span>
      <span>Dashboard</span>
    </a>

    <!-- 2. Home Page -->
    <div class="nav-item {{ request()->routeIs('admin.home.*') ? 'open' : '' }}">
      <div class="nav-link nav-dropdown-toggle {{ request()->routeIs('admin.home.*') ? 'active' : '' }}">
        <span class="nav-icon">
          <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
            <polyline points="9 22 9 12 15 12 15 22"></polyline>
          </svg>
        </span>
        <span>Home Page</span>
        <span class="dropdown-arrow">
          <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <polyline points="6 9 12 15 18 9"></polyline>
          </svg>
        </span>
      </div>
      <div class="sidebar-dropdown">
        <a href="{{ route('admin.home.banner.index') }}" class="sub-link {{ request()->routeIs('admin.home.banner.*') ? 'active' : '' }}">
          Banner
        </a>
        <a href="{{ route('admin.home.about.index') }}" class="sub-link {{ request()->routeIs('admin.home.about.*') ? 'active' : '' }}">
          About Section
        </a>
        <a href="{{ route('admin.home.promise.index') }}" class="sub-link {{ request()->routeIs('admin.home.promise.*') ? 'active' : '' }}">
          Promise Section
        </a>
        <a href="{{ route('admin.home.core_promise.index') }}" class="sub-link {{ request()->routeIs('admin.home.core_promise.*') ? 'active' : '' }}">
          Core Promise
        </a>
        <a href="{{ route('admin.home.services.index') }}" class="sub-link {{ request()->routeIs('admin.home.services.*') ? 'active' : '' }}">
          Services Section
        </a>
        <a href="{{ route('admin.home.philosophy.index') }}" class="sub-link {{ request()->routeIs('admin.home.philosophy.*') ? 'active' : '' }}">
          Philosophy Section
        </a>
        <a href="{{ route('admin.home.portfolio.index') }}" class="sub-link {{ request()->routeIs('admin.home.portfolio.*') ? 'active' : '' }}">
          Portfolio Section
        </a>
        <a href="{{ route('admin.home.recognitions.index') }}" class="sub-link {{ request()->routeIs('admin.home.recognitions.*') ? 'active' : '' }}">
          Recognitions Section
        </a>
      </div>
    </div>

    <!-- 3. About Us Page -->
    <div class="nav-item {{ request()->routeIs('admin.about.*') ? 'open' : '' }}">
      <div class="nav-link nav-dropdown-toggle {{ request()->routeIs('admin.about.*') ? 'active' : '' }}">
        <span class="nav-icon">
          <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
            <polyline points="14 2 14 8 20 8"></polyline>
            <line x1="16" y1="13" x2="8" y2="13"></line>
            <line x1="16" y1="17" x2="8" y2="17"></line>
            <polyline points="10 9 9 9 8 9"></polyline>
          </svg>
        </span>
        <span>About Us Page</span>
        <span class="dropdown-arrow">
          <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <polyline points="6 9 12 15 18 9"></polyline>
          </svg>
        </span>
      </div>
      <div class="sidebar-dropdown">
        <a href="{{ route('admin.about.banner.index') }}" class="sub-link {{ request()->routeIs('admin.about.banner.*') ? 'active' : '' }}">
          Banner Section
        </a>
        <a href="{{ route('admin.about.story.index') }}" class="sub-link {{ request()->routeIs('admin.about.story.*') ? 'active' : '' }}">
          Story Section
        </a>
        <a href="{{ route('admin.about.mission.index') }}" class="sub-link {{ request()->routeIs('admin.about.mission.*') ? 'active' : '' }}">
          Mission Section
        </a>
        <a href="{{ route('admin.about.team.index') }}" class="sub-link {{ request()->routeIs('admin.about.team.*') ? 'active' : '' }}">
          Team Members
        </a>
        <a href="{{ route('admin.about.stats.index') }}" class="sub-link {{ request()->routeIs('admin.about.stats.*') ? 'active' : '' }}">
          Statistics Section
        </a>
        <a href="{{ route('admin.about.expertise.index') }}" class="sub-link {{ request()->routeIs('admin.about.expertise.*') ? 'active' : '' }}">
          Expertise Section
        </a>
      </div>
    </div>

    <!-- Service Page -->
    <div class="nav-item {{ request()->routeIs('admin.service-page.*') ? 'open' : '' }}">
      <div class="nav-link nav-dropdown-toggle {{ request()->routeIs('admin.service-page.*') ? 'active' : '' }}">
        <span class="nav-icon">
          <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path>
            <polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline>
            <line x1="12" y1="22.08" x2="12" y2="12"></line>
          </svg>
        </span>
        <span>Service Page</span>
        <span class="dropdown-arrow">
          <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <polyline points="6 9 12 15 18 9"></polyline>
          </svg>
        </span>
      </div>
      <div class="sidebar-dropdown">
        <a href="{{ route('admin.service-page.banner.index') }}" class="sub-link {{ request()->routeIs('admin.service-page.banner.*') ? 'active' : '' }}">
          Banner Section
        </a>
        <a href="{{ route('admin.service-page.expertise.index') }}" class="sub-link {{ request()->routeIs('admin.service-page.expertise.*') ? 'active' : '' }}">
          About Us Section
        </a>
        <a href="{{ route('admin.service-page.offers.index') }}" class="sub-link {{ request()->routeIs('admin.service-page.offers.*') ? 'active' : '' }}">
          Offers Section
        </a>
        <a href="{{ route('admin.service-page.process.index') }}" class="sub-link {{ request()->routeIs('admin.service-page.process.*') ? 'active' : '' }}">
          Process Section
        </a>
        <a href="{{ route('admin.service-page.faqs.index') }}" class="sub-link {{ request()->routeIs('admin.service-page.faqs.*') ? 'active' : '' }}">
          FAQ Section
        </a>
      </div>
    </div>

    <!-- Event Page -->
    <div class="nav-item {{ request()->routeIs('admin.event-page.*') ? 'open' : '' }}">
      <div class="nav-link nav-dropdown-toggle {{ request()->routeIs('admin.event-page.*') ? 'active' : '' }}">
        <span class="nav-icon">
          <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
            <line x1="16" y1="2" x2="16" y2="6"></line>
            <line x1="8" y1="2" x2="8" y2="6"></line>
            <line x1="3" y1="10" x2="21" y2="10"></line>
          </svg>
        </span>
        <span>Events Page</span>
        <span class="dropdown-arrow">
          <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <polyline points="6 9 12 15 18 9"></polyline>
          </svg>
        </span>
      </div>
      <div class="sidebar-dropdown">
        <a href="{{ route('admin.event-page.banner.index') }}" class="sub-link {{ request()->routeIs('admin.event-page.banner.*') ? 'active' : '' }}">
          Banner Section
        </a>
        <a href="{{ route('admin.event-page.items.index') }}" class="sub-link {{ request()->routeIs('admin.event-page.items.*') ? 'active' : '' }}">
          Events List
        </a>
      </div>
    </div>

    <!-- Portfolio Page -->
    <div class="nav-item {{ request()->routeIs('admin.portfolio-page.*') ? 'open' : '' }}">
      <div class="nav-link nav-dropdown-toggle {{ request()->routeIs('admin.portfolio-page.*') ? 'active' : '' }}">
        <span class="nav-icon">
          <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <rect x="3" y="3" width="7" height="5"></rect>
            <rect x="14" y="3" width="7" height="5"></rect>
            <rect x="3" y="12" width="7" height="9"></rect>
            <rect x="14" y="12" width="7" height="9"></rect>
          </svg>
        </span>
        <span>Portfolio Page</span>
        <span class="dropdown-arrow">
          <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <polyline points="6 9 12 15 18 9"></polyline>
          </svg>
        </span>
      </div>
      <div class="sidebar-dropdown">
        <a href="{{ route('admin.portfolio-page.banner.index') }}" class="sub-link {{ request()->routeIs('admin.portfolio-page.banner.*') ? 'active' : '' }}">
          Banner & Tags
        </a>
        <a href="{{ route('admin.portfolio-page.items.index') }}" class="sub-link {{ request()->routeIs('admin.portfolio-page.items.*') ? 'active' : '' }}">
          Portfolio Items
        </a>
      </div>
    </div>

    <!-- Blog Page -->
    <div class="nav-item {{ request()->routeIs('admin.blog-page.*') ? 'open' : '' }}">
      <div class="nav-link nav-dropdown-toggle {{ request()->routeIs('admin.blog-page.*') ? 'active' : '' }}">
        <span class="nav-icon">
          <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"></path>
            <path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"></path>
          </svg>
        </span>
        <span>Blog Page</span>
        <span class="dropdown-arrow">
          <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <polyline points="6 9 12 15 18 9"></polyline>
          </svg>
        </span>
      </div>
      <div class="sidebar-dropdown">
        <a href="{{ route('admin.blog-page.banner.index') }}" class="sub-link {{ request()->routeIs('admin.blog-page.banner.*') ? 'active' : '' }}">
          Banner Section
        </a>
        <a href="{{ route('admin.blog-page.items.index') }}" class="sub-link {{ request()->routeIs('admin.blog-page.items.*') ? 'active' : '' }}">
          Blog Items
        </a>
      </div>
    </div>

    <!-- 4. Contact Us Page -->
    <div class="nav-item {{ request()->routeIs('admin.contact.*') ? 'open' : '' }}">
      <div class="nav-link nav-dropdown-toggle {{ request()->routeIs('admin.contact.*') ? 'active' : '' }}">
        <span class="nav-icon">
          <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path>
          </svg>
        </span>
        <span>Contact Us Page</span>
        <span class="dropdown-arrow">
          <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <polyline points="6 9 12 15 18 9"></polyline>
          </svg>
        </span>
      </div>
      <div class="sidebar-dropdown">
        <a href="{{ route('admin.contact.header.index') }}" class="sub-link {{ request()->routeIs('admin.contact.header.*') || request()->routeIs('admin.contact.card.*') ? 'active' : '' }}">
          Header & Contact Details
        </a>
        <a href="{{ route('admin.contact.form.index') }}" class="sub-link {{ request()->routeIs('admin.contact.form.*') ? 'active' : '' }}">
          Form Section
        </a>
        <a href="{{ route('admin.contact.faq.index') }}" class="sub-link {{ request()->routeIs('admin.contact.faq.*') ? 'active' : '' }}">
          FAQ Section
        </a>
      </div>
    </div>

      <div class="nav-item">
        <a href="{{ route('admin.testimonials.index') }}" class="nav-link {{ request()->routeIs('admin.testimonials.*') ? 'active' : '' }}">
          <span class="nav-icon">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"></path>
            </svg>
          </span>
          <span class="nav-text">Testimonials</span>
        </a>
      </div>

    <!-- 5. General Settings -->
    <a href="{{ route('admin.footer.index') }}" class="nav-link {{ request()->routeIs('admin.footer.*') ? 'active' : '' }}">
      <span class="nav-icon">
        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
          <circle cx="12" cy="12" r="3"></circle>
          <path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"></path>
        </svg>
      </span>
      <span>General Settings</span>
    </a>
    <div class="nav-item">
      <a href="{{ route('admin.contact-enquiries.index') }}" class="nav-link {{ request()->routeIs('admin.contact-enquiries.*') ? 'active' : '' }}">
        <span class="nav-icon">
          <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
            <polyline points="22,6 12,13 2,6"></polyline>
          </svg>
        </span>
        <span class="nav-text">Contact Enquiries</span>
      </a>
    </div>

    <div class="nav-item">
      <a href="{{ route('admin.quotes.index') }}" class="nav-link {{ request()->routeIs('admin.quotes.*') ? 'active' : '' }}">
        <span class="nav-icon">
          <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path>
          </svg>
        </span>
        <span class="nav-text">Quote Requests</span>
      </a>
    </div>

  </nav>

  <div class="sidebar-footer">
    <form action="{{ route('admin.logout') }}" method="POST">
      @csrf
      <button type="submit" class="btn btn-secondary btn-sm" style="width: 100%; justify-content: center; gap: 0.5rem;">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
          <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
          <polyline points="16 17 21 12 16 7"></polyline>
          <line x1="21" y1="12" x2="9" y2="12"></line>
        </svg>
        <span>Logout</span>
      </button>
    </form>
  </div>
</aside>
