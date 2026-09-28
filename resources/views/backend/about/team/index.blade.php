@extends('backend.layouts.app')
@section('title', 'About Us - Team Members')
@section('page_title', 'About Us - Team Members Settings')

@section('content')
<!-- Team Section Header & Video Settings -->
<div class="card" style="margin-bottom: 2rem;">
    <div class="card-body">
        <h5 style="margin-bottom: 1.5rem; font-size: 1.1rem; color: var(--text-main);">Section Header & Video Settings</h5>
        <form id="team-header-form" action="{{ route('admin.about.team.header.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1.5rem; margin-bottom: 1.5rem;">
                <div>
                    <label class="form-label">Tagline</label>
                    <input type="text" name="tagline" class="form-control" value="{{ $teamHeader->tagline ?? 'ARTISTRY IN MOTION' }}" placeholder="ARTISTRY IN MOTION">
                </div>
                <div>
                    <label class="form-label">Title</label>
                    <input type="text" name="title" class="form-control" value="{{ $teamHeader->title ?? 'The artists behind your wedding legacy' }}" placeholder="The artists behind your wedding legacy">
                </div>
                <div>
                    <label class="form-label">Button Text</label>
                    <input type="text" name="button_text" class="form-control" value="{{ $teamHeader->button_text ?? 'About us' }}" placeholder="About us">
                </div>
                <div>
                    <label class="form-label">Button Link</label>
                    <input type="text" name="button_link" class="form-control" value="{{ $teamHeader->button_link ?? '#' }}" placeholder="#">
                </div>
            </div>

            <div style="margin-bottom: 1.5rem;">
                <label class="form-label">Description (Right Card)</label>
                <textarea name="description" class="form-control" rows="3" placeholder="A collective of artists transforming stories into cinematic experiences...">{{ $teamHeader->description ?? '' }}</textarea>
            </div>

            <hr style="border: 0; border-top: 1px solid var(--border-color); margin: 2rem 0;">
            <h5 style="margin-bottom: 1.5rem; font-size: 1.1rem; color: var(--text-main);">Team Section Full-Width Video Settings</h5>

            <div style="display: grid; grid-template-columns: 2fr 1fr; gap: 1.5rem; margin-bottom: 1.5rem; align-items: start;">
                <div>
                    <label class="form-label">Video Poster Image</label>
                    <input type="file" name="video_poster" class="form-control">
                </div>
                <div>
                    @if(isset($teamHeader->video_poster) && $teamHeader->video_poster)
                        <img src="{{ asset($teamHeader->video_poster) }}" alt="Poster" style="max-height: 80px; border-radius: 8px; border: 1px solid var(--border-color);">
                    @else
                        <span style="color: var(--text-muted); font-size: 0.9rem;">No poster set</span>
                    @endif
                </div>
            </div>

            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1.5rem; margin-bottom: 1rem;">
                <div>
                    <label class="form-label">Video File (MP4)</label>
                    <input type="file" name="video_mp4" class="form-control">
                    @if(isset($teamHeader->video_mp4) && $teamHeader->video_mp4)
                        <small style="color: var(--success); display: block; margin-top: 0.5rem;">Current MP4 is set</small>
                    @endif
                </div>
                <div>
                    <label class="form-label">Video File (WebM)</label>
                    <input type="file" name="video_webm" class="form-control">
                    @if(isset($teamHeader->video_webm) && $teamHeader->video_webm)
                        <small style="color: var(--success); display: block; margin-top: 0.5rem;">Current WebM is set</small>
                    @endif
                </div>
            </div>
        </form>
    </div>
</div>

<!-- Add New Team Member -->
<div class="card" style="margin-bottom: 2rem;">
    <div class="card-body">
        <h5 style="margin-bottom: 1.5rem; font-size: 1.1rem; color: var(--text-main);">Add New Team Member</h5>
        <form action="{{ route('admin.about.team.member.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1.5rem; margin-bottom: 1.5rem;">
                <div>
                    <label class="form-label">Name</label>
                    <input type="text" name="name" class="form-control" required placeholder="e.g. Mia Collings">
                </div>
                <div>
                    <label class="form-label">Designation / Role</label>
                    <input type="text" name="designation" class="form-control" required placeholder="e.g. Creative lead">
                </div>
                <div>
                    <label class="form-label">Profile Image</label>
                    <input type="file" name="image" class="form-control" required>
                </div>
                <div>
                    <label class="form-label">LinkedIn URL (Optional)</label>
                    <input type="text" name="linkedin" class="form-control" placeholder="#">
                </div>
            </div>
            <div style="text-align: right;">
                <button type="submit" class="btn btn-success">Add Team Member</button>
            </div>
        </form>
    </div>
</div>

<!-- Manage Team Members -->
<div class="card">
    <div class="card-body">
        <h5 style="margin-bottom: 1.5rem; font-size: 1.1rem; color: var(--text-main);">Manage Team Members (Drag & Drop to Reorder)</h5>
        
        <ul id="team-sortable-list" style="list-style: none; padding: 0; margin: 0;">
            @foreach($teamMembers as $member)
            <li data-id="{{ $member->id }}" style="display: flex; align-items: center; justify-content: space-between; padding: 1rem; margin-bottom: 1rem; border: 1px solid var(--border-color); border-radius: 8px; background: #fff; cursor: grab;">
                <div style="display: flex; align-items: center; gap: 1rem;">
                    <span style="font-size: 1.2rem; color: #999;">☰</span>
                    @if($member->image)
                        <img src="{{ asset($member->image) }}" style="width: 50px; height: 50px; object-fit: cover; border-radius: 50%;">
                    @else
                        <div style="width: 50px; height: 50px; background: #eee; border-radius: 50%;"></div>
                    @endif
                    <div>
                        <strong>{{ $member->name }}</strong>
                        <div style="font-size: 0.85rem; color: var(--text-muted);">{{ $member->designation }}</div>
                    </div>
                </div>
                <form action="{{ route('admin.about.team.member.delete', $member->id) }}" method="POST">
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
        
        @if($teamMembers->isEmpty())
            <p style="color: var(--text-muted);">No team members added yet.</p>
        @endif
    </div>
</div>

<div style="text-align: right; margin-top: 2rem; margin-bottom: 2rem;">
    <button type="submit" form="team-header-form" class="btn btn-primary" style="padding: 0.75rem 2.5rem; font-size: 1rem;">
        Save All Content
    </button>
</div>

<script src="https://cdn.jsdelivr.net/npm/sortablejs@latest/Sortable.min.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        var el = document.getElementById('team-sortable-list');
        if(el) {
            Sortable.create(el, {
                animation: 150,
                onEnd: function (evt) {
                    var order = [];
                    el.querySelectorAll('li').forEach(function(li) {
                        order.push(li.getAttribute('data-id'));
                    });
                    
                    fetch('{{ route('admin.about.team.reorder') }}', {
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
