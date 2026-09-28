@extends('backend.layouts.app')
@section('title', 'About Us - Story Section')
@section('page_title', 'About Us - Story Section Settings')

@section('content')
<div class="card">
    <div class="card-body">
        <form id="about-story-form" action="{{ route('admin.about.story.update') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <h5 style="margin-bottom: 1.5rem; font-size: 1.1rem; color: var(--text-main);">Section Header Settings</h5>
            
            <div style="margin-bottom: 1.5rem;">
                <label class="form-label">Section Title</label>
                <input type="text" name="title" class="form-control" value="{{ $story->title ?? '' }}" placeholder="Designing weddings that reflect your story">
            </div>

            <div style="margin-bottom: 2rem;">
                <label class="form-label">Section Description (Top Right)</label>
                <textarea name="description" class="form-control" rows="3">{{ $story->description ?? '' }}</textarea>
            </div>

            <div style="display: grid; grid-template-columns: 2fr 1fr; gap: 1.5rem; margin-bottom: 2rem; align-items: start;">
                <div>
                    <label class="form-label">Left Main Image</label>
                    <input type="file" name="left_main_image" class="form-control">
                </div>
                <div>
                    @if(isset($story->left_main_image) && $story->left_main_image)
                        <img src="{{ asset($story->left_main_image) }}" alt="Left Main Image" style="max-height: 80px; border-radius: 8px; border: 1px solid var(--border-color);">
                    @endif
                </div>
            </div>

            <hr style="border: 0; border-top: 1px solid var(--border-color); margin: 2rem 0;">
            <h5 style="margin-bottom: 1.5rem; font-size: 1.1rem; color: var(--text-main);">Bottom Feature Cards (Left 2 Blocks)</h5>

            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 2rem; margin-bottom: 2rem;">
                <!-- Feature Card 1 -->
                <div style="border: 1px solid var(--border-color); padding: 1.5rem; border-radius: 8px; background-color: var(--bg-card-hover, #f8f9fa);">
                    <h6 style="margin-top: 0; margin-bottom: 1rem;">Feature Card 1</h6>
                    <div style="margin-bottom: 1rem;">
                        <label class="form-label">Title</label>
                        <input type="text" name="feature_1_title" class="form-control" value="{{ $story->feature_1_title ?? '' }}">
                    </div>
                    <div style="margin-bottom: 1rem;">
                        <label class="form-label">Description</label>
                        <textarea name="feature_1_desc" class="form-control" rows="2">{{ $story->feature_1_desc ?? '' }}</textarea>
                    </div>
                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem;">
                        <div>
                            <label class="form-label">Button Text</label>
                            <input type="text" name="feature_1_button_text" class="form-control" value="{{ $story->feature_1_button_text ?? '' }}">
                        </div>
                        <div>
                            <label class="form-label">Button Link</label>
                            <input type="text" name="feature_1_button_link" class="form-control" value="{{ $story->feature_1_button_link ?? '' }}">
                        </div>
                    </div>
                </div>

                <!-- Feature Card 2 -->
                <div style="border: 1px solid var(--border-color); padding: 1.5rem; border-radius: 8px; background-color: var(--bg-card-hover, #f8f9fa);">
                    <h6 style="margin-top: 0; margin-bottom: 1rem;">Feature Card 2</h6>
                    <div style="margin-bottom: 1rem;">
                        <label class="form-label">Title</label>
                        <input type="text" name="feature_2_title" class="form-control" value="{{ $story->feature_2_title ?? '' }}">
                    </div>
                    <div style="margin-bottom: 1rem;">
                        <label class="form-label">Description</label>
                        <textarea name="feature_2_desc" class="form-control" rows="2">{{ $story->feature_2_desc ?? '' }}</textarea>
                    </div>
                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem;">
                        <div>
                            <label class="form-label">Button Text</label>
                            <input type="text" name="feature_2_button_text" class="form-control" value="{{ $story->feature_2_button_text ?? '' }}">
                        </div>
                        <div>
                            <label class="form-label">Button Link</label>
                            <input type="text" name="feature_2_button_link" class="form-control" value="{{ $story->feature_2_button_link ?? '' }}">
                        </div>
                    </div>
                </div>
            </div>

            <hr style="border: 0; border-top: 1px solid var(--border-color); margin: 2rem 0;">
            <h5 style="margin-bottom: 1.5rem; font-size: 1.1rem; color: var(--text-main);">Right Large Card Settings</h5>

            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1.5rem; margin-bottom: 1.5rem;">
                <div>
                    <label class="form-label">Card Title</label>
                    <input type="text" name="right_card_title" class="form-control" value="{{ $story->right_card_title ?? '' }}" placeholder="Wedding studio">
                </div>
                <div>
                    <label class="form-label">Card Subtitle</label>
                    <input type="text" name="right_card_subtitle" class="form-control" value="{{ $story->right_card_subtitle ?? '' }}" placeholder="Est. 2011">
                </div>
            </div>

            <div style="display: grid; grid-template-columns: 2fr 1fr; gap: 1.5rem; margin-bottom: 1.5rem; align-items: start;">
                <div>
                    <label class="form-label">Card Center Image</label>
                    <input type="file" name="right_card_image" class="form-control">
                </div>
                <div>
                    @if(isset($story->right_card_image) && $story->right_card_image)
                        <img src="{{ asset($story->right_card_image) }}" alt="Right Card Image" style="max-height: 80px; border-radius: 8px; border: 1px solid var(--border-color);">
                    @endif
                </div>
            </div>

            <div>
                <label class="form-label">Card Bottom Text</label>
                <input type="text" name="right_card_bottom_text" class="form-control" value="{{ $story->right_card_bottom_text ?? '' }}" placeholder="Redefining wedding experiences">
            </div>
        </form>
    </div>
</div>

<div style="text-align: right; margin-top: 2rem; margin-bottom: 2rem;">
    <button type="submit" form="about-story-form" class="btn btn-primary" style="padding: 0.75rem 2.5rem; font-size: 1rem;">
        Save All Content
    </button>
</div>
@endsection
