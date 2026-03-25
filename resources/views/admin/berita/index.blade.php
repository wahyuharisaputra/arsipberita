@extends('layouts.admin')

@section('title', 'Kelola Berita')

@section('content')
<div class="card shadow mb-4">
    <div class="card-header bg-white d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Daftar Berita</h5>
        <a href="{{ url('admin/berita/create') }}" class="btn btn-primary btn-sm">Tambah Berita</a>
    </div>
    <div class="card-body">
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th width="5%">No</th>
                        <th width="15%">Gambar</th>
                        <th>Judul</th>
                        <th>Kategori</th>
                        <th>Tanggal</th>
                        <th width="15%">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($beritas as $berita)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>
                            @if($berita->gambar)
                                <img src="{{ asset('storage/'.$berita->gambar) }}" alt="Gambar Berita" width="80" class="img-thumbnail">
                            @else
                                <span class="text-muted">Tidak ada gambar</span>
                            @endif
                        </td>
                        <td>{{ $berita->judul }}</td>
                        <td>{{ $berita->kategori->nama_kategori }}</td>
                        <td>{{ \Carbon\Carbon::parse($berita->tanggal_berita)->format('d M Y') }}</td>
                        <td>
                            <a href="{{ url('admin/berita/'.$berita->id.'/edit') }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ url('admin/berita/'.$berita->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus berita ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
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
