@extends('layouts.admin')

@section('title', 'Manage Case Studies')
@section('page_title', 'Case Studies & Client Results')

@section('content')

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h4 class="font-serif fs-4 mb-1">Case Studies Management</h4>
            <p class="text-muted small mb-0">Manage published client results, media placements, and metrics.</p>
        </div>
        <a href="{{ route('admin.case-studies.create') }}" class="btn btn-admin-gold">
            <i class="bi bi-plus-lg me-1"></i> Add New Case Study
        </a>
    </div>

    <div class="admin-card">
        <div class="table-responsive">
            <table class="table admin-table mb-0">
                <thead>
                    <tr>
                        <th>Client & Industry</th>
                        <th>Project Title</th>
                        <th>Publication</th>
                        <th>Core Metric</th>
                        <th>Status</th>
                        <th class="text-end">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($caseStudies as $case)
                        <tr>
                            <td>
                                <div class="fw-bold text-dark">{{ $case->client_name }}</div>
                                <div class="text-muted small">{{ $case->industry }}</div>
                            </td>
                            <td>
                                <div class="fw-semibold text-dark">{{ Str::limit($case->title, 40) }}</div>
                                @if($case->is_featured)
                                    <span class="badge bg-warning text-dark" style="font-size: 0.68rem;">Homepage Featured</span>
                                @endif
                            </td>
                            <td>
                                <span class="small">{{ $case->publication_name }}</span>
                            </td>
                            <td>
                                <span class="fw-bold text-warning small">{{ $case->results_metric }}</span>
                            </td>
                            <td>
                                @if($case->is_published)
                                    <span class="badge bg-success">Published</span>
                                @else
                                    <span class="badge bg-secondary">Draft</span>
                                @endif
                            </td>
                            <td class="text-end">
                                <div class="d-flex justify-content-end gap-1">
                                    <a href="{{ route('case-studies.detail', $case->slug) }}" target="_blank" class="btn btn-sm btn-outline-secondary" title="View Live Page">
                                        <i class="bi bi-eye"></i>
                                    </a>
                                    <a href="{{ route('admin.case-studies.edit', $case->id) }}" class="btn btn-sm btn-outline-dark" title="Edit">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    <form action="{{ route('admin.case-studies.destroy', $case->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this case study?');" class="d-inline">
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
                                No case studies published yet. Click "Add New Case Study" above.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if($caseStudies->hasPages())
            <div class="p-3 border-top">
                {{ $caseStudies->links('pagination::bootstrap-5') }}
            </div>
        @endif
    </div>

@endsection
