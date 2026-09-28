@extends('backend.layouts.app')

@section('title', $title ?? 'Management')
@section('page_title', $title ?? 'Management')

@section('content')
  <div class="admin-card" style="text-align: center; padding: 4rem 2rem;">
    <div style="width: 64px; height: 64px; border-radius: 50%; background: var(--primary-light); color: var(--primary); display: flex; align-items: center; justify-content: center; margin: 0 auto 1.5rem;">
      <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
        <polygon points="12 2 2 7 12 12 22 7 12 2"></polygon>
        <polyline points="2 17 12 22 22 17"></polyline>
        <polyline points="2 12 12 17 22 12"></polyline>
      </svg>
    </div>
    
    <h2 style="font-size: 1.4rem; font-weight: 700; color: var(--text-main); margin-bottom: 0.5rem;">{{ $title ?? 'Module' }}</h2>
    <p style="color: var(--text-muted); max-width: 500px; margin: 0 auto 1.5rem; font-size: 0.95rem;">
      {{ $desc ?? 'This section is ready for future module integration.' }}
    </p>

    <div style="display: inline-flex; gap: 1rem;">
      <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary">
        &larr; Back to Dashboard
      </a>
      <a href="{{ route('admin.home.slider.index') }}" class="btn btn-primary">
        Manage Hero Sliders &rarr;
      </a>
    </div>
  </div>
@endsection
