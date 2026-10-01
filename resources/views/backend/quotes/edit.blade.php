@extends('backend.layouts.app')

@section('title', 'View Quote Request')
@section('page_title', 'View Quote Request')

@section('content')
  <div class="admin-card" style="max-width: 800px; margin: 0 auto;">
    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
      <div>
        <div class="card-title">Quote Request from {{ $quote->name }}</div>
        <div class="card-subtitle">Received on {{ $quote->created_at->format('M d, Y \\a\\t h:i A') }}</div>
      </div>
      <a href="{{ route('admin.quotes.index') }}" class="btn btn-secondary">
        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
          <line x1="19" y1="12" x2="5" y2="12"></line>
          <polyline points="12 19 5 12 12 5"></polyline>
        </svg>
        <span>Back to List</span>
      </a>
    </div>

    <div style="padding: 1.5rem;">
      <!-- Quote Details -->
      <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 1.5rem; margin-bottom: 2rem;">
        <div>
          <div style="font-size: 0.85rem; color: var(--text-muted); margin-bottom: 0.25rem;">Name</div>
          <div style="font-weight: 500;">{{ $quote->name }}</div>
        </div>
        <div>
          <div style="font-size: 0.85rem; color: var(--text-muted); margin-bottom: 0.25rem;">Email</div>
          <div style="font-weight: 500;">
            <a href="mailto:{{ $quote->email }}" style="color: var(--primary-main); text-decoration: none;">{{ $quote->email }}</a>
          </div>
        </div>
        <div>
          <div style="font-size: 0.85rem; color: var(--text-muted); margin-bottom: 0.25rem;">Guests</div>
          <div style="font-weight: 500;">{{ $quote->guests ?? 'N/A' }}</div>
        </div>
        <div>
          <div style="font-size: 0.85rem; color: var(--text-muted); margin-bottom: 0.25rem;">Wedding Date</div>
          <div style="font-weight: 500;">{{ $quote->wedding_date ? \Carbon\Carbon::parse($quote->wedding_date)->format('M d, Y') : 'N/A' }}</div>
        </div>
        <div>
          <div style="font-size: 0.85rem; color: var(--text-muted); margin-bottom: 0.25rem;">Package</div>
          <div style="font-weight: 500;">{{ $quote->package ?? 'N/A' }}</div>
        </div>
        <div>
          <div style="font-size: 0.85rem; color: var(--text-muted); margin-bottom: 0.25rem;">Venue</div>
          <div style="font-weight: 500;">{{ $quote->venue ?? 'N/A' }}</div>
        </div>
      </div>

      <div style="margin-bottom: 2rem;">
        <div style="font-size: 0.85rem; color: var(--text-muted); margin-bottom: 0.5rem;">Message</div>
        <div style="background: rgba(0,0,0,0.02); border: 1px solid var(--border-color); padding: 1rem; border-radius: var(--radius-md); color: var(--text-main); white-space: pre-wrap; line-height: 1.5;">{{ $quote->message ?: 'No message provided.' }}</div>
      </div>

      <hr style="border: 0; border-top: 1px solid var(--border-color); margin: 2rem 0;">

      <!-- Actions: Status & Reply -->
      <div style="display: grid; grid-template-columns: 1fr; gap: 2rem;">
        
        <!-- Status Form -->
        <div style="background: var(--bg-surface); border: 1px solid var(--border-color); border-radius: var(--radius-lg); padding: 1.5rem;">
          <h3 style="font-size: 1.1rem; font-weight: 600; margin-top: 0; margin-bottom: 1rem; color: var(--text-main);">Update Status</h3>
          <form action="{{ route('admin.quotes.update', $quote->id) }}" method="POST">
            @csrf
            @method('PUT')
            
            <input type="hidden" name="name" value="{{ $quote->name }}">
            <input type="hidden" name="email" value="{{ $quote->email }}">
            <input type="hidden" name="guests" value="{{ $quote->guests }}">
            <input type="hidden" name="package" value="{{ $quote->package }}">
            <input type="hidden" name="venue" value="{{ $quote->venue }}">
            <input type="hidden" name="wedding_date" value="{{ $quote->wedding_date }}">
            <input type="hidden" name="message" value="{{ $quote->message }}">

            <div class="form-group" style="margin-bottom: 1rem;">
              <label class="form-label">Status</label>
              <select name="status" class="form-control" style="max-width: 300px;">
                <option value="Pending" {{ $quote->status == 'Pending' ? 'selected' : '' }}>Pending</option>
                <option value="Approved" {{ $quote->status == 'Approved' ? 'selected' : '' }}>Approved</option>
                <option value="Rejected" {{ $quote->status == 'Rejected' ? 'selected' : '' }}>Rejected</option>
              </select>
            </div>
            
            <button type="submit" class="btn btn-primary">
              <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"></path>
                <polyline points="17 21 17 13 7 13 7 21"></polyline>
                <polyline points="7 3 7 8 15 8"></polyline>
              </svg>
              <span>Update Status</span>
            </button>
          </form>

          @if($quote->status == 'Pending')
          <div style="margin-top: 1rem;">
            <form action="{{ route('admin.quotes.approve', $quote->id) }}" method="POST">
              @csrf
              <button type="submit" class="btn btn-secondary" style="background-color: #16a34a; color: white; border-color: #16a34a;">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                  <polyline points="20 6 9 17 4 12"></polyline>
                </svg>
                <span>Quick Approve</span>
              </button>
            </form>
          </div>
          @endif
        </div>

        <!-- Reply Form -->
        <div style="background: var(--bg-surface); border: 1px solid var(--border-color); border-radius: var(--radius-lg); padding: 1.5rem;">
          <h3 style="font-size: 1.1rem; font-weight: 600; margin-top: 0; margin-bottom: 1rem; color: var(--text-main);">Reply via Email</h3>
          
          @if($quote->is_replied)
            <div style="margin-bottom: 1.5rem; padding: 1rem; background: rgba(22, 163, 74, 0.1); border: 1px solid rgba(22, 163, 74, 0.2); border-radius: var(--radius-md);">
              <div style="display: flex; align-items: center; gap: 0.5rem; color: #16a34a; font-weight: 500; margin-bottom: 0.5rem;">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                  <polyline points="20 6 9 17 4 12"></polyline>
                </svg>
                <span>Already replied</span>
              </div>
              <div style="font-size: 0.9rem; color: var(--text-main); white-space: pre-wrap;">{{ $quote->reply_message }}</div>
            </div>
            
            <div style="font-size: 0.9rem; font-weight: 500; margin-bottom: 0.75rem;">Send another reply</div>
          @endif

          <form action="{{ route('admin.quotes.reply', $quote->id) }}" method="POST">
            @csrf
            <div class="form-group" style="margin-bottom: 1rem;">
              <textarea name="reply_message" class="form-control" rows="6" placeholder="Write your reply message here... This will be sent to {{ $quote->email }}" required></textarea>
            </div>
            <div style="display: flex; justify-content: flex-end;">
              <button type="submit" class="btn btn-primary">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                  <line x1="22" y1="2" x2="11" y2="13"></line>
                  <polygon points="22 2 15 22 11 13 2 9 22 2"></polygon>
                </svg>
                <span>Send Reply</span>
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection
