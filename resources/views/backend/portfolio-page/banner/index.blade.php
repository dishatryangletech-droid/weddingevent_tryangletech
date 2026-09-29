@extends('backend.layouts.app')

@section('title', 'Portfolio Page - Banner Section')

@push('styles')
<style>
  .admin-form-card {
    background: #ffffff;
    border-radius: 12px;
    box-shadow: 0 1px 3px rgba(0,0,0,0.05);
    border: 1px solid #e2e8f0;
    padding: 1.75rem;
    width: 100%;
    margin-bottom: 2rem;
  }
  .card-head {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding-bottom: 1.25rem;
    margin-bottom: 1.5rem;
    border-bottom: 1px solid #f1f5f9;
  }
  .card-badge {
    background: #eff6ff;
    color: #2563eb;
    font-size: 0.75rem;
    font-weight: 600;
    padding: 4px 10px;
    border-radius: 9999px;
  }
  .form-row-2 {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 1.25rem;
    margin-bottom: 1.25rem;
  }
  @media (max-width: 768px) { .form-row-2 { grid-template-columns: 1fr; } }

  /* Tags Table */
  .tags-table { width: 100%; border-collapse: collapse; font-size: 0.9rem; }
  .tags-table th { background: #f8fafc; color: #475569; font-weight: 600; padding: 10px 14px; text-align: left; border-bottom: 2px solid #e2e8f0; }
  .tags-table td { padding: 10px 14px; border-bottom: 1px solid #f1f5f9; vertical-align: middle; }
  .tags-table tr:last-child td { border-bottom: none; }
  .badge-active   { background: #dcfce7; color: #166534; padding: 2px 10px; border-radius: 9999px; font-size: 0.75rem; font-weight: 600; }
  .badge-deactive { background: #fee2e2; color: #991b1b; padding: 2px 10px; border-radius: 9999px; font-size: 0.75rem; font-weight: 600; }

  /* Modal */
  .modal-overlay { display:none; position:fixed; inset:0; background:rgba(0,0,0,0.45); z-index:1000; align-items:center; justify-content:center; }
  .modal-overlay.show { display:flex; }
  .modal-box { background:#fff; border-radius:14px; padding:2rem; width:100%; max-width:440px; box-shadow:0 20px 60px rgba(0,0,0,0.15); }
  .modal-title { font-weight:700; font-size:1.05rem; color:#0f172a; margin-bottom:1.25rem; }
  .modal-actions { display:flex; gap:.75rem; margin-top:1.5rem; }
</style>
@endpush

@section('content')

  {{-- ── Banner Form ─────────────────────────────────────── --}}
  <div class="admin-form-card">
    <div class="card-head">
      <div>
        <div style="font-weight:700;font-size:1.1rem;color:#0f172a;">Portfolio Page — Banner Section</div>
        <div style="font-size:0.85rem;color:#64748b;margin-top:2px;">Manage the hero banner tag, title, description, and background image.</div>
      </div>
      <span class="card-badge">Hero Banner</span>
    </div>

    @if (session('success'))
      <div style="padding:12px 16px;background:#ecfdf5;border:1px solid #a7f3d0;color:#065f46;border-radius:8px;margin-bottom:1.5rem;font-size:.9rem;">
        {{ session('success') }}
      </div>
    @endif

    <form action="{{ route('admin.portfolio-page.banner.update') }}" method="POST" enctype="multipart/form-data">
      @csrf
      <div class="form-row-2">
        <div class="form-group">
          <label class="form-label" style="font-weight:600;">Section Badge / Tag</label>
          <input type="text" name="tag" value="{{ old('tag', $banner->tag) }}" class="form-control" placeholder="e.g. Portfolio" />
        </div>
        <div class="form-group">
          <label class="form-label" style="font-weight:600;">Section Status</label>
          <select name="status" class="form-control">
            <option value="active"   {{ old('status', $banner->status) === 'active'   ? 'selected' : '' }}>Active</option>
            <option value="deactive" {{ old('status', $banner->status) === 'deactive' ? 'selected' : '' }}>Deactive</option>
          </select>
        </div>
      </div>

      <div class="form-group" style="margin-bottom:1.25rem;">
        <label class="form-label" style="font-weight:600;">Headline Title <span style="color:#ef4444;">*</span></label>
        <input type="text" name="title" value="{{ old('title', $banner->title) }}" class="form-control" required placeholder="e.g. Event design to make your heart skip a beat" />
      </div>

      <div class="form-group" style="margin-bottom:1.25rem;">
        <label class="form-label" style="font-weight:600;">Description / Subtitle</label>
        <textarea name="description" rows="3" class="form-control">{{ old('description', $banner->description) }}</textarea>
      </div>

      <div style="background:#f8fafc;border:1px solid #e2e8f0;border-radius:8px;padding:1.25rem;margin-bottom:1.5rem;">
        <div style="font-weight:700;font-size:.95rem;color:#ff5722;margin-bottom:1rem;">Hero Background Image</div>
        <input type="file" name="banner_image" class="form-control" accept="image/*" onchange="previewImage(this,'bannerPrev')" />
        <div style="margin-top:.75rem;display:flex;align-items:center;gap:.75rem;">
          <img id="bannerPrev" src="{{ $banner->banner_image_url }}" alt="Banner Preview" style="max-height:130px;border-radius:8px;object-fit:cover;border:1px solid #cbd5e1;" />
          <span style="font-size:.78rem;color:#64748b;">Current hero background image</span>
        </div>
      </div>

      <div style="display:flex;gap:1rem;align-items:center;">
        <button type="submit" class="btn btn-primary" style="padding:.6rem 1.5rem;font-weight:600;">Save Changes</button>
      </div>
    </form>
  </div>

  {{-- ── Portfolio Tags Table ─────────────────────────────── --}}
  <div class="admin-form-card">
    <div class="card-head">
      <div>
        <div style="font-weight:700;font-size:1.05rem;color:#0f172a;">Portfolio Filter Tags</div>
        <div style="font-size:.85rem;color:#64748b;margin-top:2px;">Manage the filter tab buttons shown on the Portfolio page (e.g. Weddings, Destination).</div>
      </div>
      <button type="button" class="btn btn-primary btn-sm" onclick="openTagModal()" style="font-weight:600;">+ Add Tag</button>
    </div>

    <div id="tagsTableWrap">
      <table class="tags-table">
        <thead>
          <tr>
            <th>#</th>
            <th>Tag Name</th>
            <th>Status</th>
            <th style="text-align:right;">Actions</th>
          </tr>
        </thead>
        <tbody id="tagsTableBody">
          @forelse ($tags as $i => $tag)
            <tr id="tag-row-{{ $tag->id }}">
              <td style="color:#94a3b8;">{{ $i + 1 }}</td>
              <td style="font-weight:600;">{{ $tag->name }}</td>
              <td>
                @if($tag->status === 'active')
                  <span class="badge-active">Active</span>
                @else
                  <span class="badge-deactive">Deactive</span>
                @endif
              </td>
              <td style="text-align:right;">
                <button type="button" class="btn btn-light btn-sm" onclick="openEditTagModal({{ $tag->id }}, '{{ addslashes($tag->name) }}', '{{ $tag->status }}')" style="margin-right:.4rem;">Edit</button>
                <button type="button" class="btn btn-sm" onclick="deleteTag({{ $tag->id }})" style="background:#fee2e2;color:#991b1b;border:none;padding:.3rem .8rem;border-radius:6px;cursor:pointer;">Delete</button>
              </td>
            </tr>
          @empty
            <tr id="no-tags-row"><td colspan="4" style="text-align:center;color:#94a3b8;padding:1.5rem;">No tags yet. Click "+ Add Tag" to create one.</td></tr>
          @endforelse
        </tbody>
      </table>
    </div>
  </div>

  {{-- ── Add / Edit Modal ─────────────────────────────────── --}}
  <div class="modal-overlay" id="tagModal">
    <div class="modal-box">
      <div class="modal-title" id="modalTitle">Add Portfolio Tag</div>
      <div class="form-group" style="margin-bottom:1rem;">
        <label class="form-label" style="font-weight:600;">Tag Name <span style="color:#ef4444;">*</span></label>
        <input type="text" id="tagName" class="form-control" placeholder="e.g. Weddings" />
        <div id="tagNameError" style="color:#ef4444;font-size:.8rem;margin-top:.25rem;display:none;">Name is required.</div>
      </div>
      <div class="form-group">
        <label class="form-label" style="font-weight:600;">Status</label>
        <select id="tagStatus" class="form-control">
          <option value="active">Active</option>
          <option value="deactive">Deactive</option>
        </select>
      </div>
      <div class="modal-actions">
        <button type="button" class="btn btn-primary" id="modalSaveBtn" onclick="saveTag()" style="font-weight:600;">Save Tag</button>
        <button type="button" class="btn btn-light" onclick="closeTagModal()">Cancel</button>
      </div>
    </div>
  </div>

@endsection

@push('scripts')
<script>
  const STORE_URL  = "{{ route('admin.portfolio-page.tags.store') }}";
  const UPDATE_URL = "{{ url('admin/portfolio-page/tags') }}";
  const CSRF       = "{{ csrf_token() }}";

  let editingId = null;
  let tagCount  = {{ $tags->count() }};

  // ── Modal helpers ──────────────────────────────
  function openTagModal() {
    editingId = null;
    document.getElementById('modalTitle').textContent = 'Add Portfolio Tag';
    document.getElementById('tagName').value   = '';
    document.getElementById('tagStatus').value = 'active';
    document.getElementById('tagNameError').style.display = 'none';
    document.getElementById('tagModal').classList.add('show');
  }

  function openEditTagModal(id, name, status) {
    editingId = id;
    document.getElementById('modalTitle').textContent = 'Edit Portfolio Tag';
    document.getElementById('tagName').value   = name;
    document.getElementById('tagStatus').value = status;
    document.getElementById('tagNameError').style.display = 'none';
    document.getElementById('tagModal').classList.add('show');
  }

  function closeTagModal() {
    document.getElementById('tagModal').classList.remove('show');
  }

  // Close on overlay click
  document.getElementById('tagModal').addEventListener('click', function(e) {
    if (e.target === this) closeTagModal();
  });

  // ── Save (Add or Edit) ─────────────────────────
  function saveTag() {
    const name   = document.getElementById('tagName').value.trim();
    const status = document.getElementById('tagStatus').value;

    if (!name) {
      document.getElementById('tagNameError').style.display = 'block';
      return;
    }
    document.getElementById('tagNameError').style.display = 'none';

    const isEdit = editingId !== null;
    const url    = isEdit ? UPDATE_URL + '/' + editingId : STORE_URL;
    const method = isEdit ? 'PUT' : 'POST';

    fetch(url, {
      method: method,
      headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': CSRF, 'Accept': 'application/json' },
      body: JSON.stringify({ name, status })
    })
    .then(r => r.json())
    .then(data => {
      if (!data.success) { alert('Something went wrong.'); return; }

      const tag = data.tag;
      const badgeHtml = tag.status === 'active'
        ? '<span class="badge-active">Active</span>'
        : '<span class="badge-deactive">Deactive</span>';

      if (isEdit) {
        // Update existing row
        const row = document.getElementById('tag-row-' + tag.id);
        if (row) {
          row.querySelector('td:nth-child(2)').textContent = tag.name;
          row.querySelector('td:nth-child(3)').innerHTML   = badgeHtml;
          row.querySelector('button').setAttribute('onclick',
            `openEditTagModal(${tag.id}, '${tag.name.replace(/'/g, "\\'")}', '${tag.status}')`);
        }
      } else {
        // Remove empty-row message if present
        const noRow = document.getElementById('no-tags-row');
        if (noRow) noRow.remove();

        tagCount++;
        const tbody = document.getElementById('tagsTableBody');
        tbody.insertAdjacentHTML('beforeend', `
          <tr id="tag-row-${tag.id}">
            <td style="color:#94a3b8;">${tagCount}</td>
            <td style="font-weight:600;">${tag.name}</td>
            <td>${badgeHtml}</td>
            <td style="text-align:right;">
              <button type="button" class="btn btn-light btn-sm" onclick="openEditTagModal(${tag.id}, '${tag.name.replace(/'/g, "\\'")}', '${tag.status}')" style="margin-right:.4rem;">Edit</button>
              <button type="button" class="btn btn-sm" onclick="deleteTag(${tag.id})" style="background:#fee2e2;color:#991b1b;border:none;padding:.3rem .8rem;border-radius:6px;cursor:pointer;">Delete</button>
            </td>
          </tr>`);
      }

      closeTagModal();
    })
    .catch(() => alert('Request failed. Please try again.'));
  }

  // ── Delete ─────────────────────────────────────
  function deleteTag(id) {
    if (!confirm('Delete this tag? This cannot be undone.')) return;

    fetch(UPDATE_URL + '/' + id, {
      method: 'DELETE',
      headers: { 'X-CSRF-TOKEN': CSRF, 'Accept': 'application/json' }
    })
    .then(r => r.json())
    .then(data => {
      if (!data.success) { alert('Something went wrong.'); return; }
      const row = document.getElementById('tag-row-' + id);
      if (row) row.remove();
      // Re-number
      document.querySelectorAll('#tagsTableBody tr').forEach((tr, i) => {
        tr.querySelector('td:first-child').textContent = i + 1;
      });
    })
    .catch(() => alert('Delete failed. Please try again.'));
  }

  // ── Image preview ──────────────────────────────
  function previewImage(input, previewId) {
    if (input.files && input.files[0]) {
      const reader = new FileReader();
      reader.onload = e => document.getElementById(previewId).src = e.target.result;
      reader.readAsDataURL(input.files[0]);
    }
  }
</script>
@endpush
