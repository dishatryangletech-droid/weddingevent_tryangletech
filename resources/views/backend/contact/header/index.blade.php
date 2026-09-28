@extends('backend.layouts.app')
@section('title', 'Contact Us - Header & Contact Details')
@section('page_title', 'Contact Us - Header & Cards Settings')

@section('content')
<!-- Header Settings Card -->
<div class="card" style="margin-bottom: 2rem;">
    <div class="card-body">
        <h5 style="margin-bottom: 1.5rem; font-size: 1.1rem; color: var(--text-main);">Section Header Settings</h5>
        <form id="contact-header-form" action="{{ route('admin.contact.header.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1.5rem; margin-bottom: 1.5rem;">
                <div>
                    <label class="form-label">Tagline</label>
                    <input type="text" name="tagline" class="form-control" value="{{ $header->tagline ?? 'GET IN TOUCH' }}" placeholder="GET IN TOUCH">
                </div>
                <div>
                    <label class="form-label">Title</label>
                    <input type="text" name="title" class="form-control" value="{{ $header->title ?? 'Inquire about your timeless union' }}" placeholder="Inquire about your timeless union">
                </div>
            </div>

            <div style="display: grid; grid-template-columns: 2fr 1fr; gap: 1.5rem; align-items: start;">
                <div>
                    <label class="form-label">Background Image</label>
                    <input type="file" name="background_image" class="form-control">
                </div>
                <div>
                    @if(isset($header->background_image) && $header->background_image)
                        <img src="{{ asset($header->background_image) }}" alt="Background" style="max-height: 80px; border-radius: 8px; border: 1px solid var(--border-color);">
                    @endif
                </div>
            </div>
        </form>
    </div>
</div>

<!-- Add New Contact Info Card -->
<div class="card" style="margin-bottom: 2rem;">
    <div class="card-body">
        <h5 style="margin-bottom: 1.5rem; font-size: 1.1rem; color: var(--text-main);">Add Contact Details Card</h5>
        <form action="{{ route('admin.contact.card.store') }}" method="POST">
            @csrf
            <div style="display: grid; grid-template-columns: 1fr 2fr; gap: 1.5rem; margin-bottom: 1.5rem;">
                <div>
                    <label class="form-label">Icon Type</label>
                    <select name="icon_type" class="form-control">
                        <option value="email">Email Icon (Envelope)</option>
                        <option value="phone">Phone Icon (Receiver)</option>
                        <option value="address">Address Icon (Map Pin)</option>
                    </select>
                </div>
                <div>
                    <label class="form-label">Contact Value / Title</label>
                    <input type="text" name="title" class="form-control" required placeholder="e.g. info@example.com or (888) 456-7890">
                </div>
            </div>
            <div style="margin-bottom: 1.5rem;">
                <label class="form-label">Subtitle / Description</label>
                <input type="text" name="subtitle" class="form-control" placeholder="e.g. Have a project in mind? Send a message.">
            </div>
            <div style="text-align: right;">
                <button type="submit" class="btn btn-success">Add Contact Card</button>
            </div>
        </form>
    </div>
</div>

<!-- Manage Contact Cards -->
<div class="card">
    <div class="card-body">
        <h5 style="margin-bottom: 1.5rem; font-size: 1.1rem; color: var(--text-main);">Manage Contact Details Cards (Drag & Drop to Reorder)</h5>
        
        <ul id="contact-cards-sortable" style="list-style: none; padding: 0; margin: 0;">
            @foreach($cards as $card)
            <li data-id="{{ $card->id }}" style="display: flex; align-items: center; justify-content: space-between; padding: 1rem; margin-bottom: 1rem; border: 1px solid var(--border-color); border-radius: 8px; background: #fff; cursor: grab;">
                <div style="display: flex; align-items: center; gap: 1rem;">
                    <span style="font-size: 1.2rem; color: #999;">☰</span>
                    <div style="width: 40px; height: 40px; border-radius: 50%; background: #f4ebe1; display: flex; align-items: center; justify-content: center; font-weight: bold; color: #28505b;">
                        @if($card->icon_type == 'email') ✉ @elseif($card->icon_type == 'phone') 📞 @else 📍 @endif
                    </div>
                    <div>
                        <strong>{{ $card->title }}</strong>
                        <div style="font-size: 0.85rem; color: var(--text-muted);">{{ $card->subtitle }}</div>
                    </div>
                </div>
                <form action="{{ route('admin.contact.card.delete', $card->id) }}" method="POST">
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
            <p style="color: var(--text-muted);">No contact cards added yet.</p>
        @endif
    </div>
</div>

<div style="text-align: right; margin-top: 2rem; margin-bottom: 2rem;">
    <button type="submit" form="contact-header-form" class="btn btn-primary" style="padding: 0.75rem 2.5rem; font-size: 1rem;">
        Save All Content
    </button>
</div>

<script src="https://cdn.jsdelivr.net/npm/sortablejs@latest/Sortable.min.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        var el = document.getElementById('contact-cards-sortable');
        if(el) {
            Sortable.create(el, {
                animation: 150,
                onEnd: function (evt) {
                    var order = [];
                    el.querySelectorAll('li').forEach(function(li) {
                        order.push(li.getAttribute('data-id'));
                    });
                    
                    fetch('{{ route('admin.contact.card.reorder') }}', {
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
