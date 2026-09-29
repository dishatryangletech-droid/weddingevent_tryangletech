@extends('backend.layouts.app')

@section('title', 'Add New Event Item')

@push('styles')
<style>
  .admin-form-card {
    background: #ffffff;
    border-radius: 12px;
    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
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
  .form-row-2 {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 1.25rem;
    margin-bottom: 1.25rem;
  }
  @media (max-width: 768px) {
    .form-row-2 { grid-template-columns: 1fr; }
  }
</style>
@endpush

@section('content')
  <div class="admin-form-card">
    <div class="card-head">
      <div>
        <div style="font-weight: 700; font-size: 1.1rem; color: #0f172a;">Add New Event</div>
        <div style="font-size: 0.85rem; color: #64748b; margin-top: 2px;">Create a new wedding showcase or event entry.</div>
      </div>
      <a href="{{ route('admin.event-page.items.index') }}" class="btn btn-light btn-sm" style="font-weight: 600;">← Back to List</a>
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

    <form action="{{ route('admin.event-page.items.store') }}" method="POST" enctype="multipart/form-data">
      @csrf

      <div class="form-row-2">
        <div class="form-group">
          <label class="form-label" style="font-weight: 600;">Event Title <span style="color: #ef4444;">*</span></label>
          <input type="text" name="title" value="{{ old('title') }}" class="form-control" placeholder="e.g. Romantic garden couple shoot" required />
        </div>

        <div class="form-group">
          <label class="form-label" style="font-weight: 600;">Location</label>
          <input type="text" name="location" value="{{ old('location') }}" class="form-control" placeholder="e.g. Paris" />
        </div>
      </div>

      <div class="form-row-2">
        <div class="form-group">
          <label class="form-label" style="font-weight: 600;">Date Text</label>
          <input type="text" name="date_text" value="{{ old('date_text') }}" class="form-control" placeholder="e.g. August 12, 2025" />
        </div>

        <div class="form-group">
          <label class="form-label" style="font-weight: 600;">Time Text</label>
          <input type="text" name="time_text" value="{{ old('time_text') }}" class="form-control" placeholder="e.g. 9:00 AM - 11:00 AM" />
        </div>
      </div>

      <div class="form-group" style="margin-bottom: 1.25rem;">
        <label class="form-label" style="font-weight: 600;">Event Description</label>
        <textarea name="description" rows="3" class="form-control" placeholder="Brief event description...">{{ old('description') }}</textarea>
      </div>

      <div class="form-row-2">
        <div class="form-group">
          <label class="form-label" style="font-weight: 600;">Sort Order</label>
          <input type="number" name="sort_order" value="{{ old('sort_order', $nextOrder) }}" class="form-control" min="0" />
        </div>

        <div class="form-group">
          <label class="form-label" style="font-weight: 600;">Status</label>
          <select name="status" class="form-control">
            <option value="active" {{ old('status') === 'active' ? 'selected' : '' }}>Active (Visible)</option>
            <option value="deactive" {{ old('status') === 'deactive' ? 'selected' : '' }}>Deactive (Hidden)</option>
          </select>
        </div>
      </div>

      <div class="form-group" style="margin-bottom: 1.5rem;">
        <label class="form-label" style="font-weight: 600;">Event Cover Image</label>
        <input type="file" name="image" class="form-control" accept="image/*" onchange="previewImage(this, 'evtImgPrev')" />
        <div style="margin-top: 0.5rem;">
          <img id="evtImgPrev" src="" alt="" style="max-height: 100px; border-radius: 8px; display: none; border: 1px solid #cbd5e1;" />
        </div>
      </div>

      <div style="display: flex; gap: 1rem; align-items: center; margin-top: 1.5rem;">
        <button type="submit" class="btn btn-primary" style="padding: 0.6rem 1.5rem; font-weight: 600;">Create Event</button>
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
        const img = document.getElementById(previewId);
        img.src = e.target.result;
        img.style.display = 'block';
      }
      reader.readAsDataURL(input.files[0]);
    }
  }
</script>
@endpush
