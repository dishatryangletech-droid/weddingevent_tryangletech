@extends('backend.layouts.app')
@section('title', 'About Us - Mission Section')
@section('page_title', 'About Us - Mission Section Settings')

@section('content')
<div class="card">
    <div class="card-body">
        <form id="about-mission-form" action="{{ route('admin.about.mission.update') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <h5 style="margin-bottom: 1.5rem; font-size: 1.1rem; color: var(--text-main);">Section Header Settings</h5>
            
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1.5rem; margin-bottom: 1.5rem;">
                <div>
                    <label class="form-label">Tagline</label>
                    <input type="text" name="tagline" class="form-control" value="{{ $mission->tagline ?? '' }}" placeholder="OUR MISSION">
                </div>
                <div>
                    <label class="form-label">Title</label>
                    <input type="text" name="title" class="form-control" value="{{ $mission->title ?? '' }}" placeholder="Dedicated to create graceful wedding experiences">
                </div>
                <div>
                    <label class="form-label">Button Text</label>
                    <input type="text" name="button_text" class="form-control" value="{{ $mission->button_text ?? '' }}" placeholder="Contact us">
                </div>
                <div>
                    <label class="form-label">Button Link</label>
                    <input type="text" name="button_link" class="form-control" value="{{ $mission->button_link ?? '' }}" placeholder="/contact">
                </div>
            </div>

            <div style="margin-bottom: 2rem;">
                <label class="form-label">Description</label>
                <textarea name="description" class="form-control" rows="3">{{ $mission->description ?? '' }}</textarea>
            </div>

            <hr style="border: 0; border-top: 1px solid var(--border-color); margin: 2rem 0;">
            <h5 style="margin-bottom: 1.5rem; font-size: 1.1rem; color: var(--text-main);">Right Side Video / Poster</h5>

            <div style="display: grid; grid-template-columns: 2fr 1fr; gap: 1.5rem; margin-bottom: 1.5rem; align-items: start;">
                <div>
                    <label class="form-label">Video Poster Image</label>
                    <input type="file" name="video_poster" class="form-control">
                </div>
                <div>
                    @if(isset($mission->video_poster) && $mission->video_poster)
                        <img src="{{ asset($mission->video_poster) }}" alt="Poster" style="max-height: 80px; border-radius: 8px; border: 1px solid var(--border-color);">
                    @endif
                </div>
            </div>

            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1.5rem; margin-bottom: 2rem;">
                <div>
                    <label class="form-label">Video File (MP4)</label>
                    <input type="file" name="video_mp4" class="form-control">
                    @if(isset($mission->video_mp4) && $mission->video_mp4)
                        <small style="color: var(--success); display: block; margin-top: 0.5rem;">Current MP4 is set</small>
                    @endif
                </div>
                <div>
                    <label class="form-label">Video File (WebM)</label>
                    <input type="file" name="video_webm" class="form-control">
                    @if(isset($mission->video_webm) && $mission->video_webm)
                        <small style="color: var(--success); display: block; margin-top: 0.5rem;">Current WebM is set</small>
                    @endif
                </div>
            </div>

            <hr style="border: 0; border-top: 1px solid var(--border-color); margin: 2rem 0;">
            <h5 style="margin-bottom: 1.5rem; font-size: 1.1rem; color: var(--text-main);">Bottom 4 Numbered Feature Blocks</h5>

            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 2rem; margin-bottom: 2rem;">
                @for($i = 1; $i <= 4; $i++)
                <div style="border: 1px solid var(--border-color); padding: 1.5rem; border-radius: 8px; background-color: var(--bg-card-hover, #f8f9fa);">
                    <h6 style="margin-top: 0; margin-bottom: 1rem;">Feature 0{{ $i }}</h6>
                    
                    <div style="margin-bottom: 1rem;">
                        <label class="form-label">Title</label>
                        <input type="text" name="feature_{{ $i }}_title" class="form-control" value="{{ $mission->{'feature_'.$i.'_title'} ?? '' }}">
                    </div>
                    
                    <div style="display: grid; grid-template-columns: 2fr 1fr; gap: 1rem; align-items: start;">
                        <div>
                            <label class="form-label">Thumbnail Image</label>
                            <input type="file" name="feature_{{ $i }}_image" class="form-control">
                        </div>
                        <div>
                            @if(isset($mission->{'feature_'.$i.'_image'}) && $mission->{'feature_'.$i.'_image'})
                                <img src="{{ asset($mission->{'feature_'.$i.'_image'}) }}" alt="Thumbnail" style="max-height: 40px; border-radius: 4px;">
                            @else
                                <span style="color: var(--text-muted); font-size: 0.8rem;">No thumbnail set</span>
                            @endif
                        </div>
                    </div>
                </div>
                @endfor
            </div>
        </form>
    </div>
</div>

<div style="text-align: right; margin-top: 2rem; margin-bottom: 2rem;">
    <button type="submit" form="about-mission-form" class="btn btn-primary" style="padding: 0.75rem 2.5rem; font-size: 1rem;">
        Save All Content
    </button>
</div>
@endsection
