@extends('backend.layouts.app')

@section('title', 'Edit Blog Post')

@push('styles')
<style>
  .admin-form-card {
    background: #ffffff;
    border-radius: 12px;
    box-shadow: 0 1px 3px rgba(0,0,0,0.05);
    border: 1px solid #e2e8f0;
    padding: 1.75rem;
    margin-bottom: 2rem;
  }
  .form-section-title {
    font-size: 1.1rem;
    font-weight: 700;
    color: #0f172a;
    border-bottom: 1px solid #f1f5f9;
    padding-bottom: 0.75rem;
    margin-bottom: 1.5rem;
  }
  .form-row-2 {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 1.25rem;
    margin-bottom: 1.25rem;
  }
  .form-row-3 {
    display: grid;
    grid-template-columns: 1fr 1fr 1fr;
    gap: 1.25rem;
    margin-bottom: 1.25rem;
  }
  @media (max-width: 768px) {
    .form-row-2, .form-row-3 { grid-template-columns: 1fr; }
  }
  .preview-box { margin-top: 10px; }
  .preview-box img { max-height: 120px; max-width: 100%; border-radius: 6px; object-fit: cover; }
</style>
<script src="https://cdn.ckeditor.com/4.21.0/standard/ckeditor.js"></script>
@endpush

@section('content')
  <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1.5rem;">
    <h2 style="font-size: 1.25rem; font-weight: 700; color: #0f172a; margin: 0;">Edit Blog Post</h2>
    <a href="{{ route('admin.blog-page.items.index') }}" class="btn btn-light">&larr; Back to List</a>
  </div>

  <form action="{{ route('admin.blog-page.items.update', $item->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="admin-form-card">
      <div class="form-section-title">1. Basic Information</div>
      
      <div class="form-row-2">
        <div class="form-group">
          <label class="form-label" style="font-weight: 600;">Title <span style="color:red">*</span></label>
          <input type="text" name="title" value="{{ old('title', $item->title) }}" class="form-control" required placeholder="e.g. Romantic couple posing..." />
        </div>
        <div class="form-group">
          <label class="form-label" style="font-weight: 600;">Publish Date</label>
          <input type="text" name="publish_date" value="{{ old('publish_date', $item->publish_date) }}" class="form-control" placeholder="e.g. 09 January 2026" />
        </div>
      </div>

      <div class="form-row-2">
        <div class="form-group">
          <label class="form-label" style="font-weight: 600;">Custom Slug (Optional)</label>
          <input type="text" name="slug" value="{{ old('slug', $item->slug) }}" class="form-control" placeholder="Leave empty to auto-generate" />
        </div>
        <div class="form-group">
          <label class="form-label" style="font-weight: 600;">Status <span style="color:red">*</span></label>
          <select name="status" class="form-control" required>
            <option value="active" {{ old('status', $item->status) === 'active' ? 'selected' : '' }}>Active</option>
            <option value="deactive" {{ old('status', $item->status) === 'deactive' ? 'selected' : '' }}>Deactive</option>
          </select>
        </div>
      </div>
      <div class="form-group" style="width: 50%;">
        <label class="form-label" style="font-weight: 600;">Sort Order</label>
        <input type="number" name="sort_order" value="{{ old('sort_order', $item->sort_order) }}" class="form-control" min="0" />
      </div>
    </div>

    <div class="admin-form-card">
      <div class="form-section-title">2. Blog Images & Author</div>
      
      <div class="form-row-3">
        <div class="form-group">
          <label class="form-label" style="font-weight: 600;">Grid Cover Image</label>
          <input type="file" name="image" class="form-control" accept="image/*" onchange="previewImg(this, 'gridImgPrev')" />
          <div class="preview-box">
            @php $gridSrc = $item->image ? (str_starts_with($item->image, 'images/') ? asset($item->image) : asset('storage/'.$item->image)) : asset('backend/images/placeholder.jpg'); @endphp
            <img id="gridImgPrev" src="{{ $gridSrc }}" style="display: {{ $item->image ? 'block' : 'none' }}" />
          </div>
        </div>
        <div class="form-group">
          <label class="form-label" style="font-weight: 600;">Detail Banner Image</label>
          <input type="file" name="banner_image" class="form-control" accept="image/*" onchange="previewImg(this, 'bannerImgPrev')" />
          <div class="preview-box">
            @php $bannerSrc = $item->banner_image ? (str_starts_with($item->banner_image, 'images/') ? asset($item->banner_image) : asset('storage/'.$item->banner_image)) : asset('backend/images/placeholder.jpg'); @endphp
            <img id="bannerImgPrev" src="{{ $bannerSrc }}" style="display: {{ $item->banner_image ? 'block' : 'none' }}" />
          </div>
        </div>
        <div class="form-group">
          <label class="form-label" style="font-weight: 600;">Author Profile Image</label>
          <input type="file" name="author_image" class="form-control" accept="image/*" onchange="previewImg(this, 'authorImgPrev')" />
          <div class="preview-box">
            @php $authorSrc = $item->author_image ? (str_starts_with($item->author_image, 'images/') ? asset($item->author_image) : asset('storage/'.$item->author_image)) : asset('backend/images/placeholder.jpg'); @endphp
            <img id="authorImgPrev" src="{{ $authorSrc }}" style="display: {{ $item->author_image ? 'block' : 'none' }}" />
          </div>
        </div>
      </div>

      <div class="form-row-2">
        <div class="form-group">
          <label class="form-label" style="font-weight: 600;">Author Name</label>
          <input type="text" name="author_name" value="{{ old('author_name', $item->author_name) }}" class="form-control" placeholder="e.g. Sarah Taylor" />
        </div>
        <div class="form-group">
          <label class="form-label" style="font-weight: 600;">Author Role</label>
          <input type="text" name="author_role" value="{{ old('author_role', $item->author_role) }}" class="form-control" placeholder="e.g. Event Manager" />
        </div>
      </div>
    </div>

    <div class="admin-form-card">
      <div class="form-section-title">3. Blog Content</div>
      
      <div class="form-group">
        <label class="form-label" style="font-weight: 600;">Full Content (CKEditor)</label>
        <textarea name="content" class="form-control">{{ old('content', $item->content) }}</textarea>
      </div>
    </div>

    <div style="display: flex; gap: 1rem; margin-bottom: 3rem;">
      <button type="submit" class="btn btn-primary" style="padding: 0.75rem 2rem; font-weight: 600; font-size: 1.05rem;">Update Blog Post</button>
      <a href="{{ route('admin.blog-page.items.index') }}" class="btn btn-light" style="padding: 0.75rem 2rem; font-weight: 600;">Cancel</a>
    </div>

  </form>
@endsection

@push('scripts')
<script>
  CKEDITOR.replace('content', {
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
</script>
@endpush
