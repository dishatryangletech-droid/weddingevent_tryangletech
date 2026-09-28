<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\AboutContentSection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AboutContentSectionController extends Controller
{
    /**
     * Display the About Us Content Section ("Who we are") management page.
     */
    public function index()
    {
        $settings = AboutContentSection::getSettings();

        return view('backend.about.content.index', compact('settings'));
    }

    /**
     * Update the Content Section settings.
     */
    public function update(Request $request)
    {
        $validated = $request->validate([
            'tag' => ['nullable', 'string', 'max:255'],
            'title' => ['required', 'string', 'max:1000'],
            'video_file' => ['nullable', 'file', 'mimes:mp4,webm,ogg', 'max:51200'],
            'video_url' => ['nullable', 'string', 'max:1000'],
            'poster_image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp,avif', 'max:5120'],
            'status' => ['required', 'in:active,deactive'],
        ]);

        $settings = AboutContentSection::getSettings();

        if ($request->hasFile('video_file')) {
            if ($settings->video_url && ! str_starts_with($settings->video_url, 'http') && Storage::disk('public')->exists($settings->video_url)) {
                Storage::disk('public')->delete($settings->video_url);
            }
            $validated['video_url'] = $request->file('video_file')->store('about', 'public');
        } elseif ($request->filled('video_url')) {
            $validated['video_url'] = $request->video_url;
        }

        if ($request->hasFile('poster_image')) {
            if ($settings->poster_image && ! str_starts_with($settings->poster_image, 'http') && Storage::disk('public')->exists($settings->poster_image)) {
                Storage::disk('public')->delete($settings->poster_image);
            }
            $validated['poster_image'] = $request->file('poster_image')->store('about', 'public');
        }

        unset($validated['video_file']);

        $settings->update($validated);

        return redirect()->route('admin.about.content.index')
            ->with('success', 'About Us Content Section updated successfully!');
    }
}
