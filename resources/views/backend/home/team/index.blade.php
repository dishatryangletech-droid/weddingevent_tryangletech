@extends('backend.layouts.app')

@section('title', 'Home Team & Growth Section')
@section('page_title', 'Home Page > Team & Growth Section')

@section('content')
  <div class="admin-card" style="margin-bottom: 1.5rem;">
    <div class="card-header">
      <div>
        <div class="card-title">Home Team (Driving Growth) Management</div>
        <div class="card-subtitle">Manage the growth tag, title, team members, and the showcase video.</div>
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

    <form action="{{ route('admin.home.team.update') }}" method="POST" enctype="multipart/form-data">
      @csrf

      <div style="padding: 1.5rem;">
        
        <!-- Tag / Subtitle -->
        <div class="form-group">
          <label class="form-label" for="tag">Section Tag / Badge</label>
          <input type="text" name="tag" id="tag" value="{{ old('tag', $setting->tag ?? 'Driving growth') }}" class="form-control" placeholder="e.g. Driving growth" />
          <div class="form-help">Small tag text displayed above the main heading.</div>
        </div>

        <!-- Section Title -->
        <div class="form-group">
          <label class="form-label" for="title">Headline Content / Description <span style="color: #ef4444;">*</span></label>
          <textarea name="title" id="title" rows="2" class="form-control" required placeholder="Enter description heading...">{{ old('title', $setting->title) }}</textarea>
          <div class="form-help">Main text displayed above the team cards.</div>
          @error('title')
            <div style="color: #ef4444; font-size: 0.8rem; margin-top: 4px;">{{ $message }}</div>
          @enderror
        </div>

        <hr style="border: 0; border-top: 1px solid var(--border-color); margin: 1.75rem 0;" />

        <div style="font-size: 1.05rem; font-weight: 700; color: var(--text-main); margin-bottom: 0.25rem;">
          Team Member 1 (Left Card)
        </div>
        
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 1.5rem; margin-bottom: 1.5rem;">
            <div class="form-group mb-0">
                <label class="form-label">Name <span style="color: #ef4444;">*</span></label>
                <input type="text" class="form-control" name="person_1_name" value="{{ old('person_1_name', $setting->person_1_name ?? '') }}" placeholder="e.g. Dip Patel" required>
            </div>
            <div class="form-group mb-0">
                <label class="form-label">Role</label>
                <input type="text" class="form-control" name="person_1_role" value="{{ old('person_1_role', $setting->person_1_role ?? '') }}" placeholder="e.g. Managing Director">
            </div>
        </div>

        <div class="form-group">
          <label class="form-label">Profile Image</label>
          <div style="display: flex; gap: 1.5rem; align-items: flex-start; flex-wrap: wrap;">
            <div style="width: 150px; height: 180px; border-radius: var(--radius-md); overflow: hidden; border: 1px solid var(--border-color); background: #f8fafc; position: relative;">
              <img id="person1ImagePreview" src="{{ $setting->person_1_image_url }}" alt="Preview" style="width: 100%; height: 100%; object-fit: cover;" />
            </div>
            <div style="flex: 1; min-width: 240px;">
              <input type="file" name="person_1_image" id="person_1_image" class="form-control" accept="image/*" onchange="previewImage(this, 'person1ImagePreview')" />
              <div class="form-help" style="margin-top: 6px;">Leave empty to keep existing image. Recommended portrait orientation. Formats: JPG, PNG, WEBP.</div>
            </div>
          </div>
        </div>

        <hr style="border: 0; border-top: 1px solid var(--border-color); margin: 1.75rem 0;" />
        
        <div style="font-size: 1.05rem; font-weight: 700; color: var(--text-main); margin-bottom: 0.25rem;">
          Team Member 2 (Right Card)
        </div>
        
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 1.5rem; margin-bottom: 1.5rem;">
            <div class="form-group mb-0">
                <label class="form-label">Name <span style="color: #ef4444;">*</span></label>
                <input type="text" class="form-control" name="person_2_name" value="{{ old('person_2_name', $setting->person_2_name ?? '') }}" placeholder="e.g. Rahul Yadav" required>
            </div>
            <div class="form-group mb-0">
                <label class="form-label">Role</label>
                <input type="text" class="form-control" name="person_2_role" value="{{ old('person_2_role', $setting->person_2_role ?? '') }}" placeholder="e.g. Managing Director">
            </div>
        </div>

        <div class="form-group">
          <label class="form-label">Profile Image</label>
          <div style="display: flex; gap: 1.5rem; align-items: flex-start; flex-wrap: wrap;">
            <div style="width: 150px; height: 180px; border-radius: var(--radius-md); overflow: hidden; border: 1px solid var(--border-color); background: #f8fafc; position: relative;">
              <img id="person2ImagePreview" src="{{ $setting->person_2_image_url }}" alt="Preview" style="width: 100%; height: 100%; object-fit: cover;" />
            </div>
            <div style="flex: 1; min-width: 240px;">
              <input type="file" name="person_2_image" id="person_2_image" class="form-control" accept="image/*" onchange="previewImage(this, 'person2ImagePreview')" />
              <div class="form-help" style="margin-top: 6px;">Leave empty to keep existing image. Recommended portrait orientation. Formats: JPG, PNG, WEBP.</div>
            </div>
          </div>
        </div>

        <hr style="border: 0; border-top: 1px solid var(--border-color); margin: 1.75rem 0;" />
        
        <div style="font-size: 1.05rem; font-weight: 700; color: var(--text-main); margin-bottom: 0.25rem;">
          Center Video Player
        </div>

        <div class="form-group">
          <label class="form-label">Video Poster / Thumbnail Image</label>
          <div style="display: flex; gap: 1.5rem; align-items: flex-start; flex-wrap: wrap;">
            <div style="width: 150px; height: 180px; border-radius: var(--radius-md); overflow: hidden; border: 1px solid var(--border-color); background: #000; position: relative;">
              <img id="posterImagePreview" src="{{ $setting->video_poster_url }}" alt="Poster Preview" style="width: 100%; height: 100%; object-fit: cover;" />
            </div>
            <div style="flex: 1; min-width: 240px;">
              <input type="file" name="video_poster" id="video_poster" class="form-control" accept="image/*" onchange="previewImage(this, 'posterImagePreview')" />
              <div class="form-help" style="margin-top: 6px;">Thumbnail image shown while video is loading. Formats: JPG, PNG, WEBP. Leave empty to keep existing image.</div>
            </div>
          </div>
        </div>

        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 1.5rem; margin-top: 1rem;">
          <!-- Video File Upload -->
          <div class="form-group">
            <label class="form-label" for="video_file">Upload Video File (.mp4, .webm)</label>
            <input type="file" name="video_file" id="video_file" class="form-control" accept="video/mp4,video/webm" />
            <div class="form-help">Max size: 50MB. (Recommended for highest quality). Overrides the URL below if provided.</div>
            @error('video_file')
                <div style="color: #ef4444; font-size: 0.8rem; margin-top: 4px;">{{ $message }}</div>
            @enderror
          </div>

          <!-- Video External URL -->
          <div class="form-group">
            <label class="form-label" for="video_url">Or Video URL</label>
            <input type="text" name="video_url" id="video_url" value="{{ old('video_url', $setting->video_url ? $setting->video_media_url : '') }}" class="form-control" placeholder="e.g. https://domain.com/video.mp4" />
            <div class="form-help">If hosting externally on a CDN or cloud storage. Currently active URL shown above.</div>
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
