@extends('backend.layouts.app')

@section('title', 'Add New Service')
@section('page_title', 'Services > Add New')

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
  .form-row-3 {
    display: grid;
    grid-template-columns: 2fr 1.5fr 1fr;
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
  .point-item-card {
    background: #ffffff;
    border: 1px solid #e2e8f0;
    border-radius: 8px;
    padding: 0.85rem 1rem;
    margin-bottom: 0.85rem;
    box-shadow: 0 1px 4px rgba(0,0,0,0.02);
  }
  .point-item-card:hover {
    border-color: #cbd5e1;
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
    .form-row-3, .form-row-2 {
      grid-template-columns: 1fr !important;
    }
  }
</style>
@endpush

@section('content')
  <div style="width: 100%; padding-bottom: 2rem;">
    
    <!-- Top Action Header -->
    <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 1.25rem;">
      <div>
        <h1 style="font-size: 1.45rem; font-weight: 700; color: var(--text-main); margin: 0;">Add New Service</h1>
        <p style="font-size: 0.86rem; color: var(--text-dim); margin: 0.2rem 0 0;">Create a new service with front card settings and a rich detailed showcase page.</p>
      </div>
      <a href="{{ route('admin.services.index') }}" class="btn btn-secondary">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
          <polyline points="15 18 9 12 15 6"></polyline>
        </svg>
        <span>Back to List</span>
      </a>
    </div>

    <form action="{{ route('admin.services.store') }}" method="POST" enctype="multipart/form-data" id="serviceForm">
      @csrf

      <!-- ========================================================================= -->
      <!-- CARD 1: FRONT CARD SETTINGS -->
      <!-- ========================================================================= -->
      <div class="admin-form-card">
        <div class="card-head">
          <div>
            <div style="display: flex; align-items: center; gap: 0.65rem;">
              <span class="card-badge primary">Card 1</span>
              <h2 style="font-size: 1.12rem; font-weight: 700; color: var(--text-main); margin: 0;">Front Card Settings</h2>
            </div>
            <p style="font-size: 0.82rem; color: var(--text-dim); margin: 0.2rem 0 0;">Configures the service preview card displayed on the Home and Services grid pages.</p>
          </div>
        </div>

        <!-- Row 1: Title, Slug, Display Order (3 in one line) -->
        <div class="form-row-3">
          <!-- Service Title -->
          <div class="form-group" style="margin-bottom: 0;">
            <label class="form-label" for="title">Service Title <span style="color: #ef4444;">*</span></label>
            <input type="text" id="title" name="title" class="form-control" placeholder="e.g. 3D Projection Mapping" value="{{ old('title') }}" required onkeyup="autoGenerateSlug(this.value)" />
            @error('title')
              <div style="color: #ef4444; font-size: 0.8rem; margin-top: 4px;">{{ $message }}</div>
            @enderror
          </div>

          <!-- URL Slug -->
          <div class="form-group" style="margin-bottom: 0;">
            <label class="form-label" for="slug">URL Slug <span style="color: var(--text-dim); font-size: 0.78rem;">(Auto-generated)</span></label>
            <input type="text" id="slug" name="slug" class="form-control" placeholder="e.g. 3d-projection-mapping" value="{{ old('slug') }}" />
            @error('slug')
              <div style="color: #ef4444; font-size: 0.8rem; margin-top: 4px;">{{ $message }}</div>
            @enderror
          </div>

          <!-- Display Order -->
          <div class="form-group" style="margin-bottom: 0;">
            <label class="form-label" for="order">Display Order</label>
            <input type="number" id="order" name="order" class="form-control" value="{{ old('order', $nextOrder) }}" min="0" />
            @error('order')
              <div style="color: #ef4444; font-size: 0.8rem; margin-top: 4px;">{{ $message }}</div>
            @enderror
          </div>
        </div>

        <!-- Row 2: Short Description & Service Image (2 in one line) -->
        <div class="form-row-2">
          <!-- Short Description -->
          <div class="form-group" style="margin-bottom: 0;">
            <label class="form-label" for="short_description">Short Description <span style="color: #ef4444;">*</span> <span style="color: var(--text-dim); font-size: 0.78rem;">(Card hover text)</span></label>
            <textarea id="short_description" name="short_description" class="form-control" rows="4" placeholder="Enter concise summary of this turnkey engineering service..." style="resize: vertical; height: 125px;" required>{{ old('short_description') }}</textarea>
            @error('short_description')
              <div style="color: #ef4444; font-size: 0.8rem; margin-top: 4px;">{{ $message }}</div>
            @enderror
          </div>

          <!-- Service Image Upload -->
          <div class="form-group" style="margin-bottom: 0;">
            <label class="form-label" for="image">Service Card Image <span style="color: var(--text-dim); font-size: 0.78rem;">(Home & Grid card)</span></label>
            <div class="upload-box" style="min-height: 125px; display: flex; flex-direction: column; justify-content: center; align-items: center;">
              <input type="file" id="image" name="image" accept="image/*" class="form-control" style="font-size: 0.82rem; padding: 0.35rem 0.65rem;" onchange="previewCardImage(event)" />
              <div style="font-size: 0.74rem; color: var(--text-dim); margin-top: 0.3rem;">Supports JPG, PNG, WEBP, AVIF (Max: 10MB)</div>
              
              <div id="cardImagePreviewWrap" style="display: none; margin-top: 0.5rem;">
                <img id="cardImagePreview" src="#" alt="Card Preview" style="height: 45px; width: 75px; object-fit: cover; border-radius: 4px; box-shadow: 0 2px 6px rgba(0,0,0,0.1);" />
              </div>
            </div>
            @error('image')
              <div style="color: #ef4444; font-size: 0.8rem; margin-top: 4px;">{{ $message }}</div>
            @enderror
          </div>
        </div>

        <!-- Status -->
        <div class="form-group" style="margin-bottom: 0; padding-top: 0.25rem;">
          <label class="form-label" style="font-size: 0.88rem; margin-bottom: 0.3rem;">Publish Status</label>
          <div style="display: flex; gap: 1.5rem;">
            <label style="display: flex; align-items: center; gap: 0.45rem; cursor: pointer; font-size: 0.9rem;">
              <input type="radio" name="status" value="active" {{ old('status', 'active') === 'active' ? 'checked' : '' }} />
              <span style="font-weight: 600; color: #16a34a;">Active (Published)</span>
            </label>
            <label style="display: flex; align-items: center; gap: 0.45rem; cursor: pointer; font-size: 0.9rem;">
              <input type="radio" name="status" value="deactive" {{ old('status') === 'deactive' ? 'checked' : '' }} />
              <span style="font-weight: 600; color: #64748b;">Deactive (Draft)</span>
            </label>
          </div>
        </div>
      </div>

      <!-- ========================================================================= -->
      <!-- CARD 2: DETAIL CARD SETTINGS -->
      <!-- ========================================================================= -->
      <div class="admin-form-card">
        <div class="card-head">
          <div>
            <div style="display: flex; align-items: center; gap: 0.65rem;">
              <span class="card-badge accent">Card 2</span>
              <h2 style="font-size: 1.12rem; font-weight: 700; color: var(--text-main); margin: 0;">Service Detail Page Settings</h2>
            </div>
            <p style="font-size: 0.82rem; color: var(--text-dim); margin: 0.2rem 0 0;">Configures the dedicated inner service showcase page (/service/{slug}), banner, rich text description, and Why Choose Us section.</p>
          </div>
        </div>

        <!-- Full Banner Image Upload -->
        <div class="form-group" style="margin-bottom: 1.5rem;">
          <label class="form-label" for="banner_image">Full Banner Image <span style="color: var(--text-dim); font-size: 0.78rem;">(Hero Banner for Service Detail Page)</span></label>
          <div class="upload-box" style="padding: 1.25rem;">
            <div style="max-width: 520px; margin: 0 auto; text-align: center;">
              <input type="file" id="banner_image" name="banner_image" accept="image/*" class="form-control" onchange="previewBannerImage(event)" />
              <div style="font-size: 0.76rem; color: var(--text-dim); margin-top: 0.35rem;">High-resolution panoramic banner image (Recommended: 1600x700 or 1920x800)</div>
              
              <div id="bannerPreviewWrap" style="display: none; margin-top: 0.75rem;">
                <div style="font-size: 0.78rem; font-weight: 600; color: #16a34a; margin-bottom: 0.25rem;">Banner Preview:</div>
                <img id="bannerPreview" src="#" alt="Banner Preview" style="width: 100%; height: 130px; object-fit: cover; border-radius: 6px; box-shadow: 0 4px 12px rgba(0,0,0,0.1);" />
              </div>
            </div>
          </div>
          @error('banner_image')
            <div style="color: #ef4444; font-size: 0.8rem; margin-top: 4px;">{{ $message }}</div>
          @enderror
        </div>

        <!-- Full Description (Rich Text Editor) -->
        <div class="form-group" style="margin-bottom: 1.75rem;">
          <label class="form-label" for="full_description_editor">Full Description &amp; Technical Scope <span style="color: var(--text-dim); font-size: 0.78rem;">(Rich text with headings, bold, font sizes &amp; lists)</span></label>
          <div id="quillEditor" style="background: #ffffff;">{!! old('full_description') !!}</div>
          <input type="hidden" name="full_description" id="full_description" value="{{ old('full_description') }}" />
          @error('full_description')
            <div style="color: #ef4444; font-size: 0.8rem; margin-top: 4px;">{{ $message }}</div>
          @enderror
        </div>

        <!-- Visual Separator -->
        <hr style="border: 0; border-top: 2px dashed #e2e8f0; margin: 2rem 0 1.5rem;" />

        <!-- ========================================================================= -->
        <!-- WHY CHOOSE US SECTION -->
        <!-- ========================================================================= -->
        <div style="margin-bottom: 1rem;">
          <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 1rem;">
            <div>
              <h3 style="font-size: 1.05rem; font-weight: 700; color: var(--text-main); margin: 0;">Why Choose Us Section</h3>
              <p style="font-size: 0.82rem; color: var(--text-dim); margin: 0.2rem 0 0;">Add custom reasons, engineering highlights, and an illustrative section image for this service.</p>
            </div>
            <button type="button" class="btn btn-secondary" onclick="addWhyPoint()" style="font-size: 0.82rem; padding: 0.4rem 0.85rem; border-color: #cbd5e1; font-weight: 600;">
              <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                <line x1="12" y1="5" x2="12" y2="19"></line>
                <line x1="5" y1="12" x2="19" y2="12"></line>
              </svg>
              <span>+ Add Point</span>
            </button>
          </div>

          <div class="form-row-2" style="align-items: start;">
            <!-- Why Choose Us Image Upload -->
            <div class="form-group" style="margin-bottom: 0;">
              <label class="form-label" for="why_choose_us_image">Why Choose Us Image <span style="color: var(--text-dim); font-size: 0.78rem;">(Section visual)</span></label>
              <div class="upload-box" style="padding: 1rem;">
                <input type="file" id="why_choose_us_image" name="why_choose_us_image" accept="image/*" class="form-control" onchange="previewWhyImage(event)" />
                <div style="font-size: 0.74rem; color: var(--text-dim); margin-top: 0.3rem;">Supports JPG, PNG, WEBP, AVIF (Max: 10MB)</div>
                
                <div id="whyImagePreviewWrap" style="display: none; margin-top: 0.6rem;">
                  <img id="whyImagePreview" src="#" alt="Why Choose Us Preview" style="width: 100%; height: 120px; object-fit: cover; border-radius: 6px; box-shadow: 0 4px 10px rgba(0,0,0,0.1);" />
                </div>
              </div>
              @error('why_choose_us_image')
                <div style="color: #ef4444; font-size: 0.8rem; margin-top: 4px;">{{ $message }}</div>
              @enderror
            </div>

            <!-- Repeatable Points Container -->
            <div class="form-group" style="margin-bottom: 0;">
              <label class="form-label">Key Highlights &amp; Reasons (Multiple Points)</label>
              <div id="whyPointsContainer">
                <div class="point-item-card" id="point-row-0">
                  <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 0.4rem;">
                    <span style="font-size: 0.8rem; font-weight: 700; color: #475569;">Point #1</span>
                    <button type="button" onclick="removePoint('point-row-0')" style="background:none; border:none; color:#ef4444; cursor:pointer; font-size:0.78rem; font-weight:600; display:flex; align-items:center; gap:3px;">
                      <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg>
                      Remove
                    </button>
                  </div>
                  <input type="text" name="why_choose_us_points[0][title]" class="form-control" placeholder="Point Title (e.g. Millimeter-Precision LiDAR Scanning)" style="margin-bottom: 0.4rem; font-size: 0.88rem;" />
                  <textarea name="why_choose_us_points[0][description]" class="form-control" rows="2" placeholder="Point Description / detail summary..." style="font-size: 0.84rem; resize: vertical;"></textarea>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Submit Buttons -->
        <div style="display: flex; justify-content: flex-end; gap: 1rem; border-top: 1px solid var(--border-color); padding-top: 1.25rem; margin-top: 1.5rem;">
          <a href="{{ route('admin.services.index') }}" class="btn btn-secondary">Cancel</a>
          <button type="submit" class="btn btn-primary" style="min-width: 150px; justify-content: center; font-weight: 600;">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
              <path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"></path>
              <polyline points="17 21 17 13 7 13 7 21"></polyline>
              <polyline points="7 3 7 8 15 8"></polyline>
            </svg>
            <span>Save Service</span>
          </button>
        </div>
      </div>
    </form>
  </div>

@push('scripts')
<!-- Quill.js Rich Text Editor Script -->
<script src="https://cdn.jsdelivr.net/npm/quill@1.3.7/dist/quill.min.js"></script>
<script>
  // Initialize Quill Editor
  var quill = new Quill('#quillEditor', {
    theme: 'snow',
    placeholder: 'Write comprehensive technical scope, execution workflow, system architectures, and specifications...',
    modules: {
      toolbar: [
        [{ 'header': [1, 2, 3, 4, false] }],
        [{ 'size': ['small', false, 'large', 'huge'] }],
        ['bold', 'italic', 'underline', 'strike'],
        [{ 'color': [] }, { 'background': [] }],
        [{ 'list': 'ordered'}, { 'list': 'bullet' }],
        ['blockquote', 'code-block'],
        [{ 'align': [] }],
        ['link', 'clean']
      ]
    }
  });

  // Sync Quill content on Form Submit
  document.getElementById('serviceForm').onsubmit = function() {
    var fullDesc = document.querySelector('input[name=full_description]');
    fullDesc.value = quill.root.innerHTML;
  };

  // Auto-generate slug
  function autoGenerateSlug(text) {
    var slugInput = document.getElementById('slug');
    if (!slugInput.dataset.manual) {
      slugInput.value = text.toLowerCase()
        .replace(/[^\w\s-]/g, '')
        .trim()
        .replace(/[\s_-]+/g, '-');
    }
  }
  document.getElementById('slug').addEventListener('input', function() {
    this.dataset.manual = "true";
  });

  // Live Image Previews
  function previewCardImage(event) {
    var input = event.target;
    var preview = document.getElementById('cardImagePreview');
    var wrap = document.getElementById('cardImagePreviewWrap');
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function(e) { preview.src = e.target.result; wrap.style.display = 'block'; }
      reader.readAsDataURL(input.files[0]);
    } else { wrap.style.display = 'none'; }
  }

  function previewBannerImage(event) {
    var input = event.target;
    var preview = document.getElementById('bannerPreview');
    var wrap = document.getElementById('bannerPreviewWrap');
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function(e) { preview.src = e.target.result; wrap.style.display = 'block'; }
      reader.readAsDataURL(input.files[0]);
    } else { wrap.style.display = 'none'; }
  }

  function previewWhyImage(event) {
    var input = event.target;
    var preview = document.getElementById('whyImagePreview');
    var wrap = document.getElementById('whyImagePreviewWrap');
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function(e) { preview.src = e.target.result; wrap.style.display = 'block'; }
      reader.readAsDataURL(input.files[0]);
    } else { wrap.style.display = 'none'; }
  }

  // Dynamic Why Choose Us Points
  var pointIndex = 1;
  function addWhyPoint() {
    var container = document.getElementById('whyPointsContainer');
    var rowId = 'point-row-' + pointIndex;
    var count = container.children.length + 1;
    var html = `
      <div class="point-item-card" id="${rowId}">
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 0.4rem;">
          <span style="font-size: 0.8rem; font-weight: 700; color: #475569;">Point #${count}</span>
          <button type="button" onclick="removePoint('${rowId}')" style="background:none; border:none; color:#ef4444; cursor:pointer; font-size:0.78rem; font-weight:600; display:flex; align-items:center; gap:3px;">
            <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg>
            Remove
          </button>
        </div>
        <input type="text" name="why_choose_us_points[${pointIndex}][title]" class="form-control" placeholder="Point Title (e.g. Turnkey Engineering Delivery)" style="margin-bottom: 0.4rem; font-size: 0.88rem;" />
        <textarea name="why_choose_us_points[${pointIndex}][description]" class="form-control" rows="2" placeholder="Point Description / detail summary..." style="font-size: 0.84rem; resize: vertical;"></textarea>
      </div>
    `;
    container.insertAdjacentHTML('beforeend', html);
    pointIndex++;
  }

  function removePoint(rowId) {
    var el = document.getElementById(rowId);
    if (el) el.remove();
  }
</script>
@endpush
@endsection
