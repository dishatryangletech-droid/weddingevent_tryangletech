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

      <div class="form-group" style="margin-bottom: 1.25rem;">
        <label class="form-label" style="font-weight: 600;">Detail Headline</label>
        <input type="text" name="detail_headline" value="{{ old('detail_headline', $item->detail_headline) }}" class="form-control" placeholder="e.g. A Magical Evening Under The Stars" />
      </div>

      <div class="form-group" style="margin-bottom: 1.25rem;">
        <label class="form-label" style="font-weight: 600;">Full Description (CKEditor)</label>
        <textarea name="detail_content" id="detail_content" class="form-control">{{ old('detail_content', $item->detail_content) }}</textarea>
      </div>

      <div class="form-row-2">
        <div class="form-group">
          <label class="form-label" style="font-weight: 600;">Detail Sub Image (Content Image)</label>
          <input type="file" name="detail_sub_image" class="form-control" accept="image/*" onchange="previewImg(this, 'subImgPrev')" />
          <div class="preview-box">
            <img id="subImgPrev" src="{{ $item->detail_sub_image_url }}" />
          </div>
        </div>
        <div>
          <div class="form-group">
            <label class="form-label" style="font-weight: 600;">Highlight Stat 1</label>
            <input type="text" name="detail_highlight_1" value="{{ old('detail_highlight_1', $item->detail_highlight_1) }}" class="form-control" placeholder="e.g. 250+ Guests" />
          </div>
          <div class="form-group" style="margin-top:1rem;">
            <label class="form-label" style="font-weight: 600;">Highlight Stat 2</label>
            <input type="text" name="detail_highlight_2" value="{{ old('detail_highlight_2', $item->detail_highlight_2) }}" class="form-control" placeholder="e.g. 3 Days Celebration" />
          </div>
        </div>
      </div>
    </div>

    <!-- Gallery Section -->
    <div class="admin-form-card">
      <div class="form-section-title">3. Photo Gallery (4 Images)</div>

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

      <div class="form-row-4">
        @for($i = 1; $i <= 4; $i++)
          <div class="form-group">
            <label class="form-label" style="font-weight: 600;">Image {{ $i }}</label>
            <input type="file" name="gallery_image_{{ $i }}" class="form-control" accept="image/*" onchange="previewImg(this, 'galImgPrev{{ $i }}')" />
            <div class="preview-box">
              @php $imgMethod = "gallery_image_{$i}_url"; @endphp
              <img id="galImgPrev{{ $i }}" src="{{ $item->$imgMethod }}" />
            </div>
          </div>
        @endfor
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
    removeButtons: 'PasteFromWord'
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
</script>
@endpush
