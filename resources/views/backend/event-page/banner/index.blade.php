@extends('backend.layouts.app')

@section('title', 'Events Page - Banner Section')

@push('styles')
<style>
  .admin-form-card {
    background: #ffffff;
    border-radius: 12px;
    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
    border: 1px solid #e2e8f0;
    padding: 1.75rem;
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
  .form-row-3 {
    display: grid;
    grid-template-columns: 1fr 1fr 1fr;
    gap: 1.25rem;
    margin-bottom: 1.25rem;
  }
  @media (max-width: 768px) {
    .form-row-2, .form-row-3 { grid-template-columns: 1fr; }
  }
</style>
@endpush

@section('content')
  <div class="admin-form-card">
    <div class="card-head">
      <div>
        <div style="font-weight: 700; font-size: 1.1rem; color: #0f172a;">Events Page Banner Section</div>
        <div style="font-size: 0.85rem; color: #64748b; margin-top: 2px;">Manage the top hero title, subtitle description, client avatar images, and main banner image for the Events page.</div>
      </div>
      <span class="card-badge">Hero Banner</span>
    </div>

    @if (session('success'))
      <div style="padding: 12px 16px; background: #ecfdf5; border: 1px solid #a7f3d0; color: #065f46; border-radius: 8px; margin-bottom: 1.5rem; font-size: 0.9rem;">
        {{ session('success') }}
      </div>
    @endif

    <form action="{{ route('admin.event-page.banner.update') }}" method="POST" enctype="multipart/form-data">
      @csrf

      <div class="form-row-2">
        <div class="form-group">
          <label class="form-label" style="font-weight: 600;">Section Badge / Tag</label>
          <input type="text" name="tag" value="{{ old('tag', $banner->tag) }}" class="form-control" placeholder="e.g. upcoming events" />
        </div>

        <div class="form-group">
          <label class="form-label" style="font-weight: 600;">Section Status</label>
          <select name="status" class="form-control">
            <option value="active" {{ old('status', $banner->status) === 'active' ? 'selected' : '' }}>Active (Show Section)</option>
            <option value="deactive" {{ old('status', $banner->status) === 'deactive' ? 'selected' : '' }}>Deactive (Hide Section)</option>
          </select>
        </div>
      </div>

      <div class="form-group" style="margin-bottom: 1.25rem;">
        <label class="form-label" style="font-weight: 600;">Headline Title <span style="color: #ef4444;">*</span></label>
        <input type="text" name="title" value="{{ old('title', $banner->title) }}" class="form-control" placeholder="e.g. Upcoming weddings and showcases" required />
      </div>

      <div class="form-group" style="margin-bottom: 1.25rem;">
        <label class="form-label" style="font-weight: 600;">Description</label>
        <textarea name="description" rows="3" class="form-control" placeholder="Subtitle / Hero description text">{{ old('description', $banner->description) }}</textarea>
      </div>

      <!-- Client Avatars -->
      <div style="background: #f8fafc; border: 1px solid #e2e8f0; border-radius: 8px; padding: 1.25rem; margin-bottom: 1.25rem;">
        <div style="font-weight: 700; font-size: 0.95rem; color: #ff5722; margin-bottom: 1rem;">Top Right Client Avatar Images</div>
        <div class="form-row-3">
          <div class="form-group">
            <label class="form-label" style="font-weight: 600;">Avatar 1</label>
            <input type="file" name="client_image_1" class="form-control" accept="image/*" onchange="previewImage(this, 'cImg1Prev')" />
            <div style="margin-top: 0.5rem; display: flex; align-items: center; gap: 0.75rem;">
              <img id="cImg1Prev" src="{{ $banner->client_image_1_url }}" alt="Client 1" style="width: 44px; height: 44px; border-radius: 50%; object-fit: cover; border: 1px solid #cbd5e1;" />
              <span style="font-size: 0.78rem; color: #64748b;">Avatar 1</span>
            </div>
          </div>

          <div class="form-group">
            <label class="form-label" style="font-weight: 600;">Avatar 2</label>
            <input type="file" name="client_image_2" class="form-control" accept="image/*" onchange="previewImage(this, 'cImg2Prev')" />
            <div style="margin-top: 0.5rem; display: flex; align-items: center; gap: 0.75rem;">
              <img id="cImg2Prev" src="{{ $banner->client_image_2_url }}" alt="Client 2" style="width: 44px; height: 44px; border-radius: 50%; object-fit: cover; border: 1px solid #cbd5e1;" />
              <span style="font-size: 0.78rem; color: #64748b;">Avatar 2</span>
            </div>
          </div>

          <div class="form-group">
            <label class="form-label" style="font-weight: 600;">Avatar 3</label>
            <input type="file" name="client_image_3" class="form-control" accept="image/*" onchange="previewImage(this, 'cImg3Prev')" />
            <div style="margin-top: 0.5rem; display: flex; align-items: center; gap: 0.75rem;">
              <img id="cImg3Prev" src="{{ $banner->client_image_3_url }}" alt="Client 3" style="width: 44px; height: 44px; border-radius: 50%; object-fit: cover; border: 1px solid #cbd5e1;" />
              <span style="font-size: 0.78rem; color: #64748b;">Avatar 3</span>
            </div>
          </div>
        </div>
      </div>

      <!-- Main Banner Image -->
      <div class="form-group" style="margin-bottom: 1.5rem;">
        <label class="form-label" style="font-weight: 600;">Main Hero Banner Image</label>
        <input type="file" name="banner_image" class="form-control" accept="image/*" onchange="previewImage(this, 'bannerImgPrev')" />
        <div style="margin-top: 0.5rem; display: flex; align-items: center; gap: 0.75rem;">
          <img id="bannerImgPrev" src="{{ $banner->banner_image_url }}" alt="Banner Image" style="max-height: 120px; border-radius: 8px; object-fit: cover; border: 1px solid #cbd5e1;" />
          <span style="font-size: 0.78rem; color: #64748b;">Active Main Hero Banner Image</span>
        </div>
      </div>

      <div style="display: flex; gap: 1rem; align-items: center; margin-top: 1.5rem;">
        <button type="submit" class="btn btn-primary" style="padding: 0.6rem 1.5rem; font-weight: 600;">Save Changes</button>
      </div>
    </form>
  </div>
@endsection

@push('scripts')
<script>
  function previewImage(input, previewId) {
    if (input.files && input.files[0]) {
      const reader = new FileReader();
      reader.onload = function(e) {
        document.getElementById(previewId).src = e.target.result;
      }
      reader.readAsDataURL(input.files[0]);
    }
  }
</script>
@endpush
