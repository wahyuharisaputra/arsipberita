<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Dashboard') - Arsip Berita Premium</title>
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    
    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: #f1f5f9;
            color: #334155;
        }
        .navbar-admin {
            background-color: #0f172a;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
        }
        .navbar-admin .navbar-brand {
            font-weight: 700;
            color: #f8fafc !important;
        }
        .navbar-admin .nav-link {
            color: #cbd5e1 !important;
            font-weight: 500;
            transition: color 0.2s;
        }
        .navbar-admin .nav-link:hover, .navbar-admin .nav-link.active {
            color: #3b82f6 !important;
        }
        .card {
            border: none;
            border-radius: 12px;
            box-shadow: 0 4px 6px -1px rgba(0,0,0,0.05);
        }
        .table th {
            background-color: #f8fafc;
            color: #475569;
            font-weight: 600;
            text-transform: uppercase;
            font-size: 0.85rem;
            letter-spacing: 0.5px;
        }
        .btn-primary {
            background-color: #3b82f6;
            border-color: #3b82f6;
            font-weight: 600;
            border-radius: 8px;
        }
        .btn-primary:hover {
            background-color: #2563eb;
            border-color: #2563eb;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark navbar-admin sticky-top py-3 mb-4">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center gap-2" href="{{ url('admin/dashboard') }}">
                <i class="bi bi-shield-lock-fill text-primary"></i>
                Admin <span class="text-primary">Panel</span>
            </a>
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#adminNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="adminNavbar">
                <ul class="navbar-nav me-auto ms-4 gap-2">
                    <li class="nav-item"><a class="nav-link {{ request()->is('admin/dashboard') ? 'active' : '' }}" href="{{ url('admin/dashboard') }}"><i class="bi bi-speedometer2 me-1"></i> Dashboard</a></li>
                    <li class="nav-item"><a class="nav-link {{ request()->is('admin/berita*') ? 'active' : '' }}" href="{{ url('admin/berita') }}"><i class="bi bi-newspaper me-1"></i> Berita</a></li>
                    <li class="nav-item"><a class="nav-link {{ request()->is('admin/kategori*') ? 'active' : '' }}" href="{{ url('admin/kategori') }}"><i class="bi bi-tags me-1"></i> Kategori</a></li>
                </ul>
                <ul class="navbar-nav ms-auto gap-3 align-items-center">
                    <li class="nav-item">
                        <a href="{{ url('/') }}" target="_blank" class="text-decoration-none text-light opacity-75 hover-primary small"><i class="bi bi-box-arrow-up-right me-1"></i> Lihat Web Publik</a>
                    </li>
                    <li class="nav-item">
                        <form action="{{ url('admin/logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-outline-danger btn-sm rounded-pill px-3 fw-bold"><i class="bi bi-power"></i> Logout</button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container pb-5">
        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
