@extends('layouts.admin')

@section('title', 'Manage Page Content')
@section('page_title', 'Website Copy & Section Content')

@section('content')

    <div class="mb-4">
        <h4 class="font-serif fs-4 mb-1">Page Copy & Section Management</h4>
        <p class="text-muted small mb-0">Update key marketing headlines, founder statements, and statistics without editing code.</p>
    </div>

    <form action="{{ route('admin.content.update') }}" method="POST">
        @csrf

        @foreach($contents as $section => $items)
            <div class="admin-card mb-4">
                <div class="admin-card-header bg-light">
                    <h5 class="admin-card-title text-capitalize d-flex align-items-center gap-2">
                        <i class="bi bi-pencil-square text-warning"></i>
                        <span>Section: {{ str_replace('_', ' ', $section) }}</span>
                    </h5>
                </div>
                <div class="admin-card-body">
                    <div class="row g-3">
                        @foreach($items as $item)
                            <div class="{{ strlen($item->value) > 80 ? 'col-12' : 'col-md-6' }}">
                                <label for="content_{{ $item->id }}" class="form-label small fw-bold text-dark">
                                    {{ $item->label ?: ucwords(str_replace('_', ' ', $item->key)) }}
                                    <span class="text-muted fw-normal" style="font-size: 0.72rem;">({{ $item->key }})</span>
                                </label>

                                @if(strlen($item->value) > 120 || in_array($item->key, ['subtitle', 'body', 'heading']))
                                    <textarea class="form-control" id="content_{{ $item->id }}" name="content[{{ $item->id }}]" rows="{{ strlen($item->value) > 200 ? 4 : 2 }}">{{ old('content.' . $item->id, $item->value) }}</textarea>
                                @else
                                    <input type="text" class="form-control" id="content_{{ $item->id }}" name="content[{{ $item->id }}]" value="{{ old('content.' . $item->id, $item->value) }}">
                                @endif
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        @endforeach

        <div class="sticky-bottom bg-white p-3 border rounded shadow-sm d-flex justify-content-between align-items-center">
            <span class="text-muted small"><i class="bi bi-info-circle me-1"></i> Changes will immediately appear on the live website.</span>
            <button type="submit" class="btn btn-admin-gold px-4">
                <i class="bi bi-check2 me-1"></i> Save All Page Content
            </button>
        </div>
    </form>

@endsection
