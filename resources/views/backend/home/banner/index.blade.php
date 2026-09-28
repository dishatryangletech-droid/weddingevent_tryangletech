@extends('backend.layouts.app')
@section('title', 'Home Page Banner')
@section('page_title', 'Home Page Banner Settings')

@section('content')
    <div class="card">
        <div class="card-body">
            <form id="banner-form" action="{{ route('admin.home.banner.update') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1.5rem; margin-bottom: 2rem;">
                    <div>
                        <label class="form-label">Title</label>
                        <input type="text" name="title" class="form-control" value="{{ $banner->title ?? '' }}">
                    </div>

                    <div>
                        <label class="form-label">Subtitle</label>
                        <input type="text" name="subtitle" class="form-control" value="{{ $banner->subtitle ?? '' }}">
                    </div>

                    <div>
                        <label class="form-label">Button Text</label>
                        <input type="text" name="button_text" class="form-control" value="{{ $banner->button_text ?? '' }}">
                    </div>

                    <div>
                        <label class="form-label">Button Link</label>
                        <input type="text" name="button_link" class="form-control" value="{{ $banner->button_link ?? '' }}">
                    </div>
                </div>

                <hr style="border: 0; border-top: 1px solid var(--border-color); margin: 2rem 0;">
                <h5 style="margin-bottom: 1.5rem; font-size: 1.1rem; color: var(--text-main);">Background Image</h5>

                <div
                    style="display: grid; grid-template-columns: 2fr 1fr; gap: 1.5rem; margin-bottom: 2rem; align-items: start;">
                    <div>
                        <label class="form-label">Main Background Image</label>
                        <input type="file" name="background_image" class="form-control">
                    </div>
                    <div>
                        @if(isset($banner->background_image) && $banner->background_image)
                            <img src="{{ asset($banner->background_image) }}" alt="Background"
                                style="max-height: 100px; border-radius: 8px; border: 1px solid var(--border-color);">
                        @else
                            <span style="color: var(--text-muted); font-size: 0.9rem;">No background image set</span>
                        @endif
                    </div>
                </div>

                <hr style="border: 0; border-top: 1px solid var(--border-color); margin: 2rem 0;">
                <h5 style="margin-bottom: 1.5rem; font-size: 1.1rem; color: var(--text-main);">Mini Video Box Settings</h5>

                <div style="margin-bottom: 1.5rem;">
                    <label class="form-label">Video Box Text</label>
                    <textarea name="video_text" class="form-control" rows="3">{{ $banner->video_text ?? '' }}</textarea>
                </div>

                <div
                    style="display: grid; grid-template-columns: 2fr 1fr; gap: 1.5rem; margin-bottom: 1.5rem; align-items: start;">
                    <div>
                        <label class="form-label">Video Poster Image</label>
                        <input type="file" name="video_poster" class="form-control">
                    </div>
                    <div>
                        @if(isset($banner->video_poster) && $banner->video_poster)
                            <img src="{{ asset($banner->video_poster) }}" alt="Poster"
                                style="max-height: 80px; border-radius: 8px; border: 1px solid var(--border-color);">
                        @else
                            <span style="color: var(--text-muted); font-size: 0.9rem;">No poster set</span>
                        @endif
                    </div>
                </div>

                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1.5rem; margin-bottom: 2rem;">
                    <div>
                        <label class="form-label">Video File (MP4)</label>
                        <input type="file" name="video_mp4" class="form-control">
                        @if(isset($banner->video_mp4) && $banner->video_mp4)
                            <small style="color: var(--success); display: block; margin-top: 0.5rem;">Current MP4 is set</small>
                        @endif
                    </div>

                    <div>
                        <label class="form-label">Video File (WebM)</label>
                        <input type="file" name="video_webm" class="form-control">
                        @if(isset($banner->video_webm) && $banner->video_webm)
                            <small style="color: var(--success); display: block; margin-top: 0.5rem;">Current WebM is
                                set</small>
                        @endif
                    </div>
                </div>

                <hr style="border: 0; border-top: 1px solid var(--border-color); margin: 2rem 0;">
                <h5 style="margin-bottom: 1.5rem; font-size: 1.1rem; color: var(--text-main);">Banner Feature Cards (Bottom
                    4 Blocks)</h5>

                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 2rem; margin-bottom: 2rem;">
                    @for($i = 1; $i <= 4; $i++)
                        <div
                            style="border: 1px solid var(--border-color); padding: 1.5rem; border-radius: 8px; background-color: var(--bg-card-hover, #f8f9fa);">
                            <h6 style="margin-top: 0; margin-bottom: 1rem;">Feature Card {{ $i }}</h6>

                            <div style="margin-bottom: 1rem;">
                                <label class="form-label">Title</label>
                                <input type="text" name="feature_{{ $i }}_title" class="form-control"
                                    value="{{ $banner->{'feature_' . $i . '_title'} ?? '' }}">
                            </div>

                            <div style="margin-bottom: 1rem;">
                                <label class="form-label">Description</label>
                                <textarea name="feature_{{ $i }}_desc" class="form-control"
                                    rows="2">{{ $banner->{'feature_' . $i . '_desc'} ?? '' }}</textarea>
                            </div>

                            <div style="display: grid; grid-template-columns: 2fr 1fr; gap: 1rem; align-items: start;">
                                <div>
                                    <label class="form-label">Icon (Image/SVG)</label>
                                    <input type="file" name="feature_{{ $i }}_icon" class="form-control">
                                </div>
                                <div>
                                    @if(isset($banner->{'feature_' . $i . '_icon'}) && $banner->{'feature_' . $i . '_icon'})
                                        <img src="{{ asset($banner->{'feature_' . $i . '_icon'}) }}" alt="Icon"
                                            style="max-height: 40px; border-radius: 4px;">
                                    @else
                                        <span style="color: var(--text-muted); font-size: 0.8rem;">No icon set</span>
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
        <button type="submit" form="banner-form" class="btn btn-primary" style="padding: 0.75rem 2.5rem; font-size: 1rem;">
            Save All Content
        </button>
    </div>
@endsection