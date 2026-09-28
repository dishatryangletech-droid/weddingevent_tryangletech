@extends('backend.layouts.app')

@section('title', 'Services Section - Home Page')
@section('page_title', 'Home Page > Services Section')

@section('content')
  <div class="admin-card" style="margin-bottom: 1.5rem;">
    <div class="card-header">
      <div>
        <div class="card-title">Homepage Services Section Management</div>
        <div class="card-subtitle">Manage the dynamic section heading, subtitle tag, and select which services to display with custom display ordering.</div>
      </div>
    </div>

    <form action="{{ route('admin.home.services.update') }}" method="POST" id="servicesSectionForm">
      @csrf
      
      <div style="padding: 1.5rem;">
        <!-- Tag / Subtitle -->
        <div class="form-group">
          <label class="form-label" for="tag">Section Tag / Subtitle</label>
          <input type="text" name="tag" id="tag" value="{{ old('tag', $settings->tag ?? 'Our services') }}" class="form-control" placeholder="e.g. Our services" />
          <div class="form-help">Small tag text displayed above the main heading.</div>
        </div>

        <!-- Section Title / Heading -->
        <div class="form-group">
          <label class="form-label" for="title">Section Title / Main Heading</label>
          <textarea name="title" id="title" rows="3" class="form-control" placeholder="Enter section heading...">{{ old('title', $settings->title ?? '') }}</textarea>
          <div class="form-help">Main title displayed at the top of the services section.</div>
        </div>

        <!-- Status -->
        <div class="form-group" style="max-width: 300px;">
          <label class="form-label" for="status">Section Status</label>
          <select name="status" id="status" class="form-control form-select">
            <option value="active" {{ ($settings->status ?? 'active') === 'active' ? 'selected' : '' }}>Active (Show Section)</option>
            <option value="deactive" {{ ($settings->status ?? 'active') === 'deactive' ? 'selected' : '' }}>Deactive (Hide Section)</option>
          </select>
        </div>
      </div>

      <div style="border-top: 1px solid var(--border-color); padding: 1.5rem;">
        <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 1.25rem; flex-wrap: wrap; gap: 1rem;">
          <div>
            <div style="font-size: 1.1rem; font-weight: 700; color: var(--text-main);">Selected Services &amp; Display Order</div>
            <div style="font-size: 0.85rem; color: var(--text-dim); margin-top: 2px;">
              Select services from the dropdown to add them. Use Up/Down buttons to arrange display sequence.
            </div>
          </div>

          <!-- Add Service Controls -->
          <div style="display: flex; align-items: center; gap: 0.75rem;">
            <select id="availableServicesSelect" class="form-control form-select" style="min-width: 260px;">
              <option value="">-- Select Service to Add --</option>
              @foreach($allServices as $svc)
                <option value="{{ $svc->id }}" data-title="{{ $svc->title }}" data-slug="{{ $svc->slug }}" data-image="{{ $svc->image_url }}">
                  {{ $svc->title }}
                </option>
              @endforeach
            </select>
            <button type="button" class="btn btn-secondary" id="addServiceBtn" style="white-space: nowrap;">
              <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                <line x1="12" y1="5" x2="12" y2="19"></line>
                <line x1="5" y1="12" x2="19" y2="12"></line>
              </svg>
              <span>Add Service</span>
            </button>
          </div>
        </div>

        <!-- Selected Services Table -->
        <div class="table-responsive" style="border: 1px solid var(--border-color); border-radius: var(--radius-md); background: #ffffff;">
          <table class="admin-table" id="selectedServicesTable">
            <thead>
              <tr style="background: #f8fafc;">
                <th style="width: 60px; text-align: center;">No.</th>
                <th style="width: 90px;">Image</th>
                <th>Service Name</th>
                <th>Slug</th>
                <th style="width: 140px; text-align: center;">Reorder</th>
                <th style="width: 90px; text-align: right;">Action</th>
              </tr>
            </thead>
            <tbody id="selectedServicesContainer">
              @php
                $selectedIds = $settings->selected_service_ids ?? [1, 2, 3, 4, 5, 6];
                $allServicesKeyed = $allServices->keyBy('id');
              @endphp

              @foreach($selectedIds as $idx => $id)
                @if(isset($allServicesKeyed[$id]))
                  @php $svc = $allServicesKeyed[$id]; @endphp
                  <tr class="service-row-item" data-id="{{ $svc->id }}">
                    <td style="text-align: center; font-weight: 700; color: var(--text-dim);" class="row-num-cell">
                      {{ sprintf('%02d', $loop->iteration) }}
                    </td>
                    <td>
                      <img src="{{ $svc->image_url }}" alt="{{ $svc->title }}" style="width: 52px; height: 38px; border-radius: 4px; object-fit: cover; border: 1px solid #e2e8f0;" />
                    </td>
                    <td>
                      <div style="font-weight: 600; color: var(--text-main); font-size: 0.95rem;">{{ $svc->title }}</div>
                      <input type="hidden" name="selected_service_ids[]" value="{{ $svc->id }}" />
                    </td>
                    <td style="color: var(--text-dim); font-size: 0.85rem;">
                      <code>/service/{{ $svc->slug }}</code>
                    </td>
                    <td style="text-align: center;">
                      <div style="display: inline-flex; gap: 0.35rem;">
                        <button type="button" class="btn btn-secondary btn-sm btn-move-up" title="Move Up" style="padding: 0.3rem 0.5rem;">
                          <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="18 15 12 9 6 15"></polyline></svg>
                        </button>
                        <button type="button" class="btn btn-secondary btn-sm btn-move-down" title="Move Down" style="padding: 0.3rem 0.5rem;">
                          <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="6 9 12 15 18 9"></polyline></svg>
                        </button>
                      </div>
                    </td>
                    <td style="text-align: right;">
                      <button type="button" class="btn btn-danger btn-sm btn-remove-row" title="Remove Service">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                          <polyline points="3 6 5 6 21 6"></polyline>
                          <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                        </svg>
                      </button>
                    </td>
                  </tr>
                @endif
              @endforeach
            </tbody>
          </table>
        </div>

        <div id="noServicesNotice" style="display: none; padding: 2rem; text-align: center; color: var(--text-dim);">
          No services selected. Please select a service from the dropdown above and click "Add Service".
        </div>
      </div>

      <div style="border-top: 1px solid var(--border-color); padding: 1.25rem 1.5rem; background: #f8fafc; text-align: right; border-bottom-left-radius: var(--radius-lg); border-bottom-right-radius: var(--radius-lg);">
        <button type="submit" class="btn btn-primary" style="min-width: 180px;">
          <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"></path>
            <polyline points="17 21 17 13 7 13 7 21"></polyline>
            <polyline points="7 3 7 8 15 8"></polyline>
          </svg>
          <span>Save Changes</span>
        </button>
      </div>
    </form>
  </div>
