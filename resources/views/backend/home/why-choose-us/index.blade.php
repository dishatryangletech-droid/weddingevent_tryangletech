@extends('backend.layouts.app')

@section('title', 'Why Choose Us Section - Home Page')
@section('page_title', 'Home Page > Why Choose Us Section')

@section('content')
  <div class="admin-card" style="margin-bottom: 1.5rem;">
    <div class="card-header">
      <div>
        <div class="card-title">Homepage "Why Choose Us" Section Management</div>
        <div class="card-subtitle">Manage the section headline, tag, and the 4 interactive cards with custom images, titles, and descriptions.</div>
      </div>
      <a href="{{ url('/') }}" target="_blank" class="btn btn-secondary btn-sm" style="display: inline-flex; align-items: center; gap: 0.4rem;">
        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
          <path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"></path>
          <polyline points="15 3 21 3 21 9"></polyline>
          <line x1="10" y1="14" x2="21" y2="3"></line>
        </svg>
        <span>View Live Home Page</span>
      </a>
    </div>

    <form action="{{ route('admin.home.why-choose-us.update') }}" method="POST" enctype="multipart/form-data">
      @csrf

      <div style="padding: 1.5rem;">
        <div style="display: grid; grid-template-columns: 1fr 2fr; gap: 1.5rem;">
          <!-- Section Tag -->
          <div class="form-group">
            <label class="form-label" for="tag">Section Tag / Subtitle</label>
            <input type="text" name="tag" id="tag" value="{{ old('tag', $settings->tag ?? 'Why choose us') }}" class="form-control" placeholder="e.g. Why choose us" />
            <div class="form-help">Small tag text displayed above the main heading.</div>
          </div>

          <!-- Section Title -->
          <div class="form-group">
            <label class="form-label" for="title">Section Title / Main Heading <span style="color: #ef4444;">*</span></label>
            <input type="text" name="title" id="title" value="{{ old('title', $settings->title) }}" class="form-control" required placeholder="e.g. Your Partner in Innovation and Excellence" />
            <div class="form-help">Main heading of the Why Choose Us section.</div>
            @error('title')
              <div style="color: #ef4444; font-size: 0.8rem; margin-top: 4px;">{{ $message }}</div>
            @enderror
          </div>
        </div>

        <div class="form-group" style="max-width: 280px; margin-top: 0.5rem;">
          <label class="form-label" for="status">Section Status</label>
          <select name="status" id="status" class="form-control form-select">
            <option value="active" {{ ($settings->status ?? 'active') === 'active' ? 'selected' : '' }}>Active (Show Section)</option>
            <option value="deactive" {{ ($settings->status ?? 'active') === 'deactive' ? 'selected' : '' }}>Deactive (Hide Section)</option>
          </select>
        </div>

        <hr style="border: 0; border-top: 1px solid var(--border-color); margin: 2rem 0 1.5rem 0;" />

        <div style="font-size: 1.15rem; font-weight: 700; color: var(--text-main); margin-bottom: 0.25rem;">
          4 Feature Cards &amp; Accordion Tabs
        </div>
        <div style="font-size: 0.85rem; color: var(--text-dim); margin-bottom: 1.5rem;">
          Each item corresponds to a selectable tab on the right and its interactive card on the left.
        </div>

        @php
          $items = $settings->items ?? [];
        @endphp

        <div style="display: flex; flex-direction: column; gap: 1.5rem;">
          @for($i = 0; $i < 4; $i++)
            @php
              $item = $items[$i] ?? [];
              $num = sprintf('%02d', $i + 1);
            @endphp
            <div style="background: var(--bg-hover); border: 1px solid var(--border-color); border-radius: var(--radius-md); padding: 1.25rem 1.5rem;">
              <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 1rem; padding-bottom: 0.75rem; border-bottom: 1px solid var(--border-color);">
                <div style="display: flex; align-items: center; gap: 0.75rem;">
                  <span style="display: inline-flex; align-items: center; justify-content: center; width: 32px; height: 32px; border-radius: 8px; background: #0f172a; color: #fff; font-weight: 800; font-size: 0.9rem;">
                    {{ $num }}
                  </span>
                  <span style="font-weight: 700; font-size: 1rem; color: var(--text-main);">
                    Item #{{ $i + 1 }}
                  </span>
                </div>
              </div>

              <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 1.25rem;">
                <!-- Tab Title (Right Accordion) -->
                <div class="form-group">
                  <label class="form-label" for="item_tab_title_{{ $i }}">Tab Title (Right Column) <span style="color: #ef4444;">*</span></label>
                  <input type="text" name="items[{{ $i }}][tab_title]" id="item_tab_title_{{ $i }}" value="{{ old("items.{$i}.tab_title", $item['tab_title'] ?? '') }}" class="form-control" required placeholder="e.g. Data-driven strategy" />
                  <div class="form-help">Text shown on the clickable accordion button.</div>
                </div>

                <!-- Card Title (Left Box) -->
                <div class="form-group">
                  <label class="form-label" for="item_title_{{ $i }}">Card Title (Left Column) <span style="color: #ef4444;">*</span></label>
                  <input type="text" name="items[{{ $i }}][title]" id="item_title_{{ $i }}" value="{{ old("items.{$i}.title", $item['title'] ?? '') }}" class="form-control" required placeholder="e.g. Expertise" />
                  <div class="form-help">Title shown below image on the left card.</div>
                </div>
              </div>

              <!-- Description -->
              <div class="form-group" style="margin-top: 0.75rem;">
                <label class="form-label" for="item_desc_{{ $i }}">Card Description <span style="color: #ef4444;">*</span></label>
                <textarea name="items[{{ $i }}][description]" id="item_desc_{{ $i }}" rows="2" class="form-control" required placeholder="Description of this feature...">{{ old("items.{$i}.description", $item['description'] ?? '') }}</textarea>
              </div>

              <!-- Image Upload & Preview -->
              <div class="form-group" style="margin-top: 0.75rem; margin-bottom: 0;">
                <label class="form-label">Card Image</label>
                <div style="display: flex; gap: 1.25rem; align-items: flex-start; flex-wrap: wrap;">
                  <div style="width: 140px; height: 90px; border-radius: var(--radius-sm); overflow: hidden; border: 1px solid var(--border-color); background: #f1f5f9;">
                    <img id="itemPreview{{ $i }}" src="{{ $settings->getItemImageUrl($i) }}" alt="Preview #{{ $i + 1 }}" style="width: 100%; height: 100%; object-fit: cover;" />
                  </div>
                  <div style="flex: 1; min-width: 220px;">
                    <input type="file" name="item_images[{{ $i }}]" class="form-control" accept="image/*" onchange="previewCardImage(this, 'itemPreview{{ $i }}')" />
                    <div class="form-help" style="margin-top: 5px;">Leave empty to keep existing image. Formats: JPG, PNG, WEBP, AVIF.</div>
                  </div>
                </div>
              </div>
            </div>
          @endfor
        </div>
      </div>

      <div style="background: var(--bg-hover); padding: 1.25rem 1.5rem; border-top: 1px solid var(--border-color); display: flex; justify-content: flex-end; gap: 0.75rem;">
        <button type="submit" class="btn btn-primary">
          <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
            <path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"></path>
            <polyline points="17 21 17 13 7 13 7 21"></polyline>
            <polyline points="7 3 7 8 15 8"></polyline>
          </svg>
          <span>Save Why Choose Us Changes</span>
        </button>
      </div>
    </form>
  </div>

  @push('scripts')
  <script>
    function previewCardImage(input, previewId) {
      if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = function(e) {
          document.getElementById(previewId).src = e.target.result;
        };
        reader.readAsDataURL(input.files[0]);
      }
    }
  </script>
  @endpush
@endsection
