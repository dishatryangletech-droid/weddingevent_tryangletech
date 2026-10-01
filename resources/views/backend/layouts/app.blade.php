<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>@yield('title', 'Admin Dashboard') | Elegant Occasions Admin</title>
  
  <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('images/favicon.png') }}" />
  
  <!-- Backend Admin Styles -->
  <link rel="stylesheet" href="{{ asset('backend/css/admin.css') }}?v={{ time() }}" />
  
  @stack('styles')
</head>
<body>
  <div class="admin-wrapper">
    <!-- Sidebar -->
    @include('backend.layouts.sidebar')

    <!-- Main Content -->
    <div class="admin-main">
      <!-- Top Header -->
      <header class="admin-header">
        <div class="header-left">
          <button type="button" class="mobile-menu-btn" id="mobileSidebarToggle" aria-label="Toggle Sidebar">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
              <line x1="3" y1="12" x2="21" y2="12"></line>
              <line x1="3" y1="6" x2="21" y2="6"></line>
              <line x1="3" y1="18" x2="21" y2="18"></line>
            </svg>
          </button>
          <div class="header-title">@yield('page_title', 'Dashboard')</div>
        </div>

        <div class="header-right">
          <a href="{{ route('home') }}" target="_blank" class="header-site-link" title="Open public website">
            <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
              <path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"></path>
              <polyline points="15 3 21 3 21 9"></polyline>
              <line x1="10" y1="14" x2="21" y2="3"></line>
            </svg>
            <span>View Website</span>
          </a>

          <div class="user-profile-menu">
            <div class="avatar">{{ strtoupper(substr(Auth::user()->name ?? 'A', 0, 1)) }}</div>
            <div style="font-size: 0.88rem; font-weight: 600;">{{ Auth::user()->name ?? 'Administrator' }}</div>
          </div>
        </div>
      </header>

      <!-- Body Content -->
      <main class="admin-body">
        <!-- Flash Alerts -->
        @if(session('success'))
          <div class="alert alert-success">
            <div style="display: flex; align-items: center; gap: 0.5rem;">
              <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                <polyline points="22 4 12 14.01 9 11.01"></polyline>
              </svg>
              <span>{{ session('success') }}</span>
            </div>
            <button type="button" onclick="this.parentElement.remove()" style="background:none;border:none;color:inherit;cursor:pointer;">&times;</button>
          </div>
        @endif

        @if(session('error'))
          <div class="alert alert-danger">
            <div style="display: flex; align-items: center; gap: 0.5rem;">
              <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <circle cx="12" cy="12" r="10"></circle>
                <line x1="15" y1="9" x2="9" y2="15"></line>
                <line x1="9" y1="9" x2="15" y2="15"></line>
              </svg>
              <span>{{ session('error') }}</span>
            </div>
            <button type="button" onclick="this.parentElement.remove()" style="background:none;border:none;color:inherit;cursor:pointer;">&times;</button>
          </div>
        @endif

        @if($errors->any())
          <div class="alert alert-danger">
            <div>
              <strong>Please check the errors below:</strong>
              <ul style="margin-top: 0.35rem; padding-left: 1.25rem;">
                @foreach($errors->all() as $err)
                  <li>{{ $err }}</li>
                @endforeach
              </ul>
            </div>
            <button type="button" onclick="this.parentElement.remove()" style="background:none;border:none;color:inherit;cursor:pointer;">&times;</button>
          </div>
        @endif

        @yield('content')
      </main>
    </div>
  </div>

  <!-- Backend Admin JS -->
  <script src="{{ asset('backend/js/admin.js') }}?v={{ time() }}"></script>
  @stack('scripts')

  <!-- Scroll to Top Button -->
  <style>
    #backendScrollToTopBtn {
      position: fixed;
      bottom: 30px;
      right: 30px;
      z-index: 9999;
      background-color: var(--primary-main, #1e293b);
      color: white;
      border: none;
      border-radius: 50%;
      width: 45px;
      height: 45px;
      cursor: pointer;
      box-shadow: 0 4px 12px rgba(0,0,0,0.15);
      transition: all 0.3s ease;
      display: flex;
      align-items: center;
      justify-content: center;
      opacity: 0;
      pointer-events: none;
    }
    #backendScrollToTopBtn.show {
      opacity: 1;
      pointer-events: auto;
    }
    #backendScrollToTopBtn:hover {
      background-color: var(--primary-hover, #0f172a);
      transform: translateY(-3px);
      box-shadow: 0 6px 16px rgba(0,0,0,0.2);
    }
  </style>

  <button id="backendScrollToTopBtn" title="Go to top" onclick="document.querySelector('.admin-main').scrollTo({top: 0, behavior: 'smooth'}); window.scrollTo({top: 0, behavior: 'smooth'});">
    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
      <path d="M18 15l-6-6-6 6"/>
    </svg>
  </button>

  <script>
    window.addEventListener('load', function() {
      const scrollBtn = document.getElementById("backendScrollToTopBtn");
      const adminMain = document.querySelector('.admin-main');
      
      const scrollHandler = function() {
        let scrollPos = window.scrollY || (adminMain ? adminMain.scrollTop : 0);
        if (scrollPos > 300) {
          scrollBtn.classList.add("show");
        } else {
          scrollBtn.classList.remove("show");
        }
      };

      window.addEventListener('scroll', scrollHandler);
      if(adminMain) {
        adminMain.addEventListener('scroll', scrollHandler);
      }
    });
  </script>
</body>
</html>
