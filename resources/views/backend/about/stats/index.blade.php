@extends('backend.layouts.app')
@section('title', 'About Us - Statistics Section')
@section('page_title', 'About Us - Statistics Settings')

@section('content')
<!-- Stats Section Header -->
<div class="card" style="margin-bottom: 2rem;">
    <div class="card-body">
        <h5 style="margin-bottom: 1.5rem; font-size: 1.1rem; color: var(--text-main);">Section Background Media</h5>
        <form id="stats-header-form" action="{{ route('admin.about.stats.header.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            
            <div style="display: grid; grid-template-columns: 2fr 1fr; gap: 1.5rem; align-items: start;">
                <div>
                    <label class="form-label">Background Image</label>
                    <input type="file" name="background_image" class="form-control">
                </div>
                <div>
                    @if(isset($statHeader->background_image) && $statHeader->background_image)
                        <img src="{{ asset($statHeader->background_image) }}" alt="Background" style="max-height: 80px; border-radius: 8px; border: 1px solid var(--border-color);">
                    @endif
                </div>
            </div>
        </form>
    </div>
</div>

<!-- Add New Counter / Stat Item -->
<div class="card" style="margin-bottom: 2rem;">
    <div class="card-body">
        <h5 style="margin-bottom: 1.5rem; font-size: 1.1rem; color: var(--text-main);">Add New Statistic / Counter Item</h5>
        <form action="{{ route('admin.about.stats.item.store') }}" method="POST">
            @csrf
            <div style="display: grid; grid-template-columns: 1fr 2fr; gap: 1.5rem; margin-bottom: 1.5rem;">
                <div>
                    <label class="form-label">Item Number Code</label>
                    <input type="text" name="item_number" class="form-control" placeholder="e.g. 01, 02, 03, 04">
                </div>
                <div>
                    <label class="form-label">Number / Title</label>
                    <input type="text" name="number_title" class="form-control" required placeholder="e.g. Since 2014 or 120+ weddings or 4.9★ rating">
                </div>
            </div>
            <div style="margin-bottom: 1.5rem;">
                <label class="form-label">Description</label>
                <textarea name="description" class="form-control" rows="2" required placeholder="Couples routinely praise our team for providing flawless coordination..."></textarea>
            </div>
            <div style="text-align: right;">
                <button type="submit" class="btn btn-success">Add Stat Item</button>
            </div>
        </form>
    </div>
</div>

<!-- Manage Stat Items -->
<div class="card">
    <div class="card-body">
        <h5 style="margin-bottom: 1.5rem; font-size: 1.1rem; color: var(--text-main);">Manage Statistic Items (Drag & Drop to Reorder)</h5>
        
        <ul id="stats-sortable-list" style="list-style: none; padding: 0; margin: 0;">
            @foreach($statItems as $item)
            <li data-id="{{ $item->id }}" style="display: flex; align-items: center; justify-content: space-between; padding: 1rem; margin-bottom: 1rem; border: 1px solid var(--border-color); border-radius: 8px; background: #fff; cursor: grab;">
                <div style="display: flex; align-items: center; gap: 1rem;">
                    <span style="font-size: 1.2rem; color: #999;">☰</span>
                    <span style="font-weight: 700; color: var(--text-muted); font-size: 0.9rem;">{{ $item->item_number }}</span>
                    <div>
                        <strong>{{ $item->number_title }}</strong>
                        <div style="font-size: 0.85rem; color: var(--text-muted); margin-top: 0.25rem;">{{ Str::limit($item->description, 80) }}</div>
                    </div>
                </div>
                <form action="{{ route('admin.about.stats.item.delete', $item->id) }}" method="POST">
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
        
        @if($statItems->isEmpty())
            <p style="color: var(--text-muted);">No stat items added yet.</p>
        @endif
    </div>
</div>

<div style="text-align: right; margin-top: 2rem; margin-bottom: 2rem;">
    <button type="submit" form="stats-header-form" class="btn btn-primary" style="padding: 0.75rem 2.5rem; font-size: 1rem;">
        Save All Content
    </button>
</div>

<script src="https://cdn.jsdelivr.net/npm/sortablejs@latest/Sortable.min.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        var el = document.getElementById('stats-sortable-list');
        if(el) {
            Sortable.create(el, {
                animation: 150,
                onEnd: function (evt) {
                    var order = [];
                    el.querySelectorAll('li').forEach(function(li) {
                        order.push(li.getAttribute('data-id'));
                    });
                    
                    fetch('{{ route('admin.about.stats.reorder') }}', {
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
