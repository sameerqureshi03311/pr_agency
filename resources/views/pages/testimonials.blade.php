@extends('layouts.app')

@section('title', 'Client Testimonials & Executive Feedback | Byline Bridge')
@section('meta_description', 'Read what startup founders, biotech researchers, and enterprise CEOs say about Byline Bridge editorial quality and publication results.')

@section('content')

    <!-- Header Banner — Monumental Typography -->
    <section class="subpage-hero-banner position-relative overflow-hidden">
        <div class="text-outline-bg cobalt-glow" style="top: 8%; right: -2%;">TRUST</div>
        <div class="container text-center position-relative" style="z-index: 1;">
            <span class="badge-rotated orange mb-3">Client Trust & Authority</span>
            <h1 class="display-monumental text-white mb-3">
                <span class="word-stack">
                    <span class="font-sans fw-900 text-uppercase" style="letter-spacing: -0.035em;">EXECUTIVE REPUTATION</span>
                    <span class="font-serif fst-italic text-orange">& Verified Feedback.</span>
                </span>
            </h1>
            <p class="display-subtitle mx-auto text-white-50 fs-5" style="max-width: 720px;">
                Executive credibility cannot be taken lightly. Here is how founders, CEOs, and corporate partners describe their experience partnering with Byline Bridge.
            </p>
        </div>
    </section>

    <!-- Testimonials Grid -->
    <section class="section-pad-lg position-relative overflow-hidden">
        <div class="container">
            <div class="row g-4 mb-5">
                @foreach($testimonials as $testi)
                    <div class="col-lg-4 col-md-6">
                        <div class="testimonial-editorial h-100">
                            <div>
                                <div class="text-orange mb-3">
                                    @for($i = 0; $i < $testi->rating; $i++)
                                        <i class="bi bi-star-fill"></i>
                                    @endfor
                                </div>
                                <div class="testimonial-quote">
                                    "{{ $testi->quote }}"
                                </div>
                            </div>

                            <div>
                                @if($testi->publication_featured_in)
                                    <div class="mb-3">
                                        <span class="badge-rotated cobalt" style="font-size: 0.7rem;">{{ $testi->publication_featured_in }}</span>
                                    </div>
                                @endif
                                <div class="testimonial-author">
                                    <div class="testimonial-avatar">
                                        {{ substr($testi->client_name, 0, 1) }}
                                    </div>
                                    <div>
                                        <div class="fw-bold font-sans small text-dark">{{ $testi->client_name }}</div>
                                        <div class="text-muted" style="font-size: 0.75rem;">{{ $testi->client_designation }}</div>
                                        <div class="text-orange fw-bold" style="font-size: 0.75rem;">{{ $testi->client_company }}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Pagination if needed -->
            @if($testimonials->hasPages())
                <div class="d-flex justify-content-center">
                    {{ $testimonials->links('pagination::bootstrap-5') }}
                </div>
            @endif
        </div>
    </section>

    <!-- Bottom CTA -->
    <section class="section-pad-md bg-dark-editorial text-center">
        <div class="container">
            <h2 class="font-serif text-white fs-2 mb-3">Build Your Personal Brand With Editorial Dignity</h2>
            <p class="text-muted-editorial fs-5 mb-4 max-w-700 mx-auto">
                Discover what publication options are available for your executive profile or company announcement.
            </p>
            <a href="{{ route('contact') }}" class="btn btn-editorial-coral px-4 py-3">
                <span>Request a Placement Quote</span>
                <i class="bi bi-arrow-right"></i>
            </a>
        </div>
    </section>

@endsection
