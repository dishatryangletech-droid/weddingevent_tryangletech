<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\EventPageItem;
use App\Models\EventSectionHeader;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\View\View;

class EventItemController extends Controller
{
    public function index(Request $request): View
    {
        $header = EventSectionHeader::getSettings();
        $query = EventPageItem::query();

        if ($request->filled('search')) {
            $search = trim((string) $request->search);
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                    ->orWhere('location', 'like', "%{$search}%")
                    ->orWhere('description', 'like', "%{$search}%");
            });
        }

        $items = $query->orderBy('sort_order', 'asc')->orderBy('id', 'asc')->paginate(15)->withQueryString();
        $totalCount = EventPageItem::count();
        $activeCount = EventPageItem::where('status', 'active')->count();

        return view('backend.event-page.items.index', compact('header', 'items', 'totalCount', 'activeCount'));
    }

    public function updateHeader(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'tag' => 'nullable|string|max:255',
            'title' => 'required|string|max:500',
            'description' => 'nullable|string',
        ]);

        $header = EventSectionHeader::getSettings();
        $header->update([
            'tag' => $validated['tag'] ?? 'Our event',
            'title' => $validated['title'],
            'description' => $validated['description'] ?? null,
        ]);

        return redirect()->route('admin.event-page.items.index')
            ->with('success', 'Event Section header settings updated successfully.');
    }

    public function create(): View
    {
        $nextOrder = (EventPageItem::max('sort_order') ?? 0) + 1;

        return view('backend.event-page.items.create', compact('nextOrder'));
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255',
            'date_text' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'location' => 'nullable|string|max:255',
            'time_text' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp,avif|max:4096',
            'detail_headline' => 'nullable|string',
            'detail_content' => 'nullable|string',
            'detail_sub_image' => 'nullable|image|mimes:jpeg,png,jpg,webp,avif|max:4096',
            'detail_highlight_1' => 'nullable|string',
            'detail_highlight_2' => 'nullable|string',
            'gallery_image_1' => 'nullable|image|mimes:jpeg,png,jpg,webp,avif|max:4096',
            'gallery_image_2' => 'nullable|image|mimes:jpeg,png,jpg,webp,avif|max:4096',
            'gallery_image_3' => 'nullable|image|mimes:jpeg,png,jpg,webp,avif|max:4096',
            'gallery_image_4' => 'nullable|image|mimes:jpeg,png,jpg,webp,avif|max:4096',
            'gallery_tag'     => 'nullable|string|max:255',
            'gallery_title'   => 'nullable|string|max:255',
            'sort_order' => 'nullable|integer|min:0',
            'status' => 'required|in:active,deactive',
        ]);

        $data = [
            'title' => $validated['title'],
            'slug' => ! empty($validated['slug']) ? Str::slug($validated['slug']) : Str::slug($validated['title']),
            'date_text' => $validated['date_text'] ?? null,
            'description' => $validated['description'] ?? null,
            'location' => $validated['location'] ?? null,
            'time_text' => $validated['time_text'] ?? null,
            'detail_headline' => $validated['detail_headline'] ?? null,
            'detail_content' => $validated['detail_content'] ?? null,
            'detail_highlight_1' => $validated['detail_highlight_1'] ?? null,
            'detail_highlight_2' => $validated['detail_highlight_2'] ?? null,
            'gallery_tag'   => $validated['gallery_tag'] ?? 'WEDDING Gallery',
            'gallery_title' => $validated['gallery_title'] ?? 'Explore our exclusive signature wedding clicks',
            'sort_order' => $validated['sort_order'] ?? 1,
            'status' => $validated['status'],
        ];

        foreach (['image', 'detail_sub_image', 'gallery_image_1', 'gallery_image_2', 'gallery_image_3', 'gallery_image_4'] as $imgField) {
            if ($request->hasFile($imgField)) {
                $data[$imgField] = $request->file($imgField)->store('events', 'public');
            }
        }

        EventPageItem::create($data);

        return redirect()->route('admin.event-page.items.index')
            ->with('success', 'Event item created successfully.');
    }

    public function edit(EventPageItem $item): View
    {
        return view('backend.event-page.items.edit', compact('item'));
    }

    public function update(Request $request, EventPageItem $item): RedirectResponse
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255',
            'date_text' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'location' => 'nullable|string|max:255',
            'time_text' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp,avif|max:4096',
            'detail_headline' => 'nullable|string',
            'detail_content' => 'nullable|string',
            'detail_sub_image' => 'nullable|image|mimes:jpeg,png,jpg,webp,avif|max:4096',
            'detail_highlight_1' => 'nullable|string',
            'detail_highlight_2' => 'nullable|string',
            'gallery_image_1' => 'nullable|image|mimes:jpeg,png,jpg,webp,avif|max:4096',
            'gallery_image_2' => 'nullable|image|mimes:jpeg,png,jpg,webp,avif|max:4096',
            'gallery_image_3' => 'nullable|image|mimes:jpeg,png,jpg,webp,avif|max:4096',
            'gallery_image_4' => 'nullable|image|mimes:jpeg,png,jpg,webp,avif|max:4096',
            'gallery_tag'     => 'nullable|string|max:255',
            'gallery_title'   => 'nullable|string|max:255',
            'sort_order' => 'nullable|integer|min:0',
            'status' => 'required|in:active,deactive',
        ]);

        $data = [
            'title' => $validated['title'],
            'slug' => ! empty($validated['slug']) ? Str::slug($validated['slug']) : Str::slug($validated['title']),
            'date_text' => $validated['date_text'] ?? null,
            'description' => $validated['description'] ?? null,
            'location' => $validated['location'] ?? null,
            'time_text' => $validated['time_text'] ?? null,
            'detail_headline' => $validated['detail_headline'] ?? null,
            'detail_content' => $validated['detail_content'] ?? null,
            'detail_highlight_1' => $validated['detail_highlight_1'] ?? null,
            'detail_highlight_2' => $validated['detail_highlight_2'] ?? null,
            'gallery_tag'   => $validated['gallery_tag'] ?? 'WEDDING Gallery',
            'gallery_title' => $validated['gallery_title'] ?? 'Explore our exclusive signature wedding clicks',
            'sort_order' => $validated['sort_order'] ?? 1,
            'status' => $validated['status'],
        ];

        foreach (['image', 'detail_sub_image', 'gallery_image_1', 'gallery_image_2', 'gallery_image_3', 'gallery_image_4'] as $imgField) {
            if ($request->hasFile($imgField)) {
                if ($item->$imgField && ! str_starts_with($item->$imgField, 'images/') && ! str_starts_with($item->$imgField, 'assets/') && Storage::disk('public')->exists($item->$imgField)) {
                    Storage::disk('public')->delete($item->$imgField);
                }
                $data[$imgField] = $request->file($imgField)->store('events', 'public');
            }
        }

        $item->update($data);

        return redirect()->route('admin.event-page.items.index')
            ->with('success', 'Event item updated successfully.');
    }

    public function destroy(EventPageItem $item): RedirectResponse
    {
        if ($item->image && ! str_starts_with($item->image, 'images/') && ! str_starts_with($item->image, 'assets/') && Storage::disk('public')->exists($item->image)) {
            Storage::disk('public')->delete($item->image);
        }

        $item->delete();

        return redirect()->route('admin.event-page.items.index')
            ->with('success', 'Event item deleted successfully.');
    }

    public function toggleStatus(EventPageItem $item): RedirectResponse
    {
        $item->status = ($item->status === 'active') ? 'deactive' : 'active';
        $item->save();

        return redirect()->back()->with('success', "Event item status updated to {$item->status}.");
    }
}
