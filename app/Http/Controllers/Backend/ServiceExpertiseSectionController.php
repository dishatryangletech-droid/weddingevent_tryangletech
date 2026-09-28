<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\ServiceExpertiseSection;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class ServiceExpertiseSectionController extends Controller
{
    public function index(): View
    {
        $expertise = ServiceExpertiseSection::getSettings();

        return view('backend.service-page.expertise.index', compact('expertise'));
    }

    public function update(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'tag' => 'nullable|string|max:255',
            'title' => 'required|string|max:500',
            'center_image' => 'nullable|image|mimes:jpeg,png,jpg,webp,avif|max:5120',
            'status' => 'required|in:active,deactive',
            'cards' => 'required|array|size:3',
            'cards.*.title' => 'required|string|max:255',
            'cards.*.description' => 'required|string',
            'cards.*.image' => 'nullable|image|mimes:jpeg,png,jpg,webp,avif|max:5120',
        ]);

        $expertise = ServiceExpertiseSection::getSettings();
        $currentCards = $expertise->cards ?? [];
        $updatedCards = [];

        foreach ($validated['cards'] as $index => $cardInput) {
            $existingImage = $currentCards[$index]['image'] ?? (ServiceExpertiseSection::$defaultCardImages[$index] ?? '');
            $cardImage = $existingImage;

            if ($request->hasFile("cards.{$index}.image")) {
                if ($existingImage && ! str_starts_with($existingImage, 'images/') && ! str_starts_with($existingImage, 'assets/') && Storage::disk('public')->exists($existingImage)) {
                    Storage::disk('public')->delete($existingImage);
                }
                $cardImage = $request->file("cards.{$index}.image")->store('service-expertise', 'public');
            }

            $updatedCards[] = [
                'title' => $cardInput['title'],
                'description' => $cardInput['description'],
                'image' => $cardImage,
            ];
        }

        $data = [
            'tag' => $validated['tag'] ?? 'ABOUT US',
            'title' => $validated['title'],
            'cards' => $updatedCards,
            'status' => $validated['status'],
        ];

        if ($request->hasFile('center_image')) {
            if ($expertise->center_image && ! str_starts_with($expertise->center_image, 'images/') && Storage::disk('public')->exists($expertise->center_image)) {
                Storage::disk('public')->delete($expertise->center_image);
            }
            $data['center_image'] = $request->file('center_image')->store('service-expertise', 'public');
        }

        $expertise->update($data);

        return redirect()->route('admin.service-page.expertise.index')
            ->with('success', 'Our Expertise / About Us Section updated successfully.');
    }
}
