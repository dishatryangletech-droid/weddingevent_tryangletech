@extends('backend.layouts.app')

@section('title', 'Add New About Us FAQ')
@section('page_title', 'About Us Page > FAQ Section > Add New')

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
</style>
@endpush

@section('content')
<form action="{{ route('admin.about.faqs.store') }}" method="POST">
  @csrf

  <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 1.5rem;">
    <div>
      <h2 style="font-size: 1.35rem; font-weight: 700; color: #0f172a; margin: 0 0 0.25rem 0;">Add New About Us FAQ Question</h2>
      <p style="font-size: 0.88rem; color: #64748b; margin: 0;">Create a new question and answer for the About Us page FAQ accordion section.</p>
    </div>
    <div style="display: flex; gap: 0.75rem;">
      <a href="{{ route('admin.about.faqs.index') }}" class="btn btn-secondary">Cancel</a>
      <button type="submit" class="btn btn-primary">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
          <polyline points="20 6 9 17 4 12"></polyline>
        </svg>
        <span>Save FAQ</span>
      </button>
    </div>
  </div>

  <div class="admin-form-card">
    <div class="card-head">
      <div style="font-weight: 700; font-size: 1rem; color: #0f172a;">FAQ Information</div>
      <span class="card-badge">Question &amp; Answer</span>
    </div>

    <!-- Question -->
    <div class="form-group" style="margin-bottom: 1.25rem;">
      <label for="question" class="form-label" style="font-weight: 600;">Question <span style="color: #ef4444;">*</span></label>
      <input type="text" name="question" id="question" value="{{ old('question') }}" class="form-control @error('question') is-invalid @enderror" placeholder="e.g. What core services and technology solutions does White Energy provide?" required />
      @error('question')
        <div style="color: #ef4444; font-size: 0.82rem; margin-top: 0.25rem;">{{ $message }}</div>
      @enderror
    </div>

    <!-- Answer -->
    <div class="form-group" style="margin-bottom: 1.25rem;">
      <label for="answer" class="form-label" style="font-weight: 600;">Detailed Answer <span style="color: #ef4444;">*</span></label>
      <textarea name="answer" id="answer" rows="5" class="form-control @error('answer') is-invalid @enderror" placeholder="Write clear, informative answer here..." required>{{ old('answer') }}</textarea>
      @error('answer')
        <div style="color: #ef4444; font-size: 0.82rem; margin-top: 0.25rem;">{{ $message }}</div>
      @enderror
    </div>

    <div class="form-row-2">
      <!-- Display Order -->
      <div class="form-group">
        <label for="order" class="form-label" style="font-weight: 600;">Display Order</label>
        <input type="number" name="order" id="order" value="{{ old('order', $nextOrder) }}" class="form-control" placeholder="1" />
        <small style="color: #64748b; font-size: 0.78rem;">Lower numbers display first in the FAQ list.</small>
      </div>

      <!-- Status -->
      <div class="form-group">
        <label for="status" class="form-label" style="font-weight: 600;">Status <span style="color: #ef4444;">*</span></label>
        <select name="status" id="status" class="form-control" required>
          <option value="active" {{ old('status') === 'active' ? 'selected' : '' }}>Active (Show on About Us Page)</option>
          <option value="deactive" {{ old('status') === 'deactive' ? 'selected' : '' }}>Deactive (Hidden)</option>
        </select>
      </div>
    </div>
  </div>

  <div style="display: flex; justify-content: flex-end; gap: 0.75rem; margin-top: 1.5rem;">
    <a href="{{ route('admin.about.faqs.index') }}" class="btn btn-secondary">Cancel</a>
    <button type="submit" class="btn btn-primary">
      <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
        <polyline points="20 6 9 17 4 12"></polyline>
      </svg>
      <span>Save FAQ</span>
    </button>
  </div>
</form>
@endsection
