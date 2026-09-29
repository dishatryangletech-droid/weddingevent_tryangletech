@extends('backend.layouts.app')

@section('title', 'Service Page - Offers Section')

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
  @media (max-width: 768px) {
    .form-row-2 { grid-template-columns: 1fr; }
  }
  .table-card {
    background: #ffffff;
    border-radius: 12px;
    border: 1px solid #e2e8f0;
    overflow: hidden;
    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
  }
  .table-head {
    padding: 1.25rem 1.75rem;
    background: #ffffff;
    border-bottom: 1px solid #e2e8f0;
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-wrap: wrap;
    gap: 1rem;
  }
  .table-custom {
    width: 100%;
    border-collapse: collapse;
    font-size: 0.88rem;
  }
  .table-custom th {
    background: #f8fafc;
    color: #475569;
    font-weight: 600;
    padding: 0.85rem 1.25rem;
    text-align: left;
    border-bottom: 1px solid #e2e8f0;
    text-transform: uppercase;
    font-size: 0.75rem;
    letter-spacing: 0.05em;
  }
  .table-custom td {
    padding: 1rem 1.25rem;
    border-bottom: 1px solid #f1f5f9;
    color: #334155;
    vertical-align: middle;
  }
  .table-custom tr:hover td {
    background: #f8fafc;
  }
</style>
@endpush

