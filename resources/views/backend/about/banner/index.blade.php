@extends('backend.layouts.app')
@section('title', 'About Us - Banner Section')
@section('page_title', 'About Us - Banner Settings')

@section('content')
<div class="card">
    <div class="card-body">
        <form id="about-banner-form" action="{{ route('admin.about.banner.update') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <h5 style="margin-bottom: 1.5rem; font-size: 1.1rem; color: var(--text-main);">Banner Header Settings</h5>
            
            <!-- Row 1: Tagline & Title (2 per row) -->
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1.5rem; margin-bottom: 1.5rem;">
                <div>
                    <label class="form-label">Tagline</label>
                    <input type="text" name="tagline" class="form-control" value="{{ $banner->tagline ?? '' }}" placeholder="LUXURY CELEBRATIONS | SCENIC LOVE STORIES">
                </div>
                <div>
                    <label class="form-label">Title</label>
                    <input type="text" name="title" class="form-control" value="{{ $banner->title ?? '' }}" placeholder="Artfully directed wedding experiences">
                </div>
            </div>

            <!-- Row 2: Button Text & Button Link (2 per row) -->
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1.5rem; margin-bottom: 1.5rem;">
                <div>
                    <label class="form-label">Button Text</label>
                    <input type="text" name="button_text" class="form-control" value="{{ $banner->button_text ?? '' }}" placeholder="Let's plan">
                </div>
                <div>
                    <label class="form-label">Button Link</label>
                    <input type="text" name="button_link" class="form-control" value="{{ $banner->button_link ?? '' }}" placeholder="#">
                </div>
            </div>

            <!-- Row 3: Subtitle / Description -->
            <div style="margin-bottom: 1.5rem;">
                <label class="form-label">Subtitle / Description</label>
                <textarea name="subtitle" class="form-control" rows="3" placeholder="A walkthrough of how we translate your personal love story...">{{ $banner->subtitle ?? '' }}</textarea>
            </div>

            <hr style="border: 0; border-top: 1px solid var(--border-color); margin: 2rem 0;">
            <h5 style="margin-bottom: 1.5rem; font-size: 1.1rem; color: var(--text-main);">Banner 5 Tag Badges / Points (2 per row)</h5>

            <!-- Tag Points 1 & 2 -->
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1.5rem; margin-bottom: 1.5rem;">
                <div>
                    <label class="form-label">Tag Badge 1</label>
                    <input type="text" name="tag_1" class="form-control" value="{{ $banner->tag_1 ?? 'Bespoke' }}" placeholder="e.g. Bespoke">
                </div>
                <div>
                    <label class="form-label">Tag Badge 2</label>
                    <input type="text" name="tag_2" class="form-control" value="{{ $banner->tag_2 ?? 'Artistry' }}" placeholder="e.g. Artistry">
                </div>
            </div>

            <!-- Tag Points 3 & 4 -->
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1.5rem; margin-bottom: 1.5rem;">
                <div>
                    <label class="form-label">Tag Badge 3</label>
                    <input type="text" name="tag_3" class="form-control" value="{{ $banner->tag_3 ?? 'Modern' }}" placeholder="e.g. Modern">
                </div>
                <div>
                    <label class="form-label">Tag Badge 4</label>
                    <input type="text" name="tag_4" class="form-control" value="{{ $banner->tag_4 ?? 'Design' }}" placeholder="e.g. Design">
                </div>
            </div>

            <!-- Tag Point 5 -->
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1.5rem; margin-bottom: 1.5rem;">
                <div>
                    <label class="form-label">Tag Badge 5</label>
                    <input type="text" name="tag_5" class="form-control" value="{{ $banner->tag_5 ?? 'Elegant' }}" placeholder="e.g. Elegant">
                </div>
                <div></div>
            </div>

            <hr style="border: 0; border-top: 1px solid var(--border-color); margin: 2rem 0;">
            <h5 style="margin-bottom: 1.5rem; font-size: 1.1rem; color: var(--text-main);">Media & Floating Card (2 per row)</h5>

            <!-- Background Image & Floating Card Image (2 per row) -->
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1.5rem; margin-bottom: 1.5rem;">
                <div style="border: 1px solid var(--border-color); padding: 1.25rem; border-radius: 8px; background: #fafafa;">
                    <label class="form-label">Background Image</label>
                    <input type="file" name="background_image" class="form-control" style="margin-bottom: 0.75rem;">
                    @if(isset($banner->background_image) && $banner->background_image)
                        <div style="display: flex; align-items: center; gap: 1rem;">
                            <img src="{{ asset($banner->background_image) }}" alt="Background" style="max-height: 70px; border-radius: 6px; border: 1px solid var(--border-color);">
                            <small style="color: var(--text-muted);">Current Background Image</small>
                        </div>
                    @else
                        <small style="color: var(--text-muted);">No background image set</small>
                    @endif
                </div>

                <div style="border: 1px solid var(--border-color); padding: 1.25rem; border-radius: 8px; background: #fafafa;">
                    <label class="form-label">Floating Card Image</label>
                    <input type="file" name="card_image" class="form-control" style="margin-bottom: 0.75rem;">
                    @if(isset($banner->card_image) && $banner->card_image)
                        <div style="display: flex; align-items: center; gap: 1rem;">
                            <img src="{{ asset($banner->card_image) }}" alt="Card Image" style="max-height: 70px; border-radius: 6px; border: 1px solid var(--border-color);">
                            <small style="color: var(--text-muted);">Current Card Image</small>
                        </div>
                    @else
                        <small style="color: var(--text-muted);">No card image set</small>
                    @endif
                </div>
            </div>

            <!-- Floating Card Text -->
            <div style="margin-bottom: 1rem;">
                <label class="form-label">Floating Card Text</label>
                <textarea name="card_text" class="form-control" rows="2" placeholder="We craft wedding experiences that bring your love story to life.">{{ $banner->card_text ?? '' }}</textarea>
            </div>
        </form>
    </div>
</div>

<div style="text-align: right; margin-top: 2rem; margin-bottom: 2rem;">
    <button type="submit" form="about-banner-form" class="btn btn-primary" style="padding: 0.75rem 2.5rem; font-size: 1rem;">
        Save All Content
    </button>
</div>
@endsection
