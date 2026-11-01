<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class TestimonialController extends Controller
{
    public function index(): View
    {
        $testimonials = Testimonial::orderBy('display_order', 'asc')->orderBy('id', 'desc')->paginate(15);

        return view('admin.testimonials.index', compact('testimonials'));
    }

    public function create(): View
    {
        return view('admin.testimonials.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'client_name' => ['required', 'string', 'max:255'],
            'client_designation' => ['required', 'string', 'max:255'],
            'client_company' => ['required', 'string', 'max:255'],
            'quote' => ['required', 'string'],
            'publication_featured_in' => ['nullable', 'string', 'max:255'],
            'rating' => ['required', 'integer', 'min:1', 'max:5'],
            'display_order' => ['nullable', 'integer'],
            'is_published' => ['nullable', 'boolean'],
            'is_featured' => ['nullable', 'boolean'],
        ]);

        Testimonial::create([
            'client_name' => $validated['client_name'],
            'client_designation' => $validated['client_designation'],
            'client_company' => $validated['client_company'],
            'quote' => $validated['quote'],
            'publication_featured_in' => $validated['publication_featured_in'] ?? null,
            'rating' => $validated['rating'] ?? 5,
            'display_order' => $validated['display_order'] ?? 0,
            'is_published' => $request->boolean('is_published'),
            'is_featured' => $request->boolean('is_featured'),
        ]);

        return redirect()->route('admin.testimonials.index')->with('success', 'Testimonial created successfully.');
    }

    public function edit(Testimonial $testimonial): View
    {
        return view('admin.testimonials.edit', compact('testimonial'));
    }

    public function update(Request $request, Testimonial $testimonial): RedirectResponse
    {
        $validated = $request->validate([
            'client_name' => ['required', 'string', 'max:255'],
            'client_designation' => ['required', 'string', 'max:255'],
            'client_company' => ['required', 'string', 'max:255'],
            'quote' => ['required', 'string'],
            'publication_featured_in' => ['nullable', 'string', 'max:255'],
            'rating' => ['required', 'integer', 'min:1', 'max:5'],
            'display_order' => ['nullable', 'integer'],
            'is_published' => ['nullable', 'boolean'],
            'is_featured' => ['nullable', 'boolean'],
        ]);

        $testimonial->update([
            'client_name' => $validated['client_name'],
            'client_designation' => $validated['client_designation'],
            'client_company' => $validated['client_company'],
            'quote' => $validated['quote'],
            'publication_featured_in' => $validated['publication_featured_in'] ?? null,
            'rating' => $validated['rating'] ?? 5,
            'display_order' => $validated['display_order'] ?? 0,
            'is_published' => $request->boolean('is_published'),
            'is_featured' => $request->boolean('is_featured'),
        ]);

        return redirect()->route('admin.testimonials.index')->with('success', 'Testimonial updated successfully.');
    }

    public function destroy(Testimonial $testimonial): RedirectResponse
    {
        $testimonial->delete();

        return redirect()->route('admin.testimonials.index')->with('success', 'Testimonial deleted successfully.');
    }
}
