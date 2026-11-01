<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', \App\Models\SiteSetting::get('default_seo_title', 'Byline Bridge | International PR, Media Placement & Publishing Agency'))</title>
    <meta name="description" content="@yield('meta_description', \App\Models\SiteSetting::get('default_seo_description', 'Your name in the byline. Your story where buyers read. International PR agency specializing in executive profiles, bylines, and media placement.'))">
    <meta name="robots" content="index, follow">
    <link rel="canonical" href="{{ url()->current() }}">
    
    <!-- Open Graph -->
    <meta property="og:title" content="@yield('title', 'Byline Bridge | International PR Agency')">
    <meta property="og:description" content="@yield('meta_description', 'Your name in the byline. Your story where buyers read.')">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:type" content="website">

    <!-- Bootstrap 5.3 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    
    <!-- Bespoke Editorial Luxury CSS -->
    <link rel="stylesheet" href="{{ asset('css/editorial.css') }}">
    @stack('styles')
</head>
<body class="d-flex flex-column min-vh-100">

    <!-- Top Announcement Bar (Deep Ink & Refined Accent) -->
    <aside class="py-2 text-white small" style="background-color: var(--bb-ink); border-bottom: 1px solid rgba(255, 255, 255, 0.12); font-size: 0.8rem; font-weight: 600; letter-spacing: 0.02em;">
        <div class="container d-flex justify-content-between align-items-center">
            <span><i class="bi bi-patch-check-fill text-orange me-1"></i> Editorial Placement Standards • 100% Client Pre-Approved Copy</span>
            <div class="d-none d-md-flex gap-3">
                <a href="mailto:{{ \App\Models\SiteSetting::get('contact_email', 'inquiries@bylinebridge.com') }}" class="text-white-50 text-decoration-none hover-white">
                    <i class="bi bi-envelope me-1 text-orange"></i> {{ \App\Models\SiteSetting::get('contact_email', 'inquiries@bylinebridge.com') }}
                </a>
                <span class="opacity-30">•</span>
                <a href="tel:{{ \App\Models\SiteSetting::get('contact_phone', '+1 (212) 895-4300') }}" class="text-white-50 text-decoration-none hover-white">
                    <i class="bi bi-telephone me-1 text-cobalt"></i> {{ \App\Models\SiteSetting::get('contact_phone', '+1 (212) 895-4300') }}
                </a>
            </div>
        </div>
    </aside>

    <!-- Editorial Header Navigation -->
    <header class="sticky-top">
        <nav class="navbar navbar-expand-lg editorial-navbar" aria-label="Main Navigation">
            <div class="container">
                <a class="editorial-brand" href="{{ route('home') }}">
                    <span class="editorial-brand-mark">B</span>
                    <span>{{ \App\Models\SiteSetting::get('site_name', 'Byline Bridge') }}</span>
                </a>

                <button class="navbar-toggler border-0 shadow-none px-0" type="button" data-bs-toggle="offcanvas" data-bs-target="#editorialOffcanvas" aria-controls="editorialOffcanvas" aria-label="Toggle navigation">
                    <i class="bi bi-list fs-2 text-dark"></i>
                </button>

                <div class="collapse navbar-collapse justify-content-end d-none d-lg-flex" id="navbarNav">
                    <ul class="navbar-nav align-items-center me-3">
                        <li class="nav-item">
                            <a class="nav-link editorial-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link editorial-link {{ request()->routeIs('about') ? 'active' : '' }}" href="{{ route('about') }}">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link editorial-link {{ request()->routeIs('services*') ? 'active' : '' }}" href="{{ route('services') }}">Services</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link editorial-link {{ request()->routeIs('case-studies*') ? 'active' : '' }}" href="{{ route('case-studies') }}">Case Studies</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link editorial-link {{ request()->routeIs('testimonials') ? 'active' : '' }}" href="{{ route('testimonials') }}">Testimonials</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link editorial-link {{ request()->routeIs('faq') ? 'active' : '' }}" href="{{ route('faq') }}">FAQ</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link editorial-link {{ request()->routeIs('contact') ? 'active' : '' }}" href="{{ route('contact') }}">Contact</a>
                        </li>
                    </ul>

                    <div class="d-flex align-items-center gap-2">
                        <a href="{{ route('contact') }}" class="btn btn-hero-primary py-2 px-4" style="font-size: 0.88rem;">
                            <span>Get Featured</span>
                            <i class="bi bi-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>
        </nav>
    </header>

    <!-- Mobile Offcanvas Navigation -->
    <div class="offcanvas offcanvas-end" tabindex="-1" id="editorialOffcanvas" aria-labelledby="editorialOffcanvasLabel">
        <div class="offcanvas-header border-bottom py-3">
            <h5 class="offcanvas-title editorial-brand mb-0" id="editorialOffcanvasLabel">
                <span class="editorial-brand-mark">B</span>
                <span>Byline Bridge</span>
            </h5>
            <button type="button" class="btn-close shadow-none" data-bs-toggle="offcanvas" data-bs-target="#editorialOffcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body d-flex flex-column justify-content-between">
            <ul class="navbar-nav gap-2">
                <li class="nav-item">
                    <a class="nav-link fs-5 py-2 {{ request()->routeIs('home') ? 'fw-bold text-dark' : 'text-muted' }}" href="{{ route('home') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fs-5 py-2 {{ request()->routeIs('about') ? 'fw-bold text-dark' : 'text-muted' }}" href="{{ route('about') }}">About Agency</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fs-5 py-2 {{ request()->routeIs('services*') ? 'fw-bold text-dark' : 'text-muted' }}" href="{{ route('services') }}">Services & Offerings</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fs-5 py-2 {{ request()->routeIs('case-studies*') ? 'fw-bold text-dark' : 'text-muted' }}" href="{{ route('case-studies') }}">Case Studies</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fs-5 py-2 {{ request()->routeIs('testimonials') ? 'fw-bold text-dark' : 'text-muted' }}" href="{{ route('testimonials') }}">Client Results</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fs-5 py-2 {{ request()->routeIs('faq') ? 'fw-bold text-dark' : 'text-muted' }}" href="{{ route('faq') }}">FAQ</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fs-5 py-2 {{ request()->routeIs('contact') ? 'fw-bold text-dark' : 'text-muted' }}" href="{{ route('contact') }}">Contact Us</a>
                </li>
            </ul>

            <div class="pt-4 border-top">
                <a href="{{ route('contact') }}" class="btn btn-editorial-coral w-100 justify-content-center py-3 mb-3">
                    <span>Request Placement Quote</span>
                    <i class="bi bi-arrow-right"></i>
                </a>
                <div class="small text-muted text-center">
                    {{ \App\Models\SiteSetting::get('contact_phone', '+1 (212) 895-4300') }}<br>
                    {{ \App\Models\SiteSetting::get('contact_email', 'inquiries@bylinebridge.com') }}
                </div>
            </div>
        </div>
    </div>

    <!-- Flash Alert Notifications -->
    @if(session('success'))
        <div class="container mt-3">
            <div class="alert alert-success alert-dismissible fade show shadow-sm border-0 alert-auto-dismiss d-flex align-items-center" role="alert">
                <i class="bi bi-check-circle-fill me-2 fs-5"></i>
                <div>{{ session('success') }}</div>
                <button type="button" class="btn-close shadow-none" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    @endif

    @if(session('error'))
        <div class="container mt-3">
            <div class="alert alert-danger alert-dismissible fade show shadow-sm border-0 alert-auto-dismiss d-flex align-items-center" role="alert">
                <i class="bi bi-exclamation-triangle-fill me-2 fs-5"></i>
                <div>{{ session('error') }}</div>
                <button type="button" class="btn-close shadow-none" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    @endif

    <!-- Main Page Content -->
    <main class="flex-grow-1">
        @yield('content')
    </main>

    <!-- Editorial Footer -->
    <footer class="editorial-footer">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-4 col-md-6">
                    <a class="editorial-brand mb-3 text-white d-inline-flex" href="{{ route('home') }}">
                        <span class="editorial-brand-mark">B</span>
                        <span>{{ \App\Models\SiteSetting::get('site_name', 'Byline Bridge') }}</span>
                    </a>
                    <p class="text-white-50 mb-4 pe-lg-4">
                        {{ \App\Models\SiteSetting::get('footer_description', 'Byline Bridge is a premier international PR and media publishing agency helping founders, CEOs, and industry leaders secure authoritative online coverage without the opacity of traditional retainers.') }}
                    </p>
                    <div class="d-flex gap-3">
                        @if($linkedin = \App\Models\SiteSetting::get('linkedin_url'))
                            <a href="{{ $linkedin }}" target="_blank" rel="noopener noreferrer" class="btn btn-sm btn-outline-secondary text-white rounded-circle d-flex align-items-center justify-content-center" style="width: 36px; height: 36px;" aria-label="LinkedIn">
                                <i class="bi bi-linkedin"></i>
                            </a>
                        @endif
                        @if($twitter = \App\Models\SiteSetting::get('twitter_url'))
                            <a href="{{ $twitter }}" target="_blank" rel="noopener noreferrer" class="btn btn-sm btn-outline-secondary text-white rounded-circle d-flex align-items-center justify-content-center" style="width: 36px; height: 36px;" aria-label="Twitter">
                                <i class="bi bi-twitter-x"></i>
                            </a>
                        @endif
                        <a href="mailto:{{ \App\Models\SiteSetting::get('contact_email', 'inquiries@bylinebridge.com') }}" class="btn btn-sm btn-outline-secondary text-white rounded-circle d-flex align-items-center justify-content-center" style="width: 36px; height: 36px;" aria-label="Email">
                            <i class="bi bi-envelope"></i>
                        </a>
                    </div>
                </div>

                <div class="col-lg-2 col-md-6 col-6">
                    <h5>Agency</h5>
                    <ul class="list-unstyled">
                        <li><a class="editorial-footer-link" href="{{ route('about') }}">About Us</a></li>
                        <li><a class="editorial-footer-link" href="{{ route('services') }}">Services</a></li>
                        <li><a class="editorial-footer-link" href="{{ route('case-studies') }}">Case Studies</a></li>
                        <li><a class="editorial-footer-link" href="{{ route('testimonials') }}">Client Results</a></li>
                        <li><a class="editorial-footer-link" href="{{ route('faq') }}">FAQ</a></li>
                        <li><a class="editorial-footer-link" href="{{ route('contact') }}">Contact & Quote</a></li>
                    </ul>
                </div>

                <div class="col-lg-3 col-md-6 col-6">
                    <h5>Core Offerings</h5>
                    <ul class="list-unstyled">
                        <li><a class="editorial-footer-link" href="{{ route('services.detail', 'featured-profiles') }}">Featured Profiles</a></li>
                        <li><a class="editorial-footer-link" href="{{ route('services.detail', 'top-10-lists') }}">Top-10 List Features</a></li>
                        <li><a class="editorial-footer-link" href="{{ route('services.detail', 'byline-articles') }}">Byline Articles</a></li>
                        <li><a class="editorial-footer-link" href="{{ route('services.detail', 'content-writing-publishing') }}">Content Publishing</a></li>
                        <li><a class="editorial-footer-link" href="{{ route('contact') }}">Executive Advisory</a></li>
                    </ul>
                </div>

                <div class="col-lg-3 col-md-6">
                    <h5>Headquarters</h5>
                    <p class="text-white-50 small mb-2">
                        <i class="bi bi-geo-alt text-coral me-2"></i>
                        {{ \App\Models\SiteSetting::get('contact_address', '450 Lexington Avenue, Suite 2800, New York, NY 10017') }}
                    </p>
                    <p class="text-white-50 small mb-2">
                        <i class="bi bi-telephone text-coral me-2"></i>
                        {{ \App\Models\SiteSetting::get('contact_phone', '+1 (212) 895-4300') }}
                    </p>
                    <p class="text-white-50 small mb-4">
                        <i class="bi bi-envelope text-coral me-2"></i>
                        {{ \App\Models\SiteSetting::get('contact_email', 'inquiries@bylinebridge.com') }}
                    </p>
                    <div class="p-3 rounded bg-dark border border-secondary border-opacity-25">
                        <div class="text-white-50 small mb-1">Administrative Access:</div>
                        <a href="{{ route('admin.login') }}" class="text-coral small text-decoration-none fw-semibold">
                            <i class="bi bi-lock me-1"></i> Agency CMS Portal
                        </a>
                    </div>
                </div>
            </div>

            <div class="editorial-footer-bottom d-flex flex-column flex-md-row justify-content-between align-items-center gap-3">
                <div class="text-white-50">
                    {{ \App\Models\SiteSetting::get('copyright_text', '© ' . date('Y') . ' Byline Bridge Agency. All editorial rights reserved.') }}
                </div>
                <div class="d-flex gap-4">
                    <a href="{{ route('privacy') }}" class="text-white-50 text-decoration-none hover-white small">Privacy Policy</a>
                    <a href="{{ route('terms') }}" class="text-white-50 text-decoration-none hover-white small">Terms & Conditions</a>
                    <a href="{{ route('faq') }}" class="text-white-50 text-decoration-none hover-white small">Editorial Standards</a>
                </div>
            </div>
        </div>
    </footer>

    <!-- Bootstrap 5.3 JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    
    <!-- GSAP & ScrollTrigger for Premium Motion System -->
    <script src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/gsap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/ScrollTrigger.min.js"></script>
    
    <!-- Bespoke Editorial Luxury Interactions & Motion Script -->
    <script src="{{ asset('js/editorial.js') }}"></script>
    @stack('scripts')
</body>
</html>
