<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\HeroSlider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HeroSliderController extends Controller
{
    /**
     * Display a listing of the hero slides.
     */
    public function index()
    {
        $sliders = HeroSlider::orderBy('order', 'asc')->orderBy('id', 'desc')->get();

        return view('backend.home.slider.index', compact('sliders'));
    }

    /**
     * Store a newly created slide in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => ['nullable', 'string', 'max:255'],
            'media_type' => ['required', 'in:image,video'],
            'has_audio' => ['nullable', 'boolean'],
            'media_file' => ['required', 'file', 'max:51200'], // max 50MB
            'poster_file' => ['nullable', 'image', 'max:10240'], // max 10MB
            'order' => ['nullable', 'integer', 'min:0'],
            'status' => ['required', 'in:active,deactive'],
        ]);

        $mediaPath = '';
        if ($request->hasFile('media_file')) {
            $folder = $validated['media_type'] === 'video' ? 'sliders/videos' : 'sliders/images';
            $mediaPath = $request->file('media_file')->store($folder, 'public');
        }

        $posterPath = null;
        if ($request->hasFile('poster_file')) {
            $posterPath = $request->file('poster_file')->store('sliders/posters', 'public');
        }

        $nextOrder = $validated['order'] ?? (HeroSlider::max('order') + 1);

        HeroSlider::create([
            'title' => $validated['title'] ?? null,
            'media_type' => $validated['media_type'],
            'has_audio' => isset($validated['has_audio']) ? (bool) $validated['has_audio'] : true,
            'media_path' => $mediaPath,
            'poster_path' => $posterPath,
            'order' => $nextOrder,
            'status' => $validated['status'],
        ]);

        return redirect()->route('admin.home.slider.index')
            ->with('success', 'Hero slide created successfully!');
    }

    /**
     * Update the specified slide in storage.
     */
    public function update(Request $request, HeroSlider $slider)
    {
        $validated = $request->validate([
            'title' => ['nullable', 'string', 'max:255'],
            'media_type' => ['required', 'in:image,video'],
            'has_audio' => ['nullable', 'boolean'],
            'media_file' => ['nullable', 'file', 'max:51200'],
            'poster_file' => ['nullable', 'image', 'max:10240'],
            'order' => ['nullable', 'integer', 'min:0'],
            'status' => ['required', 'in:active,deactive'],
        ]);

        $updateData = [
            'title' => $validated['title'] ?? null,
            'media_type' => $validated['media_type'],
            'has_audio' => isset($validated['has_audio']) ? (bool) $validated['has_audio'] : false,
            'order' => $validated['order'] ?? $slider->order,
            'status' => $validated['status'],
        ];

        if ($request->hasFile('media_file')) {
            // Delete old uploaded file if in storage
            if ($slider->media_path && ! str_starts_with($slider->media_path, 'assets/')) {
                Storage::disk('public')->delete($slider->media_path);
            }
            $folder = $validated['media_type'] === 'video' ? 'sliders/videos' : 'sliders/images';
            $updateData['media_path'] = $request->file('media_file')->store($folder, 'public');
        }

        if ($request->hasFile('poster_file')) {
            if ($slider->poster_path && ! str_starts_with($slider->poster_path, 'assets/')) {
                Storage::disk('public')->delete($slider->poster_path);
            }
            $updateData['poster_path'] = $request->file('poster_file')->store('sliders/posters', 'public');
        }

        $slider->update($updateData);

        return redirect()->route('admin.home.slider.index')
            ->with('success', 'Hero slide updated successfully!');
    }

    /**
     * Remove the specified slide from storage.
     */
    public function destroy(HeroSlider $slider)
    {
        if ($slider->media_path && ! str_starts_with($slider->media_path, 'assets/')) {
            Storage::disk('public')->delete($slider->media_path);
        }
        if ($slider->poster_path && ! str_starts_with($slider->poster_path, 'assets/')) {
            Storage::disk('public')->delete($slider->poster_path);
        }

        $slider->delete();

        return redirect()->route('admin.home.slider.index')
            ->with('success', 'Hero slide deleted successfully!');
    }

    /**
     * Toggle active/deactive status quickly.
     */
    public function toggleStatus(HeroSlider $slider)
    {
        $newStatus = $slider->status === 'active' ? 'deactive' : 'active';
        $slider->update(['status' => $newStatus]);

        if (request()->wantsJson()) {
            return response()->json([
                'success' => true,
                'status' => $newStatus,
                'message' => 'Slide status updated to '.ucfirst($newStatus),
            ]);
        }

        return redirect()->route('admin.home.slider.index')
            ->with('success', 'Slide status updated to '.ucfirst($newStatus));
    }
}
