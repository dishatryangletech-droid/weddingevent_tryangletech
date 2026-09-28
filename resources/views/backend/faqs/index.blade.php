@extends('backend.layouts.app')

@section('title', 'FAQs Management')
@section('page_title', 'Home Page > FAQ Section')

@section('content')
  <div class="admin-card" style="width: 100%;">
    <div class="card-header">
      <div>
        <div class="card-title">Homepage FAQ Section Management ({{ $totalCount ?? $faqs->total() }})</div>
        <div class="card-subtitle">Manage dynamic questions and answers shown in the FAQ accordion section on the homepage.</div>
      </div>
      <a href="{{ route('admin.faqs.create') }}" class="btn btn-primary">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
          <line x1="12" y1="5" x2="12" y2="19"></line>
          <line x1="5" y1="12" x2="19" y2="12"></line>
        </svg>
        <span>Add New FAQ</span>
      </a>
    </div>

    <!-- Filter & Search Toolbar -->
    <div style="padding: 1rem 1.5rem; background: var(--bg-hover); border-bottom: 1px solid var(--border-color); display: flex; align-items: center; justify-content: space-between; gap: 1rem; flex-wrap: wrap;">
      <form action="{{ route('admin.faqs.index') }}" method="GET" style="display: flex; align-items: center; gap: 0.75rem; flex: 1; max-width: 520px;">
        <input type="text" name="search" value="{{ request('search') }}" class="form-control" placeholder="Search FAQs by question or answer keyword..." style="font-size: 0.88rem; padding: 0.5rem 0.85rem;" />
        <button type="submit" class="btn btn-secondary btn-sm" style="padding: 0.55rem 1rem;">Search</button>
        @if(request('search'))
          <a href="{{ route('admin.faqs.index') }}" class="btn btn-sm" style="color: var(--text-dim);">Clear</a>
        @endif
      </form>

      <div style="display: flex; gap: 0.5rem; font-size: 0.82rem; color: var(--text-muted);">
        <span class="badge badge-active" style="display: inline-flex; align-items: center; gap: 4px;">
          <span style="width: 6px; height: 6px; border-radius: 50%; background: #16a34a;"></span>
          Active: {{ $activeCount }}
        </span>
      </div>
    </div>

    <!-- FAQs Table -->
    <div class="table-responsive">
      <table class="admin-table">
        <thead>
          <tr>
            <th style="width: 70px;">Order</th>
            <th style="width: 35%;">Question</th>
            <th>Answer</th>
            <th style="width: 110px;">Status</th>
            <th style="width: 160px; text-align: right;">Actions</th>
          </tr>
        </thead>
        <tbody>
          @forelse($faqs as $item)
            <tr>
              <td style="font-weight: 700; color: var(--text-dim);">#{{ $item->order }}</td>
              <td>
                <div style="font-weight: 600; color: var(--text-main); font-size: 0.95rem; line-height: 1.35;">
                  {{ $item->question }}
                </div>
              </td>
              <td>
                <div style="font-size: 0.86rem; color: var(--text-muted); line-height: 1.4;">
                  {{ Str::limit($item->answer, 150) }}
                </div>
              </td>
              <td>
                <form action="{{ route('admin.faqs.toggle', $item->id) }}" method="POST" style="display: inline-block;">
                  @csrf
                  @method('PATCH')
                  <button type="submit" class="badge badge-{{ $item->status }}" style="cursor: pointer; border: none;" title="Click to toggle status">
                    @if($item->status === 'active')
                      <span style="display:inline-block;width:6px;height:6px;border-radius:50%;background:#16a34a;"></span> Active
                    @else
                      <span style="display:inline-block;width:6px;height:6px;border-radius:50%;background:#64748b;"></span> Deactive
                    @endif
                  </button>
                </form>
              </td>
              <td style="text-align: right;">
                <div style="display: flex; align-items: center; justify-content: flex-end; gap: 0.4rem;">
                  <a href="{{ route('admin.faqs.edit', $item->id) }}" class="btn btn-secondary btn-sm" title="Edit FAQ" style="padding: 0.35rem 0.65rem;">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                      <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                      <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                    </svg>
                  </a>

                  <form action="{{ route('admin.faqs.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this FAQ question?');" style="display: inline-block;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm" style="background: #fee2e2; color: #dc2626; border: 1px solid #fca5a5; padding: 0.35rem 0.65rem;" title="Delete FAQ">
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
              <td colspan="5" style="text-align: center; padding: 3rem 1rem; color: var(--text-muted);">
                <div style="font-size: 1.1rem; font-weight: 600; margin-bottom: 0.5rem; color: var(--text-main);">No FAQs Found</div>
                <p style="margin-bottom: 1rem; font-size: 0.88rem;">Start by creating your first FAQ question and answer.</p>
                <a href="{{ route('admin.faqs.create') }}" class="btn btn-primary btn-sm">Add New FAQ</a>
              </td>
            </tr>
          @endforelse
        </tbody>
      </table>
    </div>

    @if($faqs->hasPages())
      <div style="padding: 1rem 1.5rem; border-top: 1px solid var(--border-color);">
        {{ $faqs->links('backend.layouts.pagination') }}
      </div>
    @endif
  </div>
@endsection
