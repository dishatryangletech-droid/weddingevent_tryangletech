<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\ServiceProcessSection;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class ServiceProcessSectionController extends Controller
{
    public function index(): View
    {
        $process = ServiceProcessSection::getSettings();

        return view('backend.service-page.process.index', compact('process'));
    }

    public function update(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'tag' => 'nullable|string|max:255',
            'title' => 'required|string|max:500',
            'status' => 'required|in:active,deactive',
            'steps' => 'required|array|size:4',
            'steps.*.step_number' => 'nullable|string|max:50',
            'steps.*.title' => 'required|string|max:255',
            'steps.*.description' => 'required|string',
            'steps.*.image' => 'nullable|image|mimes:jpeg,png,jpg,webp,avif|max:5120',
        ]);

        $process = ServiceProcessSection::getSettings();
        $currentSteps = $process->steps ?? [];
        $updatedSteps = [];

        foreach ($validated['steps'] as $index => $stepInput) {
            $existingImage = $currentSteps[$index]['image'] ?? (ServiceProcessSection::$defaultStepImages[$index] ?? '');
            $stepImage = $existingImage;

            if ($request->hasFile("steps.{$index}.image")) {
                if ($existingImage && ! str_starts_with($existingImage, 'assets/') && ! str_starts_with($existingImage, 'storage/process/') && Storage::disk('public')->exists($existingImage)) {
                    Storage::disk('public')->delete($existingImage);
                }
                $stepImage = $request->file("steps.{$index}.image")->store('service-process', 'public');
            }

            $updatedSteps[] = [
                'step_number' => $stepInput['step_number'] ?? 'Step-0'.($index + 1),
                'title' => $stepInput['title'],
                'description' => $stepInput['description'],
                'image' => $stepImage,
            ];
        }

        $process->update([
            'tag' => $validated['tag'] ?? 'Our service process',
            'title' => $validated['title'],
            'steps' => $updatedSteps,
            'status' => $validated['status'],
        ]);

        return redirect()->route('admin.service-page.process.index')
            ->with('success', 'Our Service Process Section updated successfully.');
    }
}
