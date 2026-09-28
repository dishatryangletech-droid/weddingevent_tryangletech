@extends('backend.layouts.app')

@section('title', 'Services Management')
@section('page_title', 'Services > List')

@section('content')
  <div class="admin-card">
    <div class="card-header">
      <div>
        <div class="card-title">All Services</div>
        <div class="card-subtitle">Manage company services, update short descriptions, titles, and local storage images.</div>
      </div>
      <a href="{{ route('admin.services.create') }}" class="btn btn-primary">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
          <line x1="12" y1="5" x2="12" y2="19"></line>
          <line x1="5" y1="12" x2="19" y2="12"></line>
        </svg>
        <span>Add New Service</span>
      </a>
    </div>

    <!-- Services Table -->
    <div class="table-responsive">
      <table class="admin-table">
        <thead>
          <tr>
            <th style="width: 70px;">Order</th>
            <th style="width: 110px;">Image</th>
            <th>Title &amp; Storage Path</th>
            <th>Short Description</th>
            <th style="width: 120px;">Status</th>
            <th style="width: 160px; text-align: right;">Actions</th>
          </tr>
        </thead>
        <tbody>
          @forelse($services as $svc)
            <tr>
              <td style="font-weight: 700; color: var(--text-dim);">#{{ $svc->order }}</td>
              <td>
                <img src="{{ $svc->image_url }}" alt="{{ $svc->title }}" class="media-thumb" style="width: 80px; height: 55px; object-fit: cover; border-radius: 6px;" />
              </td>
              <td>
                <div style="font-weight: 600; color: var(--text-main); font-size: 0.95rem;">{{ $svc->title }}</div>
                <div style="font-size: 0.78rem; color: var(--text-dim); margin-top: 3px; word-break: break-all;">
                  <strong>Path:</strong> 
                  @if($svc->image)
                    <code>{{ $svc->image }}</code>
                  @else
                    <span style="color: #94a3b8;">(Default theme asset)</span>
                  @endif
                </div>
                <div style="font-size: 0.75rem; color: #64748b; margin-top: 2px;">
                  Slug: <code>{{ $svc->slug }}</code>
                </div>
              </td>
              <td>
                <div style="font-size: 0.85rem; color: var(--text-muted); line-height: 1.4; max-width: 380px;">
                  {{ Str::limit($svc->short_description, 110) }}
                </div>
              </td>
              <td>
                <form action="{{ route('admin.services.toggle', $svc->id) }}" method="POST" style="display: inline-block;">
                  @csrf
                  @method('PATCH')
                  <button type="submit" class="badge badge-{{ $svc->status }}" style="cursor: pointer; border: none;" title="Click to toggle status">
                    @if($svc->status === 'active')
                      <span style="display:inline-block;width:6px;height:6px;border-radius:50%;background:#16a34a;"></span> Active
                    @else
                      <span style="display:inline-block;width:6px;height:6px;border-radius:50%;background:#94a3b8;"></span> Deactive
                    @endif
                  </button>
                </form>
              </td>
              <td style="text-align: right;">
                <div style="display: inline-flex; align-items: center; gap: 0.5rem;">
                  <a href="{{ route('admin.services.edit', $svc->id) }}" class="btn btn-secondary btn-sm" title="Edit Service">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                      <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                      <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                    </svg>
                    <span>Edit</span>
                  </a>
                  <form action="{{ route('admin.services.destroy', $svc->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete service \'{{ $svc->title }}\'?');" style="display: inline-block;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm" title="Delete Service">
                      <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
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
              <td colspan="6" style="text-align: center; padding: 3rem; color: var(--text-dim);">
                <svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" style="margin-bottom: 0.75rem; opacity: 0.5;">
                  <polygon points="12 2 2 7 12 12 22 7 12 2"></polygon>
                  <polyline points="2 17 12 22 22 17"></polyline>
                  <polyline points="2 12 12 17 22 12"></polyline>
                </svg>
                <div>No services found. Click "Add New Service" to create one.</div>
              </td>
            </tr>
          @endforelse
        </tbody>
      </table>
    </div>
  </div>
@endsection
