<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Portal Arsip Berita Premium')</title>
    
    <!-- Google Fonts: Plus Jakarta Sans -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    
    <style>
        :root {
            --primary-color: #0f172a;
            --accent-color: #3b82f6;
            --bg-color: #f8fafc;
        }
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: var(--bg-color);
            color: #334155;
            -webkit-font-smoothing: antialiased;
        }
        
        /* Modern Glass Navbar */
        .navbar-glass {
            background: rgba(255, 255, 255, 0.85) !important;
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border-bottom: 1px solid rgba(0, 0, 0, 0.05);
            transition: all 0.3s ease;
        }
        .navbar-brand {
            font-weight: 800;
            color: var(--primary-color) !important;
            letter-spacing: -0.5px;
        }
        .nav-link {
            font-weight: 500;
            color: #475569 !important;
            transition: color 0.2s;
        }
        .nav-link:hover {
            color: var(--accent-color) !important;
        }
        .btn-premium {
            background-color: var(--primary-color);
            color: white;
            border-radius: 50rem;
            padding: 0.5rem 1.5rem;
            font-weight: 600;
            transition: all 0.3s;
        }
        .btn-premium:hover {
            background-color: var(--accent-color);
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(59, 130, 246, 0.3);
        }

        /* Card Hover Effects */
        .news-card {
            border: none;
            border-radius: 16px;
            overflow: hidden;
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            background: #ffffff;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05), 0 2px 4px -1px rgba(0, 0, 0, 0.03);
        }
        .news-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }
        .news-card img {
            height: 220px;
            object-fit: cover;
            transition: transform 0.5s ease;
        }
        .news-card:hover img {
            transform: scale(1.05);
        }
        .card-title {
            font-weight: 700;
            line-height: 1.4;
            color: var(--primary-color);
        }
        
        /* Modern Footer */
        .footer-premium {
            background-color: var(--primary-color);
            color: #94a3b8;
            padding: 3rem 0;
            margin-top: 5rem;
        }
    </style>
</head>
<body class="d-flex flex-column min-vh-100">

    <nav class="navbar navbar-expand-lg navbar-light navbar-glass py-3 sticky-top">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center gap-2" href="{{ url('/') }}">
                <i class="bi bi-box-seam text-primary"></i>
                Arsip<span class="text-primary">News</span>
            </a>
            <button class="navbar-toggler border-0 shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#publicNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="publicNavbar">
                <ul class="navbar-nav ms-auto align-items-lg-center gap-2">
                    <li class="nav-item"><a class="nav-link" href="{{ url('/') }}">Beranda</a></li>
                    @auth
                        <li class="nav-item ms-lg-3"><a class="btn btn-premium" href="{{ url('/admin/dashboard') }}">Dasbor Admin</a></li>
                    @else
                        <li class="nav-item ms-lg-3"><a class="btn btn-premium" href="{{ url('/admin/login') }}">Login Portal</a></li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

    <main class="flex-grow-1">
        @yield('content')
    </main>

    <footer class="footer-premium text-center">
        <div class="container">
            <div class="mb-3">
                <i class="bi bi-box-seam fs-2 text-white"></i>
            </div>
            <h5 class="text-white fw-bold mb-3">ArsipNews</h5>
            <p class="mb-0">&copy; {{ date('Y') }} Arsip Berita Premium. Dirancang dengan keunggulan.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
