@extends('backend.layouts.app')
@section('title', 'Home Page Services')
@section('page_title', 'Home Page Services Settings')

@section('content')
<div class="card" style="margin-bottom: 2rem;">
    <div class="card-body">
        <h5 style="margin-bottom: 1.5rem; font-size: 1.1rem; color: var(--text-main);">Section Header Settings</h5>
        <form id="section-header-form" action="{{ route('admin.home.services.section.update') }}" method="POST">
            @csrf
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1.5rem;">
                <div>
                    <label class="form-label">Tagline</label>
                    <input type="text" name="tagline" class="form-control" value="{{ $section->tagline ?? '' }}" placeholder="e.g. SERVICES">
                </div>
                <div>
                    <label class="form-label">Title</label>
                    <input type="text" name="title" class="form-control" value="{{ $section->title ?? '' }}" placeholder="e.g. Since 2014, creating magical wedding...">
                </div>
                <div>
                    <label class="form-label">Button Text</label>
                    <input type="text" name="button_text" class="form-control" value="{{ $section->button_text ?? '' }}" placeholder="e.g. Explore services">
                </div>
                <div>
                    <label class="form-label">Button Link</label>
                    <input type="text" name="button_link" class="form-control" value="{{ $section->button_link ?? '' }}" placeholder="e.g. /services">
                </div>
            </div>
        </form>
    </div>
</div>

<div class="card" style="margin-bottom: 2rem;">
    <div class="card-body">
        <h5 style="margin-bottom: 1.5rem; font-size: 1.1rem; color: var(--text-main);">Add New Service Card</h5>
        <form action="{{ route('admin.home.services.card.store') }}" method="POST">
            @csrf
            <div>
                <label class="form-label">Select Service from Master (Auto-saves)</label>
                <select id="service-select" name="service_master_id" required>
                    <option value="">-- Choose a Service to Add --</option>
                    @foreach($masterServices as $master)
                        @if(in_array($master->title, $addedTitles))
                            <option value="{{ $master->id }}" disabled>{{ $master->title }} (Already Added)</option>
                        @else
                            <option value="{{ $master->id }}">{{ $master->title }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
        </form>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <h5 style="margin-bottom: 1.5rem; font-size: 1.1rem; color: var(--text-main);">Manage Service Cards (Drag & Drop to Reorder)</h5>
        
        <ul id="sortable-list" style="list-style: none; padding: 0; margin: 0;">
            @foreach($cards as $card)
            <li data-id="{{ $card->id }}" style="display: flex; align-items: center; justify-content: space-between; padding: 1rem; margin-bottom: 1rem; border: 1px solid var(--border-color); border-radius: 8px; background: #fff; cursor: grab;">
                <div style="display: flex; align-items: center; gap: 1rem;">
                    <span style="font-size: 1.2rem; color: #999;">☰</span>
                    @if($card->image)
                        <img src="{{ asset($card->image) }}" style="width: 50px; height: 50px; object-fit: cover; border-radius: 4px;">
                    @else
                        <div style="width: 50px; height: 50px; background: #eee; border-radius: 4px;"></div>
                    @endif
                    <div>
                        <strong>{{ $card->title }}</strong>
                        <div style="font-size: 0.85rem; color: var(--text-muted);">{{ Str::limit($card->description, 50) }}</div>
                    </div>
                </div>
                <form action="{{ route('admin.home.services.card.delete', $card->id) }}" method="POST">
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
        
        @if($cards->isEmpty())
            <p style="color: var(--text-muted);">No cards added yet.</p>
        @endif
    </div>
</div>

<div style="text-align: right; margin-bottom: 2rem;">
    <button type="submit" form="section-header-form" class="btn btn-primary" style="padding: 0.75rem 2.5rem; font-size: 1rem;">
        Save All Content
    </button>
</div>

<link href="https://cdn.jsdelivr.net/npm/tom-select@2.2.2/dist/css/tom-select.bootstrap5.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/tom-select@2.2.2/dist/js/tom-select.complete.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sortablejs@latest/Sortable.min.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Initialize Tom Select for dropdown with search
        var selectEl = document.getElementById('service-select');
        if(selectEl) {
            new TomSelect(selectEl, {
                create: false,
                sortField: {
                    field: "text",
                    direction: "asc"
                },
                placeholder: "-- Choose a Service to Add --",
                onChange: function(value) {
                    if (value) {
                        selectEl.form.submit();
                    }
                }
            });
        }

        // Initialize Sortable
        var el = document.getElementById('sortable-list');
        if(el) {
            Sortable.create(el, {
                animation: 150,
                onEnd: function (evt) {
                    var order = [];
                    el.querySelectorAll('li').forEach(function(li) {
                        order.push(li.getAttribute('data-id'));
                    });
                    
                    fetch('{{ route('admin.home.services.reorder') }}', {
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
