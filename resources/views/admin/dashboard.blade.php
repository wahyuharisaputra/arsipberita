@extends('layouts.admin')

@section('title', 'Dasbor Utama')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h3 class="fw-bold mb-0">Ringkasan Dasbor</h3>
    <div class="text-muted small">Update: {{ \Carbon\Carbon::now()->format('d M Y, H:i') }}</div>
</div>

<div class="row mb-5">
    <div class="col-md-6 mb-4 mb-md-0">
        <div class="card bg-white border-0 shadow-sm h-100 overflow-hidden" style="border-radius: 16px;">
            <div class="card-body p-4 d-flex align-items-center justify-content-between">
                <div>
                    <h6 class="text-muted text-uppercase fw-semibold mb-2" style="letter-spacing: 1px;">TOTAL BERITA</h6>
                    <h2 class="display-5 fw-extrabold mb-0 text-dark">{{ $totalBerita }}</h2>
                </div>
                <div class="bg-primary bg-opacity-10 text-primary rounded-circle d-flex align-items-center justify-content-center" style="width: 70px; height: 70px;">
                    <i class="bi bi-newspaper fs-2"></i>
                </div>
            </div>
            <div class="bg-primary" style="height: 4px; width: 100%;"></div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card bg-white border-0 shadow-sm h-100 overflow-hidden" style="border-radius: 16px;">
            <div class="card-body p-4 d-flex align-items-center justify-content-between">
                <div>
                    <h6 class="text-muted text-uppercase fw-semibold mb-2" style="letter-spacing: 1px;">TOTAL KATEGORI</h6>
                    <h2 class="display-5 fw-extrabold mb-0 text-dark">{{ $totalKategori }}</h2>
                </div>
                <div class="bg-success bg-opacity-10 text-success rounded-circle d-flex align-items-center justify-content-center" style="width: 70px; height: 70px;">
                    <i class="bi bi-tags fs-2"></i>
                </div>
            </div>
            <div class="bg-success" style="height: 4px; width: 100%;"></div>
        </div>
    </div>
</div>

<div class="card border-0 shadow-sm" style="border-radius: 16px;">
    <div class="card-header bg-white border-bottom-0 pt-4 pb-0 px-4">
        <h5 class="fw-bold mb-0">Berita Terbaru yang Diterbitkan</h5>
    </div>
    <div class="card-body p-4">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="text-muted small">
                    <tr>
                        <th class="border-0 pb-3">Judul Artikel</th>
                        <th class="border-0 pb-3">Kategori</th>
                        <th class="border-0 pb-3">Penulis</th>
                        <th class="border-0 pb-3">Tgl Terbit</th>
                    </tr>
                </thead>
                <tbody class="border-top-0">
                    @forelse($beritaTerbaru as $berita)
                    <tr>
                        <td class="py-3">
                            <div class="d-flex align-items-center">
                                <div class="bg-light rounded d-flex align-items-center justify-content-center me-3" style="width: 40px; height: 40px;">
                                    <i class="bi bi-file-earmark-text text-secondary"></i>
                                </div>
                                <span class="fw-medium">{{ $berita->judul }}</span>
                            </div>
                        </td>
                        <td class="py-3"><span class="badge bg-light text-dark border px-2 py-1">{{ $berita->kategori->nama_kategori }}</span></td>
                        <td class="py-3 text-muted">{{ $berita->penulis }}</td>
                        <td class="py-3 text-muted">{{ \Carbon\Carbon::parse($berita->tanggal_berita)->format('d M Y') }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="text-center py-5 text-muted">
                            <i class="bi bi-inbox fs-1 d-block mb-3 opacity-50"></i>
                            Belum ada berita.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
