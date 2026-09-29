@extends('backend.layouts.app')

@section('title', 'Blog Items')

@push('styles')
<style>
  .items-card {
    background: #ffffff;
    border-radius: 12px;
    box-shadow: 0 1px 3px rgba(0,0,0,0.05);
    border: 1px solid #e2e8f0;
    padding: 1.75rem;
  }
  .card-head {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 1.5rem;
  }
  .search-bar {
    display: flex;
    gap: 0.5rem;
  }
  .search-bar input {
    width: 250px;
  }
  .table-wrapper {
    overflow-x: auto;
  }
  .table {
    width: 100%;
    border-collapse: collapse;
    font-size: 0.9rem;
  }
  .table th {
    background: #f8fafc;
    color: #475569;
    font-weight: 600;
    padding: 12px 16px;
    text-align: left;
    border-bottom: 2px solid #e2e8f0;
  }
  .table td {
    padding: 12px 16px;
    border-bottom: 1px solid #f1f5f9;
    vertical-align: middle;
  }
  .table tr:last-child td {
    border-bottom: none;
  }
  .badge-active { background: #dcfce7; color: #166534; padding: 4px 10px; border-radius: 9999px; font-size: 0.75rem; font-weight: 600; }
  .badge-deactive { background: #fee2e2; color: #991b1b; padding: 4px 10px; border-radius: 9999px; font-size: 0.75rem; font-weight: 600; }
</style>
@endpush

@section('content')

  <div class="items-card">
    <div class="card-head">
      <div>
        <h2 style="font-size: 1.25rem; font-weight: 700; color: #0f172a; margin: 0;">Blog Posts</h2>
        <div style="font-size: 0.85rem; color: #64748b; margin-top: 4px;">
          Showing {{ $activeCount }} active out of {{ $totalCount }} total posts.
        </div>
      </div>
      <div style="display: flex; gap: 1rem; align-items: center;">
        <form action="{{ route('admin.blog-page.items.index') }}" method="GET" class="search-bar">
          <input type="text" name="search" value="{{ request('search') }}" class="form-control" placeholder="Search title or author...">
          <button type="submit" class="btn btn-light">Search</button>
          @if(request('search'))
            <a href="{{ route('admin.blog-page.items.index') }}" class="btn btn-light" title="Clear Search">&times;</a>
          @endif
        </form>
        <a href="{{ route('admin.blog-page.items.create') }}" class="btn btn-primary">+ Add New Blog Post</a>
      </div>
    </div>

    @if (session('success'))
      <div style="padding:12px 16px;background:#ecfdf5;border:1px solid #a7f3d0;color:#065f46;border-radius:8px;margin-bottom:1.5rem;font-size:.9rem;">
        {{ session('success') }}
      </div>
    @endif

    <div class="table-wrapper">
      <table class="table">
        <thead>
          <tr>
            <th style="width: 60px; text-align: center;">Order</th>
            <th style="width: 80px;">Image</th>
            <th>Title</th>
            <th>Author</th>
            <th>Date</th>
            <th>Status</th>
            <th style="text-align: right;">Actions</th>
          </tr>
        </thead>
        <tbody>
          @forelse($items as $item)
            <tr>
              <td style="text-align: center; color: #64748b;">{{ $item->sort_order }}</td>
              <td>
                @if($item->image)
                  <img src="{{ str_starts_with($item->image, 'images/') ? asset($item->image) : asset('storage/' . $item->image) }}" style="width: 50px; height: 50px; border-radius: 6px; object-fit: cover;" />
                @else
                  <div style="width: 50px; height: 50px; border-radius: 6px; background: #f1f5f9; display: flex; align-items: center; justify-content: center; color: #94a3b8; font-size: 0.75rem;">None</div>
                @endif
              </td>
              <td style="font-weight: 600; color: #1e293b;">
                {{ Str::limit($item->title, 40) }}
              </td>
              <td style="color: #475569; font-size: 0.85rem;">
                {{ $item->author_name ?: '-' }}
              </td>
              <td style="color: #475569; font-size: 0.85rem;">
                {{ $item->publish_date ?: '-' }}
              </td>
              <td>
                @if($item->status === 'active')
                  <span class="badge-active">Active</span>
                @else
                  <span class="badge-deactive">Deactive</span>
                @endif
              </td>
              <td style="text-align: right; white-space: nowrap;">
                <form action="{{ route('admin.blog-page.items.toggle', $item->id) }}" method="POST" style="display:inline-block;">
                  @csrf
                  <button type="submit" class="btn btn-sm" style="background: #f1f5f9; color: #475569; margin-right: 0.3rem;" title="Toggle Status">
                    @if($item->status === 'active') Hide @else Show @endif
                  </button>
                </form>
                <a href="{{ route('admin.blog-page.items.edit', $item->id) }}" class="btn btn-light btn-sm" style="margin-right: 0.3rem;">Edit</a>
                <form action="{{ route('admin.blog-page.items.destroy', $item->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Delete this blog post entirely?');">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-sm" style="background:#fee2e2; color:#991b1b; border:none;">Delete</button>
                </form>
              </td>
            </tr>
          @empty
            <tr>
              <td colspan="7" style="text-align: center; color: #94a3b8; padding: 2rem;">
                No blog posts found. Click "Add New Blog Post" to create one.
              </td>
            </tr>
          @endforelse
        </tbody>
      </table>
    </div>
    
    <div style="margin-top: 1.5rem;">
      {{ $items->links() }}
    </div>
  </div>

@endsection
