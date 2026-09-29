@extends('backend.layouts.app')

@section('title', 'Edit Event Item Details')

@push('styles')
  <style>
    .admin-form-card {
      background: #ffffff;
      border-radius: 12px;
      box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
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

    .form-row-2 {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 1.25rem;
      margin-bottom: 1.25rem;
    }

    .form-row-4 {
      display: grid;
      grid-template-columns: 1fr 1fr 1fr 1fr;
      gap: 1rem;
      margin-bottom: 1.25rem;
    }

    @media (max-width: 768px) {

      .form-row-2,
      .form-row-4 {
        grid-template-columns: 1fr;
      }
    }

    .section-box {
      background: #f8fafc;
      border: 1px solid #e2e8f0;
      border-radius: 10px;
      padding: 1.25rem;
      margin-bottom: 1.5rem;
    }

    .section-title {
      font-weight: 700;
      font-size: 0.95rem;
      color: #ff5722;
      margin-bottom: 1rem;
    }

    /* CKEditor editor area height */
    .ck-editor__editable {
      min-height: 300px !important;
    }
  </style>
@endpush

@section('content')
  <div class="admin-form-card">
    <div class="card-head">
      <div>
        <div style="font-weight: 700; font-size: 1.1rem; color: #0f172a;">Edit Event Details: {{ $item->title }}</div>
        <div style="font-size: 0.85rem; color: #64748b; margin-top: 2px;">Manage event card info, detail page content, and
          gallery images.</div>
      </div>
      <a href="{{ route('admin.event-page.items.index') }}" class="btn btn-light btn-sm" style="font-weight: 600;">← Back
        to Events List</a>
    </div>

    @if ($errors->any())
      <div
        style="padding: 12px 16px; background: #fef2f2; border: 1px solid #fecaca; color: #991b1b; border-radius: 8px; margin-bottom: 1.5rem; font-size: 0.88rem;">
        <ul style="margin: 0; padding-left: 1.2rem;">
          @foreach ($errors->all() as $err)
            <li>{{ $err }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    <form action="{{ route('admin.event-page.items.update', $item->id) }}" method="POST" enctype="multipart/form-data">
      @csrf
      @method('PUT')

      <!-- 1. General Event Info -->
      <div class="section-box">
        <div class="section-title">1. Basic Event Information</div>

        <div class="form-row-2">
          <div class="form-group">
            <label class="form-label" style="font-weight: 600;">Event Title <span style="color: #ef4444;">*</span></label>
            <input type="text" name="title" value="{{ old('title', $item->title) }}" class="form-control" required />
          </div>

          <div class="form-group">
            <label class="form-label" style="font-weight: 600;">Location / Venue</label>
            <input type="text" name="location" value="{{ old('location', $item->location) }}" class="form-control"
              placeholder="e.g. Paris or The Royal Manor, Paris" />
          </div>
        </div>

        <div class="form-row-2">
          <div class="form-group">
            <label class="form-label" style="font-weight: 600;">Date Text</label>
            <input type="text" name="date_text" value="{{ old('date_text', $item->date_text) }}" class="form-control"
              placeholder="e.g. August 12, 2025" />
          </div>

          <div class="form-group">
            <label class="form-label" style="font-weight: 600;">Time Text</label>
            <input type="text" name="time_text" value="{{ old('time_text', $item->time_text) }}" class="form-control"
              placeholder="e.g. 9:00 AM - 11:00 AM" />
          </div>
        </div>

        <div class="form-group" style="margin-bottom: 1.25rem;">
          <label class="form-label" style="font-weight: 600;">Short Summary / Description</label>
          <textarea name="description" rows="2"
            class="form-control">{{ old('description', $item->description) }}</textarea>
        </div>

        <div class="form-row-2">
          <div class="form-group">
            <label class="form-label" style="font-weight: 600;">Sort Order</label>
            <input type="number" name="sort_order" value="{{ old('sort_order', $item->sort_order) }}" class="form-control"
              min="0" />
          </div>

          <div class="form-group">
            <label class="form-label" style="font-weight: 600;">Status</label>
            <select name="status" class="form-control">
              <option value="active" {{ old('status', $item->status) === 'active' ? 'selected' : '' }}>Active (Visible)
              </option>
              <option value="deactive" {{ old('status', $item->status) === 'deactive' ? 'selected' : '' }}>Deactive (Hidden)
              </option>
            </select>
          </div>
        </div>

        <div class="form-group" style="margin-bottom: 0;">
          <label class="form-label" style="font-weight: 600;">Main Hero / Cover Image</label>
          <input type="file" name="image" class="form-control" accept="image/*"
            onchange="previewImage(this, 'evtImgPrev')" />
          <div style="margin-top: 0.5rem; display: flex; align-items: center; gap: 0.75rem;">
            <img id="evtImgPrev" src="{{ $item->image_url }}" alt="Cover Image"
              style="max-height: 90px; border-radius: 8px; object-fit: cover; border: 1px solid #cbd5e1;" />
            <span style="font-size: 0.78rem; color: #64748b;">Current Cover Image</span>
          </div>
        </div>
      </div>

      <!-- 2. Detail Page Content -->
      <div class="section-box">
        <div class="section-title">2. Detail Page Full Content</div>

        <div class="form-group" style="margin-bottom: 1.25rem;">
          <label class="form-label" style="font-weight: 600;">Detail Headline / Lead</label>
          <textarea name="detail_headline" rows="2" class="form-control"
            placeholder="Lead text shown at top of details page">{{ old('detail_headline', $item->detail_headline) }}</textarea>
        </div>

        <div class="form-group" style="margin-bottom: 1.25rem;">
          <label class="form-label" style="font-weight: 600;">Full Content Paragraphs</label>
          <div style="border: 1px solid #cbd5e1; border-radius: 10px; overflow: hidden;">
            <textarea name="detail_content"
              id="detail_content_editor">{{ old('detail_content', $item->detail_content) }}</textarea>
          </div>
          <div style="font-size: 0.78rem; color: #64748b; margin-top: 0.4rem;">Use the editor above to add headings,
            paragraphs, bullet lists, bold/italic text, and inline images.</div>
        </div>


      </div>

      <!-- 3. Wedding Gallery (4 Images) -->
      <div class="section-box">
        <div class="section-title">3. Signature Wedding Gallery (4 Images)</div>

        <div class="form-row-2" style="margin-bottom: 1.25rem;">
          <div class="form-group">
            <label class="form-label" style="font-weight: 600;">Gallery Section Tag / Badge</label>
            <input type="text" name="gallery_tag" value="{{ old('gallery_tag', $item->gallery_tag ?? 'WEDDING Gallery') }}" class="form-control" placeholder="e.g. WEDDING Gallery" />
            <div style="font-size: 0.78rem; color: #64748b; margin-top: 0.3rem;">Small badge label shown above the gallery heading.</div>
          </div>

          <div class="form-group">
            <label class="form-label" style="font-weight: 600;">Gallery Section Title <span style="color: #ef4444;">*</span></label>
            <input type="text" name="gallery_title" value="{{ old('gallery_title', $item->gallery_title ?? 'Explore our exclusive signature wedding clicks') }}" class="form-control" placeholder="e.g. Explore our exclusive signature wedding clicks" />
            <div style="font-size: 0.78rem; color: #64748b; margin-top: 0.3rem;">Main heading shown above the 4 gallery images.</div>
          </div>
        </div>

        <div class="form-row-4">
          <div class="form-group">
            <label class="form-label" style="font-weight: 600;">Gallery Image 1</label>
            <input type="file" name="gallery_image_1" class="form-control" accept="image/*"
              onchange="previewImage(this, 'gImg1Prev')" />
            <div style="margin-top: 0.5rem;">
              <img id="gImg1Prev" src="{{ $item->gallery_image_1_url }}" alt="Gallery 1"
                style="width: 100%; height: 75px; border-radius: 6px; object-fit: cover; border: 1px solid #cbd5e1;" />
            </div>
          </div>

          <div class="form-group">
            <label class="form-label" style="font-weight: 600;">Gallery Image 2</label>
            <input type="file" name="gallery_image_2" class="form-control" accept="image/*"
              onchange="previewImage(this, 'gImg2Prev')" />
            <div style="margin-top: 0.5rem;">
              <img id="gImg2Prev" src="{{ $item->gallery_image_2_url }}" alt="Gallery 2"
                style="width: 100%; height: 75px; border-radius: 6px; object-fit: cover; border: 1px solid #cbd5e1;" />
            </div>
          </div>

          <div class="form-group">
            <label class="form-label" style="font-weight: 600;">Gallery Image 3</label>
            <input type="file" name="gallery_image_3" class="form-control" accept="image/*"
              onchange="previewImage(this, 'gImg3Prev')" />
            <div style="margin-top: 0.5rem;">
              <img id="gImg3Prev" src="{{ $item->gallery_image_3_url }}" alt="Gallery 3"
                style="width: 100%; height: 75px; border-radius: 6px; object-fit: cover; border: 1px solid #cbd5e1;" />
            </div>
          </div>

          <div class="form-group">
            <label class="form-label" style="font-weight: 600;">Gallery Image 4</label>
            <input type="file" name="gallery_image_4" class="form-control" accept="image/*"
              onchange="previewImage(this, 'gImg4Prev')" />
            <div style="margin-top: 0.5rem;">
              <img id="gImg4Prev" src="{{ $item->gallery_image_4_url }}" alt="Gallery 4"
                style="width: 100%; height: 75px; border-radius: 6px; object-fit: cover; border: 1px solid #cbd5e1;" />
            </div>
          </div>
        </div>
      </div>

      <div style="display: flex; gap: 1rem; align-items: center; margin-top: 1.5rem;">
        <button type="submit" class="btn btn-primary" style="padding: 0.6rem 1.5rem; font-weight: 600;">Save &amp; Update
          Event Details</button>
        <a href="{{ route('admin.event-page.items.index') }}" class="btn btn-light"
          style="padding: 0.6rem 1.2rem;">Cancel</a>
      </div>
    </form>
  </div>
@endsection

@push('scripts')
  <!-- CKEditor 5 Classic Build CDN -->
  <script src="https://cdn.ckeditor.com/ckeditor5/41.4.2/classic/ckeditor.js"></script>
  <script>
    // Image upload adapter (Base64 fallback for simple setups)
    class Base64UploadAdapter {
      constructor(loader) { this.loader = loader; }
      upload() {
        return this.loader.file.then(file => new Promise((resolve, reject) => {
          const reader = new FileReader();
          reader.onload = e => resolve({ default: e.target.result });
          reader.onerror = e => reject(e);
          reader.readAsDataURL(file);
        }));
      }
      abort() { }
    }
    function Base64UploaderPlugin(editor) {
      editor.plugins.get('FileRepository').createUploadAdapter = loader => new Base64UploadAdapter(loader);
    }

    ClassicEditor
      .create(document.querySelector('#detail_content_editor'), {
        extraPlugins: [Base64UploaderPlugin],
        toolbar: {
          items: [
            'heading', '|',
            'bold', 'italic', 'underline', '|',
            'link', 'bulletedList', 'numberedList', 'blockQuote', '|',
            'insertImage', 'mediaEmbed', '|',
            'undo', 'redo'
          ]
        },
        heading: {
          options: [
            { model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph' },
            { model: 'heading1', view: 'h1', title: 'Heading 1', class: 'ck-heading_heading1' },
            { model: 'heading2', view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2' },
            { model: 'heading3', view: 'h3', title: 'Heading 3', class: 'ck-heading_heading3' },
            { model: 'heading4', view: 'h4', title: 'Heading 4', class: 'ck-heading_heading4' },
            { model: 'heading5', view: 'h5', title: 'Heading 5', class: 'ck-heading_heading5' },
            { model: 'heading6', view: 'h6', title: 'Heading 6', class: 'ck-heading_heading6' }
          ]
        }
      })
      .catch(err => console.error('CKEditor init error:', err));

    // Image preview helper
    function previewImage(input, previewId) {
      if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = function (e) {
          document.getElementById(previewId).src = e.target.result;
        }
        reader.readAsDataURL(input.files[0]);
      }
    }
  </script>
@endpush