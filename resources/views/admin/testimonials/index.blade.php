@extends('layouts.admin')

@section('title', 'Manage Testimonials')
@section('page_title', 'Client Reviews & Social Proof')

@section('content')

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h4 class="font-serif fs-4 mb-1">Testimonials Management</h4>
            <p class="text-muted small mb-0">Manage verified founder quotes and executive feedback.</p>
        </div>
        <a href="{{ route('admin.testimonials.create') }}" class="btn btn-admin-gold">
            <i class="bi bi-plus-lg me-1"></i> Add Testimonial
        </a>
    </div>

    <div class="admin-card">
        <div class="table-responsive">
            <table class="table admin-table mb-0">
                <thead>
                    <tr>
                        <th>Client & Company</th>
                        <th>Quote Snippet</th>
                        <th>Publication / Outlet Tag</th>
                        <th>Rating</th>
                        <th>Status</th>
                        <th class="text-end">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($testimonials as $testi)
                        <tr>
                            <td>
                                <div class="fw-bold text-dark">{{ $testi->client_name }}</div>
                                <div class="text-muted small">{{ $testi->client_designation }}, {{ $testi->client_company }}</div>
                            </td>
                            <td>
                                <span class="small text-muted">"{{ Str::limit($testi->quote, 60) }}"</span>
                            </td>
                            <td>
                                <span class="badge bg-light text-dark border">{{ $testi->publication_featured_in ?: 'General' }}</span>
                            </td>
                            <td>
                                <span class="text-warning">
                                    @for($i = 0; $i < $testi->rating; $i++)
                                        <i class="bi bi-star-fill"></i>
                                    @endfor
                                </span>
                            </td>
                            <td>
                                @if($testi->is_published)
                                    <span class="badge bg-success">Published</span>
                                @else
                                    <span class="badge bg-secondary">Draft</span>
                                @endif
                            </td>
                            <td class="text-end">
                                <div class="d-flex justify-content-end gap-1">
                                    <a href="{{ route('admin.testimonials.edit', $testi->id) }}" class="btn btn-sm btn-outline-dark" title="Edit">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    <form action="{{ route('admin.testimonials.destroy', $testi->id) }}" method="POST" onsubmit="return confirm('Delete this testimonial?');" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger" title="Delete">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center py-4 text-muted">
                                No testimonials added yet. Click "Add Testimonial" above.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if($testimonials->hasPages())
            <div class="p-3 border-top">
                {{ $testimonials->links('pagination::bootstrap-5') }}
            </div>
        @endif
    </div>

@endsection
