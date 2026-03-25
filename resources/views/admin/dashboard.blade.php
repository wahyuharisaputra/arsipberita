@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
<div class="row">
    <div class="col-md-6 mb-4">
        <div class="card text-white bg-primary shadow">
            <div class="card-body">
                <h5 class="card-title">Total Berita</h5>
                <h2 class="mb-0">{{ $totalBerita }}</h2>
            </div>
        </div>
    </div>
    <div class="col-md-6 mb-4">
        <div class="card text-white bg-success shadow">
            <div class="card-body">
                <h5 class="card-title">Total Kategori</h5>
                <h2 class="mb-0">{{ $totalKategori }}</h2>
            </div>
        </div>
    </div>
</div>

<div class="card shadow">
    <div class="card-header bg-white">
        <h5 class="mb-0">Berita Terbaru</h5>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Judul</th>
                        <th>Kategori</th>
                        <th>Penulis</th>
                        <th>Tanggal</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($beritaTerbaru as $berita)
                    <tr>
                        <td>{{ $berita->judul }}</td>
                        <td>{{ $berita->kategori->nama_kategori }}</td>
                        <td>{{ $berita->penulis }}</td>
                        <td>{{ \Carbon\Carbon::parse($berita->tanggal_berita)->format('d M Y') }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="text-center">Belum ada berita.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
