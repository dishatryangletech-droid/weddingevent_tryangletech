<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    /**
     * Display a listing of FAQs.
     */
    public function index(Request $request)
    {
        $query = Faq::query();

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

        $totalCount = Faq::count();
        $activeCount = Faq::where('status', 'active')->count();

        return view('backend.faqs.index', compact('faqs', 'totalCount', 'activeCount'));
    }

    /**
     * Show the form for creating a new FAQ.
     */
    public function create()
    {
        $nextOrder = (Faq::max('order') ?? 0) + 1;

        return view('backend.faqs.create', compact('nextOrder'));
    }

    /**
     * Store a newly created FAQ in storage.
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
            $validated['order'] = (Faq::max('order') ?? 0) + 1;
        }

        Faq::create($validated);

        return redirect()->route('admin.faqs.index')
            ->with('success', 'FAQ question and answer created successfully!');
    }

    /**
     * Show the form for editing the specified FAQ.
     */
    public function edit(Faq $faq)
    {
        return view('backend.faqs.edit', compact('faq'));
    }

    /**
     * Update the specified FAQ in storage.
     */
    public function update(Request $request, Faq $faq)
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

        return redirect()->route('admin.faqs.index')
            ->with('success', 'FAQ updated successfully!');
    }

    /**
     * Toggle status (active/deactive) of the specified FAQ.
     */
    public function toggleStatus(Faq $faq)
    {
        $newStatus = $faq->status === 'active' ? 'deactive' : 'active';
        $faq->update(['status' => $newStatus]);

        return redirect()->back()
            ->with('success', "FAQ status changed to {$newStatus} successfully!");
    }

    /**
     * Remove the specified FAQ from storage.
     */
    public function destroy(Faq $faq)
    {
        $faq->delete();

        return redirect()->route('admin.faqs.index')
            ->with('success', 'FAQ deleted successfully!');
    }
}
