@extends('layouts.admin')

@section('title', 'Manage Inquiries')
@section('page_title', 'Placement Inquiries & Leads')

@section('content')

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h4 class="font-serif fs-4 mb-1">Inquiries Management</h4>
            <p class="text-muted small mb-0">Track all incoming consultation requests, change statuses, and record internal notes.</p>
        </div>
    </div>

    <!-- Status Filter Tabs -->
    <div class="d-flex flex-wrap gap-2 mb-4">
        <a href="{{ route('admin.enquiries.index') }}" class="btn btn-sm {{ !request('status') ? 'btn-dark' : 'btn-outline-secondary' }}">
            All ({{ $counts['all'] }})
        </a>
        <a href="{{ route('admin.enquiries.index', ['status' => 'new']) }}" class="btn btn-sm {{ request('status') === 'new' ? 'btn-primary' : 'btn-outline-primary' }}">
            New ({{ $counts['new'] }})
        </a>
        <a href="{{ route('admin.enquiries.index', ['status' => 'contacted']) }}" class="btn btn-sm {{ request('status') === 'contacted' ? 'btn-info' : 'btn-outline-info' }}">
            Contacted ({{ $counts['contacted'] }})
        </a>
        <a href="{{ route('admin.enquiries.index', ['status' => 'in_progress']) }}" class="btn btn-sm {{ request('status') === 'in_progress' ? 'btn-warning' : 'btn-outline-warning' }}">
            In Progress ({{ $counts['in_progress'] }})
        </a>
        <a href="{{ route('admin.enquiries.index', ['status' => 'converted']) }}" class="btn btn-sm {{ request('status') === 'converted' ? 'btn-success' : 'btn-outline-success' }}">
            Converted ({{ $counts['converted'] }})
        </a>
        <a href="{{ route('admin.enquiries.index', ['status' => 'closed']) }}" class="btn btn-sm {{ request('status') === 'closed' ? 'btn-secondary' : 'btn-outline-secondary' }}">
            Closed ({{ $counts['closed'] }})
        </a>
    </div>

    <!-- Search Bar -->
    <div class="admin-card mb-4">
        <div class="p-3">
            <form action="{{ route('admin.enquiries.index') }}" method="GET" class="row g-2">
                @if(request('status'))
                    <input type="hidden" name="status" value="{{ request('status') }}">
                @endif
                <div class="col-md-5">
                    <input type="text" name="search" value="{{ request('search') }}" class="form-control form-control-sm" placeholder="Search by name, email, or company...">
                </div>
                <div class="col-md-3">
                    <input type="date" name="date" value="{{ request('date') }}" class="form-control form-control-sm">
                </div>
                <div class="col-md-4 d-flex gap-2">
                    <button type="submit" class="btn btn-sm btn-dark">
                        <i class="bi bi-search me-1"></i> Filter
                    </button>
                    @if(request('search') || request('date'))
                        <a href="{{ route('admin.enquiries.index', ['status' => request('status')]) }}" class="btn btn-sm btn-outline-secondary">Reset</a>
                    @endif
                </div>
            </form>
        </div>
    </div>

    <!-- Inquiries List Table -->
    <div class="admin-card">
        <div class="table-responsive">
            <table class="table admin-table mb-0">
                <thead>
                    <tr>
                        <th>Client Details</th>
                        <th>Service / Interest</th>
                        <th>Budget</th>
                        <th>Status</th>
                        <th>Submission Date</th>
                        <th class="text-end">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($enquiries as $enquiry)
                        <tr class="{{ $enquiry->status === 'new' ? 'table-warning bg-opacity-10' : '' }}">
                            <td>
                                <div class="fw-bold text-dark">{{ $enquiry->name }}</div>
                                <div class="text-muted small">
                                    <a href="mailto:{{ $enquiry->email }}" class="text-muted text-decoration-none">{{ $enquiry->email }}</a>
                                    @if($enquiry->company)
                                        • {{ $enquiry->company }}
                                    @endif
                                </div>
                            </td>
                            <td>
                                <div class="fw-semibold text-dark small">{{ $enquiry->service_name ?: ($enquiry->service?->title ?: 'General Consultation') }}</div>
                                @if($enquiry->target_publication)
                                    <div class="text-muted" style="font-size: 0.72rem;">Target: {{ $enquiry->target_publication }}</div>
                                @endif
                            </td>
                            <td>
                                <span class="small">{{ $enquiry->budget_range ?: 'Not specified' }}</span>
                            </td>
                            <td>
                                <span class="{{ $enquiry->status_badge }}">
                                    {{ ucfirst(str_replace('_', ' ', $enquiry->status)) }}
                                </span>
                            </td>
                            <td>
                                <span class="text-muted small">{{ $enquiry->created_at->format('M d, Y • h:i A') }}</span>
                            </td>
                            <td class="text-end">
                                <a href="{{ route('admin.enquiries.show', $enquiry->id) }}" class="btn btn-sm btn-outline-dark">
                                    <i class="bi bi-eye me-1"></i> View & Manage
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center py-4 text-muted">
                                No inquiries match the selected filter.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if($enquiries->hasPages())
            <div class="p-3 border-top">
                {{ $enquiries->links('pagination::bootstrap-5') }}
            </div>
        @endif
    </div>

@endsection
