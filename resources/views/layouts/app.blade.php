<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', \App\Models\SiteSetting::get('default_seo_title', 'Veyora Media | We Turn Your Story Into Lasting Visibility'))</title>
    <meta name="description" content="@yield('meta_description', \App\Models\SiteSetting::get('default_seo_description', 'PR & content for growing brands in the US, UK & Canada. We write, pitch, and publish your story on trusted media platforms.'))">
    <meta name="robots" content="index, follow">
    <link rel="canonical" href="{{ url()->current() }}">
    
    <!-- Open Graph -->
    <meta property="og:title" content="@yield('title', 'Veyora Media | Turn Your Story Into Lasting Visibility')">
    <meta property="og:description" content="@yield('meta_description', 'PR & content for growing brands in the US, UK & Canada.')">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:type" content="website">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Playfair+Display:ital,wght@0,400;0,600;0,700;1,400;1,600;1,700&display=swap" rel="stylesheet">
    
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    
    <!-- Veyora Media Editorial CSS -->
    <link rel="stylesheet" href="{{ asset('css/editorial.css') }}">
    @stack('styles')
</head>
<body id="top">

    <!-- Header / Sticky Navigation -->
    <header id="hd">
        <div class="w nv">
            <a class="lg" href="{{ route('home') }}" aria-label="Veyora Media home">
                <svg viewBox="0 0 64 64" aria-hidden="true">
                    <defs>
                        <linearGradient id="vg1" x1="0" y1="0" x2="0" y2="1">
                            <stop offset="0" stop-color="#a78bfa"/>
                            <stop offset="1" stop-color="#ff7a59"/>
                        </linearGradient>
                    </defs>
                    <path d="M11 14 L30 54 L43 28" fill="none" stroke="url(#vg1)" stroke-width="11" stroke-linecap="round" stroke-linejoin="round"/>
                    <circle cx="50" cy="13" r="12" fill="none" stroke="#ff7a59" stroke-opacity=".35" stroke-width="1.5"/>
                    <circle cx="50" cy="13" r="6.5" fill="#ff7a59"/>
                </svg>
                <span><b>Veyora</b><small>MEDIA</small></span>
            </a>

            <nav aria-label="Primary navigation">
                <ul id="mn">
                    <li><a href="{{ route('about') }}" class="{{ request()->routeIs('about') ? 'active' : '' }}">About Us</a></li>
                    <li><a href="{{ route('services') }}" class="{{ request()->routeIs('services*') ? 'active' : '' }}">Services</a></li>
                    <li><a href="{{ route('home') }}#industries">Industries</a></li>
                    <li><a href="{{ route('home') }}#featured">Featured On</a></li>
                    <li><a href="{{ route('testimonials') }}" class="{{ request()->routeIs('testimonials') ? 'active' : '' }}">Client Reviews</a></li>
                    <li><a href="{{ route('case-studies') }}" class="{{ request()->routeIs('case-studies*') ? 'active' : '' }}">Blogs</a></li>
                    <li><a href="{{ route('contact') }}" class="{{ request()->routeIs('contact') ? 'active' : '' }}">Contact Us</a></li>
                </ul>
            </nav>

            <a class="btn bw" href="{{ route('contact') }}">Get a Quote ↗</a>
            <button class="mb" id="mt" aria-label="Toggle navigation menu">☰</button>
        </div>
    </header>

    <!-- Global Notification Alerts -->
    @if(session('success'))
        <div style="position: fixed; top: 88px; right: 24px; z-index: 9999; max-width: 420px;">
            <div style="background: #17143a; border: 1px solid var(--ac); border-radius: 16px; padding: 18px 24px; color: #fff; box-shadow: 0 14px 40px rgba(0,0,0,0.6); display: flex; align-items: center; gap: 12px;">
                <span style="color: var(--ac); font-size: 22px;">✓</span>
                <div>
                    <strong style="display: block; font-size: 14px; margin-bottom: 2px;">Success</strong>
                    <span style="font-size: 13.5px; color: #d8d8d8;">{{ session('success') }}</span>
                </div>
            </div>
        </div>
    @endif

    @if(session('error'))
        <div style="position: fixed; top: 88px; right: 24px; z-index: 9999; max-width: 420px;">
            <div style="background: #17143a; border: 1px solid #ff4d4f; border-radius: 16px; padding: 18px 24px; color: #fff; box-shadow: 0 14px 40px rgba(0,0,0,0.6); display: flex; align-items: center; gap: 12px;">
                <span style="color: #ff4d4f; font-size: 22px;">✕</span>
                <div>
                    <strong style="display: block; font-size: 14px; margin-bottom: 2px;">Error</strong>
                    <span style="font-size: 13.5px; color: #d8d8d8;">{{ session('error') }}</span>
                </div>
            </div>
        </div>
    @endif

    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer>
        <div class="w">
            <div class="fg">
                <!-- Column 1: Brand & Contact -->
                <div>
                    <a class="lg" href="#top" aria-label="Veyora Media">
                        <svg viewBox="0 0 64 64" aria-hidden="true">
                            <defs>
                                <linearGradient id="vg2" x1="0" y1="0" x2="0" y2="1">
                                    <stop offset="0" stop-color="#a78bfa"/>
                                    <stop offset="1" stop-color="#ff7a59"/>
                                </linearGradient>
                            </defs>
                            <path d="M11 14 L30 54 L43 28" fill="none" stroke="url(#vg2)" stroke-width="11" stroke-linecap="round" stroke-linejoin="round"/>
                            <circle cx="50" cy="13" r="12" fill="none" stroke="#ff7a59" stroke-opacity=".35" stroke-width="1.5"/>
                            <circle cx="50" cy="13" r="6.5" fill="#ff7a59"/>
                        </svg>
                        <span><b>Veyora</b><small>MEDIA</small></span>
                    </a>
                    <p style="margin-top:16px; max-width: 320px;">
                        {{ \App\Models\SiteSetting::get('footer_description', 'Veyora Media is an international PR and content agency that turns press features into authority, inbound leads, and business growth that scales over time.') }}
                    </p>
                    <p style="margin-top: 10px; font-weight: 500;">
                        Email: <a href="mailto:{{ \App\Models\SiteSetting::get('contact_email', 'hey@veyoramedia.com') }}" style="color: var(--ac);">{{ \App\Models\SiteSetting::get('contact_email', 'hey@veyoramedia.com') }}</a>
                    </p>
                    <div class="so">
                        @if($linkedin = \App\Models\SiteSetting::get('linkedin_url', 'https://linkedin.com/company/veyora-media'))
                            <a href="{{ $linkedin }}" target="_blank" rel="noopener noreferrer" aria-label="LinkedIn"><i class="bi bi-linkedin"></i></a>
                        @endif
                        @if($twitter = \App\Models\SiteSetting::get('twitter_url', 'https://twitter.com/VeyoraMedia'))
                            <a href="{{ $twitter }}" target="_blank" rel="noopener noreferrer" aria-label="Twitter"><i class="bi bi-twitter-x"></i></a>
                        @endif
                        @if($instagram = \App\Models\SiteSetting::get('instagram_url', 'https://instagram.com/veyoramedia'))
                            <a href="{{ $instagram }}" target="_blank" rel="noopener noreferrer" aria-label="Instagram"><i class="bi bi-instagram"></i></a>
                        @endif
                        @if($facebook = \App\Models\SiteSetting::get('facebook_url', 'https://facebook.com/veyoramedia'))
                            <a href="{{ $facebook }}" target="_blank" rel="noopener noreferrer" aria-label="Facebook"><i class="bi bi-facebook"></i></a>
                        @endif
                    </div>
                </div>

                <!-- Column 2: Helpful Links -->
                <div>
                    <h4>Helpful Links</h4>
                    <ul>
                        <li><a href="{{ route('about') }}">About Us</a></li>
                        <li><a href="{{ route('services') }}">Services</a></li>
                        <li><a href="{{ route('case-studies') }}">Blogs & Insights</a></li>
                        <li><a href="{{ route('testimonials') }}">Client Reviews</a></li>
                        <li><a href="{{ route('faq') }}">FAQ</a></li>
                        <li><a href="{{ route('contact') }}">Contact Us</a></li>
                    </ul>
                </div>

                <!-- Column 3: Industries -->
                <div>
                    <h4>Industries</h4>
                    <ul>
                        <li><a href="{{ route('home') }}#industries">Entertainment</a></li>
                        <li><a href="{{ route('home') }}#industries">Technology</a></li>
                        <li><a href="{{ route('home') }}#industries">Finance & FinTech</a></li>
                        <li><a href="{{ route('home') }}#industries">Lifestyle & Consumer</a></li>
                        <li><a href="{{ route('home') }}#industries">Healthcare & BioTech</a></li>
                    </ul>
                </div>

                <!-- Column 4: Locations -->
                <div>
                    <h4>Locations</h4>
                    <ul>
                        <li>Austin</li>
                        <li>Chicago</li>
                        <li>Dallas</li>
                        <li>Houston</li>
                        <li>Los Angeles</li>
                    </ul>
                </div>

                <!-- Column 5: Featured On -->
                <div>
                    <h4>Featured On</h4>
                    <ul>
                        <li>Forbes</li>
                        <li>USA Today</li>
                        <li>Yahoo Finance</li>
                        <li>MSN News</li>
                        <li>Business Insider</li>
                    </ul>
                </div>
            </div>

            <!-- Offices Row -->
            <div class="of">
                <div>
                    <h5>USA Office</h5>
                    <p>Austin, TX • United States</p>
                </div>
                <div>
                    <h5>Canada Office</h5>
                    <p>Calgary, AB • Canada</p>
                </div>
                <div>
                    <h5>London, UK</h5>
                    <p>London • United Kingdom</p>
                </div>
                <div style="margin-left: auto;">
                    <h5>Agency Portal</h5>
                    <p><a href="{{ route('admin.login') }}" style="color: var(--pu); font-weight: 500;">CMS Login ↗</a></p>
                </div>
            </div>

            <!-- Bottom Copyright -->
            <div class="bb">
                <div>
                    {{ \App\Models\SiteSetting::get('copyright_text', '© 2026 Veyora Media. All rights reserved.') }}
                </div>
                <div>
                    <a href="{{ route('privacy') }}">Privacy Policy</a>
                    <a href="{{ route('terms') }}">Terms of Service</a>
                    <a href="{{ route('faq') }}">Editorial Standards</a>
                </div>
            </div>
        </div>
    </footer>

    <!-- Core Interactions Script -->
    <script>
        const $ = s => document.querySelector(s);
        const hd = $('#hd'), mn = $('#mn'), mt = $('#mt');

        // Sticky header transition on scroll
        if (hd) {
            window.addEventListener('scroll', () => hd.classList.toggle('sc', window.scrollY > 40), { passive: true });
        }

        // Mobile menu toggle
        if (mt && mn) {
            mt.onclick = (e) => {
                e.stopPropagation();
                mn.classList.toggle('op');
            };
            document.addEventListener('click', (e) => {
                if (!mn.contains(e.target) && !mt.contains(e.target)) {
                    mn.classList.remove('op');
                }
            });
        }

        // IntersectionObserver for reveal (.rv) and counter animations ([data-to])
        const io = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('in');
                    io.unobserve(entry.target);
                    entry.target.querySelectorAll('[data-to]').forEach(counter => {
                        const target = +counter.dataset.to;
                        let val = 0;
                        const step = Math.max(1, Math.ceil(target / 40));
                        const timer = setInterval(() => {
                            val += step;
                            if (val >= target) {
                                val = target;
                                clearInterval(timer);
                            }
                            counter.textContent = val;
                        }, 30);
                    });
                }
            });
        }, { threshold: 0.15 });

        document.querySelectorAll('.rv').forEach(el => io.observe(el));
    </script>
    @stack('scripts')
</body>
</html>
