@extends('layouts.admin')

@section('title', 'Agency Dashboard')
@section('page_title', 'Agency Operations & Overview')

@section('content')

    <!-- Metrics Stat Cards Row -->
    <div class="row g-4 mb-4">
        <div class="col-sm-6 col-xl-4">
            <div class="admin-stat-card d-flex align-items-center justify-content-between">
                <div>
                    <div class="admin-stat-title">New Inquiries</div>
                    <div class="admin-stat-number text-warning">{{ $newEnquiries }}</div>
                    <div class="small text-muted mt-1">Requires initial editorial review</div>
                </div>
                <div class="admin-stat-icon stat-icon-gold">
                    <i class="bi bi-inbox-fill"></i>
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-xl-4">
            <div class="admin-stat-card d-flex align-items-center justify-content-between">
                <div>
                    <div class="admin-stat-title">Total Inquiries</div>
                    <div class="admin-stat-number text-dark">{{ $totalEnquiries }}</div>
                    <div class="small text-muted mt-1">All-time contact form leads</div>
                </div>
                <div class="admin-stat-icon stat-icon-blue">
                    <i class="bi bi-chat-left-dots-fill"></i>
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-xl-4">
            <div class="admin-stat-card d-flex align-items-center justify-content-between">
                <div>
                    <div class="admin-stat-title">Active Services</div>
                    <div class="admin-stat-number text-dark">{{ $activeServices }}</div>
                    <div class="small text-muted mt-1">Public placement offerings</div>
                </div>
                <div class="admin-stat-icon stat-icon-green">
                    <i class="bi bi-briefcase-fill"></i>
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-xl-4">
            <div class="admin-stat-card d-flex align-items-center justify-content-between">
                <div>
                    <div class="admin-stat-title">Published Case Studies</div>
                    <div class="admin-stat-number text-dark">{{ $publishedCaseStudies }}</div>
                    <div class="small text-muted mt-1">Verified outcome portfolios</div>
                </div>
                <div class="admin-stat-icon stat-icon-purple">
                    <i class="bi bi-journal-check"></i>
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-xl-4">
            <div class="admin-stat-card d-flex align-items-center justify-content-between">
                <div>
                    <div class="admin-stat-title">Client Testimonials</div>
                    <div class="admin-stat-number text-dark">{{ $publishedTestimonials }}</div>
                    <div class="small text-muted mt-1">Live executive feedback</div>
                </div>
                <div class="admin-stat-icon stat-icon-gold">
                    <i class="bi bi-star-fill"></i>
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-xl-4">
            <div class="admin-stat-card d-flex align-items-center justify-content-between">
                <div>
                    <div class="admin-stat-title">Live FAQs</div>
                    <div class="admin-stat-number text-dark">{{ $totalFaqs }}</div>
                    <div class="small text-muted mt-1">Editorial policy answers</div>
                </div>
                <div class="admin-stat-icon stat-icon-blue">
                    <i class="bi bi-question-circle-fill"></i>
                </div>
            </div>
        </div>
    </div>

    <!-- Quick Shortcuts & Recent Inquiries -->
    <div class="row g-4">
        <!-- Recent Inquiries Table -->
        <div class="col-lg-8">
            <div class="admin-card">
                <div class="admin-card-header">
                    <h5 class="admin-card-title d-flex align-items-center gap-2">
                        <i class="bi bi-inbox text-warning"></i>
                        <span>Recent Placement Inquiries</span>
                    </h5>
                    <a href="{{ route('admin.enquiries.index') }}" class="btn btn-sm btn-outline-dark">
                        View All ({{ $totalEnquiries }})
                    </a>
                </div>
                <div class="table-responsive">
                    <table class="table admin-table mb-0">
                        <thead>
                            <tr>
                                <th>Client / Prospect</th>
                                <th>Service</th>
                                <th>Status</th>
                                <th>Date</th>
                                <th class="text-end">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($recentEnquiries as $enquiry)
                                <tr>
                                    <td>
                                        <div class="fw-bold text-dark">{{ $enquiry->name }}</div>
                                        <div class="text-muted small">{{ $enquiry->company ?: $enquiry->email }}</div>
                                    </td>
                                    <td>
                                        <span class="small">{{ $enquiry->service_name ?: ($enquiry->service?->title ?: 'General Inquiry') }}</span>
                                    </td>
                                    <td>
                                        <span class="{{ $enquiry->status_badge }}">
                                            {{ ucfirst(str_replace('_', ' ', $enquiry->status)) }}
                                        </span>
                                    </td>
                                    <td>
                                        <span class="text-muted small">{{ $enquiry->created_at->format('M d, Y') }}</span>
                                    </td>
                                    <td class="text-end">
                                        <a href="{{ route('admin.enquiries.show', $enquiry->id) }}" class="btn btn-sm btn-outline-dark py-1 px-2" style="font-size: 0.8rem;">
                                            <i class="bi bi-eye"></i> Review
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center py-4 text-muted">
                                        No inquiries submitted yet.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Quick Content Controls -->
        <div class="col-lg-4">
            <div class="admin-card">
                <div class="admin-card-header">
                    <h5 class="admin-card-title">Quick Actions</h5>
                </div>
                <div class="admin-card-body d-flex flex-column gap-2">
                    <a href="{{ route('admin.services.create') }}" class="btn btn-outline-dark text-start d-flex justify-content-between align-items-center py-2">
                        <span><i class="bi bi-plus-circle me-2 text-warning"></i> Add New Service</span>
                        <i class="bi bi-chevron-right small text-muted"></i>
                    </a>
                    <a href="{{ route('admin.case-studies.create') }}" class="btn btn-outline-dark text-start d-flex justify-content-between align-items-center py-2">
                        <span><i class="bi bi-plus-circle me-2 text-warning"></i> Add New Case Study</span>
                        <i class="bi bi-chevron-right small text-muted"></i>
                    </a>
                    <a href="{{ route('admin.testimonials.create') }}" class="btn btn-outline-dark text-start d-flex justify-content-between align-items-center py-2">
                        <span><i class="bi bi-plus-circle me-2 text-warning"></i> Add Client Testimonial</span>
                        <i class="bi bi-chevron-right small text-muted"></i>
                    </a>
                    <a href="{{ route('admin.content.index') }}" class="btn btn-outline-dark text-start d-flex justify-content-between align-items-center py-2">
                        <span><i class="bi bi-pencil-square me-2 text-warning"></i> Edit Homepage Headlines</span>
                        <i class="bi bi-chevron-right small text-muted"></i>
                    </a>
                    <a href="{{ route('admin.settings.index') }}" class="btn btn-outline-dark text-start d-flex justify-content-between align-items-center py-2">
                        <span><i class="bi bi-sliders me-2 text-warning"></i> Agency Details & SEO</span>
                        <i class="bi bi-chevron-right small text-muted"></i>
                    </a>
                </div>
            </div>

            <!-- Pre-Approval Reminder Notice -->
            <div class="p-3 bg-white rounded border border-warning border-opacity-50">
                <div class="fw-bold text-dark small mb-1"><i class="bi bi-shield-check text-warning me-1"></i> Editorial Reminder</div>
                <div class="text-muted small">
                    All client-facing articles must be reviewed and given written pre-approval before moving their status to "Converted" or live release.
                </div>
            </div>
        </div>
    </div>

@endsection
