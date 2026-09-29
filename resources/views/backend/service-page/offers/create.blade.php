@extends('backend.layouts.app')

@section('title', 'Add New Service Offer')

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
        <div style="font-weight: 700; font-size: 1.1rem; color: #0f172a;">Add New Service Offer</div>
        <div style="font-size: 0.85rem; color: #64748b; margin-top: 2px;">Create a new service offer entry.</div>
      </div>
      <a href="{{ route('admin.service-page.offers.index') }}" class="btn btn-light btn-sm" style="font-weight: 600;">← Back to List</a>
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

    <form action="{{ route('admin.service-page.offers.store') }}" method="POST" enctype="multipart/form-data">
      @csrf

      <div class="form-row-2">
        <div class="form-group">
          <label class="form-label" style="font-weight: 600;">Offer Title <span style="color: #ef4444;">*</span></label>
          <input type="text" name="title" value="{{ old('title') }}" class="form-control" placeholder="e.g. Artful floral design" required />
        </div>

        <div class="form-group">
          <label class="form-label" style="font-weight: 600;">Status</label>
          <select name="status" class="form-control">
            <option value="active" {{ old('status') === 'active' ? 'selected' : '' }}>Active (Visible)</option>
            <option value="deactive" {{ old('status') === 'deactive' ? 'selected' : '' }}>Deactive (Hidden)</option>
          </select>
        </div>
      </div>

      <div class="form-group" style="margin-bottom: 1.25rem;">
        <label class="form-label" style="font-weight: 600;">Short Description <span style="color: #ef4444;">*</span></label>
        <textarea name="description" rows="3" class="form-control" placeholder="Brief service description..." required>{{ old('description') }}</textarea>
      </div>

      <div class="form-group" style="margin-bottom: 1.25rem;">
        <label class="form-label" style="font-weight: 600;">Offer Image <span style="color: #ef4444;">*</span></label>
        <input type="file" name="image" class="form-control" accept="image/*" required />
        <div style="font-size: 0.8rem; color: #64748b; margin-top: 6px;">Recommended size: around 800x600 pixels.</div>
      </div>

      <div style="display: flex; gap: 1rem; align-items: center; margin-top: 1.5rem; padding-top: 1.5rem; border-top: 1px solid #f1f5f9;">
        <button type="submit" class="btn btn-primary" style="padding: 0.55rem 1.3rem; font-weight: 600;">Save Offer</button>
        <a href="{{ route('admin.service-page.offers.index') }}" class="btn btn-light" style="padding: 0.55rem 1.3rem; font-weight: 600;">Cancel</a>
      </div>
    </form>
  </div>
@endsection
