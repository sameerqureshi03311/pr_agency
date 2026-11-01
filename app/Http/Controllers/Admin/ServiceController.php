<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;

class ServiceController extends Controller
{
    public function index(): View
    {
        $services = Service::orderBy('display_order', 'asc')->orderBy('id', 'desc')->get();

        return view('admin.services.index', compact('services'));
    }

    public function create(): View
    {
        return view('admin.services.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'slug' => ['nullable', 'string', 'max:255', 'unique:services,slug'],
            'tagline' => ['nullable', 'string', 'max:255'],
            'badge' => ['nullable', 'string', 'max:100'],
            'icon' => ['nullable', 'string', 'max:100'],
            'short_description' => ['required', 'string'],
            'full_description' => ['required', 'string'],
            'features_text' => ['nullable', 'string'],
            'display_order' => ['nullable', 'integer'],
            'is_active' => ['nullable', 'boolean'],
            'is_featured' => ['nullable', 'boolean'],
            'seo_title' => ['nullable', 'string', 'max:255'],
            'seo_description' => ['nullable', 'string'],
        ]);

        $slug = ! empty($validated['slug']) ? Str::slug($validated['slug']) : Str::slug($validated['title']);
        // Ensure uniqueness
        if (Service::where('slug', $slug)->exists()) {
            $slug .= '-'.time();
        }

        // Parse features lines into array
        $features = [];
        if (! empty($validated['features_text'])) {
            $features = array_values(array_filter(array_map('trim', explode("\n", $validated['features_text']))));
        }

        Service::create([
            'title' => $validated['title'],
            'slug' => $slug,
            'tagline' => $validated['tagline'] ?? null,
            'badge' => $validated['badge'] ?? null,
            'icon' => $validated['icon'] ?? 'bi-journal-check',
            'short_description' => $validated['short_description'],
            'full_description' => $validated['full_description'],
            'features' => $features,
            'display_order' => $validated['display_order'] ?? 0,
            'is_active' => $request->boolean('is_active'),
            'is_featured' => $request->boolean('is_featured'),
            'seo_title' => $validated['seo_title'] ?? null,
            'seo_description' => $validated['seo_description'] ?? null,
        ]);

        return redirect()->route('admin.services.index')->with('success', 'Service created successfully.');
    }

    public function edit(Service $service): View
    {
        return view('admin.services.edit', compact('service'));
    }

    public function update(Request $request, Service $service): RedirectResponse
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'slug' => ['required', 'string', 'max:255', 'unique:services,slug,'.$service->id],
            'tagline' => ['nullable', 'string', 'max:255'],
            'badge' => ['nullable', 'string', 'max:100'],
            'icon' => ['nullable', 'string', 'max:100'],
            'short_description' => ['required', 'string'],
            'full_description' => ['required', 'string'],
            'features_text' => ['nullable', 'string'],
            'display_order' => ['nullable', 'integer'],
            'is_active' => ['nullable', 'boolean'],
            'is_featured' => ['nullable', 'boolean'],
            'seo_title' => ['nullable', 'string', 'max:255'],
            'seo_description' => ['nullable', 'string'],
        ]);

        $features = [];
        if (! empty($validated['features_text'])) {
            $features = array_values(array_filter(array_map('trim', explode("\n", $validated['features_text']))));
        }

        $service->update([
            'title' => $validated['title'],
            'slug' => Str::slug($validated['slug']),
            'tagline' => $validated['tagline'] ?? null,
            'badge' => $validated['badge'] ?? null,
            'icon' => $validated['icon'] ?? 'bi-journal-check',
            'short_description' => $validated['short_description'],
            'full_description' => $validated['full_description'],
            'features' => $features,
            'display_order' => $validated['display_order'] ?? 0,
            'is_active' => $request->boolean('is_active'),
            'is_featured' => $request->boolean('is_featured'),
            'seo_title' => $validated['seo_title'] ?? null,
            'seo_description' => $validated['seo_description'] ?? null,
        ]);

        return redirect()->route('admin.services.index')->with('success', 'Service updated successfully.');
    }

    public function destroy(Service $service): RedirectResponse
    {
        $service->delete();

        return redirect()->route('admin.services.index')->with('success', 'Service deleted successfully.');
    }
}
