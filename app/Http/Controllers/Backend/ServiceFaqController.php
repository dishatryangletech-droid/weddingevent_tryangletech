<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\ServiceFaq;
use App\Models\ServiceFaqSection;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class ServiceFaqController extends Controller
{
    public function index(Request $request): View
    {
        $query = ServiceFaq::query();

        if ($request->filled('search')) {
            $search = trim((string) $request->search);
            $query->where(function ($q) use ($search) {
                $q->where('question', 'like', "%{$search}%")
                    ->orWhere('answer', 'like', "%{$search}%");
            });
        }

        $faqs = $query->orderBy('order', 'asc')->orderBy('id', 'asc')->paginate(15)->withQueryString();
        $section = ServiceFaqSection::getSettings();
        $totalCount = ServiceFaq::count();
        $activeCount = ServiceFaq::where('status', 'active')->count();

        return view('backend.service-page.faqs.index', compact('faqs', 'section', 'totalCount', 'activeCount'));
    }

    public function create(): View
    {
        $nextOrder = (ServiceFaq::max('order') ?? 0) + 1;

        return view('backend.service-page.faqs.create', compact('nextOrder'));
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'question' => 'required|string|max:500',
            'answer' => 'required|string',
            'order' => 'nullable|integer|min:0',
            'status' => 'required|in:active,deactive',
        ]);

        ServiceFaq::create([
            'question' => $validated['question'],
            'answer' => $validated['answer'],
            'order' => $validated['order'] ?? 1,
            'status' => $validated['status'],
        ]);

        return redirect()->route('admin.service-page.faqs.index')
            ->with('success', 'FAQ question added successfully.');
    }

    public function edit(ServiceFaq $faq): View
    {
        return view('backend.service-page.faqs.edit', compact('faq'));
    }

    public function update(Request $request, ServiceFaq $faq): RedirectResponse
    {
        $validated = $request->validate([
            'question' => 'required|string|max:500',
            'answer' => 'required|string',
            'order' => 'nullable|integer|min:0',
            'status' => 'required|in:active,deactive',
        ]);

        $faq->update([
            'question' => $validated['question'],
            'answer' => $validated['answer'],
            'order' => $validated['order'] ?? 1,
            'status' => $validated['status'],
        ]);

        return redirect()->route('admin.service-page.faqs.index')
            ->with('success', 'FAQ question updated successfully.');
    }

    public function destroy(ServiceFaq $faq): RedirectResponse
    {
        $faq->delete();

        return redirect()->route('admin.service-page.faqs.index')
            ->with('success', 'FAQ question deleted successfully.');
    }

    public function toggleStatus(ServiceFaq $faq): RedirectResponse
    {
        $faq->status = ($faq->status === 'active') ? 'deactive' : 'active';
        $faq->save();

        return redirect()->back()->with('success', "FAQ status updated to {$faq->status}.");
    }

    public function updateSettings(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'tag' => 'nullable|string|max:255',
            'title' => 'required|string|max:500',
            'subtitle' => 'nullable|string',
            'image_one' => 'nullable|image|mimes:jpeg,png,jpg,webp,avif|max:4096',
            'image_two' => 'nullable|image|mimes:jpeg,png,jpg,webp,avif|max:4096',
            'contact_title' => 'nullable|string|max:255',
            'contact_subtitle' => 'nullable|string|max:255',
            'contact_button_text' => 'nullable|string|max:255',
            'contact_button_url' => 'nullable|string|max:255',
            'contact_image' => 'nullable|image|mimes:jpeg,png,jpg,webp,avif|max:4096',
            'status' => 'required|in:active,deactive',
        ]);

        $section = ServiceFaqSection::getSettings();

        $data = [
            'tag' => $validated['tag'] ?? 'FAQ',
            'title' => $validated['title'],
            'subtitle' => $validated['subtitle'] ?? null,
            'contact_title' => $validated['contact_title'] ?? 'Still have questions?',
            'contact_subtitle' => $validated['contact_subtitle'] ?? 'Speak with our engineers today.',
            'contact_button_text' => $validated['contact_button_text'] ?? "Let's talk",
            'contact_button_url' => $validated['contact_button_url'] ?? '/contact',
            'status' => $validated['status'],
        ];

        if ($request->hasFile('image_one')) {
            if ($section->image_one && ! str_starts_with($section->image_one, 'images/') && ! str_starts_with($section->image_one, 'assets/') && Storage::disk('public')->exists($section->image_one)) {
                Storage::disk('public')->delete($section->image_one);
            }
            $data['image_one'] = $request->file('image_one')->store('service-faqs', 'public');
        }

        if ($request->hasFile('image_two')) {
            if ($section->image_two && ! str_starts_with($section->image_two, 'images/') && ! str_starts_with($section->image_two, 'assets/') && Storage::disk('public')->exists($section->image_two)) {
                Storage::disk('public')->delete($section->image_two);
            }
            $data['image_two'] = $request->file('image_two')->store('service-faqs', 'public');
        }

        if ($request->hasFile('contact_image')) {
            if ($section->contact_image && ! str_starts_with($section->contact_image, 'images/') && ! str_starts_with($section->contact_image, 'assets/') && Storage::disk('public')->exists($section->contact_image)) {
                Storage::disk('public')->delete($section->contact_image);
            }
            $data['contact_image'] = $request->file('contact_image')->store('service-faqs', 'public');
        }

        $section->update($data);

        return redirect()->route('admin.service-page.faqs.index')
            ->with('success', 'Services Page FAQ Section header, images & contact box settings updated.');
    }
}
