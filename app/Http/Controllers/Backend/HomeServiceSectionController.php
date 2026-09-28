<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\HomeServiceSection;
use App\Models\Service;
use Illuminate\Http\Request;

class HomeServiceSectionController extends Controller
{
    /**
     * Display the Services Section management page for Homepage.
     */
    public function index()
    {
        $settings = HomeServiceSection::getSettings();
        $allServices = Service::active()->orderBy('order', 'asc')->orderBy('id', 'asc')->get();

        return view('backend.home.services.index', compact('settings', 'allServices'));
    }

    /**
     * Update the Services Section settings.
     */
    public function update(Request $request)
    {
        $validated = $request->validate([
            'tag' => ['nullable', 'string', 'max:255'],
            'title' => ['nullable', 'string', 'max:1000'],
            'selected_service_ids' => ['required', 'array', 'min:1'],
            'selected_service_ids.*' => ['integer', 'exists:services,id'],
            'status' => ['required', 'in:active,deactive'],
        ]);

        $settings = HomeServiceSection::getSettings();
        $settings->update([
            'tag' => $validated['tag'] ?? 'Our services',
            'title' => $validated['title'] ?? '',
            'selected_service_ids' => array_map('intval', $validated['selected_service_ids']),
            'status' => $validated['status'],
        ]);

        return redirect()->route('admin.home.services.index')
            ->with('success', 'Home Page Services Section updated successfully!');
    }
}
