<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class TestimonialController extends Controller
{
    /**
     * Display a listing of testimonials.
     */
    public function index(Request $request): View
    {
        $query = Testimonial::query();

        if ($request->filled('search')) {
            $search = trim((string) $request->search);
            $query->where(function ($q) use ($search) {
                $q->where('client_name', 'like', "%{$search}%")
                    ->orWhere('client_designation', 'like', "%{$search}%")
                    ->orWhere('company_name', 'like', "%{$search}%")
                    ->orWhere('headline', 'like', "%{$search}%")
                    ->orWhere('review', 'like', "%{$search}%");
            });
        }

        if ($request->filled('status')) {
            if ($request->status === 'approved') {
                $query->where('is_approved', true);
            } elseif ($request->status === 'pending') {
                $query->where('is_approved', false);
            }
        }

        if ($request->filled('placement')) {
            if ($request->placement === 'home') {
                $query->where('show_on_home', true);
            } elseif ($request->placement === 'about') {
                $query->where('show_on_about', true);
            }
        }

        $testimonials = $query->orderBy('order', 'asc')
            ->orderBy('id', 'desc')
            ->paginate(15)
            ->withQueryString();

        $totalCount = Testimonial::count();
        $approvedCount = Testimonial::where('is_approved', true)->count();
        $pendingCount = Testimonial::where('is_approved', false)->count();

        return view('backend.testimonials.index', compact('testimonials', 'totalCount', 'approvedCount', 'pendingCount'));
    }

    /**
     * Show the form for creating a new testimonial.
     */
    public function create(): View
    {
        $nextOrder = (Testimonial::max('order') ?? 0) + 1;

        return view('backend.testimonials.create', compact('nextOrder'));
    }

    /**
     * Store a newly created testimonial in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'client_name' => 'required|string|max:255',
            'client_designation' => 'nullable|string|max:255',
            'company_name' => 'nullable|string|max:255',
            'company_logo' => 'nullable|image|mimes:jpeg,png,jpg,webp,svg,avif|max:4096',
            'client_image' => 'nullable|image|mimes:jpeg,png,jpg,webp,svg,avif|max:4096',
            'headline' => 'nullable|string|max:500',
            'review' => 'required|string',
            'rating' => 'required|integer|min:1|max:5',
            'is_approved' => 'nullable|boolean',
            'show_on_home' => 'nullable|boolean',
            'show_on_about' => 'nullable|boolean',
            'order' => 'nullable|integer|min:0',
        ]);

        $isApproved = $request->boolean('is_approved', true);

        $data = [
            'client_name' => $validated['client_name'],
            'client_designation' => $validated['client_designation'] ?? null,
            'company_name' => $validated['company_name'] ?? null,
            'headline' => $validated['headline'] ?? null,
            'review' => $validated['review'],
            'rating' => (int) ($validated['rating'] ?? 5),
            'is_approved' => $isApproved,
            'status' => $isApproved ? 'approved' : 'pending',
            'show_on_home' => $request->boolean('show_on_home', true),
            'show_on_about' => $request->boolean('show_on_about', true),
            'order' => (int) ($validated['order'] ?? 1),
        ];

        if ($request->hasFile('company_logo')) {
            $data['company_logo'] = $request->file('company_logo')->store('testimonials/logos', 'public');
        }

        if ($request->hasFile('client_image')) {
            $data['client_image'] = $request->file('client_image')->store('testimonials/clients', 'public');
        }

        Testimonial::create($data);

        return redirect()->route('admin.testimonials.index')
            ->with('success', 'Testimonial added successfully.');
    }

    /**
     * Show the form for editing the specified testimonial.
     */
    public function edit(Testimonial $testimonial): View
    {
        return view('backend.testimonials.edit', compact('testimonial'));
    }

    /**
     * Update the specified testimonial in storage.
     */
    public function update(Request $request, Testimonial $testimonial): RedirectResponse
    {
        $validated = $request->validate([
            'client_name' => 'required|string|max:255',
            'client_designation' => 'nullable|string|max:255',
            'company_name' => 'nullable|string|max:255',
            'company_logo' => 'nullable|image|mimes:jpeg,png,jpg,webp,svg,avif|max:4096',
            'client_image' => 'nullable|image|mimes:jpeg,png,jpg,webp,svg,avif|max:4096',
            'headline' => 'nullable|string|max:500',
            'review' => 'required|string',
            'rating' => 'required|integer|min:1|max:5',
            'is_approved' => 'nullable|boolean',
            'show_on_home' => 'nullable|boolean',
            'show_on_about' => 'nullable|boolean',
            'order' => 'nullable|integer|min:0',
        ]);

        $isApproved = $request->boolean('is_approved');

        $data = [
            'client_name' => $validated['client_name'],
            'client_designation' => $validated['client_designation'] ?? null,
            'company_name' => $validated['company_name'] ?? null,
            'headline' => $validated['headline'] ?? null,
            'review' => $validated['review'],
            'rating' => (int) ($validated['rating'] ?? 5),
            'is_approved' => $isApproved,
            'status' => $isApproved ? 'approved' : 'pending',
            'show_on_home' => $request->boolean('show_on_home'),
            'show_on_about' => $request->boolean('show_on_about'),
            'order' => (int) ($validated['order'] ?? 1),
        ];

        if ($request->hasFile('company_logo')) {
            if ($testimonial->company_logo && Storage::disk('public')->exists($testimonial->company_logo)) {
                Storage::disk('public')->delete($testimonial->company_logo);
            }
            $data['company_logo'] = $request->file('company_logo')->store('testimonials/logos', 'public');
        }

        if ($request->hasFile('client_image')) {
            if ($testimonial->client_image && Storage::disk('public')->exists($testimonial->client_image)) {
                Storage::disk('public')->delete($testimonial->client_image);
            }
            $data['client_image'] = $request->file('client_image')->store('testimonials/clients', 'public');
        }

        $testimonial->update($data);

        return redirect()->route('admin.testimonials.index')
            ->with('success', 'Testimonial updated successfully.');
    }

    /**
     * Remove the specified testimonial from storage.
     */
    public function destroy(Testimonial $testimonial): RedirectResponse
    {
        if ($testimonial->company_logo && Storage::disk('public')->exists($testimonial->company_logo)) {
            Storage::disk('public')->delete($testimonial->company_logo);
        }

        if ($testimonial->client_image && Storage::disk('public')->exists($testimonial->client_image)) {
            Storage::disk('public')->delete($testimonial->client_image);
        }

        $testimonial->delete();

        return redirect()->route('admin.testimonials.index')
            ->with('success', 'Testimonial deleted successfully.');
    }

    /**
     * Toggle approval status of the testimonial.
     */
    public function toggleApproval(Request $request, Testimonial $testimonial): RedirectResponse|JsonResponse
    {
        $testimonial->is_approved = ! $testimonial->is_approved;
        $testimonial->status = $testimonial->is_approved ? 'approved' : 'pending';
        $testimonial->save();

        $message = $testimonial->is_approved
            ? 'Testimonial approved and will now display on front pages.'
            : 'Testimonial unapproved and hidden from front pages.';

        if ($request->wantsJson()) {
            return response()->json([
                'success' => true,
                'is_approved' => $testimonial->is_approved,
                'status' => $testimonial->status,
                'message' => $message,
            ]);
        }

        return redirect()->back()->with('success', $message);
    }
}
