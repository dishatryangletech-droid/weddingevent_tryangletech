@extends('backend.layouts.app')

@section('title', 'Edit Portfolio Item')

@push('styles')
<style>
  .admin-form-card { background: #fff; border-radius: 12px; border: 1px solid #e2e8f0; padding: 2rem; margin-bottom: 2rem; box-shadow: 0 1px 3px rgba(0,0,0,0.05); }
  .form-section-title { font-size: 1.1rem; font-weight: 700; color: #0f172a; margin-bottom: 1.25rem; padding-bottom: 0.5rem; border-bottom: 1px solid #e2e8f0; }
  .form-row-2 { display: grid; grid-template-columns: 1fr 1fr; gap: 1.5rem; margin-bottom: 1.25rem; }
  .form-row-3 { display: grid; grid-template-columns: 1fr 1fr 1fr; gap: 1.5rem; margin-bottom: 1.25rem; }
  .form-row-4 { display: grid; grid-template-columns: repeat(4, 1fr); gap: 1.5rem; margin-bottom: 1.25rem; }
  @media (max-width: 992px) { .form-row-3, .form-row-4 { grid-template-columns: 1fr 1fr; } }
  @media (max-width: 768px) { .form-row-2, .form-row-3, .form-row-4 { grid-template-columns: 1fr; } }
  .preview-box { margin-top: 0.75rem; border: 1px dashed #cbd5e1; border-radius: 8px; padding: 0.5rem; text-align: center; background: #f8fafc; }
  .preview-box img { max-height: 120px; max-width: 100%; border-radius: 6px; object-fit: cover; }
</style>
<!-- CKEditor -->
<script src="https://cdn.ckeditor.com/4.21.0/standard/ckeditor.js"></script>
@endpush

@section('content')
  <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1.5rem;">
    <h2 style="font-size: 1.25rem; font-weight: 700; color: #0f172a; margin: 0;">Edit Portfolio Item</h2>
    <a href="{{ route('admin.portfolio-page.items.index') }}" class="btn btn-light">&larr; Back to List</a>
  </div>

  <form action="{{ route('admin.portfolio-page.items.update', $item->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <!-- Basic Information (Card on Portfolio Page) -->
    <div class="admin-form-card">
      <div class="form-section-title">1. Basic Information (Card on Portfolio Page)</div>
      
      <div class="form-row-2">
        <div class="form-group">
          <label class="form-label" style="font-weight: 600;">Title <span style="color:red;">*</span></label>
          <input type="text" name="title" value="{{ old('title', $item->title) }}" class="form-control" required placeholder="e.g. Jennifer & Oliver" />
        </div>
        <div class="form-group">
          <label class="form-label" style="font-weight: 600;">Portfolio Tag</label>
          <select name="portfolio_tag_id" class="form-control">
            <option value="">-- Select Tag --</option>
            @foreach($tags as $tag)
              <option value="{{ $tag->id }}" {{ old('portfolio_tag_id', $item->portfolio_tag_id) == $tag->id ? 'selected' : '' }}>{{ $tag->name }}</option>
            @endforeach
          </select>
        </div>
      </div>

      <div class="form-row-2">
        <div class="form-group">
          <label class="form-label" style="font-weight: 600;">Subtitle / Description</label>
          <input type="text" name="subtitle" value="{{ old('subtitle', $item->subtitle) }}" class="form-control" placeholder="e.g. Romantic Botanical Garden Celebration" />
        </div>
        <div class="form-group">
          <label class="form-label" style="font-weight: 600;">Main Card Image</label>
          <input type="file" name="image" class="form-control" accept="image/*" onchange="previewImg(this, 'mainImgPrev')" />
          <div class="preview-box">
            <img id="mainImgPrev" src="{{ $item->image_url }}" />
          </div>
        </div>
      </div>

      <div class="form-row-3">
        <div class="form-group">
          <label class="form-label" style="font-weight: 600;">Sort Order</label>
          <input type="number" name="sort_order" value="{{ old('sort_order', $item->sort_order) }}" class="form-control" />
        </div>
        <div class="form-group">
          <label class="form-label" style="font-weight: 600;">Status <span style="color:red;">*</span></label>
          <select name="status" class="form-control" required>
            <option value="active" {{ old('status', $item->status) === 'active' ? 'selected' : '' }}>Active</option>
            <option value="deactive" {{ old('status', $item->status) === 'deactive' ? 'selected' : '' }}>Deactive</option>
          </select>
        </div>
      </div>
    </div>

    <!-- Detail Page Header -->
    <div class="admin-form-card">
      <div class="form-section-title">2. Detail Page Information</div>
      
      <div class="form-row-4">
        <div class="form-group">
          <label class="form-label" style="font-weight: 600;">Client Name (Optional)</label>
          <input type="text" name="client_name" value="{{ old('client_name', $item->client_name) }}" class="form-control" />
        </div>
        <div class="form-group">
          <label class="form-label" style="font-weight: 600;">Date Text</label>
          <input type="text" name="date_text" value="{{ old('date_text', $item->date_text) }}" class="form-control" placeholder="e.g. 15 March 2026" />
        </div>
        <div class="form-group">
          <label class="form-label" style="font-weight: 600;">Time Text</label>
          <input type="text" name="time_text" value="{{ old('time_text', $item->time_text) }}" class="form-control" placeholder="e.g. 5:00 PM" />
        </div>
        <div class="form-group">
          <label class="form-label" style="font-weight: 600;">Location Text</label>
          <input type="text" name="location" value="{{ old('location', $item->location) }}" class="form-control" placeholder="e.g. Paris, France" />
        </div>
      </div>

      <div class="form-row-2" style="margin-bottom: 1.25rem;">
        <div class="form-group">
          <label class="form-label" style="font-weight: 600;">Guests Text</label>
          <input type="text" name="guests_text" value="{{ old('guests_text', $item->guests_text) }}" class="form-control" placeholder="e.g. 220 Guests" />
        </div>
        <div class="form-group">
          <label class="form-label" style="font-weight: 600;">Detail Banner Image</label>
          <input type="file" name="banner_image" class="form-control" accept="image/*" onchange="previewImg(this, 'bannerImgPrev')" />
          <div class="preview-box">
            <img id="bannerImgPrev" src="{{ $item->banner_image ? asset('storage/' . $item->banner_image) : asset('backend/images/placeholder.jpg') }}" />
          </div>
        </div>
      </div>

      <div class="form-group" style="margin-bottom: 1.25rem;">
        <label class="form-label" style="font-weight: 600;">Detail Headline</label>
        <input type="text" name="detail_headline" value="{{ old('detail_headline', $item->detail_headline) }}" class="form-control" placeholder="e.g. A Magical Evening Under The Stars" />
      </div>

      <div class="form-group" style="margin-bottom: 1.25rem;">
        <label class="form-label" style="font-weight: 600;">Full Description (CKEditor)</label>
        <textarea name="detail_content" id="detail_content" class="form-control">{{ old('detail_content', $item->detail_content) }}</textarea>
      </div>

      
    </div>

    <!-- Gallery Section -->
    <div class="admin-form-card">
      <div class="form-section-title">3. Photo Gallery</div>

      <div class="form-row-2">
        <div class="form-group">
          <label class="form-label" style="font-weight: 600;">Gallery Tag</label>
          <input type="text" name="gallery_tag" value="{{ old('gallery_tag', $item->gallery_tag) }}" class="form-control" />
        </div>
        <div class="form-group">
          <label class="form-label" style="font-weight: 600;">Gallery Title</label>
          <input type="text" name="gallery_title" value="{{ old('gallery_title', $item->gallery_title) }}" class="form-control" />
        </div>
      </div>

      <div class="form-group" style="margin-top: 1.25rem;">
        <label class="form-label" style="font-weight: 600;">Upload Gallery Images (Select Multiple)</label>
        <input type="file" name="gallery_images[]" id="gallery_images_input" class="form-control" accept="image/*" multiple onchange="previewMultiple(this, 'new_gallery_preview')" />
        <small style="color: #666; display: block; margin-top: 5px;">Selecting new images will replace the existing gallery.</small>
        <div id="new_gallery_preview" style="display: flex; flex-wrap: wrap; gap: 15px; margin-top: 15px;"></div>
      </div>
      
      @if(is_array($item->gallery_images) && count($item->gallery_images) > 0)
        <div style="margin-top: 1.5rem;">
          <label class="form-label" style="font-weight: 600; display: block; margin-bottom: 0.75rem;">Currently Attached Gallery Images:</label>
          <div style="display: flex; flex-wrap: wrap; gap: 10px;">
            @foreach($item->gallery_images as $img)
              <div style="border: 1px solid #ddd; padding: 5px; border-radius: 4px; background: #fff;">
                <img src="{{ asset('storage/' . $img) }}" style="width: 100px; height: 75px; object-fit: cover; display: block;" />
              </div>
            @endforeach
          </div>
        </div>
      @endif
    </div>

    <!-- Video Section -->
    <div class="admin-form-card">
      <div class="form-section-title">4. Cinema Wedding Film (Optional)</div>
      
      <div class="form-row-2">
        <div class="form-group">
          <label class="form-label" style="font-weight: 600;">Video MP4</label>
          <input type="file" name="video_mp4" class="form-control" accept="video/mp4" />
          @if($item->video_mp4)
            <div style="margin-top: 5px; font-size: 0.85rem; color: #16a34a;">Currently attached: {{ basename($item->video_mp4) }}</div>
          @endif
        </div>
        <div class="form-group">
          <label class="form-label" style="font-weight: 600;">Video WebM</label>
          <input type="file" name="video_webm" class="form-control" accept="video/webm" />
          @if($item->video_webm)
            <div style="margin-top: 5px; font-size: 0.85rem; color: #16a34a;">Currently attached: {{ basename($item->video_webm) }}</div>
          @endif
        </div>
      </div>
      
      <div class="form-group" style="margin-top: 1.25rem;">
        <label class="form-label" style="font-weight: 600;">Video Poster (Cover Image)</label>
        <input type="file" name="video_poster" class="form-control" accept="image/*" onchange="previewImg(this, 'posterImgPrev')" />
        <div class="preview-box">
          <img id="posterImgPrev" src="{{ $item->video_poster ? asset('storage/' . $item->video_poster) : asset('backend/images/placeholder.jpg') }}" />
        </div>
      </div>
    </div>

    <div style="display: flex; gap: 1rem; margin-bottom: 3rem;">
      <button type="submit" class="btn btn-primary" style="padding: 0.75rem 2rem; font-weight: 600; font-size: 1.05rem;">Update Portfolio Item</button>
      <a href="{{ route('admin.portfolio-page.items.index') }}" class="btn btn-light" style="padding: 0.75rem 2rem; font-weight: 600;">Cancel</a>
    </div>

  </form>
@endsection

@push('scripts')
<script>
  // Initialize CKEditor with full screen config match
  CKEDITOR.replace('detail_content', {
    height: 300,
    removeButtons: 'PasteFromWord',
    versionCheck: false
  });

  function previewImg(input, imgId) {
    if (input.files && input.files[0]) {
      const reader = new FileReader();
      reader.onload = function(e) {
        document.getElementById(imgId).src = e.target.result;
        document.getElementById(imgId).style.display = 'block';
      }
      reader.readAsDataURL(input.files[0]);
    }
  }

  let selectedFiles = [];

  function previewMultiple(input, containerId) {
    if (input.files) {
      Array.from(input.files).forEach(file => {
        selectedFiles.push(file);
      });
    }
    renderPreviews(containerId);
  }

  function renderPreviews(containerId) {
    const container = document.getElementById(containerId);
    container.innerHTML = '';
    
    const dataTransfer = new DataTransfer();
    
    selectedFiles.forEach((file, index) => {
      dataTransfer.items.add(file);
      
      const reader = new FileReader();
      reader.onload = function(e) {
        const wrapper = document.createElement('div');
        wrapper.style.position = 'relative';
        wrapper.style.display = 'inline-block';
        wrapper.style.border = '1px solid #ddd';
        wrapper.style.padding = '5px';
        wrapper.style.borderRadius = '4px';
        wrapper.style.background = '#fff';
        
        const img = document.createElement('img');
        img.src = e.target.result;
        img.style.width = '100px';
        img.style.height = '75px';
        img.style.objectFit = 'cover';
        img.style.display = 'block';
        
        const removeBtn = document.createElement('div');
        removeBtn.innerHTML = '&times;';
        removeBtn.style.position = 'absolute';
        removeBtn.style.top = '0px';
        removeBtn.style.right = '0px';
        removeBtn.style.background = '#dc3545';
        removeBtn.style.color = 'white';
        removeBtn.style.borderRadius = '50%';
        removeBtn.style.width = '20px';
        removeBtn.style.height = '20px';
        removeBtn.style.display = 'flex';
        removeBtn.style.alignItems = 'center';
        removeBtn.style.justifyContent = 'center';
        removeBtn.style.cursor = 'pointer';
        removeBtn.style.fontSize = '14px';
        removeBtn.style.fontWeight = 'bold';
        removeBtn.style.transform = 'translate(50%, -50%)';
        
        removeBtn.onclick = function() {
          selectedFiles.splice(index, 1);
          renderPreviews(containerId);
        };
        
        wrapper.appendChild(img);
        wrapper.appendChild(removeBtn);
        container.appendChild(wrapper);
      }
      reader.readAsDataURL(file);
    });
    
    const input = document.getElementById('gallery_images_input');
    input.files = dataTransfer.files;
  }
</script>
@endpush
