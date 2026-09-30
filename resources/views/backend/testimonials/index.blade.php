@extends('backend.layouts.app')

@section('title', 'Testimonials')
@section('page_title', 'Home > Testimonials')

@section('content')
  <div class="admin-card">
    <div class="card-header">
      <div>
        <div class="card-title">All Testimonials</div>
        <div class="card-subtitle">Manage client reviews that appear on the homepage marquee.</div>
      </div>
      <a href="{{ route('admin.testimonials.create') }}" class="btn btn-primary">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
          <line x1="12" y1="5" x2="12" y2="19"></line>
          <line x1="5" y1="12" x2="19" y2="12"></line>
        </svg>
        <span>Add New Review</span>
      </a>
    </div>

    @if(session('success'))
      <div style="background-color: #dcfce7; border: 1px solid #bbf7d0; color: #166534; padding: 1rem; border-radius: 6px; margin: 1.5rem 1.5rem 0;">
        {{ session('success') }}
      </div>
    @endif

    <div class="table-responsive">
      <table class="admin-table">
        <thead>
          <tr>
            <th style="width: 70px;">Order</th>
            <th style="width: 100px;">Avatar</th>
            <th>Name & Headline</th>
            <th>Review Text</th>
            <th style="width: 120px;">Status</th>
            <th style="width: 160px; text-align: right;">Actions</th>
          </tr>
        </thead>
        <tbody>
          @forelse($testimonials as $testimonial)
            <tr>
              <td style="font-weight: 700; color: var(--text-dim);">#{{ $testimonial->sort_order }}</td>
              @php
                $defaultImages = [
                    'images/6a6305bf5040b777232a1650_User.avif',
                    'images/6a6305bf5040b777232a15b3_user.avif',
                    'images/6a6305bf5040b777232a15a0_user.avif'
                ];
                $fallbackImage = $defaultImages[$loop->index % count($defaultImages)];
              @endphp
              <td>
                <img src="{{ $testimonial->image ? asset('storage/'.$testimonial->image) : asset($fallbackImage) }}" alt="{{ $testimonial->name }}" style="width: 50px; height: 50px; object-fit: cover; border-radius: 50%;" />
              </td>
              <td>
                <div style="font-weight: 600; color: var(--text-main); font-size: 0.95rem;">{{ $testimonial->name }}</div>
                <div style="font-size: 0.85rem; color: var(--text-muted); margin-top: 3px;">
                  {{ $testimonial->headline }}
                </div>
              </td>
              <td>
                <div style="font-size: 0.85rem; color: var(--text-muted); line-height: 1.4; max-width: 300px;">
                  {{ Str::limit($testimonial->review, 80) }}
                </div>
              </td>
              <td>
                @if($testimonial->status === 'active')
                  <span class="badge badge-active">
                    <span style="display:inline-block;width:6px;height:6px;border-radius:50%;background:#16a34a;"></span> Active
                  </span>
                @else
                  <span class="badge" style="background: rgba(245, 158, 11, 0.1); color: #d97706; border: 1px solid rgba(245, 158, 11, 0.2);">
                    <span style="display:inline-block;width:6px;height:6px;border-radius:50%;background:#d97706;"></span> Inactive
                  </span>
                @endif
              </td>
              <td style="text-align: right;">
                <div style="display: inline-flex; align-items: center; gap: 0.5rem;">
                  <a href="{{ route('admin.testimonials.edit', $testimonial->id) }}" class="btn btn-secondary btn-sm" title="Edit">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                      <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                      <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                    </svg>
                    <span>Edit</span>
                  </a>
                  <form action="{{ route('admin.testimonials.destroy', $testimonial->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this testimonial?');" style="display: inline-block;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm" title="Delete">
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
                <div>No testimonials found. Click "Add New Review" to create one.</div>
              </td>
            </tr>
          @endforelse
        </tbody>
      </table>
    </div>
  </div>
@endsection
