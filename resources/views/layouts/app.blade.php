<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Portfolio Generator')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700;800&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; color: #1f2937; min-height: 100vh; }

        /* ===== Live background ===== */
        .bg-live {
            position: fixed; inset: 0; z-index: -1; overflow: hidden;
            background: linear-gradient(135deg, #eef2ff, #fdf2f8, #ecfeff);
            background-size: 300% 300%;
            animation: bgShift 20s ease infinite;
        }
        .bg-live span {
            position: absolute; border-radius: 50%;
            filter: blur(70px); opacity: .55;
            animation: blobFloat 18s ease-in-out infinite;
            will-change: transform;
        }
        .bg-live span:nth-child(1) { width: 420px; height: 420px; background: #a5b4fc; top: -100px; left: -80px; }
        .bg-live span:nth-child(2) { width: 380px; height: 380px; background: #f9a8d4; top: 30%; right: -100px; animation-duration: 22s; animation-delay: -6s; }
        .bg-live span:nth-child(3) { width: 340px; height: 340px; background: #67e8f9; bottom: -100px; left: 30%; animation-duration: 26s; animation-delay: -12s; }

        @keyframes blobFloat {
            0%, 100% { transform: translate(0, 0) scale(1); }
            33%      { transform: translate(60px, 40px) scale(1.1); }
            66%      { transform: translate(-50px, 60px) scale(.95); }
        }
        @keyframes bgShift {
            0%, 100% { background-position: 0% 50%; }
            50%      { background-position: 100% 50%; }
        }
        @keyframes fadeUp {
            from { opacity: 0; transform: translateY(12px); }
            to   { opacity: 1; transform: none; }
        }

        /* ===== Readable glass surfaces ===== */
        .navbar {
            background: rgba(255, 255, 255, .72) !important;
            backdrop-filter: blur(12px);
            border-bottom: 1px solid rgba(0, 0, 0, .06);
        }
        .navbar-brand { font-weight: 800; color: #4f46e5 !important; }
        .nav-link { font-weight: 600; color: #374151 !important; }
        .nav-link:hover { color: #4f46e5 !important; }

        main { animation: fadeUp .5s ease; }
        main .card {
            background: rgba(255, 255, 255, .93);
            border: 1px solid rgba(255, 255, 255, .8);
            border-radius: 16px;
            box-shadow: 0 6px 24px rgba(79, 70, 229, .08);
        }
        .t2 .card { background: #fff; }           /* keep Template 2 cards solid */
        .card-header { background: transparent !important; border-bottom: 1px solid #eef0f6; }

        .form-control, .form-select { border-radius: 10px; padding: .6rem .85rem; }
        .form-control:focus { border-color: #6366f1; box-shadow: 0 0 0 .2rem rgba(99, 102, 241, .2); }
        .btn { border-radius: 10px; font-weight: 600; }
        .btn-primary { background: #4f46e5; border-color: #4f46e5; }
        .btn-primary:hover { background: #4338ca; border-color: #4338ca; }

        @media (prefers-reduced-motion: reduce) {
            .bg-live, .bg-live span, main { animation: none; }
        }
    </style>
</head>
<body>

<div class="bg-live" aria-hidden="true"><span></span><span></span><span></span></div>

<nav class="navbar navbar-expand-md navbar-light sticky-top">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">PortfolioGen</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#nav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="nav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link" href="{{ route('home') }}">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('portfolios.create') }}">Create Portfolio</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('portfolios.index') }}">Manage Portfolios</a></li>
            </ul>
        </div>
    </div>
</nav>

<main class="container py-4">
    @if(session('success'))
        <div class="alert alert-success shadow-sm">{{ session('success') }}</div>
    @endif
    @yield('content')
</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>