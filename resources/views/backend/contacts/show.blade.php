@extends('backend.layouts.app')

@section('title', 'View Inquiry')
@section('page_title', 'Contacts > View')

@section('content')
  <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1.5rem; align-items: start;">
    
    <!-- Inquiry Details Card -->
    <div class="admin-card">
      <div class="card-header">
        <div class="card-title">Inquiry Details</div>
      </div>
      
      <div style="padding: 1.5rem;">
        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem; margin-bottom: 1.5rem;">
          <div>
            <div style="font-size: 0.85rem; color: var(--text-dim); margin-bottom: 0.25rem;">Name</div>
            <div style="font-weight: 600; color: var(--text-main);">{{ $inquiry->name }}</div>
          </div>
          <div>
            <div style="font-size: 0.85rem; color: var(--text-dim); margin-bottom: 0.25rem;">Company</div>
            <div style="font-weight: 600; color: var(--text-main);">{{ $inquiry->company_name ?? 'N/A' }}</div>
          </div>
          <div>
            <div style="font-size: 0.85rem; color: var(--text-dim); margin-bottom: 0.25rem;">Email</div>
            <div style="font-weight: 600; color: var(--text-main);">
              <a href="mailto:{{ $inquiry->email }}">{{ $inquiry->email }}</a>
            </div>
          </div>
          <div>
            <div style="font-size: 0.85rem; color: var(--text-dim); margin-bottom: 0.25rem;">Phone</div>
            <div style="font-weight: 600; color: var(--text-main);">
              <a href="tel:{{ $inquiry->phone }}">{{ $inquiry->phone }}</a>
            </div>
          </div>
          <div>
            <div style="font-size: 0.85rem; color: var(--text-dim); margin-bottom: 0.25rem;">Service of Interest</div>
            <div style="font-weight: 600; color: var(--text-main);">{{ $inquiry->service ?? 'N/A' }}</div>
          </div>
          <div>
            <div style="font-size: 0.85rem; color: var(--text-dim); margin-bottom: 0.25rem;">Submitted At</div>
            <div style="font-weight: 600; color: var(--text-main);">{{ $inquiry->created_at->format('M d, Y h:i A') }}</div>
          </div>
        </div>

        <div>
          <div style="font-size: 0.85rem; color: var(--text-dim); margin-bottom: 0.5rem;">Project Details</div>
          <div style="background: #f8fafc; padding: 1rem; border-radius: 6px; border: 1px solid #e2e8f0; color: var(--text-main); white-space: pre-wrap; font-size: 0.95rem; line-height: 1.5;">{{ $inquiry->project_details }}</div>
        </div>
      </div>
    </div>

    <!-- Reply Card -->
    <div class="admin-card">
      <div class="card-header">
        <div class="card-title">Reply to Inquiry</div>
      </div>
      
      <div style="padding: 1.5rem;">
        @if($inquiry->replied_at)
          <div style="margin-bottom: 1.5rem;">
            <div style="display: flex; align-items: center; gap: 0.5rem; margin-bottom: 0.75rem;">
              <span class="badge" style="background:#16a34a; color:white; padding: 4px 8px; border-radius: 4px; font-size: 0.75rem;">Replied on {{ $inquiry->replied_at->format('M d, Y h:i A') }}</span>
            </div>
            <div style="font-size: 0.85rem; color: var(--text-dim); margin-bottom: 0.5rem;">Your previous reply:</div>
            <div style="background: #f0fdf4; padding: 1rem; border-radius: 6px; border: 1px solid #bbf7d0; color: #166534; white-space: pre-wrap; font-size: 0.95rem; line-height: 1.5;">{{ $inquiry->reply_message }}</div>
          </div>
          <hr style="border-color: #e2e8f0; margin-bottom: 1.5rem;">
          <h4 style="font-size: 1rem; font-weight: 600; margin-bottom: 1rem; color: var(--text-main);">Send Another Reply</h4>
        @endif

        <form action="{{ route('admin.contacts.reply', $inquiry->id) }}" method="POST">
          @csrf
          <div class="form-group">
            <label class="form-label">Message</label>
            <textarea name="reply_message" rows="8" class="form-control" required placeholder="Type your reply here. This will be sent directly to {{ $inquiry->email }}"></textarea>
            @error('reply_message')
              <div class="error-text" style="color: red; font-size: 0.85rem; margin-top: 5px;">{{ $message }}</div>
            @enderror
          </div>
          <div style="text-align: right; margin-top: 1rem;">
            <button type="submit" class="btn btn-primary">
              <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="margin-right: 5px;">
                <line x1="22" y1="2" x2="11" y2="13"></line>
                <polygon points="22 2 15 22 11 13 2 9 22 2"></polygon>
              </svg>
              Send Reply
            </button>
          </div>
        </form>
      </div>
    </div>
    
  </div>
  
  <div style="margin-top: 1.5rem;">
    <a href="{{ route('admin.contacts.index') }}" class="btn btn-secondary">
      <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="margin-right: 5px;">
        <line x1="19" y1="12" x2="5" y2="12"></line>
        <polyline points="12 19 5 12 12 5"></polyline>
      </svg>
      Back to List
    </a>
  </div>
@endsection
