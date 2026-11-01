@extends('layouts.admin')

@section('title', 'Add New Service')
@section('page_title', 'Create Service Offering')

@section('content')

    <div class="mb-4">
        <a href="{{ route('admin.services.index') }}" class="btn btn-sm btn-outline-secondary">
            <i class="bi bi-arrow-left me-1"></i> Back to Services
        </a>
    </div>

    <div class="admin-card">
        <div class="admin-card-header">
            <h5 class="admin-card-title">New Service Details</h5>
        </div>
        <div class="admin-card-body">
            <form action="{{ route('admin.services.store') }}" method="POST">
                @csrf

                <div class="row g-3 mb-3">
                    <div class="col-md-6">
                        <label for="title" class="form-label small fw-bold">Service Title *</label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title') }}" placeholder="e.g. Featured Profiles" required>
                    </div>

                    <div class="col-md-6">
                        <label for="slug" class="form-label small fw-bold">Slug (URL identifier)</label>
                        <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" value="{{ old('slug') }}" placeholder="Leave empty to auto-generate">
                    </div>
                </div>

                <div class="row g-3 mb-3">
                    <div class="col-md-4">
                        <label for="tagline" class="form-label small fw-bold">Editorial Tagline</label>
                        <input type="text" class="form-control" id="tagline" name="tagline" value="{{ old('tagline') }}" placeholder="e.g. In-depth founder spotlight">
                    </div>

                    <div class="col-md-4">
                        <label for="badge" class="form-label small fw-bold">Badge / Label</label>
                        <input type="text" class="form-control" id="badge" name="badge" value="{{ old('badge') }}" placeholder="e.g. Signature Service">
                    </div>

                    <div class="col-md-4">
                        <label for="icon" class="form-label small fw-bold">Bootstrap Icon Class</label>
                        <input type="text" class="form-control" id="icon" name="icon" value="{{ old('icon', 'bi-person-badge') }}" placeholder="bi-person-badge">
                    </div>
                </div>

                <div class="mb-3">
                    <label for="short_description" class="form-label small fw-bold">Short Summary (Cards & Previews) *</label>
                    <textarea class="form-control @error('short_description') is-invalid @enderror" id="short_description" name="short_description" rows="3" required>{{ old('short_description') }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="full_description" class="form-label small fw-bold">Full In-Depth Description (HTML allowed) *</label>
                    <textarea class="form-control @error('full_description') is-invalid @enderror" id="full_description" name="full_description" rows="6" required>{{ old('full_description') }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="features_text" class="form-label small fw-bold">Key Inclusions / Features (One per line)</label>
                    <textarea class="form-control" id="features_text" name="features_text" rows="4" placeholder="Deep-dive founder interview&#10;Editorial angle development&#10;Full client pre-approval">{{ old('features_text') }}</textarea>
                </div>

                <div class="row g-3 mb-3">
                    <div class="col-md-4">
                        <label for="display_order" class="form-label small fw-bold">Display Order</label>
                        <input type="number" class="form-control" id="display_order" name="display_order" value="{{ old('display_order', 0) }}">
                    </div>

                    <div class="col-md-4 d-flex align-items-center pt-4">
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" id="is_active" name="is_active" value="1" {{ old('is_active', 1) ? 'checked' : '' }}>
                            <label class="form-check-label fw-bold small" for="is_active">Publish (Active)</label>
                        </div>
                    </div>

                    <div class="col-md-4 d-flex align-items-center pt-4">
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" id="is_featured" name="is_featured" value="1" {{ old('is_featured', 1) ? 'checked' : '' }}>
                            <label class="form-check-label fw-bold small" for="is_featured">Feature on Homepage</label>
                        </div>
                    </div>
                </div>

                <div class="border-top pt-3 mt-4 mb-3">
                    <h6 class="fw-bold">SEO Metadata (Optional)</h6>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label for="seo_title" class="form-label small">SEO Page Title</label>
                            <input type="text" class="form-control" id="seo_title" name="seo_title" value="{{ old('seo_title') }}">
                        </div>
                        <div class="col-md-6">
                            <label for="seo_description" class="form-label small">SEO Meta Description</label>
                            <input type="text" class="form-control" id="seo_description" name="seo_description" value="{{ old('seo_description') }}">
                        </div>
                    </div>
                </div>

                <div class="mt-4">
                    <button type="submit" class="btn btn-admin-gold px-4">
                        <i class="bi bi-check2 me-1"></i> Save Service
                    </button>
                    <a href="{{ route('admin.services.index') }}" class="btn btn-outline-secondary ms-2">Cancel</a>
                </div>
            </form>
        </div>
    </div>

@endsection
