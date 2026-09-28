<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ServiceController extends Controller
{
    /**
     * Display a listing of services.
     */
    public function index()
    {
        $services = Service::orderBy('order', 'asc')->orderBy('id', 'asc')->get();

        return view('backend.services.index', compact('services'));
    }

    /**
     * Show the form for creating a new service.
     */
    public function create()
    {
        $nextOrder = (Service::max('order') ?? 0) + 1;

        return view('backend.services.create', compact('nextOrder'));
    }

    /**
     * Store a newly created service in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'slug' => ['nullable', 'string', 'max:255', 'unique:services,slug'],
            'short_description' => ['nullable', 'string'],
            'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,webp,avif,gif', 'max:10240'],
            'banner_image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,webp,avif,gif', 'max:10240'],
            'full_description' => ['nullable', 'string'],
            'why_choose_us_image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,webp,avif,gif', 'max:10240'],
            'why_choose_us_points' => ['nullable', 'array'],
            'why_choose_us_points.*.title' => ['nullable', 'string', 'max:255'],
            'why_choose_us_points.*.description' => ['nullable', 'string'],
            'gallery_images'   => ['nullable', 'array'],
            'gallery_images.*' => ['nullable', 'image', 'mimes:jpeg,png,jpg,webp,avif,gif', 'max:10240'],
            'faqs' => ['nullable', 'array'],
            'faqs.*.question' => ['nullable', 'string', 'max:500'],
            'faqs.*.answer' => ['nullable', 'string'],
            'order' => ['nullable', 'integer', 'min:0'],
            'status' => ['required', 'in:active,deactive'],
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('services', 'public');
        }

        $bannerPath = null;
        if ($request->hasFile('banner_image')) {
            $bannerPath = $request->file('banner_image')->store('services/banners', 'public');
        }

        $whyImagePath = null;
        if ($request->hasFile('why_choose_us_image')) {
            $whyImagePath = $request->file('why_choose_us_image')->store('services/why', 'public');
        }

        $slug = ! empty($validated['slug'])
            ? Str::slug($validated['slug'])
            : Str::slug($validated['title']);

        // Ensure unique slug
        $originalSlug = $slug;
        $count = 1;
        while (Service::where('slug', $slug)->exists()) {
            $slug = "{$originalSlug}-{$count}";
            $count++;
        }

        $nextOrder = $validated['order'] ?? ((Service::max('order') ?? 0) + 1);

        // Filter valid why choose us points
        $whyPoints = [];
        if (! empty($validated['why_choose_us_points'])) {
            foreach ($validated['why_choose_us_points'] as $p) {
                if (! empty($p['title']) || ! empty($p['description'])) {
                    $whyPoints[] = [
                        'title' => $p['title'] ?? '',
                        'description' => $p['description'] ?? '',
                    ];
                }
            }
        }

        // Filter valid FAQs
        $faqItems = [];
        if (! empty($validated['faqs'])) {
            foreach ($validated['faqs'] as $f) {
                if (! empty($f['question'])) {
                    $faqItems[] = [
                        'question' => $f['question'],
                        'answer' => $f['answer'] ?? '',
                    ];
                }
            }
        }

        // Gallery images (multiple)
        $galleryPaths = [];
        if ($request->hasFile('gallery_images')) {
            foreach ($request->file('gallery_images') as $galleryFile) {
                $galleryPaths[] = $galleryFile->store('services/gallery', 'public');
            }
        }

        Service::create([
            'title' => $validated['title'],
            'slug' => $slug,
            'short_description' => $validated['short_description'],
            'description' => $validated['full_description'] ?? null,
            'full_description' => $validated['full_description'] ?? null,
            'image' => $imagePath,
            'banner_image' => $bannerPath,
            'why_choose_us_image' => $whyImagePath,
            'why_choose_us_points' => ! empty($whyPoints) ? $whyPoints : null,
            'gallery_images' => ! empty($galleryPaths) ? $galleryPaths : null,
            'faqs' => ! empty($faqItems) ? $faqItems : null,
            'order' => $nextOrder,
            'status' => $validated['status'],
        ]);

        return redirect()->route('admin.services.index')
            ->with('success', 'Service created successfully!');
    }

    /**
     * Show the form for editing the specified service.
     */
    public function edit(Service $service)
    {
        return view('backend.services.edit', compact('service'));
    }

    /**
     * Update the specified service in storage.
     */
    public function update(Request $request, Service $service)
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'slug' => ['nullable', 'string', 'max:255', 'unique:services,slug,'.$service->id],
            'short_description' => ['nullable', 'string'],
            'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,webp,avif,gif', 'max:10240'],
            'banner_image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,webp,avif,gif', 'max:10240'],
            'full_description' => ['nullable', 'string'],
            'why_choose_us_image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,webp,avif,gif', 'max:10240'],
            'why_choose_us_points' => ['nullable', 'array'],
            'why_choose_us_points.*.title' => ['nullable', 'string', 'max:255'],
            'why_choose_us_points.*.description' => ['nullable', 'string'],
            'gallery_images'   => ['nullable', 'array'],
            'gallery_images.*' => ['nullable', 'image', 'mimes:jpeg,png,jpg,webp,avif,gif', 'max:10240'],
            'remove_gallery_images' => ['nullable', 'array'],
            'faqs' => ['nullable', 'array'],
            'faqs.*.question' => ['nullable', 'string', 'max:500'],
            'faqs.*.answer' => ['nullable', 'string'],
            'order' => ['nullable', 'integer', 'min:0'],
            'status' => ['required', 'in:active,deactive'],
        ]);

        $slug = ! empty($validated['slug'])
            ? Str::slug($validated['slug'])
            : Str::slug($validated['title']);

        // Ensure unique slug
        $originalSlug = $slug;
        $count = 1;
        while (Service::where('slug', $slug)->where('id', '!=', $service->id)->exists()) {
            $slug = "{$originalSlug}-{$count}";
            $count++;
        }

        // Filter valid why choose us points
        $whyPoints = [];
        if (! empty($validated['why_choose_us_points'])) {
            foreach ($validated['why_choose_us_points'] as $p) {
                if (! empty($p['title']) || ! empty($p['description'])) {
                    $whyPoints[] = [
                        'title' => $p['title'] ?? '',
                        'description' => $p['description'] ?? '',
                    ];
                }
            }
        }

        // Filter valid FAQs
        $faqItems = [];
        if (! empty($validated['faqs'])) {
            foreach ($validated['faqs'] as $f) {
                if (! empty($f['question'])) {
                    $faqItems[] = [
                        'question' => $f['question'],
                        'answer' => $f['answer'] ?? '',
                    ];
                }
            }
        }

        $updateData = [
            'title' => $validated['title'],
            'slug' => $slug,
            'short_description' => $validated['short_description'],
            'description' => $validated['full_description'] ?? $service->description,
            'full_description' => $validated['full_description'] ?? $service->full_description,
            'why_choose_us_points' => ! empty($whyPoints) ? $whyPoints : null,
            'faqs' => ! empty($faqItems) ? $faqItems : null,
            'order' => $validated['order'] ?? $service->order,
            'status' => $validated['status'],
        ];

        // Service card image
        if ($request->hasFile('image')) {
            if ($service->image && ! str_starts_with($service->image, 'assets/')) {
                Storage::disk('public')->delete($service->image);
            }
            $updateData['image'] = $request->file('image')->store('services', 'public');
        }

        // Service banner image
        if ($request->hasFile('banner_image')) {
            if ($service->banner_image && ! str_starts_with($service->banner_image, 'assets/')) {
                Storage::disk('public')->delete($service->banner_image);
            }
            $updateData['banner_image'] = $request->file('banner_image')->store('services/banners', 'public');
        }

        // Why choose us image
        if ($request->hasFile('why_choose_us_image')) {
            if ($service->why_choose_us_image && ! str_starts_with($service->why_choose_us_image, 'assets/')) {
                Storage::disk('public')->delete($service->why_choose_us_image);
            }
            $updateData['why_choose_us_image'] = $request->file('why_choose_us_image')->store('services/why', 'public');
        }

        // Gallery images — append new uploads; remove checked ones
        $existingGallery = $service->gallery_images ?? [];

        // Remove selected images
        $toRemove = $request->input('remove_gallery_images', []);
        if (! empty($toRemove)) {
            foreach ($toRemove as $removePath) {
                if (! str_starts_with($removePath, 'assets/')) {
                    Storage::disk('public')->delete($removePath);
                }
                $existingGallery = array_values(array_filter($existingGallery, fn ($p) => $p !== $removePath));
            }
        }

        // Upload new gallery images
        if ($request->hasFile('gallery_images')) {
            foreach ($request->file('gallery_images') as $galleryFile) {
                $existingGallery[] = $galleryFile->store('services/gallery', 'public');
            }
        }

        $updateData['gallery_images'] = ! empty($existingGallery) ? array_values($existingGallery) : null;

        $service->update($updateData);

        return redirect()->route('admin.services.index')
            ->with('success', 'Service updated successfully!');
    }

    /**
     * Remove the specified service from storage.
     */
    public function destroy(Service $service)
    {
        if ($service->image && ! str_starts_with($service->image, 'assets/')) {
            Storage::disk('public')->delete($service->image);
        }
        if ($service->banner_image && ! str_starts_with($service->banner_image, 'assets/')) {
            Storage::disk('public')->delete($service->banner_image);
        }
        if ($service->why_choose_us_image && ! str_starts_with($service->why_choose_us_image, 'assets/')) {
            Storage::disk('public')->delete($service->why_choose_us_image);
        }

        $service->delete();

        return redirect()->route('admin.services.index')
            ->with('success', 'Service deleted successfully!');
    }

    /**
     * Toggle the active status of a service.
     */
    public function toggleStatus(Service $service)
    {
        $service->status = $service->status === 'active' ? 'deactive' : 'active';
        $service->save();

        return redirect()->back()
            ->with('success', "Service '{$service->title}' status changed to {$service->status}!");
    }
}
