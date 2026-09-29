<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\PortfolioBannerSection;
use App\Models\PortfolioTag;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class PortfolioBannerController extends Controller
{
    public function index(): View
    {
        $banner = PortfolioBannerSection::getSettings();
        $tags   = PortfolioTag::orderBy('sort_order')->orderBy('id')->get();
        return view('backend.portfolio-page.banner.index', compact('banner', 'tags'));
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

        $banner = PortfolioBannerSection::getSettings();

        $data = [
            'tag'         => $validated['tag'] ?? 'Portfolio',
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
            $data['banner_image'] = $request->file('banner_image')->store('portfolio', 'public');
        }

        $banner->update($data);

        return redirect()->route('admin.portfolio-page.banner.index')
            ->with('success', 'Portfolio Page Banner settings updated successfully.');
    }

    // ── Portfolio Tags CRUD ───────────────────────────────────────────────

    public function storeTag(Request $request): JsonResponse
    {
        $request->validate([
            'name'   => 'required|string|max:255',
            'status' => 'required|in:active,deactive',
        ]);

        $maxOrder = PortfolioTag::max('sort_order') ?? 0;

        $tag = PortfolioTag::create([
            'name'       => trim($request->name),
            'status'     => $request->status,
            'sort_order' => $maxOrder + 1,
        ]);

        return response()->json(['success' => true, 'tag' => $tag]);
    }

    public function updateTag(Request $request, PortfolioTag $tag): JsonResponse
    {
        $request->validate([
            'name'   => 'required|string|max:255',
            'status' => 'required|in:active,deactive',
        ]);

        $tag->update([
            'name'   => trim($request->name),
            'status' => $request->status,
        ]);

        return response()->json(['success' => true, 'tag' => $tag->fresh()]);
    }

    public function destroyTag(PortfolioTag $tag): JsonResponse
    {
        $tag->delete();
        return response()->json(['success' => true]);
    }
}
