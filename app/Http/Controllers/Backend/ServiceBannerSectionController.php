<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\ServiceBannerSection;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class ServiceBannerSectionController extends Controller
{
    public function index(): View
    {
        $banner = ServiceBannerSection::getSettings();

        return view('backend.service-page.banner.index', compact('banner'));
    }

    public function update(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'title' => 'required|string|max:500',
            'button_text' => 'required|string|max:255',
            'button_url' => 'required|string|max:255',
            'banner_image' => 'nullable|image|mimes:jpeg,png,jpg,webp,avif|max:5120',
            'items' => 'nullable|array',
            'items.*.title' => 'nullable|string|max:255',
            'status' => 'required|in:active,deactive',
        ]);

        $banner = ServiceBannerSection::getSettings();

        $items = [];
        if (! empty($validated['items'])) {
            foreach ($validated['items'] as $item) {
                if (! empty(trim($item['title'] ?? ''))) {
                    $items[] = ['title' => trim($item['title'])];
                }
            }
        }

        $data = [
            'title' => $validated['title'],
            'button_text' => $validated['button_text'],
            'button_url' => $validated['button_url'],
            'items' => $items,
            'status' => $validated['status'],
        ];

        if ($request->hasFile('banner_image')) {
            if ($banner->banner_image && Storage::disk('public')->exists($banner->banner_image)) {
                Storage::disk('public')->delete($banner->banner_image);
            }
            $data['banner_image'] = $request->file('banner_image')->store('service-banner', 'public');
        }

        $banner->update($data);

        return redirect()->route('admin.service-page.banner.index')
            ->with('success', 'Services Page Banner Section updated successfully.');
    }
}
