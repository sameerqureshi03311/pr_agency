@extends('layouts.app')

@section('title', 'About Us | Veyora Media')
@section('meta_description', 'Discover the story, mission, and publishing standards behind Veyora Media—the PR agency helping ambitious brands turn stories into lasting visibility.')

@section('content')

    <!-- Page Hero -->
    <section class="page-hero">
        <div class="w">
            <span class="bd">Our Story & Mission</span>
            <h1>Media Placement Built for <i>Growth</i></h1>
            <p>We bridge the divide between real-world brand achievements and high-authority digital press across the US, UK, and Canada. Zero opaque retainers. 100% client pre-approval.</p>
        </div>
    </section>

    <!-- Narrative Section -->
    <section>
        <div class="w">
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(320px, 1fr)); gap: 48px; align-items: center;">
                <div>
                    <span class="bd" style="margin-bottom: 16px;">The Veyora Origin</span>
                    <h2 style="text-align: left; margin: 16px 0 20px;">An Antidote to the <i>Traditional PR Retainer</i></h2>
                    <p style="color: var(--mut); font-size: 16.5px; line-height: 1.7; margin-bottom: 18px;">
                        Traditional public relations was invented decades ago for a very different world. Yet today, many legacy agencies still operate on the same opaque model: charging $10,000 to $20,000 every month on long-term retainers while offering vague promises of "ongoing media outreach."
                    </p>
                    <p style="color: var(--mut); font-size: 16.5px; line-height: 1.7; margin-bottom: 18px;">
                        Veyora Media was founded to challenge this opacity. We believe that ambitious founders, growing companies, and established brands deserve clear deliverables, absolute control over their public narrative, and transparent publication placements that permanently enhance their digital equity.
                    </p>
                    <p style="color: var(--mut); font-size: 16.5px; line-height: 1.7;">
                        We function like an elite editorial newsroom. Our team brings together veteran journalists, seasoned editors, and media strategists who understand what editors require and how to position your brand for lasting visibility.
                    </p>
                </div>

                <div class="card-dark" style="padding: 40px;">
                    <div style="color: var(--ac); font-size: 32px; margin-bottom: 20px;"><i class="bi bi-compass"></i></div>
                    <h3 style="font-size: 24px; margin-bottom: 24px;">Our Three Core Commitments</h3>

                    <div style="border-bottom: 1px solid var(--bd); padding-bottom: 20px; margin-bottom: 20px;">
                        <h4 style="color: var(--ac); font-size: 18px; margin-bottom: 6px;">1. 100% Client Approval</h4>
                        <p style="color: var(--mut); font-size: 14.5px; margin: 0;">
                            Nothing is ever submitted or published without your explicit review and signoff. You retain complete ownership over every factual statement, angle, and quote.
                        </p>
                    </div>

                    <div style="border-bottom: 1px solid var(--bd); padding-bottom: 20px; margin-bottom: 20px;">
                        <h4 style="color: var(--pu); font-size: 18px; margin-bottom: 6px;">2. Story-First Precision</h4>
                        <p style="color: var(--mut); font-size: 14.5px; margin: 0;">
                            We craft deeply researched, compelling narratives that journalists and readers genuinely value—not robotic or keyword-stuffed releases.
                        </p>
                    </div>

                    <div>
                        <h4 style="color: #ffffff; font-size: 18px; margin-bottom: 6px;">3. Verifiable Deliverables</h4>
                        <p style="color: var(--mut); font-size: 14.5px; margin: 0;">
                            Live links, verified publication URLs, and permanent digital archiving. You always know exactly what your investment delivers.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section style="background: var(--cd);">
        <div class="w">
            <h2 class="rv">Our Impact in <i>Numbers</i></h2>
            <p class="sub rv">A proven track record of placing category leaders where their audience reads.</p>

            <div class="sts" style="grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));">
                <div class="st rv">
                    <strong>3</strong>
                    <h3>Core Markets</h3>
                    <p>United States, United Kingdom, and Canada</p>
                </div>
                <div class="st rv">
                    <strong>8+</strong>
                    <h3>Verticals Covered</h3>
                    <p>Tailored strategies for tech, finance, healthcare, lifestyle & entertainment</p>
                </div>
                <div class="st rv">
                    <strong>950+</strong>
                    <h3>Articles Published</h3>
                    <p>Secured across premier digital news and magazine publications</p>
                </div>
                <div class="st rv">
                    <strong>100%</strong>
                    <h3>Approval Rate</h3>
                    <p>Every story reviewed and authorized before it goes live</p>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Banner -->
    <section>
        <div class="w">
            <div class="cta rv">
                <div>
                    <span class="bd" style="border-color: var(--bd); background: none;">Work With Veyora Media</span>
                    <h2 style="margin-top: 16px;">Ready to Put Your Brand in the <i>Spotlight?</i></h2>
                    <p>Share your story with us, and let’s craft a media placement plan designed to accelerate your authority.</p>
                    <div class="bt">
                        <a class="btn bk" href="{{ route('contact') }}">Get a Quote ↗</a>
                        <a class="btn bl" href="{{ route('services') }}">Explore Services ↗</a>
                    </div>
                </div>
                <div class="fan" aria-hidden="true">
                    <img src="{{ asset('images/covers/tech-cover.jpg') }}" alt="Tech cover">
                    <img src="{{ asset('images/covers/finance-cover.jpg') }}" alt="Finance cover">
                    <img src="{{ asset('images/covers/lifestyle-cover.jpg') }}" alt="Lifestyle cover">
                </div>
            </div>
        </div>
    </section>

@endsection
