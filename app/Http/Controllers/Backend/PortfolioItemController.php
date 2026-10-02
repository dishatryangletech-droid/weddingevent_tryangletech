<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\PortfolioItem;
use App\Models\PortfolioTag;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\View\View;

class PortfolioItemController extends Controller
{
    public function index(Request $request): View
    {
        $query = PortfolioItem::with('tag');

        if ($request->filled('search')) {
            $search = trim((string) $request->search);
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                    ->orWhere('subtitle', 'like', "%{$search}%")
                    ->orWhere('description', 'like', "%{$search}%");
            });
        }

        $items = $query->orderBy('sort_order', 'asc')->orderBy('id', 'asc')->paginate(15)->withQueryString();
        $totalCount = PortfolioItem::count();
        $activeCount = PortfolioItem::where('status', 'active')->count();

        return view('backend.portfolio-page.items.index', compact('items', 'totalCount', 'activeCount'));
    }

    public function create(): View
    {
        $nextOrder = (PortfolioItem::max('sort_order') ?? 0) + 1;
        $tags = PortfolioTag::orderBy('sort_order')->get();

        return view('backend.portfolio-page.items.create', compact('nextOrder', 'tags'));
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'portfolio_tag_id' => 'nullable|exists:portfolio_tags,id',
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'client_name' => 'nullable|string|max:255',
            'date_text' => 'nullable|string|max:255',
            'time_text' => 'nullable|string|max:255',
            'location' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp,avif|max:4096',
            'detail_headline' => 'nullable|string',
            'detail_content' => 'nullable|string',
            'detail_sub_image' => 'nullable|image|mimes:jpeg,png,jpg,webp,avif|max:4096',
            'detail_highlight_1' => 'nullable|string',
            'detail_highlight_2' => 'nullable|string',
            'gallery_images' => 'nullable|array',
            'gallery_images.*' => 'image|mimes:jpeg,png,jpg,webp,avif|max:4096',
            'banner_images' => 'nullable|array',
            'banner_images.*' => 'image|mimes:jpeg,png,jpg,webp,avif|max:4096',
            'video_mp4' => 'nullable|file|mimetypes:video/mp4|max:20480',
            'video_webm' => 'nullable|file|mimetypes:video/webm|max:20480',
            'video_poster' => 'nullable|image|mimes:jpeg,png,jpg,webp,avif|max:4096',
            'gallery_tag'     => 'nullable|string|max:255',
            'gallery_title'   => 'nullable|string|max:255',
            'sort_order' => 'nullable|integer|min:0',
            'status' => 'required|in:active,deactive',
        ]);

        $data = [
            'portfolio_tag_id' => $validated['portfolio_tag_id'] ?? null,
            'title' => $validated['title'],
            'slug' => ! empty($validated['slug']) ? Str::slug($validated['slug']) : Str::slug($validated['title']),
            'subtitle' => $validated['subtitle'] ?? null,
            'client_name' => $validated['client_name'] ?? null,
            'date_text' => $validated['date_text'] ?? null,
            'time_text' => $validated['time_text'] ?? null,
            'location' => $validated['location'] ?? null,
            'description' => $validated['description'] ?? null,
            'detail_headline' => $validated['detail_headline'] ?? null,
            'detail_content' => $validated['detail_content'] ?? null,
            'detail_highlight_1' => $validated['detail_highlight_1'] ?? null,
            'detail_highlight_2' => $validated['detail_highlight_2'] ?? null,
            'gallery_tag'   => $validated['gallery_tag'] ?? 'WEDDING Gallery',
            'gallery_title' => $validated['gallery_title'] ?? 'Explore our exclusive signature wedding clicks',
            'sort_order' => $validated['sort_order'] ?? 1,
            'status' => $validated['status'],
        ];

        foreach (['image', 'detail_sub_image', 'video_mp4', 'video_webm', 'video_poster'] as $imgField) {
            if ($request->hasFile($imgField)) {
                $data[$imgField] = $request->file($imgField)->store('portfolio/items', 'public');
            }
        }

        if ($request->hasFile('gallery_images')) {
            $paths = [];
            foreach ($request->file('gallery_images') as $file) {
                $paths[] = $file->store('portfolio/items', 'public');
            }
            $data['gallery_images'] = $paths;
        }

        if ($request->hasFile('banner_images')) {
            $paths = [];
            foreach ($request->file('banner_images') as $file) {
                $paths[] = $file->store('portfolio/items', 'public');
            }
            $data['banner_images'] = $paths;
        }

        PortfolioItem::create($data);

        return redirect()->route('admin.portfolio-page.items.index')
            ->with('success', 'Portfolio item created successfully.');
    }

    public function edit(PortfolioItem $item): View
    {
        $tags = PortfolioTag::orderBy('sort_order')->get();
        return view('backend.portfolio-page.items.edit', compact('item', 'tags'));
    }

    public function update(Request $request, PortfolioItem $item): RedirectResponse
    {
        $validated = $request->validate([
            'portfolio_tag_id' => 'nullable|exists:portfolio_tags,id',
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'client_name' => 'nullable|string|max:255',
            'date_text' => 'nullable|string|max:255',
            'time_text' => 'nullable|string|max:255',
            'guests_text' => 'nullable|string|max:255',
            'location' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp,avif|max:4096',
            'banner_image' => 'nullable|image|mimes:jpeg,png,jpg,webp,avif|max:4096',
            'detail_headline' => 'nullable|string',
            'detail_content' => 'nullable|string',
            'detail_sub_image' => 'nullable|image|mimes:jpeg,png,jpg,webp,avif|max:4096',
            'detail_highlight_1' => 'nullable|string',
            'detail_highlight_2' => 'nullable|string',
            'gallery_images' => 'nullable|array',
            'gallery_images.*' => 'image|mimes:jpeg,png,jpg,webp,avif|max:4096',
            'banner_images' => 'nullable|array',
            'banner_images.*' => 'image|mimes:jpeg,png,jpg,webp,avif|max:4096',
            'video_mp4' => 'nullable|file|mimetypes:video/mp4|max:20480',
            'video_webm' => 'nullable|file|mimetypes:video/webm|max:20480',
            'video_poster' => 'nullable|image|mimes:jpeg,png,jpg,webp,avif|max:4096',
            'gallery_tag'     => 'nullable|string|max:255',
            'gallery_title'   => 'nullable|string|max:255',
            'sort_order' => 'nullable|integer|min:0',
            'status' => 'required|in:active,deactive',
        ]);

        $data = [
            'portfolio_tag_id' => $validated['portfolio_tag_id'] ?? null,
            'title' => $validated['title'],
            'slug' => ! empty($validated['slug']) ? Str::slug($validated['slug']) : Str::slug($validated['title']),
            'subtitle' => $validated['subtitle'] ?? null,
            'client_name' => $validated['client_name'] ?? null,
            'date_text' => $validated['date_text'] ?? null,
            'time_text' => $validated['time_text'] ?? null,
            'guests_text' => $validated['guests_text'] ?? null,
            'location' => $validated['location'] ?? null,
            'description' => $validated['description'] ?? null,
            'detail_headline' => $validated['detail_headline'] ?? null,
            'detail_content' => $validated['detail_content'] ?? null,
            'detail_highlight_1' => $validated['detail_highlight_1'] ?? null,
            'detail_highlight_2' => $validated['detail_highlight_2'] ?? null,
            'gallery_tag'   => $validated['gallery_tag'] ?? 'WEDDING Gallery',
            'gallery_title' => $validated['gallery_title'] ?? 'Explore our exclusive signature wedding clicks',
            'sort_order' => $validated['sort_order'] ?? 1,
            'status' => $validated['status'],
        ];

        foreach (['image', 'banner_image', 'detail_sub_image', 'video_mp4', 'video_webm', 'video_poster'] as $imgField) {
            if ($request->hasFile($imgField)) {
                if ($item->$imgField && ! str_starts_with($item->$imgField, 'images/') && ! str_starts_with($item->$imgField, 'assets/') && Storage::disk('public')->exists($item->$imgField)) {
                    Storage::disk('public')->delete($item->$imgField);
                }
                $data[$imgField] = $request->file($imgField)->store('portfolio/items', 'public');
            }
        }

        $currentGallery = is_array($item->gallery_images) ? $item->gallery_images : [];

        if ($request->has('remove_gallery_images') && is_array($request->remove_gallery_images)) {
            foreach ($request->remove_gallery_images as $removeImg) {
                if (! str_starts_with($removeImg, 'images/') && ! str_starts_with($removeImg, 'assets/') && Storage::disk('public')->exists($removeImg)) {
                    Storage::disk('public')->delete($removeImg);
                }
                if (($key = array_search($removeImg, $currentGallery)) !== false) {
                    unset($currentGallery[$key]);
                }
            }
            $currentGallery = array_values($currentGallery);
            $data['gallery_images'] = $currentGallery;
        }

        if ($request->hasFile('gallery_images')) {
            $paths = [];
            foreach ($request->file('gallery_images') as $file) {
                $paths[] = $file->store('portfolio/items', 'public');
            }
            $data['gallery_images'] = array_merge($currentGallery, $paths);
        } else if ($request->has('remove_gallery_images')) {
            $data['gallery_images'] = $currentGallery;
        }

        $currentBannerGallery = is_array($item->banner_images) ? $item->banner_images : [];

        if ($request->has('remove_banner_images') && is_array($request->remove_banner_images)) {
            foreach ($request->remove_banner_images as $removeImg) {
                if (! str_starts_with($removeImg, 'images/') && ! str_starts_with($removeImg, 'assets/') && Storage::disk('public')->exists($removeImg)) {
                    Storage::disk('public')->delete($removeImg);
                }
                if (($key = array_search($removeImg, $currentBannerGallery)) !== false) {
                    unset($currentBannerGallery[$key]);
                }
            }
            $currentBannerGallery = array_values($currentBannerGallery);
            $data['banner_images'] = $currentBannerGallery;
        }

        if ($request->hasFile('banner_images')) {
            $paths = [];
            foreach ($request->file('banner_images') as $file) {
                $paths[] = $file->store('portfolio/items', 'public');
            }
            $data['banner_images'] = array_merge($currentBannerGallery, $paths);
        } else if ($request->has('remove_banner_images')) {
            $data['banner_images'] = $currentBannerGallery;
        }

        $item->update($data);

        return redirect()->route('admin.portfolio-page.items.index')
            ->with('success', 'Portfolio item updated successfully.');
    }

    public function destroy(PortfolioItem $item): RedirectResponse
    {
        $imgFields = ['image', 'banner_image', 'detail_sub_image', 'video_mp4', 'video_webm', 'video_poster'];
        foreach ($imgFields as $imgField) {
            if ($item->$imgField && ! str_starts_with($item->$imgField, 'images/') && ! str_starts_with($item->$imgField, 'assets/') && Storage::disk('public')->exists($item->$imgField)) {
                Storage::disk('public')->delete($item->$imgField);
            }
        }
        if (is_array($item->gallery_images)) {
            foreach ($item->gallery_images as $oldImage) {
                if (! str_starts_with($oldImage, 'images/') && ! str_starts_with($oldImage, 'assets/') && Storage::disk('public')->exists($oldImage)) {
                    Storage::disk('public')->delete($oldImage);
                }
            }
        }
        
        if (is_array($item->banner_images)) {
            foreach ($item->banner_images as $oldImage) {
                if (! str_starts_with($oldImage, 'images/') && ! str_starts_with($oldImage, 'assets/') && Storage::disk('public')->exists($oldImage)) {
                    Storage::disk('public')->delete($oldImage);
                }
            }
        }

        $item->delete();

        return redirect()->route('admin.portfolio-page.items.index')
            ->with('success', 'Portfolio item deleted successfully.');
    }

    public function toggleStatus(PortfolioItem $item): RedirectResponse
    {
        $item->status = ($item->status === 'active') ? 'deactive' : 'active';
        $item->save();

        return redirect()->back()->with('success', "Portfolio item status updated to {$item->status}.");
    }
}
