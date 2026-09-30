@extends('backend.layouts.app')
@section('title', 'Home Page Portfolio')
@section('page_title', 'Home Page Portfolio Settings')

@section('content')
<!-- Section Header Settings -->
<div class="card" style="margin-bottom: 2rem;">
    <div class="card-body">
        <h5 style="margin-bottom: 1.5rem; font-size: 1.1rem; color: var(--text-main);">Section Header & Button Settings</h5>
        <form id="section-header-form" action="{{ route('admin.home.portfolio.section.update') }}" method="POST">
            @csrf
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1.5rem; margin-bottom: 1.5rem;">
                <div>
                    <label class="form-label">Tagline</label>
                    <input type="text" name="tagline" class="form-control" value="{{ $section->tagline ?? 'PORTFOLIO' }}" placeholder="e.g. PORTFOLIO">
                </div>
                <div>
                    <label class="form-label">Title</label>
                    <input type="text" name="title" class="form-control" value="{{ $section->title ?? 'Event design to make your heart skip a beat' }}" placeholder="e.g. Event design to make your heart skip a beat">
                </div>
                <div>
                    <label class="form-label">Explore Button Text</label>
                    <input type="text" name="button_text" class="form-control" value="{{ $section->button_text ?? 'EXPLORE ENTIRE PORTFOLIO GALLERY →' }}" placeholder="e.g. EXPLORE ENTIRE PORTFOLIO GALLERY →">
                </div>
                <div>
                    <label class="form-label">Explore Button Link</label>
                    <input type="text" name="button_link" class="form-control" value="{{ $section->button_link ?? '/portfolio' }}" placeholder="e.g. /portfolio">
                </div>
            </div>
        </form>
    </div>
</div>

