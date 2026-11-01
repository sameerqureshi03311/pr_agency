@extends('layouts.app')

@section('title', 'Services & Media Placements | Byline Bridge')
@section('meta_description', 'Explore Byline Bridge core PR services: Featured Profiles, Top-10 List Features, Byline Articles, and Full-Cycle Content Writing & Publishing.')

@section('content')

    <!-- Header Banner — Monumental Typography -->
    <section class="subpage-hero-banner position-relative overflow-hidden">
        <div class="text-outline-bg cobalt-glow" style="top: 8%; right: -2%;">DELIVERABLES</div>
        <div class="container text-center position-relative" style="z-index: 1;">
            <span class="badge-rotated orange mb-3">Our Core Services</span>
            <h1 class="display-monumental text-white mb-3">
                <span class="word-stack">
                    <span class="font-sans fw-900 text-uppercase" style="letter-spacing: -0.035em;">EXECUTIVE MEDIA PLACEMENT</span>
                    <span class="font-serif fst-italic text-orange">& Editorial Publishing.</span>
                </span>
            </h1>
            <p class="display-subtitle mx-auto text-white-50 fs-5" style="max-width: 720px;">
                Each service is engineered to deliver verifiable digital equity, personal branding authority, and executive positioning on premier media outlets.
            </p>
        </div>
    </section>

    <!-- Services Detailed Breakdown -->
    <section class="section-pad-lg position-relative overflow-hidden">
        <div class="container">
            <div class="row g-5">
                @foreach($services as $index => $service)
                    <div class="col-12">
                        <div class="p-4 p-md-5 bg-white rounded border border-secondary border-opacity-10 shadow-sm position-relative overflow-hidden" style="border-top: 4px solid {{ $index % 2 === 1 ? 'var(--bb-cobalt)' : 'var(--bb-orange)' }} !important;">
                            <div class="row g-5 align-items-center">
                                <div class="col-lg-6 {{ $index % 2 === 1 ? 'order-lg-2' : '' }}">
                                    <div class="d-flex align-items-center gap-3 mb-3">
                                        <div class="giant-service-number {{ $index % 2 === 1 ? 'cobalt' : 'orange' }}">0{{ $index + 1 }}</div>
                                        @if($service->badge)
                                            <span class="badge-rotated {{ $index % 2 === 1 ? 'cobalt' : 'orange' }}">{{ $service->badge }}</span>
                                        @endif
                                    </div>
                                    <h2 class="display-huge fs-2 mb-2 font-serif fw-bold">{{ $service->title }}</h2>
                                    <div class="text-orange fw-bold mb-4 font-sans text-uppercase small" style="letter-spacing: 0.06em;">{{ $service->tagline }}</div>
                                    <p class="fs-5 text-muted mb-4" style="line-height: 1.7;">
                                        {{ $service->short_description }}
                                    </p>

                                    @if(!empty($service->features))
                                        <div class="mb-4">
                                            <h5 class="font-sans fs-6 fw-bold text-uppercase text-dark mb-3" style="letter-spacing: 0.05em;">Key Inclusions</h5>
                                            <div class="row g-2">
                                                @foreach($service->features as $feat)
                                                    <div class="col-md-6">
                                                        <div class="d-flex align-items-start gap-2 small text-muted">
                                                            <i class="bi bi-check-circle-fill {{ $index % 2 === 1 ? 'text-cobalt' : 'text-orange' }} mt-1"></i>
                                                            <span>{{ $feat }}</span>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    @endif

                                    <div class="d-flex flex-wrap gap-3 pt-3">
                                        <a href="{{ route('services.detail', $service->slug) }}" class="btn btn-editorial-dark">
                                            <span>Full Service Details</span>
                                            <i class="bi bi-arrow-right"></i>
                                        </a>
                                        <a href="{{ route('contact', ['service' => $service->id]) }}" class="btn btn-hero-primary">
                                            <span>Request Quote</span>
                                        </a>
                                    </div>
                                </div>

                                <div class="col-lg-6 {{ $index % 2 === 1 ? 'order-lg-1' : '' }}">
                                    <div class="p-4 bg-ivory rounded border border-secondary border-opacity-10">
                                        <h5 class="font-sans fs-6 fw-bold text-uppercase mb-4 text-dark d-flex align-items-center gap-2" style="letter-spacing: 0.06em;">
                                            <i class="bi bi-diagram-3 {{ $index % 2 === 1 ? 'text-cobalt' : 'text-orange' }}"></i>
                                            <span>Delivery Process Roadmap</span>
                                        </h5>
                                        @if(!empty($service->deliverables))
                                            <div class="d-flex flex-column gap-3">
                                                @foreach($service->deliverables as $del)
                                                    <div class="p-3 bg-white rounded border border-secondary border-opacity-10">
                                                        <div class="d-flex justify-content-between align-items-center mb-1">
                                                            <span class="badge bg-dark text-white" style="font-size: 0.7rem;">{{ $del['phase'] }}</span>
                                                            <span class="fw-bold small text-dark">{{ $del['title'] }}</span>
                                                        </div>
                                                        <div class="text-muted small">{{ $del['desc'] }}</div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        @else
                                            <p class="text-muted small">Meticulous 4-stage drafting, review, pre-approval, and publication workflow.</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Bottom CTA -->
    <section class="section-pad-md bg-deep-ink text-center position-relative overflow-hidden border-top border-4 border-orange">
        <div class="text-outline-bg orange-glow" style="top: 15%; left: 3%;">CAMPAIGN</div>
        <div class="container position-relative" style="z-index: 1;">
            <h2 class="display-huge text-white fs-2 mb-3">Custom Corporate Campaign?</h2>
            <p class="text-white-50 fs-5 mb-4 max-w-700 mx-auto">
                Need a multi-tier publishing program across several executives or regional markets? Our directors create custom publishing schedules.
            </p>
            <a href="{{ route('contact') }}" class="btn btn-hero-primary px-4 py-3">
                <span>Contact Our Strategy Desk</span>
                <i class="bi bi-arrow-right"></i>
            </a>
        </div>
    </section>

@endsection
