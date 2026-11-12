@extends('layouts.app')

@section('title', 'Case Studies & Blogs | Veyora Media')
@section('meta_description', 'Explore verified media placement results and PR case studies across Technology, Finance, Healthcare, Lifestyle, and Entertainment with Veyora Media.')

@section('content')

    <!-- Page Hero -->
    <section class="page-hero">
        <div class="w">
            <span class="bd">PR Case Studies & Insights</span>
            <h1>Verified Placements & <i>Documented Outcomes</i></h1>
            <p>Explore how founders and brands leverage our media network to accelerate authority, fundraising rounds, and commercial credibility.</p>

            <!-- Industry Filter Pills -->
            <div style="display: flex; flex-wrap: wrap; justify-content: center; gap: 10px; margin-top: 24px;">
                <a href="{{ route('case-studies') }}" class="btn {{ empty($selectedIndustry) ? 'bw' : 'bo' }}" style="padding: 8px 18px; font-size: 13.5px;">
                    All Sectors
                </a>
                @foreach($industries as $industry)
                    <a href="{{ route('case-studies', ['industry' => $industry]) }}" class="btn {{ $selectedIndustry === $industry ? 'bw' : 'bo' }}" style="padding: 8px 18px; font-size: 13.5px;">
                        {{ $industry }}
                    </a>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Case Studies Grid -->
    <section>
        <div class="w">
            @if($caseStudies->isEmpty())
                <div class="card-dark" style="text-align: center; padding: 60px;">
                    <div style="font-size: 36px; color: var(--mut); margin-bottom: 14px;"><i class="bi bi-folder2-open"></i></div>
                    <h3 style="font-size: 22px; margin-bottom: 8px;">No case studies found</h3>
                    <p style="color: var(--mut); margin-bottom: 20px;">No published articles match the selected sector criteria.</p>
                    <a href="{{ route('case-studies') }}" class="btn bo">Clear Filter</a>
                </div>
            @else
                <div class="sg" style="grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));">
                    @foreach($caseStudies as $case)
                        <div class="card-dark" style="display: flex; flex-direction: column; justify-content: space-between;">
                            <div>
                                <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 14px;">
                                    <span class="bd" style="font-size: 12px; padding: 4px 12px;">{{ $case->industry }}</span>
                                    @if($case->results_metric)
                                        <span style="color: var(--ac); font-weight: 600; font-size: 13px;">{{ $case->results_metric }}</span>
                                    @endif
                                </div>

                                <h3 style="font-size: 22px; margin-bottom: 12px; line-height: 1.3;">
                                    <a href="{{ route('case-studies.detail', $case->slug) }}" style="color: #ffffff;">
                                        {{ $case->title }}
                                    </a>
                                </h3>

                                <div style="color: var(--pu); font-size: 13.5px; margin-bottom: 14px;">
                                    {{ $case->client_name }} • {{ $case->publication_name }}
                                </div>

                                <p style="color: var(--mut); font-size: 14.5px; line-height: 1.6; margin-bottom: 24px;">
                                    {{ $case->campaign_objective }}
                                </p>
                            </div>

                            <div style="border-top: 1px solid var(--bd); padding-top: 18px; display: flex; justify-content: space-between; align-items: center;">
                                <a href="{{ route('case-studies.detail', $case->slug) }}" style="color: var(--ac); font-weight: 600; font-size: 14px;">
                                    Read Full Breakdown →
                                </a>
                                @if($case->publication_badge)
                                    <small style="color: var(--mut);">{{ $case->publication_badge }}</small>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>

                <div style="margin-top: 40px;">
                    {{ $caseStudies->links() }}
                </div>
            @endif
        </div>
    </section>

@endsection
