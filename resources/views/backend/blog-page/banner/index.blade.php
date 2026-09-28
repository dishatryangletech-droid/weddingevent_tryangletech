@extends('backend.layouts.app')

@section('title', 'Banner Section - Blog Page')
@section('page_title', 'Blog Page > Banner Section')

@section('content')
  <div class="admin-card" style="margin-bottom: 1.5rem;">
    <div class="card-header">
      <div>
        <div class="card-title">Blog Banner Section Management</div>
        <div class="card-subtitle">Manage the hero banner image, headline, and subtitle on the Blog page.</div>
      </div>
      <a href="{{ url('/blog') }}" target="_blank" class="btn btn-secondary btn-sm" style="display: inline-flex; align-items: center; gap: 0.4rem;">
        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
          <path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"></path>
          <polyline points="15 3 21 3 21 9"></polyline>
          <line x1="10" y1="14" x2="21" y2="3"></line>
        </svg>
        <span>View Live Page</span>
      </a>
    </div>

    <form action="{{ route('admin.blog-page.banner.update') }}" method="POST" enctype="multipart/form-data">
      @csrf

      <div style="padding: 1.5rem;">
        <!-- Banner Title -->
        <div class="form-group">
          <label class="form-label" for="title">Banner Title / Main Heading</label>
          <textarea name="title" id="title" rows="2" class="form-control" placeholder="e.g. Expert insights for modern brands worldwide">{{ old('title', $banner->title) }}</textarea>
          @error('title')
            <div style="color: #ef4444; font-size: 0.8rem; margin-top: 4px;">{{ $message }}</div>
          @enderror
        </div>

        <div class="form-group">
          <label class="form-label" for="subtitle">Subtitle / Insight Text</label>
          <input type="text" name="subtitle" id="subtitle" value="{{ old('subtitle', $banner->subtitle) }}" class="form-control" placeholder="e.g. Marketing insights that inspire growth" />
          @error('subtitle')
            <div style="color: #ef4444; font-size: 0.8rem; margin-top: 4px;">{{ $message }}</div>
          @enderror
        </div>

        <!-- Banner Background Image -->
        <div class="form-group" style="margin-top: 1.5rem;">
          <label class="form-label">Banner Background Image</label>
          <div style="display: flex; gap: 1.5rem; align-items: flex-start; flex-wrap: wrap;">
            <div style="width: 220px; height: 130px; border-radius: var(--radius-md); overflow: hidden; border: 1px solid var(--border-color); background: #000; position: relative;">
              <img id="bannerImagePreview" src="{{ $banner->banner_image_url }}" alt="Banner Preview" style="width: 100%; height: 100%; object-fit: cover;" />
            </div>
            <div style="flex: 1; min-width: 240px;">
              <input type="file" name="banner_image" id="banner_image" class="form-control" accept="image/*" onchange="previewImage(this, 'bannerImagePreview')" />
              <div class="form-help" style="margin-top: 6px;">Recommended resolution: 1920x800px. Formats: JPG, PNG, WEBP, AVIF. Max: 2MB. Leave empty to keep current image.</div>
            </div>
          </div>
          @error('banner_image')
            <div style="color: #ef4444; font-size: 0.8rem; margin-top: 4px;">{{ $message }}</div>
          @enderror
        </div>

        <div class="form-group" style="max-width: 280px; margin-top: 2rem;">
          <label class="form-label" for="status">Section Status</label>
          <select name="status" id="status" class="form-control form-select">
            <option value="active" {{ ($banner->status ?? 'active') === 'active' ? 'selected' : '' }}>Active (Show Section)</option>
            <option value="deactive" {{ ($banner->status ?? 'active') === 'deactive' ? 'selected' : '' }}>Deactive (Hide Section)</option>
          </select>
        </div>
      </div>

      <div style="background: var(--bg-hover); padding: 1.25rem 1.5rem; border-top: 1px solid var(--border-color); display: flex; justify-content: flex-end; gap: 0.75rem;">
        <button type="submit" class="btn btn-primary">
          <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
            <path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"></path>
            <polyline points="17 21 17 13 7 13 7 21"></polyline>
            <polyline points="7 3 7 8 15 8"></polyline>
          </svg>
          <span>Save Banner Changes</span>
        </button>
      </div>
    </form>
  </div>

  @push('scripts')
  <script>
    function previewImage(input, previewId) {
      if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = function(e) {
          document.getElementById(previewId).src = e.target.result;
        };
        reader.readAsDataURL(input.files[0]);
      }
    }
  </script>
  @endpush
@endsection
