<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agency CMS Login | Byline Bridge</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    <link rel="stylesheet" href="{{ asset('css/editorial.css') }}">
</head>
<body class="bg-ivory-base d-flex align-items-center justify-content-center min-vh-100 py-5">

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5 col-lg-4">
                <div class="text-center mb-4">
                    <a href="{{ route('home') }}" class="editorial-brand justify-content-center mb-2">
                        <span class="editorial-brand-mark">B</span>
                        <span>Byline Bridge</span>
                    </a>
                    <div class="text-muted small">Agency Content Management Portal</div>
                </div>

                <div class="p-4 p-md-5 bg-white rounded border border-secondary border-opacity-10 shadow-sm">
                    <h4 class="font-serif fs-4 mb-3 text-dark text-center">Administrator Sign In</h4>
                    <p class="text-muted small text-center mb-4">Enter your administrative credentials to manage placements and inquiries.</p>

                    @if(session('success'))
                        <div class="alert alert-success py-2 small mb-4">{{ session('success') }}</div>
                    @endif

                    @if($errors->any())
                        <div class="alert alert-danger py-2 small mb-4">
                            {{ $errors->first() }}
                        </div>
                    @endif

                    <form action="{{ route('admin.login.submit') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label for="email" class="form-label small fw-bold text-muted text-uppercase" style="font-size: 0.72rem;">Email Address</label>
                            <input type="email" class="form-control form-editorial-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email', 'admin@bylinebridge.com') }}" required autofocus>
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label small fw-bold text-muted text-uppercase" style="font-size: 0.72rem;">Password</label>
                            <input type="password" class="form-control form-editorial-control @error('password') is-invalid @enderror" id="password" name="password" value="admin123" required>
                        </div>

                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="remember" name="remember" checked>
                                <label class="form-check-label small text-muted" for="remember">Remember me</label>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-editorial-gold w-100 justify-content-center py-2 mb-3">
                            <span>Sign In to Dashboard</span>
                            <i class="bi bi-arrow-right"></i>
                        </button>
                    </form>

                    <div class="p-2 bg-light rounded text-center small text-muted mt-3" style="font-size: 0.78rem;">
                        <strong>Default Seeder Credentials:</strong><br>
                        <code>admin@bylinebridge.com</code> / <code>admin123</code>
                    </div>
                </div>

                <div class="text-center mt-4">
                    <a href="{{ route('home') }}" class="text-muted small text-decoration-none hover-gold">
                        <i class="bi bi-arrow-left me-1"></i> Back to Public Website
                    </a>
                </div>
            </div>
        </div>
    </div>

</body>
</html>
