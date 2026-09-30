<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\ServiceOfferItem;
use App\Models\ServiceOfferSection;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class ServiceOfferItemController extends Controller
{
    public function index(): View
    {
        $banner = ServiceOfferSection::getSettings();
        $items = ServiceOfferItem::orderBy('sort_order')->orderBy('id', 'desc')->get();

        return view('backend.service-page.offers.index', compact('banner', 'items'));
    }

    public function updateHeader(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'tag' => 'nullable|string|max:255',
            'title' => 'required|string|max:1000',
            'status' => 'required|in:active,deactive',
        ]);

        $banner = ServiceOfferSection::getSettings();
        $banner->update($validated);

        return redirect()->route('admin.service-page.offers.index')->with('success', 'Offers header updated successfully.');
    }

    public function create(): View
    {
        return view('backend.service-page.offers.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'required|file|mimes:jpeg,png,jpg,webp,avif,svg|max:5120',
            'status' => 'required|in:active,deactive',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('service-offers', 'public');
        }

        $validated['sort_order'] = ServiceOfferItem::max('sort_order') + 1;
        
        ServiceOfferItem::create($validated);

        return redirect()->route('admin.service-page.offers.index')->with('success', 'Service offer created successfully.');
    }

    public function edit(ServiceOfferItem $item): View
    {
        return view('backend.service-page.offers.edit', compact('item'));
    }

    public function update(Request $request, ServiceOfferItem $item): RedirectResponse
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|file|mimes:jpeg,png,jpg,webp,avif,svg|max:5120',
            'status' => 'required|in:active,deactive',
        ]);

        if ($request->hasFile('image')) {
            if ($item->image && !str_starts_with($item->image, 'images/') && Storage::disk('public')->exists($item->image)) {
                Storage::disk('public')->delete($item->image);
            }
            $validated['image'] = $request->file('image')->store('service-offers', 'public');
        }

        $item->update($validated);

        return redirect()->route('admin.service-page.offers.index')->with('success', 'Service offer updated successfully.');
    }

    public function destroy(ServiceOfferItem $item): RedirectResponse
    {
        if ($item->image && !str_starts_with($item->image, 'images/') && Storage::disk('public')->exists($item->image)) {
            Storage::disk('public')->delete($item->image);
        }
        $item->delete();

        return redirect()->route('admin.service-page.offers.index')->with('success', 'Service offer deleted successfully.');
    }

    public function toggleStatus(ServiceOfferItem $item): RedirectResponse
    {
        $item->update(['status' => $item->status === 'active' ? 'deactive' : 'active']);
        return redirect()->back()->with('success', 'Status updated successfully.');
    }

    public function reorder(Request $request): RedirectResponse
    {
        $request->validate([
            'order' => 'required|array',
            'order.*' => 'exists:service_offer_items,id',
        ]);

        foreach ($request->order as $index => $id) {
            ServiceOfferItem::where('id', $id)->update(['sort_order' => $index + 1]);
        }

        return redirect()->back()->with('success', 'Order updated successfully.');
    }
}
