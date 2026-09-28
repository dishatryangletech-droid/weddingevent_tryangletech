@extends('backend.layouts.app')

@section('title', 'About Us Vision Section')
@section('page_title', 'About Us Page > Vision Section')

@section('content')
  <div class="admin-card" style="margin-bottom: 1.5rem;">
    <div class="card-header">
      <div>
        <div class="card-title">About Us Vision Section</div>
        <div class="card-subtitle">Manage the "Our vision" section on the About Us page.</div>
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

    <form action="{{ route('admin.about.vision.update') }}" method="POST" enctype="multipart/form-data">
      @csrf

      <div style="padding: 1.5rem;">
        
        <div class="form-group">
          <label class="form-label" for="tag">Section Tag / Badge (Left)</label>
          <input type="text" name="tag" id="tag" value="{{ old('tag', $setting->tag ?? 'Our vision') }}" class="form-control" placeholder="e.g. Our vision" />
        </div>

        <div class="form-group">
          <label class="form-label" for="title">Headline Content (Left) <span style="color: #ef4444;">*</span></label>
          <input type="text" name="title" id="title" class="form-control" value="{{ old('title', $setting->title) }}" required placeholder="e.g. Creative brand focused on growth and success">
          @error('title')
            <div style="color: #ef4444; font-size: 0.8rem; margin-top: 4px;">{{ $message }}</div>
          @enderror
        </div>

        <hr style="border: 0; border-top: 1px solid var(--border-color); margin: 1.75rem 0;" />

        <div style="font-size: 1.05rem; font-weight: 700; color: var(--text-main); margin-bottom: 0.25rem;">
          Checklist Items (Left)
        </div>

        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 1.5rem; margin-bottom: 1.5rem;">
            <div class="form-group mb-0">
                <label class="form-label">Check Item 1</label>
                <input type="text" class="form-control" name="check_1_text" value="{{ old('check_1_text', $setting->check_1_text ?? 'Building stronger digital brand presence') }}" placeholder="Item 1">
            </div>
            <div class="form-group mb-0">
                <label class="form-label">Check Item 2</label>
                <input type="text" class="form-control" name="check_2_text" value="{{ old('check_2_text', $setting->check_2_text ?? 'Turning strategy into measurable growth') }}" placeholder="Item 2">
            </div>
            <div class="form-group mb-0">
                <label class="form-label">Check Item 3</label>
                <input type="text" class="form-control" name="check_3_text" value="{{ old('check_3_text', $setting->check_3_text ?? 'Helping brands connect with customers') }}" placeholder="Item 3">
            </div>
            <div class="form-group mb-0">
                <label class="form-label">Check Item 4</label>
                <input type="text" class="form-control" name="check_4_text" value="{{ old('check_4_text', $setting->check_4_text ?? 'Driving scalable business success globally') }}" placeholder="Item 4">
            </div>
        </div>

        <hr style="border: 0; border-top: 1px solid var(--border-color); margin: 1.75rem 0;" />

        <div style="font-size: 1.05rem; font-weight: 700; color: var(--text-main); margin-bottom: 0.25rem;">
          Right Side Content
        </div>
        
        <div class="form-group">
          <label class="form-label" for="right_title">Right Title</label>
          <input type="text" name="right_title" id="right_title" class="form-control" value="{{ old('right_title', $setting->right_title ?? 'Brand growth vision') }}" placeholder="e.g. Brand growth vision">
        </div>

        <div class="form-group">
          <label class="form-label" for="right_description">Right Paragraph Text</label>
          <textarea name="right_description" id="right_description" rows="3" class="form-control" placeholder="e.g. We unite creative thinking...">{{ old('right_description', $setting->right_description) }}</textarea>
        </div>


        <hr style="border: 0; border-top: 1px solid var(--border-color); margin: 1.75rem 0;" />

        <div class="form-group">
          <label class="form-label">Center Main Image</label>
          <div style="display: flex; gap: 1.5rem; align-items: flex-start; flex-wrap: wrap;">
            <div style="width: 200px; height: 200px; border-radius: var(--radius-md); overflow: hidden; border: 1px solid var(--border-color); background: #f8fafc; position: relative;">
              <img id="imagePreview" src="{{ $setting->image_url }}" alt="Preview" style="width: 100%; height: 100%; object-fit: cover;" />
            </div>
            <div style="flex: 1; min-width: 240px;">
              <input type="file" name="image" id="image" class="form-control" accept="image/*" onchange="previewImage(this, 'imagePreview')" />
              <div class="form-help" style="margin-top: 6px;">Leave empty to keep existing image. Recommended size: 600x600px square. Formats: JPG, PNG, WEBP.</div>
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
