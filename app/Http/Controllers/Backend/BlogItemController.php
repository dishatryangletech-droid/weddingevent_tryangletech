<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\BlogItem;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\View\View;

class BlogItemController extends Controller
{
    public function index(Request $request): View
    {
        $query = BlogItem::query();

        if ($request->filled('search')) {
            $search = trim((string) $request->search);
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                    ->orWhere('author_name', 'like', "%{$search}%");
            });
        }

        $items = $query->orderBy('sort_order', 'asc')->orderBy('id', 'desc')->paginate(15)->withQueryString();
        $totalCount = BlogItem::count();
        $activeCount = BlogItem::where('status', 'active')->count();

        return view('backend.blog-page.items.index', compact('items', 'totalCount', 'activeCount'));
    }

    public function create(): View
    {
        $nextOrder = (BlogItem::max('sort_order') ?? 0) + 1;
        return view('backend.blog-page.items.create', compact('nextOrder'));
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255',
            'publish_date' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp,avif|max:4096',
            'banner_image' => 'nullable|image|mimes:jpeg,png,jpg,webp,avif|max:4096',
            'content' => 'nullable|string',
            'author_name' => 'nullable|string|max:255',
            'author_role' => 'nullable|string|max:255',
            'author_image' => 'nullable|image|mimes:jpeg,png,jpg,webp,avif|max:4096',
            'sort_order' => 'nullable|integer|min:0',
            'status' => 'required|in:active,deactive',
        ]);

        $data = [
            'title' => $validated['title'],
            'slug' => ! empty($validated['slug']) ? Str::slug($validated['slug']) : Str::slug($validated['title']),
            'publish_date' => $validated['publish_date'] ?? null,
            'content' => $validated['content'] ?? null,
            'author_name' => $validated['author_name'] ?? null,
            'author_role' => $validated['author_role'] ?? null,
            'sort_order' => $validated['sort_order'] ?? 1,
            'status' => $validated['status'],
        ];

        foreach (['image', 'banner_image', 'author_image'] as $imgField) {
            if ($request->hasFile($imgField)) {
                $data[$imgField] = $request->file($imgField)->store('blog/items', 'public');
            }
        }

        BlogItem::create($data);

        return redirect()->route('admin.blog-page.items.index')
            ->with('success', 'Blog post created successfully.');
    }

    public function edit(BlogItem $item): View
    {
        return view('backend.blog-page.items.edit', compact('item'));
    }

    public function update(Request $request, BlogItem $item): RedirectResponse
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255',
            'publish_date' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp,avif|max:4096',
            'banner_image' => 'nullable|image|mimes:jpeg,png,jpg,webp,avif|max:4096',
            'content' => 'nullable|string',
            'author_name' => 'nullable|string|max:255',
            'author_role' => 'nullable|string|max:255',
            'author_image' => 'nullable|image|mimes:jpeg,png,jpg,webp,avif|max:4096',
            'sort_order' => 'nullable|integer|min:0',
            'status' => 'required|in:active,deactive',
        ]);

        $data = [
            'title' => $validated['title'],
            'slug' => ! empty($validated['slug']) ? Str::slug($validated['slug']) : Str::slug($validated['title']),
            'publish_date' => $validated['publish_date'] ?? null,
            'content' => $validated['content'] ?? null,
            'author_name' => $validated['author_name'] ?? null,
            'author_role' => $validated['author_role'] ?? null,
            'sort_order' => $validated['sort_order'] ?? 1,
            'status' => $validated['status'],
        ];

        foreach (['image', 'banner_image', 'author_image'] as $imgField) {
            if ($request->hasFile($imgField)) {
                if ($item->$imgField && ! str_starts_with($item->$imgField, 'images/') && ! str_starts_with($item->$imgField, 'assets/') && Storage::disk('public')->exists($item->$imgField)) {
                    Storage::disk('public')->delete($item->$imgField);
                }
                $data[$imgField] = $request->file($imgField)->store('blog/items', 'public');
            }
        }

        $item->update($data);

        return redirect()->route('admin.blog-page.items.index')
            ->with('success', 'Blog post updated successfully.');
    }

    public function destroy(BlogItem $item): RedirectResponse
    {
        $imgFields = ['image', 'banner_image', 'author_image'];
        foreach ($imgFields as $imgField) {
            if ($item->$imgField && ! str_starts_with($item->$imgField, 'images/') && ! str_starts_with($item->$imgField, 'assets/') && Storage::disk('public')->exists($item->$imgField)) {
                Storage::disk('public')->delete($item->$imgField);
            }
        }

        $item->delete();

        return redirect()->route('admin.blog-page.items.index')
            ->with('success', 'Blog post deleted successfully.');
    }

    public function toggleStatus(BlogItem $item): RedirectResponse
    {
        $item->update(['status' => $item->status === 'active' ? 'deactive' : 'active']);
        return redirect()->back()->with('success', 'Status toggled successfully.');
    }
}
