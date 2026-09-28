@extends('backend.layouts.app')

@section('title', 'Contact Inquiries')
@section('page_title', 'Contacts > List')

@section('content')
  <div class="admin-card">
    <div class="card-header">
      <div>
        <div class="card-title">Contact Inquiries</div>
        <div class="card-subtitle">Manage inquiries submitted from the frontend contact form.</div>
      </div>
    </div>

    <div class="table-responsive">
      <table class="admin-table">
        <thead>
          <tr>
            <th>Name</th>
            <th>Email & Phone</th>
            <th>Service</th>
            <th>Date</th>
            <th>Status</th>
            <th style="width: 160px; text-align: right;">Actions</th>
          </tr>
        </thead>
        <tbody>
          @forelse($inquiries as $inquiry)
            <tr>
              <td style="font-weight: 600; color: var(--text-main);">{{ $inquiry->name }}</td>
              <td>
                <div style="font-size: 0.85rem;">
                  <a href="mailto:{{ $inquiry->email }}">{{ $inquiry->email }}</a><br>
                  <a href="tel:{{ $inquiry->phone }}" style="color: var(--text-dim);">{{ $inquiry->phone }}</a>
                </div>
              </td>
              <td>
                <div style="font-size: 0.85rem; color: var(--text-dim);">{{ $inquiry->service ?? 'N/A' }}</div>
              </td>
              <td>
                <div style="font-size: 0.85rem; color: var(--text-dim);">{{ $inquiry->created_at->format('M d, Y h:i A') }}</div>
              </td>
              <td>
                @if($inquiry->replied_at)
                  <span class="badge" style="background:#16a34a; color:white; padding: 4px 8px; border-radius: 4px; font-size: 0.75rem;">Replied</span>
                @elseif($inquiry->is_read)
                  <span class="badge" style="background:#3b82f6; color:white; padding: 4px 8px; border-radius: 4px; font-size: 0.75rem;">Read</span>
                @else
                  <span class="badge" style="background:#ef4444; color:white; padding: 4px 8px; border-radius: 4px; font-size: 0.75rem;">New</span>
                @endif
              </td>
              <td style="text-align: right;">
                <div style="display: inline-flex; align-items: center; gap: 0.5rem;">
                  <a href="{{ route('admin.contacts.show', $inquiry->id) }}" class="btn btn-secondary btn-sm" title="View Inquiry">
                    <span>View / Reply</span>
                  </a>
                  <form action="{{ route('admin.contacts.destroy', $inquiry->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this inquiry?');" style="display: inline-block;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm" title="Delete Inquiry">
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
                <div>No contact inquiries found.</div>
              </td>
            </tr>
          @endforelse
        </tbody>
      </table>
    </div>
    
    @if($inquiries->hasPages())
      <div style="padding: 1rem;">
        {{ $inquiries->links() }}
      </div>
    @endif
  </div>
@endsection