<!-- 1. Banner Portfolios Card -->
<div class="card" style="margin-bottom: 2rem;">
    <div class="card-body">
        <h5 style="margin-bottom: 1.5rem; font-size: 1.1rem; color: var(--text-main);">Banner Section Portfolios (Top 3-4 Hero)</h5>
        
        <form action="{{ route('admin.home.portfolio.banner.store') }}" method="POST" style="margin-bottom: 1.5rem;">
            @csrf
            <div>
                <label class="form-label">Select Banner Portfolio from Master (Auto-saves)</label>
                <select id="banner-portfolio-select" name="portfolio_master_id" required>
                    <option value="">-- Choose a Portfolio for Banner --</option>
                    @foreach($masterPortfolios as $master)
                        @if(in_array($master->title, $bannerAddedTitles))
                            <option value="{{ $master->id }}" disabled>{{ $master->title }} (Already Added)</option>
                        @else
                            <option value="{{ $master->id }}">{{ $master->title }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
        </form>

        <h6 style="margin-bottom: 1rem; font-size: 0.95rem; color: var(--text-main);">Manage Banner Portfolio Cards (Drag & Drop to Reorder)</h6>
        <ul id="banner-sortable-list" style="list-style: none; padding: 0; margin: 0;">
            @foreach($bannerPortfolios as $portfolio)
            <li data-id="{{ $portfolio->id }}" style="display: flex; align-items: center; justify-content: space-between; padding: 1rem; margin-bottom: 1rem; border: 1px solid var(--border-color); border-radius: 8px; background: #fff; cursor: grab;">
                <div style="display: flex; align-items: center; gap: 1rem;">
                    <span style="font-size: 1.2rem; color: #999;">☰</span>
                    @if($portfolio->icon)
                        <img src="{{ str_starts_with($portfolio->icon, 'images/') || str_starts_with($portfolio->icon, 'uploads/') ? asset($portfolio->icon) : asset('storage/' . $portfolio->icon) }}" style="width: 50px; height: 50px; object-fit: cover; border-radius: 4px;">
                    @else
                        <div style="width: 50px; height: 50px; background: #eee; border-radius: 4px;"></div>
                    @endif
                    <div>
                        <strong>{{ $portfolio->title }}</strong>
                        <div style="font-size: 0.85rem; color: var(--text-muted);">{{ Str::limit($portfolio->description, 50) }}</div>
                    </div>
                </div>
                <form action="{{ route('admin.home.portfolio.banner.delete', $portfolio->id) }}" method="POST">
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

        @if($bannerPortfolios->isEmpty())
            <p style="color: var(--text-muted);">No banner portfolios added yet.</p>
        @endif
    </div>
</div>

<!-- 2. Highly Recommended Portfolios Card -->
<div class="card" style="margin-bottom: 2rem;">
    <div class="card-body">
        <h5 style="margin-bottom: 1.5rem; font-size: 1.1rem; color: var(--text-main);">Highly Recommended Portfolios (Portfolio Section)</h5>
        
        <form action="{{ route('admin.home.portfolio.recommended.store') }}" method="POST" style="margin-bottom: 1.5rem;">
            @csrf
            <div>
                <label class="form-label">Select Recommended Portfolio from Master (Auto-saves)</label>
                <select id="recommended-portfolio-select" name="portfolio_master_id" required>
                    <option value="">-- Choose a Recommended Portfolio --</option>
                    @foreach($masterPortfolios as $master)
                        @if(in_array($master->title, $recommendedAddedTitles))
                            <option value="{{ $master->id }}" disabled>{{ $master->title }} (Already Added)</option>
                        @else
                            <option value="{{ $master->id }}">{{ $master->title }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
        </form>

        <h6 style="margin-bottom: 1rem; font-size: 0.95rem; color: var(--text-main);">Manage Recommended Portfolio Cards (Drag & Drop to Reorder)</h6>
        <ul id="recommended-sortable-list" style="list-style: none; padding: 0; margin: 0;">
            @foreach($recommendedPortfolios as $portfolio)
            <li data-id="{{ $portfolio->id }}" style="display: flex; align-items: center; justify-content: space-between; padding: 1rem; margin-bottom: 1rem; border: 1px solid var(--border-color); border-radius: 8px; background: #fff; cursor: grab;">
                <div style="display: flex; align-items: center; gap: 1rem;">
                    <span style="font-size: 1.2rem; color: #999;">☰</span>
                    @if($portfolio->icon)
                        <img src="{{ str_starts_with($portfolio->icon, 'images/') || str_starts_with($portfolio->icon, 'uploads/') ? asset($portfolio->icon) : asset('storage/' . $portfolio->icon) }}" style="width: 50px; height: 50px; object-fit: cover; border-radius: 4px;">
                    @else
                        <div style="width: 50px; height: 50px; background: #eee; border-radius: 4px;"></div>
                    @endif
                    <div>
                        <strong>{{ $portfolio->title }}</strong>
                        <div style="font-size: 0.85rem; color: var(--text-muted);">{{ Str::limit($portfolio->description, 50) }}</div>
                    </div>
                </div>
                <form action="{{ route('admin.home.portfolio.recommended.delete', $portfolio->id) }}" method="POST">
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

        @if($recommendedPortfolios->isEmpty())
            <p style="color: var(--text-muted);">No recommended portfolios added yet.</p>
        @endif
    </div>
</div>

<div style="text-align: right; margin-top: 2rem; margin-bottom: 2rem;">
    <button type="submit" form="section-header-form" class="btn btn-primary" style="padding: 0.75rem 2.5rem; font-size: 1rem;">
        Save All Content
    </button>
</div>

<link href="https://cdn.jsdelivr.net/npm/tom-select@2.2.2/dist/css/tom-select.bootstrap5.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/tom-select@2.2.2/dist/js/tom-select.complete.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sortablejs@latest/Sortable.min.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        // 1. Banner Portfolio TomSelect
        var bannerSelect = document.getElementById('banner-portfolio-select');
        if(bannerSelect) {
            new TomSelect(bannerSelect, {
                create: false,
                sortField: { field: "text", direction: "asc" },
                placeholder: "-- Choose a Portfolio for Banner --",
                onChange: function(val) {
                    if (val) { bannerSelect.form.submit(); }
                }
            });
        }

        // 2. Recommended Portfolio TomSelect
        var recommendedSelect = document.getElementById('recommended-portfolio-select');
        if(recommendedSelect) {
            new TomSelect(recommendedSelect, {
                create: false,
                sortField: { field: "text", direction: "asc" },
                placeholder: "-- Choose a Recommended Portfolio --",
                onChange: function(val) {
                    if (val) { recommendedSelect.form.submit(); }
                }
            });
        }

        // 3. Banner SortableJS
        var bannerList = document.getElementById('banner-sortable-list');
        if(bannerList) {
            Sortable.create(bannerList, {
                animation: 150,
                onEnd: function (evt) {
                    var order = [];
                    bannerList.querySelectorAll('li').forEach(function(li) {
                        order.push(li.getAttribute('data-id'));
                    });
                    fetch('{{ route('admin.home.portfolio.banner.reorder') }}', {
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

        // 4. Recommended SortableJS
        var recommendedList = document.getElementById('recommended-sortable-list');
        if(recommendedList) {
            Sortable.create(recommendedList, {
                animation: 150,
                onEnd: function (evt) {
                    var order = [];
                    recommendedList.querySelectorAll('li').forEach(function(li) {
                        order.push(li.getAttribute('data-id'));
                    });
                    fetch('{{ route('admin.home.portfolio.recommended.reorder') }}', {
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
