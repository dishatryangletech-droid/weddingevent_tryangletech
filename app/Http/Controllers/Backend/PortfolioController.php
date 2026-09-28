<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Portfolio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PortfolioController extends Controller
{
    /**
     * Display a listing of portfolio projects.
     */
    public function index(Request $request)
    {
        $query = Portfolio::query();

        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                    ->orWhere('short_description', 'like', "%{$search}%")
                    ->orWhere('description', 'like', "%{$search}%");
            });
        }

        if ($request->filled('status')) {
            $query->where('status', $request->input('status'));
        }

        $portfolios = $query->orderBy('order', 'asc')->orderBy('id', 'desc')->paginate(15);
        $totalCount = Portfolio::count();
        $activeCount = Portfolio::where('status', 'active')->count();

        return view('backend.portfolios.index', compact('portfolios', 'totalCount', 'activeCount'));
    }

    /**
     * Show the form for creating a new portfolio project.
     */
    public function create()
    {
        $nextOrder = (Portfolio::max('order') ?? 0) + 1;

        return view('backend.portfolios.create', compact('nextOrder'));
    }

    /**
     * Store a newly created portfolio project.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'slug' => ['nullable', 'string', 'max:255', 'unique:portfolios,slug'],
            'project_date' => ['nullable', 'date'],
            'short_description' => ['nullable', 'string'],
            'full_description' => ['nullable', 'string'],
            'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,webp,avif,gif', 'max:10240'],
            'banner_image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,webp,avif,gif', 'max:10240'],
            'gallery_images' => ['nullable', 'array'],
            'gallery_images.*' => ['nullable', 'image', 'mimes:jpeg,png,jpg,webp,avif,gif', 'max:10240'],
            'order' => ['nullable', 'integer', 'min:0'],
            'status' => ['required', 'in:active,deactive'],
            'project_status' => ['required', 'in:ongoing,completed'],
            // Videos
            'video_titles' => ['nullable', 'array'],
            'video_titles.*' => ['nullable', 'string', 'max:255'],
            'video_tags' => ['nullable', 'array'],
            'video_tags.*' => ['nullable', 'string', 'max:100'],
            'video_durations' => ['nullable', 'array'],
            'video_durations.*' => ['nullable', 'string', 'max:20'],
            'video_descriptions' => ['nullable', 'array'],
            'video_descriptions.*' => ['nullable', 'string'],
            'video_files' => ['nullable', 'array'],
            'video_files.*' => ['nullable', 'mimetypes:video/mp4,video/webm,video/ogg,video/quicktime', 'max:204800'],
            'video_posters' => ['nullable', 'array'],
            'video_posters.*' => ['nullable', 'image', 'mimes:jpeg,png,jpg,webp,avif', 'max:10240'],
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('portfolios', 'public');
        }

        $bannerPath = null;
        if ($request->hasFile('banner_image')) {
            $bannerPath = $request->file('banner_image')->store('portfolios/banners', 'public');
        }

        $galleryPaths = [];
        if ($request->hasFile('gallery_images')) {
            foreach ($request->file('gallery_images') as $file) {
                if ($file->isValid()) {
                    $galleryPaths[] = $file->store('portfolios/gallery', 'public');
                }
            }
        }

        // Build videos array from parallel arrays
        $videosData = [];
        $videoTitles = $request->input('video_titles', []);
        if (! empty($videoTitles)) {
            foreach ($videoTitles as $i => $title) {
                if (empty($title)) {
                    continue;
                }

                $videoPath = '';
                if ($request->hasFile("video_files.{$i}") && $request->file("video_files.{$i}")->isValid()) {
                    $videoPath = $request->file("video_files.{$i}")->store('portfolios/videos', 'public');
                }

                $posterPath = '';
                if ($request->hasFile("video_posters.{$i}") && $request->file("video_posters.{$i}")->isValid()) {
                    $posterPath = $request->file("video_posters.{$i}")->store('portfolios/video-posters', 'public');
                }

                $videosData[] = [
                    'video' => $videoPath,
                    'poster' => $posterPath,
                    'title' => $title,
                    'tag' => $request->input("video_tags.{$i}", ''),
                    'duration' => $request->input("video_durations.{$i}", ''),
                    'description' => $request->input("video_descriptions.{$i}", ''),
                ];
            }
        }

        $slug = ! empty($validated['slug'])
            ? Str::slug($validated['slug'])
            : Str::slug($validated['title']);

        $originalSlug = $slug;
        $count = 1;
        while (Portfolio::where('slug', $slug)->exists()) {
            $slug = "{$originalSlug}-{$count}";
            $count++;
        }

        $nextOrder = $validated['order'] ?? ((Portfolio::max('order') ?? 0) + 1);

        Portfolio::create([
            'title' => $validated['title'],
            'slug' => $slug,
            'project_date' => $validated['project_date'] ?? null,
            'short_description' => $validated['short_description'] ?? null,
            'description' => $validated['full_description'] ?? null,
            'image' => $imagePath,
            'banner_image' => $bannerPath,
            'gallery_images' => $galleryPaths,
            'videos' => $videosData,
            'order' => $nextOrder,
            'status' => $validated['status'],
            'project_status' => $validated['project_status'],
        ]);

        return redirect()->route('admin.portfolios.index')->with('success', 'Portfolio project created successfully!');
    }

    /**
     * Show the form for editing the specified portfolio project.
     */
    public function edit(Portfolio $portfolio)
    {
        return view('backend.portfolios.edit', compact('portfolio'));
    }

    /**
     * Update the specified portfolio project.
     */
    public function update(Request $request, Portfolio $portfolio)
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'slug' => ['nullable', 'string', 'max:255', 'unique:portfolios,slug,'.$portfolio->id],
            'project_date' => ['nullable', 'date'],
            'short_description' => ['nullable', 'string'],
            'full_description' => ['nullable', 'string'],
            'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,webp,avif,gif', 'max:10240'],
            'banner_image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,webp,avif,gif', 'max:10240'],
            'gallery_images' => ['nullable', 'array'],
            'gallery_images.*' => ['nullable', 'image', 'mimes:jpeg,png,jpg,webp,avif,gif', 'max:10240'],
            'delete_gallery_images' => ['nullable', 'array'],
            'order' => ['nullable', 'integer', 'min:0'],
            'status' => ['required', 'in:active,deactive'],
            'project_status' => ['required', 'in:ongoing,completed'],
            // Videos
            'video_titles' => ['nullable', 'array'],
            'video_titles.*' => ['nullable', 'string', 'max:255'],
            'video_tags' => ['nullable', 'array'],
            'video_tags.*' => ['nullable', 'string', 'max:100'],
            'video_durations' => ['nullable', 'array'],
            'video_durations.*' => ['nullable', 'string', 'max:20'],
            'video_descriptions' => ['nullable', 'array'],
            'video_descriptions.*' => ['nullable', 'string'],
            'video_files' => ['nullable', 'array'],
            'video_files.*' => ['nullable', 'mimetypes:video/mp4,video/webm,video/ogg,video/quicktime', 'max:204800'],
            'video_posters' => ['nullable', 'array'],
            'video_posters.*' => ['nullable', 'image', 'mimes:jpeg,png,jpg,webp,avif', 'max:10240'],
            'existing_video_paths' => ['nullable', 'array'],
            'existing_poster_paths' => ['nullable', 'array'],
            'delete_videos' => ['nullable', 'array'],
        ]);

        $imagePath = $portfolio->image;
        if ($request->hasFile('image')) {
            if ($portfolio->image && ! str_starts_with($portfolio->image, 'http') && ! str_starts_with($portfolio->image, 'assets/')) {
                Storage::disk('public')->delete($portfolio->image);
            }
            $imagePath = $request->file('image')->store('portfolios', 'public');
        }

        $bannerPath = $portfolio->banner_image;
        if ($request->hasFile('banner_image')) {
            if ($portfolio->banner_image && ! str_starts_with($portfolio->banner_image, 'http') && ! str_starts_with($portfolio->banner_image, 'assets/')) {
                Storage::disk('public')->delete($portfolio->banner_image);
            }
            $bannerPath = $request->file('banner_image')->store('portfolios/banners', 'public');
        }

        // Handle existing gallery images
        $existingGallery = $portfolio->gallery_images;
        if (is_string($existingGallery)) {
            $existingGallery = json_decode($existingGallery, true) ?: [];
        }
        if (! is_array($existingGallery)) {
            $existingGallery = [];
        }

        // Delete requested gallery images
        if (! empty($validated['delete_gallery_images'])) {
            foreach ($validated['delete_gallery_images'] as $delImg) {
                if (($key = array_search($delImg, $existingGallery)) !== false) {
                    unset($existingGallery[$key]);
                    if (! str_starts_with($delImg, 'http') && ! str_starts_with($delImg, 'assets/')) {
                        Storage::disk('public')->delete($delImg);
                    }
                }
            }
            $existingGallery = array_values($existingGallery);
        }

        // Append new gallery images
        if ($request->hasFile('gallery_images')) {
            foreach ($request->file('gallery_images') as $file) {
                if ($file->isValid()) {
                    $existingGallery[] = $file->store('portfolios/gallery', 'public');
                }
            }
        }

        $slug = ! empty($validated['slug'])
            ? Str::slug($validated['slug'])
            : Str::slug($validated['title']);

        $originalSlug = $slug;
        $count = 1;
        while (Portfolio::where('slug', $slug)->where('id', '!=', $portfolio->id)->exists()) {
            $slug = "{$originalSlug}-{$count}";
            $count++;
        }

        // Build updated videos list
        $existingVideos = is_array($portfolio->videos) ? $portfolio->videos : [];
        $deleteVideoIndexes = $request->input('delete_videos', []);
        $updatedVideos = [];
        $videoTitles = $request->input('video_titles', []);

        foreach ($videoTitles as $i => $title) {
            if (empty($title)) {
                continue;
            }

            // Check if this video entry is marked for deletion
            if (in_array((string) $i, array_map('strval', $deleteVideoIndexes))) {
                // Delete old files if they were stored locally
                $existingVid = $existingVideos[$i] ?? [];
                if (! empty($existingVid['video']) && ! str_starts_with($existingVid['video'], 'http') && ! str_starts_with($existingVid['video'], 'assets/')) {
                    Storage::disk('public')->delete($existingVid['video']);
                }
                if (! empty($existingVid['poster']) && ! str_starts_with($existingVid['poster'], 'http') && ! str_starts_with($existingVid['poster'], 'assets/')) {
                    Storage::disk('public')->delete($existingVid['poster']);
                }

                continue;
            }

            // Keep existing path if no new file uploaded
            $videoPath = $request->input("existing_video_paths.{$i}", '');
            if ($request->hasFile("video_files.{$i}") && $request->file("video_files.{$i}")->isValid()) {
                // Delete old video file if stored locally
                if (! empty($videoPath) && ! str_starts_with($videoPath, 'http') && ! str_starts_with($videoPath, 'assets/')) {
                    Storage::disk('public')->delete($videoPath);
                }
                $videoPath = $request->file("video_files.{$i}")->store('portfolios/videos', 'public');
            }

            $posterPath = $request->input("existing_poster_paths.{$i}", '');
            if ($request->hasFile("video_posters.{$i}") && $request->file("video_posters.{$i}")->isValid()) {
                if (! empty($posterPath) && ! str_starts_with($posterPath, 'http') && ! str_starts_with($posterPath, 'assets/')) {
                    Storage::disk('public')->delete($posterPath);
                }
                $posterPath = $request->file("video_posters.{$i}")->store('portfolios/video-posters', 'public');
            }

            $updatedVideos[] = [
                'video' => $videoPath,
                'poster' => $posterPath,
                'title' => $title,
                'tag' => $request->input("video_tags.{$i}", ''),
                'duration' => $request->input("video_durations.{$i}", ''),
                'description' => $request->input("video_descriptions.{$i}", ''),
            ];
        }

        $portfolio->update([
            'title' => $validated['title'],
            'slug' => $slug,
            'project_date' => $validated['project_date'] ?? null,
            'short_description' => $validated['short_description'] ?? null,
            'description' => $validated['full_description'] ?? null,
            'image' => $imagePath,
            'banner_image' => $bannerPath,
            'gallery_images' => array_values($existingGallery),
            'videos' => $updatedVideos,
            'order' => $validated['order'] ?? $portfolio->order,
            'status' => $validated['status'],
            'project_status' => $validated['project_status'],
        ]);

        return redirect()->route('admin.portfolios.index')->with('success', 'Portfolio project updated successfully!');
    }

    /**
     * Remove the specified portfolio project.
     */
    public function destroy(Portfolio $portfolio)
    {
        if ($portfolio->image && ! str_starts_with($portfolio->image, 'http') && ! str_starts_with($portfolio->image, 'assets/')) {
            Storage::disk('public')->delete($portfolio->image);
        }
        if ($portfolio->banner_image && ! str_starts_with($portfolio->banner_image, 'http') && ! str_starts_with($portfolio->banner_image, 'assets/')) {
            Storage::disk('public')->delete($portfolio->banner_image);
        }
        if ($portfolio->gallery_images && is_array($portfolio->gallery_images)) {
            foreach ($portfolio->gallery_images as $img) {
                if (! str_starts_with($img, 'http') && ! str_starts_with($img, 'assets/')) {
                    Storage::disk('public')->delete($img);
                }
            }
        }

        $portfolio->delete();

        return redirect()->route('admin.portfolios.index')->with('success', 'Portfolio project deleted successfully!');
    }

    /**
     * Toggle active/deactive status.
     */
    public function toggleStatus(Portfolio $portfolio)
    {
        $newStatus = $portfolio->status === 'active' ? 'deactive' : 'active';
        $portfolio->update(['status' => $newStatus]);

        if (request()->expectsJson()) {
            return response()->json([
                'success' => true,
                'status' => $newStatus,
                'message' => 'Status updated to '.ucfirst($newStatus),
            ]);
        }

        return redirect()->back()->with('success', 'Status updated to '.ucfirst($newStatus));
    }
}
