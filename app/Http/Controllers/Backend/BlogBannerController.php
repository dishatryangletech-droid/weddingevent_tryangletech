<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\BlogBannerSection;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class BlogBannerController extends Controller
{
    public function index(): View
    {
        $banner = BlogBannerSection::getSettings();
        return view('backend.blog-page.banner.index', compact('banner'));
    }

    public function update(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'tag'          => 'nullable|string|max:255',
            'title'        => 'required|string|max:500',
            'description'  => 'nullable|string',
            'banner_image' => 'nullable|image|mimes:jpeg,png,jpg,webp,avif|max:4096',
            'status'       => 'required|in:active,deactive',
        ]);

        $banner = BlogBannerSection::getSettings();

        $data = [
            'tag'         => $validated['tag'] ?? 'Our blog',
            'title'       => $validated['title'],
            'description' => $validated['description'] ?? null,
            'status'      => $validated['status'],
        ];

        if ($request->hasFile('banner_image')) {
            if ($banner->banner_image
                && ! str_starts_with($banner->banner_image, 'images/')
                && ! str_starts_with($banner->banner_image, 'assets/')
                && Storage::disk('public')->exists($banner->banner_image)) {
                Storage::disk('public')->delete($banner->banner_image);
            }
            $data['banner_image'] = $request->file('banner_image')->store('blog', 'public');
        }

        $banner->update($data);

        return redirect()->route('admin.blog-page.banner.index')
            ->with('success', 'Blog Page Banner settings updated successfully.');
    }
}
