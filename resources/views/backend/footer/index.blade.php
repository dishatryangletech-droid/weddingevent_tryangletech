@extends('backend.layouts.app')

@section('title', 'Footer Settings')
@section('page_title', 'Website Settings > Footer')

@section('content')
  <div class="admin-card" style="margin-bottom: 1.5rem;">
    <div class="card-header">
      <div>
        <div class="card-title">Website Footer Management</div>
        <div class="card-subtitle">Manage company logo, about description, social media links, quick links, services list, contact details, and copyright notices.</div>
      </div>
      <a href="{{ url('/') }}" target="_blank" class="btn btn-secondary btn-sm" style="display: inline-flex; align-items: center; gap: 0.4rem;">
        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
          <path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"></path>
          <polyline points="15 3 21 3 21 9"></polyline>
          <line x1="10" y1="14" x2="21" y2="3"></line>
        </svg>
        <span>View Live Site</span>
      </a>
    </div>

    <form action="{{ route('admin.footer.update') }}" method="POST" enctype="multipart/form-data">
      @csrf

      <div style="padding: 1.5rem; display: flex; flex-direction: column; gap: 2rem;">

        <!-- 1. Brand & Logo -->
        <div style="background: var(--bg-surface-secondary, #fafafa); border: 1px solid var(--border-color, #e5e7eb); border-radius: var(--radius-md, 8px); padding: 1.25rem;">
          <h3 style="font-size: 1.05rem; font-weight: 600; margin-bottom: 1rem; display: flex; align-items: center; gap: 0.5rem;">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
              <rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
              <circle cx="8.5" cy="8.5" r="1.5"></circle>
              <polyline points="21 15 16 10 5 21"></polyline>
            </svg>
            Brand Logo & About Text
          </h3>

          <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 1.5rem;">
            <!-- Logo Upload -->
            <div class="form-group">
              <label class="form-label">Footer Logo (White / Light Version)</label>
              <div style="display: flex; gap: 1rem; align-items: center;">
                <div style="width: 140px; height: 60px; border-radius: var(--radius-md); overflow: hidden; border: 1px solid var(--border-color); background: #000000; display: flex; align-items: center; justify-content: center; padding: 6px;">
                  <img id="footerLogoPreview" src="{{ $footerSetting->logo_url }}" alt="Logo Preview" style="max-height: 100%; max-width: 100%; object-fit: contain;" />
                </div>
                <div style="flex: 1;">
                  <input type="file" name="logo" id="logo" class="form-control" accept="image/*" onchange="previewImage(this, 'footerLogoPreview')" />
                  <div class="form-help" style="margin-top: 4px;">Recommended: Transparent PNG or SVG. Max: 4MB.</div>
                </div>
              </div>
              @error('logo')
                <div style="color: #ef4444; font-size: 0.8rem; margin-top: 4px;">{{ $message }}</div>
              @enderror
            </div>

            <!-- About Text -->
            <div class="form-group">
              <label class="form-label" for="about_text">About Description Text</label>
              <textarea name="about_text" id="about_text" rows="3" class="form-control" placeholder="Short description displayed below the logo in footer">{{ old('about_text', $footerSetting->about_text) }}</textarea>
              <div class="form-help">Summary statement displayed directly under the logo.</div>
              @error('about_text')
                <div style="color: #ef4444; font-size: 0.8rem; margin-top: 4px;">{{ $message }}</div>
              @enderror
            </div>
          </div>
        </div>

        <!-- 2. Social Media Links -->
        <div style="background: var(--bg-surface-secondary, #fafafa); border: 1px solid var(--border-color, #e5e7eb); border-radius: var(--radius-md, 8px); padding: 1.25rem;">
          <h3 style="font-size: 1.05rem; font-weight: 600; margin-bottom: 1rem; display: flex; align-items: center; gap: 0.5rem;">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
              <path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path>
            </svg>
            Social Media Handles & Links
          </h3>

          <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(260px, 1fr)); gap: 1rem;">
            <div class="form-group">
              <label class="form-label" for="social_heading">Social Section Heading</label>
              <input type="text" name="social_heading" id="social_heading" value="{{ old('social_heading', $footerSetting->social_heading ?? 'Follow us') }}" class="form-control" placeholder="e.g. Follow us" />
            </div>
            <div class="form-group">
              <label class="form-label" for="facebook_url">Facebook URL</label>
              <input type="text" name="facebook_url" id="facebook_url" value="{{ old('facebook_url', $footerSetting->facebook_url) }}" class="form-control" placeholder="https://facebook.com/..." />
            </div>
            <div class="form-group">
              <label class="form-label" for="linkedin_url">LinkedIn URL</label>
              <input type="text" name="linkedin_url" id="linkedin_url" value="{{ old('linkedin_url', $footerSetting->linkedin_url) }}" class="form-control" placeholder="https://linkedin.com/..." />
            </div>
            <div class="form-group">
              <label class="form-label" for="twitter_url">X (Twitter) URL</label>
              <input type="text" name="twitter_url" id="twitter_url" value="{{ old('twitter_url', $footerSetting->twitter_url) }}" class="form-control" placeholder="https://x.com/..." />
            </div>
            <div class="form-group">
              <label class="form-label" for="instagram_url">Instagram URL (Optional)</label>
              <input type="text" name="instagram_url" id="instagram_url" value="{{ old('instagram_url', $footerSetting->instagram_url) }}" class="form-control" placeholder="https://instagram.com/..." />
            </div>
            <div class="form-group">
              <label class="form-label" for="youtube_url">YouTube URL (Optional)</label>
              <input type="text" name="youtube_url" id="youtube_url" value="{{ old('youtube_url', $footerSetting->youtube_url) }}" class="form-control" placeholder="https://youtube.com/..." />
            </div>
          </div>
        </div>

        <!-- 3. Navigation Headings & Services List -->
        <div style="background: var(--bg-surface-secondary, #fafafa); border: 1px solid var(--border-color, #e5e7eb); border-radius: var(--radius-md, 8px); padding: 1.25rem;">
          <h3 style="font-size: 1.05rem; font-weight: 600; margin-bottom: 1rem; display: flex; align-items: center; gap: 0.5rem;">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
              <line x1="8" y1="6" x2="21" y2="6"></line>
              <line x1="8" y1="12" x2="21" y2="12"></line>
              <line x1="8" y1="18" x2="21" y2="18"></line>
              <line x1="3" y1="6" x2="3.01" y2="6"></line>
              <line x1="3" y1="12" x2="3.01" y2="12"></line>
              <line x1="3" y1="18" x2="3.01" y2="18"></line>
            </svg>
            Columns & Services Links
          </h3>

          <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(260px, 1fr)); gap: 1rem; margin-bottom: 1.25rem;">
            <div class="form-group">
              <label class="form-label" for="quick_links_heading">Quick Links Column Title</label>
              <input type="text" name="quick_links_heading" id="quick_links_heading" value="{{ old('quick_links_heading', $footerSetting->quick_links_heading ?? 'Quick links') }}" class="form-control" />
            </div>
            <div class="form-group">
              <label class="form-label" for="services_heading">Services Column Title</label>
              <input type="text" name="services_heading" id="services_heading" value="{{ old('services_heading', $footerSetting->services_heading ?? 'Services') }}" class="form-control" />
            </div>
            <div class="form-group">
              <label class="form-label" for="services_view_all_text">'View All Services' Link Text</label>
              <input type="text" name="services_view_all_text" id="services_view_all_text" value="{{ old('services_view_all_text', $footerSetting->services_view_all_text ?? 'View all services →') }}" class="form-control" />
            </div>
            <div class="form-group">
              <label class="form-label" for="services_view_all_url">'View All Services' URL</label>
              <input type="text" name="services_view_all_url" id="services_view_all_url" value="{{ old('services_view_all_url', $footerSetting->services_view_all_url ?? '/services') }}" class="form-control" />
            </div>
          </div>

          <!-- Services Items Repeater -->
          <div>
            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 0.75rem;">
              <label class="form-label" style="margin-bottom: 0;">Footer Service Links</label>
              <button type="button" class="btn btn-secondary btn-sm" onclick="addServiceLink()" style="font-size: 0.8rem; padding: 4px 10px;">
                + Add Service Link
              </button>
            </div>

            <div id="serviceLinksContainer" style="display: flex; flex-direction: column; gap: 0.5rem;">
              @php
                $links = old('services_links', $footerSetting->services_links ?? [
                  ['title' => '3D Projection Mapping', 'url' => '/service/3d-projection-mapping'],
                  ['title' => 'Musical Fountain & Water Curtain', 'url' => '/service/musical-fountain-water-curtain'],
                  ['title' => 'DMT & Museum', 'url' => '/service/dmt-museum'],
                  ['title' => 'Façade Lighting', 'url' => '/service/facade-lighting'],
                  ['title' => 'PRO – AV Systems', 'url' => '/service/pro-av-systems'],
                  ['title' => 'Solar Energy Systems', 'url' => '/service/solar-energy-systems'],
                ]);
              @endphp

              @foreach($links as $i => $link)
                <div class="service-link-row" style="display: flex; gap: 0.75rem; align-items: center; background: #ffffff; padding: 8px 12px; border-radius: 6px; border: 1px solid var(--border-color);">
                  <span style="font-size: 0.85rem; font-weight: 600; color: #888; width: 24px;">{{ $i + 1 }}.</span>
                  <input type="text" name="services_links[{{ $i }}][title]" value="{{ $link['title'] ?? '' }}" class="form-control" placeholder="Service title (e.g. 3D Projection Mapping)" style="flex: 2;" required />
                  <input type="text" name="services_links[{{ $i }}][url]" value="{{ $link['url'] ?? '' }}" class="form-control" placeholder="Service URL (e.g. /service/3d-projection-mapping)" style="flex: 2;" required />
                  <button type="button" class="btn btn-danger btn-sm" onclick="this.closest('.service-link-row').remove()" style="padding: 6px 10px;" title="Delete Link">
                    &times;
                  </button>
                </div>
              @endforeach
            </div>
          </div>
        </div>

        <!-- 4. Contact Information -->
        <div style="background: var(--bg-surface-secondary, #fafafa); border: 1px solid var(--border-color, #e5e7eb); border-radius: var(--radius-md, 8px); padding: 1.25rem;">
          <h3 style="font-size: 1.05rem; font-weight: 600; margin-bottom: 1rem; display: flex; align-items: center; gap: 0.5rem;">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
              <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path>
            </svg>
            Contact Information Column
          </h3>

          <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(240px, 1fr)); gap: 1rem;">
            <div class="form-group">
              <label class="form-label" for="contact_heading">Contact Column Title</label>
              <input type="text" name="contact_heading" id="contact_heading" value="{{ old('contact_heading', $footerSetting->contact_heading ?? 'Contact us') }}" class="form-control" />
            </div>
            <div class="form-group">
              <label class="form-label" for="email_label">Email Label</label>
              <input type="text" name="email_label" id="email_label" value="{{ old('email_label', $footerSetting->email_label ?? 'Email us') }}" class="form-control" />
            </div>
            <div class="form-group">
              <label class="form-label" for="email">Contact Email</label>
              <input type="text" name="email" id="email" value="{{ old('email', $footerSetting->email ?? 'info@example.com') }}" class="form-control" />
            </div>
            <div class="form-group">
              <label class="form-label" for="phone_label">Phone Label</label>
              <input type="text" name="phone_label" id="phone_label" value="{{ old('phone_label', $footerSetting->phone_label ?? 'Call us') }}" class="form-control" />
            </div>
            <div class="form-group">
              <label class="form-label" for="phone">Phone Number</label>
              <input type="text" name="phone" id="phone" value="{{ old('phone', $footerSetting->phone ?? '8881234567') }}" class="form-control" />
            </div>
          </div>
        </div>

        <!-- 5. Copyright & Bottom Bar -->
        <div style="background: var(--bg-surface-secondary, #fafafa); border: 1px solid var(--border-color, #e5e7eb); border-radius: var(--radius-md, 8px); padding: 1.25rem;">
          <h3 style="font-size: 1.05rem; font-weight: 600; margin-bottom: 1rem; display: flex; align-items: center; gap: 0.5rem;">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
              <circle cx="12" cy="12" r="10"></circle>
              <path d="M15 9.354a4 4 0 1 0 0 5.292"></path>
            </svg>
            Copyright & Bottom Bar
          </h3>

          <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(260px, 1fr)); gap: 1rem;">
            <div class="form-group">
              <label class="form-label" for="copyright_text">Copyright Text Prefix</label>
              <input type="text" name="copyright_text" id="copyright_text" value="{{ old('copyright_text', $footerSetting->copyright_text ?? 'Designed by : Radiant Templates') }}" class="form-control" placeholder="e.g. Designed by :" />
            </div>
            <div class="form-group">
              <label class="form-label" for="copyright_link_text">Copyright Link Label</label>
              <input type="text" name="copyright_link_text" id="copyright_link_text" value="{{ old('copyright_link_text', $footerSetting->copyright_link_text ?? 'Radiant Templates') }}" class="form-control" placeholder="e.g. Radiant Templates" />
            </div>
            <div class="form-group">
              <label class="form-label" for="copyright_link_url">Copyright Link URL</label>
              <input type="text" name="copyright_link_url" id="copyright_link_url" value="{{ old('copyright_link_url', $footerSetting->copyright_link_url ?? 'https://www.radianttemplates.com/') }}" class="form-control" placeholder="https://..." />
            </div>
            <div class="form-group">
              <label class="form-label" for="licenses_text">Licenses Text</label>
              <input type="text" name="licenses_text" id="licenses_text" value="{{ old('licenses_text', $footerSetting->licenses_text ?? 'Licenses') }}" class="form-control" />
            </div>
            <div class="form-group">
              <label class="form-label" for="licenses_url">Licenses URL</label>
              <input type="text" name="licenses_url" id="licenses_url" value="{{ old('licenses_url', $footerSetting->licenses_url ?? '/licenses') }}" class="form-control" />
            </div>
            <div class="form-group">
              <label class="form-label" for="style_guide_text">Style-guide Text</label>
              <input type="text" name="style_guide_text" id="style_guide_text" value="{{ old('style_guide_text', $footerSetting->style_guide_text ?? 'Style-guide') }}" class="form-control" />
            </div>
            <div class="form-group">
              <label class="form-label" for="style_guide_url">Style-guide URL</label>
              <input type="text" name="style_guide_url" id="style_guide_url" value="{{ old('style_guide_url', $footerSetting->style_guide_url ?? '/style-guide') }}" class="form-control" />
            </div>
          </div>
        </div>

        <!-- 6. Status & Save Action -->
        <div style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 1rem; padding-top: 1rem; border-top: 1px solid var(--border-color);">
          <div class="form-group" style="margin-bottom: 0;">
            <label class="form-label" for="status" style="margin-bottom: 4px;">Footer Section Status</label>
            <select name="status" id="status" class="form-control" style="width: 200px;">
              <option value="active" {{ old('status', $footerSetting->status) === 'active' ? 'selected' : '' }}>Active (Visible)</option>
              <option value="deactive" {{ old('status', $footerSetting->status) === 'deactive' ? 'selected' : '' }}>Deactive (Hidden)</option>
            </select>
          </div>

          <button type="submit" class="btn btn-primary" style="display: inline-flex; align-items: center; gap: 0.5rem; padding: 0.65rem 1.75rem;">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
              <path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"></path>
              <polyline points="17 21 17 13 7 13 7 21"></polyline>
              <polyline points="7 3 7 8 15 8"></polyline>
            </svg>
            <span>Save Footer Settings</span>
          </button>
        </div>

      </div>
    </form>
  </div>

  <script>
    function previewImage(input, previewId) {
      if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = function(e) {
          document.getElementById(previewId).src = e.target.result;
        };
        reader.readAsDataURL(input.files[0]);
      }
    }

    let linkIndex = {{ count($links ?? []) }};
    function addServiceLink() {
      const container = document.getElementById('serviceLinksContainer');
      const row = document.createElement('div');
      row.className = 'service-link-row';
      row.style.cssText = 'display: flex; gap: 0.75rem; align-items: center; background: #ffffff; padding: 8px 12px; border-radius: 6px; border: 1px solid var(--border-color);';
      row.innerHTML = `
        <span style="font-size: 0.85rem; font-weight: 600; color: #888; width: 24px;">${container.children.length + 1}.</span>
        <input type="text" name="services_links[${linkIndex}][title]" value="" class="form-control" placeholder="Service title" style="flex: 2;" required />
        <input type="text" name="services_links[${linkIndex}][url]" value="#" class="form-control" placeholder="Service URL" style="flex: 2;" required />
        <button type="button" class="btn btn-danger btn-sm" onclick="this.closest('.service-link-row').remove()" style="padding: 6px 10px;" title="Delete Link">
          &times;
        </button>
      `;
      container.appendChild(row);
      linkIndex++;
    }
  </script>
@endsection
