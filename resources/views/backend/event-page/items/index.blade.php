@extends('backend.layouts.app')

@section('title', 'Events Page - Events List')

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
        <div style="font-weight: 700; font-size: 1.05rem; color: #0f172a;">Events Section Header Settings</div>
        <div style="font-size: 0.83rem; color: #64748b; margin-top: 2px;">Manage the headline tag, title, and description above the events grid.</div>
      </div>
      <span class="card-badge">Header Settings</span>
    </div>

    @if (session('success'))
      <div style="padding: 12px 16px; background: #ecfdf5; border: 1px solid #a7f3d0; color: #065f46; border-radius: 8px; margin-bottom: 1.5rem; font-size: 0.9rem;">
        {{ session('success') }}
      </div>
    @endif

    <form action="{{ route('admin.event-page.items.header.update') }}" method="POST">
      @csrf

      <div class="form-row-2">
        <div class="form-group">
          <label class="form-label" style="font-weight: 600;">Section Badge / Tag</label>
          <input type="text" name="tag" value="{{ old('tag', $header->tag) }}" class="form-control" placeholder="e.g. Our event" />
        </div>

        <div class="form-group">
          <label class="form-label" style="font-weight: 600;">Section Headline <span style="color: #ef4444;">*</span></label>
          <input type="text" name="title" value="{{ old('title', $header->title) }}" class="form-control" placeholder="e.g. Planning your perfection" required />
        </div>
      </div>

      <div class="form-group" style="margin-bottom: 1.25rem;">
        <label class="form-label" style="font-weight: 600;">Section Description</label>
        <textarea name="description" rows="2" class="form-control">{{ old('description', $header->description) }}</textarea>
      </div>

      <div style="display: flex; gap: 1rem; align-items: center; margin-top: 1rem;">
        <button type="submit" class="btn btn-primary" style="padding: 0.55rem 1.3rem; font-weight: 600;">Save Header Settings</button>
      </div>
    </form>
  </div>

  <!-- 2. Events Data Table -->
  <div class="table-card">
    <div class="table-head">
      <div>
        <div style="font-weight: 700; font-size: 1.05rem; color: #0f172a;">Event Items List</div>
        <div style="font-size: 0.83rem; color: #64748b; margin-top: 2px;">Total Events: {{ $totalCount }} | Active: {{ $activeCount }}</div>
      </div>

      <div style="display: flex; align-items: center; gap: 0.75rem; flex-wrap: wrap;">
        <form action="{{ route('admin.event-page.items.index') }}" method="GET" style="display: flex; gap: 0.5rem;">
          <input type="text" name="search" value="{{ request('search') }}" class="form-control" placeholder="Search events..." style="padding: 0.4rem 0.8rem; font-size: 0.85rem; width: 220px;" />
          <button type="submit" class="btn btn-secondary" style="padding: 0.4rem 0.8rem; font-size: 0.85rem;">Search</button>
          @if(request('search'))
            <a href="{{ route('admin.event-page.items.index') }}" class="btn btn-light" style="padding: 0.4rem 0.8rem; font-size: 0.85rem;">Clear</a>
          @endif
        </form>

        <a href="{{ route('admin.event-page.items.create') }}" class="btn btn-primary" style="padding: 0.5rem 1.1rem; font-weight: 600; font-size: 0.88rem; display: inline-flex; align-items: center; gap: 6px;">
          <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>
          Add New Event
        </a>
      </div>
    </div>

    <div style="overflow-x: auto;">
      <table class="table-custom">
        <thead>
          <tr>
            <th style="width: 60px;">Image</th>
            <th>Title &amp; Location</th>
            <th>Date &amp; Time</th>
            <th style="width: 80px;">Order</th>
            <th style="width: 100px;">Status</th>
            <th style="width: 150px; text-align: right;">Actions</th>
          </tr>
        </thead>
        <tbody>
          @forelse ($items as $item)
            <tr>
              <td>
                <img src="{{ $item->image_url }}" alt="{{ $item->title }}" style="width: 48px; height: 48px; border-radius: 8px; object-fit: cover; border: 1px solid #e2e8f0;" />
              </td>
              <td>
                <div style="font-weight: 600; color: #0f172a;">{{ $item->title }}</div>
                <div style="font-size: 0.8rem; color: #64748b;">📍 {{ $item->location ?? 'N/A' }}</div>
              </td>
              <td>
                <div style="font-size: 0.85rem; font-weight: 500;">📅 {{ $item->date_text ?? 'N/A' }}</div>
                <div style="font-size: 0.78rem; color: #64748b;">⏰ {{ $item->time_text ?? 'N/A' }}</div>
              </td>
              <td>
                <span style="font-weight: 600; color: #475569;">#{{ $item->sort_order }}</span>
              </td>
              <td>
                <form action="{{ route('admin.event-page.items.toggle', $item->id) }}" method="POST" style="display: inline-block;">
                  @csrf
                  @method('PATCH')
                  <button type="submit" style="cursor: pointer; border: none; background: transparent; padding: 0;">
                    <span class="badge" style="display: inline-flex; align-items: center; gap: 4px; padding: 4px 10px; border-radius: 9999px; font-size: 0.78rem; font-weight: 600; background: {{ $item->status === 'active' ? '#ecfdf5' : '#f1f5f9' }}; color: {{ $item->status === 'active' ? '#047857' : '#64748b' }}; border: 1px solid {{ $item->status === 'active' ? '#a7f3d0' : '#cbd5e1' }};">
                      <span style="width: 6px; height: 6px; border-radius: 50%; background: {{ $item->status === 'active' ? '#16a34a' : '#94a3b8' }};"></span>
                      {{ ucfirst($item->status) }}
                    </span>
                  </button>
                </form>
              </td>
              <td style="text-align: right;">
                <div style="display: inline-flex; gap: 6px;">
                  <a href="{{ route('admin.event-page.items.edit', $item->id) }}" class="btn btn-light btn-sm" style="padding: 4px 10px; font-size: 0.8rem; font-weight: 600; color: #2563eb; border: 1px solid #cbd5e1;">Edit</a>
                  <form action="{{ route('admin.event-page.items.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this event?');" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-light btn-sm" style="padding: 4px 10px; font-size: 0.8rem; font-weight: 600; color: #ef4444; border: 1px solid #fca5a5;">Delete</button>
                  </form>
                </div>
              </td>
            </tr>
          @empty
            <tr>
              <td colspan="6" style="text-align: center; padding: 3rem; color: #64748b;">
                No events found. Click <strong>"Add New Event"</strong> to create one.
              </td>
            </tr>
          @endforelse
        </tbody>
      </table>
    </div>

    @if ($items->hasPages())
      <div style="padding: 1rem 1.75rem; border-top: 1px solid #e2e8f0;">
        {{ $items->links() }}
      </div>
    @endif
  </div>
@endsection
