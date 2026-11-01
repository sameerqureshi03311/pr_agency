<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CaseStudy;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;

class CaseStudyController extends Controller
{
    public function index(): View
    {
        $caseStudies = CaseStudy::orderBy('display_order', 'asc')->orderBy('id', 'desc')->paginate(15);

        return view('admin.case-studies.index', compact('caseStudies'));
    }

    public function create(): View
    {
        return view('admin.case-studies.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'slug' => ['nullable', 'string', 'max:255', 'unique:case_studies,slug'],
            'client_name' => ['required', 'string', 'max:255'],
            'client_designation' => ['nullable', 'string', 'max:255'],
            'industry' => ['required', 'string', 'max:255'],
            'publication_name' => ['required', 'string', 'max:255'],
            'publication_url' => ['nullable', 'url', 'max:255'],
            'publication_badge' => ['nullable', 'string', 'max:100'],
            'campaign_objective' => ['required', 'string'],
            'challenge' => ['nullable', 'string'],
            'strategy' => ['nullable', 'string'],
            'execution' => ['nullable', 'string'],
            'results_metric' => ['nullable', 'string', 'max:255'],
            'results_summary' => ['nullable', 'string'],
            'display_order' => ['nullable', 'integer'],
            'is_published' => ['nullable', 'boolean'],
            'is_featured' => ['nullable', 'boolean'],
            'seo_title' => ['nullable', 'string', 'max:255'],
            'seo_description' => ['nullable', 'string'],
        ]);

        $slug = ! empty($validated['slug']) ? Str::slug($validated['slug']) : Str::slug($validated['title']);
        if (CaseStudy::where('slug', $slug)->exists()) {
            $slug .= '-'.time();
        }

        CaseStudy::create([
            'title' => $validated['title'],
            'slug' => $slug,
            'client_name' => $validated['client_name'],
            'client_designation' => $validated['client_designation'] ?? null,
            'industry' => $validated['industry'],
            'publication_name' => $validated['publication_name'],
            'publication_url' => $validated['publication_url'] ?? null,
            'publication_badge' => $validated['publication_badge'] ?? null,
            'campaign_objective' => $validated['campaign_objective'],
            'challenge' => $validated['challenge'] ?? null,
            'strategy' => $validated['strategy'] ?? null,
            'execution' => $validated['execution'] ?? null,
            'results_metric' => $validated['results_metric'] ?? null,
            'results_summary' => $validated['results_summary'] ?? null,
            'display_order' => $validated['display_order'] ?? 0,
            'is_published' => $request->boolean('is_published'),
            'is_featured' => $request->boolean('is_featured'),
            'seo_title' => $validated['seo_title'] ?? null,
            'seo_description' => $validated['seo_description'] ?? null,
        ]);

        return redirect()->route('admin.case-studies.index')->with('success', 'Case study created successfully.');
    }

    public function edit(CaseStudy $caseStudy): View
    {
        return view('admin.case-studies.edit', compact('caseStudy'));
    }

    public function update(Request $request, CaseStudy $caseStudy): RedirectResponse
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'slug' => ['required', 'string', 'max:255', 'unique:case_studies,slug,'.$caseStudy->id],
            'client_name' => ['required', 'string', 'max:255'],
            'client_designation' => ['nullable', 'string', 'max:255'],
            'industry' => ['required', 'string', 'max:255'],
            'publication_name' => ['required', 'string', 'max:255'],
            'publication_url' => ['nullable', 'url', 'max:255'],
            'publication_badge' => ['nullable', 'string', 'max:100'],
            'campaign_objective' => ['required', 'string'],
            'challenge' => ['nullable', 'string'],
            'strategy' => ['nullable', 'string'],
            'execution' => ['nullable', 'string'],
            'results_metric' => ['nullable', 'string', 'max:255'],
            'results_summary' => ['nullable', 'string'],
            'display_order' => ['nullable', 'integer'],
            'is_published' => ['nullable', 'boolean'],
            'is_featured' => ['nullable', 'boolean'],
            'seo_title' => ['nullable', 'string', 'max:255'],
            'seo_description' => ['nullable', 'string'],
        ]);

        $caseStudy->update([
            'title' => $validated['title'],
            'slug' => Str::slug($validated['slug']),
            'client_name' => $validated['client_name'],
            'client_designation' => $validated['client_designation'] ?? null,
            'industry' => $validated['industry'],
            'publication_name' => $validated['publication_name'],
            'publication_url' => $validated['publication_url'] ?? null,
            'publication_badge' => $validated['publication_badge'] ?? null,
            'campaign_objective' => $validated['campaign_objective'],
            'challenge' => $validated['challenge'] ?? null,
            'strategy' => $validated['strategy'] ?? null,
            'execution' => $validated['execution'] ?? null,
            'results_metric' => $validated['results_metric'] ?? null,
            'results_summary' => $validated['results_summary'] ?? null,
            'display_order' => $validated['display_order'] ?? 0,
            'is_published' => $request->boolean('is_published'),
            'is_featured' => $request->boolean('is_featured'),
            'seo_title' => $validated['seo_title'] ?? null,
            'seo_description' => $validated['seo_description'] ?? null,
        ]);

        return redirect()->route('admin.case-studies.index')->with('success', 'Case study updated successfully.');
    }

    public function destroy(CaseStudy $caseStudy): RedirectResponse
    {
        $caseStudy->delete();

        return redirect()->route('admin.case-studies.index')->with('success', 'Case study deleted successfully.');
    }
}
