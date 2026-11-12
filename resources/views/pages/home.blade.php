@extends('layouts.app')

@section('title', \App\Models\SiteSetting::get('default_seo_title', 'Veyora Media | We Turn Your Story Into Lasting Visibility'))
@section('meta_description', \App\Models\SiteSetting::get('default_seo_description', 'PR & content for growing brands in the US, UK & Canada. We write, pitch, and publish your story on trusted media platforms.'))

@section('content')

    <!-- 1. HERO SECTION -->
    <section class="hero">
        <div class="hero-bg" aria-hidden="true"></div>
        <div class="hero-overlay" aria-hidden="true"></div>
        <div class="w">
            <span class="bd fu">{{ $heroBadge }}</span>
            <h1 class="fu">We Turn Your Story Into <i>Lasting Visibility</i></h1>
            <p class="fu">{{ $heroSubtitle }}</p>
            <div class="bt fu">
                <a class="btn bw" href="#contact">Get Started ↗</a>
                <a class="btn bo" href="{{ route('about') }}">Our Story ↗</a>
            </div>
        </div>
    </section>

    <!-- 2. MARQUEE TICKER -->
    <div class="mq" aria-hidden="true">
        <div>
            <span>Forbes</span>
            <span>Entrepreneur</span>
            <span>Inc.</span>
            <span>MSN</span>
            <span>Fortune</span>
            <span>VentureBeat</span>
            <span>Time</span>
            <span>Business Insider</span>
            <span>Entertainment</span>
            <span>Technology</span>
            <span>Finance</span>
            <span>Lifestyle</span>
            <span>Healthcare</span>
            <!-- Repeated for continuous loop -->
            <span>Forbes</span>
            <span>Entrepreneur</span>
            <span>Inc.</span>
            <span>MSN</span>
            <span>Fortune</span>
            <span>VentureBeat</span>
            <span>Time</span>
            <span>Business Insider</span>
            <span>Entertainment</span>
            <span>Technology</span>
            <span>Finance</span>
            <span>Lifestyle</span>
            <span>Healthcare</span>
        </div>
    </div>

    <!-- 3. ABOUT / STATS SECTION -->
    <section id="about">
        <div class="w">
            <h2 class="rv">A PR Partner Built for <i>Growth</i></h2>
            <p class="sub rv">We help growing brands secure the visibility they deserve through honest, transparent media placement across the US, UK, and Canada.</p>
            
            <div class="sts" style="grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));">
                <div class="st rv">
                    <strong><span data-to="950">0</span>+</strong>
                    <h3>Published Articles</h3>
                    <p>placed on publications across the UK, US, Canada & globally</p>
                </div>
                <div class="st rv">
                    <strong><span data-to="8">0</span>+</strong>
                    <h3>Industries</h3>
                    <p>served with tailored PR strategies for every sector</p>
                </div>
                <div class="st rv">
                    <strong><span data-to="1200">0</span>+</strong>
                    <h3>Media Partners</h3>
                    <p>across the press network we work with</p>
                </div>
                <div class="st rv">
                    <strong><span data-to="1500">0</span>+</strong>
                    <h3>Brands</h3>
                    <p>trust Veyora Media with their story</p>
                </div>
            </div>
        </div>
    </section>

    <!-- 4. MAGAZINE COVERS SECTION ("Where Your Brand Story Gets Noticed") -->
    <section id="featured" style="background: var(--cd); overflow: hidden;">
        <div class="w">
            <h2 class="rv">Where Your Brand Story Gets <i>Noticed</i></h2>
            <p class="sub rv">We place your story in front of readers who matter, with coverage that builds trust and keeps working long after it goes live.</p>
        </div>

        <div class="cw">
            <div class="tk" id="tk">
                <!-- 8 Real Covers extracted from Google Doc -->
                <figure class="cv">
                    <img src="{{ asset('images/covers/doc-cover-1.jpg') }}" alt="Veyora Media Magazine Feature Cover 1" loading="lazy" width="360" height="495">
                </figure>
                <figure class="cv">
                    <img src="{{ asset('images/covers/doc-cover-2.jpg') }}" alt="Veyora Media Magazine Feature Cover 2" loading="lazy" width="360" height="495">
                </figure>
                <figure class="cv">
                    <img src="{{ asset('images/covers/doc-cover-3.jpg') }}" alt="Veyora Media Magazine Feature Cover 3" loading="lazy" width="360" height="495">
                </figure>
                <figure class="cv">
                    <img src="{{ asset('images/covers/doc-cover-4.jpg') }}" alt="Veyora Media Magazine Feature Cover 4" loading="lazy" width="360" height="495">
                </figure>
                <figure class="cv">
                    <img src="{{ asset('images/covers/doc-cover-5.jpg') }}" alt="Veyora Media Magazine Feature Cover 5" loading="lazy" width="360" height="495">
                </figure>
                <figure class="cv">
                    <img src="{{ asset('images/covers/doc-cover-6.jpg') }}" alt="Veyora Media Magazine Feature Cover 6" loading="lazy" width="360" height="495">
                </figure>
                <figure class="cv">
                    <img src="{{ asset('images/covers/doc-cover-7.jpg') }}" alt="Veyora Media Magazine Feature Cover 7" loading="lazy" width="360" height="495">
                </figure>
                <figure class="cv">
                    <img src="{{ asset('images/covers/doc-cover-8.jpg') }}" alt="Veyora Media Magazine Feature Cover 8" loading="lazy" width="360" height="495">
                </figure>

                <!-- Clones for seamless infinite looping -->
                <figure class="cv" aria-hidden="true">
                    <img src="{{ asset('images/covers/doc-cover-1.jpg') }}" alt="" loading="lazy" width="360" height="495">
                </figure>
                <figure class="cv" aria-hidden="true">
                    <img src="{{ asset('images/covers/doc-cover-2.jpg') }}" alt="" loading="lazy" width="360" height="495">
                </figure>
                <figure class="cv" aria-hidden="true">
                    <img src="{{ asset('images/covers/doc-cover-3.jpg') }}" alt="" loading="lazy" width="360" height="495">
                </figure>
                <figure class="cv" aria-hidden="true">
                    <img src="{{ asset('images/covers/doc-cover-4.jpg') }}" alt="" loading="lazy" width="360" height="495">
                </figure>
                <figure class="cv" aria-hidden="true">
                    <img src="{{ asset('images/covers/doc-cover-5.jpg') }}" alt="" loading="lazy" width="360" height="495">
                </figure>
                <figure class="cv" aria-hidden="true">
                    <img src="{{ asset('images/covers/doc-cover-6.jpg') }}" alt="" loading="lazy" width="360" height="495">
                </figure>
                <figure class="cv" aria-hidden="true">
                    <img src="{{ asset('images/covers/doc-cover-7.jpg') }}" alt="" loading="lazy" width="360" height="495">
                </figure>
                <figure class="cv" aria-hidden="true">
                    <img src="{{ asset('images/covers/doc-cover-8.jpg') }}" alt="" loading="lazy" width="360" height="495">
                </figure>
            </div>
            <div class="ar">
                <button id="pv" aria-label="Previous magazine cover">←</button>
                <button id="nx" aria-label="Next magazine cover">→</button>
            </div>
            <div style="text-align: center; margin-top: 36px;">
                <a href="{{ route('case-studies') }}" class="btn wh" style="padding: 13px 32px; font-weight: 600; font-size: 15px;">See Our Features ↗</a>
            </div>
        </div>
    </section>

    <!-- 5. SERVICES SECTION -->
    <section id="services">
        <div class="w">
            <h2 class="rv">Services Built to Get You <i>Noticed</i></h2>
            <p class="sub rv">Everything your brand needs to earn attention, build trust, and stay visible.</p>

            <div class="sg">
                @php
                    $servicePhotos = [
                        asset('images/services/service-photo-1.jpg'),
                        asset('images/services/service-photo-2.jpg'),
                        asset('images/services/service-photo-3.jpg'),
                        asset('images/services/service-photo-4.jpg'),
                        asset('images/services/service-photo-5.jpg'),
                        asset('images/services/service-photo-6.jpg'),
                    ];
                @endphp
                @foreach($services as $index => $service)
                    @php
                        $photoUrl = $servicePhotos[$index % count($servicePhotos)];
                    @endphp
                    <a href="{{ route('services.detail', $service->slug) }}" class="sv rv" style="text-decoration: none;">
                        <div class="sv-media">
                            <img src="{{ $photoUrl }}" alt="{{ $service->title }}" loading="lazy">
                            <div class="sv-overlay"></div>
                        </div>
                        <div class="sv-content">
                            <b>{{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}</b>
                            <h3>{{ $service->title }}</h3>
                            <p>{{ $service->short_description }}</p>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </section>

    <!-- 6. WHY CHOOSE US SECTION -->
    <section id="why-us">
        <div class="w">
            <h2 class="rv">Why Ambitious Brands Choose <i>Veyora Media</i></h2>
            <p class="sub rv">A simple, transparent process built around your growth.</p>

            <div class="wg">
                <div class="wy rv">
                    <div class="ic">
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><path d="m10 15 5-3-5-3v6z"/></svg>
                    </div>
                    <h3>Placement Commitment</h3>
                    <p>We work toward your agreed publication goals from day one. You know where your story is headed, and we follow through until it goes live.</p>
                </div>
                <div class="wy rv">
                    <div class="ic">
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 20h9"/><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"/></svg>
                    </div>
                    <h3>Experienced Content Team</h3>
                    <p>Skilled writers, editors, and PR specialists work on every project. Each piece is shaped to match your industry, your audience, and your voice.</p>
                </div>
                <div class="wy rv">
                    <div class="ic">
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><line x1="2" y1="12" x2="22" y2="12"/><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"/></svg>
                    </div>
                    <h3>Trusted Publishing Network</h3>
                    <p>We work with a growing network of publishing partners across the US, UK, and Canada. Your story is matched with the platform where the right readers already are.</p>
                </div>
                <div class="wy rv">
                    <div class="ic">
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"/><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"/></svg>
                    </div>
                    <h3>Story-First Approach</h3>
                    <p>Strong stories get noticed. We write clear, engaging articles that build trust with readers and turn attention into real business interest.</p>
                </div>
                <div class="wy rv">
                    <div class="ic">
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="20" x2="18" y2="10"/><line x1="12" y1="20" x2="12" y2="4"/><line x1="6" y1="20" x2="6" y2="14"/></svg>
                    </div>
                    <h3>Transparent Reporting</h3>
                    <p>You see what your coverage delivers. We share live links, publication details, and visibility updates so you always know where you stand.</p>
                </div>
                <div class="wy rv">
                    <div class="ic">
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/><path d="m9 12 2 2 4-4"/></svg>
                    </div>
                    <h3>Your Approval, Always</h3>
                    <p>Nothing goes live without your review. You approve every draft first, so the final piece is accurate and true to your brand.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- 7. CTA BANNER SECTION (WITH TILTED 3-COVER FAN) -->
    <section>
        <div class="w">
            <div class="cta rv">
                <div>
                    <span class="bd" style="border-color: var(--bd); background: none;">Trusted by growing brands in the US, UK & Canada</span>
                    <h2 style="margin-top: 16px;">Ready to Put Your Brand in the <i>Spotlight?</i></h2>
                    <p>Share your goals with us, and we’ll create a PR and content plan built around your story, your industry, and your audience.</p>
                    <div class="bt">
                        <a class="btn bk" href="#contact">Get a Quote ↗</a>
                        <a class="btn bl" href="{{ route('about') }}">Our Story ↗</a>
                    </div>
                </div>
                <div class="fan" aria-hidden="true">
                    <img src="{{ asset('images/covers/doc-cover-2.jpg') }}" alt="Veyora Media feature cover 1">
                    <img src="{{ asset('images/covers/doc-cover-3.jpg') }}" alt="Veyora Media feature cover 2">
                    <img src="{{ asset('images/covers/doc-cover-5.jpg') }}" alt="Veyora Media feature cover 3">
                </div>
            </div>
        </div>
    </section>

    <!-- 8. REVIEWS / TESTIMONIALS SECTION -->
    <section id="reviews">
        <div class="w">
            <h2 class="rv">Hear It From Our <i>Partners</i></h2>
            <p class="sub rv">Real feedback from founders and executives who elevated their market credibility with Veyora Media.</p>

            <div class="sg" style="margin-bottom: 40px;">
                @foreach($testimonials as $testimonial)
                    <div class="wy rv" style="display: flex; flex-direction: column; justify-content: space-between;">
                        <div>
                            <div style="color: var(--ac); margin-bottom: 12px; font-size: 15px;">
                                @for($i = 0; $i < ($testimonial->rating ?? 5); $i++)
                                    ★
                                @endfor
                            </div>
                            <p style="font-size: 15px; color: #d8d8e6; margin-bottom: 20px; font-style: italic;">
                                "{{ $testimonial->quote }}"
                            </p>
                        </div>
                        <div style="border-top: 1px solid var(--bd); padding-top: 14px; margin-top: auto;">
                            <strong style="color: #fff; display: block; font-size: 15px;">{{ $testimonial->client_name }}</strong>
                            <small style="color: var(--mut); display: block;">{{ $testimonial->client_designation }} • {{ $testimonial->client_company }}</small>
                            @if($testimonial->publication_featured_in)
                                <small style="color: var(--pu); display: block; margin-top: 4px;">{{ $testimonial->publication_featured_in }}</small>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="rvw rv">
                <h3>Your Story Could Be Our Next Feature</h3>
                <p>We work with ambitious founders and growing brands across North America and Europe. Let’s talk about where your story belongs.</p>
                <a class="btn bk" href="#contact">Start a Conversation ↗</a>
            </div>
        </div>
    </section>

    <!-- 9. INDUSTRIES WE SERVE SECTION -->
    <section id="industries" style="background: var(--cd);">
        <div class="w">
            <h2 class="rv">Industries We <i>Serve</i></h2>
            <p class="sub rv">Tailored media strategy and editorial placement for leaders in every major sector.</p>

            <div class="wg" style="grid-template-columns: repeat(auto-fit, minmax(210px, 1fr));">
                <div class="wy rv" style="text-align: center;">
                    <div class="ic" style="margin: 0 auto 20px;"><i class="bi bi-film"></i></div>
                    <h3>Entertainment</h3>
                    <p>Film, music, digital media, creators, and entertainment executives.</p>
                </div>
                <div class="wy rv" style="text-align: center;">
                    <div class="ic" style="margin: 0 auto 20px;"><i class="bi bi-cpu"></i></div>
                    <h3>Technology</h3>
                    <p>AI innovators, B2B SaaS, cloud infrastructure, and deep tech startups.</p>
                </div>
                <div class="wy rv" style="text-align: center;">
                    <div class="ic" style="margin: 0 auto 20px;"><i class="bi bi-currency-dollar"></i></div>
                    <h3>Finance</h3>
                    <p>FinTech disruptors, venture capital, private equity, and wealth managers.</p>
                </div>
                <div class="wy rv" style="text-align: center;">
                    <div class="ic" style="margin: 0 auto 20px;"><i class="bi bi-bag"></i></div>
                    <h3>Lifestyle</h3>
                    <p>D2C consumer brands, luxury hospitality, fashion, and wellness pioneers.</p>
                </div>
                <div class="wy rv" style="text-align: center;">
                    <div class="ic" style="margin: 0 auto 20px;"><i class="bi bi-heart-pulse"></i></div>
                    <h3>Healthcare</h3>
                    <p>Digital health, biotech platforms, pharmaceuticals, and medical devices.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- 10. BLOGS / INSIGHTS SECTION -->
    <section id="blogs">
        <div class="w">
            <h2 class="rv">PR Insights & <i>Case Studies</i></h2>
            <p class="sub rv">Actionable strategies and campaign breakdowns from our editorial newsroom.</p>

            <div class="pg">
                @foreach($caseStudies as $study)
                    <a href="{{ route('case-studies.detail', $study->slug) }}" class="po rv">
                        <small>{{ $study->industry }}</small>
                        <h3>{{ $study->title }}</h3>
                        <span>Read Case Breakdown →</span>
                    </a>
                @endforeach
            </div>
        </div>
    </section>

    <!-- 11. FAQ SECTION -->
    <section id="faq" style="background: var(--cd);">
        <div class="w">
            <h2 class="rv">Frequently Asked <i>Questions</i></h2>
            <p class="sub rv">Everything you need to know about our media placement process and deliverables.</p>

            <div class="fq">
                @foreach($faqs as $index => $faq)
                    <details class="rv" {{ $index === 0 ? 'open' : '' }}>
                        <summary>{{ $faq->question }}</summary>
                        <p>{{ $faq->answer }}</p>
                    </details>
                @endforeach
            </div>
        </div>
    </section>

    <!-- 12. CONTACT / QUOTE FORM SECTION -->
    <section id="contact">
        <div class="w">
            <h2 class="rv">Tell Us About Your <i>Goals</i></h2>
            <p class="sub rv">Share your goals with us, and our team will get back to you with a tailored media plan and pricing within 24 hours.</p>

            <form class="cf rv" id="qf" action="{{ route('contact.submit') }}" method="POST">
                @csrf
                <div class="r2">
                    <div>
                        <input type="text" name="name" placeholder="Your Name" value="{{ old('name') }}" required>
                        @error('name') <small style="color: #ff7a59; display:block; margin-top:4px;">{{ $message }}</small> @enderror
                    </div>
                    <div>
                        <input type="email" name="email" placeholder="Your Email" value="{{ old('email') }}" required>
                        @error('email') <small style="color: #ff7a59; display:block; margin-top:4px;">{{ $message }}</small> @enderror
                    </div>
                </div>

                <div class="r2">
                    <div>
                        <input type="text" name="company" placeholder="Company / Brand Name" value="{{ old('company') }}">
                    </div>
                    <div>
                        <select name="service_name" required>
                            <option value="" disabled {{ old('service_name') ? '' : 'selected' }}>Select Your Industry</option>
                            <option value="Technology & AI" {{ old('service_name') == 'Technology & AI' ? 'selected' : '' }}>Technology & AI</option>
                            <option value="Finance & FinTech" {{ old('service_name') == 'Finance & FinTech' ? 'selected' : '' }}>Finance & FinTech</option>
                            <option value="Healthcare & BioTech" {{ old('service_name') == 'Healthcare & BioTech' ? 'selected' : '' }}>Healthcare & BioTech</option>
                            <option value="Lifestyle & D2C" {{ old('service_name') == 'Lifestyle & D2C' ? 'selected' : '' }}>Lifestyle & D2C</option>
                            <option value="Entertainment & Media" {{ old('service_name') == 'Entertainment & Media' ? 'selected' : '' }}>Entertainment & Media</option>
                            <option value="Other Industry" {{ old('service_name') == 'Other Industry' ? 'selected' : '' }}>Other Industry</option>
                        </select>
                    </div>
                </div>

                <div>
                    <textarea name="message" rows="4" placeholder="Tell us about your brand, current milestones, and media goals..." required>{{ old('message') }}</textarea>
                    @error('message') <small style="color: #ff7a59; display:block; margin-top:4px;">{{ $message }}</small> @enderror
                </div>

                <button class="btn bw" type="submit" style="justify-content: center; width: 100%; padding: 16px;">
                    Get a Quote ↗
                </button>
            </form>
        </div>
    </section>

@endsection

@push('scripts')
<script>
    // Magazine Cover Infinite Carousel with Auto-Play & Drag Navigation
    (function() {
        const tk = document.getElementById('tk');
        if (!tk) return;

        const nextBtn = document.getElementById('nx');
        const prevBtn = document.getElementById('pv');

        let isPaused = false;
        let isDragging = false;
        let startX = 0;
        let scrollStart = 0;

        const getStep = () => {
            const firstCard = tk.querySelector('.cv');
            return firstCard ? firstCard.offsetWidth + 20 : 280;
        };

        const moveNext = () => {
            const step = getStep();
            const half = tk.scrollWidth / 2;
            if (tk.scrollLeft >= half - 10) {
                tk.scrollLeft = tk.scrollLeft - half;
            }
            tk.scrollBy({ left: step, behavior: 'smooth' });
        };

        const movePrev = () => {
            const step = getStep();
            const half = tk.scrollWidth / 2;
            if (tk.scrollLeft <= 10) {
                tk.scrollLeft = tk.scrollLeft + half;
            }
            tk.scrollBy({ left: -step, behavior: 'smooth' });
        };

        if (nextBtn) {
            nextBtn.onclick = (e) => {
                e.preventDefault();
                moveNext();
            };
        }

        if (prevBtn) {
            prevBtn.onclick = (e) => {
                e.preventDefault();
                movePrev();
            };
        }

        // Auto-play carousel every 3.5 seconds
        setInterval(() => {
            if (!isPaused && !isDragging) {
                moveNext();
            }
        }, 3500);

        // Pause on hover
        tk.addEventListener('mouseenter', () => { isPaused = true; });
        tk.addEventListener('mouseleave', () => { isPaused = false; isDragging = false; });

        // Touch handling
        tk.addEventListener('touchstart', () => { isPaused = true; }, { passive: true });
        tk.addEventListener('touchend', () => { isPaused = false; }, { passive: true });

        // Mouse drag-to-scroll support
        tk.addEventListener('mousedown', (e) => {
            isDragging = true;
            isPaused = true;
            startX = e.pageX - tk.offsetLeft;
            scrollStart = tk.scrollLeft;
        });

        window.addEventListener('mouseup', () => {
            if (isDragging) {
                isDragging = false;
                isPaused = false;
            }
        });

        tk.addEventListener('mousemove', (e) => {
            if (!isDragging) return;
            e.preventDefault();
            const x = e.pageX - tk.offsetLeft;
            const walk = (x - startX) * 1.5;
            tk.scrollLeft = scrollStart - walk;
        });
    })();
</script>
@endpush
