<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Portal') | Byline Bridge CMS</title>
    
    <!-- Bootstrap 5.3 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- Admin CSS -->
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    @stack('styles')
</head>
<body class="admin-body">

    <div class="admin-wrapper">
        <!-- Sidebar Navigation -->
        <aside class="admin-sidebar" id="adminSidebar">
            <a href="{{ route('admin.dashboard') }}" class="admin-sidebar-brand">
                <span class="admin-brand-icon">B</span>
                <div>
                    <div class="fw-bold fs-6 text-white leading-none">Byline Bridge</div>
                    <div class="text-muted small" style="font-size: 0.72rem;">Agency CMS Portal</div>
                </div>
            </a>

            <div class="admin-sidebar-menu">
                <div class="admin-menu-header">Main Overview</div>
                <a href="{{ route('admin.dashboard') }}" class="admin-nav-item {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                    <i class="bi bi-grid-1x2"></i>
                    <span>Dashboard</span>
                </a>

                <div class="admin-menu-header">Media & Client Management</div>
                <a href="{{ route('admin.enquiries.index') }}" class="admin-nav-item {{ request()->routeIs('admin.enquiries*') ? 'active' : '' }}">
                    <i class="bi bi-inbox"></i>
                    <span>Inquiries</span>
                    @php $newCount = \App\Models\Enquiry::where('status', 'new')->count(); @endphp
                    @if($newCount > 0)
                        <span class="badge bg-warning text-dark ms-auto" style="font-size: 0.7rem;">{{ $newCount }}</span>
                    @endif
                </a>
                <a href="{{ route('admin.services.index') }}" class="admin-nav-item {{ request()->routeIs('admin.services*') ? 'active' : '' }}">
                    <i class="bi bi-briefcase"></i>
                    <span>Services</span>
                </a>
                <a href="{{ route('admin.case-studies.index') }}" class="admin-nav-item {{ request()->routeIs('admin.case-studies*') ? 'active' : '' }}">
                    <i class="bi bi-journal-text"></i>
                    <span>Case Studies</span>
                </a>
                <a href="{{ route('admin.testimonials.index') }}" class="admin-nav-item {{ request()->routeIs('admin.testimonials*') ? 'active' : '' }}">
                    <i class="bi bi-star"></i>
                    <span>Testimonials</span>
                </a>

                <div class="admin-menu-header">Content & Settings</div>
                <a href="{{ route('admin.faqs.index') }}" class="admin-nav-item {{ request()->routeIs('admin.faqs*') ? 'active' : '' }}">
                    <i class="bi bi-question-circle"></i>
                    <span>FAQ Management</span>
                </a>
                <a href="{{ route('admin.content.index') }}" class="admin-nav-item {{ request()->routeIs('admin.content*') ? 'active' : '' }}">
                    <i class="bi bi-layout-text-window"></i>
                    <span>Page Content</span>
                </a>
                <a href="{{ route('admin.settings.index') }}" class="admin-nav-item {{ request()->routeIs('admin.settings*') ? 'active' : '' }}">
                    <i class="bi bi-gear"></i>
                    <span>Website Settings</span>
                </a>

                <div class="admin-menu-header">External</div>
                <a href="{{ route('home') }}" target="_blank" class="admin-nav-item">
                    <i class="bi bi-box-arrow-up-right"></i>
                    <span>View Public Website</span>
                </a>
            </div>

            <!-- Bottom User Profile in Sidebar -->
            <div class="p-3 border-top border-secondary border-opacity-25 mt-auto">
                <div class="d-flex align-items-center justify-content-between">
                    <div class="d-flex align-items-center gap-2 overflow-hidden">
                        <div class="rounded-circle bg-dark border border-secondary text-warning d-flex align-items-center justify-content-center fw-bold" style="width: 34px; height: 34px; font-size: 0.8rem;">
                            {{ substr(Auth::user()->name ?? 'A', 0, 1) }}
                        </div>
                        <div class="overflow-hidden">
                            <div class="text-white small fw-bold text-truncate">{{ Auth::user()->name ?? 'Admin' }}</div>
                            <div class="text-muted" style="font-size: 0.7rem;">Administrator</div>
                        </div>
                    </div>
                    <form action="{{ route('admin.logout') }}" method="POST" class="m-0">
                        @csrf
                        <button type="submit" class="btn btn-sm btn-outline-secondary text-white border-0 p-1" title="Log Out">
                            <i class="bi bi-box-arrow-right fs-6"></i>
                        </button>
                    </form>
                </div>
            </div>
        </aside>

        <!-- Main Workspace -->
        <div class="admin-content">
            <!-- Topbar -->
            <header class="admin-topbar">
                <div class="d-flex align-items-center gap-3">
                    <button class="btn btn-sm btn-outline-secondary d-lg-none" id="sidebarToggle" type="button">
                        <i class="bi bi-list fs-5"></i>
                    </button>
                    <h4 class="fs-6 fw-bold mb-0 text-dark">@yield('page_title', 'Agency Dashboard')</h4>
                </div>

                <div class="d-flex align-items-center gap-3">
                    <a href="{{ route('home') }}" target="_blank" class="btn btn-sm btn-outline-dark d-none d-sm-inline-flex align-items-center gap-1">
                        <i class="bi bi-globe"></i>
                        <span>Live Site</span>
                    </a>
                    <form action="{{ route('admin.logout') }}" method="POST" class="m-0">
                        @csrf
                        <button type="submit" class="btn btn-sm btn-danger d-flex align-items-center gap-1">
                            <i class="bi bi-box-arrow-right"></i>
                            <span class="d-none d-sm-inline">Sign Out</span>
                        </button>
                    </form>
                </div>
            </header>

            <!-- Admin Main View -->
            <main class="admin-main">
                <!-- Flash Alerts -->
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show shadow-sm border-0 d-flex align-items-center mb-4" role="alert">
                        <i class="bi bi-check-circle-fill me-2 fs-5"></i>
                        <div>{{ session('success') }}</div>
                        <button type="button" class="btn-close shadow-none" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                @if(session('error'))
                    <div class="alert alert-danger alert-dismissible fade show shadow-sm border-0 d-flex align-items-center mb-4" role="alert">
                        <i class="bi bi-exclamation-triangle-fill me-2 fs-5"></i>
                        <div>{{ session('error') }}</div>
                        <button type="button" class="btn-close shadow-none" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                @if($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show shadow-sm border-0 mb-4" role="alert">
                        <div class="fw-bold mb-1"><i class="bi bi-exclamation-circle me-1"></i> Please correct the errors below:</div>
                        <ul class="mb-0 small ps-3">
                            @foreach($errors->all() as $err)
                                <li>{{ $err }}</li>
                            @endforeach
                        </ul>
                        <button type="button" class="btn-close shadow-none" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                @yield('content')
            </main>
        </div>
    </div>

    <!-- Bootstrap 5.3 JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script>
        document.getElementById('sidebarToggle')?.addEventListener('click', () => {
            document.getElementById('adminSidebar')?.classList.toggle('show');
        });
    </script>
    @stack('scripts')
</body>
</html>
