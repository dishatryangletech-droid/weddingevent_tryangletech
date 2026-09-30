@extends('backend.layouts.app')

@section('title', 'View Enquiry')
@section('page_title', 'Contact > Enquiries > View')

@section('content')
  @if(session('success'))
    <div style="background-color: #dcfce7; border: 1px solid #bbf7d0; color: #166534; padding: 1rem; border-radius: 6px; margin-bottom: 1.5rem; display: flex; align-items: center; gap: 0.5rem;">
      <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
        <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
        <polyline points="22 4 12 14.01 9 11.01"></polyline>
      </svg>
      {{ session('success') }}
    </div>
  @endif

  <div class="admin-card" style="margin-bottom: 1.5rem;">
    <div class="card-header">
      <div>
        <div class="card-title">Enquiry Details</div>
        <div class="card-subtitle">Details of the message sent by {{ $contactEnquiry->name }}</div>
      </div>
      <a href="{{ route('admin.contact-enquiries.index') }}" class="btn btn-secondary">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
          <line x1="19" y1="12" x2="5" y2="12"></line>
          <polyline points="12 19 5 12 12 5"></polyline>
        </svg>
        <span>Back to List</span>
      </a>
    </div>
    <div class="card-body" style="padding: 1.5rem;">
      <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 1.5rem; margin-bottom: 2rem;">
        <div>
          <div style="font-size: 0.8rem; color: var(--text-dim); text-transform: uppercase; letter-spacing: 0.05em; margin-bottom: 0.25rem;">Sender Name</div>
          <div style="font-weight: 600; color: var(--text-main); font-size: 1rem;">{{ $contactEnquiry->name }}</div>
        </div>
        <div>
          <div style="font-size: 0.8rem; color: var(--text-dim); text-transform: uppercase; letter-spacing: 0.05em; margin-bottom: 0.25rem;">Email Address</div>
          <div style="font-weight: 600; color: var(--text-main); font-size: 1rem;">
            <a href="mailto:{{ $contactEnquiry->email }}" style="color: var(--primary-main); text-decoration: none;">{{ $contactEnquiry->email }}</a>
          </div>
        </div>
        <div>
          <div style="font-size: 0.8rem; color: var(--text-dim); text-transform: uppercase; letter-spacing: 0.05em; margin-bottom: 0.25rem;">Phone Number</div>
          <div style="font-weight: 600; color: var(--text-main); font-size: 1rem;">{{ $contactEnquiry->phone }}</div>
        </div>
        <div>
          <div style="font-size: 0.8rem; color: var(--text-dim); text-transform: uppercase; letter-spacing: 0.05em; margin-bottom: 0.25rem;">Date Received</div>
          <div style="font-weight: 600; color: var(--text-main); font-size: 1rem;">{{ $contactEnquiry->created_at->format('M d, Y h:i A') }}</div>
        </div>
      </div>
      
      <div>
        <div style="font-size: 0.8rem; color: var(--text-dim); text-transform: uppercase; letter-spacing: 0.05em; margin-bottom: 0.5rem;">Estimated Budget</div>
        <div style="padding: 0.75rem 1rem; background-color: var(--bg-surface); border: 1px solid var(--border-color); border-radius: 6px; font-weight: 500;">
          {{ $contactEnquiry->budget ?? 'Not specified' }}
        </div>
      </div>

      <div style="margin-top: 1.5rem;">
        <div style="font-size: 0.8rem; color: var(--text-dim); text-transform: uppercase; letter-spacing: 0.05em; margin-bottom: 0.5rem;">Message Content</div>
        <div style="padding: 1rem; background-color: var(--bg-body); border: 1px solid var(--border-color); border-radius: 6px; font-size: 0.95rem; line-height: 1.6; color: var(--text-main); white-space: pre-wrap;">{{ $contactEnquiry->message }}</div>
      </div>
    </div>
  </div>

  <div class="admin-card">
    <div class="card-header" style="background-color: var(--bg-surface);">
      <div>
        <div class="card-title">Reply to Enquiry</div>
        <div class="card-subtitle">Send an email response directly to the user.</div>
      </div>
    </div>
    <div class="card-body" style="padding: 1.5rem;">
      @if($contactEnquiry->is_replied)
        <div style="background-color: #f0fdf4; border: 1px solid #bbf7d0; color: #166534; padding: 1.25rem; border-radius: 8px; margin-bottom: 1.5rem;">
          <div style="display: flex; align-items: center; gap: 0.5rem; font-weight: 600; margin-bottom: 0.5rem;">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
              <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
              <polyline points="22 4 12 14.01 9 11.01"></polyline>
            </svg>
            Already Replied
          </div>
          <div style="font-size: 0.95rem; line-height: 1.5; white-space: pre-wrap;">{{ $contactEnquiry->reply_message }}</div>
        </div>
      @endif

      <form action="{{ route('admin.contact-enquiries.reply', $contactEnquiry->id) }}" method="POST">
        @csrf
        <div class="form-group" style="margin-bottom: 1.5rem;">
          <label style="display: block; font-size: 0.9rem; font-weight: 500; color: var(--text-main); margin-bottom: 0.5rem;">Your Reply Message</label>
          <textarea name="reply_message" class="form-control" rows="6" required placeholder="Type your email reply here..." style="width: 100%; padding: 0.75rem; border: 1px solid var(--border-color); border-radius: 6px; font-family: inherit; font-size: 0.95rem; resize: vertical;"></textarea>
          <div style="font-size: 0.8rem; color: var(--text-muted); margin-top: 0.5rem;">This message will be sent to <strong>{{ $contactEnquiry->email }}</strong> immediately upon submitting.</div>
        </div>
        <button type="submit" class="btn btn-primary">
          <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <line x1="22" y1="2" x2="11" y2="13"></line>
            <polygon points="22 2 15 22 11 13 2 9 22 2"></polygon>
          </svg>
          <span>Send Email Reply</span>
        </button>
      </form>
    </div>
  </div>
@endsection
