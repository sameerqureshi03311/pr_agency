@extends('layouts.admin')

@section('title', 'Manage FAQs')
@section('page_title', 'Frequently Asked Questions & Standards')

@section('content')

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h4 class="font-serif fs-4 mb-1">FAQ Management</h4>
            <p class="text-muted small mb-0">Create and edit questions, policy answers, and order.</p>
        </div>
        <a href="{{ route('admin.faqs.create') }}" class="btn btn-admin-gold">
            <i class="bi bi-plus-lg me-1"></i> Add New FAQ
        </a>
    </div>

    <div class="admin-card">
        <div class="table-responsive">
            <table class="table admin-table mb-0">
                <thead>
                    <tr>
                        <th style="width: 60px;">Order</th>
                        <th>Category</th>
                        <th>Question</th>
                        <th>Answer Snippet</th>
                        <th>Status</th>
                        <th class="text-end">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($faqs as $faq)
                        <tr>
                            <td>
                                <span class="badge bg-light text-dark border">{{ $faq->display_order }}</span>
                            </td>
                            <td>
                                <span class="badge bg-light text-dark border">{{ $faq->category }}</span>
                            </td>
                            <td>
                                <div class="fw-bold text-dark">{{ $faq->question }}</div>
                            </td>
                            <td>
                                <span class="small text-muted">{{ Str::limit($faq->answer, 65) }}</span>
                            </td>
                            <td>
                                @if($faq->is_published)
                                    <span class="badge bg-success">Published</span>
                                @else
                                    <span class="badge bg-secondary">Draft</span>
                                @endif
                            </td>
                            <td class="text-end">
                                <div class="d-flex justify-content-end gap-1">
                                    <a href="{{ route('admin.faqs.edit', $faq->id) }}" class="btn btn-sm btn-outline-dark" title="Edit">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    <form action="{{ route('admin.faqs.destroy', $faq->id) }}" method="POST" onsubmit="return confirm('Delete this FAQ?');" class="d-inline">
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
                                No FAQs created yet.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if($faqs->hasPages())
            <div class="p-3 border-top">
                {{ $faqs->links('pagination::bootstrap-5') }}
            </div>
        @endif
    </div>

@endsection
