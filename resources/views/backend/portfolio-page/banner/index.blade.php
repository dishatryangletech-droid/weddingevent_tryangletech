@extends('backend.layouts.app')

@section('title', 'Banner Section - Portfolio Page')
@section('page_title', 'Portfolio Page > Banner Section')

@section('content')
  <div class="admin-card" style="margin-bottom: 1.5rem;">
    <div class="card-header">
      <div>
        <div class="card-title">Portfolio Banner Section Management</div>
        <div class="card-subtitle">Manage the hero banner image, headline, call-to-action button, and statistics on the Portfolio page.</div>
      </div>
      <a href="{{ url('/portfolio') }}" target="_blank" class="btn btn-secondary btn-sm" style="display: inline-flex; align-items: center; gap: 0.4rem;">
        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
          <path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"></path>
          <polyline points="15 3 21 3 21 9"></polyline>
          <line x1="10" y1="14" x2="21" y2="3"></line>
        </svg>
        <span>View Live Page</span>
      </a>
    </div>

    <form action="{{ route('admin.portfolio-page.banner.update') }}" method="POST" enctype="multipart/form-data">
      @csrf

      <div style="padding: 1.5rem;">
        <!-- Banner Title -->
        <div class="form-group">
          <label class="form-label" for="title">Banner Title / Main Heading</label>
          <textarea name="title" id="title" rows="2" class="form-control" placeholder="e.g. Illuminating India's Heritage with Innovation">{{ old('title', $banner->title) }}</textarea>
          @error('title')
            <div style="color: #ef4444; font-size: 0.8rem; margin-top: 4px;">{{ $message }}</div>
          @enderror
        </div>

        <!-- Banner Background Image -->
        <div class="form-group">
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

        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 1.5rem; margin-top: 1rem;">
          <!-- CTA Button Text -->
          <div class="form-group">
            <label class="form-label" for="button_text">Call-to-Action Button Text</label>
            <input type="text" name="button_text" id="button_text" value="{{ old('button_text', $banner->button_text) }}" class="form-control" placeholder="e.g. Get in Touch" />
          </div>

          <!-- CTA Button URL -->
          <div class="form-group">
            <label class="form-label" for="button_url">Button Target URL</label>
            <input type="text" name="button_url" id="button_url" value="{{ old('button_url', $banner->button_url) }}" class="form-control" placeholder="e.g. /contact" />
          </div>
        </div>

        <h6 style="margin-top: 2rem; margin-bottom: 1rem; color: #475569; font-weight: 600; font-size: 0.95rem; text-transform: uppercase; letter-spacing: 0.5px;">Statistics Card Settings</h6>
        <div style="background: #f8fafc; border: 1px solid #e2e8f0; padding: 1.5rem; border-radius: 8px;">
          <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 1.5rem;">
            <div class="form-group mb-0">
              <label class="form-label" for="stat_number">Stat Number</label>
              <input type="text" name="stat_number" id="stat_number" value="{{ old('stat_number', $banner->stat_number) }}" class="form-control" placeholder="e.g. 50+" />
            </div>
            <div class="form-group mb-0">
              <label class="form-label" for="stat_title">Stat Title</label>
              <input type="text" name="stat_title" id="stat_title" value="{{ old('stat_title', $banner->stat_title) }}" class="form-control" placeholder="e.g. Iconic Landmark Projects" />
            </div>
            <div class="form-group mb-0">
              <label class="form-label" for="stat_label_left">Stat Label Left</label>
              <input type="text" name="stat_label_left" id="stat_label_left" value="{{ old('stat_label_left', $banner->stat_label_left) }}" class="form-control" placeholder="e.g. Jan 2021" />
            </div>
            <div class="form-group mb-0">
              <label class="form-label" for="stat_label_right">Stat Label Right</label>
              <input type="text" name="stat_label_right" id="stat_label_right" value="{{ old('stat_label_right', $banner->stat_label_right) }}" class="form-control" placeholder="e.g. Current" />
            </div>
          </div>
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
