@extends('layouts.app')

@section('title', $berita->judul . ' - Portal Arsip')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-lg-9">
            <!-- Back Button -->
            <a href="{{ url('/') }}" class="text-decoration-none text-secondary d-inline-flex align-items-center gap-2 mb-4 hover-primary transition">
                <i class="bi bi-arrow-left-circle-fill fs-4"></i>
                <span class="fw-medium">Kembali ke Beranda</span>
            </a>
            
            <!-- Article Header -->
            <div class="text-center mb-5">
                <span class="badge bg-primary bg-opacity-10 text-primary border border-primary-subtle px-3 py-2 rounded-pill fw-semibold mb-3">
                    {{ $berita->kategori->nama_kategori }}
                </span>
                <h1 class="fw-extrabold display-5 mb-4" style="letter-spacing: -1px; color: #0f172a;">{{ $berita->judul }}</h1>
                
                <div class="d-flex align-items-center justify-content-center gap-4 text-muted fw-medium border-top border-bottom py-3">
                    <div class="d-flex align-items-center gap-2">
                        <div class="bg-light rounded-circle p-2 d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                            <i class="bi bi-person-fill text-secondary"></i>
                        </div>
                        <span class="text-start">Ditulis oleh<br><strong class="text-dark">{{ $berita->penulis }}</strong></span>
                    </div>
                    <div style="width: 1px; height: 30px; background: #e2e8f0;"></div>
                    <div class="d-flex align-items-center gap-2">
                        <i class="bi bi-calendar3 fs-5"></i>
                        <span class="text-start">Diterbitkan<br><strong class="text-dark">{{ \Carbon\Carbon::parse($berita->tanggal_berita)->format('d F Y') }}</strong></span>
                    </div>
                </div>
            </div>

            <!-- Cover Image -->
            @if($berita->gambar)
                <div class="mb-5 rounded-4 overflow-hidden shadow-sm" style="max-height: 550px;">
                    <img src="{{ asset('storage/'.$berita->gambar) }}" class="w-100 h-100" style="object-fit: cover;" alt="{{ $berita->judul }}">
                </div>
            @endif

            <!-- Abstract / Article Content -->
            <article class="bg-white p-4 p-md-5 rounded-4 shadow-sm border-0 mb-5">
                <!-- Drop cap style for first letter (optional, elegant touch) -->
                <div class="article-content" style="font-size: 1.15rem; line-height: 1.9; color: #334155;">
                    {!! nl2br(e($berita->isi_berita)) !!}
                </div>
            </article>

            <!-- Share / Tags Block -->
            <div class="d-flex justify-content-between align-items-center p-4 bg-light rounded-4 mb-5">
                <span class="fw-bold text-dark">Akhir dari artikel</span>
                <div class="d-flex gap-2">
                    <button class="btn btn-white border px-3 rounded-pill text-muted hover-primary"><i class="bi bi-share-fill"></i> Bagikan</button>
                    <button class="btn btn-white border px-3 rounded-pill text-muted hover-primary"><i class="bi bi-bookmark-fill"></i> Simpan</button>
                </div>
            </div>
            
        </div>
    </div>
</div>

<style>
    .hover-primary:hover { color: #3b82f6 !important; }
    .transition { transition: all 0.3s ease; }
    .article-content p:first-of-type::first-letter {
        font-size: 3.5rem;
        font-weight: 800;
        float: left;
        line-height: 1;
        padding-right: 0.5rem;
        color: #0f172a;
    }
</style>
@endsection
