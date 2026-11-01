@extends('layouts.app')

@section('title', 'Frequently Asked Questions & Standards | Byline Bridge')
@section('meta_description', 'Everything you need to know about our PR publishing process, client review rights, publication types, and deliverable guarantees.')

@section('content')

    <!-- Header Banner — Monumental Typography -->
    <section class="subpage-hero-banner position-relative overflow-hidden">
        <div class="text-outline-bg cobalt-glow" style="top: 8%; right: -2%;">POLICIES</div>
        <div class="container text-center position-relative" style="z-index: 1;">
            <span class="badge-rotated orange mb-3">Transparency First</span>
            <h1 class="display-monumental text-white mb-3">
                <span class="word-stack">
                    <span class="font-sans fw-900 text-uppercase" style="letter-spacing: -0.035em;">FREQUENTLY ASKED</span>
                    <span class="font-serif fst-italic text-orange">Questions & Editorial Policies.</span>
                </span>
            </h1>
            <p class="display-subtitle mx-auto text-white-50 fs-5" style="max-width: 720px;">
                Clear answers regarding our publication relationships, client signoff guarantees, turnaround times, and pricing models.
            </p>
        </div>
    </section>

    <!-- FAQ Categories & Accordions -->
    <section class="section-pad-lg">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-9">
                    @foreach($faqs as $category => $items)
                        <div class="mb-5">
                            <h3 class="font-serif fs-3 mb-4 d-flex align-items-center gap-2">
                                <i class="bi bi-bookmark-star text-editorial-gold"></i>
                                <span>{{ $category }}</span>
                            </h3>

                            <div class="accordion accordion-editorial" id="faqGroup{{ Str::slug($category) }}">
                                @foreach($items as $index => $faq)
                                    <div class="accordion-item">
                                        <h4 class="accordion-header" id="heading{{ $faq->id }}">
                                            <button class="accordion-button {{ $index > 0 ? 'collapsed' : '' }}" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $faq->id }}" aria-expanded="{{ $index === 0 ? 'true' : 'false' }}" aria-controls="collapse{{ $faq->id }}">
                                                {{ $faq->question }}
                                            </button>
                                        </h4>
                                        <div id="collapse{{ $faq->id }}" class="accordion-collapse collapse {{ $index === 0 ? 'show' : '' }}" aria-labelledby="heading{{ $faq->id }}" data-bs-parent="#faqGroup{{ Str::slug($category) }}">
                                            <div class="accordion-body">
                                                {{ $faq->answer }}
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endforeach

                    <!-- Still have questions box -->
                    <div class="p-5 bg-ivory-base rounded border border-secondary border-opacity-10 text-center mt-5">
                        <div class="text-editorial-gold fs-2 mb-2"><i class="bi bi-headset"></i></div>
                        <h4 class="font-serif fs-4 mb-2">Have a Question Not Listed Here?</h4>
                        <p class="text-muted small mb-4 max-w-700 mx-auto">
                            Our editorial desk is available to answer any questions regarding custom industry placements, embargoes, or executive confidentiality requirements.
                        </p>
                        <a href="{{ route('contact') }}" class="btn btn-editorial-dark">
                            <span>Inquire With Our Editorial Desk</span>
                            <i class="bi bi-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
