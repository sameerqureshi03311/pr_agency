@extends('layouts.admin')

@section('title', 'Edit Case Study: ' . $caseStudy->client_name)
@section('page_title', 'Edit Case Study')

@section('content')

    <div class="mb-4">
        <a href="{{ route('admin.case-studies.index') }}" class="btn btn-sm btn-outline-secondary">
            <i class="bi bi-arrow-left me-1"></i> Back to Case Studies
        </a>
    </div>

    <div class="admin-card">
        <div class="admin-card-header">
            <h5 class="admin-card-title">Editing: {{ $caseStudy->title }}</h5>
        </div>
        <div class="admin-card-body">
            <form action="{{ route('admin.case-studies.update', $caseStudy->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="row g-3 mb-3">
                    <div class="col-md-8">
                        <label for="title" class="form-label small fw-bold">Case Study Headline / Title *</label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title', $caseStudy->title) }}" required>
                    </div>

                    <div class="col-md-4">
                        <label for="slug" class="form-label small fw-bold">Slug (URL) *</label>
                        <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" value="{{ old('slug', $caseStudy->slug) }}" required>
                    </div>
                </div>

                <div class="row g-3 mb-3">
                    <div class="col-md-4">
                        <label for="client_name" class="form-label small fw-bold">Client / Executive Name *</label>
                        <input type="text" class="form-control @error('client_name') is-invalid @enderror" id="client_name" name="client_name" value="{{ old('client_name', $caseStudy->client_name) }}" required>
                    </div>

                    <div class="col-md-4">
                        <label for="client_designation" class="form-label small fw-bold">Executive Title & Company</label>
                        <input type="text" class="form-control" id="client_designation" name="client_designation" value="{{ old('client_designation', $caseStudy->client_designation) }}">
                    </div>

                    <div class="col-md-4">
                        <label for="industry" class="form-label small fw-bold">Industry / Category *</label>
                        <input type="text" class="form-control @error('industry') is-invalid @enderror" id="industry" name="industry" value="{{ old('industry', $caseStudy->industry) }}" required>
                    </div>
                </div>

                <div class="row g-3 mb-3">
                    <div class="col-md-4">
                        <label for="publication_name" class="form-label small fw-bold">Publication Outlets *</label>
                        <input type="text" class="form-control @error('publication_name') is-invalid @enderror" id="publication_name" name="publication_name" value="{{ old('publication_name', $caseStudy->publication_name) }}" required>
                    </div>

                    <div class="col-md-4">
                        <label for="publication_badge" class="form-label small fw-bold">Publication Badge / Tier</label>
                        <input type="text" class="form-control" id="publication_badge" name="publication_badge" value="{{ old('publication_badge', $caseStudy->publication_badge) }}">
                    </div>

                    <div class="col-md-4">
                        <label for="publication_url" class="form-label small fw-bold">Live Article URL</label>
                        <input type="url" class="form-control" id="publication_url" name="publication_url" value="{{ old('publication_url', $caseStudy->publication_url) }}">
                    </div>
                </div>

                <div class="row g-3 mb-3">
                    <div class="col-md-6">
                        <label for="results_metric" class="form-label small fw-bold">Key Result Metric</label>
                        <input type="text" class="form-control" id="results_metric" name="results_metric" value="{{ old('results_metric', $caseStudy->results_metric) }}">
                    </div>
                    <div class="col-md-6">
                        <label for="results_summary" class="form-label small fw-bold">Outcome Summary</label>
                        <input type="text" class="form-control" id="results_summary" name="results_summary" value="{{ old('results_summary', $caseStudy->results_summary) }}">
                    </div>
                </div>

                <div class="mb-3">
                    <label for="campaign_objective" class="form-label small fw-bold">Campaign Objective *</label>
                    <textarea class="form-control @error('campaign_objective') is-invalid @enderror" id="campaign_objective" name="campaign_objective" rows="3" required>{{ old('campaign_objective', $caseStudy->campaign_objective) }}</textarea>
                </div>

                <div class="row g-3 mb-3">
                    <div class="col-md-4">
                        <label for="challenge" class="form-label small fw-bold">The Challenge</label>
                        <textarea class="form-control" id="challenge" name="challenge" rows="4">{{ old('challenge', $caseStudy->challenge) }}</textarea>
                    </div>
                    <div class="col-md-4">
                        <label for="strategy" class="form-label small fw-bold">Editorial Strategy</label>
                        <textarea class="form-control" id="strategy" name="strategy" rows="4">{{ old('strategy', $caseStudy->strategy) }}</textarea>
                    </div>
                    <div class="col-md-4">
                        <label for="execution" class="form-label small fw-bold">Execution</label>
                        <textarea class="form-control" id="execution" name="execution" rows="4">{{ old('execution', $caseStudy->execution) }}</textarea>
                    </div>
                </div>

                <div class="row g-3 mb-3">
                    <div class="col-md-4">
                        <label for="display_order" class="form-label small fw-bold">Display Order</label>
                        <input type="number" class="form-control" id="display_order" name="display_order" value="{{ old('display_order', $caseStudy->display_order) }}">
                    </div>

                    <div class="col-md-4 d-flex align-items-center pt-4">
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" id="is_published" name="is_published" value="1" {{ old('is_published', $caseStudy->is_published) ? 'checked' : '' }}>
                            <label class="form-check-label fw-bold small" for="is_published">Publish Online</label>
                        </div>
                    </div>

                    <div class="col-md-4 d-flex align-items-center pt-4">
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" id="is_featured" name="is_featured" value="1" {{ old('is_featured', $caseStudy->is_featured) ? 'checked' : '' }}>
                            <label class="form-check-label fw-bold small" for="is_featured">Feature on Homepage</label>
                        </div>
                    </div>
                </div>

                <div class="border-top pt-3 mt-4 mb-3">
                    <h6 class="fw-bold">SEO Fields (Optional)</h6>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label for="seo_title" class="form-label small">SEO Page Title</label>
                            <input type="text" class="form-control" id="seo_title" name="seo_title" value="{{ old('seo_title', $caseStudy->seo_title) }}">
                        </div>
                        <div class="col-md-6">
                            <label for="seo_description" class="form-label small">SEO Meta Description</label>
                            <input type="text" class="form-control" id="seo_description" name="seo_description" value="{{ old('seo_description', $caseStudy->seo_description) }}">
                        </div>
                    </div>
                </div>

                <div class="mt-4">
                    <button type="submit" class="btn btn-admin-gold px-4">
                        <i class="bi bi-check2 me-1"></i> Update Case Study
                    </button>
                    <a href="{{ route('admin.case-studies.index') }}" class="btn btn-outline-secondary ms-2">Cancel</a>
                </div>
            </form>
        </div>
    </div>

@endsection
