@extends('backend.layouts.app')

@section('title', 'Home About Us Section')
@section('page_title', 'Home Page > About Us Section')

@section('content')
  <div class="admin-card" style="margin-bottom: 1.5rem;">
    <div class="card-header">
      <div>
        <div class="card-title">Home About Us Section Management</div>
        <div class="card-subtitle">Manage the section tag, title, image, and the 3 statistic counters.</div>
      </div>
      <a href="{{ url('/') }}" target="_blank" class="btn btn-secondary btn-sm" style="display: inline-flex; align-items: center; gap: 0.4rem;">
        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
          <path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"></path>
          <polyline points="15 3 21 3 21 9"></polyline>
          <line x1="10" y1="14" x2="21" y2="3"></line>
        </svg>
        <span>View Live Page</span>
      </a>
    </div>

    <form action="{{ route('admin.home.about.update') }}" method="POST" enctype="multipart/form-data">
      @csrf

      <div style="padding: 1.5rem;">
        
        <!-- Tag / Subtitle -->
        <div class="form-group">
          <label class="form-label" for="tag">Section Tag / Badge</label>
          <input type="text" name="tag" id="tag" value="{{ old('tag', $setting->tag ?? 'About us') }}" class="form-control" placeholder="e.g. About us" />
          <div class="form-help">Small tag text displayed above the main heading.</div>
        </div>

        <!-- Section Title -->
        <div class="form-group">
          <label class="form-label" for="title">Headline Content / Description <span style="color: #ef4444;">*</span></label>
          <textarea name="title" id="title" rows="3" class="form-control" required placeholder="Enter description heading...">{{ old('title', $setting->title) }}</textarea>
          <div class="form-help">Main text displayed beside the image.</div>
          @error('title')
            <div style="color: #ef4444; font-size: 0.8rem; margin-top: 4px;">{{ $message }}</div>
          @enderror
        </div>

        <hr style="border: 0; border-top: 1px solid var(--border-color); margin: 1.75rem 0;" />

        <div style="font-size: 1.05rem; font-weight: 700; color: var(--text-main); margin-bottom: 0.25rem;">
          Section Media
        </div>
        <div style="font-size: 0.85rem; color: var(--text-dim); margin-bottom: 1.25rem;">
          Image to display alongside the About Us text on the Home page.
        </div>

        <!-- Image -->
        <div class="form-group">
          <label class="form-label">About Us Image</label>
          <div style="display: flex; gap: 1.5rem; align-items: flex-start; flex-wrap: wrap;">
            <div style="width: 220px; height: 180px; border-radius: var(--radius-md); overflow: hidden; border: 1px solid var(--border-color); background: #f8fafc; position: relative;">
              <img id="imagePreview" src="{{ $setting->image_url }}" alt="Image Preview" style="width: 100%; height: 100%; object-fit: cover;" />
            </div>
            <div style="flex: 1; min-width: 240px;">
              <input type="file" name="image" id="image" class="form-control" accept="image/*" onchange="previewImage(this, 'imagePreview')" />
              <div class="form-help" style="margin-top: 6px;">Leave empty to keep existing image. Recommended size: 600x600px. Formats: JPG, PNG, WEBP.</div>
            </div>
          </div>
        </div>

        <hr style="border: 0; border-top: 1px solid var(--border-color); margin: 1.75rem 0;" />

        <div style="font-size: 1.05rem; font-weight: 700; color: var(--text-main); margin-bottom: 0.25rem;">
          Statistics / Counters
        </div>
        <div style="font-size: 0.85rem; color: var(--text-dim); margin-bottom: 1.25rem;">
          Three stats to display underneath the title (e.g. Number of Projects, Year of Experience, Happy Clients).
        </div>

        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 1.5rem;">
            
            <!-- Stat 1 -->
            <div style="border: 1px solid var(--border-color); border-radius: var(--radius-md); padding: 1.25rem; background: var(--bg-hover);">
                <div style="font-weight: 600; margin-bottom: 1rem; color: var(--text-main);">Statistic 1</div>
                
                <div class="form-group mb-3">
                    <label class="form-label">Number</label>
                    <input type="text" class="form-control" name="stat_1_number" value="{{ old('stat_1_number', $setting->stat_1_number ?? '') }}" placeholder="e.g. 100">
                </div>
                <div class="form-group mb-3">
                    <label class="form-label">Suffix (Optional)</label>
                    <input type="text" class="form-control" name="stat_1_suffix" value="{{ old('stat_1_suffix', $setting->stat_1_suffix ?? '') }}" placeholder="e.g. %">
                </div>
                <div class="form-group mb-0">
                    <label class="form-label">Label</label>
                    <input type="text" class="form-control" name="stat_1_label" value="{{ old('stat_1_label', $setting->stat_1_label ?? '') }}" placeholder="e.g. Number Of Projects">
                </div>
            </div>

            <!-- Stat 2 -->
            <div style="border: 1px solid var(--border-color); border-radius: var(--radius-md); padding: 1.25rem; background: var(--bg-hover);">
                <div style="font-weight: 600; margin-bottom: 1rem; color: var(--text-main);">Statistic 2</div>
                
                <div class="form-group mb-3">
                    <label class="form-label">Number</label>
                    <input type="text" class="form-control" name="stat_2_number" value="{{ old('stat_2_number', $setting->stat_2_number ?? '') }}" placeholder="e.g. 5">
                </div>
                <div class="form-group mb-3">
                    <label class="form-label">Suffix (Optional)</label>
                    <input type="text" class="form-control" name="stat_2_suffix" value="{{ old('stat_2_suffix', $setting->stat_2_suffix ?? '') }}" placeholder="e.g. +">
                </div>
                <div class="form-group mb-0">
                    <label class="form-label">Label</label>
                    <input type="text" class="form-control" name="stat_2_label" value="{{ old('stat_2_label', $setting->stat_2_label ?? '') }}" placeholder="e.g. Year Of Experience">
                </div>
            </div>

            <!-- Stat 3 -->
            <div style="border: 1px solid var(--border-color); border-radius: var(--radius-md); padding: 1.25rem; background: var(--bg-hover);">
                <div style="font-weight: 600; margin-bottom: 1rem; color: var(--text-main);">Statistic 3</div>
                
                <div class="form-group mb-3">
                    <label class="form-label">Number</label>
                    <input type="text" class="form-control" name="stat_3_number" value="{{ old('stat_3_number', $setting->stat_3_number ?? '') }}" placeholder="e.g. 30">
                </div>
                <div class="form-group mb-3">
                    <label class="form-label">Suffix (Optional)</label>
                    <input type="text" class="form-control" name="stat_3_suffix" value="{{ old('stat_3_suffix', $setting->stat_3_suffix ?? '') }}" placeholder="e.g. +">
                </div>
                <div class="form-group mb-0">
                    <label class="form-label">Label</label>
                    <input type="text" class="form-control" name="stat_3_label" value="{{ old('stat_3_label', $setting->stat_3_label ?? '') }}" placeholder="e.g. Happy Clients">
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
