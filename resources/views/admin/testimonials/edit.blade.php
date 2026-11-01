@extends('layouts.admin')

@section('title', 'Edit Testimonial: ' . $testimonial->client_name)
@section('page_title', 'Edit Testimonial')

@section('content')

    <div class="mb-4">
        <a href="{{ route('admin.testimonials.index') }}" class="btn btn-sm btn-outline-secondary">
            <i class="bi bi-arrow-left me-1"></i> Back to Testimonials
        </a>
    </div>

    <div class="admin-card">
        <div class="admin-card-header">
            <h5 class="admin-card-title">Editing: {{ $testimonial->client_name }}</h5>
        </div>
        <div class="admin-card-body">
            <form action="{{ route('admin.testimonials.update', $testimonial->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="row g-3 mb-3">
                    <div class="col-md-4">
                        <label for="client_name" class="form-label small fw-bold">Client Name *</label>
                        <input type="text" class="form-control @error('client_name') is-invalid @enderror" id="client_name" name="client_name" value="{{ old('client_name', $testimonial->client_name) }}" required>
                    </div>

                    <div class="col-md-4">
                        <label for="client_designation" class="form-label small fw-bold">Designation / Role *</label>
                        <input type="text" class="form-control @error('client_designation') is-invalid @enderror" id="client_designation" name="client_designation" value="{{ old('client_designation', $testimonial->client_designation) }}" required>
                    </div>

                    <div class="col-md-4">
                        <label for="client_company" class="form-label small fw-bold">Company / Organization *</label>
                        <input type="text" class="form-control @error('client_company') is-invalid @enderror" id="client_company" name="client_company" value="{{ old('client_company', $testimonial->client_company) }}" required>
                    </div>
                </div>

                <div class="row g-3 mb-3">
                    <div class="col-md-8">
                        <label for="publication_featured_in" class="form-label small fw-bold">Publication Tag / Placement Ref (Optional)</label>
                        <input type="text" class="form-control" id="publication_featured_in" name="publication_featured_in" value="{{ old('publication_featured_in', $testimonial->publication_featured_in) }}">
                    </div>

                    <div class="col-md-4">
                        <label for="rating" class="form-label small fw-bold">Star Rating (1-5)</label>
                        <select class="form-select" id="rating" name="rating">
                            <option value="5" {{ old('rating', $testimonial->rating) == 5 ? 'selected' : '' }}>5 Stars (★★★★★)</option>
                            <option value="4" {{ old('rating', $testimonial->rating) == 4 ? 'selected' : '' }}>4 Stars (★★★★☆)</option>
                            <option value="3" {{ old('rating', $testimonial->rating) == 3 ? 'selected' : '' }}>3 Stars (★★★☆☆)</option>
                        </select>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="quote" class="form-label small fw-bold">Client Quote / Testimonial Text *</label>
                    <textarea class="form-control @error('quote') is-invalid @enderror" id="quote" name="quote" rows="4" required>{{ old('quote', $testimonial->quote) }}</textarea>
                </div>

                <div class="row g-3 mb-3">
                    <div class="col-md-4">
                        <label for="display_order" class="form-label small fw-bold">Display Order</label>
                        <input type="number" class="form-control" id="display_order" name="display_order" value="{{ old('display_order', $testimonial->display_order) }}">
                    </div>

                    <div class="col-md-4 d-flex align-items-center pt-4">
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" id="is_published" name="is_published" value="1" {{ old('is_published', $testimonial->is_published) ? 'checked' : '' }}>
                            <label class="form-check-label fw-bold small" for="is_published">Publish Online</label>
                        </div>
                    </div>

                    <div class="col-md-4 d-flex align-items-center pt-4">
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" id="is_featured" name="is_featured" value="1" {{ old('is_featured', $testimonial->is_featured) ? 'checked' : '' }}>
                            <label class="form-check-label fw-bold small" for="is_featured">Feature on Homepage</label>
                        </div>
                    </div>
                </div>

                <div class="mt-4">
                    <button type="submit" class="btn btn-admin-gold px-4">
                        <i class="bi bi-check2 me-1"></i> Update Testimonial
                    </button>
                    <a href="{{ route('admin.testimonials.index') }}" class="btn btn-outline-secondary ms-2">Cancel</a>
                </div>
            </form>
        </div>
    </div>

@endsection
