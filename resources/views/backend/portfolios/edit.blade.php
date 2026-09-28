@extends('backend.layouts.app')

@section('title', 'Edit Portfolio Project: ' . $portfolio->title)
@section('page_title', 'Portfolio > Edit Project')

@push('styles')
<!-- Quill.js Rich Text Editor Styles -->
<link href="https://cdn.jsdelivr.net/npm/quill@1.3.7/dist/quill.snow.css" rel="stylesheet">
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
    background: #f1f5f9;
    color: #475569;
  }
  .card-badge.primary {
    background: #eff6ff;
    color: #2563eb;
  }
  .card-badge.accent {
    background: #fff7ed;
    color: #ea580c;
  }
  .form-row-4 {
    display: grid;
    grid-template-columns: 2fr 1.5fr 1.2fr 1fr;
    gap: 1.25rem;
    margin-bottom: 1.25rem;
  }
  .form-row-2 {
    display: grid;
    grid-template-columns: 1.2fr 1fr;
    gap: 1.25rem;
    margin-bottom: 1.25rem;
  }
  .upload-box {
    border: 2px dashed #cbd5e1;
    border-radius: 8px;
    padding: 1rem;
    background: #f8fafc;
    transition: all 0.2s ease;
  }
  .upload-box:hover {
    border-color: #94a3b8;
    background: #f1f5f9;
  }
  .current-media-card {
    display: flex;
    align-items: center;
    gap: 1rem;
    padding: 0.75rem 1rem;
    background: #f8fafc;
    border: 1px solid #e2e8f0;
    border-radius: 8px;
    margin-bottom: 0.75rem;
  }
  .gallery-manage-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(140px, 1fr));
    gap: 1rem;
    margin-bottom: 1.5rem;
  }
  .gallery-manage-card {
    position: relative;
    background: #ffffff;
    border: 1px solid #e2e8f0;
    border-radius: 8px;
    overflow: hidden;
    box-shadow: 0 2px 6px rgba(0,0,0,0.04);
  }
  .gallery-manage-card img {
    width: 100%;
    height: 100px;
    object-fit: cover;
    display: block;
  }
  .gallery-manage-footer {
    padding: 0.4rem 0.5rem;
    background: #f8fafc;
    border-top: 1px solid #e2e8f0;
    display: flex;
    align-items: center;
    justify-content: center;
  }
  .gallery-manage-footer label {
    font-size: 0.75rem;
    color: #ef4444;
    cursor: pointer;
    display: flex;
    align-items: center;
    gap: 4px;
    margin: 0;
    font-weight: 600;
  }
  .gallery-preview-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(110px, 1fr));
    gap: 0.75rem;
    margin-top: 1rem;
  }
  .gallery-preview-item {
    position: relative;
    border-radius: 8px;
    overflow: hidden;
    height: 90px;
    border: 1px solid #e2e8f0;
    background: #000;
  }
  .gallery-preview-item img {
    width: 100%;
    height: 100%;
    object-fit: cover;
  }
  .ql-container {
    border-bottom-left-radius: 8px;
    border-bottom-right-radius: 8px;
    font-family: inherit;
    font-size: 0.95rem;
    min-height: 220px;
  }
  .ql-toolbar {
    border-top-left-radius: 8px;
    border-top-right-radius: 8px;
    background: #f8fafc;
  }
  @media (max-width: 991px) {
    .form-row-4, .form-row-2 {
      grid-template-columns: 1fr !important;
    }
  }
</style>
@endpush