@section('content')
  <!-- 1. Section Header Settings Form -->
  <div class="admin-form-card">
    <div class="card-head">
      <div>
        <div style="font-weight: 700; font-size: 1.05rem; color: #0f172a;">Offers Section Header Settings</div>
        <div style="font-size: 0.83rem; color: #64748b; margin-top: 2px;">Manage the tagline and title above the service offers.</div>
      </div>
      <span class="card-badge">Header Settings</span>
    </div>

    @if (session('success'))
      <div style="padding: 12px 16px; background: #ecfdf5; border: 1px solid #a7f3d0; color: #065f46; border-radius: 8px; margin-bottom: 1.5rem; font-size: 0.9rem;">
        {{ session('success') }}
      </div>
    @endif

    <form action="{{ route('admin.service-page.offers.header.update') }}" method="POST">
      @csrf
      <div class="form-row-2">
        <div class="form-group">
          <label class="form-label" style="font-weight: 600;">Tagline (e.g. Services we offer)</label>
          <input type="text" name="tag" value="{{ old('tag', $banner->tag) }}" class="form-control" />
        </div>
        <div class="form-group">
          <label class="form-label" style="font-weight: 600;">Status</label>
          <select name="status" class="form-control">
            <option value="active" {{ old('status', $banner->status) === 'active' ? 'selected' : '' }}>Active</option>
            <option value="deactive" {{ old('status', $banner->status) === 'deactive' ? 'selected' : '' }}>Deactive</option>
          </select>
        </div>
      </div>
      <div class="form-group" style="margin-bottom: 1.25rem;">
        <label class="form-label" style="font-weight: 600;">Title <span style="color: #ef4444;">*</span></label>
        <textarea name="title" rows="2" class="form-control" required>{{ old('title', $banner->title) }}</textarea>
      </div>
      <div style="display: flex; gap: 1rem; align-items: center; margin-top: 1rem;">
        <button type="submit" class="btn btn-primary" style="padding: 0.55rem 1.3rem; font-weight: 600;">Save Header Settings</button>
      </div>
    </form>
  </div>

  <!-- 2. Offers Data Table -->
  <div class="table-card">
    <div class="table-head">
      <div>
        <div style="font-weight: 700; font-size: 1.05rem; color: #0f172a;">Service Offers List</div>
        <div style="font-size: 0.83rem; color: #64748b; margin-top: 2px;">Drag and drop the rows to reorder them on the frontend.</div>
      </div>
      <div style="display: flex; align-items: center; gap: 0.75rem; flex-wrap: wrap;">
        <a href="{{ route('admin.service-page.offers.create') }}" class="btn btn-primary" style="padding: 0.5rem 1.1rem; font-weight: 600; font-size: 0.88rem; display: inline-flex; align-items: center; gap: 6px;">
          <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>
          Add New Offer
        </a>
      </div>
    </div>

    <form action="{{ route('admin.service-page.offers.reorder') }}" method="POST">
      @csrf
      <div style="overflow-x: auto;">
        <table class="table-custom">
          <thead>
            <tr>
              <th style="width: 50px;">Sort</th>
              <th style="width: 60px;">Image</th>
              <th>Title</th>
              <th>Description</th>
              <th style="width: 100px;">Status</th>
              <th style="width: 150px; text-align: right;">Actions</th>
            </tr>
          </thead>
          <tbody id="sortable-list">
            @forelse ($items as $item)
              <tr>
                <td class="sort-handle" style="cursor: grab; color: #94a3b8; font-size: 1.2rem;">
                  <input type="hidden" name="order[]" value="{{ $item->id }}">
                  ☰
                </td>
                <td>
                  @if($item->image)
                    @php
                      $imgUrl = str_starts_with($item->image, 'images/') ? asset($item->image) : asset('storage/' . $item->image);
                    @endphp
                    <img src="{{ $imgUrl }}" alt="{{ $item->title }}" style="width: 48px; height: 48px; border-radius: 8px; object-fit: cover; border: 1px solid #e2e8f0;" />
                  @else
                    <div style="width:48px; height:48px; background:#f1f5f9; border-radius:8px; border:1px solid #e2e8f0;"></div>
                  @endif
                </td>
                <td>
                  <div style="font-weight: 600; color: #0f172a;">{{ $item->title }}</div>
                </td>
                <td>
                  <div style="font-size: 0.85rem; color: #475569;">{{ Str::limit($item->description, 50) }}</div>
                </td>
                <td>
                    <span class="badge" style="display: inline-flex; align-items: center; gap: 4px; padding: 4px 10px; border-radius: 9999px; font-size: 0.78rem; font-weight: 600; background: {{ $item->status === 'active' ? '#ecfdf5' : '#f1f5f9' }}; color: {{ $item->status === 'active' ? '#047857' : '#64748b' }}; border: 1px solid {{ $item->status === 'active' ? '#a7f3d0' : '#cbd5e1' }};">
                      <span style="width: 6px; height: 6px; border-radius: 50%; background: {{ $item->status === 'active' ? '#16a34a' : '#94a3b8' }};"></span>
                      {{ ucfirst($item->status) }}
                    </span>
                </td>
                <td style="text-align: right;">
                  <div style="display: inline-flex; gap: 6px;">
                    <button type="button" class="btn btn-light btn-sm" onclick="document.getElementById('toggle-form-{{ $item->id }}').submit();" style="padding: 4px 10px; font-size: 0.8rem; font-weight: 600; color: #475569; border: 1px solid #cbd5e1;" title="Toggle Status">Toggle</button>
                    <a href="{{ route('admin.service-page.offers.edit', $item->id) }}" class="btn btn-light btn-sm" style="padding: 4px 10px; font-size: 0.8rem; font-weight: 600; color: #2563eb; border: 1px solid #cbd5e1;">Edit</a>
                    <button type="button" class="btn btn-light btn-sm" onclick="if(confirm('Are you sure you want to delete this offer?')) document.getElementById('delete-form-{{ $item->id }}').submit();" style="padding: 4px 10px; font-size: 0.8rem; font-weight: 600; color: #ef4444; border: 1px solid #fca5a5;">Delete</button>
                  </div>
                </td>
              </tr>
            @empty
              <tr>
                <td colspan="6" style="text-align: center; padding: 3rem; color: #64748b;">
                  No service offers found. Click <strong>"Add New Offer"</strong> to create one.
                </td>
              </tr>
            @endforelse
          </tbody>
        </table>
      </div>
      @if($items->count() > 1)
        <div style="padding: 1rem 1.75rem; border-top: 1px solid #e2e8f0;">
          <button type="submit" class="btn btn-secondary btn-sm" style="padding: 0.4rem 0.8rem; font-size: 0.85rem;">Save Display Order</button>
        </div>
      @endif
    </form>

    <!-- Hidden Forms for Toggle and Delete -->
    @foreach($items as $item)
      <form id="toggle-form-{{ $item->id }}" action="{{ route('admin.service-page.offers.toggle-status', $item->id) }}" method="POST" style="display:none;">
          @csrf
      </form>
      <form id="delete-form-{{ $item->id }}" action="{{ route('admin.service-page.offers.destroy', $item->id) }}" method="POST" style="display:none;">
          @csrf
          @method('DELETE')
      </form>
    @endforeach
  </div>

  <script src="https://cdn.jsdelivr.net/npm/sortablejs@latest/Sortable.min.js"></script>
  <script>
      document.addEventListener('DOMContentLoaded', function() {
          var el = document.getElementById('sortable-list');
          if (el) {
              Sortable.create(el, {
                  handle: '.sort-handle',
                  animation: 150,
                  ghostClass: 'bg-light'
              });
          }
      });
  </script>
@endsection
