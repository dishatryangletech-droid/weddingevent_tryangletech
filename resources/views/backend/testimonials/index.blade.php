@extends('backend.layouts.app')

@section('title', 'Testimonials & Reviews Management')
@section('page_title', 'Testimonials & Client Reviews')

@section('content')
  <div class="admin-card" style="width: 100%;">
    <div class="card-header">
      <div>
        <div class="card-title">Client Reviews &amp; Testimonials ({{ $totalCount ?? $testimonials->total() }})</div>
        <div class="card-subtitle">Manage customer feedback, ratings, and quotes. Only approved testimonials are displayed on the Home and About Us pages.</div>
      </div>
      <a href="{{ route('admin.testimonials.create') }}" class="btn btn-primary">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
          <line x1="12" y1="5" x2="12" y2="19"></line>
          <line x1="5" y1="12" x2="19" y2="12"></line>
        </svg>
        <span>Add New Review</span>
      </a>
    </div>

    <!-- Filter & Search Toolbar -->
    <div style="padding: 1rem 1.5rem; background: var(--bg-hover); border-bottom: 1px solid var(--border-color); display: flex; align-items: center; justify-content: space-between; gap: 1rem; flex-wrap: wrap;">
      <form action="{{ route('admin.testimonials.index') }}" method="GET" style="display: flex; align-items: center; gap: 0.75rem; flex: 1; max-width: 680px; flex-wrap: wrap;">
        <input type="text" name="search" value="{{ request('search') }}" class="form-control" placeholder="Search by client, company, quote, or review..." style="font-size: 0.88rem; padding: 0.5rem 0.85rem; min-width: 240px; flex: 1;" />
        
        <select name="status" class="form-control" style="font-size: 0.85rem; padding: 0.5rem 0.85rem; width: auto;" onchange="this.form.submit()">
          <option value="">All Statuses</option>
          <option value="approved" {{ request('status') === 'approved' ? 'selected' : '' }}>Approved Only</option>
          <option value="pending" {{ request('status') === 'pending' ? 'selected' : '' }}>Pending / Unapproved</option>
        </select>

        <select name="placement" class="form-control" style="font-size: 0.85rem; padding: 0.5rem 0.85rem; width: auto;" onchange="this.form.submit()">
          <option value="">All Pages</option>
          <option value="home" {{ request('placement') === 'home' ? 'selected' : '' }}>Home Page</option>
          <option value="about" {{ request('placement') === 'about' ? 'selected' : '' }}>About Us Page</option>
        </select>

        <button type="submit" class="btn btn-secondary btn-sm" style="padding: 0.55rem 1rem;">Filter</button>
        @if(request('search') || request('status') || request('placement'))
          <a href="{{ route('admin.testimonials.index') }}" class="btn btn-sm" style="color: var(--text-dim);">Clear</a>
        @endif
      </form>

      <div style="display: flex; gap: 0.75rem; font-size: 0.82rem; flex-wrap: wrap;">
        <span class="badge badge-active" style="display: inline-flex; align-items: center; gap: 5px; padding: 4px 10px; background: #ecfdf5; color: #047857; border: 1px solid #a7f3d0; border-radius: 9999px; font-weight: 600;">
          <span style="width: 7px; height: 7px; border-radius: 50%; background: #10b981;"></span>
          Approved: {{ $approvedCount }}
        </span>
        <span class="badge badge-pending" style="display: inline-flex; align-items: center; gap: 5px; padding: 4px 10px; background: #fffbeb; color: #b45309; border: 1px solid #fde68a; border-radius: 9999px; font-weight: 600;">
          <span style="width: 7px; height: 7px; border-radius: 50%; background: #f59e0b;"></span>
          Pending: {{ $pendingCount }}
        </span>
      </div>
    </div>

    <!-- Testimonials Table -->
    <div class="table-responsive">
      <table class="admin-table">
        <thead>
          <tr>
            <th style="width: 60px;">Order</th>
            <th style="width: 220px;">Client &amp; Company</th>
            <th>Review &amp; Rating</th>
            <th style="width: 140px;">Display On</th>
            <th style="width: 130px; text-align: center;">Approval</th>
            <th style="width: 130px; text-align: right;">Actions</th>
          </tr>
        </thead>
        <tbody>
          @forelse($testimonials as $item)
            <tr>
              <td style="font-weight: 700; color: var(--text-dim); text-align: center;">#{{ $item->order }}</td>
              <td>
                <div style="display: flex; align-items: center; gap: 0.75rem;">
                  <div style="width: 42px; height: 42px; border-radius: 8px; background: #f8fafc; border: 1px solid #e2e8f0; display: flex; align-items: center; justify-content: center; overflow: hidden; flex-shrink: 0; padding: 4px;">
                    <img src="{{ $item->company_logo_url }}" alt="{{ $item->company_name ?? 'Company' }}" style="max-width: 100%; max-height: 100%; object-fit: contain;" />
                  </div>
                  <div>
                    <div style="font-weight: 600; color: var(--text-main); font-size: 0.92rem; line-height: 1.3;">
                      {{ $item->client_name }}
                    </div>
                    <div style="font-size: 0.78rem; color: var(--text-muted);">
                      {{ $item->client_designation ?: 'Client' }}
                    </div>
                    @if($item->company_name)
                      <div style="font-size: 0.74rem; color: #ff5722; font-weight: 600; margin-top: 2px;">
                        {{ $item->company_name }}
                      </div>
                    @endif
                  </div>
                </div>
              </td>
              <td>
                <div style="display: flex; align-items: center; gap: 0.4rem; margin-bottom: 0.35rem;">
                  <span style="color: #f59e0b; font-size: 0.95rem; letter-spacing: 1px;">
                    @for($i = 1; $i <= 5; $i++)
                      {{ $i <= $item->rating ? '★' : '☆' }}
                    @endfor
                  </span>
                  <span style="font-size: 0.75rem; color: #94a3b8; font-weight: 600;">({{ $item->rating }}/5)</span>
                </div>
                @if($item->headline)
                  <div style="font-weight: 600; font-size: 0.88rem; color: var(--text-main); line-height: 1.35; margin-bottom: 4px;">
                    &ldquo;{{ $item->headline }}&rdquo;
                  </div>
                @endif
                <div style="font-size: 0.83rem; color: var(--text-muted); line-height: 1.45;">
                  {{ Str::limit($item->review, 140) }}
                </div>
              </td>
              <td>
                <div style="display: flex; flex-direction: column; gap: 4px;">
                  <span style="display: inline-flex; align-items: center; gap: 5px; font-size: 0.75rem; font-weight: 600; color: {{ $item->show_on_home ? '#047857' : '#94a3b8' }};">
                    <span style="width: 6px; height: 6px; border-radius: 50%; background: {{ $item->show_on_home ? '#10b981' : '#cbd5e1' }};"></span>
                    Home Page
                  </span>
                  <span style="display: inline-flex; align-items: center; gap: 5px; font-size: 0.75rem; font-weight: 600; color: {{ $item->show_on_about ? '#047857' : '#94a3b8' }};">
                    <span style="width: 6px; height: 6px; border-radius: 50%; background: {{ $item->show_on_about ? '#10b981' : '#cbd5e1' }};"></span>
                    About Us Page
                  </span>
                </div>
              </td>
              <td style="text-align: center;">
                <form action="{{ route('admin.testimonials.toggle-approval', $item->id) }}" method="POST" style="display: inline-block;">
                  @csrf
                  @if($item->is_approved)
                    <button type="submit" style="background: #ecfdf5; border: 1px solid #a7f3d0; color: #047857; font-weight: 700; font-size: 0.76rem; border-radius: 9999px; padding: 4px 12px; cursor: pointer; display: inline-flex; align-items: center; gap: 4px; transition: all 0.2s;" title="Click to unapprove review">
                      <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round">
                        <polyline points="20 6 9 17 4 12"></polyline>
                      </svg>
                      Approved
                    </button>
                  @else
                    <button type="submit" style="background: #fffbeb; border: 1px solid #fde68a; color: #b45309; font-weight: 700; font-size: 0.76rem; border-radius: 9999px; padding: 4px 12px; cursor: pointer; display: inline-flex; align-items: center; gap: 4px; transition: all 0.2s;" title="Click to approve review">
                      <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="12" cy="12" r="10"></circle>
                        <line x1="12" y1="8" x2="12" y2="12"></line>
                        <line x1="12" y1="16" x2="12.01" y2="16"></line>
                      </svg>
                      Pending
                    </button>
                  @endif
                </form>
              </td>
              <td style="text-align: right;">
                <div style="display: flex; align-items: center; justify-content: flex-end; gap: 0.5rem;">
                  <a href="{{ route('admin.testimonials.edit', $item->id) }}" class="btn btn-sm btn-secondary" title="Edit Review">
                    <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                      <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                      <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                    </svg>
                    <span>Edit</span>
                  </a>
                  <form action="{{ route('admin.testimonials.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to permanently delete this testimonial?');" style="display: inline-block;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger" style="padding: 0.35rem 0.65rem;" title="Delete Review">
                      <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
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
              <td colspan="6" style="text-align: center; padding: 3rem 1.5rem; color: var(--text-dim);">
                <div style="font-size: 1.1rem; font-weight: 600; margin-bottom: 0.5rem; color: var(--text-main);">No Testimonials Found</div>
                <p style="margin-bottom: 1.25rem;">Start by adding your first client review to showcase on the website.</p>
                <a href="{{ route('admin.testimonials.create') }}" class="btn btn-primary btn-sm">Add New Review</a>
              </td>
            </tr>
          @endforelse
        </tbody>
      </table>
    </div>

    @if($testimonials->hasPages())
      <div style="padding: 1rem 1.5rem; border-top: 1px solid var(--border-color); display: flex; justify-content: center;">
        {{ $testimonials->links() }}
      </div>
    @endif
  </div>
@endsection