@section('content')
  <form action="{{ route('admin.portfolios.update', $portfolio->id) }}" method="POST" enctype="multipart/form-data" id="portfolioForm">
    @csrf
    @method('PUT')

    <!-- ==========================================
         CARD 1: FRONT CARD (Overview & Thumbnail)
         ========================================== -->
    <div class="admin-form-card">
      <div class="card-head">
        <div>
          <div style="font-weight: 700; font-size: 1.1rem; color: #0f172a;">Card 1: Front Card Settings</div>
          <div style="font-size: 0.83rem; color: #64748b;">Title, URL slug, date, display order, short overview, and listing thumbnail image.</div>
        </div>
        <span class="card-badge primary">Frontend Card</span>
      </div>

      <!-- 4 Fields in One Row: Title, Slug, Date, Order -->
      <div class="form-row-4">
        <!-- Project Title -->
        <div>
          <label class="form-label" for="title">Project Title <span style="color: #ef4444;">*</span></label>
          <input type="text" name="title" id="title" class="form-control" value="{{ old('title', $portfolio->title) }}" placeholder="e.g. 51 Shaktipith Parikrama Mahotsav" required />
          @error('title')
            <div style="color: #ef4444; font-size: 0.8rem; margin-top: 4px;">{{ $message }}</div>
          @enderror
        </div>

        <!-- URL Slug -->
        <div>
          <label class="form-label" for="slug">URL Slug</label>
          <input type="text" name="slug" id="slug" class="form-control" value="{{ old('slug', $portfolio->slug) }}" placeholder="e.g. 51-shaktipith-parikrama-mahotsav" />
          @error('slug')
            <div style="color: #ef4444; font-size: 0.8rem; margin-top: 4px;">{{ $message }}</div>
          @enderror
        </div>

        <!-- Project Date -->
        <div>
          <label class="form-label" for="project_date">Project Date</label>
          <input type="date" name="project_date" id="project_date" class="form-control" value="{{ old('project_date', $portfolio->project_date ? $portfolio->project_date->format('Y-m-d') : '') }}" />
          @error('project_date')
            <div style="color: #ef4444; font-size: 0.8rem; margin-top: 4px;">{{ $message }}</div>
          @enderror
        </div>

        <!-- Display Order -->
        <div>
          <label class="form-label" for="order">Display Order</label>
          <input type="number" name="order" id="order" class="form-control" value="{{ old('order', $portfolio->order) }}" min="0" />
          @error('order')
            <div style="color: #ef4444; font-size: 0.8rem; margin-top: 4px;">{{ $message }}</div>
          @enderror
        </div>
      </div>

      <!-- 2 Fields in One Row: Short Description & Thumbnail Image -->
      <div class="form-row-2">
        <!-- Short Description -->
        <div>
          <label class="form-label" for="short_description">Short Description <span style="font-size: 0.75rem; color: #94a3b8;">(Appears on portfolio list)</span></label>
          <textarea name="short_description" id="short_description" rows="5" class="form-control" placeholder="Brief summary of the project, scope, and key deliverables...">{{ old('short_description', $portfolio->short_description) }}</textarea>
          @error('short_description')
            <div style="color: #ef4444; font-size: 0.8rem; margin-top: 4px;">{{ $message }}</div>
          @enderror
        </div>

        <!-- Thumbnail Image -->
        <div>
          <label class="form-label" for="image">Front Thumbnail Image</label>
          
          @if($portfolio->image)
            <div class="current-media-card">
              <img src="{{ $portfolio->image_url }}" alt="{{ $portfolio->title }}" style="width: 70px; height: 50px; object-fit: cover; border-radius: 6px; border: 1px solid #cbd5e1;" />
              <div style="flex: 1; min-width: 0;">
                <div style="font-size: 0.8rem; font-weight: 600; color: #0f172a;">Current Thumbnail</div>
                <div style="font-size: 0.72rem; color: #64748b; word-break: break-all;">{{ $portfolio->image }}</div>
              </div>
            </div>
          @endif

          <div class="upload-box">
            <input type="file" name="image" id="image" class="form-control" accept="image/*" onchange="previewThumbnail(event)" />
            <div style="font-size: 0.75rem; color: #64748b; margin-top: 6px;">Leave blank to keep existing thumbnail image.</div>
            <div id="thumbPreviewWrap" style="display: none; margin-top: 10px;">
              <img id="thumbPreview" src="" alt="Preview" style="max-height: 80px; border-radius: 6px; border: 1px solid #cbd5e1;" />
            </div>
          </div>
          @error('image')
            <div style="color: #ef4444; font-size: 0.8rem; margin-top: 4px;">{{ $message }}</div>
          @enderror
        </div>
      </div>

      <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1.5rem; margin-top: 1rem;">
        <!-- Status -->
        <div>
          <label class="form-label">Status <span style="color: #ef4444;">*</span></label>
          <div style="display: flex; gap: 1.5rem; align-items: center; margin-top: 0.35rem;">
            <label style="display: flex; align-items: center; gap: 0.4rem; cursor: pointer; font-size: 0.92rem; color: #0f172a;">
              <input type="radio" name="status" value="active" {{ old('status', $portfolio->status) === 'active' ? 'checked' : '' }} />
              <span style="display: inline-flex; align-items: center; gap: 5px;">
                <span style="width: 8px; height: 8px; border-radius: 50%; background: #16a34a;"></span> Active
              </span>
            </label>
            <label style="display: flex; align-items: center; gap: 0.4rem; cursor: pointer; font-size: 0.92rem; color: #0f172a;">
              <input type="radio" name="status" value="deactive" {{ old('status', $portfolio->status) === 'deactive' ? 'checked' : '' }} />
              <span style="display: inline-flex; align-items: center; gap: 5px;">
                <span style="width: 8px; height: 8px; border-radius: 50%; background: #94a3b8;"></span> Deactive
              </span>
            </label>
          </div>
        </div>

        <!-- Project Status -->
        <div>
          <label class="form-label">Project Status <span style="color: #ef4444;">*</span></label>
          <div style="display: flex; gap: 1.5rem; align-items: center; margin-top: 0.35rem;">
            <label style="display: flex; align-items: center; gap: 0.4rem; cursor: pointer; font-size: 0.92rem; color: #0f172a;">
              <input type="radio" name="project_status" value="ongoing" {{ old('project_status', $portfolio->project_status) === 'ongoing' ? 'checked' : '' }} />
              <span style="display: inline-flex; align-items: center; gap: 5px;">
                <span style="width: 8px; height: 8px; border-radius: 50%; background: #f59e0b;"></span> Ongoing
              </span>
            </label>
            <label style="display: flex; align-items: center; gap: 0.4rem; cursor: pointer; font-size: 0.92rem; color: #0f172a;">
              <input type="radio" name="project_status" value="completed" {{ old('project_status', $portfolio->project_status) === 'completed' ? 'checked' : '' }} />
              <span style="display: inline-flex; align-items: center; gap: 5px;">
                <span style="width: 8px; height: 8px; border-radius: 50%; background: #3b82f6;"></span> Completed
              </span>
            </label>
          </div>
        </div>
      </div>
    </div>

    <!-- ==========================================
         CARD 2: DETAIL CARD (Banner, Rich Description, Gallery)
         ========================================== -->
    <div class="admin-form-card">
      <div class="card-head">
        <div>
          <div style="font-weight: 700; font-size: 1.1rem; color: #0f172a;">Card 2: Detail Page Content &amp; Gallery</div>
          <div style="font-size: 0.83rem; color: #64748b;">Full banner image, rich description editor, and dynamic multi-image gallery showcase.</div>
        </div>
        <span class="card-badge accent">Detail Page &amp; Gallery</span>
      </div>

      <!-- Main Banner Image -->
      <div style="margin-bottom: 1.5rem;">
        <label class="form-label" for="banner_image">Full Banner Image <span style="font-size: 0.75rem; color: #94a3b8;">(Hero Showcase on Detail Page)</span></label>
        
        @if($portfolio->banner_image)
          <div class="current-media-card">
            <img src="{{ $portfolio->banner_image_url }}" alt="{{ $portfolio->title }}" style="width: 120px; height: 60px; object-fit: cover; border-radius: 6px; border: 1px solid #cbd5e1;" />
            <div style="flex: 1; min-width: 0;">
              <div style="font-size: 0.8rem; font-weight: 600; color: #0f172a;">Current Detail Banner</div>
              <div style="font-size: 0.72rem; color: #64748b; word-break: break-all;">{{ $portfolio->banner_image }}</div>
            </div>
          </div>
        @endif

        <div class="upload-box">
          <input type="file" name="banner_image" id="banner_image" class="form-control" accept="image/*" onchange="previewBanner(event)" />
          <div style="font-size: 0.75rem; color: #64748b; margin-top: 6px;">Leave blank to keep existing banner. Recommended: 1920x800 px landscape image.</div>
          <div id="bannerPreviewWrap" style="display: none; margin-top: 10px;">
            <img id="bannerPreview" src="" alt="Banner Preview" style="max-height: 140px; width: 100%; object-fit: cover; border-radius: 6px; border: 1px solid #cbd5e1;" />
          </div>
        </div>
        @error('banner_image')
          <div style="color: #ef4444; font-size: 0.8rem; margin-top: 4px;">{{ $message }}</div>
        @enderror
      </div>

      <!-- Rich Description (Quill.js) -->
      <div style="margin-bottom: 2rem;">
        <label class="form-label">Full Project Description <span style="font-size: 0.75rem; color: #94a3b8;">(Rich Text with Bold, Headings, Lists, etc.)</span></label>
        <div id="quill-editor" style="background: #ffffff;">{!! old('full_description', $portfolio->description) !!}</div>
        <input type="hidden" name="full_description" id="full_description" value="{{ old('full_description', $portfolio->description) }}" />
        @error('full_description')
          <div style="color: #ef4444; font-size: 0.8rem; margin-top: 4px;">{{ $message }}</div>
        @enderror
      </div>

      <!-- Visual Separator Line -->
      <div style="height: 1px; background: #e2e8f0; margin: 2rem 0;"></div>

      <!-- Gallery Section (Multiple Photos) -->
      <div>
        <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 0.75rem;">
          <div>
            <div style="font-weight: 700; font-size: 1rem; color: #0f172a;">Project Gallery Photos</div>
            <div style="font-size: 0.82rem; color: #64748b;">Manage existing gallery images or upload additional photos.</div>
          </div>
        </div>

        <!-- Existing Gallery Images Grid -->
        @php
          $galleryList = is_array($portfolio->gallery_images) ? $portfolio->gallery_images : (json_decode($portfolio->gallery_images, true) ?: []);
        @endphp

        @if(!empty($galleryList))
          <div style="font-size: 0.85rem; font-weight: 600; color: #334155; margin-bottom: 0.5rem;">Current Gallery Images ({{ count($galleryList) }}):</div>
          <div class="gallery-manage-grid">
            @foreach($galleryList as $gImg)
              @php
                $imgSrc = str_starts_with($gImg, 'http') ? $gImg : asset('storage/' . $gImg);
              @endphp
              <div class="gallery-manage-card">
                <img src="{{ $imgSrc }}" alt="Gallery photo" />
                <div class="gallery-manage-footer">
                  <label>
                    <input type="checkbox" name="delete_gallery_images[]" value="{{ $gImg }}" />
                    <span>Delete</span>
                  </label>
                </div>
              </div>
            @endforeach
          </div>
        @endif

        <div class="upload-box">
          <label style="font-weight: 600; font-size: 0.88rem; color: #0f172a; margin-bottom: 0.35rem; display: block;">Upload Additional Gallery Photos</label>
          <input type="file" name="gallery_images[]" id="gallery_images" class="form-control" accept="image/*" multiple onchange="previewGallery(event)" />
          <div style="font-size: 0.75rem; color: #64748b; margin-top: 6px;">You can select multiple images to append to this project's gallery.</div>
          
          <!-- Selected Photos Preview Grid -->
          <div id="galleryPreviewGrid" class="gallery-preview-grid" style="display: none;"></div>
        </div>
        @error('gallery_images')
          <div style="color: #ef4444; font-size: 0.8rem; margin-top: 4px;">{{ $message }}</div>
        @enderror
      </div>
    </div>

    <!-- ==========================================
         CARD 3: VIDEO GALLERY
         ========================================== -->
    <div class="admin-form-card">
      <div class="card-head">
        <div>
          <div style="font-weight: 700; font-size: 1.1rem; color: #0f172a;">Card 3: Video Gallery &amp; Motion Highlights</div>
          <div style="font-size: 0.83rem; color: #64748b;">Upload video files &amp; poster images for the expandable video section on the detail page.</div>
        </div>
        <span class="card-badge" style="background:#f0fdf4; color:#16a34a;">Video Section</span>
      </div>

      <div id="videoEntriesList">
        @php
          $savedVideos = is_array($portfolio->videos) ? $portfolio->videos : (json_decode($portfolio->videos ?? '[]', true) ?: []);
        @endphp

        @foreach($savedVideos as $vi => $vid)
        <div class="video-entry-block" id="video-entry-{{ $vi }}" style="border:1px solid #e2e8f0; border-radius:10px; padding:1.25rem; margin-bottom:1.25rem; background:#f8fafc; position:relative;">
          <div style="font-weight:700; font-size:0.88rem; color:#475569; text-transform:uppercase; letter-spacing:0.5px; margin-bottom:1rem;">
            Video #{{ $vi + 1 }}
          </div>

          <!-- Hidden existing paths -->
          <input type="hidden" name="existing_video_paths[{{ $vi }}]"  value="{{ $vid['video'] ?? '' }}" />
          <input type="hidden" name="existing_poster_paths[{{ $vi }}]" value="{{ $vid['poster'] ?? '' }}" />

          <div style="display:grid; grid-template-columns:2fr 1fr 1fr; gap:1rem; margin-bottom:1rem;">
            <div>
              <label class="form-label">Video Title <span style="color:#ef4444;">*</span></label>
              <input type="text" name="video_titles[{{ $vi }}]" class="form-control" value="{{ $vid['title'] ?? '' }}" placeholder="e.g. Motion Showcase & 3D Mapping" />
            </div>
            <div>
              <label class="form-label">Tag / Category</label>
              <input type="text" name="video_tags[{{ $vi }}]" class="form-control" value="{{ $vid['tag'] ?? '' }}" placeholder="e.g. Projection Mapping" />
            </div>
            <div>
              <label class="form-label">Duration</label>
              <input type="text" name="video_durations[{{ $vi }}]" class="form-control" value="{{ $vid['duration'] ?? '' }}" placeholder="e.g. 01:45" />
            </div>
          </div>

          <div style="margin-bottom:1rem;">
            <label class="form-label">Video Description</label>
            <textarea name="video_descriptions[{{ $vi }}]" rows="2" class="form-control" placeholder="Short description shown on hover...">{{ $vid['description'] ?? '' }}</textarea>
          </div>

          <div style="display:grid; grid-template-columns:1fr 1fr; gap:1rem;">
            <div>
              <label class="form-label">Video File <span style="font-size:0.72rem; color:#94a3b8;">(MP4 recommended, max 200MB)</span></label>
              @if(!empty($vid['video']))
                <div style="font-size:0.75rem; color:#16a34a; margin-bottom:6px;">
                  ✓ Current: <span style="color:#475569; word-break:break-all;">{{ basename($vid['video']) }}</span>
                </div>
              @endif
              <div class="upload-box">
                <input type="file" name="video_files[{{ $vi }}]" class="form-control" accept="video/mp4,video/webm,video/ogg" />
                <div style="font-size:0.72rem;color:#64748b;margin-top:4px;">Leave blank to keep existing video.</div>
              </div>
            </div>

            <div>
              <label class="form-label">Poster / Thumbnail Image <span style="font-size:0.72rem; color:#94a3b8;">(Shown before play)</span></label>
              @if(!empty($vid['poster']))
                @php
                  if (str_starts_with($vid['poster'], 'http')) {
                      $pSrc = $vid['poster'];
                  } elseif (str_starts_with($vid['poster'], 'assets/')) {
                      $pSrc = asset($vid['poster']);
                  } else {
                      $pSrc = asset('storage/' . $vid['poster']);
                  }
                @endphp
                <div style="margin-bottom:6px;">
                  <img src="{{ $pSrc }}" alt="poster" style="height:48px; border-radius:5px; border:1px solid #e2e8f0;" />
                </div>
              @endif
              <div class="upload-box">
                <input type="file" name="video_posters[{{ $vi }}]" class="form-control" accept="image/*" />
                <div style="font-size:0.72rem;color:#64748b;margin-top:4px;">Leave blank to keep existing poster.</div>
              </div>
            </div>
          </div>

          <!-- Delete this video entry checkbox -->
          <div style="margin-top:1rem; padding-top:0.75rem; border-top:1px solid #e2e8f0;">
            <label style="display:flex;align-items:center;gap:0.5rem;cursor:pointer;font-size:0.83rem;color:#ef4444;font-weight:600;">
              <input type="checkbox" name="delete_videos[]" value="{{ $vi }}" />
              Delete this video entry
            </label>
          </div>
        </div>
        @endforeach
      </div>

      <!-- Add New Video Entry Button -->
      <button type="button" id="addVideoBtn" onclick="addVideoEntry()" style="display:inline-flex;align-items:center;gap:0.5rem;padding:0.6rem 1.25rem;background:#eff6ff;color:#1545e9;border:1px dashed #93c5fd;border-radius:8px;font-size:0.88rem;font-weight:600;cursor:pointer;">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>
        Add Video Entry
      </button>
      <div style="font-size:0.78rem;color:#94a3b8;margin-top:8px;">You can add multiple videos. Each video can have its own file, poster, title, tag, duration, and description.</div>
    </div>

    <!-- Submit & Action Buttons -->
    <div style="display: flex; gap: 1rem; align-items: center; margin-bottom: 3rem;">
      <button type="submit" class="btn btn-primary" style="padding: 0.75rem 2rem; font-size: 0.95rem;">
        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
          <polyline points="20 6 9 17 4 12"></polyline>
        </svg>
        <span>Update Portfolio Project</span>
      </button>
      <a href="{{ route('admin.portfolios.index') }}" class="btn btn-secondary" style="padding: 0.75rem 1.5rem;">
        Cancel
      </a>
    </div>
  </form>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/quill@1.3.7/dist/quill.min.js"></script>
