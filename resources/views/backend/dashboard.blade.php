@extends('backend.layouts.app')

@section('title', 'Dashboard')
@section('page_title', 'Dashboard Overview')

@section('content')
  <!-- Stats Grid -->
  <div class="stats-grid" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 1.5rem;">
    
    <!-- Quote Requests -->
    <a href="{{ route('admin.quotes.index') }}" class="stat-card" style="text-decoration: none; color: inherit;">
      <div class="stat-info">
        <div class="stat-label">Quote Requests</div>
        <div class="stat-value">{{ $stats['total_quote_requests'] }}</div>
      </div>
      <div class="stat-icon primary">
        <svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
          <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path>
        </svg>
      </div>
    </a>

    <!-- Contact Enquiries -->
    <a href="{{ route('admin.contact-enquiries.index') }}" class="stat-card" style="text-decoration: none; color: inherit;">
      <div class="stat-info">
        <div class="stat-label">Contact Enquiries</div>
        <div class="stat-value">{{ $stats['total_contact_enquiries'] }}</div>
      </div>
      <div class="stat-icon" style="background: rgba(245, 158, 11, 0.1); color: #d97706;">
        <svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
          <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
          <polyline points="22,6 12,13 2,6"></polyline>
        </svg>
      </div>
    </a>

    <!-- Total Services -->
    <a href="{{ route('admin.service-page.offers.index') }}" class="stat-card" style="text-decoration: none; color: inherit;">
      <div class="stat-info">
        <div class="stat-label">Services Configured</div>
        <div class="stat-value">{{ $stats['total_services'] }}</div>
      </div>
      <div class="stat-icon success">
        <svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
          <polygon points="12 2 2 7 12 12 22 7 12 2"></polygon>
          <polyline points="2 17 12 22 22 17"></polyline>
          <polyline points="2 12 12 17 22 12"></polyline>
        </svg>
      </div>
    </a>

    <!-- Total Portfolios -->
    <a href="{{ route('admin.portfolio-page.items.index') }}" class="stat-card" style="text-decoration: none; color: inherit;">
      <div class="stat-info">
        <div class="stat-label">Portfolio Items</div>
        <div class="stat-value">{{ $stats['total_portfolios'] }}</div>
      </div>
      <div class="stat-icon" style="background: rgba(139, 92, 246, 0.1); color: #8b5cf6;">
        <svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
          <rect x="3" y="3" width="7" height="5"></rect>
          <rect x="14" y="3" width="7" height="5"></rect>
          <rect x="3" y="12" width="7" height="9"></rect>
          <rect x="14" y="12" width="7" height="9"></rect>
        </svg>
      </div>
    </a>

    <!-- Total Events -->
    <a href="{{ route('admin.event-page.items.index') }}" class="stat-card" style="text-decoration: none; color: inherit;">
      <div class="stat-info">
        <div class="stat-label">Events Added</div>
        <div class="stat-value">{{ $stats['total_events'] }}</div>
      </div>
      <div class="stat-icon" style="background: rgba(236, 72, 153, 0.1); color: #ec4899;">
        <svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
          <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
          <line x1="16" y1="2" x2="16" y2="6"></line>
          <line x1="8" y1="2" x2="8" y2="6"></line>
          <line x1="3" y1="10" x2="21" y2="10"></line>
        </svg>
      </div>
    </a>

    <!-- Total Blogs -->
    <a href="{{ route('admin.blog-page.items.index') }}" class="stat-card" style="text-decoration: none; color: inherit;">
      <div class="stat-info">
        <div class="stat-label">Blog Posts</div>
        <div class="stat-value">{{ $stats['total_blogs'] }}</div>
      </div>
      <div class="stat-icon" style="background: rgba(14, 165, 233, 0.1); color: #0ea5e9;">
        <svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
          <path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"></path>
          <path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"></path>
        </svg>
      </div>
    </a>

    <!-- Total Testimonials -->
    <a href="{{ route('admin.testimonials.index') }}" class="stat-card" style="text-decoration: none; color: inherit;">
      <div class="stat-info">
        <div class="stat-label">Testimonials</div>
        <div class="stat-value">{{ $stats['total_testimonials'] }}</div>
      </div>
      <div class="stat-icon" style="background: rgba(244, 63, 94, 0.1); color: #f43f5e;">
        <svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
          <path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"></path>
        </svg>
      </div>
    </a>

    <!-- Total Users -->
    <div class="stat-card">
      <div class="stat-info">
        <div class="stat-label">Admin Users</div>
        <div class="stat-value">{{ $stats['total_users'] }}</div>
      </div>
      <div class="stat-icon accent">
        <svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
          <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
          <circle cx="9" cy="7" r="4"></circle>
        </svg>
      </div>
    </div>
  </div>

@endsection
