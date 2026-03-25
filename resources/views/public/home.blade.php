@extends('layouts.app')

@section('title', 'Berita Utama - Arsip Berita')

@section('content')
<div class="row mb-4">
    <div class="col-md-12">
        <div class="card shadow-sm">
            <div class="card-body">
                <form action="{{ url('/') }}" method="GET" class="row g-3 align-items-end">
                    <div class="col-md-4">
                        <label class="form-label">Cari Berita</label>
                        <input type="text" name="q" class="form-control" value="{{ request('q') }}" placeholder="Ketik kata kunci...">
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Kategori</label>
                        <select name="kategori" class="form-select">
                            <option value="">Semua Kategori</option>
                            @foreach($kategoris as $kategori)
                                <option value="{{ $kategori->id }}" {{ request('kategori') == $kategori->id ? 'selected' : '' }}>
                                    {{ $kategori->nama_kategori }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Tahun</label>
                        <select name="tahun" class="form-select">
                            <option value="">Semua Tahun</option>
                            @foreach($tahunList as $tahun)
                                <option value="{{ $tahun }}" {{ request('tahun') == $tahun ? 'selected' : '' }}>
                                    {{ $tahun }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-2">
                        <button type="submit" class="btn btn-primary w-100">Cari</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="row">
    @forelse($beritas as $berita)
        <div class="col-md-4 mb-4">
            <div class="card h-100 shadow-sm news-card">
                @if($berita->gambar)
                    <img src="{{ asset('storage/'.$berita->gambar) }}" class="card-img-top" alt="{{ $berita->judul }}">
                @else
                    <div class="bg-secondary text-white d-flex align-items-center justify-content-center" style="height: 200px;">
                        <span>Tidak ada gambar</span>
                    </div>
                @endif
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title text-truncate">{{ $berita->judul }}</h5>
                    <p class="card-text text-muted small mb-2">
                        <span class="badge bg-info text-dark">{{ $berita->kategori->nama_kategori }}</span> | 
                        {{ \Carbon\Carbon::parse($berita->tanggal_berita)->format('d M Y') }}
                    </p>
                    <p class="card-text flex-grow-1">
                        {{ Str::limit($berita->isi_berita, 100) }}
                    </p>
                    <a href="{{ url('berita/'.$berita->id) }}" class="btn btn-outline-primary mt-auto">Baca Selengkapnya</a>
                </div>
            </div>
        </div>
    @empty
        <div class="col-12 text-center py-5">
            <h4 class="text-muted">Tidak ada berita yang ditemukan.</h4>
        </div>
    @endforelse
</div>

<div class="d-flex justify-content-center mt-4">
    {{ $beritas->links('pagination::bootstrap-5') }}
</div>
@endsection
