@extends('layouts.app')

@section('title', $caseStudy->seo_title ?: ($caseStudy->title . ' | Byline Bridge'))
@section('meta_description', $caseStudy->seo_description ?: $caseStudy->campaign_objective)

@section('content')

    <!-- Header Banner — Monumental Typography -->
    <section class="subpage-hero-banner position-relative overflow-hidden">
        <div class="text-outline-bg cobalt-glow" style="top: 8%; right: -2%;">OUTCOME</div>
        <div class="container position-relative" style="z-index: 1;">
            <div class="row align-items-center g-4">
                <div class="col-lg-9">
                    <nav aria-label="breadcrumb" class="mb-3">
                        <ol class="breadcrumb small mb-0">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-white-50 text-decoration-none">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('case-studies') }}" class="text-white-50 text-decoration-none">Case Studies</a></li>
                            <li class="breadcrumb-item active text-white fw-semibold" aria-current="page">{{ $caseStudy->client_name }}</li>
                        </ol>
                    </nav>

                    <div class="d-flex flex-wrap gap-2 mb-3">
                        <span class="badge-rotated ink" style="font-size: 0.68rem;">{{ $caseStudy->industry }}</span>
                        @if($caseStudy->publication_badge)
                            <span class="badge-rotated orange" style="font-size: 0.68rem;">{{ $caseStudy->publication_badge }}</span>
                        @endif
                    </div>

                    <h1 class="display-huge text-white mb-3 font-serif fw-bold">{{ $caseStudy->title }}</h1>
                    <p class="fs-5 text-white-50 mb-0 font-sans">
                        Client: <strong class="text-white">{{ $caseStudy->client_name }}</strong>, {{ $caseStudy->client_designation }}
                    </p>
                </div>

                <div class="col-lg-3 text-lg-end">
                    <div class="p-4 bg-white rounded border border-secondary border-opacity-10 text-center shadow-lg" style="border-top: 4px solid var(--bb-orange) !important;">
                        <div class="text-muted small text-uppercase fw-bold font-sans" style="font-size: 0.72rem; letter-spacing: 0.08em;">Primary Metric</div>
                        <div class="case-metric-highlight font-sans fw-900 fs-2 mt-1 text-orange">{{ $caseStudy->results_metric }}</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Case Study In-Depth Body -->
    <section class="section-pad-lg">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-8">
                    <!-- Key Overview Box -->
                    <div class="p-4 bg-white rounded border border-secondary border-opacity-10 shadow-sm mb-5">
                        <h4 class="font-serif fs-4 mb-3">Campaign Objective</h4>
                        <p class="text-muted fs-5 mb-0" style="line-height: 1.8;">
                            {{ $caseStudy->campaign_objective }}
                        </p>
                    </div>

                    <!-- Challenge -->
                    @if($caseStudy->challenge)
                        <div class="mb-5">
                            <span class="eyebrow-badge mb-2">The Hurdle</span>
                            <h2 class="font-serif fs-2 mb-3">The Narrative Challenge</h2>
                            <p class="text-muted fs-5" style="line-height: 1.8;">
                                {{ $caseStudy->challenge }}
                            </p>
                        </div>
                    @endif

                    <!-- Strategy -->
                    @if($caseStudy->strategy)
                        <div class="mb-5">
                            <span class="eyebrow-badge mb-2">Our Blueprint</span>
                            <h2 class="font-serif fs-2 mb-3">Editorial Strategy & Framing</h2>
                            <p class="text-muted fs-5" style="line-height: 1.8;">
                                {{ $caseStudy->strategy }}
                            </p>
                        </div>
                    @endif

                    <!-- Execution -->
                    @if($caseStudy->execution)
                        <div class="mb-5">
                            <span class="eyebrow-badge mb-2">In The Field</span>
                            <h2 class="font-serif fs-2 mb-3">Placement Execution</h2>
                            <p class="text-muted fs-5" style="line-height: 1.8;">
                                {{ $caseStudy->execution }}
                            </p>
                        </div>
                    @endif

                    <!-- Results Summary & Breakdown -->
                    <div class="p-4 p-md-5 bg-dark-editorial rounded-4 text-white mb-5">
                        <span class="eyebrow-badge dark mb-3">Verified Impact</span>
                        <h2 class="font-serif fs-2 text-white mb-3">{{ $caseStudy->results_metric }}</h2>
                        <p class="text-muted-editorial fs-5 mb-4" style="line-height: 1.8;">
                            {{ $caseStudy->results_summary }}
                        </p>

                        @if(!empty($caseStudy->metrics_breakdown))
                            <div class="row g-3 pt-3 border-top border-secondary border-opacity-25">
                                @foreach($caseStudy->metrics_breakdown as $mb)
                                    <div class="col-md-4">
                                        <div class="fs-3 fw-bold text-coral font-serif">{{ $mb['value'] }}</div>
                                        <div class="text-muted-editorial small">{{ $mb['label'] }}</div>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    </div>
                </div>

                <!-- Sidebar Metadata -->
                <div class="col-lg-4">
                    <div class="sticky-top" style="top: 100px;">
                        <div class="p-4 bg-white rounded border border-secondary border-opacity-10 mb-4 shadow-sm">
                            <h5 class="font-serif fs-5 mb-3 text-dark">Placement Details</h5>
                            
                            <div class="mb-3 pb-2 border-bottom border-secondary border-opacity-10">
                                <div class="text-muted small">Publication Outlets</div>
                                <div class="fw-bold text-dark">{{ $caseStudy->publication_name }}</div>
                            </div>

                            <div class="mb-3 pb-2 border-bottom border-secondary border-opacity-10">
                                <div class="text-muted small">Industry Classification</div>
                                <div class="fw-bold text-dark">{{ $caseStudy->industry }}</div>
                            </div>

                            <div class="mb-3 pb-2 border-bottom border-secondary border-opacity-10">
                                <div class="text-muted small">Client Pre-Approval Status</div>
                                <div class="text-success fw-bold small"><i class="bi bi-shield-check me-1"></i> 100% Authorized & Released</div>
                            </div>

                            <div class="mt-4">
                                <a href="{{ route('contact') }}" class="btn btn-editorial-coral w-100 justify-content-center py-3">
                                    <span>Replicate These Results</span>
                                    <i class="bi bi-arrow-right"></i>
                                </a>
                            </div>
                        </div>

                        <!-- Related Case Studies -->
                        @if($relatedCases->isNotEmpty())
                            <div class="p-4 bg-ivory-base rounded border border-secondary border-opacity-10">
                                <h6 class="font-serif fs-6 mb-3 text-dark">Related Case Studies</h6>
                                <div class="d-flex flex-column gap-3">
                                    @foreach($relatedCases as $rel)
                                        <div class="p-2 bg-white rounded border border-secondary border-opacity-10">
                                            <a href="{{ route('case-studies.detail', $rel->slug) }}" class="text-dark fw-semibold text-decoration-none small hover-coral d-block mb-1">
                                                {{ $rel->title }}
                                            </a>
                                            <span class="text-muted small" style="font-size: 0.72rem;">{{ $rel->industry }}</span>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
