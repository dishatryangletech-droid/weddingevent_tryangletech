@extends('backend.layouts.app')

@section('title', 'Services Page > FAQs Management')
@section('page_title', 'Services Page > FAQ Section')

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
  <!-- 1. Section Header & Contact Box Settings Form -->
  <div class="admin-form-card">
    <div class="card-head">
      <div>
        <div style="font-weight: 700; font-size: 1.05rem; color: #0f172a;">Services Page FAQ Header &amp; Contact Box Settings</div>
        <div style="font-size: 0.83rem; color: #64748b; margin-top: 2px;">Manage the left column headline, description, and "Still have questions?" contact box.</div>
      </div>
      <span class="card-badge">Section Settings</span>
    </div>

    <form action="{{ route('admin.service-page.faqs.settings.update') }}" method="POST" enctype="multipart/form-data">
      @csrf

      <div class="form-row-2">
        <div class="form-group">
          <label class="form-label" style="font-weight: 600;">Section Tag / Badge</label>
          <input type="text" name="tag" value="{{ old('tag', $section->tag) }}" class="form-control" placeholder="e.g. FAQ" />
        </div>

        <div class="form-group">
          <label class="form-label" style="font-weight: 600;">Section Status</label>
          <select name="status" class="form-control">
            <option value="active" {{ old('status', $section->status) === 'active' ? 'selected' : '' }}>Active (Show Section)</option>
            <option value="deactive" {{ old('status', $section->status) === 'deactive' ? 'selected' : '' }}>Deactive (Hide Section)</option>
          </select>
        </div>
      </div>

      <div class="form-group" style="margin-bottom: 1.25rem;">
        <label class="form-label" style="font-weight: 600;">Section Headline <span style="color: #ef4444;">*</span></label>
        <input type="text" name="title" value="{{ old('title', $section->title) }}" class="form-control" placeholder="e.g. Frequently Asked Questions" required />
      </div>

      <div class="form-group" style="margin-bottom: 1.25rem;">
        <label class="form-label" style="font-weight: 600;">Subtitle / Description</label>
        <textarea name="subtitle" rows="2" class="form-control">{{ old('subtitle', $section->subtitle) }}</textarea>
      </div>

      <div style="background: #f8fafc; border: 1px solid #e2e8f0; border-radius: 8px; padding: 1.25rem; margin-top: 1.25rem; margin-bottom: 1.25rem;">
        <div style="font-weight: 700; font-size: 0.95rem; color: #ff5722; margin-bottom: 1rem;">"Still have questions?" Contact Card Settings</div>

        <div class="form-row-2">
          <div class="form-group">
            <label class="form-label" style="font-weight: 600;">Contact Box Title</label>
            <input type="text" name="contact_title" value="{{ old('contact_title', $section->contact_title) }}" class="form-control" />
          </div>

          <div class="form-group">
            <label class="form-label" style="font-weight: 600;">Contact Box Subtitle</label>
            <input type="text" name="contact_subtitle" value="{{ old('contact_subtitle', $section->contact_subtitle) }}" class="form-control" />
          </div>
        </div>

        <div class="form-row-2">
          <div class="form-group">
            <label class="form-label" style="font-weight: 600;">Button Text</label>
            <input type="text" name="contact_button_text" value="{{ old('contact_button_text', $section->contact_button_text) }}" class="form-control" />
          </div>

          <div class="form-group">
            <label class="form-label" style="font-weight: 600;">Button Target URL</label>
            <input type="text" name="contact_button_url" value="{{ old('contact_button_url', $section->contact_button_url) }}" class="form-control" />
          </div>
        </div>

        <div class="form-group" style="margin-bottom: 0;">
          <label class="form-label" style="font-weight: 600;">Contact Avatar Image</label>
          <input type="file" name="contact_image" class="form-control" accept="image/*" onchange="previewImage(this, 'contactImgPrev')" />
          <div style="margin-top: 0.5rem; display: flex; align-items: center; gap: 0.75rem;">
            <img id="contactImgPrev" src="{{ $section->contact_image_url }}" alt="Contact Image" style="width: 44px; height: 44px; border-radius: 50%; object-fit: cover; border: 1px solid #e2e8f0;" />
            <span style="font-size: 0.78rem; color: #64748b;">Active Contact Thumbnail</span>
          </div>
        </div>
      </div>

      <div style="display: flex; justify-content: flex-end;">
        <button type="submit" class="btn btn-primary btn-sm" style="padding: 0.5rem 1.25rem;">
          Save Section Header Settings
        </button>
      </div>
    </form>
  </div>

  <!-- 2. FAQs Questions List Table -->
  <div class="admin-card" style="width: 100%;">
    <div class="card-header">
      <div>
        <div class="card-title">Services Page FAQ Questions ({{ $totalCount ?? $faqs->total() }})</div>
        <div class="card-subtitle">Manage questions, detailed answers, and accordion display order on the Services page.</div>
      </div>
      <a href="{{ route('admin.service-page.faqs.create') }}" class="btn btn-primary">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
          <line x1="12" y1="5" x2="12" y2="19"></line>
          <line x1="5" y1="12" x2="19" y2="12"></line>
        </svg>
        <span>Add New FAQ</span>
      </a>
    </div>

    <!-- Search Toolbar -->
    <div style="padding: 1rem 1.5rem; background: var(--bg-hover); border-bottom: 1px solid var(--border-color); display: flex; align-items: center; justify-content: space-between; gap: 1rem; flex-wrap: wrap;">
      <form action="{{ route('admin.service-page.faqs.index') }}" method="GET" style="display: flex; align-items: center; gap: 0.75rem; flex: 1; max-width: 520px;">
        <input type="text" name="search" value="{{ request('search') }}" class="form-control" placeholder="Search FAQs by question or answer keyword..." style="font-size: 0.88rem; padding: 0.5rem 0.85rem;" />
        <button type="submit" class="btn btn-secondary btn-sm" style="padding: 0.55rem 1rem;">Search</button>
        @if(request('search'))
          <a href="{{ route('admin.service-page.faqs.index') }}" class="btn btn-sm" style="color: var(--text-dim);">Clear</a>
        @endif
      </form>

      <div style="display: flex; gap: 0.5rem; font-size: 0.82rem; color: var(--text-muted);">
        <span class="badge badge-active" style="display: inline-flex; align-items: center; gap: 4px; padding: 4px 10px; background: #ecfdf5; color: #047857; border: 1px solid #a7f3d0; border-radius: 9999px;">
          <span style="width: 6px; height: 6px; border-radius: 50%; background: #16a34a;"></span>
          Active: {{ $activeCount }}
        </span>
      </div>
    </div>

    <!-- Table -->
    <div class="table-responsive">
      <table class="admin-table">
        <thead>
          <tr>
            <th style="width: 70px;">Order</th>
            <th style="width: 38%;">Question</th>
            <th>Answer</th>
            <th style="width: 110px;">Status</th>
            <th style="width: 150px; text-align: right;">Actions</th>
          </tr>
        </thead>
        <tbody>
          @forelse($faqs as $item)
            <tr>
              <td style="font-weight: 700; color: var(--text-dim); text-align: center;">#{{ $item->order }}</td>
              <td>
                <div style="font-weight: 600; color: var(--text-main); font-size: 0.92rem; line-height: 1.35;">
                  {{ $item->question }}
                </div>
              </td>
              <td>
                <div style="font-size: 0.85rem; color: var(--text-muted); line-height: 1.45;">
                  {{ Str::limit($item->answer, 140) }}
                </div>
              </td>
              <td>
                <form action="{{ route('admin.service-page.faqs.toggle', $item->id) }}" method="POST" style="display: inline-block;">
                  @csrf
                  @method('PATCH')
                  <button type="submit" style="cursor: pointer; border: none; background: transparent; padding: 0;">
                    <span class="badge badge-{{ $item->status }}" style="display: inline-flex; align-items: center; gap: 4px; padding: 4px 10px; border-radius: 9999px; font-size: 0.78rem; font-weight: 600; background: {{ $item->status === 'active' ? '#ecfdf5' : '#f1f5f9' }}; color: {{ $item->status === 'active' ? '#047857' : '#64748b' }}; border: 1px solid {{ $item->status === 'active' ? '#a7f3d0' : '#cbd5e1' }};">
                      <span style="width: 6px; height: 6px; border-radius: 50%; background: {{ $item->status === 'active' ? '#16a34a' : '#94a3b8' }};"></span>
                      {{ ucfirst($item->status) }}
                    </span>
                  </button>
                </form>
              </td>
              <td style="text-align: right;">
                <div style="display: flex; align-items: center; justify-content: flex-end; gap: 0.5rem;">
                  <a href="{{ route('admin.service-page.faqs.edit', $item->id) }}" class="btn btn-sm btn-secondary">
                    <span>Edit</span>
                  </a>
                  <form action="{{ route('admin.service-page.faqs.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Delete this FAQ question?');" style="display: inline-block;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger" style="padding: 0.35rem 0.65rem;">
                      <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <polyline points="3 6 5 6 21 6"></polyline>
                        <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                      </svg>
                    </button>
                  </form>
                </div>
              </td>
            </tr>
          @empty
            <tr>
              <td colspan="5" style="text-align: center; padding: 2.5rem; color: var(--text-dim);">
                No FAQs found. <a href="{{ route('admin.service-page.faqs.create') }}">Create your first FAQ</a>.
              </td>
            </tr>
          @endforelse
        </tbody>
      </table>
    </div>

    @if($faqs->hasPages())
      <div style="padding: 1rem 1.5rem; border-top: 1px solid var(--border-color); display: flex; justify-content: center;">
        {{ $faqs->links() }}
      </div>
    @endif
  </div>

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
