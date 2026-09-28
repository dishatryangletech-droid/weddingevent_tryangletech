@extends('backend.layouts.app')

@section('title', 'Services Page > Our Expertise Section')
@section('page_title', 'Services Page > Our Expertise Section')

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
  @media (max-width: 768px) {
    .form-row-2 { grid-template-columns: 1fr; }
  }
  .card-box {
    background: #f8fafc;
    border: 1px solid #e2e8f0;
    border-radius: 10px;
    padding: 1.25rem;
    margin-bottom: 1.25rem;
  }
</style>
@endpush

@section('content')
<form action="{{ route('admin.service-page.expertise.update') }}" method="POST" enctype="multipart/form-data">
  @csrf

  <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 1.5rem;">
    <div>
      <h2 style="font-size: 1.35rem; font-weight: 700; color: #0f172a; margin: 0 0 0.25rem 0;">Our Expertise Section Management</h2>
      <p style="font-size: 0.88rem; color: #64748b; margin: 0;">Customize the section headlines, center portrait showcase image, and expertise feature cards shown on the Services page.</p>
    </div>
    <div style="display: flex; gap: 0.75rem;">
      <button type="submit" class="btn btn-primary">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
          <polyline points="20 6 9 17 4 12"></polyline>
        </svg>
        <span>Save Expertise</span>
      </button>
    </div>
  </div>

  <!-- 1. Section Header -->
  <div class="admin-form-card">
    <div class="card-head">
      <div style="font-weight: 700; font-size: 1rem; color: #0f172a;">Section Header</div>
      <span class="card-badge">Header</span>
    </div>

    <div class="form-row-2">
      <div class="form-group">
        <label for="tag" class="form-label" style="font-weight: 600;">Section Tag / Badge</label>
        <input type="text" name="tag" id="tag" value="{{ old('tag', $expertise->tag) }}" class="form-control" placeholder="e.g. ABOUT US" />
      </div>

      <div class="form-group">
        <label for="status" class="form-label" style="font-weight: 600;">Section Status</label>
        <select name="status" id="status" class="form-control">
          <option value="active" {{ old('status', $expertise->status) === 'active' ? 'selected' : '' }}>Active (Show Section)</option>
          <option value="deactive" {{ old('status', $expertise->status) === 'deactive' ? 'selected' : '' }}>Deactive (Hide Section)</option>
        </select>
      </div>
    </div>

    <div class="form-group" style="margin-bottom: 1.25rem;">
      <label for="title" class="form-label" style="font-weight: 600;">Main Section Headline <span style="color: #ef4444;">*</span></label>
      <textarea name="title" id="title" rows="2" class="form-control" required>{{ old('title', $expertise->title) }}</textarea>
    </div>
  </div>

  <!-- 2. Center Main Showcase Image -->
  <div class="admin-form-card">
    <div class="card-head">
      <div style="font-weight: 700; font-size: 1rem; color: #0f172a;">Center Portrait Showcase Image</div>
      <span class="card-badge">Center Media</span>
    </div>

    <div class="form-group" style="margin-bottom: 0;">
      <label for="center_image" class="form-label" style="font-weight: 600;">Center Main Portrait Image</label>
      <input type="file" name="center_image" id="center_image" class="form-control" accept="image/*" onchange="previewImage(this, 'centerImagePreview')" />
      <small class="form-text" style="color: #64748b;">Formats: JPG, PNG, WEBP, AVIF. This is the large portrait image displayed in the middle of the About section.</small>
      
      <div style="margin-top: 0.75rem; display: flex; align-items: center; gap: 1rem;">
        <img id="centerImagePreview" src="{{ $expertise->center_image_url }}" alt="Center Image Preview" style="max-height: 120px; max-width: 180px; object-fit: cover; border-radius: 8px; border: 1px solid #e2e8f0;" />
        <span style="font-size: 0.82rem; color: #64748b;">Active Center Showcase Image Preview</span>
      </div>
    </div>
  </div>

  <!-- 3. The 3 Expertise Cards -->
  <div class="admin-form-card">
    <div class="card-head">
      <div style="font-weight: 700; font-size: 1rem; color: #0f172a;">Interactive Expertise Cards (3 Cards)</div>
      <span class="card-badge">Showcase Cards</span>
    </div>

    @php
      $cards = $expertise->cards ?? [];
    @endphp

    @for($i = 0; $i < 3; $i++)
      @php
        $cardTitle = $cards[$i]['title'] ?? '';
        $cardDesc = $cards[$i]['description'] ?? '';
        $cardImgUrl = $expertise->getCardImageUrl($i);
      @endphp
      <div class="card-box">
        <div style="font-weight: 700; font-size: 0.95rem; color: #ff5722; margin-bottom: 0.75rem;">
          Card {{ $i + 1 }} {{ $i == 0 ? '(Left Card)' : '(Right Card ' . $i . ')' }}
        </div>

        <div class="form-group" style="margin-bottom: 1rem;">
          <label class="form-label" style="font-weight: 600;">Card Title <span style="color: #ef4444;">*</span></label>
          <input type="text" name="cards[{{ $i }}][title]" value="{{ old("cards.{$i}.title", $cardTitle) }}" class="form-control" placeholder="e.g. Personalized planning" required />
        </div>

        <div class="form-group" style="margin-bottom: 1rem;">
          <label class="form-label" style="font-weight: 600;">Card Description <span style="color: #ef4444;">*</span></label>
          <textarea name="cards[{{ $i }}][description]" rows="2" class="form-control" required>{{ old("cards.{$i}.description", $cardDesc) }}</textarea>
        </div>

        <div class="form-group" style="margin-bottom: 0;">
          <label class="form-label" style="font-weight: 600;">Showcase Image</label>
          <input type="file" name="cards[{{ $i }}][image]" class="form-control" accept="image/*" onchange="previewImage(this, 'cardPreview_{{ $i }}')" />
          <div style="margin-top: 0.5rem; display: flex; align-items: center; gap: 0.75rem;">
            <img id="cardPreview_{{ $i }}" src="{{ $cardImgUrl }}" alt="Card Preview" style="max-height: 55px; max-width: 90px; object-fit: cover; border-radius: 6px; border: 1px solid #e2e8f0;" />
            <span style="font-size: 0.78rem; color: #64748b;">Current Showcase Image</span>
          </div>
        </div>
      </div>
    @endfor
  </div>

  <div style="display: flex; justify-content: flex-end; gap: 0.75rem; margin-bottom: 3rem;">
    <button type="submit" class="btn btn-primary" style="padding: 0.65rem 1.75rem;">
      <span>Save Expertise Changes</span>
    </button>
  </div>
</form>

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
@endsection
