@extends('layouts.app')

@section('title', 'Login Admin - Arsip Berita Premium')

@section('content')
<div class="row justify-content-center align-items-center" style="min-height: 70vh;">
    <div class="col-md-5 col-lg-4">
        <div class="card border-0 rounded-4 shadow-lg p-4 p-md-5 bg-white">
            <div class="text-center mb-4">
                <i class="bi bi-box-seam text-primary mb-3" style="font-size: 3rem;"></i>
                <h3 class="fw-bold" style="color: #0f172a; letter-spacing: -0.5px;">Selamat Datang!</h3>
                <p class="text-muted small">Silakan masuk ke portal manajemen berita.</p>
            </div>
            
            @if ($errors->any())
                <div class="alert alert-danger border-0 rounded-3 mb-4" style="background-color: #fef2f2; color: #dc2626;">
                    <ul class="mb-0 ps-3 small fw-medium">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            
            <form action="{{ url('admin/login') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="email" class="form-label fw-bold text-secondary small text-uppercase" style="letter-spacing: 1px;">ALAMAT EMAIL</label>
                    <div class="input-group">
                        <span class="input-group-text bg-light border-0 text-muted"><i class="bi bi-envelope"></i></span>
                        <input type="email" class="form-control bg-light border-0 py-2" id="email" name="email" value="{{ old('email') }}" placeholder="admin@domain.com" required autofocus>
                    </div>
                </div>
                
                <div class="mb-4">
                    <label for="password" class="form-label fw-bold text-secondary small text-uppercase" style="letter-spacing: 1px;">KATA SANDI</label>
                    <div class="input-group">
                        <span class="input-group-text bg-light border-0 text-muted"><i class="bi bi-lock"></i></span>
                        <input type="password" class="form-control bg-light border-0 py-2" id="password" name="password" placeholder="••••••••" required>
                    </div>
                </div>
                
                <button type="submit" class="btn btn-primary w-100 py-3 fw-bold text-white shadow-sm mt-2" style="border-radius: 8px;">
                    Masuk ke Dasbor <i class="bi bi-box-arrow-in-right ms-2"></i>
                </button>
            </form>
            
            <div class="mt-4 text-center">
                <a href="{{ url('/') }}" class="text-decoration-none text-muted small hover-primary fw-medium"><i class="bi bi-arrow-left mt-1"></i> Kembali ke Beranda</a>
            </div>
        </div>
    </div>
</div>

<style>
    .input-group:focus-within .input-group-text,
    .input-group:focus-within .form-control {
        background-color: #fff !important;
        box-shadow: 0 0 0 0.25rem rgba(59, 130, 246, 0.25);
        border: 1px solid #3b82f6 !important;
    }
    .input-group .form-control:focus {
        box-shadow: none;
    }
    .input-group .input-group-text,
    .input-group .form-control {
        border-radius: 8px;
        transition: all 0.2s ease;
    }
    .input-group .input-group-text {
        border-right: none;
        border-top-right-radius: 0;
        border-bottom-right-radius: 0;
    }
    .input-group .form-control {
        border-left: none;
        border-top-left-radius: 0;
        border-bottom-left-radius: 0;
    }
    .hover-primary:hover { color: #3b82f6 !important; }
</style>
@endsection
