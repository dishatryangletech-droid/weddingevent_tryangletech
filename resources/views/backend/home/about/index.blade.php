@extends('backend.layouts.app')
@section('title', 'Home Page About')
@section('page_title', 'Home Page About Settings')

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('admin.home.about.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            
            <h5 style="margin-bottom: 1.5rem; font-size: 1.1rem; color: var(--text-main);">Text Content</h5>
            <div style="display: grid; grid-template-columns: 1fr; gap: 1.5rem; margin-bottom: 2rem;">
                <div>
                    <label class="form-label">Tagline</label>
                    <input type="text" name="tagline" class="form-control" value="{{ $about->tagline ?? '' }}" placeholder="e.g. ABOUT">
                </div>
                
                <div>
                    <label class="form-label">Title</label>
                    <input type="text" name="title" class="form-control" value="{{ $about->title ?? '' }}" placeholder="e.g. Turning moments into memories">
                </div>

                <div>
                    <label class="form-label">Description</label>
                    <textarea name="description" class="form-control" rows="4">{{ $about->description ?? '' }}</textarea>
                </div>
            </div>

            <hr style="border: 0; border-top: 1px solid var(--border-color); margin: 2rem 0;">
            <h5 style="margin-bottom: 1.5rem; font-size: 1.1rem; color: var(--text-main);">Services List</h5>
            <div style="display: grid; grid-template-columns: 1fr 1fr 1fr; gap: 1.5rem; margin-bottom: 2rem;">
                <div>
                    <label class="form-label">Service 1</label>
                    <input type="text" name="service_1" class="form-control" value="{{ $about->service_1 ?? '' }}">
                </div>
                <div>
                    <label class="form-label">Service 2</label>
                    <input type="text" name="service_2" class="form-control" value="{{ $about->service_2 ?? '' }}">
                </div>
                <div>
                    <label class="form-label">Service 3</label>
                    <input type="text" name="service_3" class="form-control" value="{{ $about->service_3 ?? '' }}">
                </div>
            </div>

            <hr style="border: 0; border-top: 1px solid var(--border-color); margin: 2rem 0;">
            <h5 style="margin-bottom: 1.5rem; font-size: 1.1rem; color: var(--text-main);">Statistics Block</h5>
            <div style="display: grid; grid-template-columns: 1fr 1fr 2fr; gap: 1.5rem; margin-bottom: 2rem;">
                <div>
                    <label class="form-label">Number</label>
                    <input type="number" name="stat_number" class="form-control" value="{{ $about->stat_number ?? '' }}" placeholder="98">
                </div>
                <div>
                    <label class="form-label">Symbol</label>
                    <input type="text" name="stat_symbol" class="form-control" value="{{ $about->stat_symbol ?? '' }}" placeholder="%">
                </div>
                <div>
                    <label class="form-label">Text</label>
                    <input type="text" name="stat_text" class="form-control" value="{{ $about->stat_text ?? '' }}" placeholder="Average client growth rate">
                </div>
            </div>
            
            <hr style="border: 0; border-top: 1px solid var(--border-color); margin: 2rem 0;">
            <h5 style="margin-bottom: 1.5rem; font-size: 1.1rem; color: var(--text-main);">Images</h5>
            
            <div style="display: grid; grid-template-columns: 2fr 1fr; gap: 1.5rem; margin-bottom: 1.5rem; align-items: start;">
                <div>
                    <label class="form-label">Left Image (Large)</label>
                    <input type="file" name="image_left" class="form-control">
                </div>
                <div>
                    @if(isset($about->image_left) && $about->image_left)
                        <img src="{{ asset($about->image_left) }}" alt="Left Image" style="max-height: 100px; border-radius: 8px; border: 1px solid var(--border-color);">
                    @else
                        <span style="color: var(--text-muted); font-size: 0.9rem;">No image set</span>
                    @endif
                </div>
            </div>

            <div style="display: grid; grid-template-columns: 2fr 1fr; gap: 1.5rem; margin-bottom: 2rem; align-items: start;">
                <div>
                    <label class="form-label">Right Image (Small)</label>
                    <input type="file" name="image_right" class="form-control">
                </div>
                <div>
                    @if(isset($about->image_right) && $about->image_right)
                        <img src="{{ asset($about->image_right) }}" alt="Right Image" style="max-height: 100px; border-radius: 8px; border: 1px solid var(--border-color);">
                    @else
                        <span style="color: var(--text-muted); font-size: 0.9rem;">No image set</span>
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