@endsection

@push('scripts')
<script>
  document.addEventListener('DOMContentLoaded', function () {
    const container = document.getElementById('selectedServicesContainer');
    const availableSelect = document.getElementById('availableServicesSelect');
    const addBtn = document.getElementById('addServiceBtn');
    const notice = document.getElementById('noServicesNotice');
    const table = document.getElementById('selectedServicesTable');

    function updateRowNumbers() {
      const rows = container.querySelectorAll('.service-row-item');
      rows.forEach((row, i) => {
        const numCell = row.querySelector('.row-num-cell');
        if (numCell) {
          numCell.textContent = String(i + 1).padStart(2, '0');
        }
      });

      if (rows.length === 0) {
        notice.style.display = 'block';
        table.style.display = 'none';
      } else {
        notice.style.display = 'none';
        table.style.display = 'table';
      }
    }

    // Add Service
    addBtn.addEventListener('click', function () {
      const selectedOpt = availableSelect.options[availableSelect.selectedIndex];
      if (!selectedOpt || !selectedOpt.value) {
        alert('Please select a service to add.');
        return;
      }

      const id = selectedOpt.value;
      const title = selectedOpt.getAttribute('data-title');
      const slug = selectedOpt.getAttribute('data-slug');
      const image = selectedOpt.getAttribute('data-image');

      // Check if already added
      const existing = container.querySelector(`.service-row-item[data-id="${id}"]`);
      if (existing) {
        alert(`Service "${title}" is already in the list.`);
        return;
      }

      const tr = document.createElement('tr');
      tr.className = 'service-row-item';
      tr.setAttribute('data-id', id);
      tr.innerHTML = `
        <td style="text-align: center; font-weight: 700; color: var(--text-dim);" class="row-num-cell">00</td>
        <td>
          <img src="${image}" alt="${title}" style="width: 52px; height: 38px; border-radius: 4px; object-fit: cover; border: 1px solid #e2e8f0;" />
        </td>
        <td>
          <div style="font-weight: 600; color: var(--text-main); font-size: 0.95rem;">${title}</div>
          <input type="hidden" name="selected_service_ids[]" value="${id}" />
        </td>
        <td style="color: var(--text-dim); font-size: 0.85rem;">
          <code>/service/${slug}</code>
        </td>
        <td style="text-align: center;">
          <div style="display: inline-flex; gap: 0.35rem;">
            <button type="button" class="btn btn-secondary btn-sm btn-move-up" title="Move Up" style="padding: 0.3rem 0.5rem;">
              <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="18 15 12 9 6 15"></polyline></svg>
            </button>
            <button type="button" class="btn btn-secondary btn-sm btn-move-down" title="Move Down" style="padding: 0.3rem 0.5rem;">
              <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="6 9 12 15 18 9"></polyline></svg>
            </button>
          </div>
        </td>
        <td style="text-align: right;">
          <button type="button" class="btn btn-danger btn-sm btn-remove-row" title="Remove Service">
            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
              <polyline points="3 6 5 6 21 6"></polyline>
              <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
            </svg>
          </button>
        </td>
      `;

      container.appendChild(tr);
      updateRowNumbers();
      availableSelect.value = '';
    });

    // Delegated actions for Move Up, Move Down, Remove
    container.addEventListener('click', function (e) {
      const upBtn = e.target.closest('.btn-move-up');
      const downBtn = e.target.closest('.btn-move-down');
      const removeBtn = e.target.closest('.btn-remove-row');

      if (upBtn) {
        const row = upBtn.closest('.service-row-item');
        if (row && row.previousElementSibling) {
          container.insertBefore(row, row.previousElementSibling);
          updateRowNumbers();
        }
      } else if (downBtn) {
        const row = downBtn.closest('.service-row-item');
        if (row && row.nextElementSibling) {
          container.insertBefore(row.nextElementSibling, row);
          updateRowNumbers();
        }
      } else if (removeBtn) {
        const row = removeBtn.closest('.service-row-item');
        if (row) {
          row.remove();
          updateRowNumbers();
        }
      }
    });

    updateRowNumbers();
  });
</script>
@endpush
