@extends('backend.layouts.app')

@section('title', 'Banner Section - About Us')
@section('page_title', 'About Us Page > Banner Section')

@section('content')
  <div class="admin-card" style="margin-bottom: 1.5rem;">
    <div class="card-header">
      <div>
        <div class="card-title">About Us Banner Section Management</div>
        <div class="card-subtitle">Manage the hero banner image, headline, call-to-action button, and brand performance card on the About Us page.</div>
      </div>
      <a href="{{ url('/about-us') }}" target="_blank" class="btn btn-secondary btn-sm" style="display: inline-flex; align-items: center; gap: 0.4rem;">
        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
          <path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"></path>
          <polyline points="15 3 21 3 21 9"></polyline>
          <line x1="10" y1="14" x2="21" y2="3"></line>
        </svg>
        <span>View Live Page</span>
      </a>
    </div>

    <form action="{{ route('admin.about.banner.update') }}" method="POST" enctype="multipart/form-data">
      @csrf

      <div style="padding: 1.5rem;">
        <!-- Banner Title -->
        <div class="form-group">
          <label class="form-label" for="title">Banner Title / Main Heading <span style="color: #ef4444;">*</span></label>
          <textarea name="title" id="title" rows="2" class="form-control" required placeholder="e.g. Smart digital strategies for business growth">{{ old('title', $settings->title) }}</textarea>
          <div class="form-help">Main hero headline displayed prominently in the banner section.</div>
          @error('title')
            <div style="color: #ef4444; font-size: 0.8rem; margin-top: 4px;">{{ $message }}</div>
          @enderror
        </div>

        <!-- Banner Short Description -->
        <div class="form-group">
          <label class="form-label" for="description">Short Description</label>
          <textarea name="description" id="description" rows="3" class="form-control" placeholder="e.g. Enter short description to show below the title">{{ old('description', $settings->description) }}</textarea>
          <div class="form-help">Short text displayed right below the main title.</div>
          @error('description')
            <div style="color: #ef4444; font-size: 0.8rem; margin-top: 4px;">{{ $message }}</div>
          @enderror
        </div>

        <!-- Banner Background Image -->
        <div class="form-group">
          <label class="form-label">Banner Background Image</label>
          <div style="display: flex; gap: 1.5rem; align-items: flex-start; flex-wrap: wrap;">
            <div style="width: 220px; height: 130px; border-radius: var(--radius-md); overflow: hidden; border: 1px solid var(--border-color); background: #000; position: relative;">
              <img id="bannerImagePreview" src="{{ $settings->banner_image_url }}" alt="Banner Preview" style="width: 100%; height: 100%; object-fit: cover;" />
            </div>
            <div style="flex: 1; min-width: 240px;">
              <input type="file" name="banner_image" id="banner_image" class="form-control" accept="image/*" onchange="previewImage(this, 'bannerImagePreview')" />
              <div class="form-help" style="margin-top: 6px;">Recommended resolution: 1920x1080px. Formats: JPG, PNG, WEBP, AVIF. Max: 5MB. Leave empty to keep current image.</div>
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
            <input type="text" name="button_text" id="button_text" value="{{ old('button_text', $settings->button_text) }}" class="form-control" placeholder="e.g. Schedule a call" />
          </div>

          <!-- CTA Button URL -->
          <div class="form-group">
            <label class="form-label" for="button_url">Call-to-Action Button URL / Phone</label>
            <input type="text" name="button_url" id="button_url" value="{{ old('button_url', $settings->button_url) }}" class="form-control" placeholder="e.g. tel:8881234567 or /contact" />
          </div>
        </div>

        <hr style="border: 0; border-top: 1px solid var(--border-color); margin: 1.75rem 0;" />

        <div style="font-size: 1.05rem; font-weight: 700; color: var(--text-main); margin-bottom: 0.25rem;">
          Performance Badge Card Details
        </div>
        <div style="font-size: 0.85rem; color: var(--text-dim); margin-bottom: 1.25rem;">
          Floating frosted glass card displayed on the right side of the hero banner.
        </div>

        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(260px, 1fr)); gap: 1.5rem;">
          <!-- Performance Title -->
          <div class="form-group">
            <label class="form-label" for="performance_title">Card Title</label>
            <input type="text" name="performance_title" id="performance_title" value="{{ old('performance_title', $settings->performance_title) }}" class="form-control" placeholder="e.g. Brand performance" />
          </div>

          <!-- Performance Percentage -->
          <div class="form-group">
            <label class="form-label" for="performance_percentage">Percentage Value (%)</label>
            <input type="text" name="performance_percentage" id="performance_percentage" value="{{ old('performance_percentage', $settings->performance_percentage) }}" class="form-control" placeholder="e.g. 85" />
            <div class="form-help">Number displayed on the radial gauge counter.</div>
          </div>

          <!-- Performance Description -->
          <div class="form-group">
            <label class="form-label" for="performance_description">Subtitle / Description</label>
            <input type="text" name="performance_description" id="performance_description" value="{{ old('performance_description', $settings->performance_description) }}" class="form-control" placeholder="e.g. Consistent growth across campaigns" />
          </div>

          <!-- Performance Badge -->
          <div class="form-group">
            <label class="form-label" for="performance_badge">Badge Tag</label>
            <input type="text" name="performance_badge" id="performance_badge" value="{{ old('performance_badge', $settings->performance_badge) }}" class="form-control" placeholder="e.g. Performance system" />
          </div>
        </div>

        <div class="form-group" style="max-width: 280px; margin-top: 1.5rem;">
          <label class="form-label" for="status">Section Status</label>
          <select name="status" id="status" class="form-control form-select">
            <option value="active" {{ ($settings->status ?? 'active') === 'active' ? 'selected' : '' }}>Active (Show Section)</option>
            <option value="deactive" {{ ($settings->status ?? 'active') === 'deactive' ? 'selected' : '' }}>Deactive (Hide Section)</option>
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
