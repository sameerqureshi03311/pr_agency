<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class FaqController extends Controller
{
    public function index(): View
    {
        $faqs = Faq::orderBy('category', 'asc')->orderBy('display_order', 'asc')->paginate(20);

        return view('admin.faqs.index', compact('faqs'));
    }

    public function create(): View
    {
        return view('admin.faqs.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'category' => ['required', 'string', 'max:255'],
            'question' => ['required', 'string', 'max:500'],
            'answer' => ['required', 'string'],
            'display_order' => ['nullable', 'integer'],
            'is_published' => ['nullable', 'boolean'],
        ]);

        Faq::create([
            'category' => $validated['category'],
            'question' => $validated['question'],
            'answer' => $validated['answer'],
            'display_order' => $validated['display_order'] ?? 0,
            'is_published' => $request->boolean('is_published'),
        ]);

        return redirect()->route('admin.faqs.index')->with('success', 'FAQ item created successfully.');
    }

    public function edit(Faq $faq): View
    {
        return view('admin.faqs.edit', compact('faq'));
    }

    public function update(Request $request, Faq $faq): RedirectResponse
    {
        $validated = $request->validate([
            'category' => ['required', 'string', 'max:255'],
            'question' => ['required', 'string', 'max:500'],
            'answer' => ['required', 'string'],
            'display_order' => ['nullable', 'integer'],
            'is_published' => ['nullable', 'boolean'],
        ]);

        $faq->update([
            'category' => $validated['category'],
            'question' => $validated['question'],
            'answer' => $validated['answer'],
            'display_order' => $validated['display_order'] ?? 0,
            'is_published' => $request->boolean('is_published'),
        ]);

        return redirect()->route('admin.faqs.index')->with('success', 'FAQ item updated successfully.');
    }

    public function destroy(Faq $faq): RedirectResponse
    {
        $faq->delete();

        return redirect()->route('admin.faqs.index')->with('success', 'FAQ item deleted successfully.');
    }
}
