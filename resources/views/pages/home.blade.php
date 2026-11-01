@extends('layouts.app')

@section('title', 'Byline Bridge | International PR, Media Placement & Executive Publishing')
@section('meta_description', 'Your name in the byline. Your story where buyers read. International PR agency specializing in executive profiles, curated list placements, and authoritative bylines.')

@section('content')

    <!-- =========================================================================
         SECTION 2: HERO SECTION — MONUMENTAL BOLD TYPOGRAPHY & EDITORIAL COLLAGE
         ========================================================================= -->
    <section class="hero-wrapper position-relative">
        <!-- Outlined Background Watermark Text -->
        <div class="text-outline-bg cobalt-glow" style="top: 5%; left: -1%; z-index: 1;">BYLINE</div>
        
        <!-- Vertical Micro-Label on desktop margin -->
        <div class="d-none d-xxl-block position-absolute" style="left: 2rem; top: 38%; z-index: 3;">
            <span class="micro-label-vertical">EDITORIAL AUTHORITY • GLOBAL MEDIA PLACEMENT</span>
        </div>

        <div class="container position-relative" style="z-index: 2;">
            <div class="row align-items-center g-5">
                <div class="col-lg-7">
                    <div class="mb-3 d-flex align-items-center gap-2">
                        <span class="badge-rotated orange">
                            <i class="bi bi-patch-check-fill me-1"></i> Verified Media Placement
                        </span>
                        <span class="hero-eyebrow-badge">
                            <span class="badge-dot"></span>
                            {{ $heroBadge }}
                        </span>
                    </div>

                    <!-- Monumental Stacked Typography Headline -->
                    <h1 class="display-monumental text-white mb-4">
                        <span class="word-stack">
                            <span class="text-mask-wrap">
                                <span class="text-mask-inner word-stack-line font-sans fw-900 text-uppercase" style="letter-spacing: -0.04em;">YOUR NAME.</span>
                            </span>
                            <span class="text-mask-wrap">
                                <span class="text-mask-inner word-stack-line font-serif fst-italic text-orange" style="font-weight: 500;">In The Byline.</span>
                            </span>
                            <span class="text-mask-wrap">
                                <span class="text-mask-inner word-stack-line font-sans fw-800 text-uppercase fs-2 mt-2" style="letter-spacing: -0.02em;">
                                    YOUR STORY <span class="highlight-cobalt">WHERE BUYERS READ.</span>
                                </span>
                            </span>
                        </span>
                    </h1>

                    <p class="display-subtitle mb-5">
                        {{ $heroSubtitle }}
                    </p>

                    <div class="d-flex flex-wrap align-items-center gap-3">
                        <a href="{{ $heroCtaLink }}" class="btn btn-hero-primary">
                            <span>{{ $heroCtaPrimary }}</span>
                            <i class="bi bi-arrow-right"></i>
                        </a>
                        <a href="{{ route('case-studies') }}" class="btn btn-hero-secondary">
                            <i class="bi bi-journal-text me-1"></i>
                            <span>Explore Placements</span>
                        </a>
                    </div>

                    <!-- Trust Micro-Bar -->
                    <div class="hero-trust-bar">
                        <div class="hero-trust-pill">
                            <i class="bi bi-check-circle-fill"></i>
                            <span>100% Pre-Approval Rights</span>
                        </div>
                        <div class="hero-trust-pill">
                            <i class="bi bi-check-circle-fill"></i>
                            <span>Permanent Live Backlinks</span>
                        </div>
                        <div class="hero-trust-pill">
                            <i class="bi bi-check-circle-fill"></i>
                            <span>Zero Speculative Retainers</span>
                        </div>
                    </div>
                </div>

                <!-- Editorial Media Collage — Photorealistic Publication Cover -->
                <div class="col-lg-5">
                    <div class="hero-media-composition collage-float-anim">
                        <!-- Layer 1: Electric Cobalt Accent Backdrop Plate (#245BFF) -->
                        <div class="collage-cobalt-backdrop"></div>
                        
                        <!-- Layer 2: Deep Ink Architectural Backdrop (#171B24) -->
                        <div class="collage-ink-backdrop"></div>

                        <!-- Layer 3: Photorealistic Printed Magazine Cover Frame -->
                        <div class="collage-magazine-frame">
                            <img src="{{ asset('images/editorial_magazine_cover.jpg') }}" alt="The Executive Byline — International Business & Editorial Publication" class="magazine-cover-img" loading="eager">
                        </div>

                        <!-- Layer 4: Pinned Editorial Accreditation Badge -->
                        <div class="collage-tearsheet-badge">
                            <div class="collage-seal-icon">
                                <i class="bi bi-patch-check-fill"></i>
                            </div>
                            <div>
                                <div class="fw-bold small text-white">The Executive Byline • Press Edition</div>
                                <div class="text-white-50" style="font-size: 0.72rem;">100% Pre-Approved Copy • Permanent Digital Indexing</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- =========================================================================
         KINETIC TYPOGRAPHY PR MARQUEE TICKER (VISIBILITY • AUTHORITY • CREDIBILITY)
         ========================================================================= -->
    <div class="kinetic-ticker-wrap">
        <div class="kinetic-ticker-track" aria-hidden="true">
            <div class="kinetic-ticker-item">VISIBILITY <span class="ticker-dot">•</span></div>
            <div class="kinetic-ticker-item outlined">AUTHORITY <span class="ticker-dot orange">•</span></div>
            <div class="kinetic-ticker-item">CREDIBILITY <span class="ticker-dot">•</span></div>
            <div class="kinetic-ticker-item outlined">INFLUENCE <span class="ticker-dot cobalt">•</span></div>
            <div class="kinetic-ticker-item">RECOGNITION <span class="ticker-dot orange">•</span></div>
            <div class="kinetic-ticker-item">VISIBILITY <span class="ticker-dot">•</span></div>
            <div class="kinetic-ticker-item outlined">AUTHORITY <span class="ticker-dot orange">•</span></div>
            <div class="kinetic-ticker-item">CREDIBILITY <span class="ticker-dot">•</span></div>
            <div class="kinetic-ticker-item outlined">INFLUENCE <span class="ticker-dot cobalt">•</span></div>
            <div class="kinetic-ticker-item">RECOGNITION <span class="ticker-dot orange">•</span></div>
        </div>
    </div>

    <!-- =========================================================================
         SECTION 3: TRUST / PUBLICATION CREDIBILITY STRIP
         ========================================================================= -->
    <section class="publication-strip">
        <div class="container">
            <div class="text-center mb-4">
                <span class="text-uppercase fw-bold text-muted small" style="letter-spacing: 0.12em; font-size: 0.74rem;">
                    Representative Media Outlets & Publications Our Clients Appear In
                </span>
            </div>
            <div class="row align-items-center justify-content-center g-4 text-center">
                <div class="col-6 col-md-4 col-lg-2">
                    <span class="pub-logo-item">
                        <i class="bi bi-newspaper"></i> FORBES
                    </span>
                </div>
                <div class="col-6 col-md-4 col-lg-2">
                    <span class="pub-logo-item">
                        <i class="bi bi-graph-up"></i> BLOOMBERG
                    </span>
                </div>
                <div class="col-6 col-md-4 col-lg-2">
                    <span class="pub-logo-item">
                        <i class="bi bi-cpu"></i> TECHCRUNCH
                    </span>
                </div>
                <div class="col-6 col-md-4 col-lg-2">
                    <span class="pub-logo-item">
                        <i class="bi bi-briefcase"></i> FAST COMPANY
                    </span>
                </div>
                <div class="col-6 col-md-4 col-lg-2">
                    <span class="pub-logo-item">
                        <i class="bi bi-building"></i> INC. MAGAZINE
                    </span>
                </div>
                <div class="col-6 col-md-4 col-lg-2">
                    <span class="pub-logo-item">
                        <i class="bi bi-globe2"></i> REUTERS
                    </span>
                </div>
            </div>
            <div class="text-center mt-3">
                <small class="text-muted" style="font-size: 0.72rem;">
                    * All placements are coordinated under verified editorial standards. Specific outlets depend on category relevance and editorial review.
                </small>
            </div>
        </div>
    </section>

    <!-- =========================================================================
         SECTION 4: AGENCY INTRODUCTION — BOLD TYPOGRAPHIC MANIFESTO
         ========================================================================= -->
    <section class="section-pad-lg position-relative overflow-hidden">
        <!-- Outlined background decoration -->
        <div class="text-outline-bg light-bg" style="top: 8%; right: -2%;">EQUITY</div>

        <div class="container position-relative" style="z-index: 1;">
            <div class="row g-5 align-items-center">
                <div class="col-lg-5">
                    <div class="d-flex align-items-center gap-2 mb-3">
                        <span class="badge-rotated cobalt">Agency Philosophy</span>
                        <span class="eyebrow-badge">{{ $introEyebrow }}</span>
                    </div>
                    <h2 class="display-huge mb-4">
                        <span class="d-block font-sans fw-900 text-uppercase" style="letter-spacing: -0.04em;">WE DO NOT SELL HOURS.</span>
                        <span class="d-block font-serif fst-italic text-orange">We Deliver Published Ink.</span>
                    </h2>
                    <div class="pullquote my-4">
                        "Your buyers research you before signing. When they Google your name, what is the first story they read?"
                    </div>
                </div>

                <div class="col-lg-7">
                    <div class="ps-lg-4">
                        <p class="fs-5 text-muted mb-4" style="line-height: 1.8;">
                            {{ $introBody }}
                        </p>
                        <p class="text-muted mb-5">
                            Whether you are preparing for a capital raise, entering enterprise procurement cycles, or solidifying your position as a category leader, Byline Bridge provides high-precision media placement executed by veteran journalists. We never treat PR as vague activity—we treat it as permanent corporate equity.
                        </p>

                        <!-- Editorial Commitments Matrix -->
                        <div class="row g-4 pt-4 border-top border-secondary border-opacity-10">
                            <div class="col-md-4">
                                <div class="font-sans fs-2 fw-900 text-orange mb-1">100%</div>
                                <div class="fw-bold text-dark small text-uppercase" style="letter-spacing: 0.05em;">Pre-Approved Copy</div>
                                <div class="text-muted small">Every article signed off in writing prior to submission.</div>
                            </div>
                            <div class="col-md-4">
                                <div class="font-sans fs-2 fw-900 text-cobalt mb-1">PERMANENT</div>
                                <div class="fw-bold text-dark small text-uppercase" style="letter-spacing: 0.05em;">Digital Equity</div>
                                <div class="text-muted small">Indexed live press with searchable, authoritative backlinks.</div>
                            </div>
                            <div class="col-md-4">
                                <div class="font-sans fs-2 fw-900 text-ink mb-1">ZERO</div>
                                <div class="fw-bold text-dark small text-uppercase" style="letter-spacing: 0.05em;">Vague Retainers</div>
                                <div class="text-muted small">Targeted deliverables with guaranteed editorial placements.</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- =========================================================================
         SECTION 5: CORE SERVICES (Deep Ink & Giant Numbered Labels)
         ========================================================================= -->
    <section class="section-pad-lg bg-deep-ink position-relative overflow-hidden">
        <!-- Outlined Background Watermark -->
        <div class="text-outline-bg cobalt-glow" style="top: 2%; right: -2%; z-index: 0;">EXPERTISE</div>

        <div class="container position-relative" style="z-index: 1;">
            <div class="row mb-5 align-items-end justify-content-between">
                <div class="col-lg-8">
                    <div class="d-flex align-items-center gap-2 mb-3">
                        <span class="badge-rotated orange">Guaranteed Placements</span>
                        <span class="eyebrow-badge cobalt-dark">Our Core Capabilities</span>
                    </div>
                    <h2 class="display-huge text-white mb-3">
                        Strategic Publishing <span class="text-orange">&</span> High-Authority Media
                    </h2>
                    <p class="text-white-50 fs-5 mb-0" style="max-width: 680px;">
                        Tailored editorial solutions designed specifically for executives, founders, and companies that demand high standards and measurable deliverables.
                    </p>
                </div>
                <div class="col-lg-4 text-lg-end mt-4 mt-lg-0">
                    <a href="{{ route('services') }}" class="btn btn-hero-secondary">
                        <span>Compare All Offerings</span>
                        <i class="bi bi-arrow-right"></i>
                    </a>
                </div>
            </div>

            <div class="row g-4">
                @foreach($services as $index => $service)
                    <div class="col-lg-6 col-xl-3">
                        <div class="editorial-card dark">
                            <div class="d-flex justify-content-between align-items-start mb-3">
                                <div class="giant-service-number {{ $index % 2 === 1 ? 'cobalt' : 'orange' }}">0{{ $index + 1 }}</div>
                                @if($service->badge)
                                    <span class="badge-rotated {{ $index % 2 === 1 ? 'cobalt' : 'ink' }}" style="font-size: 0.68rem;">{{ $service->badge }}</span>
                                @endif
                            </div>

                            <h3 class="fs-4 mb-2 font-serif text-white fw-bold">{{ $service->title }}</h3>
                            <div class="text-orange small fw-bold mb-3 font-sans text-uppercase" style="letter-spacing: 0.05em;">{{ $service->tagline }}</div>
                            <p class="text-white-50 small mb-4 flex-grow-1" style="line-height: 1.65;">
                                {{ Str::limit($service->short_description, 140) }}
                            </p>

                            @if(!empty($service->features))
                                <div class="pt-3 border-top border-secondary border-opacity-25 mb-4">
                                    <ul class="list-unstyled small text-white-50 mb-0">
                                        @foreach(array_slice($service->features, 0, 3) as $featIndex => $feat)
                                            <li class="mb-2 d-flex align-items-start gap-2">
                                                <i class="bi bi-check2 {{ $featIndex % 2 === 1 ? 'text-cobalt' : 'text-orange' }} mt-1 fw-bold"></i>
                                                <span>{{ $feat }}</span>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <div class="d-flex justify-content-between align-items-center mt-auto">
                                <a href="{{ route('services.detail', $service->slug) }}" class="fw-semibold text-white text-decoration-none small d-flex align-items-center gap-1 hover-orange">
                                    <span>Learn More</span>
                                    <i class="bi bi-arrow-right"></i>
                                </a>
                                <a href="{{ route('contact', ['service' => $service->id]) }}" class="btn btn-sm btn-editorial-coral py-1 px-3" style="font-size: 0.8rem;">
                                    Get Quote
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- =========================================================================
         SECTION 6: HOW IT WORKS (FOUR-STEP PUBLISHING PROCESS)
         ========================================================================= -->
    <section class="section-pad-lg position-relative overflow-hidden bg-ivory">
        <div class="text-outline-bg light-bg" style="top: 5%; left: -2%;">PROCESS</div>
        <div class="container position-relative" style="z-index: 1;">
            <div class="text-center max-w-700 mx-auto mb-5">
                <span class="badge-rotated cobalt mb-3">Our Publishing Method</span>
                <h2 class="display-huge mb-3">How We Take Your Story to Market</h2>
                <p class="text-muted fs-5">
                    A transparent, four-step editorial workflow engineered to protect your time and guarantee total control over your public narrative.
                </p>
            </div>

            <div class="row g-4">
                <div class="col-md-6 col-lg-3">
                    <div class="process-step-item">
                        <div class="process-number">01</div>
                        <h4 class="font-sans fs-5 fw-bold text-uppercase mb-2" style="letter-spacing: -0.01em;">Strategic Angle</h4>
                        <p class="text-muted small mb-0">
                            A structured 45-minute strategy call with our senior editorial director. We unearth your unique accomplishments, proprietary data, and executive perspectives.
                        </p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3">
                    <div class="process-step-item">
                        <div class="process-number">02</div>
                        <h4 class="font-sans fs-5 fw-bold text-uppercase mb-2" style="letter-spacing: -0.01em;">We Draft</h4>
                        <p class="text-muted small mb-0">
                            Veteran business journalists craft an in-depth, publication-ready piece that adheres to strict journalistic guidelines, avoiding commercial fluff or jargon.
                        </p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3">
                    <div class="process-step-item">
                        <div class="process-number">03</div>
                        <h4 class="font-sans fs-5 fw-bold text-uppercase mb-2" style="letter-spacing: -0.01em;">You Approve</h4>
                        <p class="text-muted small mb-0">
                            You and your compliance team review every word. We do not pitch, submit, or release any article until you have signed off on the final draft in writing.
                        </p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3">
                    <div class="process-step-item">
                        <div class="process-number">04</div>
                        <h4 class="font-sans fs-5 fw-bold text-uppercase mb-2" style="letter-spacing: -0.01em;">It Goes Live</h4>
                        <p class="text-muted small mb-0">
                            Your article is published on the agreed target publication with permanent live links, search indexing, and a full press verification report.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- =========================================================================
         SECTION 7: EDITORIAL PLACEMENT FORMATS
         ========================================================================= -->
    <section class="section-pad-lg border-top border-bottom border-secondary border-opacity-10">
        <div class="container">
            <div class="row mb-5 align-items-end justify-content-between">
                <div class="col-lg-7">
                    <span class="eyebrow-badge solid-coral mb-3">Placement Architecture</span>
                    <h2 class="display-section mb-3">Editorial Placement Formats</h2>
                    <p class="text-muted fs-5 mb-0">
                        Structured publication formats engineered for corporate positioning, thought leadership, and permanent digital authority.
                    </p>
                </div>
                <div class="col-lg-4 text-lg-end mt-4 mt-lg-0">
                    <a href="{{ route('services') }}" class="btn btn-editorial-outline">
                        <span>Explore All Capabilities</span>
                        <i class="bi bi-arrow-right"></i>
                    </a>
                </div>
            </div>

            <div class="row g-4">
                <div class="col-lg-4">
                    <div class="case-tile">
                        <div class="case-tile-header">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <span class="badge-ink"><i class="bi bi-file-earmark-person"></i> Specification</span>
                                <span class="badge-cobalt solid">[Profile Format]</span>
                            </div>
                            <h3 class="fs-5 font-serif mb-1" style="line-height: 1.35;">Executive In-Depth Profile</h3>
                            <div class="text-muted small">Target: <strong class="text-dark">Tier-1 Business & Trade Press</strong></div>
                        </div>

                        <div class="case-tile-body">
                            <div class="mb-4">
                                <div class="text-muted small fw-semibold text-uppercase mb-1" style="font-size: 0.72rem; letter-spacing: 0.08em;">
                                    Placement Structure
                                </div>
                                <div class="case-metric-highlight mb-3">
                                    Full Biographical Feature
                                </div>
                                <p class="text-muted small mb-0">
                                    Comprehensive narrative profiling an executive's sector milestones, operating thesis, and technological contributions with executive portrait integration.
                                </p>
                            </div>

                            <div class="pt-3 border-top border-secondary border-opacity-10 d-flex justify-content-between align-items-center">
                                <span class="small text-muted">
                                    <i class="bi bi-check-circle-fill me-1 text-orange"></i> Pre-Approved Draft
                                </span>
                                <a href="{{ route('contact') }}" class="btn btn-sm btn-editorial-dark py-1 px-3">
                                    Inquire Format
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="case-tile">
                        <div class="case-tile-header">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <span class="badge-ink"><i class="bi bi-list-ol"></i> Specification</span>
                                <span class="badge-coral">[Leaderboard Format]</span>
                            </div>
                            <h3 class="fs-5 font-serif mb-1" style="line-height: 1.35;">Curated Industry Roundups</h3>
                            <div class="text-muted small">Target: <strong class="text-dark">Market Leaderboard Features</strong></div>
                        </div>

                        <div class="case-tile-body">
                            <div class="mb-4">
                                <div class="text-muted small fw-semibold text-uppercase mb-1" style="font-size: 0.72rem; letter-spacing: 0.08em;">
                                    Placement Structure
                                </div>
                                <div class="case-metric-highlight mb-3">
                                    Top-10 Sector Inclusion
                                </div>
                                <p class="text-muted small mb-0">
                                    Strategic inclusion in recognized thematic roundups, establishing benchmark authority among peer founders, CEOs, and industry category disruptors.
                                </p>
                            </div>

                            <div class="pt-3 border-top border-secondary border-opacity-10 d-flex justify-content-between align-items-center">
                                <span class="small text-muted">
                                    <i class="bi bi-check-circle-fill me-1 text-cobalt"></i> Social Proof License
                                </span>
                                <a href="{{ route('contact') }}" class="btn btn-sm btn-editorial-cobalt py-1 px-3">
                                    Inquire Format
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="case-tile">
                        <div class="case-tile-header">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <span class="badge-ink"><i class="bi bi-pen"></i> Specification</span>
                                <span class="badge-cobalt solid">[Byline Format]</span>
                            </div>
                            <h3 class="fs-5 font-serif mb-1" style="line-height: 1.35;">Contributed Opinion Articles</h3>
                            <div class="text-muted small">Target: <strong class="text-dark">Respected News Outlets</strong></div>
                        </div>

                        <div class="case-tile-body">
                            <div class="mb-4">
                                <div class="text-muted small fw-semibold text-uppercase mb-1" style="font-size: 0.72rem; letter-spacing: 0.08em;">
                                    Placement Structure
                                </div>
                                <div class="case-metric-highlight mb-3">
                                    Executive Byline Column
                                </div>
                                <p class="text-muted small mb-0">
                                    Analytical commentary and visionary essays authored under the executive's byline, articulating strategic insights on industry shifts and regulations.
                                </p>
                            </div>

                            <div class="pt-3 border-top border-secondary border-opacity-10 d-flex justify-content-between align-items-center">
                                <span class="small text-muted">
                                    <i class="bi bi-check-circle-fill me-1 text-orange"></i> Search Indexed
                                </span>
                                <a href="{{ route('contact') }}" class="btn btn-sm btn-editorial-dark py-1 px-3">
                                    Inquire Format
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="text-center mt-4">
                <small class="text-muted" style="font-size: 0.75rem;">
                    <i class="bi bi-shield-lock me-1 text-cobalt"></i> [Client Case Files Notice: In accordance with executive confidentiality and NDAs, direct client case studies and tear-sheets are reviewed exclusively during private discovery consultations.]
                </small>
            </div>
        </div>
    </section>

    <!-- =========================================================================
         SECTION 8: CLIENT PRIVACY & TESTIMONIAL STANDARDS (Ivory + Ink + Cobalt + Orange)
         ========================================================================= -->
    <section class="section-pad-lg bg-ivory">
        <div class="container">
            <div class="text-center max-w-700 mx-auto mb-5">
                <span class="badge-cobalt solid mb-3"><i class="bi bi-shield-lock-fill"></i> Executive Discretion</span>
                <h2 class="display-section mb-3 text-ink">Client Privacy & Review Governance</h2>
                <p class="text-muted fs-5">
                    Why the most discerning founders and enterprise leaders choose Byline Bridge to manage their media footprint.
                </p>
            </div>

            <div class="row g-4 align-items-center justify-content-center">
                <div class="col-lg-10">
                    <div class="p-4 p-md-5 bg-ink rounded-4 text-white text-center shadow-lg border border-secondary border-opacity-25 position-relative">
                        <div class="text-cobalt fs-1 mb-3">
                            <i class="bi bi-shield-check"></i>
                        </div>
                        <div class="mb-3">
                            <span class="badge-cobalt"><i class="bi bi-lock-fill"></i> Mutual NDA Governance</span>
                        </div>
                        <h3 class="font-serif fs-3 text-white mb-3">
                            Executive Discretion & Confidential Placement Dossiers
                        </h3>
                        <p class="text-white-50 fs-5 mb-4 max-w-700 mx-auto" style="line-height: 1.8;">
                            In accordance with strict client confidentiality and non-disclosure standards, Byline Bridge does not publish identifiable executive quotes or internal corporate data on public web pages. Sanitized editorial tear-sheets and client references are provided directly during private strategic consultations.
                        </p>
                        
                        <div class="row g-3 text-start pt-4 border-top border-secondary border-opacity-25 max-w-700 mx-auto">
                            <div class="col-md-4">
                                <div class="fw-bold small text-white"><i class="bi bi-check-circle-fill text-orange me-1"></i> Pre-Approval Rights</div>
                                <div class="text-white-50" style="font-size: 0.78rem;">Zero submissions without formal executive signoff.</div>
                            </div>
                            <div class="col-md-4">
                                <div class="fw-bold small text-white"><i class="bi bi-check-circle-fill text-cobalt me-1"></i> Mutual NDA</div>
                                <div class="text-white-50" style="font-size: 0.78rem;">Strict legal confidentiality executed prior to discovery.</div>
                            </div>
                            <div class="col-md-4">
                                <div class="fw-bold small text-white"><i class="bi bi-check-circle-fill text-orange me-1"></i> Live Link Proof</div>
                                <div class="text-white-50" style="font-size: 0.78rem;">Permanent live placement reports delivered upon publication.</div>
                            </div>
                        </div>

                        <div class="mt-4 pt-2">
                            <a href="{{ route('contact') }}" class="btn btn-editorial-coral px-4 py-2">
                                <span>Request Confidential Placement Dossier</span>
                                <i class="bi bi-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- =========================================================================
         SECTION 9: WHY CHOOSE US — BOLD TYPOGRAPHIC MANIFESTO (Deep Ink)
         ========================================================================= -->
    <section class="section-pad-lg bg-deep-ink position-relative overflow-hidden">
        <div class="text-outline-bg cobalt-glow" style="top: 8%; right: -2%;">INTEGRITY</div>

        <div class="container position-relative" style="z-index: 1;">
            <div class="row g-5 align-items-center">
                <div class="col-lg-5">
                    <span class="badge-rotated orange mb-3">Institutional Candor</span>
                    <h2 class="display-huge text-white mb-4">
                        <span class="d-block font-sans fw-900 text-uppercase" style="letter-spacing: -0.04em;">TRANSPARENCY</span>
                        <span class="d-block font-serif fst-italic text-orange">Is Not A Policy.</span>
                        <span class="d-block fs-3 font-sans fw-800 text-white-50 mt-2" style="letter-spacing: -0.02em;">IT IS OUR BUSINESS MODEL.</span>
                    </h2>
                    <p class="text-white-50 fs-5 mb-4" style="line-height: 1.7;">
                        We reject the deceptive practices that plague modern digital marketing. When you work with Byline Bridge, you experience a partnership rooted in transparency and guaranteed deliverables.
                    </p>
                    <a href="{{ route('contact') }}" class="btn btn-hero-primary px-4 py-3">
                        <span>Discuss Your Feature</span>
                        <i class="bi bi-arrow-right"></i>
                    </a>
                </div>

                <div class="col-lg-7">
                    <div class="row g-4">
                        <div class="col-md-6">
                            <div class="editorial-card dark">
                                <div class="text-orange fs-2 mb-3">
                                    <i class="bi bi-shield-lock"></i>
                                </div>
                                <h4 class="font-sans fs-5 fw-bold text-white mb-2 text-uppercase">100% Pre-Approval</h4>
                                <p class="text-white-50 small mb-0">
                                    We never pitch or publish without your written signoff. Your company secrets, regulatory boundaries, and tone of voice remain completely protected.
                                </p>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="editorial-card dark">
                                <div class="text-cobalt fs-2 mb-3">
                                    <i class="bi bi-eye"></i>
                                </div>
                                <h4 class="font-sans fs-5 fw-bold text-white mb-2 text-uppercase">Transparent Formats</h4>
                                <p class="text-white-50 small mb-0">
                                    We disclose whether an article is a contributed thought-leadership byline, an editorial roundup, or a sponsored feature before you commit.
                                </p>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="editorial-card dark">
                                <div class="text-orange fs-2 mb-3">
                                    <i class="bi bi-journal-check"></i>
                                </div>
                                <h4 class="font-sans fs-5 fw-bold text-white mb-2 text-uppercase">No Generic AI Jargon</h4>
                                <p class="text-white-50 small mb-0">
                                    Every article is researched and written by veteran journalists who understand balance sheets, technology architectures, and market dynamics.
                                </p>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="editorial-card dark">
                                <div class="text-cobalt fs-2 mb-3">
                                    <i class="bi bi-clipboard2-check"></i>
                                </div>
                                <h4 class="font-sans fs-5 fw-bold text-white mb-2 text-uppercase">Clear Deliverables</h4>
                                <p class="text-white-50 small mb-0">
                                    No opaque retainers that burn money while promising only "efforts." You pay for confirmed, live publication links with permanent indexing.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- =========================================================================
         SECTION 10: ABOUT / FOUNDER SECTION
         ========================================================================= -->
    <section class="section-pad-lg position-relative overflow-hidden">
        <div class="container">
            <div class="row g-5 align-items-center">
                <div class="col-lg-6">
                    <div class="p-4 p-md-5 bg-ivory rounded border border-secondary border-opacity-10 position-relative">
                        <div class="text-orange fs-1 mb-3">
                            <i class="bi bi-quote"></i>
                        </div>
                        <h3 class="font-serif fs-3 mb-4" style="line-height: 1.4;">
                            {{ $founderHeading }}
                        </h3>
                        <p class="text-muted mb-4" style="line-height: 1.8;">
                            {{ $founderBody }}
                        </p>
                        <div class="pt-3 border-top border-secondary border-opacity-10 d-flex align-items-center justify-content-between">
                            <div>
                                <div class="fw-bold text-dark">{{ $founderName }}</div>
                                <div class="text-muted small">{{ $founderTitle }}</div>
                            </div>
                            <span class="editorial-brand-mark">B</span>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="ps-lg-4">
                        <span class="badge-rotated cobalt mb-3">Behind the Agency</span>
                        <h2 class="display-huge mb-4">
                            Bridging Executive Stories with High-Authority Media
                        </h2>
                        <p class="text-muted fs-5 mb-4">
                            Byline Bridge was founded on a simple observation: the world's most accomplished founders often have the quietest digital footprints. Meanwhile, lesser-qualified competitors dominate media headlines through aggressive PR.
                        </p>
                        <p class="text-muted mb-5">
                            We exist to correct that imbalance. By pairing executive thought leaders with institutional publishing channels, we turn hard-won experience into searchable, authoritative media capital.
                        </p>
                        <div class="d-flex gap-3">
                            <a href="{{ route('about') }}" class="btn btn-editorial-dark">
                                <span>Learn More About Us</span>
                                <i class="bi bi-arrow-right"></i>
                            </a>
                            <a href="{{ route('contact') }}" class="btn btn-editorial-outline">
                                <span>Get in Touch</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- =========================================================================
         SECTION 11: FAQ ACCORDION
         ========================================================================= -->
    <section class="section-pad-lg border-top border-bottom border-secondary border-opacity-10 bg-ivory">
        <div class="container">
            <div class="text-center max-w-700 mx-auto mb-5">
                <span class="badge-rotated orange mb-3">Frequently Asked Questions</span>
                <h2 class="display-huge mb-3">Everything You Need to Know</h2>
                <p class="text-muted fs-5">
                    Clear answers to the most common questions regarding publications, review rights, and editorial placement.
                </p>
            </div>

            <div class="row justify-content-center">
                <div class="col-lg-9">
                    <div class="accordion accordion-editorial" id="homeFaqAccordion">
                        @foreach($faqs as $index => $faq)
                            <div class="accordion-item">
                                <h3 class="accordion-header" id="heading{{ $faq->id }}">
                                    <button class="accordion-button {{ $index > 0 ? 'collapsed' : '' }}" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $faq->id }}" aria-expanded="{{ $index === 0 ? 'true' : 'false' }}" aria-controls="collapse{{ $faq->id }}">
                                        {{ $faq->question }}
                                    </button>
                                </h3>
                                <div id="collapse{{ $faq->id }}" class="accordion-collapse collapse {{ $index === 0 ? 'show' : '' }}" aria-labelledby="heading{{ $faq->id }}" data-bs-parent="#homeFaqAccordion">
                                    <div class="accordion-body">
                                        {{ $faq->answer }}
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div class="text-center mt-4">
                        <p class="text-muted small">
                            Have a specific question not covered here? 
                            <a href="{{ route('faq') }}" class="text-dark fw-bold text-decoration-none">View full FAQ directory</a> or 
                            <a href="{{ route('contact') }}" class="text-orange fw-bold text-decoration-none">contact our editorial desk</a>.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- =========================================================================
         SECTION 12: FINAL HIGH-IMPACT CONVERSION CTA (MONUMENTAL TYPOGRAPHY)
         ========================================================================= -->
    <section class="section-pad-lg bg-deep-ink text-center position-relative overflow-hidden border-top border-4 border-orange">
        <!-- Outlined Background Watermark Text -->
        <div class="text-outline-bg orange-glow" style="top: 15%; left: 3%;">AUTHORITY</div>

        <div class="container position-relative" style="z-index: 2;">
            <div class="max-w-700 mx-auto">
                <span class="badge-rotated orange mb-4">Take the Next Step</span>
                <h2 class="display-monumental text-white mb-4">
                    <span class="word-stack">
                        <span class="font-sans fw-900 text-uppercase" style="letter-spacing: -0.04em;">READY TO COMMAND</span>
                        <span class="font-serif fst-italic text-orange kinetic-underline">The Byline?</span>
                    </span>
                </h2>
                <p class="display-subtitle mx-auto text-white-50 fs-5 mb-5">
                    {{ $ctaSubtitle }}
                </p>
                <div class="d-flex flex-wrap justify-content-center gap-3">
                    <a href="{{ route('contact') }}" class="btn btn-hero-primary px-5 py-3 fs-6">
                        <span>Schedule Private Editorial Discovery</span>
                        <i class="bi bi-arrow-right"></i>
                    </a>
                    <a href="tel:{{ \App\Models\SiteSetting::get('contact_phone', '+1 (212) 895-4300') }}" class="btn btn-hero-secondary px-4 py-3 fs-6">
                        <i class="bi bi-telephone me-2"></i>
                        <span>Call Us Directly</span>
                    </a>
                </div>
            </div>
        </div>
    </section>

@endsection
