@extends('backend.layouts.app')
@section('title', 'Home Page Recognitions')
@section('page_title', 'Home Page Recognitions Settings')

@section('content')
<div class="card" style="margin-bottom: 2rem;">
    <div class="card-body">
        <h5 style="margin-bottom: 1.5rem; font-size: 1.1rem; color: var(--text-main);">Section Header & Video Settings</h5>
        <form id="section-header-form" action="{{ route('admin.home.recognitions.section.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1.5rem; margin-bottom: 1.5rem;">
                <div>
                    <label class="form-label">Section Tagline</label>
                    <input type="text" name="tagline" class="form-control" value="{{ $section->tagline ?? 'Recognitions' }}" placeholder="e.g. RECOGNITIONS">
                </div>
                <div>
                    <label class="form-label">Section Title</label>
                    <input type="text" name="title" class="form-control" value="{{ $section->title ?? 'Capturing beautiful moments that last forever' }}" placeholder="e.g. Capturing beautiful moments...">
                </div>
            </div>

            <hr style="border: 0; border-top: 1px solid var(--border-color); margin: 2rem 0;">
            <h5 style="margin-bottom: 1.5rem; font-size: 1.1rem; color: var(--text-main);">Recognition Box Video / Poster</h5>

            <div style="display: grid; grid-template-columns: 2fr 1fr; gap: 1.5rem; margin-bottom: 1.5rem; align-items: start;">
                <div>
                    <label class="form-label">Video Poster Image</label>
                    <input type="file" name="video_poster" class="form-control">
                </div>
                <div>
                    @if(isset($section->video_poster) && $section->video_poster)
                        <img src="{{ asset($section->video_poster) }}" alt="Poster" style="max-height: 80px; border-radius: 8px; border: 1px solid var(--border-color);">
                    @else
                        <span style="color: var(--text-muted); font-size: 0.9rem;">No poster set</span>
                    @endif
                </div>
            </div>

            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1.5rem; margin-bottom: 1rem;">
                <div>
                    <label class="form-label">Video File (MP4)</label>
                    <input type="file" name="video_mp4" class="form-control">
                    @if(isset($section->video_mp4) && $section->video_mp4)
                        <small style="color: var(--success); display: block; margin-top: 0.5rem;">Current MP4 is set</small>
                    @endif
                </div>
                
                <div>
                    <label class="form-label">Video File (WebM)</label>
                    <input type="file" name="video_webm" class="form-control">
                    @if(isset($section->video_webm) && $section->video_webm)
                        <small style="color: var(--success); display: block; margin-top: 0.5rem;">Current WebM is set</small>
                    @endif
                </div>
            </div>
        </form>
    </div>
</div>

<div class="card" style="margin-bottom: 2rem;">
    <div class="card-body">
        <h5 style="margin-bottom: 1.5rem; font-size: 1.1rem; color: var(--text-main);">Add New Recognition (Award / Year)</h5>
        <form action="{{ route('admin.home.recognitions.item.store') }}" method="POST">
            @csrf
            <div style="display: grid; grid-template-columns: 2fr 1fr; gap: 1.5rem; margin-bottom: 1.5rem; align-items: end;">
                <div>
                    <label class="form-label">Award Title</label>
                    <input type="text" name="title" class="form-control" required placeholder="e.g. Elegant floral curation awards">
                </div>
                <div>
                    <label class="form-label">Year</label>
                    <input type="text" name="year" class="form-control" required placeholder="e.g. 2026">
                </div>
            </div>
            <div style="text-align: right;">
                <button type="submit" class="btn btn-success">Add Item</button>
            </div>
        </form>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <h5 style="margin-bottom: 1.5rem; font-size: 1.1rem; color: var(--text-main);">Manage Recognition Items (Drag & Drop to Reorder)</h5>
        
        <ul id="sortable-list" style="list-style: none; padding: 0; margin: 0;">
            @foreach($items as $item)
            <li data-id="{{ $item->id }}" style="display: flex; align-items: center; justify-content: space-between; padding: 1rem; margin-bottom: 1rem; border: 1px solid var(--border-color); border-radius: 8px; background: #fff; cursor: grab;">
                <div style="display: flex; align-items: center; gap: 1rem;">
                    <span style="font-size: 1.2rem; color: #999;">☰</span>
                    <div>
                        <strong>{{ $item->title }}</strong>
                        <div style="font-size: 0.85rem; color: var(--text-muted); margin-top: 0.25rem;">Year: {{ $item->year }}</div>
                    </div>
                </div>
                <form action="{{ route('admin.home.recognitions.item.delete', $item->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" style="background: none; border: none; color: #dc3545; cursor: pointer; padding: 0.5rem; display: flex; align-items: center; justify-content: center; transition: opacity 0.2s;" title="Remove" onmouseover="this.style.opacity='0.7'" onmouseout="this.style.opacity='1'">
                        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <line x1="18" y1="6" x2="6" y2="18"></line>
                            <line x1="6" y1="6" x2="18" y2="18"></line>
                        </svg>
                    </button>
                </form>
            </li>
            @endforeach
        </ul>
        
        @if($items->isEmpty())
            <p style="color: var(--text-muted);">No recognitions added yet.</p>
        @endif
    </div>
</div>

<div style="text-align: right; margin-top: 2rem; margin-bottom: 2rem;">
    <button type="submit" form="section-header-form" class="btn btn-primary" style="padding: 0.75rem 2.5rem; font-size: 1rem;">
        Save All Content
    </button>
</div>

<script src="https://cdn.jsdelivr.net/npm/sortablejs@latest/Sortable.min.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        var el = document.getElementById('sortable-list');
        if(el) {
            Sortable.create(el, {
                animation: 150,
                onEnd: function (evt) {
                    var order = [];
                    el.querySelectorAll('li').forEach(function(li) {
                        order.push(li.getAttribute('data-id'));
                    });
                    
                    fetch('{{ route('admin.home.recognitions.reorder') }}', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: JSON.stringify({ order: order })
                    });
                }
            });
        }
    });
</script>
@endsection
