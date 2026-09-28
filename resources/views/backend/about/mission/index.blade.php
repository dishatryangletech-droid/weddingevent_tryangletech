@extends('backend.layouts.app')

@section('title', 'About Us Mission Section')
@section('page_title', 'About Us Page > Mission Section')

@section('content')
  <div class="admin-card" style="margin-bottom: 1.5rem;">
    <div class="card-header">
      <div>
        <div class="card-title">About Us Mission Section</div>
        <div class="card-subtitle">Manage the "Our mission" section on the About Us page.</div>
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

    <form action="{{ route('admin.about.mission.update') }}" method="POST" enctype="multipart/form-data">
      @csrf

      <div style="padding: 1.5rem;">
        
        <div class="form-group">
          <label class="form-label" for="tag">Section Tag / Badge</label>
          <input type="text" name="tag" id="tag" value="{{ old('tag', $setting->tag ?? 'Our mission') }}" class="form-control" placeholder="e.g. Our mission" />
        </div>

        <div class="form-group">
          <label class="form-label" for="title">Headline Content / Description <span style="color: #ef4444;">*</span></label>
          <input type="text" name="title" id="title" class="form-control" value="{{ old('title', $setting->title) }}" required placeholder="e.g. Creative marketing plans designed to grow brands worldwide">
          @error('title')
            <div style="color: #ef4444; font-size: 0.8rem; margin-top: 4px;">{{ $message }}</div>
          @enderror
        </div>

        <div class="form-group">
          <label class="form-label" for="description">Main Paragraph Text</label>
          <textarea name="description" id="description" rows="3" class="form-control" placeholder="e.g. From branding and content strategy...">{{ old('description', $setting->description) }}</textarea>
        </div>

        <hr style="border: 0; border-top: 1px solid var(--border-color); margin: 1.75rem 0;" />

        <div style="font-size: 1.05rem; font-weight: 700; color: var(--text-main); margin-bottom: 0.25rem;">
          Call to Action Button
        </div>

        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 1.5rem; margin-bottom: 1.5rem;">
            <div class="form-group mb-0">
                <label class="form-label">Button Text</label>
                <input type="text" class="form-control" name="button_text" value="{{ old('button_text', $setting->button_text ?? 'Get started') }}" placeholder="e.g. Get started">
            </div>
            <div class="form-group mb-0">
                <label class="form-label">Button Link URL</label>
                <input type="text" class="form-control" name="button_link" value="{{ old('button_link', $setting->button_link ?? url('price-one')) }}" placeholder="e.g. https://domain.com/page">
            </div>
        </div>

        <hr style="border: 0; border-top: 1px solid var(--border-color); margin: 1.75rem 0;" />

        <div style="font-size: 1.05rem; font-weight: 700; color: var(--text-main); margin-bottom: 0.25rem;">
          Bullet Point Quotes (with Icons)
        </div>

        <div class="form-group">
          <label class="form-label" for="quote_1_text">Quote / Bullet 1</label>
          <input type="text" name="quote_1_text" id="quote_1_text" value="{{ old('quote_1_text', $setting->quote_1_text ?? 'Drive brand growth through creative marketing solutions today') }}" class="form-control" />
        </div>
        
        <div class="form-group">
          <label class="form-label" for="quote_2_text">Quote / Bullet 2</label>
          <input type="text" name="quote_2_text" id="quote_2_text" value="{{ old('quote_2_text', $setting->quote_2_text ?? 'Scale through creative marketing and growth strategies that work.') }}" class="form-control" />
        </div>

        <div class="form-group">
          <label class="form-label" for="quote_3_text">Quote / Bullet 3</label>
          <input type="text" name="quote_3_text" id="quote_3_text" value="{{ old('quote_3_text', $setting->quote_3_text ?? 'Drive measurable results through growth strategies consistently.') }}" class="form-control" />
        </div>

        <hr style="border: 0; border-top: 1px solid var(--border-color); margin: 1.75rem 0;" />

        <div class="form-group">
          <label class="form-label">Section Left Image</label>
          <div style="display: flex; gap: 1.5rem; align-items: flex-start; flex-wrap: wrap;">
            <div style="width: 250px; height: 180px; border-radius: var(--radius-md); overflow: hidden; border: 1px solid var(--border-color); background: #f8fafc; position: relative;">
              <img id="imagePreview" src="{{ $setting->image_url }}" alt="Preview" style="width: 100%; height: 100%; object-fit: cover;" />
            </div>
            <div style="flex: 1; min-width: 240px;">
              <input type="file" name="image" id="image" class="form-control" accept="image/*" onchange="previewImage(this, 'imagePreview')" />
              <div class="form-help" style="margin-top: 6px;">Leave empty to keep existing image. Recommended size: 600x600px. Formats: JPG, PNG, WEBP.</div>
            </div>
          </div>
        </div>

        <hr style="border: 0; border-top: 1px solid var(--border-color); margin: 1.75rem 0;" />

        <!-- Status -->
        <div class="form-group" style="max-width: 280px;">
          <label class="form-label" for="status">Section Status</label>
          <select name="status" id="status" class="form-control form-select">
            <option value="active" {{ ($setting->status ?? 'active') === 'active' ? 'selected' : '' }}>Active (Show Section)</option>
            <option value="inactive" {{ ($setting->status ?? 'active') === 'inactive' ? 'selected' : '' }}>Inactive (Hide Section)</option>
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
          <span>Save Content Changes</span>
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
