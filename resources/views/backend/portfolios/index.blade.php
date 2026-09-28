@extends('backend.layouts.app')

@section('title', 'Portfolio Management')
@section('page_title', 'Portfolio > List')

@section('content')
  <div class="admin-card">
    <div class="card-header">
      <div>
        <div class="card-title">All Portfolio Projects ({{ $totalCount ?? $portfolios->total() }})</div>
        <div class="card-subtitle">Manage company portfolio projects, images, descriptions, dates, and dynamic galleries.</div>
      </div>
      <a href="{{ route('admin.portfolios.create') }}" class="btn btn-primary">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
          <line x1="12" y1="5" x2="12" y2="19"></line>
          <line x1="5" y1="12" x2="19" y2="12"></line>
        </svg>
        <span>Add New Project</span>
      </a>
    </div>

    <!-- Filter & Search Toolbar -->
    <div style="padding: 1rem 1.5rem; background: var(--bg-hover); border-bottom: 1px solid var(--border-color); display: flex; align-items: center; justify-content: space-between; gap: 1rem; flex-wrap: wrap;">
      <form action="{{ route('admin.portfolios.index') }}" method="GET" style="display: flex; align-items: center; gap: 0.75rem; flex: 1; max-width: 480px;">
        <input type="text" name="search" value="{{ request('search') }}" class="form-control" placeholder="Search projects by title or keywords..." style="font-size: 0.88rem; padding: 0.5rem 0.85rem;" />
        <button type="submit" class="btn btn-secondary btn-sm" style="padding: 0.55rem 1rem;">Search</button>
        @if(request('search'))
          <a href="{{ route('admin.portfolios.index') }}" class="btn btn-sm" style="color: var(--text-dim);">Clear</a>
        @endif
      </form>

      <div style="display: flex; gap: 0.5rem; font-size: 0.82rem; color: var(--text-muted);">
        <span class="badge badge-active" style="display: inline-flex; align-items: center; gap: 4px;">
          <span style="width: 6px; height: 6px; border-radius: 50%; background: #16a34a;"></span>
          Active: {{ $activeCount }}
        </span>
      </div>
    </div>

    <!-- Portfolio Table -->
    <div class="table-responsive">
      <table class="admin-table">
        <thead>
          <tr>
            <th style="width: 70px;">Order</th>
            <th style="width: 100px;">Thumbnail</th>
            <th>Project Title &amp; Slug</th>
            <th style="width: 130px;">Project Date</th>
            <th style="width: 100px;">Gallery</th>
            <th style="width: 110px;">Status</th>
            <th style="width: 150px; text-align: right;">Actions</th>
          </tr>
        </thead>
        <tbody>
          @forelse($portfolios as $item)
            <tr>
              <td style="font-weight: 700; color: var(--text-dim);">#{{ $item->order }}</td>
              <td>
                <img src="{{ $item->image_url }}" alt="{{ $item->title }}" class="media-thumb" style="width: 80px; height: 55px; object-fit: cover; border-radius: 6px; border: 1px solid var(--border-color);" />
              </td>
              <td>
                <div style="font-weight: 600; color: var(--text-main); font-size: 0.95rem;">{{ $item->title }}</div>
                <div style="font-size: 0.75rem; color: #64748b; margin-top: 3px;">
                  Slug: <code>{{ $item->slug }}</code>
                </div>
                @if($item->short_description)
                  <div style="font-size: 0.82rem; color: var(--text-muted); margin-top: 4px; line-height: 1.35;">
                    {{ Str::limit($item->short_description, 95) }}
                  </div>
                @endif
              </td>
              <td>
                <div style="font-weight: 500; font-size: 0.88rem; color: var(--text-main);">
                  {{ $item->formatted_date ?: 'N/A' }}
                </div>
              </td>
              <td>
                @php
                  $galleryCount = is_array($item->gallery_images) ? count($item->gallery_images) : 0;
                @endphp
                <span style="display: inline-flex; align-items: center; gap: 4px; font-size: 0.82rem; font-weight: 600; color: #ea580c; background: #fff7ed; padding: 3px 8px; border-radius: 6px; border: 1px solid #ffedd5;">
                  <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                    <rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
                    <circle cx="8.5" cy="8.5" r="1.5"></circle>
                    <polyline points="21 15 16 10 5 21"></polyline>
                  </svg>
                  {{ $galleryCount }} Photos
                </span>
              </td>
              <td>
                <form action="{{ route('admin.portfolios.toggle', $item->id) }}" method="POST" style="display: inline-block;">
                  @csrf
                  @method('PATCH')
                  <button type="submit" class="badge badge-{{ $item->status }}" style="cursor: pointer; border: none;" title="Click to toggle status">
                    @if($item->status === 'active')
                      <span style="display:inline-block;width:6px;height:6px;border-radius:50%;background:#16a34a;"></span> Active
                    @else
                      <span style="display:inline-block;width:6px;height:6px;border-radius:50%;background:#94a3b8;"></span> Deactive
                    @endif
                  </button>
                </form>
              </td>
              <td style="text-align: right;">
                <div style="display: inline-flex; align-items: center; gap: 0.5rem;">
                  <a href="{{ route('admin.portfolios.edit', $item->id) }}" class="btn btn-secondary btn-sm" title="Edit Project">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                      <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                      <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                    </svg>
                    <span>Edit</span>
                  </a>
                  <form action="{{ route('admin.portfolios.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete project \'{{ $item->title }}\'?');" style="display: inline-block;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm" title="Delete Project">
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
              <td colspan="7" style="text-align: center; padding: 3rem; color: var(--text-dim);">
                <svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" style="margin-bottom: 0.75rem; opacity: 0.5;">
                  <rect x="2" y="7" width="20" height="14" rx="2" ry="2"></rect>
                  <path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"></path>
                </svg>
                <div style="font-weight: 500; font-size: 1rem;">No portfolio projects found.</div>
                <div style="font-size: 0.85rem; margin-top: 0.25rem;">Click "Add New Project" to create your first portfolio entry.</div>
              </td>
            </tr>
          @endforelse
        </tbody>
      </table>
    </div>

    @if($portfolios->hasPages())
      <div style="padding: 1.25rem 1.5rem; border-top: 1px solid var(--border-color);">
        {{ $portfolios->links('backend.layouts.pagination') }}
      </div>
    @endif
  </div>
@endsection
