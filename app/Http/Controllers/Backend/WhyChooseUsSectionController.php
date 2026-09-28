<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\WhyChooseUsSection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class WhyChooseUsSectionController extends Controller
{
    /**
     * Show edit form for Homepage Why Choose Us section.
     */
    public function editHome()
    {
        $settings = WhyChooseUsSection::getSettings('home');

        return view('backend.home.why-choose-us.index', compact('settings'));
    }

    /**
     * Update Homepage Why Choose Us section.
     */
    public function updateHome(Request $request)
    {
        return $this->saveSettings($request, 'home', 'admin.home.why-choose-us.index');
    }

    /**
     * Show edit form for About Us Why Choose Us section.
     */
    public function editAbout()
    {
        $settings = WhyChooseUsSection::getSettings('about');

        return view('backend.about.why-choose-us.index', compact('settings'));
    }

    /**
     * Update About Us Why Choose Us section.
     */
    public function updateAbout(Request $request)
    {
        return $this->saveSettings($request, 'about', 'admin.about.why-choose-us.index');
    }

    /**
     * Reusable logic to validate and update settings for a page.
     */
    protected function saveSettings(Request $request, string $page, string $redirectRoute)
    {
        $validated = $request->validate([
            'tag' => ['nullable', 'string', 'max:255'],
            'title' => ['required', 'string', 'max:500'],
            'status' => ['required', 'in:active,deactive'],
            'items' => ['required', 'array', 'size:4'],
            'items.*.tab_title' => ['required', 'string', 'max:255'],
            'items.*.title' => ['required', 'string', 'max:255'],
            'items.*.description' => ['required', 'string', 'max:1000'],
            'item_images' => ['nullable', 'array'],
            'item_images.*' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp,avif', 'max:5120'],
        ]);

        $settings = WhyChooseUsSection::getSettings($page);
        $currentItems = $settings->items ?? [];
        $newItems = $validated['items'];

        foreach ($newItems as $i => &$item) {
            $item['number'] = sprintf('%02d', $i + 1);

            // Handle image upload for item slot $i
            if ($request->hasFile("item_images.{$i}")) {
                $oldImage = $currentItems[$i]['image'] ?? null;
                if ($oldImage && ! str_starts_with($oldImage, 'http') && Storage::disk('public')->exists($oldImage)) {
                    Storage::disk('public')->delete($oldImage);
                }
                $item['image'] = $request->file("item_images.{$i}")->store('why-choose-us', 'public');
            } else {
                // Keep existing image if not newly uploaded
                $item['image'] = $currentItems[$i]['image'] ?? null;
            }
        }
        unset($item);

        $settings->update([
            'tag' => $validated['tag'] ?? 'Why choose us',
            'title' => $validated['title'],
            'items' => $newItems,
            'status' => $validated['status'],
        ]);

        $pageLabel = $page === 'about' ? 'About Us' : 'Home Page';

        return redirect()->route($redirectRoute)
            ->with('success', "{$pageLabel} Why Choose Us section updated successfully!");
    }
}
