@extends('backend.layouts.app')

@section('title', 'About Us Content Section - Who We Are')
@section('page_title', 'About Us Page > About Us Content Section')

@section('content')
  <div class="admin-card" style="margin-bottom: 1.5rem;">
    <div class="card-header">
      <div>
        <div class="card-title">About Us Content Section Management ("Who We Are")</div>
        <div class="card-subtitle">Manage the section tag, descriptive headline, video player media, and poster preview image.</div>
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

    <form action="{{ route('admin.about.content.update') }}" method="POST" enctype="multipart/form-data">
      @csrf

      <div style="padding: 1.5rem;">
        <!-- Tag / Subtitle -->
        <div class="form-group">
          <label class="form-label" for="tag">Section Tag / Badge</label>
          <input type="text" name="tag" id="tag" value="{{ old('tag', $settings->tag ?? 'Who we are') }}" class="form-control" placeholder="e.g. Who we are" />
          <div class="form-help">Small tag text displayed above the main heading.</div>
        </div>

        <!-- Section Title / Main Paragraph Heading -->
        <div class="form-group">
          <label class="form-label" for="title">Headline Content / Description <span style="color: #ef4444;">*</span></label>
          <textarea name="title" id="title" rows="3" class="form-control" required placeholder="Enter description heading...">{{ old('title', $settings->title) }}</textarea>
          <div class="form-help">Main text displayed beside the video player.</div>
          @error('title')
            <div style="color: #ef4444; font-size: 0.8rem; margin-top: 4px;">{{ $message }}</div>
          @enderror
        </div>

        <hr style="border: 0; border-top: 1px solid var(--border-color); margin: 1.75rem 0;" />

        <div style="font-size: 1.05rem; font-weight: 700; color: var(--text-main); margin-bottom: 0.25rem;">
          Section Media &amp; Video Player
        </div>
        <div style="font-size: 0.85rem; color: var(--text-dim); margin-bottom: 1.25rem;">
          Custom video and thumbnail poster preview for the autoplay showcase video.
        </div>

        <!-- Video Poster Image -->
        <div class="form-group">
          <label class="form-label">Video Poster / Thumbnail Image</label>
          <div style="display: flex; gap: 1.5rem; align-items: flex-start; flex-wrap: wrap;">
            <div style="width: 220px; height: 130px; border-radius: var(--radius-md); overflow: hidden; border: 1px solid var(--border-color); background: #000; position: relative;">
              <img id="posterImagePreview" src="{{ $settings->poster_image_url }}" alt="Poster Preview" style="width: 100%; height: 100%; object-fit: cover;" />
            </div>
            <div style="flex: 1; min-width: 240px;">
              <input type="file" name="poster_image" id="poster_image" class="form-control" accept="image/*" onchange="previewImage(this, 'posterImagePreview')" />
              <div class="form-help" style="margin-top: 6px;">Thumbnail image shown while video is loading. Formats: JPG, PNG, WEBP, AVIF. Leave empty to keep existing image.</div>
            </div>
          </div>
        </div>

        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 1.5rem; margin-top: 1rem;">
          <!-- Video File Upload -->
          <div class="form-group">
            <label class="form-label" for="video_file">Upload Video File (.mp4, .webm)</label>
            <input type="file" name="video_file" id="video_file" class="form-control" accept="video/mp4,video/webm" />
            <div class="form-help">Max size: 50MB. (Recommended for highest quality).</div>
          </div>

          <!-- Video External URL -->
          <div class="form-group">
            <label class="form-label" for="video_url">Or Video URL</label>
            <input type="text" name="video_url" id="video_url" value="{{ old('video_url', $settings->video_url) }}" class="form-control" placeholder="e.g. https://domain.com/video.mp4" />
            <div class="form-help">If hosting externally on a CDN or cloud storage.</div>
          </div>
        </div>

        @if($settings->video_url)
          <div style="margin-top: 0.75rem; font-size: 0.85rem; color: #16a34a; display: flex; align-items: center; gap: 0.5rem;">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
              <polyline points="20 6 9 17 4 12"></polyline>
            </svg>
            <span>Current video media set: <code>{{ $settings->video_url }}</code></span>
          </div>
        @endif

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
