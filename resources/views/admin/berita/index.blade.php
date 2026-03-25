@extends('layouts.admin')

@section('title', 'Kelola Berita')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h3 class="fw-bold mb-0">Kelola Berita</h3>
    <a href="{{ url('admin/berita/create') }}" class="btn btn-primary px-4 shadow-sm"><i class="bi bi-plus-lg me-1"></i> Tambah Berita Baru</a>
</div>

<div class="card border-0 shadow-sm" style="border-radius: 16px;">
    <div class="card-body p-4">
        @if(session('success'))
            <div class="alert alert-success border-0 bg-success text-white rounded-3 shadow-sm d-flex align-items-center">
                <i class="bi bi-check-circle-fill me-2 fs-5"></i> {{ session('success') }}
            </div>
        @endif

        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="text-muted small">
                    <tr>
                        <th class="border-0 pb-3" width="5%">No</th>
                        <th class="border-0 pb-3" width="12%">Visual</th>
                        <th class="border-0 pb-3">Judul Berita</th>
                        <th class="border-0 pb-3">Kategori</th>
                        <th class="border-0 pb-3">Tgl Terbit</th>
                        <th class="border-0 pb-3 text-end" width="15%">Aksi</th>
                    </tr>
                </thead>
                <tbody class="border-top-0">
                    @foreach($beritas as $berita)
                    <tr>
                        <td class="py-3 text-muted">{{ $loop->iteration }}</td>
                        <td class="py-3">
                            @if($berita->gambar)
                                <img src="{{ asset('storage/'.$berita->gambar) }}" alt="Gambar" class="rounded object-fit-cover shadow-sm" width="60" height="60">
                            @else
                                <div class="bg-light rounded d-flex align-items-center justify-content-center text-muted shadow-sm" style="width: 60px; height: 60px;">
                                    <i class="bi bi-image"></i>
                                </div>
                            @endif
                        </td>
                        <td class="py-3 fw-medium">{{ $berita->judul }}</td>
                        <td class="py-3"><span class="badge bg-light text-dark border px-2 py-1">{{ $berita->kategori->nama_kategori }}</span></td>
                        <td class="py-3 text-muted">{{ \Carbon\Carbon::parse($berita->tanggal_berita)->format('d M Y') }}</td>
                        <td class="py-3 text-end">
                            <a href="{{ url('admin/berita/'.$berita->id.'/edit') }}" class="btn btn-light btn-sm text-primary border shadow-sm"><i class="bi bi-pencil-square"></i></a>
                            <form action="{{ url('admin/berita/'.$berita->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Peringatan: Anda yakin ingin menghapus berita ini secara permanen?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-light btn-sm text-danger border shadow-sm"><i class="bi bi-trash3"></i></button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
