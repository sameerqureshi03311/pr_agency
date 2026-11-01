@extends('layouts.admin')

@section('title', 'Inquiry Details: ' . $enquiry->name)
@section('page_title', 'Inquiry Details & Case File')

@section('content')

    <div class="mb-4 d-flex justify-content-between align-items-center">
        <a href="{{ route('admin.enquiries.index') }}" class="btn btn-sm btn-outline-secondary">
            <i class="bi bi-arrow-left me-1"></i> Back to Inquiries List
        </a>
        <form action="{{ route('admin.enquiries.destroy', $enquiry->id) }}" method="POST" onsubmit="return confirm('Delete this inquiry permanently?');">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-sm btn-outline-danger">
                <i class="bi bi-trash me-1"></i> Delete Inquiry
            </button>
        </form>
    </div>

    <div class="row g-4">
        <!-- Main Lead Details -->
        <div class="col-lg-8">
            <div class="admin-card mb-4">
                <div class="admin-card-header d-flex justify-content-between align-items-center">
                    <h5 class="admin-card-title">Prospect Information</h5>
                    <span class="{{ $enquiry->status_badge }} px-3 py-1 fs-6">
                        Status: {{ ucfirst(str_replace('_', ' ', $enquiry->status)) }}
                    </span>
                </div>
                <div class="admin-card-body">
                    <div class="row g-3 mb-4">
                        <div class="col-md-6">
                            <label class="text-muted small text-uppercase fw-bold">Full Name</label>
                            <div class="fs-5 fw-bold text-dark">{{ $enquiry->name }}</div>
                        </div>
                        <div class="col-md-6">
                            <label class="text-muted small text-uppercase fw-bold">Email Address</label>
                            <div>
                                <a href="mailto:{{ $enquiry->email }}" class="fs-5 text-dark text-decoration-none">
                                    {{ $enquiry->email }} <i class="bi bi-envelope-at text-muted small ms-1"></i>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label class="text-muted small text-uppercase fw-bold">Company / Organization</label>
                            <div class="fw-semibold text-dark">{{ $enquiry->company ?: 'Not provided' }}</div>
                        </div>
                        <div class="col-md-6">
                            <label class="text-muted small text-uppercase fw-bold">Direct Phone</label>
                            <div>
                                @if($enquiry->phone)
                                    <a href="tel:{{ $enquiry->phone }}" class="text-dark text-decoration-none">{{ $enquiry->phone }}</a>
                                @else
                                    <span class="text-muted">Not provided</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label class="text-muted small text-uppercase fw-bold">Company Website</label>
                            <div>
                                @if($enquiry->website)
                                    <a href="{{ $enquiry->website }}" target="_blank" rel="noopener noreferrer" class="text-primary text-decoration-none">
                                        {{ $enquiry->website }} <i class="bi bi-box-arrow-up-right small ms-1"></i>
                                    </a>
                                @else
                                    <span class="text-muted">Not provided</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label class="text-muted small text-uppercase fw-bold">Service of Interest</label>
                            <div class="fw-semibold text-dark">{{ $enquiry->service_name ?: ($enquiry->service?->title ?: 'General Consultation') }}</div>
                        </div>
                        <div class="col-md-6">
                            <label class="text-muted small text-uppercase fw-bold">Target Publication Outlets</label>
                            <div class="text-dark">{{ $enquiry->target_publication ?: 'Open to editorial recommendations' }}</div>
                        </div>
                        <div class="col-md-6">
                            <label class="text-muted small text-uppercase fw-bold">Budget Range</label>
                            <div class="fw-bold text-warning">{{ $enquiry->budget_range ?: 'Unspecified' }}</div>
                        </div>
                    </div>

                    <div class="border-top pt-4">
                        <label class="text-muted small text-uppercase fw-bold mb-2">Narrative & Milestone Details Provided</label>
                        <div class="p-4 bg-light rounded text-dark" style="white-space: pre-line; line-height: 1.7;">
                            {{ $enquiry->message }}
                        </div>
                    </div>

                    <div class="d-flex justify-content-between text-muted small mt-4 pt-3 border-top" style="font-size: 0.75rem;">
                        <span>Submitted on: {{ $enquiry->created_at->format('F d, Y \a\t h:i A') }}</span>
                        <span>IP Address: {{ $enquiry->ip_address ?: 'Unknown' }}</span>
                    </div>
                </div>
            </div>

            <!-- Internal Editorial Notes -->
            <div class="admin-card">
                <div class="admin-card-header">
                    <h5 class="admin-card-title d-flex align-items-center gap-2">
                        <i class="bi bi-sticky text-warning"></i>
                        <span>Internal Editorial Notes (Not Visible to Client)</span>
                    </h5>
                </div>
                <div class="admin-card-body">
                    <!-- Note Form -->
                    <form action="{{ route('admin.enquiries.notes', $enquiry->id) }}" method="POST" class="mb-4">
                        @csrf
                        <div class="mb-2">
                            <textarea class="form-control" name="note" rows="3" placeholder="Add confidential notes (e.g. publication angle discussed, client timeline, follow-up call scheduled)..." required></textarea>
                        </div>
                        <button type="submit" class="btn btn-sm btn-admin-gold">
                            <i class="bi bi-plus-circle me-1"></i> Add Internal Note
                        </button>
                    </form>

                    <!-- Notes Timeline -->
                    <div class="d-flex flex-column gap-3">
                        @forelse($enquiry->notes as $note)
                            <div class="p-3 bg-light rounded border-start border-3 border-warning">
                                <div class="d-flex justify-content-between align-items-center mb-1 small">
                                    <strong class="text-dark">{{ $note->author?->name ?: 'Administrator' }}</strong>
                                    <span class="text-muted" style="font-size: 0.72rem;">{{ $note->created_at->diffForHumans() }} ({{ $note->created_at->format('M d, Y H:i') }})</span>
                                </div>
                                <div class="text-muted small" style="white-space: pre-line;">{{ $note->note }}</div>
                            </div>
                        @empty
                            <div class="text-muted small text-center py-3">No internal notes added yet.</div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>

        <!-- Sidebar Actions & Workflow -->
        <div class="col-lg-4">
            <!-- Status Update Box -->
            <div class="admin-card mb-4">
                <div class="admin-card-header">
                    <h5 class="admin-card-title">Manage Inquiry Status</h5>
                </div>
                <div class="admin-card-body">
                    <form action="{{ route('admin.enquiries.status', $enquiry->id) }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="status" class="form-label small fw-bold">Current Status</label>
                            <select name="status" id="status" class="form-select">
                                <option value="new" {{ $enquiry->status === 'new' ? 'selected' : '' }}>New (Uncontacted)</option>
                                <option value="contacted" {{ $enquiry->status === 'contacted' ? 'selected' : '' }}>Contacted</option>
                                <option value="in_progress" {{ $enquiry->status === 'in_progress' ? 'selected' : '' }}>In Progress (Reviewing Angles)</option>
                                <option value="converted" {{ $enquiry->status === 'converted' ? 'selected' : '' }}>Converted (Engagement Active)</option>
                                <option value="closed" {{ $enquiry->status === 'closed' ? 'selected' : '' }}>Closed</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-admin-primary w-100">
                            <i class="bi bi-arrow-repeat me-1"></i> Update Status
                        </button>
                    </form>
                </div>
            </div>

            <!-- Direct Response Helper -->
            <div class="admin-card">
                <div class="admin-card-header">
                    <h5 class="admin-card-title">Direct Response</h5>
                </div>
                <div class="admin-card-body">
                    <p class="text-muted small mb-3">Launch default email client pre-addressed to the prospect:</p>
                    <a href="mailto:{{ $enquiry->email }}?subject=Byline%20Bridge%20Media%20Placement%20Consultation%20-%20{{ urlencode($enquiry->name) }}" class="btn btn-outline-dark w-100 text-start d-flex justify-content-between align-items-center">
                        <span><i class="bi bi-envelope me-2"></i> Email {{ $enquiry->name }}</span>
                        <i class="bi bi-arrow-up-right small"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>

@endsection
