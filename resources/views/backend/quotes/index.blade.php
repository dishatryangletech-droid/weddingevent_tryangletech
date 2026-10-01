@extends('backend.layouts.app')

@section('title', 'Quote Requests')
@section('page_title', 'Quote Requests')

@section('content')
  <div class="admin-card">
    <div class="card-header">
      <div>
        <div class="card-title">All Quote Requests</div>
        <div class="card-subtitle">List of all quotes submitted.</div>
      </div>
    </div>

    <!-- quotes Table -->
    <div class="table-responsive">
      <table class="admin-table">
        <thead>
          <tr>
            <th style="width: 140px;">Date</th>
            <th>Name & Email</th>
            <th>Package & Venue</th>
            <th style="width: 120px;">Status</th>
            <th style="width: 140px; text-align: right;">Actions</th>
          </tr>
        </thead>
        <tbody>
          @forelse($quotes as $quote)
            <tr>
              <td style="font-size: 0.85rem; color: var(--text-dim);">
                {{ $quote->created_at->format('M d, Y') }}<br>
                <small>{{ $quote->created_at->format('h:i A') }}</small>
              </td>
              <td>
                <div style="font-weight: 600; color: var(--text-main); font-size: 0.95rem;">{{ $quote->name }}</div>
                <div style="font-size: 0.85rem; color: var(--text-muted); margin-top: 2px;">
                  <a href="mailto:{{ $quote->email }}" style="color: var(--primary-main); text-decoration: none;">{{ $quote->email }}</a>
                </div>
              </td>
              <td>
                <div style="font-size: 0.85rem; color: var(--text-main);">
                  <strong>Pkg:</strong> {{ $quote->package ?? 'N/A' }}<br>
                  <strong>Venue:</strong> {{ $quote->venue ?? 'N/A' }}
                </div>
              </td>
              <td>
                @if($quote->status == 'Approved')
                  <span class="badge badge-active">
                    <span style="display:inline-block;width:6px;height:6px;border-radius:50%;background:#16a34a;"></span> Approved
                  </span>
                @else
                  <span class="badge" style="background: rgba(245, 158, 11, 0.1); color: #d97706; border: 1px solid rgba(245, 158, 11, 0.2);">
                    <span style="display:inline-block;width:6px;height:6px;border-radius:50%;background:#d97706;"></span> {{ $quote->status }}
                  </span>
                @endif
              </td>
              <td style="text-align: right;">
                <div style="display: inline-flex; align-items: center; gap: 0.5rem;">
                  <a href="{{ route('admin.quotes.edit', $quote->id) }}" class="btn btn-secondary btn-sm" title="View & Edit">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                      <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                      <circle cx="12" cy="12" r="3"></circle>
                    </svg>
                    <span>View</span>
                  </a>
                  <form action="{{ route('admin.quotes.destroy', $quote->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this Quote Request from {{ $quote->name }}?');" style="display: inline-block;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm" title="Delete Quote Request">
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
              <td colspan="5" style="text-align: center; padding: 3rem; color: var(--text-dim);">
                <svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" style="margin-bottom: 0.75rem; opacity: 0.5;">
                  <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                  <polyline points="22,6 12,13 2,6"></polyline>
                </svg>
                <div>No quote requests found yet.</div>
              </td>
            </tr>
          @endforelse
        </tbody>
      </table>
    </div>

    <div style="padding: 1rem 1.5rem; border-top: 1px solid var(--border-color);">
      {{ $quotes->links() }}
    </div>
  </div>
@endsection
