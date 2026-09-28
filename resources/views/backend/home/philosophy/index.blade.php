@extends('backend.layouts.app')
@section('title', 'Home Page Philosophy')
@section('page_title', 'Home Page Philosophy Settings')

@section('content')
<div class="card" style="margin-bottom: 2rem;">
    <div class="card-body">
        <h5 style="margin-bottom: 1.5rem; font-size: 1.1rem; color: var(--text-main);">Section Header Settings</h5>
        <form id="section-header-form" action="{{ route('admin.home.philosophy.section.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1.5rem; margin-bottom: 1.5rem;">
                <div>
                    <label class="form-label">Tagline</label>
                    <input type="text" name="tagline" class="form-control" value="{{ $section->tagline ?? '' }}" placeholder="e.g. OUR PHILOSOPHY">
                </div>
                <div>
                    <label class="form-label">Title</label>
                    <input type="text" name="title" class="form-control" value="{{ $section->title ?? '' }}" placeholder="e.g. The moments that inspire...">
                </div>
                <div>
                    <label class="form-label">Main Image</label>
                    <input type="file" name="image" class="form-control">
                    @if(isset($section->image) && $section->image)
                        <img src="{{ asset($section->image) }}" alt="Image" style="max-height: 80px; margin-top: 0.5rem; border-radius: 4px;">
                    @endif
                </div>
            </div>

            <hr style="border: 0; border-top: 1px solid var(--border-color); margin: 2rem 0;">
            <h5 style="margin-bottom: 1.5rem; font-size: 1.1rem; color: var(--text-main);">Review Box Setup</h5>
            <div style="display: grid; grid-template-columns: 1fr 1fr 1fr; gap: 1.5rem;">
                <div>
                    <label class="form-label">Review Stars (1-5)</label>
                    <input type="number" name="review_stars" min="1" max="5" class="form-control" value="{{ $section->review_stars ?? 5 }}">
                </div>
                <div style="grid-column: span 2;">
                    <label class="form-label">Review Text</label>
                    <textarea name="review_text" class="form-control" rows="2">{{ $section->review_text ?? '' }}</textarea>
                </div>
                <div>
                    <label class="form-label">Author Name</label>
                    <input type="text" name="review_author" class="form-control" value="{{ $section->review_author ?? '' }}">
                </div>
                <div>
                    <label class="form-label">Author Subtitle</label>
                    <input type="text" name="review_author_subtitle" class="form-control" value="{{ $section->review_author_subtitle ?? '' }}">
                </div>
                <div>
                    <label class="form-label">Author Image</label>
                    <input type="file" name="review_author_image" class="form-control">
                    @if(isset($section->review_author_image) && $section->review_author_image)
                        <img src="{{ asset($section->review_author_image) }}" alt="Author" style="max-height: 40px; margin-top: 0.5rem; border-radius: 50%;">
                    @endif
                </div>
            </div>
        </form>
    </div>
</div>

<div class="card" style="margin-bottom: 2rem;">
    <div class="card-body">
        <h5 style="margin-bottom: 1.5rem; font-size: 1.1rem; color: var(--text-main);">Add New List Item (Q&A)</h5>
        <form action="{{ route('admin.home.philosophy.item.store') }}" method="POST">
            @csrf
            <div style="display: grid; grid-template-columns: 1fr; gap: 1.5rem; margin-bottom: 1.5rem;">
                <div>
                    <label class="form-label">Item Title (Question)</label>
                    <input type="text" name="title" class="form-control" required placeholder="e.g. Crafted with passion...">
                </div>
                <div>
                    <label class="form-label">Item Description (Answer)</label>
                    <textarea name="description" class="form-control" rows="2" required placeholder="e.g. Every wedding is more than aesthetics..."></textarea>
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
        <h5 style="margin-bottom: 1.5rem; font-size: 1.1rem; color: var(--text-main);">Manage List Items (Drag & Drop to Reorder)</h5>
        
        <ul id="sortable-list" style="list-style: none; padding: 0; margin: 0;">
            @foreach($items as $item)
            <li data-id="{{ $item->id }}" style="display: flex; align-items: center; justify-content: space-between; padding: 1rem; margin-bottom: 1rem; border: 1px solid var(--border-color); border-radius: 8px; background: #fff; cursor: grab;">
                <div style="display: flex; align-items: center; gap: 1rem;">
                    <span style="font-size: 1.2rem; color: #999;">☰</span>
                    <div>
                        <strong>{{ $item->title }}</strong>
                        @if($item->description)
                            <div style="font-size: 0.85rem; color: var(--text-muted); margin-top: 0.25rem;">{{ $item->description }}</div>
                        @endif
                    </div>
                </div>
                <form action="{{ route('admin.home.philosophy.item.delete', $item->id) }}" method="POST">
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
            <p style="color: var(--text-muted);">No items added yet.</p>
        @endif
    </div>
</div>

<div style="text-align: right; margin-bottom: 2rem;">
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
                    
                    fetch('{{ route('admin.home.philosophy.reorder') }}', {
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
