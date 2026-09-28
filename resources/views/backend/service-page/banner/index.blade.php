@extends('backend.layouts.app')

@section('title', 'Services Page > Banner Section')
@section('page_title', 'Services Page > Banner Section')

@push('styles')
<style>
  .admin-form-card {
    background: #ffffff;
    border-radius: 12px;
    border: 1px solid var(--border-color, #e2e8f0);
    box-shadow: 0 4px 16px rgba(0, 0, 0, 0.04);
    padding: 1.5rem 1.75rem;
    margin-bottom: 1.75rem;
  }
  .admin-form-card .card-head {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding-bottom: 1rem;
    margin-bottom: 1.25rem;
    border-bottom: 1px solid var(--border-color, #e2e8f0);
  }
  .card-badge {
    display: inline-flex;
    align-items: center;
    gap: 0.35rem;
    padding: 0.25rem 0.65rem;
    font-size: 0.75rem;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    border-radius: 6px;
    background: #eff6ff;
    color: #2563eb;
  }
  .form-row-2 {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 1.25rem;
    margin-bottom: 1.25rem;
  }
  @media (max-width: 768px) {
    .form-row-2 { grid-template-columns: 1fr; }
  }
</style>
@endpush

@section('content')
<form action="{{ route('admin.service-page.banner.update') }}" method="POST" enctype="multipart/form-data">
  @csrf

  <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 1.5rem;">
    <div>
      <h2 style="font-size: 1.35rem; font-weight: 700; color: #0f172a; margin: 0 0 0.25rem 0;">Services Page Hero Banner Management</h2>
      <p style="font-size: 0.88rem; color: #64748b; margin: 0;">Customize the main headline, background image, CTA button, and bottom feature highlights for the Services page.</p>
    </div>
    <div style="display: flex; gap: 0.75rem;">
      <a href="{{ route('services') }}" target="_blank" class="btn btn-secondary" style="display: inline-flex; align-items: center; gap: 6px;">
        <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
          <path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"></path>
          <polyline points="15 3 21 3 21 9"></polyline>
          <line x1="10" y1="14" x2="21" y2="3"></line>
        </svg>
        <span>View Live Page</span>
      </a>
      <button type="submit" class="btn btn-primary">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
          <polyline points="20 6 9 17 4 12"></polyline>
        </svg>
        <span>Save Changes</span>
      </button>
    </div>
  </div>

  <!-- 1. Hero Content & Media -->
  <div class="admin-form-card">
    <div class="card-head">
      <div style="font-weight: 700; font-size: 1rem; color: #0f172a;">Hero Banner Headline &amp; Background</div>
      <span class="card-badge">Main Hero</span>
    </div>

    <!-- Main Headline -->
    <div class="form-group" style="margin-bottom: 1.25rem;">
      <label for="title" class="form-label" style="font-weight: 600;">Main Headline <span style="color: #ef4444;">*</span></label>
      <textarea name="title" id="title" rows="2" class="form-control @error('title') is-invalid @enderror" required>{{ old('title', $banner->title) }}</textarea>
      @error('title')
        <div style="color: #ef4444; font-size: 0.82rem; margin-top: 0.25rem;">{{ $message }}</div>
      @enderror
    </div>

    <div class="form-row-2">
      <!-- CTA Button Text -->
      <div class="form-group">
        <label for="button_text" class="form-label" style="font-weight: 600;">CTA Button Text <span style="color: #ef4444;">*</span></label>
        <input type="text" name="button_text" id="button_text" value="{{ old('button_text', $banner->button_text) }}" class="form-control @error('button_text') is-invalid @enderror" required />
        @error('button_text')
          <div style="color: #ef4444; font-size: 0.82rem; margin-top: 0.25rem;">{{ $message }}</div>
        @enderror
      </div>

      <!-- CTA Button URL -->
      <div class="form-group">
        <label for="button_url" class="form-label" style="font-weight: 600;">CTA Button Target URL <span style="color: #ef4444;">*</span></label>
        <input type="text" name="button_url" id="button_url" value="{{ old('button_url', $banner->button_url) }}" class="form-control @error('button_url') is-invalid @enderror" required />
        @error('button_url')
          <div style="color: #ef4444; font-size: 0.82rem; margin-top: 0.25rem;">{{ $message }}</div>
        @enderror
      </div>
    </div>

    <!-- Banner Image Upload -->
    <div class="form-group" style="margin-bottom: 1rem;">
      <label for="banner_image" class="form-label" style="font-weight: 600;">Hero Background Image</label>
      <input type="file" name="banner_image" id="banner_image" class="form-control @error('banner_image') is-invalid @enderror" accept="image/*" onchange="previewImage(this, 'bannerPreview')" />
      <small class="form-text" style="color: #64748b;">Formats: JPG, PNG, WEBP, AVIF. Leave empty to retain current background image.</small>
      
      <div style="margin-top: 0.75rem; display: flex; align-items: center; gap: 1rem;">
        <img id="bannerPreview" src="{{ $banner->banner_image_url }}" alt="Banner Preview" style="max-height: 110px; max-width: 220px; object-fit: cover; border-radius: 8px; border: 1px solid #e2e8f0;" />
        <span style="font-size: 0.82rem; color: #64748b;">Active Background Preview</span>
      </div>
      @error('banner_image')
        <div style="color: #ef4444; font-size: 0.82rem; margin-top: 0.25rem;">{{ $message }}</div>
      @enderror
    </div>
  </div>

  <!-- 2. Bottom Feature Highlights (4 Badges) -->
  <div class="admin-form-card">
    <div class="card-head">
      <div style="font-weight: 700; font-size: 1rem; color: #0f172a;">Bottom Slider Highlight Badges (4 Features)</div>
      <span class="card-badge">Key Capabilities</span>
    </div>

    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1.25rem;">
      @for($i = 0; $i < 4; $i++)
        @php
          $itemTitle = $banner->items[$i]['title'] ?? '';
        @endphp
        <div class="form-group">
          <label class="form-label" style="font-weight: 600;">Feature Badge {{ $i + 1 }}</label>
          <input type="text" name="items[{{ $i }}][title]" value="{{ old("items.{$i}.title", $itemTitle) }}" class="form-control" placeholder="e.g. 3D Projection Mapping" />
        </div>
      @endfor
    </div>
  </div>

  <!-- 3. Section Status -->
  <div class="admin-form-card">
    <div class="card-head">
      <div style="font-weight: 700; font-size: 1rem; color: #0f172a;">Section Display Status</div>
      <span class="card-badge">Visibility</span>
    </div>

    <div class="form-group" style="max-width: 320px;">
      <label for="status" class="form-label" style="font-weight: 600;">Status</label>
      <select name="status" id="status" class="form-control">
        <option value="active" {{ old('status', $banner->status) === 'active' ? 'selected' : '' }}>Active (Show Section)</option>
        <option value="deactive" {{ old('status', $banner->status) === 'deactive' ? 'selected' : '' }}>Deactive (Hide Section)</option>
      </select>
    </div>
  </div>

  <div style="display: flex; justify-content: flex-end; gap: 0.75rem; margin-bottom: 3rem;">
    <button type="submit" class="btn btn-primary" style="padding: 0.65rem 1.75rem;">
      <span>Save Banner Changes</span>
    </button>
  </div>
</form>

<script>
  function previewImage(input, previewId) {
    if (input.files && input.files[0]) {
      const reader = new FileReader();
      reader.onload = function(e) {
        document.getElementById(previewId).src = e.target.result;
      }
      reader.readAsDataURL(input.files[0]);
    }
  }
</script>
@endsection
