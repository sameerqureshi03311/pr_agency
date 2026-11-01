@extends('layouts.app')

@section('title', 'About Us | Byline Bridge Editorial Agency')
@section('meta_description', 'Discover the story, editorial mission, and leadership team behind Byline Bridge—the international PR agency built on transparency, journalistic precision, and deliverable-backed placements.')

@section('content')

    <!-- Header Banner — Bold Typographic Introduction -->
    <section class="subpage-hero-banner position-relative overflow-hidden">
        <div class="text-outline-bg cobalt-glow" style="top: 10%; right: -2%;">MISSION</div>
        <div class="container text-center position-relative" style="z-index: 1;">
            <span class="badge-rotated orange mb-3">Our Mission & Philosophy</span>
            <h1 class="display-monumental text-white mb-3">
                <span class="word-stack">
                    <span class="font-sans fw-900 text-uppercase" style="letter-spacing: -0.035em;">MEDIA PLACEMENT</span>
                    <span class="font-serif fst-italic text-orange">Engineered for Discerning Leaders.</span>
                </span>
            </h1>
            <p class="display-subtitle mx-auto text-white-50 fs-5" style="max-width: 720px;">
                We bridge the divide between authentic executive achievement and high-authority digital press. Zero opaque retainers. Zero generic press releases. Just credible stories where enterprise buyers read.
            </p>
        </div>
    </section>

    <!-- Narrative Section -->
    <section class="section-pad-lg">
        <div class="container">
            <div class="row g-5 align-items-center">
                <div class="col-lg-6">
                    <div class="d-flex align-items-center gap-2 mb-3">
                        <span class="badge-rotated cobalt">Our Origin</span>
                        <span class="eyebrow-badge">Founding Standard</span>
                    </div>
                    <h2 class="display-huge mb-4">
                        <span class="d-block font-sans fw-900 text-uppercase" style="letter-spacing: -0.03em;">AN ANTIDOTE TO</span>
                        <span class="d-block font-serif fst-italic text-orange">The Traditional PR Retainer.</span>
                    </h2>
                    <p class="fs-5 text-muted mb-4" style="line-height: 1.8;">
                        Traditional public relations was invented for the era of print newspapers and broadcast television. Yet decades later, many agencies still operate on the same antiquated model: charging $10,000 to $20,000 every month on long-term retainers, while offering vague guarantees of "ongoing media pitching."
                    </p>
                    <p class="text-muted mb-4">
                        Byline Bridge was founded to challenge this opacity. We believe that executives and growing companies deserve clear deliverables, absolute control over their public narrative, and transparent publication placements that permanently enhance their digital equity.
                    </p>
                    <p class="text-muted">
                        We function less like an advertising agency and more like an elite editorial bureau. Our team consists of seasoned financial, technology, and healthcare journalists who understand what publication editors require and how to position complex business models for maximum authority.
                    </p>
                </div>

                <div class="col-lg-6">
                    <div class="p-5 bg-dark-editorial rounded-4 text-white position-relative">
                        <div class="text-orange fs-1 mb-3">
                            <i class="bi bi-compass"></i>
                        </div>
                        <h3 class="font-serif fs-3 text-white mb-4">Our Three Guiding Tenets</h3>
                        
                        <div class="mb-4 pb-3 border-bottom border-secondary border-opacity-25">
                            <div class="fw-bold fs-5 text-orange mb-1">1. Absolute Pre-Approval</div>
                            <p class="text-muted-editorial small mb-0">
                                Nothing is ever submitted or published without your explicit review and signoff. You retain complete ownership over every factual statement and quote.
                            </p>
                        </div>

                        <div class="mb-4 pb-3 border-bottom border-secondary border-opacity-25">
                            <div class="fw-bold fs-5 text-cobalt mb-1">2. Journalistic Rigor</div>
                            <p class="text-muted-editorial small mb-0">
                                We write articles that respect the reader's intelligence. We do not produce self-serving corporate advertisements or fluffy keyword-stuffed blogs.
                            </p>
                        </div>

                        <div>
                            <div class="fw-bold fs-5 text-coral mb-1">3. Deliverable Accountability</div>
                            <p class="text-muted-editorial small mb-0">
                                You invest in confirmed, permanent placements on agreed-upon media outlets—not speculative hours or open-ended retainer fees.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Founder Philosophy Box -->
    <section class="section-pad-lg bg-ivory-base">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="p-5 bg-white rounded border border-secondary border-opacity-10 shadow-sm text-center">
                        <div class="text-coral fs-1 mb-3">
                            <i class="bi bi-chat-square-quote"></i>
                        </div>
                        <h2 class="font-serif fs-2 mb-4" style="line-height: 1.4;">
                            {{ $founderHeading }}
                        </h2>
                        <p class="text-muted fs-5 mb-4 max-w-700 mx-auto" style="line-height: 1.8;">
                            {{ $founderBody }}
                        </p>
                        <div class="text-dark fw-bold">Arthur Vance</div>
                        <div class="text-muted small">Managing Director, Byline Bridge</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Standards & Transparency Grid -->
    <section class="section-pad-lg">
        <div class="container">
            <div class="text-center max-w-700 mx-auto mb-5">
                <span class="eyebrow-badge mb-3">Operational Integrity</span>
                <h2 class="display-section mb-3">Standards We Never Compromise</h2>
                <p class="text-muted fs-5">
                    Clear policies that protect your corporate reputation, investor relations, and regulatory compliance.
                </p>
            </div>

            <div class="row g-4">
                <div class="col-md-4">
                    <div class="editorial-card">
                        <div class="editorial-card-icon">
                            <i class="bi bi-file-earmark-lock"></i>
                        </div>
                        <h4 class="font-serif fs-4 mb-2">Strict Confidentiality</h4>
                        <p class="text-muted small mb-0">
                            We execute comprehensive Non-Disclosure Agreements prior to every narrative interview, ensuring sensitive metrics and roadmap plans remain protected.
                        </p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="editorial-card">
                        <div class="editorial-card-icon">
                            <i class="bi bi-search"></i>
                        </div>
                        <h4 class="font-serif fs-4 mb-2">Verified Media Indexing</h4>
                        <p class="text-muted small mb-0">
                            We ensure all articles are placed on reputable platforms with permanent indexing, ensuring your feature appears prominently when stakeholders search your name.
                        </p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="editorial-card">
                        <div class="editorial-card-icon">
                            <i class="bi bi-patch-check"></i>
                        </div>
                        <h4 class="font-serif fs-4 mb-2">No Misleading Guarantees</h4>
                        <p class="text-muted small mb-0">
                            We promise genuine editorial placements on agreed outlets. We do not make false claims regarding algorithmic Google rankings or guaranteed investor capital.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="section-pad-md bg-dark-editorial text-center">
        <div class="container">
            <h2 class="font-serif text-white fs-2 mb-3">Ready to Discuss Your Executive Narrative?</h2>
            <p class="text-muted-editorial fs-5 mb-4 max-w-700 mx-auto">
                Schedule a confidential consultation with our editorial team to review suitable placements for your upcoming milestones.
            </p>
            <a href="{{ route('contact') }}" class="btn btn-editorial-coral px-4 py-3">
                <span>Request a Consultation</span>
                <i class="bi bi-arrow-right"></i>
            </a>
        </div>
    </section>

@endsection
