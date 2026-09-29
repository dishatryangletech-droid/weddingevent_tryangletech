@extends('backend.layouts.app')

@section('title', 'Create Portfolio Item')

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
    <h2 style="font-size: 1.25rem; font-weight: 700; color: #0f172a; margin: 0;">Create Portfolio Item</h2>
    <a href="{{ route('admin.portfolio-page.items.index') }}" class="btn btn-light">&larr; Back to List</a>
  </div>

  <form action="{{ route('admin.portfolio-page.items.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <!-- Basic Information (Card on Portfolio Page) -->
    <div class="admin-form-card">
      <div class="form-section-title">Basic Information</div>
      
      <div class="form-row-2">
        <div class="form-group">
          <label class="form-label" style="font-weight: 600;">Title <span style="color:red;">*</span></label>
          <input type="text" name="title" value="{{ old('title') }}" class="form-control" required placeholder="e.g. Jennifer & Oliver" />
        </div>
        <div class="form-group">
          <label class="form-label" style="font-weight: 600;">Portfolio Tag</label>
          <select name="portfolio_tag_id" class="form-control">
            <option value="">-- Select Tag --</option>
            @foreach($tags as $tag)
              <option value="{{ $tag->id }}" {{ old('portfolio_tag_id') == $tag->id ? 'selected' : '' }}>{{ $tag->name }}</option>
            @endforeach
          </select>
        </div>
      </div>

      <div class="form-row-2">
        <div class="form-group">
          <label class="form-label" style="font-weight: 600;">Subtitle / Description</label>
          <input type="text" name="subtitle" value="{{ old('subtitle') }}" class="form-control" placeholder="e.g. Romantic Botanical Garden Celebration" />
        </div>
        <div class="form-group">
          <label class="form-label" style="font-weight: 600;">Main Card Image</label>
          <input type="file" name="image" class="form-control" accept="image/*" onchange="previewImg(this, 'mainImgPrev')" />
          <div class="preview-box">
            <img id="mainImgPrev" src="" style="display:none;" />
            <span style="font-size:0.8rem; color:#64748b;" id="mainImgText">No image selected</span>
          </div>
        </div>
      </div>

      <div class="form-row-2">
        <div class="form-group">
          <label class="form-label" style="font-weight: 600;">Sort Order</label>
          <input type="number" name="sort_order" value="{{ old('sort_order', $nextOrder) }}" class="form-control" />
        </div>
        <div class="form-group">
          <label class="form-label" style="font-weight: 600;">Status <span style="color:red;">*</span></label>
          <select name="status" class="form-control" required>
            <option value="active" {{ old('status') === 'active' ? 'selected' : '' }}>Active</option>
            <option value="deactive" {{ old('status') === 'deactive' ? 'selected' : '' }}>Deactive</option>
          </select>
        </div>
      </div>
    </div>

    <div style="display: flex; gap: 1rem; margin-bottom: 3rem;">
      <button type="submit" class="btn btn-primary" style="padding: 0.75rem 2rem; font-weight: 600; font-size: 1.05rem;">Create Portfolio Item</button>
      <a href="{{ route('admin.portfolio-page.items.index') }}" class="btn btn-light" style="padding: 0.75rem 2rem; font-weight: 600;">Cancel</a>
    </div>

  </form>
@endsection

@push('scripts')
<script>
  function previewImg(input, imgId) {
    const textId = imgId.replace('Prev', 'Text');
    if (input.files && input.files[0]) {
      const reader = new FileReader();
      reader.onload = function(e) {
        document.getElementById(imgId).src = e.target.result;
        document.getElementById(imgId).style.display = 'block';
        if(document.getElementById(textId)) document.getElementById(textId).style.display = 'none';
      }
      reader.readAsDataURL(input.files[0]);
    }
  }
</script>
@endpush
