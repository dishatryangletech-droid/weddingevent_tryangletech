<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\FooterSetting;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class FooterSettingController extends Controller
{
    /**
     * Display the footer settings page.
     */
    public function index(): View
    {
        $footerSetting = FooterSetting::getSettings();

        return view('backend.footer.index', compact('footerSetting'));
    }

    /**
     * Update the footer settings.
     */
    public function update(Request $request): RedirectResponse
    {
        $footerSetting = FooterSetting::getSettings();

        $validated = $request->validate([
            'logo' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,svg,webp,avif', 'max:4096'],
            'about_text' => ['nullable', 'string', 'max:1000'],
            'social_heading' => ['nullable', 'string', 'max:255'],
            'facebook_url' => ['nullable', 'string', 'max:255'],
            'linkedin_url' => ['nullable', 'string', 'max:255'],
            'twitter_url' => ['nullable', 'string', 'max:255'],
            'instagram_url' => ['nullable', 'string', 'max:255'],
            'youtube_url' => ['nullable', 'string', 'max:255'],
            'quick_links_heading' => ['nullable', 'string', 'max:255'],
            'services_heading' => ['nullable', 'string', 'max:255'],
            'services_view_all_text' => ['nullable', 'string', 'max:255'],
            'services_view_all_url' => ['nullable', 'string', 'max:255'],
            'services_links' => ['nullable', 'array'],
            'services_links.*.title' => ['nullable', 'string', 'max:255'],
            'services_links.*.url' => ['nullable', 'string', 'max:255'],
            'contact_heading' => ['nullable', 'string', 'max:255'],
            'email_label' => ['nullable', 'string', 'max:255'],
            'email' => ['nullable', 'string', 'max:255'],
            'phone_label' => ['nullable', 'string', 'max:255'],
            'phone' => ['nullable', 'string', 'max:255'],
            'copyright_text' => ['nullable', 'string', 'max:255'],
            'copyright_link_text' => ['nullable', 'string', 'max:255'],
            'copyright_link_url' => ['nullable', 'string', 'max:255'],
            'licenses_text' => ['nullable', 'string', 'max:255'],
            'licenses_url' => ['nullable', 'string', 'max:255'],
            'style_guide_text' => ['nullable', 'string', 'max:255'],
            'style_guide_url' => ['nullable', 'string', 'max:255'],
            'status' => ['required', 'in:active,deactive'],
        ]);

        // Process logo upload
        if ($request->hasFile('logo')) {
            if ($footerSetting->logo && ! str_starts_with($footerSetting->logo, 'assets/') && ! str_starts_with($footerSetting->logo, 'images/')) {
                Storage::delete($footerSetting->logo);
            }
            $validated['logo'] = $request->file('logo')->store('footer', 'public');
        } else {
            unset($validated['logo']);
        }

        // Clean services links
        if (isset($validated['services_links'])) {
            $cleaned = [];
            foreach ($validated['services_links'] as $item) {
                if (! empty($item['title'])) {
                    $cleaned[] = [
                        'title' => trim($item['title']),
                        'url' => ! empty($item['url']) ? trim($item['url']) : '#',
                    ];
                }
            }
            $validated['services_links'] = $cleaned;
        }

        $footerSetting->update($validated);

        return redirect()->route('admin.footer.index')->with('success', 'Footer settings updated successfully!');
    }
}
