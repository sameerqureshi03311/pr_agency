@extends('layouts.app')

@section('title', 'Request a Quote & Confidential Media Consultation | Byline Bridge')
@section('meta_description', 'Contact the editorial desk at Byline Bridge to request a placement quote, check publication availability, or schedule a strategic narrative interview.')

@section('content')

    <!-- Header Banner — Monumental Call-to-Action Headline -->
    <section class="subpage-hero-banner position-relative overflow-hidden">
        <div class="text-outline-bg orange-glow" style="top: 8%; right: -2%;">INQUIRE</div>
        <div class="container text-center position-relative" style="z-index: 1;">
            <span class="badge-rotated orange mb-3">Confidential Editorial Consultation</span>
            <h1 class="display-monumental text-white mb-3">
                <span class="word-stack">
                    <span class="font-sans fw-900 text-uppercase" style="letter-spacing: -0.035em;">LET'S DISCUSS YOUR</span>
                    <span class="font-serif fst-italic text-orange">Executive Placement.</span>
                </span>
            </h1>
            <p class="display-subtitle mx-auto text-white-50 fs-5" style="max-width: 720px;">
                Complete the inquiry below to connect directly with our senior editorial strategists. Every submission is protected under mutual non-disclosure and reviewed within 24 business hours.
            </p>
        </div>
    </section>

    <!-- Form & Contact Details Section -->
    <section class="section-pad-lg">
        <div class="container">
            <div class="row g-5">
                <!-- Contact Form -->
                <div class="col-lg-7">
                    <div class="p-4 p-md-5 bg-white rounded border border-secondary border-opacity-10 shadow-sm">
                        <div class="d-flex justify-content-between align-items-center mb-4 pb-3 border-bottom border-secondary border-opacity-10">
                            <h2 class="font-serif fs-3 mb-0">Placement Consultation Request</h2>
                            <span class="badge bg-dark text-white px-2 py-1 small">Strict NDA Protected</span>
                        </div>

                        <form action="{{ route('contact.submit') }}" method="POST">
                            @csrf

                            <div class="row g-3 mb-3">
                                <div class="col-md-6">
                                    <label for="name" class="form-editorial-label">Your Full Name *</label>
                                    <input type="text" class="form-control form-editorial-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" placeholder="e.g. Sarah Jenkins" required>
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <label for="email" class="form-editorial-label">Work Email Address *</label>
                                    <input type="email" class="form-control form-editorial-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" placeholder="e.g. s.jenkins@company.com" required>
                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row g-3 mb-3">
                                <div class="col-md-6">
                                    <label for="phone" class="form-editorial-label">Direct Phone / WhatsApp</label>
                                    <input type="tel" class="form-control form-editorial-control @error('phone') is-invalid @enderror" id="phone" name="phone" value="{{ old('phone') }}" placeholder="+1 (555) 000-0000">
                                    @error('phone')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <label for="company" class="form-editorial-label">Company Name / Organization</label>
                                    <input type="text" class="form-control form-editorial-control @error('company') is-invalid @enderror" id="company" name="company" value="{{ old('company') }}" placeholder="e.g. Enterprise Group">
                                    @error('company')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row g-3 mb-3">
                                <div class="col-md-6">
                                    <label for="website" class="form-editorial-label">Company Website / LinkedIn URL</label>
                                    <input type="url" class="form-control form-editorial-control @error('website') is-invalid @enderror" id="website" name="website" value="{{ old('website') }}" placeholder="https://">
                                    @error('website')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <label for="service_id" class="form-editorial-label">Service of Interest</label>
                                    <select class="form-select form-editorial-control @error('service_id') is-invalid @enderror" id="service_id" name="service_id">
                                        <option value="">Select a placement format...</option>
                                        @foreach($services as $srv)
                                            <option value="{{ $srv->id }}" {{ (old('service_id', $preselectedServiceId) == $srv->id) ? 'selected' : '' }}>
                                                {{ $srv->title }}
                                            </option>
                                        @endforeach
                                        <option value="" {{ old('service_id') === 'custom' ? 'selected' : '' }}>Custom Advisory / Multiple Offerings</option>
                                    </select>
                                    @error('service_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row g-3 mb-3">
                                <div class="col-md-6">
                                    <label for="target_publication" class="form-editorial-label">Target Publications Desired (Optional)</label>
                                    <input type="text" class="form-control form-editorial-control @error('target_publication') is-invalid @enderror" id="target_publication" name="target_publication" value="{{ old('target_publication') }}" placeholder="e.g. Forbes, TechCrunch, Healthcare Trade">
                                    @error('target_publication')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <label for="budget_range" class="form-editorial-label">Estimated Budget Allocation</label>
                                    <select class="form-select form-editorial-control @error('budget_range') is-invalid @enderror" id="budget_range" name="budget_range">
                                        <option value="">Select budget range...</option>
                                        <option value="$3,000 - $5,000" {{ old('budget_range') === '$3,000 - $5,000' ? 'selected' : '' }}>$3,000 – $5,000</option>
                                        <option value="$5,000 - $10,000" {{ old('budget_range') === '$5,000 - $10,000' ? 'selected' : '' }}>$5,000 – $10,000</option>
                                        <option value="$10,000 - $25,000" {{ old('budget_range') === '$10,000 - $25,000' ? 'selected' : '' }}>$10,000 – $25,000</option>
                                        <option value="$25,000+" {{ old('budget_range') === '$25,000+' ? 'selected' : '' }}>$25,000+ (Enterprise Multi-Placement)</option>
                                    </select>
                                    @error('budget_range')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-4">
                                <label for="message" class="form-editorial-label">Tell Us About Your Milestone or Objective *</label>
                                <textarea class="form-control form-editorial-control @error('message') is-invalid @enderror" id="message" name="message" rows="5" placeholder="Share a few bullet points about your company, your role, any upcoming milestones (funding, launch, licensing), and what narrative you wish to establish." required>{{ old('message') }}</textarea>
                                @error('message')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-check mb-4">
                                <input class="form-check-input @error('privacy_consent') is-invalid @enderror" type="checkbox" id="privacy_consent" name="privacy_consent" value="1" {{ old('privacy_consent') ? 'checked' : '' }} required>
                                <label class="form-check-label small text-muted" for="privacy_consent">
                                    I consent to Byline Bridge reviewing this confidential information under standard agency confidentiality terms. We will never share or sell your details.
                                </label>
                                @error('privacy_consent')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-editorial-gold px-5 py-3 w-100 justify-content-center fs-6">
                                <span>Submit Confidential Request</span>
                                <i class="bi bi-arrow-right"></i>
                            </button>
                        </form>
                    </div>
                </div>

                <!-- Agency Information & Credibility Box -->
                <div class="col-lg-5">
                    <div class="p-4 p-md-5 bg-ivory-base rounded border border-secondary border-opacity-10 mb-4">
                        <span class="eyebrow-badge mb-3">Direct Contacts</span>
                        <h3 class="font-serif fs-4 mb-4">Agency Headquarters</h3>

                        <div class="d-flex align-items-start gap-3 mb-4">
                            <div class="fs-4 text-editorial-gold mt-1"><i class="bi bi-geo-alt"></i></div>
                            <div>
                                <div class="fw-bold text-dark small">New York Office</div>
                                <div class="text-muted small">
                                    {{ \App\Models\SiteSetting::get('contact_address', '450 Lexington Avenue, Suite 2800, New York, NY 10017') }}
                                </div>
                            </div>
                        </div>

                        <div class="d-flex align-items-start gap-3 mb-4">
                            <div class="fs-4 text-editorial-gold mt-1"><i class="bi bi-telephone"></i></div>
                            <div>
                                <div class="fw-bold text-dark small">Direct Line</div>
                                <div class="text-muted small">
                                    <a href="tel:{{ \App\Models\SiteSetting::get('contact_phone', '+1 (212) 895-4300') }}" class="text-muted text-decoration-none hover-gold">
                                        {{ \App\Models\SiteSetting::get('contact_phone', '+1 (212) 895-4300') }}
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex align-items-start gap-3 mb-4">
                            <div class="fs-4 text-editorial-gold mt-1"><i class="bi bi-envelope"></i></div>
                            <div>
                                <div class="fw-bold text-dark small">Editorial Inquiries</div>
                                <div class="text-muted small">
                                    <a href="mailto:{{ \App\Models\SiteSetting::get('contact_email', 'inquiries@bylinebridge.com') }}" class="text-muted text-decoration-none hover-gold">
                                        {{ \App\Models\SiteSetting::get('contact_email', 'inquiries@bylinebridge.com') }}
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex align-items-start gap-3">
                            <div class="fs-4 text-editorial-gold mt-1"><i class="bi bi-clock-history"></i></div>
                            <div>
                                <div class="fw-bold text-dark small">Operating Desk Hours</div>
                                <div class="text-muted small">Monday – Friday: 8:30 AM – 6:30 PM EST</div>
                            </div>
                        </div>
                    </div>

                    <!-- Guarantee Card -->
                    <div class="p-4 bg-dark-editorial rounded text-white">
                        <div class="text-editorial-gold fs-2 mb-2"><i class="bi bi-shield-check"></i></div>
                        <h4 class="font-serif fs-4 text-white mb-2">Our Pre-Approval Guarantee</h4>
                        <p class="text-muted-editorial small mb-0">
                            We operate on 100% transparency. No article, draft, or byline is ever published or pitched to an editor until you have reviewed and signed off on the exact wording.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
