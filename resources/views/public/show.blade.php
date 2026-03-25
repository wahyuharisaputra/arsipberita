@extends('layouts.app')

@section('title', $berita->judul . ' - Arsip Berita')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <a href="{{ url('/') }}" class="btn btn-outline-secondary mb-4">&larr; Kembali ke Daftar Berita</a>
        
        <div class="card shadow">
            @if($berita->gambar)
                <img src="{{ asset('storage/'.$berita->gambar) }}" class="card-img-top" alt="{{ $berita->judul }}" style="max-height: 400px; object-fit: cover;">
            @endif
            <div class="card-body p-5">
                <h2 class="card-title fw-bold mb-3">{{ $berita->judul }}</h2>
                <div class="d-flex justify-content-between align-items-center mb-4 pb-3 border-bottom text-muted">
                    <div>
                        <span class="badge bg-primary me-2">{{ $berita->kategori->nama_kategori }}</span>
                        <i class="bi bi-person"></i> Oleh: <strong>{{ $berita->penulis }}</strong>
                    </div>
                    <div>
                        <i class="bi bi-calendar"></i> {{ \Carbon\Carbon::parse($berita->tanggal_berita)->format('d F Y') }}
                    </div>
                </div>
                
                <div class="card-text" style="font-size: 1.1rem; line-height: 1.8;">
                    {!! nl2br(e($berita->isi_berita)) !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
