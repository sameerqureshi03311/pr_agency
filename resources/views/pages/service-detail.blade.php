@extends('layouts.app')

@section('title', $service->seo_title ?: ($service->title . ' | Byline Bridge'))
@section('meta_description', $service->seo_description ?: $service->short_description)

@section('content')

    <!-- Header Banner — Monumental Typography -->
    <section class="subpage-hero-banner position-relative overflow-hidden">
        <div class="text-outline-bg cobalt-glow" style="top: 8%; right: -2%;">DELIVERABLE</div>
        <div class="container position-relative" style="z-index: 1;">
            <div class="row align-items-center g-4">
                <div class="col-lg-8">
                    <nav aria-label="breadcrumb" class="mb-3">
                        <ol class="breadcrumb small mb-0">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-white-50 text-decoration-none">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('services') }}" class="text-white-50 text-decoration-none">Services</a></li>
                            <li class="breadcrumb-item active text-white fw-semibold" aria-current="page">{{ $service->title }}</li>
                        </ol>
                    </nav>

                    @if($service->badge)
                        <span class="badge-rotated orange mb-3">{{ $service->badge }}</span>
                    @endif
                    <h1 class="display-monumental text-white mb-3">{{ $service->title }}</h1>
                    <p class="fs-4 text-orange mb-3 font-serif fw-semibold">{{ $service->tagline }}</p>
                    <p class="fs-5 text-white-50 mb-0 max-w-700">
                        {{ $service->short_description }}
                    </p>
                </div>
                <div class="col-lg-4 text-lg-end">
                    <a href="{{ route('contact', ['service' => $service->id]) }}" class="btn btn-hero-primary px-4 py-3">
                        <span>Request Placement Quote</span>
                        <i class="bi bi-arrow-right"></i>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Service Body & In-Depth Details -->
    <section class="section-pad-lg">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-8">
                    <div class="p-4 p-md-5 bg-white rounded border border-secondary border-opacity-10 shadow-sm mb-5">
                        <h2 class="font-serif fs-2 mb-4">Service Overview & Strategic Value</h2>
                        <div class="text-muted fs-5 mb-4" style="line-height: 1.8;">
                            {!! $service->full_description !!}
                        </div>

                        @if(!empty($service->features))
                            <h3 class="font-serif fs-3 mt-5 mb-4">What This Placement Includes</h3>
                            <div class="row g-3">
                                @foreach($service->features as $feature)
                                    <div class="col-md-6">
                                        <div class="p-3 bg-ivory-base rounded border border-secondary border-opacity-10 d-flex align-items-start gap-2">
                                            <i class="bi bi-check-circle-fill text-coral mt-1"></i>
                                            <span class="small fw-semibold text-dark">{{ $feature }}</span>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    </div>

                    <!-- Process Stages -->
                    @if(!empty($service->deliverables))
                        <div class="p-4 p-md-5 bg-white rounded border border-secondary border-opacity-10 shadow-sm mb-5">
                            <h2 class="font-serif fs-2 mb-4">Step-by-Step Delivery Roadmap</h2>
                            <div class="d-flex flex-column gap-4">
                                @foreach($service->deliverables as $deliv)
                                    <div class="p-4 bg-ivory-base rounded border-start border-4 border-coral">
                                        <div class="d-flex justify-content-between align-items-center mb-2">
                                            <span class="badge bg-dark text-white px-2 py-1 small">{{ $deliv['phase'] }}</span>
                                            <span class="font-serif fs-5 text-dark fw-bold">{{ $deliv['title'] }}</span>
                                        </div>
                                        <p class="text-muted small mb-0">{{ $deliv['desc'] }}</p>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif
                </div>

                <!-- Sidebar Summary & Form Trigger -->
                <div class="col-lg-4">
                    <div class="sticky-top" style="top: 100px;">
                        <div class="p-4 bg-dark-editorial rounded text-white mb-4">
                            <span class="eyebrow-badge dark mb-3">Placement Inquiry</span>
                            <h3 class="font-serif fs-4 text-white mb-3">Begin Your Placement</h3>
                            <p class="text-muted-editorial small mb-4">
                                Connect directly with our managing editor to review publication target outlets, pricing, and scheduling.
                            </p>
                            <a href="{{ route('contact', ['service' => $service->id]) }}" class="btn btn-editorial-coral w-100 justify-content-center py-3 mb-3">
                                <span>Get Quote for {{ $service->title }}</span>
                                <i class="bi bi-arrow-right"></i>
                            </a>
                            <div class="d-flex align-items-center gap-2 text-muted-editorial small justify-content-center">
                                <i class="bi bi-shield-check text-coral"></i>
                                <span>100% Pre-Approval Guaranteed</span>
                            </div>
                        </div>

                        <!-- Other Services Nav -->
                        <div class="p-4 bg-white rounded border border-secondary border-opacity-10">
                            <h5 class="font-serif fs-5 mb-3 text-dark">Other Offerings</h5>
                            <ul class="list-unstyled mb-0">
                                @foreach($otherServices as $other)
                                    <li class="mb-2 pb-2 border-bottom border-secondary border-opacity-10">
                                        <a href="{{ route('services.detail', $other->slug) }}" class="text-dark fw-semibold text-decoration-none small d-flex justify-content-between align-items-center hover-coral">
                                            <span>{{ $other->title }}</span>
                                            <i class="bi bi-chevron-right text-muted small"></i>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
