@extends('layouts.app')

@section('title', 'Services & Media Placements | Veyora Media')
@section('meta_description', 'Explore Veyora Media core PR services: Press & Media Coverage, Television Features, Magazine Profiles, Podcast Guesting, Digital PR, and Online Reputation Management.')

@section('content')

    <!-- Page Hero -->
    <section class="page-hero">
        <div class="w">
            <span class="bd">Services Catalog</span>
            <h1>Services Built to Get You <i>Noticed</i></h1>
            <p>Everything your brand needs to earn attention, build trust, and stay visible across the US, UK, and Canada.</p>
        </div>
    </section>

    <!-- Services Detailed Breakdown -->
    <section>
        <div class="w">
            <div style="display: grid; gap: 40px;">
                @foreach($services as $index => $service)
                    <div class="card-dark" style="padding: 44px; position: relative; overflow: hidden; border-top: 3px solid {{ $index % 2 === 0 ? 'var(--ac)' : 'var(--pu)' }};">
                        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(320px, 1fr)); gap: 36px; align-items: center;">
                            <div>
                                <div style="display: flex; align-items: center; gap: 14px; margin-bottom: 12px;">
                                    <span style="font-family: var(--sf); font-size: 32px; font-weight: 700; color: {{ $index % 2 === 0 ? 'var(--ac)' : 'var(--pu)' }};">
                                        0{{ $index + 1 }}
                                    </span>
                                    @if($service->badge)
                                        <span class="bd" style="font-size: 12px; padding: 4px 12px;">{{ $service->badge }}</span>
                                    @endif
                                </div>

                                <h2 style="text-align: left; font-size: clamp(24px, 3.5vw, 36px); margin-bottom: 8px;">
                                    {{ $service->title }}
                                </h2>

                                <div style="color: var(--pu); font-weight: 500; font-size: 14px; text-transform: uppercase; letter-spacing: 0.05em; margin-bottom: 18px;">
                                    {{ $service->tagline }}
                                </div>

                                <p style="color: var(--mut); font-size: 16px; line-height: 1.65; margin-bottom: 24px;">
                                    {{ $service->short_description }}
                                </p>

                                <div style="display: flex; gap: 14px; flex-wrap: wrap;">
                                    <a href="{{ route('services.detail', $service->slug) }}" class="btn bw">
                                        <span>Full Details</span>
                                        <span>↗</span>
                                    </a>
                                    <a href="{{ route('contact', ['service' => $service->id]) }}" class="btn bl">
                                        <span>Get a Quote ↗</span>
                                    </a>
                                </div>
                            </div>

                            <!-- Inclusions / Key Deliverables -->
                            <div style="background: rgba(12, 10, 31, 0.6); border: 1px solid var(--bd); border-radius: 16px; padding: 28px;">
                                <h4 style="font-family: var(--ss); font-size: 15px; font-weight: 600; text-transform: uppercase; letter-spacing: 0.06em; color: #ffffff; margin-bottom: 16px; display: flex; align-items: center; gap: 8px;">
                                    <span style="color: var(--ac);">✦</span> What's Included
                                </h4>

                                @if(!empty($service->features))
                                    <ul style="display: grid; gap: 12px;">
                                        @foreach($service->features as $feat)
                                            <li style="display: flex; align-items: flex-start; gap: 10px; font-size: 14.5px; color: #d8d8e6;">
                                                <i class="bi bi-check-circle-fill" style="color: var(--ac); margin-top: 2px; font-size: 14px;"></i>
                                                <span>{{ $feat }}</span>
                                            </li>
                                        @endforeach
                                    </ul>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section style="background: var(--cd);">
        <div class="w">
            <div class="cta rv">
                <div>
                    <span class="bd" style="border-color: var(--bd); background: none;">Serving the US, UK & Canada</span>
                    <h2 style="margin-top: 16px;">Need a Tailored <i>PR Package?</i></h2>
                    <p>Every brand journey is unique. Reach out to our strategy desk and we’ll customize an editorial placement plan around your upcoming announcements.</p>
                    <div class="bt">
                        <a class="btn bk" href="{{ route('contact') }}">Get a Quote ↗</a>
                        <a class="btn bl" href="{{ route('about') }}">Our Story ↗</a>
                    </div>
                </div>
                <div class="fan" aria-hidden="true">
                    <img src="{{ asset('images/covers/tech-cover.jpg') }}" alt="Tech cover">
                    <img src="{{ asset('images/covers/finance-cover.jpg') }}" alt="Finance cover">
                    <img src="{{ asset('images/covers/healthcare-cover.jpg') }}" alt="Healthcare cover">
                </div>
            </div>
        </div>
    </section>

@endsection
