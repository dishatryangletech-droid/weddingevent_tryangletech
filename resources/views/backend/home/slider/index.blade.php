@extends('backend.layouts.app')

@section('title', 'Hero Sliders - Home Page')
@section('page_title', 'Home Page > First Slider Section')

@section('content')
  <div class="admin-card">
    <div class="card-header">
      <div>
        <div class="card-title">First Slider Section (Hero Banners)</div>
        <div class="card-subtitle">Manage dynamic background image and video slides for the homepage hero banner.</div>
      </div>
      <button type="button" class="btn btn-primary" onclick="openModal('addSlideModal')">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
          <line x1="12" y1="5" x2="12" y2="19"></line>
          <line x1="5" y1="12" x2="19" y2="12"></line>
        </svg>
        <span>Add New Slide</span>
      </button>
    </div>

    <!-- Sliders List Table -->
    <div class="table-responsive">
      <table class="admin-table">
        <thead>
          <tr>
            <th style="width: 70px;">Order</th>
            <th style="width: 120px;">Media</th>
            <th>Title</th>
            <th style="width: 110px;">Type</th>
            <th style="width: 130px;">Status</th>
            <th style="width: 160px; text-align: right;">Actions</th>
          </tr>
        </thead>
        <tbody>
          @forelse($sliders as $slider)
            <tr>
              <td style="font-weight: 700; color: var(--text-dim);">#{{ $slider->order }}</td>
              <td>
                @if($slider->media_type === 'video')
                  <div class="media-thumb-video">
                    <video src="{{ $slider->media_url }}" muted></video>
                    <span class="video-badge">VIDEO</span>
                  </div>
                @else
                  <img src="{{ $slider->media_url }}" alt="{{ $slider->title }}" class="media-thumb" />
                @endif
              </td>
              <td>
                <div style="font-weight: 600; color: var(--text-main); font-size: 0.95rem;">{{ $slider->title ?: '— No Title (Media Only) —' }}</div>
                <div style="font-size: 0.78rem; color: var(--text-dim); margin-top: 3px; word-break: break-all;">
                  {{ $slider->media_path }}
                </div>
              </td>
              <td>
                <span class="badge badge-{{ $slider->media_type }}">
                  {{ strtoupper($slider->media_type) }}
                </span>
                @if($slider->media_type === 'video')
                  <div style="font-size: 0.72rem; margin-top: 4px; font-weight: 600; color: {{ $slider->has_audio ? '#16a34a' : '#64748b' }};">
                    {{ $slider->has_audio ? '🔊 Volume' : '🔇 Mute' }}
                  </div>
                @endif
              </td>
              <td>
                <form action="{{ route('admin.home.slider.toggle', $slider->id) }}" method="POST" style="display: inline-block;">
                  @csrf
                  @method('PATCH')
                  <button type="submit" class="badge badge-{{ $slider->status }}" style="cursor: pointer; border: none;" title="Click to toggle status">
                    @if($slider->status === 'active')
                      <span style="display:inline-block;width:6px;height:6px;border-radius:50%;background:#16a34a;"></span> Active
                    @else
                      <span style="display:inline-block;width:6px;height:6px;border-radius:50%;background:#94a3b8;"></span> Deactive
                    @endif
                  </button>
                </form>
              </td>
              <td style="text-align: right;">
                <div style="display: inline-flex; align-items: center; gap: 0.5rem;">
                  <button type="button" class="btn btn-secondary btn-sm" onclick="openModal('editSlideModal{{ $slider->id }}')" title="Edit Slide">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                      <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                      <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                    </svg>
                    <span>Edit</span>
                  </button>
                  <form action="{{ route('admin.home.slider.destroy', $slider->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete slide \'{{ $slider->title }}\'?');" style="display: inline-block;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm" title="Delete Slide">
                      <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <polyline points="3 6 5 6 21 6"></polyline>
                        <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                      </svg>
                    </button>
                  </form>
                </div>
              </td>
            </tr>

            <!-- Edit Modal for Slide #{{ $slider->id }} -->
            <div class="modal-backdrop" id="editSlideModal{{ $slider->id }}">
              <div class="modal-content">
                <form action="{{ route('admin.home.slider.update', $slider->id) }}" method="POST" enctype="multipart/form-data">
                  @csrf
                  @method('PUT')
                  
                  <div class="modal-header">
                    <div class="modal-title">Edit Hero Slide</div>
                    <button type="button" class="modal-close-btn" onclick="closeModal('editSlideModal{{ $slider->id }}')">&times;</button>
                  </div>

                  <div class="modal-body">
                    <!-- Title -->
                    <div class="form-group">
                      <label class="form-label" for="edit_title_{{ $slider->id }}">Slide Title (Optional)</label>
                      <input type="text" name="title" id="edit_title_{{ $slider->id }}" value="{{ old('title', $slider->title) }}" class="form-control" placeholder="Leave empty if no text overlay" />
                    </div>

                    <!-- Media Type -->
                    <div class="form-group">
                      <label class="form-label" for="edit_media_type_{{ $slider->id }}">Media Type *</label>
                      <select name="media_type" id="edit_media_type_{{ $slider->id }}" class="form-control form-select" required>
                        <option value="image" {{ $slider->media_type === 'image' ? 'selected' : '' }}>Image (AVIF, JPG, PNG, WEBP)</option>
                        <option value="video" {{ $slider->media_type === 'video' ? 'selected' : '' }}>Video (MP4, WEBM)</option>
                      </select>
                    </div>

                    <!-- Audio Option (For Videos) -->
                    <div class="form-group">
                      <label class="form-label">Audio / Volume Option (For Videos)</label>
                      <div style="display: flex; gap: 1.5rem; align-items: center; margin-top: 0.35rem;">
                        <label style="display: inline-flex; align-items: center; gap: 0.4rem; cursor: pointer; font-size: 0.88rem; font-weight: 500;">
                          <input type="radio" name="has_audio" value="1" {{ old('has_audio', $slider->has_audio ?? true) ? 'checked' : '' }}>
                          <span>🔊 Volume (Has Audio - Show Sound Button)</span>
                        </label>
                        <label style="display: inline-flex; align-items: center; gap: 0.4rem; cursor: pointer; font-size: 0.88rem; font-weight: 500;">
                          <input type="radio" name="has_audio" value="0" {{ !old('has_audio', $slider->has_audio ?? true) ? 'checked' : '' }}>
                          <span>🔇 Mute (No Audio - Hide Sound Button)</span>
                        </label>
                      </div>
                      <div class="form-help">Select 'Mute' if video has no audio track, so the volume button will not appear on front slider.</div>
                    </div>

                    <!-- Current Media Preview -->
                    <div class="form-group">
                      <label class="form-label">Current Media</label>
                      <div style="background: #f8fafc; border-radius: var(--radius-md); padding: 0.75rem; border: 1px solid var(--border-color);">
                        @if($slider->media_type === 'video')
                          <video src="{{ $slider->media_url }}" controls style="max-width: 100%; max-height: 160px; border-radius: var(--radius-sm); display: block;"></video>
                        @else
                          <img src="{{ $slider->media_url }}" alt="{{ $slider->title }}" style="max-width: 100%; max-height: 160px; border-radius: var(--radius-sm); display: block;" />
                        @endif
                      </div>
                    </div>

                    <!-- Replace Media File -->
                    <div class="form-group">
                      <label class="form-label" for="edit_media_file_{{ $slider->id }}">Replace File (Optional)</label>
                      <input type="file" name="media_file" id="edit_media_file_{{ $slider->id }}" class="form-control" accept="image/*,video/mp4,video/webm" />
                      <div class="form-help">Leave empty to keep existing media file. Max file size: 50MB.</div>
                    </div>

                    <!-- Order and Status Grid -->
                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem;">
                      <div class="form-group">
                        <label class="form-label" for="edit_order_{{ $slider->id }}">Display Order</label>
                        <input type="number" name="order" id="edit_order_{{ $slider->id }}" value="{{ old('order', $slider->order) }}" class="form-control" min="0" />
                      </div>
                      <div class="form-group">
                        <label class="form-label" for="edit_status_{{ $slider->id }}">Status *</label>
                        <select name="status" id="edit_status_{{ $slider->id }}" class="form-control form-select" required>
                          <option value="active" {{ $slider->status === 'active' ? 'selected' : '' }}>Active</option>
                          <option value="deactive" {{ $slider->status === 'deactive' ? 'selected' : '' }}>Deactive</option>
                        </select>
                      </div>
                    </div>
                  </div>

                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" onclick="closeModal('editSlideModal{{ $slider->id }}')">Cancel</button>
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                  </div>
                </form>
              </div>
            </div>
          @empty
            <tr>
              <td colspan="6" style="text-align: center; color: var(--text-dim); padding: 3rem;">
                <div style="font-size: 1.1rem; font-weight: 600; color: var(--text-main); margin-bottom: 0.5rem;">No Hero Slides Available</div>
                <p style="margin-bottom: 1rem;">Click below to add your first background image or video banner.</p>
                <button type="button" class="btn btn-primary" onclick="openModal('addSlideModal')">
                  <span>Add First Slide</span>
                </button>
              </td>
            </tr>
          @endforelse
        </tbody>
      </table>
    </div>
  </div>

  <!-- Add New Slide Modal -->
  <div class="modal-backdrop" id="addSlideModal">
    <div class="modal-content">
      <form action="{{ route('admin.home.slider.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        
        <div class="modal-header">
          <div class="modal-title">Add New Hero Slide</div>
          <button type="button" class="modal-close-btn" onclick="closeModal('addSlideModal')">&times;</button>
        </div>

        <div class="modal-body">
          <!-- Slide Title -->
          <div class="form-group">
            <label class="form-label" for="add_title">Slide Title (Optional)</label>
            <input type="text" name="title" id="add_title" placeholder="e.g. Hero Banner - Turnkey Engineering (Optional overlay text)" class="form-control" />
          </div>

          <!-- Media Type -->
          <div class="form-group">
            <label class="form-label" for="add_media_type">Media Type *</label>
            <select name="media_type" id="add_media_type" class="form-control form-select" required>
              <option value="image">Image (AVIF, JPG, PNG, WEBP)</option>
              <option value="video">Video (MP4, WEBM)</option>
            </select>
          </div>

          <!-- Audio Option (For Videos) -->
          <div class="form-group">
            <label class="form-label">Audio / Volume Option (For Videos)</label>
            <div style="display: flex; gap: 1.5rem; align-items: center; margin-top: 0.35rem;">
              <label style="display: inline-flex; align-items: center; gap: 0.4rem; cursor: pointer; font-size: 0.88rem; font-weight: 500;">
                <input type="radio" name="has_audio" value="1" checked>
                <span>🔊 Volume (Has Audio - Show Sound Button)</span>
              </label>
              <label style="display: inline-flex; align-items: center; gap: 0.4rem; cursor: pointer; font-size: 0.88rem; font-weight: 500;">
                <input type="radio" name="has_audio" value="0">
                <span>🔇 Mute (No Audio - Hide Sound Button)</span>
              </label>
            </div>
            <div class="form-help">Select 'Mute' if video has no audio track, so the volume button will not appear on front slider.</div>
          </div>

          <!-- File Upload -->
          <div class="form-group">
            <label class="form-label" for="add_media_file">Upload Image or Video *</label>
            <input type="file" name="media_file" id="add_media_file" class="form-control" accept="image/*,video/mp4,video/webm" required />
            <div class="form-help">Upload high resolution image (1920x1080) or MP4 video (max 50MB).</div>
            
            <!-- Dynamic Preview Container -->
            <img id="addPreviewImage" class="upload-preview" alt="Image preview" />
            <video id="addPreviewVideo" class="upload-preview" controls muted></video>
          </div>

          <!-- Order and Status Grid -->
          <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem;">
            <div class="form-group">
              <label class="form-label" for="add_order">Display Order</label>
              <input type="number" name="order" id="add_order" value="{{ ($sliders->max('order') ?? 0) + 1 }}" class="form-control" min="0" />
            </div>
            <div class="form-group">
              <label class="form-label" for="add_status">Status *</label>
              <select name="status" id="add_status" class="form-control form-select" required>
                <option value="active" selected>Active</option>
                <option value="deactive">Deactive</option>
              </select>
            </div>
          </div>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" onclick="closeModal('addSlideModal')">Cancel</button>
          <button type="submit" class="btn btn-primary">Upload &amp; Save Slide</button>
        </div>
      </form>
    </div>
  </div>
@endsection

@push('scripts')
<script>
  document.addEventListener('DOMContentLoaded', function () {
    const addInput = document.getElementById('add_media_file');
    const addImg = document.getElementById('addPreviewImage');
    const addVid = document.getElementById('addPreviewVideo');
    const addType = document.getElementById('add_media_type');

    if (addInput) {
      window.initMediaPreview(addInput, addImg, addVid, addType);
    }
  });
</script>
@endpush
