@extends('backend.layouts.app')
@section('title', 'About Us - Expertise Section')
@section('page_title', 'About Us - Expertise Settings')

@section('content')
<!-- Header & Left Image Card -->
<div class="card" style="margin-bottom: 2rem;">
    <div class="card-body">
        <h5 style="margin-bottom: 1.5rem; font-size: 1.1rem; color: var(--text-main);">Section Header Settings</h5>
        <form id="expertise-header-form" action="{{ route('admin.about.expertise.header.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1.5rem; margin-bottom: 1.5rem;">
                <div>
                    <label class="form-label">Tagline</label>
                    <input type="text" name="tagline" class="form-control" value="{{ $expertiseHeader->tagline ?? 'OUR EXPERTISE' }}" placeholder="OUR EXPERTISE">
                </div>
                <div>
                    <label class="form-label">Title</label>
                    <input type="text" name="title" class="form-control" value="{{ $expertiseHeader->title ?? 'Bespoke planning services for luxury celebrations' }}" placeholder="Bespoke planning services...">
                </div>
            </div>

            <div style="display: grid; grid-template-columns: 2fr 1fr; gap: 1.5rem; align-items: start;">
                <div>
                    <label class="form-label">Left Main Image</label>
                    <input type="file" name="left_image" class="form-control">
                </div>
                <div>
                    @if(isset($expertiseHeader->left_image) && $expertiseHeader->left_image)
                        <img src="{{ asset($expertiseHeader->left_image) }}" alt="Left Image" style="max-height: 80px; border-radius: 8px; border: 1px solid var(--border-color);">
                    @endif
                </div>
            </div>
        </form>
    </div>
</div>

<!-- Add New Expertise Item -->
<div class="card" style="margin-bottom: 2rem;">
    <div class="card-body">
        <h5 style="margin-bottom: 1.5rem; font-size: 1.1rem; color: var(--text-main);">Add New Expertise Service Item</h5>
        <form action="{{ route('admin.about.expertise.item.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1.5rem; margin-bottom: 1.5rem;">
                <div>
                    <label class="form-label">Service Title</label>
                    <input type="text" name="title" class="form-control" required placeholder="e.g. Destination scouting">
                </div>
                <div>
                    <label class="form-label">Right Thumbnail Image</label>
                    <input type="file" name="image" class="form-control">
                </div>
            </div>
            <div style="margin-bottom: 1.5rem;">
                <label class="form-label">Description</label>
                <textarea name="description" class="form-control" rows="2" placeholder="Finding the perfect, breathtaking backdrop..."></textarea>
            </div>
            <div style="text-align: right;">
                <button type="submit" class="btn btn-success">Add Expertise Item</button>
            </div>
        </form>
    </div>
</div>

<!-- Manage Expertise Items -->
<div class="card">
    <div class="card-body">
        <h5 style="margin-bottom: 1.5rem; font-size: 1.1rem; color: var(--text-main);">Manage Expertise Service Items (Drag & Drop to Reorder)</h5>
        
        <ul id="expertise-sortable-list" style="list-style: none; padding: 0; margin: 0;">
            @foreach($expertiseItems as $item)
            <li data-id="{{ $item->id }}" style="display: flex; align-items: center; justify-content: space-between; padding: 1rem; margin-bottom: 1rem; border: 1px solid var(--border-color); border-radius: 8px; background: #fff; cursor: grab;">
                <div style="display: flex; align-items: center; gap: 1rem;">
                    <span style="font-size: 1.2rem; color: #999;">☰</span>
                    @if($item->image)
                        <img src="{{ asset($item->image) }}" style="width: 50px; height: 50px; object-fit: cover; border-radius: 6px;">
                    @else
                        <div style="width: 50px; height: 50px; background: #eee; border-radius: 6px;"></div>
                    @endif
                    <div>
                        <strong>{{ $item->title }}</strong>
                        <div style="font-size: 0.85rem; color: var(--text-muted); margin-top: 0.25rem;">{{ Str::limit($item->description, 80) }}</div>
                    </div>
                </div>
                <form action="{{ route('admin.about.expertise.item.delete', $item->id) }}" method="POST">
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
        
        @if($expertiseItems->isEmpty())
            <p style="color: var(--text-muted);">No expertise items added yet.</p>
        @endif
    </div>
</div>

<div style="text-align: right; margin-top: 2rem; margin-bottom: 2rem;">
    <button type="submit" form="expertise-header-form" class="btn btn-primary" style="padding: 0.75rem 2.5rem; font-size: 1rem;">
        Save All Content
    </button>
</div>

<script src="https://cdn.jsdelivr.net/npm/sortablejs@latest/Sortable.min.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        var el = document.getElementById('expertise-sortable-list');
        if(el) {
            Sortable.create(el, {
                animation: 150,
                onEnd: function (evt) {
                    var order = [];
                    el.querySelectorAll('li').forEach(function(li) {
                        order.push(li.getAttribute('data-id'));
                    });
                    
                    fetch('{{ route('admin.about.expertise.reorder') }}', {
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
