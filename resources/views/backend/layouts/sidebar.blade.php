<aside class="admin-sidebar">
  <div class="sidebar-header">
    <a href="{{ route('admin.dashboard') }}" class="sidebar-brand" style="width: 100%; display: block; text-align: center;">
      <img src="{{ asset('images/elegant_occasions_logo.png') }}" alt="Elegant Occasions" style="height: auto; width: 100%; max-width: 200px; object-fit: contain;">
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
