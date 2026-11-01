@extends('layouts.app')

@section('title', 'Case Studies & Media Placement Results | Byline Bridge')
@section('meta_description', 'Review verified case studies of founders, CEOs, and organizations who transformed their public authority through Byline Bridge editorial placements.')

@section('content')

    <!-- Header Banner — Monumental Typography -->
    <section class="subpage-hero-banner position-relative overflow-hidden">
        <div class="text-outline-bg cobalt-glow" style="top: 8%; right: -2%;">RESULTS</div>
        <div class="container text-center position-relative" style="z-index: 1;">
            <span class="badge-rotated orange mb-3">Portfolio & Results</span>
            <h1 class="display-monumental text-white mb-3">
                <span class="word-stack">
                    <span class="font-sans fw-900 text-uppercase" style="letter-spacing: -0.035em;">VERIFIED PLACEMENTS</span>
                    <span class="font-serif fst-italic text-orange">& Documented Outcomes.</span>
                </span>
            </h1>
            <p class="display-subtitle mx-auto text-white-50 fs-5" style="max-width: 720px;">
                Explore how founders and enterprise leaders leverage our editorial network to accelerate capital rounds, license deals, and commercial credibility.
            </p>

            <!-- Industry Filter Pills -->
            <div class="d-flex flex-wrap justify-content-center gap-2 mt-4">
                <a href="{{ route('case-studies') }}" class="btn btn-sm {{ empty($selectedIndustry) ? 'btn-hero-primary' : 'btn-hero-secondary' }}">
                    All Sectors
                </a>
                @foreach($industries as $industry)
                    <a href="{{ route('case-studies', ['industry' => $industry]) }}" class="btn btn-sm {{ $selectedIndustry === $industry ? 'btn-hero-primary' : 'btn-hero-secondary' }}">
                        {{ $industry }}
                    </a>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Case Studies Grid -->
    <section class="section-pad-lg position-relative overflow-hidden">
        <div class="container">
            @if($caseStudies->isEmpty())
                <div class="text-center py-5">
                    <div class="fs-1 text-muted mb-3"><i class="bi bi-folder2-open"></i></div>
                    <h3 class="font-serif">No case studies found</h3>
                    <p class="text-muted">No published case studies match the selected criteria.</p>
                    <a href="{{ route('case-studies') }}" class="btn btn-editorial-outline mt-2">Clear Filter</a>
                </div>
            @else
                <div class="row g-4 mb-5">
                    @foreach($caseStudies as $case)
                        <div class="col-lg-6">
                            <div class="case-tile h-100 position-relative">
                                <div class="case-tile-header">
                                    <div class="d-flex justify-content-between align-items-center mb-2">
                                        <span class="badge-rotated ink" style="font-size: 0.68rem;">{{ $case->industry }}</span>
                                        @if($case->publication_badge)
                                            <span class="badge-rotated orange" style="font-size: 0.68rem;">{{ $case->publication_badge }}</span>
                                        @endif
                                    </div>
                                    <h3 class="fs-4 font-serif fw-bold mb-2" style="line-height: 1.35;">{{ $case->title }}</h3>
                                    <div class="text-muted small font-sans">Client: <strong class="text-dark">{{ $case->client_name }}</strong> • {{ $case->client_designation }}</div>
                                </div>

                                <div class="case-tile-body">
                                    <div class="mb-4">
                                        <div class="text-muted small fw-bold font-sans text-uppercase mb-1" style="font-size: 0.72rem; letter-spacing: 0.08em;">
                                            Key Campaign Impact
                                        </div>
                                        <div class="case-metric-highlight font-sans fw-900 fs-2 text-orange mb-3">
                                            {{ $case->results_metric }}
                                        </div>
                                        <p class="text-muted small mb-3">
                                            {{ $case->results_summary ?: $case->campaign_objective }}
                                        </p>

                                        @if(!empty($case->metrics_breakdown))
                                            <div class="row g-2 pt-2 border-top border-secondary border-opacity-10">
                                                @foreach($case->metrics_breakdown as $mb)
                                                    <div class="col-4">
                                                        <div class="fw-bold font-sans text-dark small">{{ $mb['value'] }}</div>
                                                        <div class="text-muted" style="font-size: 0.7rem;">{{ $mb['label'] }}</div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        @endif
                                    </div>

                                    <div class="pt-3 border-top border-secondary border-opacity-10 d-flex justify-content-between align-items-center">
                                        <span class="small text-muted font-sans fw-bold">
                                            <i class="bi bi-newspaper me-1 text-cobalt"></i> {{ $case->publication_name }}
                                        </span>
                                        <a href="{{ route('case-studies.detail', $case->slug) }}" class="btn btn-editorial-dark py-2 px-3 small">
                                            <span>Read Full Case Study</span>
                                            <i class="bi bi-arrow-right ms-1"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Pagination -->
                <div class="d-flex justify-content-center">
                    {{ $caseStudies->links('pagination::bootstrap-5') }}
                </div>
            @endif
        </div>
    </section>

@endsection
