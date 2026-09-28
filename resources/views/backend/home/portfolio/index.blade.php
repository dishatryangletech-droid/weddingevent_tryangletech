@extends('backend.layouts.app')
@section('title', 'Home Page Portfolio')
@section('page_title', 'Home Page Portfolio Settings')

@section('content')
<div class="card" style="margin-bottom: 2rem;">
    <div class="card-body">
        <h5 style="margin-bottom: 1.5rem; font-size: 1.1rem; color: var(--text-main);">Add Portfolio Card</h5>
        <form action="{{ route('admin.home.portfolio.store') }}" method="POST">
            @csrf
            <div>
                <label class="form-label">Select Portfolio from Master (Auto-saves)</label>
                <select id="portfolio-select" name="portfolio_master_id" required>
                    <option value="">-- Choose a Portfolio to Add --</option>
                    @foreach($masterPortfolios as $master)
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
        <h5 style="margin-bottom: 1.5rem; font-size: 1.1rem; color: var(--text-main);">Manage Portfolio Cards (Drag & Drop to Reorder)</h5>
        
        <ul id="sortable-list" style="list-style: none; padding: 0; margin: 0;">
            @foreach($portfolios as $portfolio)
            <li data-id="{{ $portfolio->id }}" style="display: flex; align-items: center; justify-content: space-between; padding: 1rem; margin-bottom: 1rem; border: 1px solid var(--border-color); border-radius: 8px; background: #fff; cursor: grab;">
                <div style="display: flex; align-items: center; gap: 1rem;">
                    <span style="font-size: 1.2rem; color: #999;">☰</span>
                    @if($portfolio->icon)
                        <img src="{{ asset($portfolio->icon) }}" style="width: 50px; height: 50px; object-fit: cover; border-radius: 4px;">
                    @else
                        <div style="width: 50px; height: 50px; background: #eee; border-radius: 4px;"></div>
                    @endif
                    <div>
                        <strong>{{ $portfolio->title }}</strong>
                        <div style="font-size: 0.85rem; color: var(--text-muted);">{{ Str::limit($portfolio->description, 50) }}</div>
                    </div>
                </div>
                <form action="{{ route('admin.home.portfolio.delete', $portfolio->id) }}" method="POST">
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
        
        @if($portfolios->isEmpty())
            <p style="color: var(--text-muted);">No portfolios added yet.</p>
        @endif
    </div>
</div>

<div style="text-align: right; margin-top: 2rem; margin-bottom: 2rem;">
    <button type="button" class="btn btn-primary" style="padding: 0.75rem 2.5rem; font-size: 1rem;" onclick="location.reload();">
        Save All Content
    </button>
</div>

<link href="https://cdn.jsdelivr.net/npm/tom-select@2.2.2/dist/css/tom-select.bootstrap5.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/tom-select@2.2.2/dist/js/tom-select.complete.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sortablejs@latest/Sortable.min.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        var selectEl = document.getElementById('portfolio-select');
        if(selectEl) {
            new TomSelect(selectEl, {
                create: false,
                sortField: {
                    field: "text",
                    direction: "asc"
                },
                placeholder: "-- Choose a Portfolio to Add --",
                onChange: function(value) {
                    if (value) {
                        selectEl.form.submit();
                    }
                }
            });
        }

        var el = document.getElementById('sortable-list');
        if(el) {
            Sortable.create(el, {
                animation: 150,
                onEnd: function (evt) {
                    var order = [];
                    el.querySelectorAll('li').forEach(function(li) {
                        order.push(li.getAttribute('data-id'));
                    });
                    
                    fetch('{{ route('admin.home.portfolio.reorder') }}', {
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
