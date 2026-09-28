@extends('backend.layouts.app')

@section('title', 'Edit Testimonial')
@section('page_title', 'Testimonials > Edit Review')

@push('styles')
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
    background: #eff6ff;
    color: #2563eb;
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
<form action="{{ route('admin.testimonials.update', $testimonial->id) }}" method="POST" enctype="multipart/form-data">
  @csrf
  @method('PUT')

  <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 1.5rem;">
    <div>
      <h2 style="font-size: 1.35rem; font-weight: 700; color: #0f172a; margin: 0 0 0.25rem 0;">Edit Client Review: {{ $testimonial->client_name }}</h2>
      <p style="font-size: 0.88rem; color: #64748b; margin: 0;">Update client review details, ratings, and page placements.</p>
    </div>
    <div style="display: flex; gap: 0.75rem;">
      <a href="{{ route('admin.testimonials.index') }}" class="btn btn-secondary">Cancel</a>
      <button type="submit" class="btn btn-primary">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
          <polyline points="20 6 9 17 4 12"></polyline>
        </svg>
        <span>Update Review</span>
      </button>
    </div>
  </div>

  <!-- 1. Client & Company Profile -->
  <div class="admin-form-card">
    <div class="card-head">
      <div style="font-weight: 700; font-size: 1rem; color: #0f172a;">Client &amp; Brand Details</div>
      <span class="card-badge">Profile</span>
    </div>

    <div class="form-row-3">
      <div class="form-group">
        <label for="client_name" class="form-label" style="font-weight: 600;">Client Name <span style="color: #ef4444;">*</span></label>
        <input type="text" name="client_name" id="client_name" value="{{ old('client_name', $testimonial->client_name) }}" class="form-control @error('client_name') is-invalid @enderror" placeholder="e.g. Daniel Cooper" required />
        @error('client_name')
          <div style="color: #ef4444; font-size: 0.82rem; margin-top: 0.25rem;">{{ $message }}</div>
        @enderror
      </div>

      <div class="form-group">
        <label for="client_designation" class="form-label" style="font-weight: 600;">Designation / Title</label>
        <input type="text" name="client_designation" id="client_designation" value="{{ old('client_designation', $testimonial->client_designation) }}" class="form-control @error('client_designation') is-invalid @enderror" placeholder="e.g. Founder or Brand Manager" />
        @error('client_designation')
          <div style="color: #ef4444; font-size: 0.82rem; margin-top: 0.25rem;">{{ $message }}</div>
        @enderror
      </div>

      <div class="form-group">
        <label for="company_name" class="form-label" style="font-weight: 600;">Company / Brand Name</label>
        <input type="text" name="company_name" id="company_name" value="{{ old('company_name', $testimonial->company_name) }}" class="form-control @error('company_name') is-invalid @enderror" placeholder="e.g. Trionex, Noventis" />
        @error('company_name')
          <div style="color: #ef4444; font-size: 0.82rem; margin-top: 0.25rem;">{{ $message }}</div>
        @enderror
      </div>
    </div>

    <div class="form-row-2">
      <!-- Company Logo -->
      <div class="form-group">
        <label for="company_logo" class="form-label" style="font-weight: 600;">Company Logo / Icon</label>
        <input type="file" name="company_logo" id="company_logo" class="form-control @error('company_logo') is-invalid @enderror" accept="image/*" onchange="previewImage(this, 'companyLogoPreview')" />
        <small class="form-text" style="color: #64748b;">Upload new logo to replace existing. (SVG, PNG, JPG, WEBP).</small>
        
        <div style="margin-top: 0.75rem; display: flex; align-items: center; gap: 0.75rem;">
          <div style="background: #f8fafc; border: 1px solid #e2e8f0; border-radius: 8px; padding: 6px 12px; display: inline-flex; align-items: center;">
            <img id="companyLogoPreview" src="{{ $testimonial->company_logo_url }}" alt="Current Logo" style="max-height: 38px; max-width: 140px; object-fit: contain;" />
          </div>
          <span style="font-size: 0.78rem; color: #64748b;">Active Logo / Preview</span>
        </div>
        @error('company_logo')
          <div style="color: #ef4444; font-size: 0.82rem; margin-top: 0.25rem;">{{ $message }}</div>
        @enderror
      </div>

      <!-- Rating -->
      <div class="form-group">
        <label for="rating" class="form-label" style="font-weight: 600;">Rating (Stars)</label>
        <select name="rating" id="rating" class="form-control">
          <option value="5" {{ old('rating', $testimonial->rating) == 5 ? 'selected' : '' }}>5 Stars - ★★★★★ (Exceptional)</option>
          <option value="4" {{ old('rating', $testimonial->rating) == 4 ? 'selected' : '' }}>4 Stars - ★★★★☆ (Great)</option>
          <option value="3" {{ old('rating', $testimonial->rating) == 3 ? 'selected' : '' }}>3 Stars - ★★★☆☆ (Good)</option>
          <option value="2" {{ old('rating', $testimonial->rating) == 2 ? 'selected' : '' }}>2 Stars - ★★☆☆☆ (Fair)</option>
          <option value="1" {{ old('rating', $testimonial->rating) == 1 ? 'selected' : '' }}>1 Star - ★☆☆☆☆ (Poor)</option>
        </select>
      </div>
    </div>
  </div>

  <!-- 2. Review Content -->
  <div class="admin-form-card">
    <div class="card-head">
      <div style="font-weight: 700; font-size: 1rem; color: #0f172a;">Review Content &amp; Headline</div>
      <span class="card-badge">Content</span>
    </div>

    <!-- Headline / Quote -->
    <div class="form-group" style="margin-bottom: 1.25rem;">
      <label for="headline" class="form-label" style="font-weight: 600;">Headline / Card Quote</label>
      <input type="text" name="headline" id="headline" value="{{ old('headline', $testimonial->headline) }}" class="form-control @error('headline') is-invalid @enderror" placeholder="e.g. A reliable partner for scaling brands creative and performance marketing." />
      <small class="form-text" style="color: #64748b;">Bold statement quote highlighted on the card.</small>
      @error('headline')
        <div style="color: #ef4444; font-size: 0.82rem; margin-top: 0.25rem;">{{ $message }}</div>
      @enderror
    </div>

    <!-- Review Text -->
    <div class="form-group" style="margin-bottom: 1.25rem;">
      <label for="review" class="form-label" style="font-weight: 600;">Full Review / Description <span style="color: #ef4444;">*</span></label>
      <textarea name="review" id="review" rows="4" class="form-control @error('review') is-invalid @enderror" placeholder="Write testimonial description here..." required>{{ old('review', $testimonial->review) }}</textarea>
      @error('review')
        <div style="color: #ef4444; font-size: 0.82rem; margin-top: 0.25rem;">{{ $message }}</div>
      @enderror
    </div>
  </div>

  <!-- 3. Publishing & Placements -->
  <div class="admin-form-card">
    <div class="card-head">
      <div style="font-weight: 700; font-size: 1rem; color: #0f172a;">Approval &amp; Page Placements</div>
      <span class="card-badge">Display Settings</span>
    </div>

    <div class="form-row-2">
      <!-- Order -->
      <div class="form-group">
        <label for="order" class="form-label" style="font-weight: 600;">Display Order Sequence</label>
        <input type="number" name="order" id="order" value="{{ old('order', $testimonial->order) }}" class="form-control" min="0" />
        <small class="form-text" style="color: #64748b;">Lower numbers appear first.</small>
      </div>

      <!-- Approval Status -->
      <div class="form-group" style="display: flex; flex-direction: column; justify-content: center;">
        <label class="form-label" style="font-weight: 600;">Admin Approval</label>
        <label style="display: flex; align-items: center; gap: 0.5rem; cursor: pointer; margin-top: 0.25rem;">
          <input type="checkbox" name="is_approved" value="1" {{ old('is_approved', $testimonial->is_approved) ? 'checked' : '' }} style="width: 18px; height: 18px; accent-color: #10b981;" />
          <span style="font-weight: 600; color: #0f172a; font-size: 0.92rem;">Approved by Admin (Live on Website)</span>
        </label>
        <small class="form-text" style="color: #64748b;">Uncheck to hide review as pending without displaying on front pages.</small>
      </div>
    </div>

    <div style="border-top: 1px solid #f1f5f9; padding-top: 1rem; margin-top: 0.5rem;">
      <label class="form-label" style="font-weight: 600; margin-bottom: 0.5rem; display: block;">Display Placements</label>
      <div style="display: flex; gap: 2rem; flex-wrap: wrap;">
        <label style="display: flex; align-items: center; gap: 0.5rem; cursor: pointer;">
          <input type="checkbox" name="show_on_home" value="1" {{ old('show_on_home', $testimonial->show_on_home) ? 'checked' : '' }} style="width: 17px; height: 17px; accent-color: #ff5722;" />
          <span style="font-size: 0.9rem; color: #334155; font-weight: 500;">Show on Home Page Testimonials Slider</span>
        </label>
        <label style="display: flex; align-items: center; gap: 0.5rem; cursor: pointer;">
          <input type="checkbox" name="show_on_about" value="1" {{ old('show_on_about', $testimonial->show_on_about) ? 'checked' : '' }} style="width: 17px; height: 17px; accent-color: #ff5722;" />
          <span style="font-size: 0.9rem; color: #334155; font-weight: 500;">Show on About Us Page Testimonials Marquee</span>
        </label>
      </div>
    </div>
  </div>

  <div style="display: flex; justify-content: flex-end; gap: 0.75rem; margin-bottom: 3rem;">
    <a href="{{ route('admin.testimonials.index') }}" class="btn btn-secondary">Cancel</a>
    <button type="submit" class="btn btn-primary" style="padding: 0.65rem 1.75rem;">
      <span>Update Testimonial</span>
    </button>
  </div>
</form>

<script>
  function previewImage(input, previewId) {
    if (input.files && input.files[0]) {
      const reader = new FileReader();
      reader.onload = function(e) {
        const preview = document.getElementById(previewId);
        preview.src = e.target.result;
      }
      reader.readAsDataURL(input.files[0]);
    }
  }
</script>
@endsection
