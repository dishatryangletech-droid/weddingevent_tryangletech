<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    /**
     * Display a listing of blog posts.
     */
    public function index(Request $request)
    {
        $query = Blog::query();

        if ($request->filled('search')) {
            $search = trim($request->search);
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                    ->orWhere('slug', 'like', "%{$search}%")
                    ->orWhere('author_name', 'like', "%{$search}%")
                    ->orWhere('short_description', 'like', "%{$search}%");
            });
        }

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $portfolios = $query->orderBy('order', 'asc')
            ->orderBy('published_date', 'desc')
            ->orderBy('id', 'desc')
            ->paginate(15)
            ->withQueryString();

        $blogs = $portfolios; // alias for clarity
        $totalCount = Blog::count();
        $activeCount = Blog::where('status', 'active')->count();

        return view('backend.blogs.index', compact('blogs', 'totalCount', 'activeCount'));
    }

    /**
     * Show the form for creating a new blog post.
     */
    public function create()
    {
        $nextOrder = (Blog::max('order') ?? 0) + 1;

        return view('backend.blogs.create', compact('nextOrder'));
    }

    /**
     * Store a newly created blog post in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:blogs,slug',
            'published_date' => 'nullable|date',
            'short_description' => 'nullable|string',
            'content' => 'nullable|string',
            'author_name' => 'nullable|string|max:255',
            'author_title' => 'nullable|string|max:255',
            'order' => 'nullable|integer',
            'status' => 'required|in:active,deactive',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp,avif|max:10240',
            'banner_image' => 'nullable|image|mimes:jpeg,png,jpg,webp,avif|max:10240',
            'story_image_1' => 'nullable|image|mimes:jpeg,png,jpg,webp,avif|max:10240',
            'story_image_2' => 'nullable|image|mimes:jpeg,png,jpg,webp,avif|max:10240',
            'author_image' => 'nullable|image|mimes:jpeg,png,jpg,webp,avif|max:10240',
        ]);

        if (empty($validated['slug'])) {
            $validated['slug'] = Str::slug($validated['title']);
        }

        // Handle Thumbnail Image
        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('blogs', 'public');
        }

        // Handle Banner Image
        if ($request->hasFile('banner_image')) {
            $validated['banner_image'] = $request->file('banner_image')->store('blogs', 'public');
        }

        // Handle Story Images
        if ($request->hasFile('story_image_1')) {
            $validated['story_image_1'] = $request->file('story_image_1')->store('blogs', 'public');
        }
        if ($request->hasFile('story_image_2')) {
            $validated['story_image_2'] = $request->file('story_image_2')->store('blogs', 'public');
        }

        // Handle Author Image
        if ($request->hasFile('author_image')) {
            $validated['author_image'] = $request->file('author_image')->store('blogs', 'public');
        }

        $validated['order'] = $validated['order'] ?? ((Blog::max('order') ?? 0) + 1);

        $blog = Blog::create($validated);

        return redirect()->route('admin.blogs.index')
            ->with('success', "Blog post '{$blog->title}' created successfully!");
    }

    /**
     * Show the form for editing the specified blog post.
     */
    public function edit(Blog $blog)
    {
        return view('backend.blogs.edit', compact('blog'));
    }

    /**
     * Update the specified blog post in storage.
     */
    public function update(Request $request, Blog $blog)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:blogs,slug,'.$blog->id,
            'published_date' => 'nullable|date',
            'short_description' => 'nullable|string',
            'content' => 'nullable|string',
            'author_name' => 'nullable|string|max:255',
            'author_title' => 'nullable|string|max:255',
            'order' => 'nullable|integer',
            'status' => 'required|in:active,deactive',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp,avif|max:10240',
            'banner_image' => 'nullable|image|mimes:jpeg,png,jpg,webp,avif|max:10240',
            'author_image' => 'nullable|image|mimes:jpeg,png,jpg,webp,avif|max:10240',
        ]);

        if (empty($validated['slug'])) {
            $validated['slug'] = Str::slug($validated['title']);
        }

        // Handle Thumbnail Image upload
        if ($request->hasFile('image')) {
            if ($blog->image && ! str_starts_with($blog->image, 'assets/') && Storage::disk('public')->exists($blog->image)) {
                Storage::disk('public')->delete($blog->image);
            }
            $validated['image'] = $request->file('image')->store('blogs', 'public');
        }

        // Handle Banner Image upload
        if ($request->hasFile('banner_image')) {
            if ($blog->banner_image && ! str_starts_with($blog->banner_image, 'assets/') && Storage::disk('public')->exists($blog->banner_image)) {
                Storage::disk('public')->delete($blog->banner_image);
            }
            $validated['banner_image'] = $request->file('banner_image')->store('blogs', 'public');
        }

        // Handle Author Image upload
        if ($request->hasFile('author_image')) {
            if ($blog->author_image && ! str_starts_with($blog->author_image, 'assets/') && Storage::disk('public')->exists($blog->author_image)) {
                Storage::disk('public')->delete($blog->author_image);
            }
            $validated['author_image'] = $request->file('author_image')->store('blogs', 'public');
        }

        $blog->update($validated);

        return redirect()->route('admin.blogs.index')
            ->with('success', "Blog post '{$blog->title}' updated successfully!");
    }

    /**
     * Remove the specified blog post from storage.
     */
    public function destroy(Blog $blog)
    {
        $title = $blog->title;

        // Clean up uploaded images if stored in storage
        if ($blog->image && ! str_starts_with($blog->image, 'assets/') && Storage::disk('public')->exists($blog->image)) {
            Storage::disk('public')->delete($blog->image);
        }
        if ($blog->banner_image && ! str_starts_with($blog->banner_image, 'assets/') && Storage::disk('public')->exists($blog->banner_image)) {
            Storage::disk('public')->delete($blog->banner_image);
        }
        if ($blog->author_image && ! str_starts_with($blog->author_image, 'assets/') && Storage::disk('public')->exists($blog->author_image)) {
            Storage::disk('public')->delete($blog->author_image);
        }

        $blog->delete();

        return redirect()->route('admin.blogs.index')
            ->with('success', "Blog post '{$title}' deleted successfully!");
    }

    /**
     * Toggle active/deactive status.
     */
    public function toggle(Blog $blog)
    {
        $blog->status = ($blog->status === 'active') ? 'deactive' : 'active';
        $blog->save();

        return back()->with('success', "Status for '{$blog->title}' updated to ".ucfirst($blog->status).'!');
    }

    public function toggleStatus(Blog $blog)
    {
        return $this->toggle($blog);
    }
}
