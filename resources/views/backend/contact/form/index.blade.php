@extends('backend.layouts.app')
@section('title', 'Contact Us - Form Settings')
@section('page_title', 'Contact Us - Form Settings')

@section('content')
<div class="card">
    <div class="card-body">
        <h5 style="margin-bottom: 1.5rem; font-size: 1.1rem; color: var(--text-main);">Contact Form & Side Image Settings</h5>
        <form id="contact-form-settings" action="{{ route('admin.contact.form.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            
            <div style="margin-bottom: 1.5rem;">
                <label class="form-label">Form Title</label>
                <input type="text" name="title" class="form-control" value="{{ $formSettings->title ?? 'Send us a message' }}" placeholder="Send us a message">
            </div>

            <div style="display: grid; grid-template-columns: 2fr 1fr; gap: 1.5rem; align-items: start; margin-bottom: 1.5rem;">
                <div>
                    <label class="form-label">Form Left Side Image</label>
                    <input type="file" name="image" class="form-control">
                </div>
                <div>
                    @if(isset($formSettings->image) && $formSettings->image)
                        <img src="{{ asset($formSettings->image) }}" alt="Form Image" style="max-height: 100px; border-radius: 8px; border: 1px solid var(--border-color);">
                    @endif
                </div>
            </div>
        </form>
    </div>
</div>

<div style="text-align: right; margin-top: 2rem; margin-bottom: 2rem;">
    <button type="submit" form="contact-form-settings" class="btn btn-primary" style="padding: 0.75rem 2.5rem; font-size: 1rem;">
        Save All Content
    </button>
</div>
@endsection
