@extends('backend.layouts.app')
@section('title', 'Contact Us - FAQ Section')
@section('page_title', 'Contact Us - FAQ Settings')

@section('content')
<!-- FAQ Header Settings Card -->
<div class="card" style="margin-bottom: 2rem;">
    <div class="card-body">
        <h5 style="margin-bottom: 1.5rem; font-size: 1.1rem; color: var(--text-main);">Section Header Settings</h5>
        <form id="contact-faq-header-form" action="{{ route('admin.contact.faq.header.update') }}" method="POST">
            @csrf
            
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1.5rem; margin-bottom: 1rem;">
                <div>
                    <label class="form-label">Tagline</label>
                    <input type="text" name="tagline" class="form-control" value="{{ $faqHeader->tagline ?? 'FAQ' }}" placeholder="FAQ">
                </div>
                <div>
                    <label class="form-label">Title</label>
                    <input type="text" name="title" class="form-control" value="{{ $faqHeader->title ?? 'Elegant answers for your special celebrations' }}" placeholder="Elegant answers for your special celebrations">
                </div>
            </div>
        </form>
    </div>
</div>

<!-- Add New FAQ Item -->
<div class="card" style="margin-bottom: 2rem;">
    <div class="card-body">
        <h5 style="margin-bottom: 1.5rem; font-size: 1.1rem; color: var(--text-main);">Add New FAQ Item</h5>
        <form action="{{ route('admin.contact.faq.item.store') }}" method="POST">
            @csrf
            <div style="margin-bottom: 1.5rem;">
                <label class="form-label">Question</label>
                <input type="text" name="question" class="form-control" required placeholder="e.g. How do you plan our wedding from start to finish?">
            </div>
            <div style="margin-bottom: 1.5rem;">
                <label class="form-label">Answer</label>
                <textarea name="answer" class="form-control" rows="3" required placeholder="We start with an in-depth consultation..."></textarea>
            </div>
            <div style="text-align: right;">
                <button type="submit" class="btn btn-success">Add FAQ Item</button>
            </div>
        </form>
    </div>
</div>

<!-- Manage FAQ Items -->
<div class="card">
    <div class="card-body">
        <h5 style="margin-bottom: 1.5rem; font-size: 1.1rem; color: var(--text-main);">Manage FAQ Items (Drag & Drop to Reorder)</h5>
        
        <ul id="contact-faq-sortable" style="list-style: none; padding: 0; margin: 0;">
            @foreach($faqItems as $item)
            <li data-id="{{ $item->id }}" style="display: flex; align-items: center; justify-content: space-between; padding: 1rem; margin-bottom: 1rem; border: 1px solid var(--border-color); border-radius: 8px; background: #fff; cursor: grab;">
                <div style="display: flex; align-items: center; gap: 1rem;">
                    <span style="font-size: 1.2rem; color: #999;">☰</span>
                    <div>
                        <strong>{{ $item->question }}</strong>
                        <div style="font-size: 0.85rem; color: var(--text-muted); margin-top: 0.25rem;">{{ Str::limit($item->answer, 90) }}</div>
                    </div>
                </div>
                <form action="{{ route('admin.contact.faq.item.delete', $item->id) }}" method="POST">
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
        
        @if($faqItems->isEmpty())
            <p style="color: var(--text-muted);">No FAQ items added yet.</p>
        @endif
    </div>
</div>

<div style="text-align: right; margin-top: 2rem; margin-bottom: 2rem;">
    <button type="submit" form="contact-faq-header-form" class="btn btn-primary" style="padding: 0.75rem 2.5rem; font-size: 1rem;">
        Save All Content
    </button>
</div>

<script src="https://cdn.jsdelivr.net/npm/sortablejs@latest/Sortable.min.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        var el = document.getElementById('contact-faq-sortable');
        if(el) {
            Sortable.create(el, {
                animation: 150,
                onEnd: function (evt) {
                    var order = [];
                    el.querySelectorAll('li').forEach(function(li) {
                        order.push(li.getAttribute('data-id'));
                    });
                    
                    fetch('{{ route('admin.contact.faq.reorder') }}', {
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
