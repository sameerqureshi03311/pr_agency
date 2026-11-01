@extends('layouts.admin')

@section('title', 'Manage Services')
@section('page_title', 'Services & Media Placement Offerings')

@section('content')

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h4 class="font-serif fs-4 mb-1">Services Management</h4>
            <p class="text-muted small mb-0">Create, configure, and reorder public PR offerings.</p>
        </div>
        <a href="{{ route('admin.services.create') }}" class="btn btn-admin-gold">
            <i class="bi bi-plus-lg me-1"></i> Add New Service
        </a>
    </div>

    <div class="admin-card">
        <div class="table-responsive">
            <table class="table admin-table mb-0">
                <thead>
                    <tr>
                        <th style="width: 60px;">Order</th>
                        <th>Title & Tagline</th>
                        <th>Badge</th>
                        <th>Status</th>
                        <th>Featured</th>
                        <th class="text-end">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($services as $service)
                        <tr>
                            <td>
                                <span class="badge bg-light text-dark border">{{ $service->display_order }}</span>
                            </td>
                            <td>
                                <div class="fw-bold text-dark">{{ $service->title }}</div>
                                <div class="text-muted small">{{ $service->tagline }}</div>
                            </td>
                            <td>
                                @if($service->badge)
                                    <span class="badge bg-warning text-dark">{{ $service->badge }}</span>
                                @else
                                    <span class="text-muted small">—</span>
                                @endif
                            </td>
                            <td>
                                @if($service->is_active)
                                    <span class="badge bg-success">Active</span>
                                @else
                                    <span class="badge bg-secondary">Inactive</span>
                                @endif
                            </td>
                            <td>
                                @if($service->is_featured)
                                    <span class="text-warning"><i class="bi bi-star-fill"></i> Featured</span>
                                @else
                                    <span class="text-muted small">Standard</span>
                                @endif
                            </td>
                            <td class="text-end">
                                <div class="d-flex justify-content-end gap-1">
                                    <a href="{{ route('services.detail', $service->slug) }}" target="_blank" class="btn btn-sm btn-outline-secondary" title="View Public Page">
                                        <i class="bi bi-eye"></i>
                                    </a>
                                    <a href="{{ route('admin.services.edit', $service->id) }}" class="btn btn-sm btn-outline-dark" title="Edit Service">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    <form action="{{ route('admin.services.destroy', $service->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this service?');" class="d-inline">
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
                                No services created yet. Click "Add New Service" above.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

@endsection
