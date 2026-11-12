@extends('layouts.app')

@section('title', $service->seo_title ?: ($service->title . ' | Veyora Media'))
@section('meta_description', $service->seo_description ?: $service->short_description)

@section('content')

    <!-- Page Hero -->
    <section class="page-hero">
        <div class="w">
            <div class="breadcrumb-trail">
                <a href="{{ route('home') }}">Home</a>
                <span>/</span>
                <a href="{{ route('services') }}">Services</a>
                <span>/</span>
                <span style="color: #ffffff;">{{ $service->title }}</span>
            </div>

            @if($service->badge)
                <div style="margin-bottom: 12px;"><span class="bd">{{ $service->badge }}</span></div>
            @endif

            <h1>{{ $service->title }}</h1>
            <p style="color: var(--pu); font-weight: 500; font-size: 18px; margin-bottom: 14px;">{{ $service->tagline }}</p>
            <p>{{ $service->short_description }}</p>

            <div class="bt" style="justify-content: center; margin-top: 24px;">
                <a href="{{ route('contact', ['service' => $service->id]) }}" class="btn bw">
                    <span>Request Placement Quote ↗</span>
                </a>
                <a href="{{ route('services') }}" class="btn bo">
                    <span>← All Services</span>
                </a>
            </div>
        </div>
    </section>

    <!-- Service Body & In-Depth Details -->
    <section>
        <div class="w">
            <div style="display: grid; grid-template-columns: 1.6fr 1fr; gap: 40px; align-items: flex-start;">
                
                <!-- Main Service Description -->
                <div>
                    <div class="card-dark" style="margin-bottom: 34px;">
                        <h2 style="text-align: left; font-size: 28px; margin-bottom: 20px;">
                            Strategic Value & <i>Overview</i>
                        </h2>
                        <div style="color: #d8d8e6; font-size: 16.5px; line-height: 1.8;">
                            {!! $service->full_description !!}
                        </div>

                        @if(!empty($service->features))
                            <h3 style="font-size: 22px; margin-top: 36px; margin-bottom: 20px;">
                                What This Feature <i>Includes</i>
                            </h3>
                            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(260px, 1fr)); gap: 14px;">
                                @foreach($service->features as $feature)
                                    <div style="background: rgba(12, 10, 31, 0.6); border: 1px solid var(--bd); border-radius: 12px; padding: 16px; display: flex; align-items: flex-start; gap: 10px;">
                                        <i class="bi bi-check-circle-fill" style="color: var(--ac); margin-top: 2px;"></i>
                                        <span style="font-size: 14.5px; color: #f2f0ff;">{{ $feature }}</span>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    </div>

                    <!-- Step-by-Step Delivery Roadmap -->
                    @if(!empty($service->deliverables))
                        <div class="card-dark">
                            <h2 style="text-align: left; font-size: 28px; margin-bottom: 24px;">
                                Delivery <i>Roadmap</i>
                            </h2>
                            <div style="display: grid; gap: 18px;">
                                @foreach($service->deliverables as $deliv)
                                    <div style="background: rgba(12, 10, 31, 0.5); border-left: 3px solid var(--ac); border-radius: 0 12px 12px 0; padding: 20px 24px;">
                                        <div style="color: var(--ac); font-weight: 600; font-size: 12.5px; text-transform: uppercase; letter-spacing: 0.08em; margin-bottom: 4px;">
                                            {{ $deliv['phase'] ?? 'Phase' }}
                                        </div>
                                        <h4 style="font-size: 18px; margin-bottom: 6px; color: #ffffff;">
                                            {{ $deliv['title'] ?? '' }}
                                        </h4>
                                        <p style="color: var(--mut); margin: 0; font-size: 14.5px;">
                                            {{ $deliv['desc'] ?? '' }}
                                        </p>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif
                </div>

                <!-- Sticky Sidebar -->
                <div style="position: sticky; top: 100px;">
                    <div class="card-dark" style="margin-bottom: 24px;">
                        <h3 style="font-size: 22px; margin-bottom: 12px;">Get Started with {{ $service->title }}</h3>
                        <p style="color: var(--mut); font-size: 14.5px; margin-bottom: 20px;">
                            Share your goals with our editorial desk to receive publication availability, editorial calendar slots, and package pricing.
                        </p>
                        <a href="{{ route('contact', ['service' => $service->id]) }}" class="btn bw" style="width: 100%; justify-content: center; margin-bottom: 12px;">
                            Get a Quote ↗
                        </a>
                        <a href="mailto:hey@veyoramedia.com" class="btn bl" style="width: 100%; justify-content: center;">
                            Email Editorial Desk ↗
                        </a>
                    </div>

                    <!-- Client Approval Guarantee Pill -->
                    <div class="card-dark" style="border-color: var(--pu); background: rgba(167, 139, 250, 0.08);">
                        <div style="display: flex; gap: 12px; align-items: flex-start;">
                            <i class="bi bi-shield-check" style="font-size: 24px; color: var(--ac);"></i>
                            <div>
                                <strong style="display: block; font-size: 15px; color: #ffffff; margin-bottom: 4px;">100% Client Pre-Approval</strong>
                                <p style="font-size: 13.5px; color: var(--mut); margin: 0;">
                                    Nothing goes live without your final sign-off. You review and approve every word before submission.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

@endsection
