@extends('layouts.admin')

@section('title', 'Add FAQ')
@section('page_title', 'Create FAQ Item')

@section('content')

    <div class="mb-4">
        <a href="{{ route('admin.faqs.index') }}" class="btn btn-sm btn-outline-secondary">
            <i class="bi bi-arrow-left me-1"></i> Back to FAQs
        </a>
    </div>

    <div class="admin-card">
        <div class="admin-card-header">
            <h5 class="admin-card-title">New Question & Answer</h5>
        </div>
        <div class="admin-card-body">
            <form action="{{ route('admin.faqs.store') }}" method="POST">
                @csrf

                <div class="row g-3 mb-3">
                    <div class="col-md-6">
                        <label for="category" class="form-label small fw-bold">Category *</label>
                        <input type="text" class="form-control @error('category') is-invalid @enderror" id="category" name="category" value="{{ old('category', 'General') }}" placeholder="e.g. Publications & Process, Editorial Standards" required>
                    </div>

                    <div class="col-md-3">
                        <label for="display_order" class="form-label small fw-bold">Display Order</label>
                        <input type="number" class="form-control" id="display_order" name="display_order" value="{{ old('display_order', 0) }}">
                    </div>

                    <div class="col-md-3 d-flex align-items-center pt-4">
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" id="is_published" name="is_published" value="1" {{ old('is_published', 1) ? 'checked' : '' }}>
                            <label class="form-check-label fw-bold small" for="is_published">Publish Online</label>
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="question" class="form-label small fw-bold">Question *</label>
                    <input type="text" class="form-control @error('question') is-invalid @enderror" id="question" name="question" value="{{ old('question') }}" placeholder="e.g. Do I get to review and approve the article before it goes live?" required>
                </div>

                <div class="mb-3">
                    <label for="answer" class="form-label small fw-bold">Answer *</label>
                    <textarea class="form-control @error('answer') is-invalid @enderror" id="answer" name="answer" rows="5" required>{{ old('answer') }}</textarea>
                </div>

                <div class="mt-4">
                    <button type="submit" class="btn btn-admin-gold px-4">
                        <i class="bi bi-check2 me-1"></i> Save FAQ
                    </button>
                    <a href="{{ route('admin.faqs.index') }}" class="btn btn-outline-secondary ms-2">Cancel</a>
                </div>
            </form>
        </div>
    </div>

@endsection
