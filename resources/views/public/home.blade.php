@extends('layouts.app')

@section('title', 'Portal Berita Terkini')

@section('content')
<!-- Hero Section -->
<div class="position-relative overflow-hidden p-3 p-md-5 m-md-4 text-center bg-white rounded-5 shadow-sm mb-5" style="background: linear-gradient(135deg, #f0f9ff 0%, #e0f2fe 100%);">
    <div class="col-md-8 mx-auto my-5">
        <span class="badge bg-primary text-white rounded-pill px-3 py-2 mb-3 shadow-sm" style="font-weight: 600;">PORTAL TERPERCAYA</span>
        <h1 class="display-4 fw-bold mb-3" style="letter-spacing: -1.5px; color: #0f172a;">Jelajahi Arsip Berita Digital</h1>
        <p class="lead fw-normal text-muted mb-4">Temukan ribuan artikel, opini, dan peristiwa penting yang aktual. Semuanya dirangkum dalam satu genggaman yang elegan.</p>
    </div>
</div>

<div class="container">
    <!-- Awesome Floating Search Card -->
    <div class="row mb-5 justify-content-center" style="margin-top: -90px; position: relative; z-index: 10;">
        <div class="col-lg-10">
            <div class="card border-0 rounded-4 shadow-lg p-4 bg-white" style="backdrop-filter: blur(10px);">
                <form action="{{ url('/') }}" method="GET" class="row g-3 align-items-end">
                    <div class="col-md-5">
                        <label class="form-label fw-bold text-secondary small text-uppercase" style="letter-spacing: 1px;">KATA KUNCI</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light border-0 text-muted"><i class="bi bi-search"></i></span>
                            <input type="text" name="q" class="form-control bg-light border-0 py-2" value="{{ request('q') }}" placeholder="Cari topik...">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label fw-bold text-secondary small text-uppercase" style="letter-spacing: 1px;">KATEGORI</label>
                        <select name="kategori" class="form-select bg-light border-0 py-2">
                            <option value="">Semua</option>
                            @foreach($kategoris as $kategori)
                                <option value="{{ $kategori->id }}" {{ request('kategori') == $kategori->id ? 'selected' : '' }}>
                                    {{ $kategori->nama_kategori }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label class="form-label fw-bold text-secondary small text-uppercase" style="letter-spacing: 1px;">TAHUN</label>
                        <select name="tahun" class="form-select bg-light border-0 py-2">
                            <option value="">Semua</option>
                            @foreach($tahunList as $tahun)
                                <option value="{{ $tahun }}" {{ request('tahun') == $tahun ? 'selected' : '' }}>
                                    {{ $tahun }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-2">
                        <button type="submit" class="btn btn-primary w-100 py-2 fw-bold text-white shadow-sm" style="border-radius: 8px;">Filter</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- News Grid -->
    <div class="row g-4 pb-5">
        <div class="col-12 mb-3">
            <h3 class="fw-bold fs-4 d-flex align-items-center gap-2" style="color: #0f172a;">
                <i class="bi bi-lightning-charge-fill text-warning"></i> Berita Terkini
            </h3>
        </div>

        @forelse($beritas as $berita)
            <div class="col-md-6 col-lg-4">
                <a href="{{ url('berita/'.$berita->id) }}" class="text-decoration-none">
                    <div class="card h-100 news-card text-dark">
                        <div class="position-relative overflow-hidden">
                            @if($berita->gambar)
                                <img src="{{ asset('storage/'.$berita->gambar) }}" class="card-img-top w-100" alt="{{ $berita->judul }}">
                            @else
                                <div class="bg-light d-flex align-items-center justify-content-center text-secondary" style="height: 220px;">
                                    <i class="bi bi-image fs-1 opacity-25"></i>
                                </div>
                            @endif
                            <div class="position-absolute top-0 start-0 m-3">
                                <span class="badge bg-white text-primary shadow-sm px-3 py-2 rounded-pill fw-bold border">
                                    {{ $berita->kategori->nama_kategori }}
                                </span>
                            </div>
                        </div>
                        
                        <div class="card-body p-4 d-flex flex-column bg-white">
                            <div class="d-flex align-items-center gap-2 text-muted small mb-3 fw-semibold">
                                <span><i class="bi bi-calendar3"></i> {{ \Carbon\Carbon::parse($berita->tanggal_berita)->format('d M Y') }}</span>
                                <span class="text-primary">•</span>
                                <span>{{ $berita->penulis }}</span>
                            </div>
                            
                            <h5 class="card-title fw-bold mb-3 fs-5">{{ $berita->judul }}</h5>
                            
                            <p class="card-text text-secondary mb-4 flex-grow-1" style="font-size: 0.95rem; line-height: 1.6;">
                                {{ Str::limit($berita->isi_berita, 110) }}
                            </p>
                            
                            <div class="mt-auto fw-bold text-primary d-flex align-items-center gap-2">
                                Baca Artikel <i class="bi bi-arrow-right"></i>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        @empty
            <div class="col-12 text-center py-5 my-5 bg-white rounded-5 shadow-sm border-0">
                <div class="opacity-50 mb-4 mt-3">
                    <i class="bi bi-journal-x" style="font-size: 5rem; color: #94a3b8;"></i>
                </div>
                <h3 class="fw-bold text-dark mb-2">Data Tidak Ditemukan</h3>
                <p class="text-muted fs-5 mb-4">Coba ubah kata kunci atau filter pencarian Anda.</p>
            </div>
        @endforelse
    </div>

    <!-- Pagination -->
    <div class="d-flex justify-content-center mt-2 mb-5">
        {{ $beritas->links('pagination::bootstrap-5') }}
    </div>
</div>
@endsection
