@extends('backend.layouts.app')

@section('title', 'Edit Event Item Details')

@push('styles')
<style>
  .admin-form-card {
    background: #ffffff;
    border-radius: 12px;
    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
    border: 1px solid #e2e8f0;
    padding: 1.75rem;
    max-width: 900px;
    margin: 0 auto 2rem auto;
  }
  .card-head {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding-bottom: 1.25rem;
    margin-bottom: 1.5rem;
    border-bottom: 1px solid #f1f5f9;
  }
  .form-row-2 {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 1.25rem;
    margin-bottom: 1.25rem;
  }
  .form-row-4 {
    display: grid;
    grid-template-columns: 1fr 1fr 1fr 1fr;
    gap: 1rem;
    margin-bottom: 1.25rem;
  }
  @media (max-width: 768px) {
    .form-row-2, .form-row-4 { grid-template-columns: 1fr; }
  }
  .section-box {
    background: #f8fafc;
    border: 1px solid #e2e8f0;
    border-radius: 10px;
    padding: 1.25rem;
    margin-bottom: 1.5rem;
  }
  .section-title {
    font-weight: 700;
    font-size: 0.95rem;
    color: #ff5722;
    margin-bottom: 1rem;
  }
</style>
@endpush

@section('content')
  <div class="admin-form-card">
    <div class="card-head">
      <div>
        <div style="font-weight: 700; font-size: 1.1rem; color: #0f172a;">Edit Event Details: {{ $item->title }}</div>
        <div style="font-size: 0.85rem; color: #64748b; margin-top: 2px;">Manage event card info, detail page content, and gallery images.</div>
      </div>
      <a href="{{ route('admin.event-page.items.index') }}" class="btn btn-light btn-sm" style="font-weight: 600;">← Back to Events List</a>
    </div>

    @if ($errors->any())
      <div style="padding: 12px 16px; background: #fef2f2; border: 1px solid #fecaca; color: #991b1b; border-radius: 8px; margin-bottom: 1.5rem; font-size: 0.88rem;">
        <ul style="margin: 0; padding-left: 1.2rem;">
          @foreach ($errors->all() as $err)
            <li>{{ $err }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    <form action="{{ route('admin.event-page.items.update', $item->id) }}" method="POST" enctype="multipart/form-data">
      @csrf
      @method('PUT')

      <!-- 1. General Event Info -->
      <div class="section-box">
        <div class="section-title">1. Basic Event Information</div>

        <div class="form-row-2">
          <div class="form-group">
            <label class="form-label" style="font-weight: 600;">Event Title <span style="color: #ef4444;">*</span></label>
            <input type="text" name="title" value="{{ old('title', $item->title) }}" class="form-control" required />
          </div>

          <div class="form-group">
            <label class="form-label" style="font-weight: 600;">Location / Venue</label>
            <input type="text" name="location" value="{{ old('location', $item->location) }}" class="form-control" placeholder="e.g. Paris or The Royal Manor, Paris" />
          </div>
        </div>

        <div class="form-row-2">
          <div class="form-group">
            <label class="form-label" style="font-weight: 600;">Date Text</label>
            <input type="text" name="date_text" value="{{ old('date_text', $item->date_text) }}" class="form-control" placeholder="e.g. August 12, 2025" />
          </div>

          <div class="form-group">
            <label class="form-label" style="font-weight: 600;">Time Text</label>
            <input type="text" name="time_text" value="{{ old('time_text', $item->time_text) }}" class="form-control" placeholder="e.g. 9:00 AM - 11:00 AM" />
          </div>
        </div>

        <div class="form-group" style="margin-bottom: 1.25rem;">
          <label class="form-label" style="font-weight: 600;">Short Summary / Description</label>
          <textarea name="description" rows="2" class="form-control">{{ old('description', $item->description) }}</textarea>
        </div>

        <div class="form-row-2">
          <div class="form-group">
            <label class="form-label" style="font-weight: 600;">Sort Order</label>
            <input type="number" name="sort_order" value="{{ old('sort_order', $item->sort_order) }}" class="form-control" min="0" />
          </div>

          <div class="form-group">
            <label class="form-label" style="font-weight: 600;">Status</label>
            <select name="status" class="form-control">
              <option value="active" {{ old('status', $item->status) === 'active' ? 'selected' : '' }}>Active (Visible)</option>
              <option value="deactive" {{ old('status', $item->status) === 'deactive' ? 'selected' : '' }}>Deactive (Hidden)</option>
            </select>
          </div>
        </div>

        <div class="form-group" style="margin-bottom: 0;">
          <label class="form-label" style="font-weight: 600;">Main Hero / Cover Image</label>
          <input type="file" name="image" class="form-control" accept="image/*" onchange="previewImage(this, 'evtImgPrev')" />
          <div style="margin-top: 0.5rem; display: flex; align-items: center; gap: 0.75rem;">
            <img id="evtImgPrev" src="{{ $item->image_url }}" alt="Cover Image" style="max-height: 90px; border-radius: 8px; object-fit: cover; border: 1px solid #cbd5e1;" />
            <span style="font-size: 0.78rem; color: #64748b;">Current Cover Image</span>
          </div>
        </div>
      </div>

      <!-- 2. Detail Page Content -->
      <div class="section-box">
        <div class="section-title">2. Detail Page Full Content</div>

        <div class="form-group" style="margin-bottom: 1.25rem;">
          <label class="form-label" style="font-weight: 600;">Detail Headline / Lead</label>
          <textarea name="detail_headline" rows="2" class="form-control" placeholder="Lead text shown at top of details page">{{ old('detail_headline', $item->detail_headline) }}</textarea>
        </div>

        <div class="form-group" style="margin-bottom: 1.25rem;">
          <label class="form-label" style="font-weight: 600;">Full Content Paragraphs</label>
          <textarea name="detail_content" rows="4" class="form-control" placeholder="Detailed story and event description paragraphs">{{ old('detail_content', $item->detail_content) }}</textarea>
        </div>

        <div class="form-group" style="margin-bottom: 1.25rem;">
          <label class="form-label" style="font-weight: 600;">Detail Content Sub Image</label>
          <input type="file" name="detail_sub_image" class="form-control" accept="image/*" onchange="previewImage(this, 'subImgPrev')" />
          <div style="margin-top: 0.5rem; display: flex; align-items: center; gap: 0.75rem;">
            <img id="subImgPrev" src="{{ $item->detail_sub_image_url }}" alt="Sub Image" style="max-height: 90px; border-radius: 8px; object-fit: cover; border: 1px solid #cbd5e1;" />
            <span style="font-size: 0.78rem; color: #64748b;">Middle Story Image</span>
          </div>
        </div>

        <div class="form-row-2">
          <div class="form-group">
            <label class="form-label" style="font-weight: 600;">Highlight / Bullet Point 1</label>
            <textarea name="detail_highlight_1" rows="2" class="form-control" placeholder="Key highlight 1">{{ old('detail_highlight_1', $item->detail_highlight_1) }}</textarea>
          </div>

          <div class="form-group">
            <label class="form-label" style="font-weight: 600;">Highlight / Bullet Point 2</label>
            <textarea name="detail_highlight_2" rows="2" class="form-control" placeholder="Key highlight 2">{{ old('detail_highlight_2', $item->detail_highlight_2) }}</textarea>
          </div>
        </div>
      </div>

      <!-- 3. Wedding Gallery (4 Images) -->
      <div class="section-box">
        <div class="section-title">3. Signature Wedding Gallery (4 Images)</div>

        <div class="form-row-4">
          <div class="form-group">
            <label class="form-label" style="font-weight: 600;">Gallery Image 1</label>
            <input type="file" name="gallery_image_1" class="form-control" accept="image/*" onchange="previewImage(this, 'gImg1Prev')" />
            <div style="margin-top: 0.5rem;">
              <img id="gImg1Prev" src="{{ $item->gallery_image_1_url }}" alt="Gallery 1" style="width: 100%; height: 75px; border-radius: 6px; object-fit: cover; border: 1px solid #cbd5e1;" />
            </div>
          </div>

          <div class="form-group">
            <label class="form-label" style="font-weight: 600;">Gallery Image 2</label>
            <input type="file" name="gallery_image_2" class="form-control" accept="image/*" onchange="previewImage(this, 'gImg2Prev')" />
            <div style="margin-top: 0.5rem;">
              <img id="gImg2Prev" src="{{ $item->gallery_image_2_url }}" alt="Gallery 2" style="width: 100%; height: 75px; border-radius: 6px; object-fit: cover; border: 1px solid #cbd5e1;" />
            </div>
          </div>

          <div class="form-group">
            <label class="form-label" style="font-weight: 600;">Gallery Image 3</label>
            <input type="file" name="gallery_image_3" class="form-control" accept="image/*" onchange="previewImage(this, 'gImg3Prev')" />
            <div style="margin-top: 0.5rem;">
              <img id="gImg3Prev" src="{{ $item->gallery_image_3_url }}" alt="Gallery 3" style="width: 100%; height: 75px; border-radius: 6px; object-fit: cover; border: 1px solid #cbd5e1;" />
            </div>
          </div>

          <div class="form-group">
            <label class="form-label" style="font-weight: 600;">Gallery Image 4</label>
            <input type="file" name="gallery_image_4" class="form-control" accept="image/*" onchange="previewImage(this, 'gImg4Prev')" />
            <div style="margin-top: 0.5rem;">
              <img id="gImg4Prev" src="{{ $item->gallery_image_4_url }}" alt="Gallery 4" style="width: 100%; height: 75px; border-radius: 6px; object-fit: cover; border: 1px solid #cbd5e1;" />
            </div>
          </div>
        </div>
      </div>

      <div style="display: flex; gap: 1rem; align-items: center; margin-top: 1.5rem;">
        <button type="submit" class="btn btn-primary" style="padding: 0.6rem 1.5rem; font-weight: 600;">Save &amp; Update Event Details</button>
        <a href="{{ route('admin.event-page.items.index') }}" class="btn btn-light" style="padding: 0.6rem 1.2rem;">Cancel</a>
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
