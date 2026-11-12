@extends('layouts.app')

@section('title', 'Frequently Asked Questions | Veyora Media')
@section('meta_description', 'Everything you need to know about Veyora Media PR processes, 100% client pre-approval rights, turnaround timelines, and media placement.')

@section('content')

    <!-- Page Hero -->
    <section class="page-hero">
        <div class="w">
            <span class="bd">Transparency First</span>
            <h1>Frequently Asked <i>Questions</i></h1>
            <p>Clear answers regarding our publishing relationships, client signoff guarantees, turnaround times, and pricing models.</p>
        </div>
    </section>

    <!-- FAQ Accordions -->
    <section>
        <div class="w">
            <div class="fq">
                @php $first = true; @endphp
                @foreach($faqs as $category => $items)
                    @if(!empty($category))
                        <h3 style="font-size: 22px; color: var(--ac); margin-top: 24px; margin-bottom: 8px;">
                            {{ $category }}
                        </h3>
                    @endif
                    @foreach($items as $faq)
                        <details class="rv" {{ $first ? 'open' : '' }}>
                            <summary>{{ $faq->question }}</summary>
                            <p>{{ $faq->answer }}</p>
                        </details>
                        @php $first = false; @endphp
                    @endforeach
                @endforeach
            </div>

            <!-- Still have questions box -->
            <div class="rvw rv" style="margin-top: 60px;">
                <h3>Have a Question Not Listed Here?</h3>
                <p>Our editorial strategy desk is available to answer any questions regarding custom industry placements, embargoes, or executive confidentiality requirements.</p>
                <a class="btn bk" href="{{ route('contact') }}">Contact Our Editorial Desk ↗</a>
            </div>
        </div>
    </section>

@endsection
