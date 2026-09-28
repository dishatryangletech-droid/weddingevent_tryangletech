@extends('backend.layouts.app')

@section('title', 'Dashboard')
@section('page_title', 'Dashboard Overview')

@section('content')
  <!-- Stats Grid -->
  <div class="stats-grid">
    <!-- Active Hero Sliders -->
    <div class="stat-card">
      <div class="stat-info">
        <div class="stat-label">Hero Banner Slides</div>
        <div class="stat-value">{{ $stats['active_slides'] }} <span style="font-size: 1rem; color: var(--text-muted); font-weight: 500;">/ {{ $stats['total_slides'] }}</span></div>
      </div>
      <div class="stat-icon primary">
        <svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
          <rect x="2" y="3" width="20" height="14" rx="2" ry="2"></rect>
          <line x1="8" y1="21" x2="16" y2="21"></line>
          <line x1="12" y1="17" x2="12" y2="21"></line>
        </svg>
      </div>
    </div>

    <!-- Total Services -->
    <div class="stat-card">
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
    </div>

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
