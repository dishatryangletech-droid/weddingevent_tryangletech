@extends('backend.layouts.app')

@section('title', 'Blog Page - Banner Section')

@push('styles')
<style>
  .admin-form-card {
    background: #ffffff;
    border-radius: 12px;
    box-shadow: 0 1px 3px rgba(0,0,0,0.05);
    border: 1px solid #e2e8f0;
    padding: 1.75rem;
    width: 100%;
    margin-bottom: 2rem;
  }
  .card-head {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding-bottom: 1.25rem;
    margin-bottom: 1.5rem;
    border-bottom: 1px solid #f1f5f9;
  }
  .card-badge {
    background: #eff6ff;
    color: #2563eb;
    font-size: 0.75rem;
    font-weight: 600;
    padding: 4px 10px;
    border-radius: 9999px;
  }
  .form-row-2 {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 1.25rem;
    margin-bottom: 1.25rem;
  }
</style>
@endpush

@section('content')

  <div class="admin-form-card">
    <div class="card-head">
      <div>
        <div style="font-weight:700;font-size:1.1rem;color:#0f172a;">Blog Page — Banner Section</div>
        <div style="font-size:0.85rem;color:#64748b;margin-top:2px;">Manage the hero banner tag, title, description, and background image.</div>
      </div>
      <span class="card-badge">Hero Banner</span>
    </div>

    @if (session('success'))
      <div style="padding:12px 16px;background:#ecfdf5;border:1px solid #a7f3d0;color:#065f46;border-radius:8px;margin-bottom:1.5rem;font-size:.9rem;">
        {{ session('success') }}
      </div>
    @endif

    <form action="{{ route('admin.blog-page.banner.update') }}" method="POST" enctype="multipart/form-data">
      @csrf
      <div class="form-row-2">
        <div class="form-group">
          <label class="form-label" style="font-weight:600;">Section Badge / Tag</label>
          <input type="text" name="tag" value="{{ old('tag', $banner->tag) }}" class="form-control" placeholder="e.g. Our blog" />
        </div>
        <div class="form-group">
          <label class="form-label" style="font-weight:600;">Section Status</label>
          <select name="status" class="form-control">
            <option value="active"   {{ old('status', $banner->status) === 'active'   ? 'selected' : '' }}>Active</option>
            <option value="deactive" {{ old('status', $banner->status) === 'deactive' ? 'selected' : '' }}>Deactive</option>
          </select>
        </div>
      </div>

      <div class="form-group" style="margin-bottom:1.25rem;">
        <label class="form-label" style="font-weight:600;">Headline Title <span style="color:#ef4444;">*</span></label>
        <input type="text" name="title" value="{{ old('title', $banner->title) }}" class="form-control" required placeholder="e.g. Wedding stories journal" />
      </div>

      <div class="form-group" style="margin-bottom:1.25rem;">
        <label class="form-label" style="font-weight:600;">Description / Subtitle</label>
        <textarea name="description" rows="3" class="form-control">{{ old('description', $banner->description) }}</textarea>
      </div>

      <div class="form-group" style="margin-bottom:1.25rem;">
        <label class="form-label" style="font-weight:600;">Banner Image</label>
        <input type="file" name="banner_image" class="form-control" accept="image/*" onchange="previewBannerImg(this)" />
        <div style="margin-top:1rem;">
          <img id="bannerImgPrev" src="{{ $banner->banner_image && Storage::disk('public')->exists($banner->banner_image) ? asset('storage/' . $banner->banner_image) : (str_starts_with($banner->banner_image, 'images/') ? asset($banner->banner_image) : asset('backend/images/placeholder.jpg')) }}" style="max-height:160px; border-radius:6px; object-fit:cover; display:{{ $banner->banner_image ? 'block' : 'none' }}; border:1px solid #ddd; padding:4px;" />
        </div>
      </div>

      <div style="margin-top:1.5rem;">
        <button type="submit" class="btn btn-primary" style="padding:0.75rem 2rem; font-weight:600;">Save Banner Settings</button>
      </div>
    </form>
  </div>

@endsection

@push('scripts')
<script>
  function previewBannerImg(input) {
    if (input.files && input.files[0]) {
      const reader = new FileReader();
      reader.onload = function(e) {
        document.getElementById('bannerImgPrev').src = e.target.result;
        document.getElementById('bannerImgPrev').style.display = 'block';
      }
      reader.readAsDataURL(input.files[0]);
    }
  }
</script>
@endpush
