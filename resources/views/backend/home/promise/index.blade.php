@extends('backend.layouts.app')
@section('title', 'Home Page Promise')
@section('page_title', 'Home Page Promise Settings')

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('admin.home.promise.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            
            <h5 style="margin-bottom: 1.5rem; font-size: 1.1rem; color: var(--text-main);">Section Header</h5>
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1.5rem; margin-bottom: 2rem;">
                <div>
                    <label class="form-label">Tagline</label>
                    <input type="text" name="tagline" class="form-control" value="{{ $promise->tagline ?? '' }}" placeholder="e.g. OUR PROMISE">
                </div>
                
                <div>
                    <label class="form-label">Title</label>
                    <input type="text" name="title" class="form-control" value="{{ $promise->title ?? '' }}" placeholder="e.g. Since 2014, creating magical wedding...">
                </div>
            </div>

            <hr style="border: 0; border-top: 1px solid var(--border-color); margin: 2rem 0;">
            <h5 style="margin-bottom: 1.5rem; font-size: 1.1rem; color: var(--text-main);">Promise Cards</h5>
            
            <div style="display: grid; grid-template-columns: 1fr; gap: 2rem; margin-bottom: 2rem;">
                @for($i = 1; $i <= 3; $i++)
                <div style="border: 1px solid var(--border-color); padding: 1.5rem; border-radius: 8px; background-color: var(--bg-card-hover, #f8f9fa);">
                    <h6 style="margin-top: 0; margin-bottom: 1.5rem;">Card {{ $i }}</h6>
                    
                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1.5rem; margin-bottom: 1rem;">
                        <div>
                            <label class="form-label">Card Tagline</label>
                            <input type="text" name="card_{{ $i }}_tagline" class="form-control" value="{{ $promise->{'card_'.$i.'_tagline'} ?? '' }}" placeholder="e.g. BESPOKE PLANNING">
                        </div>
                        <div>
                            <label class="form-label">Card Title</label>
                            <input type="text" name="card_{{ $i }}_title" class="form-control" value="{{ $promise->{'card_'.$i.'_title'} ?? '' }}" placeholder="e.g. Bespoke planning">
                        </div>
                    </div>
                    
                    <div style="margin-bottom: 1rem;">
                        <label class="form-label">Description</label>
                        <textarea name="card_{{ $i }}_desc" class="form-control" rows="2">{{ $promise->{'card_'.$i.'_desc'} ?? '' }}</textarea>
                    </div>
                    
                    <div style="display: grid; grid-template-columns: 2fr 1fr; gap: 1rem; align-items: start;">
                        <div>
                            <label class="form-label">Card Image (Optional)</label>
                            <input type="file" name="card_{{ $i }}_image" class="form-control">
                        </div>
                        <div>
                            @if(isset($promise->{'card_'.$i.'_image'}) && $promise->{'card_'.$i.'_image'})
                                <img src="{{ asset($promise->{'card_'.$i.'_image'}) }}" alt="Card Image" style="max-height: 80px; border-radius: 4px;">
                            @else
                                <span style="color: var(--text-muted); font-size: 0.8rem;">No image set</span>
                            @endif
                        </div>
                    </div>
                </div>
                @endfor
            </div>

            <div style="text-align: right; margin-top: 2rem;">
                <button type="submit" class="btn btn-primary" style="padding: 0.6rem 1.5rem;">Save Changes</button>
            </div>
        </form>
    </div>
</div>
@endsection
