@extends('backend.layouts.app')

@section('title', 'Edit Blog Post - ' . $blog->title)
@section('page_title', 'Blogs > Edit Post')

@push('styles')
<!-- Quill.js Rich Text Editor Styles -->
<link href="https://cdn.jsdelivr.net/npm/quill@1.3.7/dist/quill.snow.css" rel="stylesheet">
<style>
  .admin-form-card {
    background: #ffffff;
    border-radius: 12px;
    border: 1px solid var(--border-color, #e2e8f0);
    box-shadow: 0 4px 16px rgba(0, 0, 0, 0.04);
    padding: 1.5rem 1.75rem;
    margin-bottom: 1.75rem;
  }
  .admin-form-card .card-head {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding-bottom: 1rem;
    margin-bottom: 1.25rem;
    border-bottom: 1px solid var(--border-color, #e2e8f0);
  }
  .card-badge {
    display: inline-flex;
    align-items: center;
    gap: 0.35rem;
    padding: 0.25rem 0.65rem;
    font-size: 0.75rem;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    border-radius: 6px;
    background: #f1f5f9;
    color: #475569;
  }
  .card-badge.primary {
    background: #eff6ff;
    color: #2563eb;
  }
  .card-badge.accent {
    background: #fff7ed;
    color: #ea580c;
  }
  .form-row-3 {
    display: grid;
    grid-template-columns: 2fr 1.5fr 1fr;
    gap: 1.25rem;
    margin-bottom: 1.25rem;
  }
  .form-row-2 {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 1.25rem;
    margin-bottom: 1.25rem;
  }
  .upload-box {
    border: 2px dashed #cbd5e1;
    border-radius: 8px;
    padding: 1rem;
    background: #f8fafc;
    transition: all 0.2s ease;
  }
  .upload-box:hover {
    border-color: #94a3b8;
    background: #f1f5f9;
  }
  .ql-container {
    border-bottom-left-radius: 8px;
    border-bottom-right-radius: 8px;
    font-family: inherit;
    font-size: 0.95rem;
    min-height: 280px;
  }
  .ql-toolbar {
    border-top-left-radius: 8px;
    border-top-right-radius: 8px;
    background: #f8fafc;
  }
  @media (max-width: 991px) {
    .form-row-3, .form-row-2 {
      grid-template-columns: 1fr !important;
    }
  }
</style>
@endpush

@section('content')
  <div style="width: 100%; padding-bottom: 2rem;">
    
    <!-- Top Action Header -->
    <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 1.25rem;">
      <div>
        <h1 style="font-size: 1.45rem; font-weight: 700; color: var(--text-main); margin: 0;">Edit Blog Post</h1>
        <p style="font-size: 0.86rem; color: var(--text-dim); margin: 0.2rem 0 0;">Updating: <strong>{{ $blog->title }}</strong></p>
      </div>
      <div style="display: flex; align-items: center; gap: 0.75rem;">
        <a href="{{ route('blog.post', $blog->slug) }}" target="_blank" class="btn btn-secondary" title="View live page in new tab">
          <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"></path>
            <polyline points="15 3 21 3 21 9"></polyline>
            <line x1="10" y1="14" x2="21" y2="3"></line>
          </svg>
          <span>Live Preview</span>
        </a>
        <a href="{{ route('admin.blogs.index') }}" class="btn btn-secondary">
          <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <polyline points="15 18 9 12 15 6"></polyline>
          </svg>
          <span>Back to List</span>
        </a>
      </div>
    </div>

    <form action="{{ route('admin.blogs.update', $blog->id) }}" method="POST" enctype="multipart/form-data" id="blogForm">
      @csrf
      @method('PUT')

      <!-- ========================================================================= -->
      <!-- CARD 1: BASIC & CARD SETTINGS -->
      <!-- ========================================================================= -->
      <div class="admin-form-card">
        <div class="card-head">
          <div>
            <div style="display: flex; align-items: center; gap: 0.65rem;">
              <span class="card-badge primary">Card 1</span>
              <h2 style="font-size: 1.12rem; font-weight: 700; color: var(--text-main); margin: 0;">Post Overview &amp; Card Settings</h2>
            </div>
            <p style="font-size: 0.82rem; color: var(--text-dim); margin: 0.2rem 0 0;">Configures the blog preview card displayed on the /blog listing page.</p>
          </div>
        </div>

        <!-- Row 1: Title, Slug, Display Order -->
        <div class="form-row-3">
          <div class="form-group" style="margin-bottom: 0;">
            <label class="form-label" for="title">Blog Title <span style="color: #ef4444;">*</span></label>
            <input type="text" id="title" name="title" class="form-control" placeholder="e.g. How Smart Marketing Drives Business Growth" value="{{ old('title', $blog->title) }}" required />
            @error('title')
              <div style="color: #ef4444; font-size: 0.8rem; margin-top: 4px;">{{ $message }}</div>
            @enderror
          </div>

          <div class="form-group" style="margin-bottom: 0;">
            <label class="form-label" for="slug">URL Slug</label>
            <input type="text" id="slug" name="slug" class="form-control" placeholder="e.g. how-smart-marketing-drives-business-growth" value="{{ old('slug', $blog->slug) }}" />
            @error('slug')
              <div style="color: #ef4444; font-size: 0.8rem; margin-top: 4px;">{{ $message }}</div>
            @enderror
          </div>

          <div class="form-group" style="margin-bottom: 0;">
            <label class="form-label" for="order">Display Order</label>
            <input type="number" id="order" name="order" class="form-control" value="{{ old('order', $blog->order) }}" min="0" />
            @error('order')
              <div style="color: #ef4444; font-size: 0.8rem; margin-top: 4px;">{{ $message }}</div>
            @enderror
          </div>
        </div>

        <!-- Row 2: Published Date & Status -->
        <div class="form-row-2">
          <div class="form-group" style="margin-bottom: 0;">
            <label class="form-label" for="published_date">Published Date</label>
            <input type="date" id="published_date" name="published_date" class="form-control" value="{{ old('published_date', $blog->published_date ? $blog->published_date->format('Y-m-d') : '') }}" />
            @error('published_date')
              <div style="color: #ef4444; font-size: 0.8rem; margin-top: 4px;">{{ $message }}</div>
            @enderror
          </div>

          <div class="form-group" style="margin-bottom: 0;">
            <label class="form-label" style="margin-bottom: 0.5rem;">Publish Status</label>
            <div style="display: flex; gap: 1.5rem; padding-top: 0.5rem;">
              <label style="display: flex; align-items: center; gap: 0.45rem; cursor: pointer; font-size: 0.9rem;">
                <input type="radio" name="status" value="active" {{ old('status', $blog->status) === 'active' ? 'checked' : '' }} />
                <span style="font-weight: 600; color: #16a34a;">Active (Published)</span>
              </label>
              <label style="display: flex; align-items: center; gap: 0.45rem; cursor: pointer; font-size: 0.9rem;">
                <input type="radio" name="status" value="deactive" {{ old('status', $blog->status) === 'deactive' ? 'checked' : '' }} />
                <span style="font-weight: 600; color: #64748b;">Deactive (Draft)</span>
              </label>
            </div>
            @error('status')
              <div style="color: #ef4444; font-size: 0.8rem; margin-top: 4px;">{{ $message }}</div>
            @enderror
          </div>
        </div>

        <!-- Row 3: Short Description & Thumbnail Image -->
        <div class="form-row-2">
          <div class="form-group" style="margin-bottom: 0;">
            <label class="form-label" for="short_description">Short Summary / Excerpt <span style="color: var(--text-dim); font-size: 0.78rem;">(Shows on blog listing cards)</span></label>
            <textarea id="short_description" name="short_description" class="form-control" rows="4" placeholder="Brief summary of the article..." style="resize: vertical; height: 130px;">{{ old('short_description', $blog->short_description) }}</textarea>
            @error('short_description')
              <div style="color: #ef4444; font-size: 0.8rem; margin-top: 4px;">{{ $message }}</div>
            @enderror
          </div>

          <div class="form-group" style="margin-bottom: 0;">
            <label class="form-label" for="image">Card Thumbnail Image</label>
            <div class="upload-box" style="min-height: 130px; display: flex; flex-direction: column; justify-content: center; align-items: center;">
              <input type="file" id="image" name="image" accept="image/*" class="form-control" style="font-size: 0.82rem; padding: 0.35rem 0.65rem;" onchange="previewCardImage(event)" />
              <div style="font-size: 0.74rem; color: var(--text-dim); margin-top: 0.3rem;">JPG, PNG, WEBP (Recommended: 800x600, Max: 10MB)</div>
              
              <div id="cardImagePreviewWrap" style="margin-top: 0.5rem; text-align: center;">
                <img id="cardImagePreview" src="{{ $blog->image_url }}" alt="Card Preview" style="height: 55px; width: 85px; object-fit: cover; border-radius: 4px; box-shadow: 0 2px 6px rgba(0,0,0,0.1); border: 1px solid #e2e8f0;" />
                <div style="font-size: 0.72rem; color: var(--text-dim); margin-top: 2px;">Current Thumbnail</div>
              </div>
            </div>
            @error('image')
              <div style="color: #ef4444; font-size: 0.8rem; margin-top: 4px;">{{ $message }}</div>
            @enderror
          </div>
        </div>
      </div>

      <!-- ========================================================================= -->
      <!-- CARD 2: AUTHOR SETTINGS -->
      <!-- ========================================================================= -->
      <div class="admin-form-card">
        <div class="card-head">
          <div>
            <div style="display: flex; align-items: center; gap: 0.65rem;">
              <span class="card-badge accent">Card 2</span>
              <h2 style="font-size: 1.12rem; font-weight: 700; color: var(--text-main); margin: 0;">Author Information</h2>
            </div>
            <p style="font-size: 0.82rem; color: var(--text-dim); margin: 0.2rem 0 0;">Author profile displayed on both the blog card and article header.</p>
          </div>
        </div>

        <div class="form-row-3">
          <div class="form-group" style="margin-bottom: 0;">
            <label class="form-label" for="author_name">Author Name</label>
            <input type="text" id="author_name" name="author_name" class="form-control" placeholder="e.g. Roger Yates" value="{{ old('author_name', $blog->author_name) }}" />
            @error('author_name')
              <div style="color: #ef4444; font-size: 0.8rem; margin-top: 4px;">{{ $message }}</div>
            @enderror
          </div>

          <div class="form-group" style="margin-bottom: 0;">
            <label class="form-label" for="author_title">Author Title / Role</label>
            <input type="text" id="author_title" name="author_title" class="form-control" placeholder="e.g. Marketing Manager" value="{{ old('author_title', $blog->author_title) }}" />
            @error('author_title')
              <div style="color: #ef4444; font-size: 0.8rem; margin-top: 4px;">{{ $message }}</div>
            @enderror
          </div>

          <div class="form-group" style="margin-bottom: 0;">
            <label class="form-label" for="author_image">Author Avatar</label>
            <input type="file" id="author_image" name="author_image" accept="image/*" class="form-control" style="font-size: 0.82rem; padding: 0.35rem 0.65rem;" onchange="previewAuthorImage(event)" />
            <div id="authorImagePreviewWrap" style="margin-top: 0.5rem; text-align: center;">
              @if($blog->author_image_url)
                <img id="authorImagePreview" src="{{ $blog->author_image_url }}" alt="Author Avatar" style="width: 42px; height: 42px; border-radius: 50%; object-fit: cover; border: 1px solid #cbd5e1;" />
              @else
                <img id="authorImagePreview" src="#" alt="Author Avatar" style="display: none; width: 42px; height: 42px; border-radius: 50%; object-fit: cover; border: 1px solid #cbd5e1;" />
              @endif
            </div>
            @error('author_image')
              <div style="color: #ef4444; font-size: 0.8rem; margin-top: 4px;">{{ $message }}</div>
            @enderror
          </div>
        </div>
      </div>

      <!-- ========================================================================= -->
      <!-- CARD 3: ARTICLE DETAIL & CONTENT -->
      <!-- ========================================================================= -->
      <div class="admin-form-card">
        <div class="card-head">
          <div>
            <div style="display: flex; align-items: center; gap: 0.65rem;">
              <span class="card-badge primary">Card 3</span>
              <h2 style="font-size: 1.12rem; font-weight: 700; color: var(--text-main); margin: 0;">Article Details &amp; Editorial Content</h2>
            </div>
            <p style="font-size: 0.82rem; color: var(--text-dim); margin: 0.2rem 0 0;">Inner post page banner image and full rich text content displayed at /blog-post/{slug}.</p>
          </div>
        </div>

        <!-- Banner Image Upload -->
        <div class="form-group" style="margin-bottom: 1.5rem;">
          <label class="form-label" for="banner_image">Article Hero Banner Image <span style="color: var(--text-dim); font-size: 0.78rem;">(Large header image at top of article)</span></label>
          <div class="upload-box" style="padding: 1.25rem;">
            <div style="max-width: 520px; margin: 0 auto; text-align: center;">
              <input type="file" id="banner_image" name="banner_image" accept="image/*" class="form-control" onchange="previewBannerImage(event)" />
              <div style="font-size: 0.76rem; color: var(--text-dim); margin-top: 0.35rem;">High-resolution banner (Recommended: 1200x600 or 1600x800)</div>
              
              <div id="bannerPreviewWrap" style="margin-top: 0.75rem;">
                <div style="font-size: 0.78rem; font-weight: 600; color: #16a34a; margin-bottom: 0.25rem;">Current Banner Preview:</div>
                <img id="bannerPreview" src="{{ $blog->banner_image_url }}" alt="Banner Preview" style="width: 100%; height: 140px; object-fit: cover; border-radius: 6px; box-shadow: 0 4px 12px rgba(0,0,0,0.1);" />
              </div>
            </div>
          </div>
          @error('banner_image')
            <div style="color: #ef4444; font-size: 0.8rem; margin-top: 4px;">{{ $message }}</div>
          @enderror
        </div>

        <!-- Rich Text Article Content -->
        <div class="form-group" style="margin-bottom: 1.25rem;">
          <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 0.5rem; flex-wrap: wrap; gap: 0.5rem;">
            <label class="form-label" style="margin-bottom: 0;">Article Body / Full Story <span style="color: var(--text-dim); font-size: 0.78rem;">(Supports headings, paragraphs, quotes, bold, links, lists &amp; images)</span></label>
            <div style="display: flex; gap: 0.4rem;">
              <button type="button" class="btn btn-secondary btn-sm" onclick="loadDefaultTemplate()" style="padding: 0.3rem 0.65rem; font-size: 0.76rem;" title="Load the standard formatted article template">
                <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line></svg>
                <span>Load Sample Template</span>
              </button>
              <button type="button" class="btn btn-secondary btn-sm" onclick="insertStoryImages()" style="padding: 0.3rem 0.65rem; font-size: 0.76rem;" title="Insert 2 side-by-side story images">
                <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><circle cx="8.5" cy="8.5" r="1.5"></circle><polyline points="21 15 16 10 5 21"></polyline></svg>
                <span>Insert 2 Images</span>
              </button>
              <button type="button" class="btn btn-sm" onclick="clearQuillEditor()" style="padding: 0.3rem 0.65rem; font-size: 0.76rem; color: #ef4444; border: 1px solid #fecaca; background: #fff5f5;">Clear</button>
            </div>
          </div>

          @php
            $defaultStoryTemplate = '<h4>How smart marketing drives business growth</h4><p>Smart marketing helps businesses connect with the right audience, increase brand awareness, and generate measurable results. By combining data-driven strategies, targeted campaigns, and customer-focused messaging, companies can improve engagement, strengthen market presence, and achieve sustainable growth.</p><p><br></p><h4>Turning marketing efforts into sustainable growth</h4><p>Modern businesses operate in a highly competitive environment where effective marketing can make a significant difference. Smart marketing strategies leverage market research, digital channels, and performance analytics to identify opportunities and optimize campaigns. By focusing on the right audience.</p><p>Through consistent branding, content creation, and strategic communication, organizations build stronger relationships with customers while positioning themselves for long-term success.</p><p><br></p><div class="w-layout-hflex rt-blog-post-image-box" style="display: flex; gap: 1.25rem; margin: 1.5rem 0;"><div class="rt-blog-post-image" style="flex: 1;"><img src="/assets/images/6a7ef29df1e2aad748f0e0dc_Blog-data-image-_3a8fcaea.avif" alt="Story Image 1" style="width: 100%; border-radius: 8px; object-fit: cover; box-shadow: 0 2px 8px rgba(0,0,0,0.08);"/></div><div class="rt-blog-post-image" style="flex: 1;"><img src="/assets/images/6a7ef2a1d9efd9e32f953f8d_Blog-data-image-2_2aec2ca9.avif" alt="Story Image 2" style="width: 100%; border-radius: 8px; object-fit: cover; box-shadow: 0 2px 8px rgba(0,0,0,0.08);"/></div></div><p><br></p><h4>Key marketing initiatives that drive business success</h4><p>Effective marketing helps businesses build meaningful customer relationships while creating opportunities for growth. Through strategic planning, innovation, and optimization, organizations can improve market presence and maximize return on investment.</p><p><br></p><ul role="list"><li>Strategic marketing planning</li><li>Digital advertising campaigns</li><li>Search engine optimization (SEO)</li><li>Social media marketing</li><li>Content creation and distribution</li></ul>';
          @endphp

          <div id="quillEditor" style="background: #ffffff;">{!! old('content', $blog->content) !!}</div>
          <input type="hidden" name="content" id="content" value="{{ old('content', $blog->content) }}" />
          @error('content')
            <div style="color: #ef4444; font-size: 0.8rem; margin-top: 4px;">{{ $message }}</div>
          @enderror
        </div>
      </div>

      <!-- Action Buttons -->
      <div style="display: flex; align-items: center; justify-content: space-between; padding-top: 0.5rem;">
        <button type="submit" form="deleteBlogForm" class="btn btn-danger" style="background: #fee2e2; color: #dc2626; border: 1px solid #fecaca;">
          <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <polyline points="3 6 5 6 21 6"></polyline>
            <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
          </svg>
          <span>Delete Post</span>
        </button>

        <div style="display: flex; align-items: center; gap: 1rem;">
          <a href="{{ route('admin.blogs.index') }}" class="btn btn-secondary">Cancel</a>
          <button type="submit" class="btn btn-primary" style="padding: 0.65rem 1.75rem; font-size: 0.95rem;">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
              <polyline points="20 6 9 17 4 12"></polyline>
            </svg>
            <span>Update Blog Post</span>
          </button>
        </div>
      </div>
    </form>

    <!-- Separate Delete Form (No nested form bug) -->
    <form id="deleteBlogForm" action="{{ route('admin.blogs.destroy', $blog->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to permanently delete this blog post?');" style="display: none;">
      @csrf
      @method('DELETE')
    </form>
  </div>
@endsection

@push('scripts')
<!-- Quill.js Rich Text Editor Script -->
<script src="https://cdn.jsdelivr.net/npm/quill@1.3.7/dist/quill.min.js"></script>
<script>
  let quillInstance;
  const standardTemplateHtml = {!! json_encode($defaultStoryTemplate) !!};

  // Card Image Preview
  function previewCardImage(event) {
    const reader = new FileReader();
    reader.onload = function() {
      const output = document.getElementById('cardImagePreview');
      output.src = reader.result;
      document.getElementById('cardImagePreviewWrap').style.display = 'block';
    };
    if (event.target.files && event.target.files[0]) {
      reader.readAsDataURL(event.target.files[0]);
    }
  }

  // Banner Image Preview
  function previewBannerImage(event) {
    const reader = new FileReader();
    reader.onload = function() {
      const output = document.getElementById('bannerPreview');
      output.src = reader.result;
      document.getElementById('bannerPreviewWrap').style.display = 'block';
    };
    if (event.target.files && event.target.files[0]) {
      reader.readAsDataURL(event.target.files[0]);
    }
  }

  // Author Image Preview
  function previewAuthorImage(event) {
    const reader = new FileReader();
    reader.onload = function() {
      const output = document.getElementById('authorImagePreview');
      output.src = reader.result;
      output.style.display = 'inline-block';
      document.getElementById('authorImagePreviewWrap').style.display = 'block';
    };
    if (event.target.files && event.target.files[0]) {
      reader.readAsDataURL(event.target.files[0]);
    }
  }

  function loadDefaultTemplate() {
    if (confirm('Load the sample article template? Any unsaved edits will be replaced.')) {
      if (quillInstance) {
        quillInstance.root.innerHTML = standardTemplateHtml;
        document.getElementById('content').value = standardTemplateHtml;
      }
    }
  }

  function insertStoryImages() {
    if (quillInstance) {
      const imgHtml = '<div class="w-layout-hflex rt-blog-post-image-box" style="display: flex; gap: 1.25rem; margin: 1.5rem 0;"><div class="rt-blog-post-image" style="flex: 1;"><img src="/assets/images/6a7ef29df1e2aad748f0e0dc_Blog-data-image-_3a8fcaea.avif" alt="Story Image 1" style="width: 100%; border-radius: 8px; object-fit: cover; box-shadow: 0 2px 8px rgba(0,0,0,0.08);"/></div><div class="rt-blog-post-image" style="flex: 1;"><img src="/assets/images/6a7ef2a1d9efd9e32f953f8d_Blog-data-image-2_2aec2ca9.avif" alt="Story Image 2" style="width: 100%; border-radius: 8px; object-fit: cover; box-shadow: 0 2px 8px rgba(0,0,0,0.08);"/></div></div><p><br></p>';
      const range = quillInstance.getSelection(true);
      const index = range ? range.index : quillInstance.getLength();
      quillInstance.clipboard.dangerouslyPasteHTML(index, imgHtml);
    }
  }

  function clearQuillEditor() {
    if (confirm('Are you sure you want to clear the editor?')) {
      if (quillInstance) {
        quillInstance.root.innerHTML = '';
        document.getElementById('content').value = '';
      }
    }
  }

  // Initialize Quill Editor
  document.addEventListener('DOMContentLoaded', function() {
    var toolbarOptions = [
      [{ 'header': [1, 2, 3, 4, false] }],
      ['bold', 'italic', 'underline', 'strike'],
      [{ 'color': [] }, { 'background': [] }],
      [{ 'list': 'ordered'}, { 'list': 'bullet' }],
      ['blockquote', 'code-block'],
      [{ 'align': [] }],
      ['link', 'image', 'clean']
    ];

    quillInstance = new Quill('#quillEditor', {
      theme: 'snow',
      modules: {
        toolbar: toolbarOptions
      },
      placeholder: 'Write your article body, insights, and stories here...'
    });

    // Populate editor with existing content if any
    var hiddenContent = document.getElementById('content').value;
    if (hiddenContent) {
      quillInstance.root.innerHTML = hiddenContent;
    }

    // On form submit, copy HTML to hidden input
    var form = document.getElementById('blogForm');
    form.addEventListener('submit', function() {
      var html = quillInstance.root.innerHTML;
      if (html === '<p><br></p>') {
        html = '';
      }
      document.getElementById('content').value = html;
    });
  });
</script>
@endpush
