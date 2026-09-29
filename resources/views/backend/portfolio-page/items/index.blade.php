@extends('backend.layouts.app')

@section('title', 'Portfolio Page - Items')

@push('styles')
<style>
  .admin-card {
    background: #ffffff;
    border-radius: 12px;
    box-shadow: 0 1px 3px rgba(0,0,0,0.05);
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
  
  .table-responsive { overflow-x: auto; }
  .items-table { width: 100%; border-collapse: collapse; font-size: 0.9rem; }
  .items-table th { background: #f8fafc; color: #475569; font-weight: 600; padding: 12px 14px; text-align: left; border-bottom: 2px solid #e2e8f0; white-space: nowrap; }
  .items-table td { padding: 12px 14px; border-bottom: 1px solid #f1f5f9; vertical-align: middle; }
  .items-table tr:last-child td { border-bottom: none; }
  
  .badge-active { background: #dcfce7; color: #166534; padding: 4px 10px; border-radius: 9999px; font-size: 0.75rem; font-weight: 600; }
  .badge-deactive { background: #fee2e2; color: #991b1b; padding: 4px 10px; border-radius: 9999px; font-size: 0.75rem; font-weight: 600; }
  
  .search-bar {
    display: flex; gap: 0.5rem; margin-bottom: 1.5rem;
  }
</style>
@endpush

@section('content')

  <div class="admin-card">
    <div class="card-head">
      <div>
        <div style="font-weight: 700; font-size: 1.1rem; color: #0f172a;">Portfolio Items Management</div>
        <div style="font-size: 0.85rem; color: #64748b; margin-top: 2px;">
          Total Items: <strong>{{ $totalCount }}</strong> | Active: <strong style="color:#16a34a;">{{ $activeCount }}</strong>
        </div>
      </div>
      <a href="{{ route('admin.portfolio-page.items.create') }}" class="btn btn-primary" style="font-weight: 600;">+ Create New Portfolio</a>
    </div>

    <form action="{{ route('admin.portfolio-page.items.index') }}" method="GET" class="search-bar">
      <input type="text" name="search" value="{{ request('search') }}" class="form-control" placeholder="Search portfolio items by title or subtitle..." style="max-width: 400px;" />
      <button type="submit" class="btn btn-primary">Search</button>
      @if(request('search'))
        <a href="{{ route('admin.portfolio-page.items.index') }}" class="btn btn-light">Clear</a>
      @endif
    </form>

    <div class="table-responsive">
      <table class="items-table">
        <thead>
          <tr>
            <th>Order</th>
            <th>Image</th>
            <th>Tag</th>
            <th>Title</th>
            <th>Subtitle</th>
            <th>Status</th>
            <th style="text-align: right;">Actions</th>
          </tr>
        </thead>
        <tbody>
          @forelse ($items as $item)
            <tr>
              <td style="color:#64748b; font-weight: 600;">{{ $item->sort_order }}</td>
              <td>
                <img src="{{ $item->image_url }}" alt="Portfolio" style="width: 50px; height: 50px; object-fit: cover; border-radius: 6px; border: 1px solid #cbd5e1;" />
              </td>
              <td>
                @if($item->tag)
                  <span style="background: #e0e7ff; color: #3730a3; padding: 3px 8px; border-radius: 4px; font-size: 0.75rem; font-weight: 600;">
                    {{ $item->tag->name }}
                  </span>
                @else
                  <span style="color:#94a3b8; font-size: 0.8rem;">-</span>
                @endif
              </td>
              <td style="font-weight: 600; color: #1e293b;">
                {{ Str::limit($item->title, 40) }}
              </td>
              <td style="color: #475569; font-size: 0.85rem;">
                {{ Str::limit($item->subtitle, 40) ?: '-' }}
              </td>
              <td>
                @if($item->status === 'active')
                  <span class="badge-active">Active</span>
                @else
                  <span class="badge-deactive">Deactive</span>
                @endif
              </td>
              <td style="text-align: right; white-space: nowrap;">
                <form action="{{ route('admin.portfolio-page.items.toggle', $item->id) }}" method="POST" style="display:inline-block;">
                  @csrf
                  <button type="submit" class="btn btn-sm" style="background: #f1f5f9; color: #475569; margin-right: 0.3rem;" title="Toggle Status">
                    @if($item->status === 'active') Hide @else Show @endif
                  </button>
                </form>
                <a href="{{ route('admin.portfolio-page.items.edit', $item->id) }}" class="btn btn-light btn-sm" style="margin-right: 0.3rem;">Edit</a>
                <form action="{{ route('admin.portfolio-page.items.destroy', $item->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Delete this portfolio item entirely?');">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-sm" style="background:#fee2e2; color:#991b1b; border:none;">Delete</button>
                </form>
              </td>
            </tr>
          @empty
            <tr>
              <td colspan="7" style="text-align: center; color: #94a3b8; padding: 2rem;">
                No portfolio items found. <a href="{{ route('admin.portfolio-page.items.create') }}" style="color: #2563eb;">Create one now</a>.
              </td>
            </tr>
          @endforelse
        </tbody>
      </table>
    </div>
    
    <div style="margin-top: 1.5rem;">
      {{ $items->links('pagination::bootstrap-5') }}
    </div>

  </div>

@endsection