<script>
  // 1. Initialize Quill.js Rich Text Editor
  const quill = new Quill('#quill-editor', {
    theme: 'snow',
    placeholder: 'Write comprehensive project details, client background, engineering specifications, audio-visual technology setup, and outcomes...',
    modules: {
      toolbar: [
        [{ 'header': [1, 2, 3, 4, false] }],
        ['bold', 'italic', 'underline', 'strike'],
        [{ 'color': [] }, { 'background': [] }],
        [{ 'list': 'ordered'}, { 'list': 'bullet' }],
        ['blockquote', 'code-block'],
        ['link', 'clean']
      ]
    }
  });

  // Sync Quill HTML to hidden input on submit
  const portfolioForm = document.getElementById('portfolioForm');
  portfolioForm.addEventListener('submit', function() {
    const fullDescInput = document.getElementById('full_description');
    const editorHtml = quill.root.innerHTML;
    fullDescInput.value = editorHtml === '<p><br></p>' ? '' : editorHtml;
  });

  // 2. Live Thumbnail Preview
  function previewThumbnail(e) {
    const file = e.target.files[0];
    if (file) {
      const reader = new FileReader();
      reader.onload = function(evt) {
        document.getElementById('thumbPreview').src = evt.target.result;
        document.getElementById('thumbPreviewWrap').style.display = 'block';
      };
      reader.readAsDataURL(file);
    }
  }

  // 3. Live Banner Preview
  function previewBanner(e) {
    const file = e.target.files[0];
    if (file) {
      const reader = new FileReader();
      reader.onload = function(evt) {
        document.getElementById('bannerPreview').src = evt.target.result;
        document.getElementById('bannerPreviewWrap').style.display = 'block';
      };
      reader.readAsDataURL(file);
    }
  }

  // 4. Live Multi-Gallery Preview
  function previewGallery(e) {
    const files = e.target.files;
    const grid = document.getElementById('galleryPreviewGrid');
    grid.innerHTML = '';
    
    if (files.length > 0) {
      grid.style.display = 'grid';
      Array.from(files).forEach(file => {
        if (file.type.startsWith('image/')) {
          const reader = new FileReader();
          reader.onload = function(evt) {
            const item = document.createElement('div');
            item.className = 'gallery-preview-item';
            item.innerHTML = `<img src="${evt.target.result}" alt="Gallery preview" />`;
            grid.appendChild(item);
          };
          reader.readAsDataURL(file);
        }
      });
    } else {
      grid.style.display = 'none';
    }
  }
  // 5. Dynamic Video Entry Addition
  let videoEntryCount = {{ count($savedVideos ?? []) }};

  function addVideoEntry() {
    const idx = videoEntryCount++;
    const list = document.getElementById('videoEntriesList');
    const block = document.createElement('div');
    block.className = 'video-entry-block';
    block.id = `video-entry-${idx}`;
    block.style.cssText = 'border:1px solid #e2e8f0;border-radius:10px;padding:1.25rem;margin-bottom:1.25rem;background:#f8fafc;position:relative;';
    block.innerHTML = `
      <div style="font-weight:700;font-size:0.88rem;color:#475569;text-transform:uppercase;letter-spacing:0.5px;margin-bottom:1rem;">
        Video #${idx + 1}
      </div>
      <input type="hidden" name="existing_video_paths[${idx}]"  value="" />
      <input type="hidden" name="existing_poster_paths[${idx}]" value="" />

      <div style="display:grid;grid-template-columns:2fr 1fr 1fr;gap:1rem;margin-bottom:1rem;">
        <div>
          <label class="form-label">Video Title <span style="color:#ef4444;">*</span></label>
          <input type="text" name="video_titles[${idx}]" class="form-control" placeholder="e.g. Motion Showcase & 3D Mapping" />
        </div>
        <div>
          <label class="form-label">Tag / Category</label>
          <input type="text" name="video_tags[${idx}]" class="form-control" placeholder="e.g. Projection Mapping" />
        </div>
        <div>
          <label class="form-label">Duration</label>
          <input type="text" name="video_durations[${idx}]" class="form-control" placeholder="e.g. 01:45" />
        </div>
      </div>

      <div style="margin-bottom:1rem;">
        <label class="form-label">Video Description</label>
        <textarea name="video_descriptions[${idx}]" rows="2" class="form-control" placeholder="Short description shown on hover..."></textarea>
      </div>

      <div style="display:grid;grid-template-columns:1fr 1fr;gap:1rem;">
        <div>
          <label class="form-label">Video File <span style="font-size:0.72rem;color:#94a3b8;">(MP4 recommended, max 200MB)</span></label>
          <div class="upload-box">
            <input type="file" name="video_files[${idx}]" class="form-control" accept="video/mp4,video/webm,video/ogg" />
            <div style="font-size:0.72rem;color:#64748b;margin-top:4px;">Upload the video file for this entry.</div>
          </div>
        </div>
        <div>
          <label class="form-label">Poster / Thumbnail Image <span style="font-size:0.72rem;color:#94a3b8;">(Shown before play)</span></label>
          <div class="upload-box">
            <input type="file" name="video_posters[${idx}]" class="form-control" accept="image/*" />
            <div style="font-size:0.72rem;color:#64748b;margin-top:4px;">Upload a thumbnail or poster image.</div>
          </div>
        </div>
      </div>

      <div style="margin-top:1rem;padding-top:0.75rem;border-top:1px solid #e2e8f0;">
        <button type="button" onclick="this.closest('.video-entry-block').remove(); videoEntryCount--;" style="display:inline-flex;align-items:center;gap:5px;padding:0.35rem 0.85rem;background:#fef2f2;color:#ef4444;border:1px solid #fecaca;border-radius:6px;font-size:0.8rem;font-weight:600;cursor:pointer;">
          <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6l-1 14a2 2 0 0 1-2 2H8a2 2 0 0 1-2-2L5 6"></path></svg>
          Remove
        </button>
      </div>
    `;
    list.appendChild(block);
  }
</script>
@endpush
