<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\EventBannerSection;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class EventBannerSectionController extends Controller
{
    public function index(): View
    {
        $banner = EventBannerSection::getSettings();
        return view('backend.event-page.banner.index', compact('banner'));
    }

    public function update(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'tag' => 'nullable|string|max:255',
            'title' => 'required|string|max:500',
            'description' => 'nullable|string',
            'client_image_1' => 'nullable|image|mimes:jpeg,png,jpg,webp,avif|max:4096',
            'client_image_2' => 'nullable|image|mimes:jpeg,png,jpg,webp,avif|max:4096',
            'client_image_3' => 'nullable|image|mimes:jpeg,png,jpg,webp,avif|max:4096',
            'banner_image' => 'nullable|image|mimes:jpeg,png,jpg,webp,avif|max:4096',
            'status' => 'required|in:active,deactive',
        ]);

        $banner = EventBannerSection::getSettings();

        $data = [
            'tag' => $validated['tag'] ?? 'upcoming events',
            'title' => $validated['title'],
            'description' => $validated['description'] ?? null,
            'status' => $validated['status'],
        ];

        foreach (['client_image_1', 'client_image_2', 'client_image_3', 'banner_image'] as $field) {
            if ($request->hasFile($field)) {
                if ($banner->$field && ! str_starts_with($banner->$field, 'images/') && ! str_starts_with($banner->$field, 'assets/') && Storage::disk('public')->exists($banner->$field)) {
                    Storage::disk('public')->delete($banner->$field);
                }
                $data[$field] = $request->file($field)->store('events', 'public');
            }
        }

        $banner->update($data);

        return redirect()->route('admin.event-page.banner.index')
            ->with('success', 'Event Page Banner Section settings updated successfully.');
    }
}
