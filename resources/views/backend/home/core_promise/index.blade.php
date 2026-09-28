@extends('backend.layouts.app')
@section('title', 'Home Page Core Promise')
@section('page_title', 'Home Page Core Promise Settings')

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('admin.home.core_promise.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            
            <h5 style="margin-bottom: 1.5rem; font-size: 1.1rem; color: var(--text-main);">Section Header</h5>
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1.5rem; margin-bottom: 1.5rem;">
                <div>
                    <label class="form-label">Tagline</label>
                    <input type="text" name="tagline" class="form-control" value="{{ $corePromise->tagline ?? '' }}" placeholder="e.g. OUR CORE PROMISE">
                </div>
                
                <div>
                    <label class="form-label">Title</label>
                    <input type="text" name="title" class="form-control" value="{{ $corePromise->title ?? '' }}" placeholder="e.g. Crafting memorable celebrations...">
                </div>
            </div>
            
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1.5rem; margin-bottom: 2rem;">
                <div>
                    <label class="form-label">Button Text</label>
                    <input type="text" name="button_text" class="form-control" value="{{ $corePromise->button_text ?? '' }}" placeholder="e.g. Discover our story">
                </div>
                
                <div>
                    <label class="form-label">Button Link</label>
                    <input type="text" name="button_link" class="form-control" value="{{ $corePromise->button_link ?? '' }}" placeholder="e.g. /about">
                </div>
            </div>

            <hr style="border: 0; border-top: 1px solid var(--border-color); margin: 2rem 0;">
            <h5 style="margin-bottom: 1.5rem; font-size: 1.1rem; color: var(--text-main);">List Items</h5>
            
            <div style="display: grid; grid-template-columns: 1fr; gap: 2rem; margin-bottom: 2rem;">
                @for($i = 1; $i <= 3; $i++)
                <div style="border: 1px solid var(--border-color); padding: 1.5rem; border-radius: 8px; background-color: var(--bg-card-hover, #f8f9fa);">
                    <h6 style="margin-top: 0; margin-bottom: 1.5rem;">List Item {{ $i }}</h6>
                    
                    <div style="margin-bottom: 1rem;">
                        <label class="form-label">Title</label>
                        <input type="text" name="item_{{ $i }}_title" class="form-control" value="{{ $corePromise->{'item_'.$i.'_title'} ?? '' }}" placeholder="e.g. Tailored celebrations...">
                    </div>
                    
                    <div style="margin-bottom: 1rem;">
                        <label class="form-label">Description</label>
                        <textarea name="item_{{ $i }}_desc" class="form-control" rows="2">{{ $corePromise->{'item_'.$i.'_desc'} ?? '' }}</textarea>
                    </div>
                </div>
                @endfor
            </div>
            
            <hr style="border: 0; border-top: 1px solid var(--border-color); margin: 2rem 0;">
            <h5 style="margin-bottom: 1.5rem; font-size: 1.1rem; color: var(--text-main);">Side Media (Video & Poster)</h5>

            <div style="display: grid; grid-template-columns: 2fr 1fr; gap: 1.5rem; margin-bottom: 2rem; align-items: start;">
                <div>
                    <label class="form-label">Video Poster Image</label>
                    <input type="file" name="image" class="form-control">
                </div>
                <div>
                    @if(isset($corePromise->image) && $corePromise->image)
                        <img src="{{ asset($corePromise->image) }}" alt="Side Image" style="max-height: 100px; border-radius: 8px; border: 1px solid var(--border-color);">
                    @else
                        <span style="color: var(--text-muted); font-size: 0.9rem;">No poster image set</span>
                    @endif
                </div>
            </div>

            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1.5rem; margin-bottom: 2rem;">
                <div>
                    <label class="form-label">Video File (MP4)</label>
                    <input type="file" name="video_mp4" class="form-control">
                    @if(isset($corePromise->video_mp4) && $corePromise->video_mp4)
                        <small style="color: var(--success); display: block; margin-top: 0.5rem;">Current MP4 is set</small>
                    @endif
                </div>
                
                <div>
                    <label class="form-label">Video File (WebM)</label>
                    <input type="file" name="video_webm" class="form-control">
                    @if(isset($corePromise->video_webm) && $corePromise->video_webm)
                        <small style="color: var(--success); display: block; margin-top: 0.5rem;">Current WebM is set</small>
                    @endif
                </div>
            </div>

            <div style="text-align: right; margin-top: 2rem;">
                <button type="submit" class="btn btn-primary" style="padding: 0.6rem 1.5rem;">Save Changes</button>
            </div>
        </form>
    </div>
</div>
@endsection
