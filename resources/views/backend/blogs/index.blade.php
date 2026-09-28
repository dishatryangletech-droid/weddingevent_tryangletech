@extends('backend.layouts.app')

@section('title', 'Blogs Management')
@section('page_title', 'Blogs > List')

@section('content')
  <div class="admin-card" style="width: 100%;">
    <div class="card-header">
      <div>
        <div class="card-title">All Blog Posts ({{ $totalCount ?? $blogs->total() }})</div>
        <div class="card-subtitle">Manage company articles, authors, published dates, cover images, and rich editorial content.</div>
      </div>
      <a href="{{ route('admin.blogs.create') }}" class="btn btn-primary">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
          <line x1="12" y1="5" x2="12" y2="19"></line>
          <line x1="5" y1="12" x2="19" y2="12"></line>
        </svg>
        <span>Add New Blog</span>
      </a>
    </div>

    <!-- Filter & Search Toolbar -->
    <div style="padding: 1rem 1.5rem; background: var(--bg-hover); border-bottom: 1px solid var(--border-color); display: flex; align-items: center; justify-content: space-between; gap: 1rem; flex-wrap: wrap;">
      <form action="{{ route('admin.blogs.index') }}" method="GET" style="display: flex; align-items: center; gap: 0.75rem; flex: 1; max-width: 520px;">
        <input type="text" name="search" value="{{ request('search') }}" class="form-control" placeholder="Search blogs by title, author, or keyword..." style="font-size: 0.88rem; padding: 0.5rem 0.85rem;" />
        <button type="submit" class="btn btn-secondary btn-sm" style="padding: 0.55rem 1rem;">Search</button>
        @if(request('search'))
          <a href="{{ route('admin.blogs.index') }}" class="btn btn-sm" style="color: var(--text-dim);">Clear</a>
        @endif
      </form>

      <div style="display: flex; gap: 0.5rem; font-size: 0.82rem; color: var(--text-muted);">
        <span class="badge badge-active" style="display: inline-flex; align-items: center; gap: 4px;">
          <span style="width: 6px; height: 6px; border-radius: 50%; background: #16a34a;"></span>
          Active: {{ $activeCount }}
        </span>
      </div>
    </div>

    <!-- Blogs Table -->
    <div class="table-responsive">
      <table class="admin-table">
        <thead>
          <tr>
            <th style="width: 70px;">Order</th>
            <th style="width: 110px;">Thumbnail</th>
            <th>Title &amp; Slug</th>
            <th style="width: 170px;">Author</th>
            <th style="width: 130px;">Date</th>
            <th style="width: 110px;">Status</th>
            <th style="width: 180px; text-align: right;">Actions</th>
          </tr>
        </thead>
        <tbody>
          @forelse($blogs as $item)
            <tr>
              <td style="font-weight: 700; color: var(--text-dim);">#{{ $item->order }}</td>
              <td>
                <img src="{{ $item->image_url }}" alt="{{ $item->title }}" class="media-thumb" style="width: 85px; height: 55px; object-fit: cover; border-radius: 6px; border: 1px solid var(--border-color);" />
              </td>
              <td>
                <div style="font-weight: 600; color: var(--text-main); font-size: 0.95rem; line-height: 1.35;">{{ $item->title }}</div>
                <div style="font-size: 0.75rem; color: #64748b; margin-top: 3px;">
                  Slug: <code>{{ $item->slug }}</code>
                </div>
                @if($item->short_description)
                  <div style="font-size: 0.82rem; color: var(--text-muted); margin-top: 4px; line-height: 1.35;">
                    {{ Str::limit($item->short_description, 90) }}
                  </div>
                @endif
              </td>
              <td>
                <div style="display: flex; align-items: center; gap: 0.5rem;">
                  @if($item->author_image_url)
                    <img src="{{ $item->author_image_url }}" alt="{{ $item->author_name }}" style="width: 32px; height: 32px; border-radius: 50%; object-fit: cover; border: 1px solid #e2e8f0;" />
                  @else
                    <div style="width: 32px; height: 32px; border-radius: 50%; background: #e2e8f0; display: flex; align-items: center; justify-content: center; font-weight: 700; font-size: 0.75rem; color: #475569;">
                      {{ substr($item->author_name ?: 'A', 0, 1) }}
                    </div>
                  @endif
                  <div>
                    <div style="font-weight: 600; font-size: 0.86rem; color: var(--text-main);">{{ $item->author_name ?: 'Unknown' }}</div>
                    @if($item->author_title)
                      <div style="font-size: 0.75rem; color: var(--text-dim);">{{ $item->author_title }}</div>
                    @endif
                  </div>
                </div>
              </td>
              <td>
                <div style="font-weight: 500; font-size: 0.86rem; color: var(--text-main);">
                  {{ $item->formatted_date ?: 'N/A' }}
                </div>
              </td>
              <td>
                <form action="{{ route('admin.blogs.toggle', $item->id) }}" method="POST" style="display: inline-block;">
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
                <div style="display: inline-flex; align-items: center; gap: 0.4rem;">
                  <a href="{{ route('blog.post', $item->slug) }}" target="_blank" class="btn btn-sm" style="background: #f8fafc; border: 1px solid var(--border-color); color: #475569; padding: 0.4rem 0.6rem;" title="View Live Page">
                    <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                      <path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"></path>
                      <polyline points="15 3 21 3 21 9"></polyline>
                      <line x1="10" y1="14" x2="21" y2="3"></line>
                    </svg>
                  </a>
                  <a href="{{ route('admin.blogs.edit', $item->id) }}" class="btn btn-secondary btn-sm" title="Edit Blog Post">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                      <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                      <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                    </svg>
                    <span>Edit</span>
                  </a>
                  <form action="{{ route('admin.blogs.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete blog post \'{{ addslashes($item->title) }}\'?');" style="display: inline-block;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm" title="Delete Blog Post">
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
                  <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                  <polyline points="14 2 14 8 20 8"></polyline>
                  <line x1="16" y1="13" x2="8" y2="13"></line>
                  <line x1="16" y1="17" x2="8" y2="17"></line>
                </svg>
                <div style="font-weight: 500; font-size: 1rem;">No blog posts found.</div>
                <div style="font-size: 0.85rem; margin-top: 0.25rem;">Click "Add New Blog" to create your first article.</div>
              </td>
            </tr>
          @endforelse
        </tbody>
      </table>
    </div>

    @if($blogs->hasPages())
      <div style="padding: 1.25rem 1.5rem; border-top: 1px solid var(--border-color);">
        {{ $blogs->links('backend.layouts.pagination') }}
      </div>
    @endif
  </div>
@endsection
