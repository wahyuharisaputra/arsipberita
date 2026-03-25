@extends('layouts.admin')

@section('title', 'Edit Berita')

@section('content')
<div class="card shadow mb-4">
    <div class="card-header bg-white d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Edit Berita</h5>
        <a href="{{ url('admin/berita') }}" class="btn btn-secondary btn-sm">Kembali</a>
    </div>
    <div class="card-body">
        @if($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ url('admin/berita/'.$berita->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label class="form-label">Judul Berita</label>
                <input type="text" name="judul" class="form-control" value="{{ old('judul', $berita->judul) }}" required>
            </div>
            
            <div class="mb-3">
                <label class="form-label">Kategori</label>
                <select name="kategori_id" class="form-select" required>
                    <option value="">Pilih Kategori</option>
                    @foreach($kategoris as $kategori)
                        <option value="{{ $kategori->id }}" {{ old('kategori_id', $berita->kategori_id) == $kategori->id ? 'selected' : '' }}>
                            {{ $kategori->nama_kategori }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Isi Berita</label>
                <textarea name="isi_berita" class="form-control" rows="5" required>{{ old('isi_berita', $berita->isi_berita) }}</textarea>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Penulis</label>
                    <input type="text" name="penulis" class="form-control" value="{{ old('penulis', $berita->penulis) }}" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Tanggal Berita</label>
                    <input type="date" name="tanggal_berita" class="form-control" value="{{ old('tanggal_berita', $berita->tanggal_berita) }}" required>
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label">Upload Gambar Baru (Opsional)</label>
                <input type="file" name="gambar" class="form-control" accept="image/*">
                @if($berita->gambar)
                    <div class="mt-2">
                        <small class="text-muted">Gambar saat ini:</small><br>
                        <img src="{{ asset('storage/'.$berita->gambar) }}" width="150" class="img-thumbnail" alt="Gambar">
                    </div>
                @endif
            </div>

            <button type="submit" class="btn btn-primary">Update Berita</button>
        </form>
    </div>
</div>
@endsection
