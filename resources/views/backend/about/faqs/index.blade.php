@extends('backend.layouts.app')

@section('title', 'FAQs Management - About Us Page')
@section('page_title', 'About Us Page > FAQ Section')

@section('content')
  <!-- Section Settings Accordion / Card -->
  <div class="admin-card" style="margin-bottom: 1.5rem;">
    <div class="card-header" style="cursor: pointer;" onclick="document.getElementById('sectionSettingsCollapse').classList.toggle('hidden');">
      <div>
        <div class="card-title" style="display: flex; align-items: center; gap: 0.5rem;">
          <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <circle cx="12" cy="12" r="3"></circle>
            <path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"></path>
          </svg>
          <span>FAQ Section Header &amp; Contact Box Settings</span>
        </div>
        <div class="card-subtitle">Customize section headline, subtitle, and the "Still have questions?" card on About Us page.</div>
      </div>
      <button type="button" class="btn btn-secondary btn-sm" style="pointer-events: none;">
        <span>Toggle Settings</span>
      </button>
    </div>

    <div id="sectionSettingsCollapse" style="padding: 1.5rem; border-top: 1px solid var(--border-color);">
      <form action="{{ route('admin.about.faqs.settings.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(260px, 1fr)); gap: 1.25rem;">
          <div class="form-group">
            <label class="form-label" for="tag">Section Tag / Badge</label>
            <input type="text" name="tag" id="tag" value="{{ old('tag', $sectionSettings->tag) }}" class="form-control" placeholder="e.g. FAQ" />
          </div>

          <div class="form-group" style="grid-column: span 2;">
            <label class="form-label" for="title">Section Title <span style="color: #ef4444;">*</span></label>
            <input type="text" name="title" id="title" value="{{ old('title', $sectionSettings->title) }}" class="form-control" required placeholder="e.g. Frequently Asked Questions" />
          </div>
        </div>

        <div class="form-group">
          <label class="form-label" for="subtitle">Section Subtitle / Description</label>
          <textarea name="subtitle" id="subtitle" rows="2" class="form-control" placeholder="e.g. Find clear answers about our process...">{{ old('subtitle', $sectionSettings->subtitle) }}</textarea>
        </div>

        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(240px, 1fr)); gap: 1.25rem; margin-top: 1rem;">
          <div class="form-group">
            <label class="form-label" for="contact_title">Contact Box Title</label>
            <input type="text" name="contact_title" id="contact_title" value="{{ old('contact_title', $sectionSettings->contact_title) }}" class="form-control" placeholder="e.g. Still have questions?" />
          </div>

          <div class="form-group">
            <label class="form-label" for="contact_subtitle">Contact Box Subtitle</label>
            <input type="text" name="contact_subtitle" id="contact_subtitle" value="{{ old('contact_subtitle', $sectionSettings->contact_subtitle) }}" class="form-control" placeholder="e.g. Speak with our engineers today." />
          </div>

          <div class="form-group">
            <label class="form-label" for="contact_button_text">Contact Button Text</label>
            <input type="text" name="contact_button_text" id="contact_button_text" value="{{ old('contact_button_text', $sectionSettings->contact_button_text) }}" class="form-control" placeholder="e.g. Let's talk" />
          </div>

          <div class="form-group">
            <label class="form-label" for="contact_button_url">Contact Button Link</label>
            <input type="text" name="contact_button_url" id="contact_button_url" value="{{ old('contact_button_url', $sectionSettings->contact_button_url) }}" class="form-control" placeholder="e.g. /contact" />
          </div>
        </div>

        <div style="display: flex; align-items: center; justify-content: space-between; margin-top: 1rem; flex-wrap: wrap; gap: 1rem;">
          <div class="form-group" style="margin-bottom: 0; max-width: 220px;">
            <label class="form-label" for="section_status">Section Status</label>
            <select name="status" id="section_status" class="form-control form-select">
              <option value="active" {{ ($sectionSettings->status ?? 'active') === 'active' ? 'selected' : '' }}>Active (Show FAQ Section)</option>
              <option value="deactive" {{ ($sectionSettings->status ?? 'active') === 'deactive' ? 'selected' : '' }}>Deactive (Hide FAQ Section)</option>
            </select>
          </div>

          <button type="submit" class="btn btn-primary" style="margin-top: 1rem;">
            <span>Save Section Settings</span>
          </button>
        </div>
      </form>
    </div>
  </div>

  <!-- FAQs List Management Card -->
  <div class="admin-card" style="width: 100%;">
    <div class="card-header">
      <div>
        <div class="card-title">About Us FAQ Questions ({{ $totalCount ?? $faqs->total() }})</div>
        <div class="card-subtitle">Manage dynamic questions and answers shown in the About Us accordion section.</div>
      </div>
      <a href="{{ route('admin.about.faqs.create') }}" class="btn btn-primary">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
          <line x1="12" y1="5" x2="12" y2="19"></line>
          <line x1="5" y1="12" x2="19" y2="12"></line>
        </svg>
        <span>Add New FAQ</span>
      </a>
    </div>

    <!-- Filter & Search Toolbar -->
    <div style="padding: 1rem 1.5rem; background: var(--bg-hover); border-bottom: 1px solid var(--border-color); display: flex; align-items: center; justify-content: space-between; gap: 1rem; flex-wrap: wrap;">
      <form action="{{ route('admin.about.faqs.index') }}" method="GET" style="display: flex; align-items: center; gap: 0.75rem; flex: 1; max-width: 520px;">
        <input type="text" name="search" value="{{ request('search') }}" class="form-control" placeholder="Search FAQs by keyword..." style="font-size: 0.88rem; padding: 0.5rem 0.85rem;" />
        <button type="submit" class="btn btn-secondary btn-sm" style="padding: 0.55rem 1rem;">Search</button>
        @if(request('search'))
          <a href="{{ route('admin.about.faqs.index') }}" class="btn btn-sm" style="color: var(--text-dim);">Clear</a>
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
                <form action="{{ route('admin.about.faqs.toggle', $item->id) }}" method="POST" style="display: inline-block;">
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
                  <a href="{{ route('admin.about.faqs.edit', $item->id) }}" class="btn btn-secondary btn-sm" title="Edit FAQ" style="padding: 0.35rem 0.65rem;">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                      <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                      <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                    </svg>
                  </a>

                  <form action="{{ route('admin.about.faqs.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this FAQ question?');" style="display: inline-block;">
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
              <td colspan="5" style="text-align: center; padding: 3rem; color: var(--text-dim);">
                No FAQs found. Click "Add New FAQ" to create your first question.
              </td>
            </tr>
          @endforelse
        </tbody>
      </table>
    </div>

    @if($faqs->hasPages())
      <div style="padding: 1.25rem 1.5rem; border-top: 1px solid var(--border-color);">
        {{ $faqs->links() }}
      </div>
    @endif
  </div>
@endsection
