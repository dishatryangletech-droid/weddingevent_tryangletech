@extends('backend.layouts.app')

@section('title', 'Add Testimonial')
@section('page_title', 'Testimonials > Add New')

@section('content')
  <div class="admin-card">
    <div class="card-header">
      <div>
        <div class="card-title">Add New Testimonial</div>
        <div class="card-subtitle">Create a new client review to display on the homepage.</div>
      </div>
      <a href="{{ route('admin.testimonials.index') }}" class="btn btn-secondary">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
          <line x1="19" y1="12" x2="5" y2="12"></line>
          <polyline points="12 19 5 12 12 5"></polyline>
        </svg>
        <span>Back to List</span>
      </a>
    </div>
    
    <div class="card-body" style="padding: 1.5rem;">
      <form action="{{ route('admin.testimonials.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        
        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1.5rem; margin-bottom: 1.5rem;">
          <div class="form-group">
            <label class="form-label">Client Name *</label>
            <input type="text" name="name" class="form-control" required value="{{ old('name') }}">
            @error('name')<span style="color: red; font-size: 0.8rem;">{{ $message }}</span>@enderror
          </div>
          <div class="form-group">
            <label class="form-label">Headline (Short Title)</label>
            <input type="text" name="headline" class="form-control" value="{{ old('headline') }}">
            @error('headline')<span style="color: red; font-size: 0.8rem;">{{ $message }}</span>@enderror
          </div>
        </div>

        <div class="form-group" style="margin-bottom: 1.5rem;">
          <label class="form-label">Review Text *</label>
          <textarea name="review" class="form-control" rows="4" required>{{ old('review') }}</textarea>
          @error('review')<span style="color: red; font-size: 0.8rem;">{{ $message }}</span>@enderror
        </div>

        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1.5rem; margin-bottom: 1.5rem;">
          <div class="form-group">
            <label class="form-label">Client Image / Avatar</label>
            <input type="file" name="image" class="form-control" accept="image/*">
            <small style="color: var(--text-muted);">Recommended size: 100x100 pixels (Circle)</small>
            @error('image')<span style="color: red; font-size: 0.8rem;">{{ $message }}</span>@enderror
          </div>
          <div class="form-group">
            <label class="form-label">Display Status</label>
            <select name="status" class="form-control">
              <option value="active" {{ old('status') == 'active' ? 'selected' : '' }}>Active (Show)</option>
              <option value="inactive" {{ old('status') == 'inactive' ? 'selected' : '' }}>Inactive (Hide)</option>
            </select>
          </div>
        </div>

        <div class="form-group" style="max-width: 200px; margin-bottom: 2rem;">
          <label class="form-label">Sort Order</label>
          <input type="number" name="sort_order" class="form-control" value="{{ old('sort_order', 0) }}" required>
          <small style="color: var(--text-muted);">Lower numbers appear first</small>
        </div>

        <button type="submit" class="btn btn-primary">Save Testimonial</button>
      </form>
    </div>
  </div>
@endsection
