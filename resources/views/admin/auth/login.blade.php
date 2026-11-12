<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agency CMS Login | Veyora Media</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    <link rel="stylesheet" href="{{ asset('css/editorial.css') }}">
</head>
<body class="d-flex align-items-center justify-content-center min-vh-100 py-5" style="background: var(--bg); color: var(--fg);">

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5 col-lg-4">
                <div class="text-center mb-4">
                    <a href="{{ route('home') }}" class="lg justify-content-center mb-3" style="display: inline-flex;">
                        <svg viewBox="0 0 64 64" aria-hidden="true" style="width: 44px; height: 44px;">
                            <defs>
                                <linearGradient id="avg1" x1="0" y1="0" x2="0" y2="1">
                                    <stop offset="0" stop-color="#a78bfa"/>
                                    <stop offset="1" stop-color="#ff7a59"/>
                                </linearGradient>
                            </defs>
                            <path d="M11 14 L30 54 L43 28" fill="none" stroke="url(#avg1)" stroke-width="11" stroke-linecap="round" stroke-linejoin="round"/>
                            <circle cx="50" cy="13" r="12" fill="none" stroke="#ff7a59" stroke-opacity=".35" stroke-width="1.5"/>
                            <circle cx="50" cy="13" r="6.5" fill="#ff7a59"/>
                        </svg>
                        <span><b style="font-size: 26px;">Veyora</b><small>MEDIA</small></span>
                    </a>
                    <div style="color: var(--mut); font-size: 13.5px;">Agency Content Management Portal</div>
                </div>

                <div class="card-dark" style="padding: 36px;">
                    <h4 style="font-family: var(--sf); font-size: 22px; margin-bottom: 8px; text-align: center;">Administrator Sign In</h4>
                    <p style="color: var(--mut); font-size: 13.5px; text-align: center; margin-bottom: 24px;">Enter your credentials to manage placements and inquiries.</p>

                    @if(session('success'))
                        <div class="alert alert-success py-2 small mb-4" style="background: rgba(40, 167, 69, 0.2); border-color: rgba(40, 167, 69, 0.4); color: #fff;">{{ session('success') }}</div>
                    @endif

                    @if($errors->any())
                        <div class="alert alert-danger py-2 small mb-4" style="background: rgba(220, 53, 69, 0.2); border-color: rgba(220, 53, 69, 0.4); color: #fff;">
                            {{ $errors->first() }}
                        </div>
                    @endif

                    <form action="{{ route('admin.login.submit') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label for="email" style="display: block; font-size: 12.5px; color: var(--mut); text-transform: uppercase; font-weight: 600; margin-bottom: 6px;">Email Address</label>
                            <input type="email" class="form-control" style="background: var(--cd); border: 1px solid var(--bd); color: #fff; padding: 12px 16px; border-radius: 10px;" id="email" name="email" value="{{ old('email', 'admin@veyoramedia.com') }}" required autofocus>
                        </div>

                        <div class="mb-3">
                            <label for="password" style="display: block; font-size: 12.5px; color: var(--mut); text-transform: uppercase; font-weight: 600; margin-bottom: 6px;">Password</label>
                            <input type="password" class="form-control" style="background: var(--cd); border: 1px solid var(--bd); color: #fff; padding: 12px 16px; border-radius: 10px;" id="password" name="password" value="admin123" required>
                        </div>

                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="remember" name="remember" checked>
                                <label class="form-check-label small" style="color: var(--mut);" for="remember">Remember me</label>
                            </div>
                        </div>

                        <button type="submit" class="btn bw w-100 justify-content-center py-2 mb-3">
                            <span>Sign In to Dashboard ↗</span>
                        </button>

                        <div class="text-center">
                            <a href="{{ route('home') }}" style="color: var(--mut); font-size: 13px;">
                                ← Return to Public Website
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</body>
</html>
