@extends('layouts.app')

@section('title', $caseStudy->seo_title ?: ($caseStudy->title . ' | Veyora Media'))
@section('meta_description', $caseStudy->seo_description ?: $caseStudy->campaign_objective)

@section('content')

    <!-- Page Hero -->
    <section class="page-hero">
        <div class="w">
            <div class="breadcrumb-trail">
                <a href="{{ route('home') }}">Home</a>
                <span>/</span>
                <a href="{{ route('case-studies') }}">Case Studies</a>
                <span>/</span>
                <span style="color: #ffffff;">{{ $caseStudy->client_name }}</span>
            </div>

            <div style="display: flex; gap: 8px; justify-content: center; margin-bottom: 12px;">
                <span class="bd">{{ $caseStudy->industry }}</span>
                @if($caseStudy->publication_badge)
                    <span class="bd" style="border-color: var(--pu); color: var(--pu);">{{ $caseStudy->publication_badge }}</span>
                @endif
            </div>

            <h1>{{ $caseStudy->title }}</h1>
            <p style="color: var(--pu); font-weight: 500; font-size: 17px; margin-bottom: 8px;">
                Client: {{ $caseStudy->client_name }} • {{ $caseStudy->client_designation }}
            </p>
            <p style="color: var(--mut);">{{ $caseStudy->publication_name }}</p>

            @if($caseStudy->results_metric)
                <div style="margin-top: 24px;">
                    <div style="display: inline-block; background: var(--cd); border: 1px solid var(--ac); border-radius: 16px; padding: 12px 28px;">
                        <small style="color: var(--mut); display: block; text-transform: uppercase; font-size: 11.5px; letter-spacing: 0.08em;">Primary Outcome</small>
                        <strong style="color: var(--ac); font-family: var(--sf); font-size: 28px;">{{ $caseStudy->results_metric }}</strong>
                    </div>
                </div>
            @endif
        </div>
    </section>

    <!-- Case Study In-Depth Body -->
    <section>
        <div class="w">
            <div style="display: grid; grid-template-columns: 1.6fr 1fr; gap: 40px; align-items: flex-start;">
                
                <!-- Main Breakdown -->
                <div>
                    <!-- Objective -->
                    <div class="card-dark" style="margin-bottom: 30px;">
                        <h3 style="font-size: 22px; margin-bottom: 14px;">Campaign <i>Objective</i></h3>
                        <p style="color: #d8d8e6; font-size: 16px; line-height: 1.7; margin: 0;">
                            {{ $caseStudy->campaign_objective }}
                        </p>
                    </div>

                    <!-- Challenge -->
                    @if($caseStudy->challenge)
                        <div class="card-dark" style="margin-bottom: 30px;">
                            <h3 style="font-size: 22px; margin-bottom: 14px;">The Narrative <i>Challenge</i></h3>
                            <div style="color: var(--mut); font-size: 16px; line-height: 1.7;">
                                {!! $caseStudy->challenge !!}
                            </div>
                        </div>
                    @endif

                    <!-- Strategy -->
                    @if($caseStudy->strategy)
                        <div class="card-dark" style="margin-bottom: 30px;">
                            <h3 style="font-size: 22px; margin-bottom: 14px;">Editorial Strategy & <i>Framing</i></h3>
                            <div style="color: var(--mut); font-size: 16px; line-height: 1.7;">
                                {!! $caseStudy->strategy !!}
                            </div>
                        </div>
                    @endif

                    <!-- Results Summary -->
                    @if($caseStudy->results_summary)
                        <div class="card-dark" style="border-color: var(--ac);">
                            <h3 style="font-size: 22px; margin-bottom: 14px;">Published Results & <i>Impact</i></h3>
                            <div style="color: #d8d8e6; font-size: 16px; line-height: 1.7;">
                                {!! $caseStudy->results_summary !!}
                            </div>
                        </div>
                    @endif
                </div>

                <!-- Sidebar Metrics & CTA -->
                <div style="position: sticky; top: 100px;">
                    <!-- Metrics Breakdown -->
                    @if(!empty($caseStudy->metrics_breakdown))
                        <div class="card-dark" style="margin-bottom: 24px;">
                            <h3 style="font-size: 20px; margin-bottom: 18px;">Documented <i>Metrics</i></h3>
                            <div style="display: grid; gap: 14px;">
                                @foreach($caseStudy->metrics_breakdown as $metric)
                                    <div style="background: rgba(12, 10, 31, 0.6); border: 1px solid var(--bd); border-radius: 12px; padding: 14px 18px; display: flex; justify-content: space-between; align-items: center;">
                                        <span style="color: var(--mut); font-size: 14px;">{{ $metric['label'] ?? '' }}</span>
                                        <strong style="color: var(--ac); font-family: var(--sf); font-size: 18px;">{{ $metric['value'] ?? '' }}</strong>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif

                    <!-- Placement Details -->
                    <div class="card-dark" style="margin-bottom: 24px;">
                        <h4 style="font-size: 18px; margin-bottom: 14px;">Placement Details</h4>
                        <div style="font-size: 14px; color: var(--mut); line-height: 1.8;">
                            <div><strong style="color: #fff;">Client:</strong> {{ $caseStudy->client_name }}</div>
                            <div><strong style="color: #fff;">Industry:</strong> {{ $caseStudy->industry }}</div>
                            <div><strong style="color: #fff;">Media:</strong> {{ $caseStudy->publication_name }}</div>
                            @if($caseStudy->publication_url)
                                <div style="margin-top: 10px;">
                                    <a href="{{ $caseStudy->publication_url }}" target="_blank" rel="noopener noreferrer" style="color: var(--pu); font-weight: 500;">
                                        View Live Article ↗
                                    </a>
                                </div>
                            @endif
                        </div>
                    </div>

                    <!-- Get Similar Results -->
                    <div class="card-dark" style="text-align: center;">
                        <h4 style="font-size: 20px; margin-bottom: 8px;">Want Similar Results?</h4>
                        <p style="color: var(--mut); font-size: 14px; margin-bottom: 18px;">
                            Let’s discuss where your brand belongs in the upcoming news cycle.
                        </p>
                        <a href="{{ route('contact') }}" class="btn bw" style="width: 100%; justify-content: center;">
                            Get a Quote ↗
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </section>

@endsection
