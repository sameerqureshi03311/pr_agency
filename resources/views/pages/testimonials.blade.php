@extends('layouts.app')

@section('title', 'Client Reviews & Feedback | Veyora Media')
@section('meta_description', 'Read what founders, CEOs, and corporate leaders say about Veyora Media editorial excellence and verified media placement.')

@section('content')

    <!-- Page Hero -->
    <section class="page-hero">
        <div class="w">
            <span class="bd">Client Reviews & Testimonials</span>
            <h1>Hear It From Our <i>Partners</i></h1>
            <p>Real stories and feedback from founders and brand leaders who scaled their authority and credibility with Veyora Media.</p>
        </div>
    </section>

    <!-- Testimonials Grid -->
    <section>
        <div class="w">
            <div class="sg" style="grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));">
                @foreach($testimonials as $testi)
                    <div class="card-dark" style="display: flex; flex-direction: column; justify-content: space-between;">
                        <div>
                            <div style="color: var(--ac); margin-bottom: 14px; font-size: 16px;">
                                @for($i = 0; $i < ($testi->rating ?? 5); $i++)
                                    ★
                                @endfor
                            </div>
                            <p style="font-size: 15.5px; color: #d8d8e6; line-height: 1.65; margin-bottom: 24px; font-style: italic;">
                                "{{ $testi->quote }}"
                            </p>
                        </div>

                        <div style="border-top: 1px solid var(--bd); padding-top: 16px; margin-top: auto;">
                            <strong style="color: #ffffff; display: block; font-size: 15px;">{{ $testi->client_name }}</strong>
                            <small style="color: var(--mut); display: block;">{{ $testi->client_designation }} • {{ $testi->client_company }}</small>
                            @if($testi->publication_featured_in)
                                <small style="color: var(--pu); display: block; margin-top: 4px;">{{ $testi->publication_featured_in }}</small>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>

            @if($testimonials->hasPages())
                <div style="margin-top: 40px;">
                    {{ $testimonials->links() }}
                </div>
            @endif

            <!-- Feature Invitation Box -->
            <div class="rvw rv" style="margin-top: 60px;">
                <h3>Your Story Could Be Our Next Feature</h3>
                <p>We work with ambitious founders and growing brands across North America and Europe. Let’s talk about where your story belongs.</p>
                <a class="btn bk" href="{{ route('contact') }}">Get a Quote ↗</a>
            </div>
        </div>
    </section>

@endsection
