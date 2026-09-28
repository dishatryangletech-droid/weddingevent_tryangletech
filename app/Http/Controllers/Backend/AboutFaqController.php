<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\AboutFaq;
use App\Models\AboutFaqSection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AboutFaqController extends Controller
{
    /**
     * Display a listing of About Us FAQs and section settings.
     */
    public function index(Request $request)
    {
        $query = AboutFaq::query();

        if ($request->filled('search')) {
            $search = trim($request->search);
            $query->where(function ($q) use ($search) {
                $q->where('question', 'like', "%{$search}%")
                    ->orWhere('answer', 'like', "%{$search}%");
            });
        }

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $faqs = $query->orderBy('order', 'asc')
            ->orderBy('id', 'asc')
            ->paginate(15)
            ->withQueryString();

        $totalCount = AboutFaq::count();
        $activeCount = AboutFaq::where('status', 'active')->count();
        $sectionSettings = AboutFaqSection::getSettings();

        return view('backend.about.faqs.index', compact('faqs', 'totalCount', 'activeCount', 'sectionSettings'));
    }

    /**
     * Show the form for creating a new About Us FAQ.
     */
    public function create()
    {
        $nextOrder = (AboutFaq::max('order') ?? 0) + 1;

        return view('backend.about.faqs.create', compact('nextOrder'));
    }

    /**
     * Store a newly created About Us FAQ in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'question' => 'required|string|max:500',
            'answer' => 'required|string',
            'order' => 'nullable|integer',
            'status' => 'required|in:active,deactive',
        ]);

        if (! isset($validated['order']) || $validated['order'] === null) {
            $validated['order'] = (AboutFaq::max('order') ?? 0) + 1;
        }

        AboutFaq::create($validated);

        return redirect()->route('admin.about.faqs.index')
            ->with('success', 'About Us FAQ created successfully!');
    }

    /**
     * Show the form for editing the specified About Us FAQ.
     */
    public function edit(AboutFaq $faq)
    {
        return view('backend.about.faqs.edit', compact('faq'));
    }

    /**
     * Update the specified About Us FAQ in storage.
     */
    public function update(Request $request, AboutFaq $faq)
    {
        $validated = $request->validate([
            'question' => 'required|string|max:500',
            'answer' => 'required|string',
            'order' => 'nullable|integer',
            'status' => 'required|in:active,deactive',
        ]);

        if (! isset($validated['order']) || $validated['order'] === null) {
            $validated['order'] = 0;
        }

        $faq->update($validated);

        return redirect()->route('admin.about.faqs.index')
            ->with('success', 'About Us FAQ updated successfully!');
    }

    /**
     * Toggle status (active/deactive) of the specified FAQ.
     */
    public function toggleStatus(AboutFaq $faq)
    {
        $newStatus = $faq->status === 'active' ? 'deactive' : 'active';
        $faq->update(['status' => $newStatus]);

        return redirect()->back()
            ->with('success', "FAQ status changed to {$newStatus} successfully!");
    }

    /**
     * Remove the specified FAQ from storage.
     */
    public function destroy(AboutFaq $faq)
    {
        $faq->delete();

        return redirect()->route('admin.about.faqs.index')
            ->with('success', 'About Us FAQ deleted successfully!');
    }

    /**
     * Update About Us FAQ Section Header and Contact Card settings.
     */
    public function updateSettings(Request $request)
    {
        $validated = $request->validate([
            'tag' => ['nullable', 'string', 'max:255'],
            'title' => ['required', 'string', 'max:500'],
            'subtitle' => ['nullable', 'string', 'max:1000'],
            'contact_title' => ['nullable', 'string', 'max:255'],
            'contact_subtitle' => ['nullable', 'string', 'max:255'],
            'contact_button_text' => ['nullable', 'string', 'max:255'],
            'contact_button_url' => ['nullable', 'string', 'max:500'],
            'contact_image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp,avif', 'max:5120'],
            'status' => ['required', 'in:active,deactive'],
        ]);

        $sectionSettings = AboutFaqSection::getSettings();

        if ($request->hasFile('contact_image')) {
            if ($sectionSettings->contact_image && Storage::disk('public')->exists($sectionSettings->contact_image)) {
                Storage::disk('public')->delete($sectionSettings->contact_image);
            }
            $validated['contact_image'] = $request->file('contact_image')->store('about', 'public');
        }

        $sectionSettings->update($validated);

        return redirect()->route('admin.about.faqs.index')
            ->with('success', 'FAQ Section settings updated successfully!');
    }
}
